<?php
    include('config.php');

    if(isset($_GET['id'])){
        $user_id = $_SESSION['user_id'];
        $quiz_id = $_GET['id'];

        $quiz_res = $db->query("select * from exams where id='$quiz_id'");
        $quiz = $quiz_res->fetch_assoc();

        $end_time = $quiz['start_time']+($quiz['duration']+5)*60;
        $now = time();

        if($_FILES['xaf']['name']!=""){
            $uploaddir = '../uploads/';
            $ext = explode(".", strtolower($_FILES['xaf']['name']))[1];
            $filename = "answer-".rand(1000,9999)."-".rand(1000,9999).".".$ext;
            $uploadfile = $uploaddir . $filename;
    
            if (move_uploaded_file($_FILES['xaf']['tmp_name'], $uploadfile)) {
                $db->query("UPDATE `attempts` SET `status`='submitted', `file`='$filename' WHERE user_id='$user_id' and quiz_id='$quiz_id' ");
            } else {
                echo "Possible file upload attack!\n";
            }
        }
        else{ 
            $db->query("UPDATE `attempts` SET `status`='submitted' WHERE user_id='$user_id' and quiz_id='$quiz_id' ");

        }


        if($now<=$end_time){
            foreach ($_POST as $x => $y) {
                $q_res = $db->query("select * from questions where id='$x'");
                $q = $q_res->fetch_assoc();

                $type = $q['type'];
                $title = $q['title'];
                
                if($type == 'mcq'){
                    $mark = 0;
                    $status = 'wrong';
                    if($q['ans']== $y){
                        $mark=$q['mark'];
                        $status = 'right';
                    }
                    $db->query("INSERT INTO `results`(`user_id`, `quiz_id`, `question_id`, `question_type`, `question_title`, `answer`, `status`, `mark`) VALUES ('$user_id','$quiz_id','$x','$type','$title','$y','$status','$mark')");
                }
                else{
                    $db->query("INSERT INTO `results`(`user_id`, `quiz_id`, `question_id`, `question_type`, `question_title`, `answer`) VALUES ('$user_id','$quiz_id','$x','$type','$title','$y')");
                }
            }
            echo "<script>window.location.href='../student-quiz-results?id=$quiz_id';</script>";
        }
        else{
            echo "<script>alert('submition time has ended.');window.location.href='student-courses';</script>";
        }


    }
?>