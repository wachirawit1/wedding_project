<?php
include('condb.php');
    if (isset($_POST['newpass'])) {
        $id = $_POST['id'];
        $newpass = md5($_POST['newpass']);

        $sql = "UPDATE `member` SET `password`='$newpass' WHERE 'id' = '$id' ";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo json_encode(array("status" => "เปลี่ยนรหัสผ่านสำเร็จ"));
        } else {
            echo json_encode(array("status" => "เปลี่ยนรหัสผ่านไม่สำเร็จ"));
        }
    }else{
        echo json_encode(array("status" => "เปลี่ยนรหัสผ่านไม่สำเร็จ")) ;
    }
