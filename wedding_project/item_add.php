<?php
// print_r($_POST);
// exit();
include('condb.php');
$sql_id = "SELECT * FROM item_list ORDER BY list_id DESC LIMIT 1";
$query_id = mysqli_query($conn, $sql_id);
$row_id = mysqli_fetch_assoc($query_id);
$list_id = ++$row_id['list_id'];
$item_name = $_POST['item_name'];
$amount = $_POST['amount'];
$sql = "INSERT INTO item_list (list_id,item_name,amount) VALUES ( '$list_id','$item_name','$amount')";
$query = mysqli_query($conn, $sql);
// echo count($_POST['item_list']);
// exit();


// exit();
if ($query) {
    echo "<script>";
    echo "alert('สำเร็จ');";
    echo "window.location = 'item.php' ;";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('ไม่สำเร็จ');";
    echo "window.location = 'item.php' ;";
    echo "</script>";
}
