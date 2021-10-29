<?php session_start();
include('condb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>wedding</title>

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

        #showCountDown {
            font-size: 30px;
        }

        a.nav-link {
            color: grey;
        }


        a.nav-link:hover {
            color: #dbb89a !important;
        }

        #saveEmail,
        #sendEmail {
            background-color: #dbb89a;
            color: white;
        }
    </style>
</head>



<body>
    <?php
    if (!isset($_SESSION['username'])) {
    ?>
        <div class='alert alert-danger' role='alert'>
            <h4 class='alert-heading'>แจ้งเตือน !</h4>
            <p>คุณยังไม่ได้เข้าสู่ระบบ โปรดเข้าสู่ระบบอีกครั้ง</p>
            <hr>
            <p class='mb-0'><a href='login.php' class='alert-link'>กลับไปเข้าสู่ระบบ</a></p>
        </div>
    <?php
        exit;
    }
    ?>

    <?php include('navbaruser.php') ?>


    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="mainuser.php">Home</a></li>
            <li class="breadcrumb-item"><a href="progress.php">progress</a></li>
            <li class="breadcrumb-item active" aria-current="page">inviting</li>
        </ol>
    </nav>
    <div class="container shadow bg-light border text-center my-3">
        <h4 class="my-3 text-center">สร้างจดหมายเชิญ</h4>


        <?php
        $userid = $_SESSION['userid'];
        $sql = "SELECT `header`, `detail`, `e_id` , `attach_file` FROM `email` WHERE e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid)";
        $query = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);


        if ($num_row == 0) { ?>
            <div class="form-group">
                <input class="form-control " type="text" id="header" placeholder="เพิ่มหัวข้อ">
            </div>
            <div class="form-group">
                <textarea class="form-control" type="text" id="detail" placeholder="เพิ่มคำอธิบาย เช่น หมายเลขพร้อมเพย์" rows="4" cols="50"></textarea>
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">อัพโหลด</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imgInp" name="image" type="file" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">เลือกการ์ดเชิญ</label>
                </div>
            </div>
            <div class="row justify-content-md-center">

                <img src="" alt="การ์ดเชิญของคุณ" id="blah" width="900" height="400">

            </div>
            <div class="form-group text-center">
                <button class="btn " id="saveEmail" onclick="saveEmail()">บันทึก</button>
            </div>
        <?php } elseif ($num_row == 1) { ?>
            <div class="form-group">
                <input class="form-control " type="text" id="header" placeholder="เพิ่มหัวข้อ" value="<?= $row['header'] ?>">
            </div>
            <div class="form-group">
                <textarea class="form-control" type="text" id="detail" placeholder="เพิ่มคำอธิบาย เช่น หมายเลขพร้อมเพย์" rows="4" cols="50"><?= $row['detail'] ?></textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">อัพโหลด</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imgInp" name="image" type="file" value="" aria-describedby="inputGroupFileAddon01">
                    <input type="hidden" id="fileName" name="fileName" value="<?= $row['attach_file'] ?>">
                    <label class="custom-file-label" for="inputGroupFile01">เลือกการ์ดเชิญ</label>
                </div>
            </div>
            <div class="row justify-content-md-center p-0">

                <img src="uploads/<?= $row['attach_file'] ?>" class="rounded ms-auto d-block p-3" alt="การ์ดเชิญของคุณ" id="blah" width="900" height="400">

            </div>
            <div class="form-group text-center">
                <button class="btn " id="saveEmail" onclick="saveEmail()">บันทึก</button>
            </div>
        <?php } ?>


    </div>


    <div id="email_list" data-aos="fade-up" data-aos-duration="800" style="display: none;">
        <div class="container shadow bg-light border text-center mb-3">
            <h4 class="my-3">เพิ่มรายชื่อและอีเมลแขก</h4>
            <form class="my-3">
                <div class="row my-3" id="row2">
                    <div class="col">
                        <input type="text" class="form-control" id="e_name" name="name" placeholder="ชื่อ-นามสกุลแขก" autofocus>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="relation" name="relation" placeholder="ความสัมพันธ์">
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" id="email" name="email" onkeyup="check_mail()" placeholder="อีเมล">
                    </div>

                </div>
                <div class="row justify-content-md-center my-3">
                    <div class="col col-2">
                        <button class="btn" type="button" id="sendEmail" onclick="send_email(this)">ส่ง</button>
                    </div>
                </div>
            </form>
            <div class="my-3 border-bottom"></div>

            <?php
            $userid = $_SESSION['userid'];
            $sql = "SELECT * FROM `email_list` WHERE email_id = (SELECT email.email_id FROM email WHERE email.e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid))";
            $query = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($query);

            $i = 1;
            if ($num == 0) { ?>
                <div id="email_list">
                    <div class="alert alert-danger" role="alert" id="none">
                        ยังไม่มีรายชื่อแขก
                    </div>
                    <div id="show">

                    </div>
                </div>
            <?php
            } else { ?>
                <h4 class='my-3'>รายชื่อแขก</h4>
                <?php while ($row = mysqli_fetch_array($query)) { ?>
                    <div>
                        <div id="show">
                            <div class="row my-3">
                                <div class="col-1" id="index"><?= $i ?></div>
                                <div class="col">
                                    <input type="text" class="form-control" name="name" placeholder="ชื่อ-นามสกุลแขก" value="<?= $row['e_name'] ?>" readonly>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="relation" placeholder="ความสัมพันธ์" value="<?= $row['relation'] ?>" readonly>
                                </div>
                                <div class="col">
                                    <input type="email" class="form-control" name="email" placeholder="อีเมล" id="emailSent" value="<?= $row['address'] ?>" readonly>
                                </div>
                                <div class="col col-2">
                                    <button type="button" class="btn btn-success" disabled>ส่งแล้ว</button>
                                </div>

                            </div>
                        </div>
                    </div>
            <?php $i++;
                }
            } ?>

        </div>
    </div>


    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3 border-top bg-white">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        AOS.init({
            duration: 1000
        });

        // let img = $('#blah');
        // if (!img.val()) {
        //     img.attr('class', "d-none");
        // }

        imgInp.onchange = evt => {

            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }

        if ($('#header').val() != "" && $('#detail').val() != "" && $('#filename').val() != "") {
            $('#email_list').css('display', '');
        }

        let count = <?= $i ?>;
        //บันทึกข้อความที่เพิ่มในการส่งเมล
        function saveEmail() {
            var header = $('#header');
            var detail = $('#detail');
            let fileName = $('#fileName');
            let img = $('#imgInp');

            let file_data = $('#imgInp').prop("files")[0];
            let form_data = new FormData();

            form_data.append("file", file_data);
            form_data.append("header", header.val());
            form_data.append("detail", detail.val());
            form_data.append("fileName", fileName.val());

            //  for (var value of form_data.values()) {
            //     console.log(value);
            // }


            if (isNotEmpty(header) && isNotEmpty(detail) && isNotEmpty(img)) {
                $('#email_list').css('display', '');


                $.ajax({
                    url: 'saveEmail.php',
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'POST',
                    success: function(data) {
                        console.log(data);
                        alert(data.status);
                        fileName.val(data.fileName);
                    }
                });
            }

            function isNotEmpty(caller) {
                if (caller.val() == "") {
                    caller.css('border', '1px solid red');

                    return false;
                } else caller.css('border', '');

                return true;
            }

        }
        let email = document.getElementById('email');
        let emailSent = document.getElementById('emailSent');
        let emailArray = [];

        // function check_mail() {

        //     for (let i = 0; i < emailSent.length; i++) {
        //         if (emailSent[i].value) {
        //             emailArray.push(emailSent[i].value)
        //         }
        //         if (email.value == emailArray) {
        //             console.log('wow');
        //             email.style.border = "1px solid red";
        //             document.getElementById('sendEmail').setAttribute("disabled", "");

        //         }
        //     }


        // }


        function send_email(e) {
            var e_name = $('#e_name');
            var relation = $('#relation');
            var email = $('#email');
            var header = $('#header');
            var detail = $('#detail');
            let fileName = $('#fileName');

            let file_data = $('#imgInp').prop("files")[0];
            let form_data = new FormData();

            form_data.append("file", file_data);
            form_data.append("e_name", $('#e_name').val());
            form_data.append("relation", $('#relation').val());
            form_data.append("email", $("#email").val());
            form_data.append("header", $('#header').val());
            form_data.append("detail", $('#detail').val());
            form_data.append("fileName", fileName.val());

            for (var value of form_data.values()) {
                console.log(value);
            }

            if (email.val() != "") {
                console.log("SEND MAIL");
                $('#sendEmail').html('กำลังส่ง');

                $.ajax({
                    url: 'sendEmail.php',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data:
                        // e_name: e_name.val(),
                        // relation: relation.val(),
                        // email: email.val(),
                        // header: header.val(),
                        // detail: detail.val(),
                        form_data

                        ,
                    type: 'POST',
                    success: function(data) {
                        console.log(data);
                        alert('ส่งสำเร็จ');
                        let html = `
                            <div class="row my-3" id="row2">
                                <div class="col-1" id="index">${count}</div>
                                <div class="col">
                                    <input type="text" class="form-control"  name="name" value="${e_name.val()}" readonly>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control"  name="relation" value="${relation.val()}" readonly>
                                </div>
                                <div class="col">
                                    <input type="email" class="form-control"  name="email" value="${email.val()}" readonly>
                                </div>
                                <div class="col col-2">
                                    <button class="btn btn-success" type="button"  onclick="send_email(this)" disabled>ส่งแล้ว</button>
                                </div>
                            </div>
                            `;
                        count++;

                        $('#show').append(html);

                        e_name.val('');
                        relation.val('');
                        email.val('');
                        $('#sendEmail').html('ส่ง');
                        $('#none').replaceWith(
                            "<h4 class='my-3'>รายชื่อแขก</h4>"
                        )

                    },
                    error: function(error) {

                    }
                });
            }

        }
    </script>

</body>

</html>