
<?php

include_once 'header.php';
require 'date.php';
include_once './includes/dbh.inc.php';
session_start();

$_SESSION['r_count'];
$_SESSION['my_count'];
$_SESSION['user_id'] = 3;
$_SESSION['user_name'] = "efdeffffe";
$session_user_id = $_SESSION['user_id'];
$session_user_name = $_SESSION['user_name'];
if(isset($_POST['submitForm'])) {
    $tags = mysqli_real_escape_string($conn, $_POST['group1']);
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    if($question != "") {
        $sql = "INSERT INTO tbl_forum_question (`user_id`, `user_name`, question, tags) VALUES ('$session_user_id', '$session_user_name', '$question', '$tags')";
        if ($conn->query($sql) === TRUE) {
            echo '<script>window.location.href="forum.php"</script>';
        }
    }
}
?>

<?php
if(isset($_POST['answerForm'])) {
    $answer = mysqli_real_escape_string($conn, $_POST['answer_post']);
    $ques_id = $_POST['quid'];
    if($answer != "") {
        $sql = "INSERT INTO tbl_forum_answer (`user_id`,`user_name`, question_id, answer) VALUES ('$session_user_id', '$session_user_name', '$ques_id', '$answer')";
        if ($conn->query($sql) === TRUE) {
            echo '<script>window.location.href="forum.php"</script>';
        }
    }
}
?>

