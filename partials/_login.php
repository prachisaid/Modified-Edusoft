<?php
$showErr = false;
$login = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';
    $useremail = $_POST['loginemail'];
    $password = $_POST['loginpass'];

        $sql = "SELECT * from users where user_email = '$useremail'";
        // $sql = "SELECT * from users where username = '$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while($row = mysqli_fetch_assoc($result)){
                if(password_verify($password, $row['user_password'])){
                    $login = true;
                    $showErr = false;
                    session_start();
                    echo session_id();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $row['user_name'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $user_id = $_SESSION['user_id'];
                    echo "<script>localStorage.setItem('user_id', " . $user_id . ")</script>";
                    header("location: /project/home.php");
                }
                else{
                    $showErr = "Invalid Credentials.";
                }
            }
          }
          else{
            $showErr = "Invalid Credentials. uigu";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="/project/index.css" />
    <link rel="stylesheet" href="/project/_login.css" />
</head>

<body>
    <div id="navbar">
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
    if ($login) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        You are logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($showErr) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        '.$showErr.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>
    <div class="loginform">
        <h3>Log In to your edusoft account</h3>
        <form action="/project/partials/_login.php" method="POST">
            <input type="email" name="loginemail" id="loginemail" placeholder="Email">
            <input type="password" name="loginpass" id="loginpass" placeholder="Password">
            <button class="loginbutton">Log In</button>
        </form>
        <div class="forgotpass">
            <a href="">Forgot Password</a>
        </div>
        <div style="text-align: center;
        margin: 4px 0px 9px 34px;
        padding-left: 54px;
        font-size: 14.5px;">
            Don't have an account? <a href="/project/partials/_signup.php" style="color: #a435f0; font-weight: 700;">Sign up</a>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
</body>

</html>