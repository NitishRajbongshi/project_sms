<div class="meeting_card container shadow-sm p-4 mb-2" style="background-image: linear-gradient(to bottom right, white, #fbfdff);">
        <div class="markasread_part d-flex justify-content-end">
            <span id="mark_read" style="color: blue;"><i class="fa-solid fa-check me-1"></i><strong>Mark as read</strong></span>
        </div>
        <div class="first_section d-flex justify-content-between py-1">
            <div class="meeting_id">
                <span class=""><i class="fa-solid fa-handshake"></i><strong> Meeting Id: <span class="text-primary fs-5">
                <?php
                        echo $rows['meeting_code'];
                ?>
                </span></strong></span>
            </div>
            <div class="meeting_timing">
                <span class=""><i class="fa-solid fa-clock fa-beat"></i><strong> 12.45</strong></span>
            </div>
        </div>

        <div class="second_section py-4">
            <div class="heading_part">
                <h3>
                    <?php
                        echo $rows['title'];
                    ?>
                </h3>
            </div>
            <div class="subheading_part">
                <h6>
                    <?php
                        echo $rows['description'];
                    ?>
                </h6>
            </div>
        </div>

        <div class="third_section py-2">
            <div class="organizer">
                <span class=""><i class="fa-solid fa-user"></i><strong> By: <span>
                    <?php
                    $mentorID = $rows['mentor_id'];
                    $sqll = "
                    SELECT mentor_firstname, mentor_lastname FROM `mentor` WHERE `mentor_id` = '$mentorID';
                    ";
                    $results = mysqli_query($conn, $sqll);
                    if($results) {
                        while($row = mysqli_fetch_assoc($results)) {
                            echo $row['mentor_firstname']. " " . $row['mentor_lastname'];
                        }
                    }
                    else {
                        echo 'mentor name';
                    }
                    ?>
                
                </span></strong></span>
            </div>
            <div class="date_part">
                <span class=""><i class="fa-solid fa-calendar-days"></i><strong><span> 30-02-2023</span></strong></span>
            </div>
        </div>

        <div class="remarks_box my-2">
            <h4>Remarks</h4>
            <form action="#" method="POST">
                <div class="remark_part">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="remarks_area"></textarea>
                        <label for="remarks_area">Write your remarks here</label>
                    </div>
                </div>
                <div class="btn_part">
                    <button class="btn btn-sm btn-outline-primary px-4 my-2"><i class="fa-solid fa-paper-plane me-2"></i>Send</button>
                </div>
            </form>
        </div>
    </div>