<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $page;?></title>

        <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
        <meta name="robots"
              content="noindex">

        <!-- Custom Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500%7CRoboto:400,500&display=swap"
              rel="stylesheet">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="assets/vendor/perfect-scrollbar.css"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="assets/css/material-icons.css"
              rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link type="text/css"
              href="assets/css/fontawesome.css"
              rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css"
              href="assets/vendor/spinkit.css"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="assets/css/app.css"
              rel="stylesheet">

        <!-- Custom CSS -->
        <link type="text/css"
              href="assets/css/custom.css"
              rel="stylesheet">
        

        <!-- Vendor CSS -->
        <link rel="stylesheet"
              href="https://cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css">
        
        <?php extra_head_loader($page); ?>

    </head>

    <body class=" fixed-layout">

        <div class="preloader">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>

            <!-- <div class="sk-bounce">
    <div class="sk-bounce-dot"></div>
    <div class="sk-bounce-dot"></div>
  </div> -->

            <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
        </div>

        <!-- Header Layout -->
        <div class="mdk-header-layout js-mdk-header-layout">

            <!-- Header -->

            <div id="header"
                 class="mdk-header bg-dark js-mdk-header m-0"
                 data-fixed
                 data-effects="waterfall">
                <div class="mdk-header__content">

                    <!-- Navbar -->
                    <nav id="default-navbar"
                         class="navbar navbar-expand navbar-dark bg-primary m-0">
                        <div class="container">
                            <!-- Toggle sidebar -->
                            <!-- <button class="navbar-toggler d-block"
                                    data-toggle="sidebar"
                                    type="button">
                                <span class="material-icons">menu</span>
                            </button> -->

                            <!-- Brand -->
                            <a href="/ProLearner"
                               class="navbar-brand">
                                <img src="assets/images/logo/white.svg"
                                     class="mr-2"
                                     alt="LearnPlus" />
                                <span class="d-none d-xs-md-block">NUB Online Exam</span>
                            </a>

                            <!-- Search -->
                            <!-- <form class="search-form d-none d-md-flex">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Search">
                                <button class="btn"
                                        type="button"><i class="material-icons font-size-24pt">search</i></button>
                            </form> -->
                            <!-- // END Search -->

                            <div class="flex"></div>

                            <!-- Menu -->
                            <!-- <ul class="nav navbar-nav flex-nowrap d-none d-lg-flex">
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="fixed-student-forum.html">Forum</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="fixed-student-help-center.html">Get Help</a>
                                </li>
                            </ul> -->

                            <!-- Menu -->
                            <ul class="nav navbar-nav flex-nowrap">

                                <!-- <li class="nav-item d-none d-md-flex">
                                    <a href="fixed-student-cart.html"
                                       class="nav-link">
                                        <i class="material-icons">shopping_cart</i>
                                    </a>
                                </li> -->

                                <!-- Notifications dropdown -->
                                 <?php if(is_loggedin()){
                                    $pref = "instructor";
                                    $uu_id = $_SESSION['user_id'];
                                    $uu_res = $db->query("select * from users where id='$uu_id'");
                                    $uu=$uu_res->fetch_assoc();
                                    if($_SESSION['role']=='student') $pref = "student";    
                                ?>
                                
                                <!-- // END Notifications dropdown -->
                                <!-- User dropdown -->
                                <li class="nav-item dropdown ml-1 ml-md-3">
                                    <a class="nav-link dropdown-toggle"
                                       data-toggle="dropdown"
                                       href="#"
                                       role="button"><img src="uploads/<?php echo $uu['img'];?>"
                                             alt="Avatar"
                                             class="rounded-circle"
                                             width="40"></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item"
                                           href="<?php echo $pref;?>-profile-edit">
                                            <i class="material-icons">edit</i> Edit Account
                                        </a>
                                        <a class="dropdown-item"
                                           href="<?php echo $pref;?>-profile">
                                            <i class="material-icons">person</i> Public Profile
                                        </a>
                                        <a class="dropdown-item"
                                           href="logout">
                                            <i class="material-icons">lock</i> Logout
                                        </a>
                                    </div>
                                </li>
                                <?php }
                                else{ ?>
                                <li class="nav-item dropdown ml-1 ml-md-3">
                                    <a class="nav-link dropdown-toggle"
                                       data-toggle="dropdown"
                                       href="#"
                                       role="button"><i
                                             class="rounded-circle material-icons"
                                             width="40">person</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item"
                                           href="login">
                                            <i class="material-icons">person</i> LogIn
                                        </a>
                                        <a class="dropdown-item"
                                           href="signup">
                                            <i class="material-icons">edit</i> SignUp
                                        </a>
                                    </div>
                                </li>
                                <?php } ?>
                                <!-- // END User dropdown -->

                            </ul>
                            <!-- // END Menu -->
                        </div>
                    </nav>
                    <!-- // END Navbar -->

                </div>
            </div>

            <!-- // END Header -->

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content d-flex flex-column">

                
            <div class="page ">

                <?php include("layouts/components/$page.php");?>

                <div class="container page__container" style="position:fixed;bottom:0px;padding:0;">
                    <div class="" style="width:100vw;background:#2196F3;padding:0 50px;text-align:center;">
                        Copyright &copy; 2024  - <a href="#" style="color:white;">NUB Online Exam <br> Developed By Talha Mehedi Jobayer</a> 
                    </div>
                </div>
            </div>
                
            </div>
            <!-- // END Header Layout Content -->

        </div>
        <!-- // END Header Layout -->

        <?php include("./layouts/sidebar.php");?>

        <!-- App Settings FAB -->
        <!-- <div id="app-settings">
            <app-settings layout-active="fixed"
                          :layout-location="{
      'fixed': 'fixed-student-view-course.html',
      'default': 'student-view-course.html'
    }"
                          sidebar-variant="bg-transparent border-0"></app-settings>
        </div> -->

        <!-- Extra Script Loader -->

        

        <!-- jQuery -->
        <script src="assets/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/vendor/popper.min.js"></script>
        <script src="assets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="assets/vendor/perfect-scrollbar.min.js"></script>

        <!-- MDK -->
        <script src="assets/vendor/dom-factory.js"></script>
        <script src="assets/vendor/material-design-kit.js"></script>

        <!-- App JS -->
        <script src="assets/js/app.js"></script>

        <!-- Highlight.js -->
        <script src="assets/js/hljs.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="assets/js/app-settings.js"></script>

        <!-- Required by countdown -->
        <script src="assets/vendor/moment.min.js"></script>
        <!-- Easy Countdown -->
        <script src="assets/vendor/jquery.countdown.min.js"></script>

        <!-- Init -->
        <script src="assets/js/countdown.js"></script>

        <?php
            extra_scirpt_loader($page);
        ?>
        
    </body>

</html>