<?php
session_start();
$user_id = $_SESSION['user_id'];

$conn = mysqli_connect("localhost", "root", "", "edusoft");
if (!$conn) {
    die("Error: " . mysqli_connect_error());
}

$sql = "SELECT `tutor_bit` from `users` WHERE `user_id` = '$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($row['tutor_bit'] == true){

}
else{
    header("location: /project/tutor.php");
}

if (isset($_SESSION['loggedin'])) {
    $username = explode(" ", $_SESSION['username']);
    $user_id = $_SESSION['user_id'];
    $user = $username[0];
}

// echo $user;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <div class="logo_name">EduSoft</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list" style="list-style: none;">

            <li>
                <a href="/project/instructor/course.html">
                    <i class='bx bxs-videos'></i>
                    <span class="links_name">Courses</span>
                </a>
                <span class="tooltip">Courses</span>
            </li>

            <li>
                <a href="#">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Communication</span>
                </a>
                <span class="tooltip">Communication</span>
            </li>

            <li>
                <a href="#">
                    <i class='bx bxs-bar-chart-alt-2'></i>
                    <span class="links_name">Performance</span>
                </a>
                <span class="tooltip">Performance</span>
            </li>


    </div>
    <div class="navbar">
        <div class="username">
            <?php
                echo $user;
                // echo session_id();
            ?>
        </div>
        <div class="student">
            <a href="/project/home.php" style="color: #a435f0;">Student</a>
        </div>
    </div>

    <div class="card">
        <h1 class="title">Courses</h1>
        <input type="search" name="searchcourses" id="searchcourses" placeholder="Search your courses">
        <i class='bx bx-search searchicon'></i>
        <button class="sort">Newest <i class='bx bxs-chevron-down'></i></button>
        <a href="/project/instructor/create/1.php" class="newcourse">New course </a>
        <div class="options">
            <a href="">Newest</a>
            <a href="">Oldest</a>
            <a href="">Z-A</a>
            <a href="">A-Z</a>
        </div>

        <div id="courses">
            <?php
            $sql = "SELECT * FROM `landing_page` WHERE `user_id` = '$user_id'";
            $result = mysqli_query($conn, $sql);
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
            ?>
            
        </div>

        <div class="create">
            <img src="/project/img/instructor_getting_started.jpg" alt="">
            <div>
                <h1>Create an engaging course</h1>
                <p>Whether you've been teaching for years or are teaching for the first time, you can make an engaging course. And help out the students in need for knowledge in a better way.</p>
                <a href="/project/instructor/create/1.html">Get started</a>
            </div>
        </div>
    </div>
    <script src="/project/js/jquery-3.6.0.min.js"></script>
    <script src="/project/js/index.js"></script>
    <script>
        var url_value = window.location.href;
        var url = new URL(url_value)
        var data = url.searchParams.get("data");
        // console.log(typeof(data));1q

        $(document).ready(function(){
            $('#searchcourses').on("keyup", function(){
                var search_term = $(this).val();

                $.ajax({
                    url : "search_course_ajax.php",
                    type : 'post',
                    data : {search : search_term},
                    success : function(data){
                        $('#courses').html(data);
                    }
                })
            })
        })
    </script>
</body>

</html>