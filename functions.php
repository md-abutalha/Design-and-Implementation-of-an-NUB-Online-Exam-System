<?php
    function extra_scirpt_loader($page){
        if($page=="instructor-quiz-edit" || $page=="instructor-quiz-add"){
            global $id;
            ?>
            <div class="modal fade"
             id="editQuiz">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title text-white">Edit Question </h4>
                        <button type="button"
                                class="close text-white"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="qformid" action="api/add-question.php" method="post">
                            <input type="hidden" id="hide" name="exam_id" value="<?php echo $id;?>">
                            <div class="form-group row">
                                <label for="qtitle"
                                       class="col-form-label form-label col-md-3">Title:</label>
                                <div class="col-md-9">
                                    <input id="qtitle"
                                           name="qtitle"
                                           type="text"
                                           class="form-control"
                                           value="Database Access">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type"
                                       class="col-form-label form-label col-md-3">Type:</label>
                                <div class="col-md-4">
                                    <select id="type" name="type"
                                            class="custom-control custom-select form-control">
                                        <option value="text">Textarea</option>
                                        <option value="mcq">MCQ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="mcq_form">
                                <label class="col-form-label form-label col-md-3">Answers:</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <input id="a"
                                           type="text"
                                           name="a"
                                           class="form-control col"
                                           placeholder="A.">
                                        <input id="b"
                                           type="text"
                                           name="b"
                                           class="form-control col"
                                           placeholder="B.">
                                    </div>
                                    <div class="row">
                                        <input id="c"
                                           type="text"
                                           name="c"
                                           class="form-control col"
                                           placeholder="C.">
                                        <input id="d"
                                           type="text"
                                           name="d"
                                           class="form-control col"
                                           placeholder="D.">
                                    </div>
                                    <select id="ans"
                                            name="ans"
                                            class="custom-control custom-select form-control col-4">
                                        <option value="">Answer</option>
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="c">C</option>
                                        <option value="d">D</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="touch-spin-2"
                                       class="col-form-label form-label col-md-3">Question Score:</label>
                                <div class="col-md-4">
                                    <input type="text"
                                           id="mark"
                                           value="50"
                                           name="mark"
                                           class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-3">
                                    <button type="submit"
                                            name="submit"
                                            value="submit"
                                            class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
            <!-- Vendor JS -->
        <script src="assets/vendor/jquery.nestable.js"></script>
        <script src="assets/vendor/jquery.bootstrap-touchspin.js"></script>
        <!-- Flatpickr -->  
        <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
        <script src="assets/js/flatpickr.js"></script>

        <!-- jQuery Mask Plugin -->
        <script src="assets/vendor/jquery.mask.min.js"></script>
        
        <script>
            $(document).ready(()=>{
                $("#mcq_form").fadeOut(2);
                $("#timeModal").fadeOut(1);
            });
            $('#addQ').click(()=>{
                console.log("test done");
            });
            $("#timePicker").focus((e)=>{
                $("#timeModal").fadeIn(500);
            });
            $('body').click((e)=>{
                if(!["timePicker","h","m","p","timeModal"].includes(e.target.id)){
                    $("#timeModal").fadeOut(500);
                }
            });
            $(".time").change((e)=>{
                var h = $('#h').val();
                var m = $('#m').val();
                var p = $('#p').val();
                m = m.length==1?"0"+m:m;
                $("#timePicker").val(`${h}:${m} ${p.toUpperCase()}`);
            })

            $("#type").change((e)=>{
                var type = $("#type").val();
                if(type==='mcq'){
                    $("#mcq_form").fadeIn(500);
                }
                else {
                    $("#mcq_form").fadeOut(500);
                }
            });
            $("#addq").click(function(e){
                $("#qformid").attr("action","api/add-question.php");
                $("#qtitle").val("Question Statement");
                $("#hide").attr("name","exam_id");
                $("#hide").val(<?php echo $id; ?>);
                // $("#type").val().change();
                // $("#mark").val(data.mark);
                // $("#a").val(data.a);
                // $("#b").val(data.b);
                // $("#c").val(data.c);
                // $("#d").val(data.d);
                // $("#ans").val(data.ans).change();
            });
            $('.qedit').click(function (e){
                $("#qformid").attr("action","api/edit-question.php");
                var arr = $($('.'+this.id)[0]).children();
                var data = {};
                for(let i=0;i<9;i++){
                    data[$(arr[i]).attr("class").replace("q","")] = $(arr[i]).html();
                }
                console.log(data);
                $("#hide").attr("name","question_id");
                $("#hide").val(data.id);
                $("#qtitle").val(data.qtitle);
                $("#type").val(data.type).change();
                $("#mark").val(data.mark);
                $("#a").val(data.a);
                $("#b").val(data.b);
                $("#c").val(data.c);
                $("#d").val(data.d);
                $("#ans").val(data.ans).change();
            });
        </script>

        <!-- Initialize -->
        <script src="assets/js/nestable.js"></script>
        <script src="assets/js/touchspin.js"></script>

            <?php
        }
        else if($page=="instructor-course-edit"){
            ?>
            <!-- Nestable -->
            <script src="assets/vendor/jquery.nestable.js"></script>
            <script src="assets/js/nestable.js"></script>

            <!-- Quill -->
            <script src="assets/vendor/quill.min.js"></script>
            <script src="assets/js/quill.js"></script>

            <!-- Flatpickr -->
            <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
            <script src="assets/js/flatpickr.js"></script>

            <script>
                $(document).ready(()=>{

                })
                $('#url').click(function(){
                    var tf = $('#url').select();
                    document.execCommand('copy');
                    $('#url').attr('data-original-title', 'Copied').tooltip('show');

                });

                $('#ekey').click(function(){
                    var tf = $('#ekey').select();
                    document.execCommand('copy');
                    $('#ekey').attr('data-original-title', 'Copied').tooltip('show');

                });
                
            </script>
            <?php
        }
        else if($page=="instructor-course-add"){
            ?>
                <!-- Nestable -->
                <script src="assets/vendor/jquery.nestable.js"></script>
                <script src="assets/js/nestable.js"></script>

                <!-- Quill -->
                <script src="assets/vendor/quill.min.js"></script>
                <script src="assets/js/quill.js"></script>

                <!-- Flatpickr -->
                <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
                <script src="assets/js/flatpickr.js"></script>

                <script>
                    $("#formid").submit(function (e){
                        e.preventDefault();
                        var rich_desc = $('#rt').children();
                        var descx = $(rich_desc[0]).html();
                        var datax = new FormData(this);
                        datax.append("description", descx);
                        $.ajax({
                            type : 'POST',
                            url : 'api/add-courses.php',
                            enctype: 'multipart/form-data',
                            data : datax,
                            processData: false,
                            contentType: false,
                            success : function(data){
                                if(JSON.parse(data).status==="success"){
                                    window.location.href = "instructor-courses"
                                } 
                            }
                        });
                    });
                </script>
            <?php
        }
        else if($page=="instructor-course-edit"){
            ?>
                
                
            <?php
        }
        else if($page=='student-course'){
            ?>
                <script>
                    
                </script>
            <?php
        }
        else if($page=='student-quiz-attempt'){
            ?>
            <script>
                if($('#timer').text().length>0){
                    var interval = setInterval(()=>{
                        console.log("testing");

                        if($('#timer').text().length==0){
                            setTimeout(()=>{location.reload()},1000);
                            clearInterval(interval);
                        }

                    },1000);
                }
            </script>
            <?php
        }
        else if($page=='student-quiz'){
            ?>
            <script>
                var fbc = 0;
                if($('#timer').text().length>0){
                    var interval = setInterval(()=>{

                        if($('#timer').text().length==0){
                            setTimeout(()=>{
                                $('#submit').click();
                            },1000);
                            clearInterval(interval);
                        }

                    },1000);
                }
                $(window).focus(e=>{
                    fbc++;
                    if(fbc>2) $("#submit").click();
                })
                $(window).blur(e=>{
                    fbc++;
                    if(fbc>2) $("#submit").click();
                })
                
            </script>
            <?php
        }
        else if($page=='login' || $page=='signup' || $page=='student-profile-edit'){
            ?>
                <script>
                    $("#custom-select").change(function(e){
                        if($(this).val()==="teacher"){
                            $("#stid").css("display","none");
                        }
                        else{
                            $("#stid").css("display","block");
                        }
                    });
                    $("#formid").submit(function(e){
                        // e.preventDefault();
                        const cap = grecaptcha.getResponse();
                        if(cap.length>0) return true;
                        else return false;
                    });
                </script>
            <?php
        }
        

        if($page=="instructor-quiz-add"){
            ?>
                <script>
                    $("#filecheck").click(function(e){
                        if($(this).is(":checked")){
                            $(".xfile").removeClass("xfh");
                        }
                        else{
                            $(".xfile").addClass("xfh");
                        }
                    });
                </script>
                <script>
                    $("#formid").submit(function(e) {
                        e.preventDefault();
                        var data = new FormData(this);
                        $.ajax({
                            type : 'POST',
                            url : 'api/add-courses.php',
                            enctype: 'multipart/form-data',
                            data : datax,
                            processData: false,
                            contentType: false,
                            success : function(data){
                                alert(data); 
                            }
                        });
                    });
                </script>
            <?php
        }
        elseif($page=="instructor-quiz-edit"){
            ?>
            <script>
                $("#filecheck").click(function(e){
                    if($(this).is(":checked")){
                        $(".xfile").removeClass("xfh");
                    }
                    else{
                        $(".xfile").addClass("xfh");
                    }
                })
            </script>
            <?php
        }

        
        
    }

    function extra_head_loader($page){
        if($page=="instructor-course-add"){
            ?>
            <!-- Flatpickr -->
            <link type="text/css"
                href="assets/css/flatpickr.css"
                rel="stylesheet">
            <link type="text/css"
                href="assets/css/flatpickr-airbnb.css"
                rel="stylesheet">

            <!-- Quill Theme -->
            <link type="text/css"
                href="assets/css/quill.css"
                rel="stylesheet">

            <!-- Nestable -->
            <link rel="stylesheet"
                href="assets/css/nestable.css">
            <?php
        }
        else if($page=="instructor-course-edit"){
            ?>
            <!-- Flatpickr -->
            <link type="text/css"
                href="assets/css/flatpickr.css"
                rel="stylesheet">
            <link type="text/css"
                href="assets/css/flatpickr-airbnb.css"
                rel="stylesheet">

            <!-- Quill Theme -->
            <link type="text/css"
                href="assets/css/quill.css"
                rel="stylesheet">

            <!-- Nestable -->
            <link rel="stylesheet"
                href="assets/css/nestable.css">
            <?php
        }
        else if($page=="instructor-quiz-add" || $page=="instructor-quiz-edit"){
            ?>
                <!-- Flatpickr -->
                <link type="text/css"
                    href="assets/css/flatpickr.css"
                    rel="stylesheet">
                <link type="text/css"
                    href="assets/css/flatpickr-airbnb.css"
                    rel="stylesheet">
            <?php
        }
        else if($page=='login' || $page=="signup" ||$page=="student-profile-edit"){
            ?>
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <?php
        }
    }

    function is_loggedin(){
        if(isset($_SESSION['user'])){
            return true;
        }
        else return false;
    }


    function logout(){
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();

        //redirect
        echo "<script>window.location.href = 'login';</script>";
    }

    function generateRandomString($length = 20) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    function status_mod($status){
        if($status=='right' || $status =='checked'){
            return 'success';
        }
        else if($status=='wrong'){
            return 'danger';
        }
        else {
            return 'info';
        }

    }
?>