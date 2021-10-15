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
            color: #edab93 !important;
        }

        #saveEmail {
            background-color: #edab93;
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
        $sql = "SELECT `header`, `detail`, `e_id` FROM `email_detail` WHERE e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid)";
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
            <div class="form-group text-center">
                <button class="btn " id="saveEmail" onclick="saveEmail()">บันทึก</button>
            </div>
        <?php } ?>


    </div>

    <div class="container shadow bg-light border text-center mb-3 p-3">
        <div class="row justify-content-md-center">
            <div class="col col-lg-2">
                <img src="" alt="การ์ดเชิญของคุณ" id="blah" style="height: 200px; width: 300px;">
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-5">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">อัพโหลด</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imgInp" name="image" type="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">เลือกการ์ดเชิญ</label>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container shadow bg-light border text-center mb-3">
        <h4 class="my-3">เพิ่มรายชื่อและอีเมลแขก</h4>
        <?php
        $userid = $_SESSION['userid'];
        $sql = "SELECT * FROM email WHERE email.e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid)";
        $query = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($query);

        $i = 1;
        if ($num == 0) {
        ?>
            <form class="my-3">
                <div id="show">
                    <div class="row my-3" id="row2">
                        <div class="col-1" id="index">1</div>
                        <div class="col">
                            <input type="text" class="form-control" id="e_name1" name="name" placeholder="ชื่อ-นามสกุลแขก">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="relation1" name="relation" placeholder="ความสัมพันธ์">
                        </div>
                        <div class="col">
                            <input type="email" class="form-control" id="email1" name="email" placeholder="อีเมล">
                        </div>
                        <div class="col col-2">
                            <button class="btn btn-primary" type="button" id="sendEmail1" onclick="send_email(this)">ส่ง</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php
        } else {

            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="row my-3" id="row2">
                    <div class="col-1" id="index"><?= $i ?></div>
                    <div class="col">
                        <input type="text" class="form-control" readonly name="name" value="<?= $row['e_name'] ?>">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" readonly name="relation" value="<?= $row['relation'] ?>">
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" readonly name="email" value="<?= $row['address'] ?>">
                    </div>
                    <div class="col col-2">
                        <button type="button" class="btn btn-success" disabled>ส่งแล้ว</button>
                    </div>
                </div>
            <?php
                $i++;
            }
            ?>

            <div id="show">
                <div class="row my-3" id="row2">
                    <div class="col-1" id="index"><?= $i ?></div>
                    <div class="col">
                        <input type="text" class="form-control" id="e_name<?= $i ?>" name="name" placeholder="ชื่อ-นามสกุลแขก">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="relation<?= $i ?>" name="relation" placeholder="ความสัมพันธ์">
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" id="email<?= $i ?>" name="email" placeholder="อีเมล">
                    </div>
                    <div class="col col-2">
                        <button type="button" class="btn btn-primary" id="sendEmail<?= $i ?>" data-count="0" onclick="send_email(this)">ส่ง</button>
                    </div>

                </div>
            </div>
            </form>
        <?php
        }
        ?>
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
    <!-- <script>
        AOS.init({
            duration: 1000
        });
    </script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
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

        let count = <?= $i ?>;
        //บันทึกข้อความที่เพิ่มในการส่งเมล
        function saveEmail() {
            var header = $('#header');
            var detail = $('#detail');
            $.ajax({
                url: 'saveEmail.php',
                method: 'POST',
                data: {
                    header: header.val(),
                    detail: detail.val()
                },
                success: function(data) {
                    alert(data);
                }
            });

        }

        function send_email(e) {
            var e_name = $('#e_name' + count);
            var relation = $('#relation' + count);
            var email = $('#email' + count);
            var header = $('#header');
            var detail = $('#detail');

            // let file_data = $('#imgInp').prop("files")[0];
            // let form_data = new FormData();
            // form_data.append("file", file_data);

            if (email.val() != "") {
                console.log("SEND MAIL");

                $('#sendEmail' + count).html('กำลังส่ง');
                $('#sendEmail' + count).attr('class', "btn btn-warning");

                $.ajax({
                    url: 'sendEmail.php',
                    cache: false,
                    // contentType: false,
                    // processData: false,
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        e_name: e_name.val(),
                        relation: relation.val(),
                        email: email.val(),
                        header: header.val(),
                        detail: detail.val(),
                        // form_data

                    },
                    success: function(data) {
                        $('#sendEmail' + count).html('ส่งแล้ว');
                        $('#sendEmail' + count).attr('class', "btn btn-success");
                        $('#sendEmail' + count).attr('disabled', "");
                        e_name.attr("readonly", "");
                        relation.attr("readonly", "");
                        email.attr("readonly", "");
                        count++;

                        let html = `
                            <div class="row my-3" id="row2">
                                <div class="col-1" id="index">${count}</div>
                                <div class="col">
                                    <input type="text" class="form-control" id="e_name${count}" name="name" placeholder="ชื่อแขก">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="relation${count}" name="relation" placeholder="ความสัมพันธ์">
                                </div>
                                <div class="col">
                                    <input type="email" class="form-control" id="email${count}" name="email" placeholder="อีเมล">
                                </div>
                                <div class="col col-2">
                                    <button class="btn btn-primary" type="button" id="sendEmail${count}" data-count="${count}" onclick="send_email(this)">ส่ง</button>
                                </div>
                            </div>
                            `;

                        $('#show').append(html);
                    }
                });
            }

        }
    </script>

</body>

</html>