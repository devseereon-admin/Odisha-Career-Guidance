<?php

function reindexPriority($conn) {

    $res = mysqli_query($conn, "SELECT id FROM notifications WHERE is_deleted=0 ORDER BY priority ASC, id ASC");

    $i = 1;

    while ($r = mysqli_fetch_assoc($res)) {

        mysqli_query($conn, "UPDATE notifications SET priority=$i WHERE id=".$r['id']);

        $i++;

    }

}



// Shift priorities to avoid duplicates

function shiftPriority($conn, $newPriority, $excludeId = 0) {

    $newPriority = (int)$newPriority;

    if ($newPriority < 1) $newPriority = 1;



    $sql = "UPDATE notifications 

            SET priority = priority + 1 

            WHERE is_deleted=0 

            AND priority >= $newPriority";



    if ($excludeId > 0) {

        $sql .= " AND id <> $excludeId";

    }



    mysqli_query($conn, $sql);

}

