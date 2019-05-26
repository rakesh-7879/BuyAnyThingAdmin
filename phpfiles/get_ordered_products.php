<?php

require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn = $db_handle->connectDB();

if (isset($_GET["order_id"])) {
    $where = " where a.order_id=" . $_GET["order_id"];
} else {
    $where = "";
}

$bbsql = mysqli_query($bbconn, "select a.*,b.*,a.product_price_per_item * a.product_quentity as total from ordered_product as a left join product_table7 as b on a.product_id=b.product_id" . $where);
$data = array();
while ($bbrow = mysqli_fetch_assoc($bbsql)) {
    $temp = array();
    $temp["order_id"]=$_GET["order_id"];
    $temp["ordered_product_id"] = $bbrow["ordered_product_id"];
    $temp["product_name"]=$bbrow["product_name"];
    $temp["product_tag"]=$bbrow["product_tag"];
    $temp["description"]=$bbrow["description"];
    $temp["image1"]=$bbrow["pimage1"];
    $temp["image2"]=$bbrow["pimage2"];
    $temp["image3"]=$bbrow["pimage3"];
    $temp["price_per_item"] = $bbrow["product_price_per_item"];
    $temp["quentity"]=$bbrow["product_quentity"];
    $temp["total"]=$bbrow["total"];
    array_push($data, $temp);
}
echo json_encode($data);
?>