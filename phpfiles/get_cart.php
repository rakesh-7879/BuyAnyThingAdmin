<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();
$where="";
if(isset($_GET["product_id"])){
    $where=" where b.product_id=".$_GET["product_id"];
}
if(isset($_GET["user_id"])){
    $where=" where c.user_id=".$_GET["user_id"];
}

$bbsql=  mysqli_query($bbconn, "select a.*,b.*,c.* from cart_table as a left join product_table7 as b on a.product_id=b.product_id left join user_log as c on a.user_id=c.user_id ".$where." order by cart_id DESC");
$data=array();
while($bbrow=mysqli_fetch_assoc($bbsql)){
    $temp=array();
    $temp["cart_id"]=$bbrow["cart_id"];
    $temp["user_id"]=$bbrow["user_id"];
    $temp["user_name"]=$bbrow["user_full_name"];
    $temp["product_id"]=$bbrow["product_id"];
    $temp["product_name"]=$bbrow["product_name"];
    $temp["ragular_price"]=$bbrow["regular_price"];
    $temp["selling_price"]=$bbrow["selling_price"];
    $temp["description"]=$bbrow["description"];
    $temp["image1"]=$bbrow["pimage1"];
    array_push($data, $temp);
}
echo json_encode($data);
?>