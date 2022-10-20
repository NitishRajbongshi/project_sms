<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S.M.S</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500&display=swap" rel="stylesheet">

    <!-- link for google icon -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- link for bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- external css -->
    <link rel="stylesheet" href="style/stylesheet.css">
</head>

<body>
    <!-- navbar -->
    <?php
        include "home_nav/_navbar.php";
    ?>
    <!-- end of navbar -->

    <!-- main section start -->
    <div class="main_title">
        <div class="coll-1">
            <img class="banner" src="photo/home_image.png" alt="home image" height="auto" width="100%">
        </div>
        <div class="coll-2">
            <div class="text-center my-5 py-4">
                <h1 class="fw-bold my-4">Student Mentoring System</h1>
                <div class="mx-auto">
                    <p class="lead px-3 my-4">A student Mentoring system (S.M.S.) is a web-based application to mentor
                        each student of an institude through a faculty member. S.M.S. provides a facility for a mentor
                        and a student to communicate with each other in an efficient manner through the internet.</p>
                    <!-- <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <button type="button" class="btn btn-primary btn-sm px-4 py-2 gap-3">About</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm py-2 px-4">Download</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- main section end -->

    <!-- footer start here -->
    <footer>
        <p>© Copyright 2022. All rights reserved.</p>
    </footer>
    <!-- footer end here -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>