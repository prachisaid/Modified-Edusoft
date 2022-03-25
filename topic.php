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
        }
    </style>
</head>

<body onload="updateCart(<?php echo $user_id; ?>)">
    <?php
   
    include 'partials/header.php'
    ?>
    <?php 
        include 'partials/categories.php';
    ?>

    <div id="catnavbar">
        <nav>
            <?php

            $subcategory_id = $_GET['subcat_id'];
            $sql = "SELECT * FROM `subcategories` WHERE `subcategory_id` = $subcategory_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $subcategory_name = $row['subcategory_name'];
            $catid = $row['main_category_id'];

            $sql = "SELECT * FROM `categories` WHERE category_id = $catid";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $catname = $row['category_name'];

            ?>
            <a href="" class="development"><?php echo $catname ?></a>

            <?php
            $sql = "SELECT * FROM `subcategories` WHERE `main_category_id` = $catid";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $subcat_name = $row['subcategory_name'];
                $subcat_id = $row['subcategory_id'];

                echo '<a href="topic.php?subcat_id=' . $subcat_id . '">' . $subcat_name . '</a>';
            }
            ?>


        </nav>
    </div>

    <div class="section">

        <?php
        echo '<h4> ' . $subcategory_name . ' Courses</h4>
            <p>Courses to get you started</p>
            <div class="sort">
            <a href="" style="color:blueviolet; font-weight:bold;">Most Popular</a>
            </div>';
        ?>

        <div id="most_popular">
        <?php
        $subcat_id = $_GET['subcat_id'];
        $sql = "SELECT * FROM `landing_page` WHERE `course_subcat_id` = '$subcat_id'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $course_id = $row['course_id'];
            echo ' <a href="course_page.php?course_id=' . $course_id . '" style="margin-right: 30px;">
                   <div class="courseimg">
                   <img src="instructor/create/image/' . $row['course_image'] . '" width="210px" alt="" />
                   </div>
                   <div class="coursedetail">
                   <p class="heading">
                   ' . $row['course_title'] . '
                   </p>
                   <p class="instructor">Jose Portilla</p>
                   <p class="prize">$' . $row['course_price'] . '</p>
                   </div>
                   </a>';
        }
        ?>

</div>
    </div>

    <div id="sub_cat_sec">
        <div id="heading">
            <h5>Popular topics in <?php echo $subcategory_name ?></h5>
        </div>
        <div id="sub_categories">
            <?php
            $sql = "SELECT * FROM `subcategories` WHERE `main_category_id` = $catid";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $subcat_name = $row['subcategory_name'];
                $subcat_id = $row['subcategory_id'];

                echo '<a href="topic.php?subcat_id=' . $subcat_id . '">' . $subcat_name . '</a>';
            }
            ?>
        </div>
    </div>

    <div id="all_courses">
        <div id="heading">
            <h5>All <?php echo $subcategory_name; ?> courses</h5> 
        </div>
        <?php
        $subcat_id = $_GET['subcat_id'];
        $sql = "SELECT * FROM `landing_page` WHERE `course_subcat_id` = '$subcat_id'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $course_id = $row['course_id'];
            $course_image = $row['course_image'];
            $course_title = $row['course_title'];
            $course_subtitle = $row['course_subtitle'];
            $course_price = $row['course_price'];

            echo ' <a href="course_page.php?course_id=' . $course_id . '" class="new">
                <div id="course_image">
                    <img src="instructor/create/image/'.$course_image.'" alt="">
                </div>
                <div id="course_info">
                    <div id="title">
                        '.$course_title.'
                    </div>
                    <div id="subtitle">
                        '.$course_subtitle.'
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="js/categories.js"></script>
    <script src="cart_script.js"></script>
</body>



</html>