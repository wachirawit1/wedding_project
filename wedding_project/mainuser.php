<?php session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

    <!-- footer style -->
    <link rel="stylesheet" href="footer_style.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

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

    <title>Wedding Planner</title>
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Prompt', sans-serif;
            background-color: white;
        }

        .nav-item {
            font-size: 16px;
            padding-left: 16px;
            padding-right: 16px;
        }

        .jumbotron {
            background-color: white;
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
            <p class='mb-0'><a href='index.php' class='alert-link'>กลับไปเข้าสู่ระบบ</a></p>
        </div>
    <?php
        exit;
    }
    ?>
    <?php include('navbaruser.php') ?>



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
                        <img class="d-block w-100" height="500px" src="assets/images/pic1.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" height="500px" src="assets/images/pic2.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" height="500px" src="assets/images/pic3.png" alt="Third slide">
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
            </center>
        </div>
    </div>
    <div class="container">
        <div class="my-3">
            <h1 class="display-5 text-secondary">เลือกหมวดหมู่ร้านค้า</h1>
            <p class="lead text-secondary">สามารถเลือกสินค้าคุณภาพตามที่คุณต้องการ</p>



            <div class="row row-cols-2 row-cols-md-6">
                <?php
                include('condb.php');
                $sql = "SELECT * FROM `category`";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) { ?>
                    <a class="border text-decoration-none" href="category.php?cate_id=<?= $row['cate_id'] ?>&cate_name=<?= $row['cate_name'] ?>">
                        <div class="col text-center p-2">
                            <div class="">
                                <img src="assets/images/cate_icon/<?= $row['cate_pic'] ?>" alt="img" width="100">
                            </div>
                            <div class="card-text text-secondary"><?= $row['cate_name'] ?></div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

    <div data-spy="scroll" data-target="#navbar" data-offset="0">
        <div class="container-fluid bg-light" id="post">
            <div class="container py-3">
                <div class="my-3">
                    <h1 class="display-5 text-secondary">เลือกรายการสินค้า</h1>
                    <p class="lead text-secondary">สามารถเลือกสินค้าคุณภาพตามที่คุณต้องการ</p>
                    <hr class="my-2">
                </div>
                <div class="row row-cols-1 row-cols-md-3">
                    <?php
                    $sql = "SELECT * FROM `post` WHERE status = 1";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query)) { ?>
                        <form action="view_post.php" method="POST">
                            <div class="col mb-4">
                                <div class="card h-100">
                                    <img src="img/<?= $row['picture'] ?>" class="card-img-top" alt="post">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['name'] ?></h5>
                                        <p class="card-text">
                                            <?= $row['detail'] ?>
                                        </p>
                                    </div>
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <div class="text-center p-2">
                                        <button type="submit" class="btn btn-block" style="background-color: #dbb89a ;color:white;" name="btn_submit">ดูโพสต์</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

        <footer class="footer-16371 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 text-center">
                    <div class="footer-site-logo mb-4">
                        <a href="#">Colorlib</a>
                    </div>
                    <ul class="list-unstyled nav-links mb-5">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Legal</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>

                    <div class="social mb-4">
                        <h3>Stay in touch</h3>
                        <ul class="list-unstyled">
                            <li class="in"><a href="#"><span class="icon-instagram"></span></a></li>
                            <li class="fb"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="tw"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="pin"><a href="#"><span class="icon-pinterest"></span></a></li>
                            <li class="dr"><a href="#"><span class="icon-dribbble"></span></a></li>
                        </ul>
                    </div>

                    <div class="copyright">
                        <p class="mb-0"><small>&copy; Colorlib. All Rights Reserved.</small></p>
                    </div>


                </div>
            </div>
        </div>
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