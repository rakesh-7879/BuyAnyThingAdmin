<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin : Forms</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="vendors/icheck/skins/all.css">
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
                            <div class="col-md-6 d-flex align-items-stretch grid-margin">
                                <div class="row flex-grow">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Category form</h4>
                                                <p class="card-description">
                                                    Submit a new Category
                                                </p>

                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <input type="text" class="form-control" id="category_name" placeholder="Enter category name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Category Image</label>
                                                    <input type="file" class="form-control" onchange="uploadimage(this, 'product')" id="category_image">
                                                </div>
                                                <button class="btn btn-success mr-2" onclick="submitcategory()" >Submit</button>
                                                <button class="btn btn-light" onclick="cleanCategory();">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Sub-category Form</h4>
                                                <p class="card-description">
                                                    Enter a new sub-category
                                                </p>
                                                <div class="form-group">
                                                    <label >Select Category</label>
                                                    <select class="form-control" id="getcategory1">
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sub-Category</label>
                                                    <input type="text" class="form-control" id="subcategory_name" placeholder="Enter category name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sub-category Image</label>
                                                    <input type="file" class="form-control" onchange="uploadimage(this, 'product')" id="subcategory_image">
                                                </div>

                                                <button class="btn btn-success mr-2" onclick="submitsubcategory()">Submit</button>
                                                <button class="btn btn-light" onclick="cleanSubcategory();">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Product form</h4>
                                        <p class="card-description">
                                            Enter a new Product
                                        </p>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Product Name</label>
                                            <input type="text" class="form-control" id="product_name" placeholder="Enter Product Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Product Tag</label>
                                            <input type="text" class="form-control" id="product_tag" placeholder="Enter Product Tag">
                                        </div>
                                        <div class="form-group">
                                            <label>Select Category</label>
                                            <select class="form-control" id="getcategory" onchange="gotChangesOnCategory(this.value)">

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >Select sub-category</label>
                                            <select class="form-control" id="getsubcategory" >
                                                <option value="0">Select a Sub-category</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Product Regular Price</label>
                                            <input type="text" class="form-control" id="regular_price" placeholder="Enter Regular Price">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Product Selling Price</label>
                                            <input type="text" class="form-control" id="selling_price" placeholder="Enter selling Price">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Product Description</label>
                                            <input type="text" class="form-control" id="description" placeholder="Enter product discription">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" class="form-control" onchange="uploadimage(this, 'product')" id="image1">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" class="form-control" onchange="uploadimage(this, 'product')"  id="image2">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" class="form-control" onchange="uploadimage(this, 'product')"  id="image3">
                                        </div>
                                        <button type="submit" class="btn btn-success mr-2" onclick="submitproduct()">Submit</button>
                                        <button class="btn btn-light" onclick="cleanProduct()">Cancel</button>
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
        <script src="js/master_forms.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
    </body>

</html>