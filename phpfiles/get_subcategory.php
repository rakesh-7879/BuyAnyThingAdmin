<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();
$where="";
if(isset($_GET["category_id"])){
    $where=" where b.category_id=".$_GET["category_id"];
}
if(isset($_GET["subcategory_id"])){
    $where=" where a.subcategory_id=".$_GET["subcategory_id"];
}

$bbsql=  mysqli_query($bbconn, "select a.*,b.* from subcategory_table as a left join category_table as b on a.category_id=b.category_id".$where);
$data=array();
while($bbrow=mysqli_fetch_assoc($bbsql)){
    $temp=array();
    $bbsqlcount=  mysqli_query($bbconn, "select count(product_id) as count from product_table7 where subcategory_id=".$bbrow["subcategory_id"]);
    $bbrowcount=  mysqli_fetch_assoc($bbsqlcount);
    $temp["subcategory_id"]=$bbrow["subcategory_id"];
    $temp["subcategory_name"]=$bbrow["subcategory_name"];
    $temp["category_id"]=$bbrow["category_id"];
    $temp["category_name"]=$bbrow["category_name"];
    $temp["subcategory_image"]=$bbrow["subcategory_image"];
    $temp["count"]=$bbrowcount["count"];
    array_push($data, $temp);
}
echo json_encode($data);
?>