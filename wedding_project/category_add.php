<?php
include('condb.php');

if (isset($_POST['cate_name'])) {
    $sql_id = "SELECT * FROM category ORDER BY cate_id DESC LIMIT 1";
    $query_id = mysqli_query($conn, $sql_id);
    $row_id = mysqli_fetch_assoc($query_id);

    $cate_id = ++$row_id['cate_id'];
    $cate_name = $_POST['cate_name'];
    $sql = "INSERT INTO category (cate_id,cate_name) VALUES ( '$cate_id','$cate_name')";
    $query = mysqli_query($conn, $sql);


    if ($query) {
        echo "<script>";
        echo "alert('สำเร็จ');";
        echo "window.location = 'category_store.php' ;";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('ไม่สำเร็จ');";
        echo "window.location = 'category_store.php' ;";
        echo "</script>";
    }
}
?>