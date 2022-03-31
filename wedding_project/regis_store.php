<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

  <!-- icon -->
  <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>

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

    function readURL1(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah1').attr('src', e.target.result);
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

          <div class="card bg-light">
            <div class="card-body mx-3">
              <center>
                <img class="img1" src="assets/images/logo.png" alt="logo" width="20%">
                <h3 class="my-4">สมัครบัญชีร้านค้า</h3>

              </center>
              <!-- notification -->



              <?php

              if (isset($_SESSION['errors']) != null) {
                echo "<div class='alert alert-danger py-2' role='alert'>";
                echo isset($_SESSION['errors']);
                echo "</div>";
                $_SESSION['errors'] = null;
              }

              ?>



              <form action="regis_db_store.php" method="POST" class="form-horizontal" enctype="multipart/form-data">

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
                          <span class="input-group-text" onclick="showpassword()"><i class="far fa-eye"></i></span>
                          <!-- <button type="button" id="eyeop" onclick="showpassword()" class="input-group-text"><span class="glyphicon glyphicon-eye-open"></span></button> -->
                        </div>
                      </div>
                    </span>
                    <script type="text/javascript">
                      function showpassword() {
                        var data = document.getElementById('password');
                        if (data.type == 'password') {
                          data.type = 'text';
                          $('.far').attr('class', 'far fa-eye-slash');
                        } else {
                          data.type = 'password';
                          $('.far').attr('class', 'far fa-eye');
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

                <!-- <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">โทรศัพท์</label>
                  <div class="col-sm-10">
                    <input type="text" name="tel" class="form-control" id="" placeholder="" value="" pattern="[0-9]{10}">
                  </div>
                </div> -->


                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">E-mail</label>
                  <div class="col-sm-10">
                    <input type="email" name="s_email" class="form-control" id="" placeholder="" value="" required>
                  </div>
                </div>


                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อร้านค้า</label>
                  <div class="col-sm-5">

                    <input type="text" name="s_name" class="form-control" id="" placeholder="" value="" required>

                  </div>
                  <div class="col-sm-5">
                    <select class="custom-select" id="validationDefault04" name="category" required>
                      <option selected disabled value="">เลือกหมวดหมู่ร้านค้า</option>
                      <?php
                      include('condb.php');
                      $sql = "SELECT * FROM category";
                      $query = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $row['cate_id'] ?>"><?= $row['cate_name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">โทรศัพท์</label>
                  <div class="col-sm-10">

                    <input type="text" name="s_tel" class="form-control" id="" placeholder="" value="" pattern="[0-9]{10}" required>

                  </div>

                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">รูปภาพบัตรประชาชน</label>
                  <div class="col-sm-10">




                    เลือกไฟล์ใหม่<br>


                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="img1" name="IDcard_img" onchange="readURL1(this);">
                      <label class="custom-file-label" for="file">Choose file</label>
                    </div>
                    <br><br>

                    <div class="card text-center border-0">
                      <div class="card-body ">
                        <img id="blah1" src="assets/images/id_card.jpg" alt="your image" width="300" />
                      </div>
                    </div>

                  </div>
                </div>


                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">รูปภาพโปรไฟล์</label>
                  <div class="col-sm-10">




                    เลือกไฟล์ใหม่<br>


                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="img" name="s_img" onchange="readURL(this);">
                      <label class="custom-file-label" for="file">Choose file</label>
                    </div>
                    <br><br>

                    <div class="card text-center border-0">
                      <div class="card-body ">

                        <img id="blah" src="assets/images/image-regular.svg" alt="your image" width="300" />

                      </div>
                    </div>


                  </div>
                </div>












            </div>
            <div class="card-footer">
              <p class="font-weight-light">มีบัญชีแล้ว? <a href="index.php">เข้าสู่ระบบเลย</a></p>
              <button type="submit" name="register" class="btn btn-success btn-block ">สมัครสมาชิก</button>
            </div>

            </form>
          </div>


        </div>
        <div class="col-md-2">
        </div>
      </div>
    </div>
    <br>
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