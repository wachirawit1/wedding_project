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

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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


        a.nav-link {
            color: grey;
        }


        a.nav-link:hover {
            color: #dbb89a !important;
        }

        .list-group-item.active {
            background-color: #dbb89a;
            border-color: #dbb89a;
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

        $sql = "SELECT * FROM store WHERE username = '$username' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $img = $row['s_img'];
        $path = "img/";
    }
    ?>

    <?php include('navbar_store.php') ?>



    <!-- breadcrums -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="storepost.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">profile</li>
        </ol>
    </nav>

    <div class="container mb-5">
        <div class="row">
            <div class="col-3 ">
                <div class="list-group shadow" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="myinfo" data-toggle="list" href="#list-myinfo" role="tab" aria-controls="home">ข้อมูลส่วนตัว</a>
                    <a class="list-group-item list-group-item-action text-danger" id="changepass" data-toggle="list" href="#list-changepass" role="tab" aria-controls="profile">เปลี่ยนรหัสผ่าน</a>
                </div>
            </div>
            <div class="col shadow">
                <div class="tab-content" id="nav-tabContent">
                    <!-- ข้อมูลส่วนตัว -->
                    <div class="tab-pane fade show active" id="list-myinfo" role="tabpanel" aria-labelledby="myinfo">

                        <div class="row justify-content-around p-3">


                            <div class="col">
                                <div class="row justify-content-md-center">
                                    <div class="col col-lg-4 border-right">
                                        <div class="form-group row">
                                            <div class="col-6 ml-auto text-center">
                                                <a type="button" class="" href="#" data-toggle="modal" data-target="#edituser">
                                                    <i class="fas fa-edit" style="color: #dbb89a;">แก้ไขข้อมูล</i>
                                                </a>
                                            </div>

                                        </div>

                                        <div class="form-group row  my-1 mx-auto">
                                            <div class="col">
                                                <label for="formGroupExampleInput">ชื่อร้านค้า</label>
                                                <input class="form-control text-center" type="text" placeholder="" value="<?php echo $row['s_name'] ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group  mx-auto my-1">
                                            <div class="col">
                                                <label for="formGroupExampleInput">เบอร์โทรศัพท์</label>
                                                <input class="form-control text-center" type="text" placeholder="" value="<?php echo $row['s_tel'] ?>" readonly>
                                            </div>

                                        </div>

                                        <div class="form-group ">
                                            <div class="col">
                                                <div class="">
                                                    <label for="formGroupExampleInput">อีเมล</label>
                                                    <input class="form-control text-center" type="text" placeholder="" value="<?php echo $row['s_email'] ?>" readonly>
                                                </div>
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



                    <!-- เปลี่ยนรหัสผ่าน -->
                    <div class="tab-pane fade" id="list-changepass" role="tabpanel" aria-labelledby="changepass">
                        <div class="p-3">

                            <div class="form-group ">
                                <div class="alert alert-danger p-1 text-center col-4" role="alert">
                                    -----/////-----
                                </div>
                                <label for="staticEmail" class="col-sm-2 col-form-label">รหัสผ่านเดิม</label>
                                <div class="col-4">

                                    <input type="password" class="form-control" id="oldpass">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="inputPassword" class="col-sm-2 col-form-label">รหัสผ่านใหม่</label>
                                <div class="col-4">
                                    <input type="password" class="form-control" id="newpass">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-4">
                                    <button type="button" class="btn btn-block" id="submitbtn" style="background-color: #dbb89a;color: #ffff;">เปลี่ยนรหัสผ่าน</button>
                                </div>
                            </div>
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
                    <form action="edit_store.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row mt-2">
                                <div class="col ">
                                    <img src="<?php echo $path . $img ?>" id="blah" alt="your image" width="200" height="200" class="rounded d-block mx-auto">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="s_img" onchange="readURL(this);">
                                        <label class="custom-file-label" for="customFile">เลือกรูปภาพ</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">

                                <div class="col">ชื่อร้านค้า<input type="text" class="form-control" value="<?php echo $row['s_name'] ?>" name="s_name"></div>


                            </div>


                            <div class="row mt-2">
                                <div class="col">
                                    โทรศัพท์ :<input type="text" class="form-control" value="<?php echo $row['s_tel'] ?>" name="s_tel" pattern="[0-9]{10}"> <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    อีเมล :<input type="email" class="form-control" value="<?php echo $row['s_email'] ?>" name="s_email">
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






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.alert').hide();
            $('#submitbtn').click(function() {
                let oldpass = $('#oldpass');
                let newpass = $('#newpass');
                if (oldpass.val() == "" || newpass == "") {
                    oldpass.css("border", "1px solid #dc3545");
                    newpass.css("border", "1px solid #dc3545");
                } else {
                    $.ajax({
                        url: "newpass_store.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            oldpass: oldpass.val(),
                            newpass: newpass.val()
                        },
                        success: function(data) {
                            if (data.text == "success") {
                                swal({
                                    text: "เปลี่ยนรหัสผ่านสำเร็จ",
                                    icon: "success",
                                    button: false,
                                    timer: 1000
                                }).then((value) => {
                                    newpass.val("");
                                    oldpass.val("");
                                });
                            } else {
                                $('.alert').show(500);
                                $('.alert').text('รหัสผ่านไม่ถูกต้อง');
                            }
                        },
                        error: function(data) {
                            console.error(data);
                            console.log(data.text);
                        }
                    });
                }
            });

        });
    </script>
</body>


</html>