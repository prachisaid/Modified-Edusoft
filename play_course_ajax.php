<?php

    include 'partials/dbconnect.php';
    $lec_id = $_POST['lec_id'];
    $c_id = $_POST['course_id'];

    $sql = "SELECT * FROM `lectures` WHERE course_id = $c_id and lecture_id = $lec_id";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        echo '<div id="video">
              <video src="/project/instructor/create/upload/'.$row['lecture_content'].'" controls></video>
              </div>';
    }
    
?>