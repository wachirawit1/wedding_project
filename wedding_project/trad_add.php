<?php

include('condb.php');
$sql_id = "SELECT * FROM traditional ORDER BY t_id DESC LIMIT 1";
$query_id = mysqli_query($conn, $sql_id);
$row_id = mysqli_fetch_assoc($query_id);
$t_id = ++$row_id['t_id'];
$trad_name = $_POST['trad_name'];

$date1 = date("Ymd_His");
$numrand = (mt_rand());
$img = (isset($_FILES['trad_img']) ? $_FILES['trad_img'] : '');
$upload = $_FILES['trad_img']['name'];

if ($upload != '') {
    $path = "assets/tradition_img/";
    $type = strrchr($_FILES['trad_img']['name'], ".");
    $newname = $numrand . $date1 . $type;
    $path_copy = $path . $newname;
    $path_link = "assets/tradition_img/" . $newname;
    move_uploaded_file($_FILES['trad_img']['tmp_name'], $path_copy);
} else {
    $newname = "";
}

$sql = "INSERT INTO traditional (t_id,trad_name,trad_img) VALUES ( '$t_id','$trad_name','$newname')";
$query = mysqli_query($conn, $sql);
exit;

// exit();
if ($query) {
    echo "<script>";
    echo "alert('สำเร็จ');";
    echo "window.location = 'traditional.php' ;";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('ไม่สำเร็จ');";
    echo "window.location = 'traditional.php' ;";
    echo "</script>";
}
