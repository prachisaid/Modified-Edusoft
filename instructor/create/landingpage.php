<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $conn = mysqli_connect("localhost", "root", "", "edusoft");
    if(!$conn){
        die("Error: " .mysqli_connect_error());
    }


    if(isset($_SESSION['loggedin'])){
        $user_id = $_SESSION['user_id'];
        // echo $user_id;
    }
    $course_title = mysqli_real_escape_string($conn, $_POST['course_title']);
    $course_subtitle = mysqli_real_escape_string($conn, $_POST['course_subtitle']);
    $course_desc = mysqli_real_escape_string($conn, $_POST['course_description']);
    $cat_id = $_POST['category'];
    $subcat_id = $_POST['sub_category'];
    $course_id = $_POST['course_id'];

    $course_img = $_FILES['image']['name'];
    $course_video = $_FILES['video']['name'];

    $video_destination = "upload/".$course_video;
    $image_destination = "image/".$course_img;

    if(move_uploaded_file($_FILES['video']['tmp_name'], $video_destination) && move_uploaded_file($_FILES['image']['tmp_name'], $image_destination)){
        $sql = "INSERT INTO `landing_page` (`course_id`, `user_id` , `course_title`, `course_subtitle`, `course_description`, `course_category_id`, `course_subcat_id`, `course_image`, `landing_video`) VALUES ('$course_id', '$user_id' , '$course_title', '$course_subtitle', '$course_desc', '$cat_id', '$subcat_id', '$course_img', '$course_video')";
        $result = mysqli_query($conn, $sql);

    }

    // echo $user_id;
    // echo $course_img;
    // echo $course_id;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>course landing page</title>
    <link rel="stylesheet" href="create.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="goals_navbar">
        <a href="/project/instructor/course.php">Back to courses</a>
        <span>web d</span>
        <div>
            <button class="save">Save</button>
        </div>
    </div>

    <div id="container">
        <div id="sidecontentbar">
            <div class="heading">Plan your course</div>
            <div class="course_items">
                <ul>
                    <li> <a href="/project/instructor/create/intended_learners.php"> Intended learners</a></li>
                    <li> <a href="/project/instructor/create/curriculum.php"> Curriculum</a></li>
                    <li> <a href="/project/instructor/create/landingpage.php"> Course landing page</a></li>
                    <li> <a href="/project/instructor/create/pricing.php"> Pricing</a></li>
                </ul>
            </div>
        </div>
        <div id="content_page">
            <div class="main_page">
                <h1>Course landing page</h1>
                <div class="main_course">
                    <div class="form_objective">
                        <form name="Form1" id="submit_landing_page">
                            <div id="elem">
                                <label for="course_title">Course title</label>
                                <input type="text" name="course_title" id="obj1" class="info"
                                    placeholder="Insert your course title">

                                <label for="course_subtitle">Course subtitle</label>
                                <input type="text" name="course_subtitle" id="obj2" class="info"
                                    placeholder="Insert your course subtitle">

                                <label for="course_description">Course description</label>
                                <input type="text" name="course_description" id="course_description" class="info"
                                    placeholder="Insert your course description">


                                <label for="basic_info">Basic Info</label><br>

                                <label for="category" style="padding: 28px 293px 4px 0px;">Category</label>
                                <label for="sub_category">Sub category</label><br>
                                <select name="category" id="recheck_cat" onchange="getDept(this);">
                                    <option value="1" name="1">Development</option>
                                    <option value="2" name="2">IT and software</option>
                                    <option value="3" name="3">Design</option>
                                    <option value="4" name="4">Business</option>
                                    <option value="5" name="5">Marketing</option>
                                    <option value="6" name="6">Photography</option>
                                    <option value="7" name="7">Music</option>
                                    <option value="8" name="8">Teaching</option>
                                </select>

                                <select name="sub_category" id="sub_cat">
                                    <option value="1" name="1">Python</option>
                                    <option value="2" name="2">Javascript</option>
                                    <option value="3" name="3">Java Programming</option>
                                    <option value="4" name="4">Web development</option>
                                    <option value="5" name="5">C## programming</option>
                                    <option value="6" name="6">C Programming</option>
                                    <option value="7" name="7">React</option>
                                    <option value="8" name="8">Django</option>
                                </select>

                                <i id="arrow" class='bx bxs-chevron-down'></i>

                                <div class="images_for_page" style="margin-top: 23px ;">
                                    <label for="" style="margin-top: 23px;">Course Image</label>
                                    <div id="course_image">
                                        <div>
                                            <img src="/project/img/placeholder.jpg" alt="">
                                        </div>
                                        <div id="content">
                                            <p>Upload your course image here. It must meet our <span
                                                    style="color: blueviolet;"> course image quality standards </span>
                                                to be accepted. Important guidelines: 750x422 pixels; .jpg, .jpeg,. gif,
                                                or .png. no text on the image.</p>
                                            <input accept=".gif,.jpg,.jpeg,.png" type="file" name="image" id="FileUploaderS3-0--29"
                                                class="sr-only">
                                        </div>
                                    </div>

                                    <label for="" style="margin-top: 45px;">Course Video</label>
                                    <div id="course_image">
                                        <div>
                                            <img src="/project/img/placeholder.jpg" alt="">
                                        </div>
                                        <div id="content">
                                            <p>Students who watch a well-made promo video are <span
                                                    style="font-weight:bolder;"> 5X more likely to enroll </span>in your
                                                course. We've seen that statistic go up to 10X for exceptionally awesome
                                                videos. <span style="color: blueviolet;">Learn how to make yours
                                                    awesome!</span></p>
                                            <input
                                                accept=".avi,.mpg,.mpeg,.flv,.mov,.m2v,.m4v,.mp4,.rm,.ram,.vob,.ogv,.webm,.wmv"
                                                type="file" name="video" id="FileUploaderS3-0--30" class="sr-only">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" id="submit_form" value="Submit">
                        </form>
                    </div>

                </div>
            </div>
        </div>
</div>

        <div id="msg">

        </div>

        <script src="/project/js/jquery-3.6.0.min.js"></script>t
        <script src="/project/js/landing.js"></script>
        <script>
            $(document).ready(function(){
                // var course_id = 0;
                $(document).on("submit", "#submit_landing_page", function(e){
                    e.preventDefault();

                    var course_id = localStorage.getItem("c_id");
                    var form = new FormData(this);
                    form.append("course_id", course_id)

                    $.ajax({
                        url : "landingpage.php",
                        type : "POST",
                        data : form,
                        contentType : false,
                        processData : false,
                        success : function(data){
                            // $("#msg").html(data);
                        }
                    })
                })
            })
        </script>
</body>

</html>