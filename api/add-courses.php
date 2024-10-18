<?php
    include("config.php");
    // var_dump($_SESSION);
    // var_dump($_FILES['thumb']['name']);
    if($_FILES['thumb']['name']!= ""){
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $owner = $_SESSION['user'];
        $uploaddir = '../uploads/';
        $ext = explode(".", strtolower($_FILES['thumb']['name']))[1];
        $filename = "course-".rand(1000,9999)."-".rand(1000,9999).".".$ext;
        $uploadfile = $uploaddir . $filename;

        if (move_uploaded_file($_FILES['thumb']['tmp_name'], $uploadfile)) {
            echo '{"status":"success"}';
            $key = rand(10000,99999);
            $db->query("INSERT INTO `courses`(`title`, `description`, `owner`, `img`, `key`) VALUES ('$title','$desc','$owner','$filename', '$key')");
        } else {
            echo "Possible file upload attack!\n";
        }
    }
?>