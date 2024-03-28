<?php
include "conn.php";
// require_once("function.php");
session_start();

if (!isset($_SESSION['admin'])) {
  $_SESSION['message']="please login first";
  header("Location: admin.php");
  exit();
}
  $u_email = $_SESSION['admin'];

  
    if(isset($_GET['edit_question']) && !empty($_GET['edit_qid'])){

    }elseif(isset($_GET['delete_qid']) && !empty($_GET['delete_qid'])){
        echo "delete works";

        $delete_query="delete from `questions` where `qid`='{$_GET['delete_qid']}'";
        $delete_ques=mysqli_query($con,$delete_query);
        if($delete_ques){
            $_SESSION['message']="Question deleted Successfully ";
        }else{
            $_SESSION['message']="Question not deleted ";
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
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="quiz_css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
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
    <?php
// Assuming $con is your mysqli connection object

function totalquestion($con) {
    $sql = "SELECT * FROM questions";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    return $rows;
}

?>

<main>
    <div class="home">
        <div class="center-div"> 
            <?php if($_SESSION['message'] != ""): ?>
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                    <?php 
                        echo $_SESSION['message']; 
                        $_SESSION['message'] = '';
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <section class="main-section">
            <!-- <form action="editquestion.php" method="post"> -->
                <?php 
                    for ($i = 1; $i <= totalquestion($con); $i++) :
                        $question_sql = "SELECT * FROM questions where qid = $i";
                        $question_result = mysqli_query($con, $question_sql);
                        while ($question_row = mysqli_fetch_assoc($question_result)) :
                            $answer_sql = "SELECT * FROM answers where ans_id = $i";
                            $answer_result = mysqli_query($con, $answer_sql);
                ?>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card my-2 p-3">
                                            <div class="card-body">
                                                <h5 class="card-title py-2">Q.<?php echo $question_row['qid'] . " " . $question_row["question"]; ?> </h5>
                                                <?php while ($answer_row = mysqli_fetch_assoc($answer_result)) : ?>
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" name="checkanswer[<?php echo $answer_row['ans_id']; ?>]" value="<?php echo $answer_row['aid']; ?>" disabled>
                                                        <?php echo $answer_row['answer']; ?>
                                                    </div>
                                                <?php endwhile; ?>
                                            <a href="question_edit.php?edit_qid=<?php echo $question_row['qid']; ?>"><button name="edit_question">Edit</button> </a> 
                                            <a href="editquestion.php?delete_qid=<?php echo $question_row['qid']; ?>"> <button name="delete_question" onclick="return confirmDelete(<?php echo $question_row['qid']; ?>)">Delete</button></a>         
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php 
                        endwhile; // end of while loop fetching questions
                    endfor; // end of for loop
                ?>
                <!-- <div class="col-md-8 mb-5">
                    <button type="submit" class="btn btn-success" name="answer-submit">Submit Answers</button>
                </div> -->
            <!-- </form> -->
        </section>
    </div>
    <div class="home"></div>
</main>

<script>
    function confirmDelete(questionId) {
        return confirm("Are you sure you want to delete question " + questionId + "?");
    }
</script>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
      <!-- <script>
            
            function confirmDelete(questionId) {
                if (confirm("Are you sure you want to delete question " + questionId + "?")) {
                    // If user confirms, submit the form
                    return true;
                } else {
                    // If user cancels, do not submit the form
                    return false;
                }
            }
            </script> -->
  </body>
</html>
