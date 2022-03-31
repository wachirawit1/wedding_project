<?php
session_start();
include("condb.php");

$text = "";
$s_id = $_SESSION['s_id'];

$newpass = $_POST['newpass'];
$newpass = md5($newpass);

$oldpass = $_POST['oldpass'];
$oldpass = md5($oldpass);

$check = "SELECT password FROM store WHERE password = '$oldpass' AND s_id = $s_id";
$check_result = mysqli_query($conn, $check);
$num_row = mysqli_num_rows($check_result);

if ($num_row == 0) {
    $text = "notcorrect";
} else {
    $sql = "UPDATE `store` SET `password`='$newpass' WHERE s_id = $s_id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $text = "success";
    } else {
        $text = "fail";
    }
}

echo json_encode(array("text" => $text));
