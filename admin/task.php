<?php
session_start();
if (($_SESSION['loggedin'] == false) || ($_SESSION['adminLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['adminLogin'])) {
    session_unset();
    session_destroy();
    header('location: admin_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../style/profile_sidebar.css">
    <link rel="stylesheet" href="../style/bg_color.css">
    <link rel="stylesheet" href="style/task_style.css">
    
    <title>Task</title>

    <style>
        span#details_btn:hover {
            cursor: pointer;
        }
    </style>
</head>

<body id="body-pd">
    <?php
    include 'partials/_navbar.php';
    include '../partials/_dbconnect.php';
    // logout and redirect to index page 
    if (isset($_POST['logout'])) {
        header("location: admin_logout.php");
        exit;
    }
    ?>

    <div class="container p-4 text-center text-primary fw-bold">
    <h3>
        ASSIGN MENTOR
    </h3>    
    
    </div>

    <!-- <div class="shadow-sm p-3 mb-5 bg-body rounded text-secondary">
        This is some text within a card body.
        <a href="#show_details_card" id="show_details">More details</a>
    </div> -->

    <?php
    if(isset($_POST['assign_mentor'])) {
        $selected_dept = $_POST["select_dept"];
        $selected_year = $_POST["academic_year"];
        $selected_spm = $_POST["student_per_mentor"];
        $no_of_assign_student = 0;
        $assign_success = false;
        
        // algorithm to select mentor randomly
        $sql = "
        SELECT * FROM `mentor` WHERE `mentor_department` = '$selected_dept'
        ";
        
        $result = mysqli_query($conn, $sql);
        $no_of_rows = mysqli_num_rows($result);
        $student_not_found = false;
        
        if($no_of_rows > 0) {
            while(($rows = mysqli_fetch_assoc($result)) && ($student_not_found == false)) {
                $mentor_id = $rows['mentor_id'];
                $i = 1;
                $check = '0';
                $sqll = "
                SELECT * FROM `student` WHERE `academic_year` = '$selected_year' AND `student_depertment` = '$selected_dept' AND `assign_mentor` = '$check'
                ";
                $results = mysqli_query($conn, $sqll);
                $nos_of_rows = mysqli_num_rows($results);
                if($nos_of_rows > 0) {
                    while($row = mysqli_fetch_assoc($results)) {
                        $roll_no = $row['rollno'];
                        
                        if($i <= $selected_spm) {
                            $update_sql = "UPDATE `student` SET `assign_mentor`='$mentor_id' WHERE `rollno` = '$roll_no'";
                            $update_result = mysqli_query($conn, $update_sql);
                            if($update_result) {
                                $no_of_assign_student = $no_of_assign_student + 1;
                                $assign_success = true;
                                // echo '
                                // <div class="shadow-sm p-3 mb-5 bg-body rounded text-secondary">
                                //     Success: mentor assign successful.
                                //     <a href="#show_details_card" class="show_details">More details</a>
                                // </div>
                                // ';
                                $i = $i + 1;
                            }
                            else {
                                echo '
                                <div class="shadow-sm p-3 mb-5 bg-body rounded text-secondary">
                                    Failed: Failed to assign mentor.
                                    <a href="#show_details_card" class="show_details">More details</a>
                                </div>
                                ';
                            }
                        }
                        else {
                            break;
                        }
                    }
                }               
                else {
                    $student_not_found = true;
                    if(!$assign_success) {
                        echo '
                        <div class="shadow-sm p-3 mb-5 bg-body rounded text-secondary">
                            Warning: No student found.
                        </div>
                        ';
                    }

                }
            }
        }
        else {
            echo '
            <div class="shadow-sm p-3 mb-5 bg-body rounded text-secondary">
                Warning: Mentor not available
            </div>
            ';
        }

        if($no_of_assign_student > 0) {
            echo '
            <div class="shadow-sm p-3 mb-5 bg-body rounded text-secondary">
                Success: mentor assign to total '.$no_of_assign_student .' students.
                <a href="#show_details_card" class="show_details">More details</a>
            </div>
            ';
            $no_of_assign_student = 0;
        }
    }
    ?>
    
    <div class="container p-4 my-2 shadow-sm mb-5 bg-white rounded">
        <form class="row g-3" action="task.php" method="post">
            <div class="col-12">
                <label for="inputState" class="form-label">Department</label>
                <select id="inputState" class="form-select" name="select_dept"  required>
                    <option value="" selected>Choose Department</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="Electrical Engineering">Electrical Engineering</option>
                    <option value="Computer Science & Engineering">Computer Science & Engineering</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Physics">Physics</option>
                    <option value="Assamese">Assamese</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="academic_year" class="form-label">Accademic Year</label>
                <input type="number" min="2021" max="2099" step="1" class="form-control" id="academic_year" name="academic_year" placeholder="2021" required>
            </div>
            <div class="col-md-6">
                <label for="student_per_mentor" class="form-label">No. of students / Mentor</label>
                <input type="text" class="form-control" id="student_per_mentor" name="student_per_mentor" placeholder="3" required>
            </div>
            
            <div class="col-12" >
                <button id="assign_btn" type="submit" class="btn btn-primary" name="assign_mentor">Assign mentor</button>
            </div>
        </form>
    </div>

    <div class="container p-4 my-4 shadow-sm p-3 mb-5 bg-white rounded" style="display: none;" id="show_details_card">
        <div class="card">
            <div class="card-header text-center">
              Status
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0 fs-6">
                <p>
                    Success: Mentor assign successful.
                    Department:  
                    <?php 
                    echo $selected_dept . ', '. $selected_year;
                    ?>batch 
                </p>
                <p>
                    For each mentor, Number of students assign:  
                    <?php
                        echo $selected_spm;
                    ?>
                </p>
                
                <footer class="blockquote-footer py-3">
                    See more details on database section 
                    <!-- <cite title="Source Title">Source Title</cite> -->
                </footer>
              </blockquote>
            </div>
          </div>
    </div>

    <!--===== MAIN JS =====-->
    <script src="../script/profile_sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="../script/jquery.js"></script>

    <!-- normal script -->
    <script>
        $(document).ready(function() {
            // script for logout
            $("#logoutbtn").click(function() {
                window.location.replace("admin_logout.php");
            })

            $('.show_details').click(function() {
                $("#show_details_card").fadeIn("slow");
            })
        })
    </script>
</body>

</html>