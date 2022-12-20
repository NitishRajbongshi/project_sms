<?php
    if(isset($_POST['do_remarks'])) {
        $remarks = $_POST['student_remarks'];
        $sqlll = "
        UPDATE `individual_meeting` SET `mentor_remarks`='$remarks'
        ";
        $resultt = mysqli_query($conn, $sqlll);
        if($resultt) {
            echo "
            <div class='container'>
            <p class='my-2 text-info'>Comment has submited.</p>
            </div>
            ";
        }
        else {
            echo "
            <div class='container'>
            <p class='my-2 text-info'>Failed to upload comment. Try again</p>
            </div>
            ";
        }
    }
?>

<div class="container shadow-sm aa  p-2 notice_container bg-light">
    <div class="markasread_part d-flex justify-content-end">
        <a id="<?php echo $rows['individual_meeting_code']; ?>" class="update" href="#" data-role="update" data-id="<?php echo $rows['individual_meeting_code'] ?>"><span class="text-light bg-danger px-1">Delete</span></a>
    </div>
    <div class="notice_title">
        <h3 class="border border-1 border-secondary border-start-0 border-top-0 border-end-0">
            <?php
            echo $r['title'];
            ?>
        </h3>
    </div>
    <div class="notice_time_date">
        <p><span class=""><i class="fa-solid fa-clock me-2"></i><?php echo $r['date_time']; ?></span></p>
    </div>
    <div class="title_desc">
        <p>
            <?php
            echo $r['description'];
            ?>
        </p>
    </div>
    <div class="read_remark border border-2 border-success border-top-0 border-bottom-0 border-end-0 px-2">    
        <p>
        <?php
        if($r['student_remarks'] != '0') {
            echo $r['rollno']. ' : ';
            echo $r['student_remarks'];
        }
        ?>
        </p>
    </div>
    <div class="read_remark border border-2 border-success border-top-0 border-bottom-0 border-end-0 px-2">    
        <p>
        <?php
        if($r['mentor_remarks'] != '0') {
            echo "You : ";
            echo $r['mentor_remarks'];
        }
        ?>
        </p>
    </div>
    <form action="#" method="POST">
        <div class="notice_remarks">
            <div class="form-floating ">
                <textarea name="student_remarks" class="rounded-0 form-control bg-transparent " placeholder="Leave a comment here" id="student_remarks" required></textarea>
                <label for="student_remarks">Write your remarks here</label>
            </div>
        </div>
        <div class="remark_btn">
            <button class="btn btn-sm rounded-0 btn-outline-success my-2 px-4 py-2" name="do_remarks"><span class=""><i class="fa-solid fa-paper-plane me-2"></i>Send</span></button>
        </div>
    </form>
</div>