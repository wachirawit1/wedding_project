<?php
include('condb.php');

$a_id = $_POST['a_id'];
$a_name = $_POST['a_name'];
$a_detail = $_POST['a_detail'];
if(isset($a_id)){
    $sql = "UPDATE activity SET  a_name = '$a_name',a_detail = '$a_detail' WHERE a_id = '$a_id'";
    $query = mysqli_query($conn,$sql) ;
    $sql_del = "DELETE FROM activity_listitem WHERE a_id = '$a_id' ";
    $query_del =  mysqli_query($conn,$sql_del);
    if(isset($_POST['item_list'])){
        for($i=0;$i<count($_POST['item_list']);$i++){
            $list_id = $_POST['item_list'][$i];
            $sql_item = "INSERT into activity_listitem (a_id,list_id)VALUES('$a_id','$list_id')";
            $query_item = mysqli_query($conn,$sql_item);
        }
    }
    if ($sql) {
        echo "<script>" ;
        echo  "alert('แก้ไขสำเร็จ');";
        echo "window.location = 't_action.php?t_id=".$_POST['t_id']."' ;"; 
        echo  "</script>";
    }
}else{
    echo "<script>" ;
        echo  "alert('แก้ไขไม่สำเร็จ');";
        echo "window.location = 't_action.php?t_id=".$_POST['t_id']."' ;"; 
        echo  "</script>";
}



