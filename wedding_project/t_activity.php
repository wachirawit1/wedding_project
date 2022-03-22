<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>

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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

        a.nav-link {
            color: grey;
        }

        a.nav-link:hover {
            color: #dbb89a !important;
        }

        .btn-primary.btn-block {
            border-color: #dbb89a;
            background-color: #dbb89a;
            color: #ffffff;
        }

        .btn-primary.btn-block:hover {
            border-color: #dbb89a;
            background-color: #caae95;
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
            <p class='mb-0'><a href='index.php' class='alert-link'>กลับไปเข้าสู่ระบบ</a></p>
        </div>
    <?php
        exit;
    }
    ?>
    <?php include('navbaruser.php') ?>



    <!-- breadcrumb -->
    <nav aria-label="breadcrumb position-static">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="progress.php">progress</a></li>
            <li class="breadcrumb-item"><a href="t_select.php">traditional</a></li>
            <li class="breadcrumb-item active" aria-current="page">activity</li>
        </ol>
    </nav>


    <form action="calculate.php" method="POST">

        <div class="container  bg-white rounded" id="box">
            <div class="my-3">
                <h1 class="text-center font-weight-bold text-muted"><?php
                                                                    $traditional = $_POST['traditional'];
                                                                    echo $traditional;
                                                                    ?></h1>


                <div data-aos="fade-up">

                    <table class="table table-striped table-light shadow">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">กิจกรรม</th>
                                <th scope="col">เลือก</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php

                            $t_id = $_POST['t_id'];



                            include('condb.php');

                            $sql = "SELECT * FROM activity WHERE t_id = $t_id ";
                            $query = mysqli_query($conn, $sql);
                            $n = 1;


                            while ($row = mysqli_fetch_array($query)) {

                            ?>
                                <tr>
                                    <th scope="row"><?php echo $n; ?></th>
                                    <td><?php echo $row['a_name']; ?></td>
                                    <td><input type="checkbox" name="selected[]" id="" checked value="<?php echo $row['a_id'] ?>"></td>
                                    <input type="hidden" name="t_id" value="<?= $t_id ?>">
                                </tr>
                            <?php $n++;
                            } ?>
                        </tbody>
                    </table>


                </div>

                <div class="row justify-content-between">
                    <div class="col-5">
                        <a href="t_select.php" class="btn btn-outline-secondary btn-block">กลับ</a>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-primary btn-block">ถัดไป</button>
                    </div>
                </div>


            </div>
        </div>
    </form>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</body>


</html>