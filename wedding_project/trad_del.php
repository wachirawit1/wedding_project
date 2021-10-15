<?php
include('condb.php');

$t_id = $_GET['id'];

$sql = "DELETE FROM traditional WHERE t_id = '$t_id' ";
$query = mysqli_query($conn,$sql );


if ($query) {
    echo "<script>" ;
    echo  "alert('ลบสำเร็จ');";
    echo  " window.location = 'traditional.php';";
    echo  "</script>";

 } else { 
    echo "<script>" ;
    echo  "alert('ไม่ลบสำเร็จ');";
    echo  " window.location = 'traditional.php';";
    echo  "</script>";
 }
?>