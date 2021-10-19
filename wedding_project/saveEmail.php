<?php
include('condb.php');
session_start();

// $userid = $_SESSION['userid'];
$userid = $_SESSION['userid'];
$header = $_POST['header'];
$detail = $_POST['detail'];

$check = "SELECT * FROM `email` WHERE e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid)";
$query_check = mysqli_query($conn, $check);
$num_check = mysqli_num_rows($query_check);
if ($num_check == 0) {
    $sql = "INSERT INTO `email`(`header`, `detail`, `e_id`) 
    VALUES ('$header','$detail',(SELECT event.e_id FROM event WHERE event.userid = $userid))";
    $query = mysqli_query($conn, $sql);
    echo "บันทึกแล้ว";
}elseif($num_check == 1){
    $sql = "UPDATE `email` SET `header`='$header',`detail`='$detail' WHERE e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid)" ;
    $query = mysqli_query($conn,$sql) ;
    echo "บันทึกแล้ว" ;
}
