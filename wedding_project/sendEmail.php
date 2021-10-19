<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['email'])) {

    session_start();
    $userid = $_SESSION['userid'];
    $e_name =  $_POST['e_name'];
    $name = "Wedding Planner";
    $relation = $_POST['relation'];
    $email = $_POST['email'];
    $header = $_POST['header'];
    $detail = "เรียนคุณ" . $e_name . " " . $_POST['detail'];

    // if(isset($_FILES['file'])){
    //     $errors= array();
    //     $file_name = $_FILES['file']['name'];
    //     $file_size = $_FILES['file']['size'];
    //     $file_tmp = $_FILES['file']['tmp_name'];
    //     $file_type = $_FILES['file']['type'];
    //     $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
        
    //     $expensions= array("jpeg","jpg","png","pdf");
        
    //     if(in_array($file_ext,$expensions)=== false){
    //        $errors[]="extension not allowed, please choose a PDF, JPEG or PNG file.";
    //     }
        
    //     if($file_size > 2097152) {
    //        $errors[]='File size must be excately 2 MB';
    //     }
        
    //     if(empty($errors)==true) {
    //        move_uploaded_file($file_tmp,"uploads/".$file_name); //The folder where you would like your file to be saved
    //        echo "Success";
    //     }else{
    //        print_r($errors);
    //     }
    //  }



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
    // $mail->addAttachment("uploads/".$filename);
    $mail->setFrom($email, $name);
    $mail->addAddress($email); // Send to mail
    $mail->Subject = $header;
    $mail->Body = $detail;


    $status = "";
    $response = "";
    if ($mail->send()) {
        $status = "success";
        $response = "Email is sent";


        include('condb.php');
        $sql = "INSERT INTO `email_list`(`e_name`, `relation`, `address`, `e_status`, `email_id`) VALUES ('test','test','test','sent',(SELECT email.email_id FROM email WHERE email.e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid)))";
        mysqli_query($conn, $sql);
    } else {
        $status = "failed";
        $response = "Something is wrong" . $mail->ErrorInfo;
    }

    echo json_encode(array("status" => $status, "response" => $response));
}
