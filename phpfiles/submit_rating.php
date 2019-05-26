<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

$product_id=2;
$user_id=2;
$rating=4;

if(mysqli_query($bbconn, "insert into rating_table values(null,$product_id,$user_id,$rating)")){
    echo mysqli_insert_id($bbconn);
}else{
    echo mysqli_error($bbconn);
}

?>