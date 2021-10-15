<?php
include('condb.php');

$a_id = $_GET['id'];

$sql = "DELETE FROM activity WHERE a_id = '$a_id' ";
$query = mysqli_query($conn,$sql );
$sql_item = "DELETE FROM activity_listitem WHERE a_id = '$a_id'";
$query_item = mysqli_query($conn,$sql_item);

if ($query) {
    echo "<script>" ;
    echo  "alert('ลบสำเร็จ');";
    echo "window.location = 't_action.php?t_id=".$_GET['t_id']."' ;"; 
    echo  "</script>";

 } else { 
    echo "<script>" ;
    echo  "alert('ไม่ลบสำเร็จ');";
    echo "window.location = 't_action.php?t_id=".$_GET['t_id']."' ;"; 
    echo  "</script>";
 }
?>