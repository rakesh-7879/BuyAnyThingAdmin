<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

$name=$_GET["category_name"];
$image=$_GET["category_image"];
$temp=$name.date("MdYhisA");
rename("../images/product/".$image, "../images/product/".$temp.".jpg");

if(mysqli_query($bbconn, "insert into category_table values(null,'$name','$temp.jpg')")){
    echo mysqli_insert_id($bbconn);
}else{
    echo mysqli_error($bbconn);
}

?>