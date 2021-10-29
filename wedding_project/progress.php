<?php session_start();

?>
<!doctype html>
<html lang="en">

<head>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ต้องการออกจากระบบ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <a href="logout.php?logout=1" type="button" class="btn btn-success">ยืนยัน</a>
                </div>
            </div>
        </div>
    </div>
    </div>



    <div>
        <!-- content -->

        <div class="container">

            <!-- progress -->
            <?php
            $userid = $_SESSION['userid'];
            include('condb.php');
            $sql = "SELECT status FROM event WHERE userid = '$userid'";
            $status = mysqli_fetch_array(mysqli_query($conn, $sql));
            $status = $status['status'];
            $style = "";
            $aria_valuenow = "";
            $data = "0%";

            if ($status == 0 || !isset($status)) {
            ?>
                <div class="progress row my-5">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            <?php } elseif ($status == 1) {
                $style = "width: 25%";
                $aria_valuenow = "25";
                $data = "25%";
            ?>
                <div class="progress row my-5">
                    <div class="progress-bar bg-success" role="progressbar" style="<?php echo $style; ?>" aria-valuenow="<?php echo $aria_valuenow ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $data; ?></div>
                </div>
            <?php }

            ?>
        </div>

        <div data-aos="fade-right">
            <div class="container p-5 ">
                <div class="row   d-flex  justify-content-center align-items-center">
                    <div class="col card" style=" width: 50px; height:100px">
                        <div class="card-body">
                            <!-- คำนวณเงิน -->
                            <center>
                                <form action="t_select.php">
                                    <button class="btn" <?php if ($status == 0 || !isset($status)) {
                                                            echo "";
                                                        } else {
                                                            if ($status == 1 && $status > 0) {
                                                                echo " ";
                                                            }
                                                        } ?>>
                                        <i class="fas fa-dollar-sign" id="icon"></i>
                                    </button>
                                </form>
                            </center>

                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-center <?php if ($status == 0) {
                                                            echo "";
                                                        } else {
                                                            if ($status == 1 && $status > 0) {
                                                                echo "text-muted";
                                                            }
                                                        } ?>">สร้างงานแต่งงาน & คำนวณงบประมาณ</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col text-center text-success">
                                <?php if ($status == 0 || !isset($status)) {
                                    echo "";
                                } else {
                                    if ($status == 1 && $status > 0) {
                                        echo "(สำเร็จแล้ว)";
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <center><i class="fas fa-angle-double-right" id="arrow"></i></center>
                    </div>

                    <div class="col card " style=" width: 50px; height:100px">
                        <div class="card-body ">
                            <!-- กำหนดการ -->
                            <center>
                                <form action="schedule.php">
                                    <button class="btn" <?php if (!isset($status) || $status > 1) {
                                                            echo " disabled";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>>
                                        <i class="far fa-calendar-alt card-text" id="icon"></i>
                                    </button>
                                </form>
                            </center>

                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-center <?php if (!isset($status) || $status > 1) {
                                                            echo " text-muted";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>">กำหนดการ</p>
                            </div>

                        </div>
                        <div class="row ">
                            <div class="col text-center text-success">
                                <?php if (!isset($status)) {
                                    echo "";
                                } else {
                                    if ($status > 1) {
                                        echo "(สำเร็จแล้ว)";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <center><i class="fas fa-angle-double-right" id="arrow"></i></center>
                    </div>




                    <div class="col card" style=" width: 50px; height:100px">
                        <div class="card-body">
                            <!-- ส่งจดหมาย -->
                            <center>
                                <a href="email.php" class="btn">
                                    <i class="far fa-envelope " id="icon"></i>
                                </a>
                            </center>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p class="text-center ">ส่งการ์ดเชิญ</p>
                            </div>

                        </div>

                    </div>
                    <div class="col">
                        <center><i class="fas fa-angle-double-right" id="arrow"></i></center>
                    </div>





                    <div class="col card" style=" width: 50px; height:100px">
                        <div class="card-body">
                            <!-- คำนวณเงิน -->
                            <center>
                                <a href="report.php" class="btn">
                                    <i class="fas fa-check-square" id="icon"></i>
                                </a>
                            </center>

                        </div>
                        <div class="row">
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