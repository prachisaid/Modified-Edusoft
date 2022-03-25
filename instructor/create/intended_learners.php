<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $conn = mysqli_connect("localhost", "root", "", "edusoft");
    if(!$conn){
        die("Error: " .mysqli_connect_error());
    }


    if(isset($_SESSION['loggedin'])){
        $user_id = $_SESSION['user_id'];
        echo $user_id;
    }

        $obj1 = mysqli_real_escape_string($conn, $_POST['o1']);
        $obj2 = mysqli_real_escape_string($conn, $_POST['o2']);
        $obj3 = mysqli_real_escape_string($conn, $_POST['o3']);
        $obj4 = mysqli_real_escape_string($conn, $_POST['o4']);
        $obj5 = mysqli_real_escape_string($conn, $_POST['o5']);

        $req1 = mysqli_real_escape_string($conn, $_POST['r1']);
        $req2 = mysqli_real_escape_string($conn, $_POST['r2']);

        $intd1 = mysqli_real_escape_string($conn, $_POST['i1']);
        $intd2 = mysqli_real_escape_string($conn, $_POST['i2']);
        // $user_id = $_SESSION['user_id'];


        $sql = "INSERT INTO `intended_learners` (`user_id`, `course_objective1`, `course_objective2`, `course_objective3`, `course_objective4`, `course_objective5`, `course_req1`, `course_req2`, `course_intended1`, `course_intended2`) VALUES ('$user_id' , '$obj1', '$obj2', '$obj3', '$obj4', '$obj5', '$req1', '$req2', '$intd1', '$intd2')";

        if($result = mysqli_query($conn, $sql)){
            $last_id = $conn->insert_id;
            echo "<script> var course_id = ".$last_id."
                localStorage.setItem('c_id', course_id)
                  </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive side</title>
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="create.css" />
</head>

<body>
    <div class="goals_navbar">
        <a href="/project/instructor/course.php">Back to courses</a>
        <span>web d</span>
        <div>
            <button class="save">Save</button>
        </div>
    </div>

    <div id="alert1">
        
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
                <h1>Intended learners</h1>
                <div class="main_course">
                    <p>The following descriptions will be publicly visible on your Course Landing Page and will have a direct
                        impact on your course performance. <br> These descriptions will help learners decide if your course is
                        right for them.</p>
                    <div class="form_objective">
                        <form action="">
                            <div id="elem" class="elem">
                                <h3>What will students learn in your course?</h3>
                                <div>You must enter at least 5 learning objectives or outcomes that learners can expect to
                                    achieve after completing your course.</div>
                                <input type="text" name="obj1" id="obj1" class="obj"
                                    placeholder="Example: Define the roles and responsibilities of a project manager">
                                <input type="text" name="obj2" id="obj2" class="obj"
                                    placeholder="Example: Estimate project timelines and budgets">
                                <input type="text" name="obj3" id="obj3" class="obj"
                                    placeholder="Example: Identify and manage project risks">
                                <input type="text" name="obj4" id="obj4" class="obj"
                                    placeholder="Example: Complete a case study to manage a project from conception to completion">
                                <input type="text" name="obj5" id="obj5" class="obj"
                                    placeholder="Example: Complete a case study to manage a project from conception to completion">
        
                            </div>
                        </form>
                        <button id="more" class="more">
                            <i class='bx bxs-info-circle' id="btn"></i>
                            <span>These details are permanent</span>
                        </button>
                    </div>
                    <div class="form_objective">
                        <form action="">
                            <div id="elem" class="elem">
                                <h3>What are the requirements or prerequisites for taking your course?</h3>
                                <div>List the required skills, experience, tools or equipment learners should have prior to
                                    taking your course.<br>
                                    If there are no requirements, use this space as an opportunity to lower the barrier for
                                    beginners.</div>
                                <input type="text" name="req1" id="req1" class="obj"
                                    placeholder="Example: No programming experience needed you will learn everything you need to know">
                                <input type="text" name="req2" id="req2" class="obj"
                                    placeholder="Example: No programming experience needed you will learn everything you need to know">
        
                            </div>
                        </form>
                        <button id="more" class="more">
                            <i class='bx bxs-info-circle' id="btn"></i>
                            <span>These details are permanent</span>
                        </button>
                    </div>
                    <div class="form_objective">
                        <form action="">
                            <div id="elem" class="elem">
                                <h3>Who is this course for?</h3>
                                <div>Write a clear description of the intended learners for your course who will find your course content valuable.<br>
                                    This will help you attract the right learners to your course.</div>
                                <input type="text" name="intd1" id="intd1" class="obj"
                                    placeholder="Example: No programming experience needed you will learn everything you need to know">
                                <input type="text" name="intd2" id="intd2" class="obj"
                                    placeholder="Example: No programming experience needed you will learn everything you need to know">
        
                            </div>
                        </form>
                        <button id="more" class="more">
                            <i class='bx bxs-info-circle' id="btn"></i>
                            <span>These details are permanent</span>
                        </button>
                    </div>

                <input type="submit" id="submit_form" value="Submit">
                </div>
               
            </div>
        </div>
    </div>

    <!-- <input type="hidden" name="" id="msg"> -->
    <div id="msg">

    </div>

    <script src="/project/js/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function(){
            // var c_id = 1;
            $(document).on("click", "#submit_form", function(){
                console.log("hello")

                var obj1 = $("#obj1").val();

                var obj2 = $("#obj2").val();
                var obj3 = $("#obj3").val();
                var obj4 = $("#obj4").val();
                var obj5 = $("#obj5").val();
                
                var req1 = $("#req1").val()
                var req2 = $("#req2").val()

                var intd1 = $("#intd1").val()
                var intd2 = $("#intd2").val()

                $.ajax({
                    url : "intended_learners.php?",
                    type : "POST",
                    data : {o1:obj1, o2:obj2, o3:obj3, o4:obj4, o5:obj5, r1:req1, r2:req2, i1:intd1, i2:intd2},
                    success : function(data){
                        $('#msg').html(data)

                        if(data != 0){
                            $("#alert1").html(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`)
                        }else{
                            $("#alert1").html(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`)
                        }
                    }
                })
            })            
        })
    </script>

</body>
</html>