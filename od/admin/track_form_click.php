<?php
include "dbconn.php";

// Read POST data safely
$form_type  = $_POST['form_type']  ?? '';
$click_type = $_POST['click_type'] ?? '';
$item_id    = $_POST['item_id']    ?? '';
$item_name  = $_POST['item_name']  ?? '';

// Convert string item_id to integer for weakness forms
if ($form_type === 'weakness_follow' && !is_numeric($item_id)) {
    // Create a consistent numeric ID from the text
    $item_id = abs(crc32($item_id));
}

// ✅ FIX: Don't require item_name for all forms
if ($form_type && $click_type && $item_id) {

    // Get item name dynamically if not provided
    $final_item_name = get_item_name($conn, $click_type, $item_id, $item_name);

    // Insert or update click count
    track_individual_click($conn, $form_type, $click_type, $item_id, $final_item_name);
    echo $form_type . "_track_success";
} else {
    echo "invalid_data";
}

// ---------------------------
// Function: insert or update
// ---------------------------
function track_individual_click($conn, $form_type, $click_type, $item_id, $item_name) {
    $stmt = $conn->prepare("
        INSERT INTO form_click_summary (form_type, click_type, item_id, item_name, click_count)
        VALUES (?, ?, ?, ?, 1)
        ON DUPLICATE KEY UPDATE click_count = click_count + 1
    ");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssis", $form_type, $click_type, $item_id, $item_name);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
}

// ---------------------------
// Function: get item name
// ---------------------------
function get_item_name($conn, $click_type, $item_id, $item_name_from_post = '') {
    switch ($click_type) {
        case 'institute':
            // Odia values mapping
            $institute_names_odia = [
                '1' => 'ସରକାରୀ',
                '2' => 'ବେସରକାରୀ'
            ];
            return $institute_names_odia[$item_id] ?? 'Unknown Institute';

        case 'domain':
            $result = $conn->query("SELECT name FROM catagory WHERE id = $item_id");
            $row = $result->fetch_assoc();
            return $row['name'] ?? 'Unknown Domain';

        case 'state':
            $result = $conn->query("SELECT name FROM state WHERE id = $item_id");
            $row = $result->fetch_assoc();
            return $row['name'] ?? 'Unknown State';

        case 'exam_type':
            $types = [
                '1' => 'ସ୍ନାତକ', // Under Graduate
                '2' => 'ସ୍ନାତକୋତ୍ତର', // Post Graduate
                '3' => 'ପ୍ରତିଯୋଗିତାମୂଳକ ପରୀକ୍ଷା' // Competitive Exam
            ];
            return $types[$item_id] ?? 'Unknown Exam Type';

        case 'qualification':
            $result = $conn->query("SELECT name FROM qualification WHERE id = $item_id");
            $row = $result->fetch_assoc();
            return $row['name'] ?? 'Unknown Qualification';

       case 'location':
            $locations_odia = [
                '1' => 'ରାଜ୍ୟ',      // Odisha / State
                '2' => 'ଜାତୀୟ'       // All India / National
            ];
            return $locations_odia[$item_id] ?? 'ଅଜଣା ସ୍ଥାନ'; // Unknown Location in Odia


        case 'scholarship_type':
              $types = [
                  '1' => 'ଜାତୀୟ',
                  '2' => 'ଓଡିଶା ସରକାର',
                  '3' => 'ବେସରକାରୀ',
                  '4' => 'ପିଏସୟୁ'
              ];
              return $types[$item_id] ?? 'Unknown Scholarship Type';


        case 'class':
            $classes_odia = [
                '1' => 'ପ୍ରଥମ - ପଞ୍ଚମ ଶ୍ରେଣୀ',
                '2' => 'ଷଷ୍ଠ - ଅଷ୍ଟମ ଶ୍ରେଣୀ',
                '3' => 'ନବମ - ଦଶମ ଶ୍ରେଣୀ',
                '4' => 'ଏକାଦଶ - ଦ୍ଵାଦଶ ଶ୍ରେଣୀ',
                '5' => 'ପ୍ରାକ୍-ସ୍ନାତକ',
                '6' => 'ସ୍ନାତକୋତ୍ତର'
            ];
            return $classes_odia[$item_id] ?? 'ଅଜଣା ଶ୍ରେଣୀ';


        case 'emotional_area':
        case 'study_area':
        case 'career_selection':
            return $item_name_from_post ?: 'Unknown Option';

        default:
            return $item_name_from_post ?: 'Unknown';
    }
}

?>
