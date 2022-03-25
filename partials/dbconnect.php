<?php

$conn = mysqli_connect("localhost", "root", "", "edusoft");
if(!$conn){
    die("Error: " .mysqli_connect_error());
}

?>