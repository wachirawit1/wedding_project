<?php session_start();
if (isset($_SESSION['username'])) {
  if ($_SESSION['type'] == "01") { ?>
    <script>
      alert('คุณได้สมัครสมาชิกแล้ว');
      window.location = 'mainuser.php';
    </script>
  <?php } elseif (isset($_SESSION['type']) == "02") { ?>
    <script>
      alert('คุณได้สมัครสมาชิกแล้ว');
      window.location = 'mainshop.php';
    </script>
  <?php } else { ?>
    <script>
      alert('คุณได้สมัครสมาชิกแล้ว');
      window.location = 'mainshop.php';
    </script>
  <?php } ?>

<?php }
?>


<!doctype html>
<html lang="en">

<head>
  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

  <!-- font family -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- เอฟเฟค -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Register Page</title>
  <style>
    body {
      font-family: 'Prompt', sans-serif;
      background-color: #f7d7c0;


    }
  </style>
</head>

<body>

  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      } 
    }
  </script>
  <br>
  <br>

  <div data-aos="zoom-out">
    <div class="container">
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">

          <div class="card">
            <div class="card-body mx-3">
              <center>
                <img class="img1" src="assets/images/logo.png" alt="logo" width="100">
                <h3 class="my-4">สมัครบัญชีผู้ใช้</h3>

              </center>
              <!-- notification -->



              <?php

              if ($_SESSION['errors'] != null) {
                echo "<div class='alert alert-danger py-2' role='alert'>";
                echo $_SESSION['errors'];
                echo "</div>";
                $_SESSION['errors'] = null;
              }

              ?>



              <form action="regis_db.php" method="POST" class="form-horizontal" enctype="multipart/form-data">

                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อผู้ใช้</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="" placeholder="" value="" required>
                  </div>
                </div>




                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">รหัสผ่าน</label>
                  <div class="col-sm-10">
                    <span>
                      <div class="input-group">

                        <input type="password" name="password" class="form-control" id="password" placeholder="" pattern=".{6,}" required>

                        <div class="input-group-append">
                          <span class="input-group-text" onclick="showpassword()"><img src="assets/images/eye.png" width="10" alt=""></span>
                          <!-- <button type="button" id="eyeop" onclick="showpassword()" class="input-group-text"><span class="glyphicon glyphicon-eye-open"></span></button> -->
                        </div>
                      </div>
                    </span>
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
                </div>

                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label m">ยืนยันรหัสผ่าน</label>



                  <div class="col-sm-10 mb-2">



                    <input type="password" name="cfpassword" class="form-control" id="" placeholder="" pattern=".{6,}" required>

                  </div>
                </div>



                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อ</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="" placeholder="" value="" required>
                  </div>
                </div>


                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">นามสกุล</label>
                  <div class="col-sm-10">
                    <input type="text" name="lastname" class="form-control" id="" placeholder="" value="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">วันเกิด</label>
                  <div class="col-sm-10">
                    <input type="date" name="birthday" class="form-control" id="" placeholder="" value="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">เพศ</label>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="" value="01" checked>
                      <label class="form-check-label" for="exampleRadios1"> ชาย
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="" value="02">
                      <label class="form-check-label" for="exampleRadios2"> หญิง
                      </label>
                    </div>

                  </div>
                </div>





                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">โทรศัพท์</label>
                  <div class="col-sm-10">
                    <input type="text" name="tel" class="form-control" id="" placeholder="" value="" pattern="[0-9]{10}">
                  </div>
                </div>


                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">E-mail</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="" placeholder="" value="" required>
                  </div>
                </div>




                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">รูปภาพ</label>
                  <div class="col-sm-10">




                    เลือกไฟล์ใหม่<br>


                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="img" name="img" onchange="readURL(this);">
                      <label class="custom-file-label" for="file">Choose file</label>
                    </div>
                    <br><br>


                    <img id="blah" src="#" alt="your image" width="300" />


                  </div>
                </div>

                <input type="hidden" name="mtype" value="01">












            </div>
            <div class="card-footer">
              <p class="font-weight-light">มีบัญชีแล้ว? <a href="login.php">เข้าสู่ระบบเลย</a></p>
              <button type="submit" name="register" class="btn btn-success btn-block ">สมัครสมาชิก</button>
            </div>

            </form>
          </div>


        </div>


      </div>
    </div>

  </div>


















  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>
    AOS.init({
      duration: 1000
    });
  </script>
</body>

</html>