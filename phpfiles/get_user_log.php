<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();
$where="";
if(isset($_GET["user_id"])){
    $where=" where category_id=".$_GET["category_id"];
}

$bbsql=  mysqli_query($bbconn, "select * from user_log".$where);
$data=array();
while($bbrow=mysqli_fetch_assoc($bbsql)){
    $temp=array();
    $temp["user_id"]=$bbrow["user_id"];
    $temp["user_name"]=$bbrow["user_full_name"];
    $temp["user_email"]=$bbrow["user_email"];
    $temp["user_mobile"]=$bbrow["user_mobile"];
    $temp["user_gender"]=$bbrow["user_gender"];
    $temp["user_age"]=$bbrow["user_age"];
    $temp["user_image"]=$bbrow["user_image"];
    array_push($data, $temp);
}
echo json_encode($data);
?>