<?php

    include 'partials/dbconnect.php';
    $lec_id = $_POST['lec_id'];
    $c_id = $_POST['course_id'];

    $sql = "SELECT * FROM `notes` WHERE course_id = $c_id and notes_id = $lec_id";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        echo '<div id="video">
              <iframe src="/project/instructor/create/upload/'.$row['notes_content'].'" style="margin: 22px 12px 12px 12px;" width="97%" height="600px"></iframe>
              </div>';
    }
    
?>