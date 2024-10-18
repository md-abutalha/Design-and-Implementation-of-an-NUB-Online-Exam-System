<?php
if(!isset($_GET['quiz_id'])) echo "<script>window.location.href='instructor-courses';</script>";
$id = $_GET['quiz_id'];

if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $course = $_POST['course'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $duration = $_POST['duration'];
        $time_frame = $_POST['time_frame'];
        
        $date_time = $time.' '.$date;
        $date_time = strtotime($date_time);
        $duration_in_min = $duration*$time_frame;

        $xmark = $_POST['xmark'];


        if($_FILES['qpdf']['name']!= ""){
            $uploaddir = 'uploads/';
            $ext = explode(".", strtolower($_FILES['qpdf']['name']))[1];
            $filename = "question-".rand(1000,9999)."-".rand(1000,9999).".".$ext;
            $uploadfile = $uploaddir . $filename;
    
            if (move_uploaded_file($_FILES['qpdf']['tmp_name'], $uploadfile)) {
                $ins = $db->query("UPDATE `exams` SET `title`='$title',`course_id`='$course',`start_time`='$date_time',`duration`='$duration_in_min', `file`='$filename', `xmark`='$xmark' WHERE id='$id'");
            } else {
                echo "Possible file upload attack!\n";
            }
        }
        else{ 
            $ins = $db->query("UPDATE `exams` SET `title`='$title',`course_id`='$course',`start_time`='$date_time',`duration`='$duration_in_min', `xmark`='$xmark' WHERE id='$id'");
        }

        if($ins){
        echo "<script>window.location.href='instructor-quiz-edit?quiz_id=$id';</script>";
        }
}


$res = $db->query("select * from exams where id='$id'");
$quiz = $res->fetch_assoc();

?>

