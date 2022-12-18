<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S.M.S</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- link for google icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="photo/sliding3.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="photo/sliding2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="photo/sliding4.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <h1 class="fw-bold my-4 text-center">Student Mentoring System</h1>
        <p style="text-align: justify; text-justify: inter-word;">
            A Student Mentoring System is a web-based application to mentor
            each student of an institude through a faculty member. Student Mentoring System provides a facility for a mentor and a student to communicate with each other in an efficient manner through the internet.
        </p>
    </div>
    <div class="container">
    <div class="main_title">
        <div class="coll-1">
            <img class="banner" src="photo/tezpur_logo.png" alt="home image" height="auto" width="180px">
        </div>
        <div class="coll-2">
            <div class="text-center py-2">
                <h1 class="fw-bold my-4">About TU</h1>
                <div class="">
                    <p style="text-align: justify; text-justify: inter-word;">Tezpur University was established by an Act of Parliament in 1994. The objects of this Central University as envisaged in the statutes are that it shall strive to offer employment oriented and interdisciplinary courses to meet the local and regional aspirations and the development needs of the state of Assam and also offer courses and promote research in areas which are of special and direct relevance to the region and in emerging areas in Science and Technology...</p>
                    <a href="http://www.tezu.ernet.in/" class="text-decoration-none">
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <button type="button" class="btn btn-outline-secondary btn-sm py-2 px-4">TU Official Link</button>
                        </div>
                    </a>
                </div>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>