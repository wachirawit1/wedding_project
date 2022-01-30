
<?php


include("condb.php");
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $password = md5($password);


  $check_user = "SELECT * FROM member WHERE username='$username' AND password='$password'";

  $result = $conn->query($check_user);

  $row = mysqli_fetch_array($result);

  $type = $row['type'];
  if ($result->num_rows > 0) {
    if ($type == "01") {
      $_SESSION['userid'] = $row['id'];
      $_SESSION['username'] = $username;
      $_SESSION['name'] = $row['name'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['type'] = $type;

      // <!-- <div class="card box d-flex mt-5">
      //       <div class="card-header">แจ้งเตือน</div>
      //       <div class="card-body">
      //         <div class="alert alert-success " role="alert">
      //           <h5 class="card-title text-center">เข้าสู่ระบบสำเร็จ !!</h5>
      //         </div>
      //       </div>
      //     </div> -->

      // <!-- <script>
      //       swal({
      //         title: "การแจ้งเตือน",
      //         text: "เข้าสู่ระบบสำเร็จ",
      //         icon: "success",
      //         button: false
      //       });
      //     </script>

      //     <meta http-equiv="refresh" content="2; url=mainuser.php"> -->


    } else if ($type == "02") {
      $_SESSION['userid'] = $row['id'];
      $_SESSION['username'] = $username;
      $_SESSION['name'] = $row['name'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['type'] = $type;

      // <!-- <div class="card box d-flex mt-5">
      //       <div class="card-header">แจ้งเตือน</div>
      //       <div class="card-body">
      //         <div class="alert alert-success " role="alert">
      //           <h5 class="card-title text-center">เข้าสู่ระบบสำเร็จ !!</h5>
      //         </div>
      //       </div>
      //     </div> -->
      // <!-- <script>
      //       swal({
      //         title: "การแจ้งเตือน",
      //         text: "เข้าสู่ระบบสำเร็จ",
      //         icon: "success",
      //         button: false
      //       });
      //     </script>

      //     <meta http-equiv="refresh" content="2; url=traditional.php"> -->


    }
  } else {
    $type = "0";
  }
}

echo json_encode(array("type" => $type));




?>





