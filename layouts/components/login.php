<?php
    
    if(isset($_POST['submit'])) 
    {

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $result = $db->query("SELECT * FROM `users` WHERE email='$email' and pass='$pass'");
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $_SESSION["user"] = $email;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            if($_SESSION['role']=='teacher')
            echo "<script>alert('successfully loggedin.');window.location.href = 'instructor-courses';</script>";
            else echo "<script>alert('successfully loggedin.');window.location.href = 'student-courses';</script>";
        }
    }
?>

                    <div class="container page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Log In</li>
                        </ol>
                        <div class="media align-items-center mb-headings">
                            <div class="media-body">
                                <h1 class="h2">Login</h1>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        <div class="row d-flex align-items-center justify-content-center">
                            
                            <div class="card col-lg-8">
                                <div class="card-header d-flex align-items-center">
                                    <div class="flex">
                                    <h4 class="card-title">Login</h4>
                                    <!-- <p class="card-subtitle">Subtitle</p> -->
                                    </div>
                                    <!-- <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-caret="false" data-toggle="dropdown">
                                        <i class="material-icons">more_horiz</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Action</a>
                                    </div>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-lg-12 d-flex align-items-center">
                                        <form class="flex" method="post" id="formid">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="exampleInputEmail1">Your email:</label>
                                                <input type="email"
                                                    name="email"
                                                    class="form-control"
                                                    id="exampleInputEmail1"
                                                    placeholder="Enter your email address .."
                                                    require>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="exampleInputPassword1">Your password:</label>
                                                <input type="password"
                                                    name="pass"
                                                    class="form-control"
                                                    id="exampleInputPassword1"
                                                    placeholder="Enter your password .."
                                                    require>
                                            </div>
                                            <div class="form-group g-recaptcha" data-sitekey="6LeMiBAqAAAAAM5QufmJnfLTs4yVhPtVJ8CyJhmz"></div>
                                            <input type="submit" name="submit" value="Login" class="btn btn-primary">
                                            <p class="mt-3">Don't have account <a href="signup">click here</a></p>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    