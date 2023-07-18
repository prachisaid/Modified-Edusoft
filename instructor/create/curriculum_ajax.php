<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $conn = mysqli_connect("localhost", "root", "", "edusoft");
    if(!$conn){
        die("Error: " .mysqli_connect_error());
    }

    if(isset($_SESSION['loggedin'])){
        $user_id = $_SESSION['user_id'];
        // echo $user_id;
    }

    $lecture_id = $_POST['l_id'];
    $lecture_title = $_POST['l_title'];
    $course_id = mysqli_real_escape_string($conn, $_POST['c_id']);
    $filename = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $valid_extensions = array("mp4", "mov", "mpeg");
    $video_lec_id = $_POST['video_lec_id'];

    if(in_array($extension, $valid_extensions)){
        $new_name = rand() . "." . $extension;
        $file_destination = "upload/".$new_name;
        
        if(move_uploaded_file($_FILES['file']['tmp_name'], $file_destination)){
            $sql = "INSERT INTO `lectures` (`lecture_id`, `user_id` , `lecture_title`, `lecture_content` ,`course_id`, `st`) VALUES ('$lecture_id', '$user_id' ,'$lecture_title', '$new_name' ,'$course_id', current_timestamp())";
            if($result = mysqli_query($conn, $sql)){
                echo true;
            }
            else{
                echo false;
            }
        }
    }
    }
?>