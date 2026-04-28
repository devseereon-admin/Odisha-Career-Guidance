<style>
    .footer-a{
        color: #003052;
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
		    <!--<div class="col-md-3 col-5"><p>In collaboration with UNICEF</p></div>-->
		<div class="notification-bar col-md-2 col-2"><p>Notification Bar:</p></div>
		<!--<div class="col-md-9 col-9"><marquee >CA Final Result 2024 live updates: CA Final  2024 result has been declared by the ICAI on 11th July 2024.For further  details visit the link-<a href="https://www.icai.org/post/exam-result-cafinal-inter-may24" class="footer-a">https://www.icai.org/post/exam-result-cafinal-inter-may24</a></marquee></div>-->
		<!--<div class="col-md-9 col-9"><marquee >The main examinations for Class 10 will start on February 19, 2026, and for Class 12, they will start on February 17, 2026.</marquee></div>-->
				
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

