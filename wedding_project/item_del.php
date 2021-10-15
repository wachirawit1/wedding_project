<?php
include('condb.php');

$list_id = $_GET['id'];

$sql = "DELETE FROM item_list WHERE list_id = '$list_id' ";
$query = mysqli_query($conn,$sql );
$sql_item = "DELETE FROM activity_listitem WHERE list_id = '$list_id'";
$query_item = mysqli_query($conn,$sql_item);

if ($query) {
    echo "<script>" ;
    echo  "alert('ลบสำเร็จ');";
    echo  " window.location = 'item.php';";
    echo  "</script>";

 } else { 
    echo "<script>" ;
    echo  "alert('ไม่ลบสำเร็จ');";
    echo  " window.location = 'item.php';";
    echo  "</script>";
 }
?>