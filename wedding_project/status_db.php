<?php
include('condb.php');
session_start();


$ae_id = $_POST['id'];
$userid = $_SESSION['userid'];

// if ($status == "uncheck" || $status = "") {
$sql = "UPDATE `activity_event` 
SET `ae_status`='check' 
WHERE activity_event.e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid AND status = 1) 
AND ae_id = '$ae_id'";

mysqli_query($conn, $sql);
echo "success";
// header('Location: schedule.php');
// }
