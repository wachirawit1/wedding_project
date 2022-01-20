<?php
include("condb.php");
session_start();
if (isset($_POST['susername']) && isset($_POST['spassword'])) {
  $username = mysqli_real_escape_string($conn, $_POST['susername']);
  $password = mysqli_real_escape_string($conn, $_POST['spassword']);
  $password = md5($password);


  $check_user = "SELECT * FROM store WHERE username='$username' AND password='$password'";

  $result = $conn->query($check_user);

  $row = mysqli_fetch_array($result);

  if ($result->num_rows > 0) {
    $_SESSION['s_id'] = $row['s_id'];
    $_SESSION['username'] = $username;
    $_SESSION['s_name'] = $row['s_name'];
  }
}
echo json_encode(array("text" => $username.$password));
?>
