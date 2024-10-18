<?php
    if(isset($_GET['delete'])){
        $did = $_GET['delete'];
        $db->query("DELETE FROM `courses` WHERE id='$did'");
        echo "<script>window.location.href = 'instructor-courses'</script>";

    }
    if(!isset($_GET['id'])){
    echo "<script>window.location.href = 'instructor-courses'</script>";
    }
    $id = $_GET['id'];
    $res = $db->query("select * from courses where id='$id'");
    $row = $res->fetch_assoc();

    if(isset($_POST['annsub'])){
        $ann = $_POST['ann'];
        // var_dump($_FILES);
        if($_FILES['annfile']['name']!= ""){
            $uploaddir = 'uploads/';
            $ext = explode(".", strtolower($_FILES['annfile']['name']))[1];
            $filename = "announcement-".rand(1000,9999)."-".rand(1000,9999).".".$ext;
            $uploadfile = $uploaddir . $filename;
    
            if (move_uploaded_file($_FILES['annfile']['tmp_name'], $uploadfile)) {
                $db->query("INSERT INTO `announcements`(`course_id`, `ann`,`file`) VALUES ('$id','$ann','$filename')");
            } else {
                echo "Possible file upload attack!\n";
            }
        }
        else $db->query("INSERT INTO `announcements`(`course_id`, `ann`) VALUES ('$id','$ann')");
    }
    
?>
<div class="container page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/ProLearner">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Courses</a></li>
                            <li class="breadcrumb-item active">Edit course</li>
                        </ol>
                        <div class="media align-items-center mb-headings">
                            <div class="media-body">
                                <h1 class="h2">Edit Course</h1>
                            </div>
                            <div class="media-right">
                                <a href="instructor-course-edit?delete=<?php echo $id; ?>"
                                   class="btn btn-danger">DELETE</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Basic Information</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="title">Title</label>
                                            <input type="text"
                                                   id="title"
                                                   class="form-control"
                                                   placeholder="Write a title"
                                                   disabled
                                                   value="<?php echo $row['title'];?>"
                                                   >
                                        </div>

                                        <div class="form-group mb-0">
                                            <label class="form-label">Description</label>
                                            <div style="height: 150px;">
                                                 <?php echo $row['description'];?>
                                                </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Exam</h4>
                                    </div>
                                    <div class="card-body">
                                        <p><a href="instructor-quiz-add?course_id=<?php echo $_GET['id'];?>"
                                               class="btn btn-primary">Add Exam <i class="material-icons">add</i></a></p>
                                        <div class="nestable"
                                             id="nestable-handles-primary">
                                            <ul class="nestable-list">
                                                <?php
                                                $exam_res = $db->query("select * from exams where course_id='$id'");
                                                while($exam_row = $exam_res->fetch_assoc()){
                                                ?>
                                                <li class="nestable-item nestable-item-handle"
                                                    data-id="2">
                                                    <!-- <div class="nestable-handle"><i class="material-icons">menu</i></div> -->
                                                    <div class="nestable-content">
                                                        <div class="media align-items-center">
                                                            <div class="media-left">
                                                                <img src="assets/images/vuejs.png"
                                                                     alt=""
                                                                     width="100"
                                                                     class="rounded">
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="card-title h6 mb-0">
                                                                    <a href="instructor-quiz-edit?quiz_id=<?php echo $exam_row['id'];?>"><?php echo $exam_row['title'];?></a>
                                                                </h5>
                                                                <small class="text-muted"><?php echo $exam_row['start_time'];?></small>
                                                            </div>
                                                            <div class="media-right">
                                                                <a href="instructor-quiz-edit?quiz_id=<?php echo $exam_row['id'];?>"
                                                                   class="btn btn-white btn-sm"><i class="material-icons">edit</i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php } ?>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="">
                                        <img src="<?php echo "uploads/".$row['img'];?>"  alt="" class="ratio ratio-16x6 img-fluid">
                                    </div>
                                    <div class="card-body">
                                        <label for="url">URL</label>
                                        <input type="text" id="url"
                                               class="form-control" data-toggle="tooltip" title="Copy"
                                               value="http://localhost/Prolearner/student-course?id=<?php echo $row['id']; ?>" readonly/>
                                        <label for="url">Key</label>
                                        <input type="text" id="ekey"
                                               class="form-control" data-toggle="tooltip" title="Copy"
                                               value="<?php echo $row['key']; ?>" readonly/>
                                               
                                    </div>

                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Announcement</h4>
                                    </div>

                                    <form class="card-body"
                                          method="post" enctype="multipart/form-data">
                                        <textarea name="ann" id="" class="form-control mb-3" placeholder="write here"></textarea>
                                        <label for="annfile">File(if any)</label>
                                        <input type="file" name="annfile" id="annfile" class="form-control mb-3">
                                        
                                        <input type="submit" name="annsub" value="Add Announcement" class="btn btn-success">
                                    </form>
                                    <div class="card-footer">
                                    <?php
                                        $ann_res = $db->query("SELECT * FROM `announcements` WHERE course_id='$id' ORDER BY `id` DESC LIMIT 5");
                                        while($row = $ann_res->fetch_assoc()){
                                    ?>
                                    <div class="card border-left-3 border-left-danger">
                                        <div class="card-body">
                                            <?php echo $row['ann'];?>
                                        </div>
                                        <?php if($row['file']!='na'){?><div class="card-footer">
                                            <?php echo $row['file'];?>
                                        </div><?php } ?>
                                    </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade"
                         id="editLesson">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                // Edit Lesson
                            </div>
                        </div>
                    </div>