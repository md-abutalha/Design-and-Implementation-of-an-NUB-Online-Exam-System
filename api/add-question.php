<?php
    include("config.php");
    if(isset($_POST['submit'])){
        $exam_id = $_POST['exam_id'];
        $title = $_POST['qtitle'];
        $type = $_POST['type'];
        $mark = $_POST['mark'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $d = $_POST['d'];
        $ans = $_POST['ans'];

        if($type == "text")
            $res = $db->query("INSERT INTO `questions`(`exam_id`, `title`, `type`, `mark`) VALUES ('$exam_id','$title','$type','$mark')");
        else
            $res = $db->query("INSERT INTO `questions`(`exam_id`, `title`, `type`, `mark`, `a`, `b`, `c`, `d`, `ans`) VALUES ('$exam_id','$title','$type','$mark','$a','$b','$c','$d','$ans')");

        if($res){
            header("location: ../instructor-quiz-edit?quiz_id=$exam_id ");
        }
    }

?>

test