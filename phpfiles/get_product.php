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
if(isset($_GET["product_id"])){
    $where=" where c.product_id=".$_GET["product_id"];
}

$bbsql=  mysqli_query($bbconn, "select c.*,a.*,b.* from product_table7 as c left join subcategory_table as a left join category_table as b on a.category_id=b.category_id on c.subcategory_id=a.subcategory_id".$where);
$data=array();
while($bbrow=mysqli_fetch_assoc($bbsql)){
    $temp=array();
    $temp["product_id"]=$bbrow["product_id"];
    $temp["product_name"]=$bbrow["product_name"];
    $temp["product_tag"]=$bbrow["product_tag"];
    $temp["subcategory_id"]=$bbrow["subcategory_id"];
    $temp["subcategory_name"]=$bbrow["subcategory_name"];
    $temp["category_id"]=$bbrow["category_id"];
    $temp["category_name"]=$bbrow["category_name"];
    $temp["subcategory_image"]=$bbrow["subcategory_image"];
    $temp["ragular_price"]=$bbrow["regular_price"];
    $temp["selling_price"]=$bbrow["selling_price"];
    $temp["description"]=$bbrow["description"];
    $temp["image1"]=$bbrow["pimage1"];
    $temp["image2"]=$bbrow["pimage2"];
    $temp["image3"]=$bbrow["pimage3"];
    array_push($data, $temp);
}
echo json_encode($data);
?>