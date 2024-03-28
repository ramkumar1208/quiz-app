<?php
     session_start();
     // Clear all session variables
     $_SESSION = [];
    $_SESSION[]=null;
    session_unset();
    session_destroy();
    header("Location: index.php");
?>