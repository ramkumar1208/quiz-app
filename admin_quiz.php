<?php 

?>
<?php 
error_reporting(0);
session_start();
if(!$_SESSION['admin']){
    $_SESSION['message']="admin please login first";
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
    <link rel="stylesheet" href="admin_css.css" />
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
        if($_SESSION['admin']){ 
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
     <div class="container">
    <div class="buttons-container">
        <a href="addquestion.php" class="quiz-button">Add Question</a>
        <a href="editquestion.php" class="quiz-button">Edit Question</a>
    </div>
    </div>
          </div.

</main>
</body>
</html>
