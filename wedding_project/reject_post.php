<?php
include('condb.php');

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['p_id'])) {

    $p_id = $_POST['p_id'];

    $sqlemail = "SELECT * FROM post INNER JOIN store ON post.id_store = store.s_id WHERE post.id = $p_id";
    $queryemail = mysqli_query($conn, $sqlemail);
    $row = mysqli_fetch_array($queryemail);

    $note = $_POST['note'];
    $s_name = "ร้าน" . $row['s_name'];
    $name = "Wedding Planner";
    $email = $row['s_email'];
    $header = "การอนุมัติ"; //หัวข้อเรื่อง
    $detail = "เรียน" . $s_name . "\nโพสต์ของร้านของคุณถูกปฏิเสธการโพสต์โฆษณา เนื่องจาก ". $note ;



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

    $status = "";
    $response = "";
    if ($mail->send()) {

        $id = $_POST['p_id'];
        $note = $_POST['note'];
        $sql = "UPDATE post SET note = '$note' , status = 2 WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script>";
            echo "alert('ยืนยันเรียบร้อยแล้ว');";
            echo "window.location = 'admin_post.php'";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('เกิดข้อผิดพลาด');";
            echo "window.location = 'admin_post.php'";
            echo "</script>";
        }
    } else {
        $status = "failed";
        $response = "Something is wrong" . $mail->ErrorInfo;

        echo "<script>";
        echo  "alert('ไม่สำเร็จ');";
        echo  " window.location = 'admin_post.php';";
        echo  "</script>";
    }
}

?>
