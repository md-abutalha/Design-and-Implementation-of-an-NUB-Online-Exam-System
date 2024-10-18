<?php
    if(!isset($_GET['id'])) echo "<script>window.location.href='student-courses'</script>";
    $quiz_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $res = $db->query("select * from exams where id='$quiz_id'");
    $row= $res->fetch_assoc();

    $course_id = $row['course_id'];

    $c_res = $db->query("select * from courses where id='$course_id'");
    $course = $res->fetch_assoc();

    $count_res = $db->query("select * from enrollments where user_id='$user_id' and course_id='$course_id'");
    $count = mysqli_num_rows($res);
    // if($count>0)

    $q_res = $db->query("select * from questions where exam_id='$quiz_id'");
    $m_res = $db->query("select SUM(mark) from questions where exam_id='$quiz_id'");
    $mark = $m_res->fetch_assoc();

    $time = $row['start_time'];
    $now = time();
    $time_diff = $time-$now;

    $end_time = $row['start_time']+($row['duration']*60);
    $time_d = $end_time-$now;

    $attempt_res = $db->query("select * from attempts where user_id='$user_id' and quiz_id='$quiz_id'");
    $att_count = mysqli_num_rows($attempt_res);
    $att_status = "xx";
    if($att_count>0){
        $attempt = $attempt_res->fetch_assoc();
        $att_status = $attempt['status'];
    }

    if(isset($_GET['attempt'])){
        $attempt_res = $db->query("select * from attempts where user_id='$user_id' and quiz_id='$quiz_id'");
        $att_count = mysqli_num_rows($attempt_res);
        
        if($att_count > 0){
            $attempt = $attempt_res->fetch_assoc();
            if(isset($_SESSION[$user_id.'_'.$quiz_id])){
                if($_SESSION[$user_id.'_'.$quiz_id]==$attempt['att_key'] && $attempt['status']!='submitted'){
                    echo "<script>window.location.href='student-quiz?id=$quiz_id';</script>";
                }
                else{
                    echo "<script>alert('Can not Attempt second time.');window.location.href='student-courses';</script>";
                }
            }
            else{
                echo "<script>alert('Can not Attempt second time.');window.location.href='student-courses';</script>";
            }
        }
        else{
            $key = generateRandomString();
            $att_ins = $db->query("INSERT INTO `attempts`(`user_id`, `quiz_id`, `att_key`) VALUES ('$user_id','$quiz_id','$key')");
            if($att_ins){
                $_SESSION[$user_id.'_'.$quiz_id] = $key;
                echo "<script>window.location.href='student-quiz?id=$quiz_id';</script>";
            }
        }
    }


    
?>
                        <div class="container page__container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/ProLearner">Home</a></li>
                                <li class="breadcrumb-item active">Quiz</li>
                            </ol>
                            <h2><?php echo $row['title']; ?></h2>
                            <?php 
                                if($time_diff>0){
                            ?>
                            <div class="card-group">
                                <!-- <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="mb-0"><strong><?php //echo $count;?></strong></h4>
                                        <small class="text-muted-light">TOTAL</small>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="text-danger mb-0"><strong>0</strong></h4>
                                        <small class="text-muted-light">Left</small>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="sidebar-heading">Total Time</div>
                                        <p class="pl-1 pr-1"><span class="h5 text-primary"><?php //echo intval($time/60);?></span> : <span class="h5 text-primary"><?php //echo $time%60;?></span> : <span class="h5 text-primary">0</span></p>
                                        
                                    </div>
                                </div> -->
                                
                                <div class="card">
                                    
                                    <div class="card-body text-center">
                                        <div class="sidebar-heading">Time to Start</div>
                                        <div id="timer" class="countdown sidebar-p-x"
                                            data-value="<?php echo $time_diff/3600;?>"
                                            data-unit="hour">
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            <?php } ?>
                            <?php 
                                if($time_diff<1){
                            ?>
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="sidebar-heading">Total Mark </div>
                                    <div class="text-info text-bold"><strong><?php echo $mark['SUM(mark)']+$row['xmark'];?></strong></div>
                                    <div class="sidebar-heading">Duration</div>
                                    <div class="text-info text-bold"><strong><?php echo $row['duration'];?></strong></div>
                                    <div>Exam is open till <span class="text-danger"><?php echo date("h:ia",$time+($row['duration']*60));?></span></div>
                                    <?php
                                        if($time_d<=0 || $att_status =='submitted'){
                                            if($att_status!="submitted"){

                                            }
                                            else{
                                    ?>
                                    <div class="my-3"><a href="student-quiz-results?id=<?php echo $quiz_id?>" class="btn btn-info">Result</a></div>
                                    <?php }} 
                                        else{
                                    ?>
                                    <div class="my-3"><a href="student-quiz-attempt?id=<?php echo $quiz_id?>&attempt=1" class="btn btn-info">Attempt</a></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                            

                            
                        </div>
                        

                    

                    