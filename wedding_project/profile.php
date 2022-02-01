<?php session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Wedding Planner</title>
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #ffffff;
        }

        .nav-item {
            font-size: 16px;
            padding-left: 16px;
            padding-right: 16px;
        }

        li:hover {
            background-color: white;
        }

        a.nav-link {
            color: grey;
        }

        a.nav-link:hover {
            color: #dbb89a !important;
        }
    </style>

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

</head>


<body>
    <?php
    if (!isset($_SESSION['username'])) { ?>
        <div class='alert alert-danger' role='alert'>
            <h4 class='alert-heading'>แจ้งเตือน !</h4>
            <p>คุณยังไม่ได้เข้าสู่ระบบ โปรดเข้าสู่ระบบอีกครั้ง</p>
            <hr>
            <p class='mb-0'><a href='index.php' class='alert-link'>กลับไปเข้าสู่ระบบ</a></p>
        </div>
    <?php
        exit;
    }

    if (isset($_SESSION['username'])) {
        include('condb.php');
        $username = $_SESSION['username'];

        $sql = "SELECT * FROM member WHERE username = '$username' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $img = $row['img'];
        $path = "img/";
    }
    ?>

    <?php include('navbaruser.php') ?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ต้องการออกจากระบบ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <a href="logout.php?logout=1" type="button" class="btn btn-success">ยืนยัน</a>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrums -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="mainuser.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">profile</li>
        </ol>
    </nav>

    <div class="container mb-5">
        <div class="row card ">
            <div class="row mx-auto my-5">
                <div class="col">
                    <h2 class="font-weight-bold text-center text-secondary">ข้อมูลส่วนตัว</h2>
                </div>
            </div>

            <div class="col card-body">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-4 border-right">
                        <div class="form-group row">
                            <div class="col-6 ml-auto text-center"><a type="button" class="" href="#" data-toggle="modal" data-target="#edituser">
                                    <i class="fas fa-edit">แก้ไขข้อมูล</i>
                                </a>
                            </div>

                        </div>

                        <div class="form-group row  my-1 mx-auto">
                            <div class="col">
                                <label for="formGroupExampleInput">ชื่อ</label>
                                <input class="form-control" type="text" placeholder="" value="<?php echo $row['name'] ?>" readonly>
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput">นามสกุล</label>
                                <input class="form-control" type="text" placeholder="" value="<?php echo $row['lastname'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group  my-1 justify-content-center">
                            <div class="col">
                                <label for="formGroupExampleInput">วันเกิด</label>
                                <input class="form-control text-center" type="text" placeholder="" value="<?php echo $row['birthday'] ?>" readonly>
                            </div>

                        </div>
                        <div class="form-group  my-1 justify-content-center">
                            <div class="col">
                                <label for="formGroupExampleInput">เพศ</label>
                                <input class="form-control text-center" type="text" placeholder="" value="<?php if ($row['gender'] == "01") {
                                                                                                                echo "ชาย";
                                                                                                            } else {
                                                                                                                echo "หญิง";
                                                                                                            } ?>" readonly>
                            </div>

                        </div>
                        <div class="form-group  mx-auto my-1">
                            <div class="col">
                                <label for="formGroupExampleInput">เบอร์โทรศัพท์</label>
                                <input class="form-control text-center" type="text" placeholder="" value="<?php echo $row['tel'] ?>" readonly>
                            </div>

                        </div>

                        <div class="form-group ">
                            <div class="col">
                                <div class="">
                                    <label for="formGroupExampleInput">อีเมล</label>
                                    <input class="form-control text-center" type="text" placeholder="" value="<?php echo $row['email'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col">
                                <div class="">
                                    <label for="formGroupExampleInput">ประเภทผู้ใช้</label>
                                    <input class="form-control text-center bg-success text-white" type="text" placeholder="" value="<?php if ($row['type'] == "01") {
                                                                                                                                        echo "ผู้ใช้งานทั่วไป";
                                                                                                                                    } else {
                                                                                                                                        echo "ผู้ดูแลระบบ";
                                                                                                                                    } ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="from-group row mx-auto">
                            <div class="col">
                                <a type="button" class="btn btn-secondary" href="mainuser.php" class="">กลับ</a>
                            </div>


                        </div>


                    </div>
                    <div class="col-md-auto">

                    </div>
                    <div class="col col-lg-4 ">
                        <div class="form-group"></div>
                        <img src="<?php echo $path . $img ?>" alt="no image" class="card-img-top rounded" style="width: 300px; height: 300px;">
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="container" style="width: 50%;">
            <div class="modal-dialog " role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูล</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="edit_user.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row mt-2">
                                <div class="col ">
                                    <img src="<?php echo $path . $img ?>" id="blah" alt="your image" width="200" height="200" class="rounded d-block mx-auto">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="img" onchange="readURL(this);">
                                        <label class="custom-file-label" for="customFile">เลือกรูปภาพ</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">

                                <div class="col">ชื่อ<input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="name"></div>
                                <div class="col">นามสกุล<input type="text" class="form-control" value="<?php echo $row['lastname'] ?>" name="lastname"></div>


                            </div>

                            <div class="row mt-2">
                                <div class="col">

                                    วันเกิด<input type="date" class="form-control" value="<?php echo $row['birthday'] ?>" name="birthday">
                                </div>

                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-1">
                                    เพศ

                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="01" <?php if ($row['gender'] == "01") {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                                        <label class="form-check-label" for="exampleRadios1">
                                            ชาย
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="02" <?php if ($row['gender'] == "02") {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                                        <label class="form-check-label" for="exampleRadios2">
                                            หญิง
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    เบอร์โทรศัพท์ :<input type="text" class="form-control" value="<?php echo $row['tel'] ?>" name="tel" pattern="[0-9]{10}"> <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    อีเมล :<input type="email" class="form-control" value="<?php echo $row['email'] ?>" name="email">
                                </div>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer class="bg-light text-center text-lg-start" style=" bottom : 0 ; left : 0 ;right : 0; text-align: center;">
        <!-- Copyright -->
        <div class="text-center p-3">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">weddingplanner.com</a>
        </div>
        <!-- Copyright -->
    </footer>




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