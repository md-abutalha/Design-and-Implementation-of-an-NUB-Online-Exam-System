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

        echo '<pre>';
        if (move_uploaded_file($_FILES['thumb']['tmp_name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
            $db->query("INSERT INTO `courses`(`title`, `description`, `owner`, `img`) VALUES ('$title','$desc','$owner','$filename')");
        } else {
            echo "Possible file upload attack!\n";
        }
        print "</pre>";
    }
?>