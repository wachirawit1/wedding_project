<?php session_start();
include('condb.php');
if(isset($_GET['id']) || isset($_POST['id'])){

    //$p_id = $_GET['id'];
    
    if(isset($_GET['id'])){
        $p_id = $_GET['id'];
    }else if(isset($_POST['id'])){
        $p_id = $_POST['id'];
    }


    $sql = "SELECT *,post.id as p_id,post.name as p_name FROM post LEFT JOIN store ON post.u_id = store.s_id WHERE post.id = '$p_id'";
    $query= mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
}
if(isset($_GET['del'])&& !empty($_GET['del'])){
    $p_id = $_GET['del'];
    $sql_del = "DELETE FROM post WHERE id = '$p_id'";
    $query_del= mysqli_query($conn,$sql_del);
    if($query_del){
        echo "<script>";
        echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
        echo "window.location = 'storepost.php'";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert('เกิดข้อผิดพลาด');";
        echo "window.location = 'storepost.php'";
        echo "</script>";
    }
}
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

    <!-- gallery -->
    <link rel="stylesheet" href="carousel-slideshow-mibreit/dist/mibreit-gallery/css/mibreitGallery.css" />

    <title>Wedding Planner</title>
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
    <?php include('navbar_store.php') ?>
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
    <div class="card">
        <div class="py-5">
            <h1 class="display-4 mt-5 text-center"><?=$row['p_name']?></h1>
        </div>  
        <div class="container pb-5">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <!-- <div class="text-center">
                        <img src="img/<?=$row['picture']?>" style="border : 1px solid" width="100%" height="350px">
                    </div> -->
                    <div id="full-gallery" class="content-slideshow" style="position: relative;margin: 0;top: 2px;margin-left: auto;margin-right: auto;width: 100%;height: 30rem;overflow: hidden;">
                            <div class="mibreit-imageElement" style="opacity:0">
                                <img src="img/<?=$row['picture']?>" 
                                data-src="img/<?=$row['picture']?>" 
                                data-title="Image 1" 
                                alt="Image 2" class="col-12"/>
                            </div>
                            <?php if(!empty($row['gallery1'])){ ?>
                            <div class="mibreit-imageElement" style="opacity:0">
                                <img src="img/<?=$row['gallery1']?>" 
                                data-src="img/<?=$row['gallery1']?>" 
                                data-title="Image 1" 
                                alt="Image 2" class="col-12" />
                            </div>
                            <?php } 
                                if(!empty($row['gallery2'])){
                            ?>
                            <div class="mibreit-imageElement" style="opacity:0">
                                <img src="img/<?=$row['gallery2']?>" 
                                data-src="img/<?=$row['gallery2']?>" 
                                data-title="Image 1" 
                                alt="Image 2" class="col-12" />
                            </div>
                            <?php } 
                                if(!empty($row['gallery3'])){
                            ?>
                            <div class="mibreit-imageElement" style="opacity:0">
                                <img src="img/<?=$row['gallery3']?>" 
                                data-src="img/<?=$row['gallery3']?>" 
                                data-title="Image 1" 
                                alt="Image 2" class="col-12" />
                            </div>
                            <?php } 
                                if(!empty($row['gallery4'])){
                            ?>
                            <div class="mibreit-imageElement" style="opacity:0">
                                <img src="img/<?=$row['gallery4']?>" 
                                data-src="img/<?=$row['gallery4']?>" 
                                data-title="Image 1" 
                                alt="Image 2" class="col-12" />
                            </div>
                            <?php } 
                                if(!empty($row['gallery5'])){
                            ?>
                            <div class="mibreit-imageElement" style="opacity:0">
                                <img src="img/<?=$row['gallery5']?>" 
                                data-src="img/<?=$row['gallery5']?>" 
                                data-title="Image 1" 
                                alt="Image 2" class="col-12" />
                            </div>
                            <?php } 
                            if(!empty($row['gallery6'])){
                                ?>
                            <div class="mibreit-imageElement" style="opacity:0">
                                <img src="img/<?=$row['gallery6']?>" 
                                data-src="img/<?=$row['gallery6']?>" 
                                data-title="Image 1" 
                                alt="Image 2" class="col-12" />
                            </div>
                            <?php } ?>
                    </div>
                    <div class="mibreit-thumbview">
                            <div class="mibreit-thumbElement">
                                <img src="img/<?=$row['picture']?>" width="100" height="80" alt="thumbnail" />
                            </div>
                            <?php if(!empty($row['gallery1'])){?>
                            <div class="mibreit-thumbElement">
                                <img src="img/<?=$row['gallery1']?>" width="100" height="80" alt="thumbnail" />
                            </div>
                            <?php }if(!empty($row['gallery2'])){?>
                            <div class="mibreit-thumbElement">
                                <img src="img/<?=$row['gallery2']?>" width="100" height="80" alt="thumbnail" />
                            </div>
                            <?php }if(!empty($row['gallery3'])){?>
                            <div class="mibreit-thumbElement">
                                <img src="img/<?=$row['gallery3']?>" width="100" height="80" alt="thumbnail" />
                            </div>
                            <?php }if(!empty($row['gallery4'])){?>
                            <div class="mibreit-thumbElement">
                                <img src="img/<?=$row['gallery4']?>" width="100" height="80" alt="thumbnail" />
                            </div>
                            <?php }if(!empty($row['gallery5'])){?>
                            <div class="mibreit-thumbElement">
                                <img src="img/<?=$row['gallery5']?>" width="100" height="80" alt="thumbnail" />
                            </div>
                            <?php }if(!empty($row['gallery6'])){?>
                            <div class="mibreit-thumbElement">
                                <img src="img/<?=$row['gallery6']?>" width="100" height="80" alt="thumbnail" />
                            </div>
                            <?php } ?>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <br>
                    <h5><b>ผู้โพสต์ :</b></h5>
                    <p class="ml-4"><?=$row['s_name']?></p>
                    <h5><b>ราคา :</b></h5>
                    <p class="ml-4"><?=$row['price']?> บาท</p>
                    <h5><b>รายละเอียด : </b></h5>
                    <p class="ml-4"><?=$row['detail']?></p>
                    <?php if($row['status'] == 2){ ?>
                            <div class="card"> 
                                <div class="card-body">
                                    <h4><span class="text-danger">***</span>หมายเหตุ<span class="text-danger">***</span></h4>
                                    <p class="ml-5"><?=$row['note']?></p>
                                </div>
                            </div>
                            <div class="text-center my-2">
                                <a href="?del=<?=$row['p_id']?>" class="btn btn-danger">ลบโพสต์นี้</a>
                            </div>
                    <?php } ?>
                </div>
            </div>
            
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="carousel-slideshow-mibreit/dist/mibreit-gallery/mibreitGallery.min.js"></script>
    <script type="text/javascript">
    function preview(src){
    // console.log(src);
        document.getElementById('preview').src = src;
    }
    $(document).ready(function(){
    mibreitGallery.createGallery({
        slideshowContainer:"#full-gallery",
        thumbviewContainer:".mibreit-thumbview",
        titleContainer:"#full-gallery-title",
        allowFullscreen:!0,
        preloadLeftNr:2,
        preloadRightNr:3
     })
    })
    </script>

</body>


</html>