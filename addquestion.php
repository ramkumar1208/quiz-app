<?php
include "conn.php"; 
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['admin'])){
    
  }else{
    $_SESSION['message']="admin please login first";
  }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question=$_POST['question'];
    $insert_q="insert into `questions`(`question`) values('$question')";
    $insert_question=mysqli_query($con,$insert_q);
    $question_id = $con->insert_id;
    for($i=1;$i<=4;$i++){
        $options[$i]=$_POST['option'.$i];
        $inser_opt="insert into `answers`(`answer`,`ans_id`) values('{$_POST['option'.$i]}','$question_id')";
        $insert_option=mysqli_query($con,$inser_opt);
    }
    // print_r($options);
    $answer=$_POST['answer'];
    $fetch_ans_id="select aid from `answers` where `answer`='$answer'";
    $fetch_query=mysqli_query($con,$fetch_ans_id);
    if(mysqli_num_rows($fetch_query)==1){
        $geted_ans_id=mysqli_fetch_assoc($fetch_query)['aid'];
    }else{
        echo "not inserted";
    }
    //insert the ans id in question table
    $insert_ans_in_question="UPDATE `questions` SET `ans_id` = '$geted_ans_id' WHERE `qid` = '$question_id';";
    $insert_ans_id=mysqli_query($con,$insert_ans_in_question);
    if($insert_ans_id){
        $_SESSION['message']="question inserted";
    }
}
?> 
<!DOCTYPE html>
<!-- Coding by CodingLab || www.codinglabweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website with Login & Registration Form</title>
    <link rel="stylesheet" href="s_new.css" />
    <!-- <link rel="stylesheet" href="quiz_css.css"> -->
    <!-- <link rel="stylesheet" href="admin_css.css" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <style>
  .center-div {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* This will make the div vertically centered on the viewport */
  }
  /* Coded by https://beproblemsolver.com  Visit for more such code */
 * {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
 }
 .main-section {
  position: absolute;
  padding: 0;
  left: 10%;
  top : 10%;
  }

 .box {
   width: 100%;
   overflow: hidden;
   background: #fff;
   border-radius: 5px;
   box-shadow: 0px 10px 34px -15px rgb(0 0 0 / 24%);
 }

 .img {
   background-image: url(../img/bg-1.webp);
   height: 200px;
 }

 .img-2 {
   background-image: url(../img/signup.webp);
   height: 200px;
 }

 .form-control {
   height: 48px;
   background: #fff;
   color: #000;
   font-size: 16px;
   border-radius: 5px;
   -webkit-box-shadow: none;
   box-shadow: none;
   border: 1px solid rgba(0, 0, 0, 0.1);
 }

 .btn.btn-primary {
   background: #01d28e !important;
   border: 1px solid #01d28e !important;
   color: #fff !important;
 }

 .btn.btn-primary-1 {
   background: #029161 !important;
   border: 1px solid #029161 !important;
   color: #fff !important;
 }
</style>
  </head>
  <body>
    <!-- Header -->
    <header class="header">
      <nav class="nav">
        <a href="index.php" class="nav_logo">College Name</a>

        <ul class="nav_items">
          <li class="nav_item">
            <a href="admin.php" class="nav_link">Home</a>
            <a href="admin_quiz.php" class="nav_link">View Quiz</a>
            <a href="viewmarks.php" class="nav_link">Student Marks</a>
            
          </li>
        </ul>
        <?php 
        if(isset($_SESSION['admin'])){ 
        //   echo $user_name;
          ?>
          <a href="logout.php"><button class="button" id="form-open">Logout</button></a>
        <?php }else{ ?>
          <a href="admin_login.php"><button class="button" id="form-open">Login</button></a>
        <?php }
        ?>
        
      </nav>
    </header>
    <main>
    <div class="home">
    <div class="center-div"> 
    <?php if($_SESSION['message']!=""){ 
      ?>
      <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
      <?php 
      echo $_SESSION['message']; 
        $_SESSION['message']='';
      ?></div> <?php 
    } 
       ?>
       </div>
    <section class="main-section">
    <form action="addquestion.php" method="post">
        <div class="container">
          <div class="row justify-content-center">
               <div class="col-md-8">
                <div class="card my-2 p-3">
                  <div class="card-body">
                    <h5 class="card-title py-2">Question </h5>
                      <div class="form-check">
                      <textarea class="form-control" name="question"></textarea><br>
                        <label for="option">Option</label><br>
                       A )<input type="text" class="form-check-input" name="option1"><br>
                       B )<input type="text" class="form-check-input" name="option2"><br>
                       C )<input type="text" class="form-check-input" name="option3"><br>
                       D )<input type="text" class="form-check-input" name="option4"><br> 
                        <label for="answer">Answer</label>
                       <input type="text" class="form-check-input" name="answer"><br>
                      </div>
                  </div>
                </div>
              </div>
            <div class="col-md-8 mb-5">
              <button type="submit" class="btn btn-success" name="answer-submit">Submit Question</button>
            </div>
          </div>
        </div>
    </form>
  </section>
        </div>
</main>
</body>
</html>
