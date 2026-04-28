<?php
include 'dbconn.php';
include 'helpers.php';

$action = $_GET['action'] ?? '';

/* =======================
   LIST + SEARCH + PAGINATION
======================= */
if ($action == 'list') {
    $page = max(1, (int)($_GET['page'] ?? 1));
    $search = mysqli_real_escape_string($conn, $_GET['search'] ?? '');
    $limit = 5;
    $offset = ($page-1)*$limit;

    $where = "is_deleted=0";
    if ($search) {
        $where .= " AND (title LIKE '%$search%' OR message LIKE '%$search%')";
    }

    $total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) c FROM notifications WHERE $where"))['c'];

    $res = mysqli_query($conn, "SELECT * FROM notifications WHERE $where ORDER BY priority ASC LIMIT $offset,$limit");

    echo "<table class='table table-bordered'>
    <tr>
        <th>Pri</th>
        <th>Title</th>
        <th>Content</th>
        <th>Date</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>";

    while($r = mysqli_fetch_assoc($res)){

        // Build preview by type
        $preview = '';
        if ($r['type'] == 'image' && !empty($r['file_url'])) {
            $preview = "<img src='{$r['file_url']}' style='max-width:80px;max-height:50px;'>";
        } elseif ($r['type'] == 'pdf' && !empty($r['file_url'])) {
            $preview = "<a class='btn btn-sm btn-secondary' target='_blank' href='{$r['file_url']}'>Open PDF</a>";
        } elseif ($r['type'] == 'link' && !empty($r['file_url'])) {
            $preview = "<a class='btn btn-sm btn-secondary' target='_blank' href='{$r['file_url']}'>Open Link</a>";
        } else {
            $preview = htmlspecialchars(mb_strimwidth($r['message'], 0, 50, '...'));
        }
    
        // Build date display
        $dateText = '';
        if (!empty($r['start_date']) && !empty($r['end_date'])) {
            $dateText = date('d M Y', strtotime($r['start_date'])) . ' - ' . date('d M Y', strtotime($r['end_date']));
        } elseif (!empty($r['start_date'])) {
            $dateText = date('d M Y', strtotime($r['start_date']));
        } elseif (!empty($r['end_date'])) {
            $dateText = date('d M Y', strtotime($r['end_date']));
        }
    
        echo "<tr>
            <td>{$r['priority']}</td>
            <td>".htmlspecialchars($r['title'])."</td>
            <td>$preview</td>
            <td>$dateText</td>
            <td>{$r['status']}</td>
            <td>
              <button class='btn btn-sm btn-info' onclick='editNotif({$r['id']})'>Edit</button>
              <button class='btn btn-sm btn-warning' onclick='toggleStatus({$r['id']})'>Toggle</button>
              <button class='btn btn-sm btn-danger' onclick='softDelete({$r['id']})'>Delete</button>
            </td>
        </tr>";
    }

    echo "</table>";

    // Pagination
    $pages = ceil($total / $limit);
    echo "<nav><ul class='pagination'>";
    for ($i = 1; $i <= $pages; $i++) {
        $active = $i == $page ? "active" : "";
        echo "<li class='page-item $active'>
                <a class='page-link' href='javascript:loadData($i)'>$i</a>
              </li>";
    }
    echo "</ul></nav>";
    exit;
}

/* =======================
   GET SINGLE
======================= */
if ($action == 'get') {
    $id = (int)$_GET['id'];
    $r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM notifications WHERE id=$id"));
    echo json_encode($r);
    exit;
}

/* =======================
   SAVE (ADD / EDIT) WITH PRIORITY + FILE UPLOAD
======================= */
if ($action == 'save') {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $type = $_POST['type'];
    $status = $_POST['status'];
    $start = $_POST['start_date'] ?: NULL;
    $end = $_POST['end_date'] ?: NULL;
    $file_url = mysqli_real_escape_string($conn, $_POST['file_url']);
    $priority = (int)($_POST['priority'] ?? 1);
    if ($priority < 1) $priority = 1;

    // Handle file upload
    if (!empty($_FILES['file']['name'])) {
        $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
        $name = time()."_".rand(1000,9999).".".$ext;

        if (!is_dir("notification_upload_data")) {
            mkdir("notification_upload_data", 0777, true);
        }

        move_uploaded_file($_FILES['file']['tmp_name'], "notification_upload_data/".$name);
        $file_url = "notification_upload_data/".$name;
    }

    if ($id == '') {
        // ADD
        shiftPriority($conn, $priority);

        mysqli_query($conn, "INSERT INTO notifications 
        (title, message, type, file_url, status, start_date, end_date, priority)
        VALUES (
            '$title',
            '$message',
            '$type',
            '$file_url',
            '$status',
            ".($start ? "'$start'" : "NULL").",
            ".($end ? "'$end'" : "NULL").",
            $priority
        )");

    } else {
        // EDIT
        $old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT priority FROM notifications WHERE id=".(int)$id));
        $oldPriority = (int)$old['priority'];

        if ($priority != $oldPriority) {
            // Temporarily free this priority
            mysqli_query($conn, "UPDATE notifications SET priority=0 WHERE id=".(int)$id);
            shiftPriority($conn, $priority, (int)$id);
        }

        mysqli_query($conn, "UPDATE notifications SET 
            title='$title',
            message='$message',
            type='$type',
            file_url='$file_url',
            status='$status',
            start_date=".($start ? "'$start'" : "NULL").",
            end_date=".($end ? "'$end'" : "NULL").",
            priority=$priority
        WHERE id=".(int)$id);
    }

    reindexPriority($conn);
    exit;
}

/* =======================
   TOGGLE STATUS
======================= */
if ($action == 'toggle') {
    $id = (int)$_GET['id'];
    mysqli_query($conn, "UPDATE notifications SET status=IF(status='active','inactive','active') WHERE id=$id");
    exit;
}

/* =======================
   DELETE (SOFT DELETE + PHYSICAL FILE DELETE)
======================= */
if ($action == 'delete') {
    $id = (int)$_GET['id'];

    // Get file path before delete
    $res = mysqli_fetch_assoc(mysqli_query($conn, "SELECT file_url FROM notifications WHERE id=$id"));
    if (!empty($res['file_url']) && file_exists($res['file_url'])) {
        unlink($res['file_url']); // Physically delete file
    }

    // Soft delete DB record
    mysqli_query($conn, "UPDATE notifications SET is_deleted=1 WHERE id=$id");

    reindexPriority($conn);
    exit;
}
