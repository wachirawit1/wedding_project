<?php
include('condb.php');
session_start();
$userid = $_SESSION['userid'];
$status = "";
$sql = "UPDATE `event` SET `status`= 2 WHERE userid = $userid";
$result = mysqli_query($conn, $sql);
if ($result) {
    $status = "success";
} else {
    $status = "failed";
}

