<?php
include "conn.php";
error_reporting(0);
// require_once("function.php");
session_start();

if (!isset($_SESSION['user'])) {
  $_SESSION['message']="please login first";
  header("Location: index.php");
  exit();
}
  // $email=$_SESSION['user'];
  // $q="select * from `users` where `user_email`='$email'";
  // $user_fetch=mysqli_query($con,$q);
  // if($user_fetch){

  // }else{
  //   die("Error: " . mysqli_error($con));
  // }
  // $row=mysqli_fetch_array($user_fetch);
  // print_r( $row);
  // $user_name=$row['user_name'];

  $u_email = $_SESSION['user'];
    $already_attend="select * from `score` where `email`='$u_email'";
    $already_attend_data=mysqli_query($con,$already_attend);
    if(mysqli_num_rows($already_attend_data)>0){
        $_SESSION['message']="$u_email already attend the quiz";  
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
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
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="quiz_css.css">
    <style>/* Coded by https://beproblemsolver.com  Visit for more such code */
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
 }</style>
  </head>
  <body>
    <!-- Header -->
    <header class="header">
      <nav class="nav">
        <a href="index.php" class="nav_logo">College Name</a>

        <ul class="nav_items">
          <li class="nav_item">
            <a href="index.php" class="nav_link">Home</a>
            <a href="quiz.php" class="nav_link">Quiz</a>
            <a href="#" class="nav_link">Contact</a>
          </li>
        </ul>
        <?php 
        if($_SESSION['user']){ 
          $user_email=$_SESSION['user'];
          echo $user_email;
          ?>
          <a href="logout.php"><button class="button" id="form-open">Logout</button></a>
        <?php }else{ ?>
          <a href="login1.php"><button class="button" id="form-open">Login</button></a>
        <?php }
        ?>
        
      
      </nav>
    </header>
    <main>
      <div class="home">
      <section class="main-section">
      <form action="checkanswers.php" method="post">
  <div class="container">
    <div class="row justify-content-center">
      <?php 
      $sql = "SELECT * FROM questions";
      $question_result = mysqli_query($con, $sql);

      while ($question_row = mysqli_fetch_assoc($question_result)) :
        $qid = $question_row['qid'];
        $question = $question_row['question'];
        $sql = "SELECT * FROM answers WHERE ans_id = $qid";
        $answer_result = mysqli_query($con, $sql);
      ?>
      <div class="col-md-8">
        <div class="card my-2 p-3">
          <div class="card-body">
            <h5 class="card-title py-2">Q.<?php echo $qid . " " . $question; ?></h5>
            <?php while ($answer_row = mysqli_fetch_assoc($answer_result)) : ?>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="checkanswer[<?php echo $qid; ?>]" value="<?php echo $answer_row['aid']; ?>">
              <?php echo $answer_row['answer']; ?>
            </div>
            <?php endwhile ?>
          </div>
        </div>
      </div>
      <?php endwhile ?>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8 mb-5">
        <button type="submit" class="btn btn-success" name="answer-submit">Submit Answers</button>
      </div>
    </div>
  </div>
</form>

  </section>

  
      </div>
      <div class="home">
        
      </div>
    </main>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
