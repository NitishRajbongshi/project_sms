<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Download</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style/bg_color.css">
</head>

<body>
    <?php
    include "partials/_dbconnect.php";
    ?>
    <div class="container shadow-sm mt-4 bg-light">
        <span><a href="index.php">Home</a> > Download</span>
        <h3 class="text-primary py-4">Download Files</h3>
        <?php
        $sql = "
        SELECT * FROM `records` WHERE `flag` = '1'
        ";
        $result = mysqli_query($conn, $sql);
        $no_of_rows = mysqli_num_rows($result);
        if($no_of_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="py-4">
                <ul>
                    <li>
                        <div class="first_part_att d-flex justify-content-between flex-wrap">
                            <div class="dateAndTime">
                                <span><i class="fa-solid fa-clock me-2"></i><?php echo $row['date_time']; ?></span>
                            </div>
                        </div>
                        <div class="second_part_att">
                            <span><i class="fa-solid fa-paperclip me-2"></i><?php echo $row['title']; ?></span> <span><a href="download_file.php?file=<?php echo $row['pdf'] ?>">Download</a></span>
                        </div>
                    </li>
                </ul>
            </div>
            <?php
            }
        }
        else {
            echo '
            <div class="container">
                <p>There is no any downloadable file available at this time.</p>
            </div>
            ';
        }
        ?>

        <!-- footer start here -->
    <footer class="py-3 border-top border-secondary">
        <p>Tezpur University, Napaam, Sonitpur, Assam-784 028, INDIA</p>
        <p>© Copyright 2022. All rights reserved.</p>
    </footer>
    <!-- footer end here -->
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>