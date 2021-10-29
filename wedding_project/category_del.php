<?php
include('condb.php');

if (isset($_POST['cate_id'])) {
   $cate_id = $_POST['cate_id'];

   $sql = "DELETE FROM category WHERE cate_id = '$cate_id' ";
   $query = mysqli_query($conn, $sql);


   if ($query) {
      echo "<script>";
      echo  "alert('ลบสำเร็จ');";
      echo  " window.location = 'category_store.php';";
      echo  "</script>";
   } else {
      echo "<script>";
      echo  "alert('ไม่ลบสำเร็จ');";
      echo  " window.location = 'category_store.php';";
      echo  "</script>";
   }
}else{
   echo "<script>";
   echo "console.log('ไม่มีค่าส่งมา')" ;
   echo "</script>";
}

?>
