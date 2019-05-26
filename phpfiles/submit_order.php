<?php

require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn = $db_handle->connectDB();

date_default_timezone_set("Indian/Maldives");
$order_date = date("M,d,Y h:i:s A");
$user_id = "3";
$address_id = "4";
$order_status = "1";

if (mysqli_query($bbconn, "insert into order_table values(null,'$order_date','$user_id','$address_id','$order_status','0','')")) {
    $order_id = mysqli_insert_id($bbconn);
    echo mysqli_insert_id($bbconn);
    $sqlcart = mysqli_query($bbconn, "select a.*,b.* from cart_table as a left join product_table7 as b on a.product_id=b.product_id where user_id='$user_id'");
    while ($row = mysqli_fetch_assoc($sqlcart)) {
        $cart_id=$row["cart_id"];
        $product_id = $row["product_id"];
        if ($row["selling_price"] == "") {
            $price = $row["regular_price"];
        } else {
            $price = $row["selling_price"];
        }
        $quentity=$row["quantity"];
        
        if (mysqli_query($bbconn, "insert into ordered_product values(null,'$product_id','$order_id','$price','$quentity','')")) {
            echo mysqli_insert_id($bbconn);
            mysqli_query($bbconn, "delete from cart_table where cart_id=$cart_id");
        }
    }
} else {
    echo mysqli_error($bbconn);
}
?>