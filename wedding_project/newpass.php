<?php
session_start();
include("condb.php");

$text = "";
$userid = $_SESSION['userid'];

$newpass = $_POST['newpass'];
$newpass = md5($newpass);

$oldpass = $_POST['oldpass'];
$oldpass = md5($oldpass);

$check = "SELECT password FROM member WHERE password = '$oldpass' AND id = $userid";
$check_result = mysqli_query($conn, $check);
$num_row = mysqli_num_rows($check_result);

if ($num_row == 0) {
    $text = "notcorrect";
} else {
    $sql = "UPDATE `member` SET `password`='$newpass' WHERE id = $userid";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $text = "success";
    } else {
        $text = "fail";
    }
}

echo json_encode(array("text" => $text));
