<?php
    if(!isset($_GET['course_id'])) echo "<script>window.location.href='instructor-courses';</script>";
    $id = $_GET['course_id'];
    $user = $_SESSION['user'];
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
                $ins = $db->query("INSERT INTO `exams`(`title`, `course_id`, `start_time`, `duration`,`file`,`xmark`) VALUES ('$title','$course','$date_time','$duration_in_min','$filename','$xmark')");
            } else {
                echo "Possible file upload attack!\n";
            }
        }
        else{ 
            $ins = $db->query("INSERT INTO `exams`(`title`, `course_id`, `start_time`, `duration`) VALUES ('$title','$course','$date_time','$duration_in_min')");
        }

        if($ins){
            $last_id = $db->insert_id;
        //echo "<script>window.location.href='instructor-quiz-edit?quiz_id=$last_id';</script>";
        }


    }
    
    $res = $db->query("select * from courses where owner='$user'");
?>

<div class="container page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/ProLearner">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Quiz Manager</a></li>
                            <li class="breadcrumb-item active">Add Quiz</li>
                        </ol>
                        <h1 class="h2">Add Quiz</h1>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic</h4>
                            </div>
                            <div class="card-body">
                                <form action="?course_id=<?php echo $id;?>" method="post" enctype='multipart/form-data'>
                                    <div class="form-group row">
                                        <label for="quiz_title"
                                               class="col-sm-3 col-form-label form-label">Quiz Title:</label>
                                        <div class="col-sm-9">
                                            <input id="quiz_title"
                                                   name="title"
                                                   type="text"
                                                   class="form-control"
                                                   placeholder="Title"
                                                   value="Vue.js Introduction">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="course_title"
                                               class="col-sm-3 col-form-label form-label">Course:</label>
                                        <div class="col-sm-9 col-md-4">
                                            <select id="course_title" name="course"
                                                    class="custom-select form-control">
                                                <?php
                                                    while($row=$res->fetch_assoc()){
                                                    
                                                ?>
                                                    <option value="<?php echo $row['id'];?>" <?php echo ($row['id']==$id)?"selected":"";?>><?php echo $row['title'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quiz_title"
                                               class="col-sm-3 col-form-label form-label">Quiz Date:</label>
                                        <div class="col-sm-9">
                                        <input id="flatpickrSample01" name="date"
                                                   type="text"
                                                   class="form-control"
                                                   placeholder="Flatpickr example"
                                                   data-toggle="flatpickr"
                                                   value="today">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quiz_title"
                                               class="col-sm-3 col-form-label form-label">Quiz Time:</label>
                                        <div class="col-sm-9">
                                        <input id="timePicker" name="time"
                                                   type="text"
                                                   class="form-control"
                                                   placeholder="Flatpickr example"
                                                   value="1:00 AM">
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
                                                    <input type="number" name="duration"
                                                           class="form-control text-center"
                                                           value="4"
                                                           style="width:50px;">
                                                </div>
                                                <div class="form-group">
                                                    <select class="custom-select" name="time_frame">
                                                        <option value="60"
                                                                selected>Hours</option>
                                                        <option value="1">Minutes</option>
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
                                                        class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="filecheck">Yes</label>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="form-group row xfile xfh">
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
                                    <div class="form-group row xfile xfh">
                                        <label for="cmn-toggle"
                                               class="col-sm-3 col-form-label form-label">Mark(for file)</label>
                                        <div class="col-sm-9">
                                            <div class="form-inline">
                                                <div class="form-group mr-2">
                                                    <input type="number" name="xmark"
                                                           class="form-control text-center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit" name="submit"
                                                    class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    