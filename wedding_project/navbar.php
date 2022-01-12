<nav class="navbar navbar-expand-lg navbar-light bg-white shadow sticky-top">
    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" width="70" ></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-5 pad ">

            <li class="nav-item ">
                <a class="nav-link" href="index.php">หน้าหลัก <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">โพสต์ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">เกี่ยวกับ <span class="sr-only">(current)</span></a>
            </li>



        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <button class="btn px-4" data-toggle="modal" data-target="#login_store">เข้าสู่ระบบร้านค้า</button>
            </li>
            <li class="nav-item">
                <button class="btn px-4" data-toggle="modal" data-target="#login" style="color: grey;">สมัครสมาชิก/เข้าสู่ระบบ</button>
            </li>

        </ul>
    </div>

</nav>

<!-- form login -->
<!-- <?php
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
?> -->
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



                <form action="clogin.php" method="POST">
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
                        <input type="text" name="username" id="username" class="form-control" placeholder="ชื่อผู้ใช้">
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="sr-only">รหัสผ่าน</label>
                        <span>
                            <div class="input-group">

                                <input type="password" name="password" class="form-control" id="password" placeholder="รหัสผ่าน" value="" required>

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

                    <button id="login" class="btn btn-block login-btn mb-4" style="background-color: #dbb89a;" type="submit">เข้าสู่ระบบ</button>
                </form>

                <p class="login-card-footer-text">ไม่มีบัญชี? <a href="regis_store.php" class="">สมัครที่นี่</a></p>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    function login() {
        let formdata = new FormData();
        formdata.append("username", $('#username').val());
        formdata.append('password', $('#password').val());
        $.ajax({
            url: 'clogin.php',
            type: 'POST',
            dataType: 'json',
            data: formdata,
            success: function(data) {

            },
            error: function() {

            }
        });
    }
</script> -->