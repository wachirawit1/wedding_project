<?php
include('condb.php');

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['email'])) {

    $name = "Wedding Planner";
    $header = "เปลี่ยนรหัสผ่าน";

    $email = $_POST['email'];

    $sql = "SELECT `id`, `email` FROM `member` WHERE email = '$email'";
    $check = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($check);



    if ($num > 0) {
       $row = mysqli_fetch_array($check);
       $id = $row['id'] ;

        $detail = 'กรุณาเปลี่ยนรหัสผ่านที่ลิงก์ข้างล่างนี้ <br><br>
    
        ---------------------------------------------------------------------------<br>
        http://localhost/wedding_project/change_password.php?id='."$id".'        <br>
        ----------------------------------------------------------------------------
        ';

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
        // $mail->addAttachment('img/'.$file_name);
        $mail->setFrom($email, $name);
        $mail->addAddress($email); // Send to mail
        $mail->Subject = $header;
        $mail->Body = $detail;

        if ($mail->send()) {
            $status = "อีเมลถูกส่งไปแล้ว กรุณาตรวจสอบ";
            $response = "Email is sent";
        } else {
            $status = "failed";
            $response = "Something is wrong" . $mail->ErrorInfo;
        }
    }

    echo json_encode(array("status" => $status, "response" => $response));
}
