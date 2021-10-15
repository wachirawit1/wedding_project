<?php
include('condb.php');

$p_id = $_GET['id'];

$sql = "DELETE FROM post WHERE id = '$p_id' ";
$query = mysqli_query($conn,$sql );


if ($query) {
    echo "<script>" ;
    echo  "alert('ลบสำเร็จ');";
    echo  " window.location = 'admin_post.php';";
    echo  "</script>";

 } else { 
    echo "<script>" ;
    echo  "alert('ไม่ลบสำเร็จ');";
    echo  " window.location = 'admin_post.php';";
    echo  "</script>";
 }
?>