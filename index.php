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
</head>

<body>
    <?php include 'partials/dbconnect.php'; 
          include 'partials/header.php';  ?>
    

    <div class="bgmain">
        <img src="img/bgmain.jpg" alt="" />
        <div class="box">
            <h4>EduSoft make it count</h4>
            <p>
                Learning is a lasting investment. Get started on your goals today
            </p>
        </div>
    </div>

    <?php 
        include 'partials/categories.php';
    ?>

    <div class="section">
        <h4>A broad seclection of courses</h4>
        <p>Choose any online video that interests you and expand your career</p>
        <div class="category">

            <?php
                $sql = "SELECT * FROM `subcategories` WHERE `main_category_id` = 1";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){
                    $subcat_name = $row['subcategory_name'];
                    $subcat_id = $row['subcategory_id'];

                    echo '<button id="explore_cat" class="'.$subcat_id.'">'.$subcat_name.'</button>';
                }

            ?>
            
            <div id="categoryBox">
            <h5>Expand your career opportunities with Python</h5>
                    <p>
                        Whether you work in machine learning or finance, or are pursuing a
                        career in web development or data science,<br />
                        Python is one of the most important skills you can learn. Python\'s
                        simple syntax is especially suited for desktop,<br />
                        web, and business applications. Python\'s design philosophy
                        emphasizes readability and usability. Python was..
                    </p>
                    <button id="exploreCategory">Explore Python</button>
                    <div id="explore_page" style="flex-direction:column">
                
                <?php 
                $sql1 = "SELECT * FROM `landing_page` WHERE `course_subcat_id` = '$subcat_id'";
                $result1 = mysqli_query($conn, $sql1);

                while($row = mysqli_fetch_assoc($result1)){
                echo '  
                        <div class="courseimg">
                        <img src="instructor/create/image/'.$row['course_image'].'" width="210px" alt="" />
                        </div>
                        <div class="coursedetail">
                        <p class="heading">
                        
                        </p>
                        <p class="instructor">Jose Portilla</p>
                        <p class="prize">$'.$row['course_price'].'</p>
                        </div>
                        
                ';
                }
                ?>
                </div>
            </div>
        </div>
    </div>

    <div class="catimg">
        <h2>Top Categories</h2>
        <a href="/project/development.php?cat_id=3"><img src="img/design.jpg" alt="" /></a>
        <a href="/project/development.php?cat_id=1"><img src="img/development.jpg" alt="" /></a>
        <a href="/project/development.php?cat_id=5"><img src="img/marketing.jpg" alt="" /></a>
        <a href="/project/development.php?cat_id=2"><img src="img/it.jpg" alt="" /></a>
        <div class="label">
            <a href="/project/development.php?cat_id=3">Design</a>
            <a href="/project/development.php?cat_id=1">Development</a>
            <a href="/project/development.php?cat_id=5">Marketing</a>
            <a href="/project/development.php?cat_id=2">It and software</a>
        </div>
        <a href="/project/development.php?cat_id=4"><img src="img/business.jpg" alt="" /></a>
        <a href="/project/development.php?cat_id=8"><img src="img/teaching.jpg" alt="" /></a>
        <a href="/project/development.php?cat_id=7"><img src="img/music.jpg" alt="" /></a>
        <a href="/project/development.php?cat_id=6"><img src="img/photography.jpg" alt="" /></a>
        <div class="label">
            <a href="/project/development.php?cat_id=4">Business</a>
            <a href="/project/development.php?cat_id=8">Teaching</a>
            <a href="/project/development.php?cat_id=7">Music</a>
            <a href="/project/development.php?cat_id=6">Photography</a>
        </div>
    </div>

    <div class="instructor2">
        <div class="info">
            <h2>Become an instructor</h2>
            <p>Instructors from around the world teach<br> millions of students on Udemy. We provide the <br>tools and skills to teach what you love.
            </p>
            <button class="instructorbtn" onclick="teach()">Start teaching now</button>
        </div>
        
        <img src="img/instructor.jpg" width="350px" alt="">
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/categories.js"></script>
    <script>
        function teach(){
            window.location = "partials/_login.php";
        }

        $(document).ready(function(){
            $(document).on("click", "#explore_cat", function(){
            let id = this.className;
            console.log(id)

            $.ajax({

                url : "index_ajax.php",
                type : "post",
                data : {c_id : id},

                success : function(data){
                    $("#categoryBox").html(data);
                }

                })            
            })

            $(document).on("click", "#exploreCategory", function(){
                let topic_id = this.className;
                window.location = "topic.php?subcat_id=" +topic_id;
            })

            // $('.categories_list').mouseout(function(){
            //     this.classList.remove("activeOpt")
            // })

        })
    </script>
</body>



</html>