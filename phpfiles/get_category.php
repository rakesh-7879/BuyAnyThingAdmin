<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

if(isset($_GET["category_id"])){
    $where=" where category_id=".$_GET["category_id"];
}else{
    $where="";
}

$bbsql=  mysqli_query($bbconn, "select * from category_table".$where);
$data=array();
while($bbrow=mysqli_fetch_assoc($bbsql)){
    $temp=array();
    $temp["category_id"]=$bbrow["category_id"];
    $temp["category_name"]=$bbrow["category_name"];
    $temp["category_image"]=$bbrow["category_image"];
    array_push($data, $temp);
}
echo json_encode($data);
?>