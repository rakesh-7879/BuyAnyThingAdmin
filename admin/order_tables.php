<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin : Order Tables</title>
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
            <!-- partial:../../partials/_navbar.html -->
            <?php include './header.php'; ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:../../partials/_sidebar.html -->
                <?php include './leftsidebar.php'; ?>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-lg-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Todays Order</h4>
                                        <p class="card-description">

                                        </p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Customer Name</th>
                                                        <th>Total</th>
                                                        <th>View Products</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="getTodaysOrder">
                                                    <tr>
                                                        <td>Jacob</td>
                                                        <td>53275531</td>
                                                        <td><button class="btn btn-success mr-2">View</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Ordered Products</h4>
                                        <p class="card-description">
                                            On Order ID:&nbsp;&nbsp;&nbsp;
                                            <code id="getOrderId"></code>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>quantity</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="getOrderedProducts">
                                                    <tr>
                                                        <td>Jacob</td>
                                                        <td>Photoshop</td>
                                                        <td class="text-danger"> 28.76%<i class="mdi mdi-arrow-down"></i></td>
                                                        <td><label class="badge badge-danger">Pending</label></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Placed Orders</h4>
                                        <p class="card-description">
                                            Total Placed Order
                                            <code id="getPlacedOrdercount"> </code>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Order_id</th>
                                                        <th>Customer name</th>
                                                        <th>Contact</th>
                                                        <th>Total Amount</th>
                                                        <th>Date & Time</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="getPlacedOrder">
                                                    <tr class="table-info">
                                                        <td>1</td>
                                                        <td>Herman Beck</td>
                                                        <td>Photoshop</td>
                                                        <td>$ 77.99</td>
                                                        <td><button onclick="getUpdateDeliveryStatus()" class="btn btn-danger mr-2">View</button></td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Packed Orders</h4>
                                        <p class="card-description">
                                            Total Packed Order
                                            <code id="getPackedOrdercount"> </code>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Order_id</th>
                                                        <th>Customer name</th>
                                                        <th>Contact</th>
                                                        <th>Total Amount</th>
                                                        <th>Date & Time</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="getPackedOrder">
                                                    <tr class="table-info">
                                                        <td>1</td>
                                                        <td>Herman Beck</td>
                                                        <td>Photoshop</td>
                                                        <td>$ 77.99</td>
                                                        <td>May 15, 2015</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Processing Orders</h4>
                                        <p class="card-description">
                                            Total Processing Order
                                            <code id="getProcessingOrdercount"> </code>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Order_id</th>
                                                        <th>Customer name</th>
                                                        <th>Contact</th>
                                                        <th>Total Amount</th>
                                                        <th>Date & Time</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="getProcessingOrder">
                                                    <tr class="table-info">
                                                        <td>1</td>
                                                        <td>Herman Beck</td>
                                                        <td>Photoshop</td>
                                                        <td>$ 77.99</td>
                                                        <td>May 15, 2015</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Delivered Orders</h4>
                                        <p class="card-description">
                                            Total Delivered Order
                                            <code id="getDeliveredOrdercount"> </code>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Order_id</th>
                                                        <th>Customer name</th>
                                                        <th>Contact</th>
                                                        <th>Total Amount</th>
                                                        <th>Date & Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="getDeliveredOrder">
                                                    <tr class="table-info">
                                                        <td>1</td>
                                                        <td>Herman Beck</td>
                                                        <td>Photoshop</td>
                                                        <td>$ 77.99</td>
                                                        <td>May 15, 2015</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Canceled Orders</h4>
                                        <p class="card-description">
                                            Total Canceled Order
                                            <code id="getCanceledOrdercount"> </code>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Order_id</th>
                                                        <th>Customer name</th>
                                                        <th>Contact</th>
                                                        <th>Total Amount</th>
                                                        <th>Date & Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="getCanceledOrder">
                                                    <tr class="table-info">
                                                        <td>1</td>
                                                        <td>Herman Beck</td>
                                                        <td>Photoshop</td>
                                                        <td>$ 77.99</td>
                                                        <td>May 15, 2015</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <footer class="footer">
                        <div class="container-fluid clearfix">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
                                <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                                <i class="mdi mdi-heart text-danger"></i>
                            </span>
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
        <script src="js/order_tables.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
    </body>

</html>