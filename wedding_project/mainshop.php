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
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>wedding</title>
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f0e1dc;
        }

        .nav-item {
            font-size: 19px;
            padding-left: 16px;
            padding-right: 16px;
        }

        .jumbotron {
            background-color: #f0e1dc;
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
    <nav class="navbar navbar-expand-lg navbar-light navbar-dark py-3 fixed-top" style="background-color: #dbb795;">
        <a class="navbar-brand" href="#"><img src="assets/images/new_logo.png" width="50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto pad">
                <li class="nav-item active">
                    <a class="nav-link" href="mainuser.php">หน้าแรก <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="add_event.php">สร้างอีเวนท์ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">โพสต์ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">เกี่ยวกับ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class=" nav-link btn-link" style="border-radius: 15px;" href="#">การแจ้งเตือน<span class="badge badge-light ml-1 ">4</span></a>
                </li>
                <li class="nav-item dropdown active">
                    <!-- check login -->
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                        echo "ยินดีต้อนรับ"." "."คุณ" . $_SESSION['name'] . "</a>";
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "alert('ยังไม่ได้เข้าสู่ระบบ โปรดเข้าสู่ระบบอีกครั้ง');";
                        echo "window.location = 'login.php ;";
                        echo "</script>";
                    }

                    ?>


                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 90px;">
                        <a class="dropdown-item" href="profile.php">ดูข้อมูลส่วนตัว</a>

                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>

                        <!-- Button trigger modal -->
                        <a type="button" class="btn dropdown-item " data-toggle="modal" data-target="#exampleModal" style="color: red;">
                            ออกจากระบบ
                        </a>



                </li>

            </ul>

        </div>

    </nav>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <a href="logout.php?logout=1" type="button" class="btn btn-danger">ยืนยัน</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div data-aos="fade-up" data-aos-anchor-placement="center-center">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <center>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img class="d-block w-100" height="500px" src="assets/images/index1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" height="500px" src="assets/images/index2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" height="500px" src="assets/images/index3.jpg" alt="Third slide">
                    </div>
                </div>

                <a class="carousel-control-prev ml-5" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next mr-5" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
        </div>
        </center>
    </div>

    <div class="jumbotron">
        <h1 class="display-4">สวัสดี</h1>
        <p class="lead">เว็บนี้เป็นเว็บแอพพลิเคชันที่ใช้ในการวางแผนแต่งงานในอนาคต !!</p>
        <hr class="my-4">
        <p>หากคุณคิดว่าใช่ คลิกเลย!!</p>
        <p class="lead">
            <a class="btn btn-light btn-lg" href="add_event.php" role="button" style="background-color: #dbb89a;">เริ่มใช้ทันที</a>
        </p>
    </div>

    <footer class="bg-light text-center text-lg-start" style="position: fixed; bottom : 0 ; left : 0 ;right : 0; text-align: center;">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
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
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</body>


</html>