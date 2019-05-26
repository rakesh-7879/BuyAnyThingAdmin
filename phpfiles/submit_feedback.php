<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

$user_id="2";
$feedback="your login is not working properly !!";

date_default_timezone_set("Indian/Maldives");
$feedback_date=date("M,d,Y h:i:s A");

if(mysqli_query($bbconn, "insert into feedback_table values(null,'$user_id','$feedback','$feedback_date','0')")){
    echo mysqli_insert_id($bbconn);
}else{
    echo mysqli_error($bbconn);
}

?>