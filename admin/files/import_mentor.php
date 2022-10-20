<?php

// session check
session_start();
if (($_SESSION['loggedin'] == false) || ($_SESSION['adminLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['adminLogin'])) {
    session_unset();
    session_destroy();
    header('location: ../admin_login.php');
    exit;
}

include 'vendor/autoload.php';

// database connection
$connect = new PDO("mysql:host=localhost;dbname=project_sms", "root", "");

// import the file
if ($_FILES["import_excel"]["name"] != '') {
    $allowed_extension = array('xls', 'csv', 'xlsx');
    $file_array = explode(".", $_FILES["import_excel"]["name"]);
    $file_extension = end($file_array);

    if (in_array($file_extension, $allowed_extension)) {
        $file_name = time() . '.' . $file_extension;
        move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
        $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

        $spreadsheet = $reader->load($file_name);

        unlink($file_name);

        $data = $spreadsheet->getActiveSheet()->toArray();
        $password = '123456';
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $affected_row = 0;
        try {
            foreach ($data as $row) {
                $insert_data = array(
                    ':mentor_id'  => $row[0],
                    ':mentor_email'  => $row[1],
                    ':mentor_phone'  => $row[2],
                    ':mentor_fname'  => $row[3],
                    ':mentor_lname'  => $row[4],
                    ':mentor_department'  => $row[5],
                    ':password'  => $hash_password
                );

                $query = "
                INSERT INTO `mentor`(`mentor_id`, `mentor_email`, `mentor_phone`, `mentor_firstname`, `mentor_lastname`, `mentor_department`, `mentor_password`) VALUES (:mentor_id, :mentor_email, :mentor_phone, :mentor_fname, :mentor_lname, :mentor_department, :password)
                ";

                $statement = $connect->prepare($query);
                $statement->execute($insert_data);
                $affected_row += 1;
            }
            $message = '<div class="alert alert-success">Data Imported Successfully</div><br>' . $affected_row.' row inserted</div>';

        } catch (PDOException $e) {
            $message = '<div class="alert alert-danger">Error</div>' . $e->getMessage() . '<br>' .$affected_row.' row inserted</div>';
        }

    } else {
        $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
    }
} else {
    $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;
?>