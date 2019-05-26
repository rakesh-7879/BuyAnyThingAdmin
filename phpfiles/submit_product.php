<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

$name=$_GET["name"];
$tag=$_GET["tag"];
$subcategory_id=$_GET["subcategory"];
$ragular_price=$_GET["r_price"];
$selling_price=$_GET["s_price"];
$description=$_GET["description"];
$image1=$_GET["i1"];
$temp1=$name."1".date("MdYhisA");
rename("../images/product/".$image1, "../images/product/".$temp1.".jpg");
$image2=$_GET["i2"];
$temp2=$name."2".date("MdYhisA");
rename("../images/product/".$image2, "../images/product/".$temp2.".jpg");
$image3=$_GET["i3"];
$temp3=$name."3".date("MdYhisA");
rename("../images/product/".$image3, "../images/product/".$temp3.".jpg");

if(mysqli_query($bbconn, "insert into product_table7 values(null,'$name','$tag',$subcategory_id,'$ragular_price','$selling_price','$description','$temp1.jpg','$temp2.jpg','$temp2.jpg','1')")){
    echo mysqli_insert_id($bbconn);
}else{
    echo mysqli_error($bbconn);
}

?>