<?php
    $st_id = $_GET['st_id'];
    $quiz_id = $_GET['quiz_id'];

    $ures = $db->query("select * from users where id='$st_id'");
    $u = $ures->fetch_assoc();
    $qres = $db->query("select * from exams where id='$quiz_id'");
    $q = $qres->fetch_assoc();
    $at_res = $db->query("SELECT * FROM `attempts` WHERE user_id='$st_id' and quiz_id='$quiz_id'");
    $at = $at_res->fetch_assoc();


    if(isset($_GET['sub'])){
        foreach ($_POST as $x => $y) {
            if($x=="xmark"){
                $ins = $db->query("UPDATE `attempts` SET `xmark`='$y',`eval`='checked' WHERE user_id='$st_id' and quiz_id='$quiz_id'");
            }
            else{
                $ins = $db->query("UPDATE `results` SET `status`='checked', `mark`='$y' WHERE id=$x");
                $ins = $db->query("UPDATE `attempts` SET `eval`='checked' WHERE user_id='$st_id' and quiz_id='$quiz_id'");
            }
        }
        echo "<script>window.location.href='instructor-attempt-list?quiz_id=$quiz_id';</script>";
    }
?>

    <div class="container page__container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="instructor-courses">Home</a></li>
                                <li class="breadcrumb-item active">Quiz</li>
                            </ol>
                            <h2><?php echo $q['title']; ?>(<?php echo $u['name'];?>)</h2>
                            <!-- <div class="card-group">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="mb-0"><strong>25</strong></h4>
                                        <small class="text-muted-light">TOTAL</small>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="text-primary mb-0"><strong>3</strong></h4>
                                        <small class="text-muted-light">Left</small>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="sidebar-heading">Total Time</div>
                                        <p class="pl-1 pr-1"><span class="h5 text-primary">04</span> : <span class="h5 text-primary">26</span> : <span class="h5 text-primary">51</span></p>
                                        
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="sidebar-heading">Time left</div>
                                        <div class="countdown sidebar-p-x"
                                            data-value=".5"
                                            data-unit="hour">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <form action="instructor-eval-quiz?quiz_id=<?php echo $quiz_id;?>&st_id=<?php echo $st_id;?>&sub=1" method="post">
                            <div class="row">
                                <div class="card col-lg-12">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <h4 class="mb-0"><strong>#Mark</strong></h4>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="card-title">
                                                (for pdf)
                                                </h4>
                                            </div>
                                            <div class="media-right">
                                                <p><input type="number" name="xmark" style="width:60px;" placeholder="mark">/<?php echo $q['xmark'];?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body row">
                                        <div class="col-12">
                                            <h4>Answer Sheet:</h4>
                                            <p><a href="uploads/<?php echo $at['file'];?>">Answer Script</a></p>
                                        </div>
                                    </div>

                                    
                                </div>
                                <?php
                                    $i=0;
                                    $mres = $db->query("SELECT results.*, questions.*,results.id as res_id FROM results JOIN questions ON results.question_id = questions.id WHERE results.user_id = '$st_id' AND results.quiz_id = '$quiz_id' ");
                                    while($ques = $mres->fetch_assoc()){
                                        $i++;
                                ?>
                                <div class="card col-lg-6">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <h4 class="mb-0"><strong><?php echo $i;?>#</strong></h4>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="card-title">
                                                    <?php echo $ques['title']; ?>
                                                </h4>
                                            </div>
                                            <div class="media-right">
                                                <?php if($ques['type']!='mcq'){?><p><input type="number" name="<?php echo $ques['res_id'];?>" style="width:50px;" placeholder="mark" required>/<?php echo $ques['mark'];?></p><?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body row">
                                        <?php
                                            if($ques['type']=='mcq'){
                                        ?>
                                        <div class="form-group col-6">
                                            <div class="custom-control custom-radio">
                                                <input id="customCheck01"
                                                    type="radio"
                                                    value="a"
                                                    class="custom-control-input" checked disabled>
                                                <label for="customCheck01"
                                                    class="custom-control-label"><?php echo $ques[$ques['answer']]; if($ques['ans']==$ques['answer']){?> <i class="material-icons btn__icon--right text-success">check_circle</i><?php } else {?><i class="material-icons btn__icon--right text-danger">cancel</i><?php echo $ques['ans'].'. '.$ques[$ques['ans']].'<i class="material-icons btn__icon--right text-success">check_circle</i>'; } ?></label>
                                            </div>
                                        </div>
                                        
                                        <?php } else{ ?>
                                        <div class="col">
                                            <textarea id="" class="form-control" placeholder="write you answer:" disabled><?php echo $ques['answer'];?></textarea>
                                            
                                        </div>
                                        <?php } ?>
                                    </div>

                                    
                                </div>
                                <?php } ?>
                            </div>
                            

                            <div class="card">
                                <button type="submit" class="btn btn-success float-right">Submit <i class="material-icons btn__icon--right">send</i></a>
                            </div>
                            </form>
                        </div>
                        

                    

                    