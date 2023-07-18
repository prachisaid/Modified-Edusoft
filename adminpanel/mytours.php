<?php
    include "auth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->

    <link rel="shortcut icon" href="../assets1/images/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <!-- toggle button -->
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <!-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button> -->
                </div>
                <div>

                    <h3 style="margin-left:-18px;letter-spacing:3px;">TRAVEl</h3>
                </div>
            </div>
            <!-- Greet message -->
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">My<span class="text-black fw-bold"> Tours</span></h1>
                        <!-- <h3 class="welcome-sub-text">Your performance summary this week </h3> -->
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


            <!-- Navbar starts here -->
            <?php include "utilities/navbar.php";?>
            <!-- navbar ends here -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <!-- body here -->
                        <div class="container">

                            <div class="card-body">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" id="sbooking"
                                        aria-label="Username">
                                </div>
                                <select class="form-select" aria-label="Default select example"
                                    style="width:19%;border-radius:20px;" id="select_box">
                                    <option selected value="0">Status</option>
                                    <option value="0" style="font-size:12px;font-weight:bold;">Not Completed</option>
                                    <option value="1" style="font-size:12px;font-weight:bold;">Completed</option>
                                </select>

                                <p class="card-description mt-1 mb-3" style="margin-left:2px;">
                                    Sort according to<code>status</code>
                                </p>

                                <!-- table here -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tour ID</th>
                                                <th>Tour Name</th>
                                                <th>Tour Start Date</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tours_section">
                                            <!-- table body -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php include "utilities/footer.php";?>
            </div>
        </div>
    </div>



    <!-- jquery -->
    <script>
    $(document).ready(function() {

        getToursData(0);

        $('#select_box').change(function() {
            let val = $(this).val();
            getToursData(val);
        })

        function getToursData(val) {
            $.ajax({
                url: "ajax/mytours.php",
                method: "POST",
                data: {
                    status: val
                },
                success: function(data) {
                    $("#tours_section").html(data);
                }
            });
        }

        $('#sbooking').on('keyup', function() {
            let value = $(this).val().toLowerCase();
            let sel = $('#select_box').val();
            if (value.length > 0) {

                $.ajax({
                    url: "ajax/mytoursbyname.php",
                    type: "POST",
                    data: {
                        value: value,
                        status: sel
                    },
                    success: function(data) {
                        $("#tours_section").html(data);
                    }
                })

            }
        })


    })
    </script>




    <!-- plugins:js -->
    <script src=" vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>