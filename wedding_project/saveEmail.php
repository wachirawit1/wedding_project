<?php
include('condb.php');
session_start();

// $userid = $_SESSION['userid'];
$userid = $_SESSION['userid'];
$header = $_POST['header'];
$detail = $_POST['detail'];


$date1 = date("Ymd_His");
$numrand = (mt_rand());

if (isset($_FILES['file'])) {
    $upload = $_FILES['file']['name'];
    if ($upload != '') {

        $path = "uploads/";
        $type = strrchr($_FILES['file']['name'], ".");
        $newname = $numrand . "-" . $date1 . $type;
        $path_copy = $path . $newname;
        $path_link = "uploads/" . $newname;

        move_uploaded_file($_FILES['file']['tmp_name'], $path_copy);
    } else {
        $newname = $_POST['fileName'];
    }
} else {
    $newname = $_POST['fileName'];
}

$check = "SELECT * FROM `email` , `e_id` WHERE e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid)";
$query_check = mysqli_query($conn, $check);
$num_check = mysqli_num_rows($query_check);
if ($num_check == 0) {
    $sql = "INSERT INTO `email`(`header`, `detail`,  `attach_file`, `e_id`) 
    VALUES ('$header','$detail', '$newname' , (SELECT event.e_id FROM event WHERE event.userid = $userid))";
    $query = mysqli_query($conn, $sql);
} elseif ($num_check > 0 && $row['e_id']) {
    $sql = "UPDATE `email` SET `header`='$header',`detail`='$detail' , `attach_file`='$newname' WHERE e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid)";
    $query = mysqli_query($conn, $sql);
}

echo json_encode(array("status" => "บันทึกสำเร็จแล้ว", "fileName" => $newname));
