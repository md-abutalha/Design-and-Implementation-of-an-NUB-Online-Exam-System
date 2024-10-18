<?php
    if(isset($_GET['id'])){
        $quiz_id = $_GET['id'];
        $user_id = $_SESSION['user_id'];

        $quiz_res = $db->query("select * from exams where id='$quiz_id'");
        $quiz = $quiz_res->fetch_assoc();

        $r_mark = $db->query("select SUM(mark) from results where user_id='$user_id' and quiz_id='$quiz_id'");
        $mark = $r_mark->fetch_assoc();

        $m_res = $db->query("select SUM(mark) from questions where exam_id='$quiz_id'");
        $total = $m_res->fetch_assoc();

        $at_res = $db->query("select * from attempts where user_id='$user_id' and quiz_id='$quiz_id'");
        $at = $at_res->fetch_assoc();

    }
    else{
        echo "<scritp>window.location.href='student-courses';</script>";
    }
?>

<div class="container page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student-courses">Home</a></li>
                            <li class="breadcrumb-item active">Quiz Results</li>
                        </ol>
                        <div class="media mb-headings align-items-center">
                            <div class="media-left">
                                <img src="assets/images/vuejs.png"
                                     alt=""
                                     width="80"
                                     class="rounded">
                            </div>
                            <div class="media-body">
                                <h1 class="h2"><?php echo $quiz['title'];?></h1>
                                <p class="text-muted">on <?php echo date('F d, Y',$quiz['start_time']);?></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Result</h4>
                            </div>
                            <div class="card-body media align-items-center">
                                <div class="media-body">
                                    <h4 class="mb-0"><?php echo $mark['SUM(mark)']+$at['xmark'];?></h4>
                                    <span class="text-muted-light">/ <?php echo $total['SUM(mark)']+$quiz['xmark'];?></span>
                                </div>
                                <!-- <div class="media-right">
                                    <a href="fixed-student-take-quiz.html"
                                       class="btn btn-primary">Restart <i class="material-icons btn__icon--right">refresh</i></a>
                                </div> -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Questions</h4>
                            </div>
                            <ul class="list-group list-group-fit mb-0">
                                <?php
                                    $v = 1;
                                    $r_res = $db->query("select * from results where user_id='$user_id' and quiz_id='$quiz_id'");
                                    while($row=$r_res->fetch_assoc()){
                                ?>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="text-muted-light"><?php echo $v++; ?>.</div>
                                        </div>
                                        <div class="media-body"><?php echo $row['question_title'];?></div>
                                        <div class="media-right"><span class="badge badge-<?php echo status_mod($row['status']);?> "><?php echo $row['status'];?></span></div>
                                    </div>
                                </li>
                                <?php } ?>
                                
                            </ul>
                        </div>
                    </div>