<?php
require '../phpfiles/dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin : Dashboard</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="images/favicon.png" />
    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <?php include './header.php'; ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <?php include './leftsidebar.php'; ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="mdi mdi-cube text-danger icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Total Revenue</p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0">
                                                        <?php
                                                        $getSumOfTotalEarnings=  mysqli_query($bbconn, "select sum(b.product_price_per_item * b.product_quentity) as total from order_table as a right join ordered_product as b on a.order_id=b.order_id where a.order_d_status=4");
                                                        if($getRow=  mysqli_fetch_assoc($getSumOfTotalEarnings)){
                                                            echo $getRow["total"];
                                                        }
                                                        ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total earnings
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="mdi mdi-receipt text-warning icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Orders</p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0">
                                                        <?php
                                                        $getTotalOrder=  mysqli_query($bbconn, "select count(order_id) as total from order_table");
                                                        if($getRow=  mysqli_fetch_assoc($getTotalOrder)){
                                                            echo $getRow["total"];
                                                        }
                                                        ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Total Orders
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="mdi mdi-poll-box text-success icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Sales</p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0">
                                                        <?php
                                                        $getTotalOrder=  mysqli_query($bbconn, "select sum(product_quentity) as total from ordered_product");
                                                        if($getRow=  mysqli_fetch_assoc($getTotalOrder)){
                                                            echo $getRow["total"];
                                                        }
                                                        ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Total Sales
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="mdi mdi-account-location text-info icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Users</p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0">
                                                    <?php
                                                        $getTotalOrder=  mysqli_query($bbconn, "select count(user_id) as total from user_log");
                                                        if($getRow=  mysqli_fetch_assoc($getTotalOrder)){
                                                            echo $getRow["total"];
                                                        }
                                                        ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Total Users
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Orders</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>
                                                        <th>
                                                            First name
                                                        </th>
                                                        <th>
                                                            Delivery Progress
                                                        </th>
                                                        <th>
                                                            Contact
                                                        </th>
                                                        <th>
                                                            Total Price
                                                        </th>
                                                        <th>
                                                            Order date
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ordertable">
                                                    <tr>
                                                        <td class="font-weight-medium">
                                                            6
                                                        </td>
                                                        <td>
                                                            Henry Tom
                                                        </td>
                                                        <td>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                                     aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            $ 150.00
                                                        </td>
                                                        <td class="text-danger"> 24.67%
                                                            <i class="mdi mdi-arrow-down"></i>
                                                        </td>
                                                        <td>
                                                            June 16, 2015
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Feedbacks</h5>
                                        <div class="fluid-container" id="bottomfeedbackinindex">

                                            <div class="row ticket-card mt-3">
                                                <div class="col-md-1">
                                                    <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face3.jpg" alt="profile image">
                                                </div>
                                                <div class="ticket-details col-md-9">
                                                    <div class="d-flex">
                                                        <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">John Doe :</p>
                                                        <p class="text-primary mr-1 mb-0">[#23246]</p>
                                                        <p class="mb-0 ellipsis">Mauris blandit aliquet elit, eget tincidunt nibh pulvinar.</p>
                                                    </div>
                                                    <p class="text-gray ellipsis mb-2">Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus. Lorem ipsum dolor sit amet.</p>
                                                    <div class="row text-gray d-md-flex d-none">
                                                        <div class="col-4 d-flex">
                                                            <small class="mb-0 mr-2 text-muted">Last responded :</small>
                                                            <small class="Last-responded mr-2 mb-0 text-muted">3 hours ago</small>
                                                        </div>
                                                        <div class="col-4 d-flex">
                                                            <small class="mb-0 mr-2 text-muted">Due in :</small>
                                                            <small class="Last-responded mr-2 mb-0 text-muted">2 Days</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ticket-actions col-md-2">
                                                    <div class="btn-group dropdown">
                                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Manage
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-history fa-fw"></i>Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="container-fluid clearfix">
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <script src="vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/misc.js"></script>
        <script src="js/index.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="js/dashboard.js"></script>
        <!-- End custom js for this page-->
    </body>

</html>