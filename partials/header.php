<?php    
?>
    <div id="navbar">
    <nav>
        <div class="logo">
            <img src="img/edusoftlogo.jpg" width="40px" style="padding-bottom: 4px" alt="" />
            <a href="home.php">edusoft</a>
        </div>

        <div class="categories">
            Categories
        </div>

        <form action="search.php" method="get">
        <div class="search">
            <i class="bx bx-search-alt-2 searchIcon"></i>
            <input type="search" name="search" id="search" placeholder="Search for anything" />
        </div>
        </form>

        <div class="teach">
            <a href="/project/instructor/course.php" class="teachlink">Teach on EduSoft</a>
        </div>
<?php
    if(isset($_SESSION['loggedin'])){
        
        $username = explode(" ", $_SESSION['username']);
        $user_id = $_SESSION['user_id'];
        $user = $username[0];

        $sql = "SELECT * from `users` where `user_id` = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        // echo $row['tutor_bit'];

        if($row['tutor_bit'] == "false"){
            $_SESSION['tutor_f'] = false;
        }else{
            $_SESSION['tutor_t'] = true;
        }

    echo '
        <div class="mylearning">
            <a href="mylearning.php">My learning</a>
        </div>

        <div class="wishlist" style="margin-top:26px">
            <a href="wishlist.php"><i class="bx bx-heart"></i></a>
        </div>

        <div class="cart" style="margin-top:26px">
           <a href="/project/cart.php"><i class="bx bx-cart-alt cartIcon"></i><span id="quantity">0</span></a> 
        </div>

        <div class="username">
            <h5>
                '.$user.'
            </h5>
        </div>

        <div style="margin-top: 25px; margin-left: 12px;">
            <a href="logout.php" class="logout">Log Out</a>
        </div>';
    }

?>

<?php


if(!isset($_SESSION['loggedin'])){
    echo '
    <div class="cart" style="margin-right: 19px">
        <a href="/project/cart.php"><i class="bx bx-cart-alt cartIcon"></i></a> 
    </div>

    <div class="login">
        <a href="/project/partials/_login.php" class="loginbtn" style="margin-right: 10px">Log in</a>
    </div>

    <div class="signup">
        <a href="/project/partials/_signup.php" class="signupbtn">Sign up</a>
    </div>';
}

?>

</nav>
</div>
