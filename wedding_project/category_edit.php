<?php
include('condb.php');

if (isset($_POST['cate_id']) && isset($_POST['cate_name'])) {
    $cate_id = $_POST['cate_id'];
    $cate_name = $_POST['cate_name'];

    $sql = "UPDATE category SET  cate_name = '$cate_name' WHERE cate_id = '$cate_id'";
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