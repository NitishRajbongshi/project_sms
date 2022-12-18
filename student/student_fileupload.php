<?php
session_start();
if (($_SESSION['loggedin'] == false) || ($_SESSION['studentLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['studentLogin'])) {
    session_unset();
    session_destroy();
    header('location: student_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Ubuntu:wght@300;500&display=swap" rel="stylesheet">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../style/profile_sidebar.css">
    <link rel="stylesheet" href="../style/bg_color.css">

    <title>file upload</title>
</head>

<body id="body-pd">
    <?php
    include "partials/_navbar.php";
    include "../partials/_dbconnect.php";

    // logout and redirect to index page
    if (isset($_POST['logout'])) {
        header("location: student_logout.php");
        exit;
    }


    if (isset($_POST['submit']) && isset($_FILES['pdf'])) {
        $pdf = $_FILES['pdf']['name'];
        $pdf_type = $_FILES['pdf']['type'];
        $pdf_size = $_FILES['pdf']['size'];
        $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
        $pdf_store = "pdf/" . $pdf;
        $error = $_FILES['pdf']['error'];

        if ($error === 0) {
            if ($pdf_size > 960000) { ?>
                <div class="container">
                    <p class="bg-info p-1 text-light">File size should not more than 2 MB.</p>
                </div>
            <?php
            }
            else {
                $pdf_ex = pathinfo($pdf, PATHINFO_EXTENSION);
			    $pdf_ex_lc = strtolower($pdf_ex);

                $allowed_exs = array("pdf");
                if (in_array($pdf_ex_lc, $allowed_exs)) {
                    $new_pdf_name = uniqid("pdf-", true).'.'.$pdf_ex_lc;
				    $pdf_upload_path = 'pdf/'.$new_pdf_name;
				    move_uploaded_file($pdf_tem_loc, $pdf_upload_path);

                    // insert into database
                    $sql = "INSERT INTO `records`(`rollno`, `meeting_id`, `pdf`) VALUES ('CSM21033','CSE01','$new_pdf_name')";
                    $result = mysqli_query($conn, $sql);
                    if($result) {?>
                    <div class="container">
                        <p class="bg-primary p-1 text-light">FIle uploaded successfully.</p>
                    </div>
                    <?php
                    }
                    else { ?>
                    <div class="container">
                        <p class="bg-info p-1 text-light">Some errors occur. Try again.</p>
                    </div>
                    <?php
                    }
                }
                else { ?>
                <div class="container">
                    <p class="bg-info p-1 text-light">Choose .pdf file only.</p>
                </div>
                <?php 
                }
            }
        }
        else {?>
            <div class="container">
                    <p class="bg-info p-1 text-light">Some errors occur. Try again.</p>
            </div>
        <?php 
        }
    }


    ?>
    <div class="container py-5">
        <h3 class="text-primary border-bottom border-primary">Upload File</h3>
        <ul class="text-info">
            <li>Only <span class="text-danger">.pdf</span> file is supported.</li>
            <li>File size should not more than 2 MB.</li>
            <li>Select only one file at a time.</li>
        </ul>
    </div>

    <div class="container">
        <form class="uploadFile" action="student_fileupload.php" method="post" enctype="multipart/form-data">
            <label for="">Choose Your PDF File</label><br>
            <input id="pdf" type="file" name="pdf" value="" required><br><br>
            <input id="upload" type="submit" name="submit" value="Upload">
        </form>
    </div>

    <!--===== MAIN JS =====-->
    <script src="../script/jquery.js"></script>
    <script src="../script/profile_sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // script for logout
            $("#logoutbtn").click(function() {
                window.location.replace("student_logout.php");
            });
        });
    </script>
</body>

</html>