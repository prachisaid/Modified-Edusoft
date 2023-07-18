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

    <script src="https://kit.fontawesome.com/d62cca87ae.js"></script>
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <!-- toggle button -->
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">

                </div>
                <div>
                    <h3 style="margin-left:-18px;letter-spacing:3px;">TRAVEl</h3>
                </div>
            </div>
            <!-- Greet message -->
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Passenger <span class="text-black fw-bold">Details Section</span></h1>
                        <!-- <h3 class="welcome-sub-text">Your performance summary this week </h3> -->
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


            <!-- Navbar starts here -->

            <!-- navbar ends here -->

            <div class="main-panel" style="width:100%;">
                <div class="content-wrapper">
                    <div class="row">
                        <!-- body here -->
                        <div class="container">
                            <div class="card-body">
                                <!-- table here -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tour Name</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Mobile No</th>
                                                <th>Booking Time</th>
                                                <th>Payment ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                 include "../dbcon.php";
                                                $tid = $_GET['tid'];
                                                $uid = $_GET['uid'];
                                                if(empty($tid) || empty($uid)) {
                                                    header("location: index.php");
                                                } else {
                                                    $sql = "SELECT * FROM `bookings` WHERE `tid` = '$tid' AND `uid` = '$uid'";
                                                    $result = mysqli_query($con, $sql);
                                                    if($result) {
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                            $sql1 = "SELECT * FROM `tours` WHERE `tid` = '$tid'";
                                                            $result1 = mysqli_query($con, $sql1);
                                                            if($result1) {
                                                                $row1 = mysqli_fetch_assoc($result1);
                                                                echo '<tr>
                                                                        <td>'.$row1['tname'].'</td>
                                                                        <td>'.$row['pname'].'</td>
                                                                        <td>'.$row['page'].'</td>
                                                                        <td>'.$row['pgender'].'</td>
                                                                        <td>'.$row['pmobile'].'</td>
                                                                        <td>'.$row['btime'].'</td>
                                                                        <td>'.$row['rid'].'</td>
                                                                        
                                                                    </tr>
                                                                ';
                                                            }
                                                            
                                                        }
                                                    }
                                                    
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="price_section">
                                    <h4 class="card-title mb-4 mt-5" style="color: blue;">Booking Details</h4>

                                    <?php 

                                            $uid = $_GET['uid'];
                                            $tid = $_GET['tid'];
                                            $sql = "SELECT * FROM `bookings` WHERE `tid` = '$tid' AND `uid` = '$uid'";
                                            $result = mysqli_query($con, $sql);
                                            if($result) {
                                                $p=0;
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $name = $row['pname'];
                                                    $price = (int) $row['price'];
                                                    $p = $p + $price;
                                                    echo '<div class="row mb-2 mt-4">
                                                    <div class="col"
                                                        style="display:flex; margin-left:0px; flex-direction: row; font-size: 12px;font-weight: bold;"
                                                        class="mb-2">
                                                        Passenger Name
                                                    </div>
                                                    <div class="col" style="font-size:12px;">
                                                        <div>
                                                            '.$name.'
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <div class="row mb-2">
                                                    <div class="col"
                                                        style="display:flex; margin-left:0px; flex-direction: row; font-size: 12px;font-weight: bold;"
                                                        class="mb-2">
                                                        Booking Price
                                                    </div>
                                                    <div class="col" style="font-size:12px;">
                                                        <div>
                                                            '.$price.' Rs
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                               ';
                                                }
                                            } else {
                                                echo "Some error occured";
                                            }
                                        
                                        ?>
                                    <div class="row mb-2 mt-5">
                                        <div class="col"
                                            style="display:flex; margin-left:0px; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Total
                                        </div>
                                        <div class="col" style="font-size:12px;mar">

                                            <div>
                                                <b><?php echo $p;?></b> Rs
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include "utilities/footer.php";?>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
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

    <script src="https://kit.fontawesome.com/d62cca87ae.js" crossorigin="anonymous"></script>
    <!-- End custom js for this page-->
</body>

</html>