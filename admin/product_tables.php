<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin : Product Tables</title>
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
                                        <h4 class="card-title">Category</h4>
                                        <p class="card-description">

                                        </p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Category Name</th>
                                                        <th>View Sub-category</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="getTodaysOrder">
                                                    <tr>
                                                        <td   contenteditable>Jacob</td>
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
                                                        <th>Image</th>
                                                        <th>Sub-cateogry</th>
                                                        <th>Total Products</th>
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
                                                    <tr ondblclick="">
                                                        <th>Product id</th>
                                                        <th>Product name</th>
                                                        <th>Product Tag</th>
                                                        <th>Regular Price</th>
                                                        <th>Selling Price</th>
                                                        <th>Image</th>
                                                        <th>Description</th>
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
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
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
        <script src="js/product_tables.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
    </body>

</html>