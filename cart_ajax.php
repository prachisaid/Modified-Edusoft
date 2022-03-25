<?php

include 'partials/dbconnect.php';
// echo '<input type="hidden" onload="updateCart('.$user_id.');">'
$totalprice = 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = $_POST['c_id'];
    
    foreach ($data as $key) {
        $course_id = (int)$key;
        $sql = "SELECT * FROM `landing_page` WHERE `course_id` = '$course_id'";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
?> 
        <a id="cart_courses" class="<?php echo $course_id ?>">
                <img src="<?php echo 'instructor/create/image/'.$row['course_image']; ?>" width="160px" alt="">
                <div id="course_title_cart">
                    <?php echo $row['course_title'] ?> <br>
                    <div id="desc">
                        <?php echo $row['course_subtitle']; ?>
                    </div>
                </div>
                <button id="remove" onclick="deleteItemFromCart(<?php echo $course_id?>)">
                    Remove
                </button>
                <div id="price">
                <i class="bx bx-rupee"></i><?php echo $row['course_price'] ?>
                </div>
            </a>
<?php
        $totalprice += $row['course_price'];
        }

    }
?>

<div id="total">
                Total
                <div id="total_price">
                <i class="bx bx-rupee"></i><?php echo $totalprice ?>
                </div>
                <div id="checkout">
                    <button onclick="goToCheckout(<?php echo $totalprice ?>)" id="rzp-button1">Checkout</button>
                </div>
            </div>

<?php
}
?>