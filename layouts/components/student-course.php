
<?php
    if(!isset($_GET['id'])) echo "<script>window.location.href='student-courses'</script>";
    $course_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $res = $db->query("select * from courses where id='$course_id'");
    $row= $res->fetch_assoc();
    
    if(isset($_POST['submit']))
    if($_POST['submit']=='enroll'){
        $en_key = $_POST['en_key'];
        $ins = $db->query("INSERT INTO `enrollments`(`user_id`, `course_id`) VALUES ('$user_id','$course_id')");
        // if($ins) echo "<script>window.location.href='student-course?id=$course_id';";
    }

    $res = $db->query("select * from enrollments where user_id='$user_id' and course_id=$course_id");
    $count = mysqli_num_rows($res);

    

?>
                    <div class="container page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/ProLearner">Home</a></li>
                            <li class="breadcrumb-item"><a>Courses</a></li>
                            <li class="breadcrumb-item active">The MVC architectural pattern</li>
                        </ol>
                        <h1 class="h2"><?php echo $row['title'];  ?></h1>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="w-100">
                                        <!-- <iframe class="embed-responsive-item"
                                                src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0"
                                                allowfullscreen=""></iframe> -->
                                        <img src="uploads/<?php echo $row['img']; ?>" alt="" class="w-100">
                                    </div>
                                    <div class="card-body">
                                    <?php echo $row['description']; ?>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Announcement</h4>
                                        <?php
                                            $ann_res = $db->query("SELECT * FROM `announcements` WHERE course_id='$course_id' ORDER BY `id` DESC LIMIT 2");
                                            while($ann_row = $ann_res->fetch_assoc()){
                                        ?>
                                        <div class="card border-left-3 border-left-danger">
                                            <div class="card-body">
                                                <p><?php echo $ann_row['ann'];?></p>
                                                <?php if($ann_row['file']!='na'){?><p>File: <a href="uploads/<?php echo $ann_row['file'];?>"><?php echo $ann_row['file'];?></a></p><?php } ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                
                                </div>

                                <!-- Lessons -->
                                <ul class="card list-group list-group-fit <?php echo $count?'':'pen'; ?>" id="exam_list">
                                    <?php
                                        $e_res = $db->query("select * from exams where course_id='$course_id'");
                                        while($exam = $e_res->fetch_assoc()){
                                    ?>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="text-muted">1.</div>
                                            </div>
                                            <div class="media-body">
                                                <a href="student-quiz-attempt?id=<?php echo $exam['id'];?>"><?php echo $exam['title'];?></a>
                                            </div>
                                            <div class="media-right">
                                                <small class="text-muted-light"><?php echo date('F d,Y h:iA',$exam['start_time']);?></small>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    <!-- <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="text-muted">6.</div>
                                            </div>
                                            <div class="media-body">
                                                <div class="text-muted-light">Take Quiz</div>
                                            </div>
                                            <div class="media-right">
                                                <small class="badge badge-primary ">PRO</small>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <div class="card <?php echo $count?'d-none':''; ?>" id="enroll_form">
                                    <div class="card-body text-center">
                                        <p class="text-danger">
                                            You are not Enrolled.
                                        </p>
                                        <p>Please Enter Enrollment key:</p>
                                        <form action="student-course?id=<?php echo $course_id;?>" method="POST">
                                            <p><input type="text" name="en_key"></p>
                                            <p><input class="btn btn-success" type="submit" name="submit" value="enroll"></p>
                                        </form>
                                        
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <?php
                                            $owner = $row['owner'];
                                            $ins_res = $db->query("select * from users where email='$owner'");
                                            $ins = $ins_res->fetch_assoc();
                                            ?>
                                            <div class="media-left">
                                                <img src="uploads/<?php echo $ins['img'];?>"
                                                     alt="About Adrian"
                                                     width="50"
                                                     class="rounded-circle">
                                            </div>
                                            
                                            <div class="media-body">
                                                <h4 class="card-title"><a href="#"><?php echo $ins['name'];?></a></h4>
                                                <p class="card-subtitle">Instructor</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p><?php echo $ins['bio'];?></p>
                                        <!-- <a href=""
                                           class="btn btn-light"><i class="fab fa-facebook"></i></a>
                                        <a href=""
                                           class="btn btn-light"><i class="fab fa-twitter"></i></a>
                                        <a href=""
                                           class="btn btn-light"><i class="fab fa-github"></i></a> -->
                                    </div>
                                </div>


                                
                                
                                <!-- <div class="card">
                                    <ul class="list-group list-group-fit">
                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <i class="material-icons text-muted-light">assessment</i>
                                                </div>
                                                <div class="media-body">
                                                    Beginner
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <i class="material-icons text-muted-light">schedule</i>
                                                </div>
                                                <div class="media-body">
                                                    2 <small class="text-muted">hrs</small> &nbsp; 26 <small class="text-muted">min</small>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div> -->
                                <!-- <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Ratings</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="rating">
                                            <i class="material-icons">star</i>
                                            <i class="material-icons">star</i>
                                            <i class="material-icons">star</i>
                                            <i class="material-icons">star</i>
                                            <i class="material-icons">star_border</i>
                                        </div>
                                        <small class="text-muted">20 ratings</small>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    