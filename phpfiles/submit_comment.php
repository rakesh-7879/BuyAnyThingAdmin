<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

$product_id="2";
$user_id="5";
$comment="good product !!";

date_default_timezone_set("Indian/Maldives");
$comment_date=date("M,d,Y h:i:s A");

if(mysqli_query($bbconn, "insert into comments_table values(null,'$product_id','$user_id','$comment','$comment_date')")){
    echo mysqli_insert_id($bbconn);
}else{
    echo mysqli_error($bbconn);
}

?>