<div class="container page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/ProLearner">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Quiz Manager</a></li>
                            <li class="breadcrumb-item active">Edit Quiz</li>
                        </ol>
                        <div class="media align-items-center mb-headings">
                            <div class="media-body">
                                <h1 class="h2"><?php echo $quiz['title'];?></h1>
                            </div>
                            <div class="media-right">
                                <a href="instructor-attempt-list?quiz_id=<?php echo $id;?>"
                                   class="btn btn-danger">Examine</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="quiz_title"
                                               class="col-sm-3 col-form-label form-label">Quiz Title:</label>
                                        <div class="col-sm-9">
                                            <input id="quiz_title"
                                                   type="text"
                                                   name="title"
                                                   class="form-control"
                                                   placeholder="Title"
                                                   value="<?php echo $quiz['title']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="course_title"
                                               class="col-sm-3 col-form-label form-label">Course:</label>
                                        <div class="col-sm-9 col-md-4">
                                            <select id="course_title" name="course"
                                                    class="custom-select form-control">
                                                    <?php
                                                        $course_id = $quiz['course_id'];
                                                        $r1 = $db->query("select * from courses where id='$course_id'");
                                                        $r2 = $r1->fetch_assoc();
                                                    ?>
                                                    <option value="<?php echo $r2['id'];?>"><?php echo $r2['title'];?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quiz_title"
                                               class="col-sm-3 col-form-label form-label">Quiz Date:</label>
                                        <div class="col-sm-9">
                                        <input id="flatpickrSample01"
                                                   type="text"
                                                   name="date"
                                                   class="form-control"
                                                   placeholder="<?php echo date("F d, Y", $quiz['start_time']);?>"
                                                   data-toggle="flatpickr"
                                                   value="<?php echo date("F d, Y", $quiz['start_time']);?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quiz_title"
                                               class="col-sm-3 col-form-label form-label">Quiz Time:</label>
                                        <div class="col-sm-9">
                                        <input id="timePicker"
                                                   type="text"
                                                   name="time"
                                                   class="form-control"
                                                   placeholder="Flatpickr example"
                                                   value="<?php echo date("h:i A", $quiz['start_time']);?>">
                                        <div class="mx-3 my-1 row col-lg-6 position-absolute z-3" id="timeModal">
                                            <select id="h" class="form-control col time">
                                                <?php for($i=1;$i<=12;$i++){ ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                                
                                            </select>
                                            <select id="m" class="form-control col time">
                                                <?php for($i=0;$i<=60;$i+=5){ ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                            <select id="p" class="form-control col time">
                                                <option value="am">AM</option>
                                                <option value="pm">PM</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    
                                    
                                    

                                    
                                    <div class="form-group row">
                                        <label for="cmn-toggle"
                                               class="col-sm-3 col-form-label form-label">Timeframe</label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <!-- <div class="custom-control custom-checkbox-toggle">
                                                    <input id="cmn-toggle"
                                                           type="checkbox"
                                                           aria-checked="false"
                                                           class="custom-control-input"
                                                           role="switch">
                                                    <label class="custom-control-label"
                                                           for="cmn-toggle"><span class="sr-only">Timeframe</span></label>
                                                </div> -->
                                            </div>
                                            <div class="form-inline">
                                                <div class="form-group mr-2">
                                                    <input type="text"
                                                           name="duration"
                                                           class="form-control text-center"
                                                           value="<?php echo $quiz['duration'];?>"
                                                           style="width:50px;">
                                                </div>
                                                <div class="form-group">
                                                    <select class="custom-select" name="time_frame">
                                                        <option value="60">Hours</option>
                                                        <option value="1" selected>Minutes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cmn-toggle"
                                               class="col-sm-3 col-form-label form-label">Extra File</label>
                                        <div class="col-sm-9">
                                            <div class="form-inline">
                                                <div class="form-group mr-2">
                                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                                    <input name="filecheck"
                                                        type="checkbox"
                                                        id="filecheck"
                                                        class="custom-control-input" checked>
                                                    <label class="custom-control-label"
                                                        for="filecheck">Yes</label>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="form-group row xfile">
                                        <label for="cmn-toggle"
                                               class="col-sm-3 col-form-label form-label">File</label>
                                        <div class="col-sm-9">
                                            <div class="form-inline">
                                                <div class="form-group mr-2">
                                                    <input type="file" name="qpdf"
                                                           class="form-control text-center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row xfile">
                                        <label for="cmn-toggle"
                                               class="col-sm-3 col-form-label form-label">Mark(for file)</label>
                                        <div class="col-sm-9">
                                            <div class="form-inline">
                                                <div class="form-group mr-2">
                                                    <input type="number" name="xmark"
                                                           class="form-control text-center" value="<?php echo $quiz['xmark'];?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit"
                                                    name="submit"
                                                    class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Questions</h4>
                            </div>
                            <div class="card-header">
                                <a href="#"
                                   data-toggle="modal"
                                   data-target="#editQuiz"
                                   id="addq"
                                   class="btn btn-outline-secondary">Add Question <i class="material-icons">add</i></a>
                            </div>
                            <div class="nestable"
                                 id="nestable">
                                <ul class="list-group list-group-fit nestable-list-plain mb-0">
                                    <?php 
                                        $res = $db->query("select * from questions where exam_id='$id'");

                                        while($row= $res->fetch_assoc()){
                                        
                                    ?>
                                    <div class="d-none q<?php echo $row['id']; ?>">
                                            <div class="qid"><?php echo $row['id'];?></div>
                                            <div class="qqtitle"><?php echo $row['title'];?></div>
                                            <div class="qtype"><?php echo $row['type'];?></div>
                                            <div class="qmark"><?php echo $row['mark'];?></div>
                                            <div class="qa"><?php echo $row['a'];?></div>
                                            <div class="qb"><?php echo $row['b'];?></div>
                                            <div class="qc"><?php echo $row['c'];?></div>
                                            <div class="qd"><?php echo $row['d'];?></div>
                                            <div class="qans"><?php echo $row['ans'];?></div>
                                    </div>
                                    <li class="list-group-item nestable-item">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <a class="btn"><i class="material-icons"><?php echo $row['type']=="text"? "assignment" : "check_box"; ?></i></a>
                                            </div>
                                            <div class="media-body">
                                            <?php echo $row['title']?>
                                            </div>
                                            <div class="media-right text-right">
                                                <div style="width:100px">
                                                    <a href="#"
                                                       data-toggle="modal"
                                                       data-target="#editQuiz"
                                                       id="q<?php echo $row['id']; ?>"
                                                       class="btn btn-primary btn-sm qedit"><i class="material-icons">edit</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    