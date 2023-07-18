<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("localhost", "root", "", "edusoft");
    if (!$conn) {
        die("Error: " . mysqli_connect_error());
    }

    $course_price = $_POST['p'];
    $course_id = $_POST['id'];

    $sql = "UPDATE `landing_page` SET `course_price` = '$course_price' WHERE `course_id` = '$course_id'";
    if ($result = mysqli_query($conn, $sql)) {
        echo true;
    } else {
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum</title>
    <link rel="stylesheet" href="create.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                    <li> <a href="/project/instructor/create/notes.php"> Study Material</a></li>
                    <li> <a href="/project/instructor/create/pricing.php"> Pricing</a></li>
                </ul>
            </div>
        </div>

        <div class="main_page">
            <h1>Pricing</h1>

            <div class="price_block">
                <p>Course price</p>
                <p class="price_main">
                    Please select the price for your course below
                </p>
                <button>INR</button>
                <select name="price" id="price" onfocus="this.size=5;" onblur="this.size=1;" onchange="this.size=1;" this.blur()">
                    <option value="0" id="0">Free</option>
                    <option value="280" name="1">280</option>
                    <option value="300" name="2">300</option>
                    <option value="420" name="3">420</option>
                    <option value="240" name="4">240</option>
                    <option value="560" name="5">560</option>
                    <option value="480" name="6">480</option>
                    <option value="200" name="7">200</option>
                    <option value="520" name="8">520</option>
                </select>
            </div>
            <input type="submit" id="submit_form" value="Submit" style="margin-left: 50px;">
        </div>
    </div>

    <div id="msg">

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script src="cur.js"></script> -->

    <script src="/project/js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // var count = 0;
            var course_id = localStorage.getItem("c_id");
            $(document).on("click", "#submit_form", function(e) {
                var price = $("#price").val();
                // count++;
                $.ajax({
                        url: "pricing.php",
                        type: "POST",
                        data: {
                            p: price,
                            id: course_id
                        },
                        success: function(data) {
                            if (data != 0) {
                                $("#alert1").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Good job!</strong> Your course has been submitted we'll redirect you to our next page.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`)
                                setTimeout(() => {
                                    window.location = "http://localhost/project/instructor/course.php";
                                }, 2000);
                            }
                        }
                    })
            })
        })
    </script>
</body>

</html>