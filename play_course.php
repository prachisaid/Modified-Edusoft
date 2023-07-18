<?php

include 'partials/dbconnect.php';
session_start();

$c_id = $_GET['c_id'];
$user_id = $_SESSION['user_id'];
$username = explode(" ", $_SESSION['username']);
$user = $username[0];
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
</head>

<body>
    <div id="navbar">
        <nav style="position:initial; box-shadow:none; border:none; background-color:#1c1d1f; color:white;">
            <div class="logo">
                <img src="" width="40px" style="padding-bottom: 4px" alt="" />
                <a href="home.php" style="color: white; border-right: 1px solid rgb(209, 207, 207); padding-right: 27px">edusoft</a>
            </div>

            <div class="c_title" style="padding: 24px 17px 12px 17px;">
                <?php
                $sql = "SELECT * FROM `landing_page` WHERE course_id = $c_id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['course_title'];

                ?>
            </div>
            <div class="username" style="margin: 23px 14px 13px 1rem;">
                <h5><?php echo $user ?></h5>
            </div>

            <div style="margin-top: 23px; margin-left: 12px;">
                <a href="home.php" class="logout" style="color: white; border:none">Back</a>
            </div>
        </nav>
    </div>

    <div id="course_sections">

        <div id="section1">
            <div class="accordion" id="lectures">
            <h1 style="font-size: 20px;
    font-weight: 700;
    margin: 22px 11px 17px 9px;">Course content</h1>
    <h4 style="font-size:20px; font-weight:bold; margin: 26px 0px 20px 11px; font-style:oblique">Lectures</h4>
        <?php
        
        $sql = "SELECT * FROM `lectures` WHERE course_id = $c_id";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
            $lecture_id = $row['lecture_id'];
            $lecture_title = $row['lecture_title'];
            echo '<div class="card">
            <div class="card-header" id="heading' . $lecture_id . '">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#lecture' . $lecture_id . '" aria-expanded="true" aria-controls="lecture' . $lecture_id . '" style="font-weight: 700;
                    color: black;">
                       Lecture ' . $lecture_id . '
                    </button>
                </h2>
            </div>

            <div id="lecture'.$lecture_id.'" class="collapse" aria-labelledby="heading' . $lecture_id . '" data-parent="#lectures">
                <div class="card-body"  id="'.$lecture_id.'" onclick="new1(this.id);" style="padding-left: 37px; cursor: pointer;
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
    <h4 style="font-size:20px; font-weight:bold; margin: 26px 0px 20px 0px; font-style:oblique">Note's</h4>

<?php
        $sql3 = "SELECT * FROM `notes` WHERE `course_id` = '$c_id'";
        $result3 = mysqli_query($conn, $sql3);
        while ($row3 = mysqli_fetch_assoc($result3)) {
            $notes_id = $row3['notes_id'];
            $notes_title = $row3['notes_title'];

            echo '<div class="card">
            <div class="card-header" id="notes_heading' . $notes_id . '">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#notes' . $notes_id . '" aria-expanded="true" aria-controls="notes' . $notes_id . '" style="font-weight: 700;
                    color: black;">
                       Material ' . $notes_id . '
                    </button>
                </h2>
            </div>

            <div id="notes' . $notes_id . '" class="collapse" aria-labelledby="notes_heading' . $notes_id . '" data-parent="#lectures">
                <div class="card-body" style="padding-left: 37px; 
                font-size: 14px;" id="'.$notes_id.'" onclick="new2(this.id)">
                <i class="bx bx-play-circle" style="font-weight: bolder;
                padding: 1px 1px 1px 1px;
                position: relative;
                top: 2px;"></i> ' . $notes_title . '
                </div>
            </div>
        </div>';
        }
        ?>
            </div>
            </div>
        <div id="section2"> 
            <div id="video">
                <video src="/project/instructor/create/upload/31215191.mp4" controls></video>
            </div>
        </div>
    </div>

    <div id="test">

    </div>
    
    <footer style="margin-top: 300px;"> 
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
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </script>

    <script>
        var url_value = window.location.href;
        var url = new URL(url_value)
        var c_id = url.searchParams.get("c_id");

        function new1(id){
            console.log(id)
            // console.log(data);

            $.ajax({
                url : 'play_course_ajax.php',
                type : 'post',
                data : {
                    lec_id : id,
                    course_id : c_id
                },
                success : function(e){
                    $('#section2').html(e)
                }
            })
        }

        function new2(id){
            $.ajax({
                url : 'play_notes_ajax.php',
                type : 'post',
                data : {
                    lec_id : id,
                    course_id : c_id
                },
                success : function(e){
                    $('#section2').html(e)
                }
                
            })
        }
    </script>
</body>



</html>