<?php session_start();

?>
<!doctype html>
<html lang="en">

<head>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Progess Page</title>
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

        .card {
            border-radius: 30px;
            background-color: #dbb89a;
        }

        #icon {
            font-size: 50px;
            text-align: center;
            color: white;

        }

        #arrow {
            font-size: 60px;
            color: darkgray;
        }

        .container {

            height: 100% !important;

        }

        button {
            background-color: #dbb89a;
        }

        a.nav-link {
            color: grey;
        }


        a.nav-link:hover {
            color: #dbb89a !important;
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

    <div>
        <nav aria-label="breadcrumb bg-white">
            <ol class="breadcrumb" style=" background-color: #ffffff;">
                <li class="breadcrumb-item"><a href="mainuser.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">progress</li>
            </ol>
        </nav>
    </div>





    <div>
        <!-- content -->

        <?php
        $userid = $_SESSION['userid'];
        include('condb.php');
        $sql = "SELECT status FROM event WHERE userid = '$userid'";
        $status = mysqli_fetch_array(mysqli_query($conn, $sql));

        ?>


        <div data-aos="fade-right">
            <div class="container p-5 ">
                <div class="row  align-items-center">
                    <?php
                    if (isset($status["status"]) > 1 || !isset($status["status"])) { ?>
                        <div class="col" style=" width: 50px; height:100px">
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <form action="t_select.php">
                                            <button class="btn">
                                                <i class="far fa-calendar-plus" id="icon"></i>
                                            </button>
                                        </form>
                                    </center>

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <p class="text-center">สร้างงานแต่งงาน</p>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col" style=" width: 50px; height:100px">
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <form action="t_select.php">
                                            <button class="btn" disabled>
                                                <i class="far fa-calendar-plus" id="icon"></i>
                                            </button>
                                        </form>
                                    </center>

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <p class="text-center">สร้างงานเเต่งงาน <br>
                                    <p class="text-success text-lg-center">สำเร็จแล้ว</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>

                    <div class="col">
                        <center><i class="fas fa-angle-double-right" id="arrow"></i></center>
                    </div>

                    <?php
                    if (isset($status['status']) == 0 || !isset($status['status'])) { ?>
                        <div class="col" style=" width: 50px; height:100px">
                            <div class="card">
                                <div class="card-body ">
                                    <!-- กำหนดการ -->
                                    <center>
                                        <form action="schedule.php">
                                            <button class="btn">
                                                <i class="far fa-calendar-alt card-text" id="icon"></i>
                                            </button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <p class="text-center">กำหนดการ & <br> งบประมาณ</p>
                                </div>

                            </div>
                        </div>
                    <?php } elseif (isset($status['status']) == 1) { ?>
                        <div class="col" style=" width: 50px; height:100px">
                            <div class="card">
                                <div class="card-body ">
                                    <!-- กำหนดการ -->
                                    <center>
                                        <form action="schedule.php">
                                            <button class="btn">
                                                <i class="far fa-calendar-alt card-text" id="icon"></i>
                                            </button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <p class="text-center">กำหนดการ & <br> งบประมาณ</p>
                                    <p class="text-center text-warning">กำลังดำเนินการ</p>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col" style=" width: 50px; height:100px">
                            <div class="card">
                                <div class="card-body ">
                                    <!-- กำหนดการ -->
                                    <center>
                                        <form action="schedule.php">
                                            <button class="btn" disabled>
                                                <i class="far fa-calendar-alt card-text" id="icon"></i>
                                            </button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <p class="text-center">กำหนดการ & <br> งบประมาณ</p>
                                    <p class="text-center text-success">สำเร็จแล้ว</p>

                                </div>

                            </div>
                        </div>
                    <?php }
                    ?>



                    <div class="col">
                        <center><i class="fas fa-angle-double-right" id="arrow"></i></center>
                    </div>




                    <div class="col" style=" width: 50px; height:100px">
                        <div class="card">
                            <div class="card-body">
                                <!-- ส่งจดหมาย -->
                                <center>
                                    <a href="card_template.php" class="btn">
                                        <i class="far fa-envelope " id="icon"></i>
                                    </a>
                                </center>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <p class="text-center ">ส่งการ์ดเชิญ</p>
                            </div>

                        </div>

                    </div>

                    <div class="col">
                        <center><i class="fas fa-angle-double-right" id="arrow"></i></center>
                    </div>

                    <div class="col" style=" width: 50px; height:100px">
                        <div class="card">
                            <div class="card-body">
                                <!-- คำนวณเงิน -->
                                <center>
                                    <a href="report.php" class="btn">
                                        <i class="fas fa-check-square" id="icon"></i>
                                    </a>
                                </center>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <p class="text-center ">ดูรายงาน</p>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>


    <footer class="bg-light text-center text-lg-start" style="position:fixed; bottom: 0px; right: 0px; left: 0px;">
        <!-- Copyright -->
        <div class="text-center p-3 border-top bg-white">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</body>


</html>