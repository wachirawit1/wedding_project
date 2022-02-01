<?php
include('condb.php');
$id = $_POST['id'];
$type = $_POST['type'];
if (isset($_POST['newpass'])) {
    $newpass = md5($_POST['newpass']);
    if ($type == "user") {
        $sql = "UPDATE `member` SET `password` = '$newpass' WHERE `member`.`id` = $id";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo json_encode(array("status" => "เปลี่ยนรหัสผ่านสำเร็จ"));
        } else {
            echo json_encode(array("status" => "เปลี่ยนรหัสผ่านไม่สำเร็จ"));
        }
    } else {
        $sql = "UPDATE `store` SET `password` = '$newpass' WHERE `store`.`s_id` = $id";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo json_encode(array("status" => "เปลี่ยนรหัสผ่านสำเร็จ"));
        } else {
            echo json_encode(array("status" => "เปลี่ยนรหัสผ่านไม่สำเร็จ"));
        }
    }
} else {
    echo json_encode(array("status" => "เปลี่ยนรหัสผ่านไม่สำเร็จ", "id" => $id, "type" => $type ,"pass" => $newpass));
}
