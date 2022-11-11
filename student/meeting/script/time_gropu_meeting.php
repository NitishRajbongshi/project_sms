<?php
$code = $rows['meeting_code'];
$query = "
SELECT TIME_FORMAT(`date_time`, '%H:%i:%s') TIMEONLY FROM `group_meeting` WHERE `meeting_code` = '$code';
";
$status = mysqli_query($conn, $query);
if($status) {
    while($r = mysqli_fetch_assoc($status)) {
        echo $r['TIMEONLY'];
        break;
    }
}

?>