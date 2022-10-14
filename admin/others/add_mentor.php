<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/add_student_mentor.css">
    <title>Document</title>
</head>
<body>
<div class="main_cont">
        <div class="main_section">
            <span class="back_to_home"><a href="../admin_profile.php">Home</a> >> <span>add new student</span></span>
            <div class="header_part">
                <h2 class="text-center">Add new mentor</h2>
            </div>
            <div class="text_part">
                <div class="form_container">
                    <form action="#">
                        <div class="row">
                            <div class="col-25">
                                <label for="name">Full name: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="name" name="name" placeholder="firstname + lastname"  required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="email">Email id: </label>
                            </div>
                            <div class="col-75">
                                <input type="email" id="email" name="email" placeholder="xxyyzz@gmail.com" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="phone">Phone: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="phone" name="phone" placeholder="0123456789" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="rollno">Roll No: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="rollno" name="rollno" placeholder="CSM21033" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="password">Password </label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="password" name="password" value="1234" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="submit_btnn">
                                <button type="submit" name="submit" class="submit_btn">Add mentor </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>