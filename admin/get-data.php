<?php
require_once("dbconn.php");

$page_from = isset($_POST['page_from']) ? $_POST['page_from'] : '';

$i=1;
$body="";

if($page_from=='')
{

$header='
<tr>
<th class="text-center">SL.No</th>
<th class="text-center">Career Name</th>
<th class="text-center">Page List</th>
<th class="text-center">Total Count</th>
</tr>
';

$query="
SELECT career_name,
GROUP_CONCAT(CONCAT(page_from,'(',cnt,')') SEPARATOR ' + ') AS page_list,
SUM(cnt) AS total_count
FROM(
    SELECT career_name,page_from,COUNT(*) as cnt
    FROM career_save_details
    GROUP BY career_name,page_from
) as sub
GROUP BY career_name
ORDER BY total_count DESC
";

$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{

$body .= "
<tr>
<td class='text-center'>".$i++."</td>
<td class='text-center'>".htmlspecialchars($row['career_name'])."</td>
<td class='text-center'>".$row['page_list']."</td>
<td class='text-center'>".$row['total_count']."</td>
</tr>
";

}

}
else
{

$header='
<tr>
<th class="text-center">SL.No</th>
<th class="text-center">Career Name</th>
<th class="text-center">Total Count</th>
</tr>
';

$query="
SELECT career_name,COUNT(*) as total_count
FROM career_save_details
WHERE page_from='$page_from'
GROUP BY career_name
ORDER BY total_count DESC
";

$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{

$body .= "
<tr>
<td class='text-center'>".$i++."</td>
<td class='text-center'>".htmlspecialchars($row['career_name'])."</td>
<td class='text-center'>".$row['total_count']."</td>
</tr>
";

}

}

echo json_encode([
"header"=>$header,
"body"=>$body
]);