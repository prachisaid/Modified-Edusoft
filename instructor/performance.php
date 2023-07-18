<?php
    session_start();
    $user_id = $_SESSION['user_id'];

$conn = mysqli_connect("localhost", "root", "", "edusoft");
if (!$conn) {
    die("Error: " . mysqli_connect_error());
}

if (isset($_SESSION['loggedin'])) {
    $username = explode(" ", $_SESSION['username']);
    $user_id = $_SESSION['user_id'];
    $user = $username[0];
}
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
    <style>
        #overview p{
            font-size: 14px;
            margin-top: 12px;
        }

        #box{
            border: 1px ;
            min-height: 300px;
            max-width: 1000px;
            width: 60%;
            margin: 40px 12px 12px 1px;
            box-shadow: 0 2px 4px rgb(0 0 0 / 8%), 0 4px 12px rgb(0 0 0 / 8%);
        }

        .overview{
            margin-top: 12px;
            margin-bottom: 12px;
            padding: 8px 12px 12px 20px;
            font-size: 18px;
            border-bottom: 1px solid rgba(202, 194, 194, 0.822);
        }

        .overview h4{
            color: #6c757dbe;
            font-weight: 500;
            font-size: 16.8px;
        }

        .overview div{
            font-weight: 600;
            margin-top: 7px;
            font-size: 19px;
        }

        #sellc{
            display: flex;
            font-weight: 600;
        }

        #sellc :first-child{
            padding: 0px 13px 3px 8px;
            width: 73%;
        }

        .title1{
            /* margin-top: 1; */
            font-weight: 400;
            font-size: 13px;
            padding: 16px 0px 1px 10px;
        }
    </style>
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
                <a href="/project/instructor/course.php">
                    <i class='bx bxs-videos'></i>
                    <span class="links_name">Courses</span>
                </a>
                <span class="tooltip">Courses</span>
            </li>

            <li>
                <a href="/project/instructor/communication.php">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Communication</span>
                </a>
                <span class="tooltip">Communication</span>
            </li>

            <li>
                <a href="/project/instructor/performance.php">
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
        <h1 class="title">Overview</h1>

        <div id="overview">
           <p>Get top insights about your course</p>

           <div id="box">
               <div class="overview">
                   <h4>Total Revenue</h4>
                   <?php
                        
                        $sql = "SELECT * FROM `payment` WHERE `user_id` = '$user_id'";
                        $result = mysqli_query($conn, $sql);
                        $amount = 0;

                        while($row = mysqli_fetch_assoc($result)){
                            $amount += $row['amount'];
                        }
                   ?>
                   <div><?php echo $amount ?> INR</div>
               </div>

               <div id="sellc">
                    <div>
                        <div>
                            Course Title
                        </div>
                        <?php

                            $sql = "SELECT * FROM `payment` WHERE `user_id` = '$user_id'";
                            $result = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_assoc($result)){
                                
                                $c_ids = unserialize($row['course_ids']);

                                if(is_array($c_ids)){
                                for ($i=0; $i < count($c_ids); $i++) { 
                                    $course_ids = array_unique($c_ids);
                                    $sql1 = "SELECT * FROM `landing_page` WHERE `course_id` = '$course_ids[$i]'";
                                    $res1 = mysqli_query($conn, $sql1);
                                    
                                    while($r=mysqli_fetch_assoc($res1)){
                                        echo '<div class="title1">'.$r['course_title'].'/</div>';
                                    }
                                }
                            }else{
                                $sql1 = "SELECT * FROM `landing_page` WHERE `course_id` = '$c_ids'";
                                $res1 = mysqli_query($conn, $sql1);
                                
                                while($r=mysqli_fetch_assoc($res1)){
                                    echo '<div class="title1">'.$r['course_title'].'/</div>';
                                }
                            }
                            }
                        
                        ?>
                    </div>

                    <div>
                        
                    </div>
               </div>
           </div>
        </div>
    </div>
    <script src="/project/js/jquery-3.6.0.min.js"></script>
</body>

</html>