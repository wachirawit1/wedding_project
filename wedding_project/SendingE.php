<?php session_start();
include('condb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- download excel template -->
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

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
            <p class='mb-0'><a href='index.php' class='alert-link'>กลับไปเข้าสู่ระบบ</a></p>
        </div>
    <?php
        exit;
    }
    ?>

    <?php include('navbaruser.php') ?>


    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="progress.php">progress</a></li>
            <li class="breadcrumb-item active" aria-current="page">inviting</li>
        </ol>
    </nav>

    <?php
    $userid = $_SESSION['userid'];
    $check = "SELECT * FROM event WHERE userid = $userid AND status = 1 ";
    $result = mysqli_query($conn, $check);
    $nums = mysqli_num_rows($result);
    if ($nums == 0) {
        echo "";
    } else { ?>
        <div class="container shadow bg-light border my-3">
            <h4 class="my-3 text-center">สร้างจดหมายเชิญ</h4>


            <?php
            $sql = "SELECT * FROM `email` WHERE e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid AND status = 1)";
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
                <div class="row">
                    <div class="col-6 input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">อัพโหลด</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imgInp" name="image" type="file" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">เลือกการ์ดเชิญ</label>
                            <input type="hidden" id="fileName" name="fileName" value="">
                        </div>
                    </div>

                    <div class="col-2">
                        <a class="btn " href="card_template.php" style="background-color: #dbb89a;color: #ffffff;">ออกแบบการ์ดเชิญ</a>
                    </div>
                </div>


                <div class="row justify-content-md-center my-3">
                    <div class="card border-0 bg-light">
                        <div class="card-body">

                            <img src="assets/images/image-regular.svg" alt="การ์ดเชิญของคุณ" id="blah" width="300" height="400">
                        </div>
                    </div>

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
                <div class="row">

                    <div class="col-6 input-group mb-3">

                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">อัพโหลด</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imgInp" name="image" type="file" value="" aria-describedby="inputGroupFileAddon01">
                            <input type="hidden" id="fileName" name="fileName" value="<?= $row['attach_file'] ?>">
                            <label class="custom-file-label" for="inputGroupFile01">เลือกการ์ดเชิญ</label>
                        </div>
                    </div>

                    <div class="col-2">
                        <a class="btn " href="card_template.php" style="background-color: #dbb89a;color: #ffffff;">ออกแบบการ์ดเชิญ</a>
                    </div>

                </div>
                <div class="row justify-content-md-center p-0">

                    <img src="uploads/<?= $row['attach_file'] ?>" class="rounded ms-auto d-block p-3" alt="การ์ดเชิญของคุณ" id="blah" width="300" height="400">

                </div>
                <div class="form-group text-center">
                    <button class="btn " id="saveEmail" onclick="saveEmail()">บันทึก</button>
                </div>
            <?php } ?>


        </div>


        <div id="email_list" data-aos="fade-up" data-aos-duration="800" style="display: none;">
            <div class="container shadow bg-light border text-center mb-3">
                <h3 class="my-3">การส่งการ์ดเชิญ</h3>


                <div class="my-3">
                    <p class="text-secondary">วิธีการส่งการ์ดเชิญ</p>
                </div>

                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    1. ดาวน์โหลดเทมเพลท Excel
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <button class="btn btn-primary" onclick="ExportToExcel('xlsx')">
                                    <i class="bi bi-download"></i> ดาวน์โหลด
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left text-decoration-none collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    2. กรอกรายชื่อแขกลงใน Excel ที่ได้ดาวน์โหลดไว้ <u>คลิกเพื่อดูตัวอย่าง</u>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table bg-white ">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ชื่อ-นามสกุล</th>
                                            <th scope="col">ความสัมพันธ์</th>
                                            <th scope="col">ที่อยู่อีเมล</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>ประยุทธ จันท์โอชะ</td>
                                            <td>เพื่อนเจ้าบ่าว</td>
                                            <td>prayut@hotmail.com</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>ประวิด น้ำ</td>
                                            <td>เพื่อนเจ้าสาว</td>
                                            <td>prawit@gmail.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left te text-decoration-none collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    3. อัปโหลดไฟล์ Excel โดยการเลือกไฟล์ Excel ที่ได้ทำการกรอกข้อมูลแล้ว
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="my-3 p-3">

                                <div class="d-flex justify-content-start">
                                    <input type="file" id="excel_file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" value="" onchange="saveAndSend()" />
                                </div>

                                <div id="excel_data" class="mt-5"></div>

                                <div class="d-flex justify-content-end">
                                    <button id="enable" class="btn btn-primary" onclick="send_email()" disabled>บันทึกและส่ง</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>






                <table id="tbl_exporttable_to_xls" class="table mt-1 bg-white table-hover" style="display: none;">
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อ-นามสกุล</th>
                        <th scope="col">ความสัมพันธ์</th>
                        <th scope="col">ที่อยู่อีเมล</th>
                    </tr>
                </table>


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
                    <h4 class='my-3'>รายชื่อแขกที่ส่งการ์ดเชิญแล้ว</h4>


                    <div class="row justify-content-end my-3">
                        <div class="col col-2">
                            <form action="report.php">
                                <button class="btn btn-block btn-light" style="background-color: #dbb89a; color: white;">ดูผลลัพธ์</button>
                            </form>
                        </div>
                    </div>


                    <table class="table bg-white table-hover ">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">ความสัมพันธ์</th>
                                <th scope="col">ที่อยู่อีเมล</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $row['e_name'] ?></td>
                                    <td><?= $row['relation'] ?></td>
                                    <td><?= $row['address'] ?></td>
                                </tr>
                        <?php $i++;
                            }
                        } ?>
                        </tbody>
                    </table>

            </div>
        <?php } ?>

        </div>


        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
        <script>
            AOS.init({
                duration: 1000
            });

            $(document).ready(function() {

                imgInp.onchange = evt => {

                    const [file] = imgInp.files
                    if (file) {
                        blah.src = URL.createObjectURL(file)
                    }
                }

                if ($('#header').val() != "" && $('#detail').val() != "" && $('#filename').val() != "") {
                    $('#email_list').show();
                    $("html, body").animate({
                        scrollTop: $(
                            'html, body').get(0).scrollHeight
                    }, 2000);
                }

            });





            //บันทึกข้อความที่เพิ่มในการส่งเมล
            function saveEmail() {
                var header = $('#header');
                var detail = $('#detail');
                let fileName = $('#fileName');

                let file_data = $('#imgInp').prop("files")[0];
                let form_data = new FormData();

                form_data.append("file", file_data);
                form_data.append("header", header.val());
                form_data.append("detail", detail.val());
                form_data.append("fileName", fileName.val());

                //  for (var value of form_data.values()) {
                //     console.log(value);
                // }


                if (isNotEmpty(header) && isNotEmpty(detail) && fileName) {
                    $('#email_list').show();


                    $.ajax({
                        url: 'saveEmail.php',
                        dataType: 'json',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'POST',
                        success: function(data) {
                            swal({
                                title: "การแจ้งเตือน",
                                text: "บันทึกข้อมูลสำเร็จ",
                                icon: "success",
                                button: "ตกลง"
                            });
                            $('#fileName').val(data.fileName);


                            $("html, body").animate({
                                scrollTop: $(
                                    'html, body').get(0).scrollHeight
                            }, 2000);
                        },
                        error: function(err) {
                            console.log('err');
                            console.log(err);
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

            function saveAndSend() {
                $("#enable").removeAttr("disabled");
            }


            // sendmailllllllllllllllllllllllllllll
            function send_email() {

                let nameArr = [];
                let relationArr = [];
                let emailArr = [];

                //array ต่างๆ
                $(".name").each(function() {
                    nameArr.push($(this).val());
                });
                $(".relation").each(function() {
                    relationArr.push($(this).val());
                });
                $(".email").each(function() {
                    emailArr.push($(this).val());
                });



                var header = $('#header');
                var detail = $('#detail');
                let fileName = $('#fileName');
                let file_data = $('#imgInp').prop("files")[0];
                let form_data = new FormData();

                form_data.append("nameArr", nameArr);
                form_data.append("relationArr", relationArr);
                form_data.append("emailArr", emailArr);
                form_data.append("file", file_data);
                form_data.append("header", $('#header').val());
                form_data.append("detail", $('#detail').val());
                form_data.append("fileName", fileName.val());

                //เอาไว้ทดสอบการแสดงผลข้อมูลใน form_data
                // for (var value of form_data.values()) {
                //     console.log(value);
                // }

                swal({
                    title: "การแจ้งเตือน",
                    text: "ขั้นตอนนี้จำเป็นต้องใช้เวลาจำนวนมาก",
                    icon: "warning",
                    button: "ตกลง"
                });

                $("#enable").html('<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>');

                $.ajax({
                    url: 'sendEmail.php',
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    method: 'POST',
                    success: function(data) {

                        $("#enable").text('บันทึกและส่ง');


                        setTimeout(function() {
                            swal({
                                title: "การแจ้งเตือน",
                                text: "ส่งอีเมลแล้ว",
                                icon: "success",
                                button: "ตกลง"
                            }).then((value) => {
                                location.reload();
                            });

                        }, 2000)

                    },
                    error: function(data) {
                        console.log(data);
                        swal({
                            title: "การแจ้งเตือน",
                            text: "ส่งอีเมลไม่สำเร็จ",
                            icon: "error",
                            button: "ตกลง"
                        });
                        $("#enable").html('บันทึกและส่ง');

                    }
                });


            }

            //download excel template
            function ExportToExcel(type, fn, dl) {
                var elt = document.getElementById('tbl_exporttable_to_xls');
                var wb = XLSX.utils.table_to_book(elt, {
                    sheet: "sheet1"
                });
                return dl ?
                    XLSX.write(wb, {
                        bookType: type,
                        bookSST: true,
                        type: 'base64'
                    }) :
                    XLSX.writeFile(wb, fn || ('รายชื่อแขก.' + (type || 'xlsx')));
            }

            //convert excel to html
            const excel_file = document.getElementById('excel_file');

            excel_file.addEventListener('change', (event) => {

                if (!['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'].includes(event.target.files[0].type)) {
                    document.getElementById('excel_data').innerHTML = '<div class="alert alert-danger">Only .xlsx or .xls file format are allowed</div>';

                    excel_file.value = '';

                    return false;
                }

                var reader = new FileReader();

                reader.readAsArrayBuffer(event.target.files[0]);

                reader.onload = function(event) {

                    var data = new Uint8Array(reader.result);

                    var work_book = XLSX.read(data, {
                        type: 'array'
                    });

                    var sheet_name = work_book.SheetNames;

                    var sheet_data = XLSX.utils.sheet_to_json(work_book.Sheets[sheet_name[0]], {
                        header: 1
                    });

                    if (sheet_data.length > 0) {
                        var table_output = '<table class="table table-striped ">';

                        for (var row = 0; row < sheet_data.length; row++) {

                            table_output += '<tr>';

                            for (var cell = 0; cell < sheet_data[row].length; cell++) {

                                if (row == 0) {

                                    table_output += '<th>' + sheet_data[row][cell] + '</th>';

                                } else {
                                    let className = "";
                                    if (cell == 1) {
                                        className = "name";
                                    } else if (cell == 2) {
                                        className = "relation";
                                    } else if (cell == 3) {
                                        className = "email";
                                    }

                                    table_output += '<td>' + sheet_data[row][cell] + '<input type="hidden" class="' + className + '" value="' + sheet_data[row][cell] + '">'
                                    '</td>';

                                }

                            }

                            table_output += '</tr>';

                        }

                        table_output += '</table>';

                        document.getElementById('excel_data').innerHTML = table_output;
                    }

                    excel_file.value = '';

                }

            });
        </script>

</body>

</html>