<div class="container-fluid" style="padding:20px 40px 20px 40px">
    <div class="row">
        <div class="col">
            <h3 class="text-primary"> Forum</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <button class="tablink col" onclick="openTab('recentQA', this, '#E4EF50')" id="defaultOpen">Recent Questions &nbsp;
                    <span class="badge badge-danger">
                        <?php echo $_SESSION['r_count'];?>
                    </span>
                </button>
                <button class="tablink col" onclick="openTab('myQA', this, '#4FC3F7')">My Questions &nbsp;
                    <span class="badge badge-danger">
                        <?php echo $_SESSION['my_count'];?>
                    </span>
                </button>
                <button type="button col" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalQuestion">
                    <i class="fa fa-plus"></i> Ask Question</button>
            </div>
            <div class="row shadow">
                <div id="recentQA" class="tabcontent">
                    <div class="container-fluid">
                        
                        <?php
                            $sql = "SELECT * FROM tbl_forum_question ORDER BY question_id DESC";
                            $result = $conn->query($sql);
                            $_SESSION['r_count'] = $result->num_rows;
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                $qid = $row['question_id'];
                                $user_id = $row['user_id'];
                        ?>

                        <div class="row p-2">
                            <div class="col-2">
                                <div class="small">
                                    <b>
                                        <?php echo $row['user_name'];?>
                                    </b>
                                </div>
                                <div class="small">
                                    <?php timeCalc($row['timestamp']);?>
                                </div>
                            </div>
                            <div class="col-9" data-toggle="collapse" data-target="#ques<?php echo $row['question_id'];?>">
                                <div class="row">
                                    <?php echo $row['question'];?>
                                </div>
                            </div>
                            <?php
                                $sql1 = "SELECT * FROM tbl_forum_answer WHERE question_id = $qid ";
                                $result1 = $conn->query($sql1);
                                $count = $result1->num_rows; 
                            ?>
                            <div class="col-1 text-center" data-toggle="collapse" data-target="#ques<?php echo $row['question_id'];?>">
                                <div class="card border-dark shadow" style="width:3rem; background-color: #CFD8DC;">
                                    <div class="text-center">
                                        </b>
                                        <?php echo $count ;?>
                                        </b>
                                    </div>
                                    <div class="small">answer</div>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <div id="ques<?php echo $row['question_id'];?>" class="collapse" style="background-color: #90A4AE; padding: 10px;">
                            <?php  if ($result1->num_rows > 0) {
                                while($row1 = $result1->fetch_assoc()) {
                                    $user_id = $row1['user_id'];
                            ?>
                            <div class="row p-2">
                                <div class="col-2">
                                    <div class="small">
                                        <b>
                                            <?php echo $row1['user_name'];?>
                                        </b>
                                    </div>
                                    <div class="small">
                                        <?php timeCalc($row1['timestamp']);?>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        <?php echo $row1['answer'];?>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <?php }
                                } else {
                                    echo '<div class="row"><div class="col-5 offset-3 p-2 card text-center text-danger border-dark" style="background-color: #455A64;">No answers yet !!!</div></div>'; 
                                }
                                $quid = $row['question_id'];
                            ?>
                            <form id="answerForm" action="" role="form" method="post">
                                <div class="row pt-2 form-group shadow-textarea">
                                    <div class="col-8 offset-1">
                                        <textarea class="form-control" name="answer_post" id="answerFormControlTextarea" rows="5" placeholder="Share your solution"
                                            style="width:100%; background-color: #CFD8DC;"></textarea>
                                    </div>
                                    <input type="text" name="quid" value="<?php echo $quid; ?>" style="display: none;">
                                    <div class="col-2">
                                        <button type="submit" name="answerForm" id="answerForm" class="btn btn-sm btn-primary" value="Post">Post
                                            <i class="fa fa-paper-plane ml-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php }
                            } else {
                                echo '<div class="row"><div class="col-5 offset-3 p-2 card text-center text-danger border-dark" style="background-color: #455A64;">No questions yet !!!</div></div>';  
                            }
                        ?>
                    </div>
                </div>
                <div id="myQA" class="tabcontent">
                    <div class="container-fluid">
                        <?php
                            $sql = "SELECT * FROM tbl_forum_question WHERE user_id = $session_user_id ORDER BY question_id DESC";
                            $result = $conn->query($sql);
                            $_SESSION['my_count'] = $result->num_rows;
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $qid = $row['question_id'];
                                    $user_id = $row['user_id'];
                        ?>
                        <div class="row p-2">
                            <div class="col-2">
                                <div class="small">
                                    <b>
                                        <?php echo $row['user_name'] ;?>
                                    </b>
                                </div>
                                <div class="small">
                                    <?php timeCalc($row['timestamp']);?>
                                </div>

                            </div>
                            <div class="col-9" data-toggle="collapse" data-target="#myques<?php echo $row['question_id'];?>">
                                <div class="row">
                                    <?php echo $row['question'];?>
                                </div>
                            </div>
                            <?php
                                $sql1 = "SELECT * FROM tbl_forum_answer WHERE question_id = $qid ";
                                $result1 = $conn->query($sql1);
                                $count = $result1->num_rows; 
                            ?>
                            <div class="col-1 text-center" data-toggle="collapse" data-target="#myques<?php echo $row['question_id'];?>">
                                <div class="card border-dark shadow" style="width:3rem; background-color: #CFD8DC;">
                                    <div class="text-center">
                                        </b>
                                        <?php echo $count ;?>
                                        </b>
                                    </div>
                                    <div class="small">answer</div>
                                </div>
                            </div>
                            </div>
                            <hr>
                            <div id="myques<?php echo $row['question_id'];?>" class="collapse" style="background-color: #90A4AE; padding: 10px;">
                            <?php  if ($result1->num_rows > 0) {
                                while($row1 = $result1->fetch_assoc()) {
                                    $user_id = $row1['user_id'];
                            ?>
                            <div class="row p-2">
                                <div class="col-2">
                                    <div class="small">
                                        <b>
                                            <?php echo $row1['user_name'];?>
                                        </b>
                                    </div>
                                    <div class="small">
                                        <?php timeCalc($row1['timestamp']);?>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        <?php echo $row1['answer'];?>
                                        <hr>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <?php }
                                } else {
                                    echo '<div class="row"><div class="col-5 offset-3 p-2 card text-center text-danger border-dark" style="background-color: #455A64;">No answers yet !!!</div></div>'; 
                                }
                                $quid = $row['question_id'];
                            ?>
                            <form id="answerForm" action="" role="form" method="post">
                                <div class="row pt-2 form-group shadow-textarea">
                                    <div class="col-8 offset-1">
                                        <textarea class="form-control" name="answer_post" id="answerFormControlTextarea" rows="5" placeholder="Share your solution"
                                            style="width:100%; background-color: #CFD8DC;"></textarea>
                                    </div>
                                    <input type="text" name="quid" value="<?php echo $quid; ?>" style="display: none;">
                                    <div class="col-2">
                                        <button type="submit" name="answerForm" id="answerForm" class="btn btn-sm btn-primary" value="Post">Post
                                            <i class="fa fa-paper-plane ml-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <?php }
                                } else {
                                    echo '<div class="row"><div class="col-5 offset-3 p-2 card text-center text-danger border-dark" style="background-color: #455A64;">No questions yet !!!</div></div>'; 
                                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Modal: Question modal -->
    <div class="modal fade mt-5" id="modalQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-notify modal-info" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header" style="padding :0px">
                    <p class="heading lead">
                        Post your Question
                    </p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text"> &times; &nbsp; </span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <form id="questionForm" action="" role="form" method="post">
                        <div class="text-center">
                            <i class="fa fa-file-text-o fa-4x mb-3 animated rotateIn"></i>
                            <p>
                                Share the problem about the product here
                            </p>
                        </div>

                        <!--Basic textarea-->
                        <div class="md-form" style="padding :0px">
                            <textarea type="text" class="md-textarea form-control" name="question" rows="6" placeholder="Post your Queries and problems here"></textarea>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            <button type="submit" name="submitForm" id="submitForm" class="btn btn-primary waves-effect waves-light" value="Post">POST
                                <i class="fa fa-paper-plane ml-1"></i>
                            </button>
                            <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cancel</a>
                        </div>
                </div>
                </form>
            </div>
        </div>

        <script>
            function openTab(tabName, elmnt, color) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].style.backgroundColor = "";
                }
                document.getElementById(tabName).style.display = "block";
                elmnt.style.backgroundColor = color;

            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
                
                
<script>
 
 jQuery(document).ready(function() {
  
 var offset = 250;
  
 var duration = 300;
  
 jQuery(window).scroll(function() {
  
 if (jQuery(this).scrollTop() > offset) {
  
 jQuery(‘.back-to-top’).fadeIn(duration);
  
 } else {
  
 jQuery(‘.back-to-top’).fadeOut(duration);
  
 }
  
 });
  
  
  
 jQuery(‘.back-to-top’).click(function(event) {
  
 event.preventDefault();
  
 jQuery(‘.tabcontent’).animate({scrollTop: 0}, duration);
  
 return false;
  
 })
  
 });
  
 </script>

<?php include_once 'footer.php'; ?>