<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

if(isset($_GET["product_id"])){
    $where=" where product_id=".$_GET["product_id"];
}else{
    $where="";
}

$bbsql=  mysqli_query($bbconn, "select * from comments_table".$where);
$data=array();
while($bbrow=mysqli_fetch_assoc($bbsql)){
    $temp=array();
    $temp["comment_id"]=$bbrow["comment_id"];
    $temp["comment"]=$bbrow["comment"];
    $temp["comment_date"]=$bbrow["comment_date"];
    array_push($data, $temp);
}
echo json_encode($data);
?>