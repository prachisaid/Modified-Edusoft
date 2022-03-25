<?php 
include 'partials/dbconnect.php';
session_start();
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
        #navbar nav{
            position: initial;
        }
    </style>
</head>

<body>
    <?php include 'partials/header.php' ?>

    <div id="cart_navbar">
        <div id="heading">
            <h1>Mylearning</h1>
        </div>
        <div id="nav_items">
            <a href="">All courses</a>
            <a href="">Wishlist</a>
        </div>
    </div>

    <div id="alert1" style="width: 68rem;
    margin-left: 10rem;">

    </div>
    <div id="cart_course">
<?php

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM `payment` WHERE `user_id` = '$user_id'";
$result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){
        $c_ids = unserialize($row['course_ids']);
        // echo var_dump($c_ids);
        if(is_array($c_ids)){
        for ($i=0; $i < count($c_ids); $i++) { 
            $course_ids = array_unique($c_ids);
            $sql1 = "SELECT * FROM `landing_page` WHERE `course_id` = '$course_ids[$i]'";
            $res1 = mysqli_query($conn, $sql1);

            while($r = mysqli_fetch_assoc($res1)){
                echo ' <a href="play_course.php?c_id='.$course_ids[$i].'" style="padding-top:0px">
                <div class="course" style="padding-top:0px">
                <div class="courseimg">
                    <img src="instructor/create/image/'.$r['course_image'].'" alt="" />
                </div>
                <div class="coursedetail" style="width:196px;">
                    <p class="heading">
                        '.$r['course_title'].'
                    </p>
                    <p class="instructor">Jose Portilla</p>
                </div>
               </div>
               </a>';
            }
        }
        }
    else{
        $sql1 = "SELECT * FROM `landing_page` WHERE `course_id` = '$c_ids'";
        $res1 = mysqli_query($conn, $sql1);

        while($r = mysqli_fetch_assoc($res1)){
            echo ' <a href="play_course.php?c_id='.$c_ids.'" style="padding-top:0px">
            <div class="course" style="padding-top:0px">
            <div class="courseimg">
                <img src="instructor/create/image/'.$r['course_image'].'" alt="" />
            </div>
            <div class="coursedetail" style="width:196px;">
                <p class="heading">
                    '.$r['course_title'].'
                </p>
                <p class="instructor">Jose Portilla</p>
            </div>
           </div>
           </a>';
        }
    }
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

    <script>
        var url_value = window.location.href;
        var url = new URL(url_value)
        var data = url.searchParams.get("data");
        console.log(data);

        if(data == "true"){
            document.getElementById("alert1").innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin:27px 11px 20px 11px;">
            You have successfully bought the course/'s!! Enjoy learning
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>`

        }
                    
    </script>
</body>



</html>