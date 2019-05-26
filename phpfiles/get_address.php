<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

if(isset($_GET["user_id"])){
    $where=" where user_id=".$_GET["user_id"];
}else{
    $where="";
}

$bbsql=  mysqli_query($bbconn, "select * from address_table".$where);
$data=array();
while($bbrow=mysqli_fetch_assoc($bbsql)){
    $temp=array();
    $temp["address_id"]=$bbrow["address_id"];
    $temp["receiver_name"]=$bbrow["receiver_name"];
    $temp["receiver_mobile"]=$bbrow["receiver_mobile"];
    $temp["city"]=$bbrow["city"];
    $temp["area"]=$bbrow["area"];
    $temp["pin_code"]=$bbrow["pin_code"];
    $temp["alt_mobile"]=$bbrow["alt_mobile"];
    array_push($data, $temp);
}
echo json_encode($data);
?>