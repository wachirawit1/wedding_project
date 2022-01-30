<!doctype html>
<html>
<?php
session_start();
include('condb.php');
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- icon -->
    <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

    <!-- web font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- card font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- c3 font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,500;1,600;1,700&family=Charm:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <!-- css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

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

        .test {
            font-family: 'Chakra Petch', sans-serif
        }

        #c3 {
            font-family: 'Chakra Petch', sans-serif;
            font-family: 'Charm', cursive;
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

    <?php
    $userid = $_SESSION['userid'];
    $sql = "SELECT * FROM event where userid = '$userid' AND status = 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $due_date = "";
    if ($row['due_date'] == "0000-00-00" || $row['due_date'] == "") {
        $due_date = '
        <div class="alert alert-danger" role="alert">
        ยังไม่ได้กำหนดวันแต่ง <a href="schedule.php" class="alert-link">กลับไปกำหนด?</a>
      </div>';
    } else {
        $due_date = $row['due_date'];
    }
    ?>

    <div class="container p-3 bg-light shadow">

        <h3 class="text-center ">สร้างการ์ดเชิญ</h3>

        <div class="row">
            <div class="col border-right">
                <div style="width: 30rem;" class="test">
                    <div class="position-relative">
                        <?php
                        $card = $_POST['card'];
                        if ($card == 1) { ?>
                            <img src="assets/images/invite_card/c1_template.png" alt="" width="100%" crossorigin="anonymous">
                            <div class="position-absolute" id="husband" style="color:white;top: 16rem;left:0; right: 0; text-align: center;">ชื่อเจ้าบ่าว</div>
                            <div class="position-absolute" id="wife" style=" color:white;top: 22rem;left:0; right: 0; text-align: center;">ชื่อเจ้าสาว</div>
                            <div class="position-absolute" id="date" style="color:white;top: 30rem; left:0; right: 0; text-align: center;"><?= $due_date ?></div>
                            <div class="position-absolute" id="place" style="color:white;top: 27rem;left:0; right: 0; text-align: center;">สถานที่</div>
                        <?php } elseif ($card == 2) { ?>
                            <img src="assets/images/invite_card/c2_template.png" alt="" width="100%" crossorigin="anonymous">
                            <div class="position-absolute" id="husband" style="color:#56676f;top: 12rem;left:0; right: 0; text-align: center;font-size: 30px;">ชื่อเจ้าบ่าว</div>
                            <div class="position-absolute" id="wife" style=" color:#56676f;top: 20rem;left:0; right: 0; text-align: center;font-size: 30px">ชื่อเจ้าสาว</div>
                            <div class="position-absolute" id="date" style="color:#56676f;top: 24.5rem; left:0; right: 0; text-align: center;"><?= $due_date ?></div>
                            <div class="position-absolute" id="place" style="color:#56676f;top: 29rem;left:0; right: 0; text-align: center;">สถานที่</div>
                        <?php } else { ?>
                            <img src="assets/images/invite_card/c3_template.png" alt="" width="100%" crossorigin="anonymous">
                            <div id="c3">
                                <div class="position-absolute" id="husband" style="color:#5d5956;top: 14rem;left:0; right: 0; text-align: center;font-size: 30px;">ชื่อเจ้าบ่าว</div>
                                <div class="position-absolute" id="wife" style=" color:#5d5956;top: 22rem;left:0; right: 0; text-align: center;font-size: 30px">ชื่อเจ้าสาว</div>
                            </div>
                            <div class="position-absolute" id="date" style="color:#5d5956;top: 33rem; left:0; right: 0; text-align: center;"><?= $due_date ?></div>
                            <div class="position-absolute" id="place" style="color:#5d5956;top: 30rem;left:0; right: 0; text-align: center;">สถานที่</div>
                        <?php } ?>
                    </div>

                </div>
            </div>
            <div class="col">
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
                                        <input type="text" class="form-control" id="place_input" placeholder="สถานที่" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="button" id="button-addon2">ตกลง</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="#" placeholder="เวลา" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="button" id="button-addon2">ตกลง</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="toCanvas"> <a href="javascript:void(0);" class="btn btn-primary"> ดูตัวอย่างรูปภาพ </a></span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container bg-light my-3 p-3 shadow">
        <div class="row justify-content-center ">
            <div class="col">

                <div class="justify-content-start">
                    <h4 class="">ตัวอย่างการ์ดเชิญ : </h4>
                </div>
                <div class="d-flex justify-content-end">
                    <span class="mr-2"><button id="save" disabled class="btn btn-success">ดาวน์โหลด</button></span>
                    <form action="SendingE.php" method="post">
                        <button class="btn btn-primary" id="next" disabled>ถัดไป</button>
                    </form>
                </div>


                <div class="toPic text-center">
                    <!-- the image will show on this -->
                    <!-- <a href="javascript:void(0);" class="btn btn-danger"> To Image </a> -->
                </div>

            </div>
        </div>
    </div>








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="captureHTML/html2canvas.min.js"></script>
    <script type="text/javascript" src="captureHTML/canvas2image.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // write on card
            let husband = $('#husband');
            $('#husband_input').on('input', function() {
                husband.html($('#husband_input').val());
            });

            let wife = $('#wife');
            $('#wife_input').on('input', function() {
                wife.html($('#wife_input').val());
            });

            let place = $('#place');
            $('#place_input').on('input', function() {
                place.html($('#place_input').val());
            })

            // date 
            const month = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤษจิกายน", "ธันวาคม"];
            let getDate = $('#date').html();
            
            const date = new Date(getDate);

            if (isValidDate(date)) {
                let d = date.getDate();
                let mName = month[date.getMonth()];
                let y = parseInt(date.getFullYear()) + 543;
                $('#date').html(d + " " + mName + " " + y);
            } 

            function isValidDate(d) {
                return d instanceof Date && !isNaN(d);
            }
        });

        var test = $(".test").get(0);
        // to canvas
        $('.toCanvas').click(function(e) {
            html2canvas(test).then(function(canvas) {
                // canvas width
                var canvasWidth = canvas.width;
                // canvas height
                var canvasHeight = canvas.height;
                // render canvas
                // $('.toCanvas').after(canvas);
                // show 'to image' button
                // $('.toPic').show(1000);
                // convert canvas to image
                // $('.toPic').click(function(e) {
                var img = Canvas2Image.convertToImage(canvas, canvasWidth, canvasHeight);
                // render image
                $(".toPic").html(img);

                jQuery("html, body").animate({
                    scrollTop: jQuery(window).height()
                }, 1500);

                $('#save').removeAttr('disabled');


                // save
                $('#save').click(function(e) {
                    let type = $('#sel').val(); // image type
                    let w = $('#imgW').val(); // image width
                    let h = $('#imgH').val(); // image height
                    let f = "รูปภาพการ์ดเชิญ" // file name
                    w = (w === '') ? canvasWidth : w;
                    h = (h === '') ? canvasHeight : h;
                    // save as image
                    Canvas2Image.saveAsImage(canvas, w, h, type, f);

                    $('#next').removeAttr('disabled');
                });
                // });
            });
        });
    </script>
</body>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>

</html>