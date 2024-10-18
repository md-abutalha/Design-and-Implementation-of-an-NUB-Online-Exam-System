
<?php
    if(isset($_POST['signup'])) 
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $pass = $_POST['pass'];
        $bio = $_POST['bio'];
        $sid = $_POST['id'];
        
        $res = $db->query("select * from users where email='$email'");
        $row_count = $res->num_rows;
        if($row_count>0){
            echo "<script>alert('This Email Already exists.');window.location.href = 'login';</script>";
        }
        else{
            $result = $db->query("INSERT INTO `users`(`name`, `email`, `pass`, `role`, `id_no`) VALUES ('$name','$email','$pass','$role','$sid')");
            if($result)
            echo "<script>alert('successfully registered.');window.location.href = 'home';</script>";
        }
    }
?>
                    <div class="container page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="fixed-student-dashboard.html">Home</a></li>
                            <li class="breadcrumb-item active">Sign Up</li>
                        </ol>
                        <div class="media align-items-center mb-headings">
                            <div class="media-body">
                                <h1 class="h2">SignUp</h1>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        <div class="row d-flex align-items-center justify-content-center">
                            
                            <div class="card col-lg-8">
                                <div class="card-header d-flex align-items-center">
                                    <div class="flex">
                                    <h4 class="card-title">SignUp</h4>
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
                                        <form class="flex" method="post">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="exampleInputName1">Your name:</label>
                                                <input type="text"
                                                    name="name"
                                                    class="form-control"
                                                    id="exampleInputName1"
                                                    placeholder="Enter your Name .."
                                                    require>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="exampleInputEmail1">Your Email:</label>
                                                <input type="email"
                                                    name="email"
                                                    class="form-control"
                                                    id="exampleInputEmail1"
                                                    placeholder="Enter your email address .."
                                                    require>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="custom-select">Custom select</label>
                                                <select id="custom-select"
                                                        class="form-control custom-select"
                                                        name="role">
                                                    <option value="student" selected>Student</option>
                                                    <option value="teacher">Teacher</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="stid">
                                                <label class="form-label"
                                                    for="sid">Student ID:</label>
                                                <input type="text"
                                                    name="id"
                                                    class="form-control"
                                                    id="sid"
                                                    placeholder="Enter your ID ..">
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
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="about">Your Bio:</label>
                                                <textarea
                                                    name="bio"
                                                    class="form-control"
                                                    id="about"
                                                    placeholder="Write you bio"
                                                    require></textarea>
                                            </div>
                                            
                                            <div class="form-group g-recaptcha" data-sitekey="6LeMiBAqAAAAAM5QufmJnfLTs4yVhPtVJ8CyJhmz"></div>
                                            
                                            <button type="submit" name="signup" value="signup" class="btn btn-primary">SignUp</button>
                                            <p class="mt-3">Already have account <a href="login">click here</a></p>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    