<?php
include 'partials/dbconnect.php'; 
session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id = $_SESSION['user_id'];
    $_SESSION['tutor_t'] = true;
    $sql = "UPDATE `users` SET `tutor_bit` = 'true' WHERE `user_id` = '$user_id'";
    $result = mysqli_query($conn, $sql);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EduSoft</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />

    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="home.css" />
    <link rel="stylesheet" href="development.css" />
  </head>

  <body>
    <?php 
    include 'partials/header.php';
    ?>


    <div id="cont">
      <div>
        <h1>Come teach with us</h1>
        <span>Become an instructor and change lives</span>
        <button id="start">Get started</button>
      </div>
      <div>
        <img src="/project/img/placeholder.jpg" alt="">
      </div>
    </div>

    <footer>
      <div class="lang"><i class="bx bx-globe globe"></i>English</div>
      <div class="row">
        <div class="col-md-2">
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
        <div class="col-md-5"></div>
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
        <div class="col-md-8 name">edusoft</div>
        <div class="col-md-2 copyright">&copy 2021 edusoft, Inc</div>
      </div>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"
    ></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function () {
        $(document).on("click", "#start", function () {
          console.log("hell")
          $.ajax({
            url: "tutor.php",
            type: "post",
            data: { set : true },

            success: function (data) {
              window.location = "http://localhost/project/instructor/course.php";
            },
          });
        });
      });
    </script>
  </body>
</html>
