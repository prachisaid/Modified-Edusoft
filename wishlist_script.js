var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.4.1.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

        function updatewishlist(u_id) {
            var wishlistString = localStorage.getItem("wishlist");
            let wishlist = JSON.parse(wishlistString)
            console.log(wishlist)
            let quantity = new Array();
            if (wishlist.length == 0) {
                $("#shopping_list").html("Nothing to show")
            } else {
                wishlist.find((item) => {
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
                        url: "wishlist_ajax.php",
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

        function deleteItemFromwishlist(c_id) {
            let wishlist = JSON.parse(localStorage.getItem("wishlist"))
            let newwishlist = wishlist.filter((item) => item.course_id != c_id)
            localStorage.setItem("wishlist", JSON.stringify(newwishlist))
            let user_id = localStorage.getItem("user_id");
            console.log(user_id);

            updatewishlist(user_id)
        }