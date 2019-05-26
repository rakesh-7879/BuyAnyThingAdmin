<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

if(isset($_GET["order_id"])){
    $where=" where a.order_id=".$_GET["order_id"];
}else{
    $where="";
}
if(isset($_GET["todays"])){
    date_default_timezone_set("Indian/Maldives");
    $date = date("M,d,Y");
    $where=" where a.order_date like '%$date%'";
}
if(isset($_GET["d_status"])){
    $where=" where a.order_d_status=".$_GET["d_status"];
}

$bbsql=  mysqli_query($bbconn, "select a.*,b.* from order_table as a left join user_log as b on a.user_id=b.user_id".$where);
$data=array();
while($bbrow=mysqli_fetch_assoc($bbsql)){
    $sql_get_total=  mysqli_query($bbconn, "select sum(product_price_per_item * product_quentity) as total from ordered_product where order_id=".$bbrow["order_id"]);
    $temp=array();
    $temp["order_id"]=$bbrow["order_id"];
    $temp["order_date"]=$bbrow["order_date"];
    $temp["user_id"]=$bbrow["user_id"];
    $temp["user_name"]=$bbrow["user_full_name"];
    $temp["user_email"]=$bbrow["user_email"];
    $temp["user_mobile"]=$bbrow["user_mobile"];
    $temp["user_gender"]=$bbrow["user_gender"];
    $temp["user_age"]=$bbrow["user_age"];
    $temp["address_id"]=$bbrow["address_id"];
    $temp["d_status"]=$bbrow["order_d_status"];
    if($row=  mysqli_fetch_assoc($sql_get_total)){
        $temp["total"]=$row["total"];
    }
    array_push($data, $temp);
}
echo json_encode($data);
?>