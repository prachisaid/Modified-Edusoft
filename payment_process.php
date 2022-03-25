<?php
    // include 'partials/dbconnect.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $conn = mysqli_connect("localhost", "root", "", "edusoft");
    if(!$conn){
        die("Error: " .mysqli_connect_error());
    }
        $payment_id = $_POST['payment_id'];
        $price = $_POST['amt'];
        $user_id = $_POST['user_id'];
        $data = $_POST['course_id'];

        // for ($i=0; $i < count($data); $i++) {  
        //     echo $data[$i];
        // }

        $payment_status ="completed";
        $course_str = serialize($data);

        $sql = "INSERT INTO `payment` (`amount`, `user_id`, `payment_status`, `payment_id`, `course_ids`, `added_on`) VALUES ('$price', '$user_id', '$payment_status', '$payment_id', '$course_str' , current_timestamp())";

        $result = mysqli_query($conn, $sql);

        // echo $result;
    }
     
?>