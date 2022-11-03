<?php
echo "<h3 class='py-3'>Student details</h3>";
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
                <td>' . $row["rollno"] . '</td>
                <td>' . $row["student_firstname"] . ' '. $row["student_lastname"] . '</td>
                <td>' . $row["student_email"] . '</td>
                <td>' . $row["student_phone"] . '</td>
                <td><button type="button" class="view_btn btn btn-outline-primary mx-1 mb-1"><i class="bi bi-eye-fill"></i></button><button type="button" class="edit_btn btn btn-outline-success mx-1 mb-1"><i class="bi bi-pen-fill"></i></button><button type="button" class="del_btn btn btn-outline-danger mx-1 mb-1"><i class="bi bi-trash3-fill"></i></button></td>
            </tr>
            ';
    }
}
?>