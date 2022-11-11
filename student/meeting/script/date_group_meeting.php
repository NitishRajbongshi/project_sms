<?php
$code = $rows['meeting_code'];
$query = "
SELECT DATE_FORMAT(`date_time`, '%d-%m-%Y') DATEONLY FROM `group_meeting` WHERE `meeting_code` = '$code';
";
$status = mysqli_query($conn, $query);
if($status) {
    while($r = mysqli_fetch_assoc($status)) {
        echo $r['DATEONLY'];
        break;
    }
}

?>