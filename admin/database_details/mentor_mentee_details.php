<?php
echo "<h3 class='py-3'>Mentor Mentee List</h3>";
// fetch data from the database
$sql = 'SELECT * FROM `student`';
$result = mysqli_query($conn, $sql);
$no_of_rows = mysqli_num_rows($result);
$sno = 0;
if ($no_of_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sno = $sno + 1;
        echo '
            <tr>
                <th scope="row">' . $sno . '</th>
                <td>' . $row["student_firstname"] . ' '. $row["student_lastname"] . '</td>
                <td>' . $row["student_email"] . '</td>
                <td>' . $row["student_phone"] . '</td>
                <td>' . $row["assign_mentor"] . '</td>
            </tr>
            ';
    }
}
?>