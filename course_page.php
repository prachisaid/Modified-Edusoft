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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="home.css" />
    <link rel="stylesheet" href="development.css">
    <style>
        #navbar nav{
            position: initial;
            border-bottom: none;
        }
    </style>
</head>

<body onload="updateCart(<?php echo $user_id; ?>)">
    <?php include 'partials/header.php'; ?>

    <div id="course_details">
        <?php
        $course_id = $_GET['course_id'];
        $sql = "SELECT * FROM `landing_page` WHERE `course_id` = '$course_id'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $landing_video = $row['landing_video'];
            $course_title = $row['course_title'];
            $course_subtitle = $row['course_subtitle'];
            $course_desc = $row['course_description'];
            $course_price = $row['course_price'];
        }

        echo '<div id="starter">
            <div id="course_title">
                ' . $course_title . '
            </div>
            <div id="course_subtitle">
                ' . $course_subtitle . '
            </div>
            <div id="createdby">
                Created by <span style="font-weight: 500;
                color: #b949dd;">Jose Portilla</span>
            </div>
        </div>';
        ?>
        <div id="details">
            <?php

            $sql1 = "SELECT * FROM `intended_learners` WHERE `course_id` = '$course_id'";
            $result1 = mysqli_query($conn, $sql1);
            while ($r = mysqli_fetch_assoc($result1)) {
                $course_req1 = $r['course_req1'];
                $course_req2 = $r['course_req2'];
                $obj1 = $r['course_objective1'];
                $obj2 = $r['course_objective2'];
                $obj3 = $r['course_objective3'];
                $obj4 = $r['course_objective4'];
                $obj5 = $r['course_objective5'];
                $who1 = $r['course_intended1'];
                $who2 = $r['course_intended2'];
                
                if (isset($_SESSION['loggedin'])) {
                    $user_id = $_SESSION['user_id'];
                }
            }
            echo '<video src="instructor/create/upload/' . $landing_video . '" controls style="width: 326px;
            margin: 11px 1px 1px 12px;"></video>
            <div class="price"><i class="bx bx-rupee"></i>' . $course_price . '</div>
            <div id="cart"> 
                <div id="addtocart" onclick="add_to_cart(' . $course_id . ',' . $user_id . ')">Add to cart </div>
                <div id="wishlist" onclick="add_to_list(' . $course_id . ',' . $user_id . ')"><i class="bx bx-heart"></i></div> 
            </div> 
            <div id="rzp-button1" class="buy" onclick="buyNow('.$course_price.', '.$course_id.')"> Buy now </div>
            <div id="req">
                <ul>
                    Requirements
                    <li>' . $course_req1 . '</li>
                    <li>' . $course_req2 . '</li>
                </ul>
            </div>
            <div id="intend">
                <ul>
                    Who this course is for
                    <li>' . $who1 . '</li>
                    <li>' . $who2 . '</li>
                </ul>
            </div>
            ';
            ?>
        </div>
    </div>

    <?php
    echo '<div id="learn">
            <h1>What you\'ll learn</h1>
            <ul>
                <li>- ' . $obj1 . '</li>
                <li>- ' . $obj2 . '</li>
                <li>- ' . $obj3 . '</li>
                <li>- ' . $obj4 . '</li>
                <li>- ' . $obj5 . '</li>
            </ul>
        </div>';
    ?>

    <div class="accordion" id="lectures">
        <h1>Course content</h1>

        <?php
        $sql2 = "SELECT * FROM `lectures` WHERE `course_id` = '$course_id'";
        $result2 = mysqli_query($conn, $sql2);
        while ($row1 = mysqli_fetch_assoc($result2)) {
            $lecture_id = $row1['lecture_id'];
            $lecture_title = $row1['lecture_title'];

            echo '<div class="card">
            <div class="card-header" id="heading' . $lecture_id . '">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#lecture' . $lecture_id . '" aria-expanded="true" aria-controls="lecture' . $lecture_id . '" style="font-weight: 700;
                    color: black;">
                       Lecture ' . $lecture_id . '
                    </button>
                </h2>
            </div>

            <div id="lecture' . $lecture_id . '" class="collapse" aria-labelledby="heading' . $lecture_id . '" data-parent="#lectures">
                <div class="card-body" style="padding-left: 37px;
                font-size: 14px;">
                <i class="bx bx-play-circle" style="font-weight: bolder;
                padding: 1px 1px 1px 1px;
                position: relative;
                top: 2px;"></i> ' . $lecture_title . '
                </div>
            </div>
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

    <!-- <script src="js/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="cart_script.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        console.log("hello")
        // var url_value = window.location.href;
        // var url = new URL(url_value)
        // var course_id = url.searchParams.get("course_id");
        // console.log(course_id);

        // localStorage.setItem('cart_id', course_id)

        let cart = localStorage.getItem("cart");
        let wishlist = localStorage.getItem('wishlist');

        function add_to_cart(c_id, u_id) {

            if (cart == null) {
                let products = [];
                let product = {
                    course_id: c_id,
                    user_id: u_id,
                    quantity: 1
                }
                products.push(product);
                localStorage.setItem("cart", JSON.stringify(products))
                console.log("product is added for first time")
            } else {
                let pcart = JSON.parse(cart)

                    let product = {
                        course_id: c_id,
                        user_id: u_id,
                        quantity: 1
                    }
                    pcart.push(product)
                    localStorage.setItem("cart", JSON.stringify(pcart))
                    alert("Your product has been added to cart")
                }
        }

        function add_to_list(c_id, u_id) {

            if (wishlist == null) {
                let products = [];
                let product = {
                    course_id: c_id,
                    user_id: u_id,
                    quantity: 1
                }
                products.push(product);
                localStorage.setItem("wishlist", JSON.stringify(products))
                console.log("product is added for first time")
            } else {
                let pwishlist = JSON.parse(wishlist)

                    let product = {
                        course_id: c_id,
                        user_id: u_id,
                        quantity: 1
                    }
                    pwishlist.push(product)
                    localStorage.setItem("wishlist", JSON.stringify(pwishlist))
                    alert("Your product has been added to cart")
                }
        }
        // })
    </script>
</body>



</html>