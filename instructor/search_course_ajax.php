<?php
    $search_value = $_POST['search'];
    session_start();
    $user_id = $_SESSION['user_id'];

    $conn = mysqli_connect("localhost", "root", "", "edusoft");
    if (!$conn) {
        die("Error: " . mysqli_connect_error());    
    }


    $sql = "SELECT * FROM `landing_page` WHERE `user_id` = '$user_id' and `course_title` LIKE '%{$search_value}%'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_assoc($result)){
            $course_title = $row['course_title'];
            $course_desc = $row['course_description'];

            echo '<a href="#" class="user_course">
                    <img src="/project/instructor/create/image/'.$row['course_image'].'" width="160px" alt="">
                    <div id="course_title">
                    '.$course_title.' <br>
                    <div id="desc">
                    '.$course_desc.'
                    </div>
                    </div>
                </a>';
            }
        }else{
            echo '<h2> No record found </h2>';
        }

?>