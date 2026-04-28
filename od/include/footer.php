<style>
    .footer-a{
        color: #003052 !important;
    }
    @media(max-width:768px){
      .notification-bar{
          display:none;
      }  
    }
</style>
<section class="footer">
<div class="container">
<div class="row">
    <!--<div class="col-md-3 col-5"><p>ୟୁନିସେଫ୍ ସହଯୋଗ ରେ</p></div>-->
<div class="notification-bar col-md-2 col-2"><p>ସୂଚନା:</p></div>
<!--<div class="col-md-9 col-9"><marquee> ସିଏ ଫାଇନାଲ ରେଜଲ୍ଟ ୨୦୨୪ : ସିଏ ଫାଇନାଲ ୨୦୨୪ ରେଜଲ୍ଟ ଆଇସିଏଆଇ ୧୧ ଜୁଲାଇ ୨୦୨୪ରେ ଘୋଷଣା କରିଛି । ଅଧିକ ବିବରଣୀ ପାଇଁ ଲିଙ୍କ୍ କୁ ପରିଦର୍ଶନ କରନ୍ତୁ-<a href="https://www.icai.org/post/exam-result-cafinal-inter-may24" class="footer-a">https://www.icai.org/post/exam-result-cafinal-inter-may24</a>-->
<!--</marquee></div>-->
<!--<div class="col-md-9 col-9"><marquee>ଦଶମ ଶ୍ରେଣୀର ମୁଖ୍ୟ ପରୀକ୍ଷା ୧୯ ଫେବୃଆରୀ ୨୦୨୬ ରୁ ଆରମ୍ଭ ହେବ ଏବଂ ଦ୍ୱାଦଶ ଶ୍ରେଣୀର ମୁଖ୍ୟ ପରୀକ୍ଷା ୧୭ ଫେବୃଆରୀ ୨୦୨୬ ରୁ ଆରମ୍ଭ ହେବ।</marquee></div>-->

        <?php
        include "admin/dbconn.php";
        
        $upload_path = "../admin/notification_upload_data/"; // folder for pdf/image
        
        $sql = "SELECT title, message, type, file_url, start_date, end_date 
                FROM notifications 
                WHERE status = 'active' AND is_deleted = 0
                ORDER BY priority DESC, created_at DESC";
        
        $result = mysqli_query($conn, $sql);
        ?>
        
        <div class="col-md-10 col-10 col-sm-12">
        <marquee onmouseover="this.stop();" onmouseout="this.start();">
        <?php
        $items = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $title   = htmlspecialchars($row['title']);
            $message = htmlspecialchars($row['message']);
            $type    = $row['type'];
            $file    = $row['file_url'];
        
            // Dates (can be NULL)
            $start_date = $row['start_date'];
            $end_date   = $row['end_date'];
        
            // Build date text only if exists
            $date_text = "";
            if (!empty($start_date) && !empty($end_date)) {
                $date_text = " (" . date("d M Y", strtotime($start_date)) . " - " . date("d M Y", strtotime($end_date)) . ")";
            } elseif (!empty($start_date)) {
                $date_text = " (" . date("d M Y", strtotime($start_date)) . ")";
            }
        
            if ($type == 'link' && !empty($file)) {
                // 🔗 External link
                $items[] = "🔗 <strong>$title$date_text:</strong> <a href=\"$file\" target=\"_blank\" style=\"color:inherit;\">$message</a>";
        
            } elseif ($type == 'pdf' && !empty($file)) {
                // 📄 PDF file
                $file_path = $upload_path . rawurlencode($file);
                $items[] = "📄 <strong>$title$date_text:</strong> <a href=\"$file_path\" target=\"_blank\" style=\"color:inherit;\">$message</a>";
        
            } elseif ($type == 'image' && !empty($file)) {
                // 🖼️ Image file
                $file_path = $upload_path . rawurlencode($file);
                $items[] = "🖼️ <strong>$title$date_text:</strong> <a href=\"$file_path\" target=\"_blank\" style=\"color:inherit;\">$message</a>";
        
            } else {
                // 📝 Plain text
                $items[] = "<strong>$title$date_text:</strong> $message";
            }
        }
        
        // Output all items in marquee
        echo implode(" &nbsp; | &nbsp; ", $items);
        ?>
        </marquee>
        </div>

</div>
</div>
</section>