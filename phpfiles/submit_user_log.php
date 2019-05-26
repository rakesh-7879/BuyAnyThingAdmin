<?php
require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn=$db_handle->connectDB();

$name="user4";
$email="u4@gmail.com";
$mobile="7879812500";
$gender="Female";
$age="23";
$image="u4.jpg";
$type="CDnlpKq";
$password="user47879";

if(mysqli_query($bbconn, "insert into user_log values(null,'$name','$email','$mobile','$gender',$age,'$image','$type','$password','1')")){
    echo mysqli_insert_id($bbconn);
}else{
    echo mysqli_error($bbconn);
}

?>