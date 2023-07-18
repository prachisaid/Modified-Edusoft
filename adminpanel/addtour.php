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
    <style>
    .form-control1 {
        height: 100px;
        width: 100%;
        padding: 0.875rem 1.375rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #212529;
        background-color: color(white);
        background-clip: padding-box;
        border: 1px solid #ced4da;
        appearance: none;
        border-radius: 2px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    </style>
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
                        <h1 class="welcome-text">Add <span class="text-black fw-bold">Tour</span></h1>
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
                        <div class="card-body">
                            <form id="addtourform">
                                <h4 class="card-title">Basic Tour Information</h4>
                                <div class="form-group">
                                    <!-- tour name -->
                                    <p class="card-description mt-4">
                                        Tour Name
                                    </p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" name="tname" class="form-control" placeholder=""
                                            aria-label="Username">
                                    </div>
                                </div>
                                <!-- tour location -->
                                <div class="form-group">
                                    <p class="card-description mt-4">
                                        Tour Location
                                    </p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" name="tlocation" class="form-control" placeholder=""
                                            aria-label="Username">
                                    </div>
                                </div>
                                <!-- tour description -->
                                <div class="mb-3">
                                    <p class="card-description">
                                        Tour Description
                                    </p>
                                    <textarea class="form-control1" name="tdescription" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                </div>
                                <h4 class="card-title mt-5 mb-3">Tour Timings</h4>
                                <!-- tour duration -->
                                <div class="form-group">
                                    <p class="card-description mt-4">
                                        Tour Duration
                                    </p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" name="tduration" class="form-control" placeholder=""
                                            aria-label="Username">
                                    </div>
                                </div>
                                <!-- tour start date -->
                                <div class="form-group">
                                    <p class="card-description mt-4">
                                        Tour Starting Date
                                    </p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" name="tstartdate" class="form-control" placeholder=""
                                            aria-label="Username">
                                    </div>
                                </div>
                                <!-- tour end date -->
                                <div class="form-group">
                                    <p class="card-description mt-4">
                                        Tour Ending Date
                                    </p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" name="tenddate" class="form-control" placeholder=""
                                            aria-label="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p class="card-description mt-4">
                                        Number of Days
                                    </p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" name="tdays" class="form-control" placeholder=""
                                            aria-label="Username">
                                    </div>
                                </div>
                                <!-- tour Month  -->
                                <div class="form-group">
                                    <p class="card-description mt-4">
                                        Tour Month
                                    </p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" name="tmonth" class="form-control" placeholder=""
                                            aria-label="Username">
                                    </div>
                                </div>
                                <h4 class="card-title mt-5">More tour details</h4>
                                <!-- itineary -->
                                <div class="form-group">
                                    <p class="card-description mt-4">
                                        Itinerary Heading
                                    </p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" name="itheading" class="form-control" placeholder=""
                                            aria-label="Username">
                                    </div>
                                </div>
                                <div id="itbody">
                                    <div class="form-group" id="it0">
                                        <p class="card-description mt-4">
                                            Itinerary
                                        </p>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">@</span>
                                            </div>
                                            <input type="text" class="form-control" id="itinput0" placeholder=""
                                                aria-label="Username">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-primary" type="button"
                                                    style="border-radius:0;margin-top:1px;" id="itbtn">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title mt-5">Tour Gallery</h4>
                                <!-- file upload -->
                                <div class="form-group mt-4">
                                    <label>Cover Photo</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" name="file1" class="form-control file-upload-info"
                                            style="height:40px;" placeholder="Upload Image">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tour Detail Photo</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" name="file2" class="form-control file-upload-info"
                                            style="height:40px;" placeholder="Upload Image">

                                    </div>
                                </div>

                                <!-- tour pricing -->
                                <!-- <h4 class="card-title mt-5">Pricing</h4>
                                <div class="form-group">
                                    <p class="card-description mt-4">
                                        Advance Payment Price
                                    </p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" name="aprice" class="form-control" placeholder=""
                                            aria-label="Username">
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <p class="card-description mt-4">
                                        Tour Price
                                    </p>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" name="tprice" id="tprice" class="form-control" placeholder=""
                                            aria-label="Username">
                                    </div>
                                </div>

                                <button class="file-upload-browse btn btn-primary" type="button"
                                    style="border-radius:2px;margin-top:1px;" onClick="getData()">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
                <?php include "utilities/footer.php";?>
            </div>
        </div>
    </div>



    <script>
    // const it1 = document.getElementById('it1');
    // const itbtn = document.getElementById('itbtn1');
    let count = 1;

    const itbody = document.getElementById('itbody');

    itbtn.addEventListener("click", () => {

        console.log("clicked")
        let string = ` <div class="form-group" id="it${count}">
                                <p class="card-description mt-4">
                                    Itinerary
                                </p>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" id="itinput${count}" aria-label="Username">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-dark" type="button"
                                            style="border-radius:0;margin-top:1px;" id="delbtn${count}" onClick="del('it${count}')">-</button>
                                    </div>
                                </div>
                            </div>`;
        let it = document.createElement('div');
        it.innerHTML = string;
        itbody.appendChild(it);
        count++;
    })

    function del(id) {
        const btnid = document.getElementById(id);
        btnid.remove();
    }

    let obj = {}

    function getData() {
        for (let i = 0; i <= count; i++) {
            if (document.getElementById(`itinput${i}`) != null) {
                let value = document.getElementById(`itinput${i}`).value;
                obj[`iti${i}`] = value;
            }
        }
        let formid = document.getElementById('addtourform');
        let formData = new FormData(formid);
        formData.append("itis", JSON.stringify(obj));
        const tprice = document.getElementById('tprice').value;
        if (tprice > 0) {
            $.ajax({
                url: "ajax/addtour.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    alert(data)
                    location.reload();
                }
            })
        } else {
            alert("Tour Price must be greater than 0")
        }
    }
    </script>



    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <!-- End custom js for this page-->
</body>

</html>