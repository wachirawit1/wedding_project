<?php
session_start();
if (isset($_SESSION['username'])) {
  if (isset($_SESSION['type']) == "01") { ?>
    <script>
      alert('คุณได้เข้าสู่ระบบแล้ว');
      window.location = 'mainuser.php';
    </script>
  <?php } elseif (isset($_SESSION['type']) == "02") { ?>
    <script>
      alert('คุณได้เข้าสู่ระบบแล้ว');
      window.location = 'mainshop.php';
    </script>
  <?php } else { ?>
    <script>
      alert('คุณได้เข้าสู่ระบบแล้ว');
      window.location = 'mainadmin.php';
    </script>
  <?php } ?>

<?php } else {
  echo "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Page</title>

  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

  <!-- button Icon -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <!-- <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">

  <!-- font -->
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<style>
  body {
    font-family: 'Prompt', sans-serif;
    background-color: #f7d7c0;

  }




  /*font-size: 14px;*/
</style>



<body>
  <div data-aos="zoom-in-down">
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0 ">
      <div class="container">
        <div class="card login-card rounded">
          <div class="row no-gutters">

            <div class="col-md-5 ">
              <div class="card-body">
                <!-- <div class="brand-wrapper ">
                  <img src="assets/images/new_logo.png" alt="logo" class="" width="25%">
                </div> -->
                <p class="login-card-description">เข้าสู่ระบบ</p>
                <form action="clogin.php" method="POST">
                  <!-- notification -->

                  <?php

                  if (isset($_SESSION['errors'])) { ?>
                    <div class='alert alert-danger py-2' role='alert' style='font-size : 15px'>
                      <?php echo $_SESSION['errors']; ?>
                    </div>
                  <?php
                    $_SESSION['errors'] = null;
                  } else {
                    $_SESSION['errors'] = null;
                    echo $_SESSION['errors'];
                  }

                  ?>




                  <div class="form-group">
                    <label for="email" class="sr-only">ชื่อผู้ใช้</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="ชื่อผู้ใช้">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">รหัสผ่าน</label>
                    <span>
                      <div class="input-group">

                        <input type="password" name="password" class="form-control" id="password" placeholder="รหัสผ่าน" value="" required>

                        <div class="input-group-append">
                          <span class="input-group-text" onclick="showpassword()"><img src="assets/images/eye.png" width="10" alt=""></span>
                        </div>
                      </div>
                    </span>
                    <div class="d-flex justify-content-end mt-3">

                      <a href="forgot_pass.php">ลืมรหัสผ่าน</a>
                    </div>

                    <script type="text/javascript">
                      function showpassword() {
                        var data = document.getElementById('password');
                        if (data.type == 'password') {
                          data.type = 'text';

                        } else {
                          data.type = 'password';

                        }

                      }
                    </script>


                  </div>



                  <button id="login" class="btn btn-block login-btn mb-4" style="background-color: #dbb89a;" type="submit">เข้าสู่ระบบ</button>
                </form>

                <p class="login-card-footer-text">ไม่มีบัญชี? <a href="regis.php" class="">สมัครที่นี่</a></p>

                <nav class="login-card-footer-nav">
                  <a href="index.php" class="mb-5"><img src="assets/images/back.png" alt="" width="20px"></a>
                </nav>
              </div>
            </div>

            <div class="col-md-7">
              <img src="assets/images/login.jpg" alt="login" class="login-card-img">
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
  <!-- <script>
    $(document).ready(function() {
      const btn = $('#login');
      const username = $('#username');
      const password = $('#password');
      btn.click(function() {
        $.ajax({
          url: 'clogin.php',
          type: 'POST',
          data: {
            username: username.val(),
            password: password.val()
          },
          success: function(response) {
            alert("success")
          }
        })
      });
    });
  </script> -->



  <script>
    AOS.init({
      duration: 1000
    });
  </script>
</body>

</html>