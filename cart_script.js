var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.4.1.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

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

        function buyNow(price, c_id){
                let user_id = localStorage.getItem("user_id")
                var options = {
                    "key": "rzp_test_6aXIZTsBgfOvzx", // Enter the Key ID generated from the Dashboard
                    "amount": price * 100,
                    "currency": "INR",
                    "name": "Acme Corp",
                    "description": "Test Transaction",
                    "image": "https://example.com/your_logo",
                    "handler": function(response) {
                        $.ajax({
                            type: "post",
                            url: "payment_process.php",
                            data: {payment_id: response.razorpay_payment_id, amt: price, user_id:user_id, course_id:c_id},
                            success: function(result) {
                                window.location.href = "mylearning.php?data="+true
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