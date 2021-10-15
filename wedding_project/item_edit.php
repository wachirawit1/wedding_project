<?php
include('condb.php');

$list_id = $_POST['list_id'];
if(isset($list_id)){
    $item_name = $_POST['item_name'];
    $amount = $_POST['amount'];
    $sql = "UPDATE item_list SET  item_name = '$item_name' , amount = '$amount' WHERE list_id='$list_id'";
    $query = mysqli_query($conn,$sql) ;
  

        }

    if ($sql) {
        echo "<script>" ;
        echo  "alert('แก้ไขสำเร็จ');";
        echo  " window.location = 'item.php';";
        echo  "</script>";
    }
else{
    echo "<script>" ;
        echo  "alert('แก้ไขไม่สำเร็จ');";
        echo  " window.location = 'item.php';";
        echo  "</script>";
}



