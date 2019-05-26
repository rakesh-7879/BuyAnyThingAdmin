<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

$user_id=3;
$receiver_name="receiver4";
$receiver_mobile="72343876854";
$state="Madhya pradesh";
$city="Jabalpur";
$area="ranjhi ";
$pin_code="482232";
$alt_mobile="9876567879";

if(mysqli_query($bbconn, "insert into address_table values(null,$user_id,'$receiver_name','$receiver_mobile','$state','$city','$area','$pin_code','$alt_mobile')")){
    echo mysqli_insert_id($bbconn);
}else{
    echo mysqli_error($bbconn);
}
?>