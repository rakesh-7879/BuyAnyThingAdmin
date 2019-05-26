<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

$user_id=1;
$product_id=2;
$quentity=1;

if(mysqli_query($bbconn, "insert into cart_table values(null,$user_id,$product_id,$quentity,'1')")){
    echo mysqli_insert_id($bbconn);
}else{
    echo mysqli_error($bbconn);
}
mysqli_close($bbconn);
?>