<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<style>
  body {
    font-family: 'Prompt', sans-serif;
    background-color: #f0e1dc;

  }
</style>

<body>
  <div class="container">

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

      if ($result->num_rows > 0) {
        if ($row['type'] == "01") {
          $_SESSION['userid'] = $row['id'];
          $_SESSION['username'] = $username;
          $_SESSION['name'] = $row['name'];
          $_SESSION['lastname'] = $row['lastname'];
          $_SESSION['type'] = $row['type']; ?>

          <!-- <div class="card box d-flex mt-5">
            <div class="card-header">แจ้งเตือน</div>
            <div class="card-body">
              <div class="alert alert-success " role="alert">
                <h5 class="card-title text-center">เข้าสู่ระบบสำเร็จ !!</h5>
              </div>
            </div>
          </div> -->
          <script>
            swal({
              title: "การแจ้งเตือน",
              text: "เข้าสู่ระบบสำเร็จ",
              icon: "success",
              button: false
            });
          </script>

          <meta http-equiv="refresh" content="3; url=mainuser.php">

        <?php
        } else if ($row['type'] == "02") {
          $_SESSION['userid'] = $row['id'];
          $_SESSION['username'] = $username;
          $_SESSION['name'] = $row['name'];
          $_SESSION['lastname'] = $row['lastname'];
          $_SESSION['type'] = $row['type']; ?>
          <!-- <div class="card box d-flex mt-5">
            <div class="card-header">แจ้งเตือน</div>
            <div class="card-body">
              <div class="alert alert-success " role="alert">
                <h5 class="card-title text-center">เข้าสู่ระบบสำเร็จ !!</h5>
              </div>
            </div>
          </div> -->
          <script>
            swal({
              title: "การแจ้งเตือน",
              text: "เข้าสู่ระบบสำเร็จ",
              icon: "success",
              button: false
            });
          </script>

          <meta http-equiv="refresh" content="2; url=traditional.php">

    <?php
        }
      } else {
        $_SESSION['errors'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
        session_write_close();
        echo "<script>";
        echo "window.location = 'login.php'; ";
        echo "</script>";
      }
    }



    ?>
  </div>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>