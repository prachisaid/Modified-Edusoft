<?php
    include 'partials/dbconnect.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EduSoft</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="home.css" />

    <style>
    .bgmain img {
    height: 419px;
    margin-top: 50px;
    width: 100%;
}
    </style>
</head>

<body onload="updateCart(<?php echo $user_id; ?>)">
    <?php include 'partials/header.php' ?>

    <div id="catnavbar">
        <nav>
            <?php
                $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $cat_id = $row['category_id'];
                    $cat_name = $row['category_name'];
                    echo '<a href="development.php?cat_id='.$cat_id.'"> '.$cat_name.' </a>';
                }
            ?>
        </nav>
    </div>
    
    <div class="bgmain">
        <img src="img/bg.jpg" alt="" / style="margin-top: 114px;">
        <div class="box">
            <h4>EduSoft make <br />it count</h4>
            <p style="font-weight: 400">
                Learning is a lasting investment<br />Get started on your goals today
            </p>
        </div>
    </div>

    <?php 
        include 'partials/categories.php';
    ?>

    <div id="home_content">
        <?php
            $sql = "SELECT * FROM `categories` LIMIT 5";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){
                $cat_id = $row['category_id'];

                echo '<div id="cat">
                <div id="heading">
                   '.$row['category_name'].' Courses
                </div>
                <div id="actual_content">';
                $q = "SELECT * FROM landing_page WHERE course_category_id = $cat_id";
                $res = mysqli_query($conn, $q);

                while($r = mysqli_fetch_assoc($res)){

                    $course_id = $r['course_id'];
                    $course_image = $r['course_image'];
                    $course_title = $r['course_title'];
                    $course_price = $r['course_price'];

                echo '
                    <a href="course_page.php?course_id=' . $course_id . '" class="new">
                <div id="course_image">
                    <img src="instructor/create/image/'.$course_image.'" alt="">
                </div>
                <div id="course_info">
                    <div id="title">
                        '.$course_title.'
                    </div>
                    <div id="instructor">
                        Jose Portilla
                    </div>
                </div>
                <div id="price">
                    $'.$course_price.'
                </div>
            </a>';
                }
                echo '</div>
                </div>';
            }
        ?>
    </div>
        
     <footer> 
        <div class="lang"><i class='bx bx-globe globe'></i>English</div>
        <div class="row">
            <div class="col-md-2 ">
                <a href="#" id="name">EduSoft</a>
            </div>
            <div class="col-md-2">
                <a href="#">About us</a>
            </div>
            <div class="col-md-2">
                <a href="#">Terms</a>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <a href="#">Home</a>
            </div>
            <div class="col-md-2">
                <a href="#">Contact us</a>
            </div>
            <div class="col-md-2">
                <a href="#">Privacy Policy</a>
            </div>
            <div class="col-md-5">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="#">Teach on edusoft</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="#">Go to cart</a>
            </div>
        </div>

        <div class="row company">
            <div class="col-md-8 name">
                edusoft
            </div>
            <div class="col-md-2 copyright">
                &copy 2021 edusoft, Inc
            </div>
        </div>
    </footer> 

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <script src="cart_script.js"></script>
    <script src="js/categories.js"></script>
</body>



</html>