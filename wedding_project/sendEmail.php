<?php

use PHPMailer\PHPMailer\PHPMailer;




// if(isset($_POST['emailArr']))
session_start();
$userid = $_SESSION['userid'];

$get_detail = $_POST['detail'];
$name = "Wedding Planner";
$header = $_POST['header'];
$file_name = $_POST['fileName'];

$name_array = explode(",", $_POST['nameArr']);
$relation_array = explode(",", $_POST['relationArr']);
$email_array = explode(",", $_POST['emailArr']);



include('condb.php');

for ($i = 0; $i < sizeof($name_array); $i++) {
    $sql = "INSERT INTO `email_list`(`e_name`, `relation`, `address`, `email_id`) 
    VALUES (" . "'" . $name_array[$i] . "'" . "," . "'" . $relation_array[$i] . "'" . "," . "'" . $email_array[$i] . "'" . ",(SELECT email.email_id FROM email WHERE email.e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid)))";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $last_id = mysqli_insert_id($conn);
    }




    $detail = '
    <br>
    เรียน คุณ' . $name_array[$i] . ' <br><br>
    
    ' . $get_detail . ' <br><br>
    
    ----------------------------------------------------------------------------------------------------------------------- <br>
    กรุณาคลิกที่ลิงค์นี้เพื่อตอบกลับการเข้าร่วมงาน http://localhost/wedding_project/replying.php?id=' . $last_id . '  <br>
    -----------------------------------------------------------------------------------------------------------------------';

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();


    // SMTP Settings
    $mail->CharSet = "utf-8";
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "khemloveice@gmail.com"; // enter your email address
    $mail->Password = "0999170023dd"; // enter your password
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email_array[$i], $name);
    $mail->addAddress($email_array[$i]); // Send to mail
    $mail->AddAttachment("uploads/$file_name");
    $mail->Subject = $header;
    $mail->Body = $detail;


    $status = "";
    $response = "";
    if ($mail->send()) {
        $status = "success";
        $response = "Email is sent";
    } else {
        $status = "failed";
        $response = "Something is wrong" . $mail->ErrorInfo;

        // $sql = "DELETE FROM `email_list` WHERE id = $last_id ";
        // mysqli_query($conn, $sql);
    }
}
echo json_encode(array("status" => $status, "response" => $response, "fileName" => $file_name));
