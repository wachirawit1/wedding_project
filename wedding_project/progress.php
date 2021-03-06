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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

            position: absolute;
            left: 50%;
            /* relative to nearest positioned ancestor or body element */
            top: 50%;
            /*  relative to nearest positioned ancestor or body element */
            transform: translate(-50%, -50%);
            /* relative to element's height & width */
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
            <h4 class='alert-heading'>??????????????????????????? !</h4>
            <p>????????????????????????????????????????????????????????????????????? ?????????????????????????????????????????????????????????????????????</p>
            <hr>
            <p class='mb-0'><a href='index.php' class='alert-link'>???????????????????????????????????????????????????</a></p>
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
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">progress</li>
            </ol>
        </nav>
    </div>


    <div class="container">



        <div data-aos="fade-right">
            <!-- content -->
            <div class="row align-items-center">
                <?php
                $userid = $_SESSION['userid'];
                include('condb.php');
                $sql = "SELECT status FROM event WHERE userid = '$userid' AND status = 1 ";
                $status = mysqli_fetch_array(mysqli_query($conn, $sql));
                $num = mysqli_num_rows(mysqli_query($conn, $sql));
                if ($num == 0) { ?>
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
                        <div class="mt-3">
                            <p class="text-center">?????????????????????????????????????????????</p>
                        </div>
                    </div>

                    <div class="col col-1">
                        <center><i class="fas fa-angle-double-right" id="arrow"></i></center>
                    </div>

                    <div class="col" style=" width: 50px; height:100px">
                        <div class="card">
                            <div class="card-body ">
                                <!-- ???????????????????????? -->
                                <center>
                                    <form action="schedule.php">
                                        <button class="btn" disabled>
                                            <i class="far fa-calendar-alt card-text" id="icon"></i>
                                        </button>
                                    </form>
                                </center>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="text-center">???????????????????????? & ????????????????????????</p>

                        </div>
                    </div>

                    <div class="col-1">
                        <center><i class="fas fa-angle-double-right" id="arrow"></i></center>
                    </div>

                    <div class="col" style=" width: 50px; height:100px">
                        <div class="card">
                            <div class="card-body">
                                <!-- ??????????????????????????? -->
                                <center>
                                    <form action="card_template.php">
                                        <button class="btn" disabled>
                                            <i class="far fa-envelope " id="icon"></i>
                                        </button>
                                    </form>
                                </center>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="text-center ">????????????????????????????????????</p>

                        </div>

                    </div>

                <?php } else { ?>

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
                            <div class="mt-3">
                                <div class="col">
                                    <p class="text-center">?????????????????????????????????????????????</p>
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
                            <div class="mt-3">
                                <div class="col">
                                    <p class="text-center">????????????????????????????????????????????????</p>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>

                    <div class="col">
                        <center><i class="fas fa-angle-double-right" id="arrow"></i></center>
                    </div>

                    <?php
                    if (isset($status['status']) == 1) { ?>
                        <div class="col" style=" width: 50px; height:100px">
                            <div class="card">
                                <div class="card-body ">
                                    <!-- ???????????????????????? -->
                                    <center>
                                        <form action="schedule.php">
                                            <button class="btn">
                                                <i class="far fa-calendar-alt card-text" id="icon"></i>
                                            </button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="col">
                                    <p class="text-center">???????????????????????? & ????????????????????????</p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col">
                        <center><i class="fas fa-angle-double-right" id="arrow"></i></center>
                    </div>


                    <?php
                    if (isset($status['status']) > 0) { ?>
                        <div class="col" style=" width: 50px; height:100px">
                            <div class="card">
                                <div class="card-body">
                                    <!-- ??????????????????????????? -->
                                    <center>
                                        <form action="SendingE.php">
                                            <button class="btn">
                                                <i class="far fa-envelope " id="icon"></i>
                                            </button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-center ">????????????????????????????????????</p>

                            </div>

                        </div>
                    <?php } ?>
                <?php } ?>
            </div>

        </div>
    </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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