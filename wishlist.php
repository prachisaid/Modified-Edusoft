<?php
session_start();
$user_id = $_SESSION['user_id'];
include 'partials/dbconnect.php';
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

    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="home.css" />
    
    <style>
        #navbar nav{
            position: initial;
            border-bottom: none;
        }
    </style>
</head>

<body onload="updatewishlist(<?php echo $user_id; ?>)";>
    <?php include 'partials/header.php' ?>

    <h1 id="cart_heading">Wishlist</h1>
    <div id="cart">
        <div id="shopping_list">

        </div>

    </div>

    <footer style="margin-top: 171px;">
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

    <script src="wishlist_script.js"></script>
    <script src="/project/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <!-- <script>
        function updateCart(u_id) {
            var cartString = localStorage.getItem("cart");
            let cart = JSON.parse(cartString)
            console.log(cart)
            let quantity = new Array();
            if (cart.length == 0) {
                $("#shopping_list").html("Nothing to show")
            } else {
                cart.find((item) => {
                    if (item.user_id == u_id) {
                        quantity.push(item)
                    }
                })
                if (quantity) {
                    $("#quantity").html(`${quantity.length}`)
                    let course_id = new Array();

                    quantity.forEach(element => {
                        course_id.push(element.course_id)
                        // console.log(course_id)
                    });

                    // var jsonstring = JSON.stringify(course_id)
                    console.log(course_id)
                    $.ajax({
                        url: "cart_ajax.php",
                        type: "POST",
                        data: {
                            c_id: course_id
                        },
                        success: function(data) {
                            $("#shopping_list").html(data)
                        }
                    })
                } else {
                    $("#shopping_list").html("Nothing to show")
                }
            }
        }

        function deleteItemFromCart(c_id) {
            let cart = JSON.parse(localStorage.getItem("cart"))
            let newcart = cart.filter((item) => item.course_id != c_id)
            localStorage.setItem("cart", JSON.stringify(newcart))
            let user_id = localStorage.getItem("user_id");
            console.log(user_id);

            updateCart(user_id)
        }

        function goToCheckout(totalprice) {
            let c_ids = new Array()
            let carts = document.getElementById("shopping_list").children;
            for (let i = 0; i < carts.length - 1; i++) {
                c_ids.push(carts[i].className)
            }

            if (c_ids.length > 4) {
                console.log("no");
            } else {
                let user_id = localStorage.getItem("user_id")
                var options = {
                    "key": "rzp_test_6aXIZTsBgfOvzx", // Enter the Key ID generated from the Dashboard
                    "amount": totalprice * 100,
                    "currency": "INR",
                    "name": "Acme Corp",
                    "description": "Test Transaction",
                    "image": "https://example.com/your_logo",
                    "handler": function(response) {
                        $.ajax({
                            type: "post",
                            url: "payment_process.php",
                            data: {payment_id: response.razorpay_payment_id, amt: totalprice, user_id:user_id, course_id:c_ids},
                            success: function(result) {
                                window.location.href = "mylearning.php?data="+true
                                let cart = JSON.parse(localStorage.getItem("cart"))
                                let user_id = localStorage.getItem("user_id");
                                let newcart = cart.filter((item) => item.user_id != user_id)
                                localStorage.setItem("cart", JSON.stringify(newcart))

                                updateCart(user_id)
                                // $("#shopping_list").html(result)
                            }
                        })
                    }

                };
                var rzp1 = new Razorpay(options);
                document.getElementById('rzp-button1').onclick = function(e) {
                    rzp1.open();
                    e.preventDefault();
                }
            }
        }
    </script> -->
</body>

</html>