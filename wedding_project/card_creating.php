<html>
<?php
session_start();
include('condb.php');
?>

<head>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>

    <!-- web font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- card font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Wedding</title>

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

        div.card-body {
            font-family: 'Chakra Petch', sans-serif
        }
    </style>

</head>

<body>
    <?php
    if (!isset($_SESSION['username'])) { ?>
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
            <li class="breadcrumb-item"><a href="card_template.php">template</a></li>
            <li class="breadcrumb-item active" aria-current="page">create card</li>
        </ol>
    </nav>
    <div class="container">
        <h3 class="text-center m-3">สร้างการ์ดเชิญ</h3>
        <div class="d-flex justify-content-center">
            <div class="m-4 text-center">
                <div class="col">
                    <div class="row ">
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="husband_input" placeholder="ชื่อเจ้าบ่าว" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2">ตกลง</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="wife_input" placeholder="ชื่อเจ้าสาว" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2">ตกลง</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="#" placeholder="สถานที่" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2">ตกลง</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input class="btn btn-primary" id="btn-Preview-Image" type="button" value="ดูตัวอย่างรูปภาพ" />
            </div>

            <div class="border-right"></div>

            <div class="" id="html-content-holder">
                <div class="row justify-content-center">
                    <div class="card text-center border-0" style="width: 30rem;">
                        <div class="card-body position-relative">
                            <?php
                            $card = $_POST['card'];
                            if ($card == 1) { ?>
                                <div class=""><img src="assets/images/invite_card/c1_template.png" class="img-responsive position-relative" style="width: 100%;"></div>
                                <div class="position-absolute" id="husband" style="color:white;top: 250px; left:0; right: 0; ">ชื่อเจ้าบ่าว</div>
                                <div class="position-absolute" id="wife" style="color:white;top: 340px;left:0; right: 0;">ชื่อเจ้าสาว</div>
                                <div class="position-absolute" style=" color:white;top: 400px;left:0; right: 0;">วันแต่งงาน</div>
                                <div class="position-absolute" style="color:white;top: 450px;left:0; right: 0;">สถานที่</div>
                            <?php } elseif ($card == 2) { ?>
                                <div class=""><img src="assets/images/invite_card/c2_template.png" class="img-responsive position-relative" style="width: 100%;"></div>
                                <div class="position-absolute " id="husband" style="color:#d09e6a;top: 200px; left:0; right: 0; ">ชื่อเจ้าบ่าว</div>
                                <div class="position-absolute" id="wife" style="color:#d09e6a;top: 310px;left:0; right: 0;">ชื่อเจ้าสาว</div>
                                <div class="position-absolute" style=" color:black;top: 375px;left:0; right: 0;">วันแต่งงาน</div>
                                <div class="position-absolute" style="color:#d09e6a;top: 450px;left:0; right: 0;">สถานที่</div>
                            <?php } else { ?>
                                <div class=""><img src="assets/images/invite_card/c3_template.png" class="img-responsive position-relative" style="width: 100%;"></div>
                                <div class="position-absolute" id="husband" style="color:#5d5956;top: 220px; left:0; right: 0; ">ชื่อเจ้าบ่าว</div>
                                <div class="position-absolute" id="wife" style="color:#5d5956;top: 340px;left:0; right: 0;">ชื่อเจ้าสาว</div>
                                <div class="position-absolute" style=" color:#5d5956;top: 490px;left:0; right: 0;">วันแต่งงาน</div>
                                <div class="position-absolute" style="color:#5d5956;top: 450px;left:0; right: 0;">สถานที่</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="row text-center p-4">
            <div class="col">
                <div class="d-flex justify-content-md-start">
                    <h3>ตัวอย่างรูปภาพ :</h3>
                </div>
                <div id="previewImage"></div>
            </div>
        </div>

        <div class="row d-flex justify-content-end mb-3">

            <div class="mr-2">
                <a class="btn btn-success text-white disabled" id="btn-Convert-Html2Image">ดาวน์โหลด</a>
            </div>

            <div>
                <form action="SendingE.php">
                    <button class="btn " id="btn-next" style="background-color:#dbb89a ;color:white; " disabled>ถัดไป</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center text-lg-start bgwhite border">
        <!-- Copyright -->
        <div class="text-center p-3">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha512-s/XK4vYVXTGeUSv4bRPOuxSDmDlTedEpMEcAQk0t/FMd9V6ft8iXdwSBxV0eD60c6w/tjotSlKu9J2AAW1ckTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

            var element = $("#html-content-holder"); // global variable
            var getCanvas; // global variable

            $("#btn-Preview-Image").on('click', function() {
                html2canvas(element, {
                    onrendered: function(canvas) {
                        $("#previewImage").append(canvas);
                        getCanvas = canvas;
                    }
                });
                jQuery("html, body").animate({
                    scrollTop: jQuery(window).height()
                }, 1500);
                $('#btn-Convert-Html2Image').removeClass('disabled');
            });

            $("#btn-Convert-Html2Image").on('click', function() {
                var imgageData = getCanvas.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image").attr("download", "การ์ดงานแต่ง.png").attr("href", newData);
                $('#btn-next').removeAttr("disabled");
            });

            let husband = $('#husband');
            $('#husband_input').on('input', function() {
                husband.html($('#husband_input').val());
            })

            let wife = $('#wife');
            $('#wife_input').on('input', function() {
                wife.html($('#wife_input').val());
            })

        });
    </script>
</body>

</html>