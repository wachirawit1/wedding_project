<!doctype html>
<html lang="en">

<head>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">
    <!-- effect -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

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

        .jumbotron {
            background-color: white;

        }

        a.nav-link:hover {
            color: #dbb89a !important;
        }

        .nav-item .btn {
            border: 1px solid grey;
        }
    </style>

</head>


<body>
    <?php
    include('condb.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT `replying` FROM `email_list` WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $reply_check = mysqli_fetch_array($result);
        if ($reply_check['replying'] != "") { ?>

            <div data-aos="fade-down">
                <div class="container p-3 bg-light mt-5 shadow-lg " id="success">
                    <h3 class="text-center">คุณได้ตอบกลับเรียบร้อยแล้ว</h3>
                    <div class="d-flex justify-content-center text-center">
                        <div class="col col-md-4">
                            <p class="text-success">การตอบกลับเสร็จสิ้น</p>
                            <h1><i class="bi bi-check-circle text-success"></i></h1>
                        </div>

                    </div>
                </div>
            </div>

        <?php } else { ?>

            <div data-aos="fade-down">
                <div class="container p-3 bg-light mt-5 shadow-lg" id="replying">
                    <h3 class="text-center">ต้องการเข้าร่วมงานแต่งหรือไม่??</h3>
                    <input type="hidden" name="id" id="id" value="<?= $id ?>">

                    <div class="d-flex justify-content-center text-center p-4">
                        <div class="col col-md-4">
                            <button class="btn btn-block btn-outline-danger" id="reject">ไม่เข้าร่วม</button>
                        </div>
                        <div class="col col-md-4">
                            <button class="btn btn-block btn-outline-warning" id="notsure">ไม่แน่ใจ</button>
                        </div>
                        <div class="col col-md-4">
                            <button class="btn btn-block btn-outline-success" id="accept">เข้าร่วม</button>
                        </div>
                    </div>



                </div>
            </div>

            <div data-aos="fade-down">
                <div class="container p-3 bg-light mt-5 shadow-lg " id="success" style="display: none;">
                    <h3 class="text-center">การตอบกลับเสร็จสิ้น</h3>
                    <div class="d-flex justify-content-center text-center">
                        <div class="col col-md-4">
                            <p class="text-success">ขอบคุณสำหรับการตอบกลับ</p>
                            <h1><i class="bi bi-check-circle text-success"></i></h1>
                        </div>

                    </div>
                </div>
            </div>
    <?php }
    }
    ?>


    

    <?php
    if (isset($_POST['reject']) && isset($_POST['id'])) {
        $replying = $_POST['reject'];
        $id = $_POST['id'];

        $sql = "UPDATE `email_list` SET `replying`='$replying' WHERE id = $id ";
        mysqli_query($conn, $sql);
    } else if (isset($_POST['notsure']) && isset($_POST['id'])) {
        $replying = $_POST['notsure'];
        $id = $_POST['id'];

        $sql = "UPDATE `email_list` SET `replying`='$replying' WHERE id = $id ";
        mysqli_query($conn, $sql);
    }else if (isset($_POST['accept']) && isset($_POST['id'])) {
        $replying = $_POST['accept'];
        $id = $_POST['id'];

        $sql = "UPDATE `email_list` SET `replying`='$replying' WHERE id = $id ";
        mysqli_query($conn, $sql);
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        AOS.init({
            duration: 1000
        });

        $('#reject').on("click", function() {
            let reject = "reject";
            let id = $('#id');

            
            $.ajax({
                type: "POST",
                url: "replying.php",
                cache: false,
                data: {
                    reject: reject,
                    id: id.val()
                },
                success: function(data) {
                    $('#replying').css("display", "none");
                    $('#success').css("display", "");
                    alert('เสร็จสิ้น');
                }
            });
        });

        $('#notsure').on("click", function() {
            let notsure = "notsure";
            let id = $('#id');

            
            $.ajax({
                type: "POST",
                url: "replying.php",
                cache: false,
                data: {
                    notsure: notsure,
                    id: id.val()
                },
                success: function(data) {
                    $('#replying').css("display", "none");
                    $('#success').css("display", "");
                    alert('เสร็จสิ้น');
                }
            });
        });

        $('#accept').on("click", function() {
            let accept = "accept";
            let id = $('#id');

            
            $.ajax({
                type: "POST",
                url: "replying.php",
                cache: false,
                data: {
                    accept: accept,
                    id: id.val()
                },
                success: function(data) {
                    $('#replying').css("display", "none");
                    $('#success').css("display", "");
                    alert('เสร็จสิ้น');
                }
            });
        });
    </script>

</body>



</html>