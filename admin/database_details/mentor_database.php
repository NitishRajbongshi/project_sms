<?php
echo "<h3 class='py-3'>Mentor details</h3>";
// fetch data from the database
$sql = 'SELECT * FROM `mentor_login`';
$result = mysqli_query($conn, $sql);
$no_of_rows = mysqli_num_rows($result);
$sno = 0;
if ($no_of_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sno = $sno + 1;
        echo '
            <tr>
                <th scope="row">' . $sno . '</th>
                <td>' . $row["mentor_id"] . '</td>
                <td>' . $row["mentor_name"] . '</td>
                <td>' . $row["mentor_email"] . '</td>
                <td>' . $row["mentor_phone"] . '</td>
                <td><button type="button" class="view_btn btn btn-success mx-1 btn-sm px-3 my-2"><i class="bi bi-eye-fill"></i></button><button type="button" class="edit_btn btn btn-primary mx-1 btn-sm px-3 my-2"><i class="bi bi-pen-fill"></i></button><button type="button" class="del_btn btn btn-danger btn-sm px-2 mx-1"><i class="bi bi-trash3-fill"></i></button></td>
            </tr>
        ';
    }
}
?>