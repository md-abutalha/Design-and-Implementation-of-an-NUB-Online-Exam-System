<?php
    date_default_timezone_set("Asia/Dhaka");
    session_start();
    
    include("config.php");
    include("functions.php");
    
    if(!isset($_GET['page']) && !isset($_SESSION['user'])){
        header("location: home");
    }

    if(isset($_GET['page'])) $page = $_GET['page'];
    else $page="home";

    if(!isset($_SESSION['user']) && $page != "login" && $page != "signup" && $page!="home"){
        header("location: login");
    }
    if(isset($_SESSION['user']) && ($page == "login" || $page == "signup")){
        header("location: logout");
    }

    if(isset($_GET['page'])) {}
    else $page = $_SESSION['role']=='student'? 'student-courses' : 'instructor-courses' ;
    
    // else if(isset($_SESSION['user']) && ($page == "login" || $page ==  "signup")){
    //     header("location: student-browse-courses");
    // }

    if(isset($_SESSION['user'])){
        if(($page[0]!='s' && $_SESSION['role']=="teacher") || ($page[0]!='i' && $_SESSION['role']=="student")){

        }
        else{
            header('location: logout');
        }
    }
    

    include('./layouts/main.php');
?>