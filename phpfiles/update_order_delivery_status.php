<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn = $db_handle->connectDB();
$order_id=$_GET["order_id"];
$status=$_GET["status"];
if(mysqli_query($bbconn, "update order_table set order_d_status=$status where order_id=$order_id")){
    echo 1;
}else{
    echo 'not done';
}
?>
