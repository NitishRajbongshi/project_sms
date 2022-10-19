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
if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  $data = $spreadsheet->getActiveSheet()->toArray();
  $password = '1234';
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  foreach($data as $row)
  {
   $insert_data = array(
    ':rollno'  => $row[0],
    ':student_email'  => $row[1],
    ':student_phone'  => $row[2],
    ':student_name'  => $row[3],
    ':password'  => $hash_password
   );

   $query = "
   INSERT INTO student_login 
   (rollno, student_email, student_phone, student_name, student_password) 
   VALUES (:rollno, :student_email, :student_phone, :student_name, :password)
   ";

   $statement = $connect->prepare($query);
   $statement->execute($insert_data);
  }
  $message = '<div class="alert alert-success">Data Imported Successfully</div>';

 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>