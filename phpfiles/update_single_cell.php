<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

$ttable = $_GET["table"];
$tcolumn = $_GET["column"];
$row = $_GET["row"];
$value = $_GET["value"];
if ($ttable == 1) {
    if ($tcolumn == 2) {
        $column = "category_name";
        if(mysqli_query($bbconn, "update category_table set ".$column."='".$value."' where category_id=".$row)){
            echo '1';
        }else{
            echo 'some this is worng';
        }
    }
}
if ($ttable == 2) {
    if ($tcolumn == 2) {
        $column = "subcategory_name";
        if(mysqli_query($bbconn, "update subcategory_table set ".$column."='".$value."' where subcategory_id=".$row)){
            echo '1';
        }else{
            echo 'some this is worng';
        }
    }
}
if ($ttable == 3) {
    if ($tcolumn == 2) {
        $column = "product_name";
    }else if($tcolumn ==3){
        $column = "product_tag";
    }else if($tcolumn ==4){
        $column = "regular_price";
    }else if($tcolumn ==5){
        $column = "selling_price";
    }else if($tcolumn ==6){
        $column = "description";
    }
        if(mysqli_query($bbconn, "update product_table7 set ".$column."='".$value."' where product_id=".$row)){
            echo '1';
        }else{
            echo 'some this is worng';
        }
    
}
?>