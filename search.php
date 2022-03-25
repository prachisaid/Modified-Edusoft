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
    <link rel="stylesheet" href="development.css" />

    <style>
        #navbar nav{
            position: initial;
            border-bottom: none;
        }

        #price{
            position: initial;
            margin-left: 6.3rem;
        }

        .card-section{
            font-family: sf pro text,-apple-system,BlinkMacSystemFont,Roboto,segoe ui,Helvetica,Arial,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol; 
            width: 100%;
            margin: auto;
        }
        
        .card-section ul li{
            list-style-type: disc;
        }
    </style>
</head>

<body>
    <?php include 'partials/header.php' ?>
    
    <div class="container" style="margin-top: 30px;">
        <h2>Search results for <em>"<?php echo $_GET['search']; ?>"</em></h2>
        <div class="result">
            <?php 
            
            $noresult = true;
            $searchTerm = $_GET['search'];
            $q = "SELECT * FROM landing_page WHERE match (course_title, course_subtitle, course_description) against ('$searchTerm');";
            $res = mysqli_query($conn, $q);

            while($r = mysqli_fetch_assoc($res)){

            $noresult = false;
            echo '
            <a href="course_page.php?course_id='.$r['course_id'].'"" class="new">
            <div id="course_image">
                <img src="instructor/create/image/'.$r['course_image'].'" width="140px" alt="">
            </div>
            <div id="course_info">
                <div id="title">
                    '.$r['course_title'].'
                </div>
                <div id="subtitle">
                    '.$r['course_subtitle'].'
                </div>
                <div id="instructor">
                    Jose Portilla
                </div>
            </div>
            <div id="price">
                '.$r['course_price'].'
            </div>
            </a>';
            }

            if($noresult){
                echo '<div class="mnr-c">
                <div class="card-section">
                    <p aria-level="3" role="heading" style="padding-top:.33em">Your search -
                        <span><em>'.$searchTerm.'</em></span> - did not match any documents.</p>
                    <p style="margin-top:1em">Suggestions:</p>
                    <ul style="margin-left:1.3em;margin-bottom:2em">
                        <li>Make sure that all words are spelled correctly.</li>
                        <li>Try different keywords.</li>
                        <li>Try more general keywords.</li>
                    </ul>    
                </div>
            </div>';
            }
        ?>
        </div>
    </div>

     <!-- <footer> 
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
    </footer>  -->

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <!-- <script src="js/search.js"></script> -->
</body>



</html>