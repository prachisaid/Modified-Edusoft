<?php
    session_start();
    if(!(isset($_SESSION['loggedin']) == true)) {
        header("location: login.php");
    }
?>