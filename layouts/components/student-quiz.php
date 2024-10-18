<?php
if (!isset($_GET['id'])) echo "<script>window.location.href='student-courses'</script>";
$quiz_id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$res = $db->query("select * from exams where id='$quiz_id'");
$row = $res->fetch_assoc();
$time = $row['duration'];

$q_res = $db->query("select * from questions where exam_id='$quiz_id'");
$count = mysqli_num_rows($q_res);

$m_res = $db->query("select SUM(mark) from questions where exam_id='$quiz_id'");
$mark = $m_res->fetch_assoc();

$attempt_res = $db->query("select * from attempts where user_id='$user_id' and quiz_id='$quiz_id'");
$att_count = mysqli_num_rows($attempt_res);

$end_time = $row['start_time'] + ($time * 60);
$now = time();
$time_d = $end_time - $now;

if ($time_d <= 0) echo "<script>alert('exam has ended.');window.location.href='student-courses';</script>";

if ($att_count > 0) {

    $attempt = $attempt_res->fetch_assoc();
    if (isset($_SESSION[$user_id . '_' . $quiz_id])) {
        if ($_SESSION[$user_id . '_' . $quiz_id] == $attempt['att_key']) {
            //echo "<script>alert('Can not Attempt second time.');window.location.href='student-courses';</script>";
        } else {
            echo "<script>alert('Can not Attempt second time.');window.location.href='student-courses';</script>";
        }
    } else {
        echo "<script>alert('Can not Attempt second time.');window.location.href='student-courses';</script>";
    }
    if ($attempt['status'] == 'submitted') echo "<script>alert('Can not Attempt second time.');window.location.href='student-courses';</script>";
} else {
    echo "<script>alert('Not attempted.');window.location.href='student-courses';</script>";
}

?>
<div class="container page__container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/ProLearner">Home</a></li>
        <li class="breadcrumb-item active">Quiz</li>
    </ol>
    <h2><?php echo $row['title']; ?></h2>
    <div class="card-group">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="mb-0"><strong><?php echo $count; ?></strong></h4>
                <small class="text-muted-light">TOTAL QUESTIONS</small>
            </div>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <h4 class="text-danger mb-0"><strong><?php if ($mark['SUM(mark)'] != null) echo $mark['SUM(mark)'] + $row['xmark'];
                                                        else echo $row['xmark']; ?></strong></h4>
                <small class="text-muted-light">TOTAL MARK</small>
            </div>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <div class="sidebar-heading">Total Time</div>
                <p class="pl-1 pr-1"><span class="h5 text-primary"><?php echo intval($time / 60); ?></span> : <span class="h5 text-primary"><?php echo $time % 60; ?></span> : <span class="h5 text-primary">0</span></p>

            </div>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <div class="sidebar-heading">Time left</div>
                <div id="timer" class="countdown sidebar-p-x"
                    data-value="<?php echo $time_d / 3600; ?>"
                    data-unit="hour">
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($row['file'] != 'na') {
    ?>
        <div class="row px-4">
            <div class="col-3">
                <h3>Extra File</h3>
            </div>
            <div class="col-9"><a href="uploads/<?php echo $row['file']; ?>">Download Question</a></div>
        </div>
    <?php } ?>
    <form action="api/quiz_submit.php?id=<?php echo $quiz_id; ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <?php
            $i = 0;
            while ($ques = $q_res->fetch_assoc()) {
                $i++;
            ?>
                <div class="card col-lg-6">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <h4 class="mb-0"><strong><?php echo $i; ?>#</strong></h4>
                            </div>
                            <div class="media-body">
                                <h4 class="card-title">
                                    <?php echo $ques['title']; ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body row">
                        <?php
                        if ($ques['type'] == 'mcq') {
                        ?>
                            <div class="form-group col-6">
                                <div class="custom-control custom-radio">
                                    <input id="customChecka<?php echo $i; ?>"
                                        type="radio"
                                        name="<?php echo $ques['id']; ?>"
                                        value="a"
                                        class="custom-control-input">
                                    <label for="customChecka<?php echo $i; ?>"
                                        class="custom-control-label"><?php echo $ques['a']; ?></label>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="custom-control custom-radio">
                                    <input id="customCheckb<?php echo $i; ?>"
                                        type="radio"
                                        name="<?php echo $ques['id']; ?>"
                                        value="b"
                                        class="custom-control-input">
                                    <label for="customCheckb<?php echo $i; ?>"
                                        class="custom-control-label"><?php echo $ques['b']; ?></label>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="custom-control custom-radio">
                                    <input id="customCheckc<?php echo $i; ?>"
                                        type="radio"
                                        name="<?php echo $ques['id']; ?>"
                                        value="c"
                                        class="custom-control-input">
                                    <label for="customCheckc<?php echo $i; ?>"
                                        class="custom-control-label"><?php echo $ques['c']; ?></label>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="custom-control custom-radio">
                                    <input id="customCheckd<?php echo $i; ?>"
                                        type="radio"
                                        name="<?php echo $ques['id']; ?>"
                                        value="d"
                                        class="custom-control-input">
                                    <label for="customCheckd<?php echo $i; ?>"
                                        class="custom-control-label"><?php echo $ques['d']; ?></label>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col">
                                <textarea name="<?php echo $ques['id']; ?>" id="" class="form-control" placeholder="write you answer:"></textarea>

                            </div>
                        <?php } ?>
                    </div>


                </div>
            <?php } ?>
        </div>

        <div class="row px-4">
            <div class="col-3">
                <h3>File Upload</h3>
            </div>
            <div class="col-9"><input type="file" name="xaf" class="form-control"></div>
        </div>

        <div class="card">
            <button id="submit" type="submit" class="btn btn-success float-right">Submit <i class="material-icons btn__icon--right">send</i></button>
        </div>
    </form>
</div>