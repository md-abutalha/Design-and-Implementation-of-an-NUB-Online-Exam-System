<?php
    $user_id = $_SESSION['user_id'];
    $res = $db->query("SELECT c.id, c.title, c.description, c.img, c.owner FROM courses c JOIN enrollments e ON c.id = e.course_id WHERE e.user_id = '$user_id'");
    
?>

                    <div class="container page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/ProLearner">Home</a></li>
                            <li class="breadcrumb-item active">Courses</li>
                        </ol>
                        <div class="media align-items-center mb-headings">
                            <div class="media-body">
                                <h1 class="h2">Courses</h1>
                            </div>
                            <div class="media-right">
                                <!-- <div class="btn-group btn-group-sm">
                                    <a href="#"
                                       class="btn btn-white active"><i class="material-icons">list</i></a>
                                    <a href="#"
                                       class="btn btn-white"><i class="material-icons">dashboard</i></a>
                                </div> -->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="card-columns">
                            <?php
                            while($row = $res->fetch_assoc()){
                            ?>
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4 class="card-title mb-0"><a href="student-course?id=<?php echo $row['id']?>"><?php echo $row['title']?></a></h4>
                                    <!-- <div class="rating">
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star_border</i>
                                    </div> -->
                                </div>
                                <a href="student-course?id=<?php echo $row['id']?>">
                                    <img src="uploads/<?php echo $row['img']; ?>"
                                         alt="Card image cap"
                                         style="width:100%;aspect-ratio: 16/9;">
                                </a>
                                <div class="card-body">
                                    <?php echo $row['description']; ?>
                                </div>
                            </div>
                            <?php } ?>
                            
                        </div>

                        <!-- Pagination -->
                        <!-- <ul class="pagination justify-content-center pagination-sm">
                            <li class="page-item disabled">
                                <a class="page-link"
                                   href="#"
                                   aria-label="Previous">
                                    <span aria-hidden="true"
                                          class="material-icons">chevron_left</span>
                                    <span>Prev</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link"
                                   href="#"
                                   aria-label="1">
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link"
                                   href="#"
                                   aria-label="1">
                                    <span>2</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link"
                                   href="#"
                                   aria-label="Next">
                                    <span>Next</span>
                                    <span aria-hidden="true"
                                          class="material-icons">chevron_right</span>
                                </a>
                            </li>
                        </ul> -->
                    </div>

                    