<?php session_start();
include('condb.php');

?>
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
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>wedding</title>
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: white ;
        }

        .nav-item {
            font-size: 19px;
            padding-left: 16px;
            padding-right: 16px;
        }

        .jumbotron {
            background-color: white ;
        }

     
        li:hover{
            background-color: white;
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

    <!-- <div data-aos="fade-up" data-aos-anchor-placement="center-center">

        <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
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
        </div>
        </center>
    </div> -->

    <div class="jumbotron">
        <h1 class="display-4 mt-5 text-center">โพสต์ของฉัน</h1>
        <div class="text-right">
            <a href="create_post.php" class="btn btn-lg" style="background-color: #dbb89a;">สร้างโพสต์ใหม่</a>
        </div>
    </div>
    <div class="container-fluid">

        <hr>
        <div class="row row-cols-1 row-cols-md-3">

            
            <?php 
            $sql_select = "SELECT * FROM post WHERE status != '0' AND u_id = ".$_SESSION['userid']."";
            $query_select = mysqli_query($conn,$sql_select);
            
            foreach($query_select as $value){
            ?>
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="img/<?=$value['picture']?>" class="card-img-top h-75" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?=$value['name']?></h5>
                    </div>
                    <?php if($value['status'] == 1){ ?>
                    <a href="view_post.php?id=<?=$value['id']?>" class="btn btn-lg mx-2 my-3" style="background-color: #dbb89a;">ดูโพสต์</a>
                    <?php }else{ ?>
                        <a href="view_post.php?id=<?=$value['id']?>" class="btn btn-lg btn-danger mx-2 my-3" >ไม่อนุมัติโพสต์</a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?> 
        </div>
    </div>
    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3">
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