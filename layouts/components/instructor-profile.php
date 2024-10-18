<?php
    $user_id = $_SESSION['user_id'];
    $u_res = $db->query("select * from users where id='$user_id'");
    $user = $u_res->fetch_assoc();

    if(isset($_POST['submit'])){
        if($_FILES['pimg']['name']!= ""){
            $uploaddir = 'uploads/';
            $ext = explode(".", strtolower($_FILES['pimg']['name']))[1];
            $filename = "profile-".rand(1000,9999)."-".rand(1000,9999).".".$ext;
            $uploadfile = $uploaddir . $filename;
    
            if (move_uploaded_file($_FILES['pimg']['tmp_name'], $uploadfile)) {
                $db->query("UPDATE `users` SET `img`='$filename'");
            } else {
                echo "Possible file upload attack!\n";
            }
        }
    }
?>
<div class="bg-primary mdk-box js-mdk-box mb-0"
                         style="height: 192px;"
                         data-effects="parallax-background blend-background">
                        <div class="mdk-box__bg">
                            <div class="mdk-box__bg-front"
                                 style="background-image: url(uploads/aaa.jpg); background-position: bottom;"></div>
                        </div>
                    </div>
<div class="container page__container d-flex align-items-end position-relative mb-4">
                        <div class="avatar avatar-xxl position-absolute bottom-0 left-0 right-0">
                            <img src="uploads/<?php echo $user['img']; ?>"
                                 alt="avatar"
                                 
                                 class="avatar-img rounded-circle border-3 pimg">
                            <div id="pedit" class="pedit text-center avatar avatar-xxl position-absolute bottom-0 left-0 right-0 rounded-circle" >
                                
                                <div>
                                    <form action="#" method="post" enctype="multipart/form-data">
                                            <input type="file"
                                                name="pimg"
                                                class="form-control"
                                                placeholder="Upload new file"
                                                require>
                                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button> 
                                    </form>
                                </div>

                            </div>
                        </div>
                        <ul class="nav nav-tabs-links flex"
                            style="margin-left: 265px;">
                            <li class="nav-item">
                                <a href="#"
                                   class="nav-link active">Courses</a>
                            </li>
                           
                        </ul>
                    </div>
<div class="container page__container mb-3">
                        <div class="row flex-sm-nowrap">
                            <div class="col-sm-auto mb-3 mb-sm-0"
                                 style="width: 265px;">
                                <h1 id="abx" class="h2 mb-1 abx"><?php echo $user['name'];?></h1>
                                <p class="d-flex align-items-center mb-4">
                                    <a 
                                       class="btn btn-sm btn-success mr-2"></a>
                                </p>
                                <!-- <div class="text-muted d-flex align-items-center mb-2">
                                    <i class="material-icons mr-1">account_box</i>
                                    <div class="flex">Student since 2012</div>
                                </div>
                                <div class="text-muted d-flex align-items-center mb-4">
                                    <i class="material-icons mr-1">location_on</i>
                                    <div class="flex">Romania, Europe</div>
                                </div> -->

                                <h4>About me</h4>
                                <p class="text-black-70 measure-paragraph" contenteditable="true" id="biot"><?php echo $user['bio'];?></p>
                                

                                <!-- <h4>Connect</h4>
                                <p class="text-black-70 measure-paragraph">I’m currently working as a freelance marketing director and always interested in a challenge. Here’s how to reach out and connect.</p> -->
                            </div>
                            <div class="col-sm">
                                <?php
                                    $user_e = $_SESSION['user'];
                                    $sql = "select * from courses where owner='$user_e'";
                                    $c_res = $db->query($sql);
                                    while($row = $c_res->fetch_assoc()){
                                ?>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <a href="instructor-course-edit?id=<?php echo $row['id'];?>"
                                               class="mr-3">
                                                <img src="uploads/<?php echo $row['img'];?>"
                                                     width="100"
                                                     height="70"
                                                     alt=""
                                                     class="rounded">
                                            </a>
                                            <div class="flex">
                                                <h4 class="card-title mb-0"><a href="instructor-course-edit?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>