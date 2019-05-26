<?php

require 'dbcontroller.php';
$db_handle = new DBController();
$bbconn = $db_handle->connectDB();

if (isset($_GET["seen"])) {
    $where = " where a.seen=" . $_GET["seen"];
} else {
    $where = "";
}

$bbsql = mysqli_query($bbconn, "select a.*,b.* from feedback_table as a left join user_log as b on a.user_id=b.user_id" . $where);
$data = array();
while ($bbrow = mysqli_fetch_assoc($bbsql)) {
    $temp = array();
    $temp["feedback_id"] = $bbrow["feedback_id"];
    $temp["user_id"]=$bbrow["user_id"];
    $temp["user_name"]=$bbrow["user_full_name"];
    $temp["user_email"]=$bbrow["user_email"];
    $temp["user_mobile"]=$bbrow["user_mobile"];
    $temp["user_gender"]=$bbrow["user_gender"];
    $temp["user_age"]=$bbrow["user_age"];
    $temp["user_image"]=$bbrow["user_image"];
    $temp["feedback"] = $bbrow["feedback"];
    $temp["date"] = $bbrow["date"];
    array_push($data, $temp);
}
echo json_encode($data);
?>