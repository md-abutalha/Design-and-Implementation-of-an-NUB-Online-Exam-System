
<?php
    $id = $_SESSION['user_id'];
    if(isset($_POST['update'])) 
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $pass = $_POST['pass'];
        $bio = $_POST['bio'];
        
        $url = "instructor-profile";
        if($_SESSION['role']=='student') $url = $role."-profile";


        $res = $db->query("select * from users where email='$email'");
        $row_count = $res->num_rows;
        if($row_count>1){
            echo "<script>alert('This Email Already exists.');window.location.href = 'login';</script>";
        }
        else{
            $result = $db->query("UPDATE `users` SET `name`='$name',`email`='$email',`pass`='$pass',`role`='$role',`bio`='$bio' WHERE id='$id'");
            if($result)
            echo "<script>alert('successfully updated.');window.location.href = '$url';</script>";
        }
    }
?>
                    <div class="container page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/ProLearner">Home</a></li>
                            <li class="breadcrumb-item active">Sign Up</li>
                        </ol>
                        <div class="media align-items-center mb-headings">
                            <div class="media-body">
                                <h1 class="h2">Student SignUp</h1>
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
                                                    value="<?php echo $uu['name'];?>"
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
                                                    value="<?php echo $uu['email'];?>"
                                                    require>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="custom-select">Custom select</label>
                                                <select id="custom-select"
                                                        class="form-control custom-select"
                                                        name="role">
                                                    <option value="student" <?php if($_SESSION['role']=="student") echo "selected"; ?>>Student</option>
                                                    <option value="teacher" <?php if($_SESSION['role']=="teacher") echo "selected"; ?>>Teacher</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="exampleInputPassword1">Your password:</label>
                                                <input type="password"
                                                    name="pass"
                                                    class="form-control"
                                                    id="exampleInputPassword1"
                                                    placeholder="Enter your password .."
                                                    value="<?php echo $uu['pass'];?>"
                                                    require>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="about">Your Bio:</label>
                                                <textarea
                                                    rows="4"
                                                    name="bio"
                                                    class="form-control"
                                                    id="about"
                                                    placeholder="Write you bio"
                                                    require><?php echo $uu['bio'];?></textarea>
                                            </div>
                                            
                                            <div class="form-group g-recaptcha" data-sitekey="6LeMiBAqAAAAAM5QufmJnfLTs4yVhPtVJ8CyJhmz"></div>
                                            
                                            <button type="submit" name="update" value="update" class="btn btn-primary">UPDATE</button>
                                            
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    