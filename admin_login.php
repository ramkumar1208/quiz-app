<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();
    include "conn.php";
    $_SESSION['message']="";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $u_email=$_POST['u_email'];
        $u_pass=$_POST['u_pass'];
        $search_query="select * from `teachers` where `t_email`='$u_email' && `t_pass`='$u_pass'";
        $search_users=mysqli_query($con,$search_query);
        if(mysqli_num_rows($search_users) >= 1){
          $_SESSION['admin']=$u_email;
          echo "<script>window.location.href = 'admin.php';</script>";
        //   header(" Location : admin.php ");
        }else if(mysqli_num_rows($search_users) == 0){
          $_SESSION['message']="admin not found";
        //   header("Location: admin_login.php");
          exit;
        }
    }
    
?>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Quiz App</title>
    <link rel="stylesheet" href="s.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
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
        <a href="admin_login.php"><button class="button" id="form-open">Login</button></a>
      </nav>
    </header>
    <div class="login-box">
    
    <?php if($_SESSION['message']!=""){ 
      ?>
      <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
      <strong>Warning!</strong>
      <?php 
      echo $_SESSION['message']; 
      ?></div> <?php 
    } 
       ?>
      
      <h1>Admin Login</h1>
      <form action="admin_login.php" method="post">
        <label>Email</label>
        <input type="email" placeholder="Enter your email" required name="u_email"/>
        <label>Password</label>
        <input type="password" placeholder="Enter your password" required name="u_pass"/>
        <input type="submit" value="Login" />
      </form>
      <p class="para-tag">
      Not have an account? <a href="admin_register.php">Sign Up Here</a>
    </p>
    </div>
  
  </body>
</html></span>