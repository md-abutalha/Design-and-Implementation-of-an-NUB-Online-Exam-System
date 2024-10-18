<?php
    if(!isset($_GET['quiz_id'])){
        echo "<script>window.location.href='instructor-courses';</script>";
    }
    $quiz_id = $_GET['quiz_id'];

    $at_res = $db->query("select * from attempts where quiz_id='$quiz_id'");
    $count = mysqli_num_rows($at_res);
    $pat_res = $db->query("select * from attempts where quiz_id='$quiz_id' and eval='pending'");
    $pcount = mysqli_num_rows($pat_res);
    

?>
    <div class="container page__container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/ProLearner">Home</a></li>
                                <li class="breadcrumb-item active">Quiz</li>
                            </ol>
                            <h2>test</h2>
                            <div class="card-group">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="mb-0"><strong><?php echo $count;?></strong></h4>
                                        <small class="text-muted-light">TOTAL</small>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="text-primary mb-0"><strong><?php echo $count-$pcount;?></strong></h4>
                                        <small class="text-muted-light">CHECKED</small>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="text-primary mb-0"><strong><?php echo $pcount;?></strong></h4>
                                        <small class="text-muted-light">LEFT</small>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <ul class="list-group mb-0 list-group-fit">
                                        <?php
                                        $i=0;
                                        $att_res = $db->query("select * from attempts where quiz_id='$quiz_id' and status='submitted'");
                                        while($atmp = $att_res->fetch_assoc()){
                                            $i++;
                                            $stid = $atmp['user_id'];
                                            $st_res = $db->query("select * from users where id='$stid'");
                                            $st = $st_res->fetch_assoc();
                                        ?>
                                        <li class="list-group-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="text-muted-light"><?php echo $i;?>.</div>
                                                </div>
                                                <div class="media-body"><a href="instructor-eval-quiz?quiz_id=<?php echo $quiz_id;?>&st_id=<?php echo $st['id'];?>"><?php echo $st['name'].'('.$st['id_no'].')';?></a></div>
                                                <div class="media-right"><?php if($atmp['eval']=='pending'){?><span class="badge badge-success ">Pending Review</span><?php } else {?><span class="badge badge-info "><?php
                                                    $mres = $db->query("select SUM(mark) from results where quiz_id='$quiz_id' and user_id='$stid'");
                                                    $mark = $mres->fetch_assoc();
                                                    echo $mark['SUM(mark)']+$atmp['xmark'];
                                                ?></span><?php } ?></div>
                                            </div>
                                        </li>
                                        <?php } ?>
                                        
                                        
                                    </ul>
                            

                            
                        </div>
                        

                    

                    