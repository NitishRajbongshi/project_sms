<?php
// include "partials/check_session.php";
$mentor_id = $_SESSION['mentorId'];
$sql = "SELECT * FROM `student` WHERE `assign_mentor` = '$mentor_id'";
$result = mysqli_query($conn, $sql);
$no_of_rows = mysqli_num_rows($result);
$sno = 0;
if ($no_of_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sno = $sno + 1;
        echo '
            <tr>
                <th scope="row">' . $sno . '</th>
                <td>' . $row["rollno"] . '</td>
                <td>' . $row["student_firstname"] . ' ' . $row["student_lastname"] . '</td>
                <td>' . $row["student_email"] . '</td>
                <td>' . $row["student_phone"] . '</td>
                <td>' . $row["academic_year"] . '</td>
            </tr>
            ';
    }
}
?>