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

    $notes_id = $_POST['l_id'];
    $notes_title = $_POST['l_title'];
    $course_id = mysqli_real_escape_string($conn, $_POST['c_id']);
    $filename = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $valid_extensions = array("pdf", "zip", "pptx");
    $video_lec_id = $_POST['video_lec_id'];

    if(in_array($extension, $valid_extensions)){
        $new_name = rand() . "." . $extension;
        $file_destination = "upload/".$new_name;
        
        if(move_uploaded_file($_FILES['file']['tmp_name'], $file_destination)){
            $sql = "INSERT INTO `notes` (`notes_id`, `user_id` , `notes_title`, `notes_content` ,`course_id`, `st`) VALUES ('$notes_id', '$user_id' ,'$notes_title', '$new_name' ,'$course_id', current_timestamp())";
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
