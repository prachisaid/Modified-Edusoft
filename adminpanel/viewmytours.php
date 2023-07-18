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
                        <h1 class="welcome-text">Tour <span class="text-black fw-bold">Details Section</span></h1>
                        <!-- <h3 class="welcome-sub-text">Your performance summary this week </h3> -->
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


            <!-- Navbar starts here -->

            <!-- navbar ends here -->


            <?php $tid = $_GET['tid'];?>

            <div class="main-panel" style="width:100%;">
                <div class="content-wrapper">
                    <div class="row">

                        <!-- header -->
                        <div style="height:.1px; width:100%;background-color: #B1B1B1;" class="mb-5"></div>
                        <?php
                            include "dbcon.php";
                            $sql = "SELECT * FROM `tours` WHERE `tid` = '$tid'";
                            $result = mysqli_query($con, $sql);

                            if($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $tname = $row['tname'];
                                    $tlocation = $row['tlocation'];
                                    $tdesc = $row['tdesc'];
                                    $tduration = $row['tduration'];
                                    $tstartdate = $row['tstartdate'];
                                    $tenddate = $row['tenddate'];
                                    $tdays = $row['tdays'];
                                    $tmonths = $row['tmonths'];
                                    $itihead = $row['itihead'];
                                    $iti = $row['iti'];
                                    $pic1 = $row['pic1'];
                                    $pic2 = $row['pic2'];
                                    $status = $row['status'];
                                    $creation_date = $row['creation_date'];
                                    $aprice = $row['aprice'];
                                    $tprice = $row['tprice'];

                                    echo '<div class="container">
                                    <h4 class="card-title mb-4 mt-3" style="color:blue;">Basic Tour Information</h4>
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Tour Name
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$tname.'
                                        </div>
                                    </div>
        
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Tour Location
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$tlocation.'
                                        </div>
                                    </div>
        
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Tour Description
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$tdesc.'
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-4 mt-5" style="color: blue;">Tour Timings</h4>
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Tour Duration
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$tduration.'
                                        </div>
                                    </div>
        
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Tour Start Date
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$tstartdate.'
                                        </div>
                                    </div>
        
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Tour End Date
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$tenddate.'
                                        </div>
                                    </div>
        
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Number of Days
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$tdays.'
                                        </div>
                                    </div>
        
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Tour Month
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$tmonths.'
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-4 mt-5" style="color: blue;">More Tour Details</h4>
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Itineary Heading
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$itihead.'
                                        </div>
                                    </div>
        
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Itineary Schedule
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$iti.'
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-4 mt-5" style="color: blue;">Advance Tour Details</h4>
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Tour Completion Status
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$status.'
                                        </div>
                                    </div>
        
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Tour Creation Date
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$creation_date.'
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-4 mt-5" style="color: blue;"> Tour Pricings</h4>
                                    
        
                                    <div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Tour Total Price
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                            '.$tprice.' <b>Rs</b>
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-4 mt-5" style="color: blue;">Action</h4>
                                    ';
                                    if($row['status'] == "completed") {
                                        echo '<div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Complete Tour
                                        </div>
                                        <div class="col" style="font-size:12px;color:blue;">
                                        <b>'.$row['status'].'</b>
                                        </div>
                                    </div>';
                                    } else {
                                   echo '<div class="row mb-2">
                                        <div class="col"
                                            style="display:flex; flex-direction: row; font-size: 12px;font-weight: bold;"
                                            class="mb-2">
                                            Complete Tour
                                        </div>
                                        <div class="col" style="font-size:12px;">
                                        <button type="button" class="btn btn-danger btn-fw"><a
                                        href="completetour.php?tid='.$tid.'"
                                        style="color:white;text-decoration:none;">Complete</a></button>
                                        </div>
                                    </div>';
                                    }
        
                                echo '</div>';
                                }
                            }

                        ?>
                    </div>
                </div>
                <?php include "utilities/footer.php";?>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src=" vendors/js/vendor.bundle.base.js">
    </script>
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