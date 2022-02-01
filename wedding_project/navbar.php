<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<?php
session_start();
if (isset($_SESSION['username'])) {
    if (isset($_SESSION['type']) == "01") { ?>
        <script>
            alert('คุณได้เข้าสู่ระบบแล้ว');
            window.location.replace('mainuser.php');
        </script>
    <?php } elseif (isset($_SESSION['type']) == "02") { ?>
        <script>
            alert('คุณได้เข้าสู่ระบบแล้ว');
            window.location.replace('storepost.php');
        </script>
    <?php } else { ?>
        <script>
            alert('คุณได้เข้าสู่ระบบแล้ว');
            window.location.replace('traditional.php');
        </script>
    <?php } ?>

<?php } else {
    echo "";
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow sticky-top">
    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" width="70"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-5 pad ">

            <li class="nav-item ">
                <a class="nav-link" href="index.php">หน้าหลัก <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#post">โพสต์ <span class="sr-only">(current)</span></a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <button class="btn px-4" style="border: 1px solid #dbb89a; color: #dbb89a;" data-toggle="modal" data-target="#login_store">เข้าสู่ระบบร้านค้า</button>
            </li>
            <li class="nav-item">
                <button class="btn px-4" data-toggle="modal" data-target="#login" style="color: grey;">สมัครสมาชิก/เข้าสู่ระบบ</button>
            </li>

        </ul>
    </div>

</nav>

<!-- form login user -->

<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="errors"></div>




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
                                <span class="input-group-text btn" onclick="showupassword()"><i class="far fa-eye "></i></span>
                            </div>
                        </div>
                    </span>
                    <div class="d-flex justify-content-end mt-3">

                        <a href="forgot_pass.php">ลืมรหัสผ่าน</a>
                    </div>

                    <script type="text/javascript">
                        function showupassword() {
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



                <button type="button" id="login" class="btn btn-block login-btn mb-4" style="background-color: #dbb89a; color: white;" onclick="login_user()">เข้าสู่ระบบ</button>

                <p class="login-card-footer-text">ไม่มีบัญชี? <a href="regis.php" class="">สมัครที่นี่</a></p>


            </div>
        </div>

    </div>
</div>

<!-- login store -->

<div class="modal fade" id="login_store" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบร้านค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- notification -->

                <div id="serrors"></div>
                <form action="clogin_store.php" method="POST">
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
                        <input type="text" name="susername" id="susername" class="form-control" placeholder="ชื่อผู้ใช้">
                    </div>
                    <div class="form-group mb-4">
                        <label for="spassword" class="sr-only">รหัสผ่าน</label>
                        <span>
                            <div class="input-group">

                                <input type="password" name="spassword" class="form-control" id="spassword" placeholder="รหัสผ่าน" value="" required>

                                <div class="input-group-append">
                                    <span class="input-group-text btn" onclick="showpassword()"><i class="far fa-eye "></i></span>
                                </div>
                            </div>
                        </span>
                        <div class="d-flex justify-content-end mt-3">
                            <a href="forgot_pass.php">ลืมรหัสผ่าน</a>
                        </div>

                        <script type="text/javascript">
                            function showpassword() {

                                var data = document.getElementById('spassword');
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

                    <button type="button" id="slogin" class="btn btn-block login-btn mb-4" style="background-color: #dbb89a;color: white;" onclick="login_store()">เข้าสู่ระบบ</button>
                    <!--<button type="button" id="slogin" class="btn btn-block login-btn mb-4" style="background-color: #dbb89a;color: white;" onclick="login_store()">เข้าสู่ระบบ</button>-->
                </form>
                <p class="login-card-footer-text">ไม่มีบัญชี? <a href="regis_store.php" class="">สมัครที่นี่</a></p>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    // user*****
    function login_user() {
        console.log("blaaaa");
        if ($('#username').val() != "" && $('#password').val() != "") {
            let formdata = new FormData();
            formdata.append("username", $('#username').val());
            formdata.append('password', $('#password').val());
            $.ajax({
                url: 'clogin.php',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                method: 'POST',
                success: function(data) {
                    if (data.type == 01) {

                        setTimeout(function() {
                            swal({
                                title: "การแจ้งเตือน",
                                text: "เข้าสู่ระบบสำเร็จ",
                                icon: "success",
                                button: "ตกลง"
                            }).then((value) => {
                                window.location = "mainuser.php";
                            });
                        }, 1000)


                    } else if (data.type == 02) {
                        setTimeout(function() {
                            swal({
                                title: "การแจ้งเตือน",
                                text: "เข้าสู่ระบบสำเร็จ",
                                icon: "success",
                                button: "ตกลง"
                            }).then((value) => {
                                window.location = "traditional.php";
                            });
                        }, 1000)
                    } else {
                        setTimeout(function() {
                            $("#errors").html("<div class='alert alert-danger py-2' role='alert' style='font-size : 15px'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</div>");
                        }, 1000);

                    }
                },
                // error: function(data) {
                //     // console.error(data);
                //     // console.log("no");
                //     $("#errors").html("<div class='alert alert-danger py-2' role='alert' style='font-size : 15px'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</div>");
                // }
            });
        } else {

            $("#errors").html("<div class='alert alert-danger py-2' role='alert' style='font-size : 15px'>กรุณากรอกข้อมูล</div>");

        }
    }

    // store*****
    function login_store() {
        if ($('#susername').val() != "" && $('#spassword').val() != "") {
            let formdata = new FormData();
            formdata.append("susername", $('#susername').val());
            formdata.append('spassword', $('#spassword').val());
            $.ajax({
                url: 'clogin_store.php',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                method: 'POST',
                success: function(data) {
                    if (data.text == "success") {

                        setTimeout(function() {
                            swal({
                                title: "การแจ้งเตือน",
                                text: "เข้าสู่ระบบสำเร็จ",
                                icon: "success",
                                button: "ตกลง"
                            }).then((value) => {
                                window.location = "storepost.php";
                            });
                        }, 1000)


                    } else {
                        setTimeout(function() {
                            $("#serrors").html("<div class='alert alert-danger py-2' role='alert' style='font-size : 15px'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</div>");
                        }, 1000)

                    }
                },
                // error: function(data) {
                //     console.error(data);
                //     console.log(data.text);
                //     $("#errors").html("<div class='alert alert-danger py-2' role='alert' style='font-size : 15px'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</div>");
                // }
            });
        } else {
            $("#serrors").html("<div class='alert alert-danger py-2' role='alert' style='font-size : 15px'>กรุณากรอกข้อมูล</div>");

        }
    }
</script>