<?php
    include("config.php");
    if(isset($_POST['submit'])){
        $question_id = $_POST['question_id'];
        $title = $_POST['qtitle'];
        $type = $_POST['type'];
        $mark = $_POST['mark'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $d = $_POST['d'];
        $ans = $_POST['ans'];

        $res = $db->query("UPDATE `questions` SET`title`='$title',`type`='$type',`mark`='$mark',`a`='$a',`b`='$b',`c`='$c',`d`='$d',`ans`='$ans' WHERE id='$question_id'");
        $qres = $db->query("select * from questions where id='$question_id'");
        $qq = $qres->fetch_assoc(); 
        $exam_id = $qq['exam_id'];
        if($res){
            header("location: ../instructor-quiz-edit?quiz_id=$exam_id ");
        }
    }

?>

test