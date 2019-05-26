<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

$name=$_GET["subcategory_name"];
$category_id=$_GET["category_id"];
$image=$_GET["subcategory_image"];
$temp=$name.date("MdYhisA");
rename("../images/product/".$image, "../images/product/".$temp.".jpg");

if(mysqli_query($bbconn, "insert into subcategory_table values(null,'$name',$category_id,'$temp.jpg')")){
    echo mysqli_insert_id($bbconn);
}else{
    echo mysqli_error($bbconn);
}

?>