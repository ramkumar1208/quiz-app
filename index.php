<?php 
session_start();
// $_SESSION['user']='';
// $_SESSION['message']='';
?>
<!DOCTYPE html>
<!-- Coding by CodingLab || www.codinglabweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz App</title>
    <link rel="stylesheet" href="s_new.css" />
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
            <a href="index.php" class="nav_link">Home</a>
            <a href="quiz.php" class="nav_link">Quiz</a>
            <a href="#" class="nav_link">Contact</a>
            <a href="admin.php" class="nav_link">Admin</a>
          </li>
        </ul>
        <?php 
        if(isset($_SESSION['user'])){ 
          $email=$_SESSION['user'];
          echo $email;
          ?>
          <a href="logout.php"><button class="button" id="form-open">Logout</button></a>
        <?php }else{ ?>
          <a href="login1.php"><button class="button" id="form-open">Login</button></a>
        <?php }
        ?>
        
      </nav>
    </header>
    <div class="home">
      <div class="center-div"> 
    <?php if(isset($_SESSION['message'])!=""){ 
      ?>
      <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
      <?php 
      echo $_SESSION['message']; 
      ?></div> <?php 
    } 
       ?>
     </div>  
  </div>
    <!-- Home -->
    <!-- <section class="home">
      <div class="form_container">
        <i class="uil uil-times form_close"></i>
        Login From
        <div class="form login_form">
          <form action="login.php" method="post">
            <h2>Login</h2>

            <div class="input_box">
              <input type="email" placeholder="Enter your email" required />
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input type="password" placeholder="Enter your password" required />
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <div class="option_field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Remember me</label>
              </span>
              <a href="#" class="forgot_pw">Forgot password?</a>
            </div>

            <button class="button">Login Now</button>

            <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
          </form>
        </div>

        Signup From
        <div class="form signup_form">
          <form action="signup.php" method="post">
            <h2>Signup</h2>
            <div class="input_box">
              <input type="name" placeholder="Enter your name" required name="u_name"/>
              <i class="uil uil-envelope-alt name"></i>
            </div>
            <div class="input_box">
              <input type="email" placeholder="Enter your email" required name="u_email"/>
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input type="text" placeholder="Enter your mobile" required name="u_mobile"/>
              <i class="uil uil-envelope-alt mobile"></i>
            </div>
            <div class="input_box">
              <input type="date" placeholder="Enter your date of birth" required name="date_of_birth"/>
              <i class="uil uil-envelope-alt dob"></i>
            </div>

            <div class="input_box">
              <input type="password" placeholder="Create password" required name="u_pass"/>
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <div class="input_box">
              <input type="password" placeholder="Confirm password" required />
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <button class="button">Signup Now</button>
            <input type="submit" value="Signup Now" name="signup" class="button">

            <div class="login_signup">Already have an account? <a href="#" id="login">Login</a></div>
          </form>
        </div>
      </div>
    </section> -->

    <!-- <script src="script.js"></script> -->
  </body>
</html>
