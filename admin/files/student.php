<?php
session_start();
if (($_SESSION['loggedin'] == false) || ($_SESSION['adminLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['adminLogin'])) {
    session_unset();
    session_destroy();
    header('location: ../admin_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
   <head>
     <title>Add student</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <style>
      @media screen and (max-width: 800px) {
        td#select_file, td#select_buttn {
          width: 100%;
        }
      }
     </style>
   </head>
   <body>
     <div class="container">
       <br />
       <h3 align="center">Import student data from a sheet</h3>
       <br />
       <span class="back_to_home" style="padding-left: 10px;"><a href="../admin_profile.php">Home</a> >> <span>add students</span></span>
        <div class="panel panel-default">
          <div class="panel-heading">Please select a Excel or CSV File to insert data to the database</div>
          <div class="panel-body">
          <div class="table-responsive">
           <span id="message"></span>
              <form method="post" id="import_excel_form" enctype="multipart/form-data">
                <table class="table">
                  <tr>
                    <td id="select_file" width="50%"><input type="file" name="import_excel" /></td>
                    <td id="select_buttn" width="25%"><input type="submit" name="import" id="import" class="btn btn-primary" value="Import" /></td>
                  </tr>
                </table>
              </form>
           <br/>    
          </div>
          </div>
        </div>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>
<script>
$(document).ready(function(){
  $('#import_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"import_student.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Import');
      }
    })
  });
});
</script>