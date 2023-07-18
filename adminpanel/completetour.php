<?php
    include "dbcon.php";
    include "auth.php";

    $tid = $_GET['tid'];
    $sql = "UPDATE `tours` SET `status` = 'completed' WHERE `tid` = '$tid'";
    $result = mysqli_query($con, $sql);
    if($result) {
        header('location: index.php');
    } else {
        header('location: index.php');
    }
?>