<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['email'])) {

    session_start();
    $userid = $_SESSION['userid'];
    $e_name =  $_POST['e_name'];
    $get_detail = $_POST['detail'];
    $name = "Wedding Planner";
    $relation = $_POST['relation'];
    $email = $_POST['email'];
    $header = $_POST['header'];
    $file_name=$_POST['fileName'];
    // if(isset($_FILES['file']['name'])){
    //     $file_name = $_FILES['file']['name'];
    // }else{
    //     $file_name = $_POST['fileName'];
    // }
    // $file_name = $_FILES['file']['name'];
    // if (!$file_name) {
    //     $file_name = $_POST['fileName'];
    // }
    
   

    include('condb.php');
    $sql = "INSERT INTO `email_list`(`e_name`, `relation`, `address`, `e_status`, `email_id`) VALUES ('$e_name','$relation','$email','sent',(SELECT email.email_id FROM email WHERE email.e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid)))";
    $query = mysqli_query($conn, $sql);

    if($query){
        $last_id = mysqli_insert_id($conn) ;
    }


    $detail = '
    <br>
    เรียน คุณ' . $e_name . ' <br>
    ' . $get_detail . ' <br>
    ------------------------------------------------------------------------------------------------ <br>
    กดลิงค์นี้เพื่อยืนยันการเข้าร่วมงาน http://localhost/wedding_project/replying.php?id='. $last_id .'  <br>
    ------------------------------------------------------------------------------------------------';


    




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
    $mail->setFrom($email, $name);
    $mail->addAddress($email); // Send to mail
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

        $sql = "DELETE FROM `email_list` WHERE id = $last_id ";
        mysqli_query($conn,$sql);
    }

    echo json_encode(array("status" => $status, "response" => $response, "fileName" => $file_name));
}
