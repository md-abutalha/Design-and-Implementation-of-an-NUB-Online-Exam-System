<?php
if(isset($_GET['attempt'])){
    $user_id = $_SESSION['user_id'];
    $quiz_id = $_GET['id'];
    $attempt_res = $db->query("select * from attempts where user_id='$user_id' and quiz_id='$quiz_id'");
    $att_count = mysqli_num_rows($attempt_res);

    if($att_count > 0){

    }
    else{
        $key = generateRandomString();
        $att_ins = $db->query("INSERT INTO `attempts`(`user_id`, `quiz_id`, `att_key`) VALUES ('$user_id','$quiz_id','$key')");
        if($att_ins){
            setcookie($user_id.'_'.$quiz_id, $key, time() + (86400 * 30), "/");
            // echo "test123".$_COOKIE[$user_id.'_'.$quiz_id];
        }
    }
}
?>