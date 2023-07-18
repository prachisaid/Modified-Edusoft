<?php

$showError = false;
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';

    $username = $_POST['signupname'];
    $email = $_POST['signupemail'];
    $password = $_POST['signuppass'];

    $existssql = "SELECT * FROM `users` WHERE 'user_email' = '$email'";
    $result = mysqli_query($conn, $existssql);
    $numexistsrow = mysqli_num_rows($result);

    if ($numexistsrow >= 1) {
        $showError = "Email aleready exists";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_password`) VALUES ('$username', '$email', '$hash')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
            echo `
            <script>
                Email.send({
                    Host: "smtp.gmail.com", 
                    Username: "learnwithedusoft@gmail.com",
                    Password: "Edusoft12",
                    To: "prachisaid16@gmail.com",
                    From: "learnwithedusoft@gmail.com",
                    Subject: "Thanks for logging in",
                }).then(
                    console.log(message)
                )
            </script>`;
        }
    }
}

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

    <link rel="stylesheet" href="/project/index.css" />
    <link rel="stylesheet" href="/project/_login.css" />
    <link rel="stylesheet" href="/project/_signup.css">
</head>

<body>
    <div id="navbar" style="position: initial;">
        <nav>
            <div class="logo">
                <img src="img/edusoftlogo.jpg" width="40px" style="padding-bottom: 4px" alt="" />
                <a href="/project/index.php" style="text-decoration: none;">edusoft</a>
            </div>

            <div class="categories">
                Categories
            </div>

            <div class="search">
                <i class="bx bx-search-alt-2 searchIcon" style="left: 290px;"></i>
                <input type="search" name="search" id="search" placeholder="Search for anything" />
            </div>

            <div class="teach">
                <a href="#" class="teachlink">Teach on EduSoft</a>
            </div>

            <div class="cart">
                <a class="bx bx-cart-alt cartIcon"></a>
            </div>

            <div class="login">
                <a href="/project/partials/_login.php" class="loginbtn">Log in</a>
            </div>

            <div class="signup">
                <a href="/project/partials/_signup.php" class="signupbtn">Sign up</a>
            </div>
        </nav>
    </div>

    <?php
    if ($showAlert) {
        echo '<div style="position:absolute; top:72px; width:100%" class="alert alert-success alert-dismissible fade show" role="alert">
        Your account is now created and you can login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        ' . $showError . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>


    <div class="loginform">
        <h3>Sign up and start learning</h3>
        <form action="/project/partials/_signup.php" method="POST">
            <input type="text" name="signupname" id="signupname" placeholder="Full Name">
            <input type="email" name="signupemail" id="signupemail" placeholder="Email">
            <input type="password" name="signuppass" id="signuppass" placeholder="Password">
            <button class="signupbutton">Sign Up</button>
        </form>
        <div class="terms">
            By signing up you agree to our <a href="" style="color: #a435f0;">Terms</a> and <a href="" style="color: #a435f0;">Privacy Policy</a>
            <!-- <hr style=""> -->
        </div>
        <div style="text-align: center;
        margin: 4px 0px 9px 34px;
        padding-left: 54px;
        font-size: 14.5px;">
            Already have an account? <a href="/project/partials/_login.php" style="color: #a435f0; font-weight: 700;">Login</a>
        </div>
    </div>

    <footer style="position: absolute; top: 85%;">
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

</body>

</html>