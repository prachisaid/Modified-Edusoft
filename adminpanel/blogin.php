<?php
include "dbcon.php";
    $name = $_POST['uname'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM `admin` WHERE `name` = '$name' AND `pass` = '$pass'";
    $result = mysqli_query($con, $sql);
    if($result) {
        $num = mysqli_num_rows($result);
        if($num > 0) {
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['name'] = $row['name'];
            $_SESSION['aid'] = $row['aid'];
            $_SESSION['loggedin'] = true;
            header('location: index.php');
        } else {
            header('location: login.php');
        }
    } else {
        header('location: login.php');
    }
?>