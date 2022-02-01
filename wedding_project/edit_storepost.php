<?php session_start();
include('condb.php');
// print_r($_SESSION);
// exit();

//$id = $_GET['id'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else if(isset($_POST['id'])){
    $id = $_POST['id'];
}

$sql_post = "SELECT * FROM post WHERE id = $id";
$query_post = mysqli_query($conn,$sql_post);
$row_post = mysqli_fetch_assoc($query_post);
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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
<script>
    function sweet01(){
        Swal.fire({
            icon: 'success',
            title: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
        }).then((result)=>{
            window.location = 'storepost.php'
            })
        }
        function sweet02(){
        Swal.fire({
            icon: 'error',
            title: 'แก้ไขข้อมูลไม่สำเร็จ',
        }).then((result)=>{
            window.location = 'storepost.php'
            })
        }
</script>

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
    <?php 
    if(isset($_POST['submit']) && empty($_POST['submit'])){
        $pic = $_POST['pic'];
        if(isset($_FILES['picture']['name']) && !empty($_FILES['picture']['name'])){
        // print_r($_FILES);
            $pic = time().$_FILES['picture']['name'];
            $path = "img/".$pic;
            move_uploaded_file($_FILES['picture']['tmp_name'],$path);
        }
        $u_id = $_POST['u_id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $detail = $_POST['detail'];
        $gallery1 = $_POST['o_gallery1'];
        if(isset($_FILES['gallery1']['name']) && !empty($_FILES['gallery1']['name'])){
            $gallery1 = "g1".time().$_FILES['gallery1']['name'];
            $p_gallery1 = "img/".$gallery1;
            move_uploaded_file($_FILES['gallery1']['tmp_name'],$p_gallery1);
        }
        $gallery2 = $_POST['o_gallery2'];
        if(isset($_FILES['gallery2']['name']) && !empty($_FILES['gallery2']['name'])){
            $gallery2 = "g2".time().$_FILES['gallery2']['name'];
            $p_gallery2 = "img/".$gallery2;
            move_uploaded_file($_FILES['gallery2']['tmp_name'],$p_gallery2);
        }
        $gallery3 = $_POST['o_gallery3'];
        if(isset($_FILES['gallery3']['name']) && !empty($_FILES['gallery3']['name'])){
            $gallery3 = "g3".time().$_FILES['gallery3']['name'];
            $p_gallery3 = "img/".$gallery3;
            move_uploaded_file($_FILES['gallery3']['tmp_name'],$p_gallery3);
        }
        $gallery4 = $_POST['o_gallery4'];
        if(isset($_FILES['gallery4']['name']) && !empty($_FILES['gallery4']['name'])){
            $gallery4 = "g4".time().$_FILES['gallery4']['name'];
            $p_gallery4 = "img/".$gallery4;
            move_uploaded_file($_FILES['gallery4']['tmp_name'],$p_gallery4);
        }
        $gallery5 = $_POST['o_gallery5'];
        if(isset($_FILES['gallery5']['name']) && !empty($_FILES['gallery5']['name'])){
            $gallery5 = "g5".time().$_FILES['gallery5']['name'];
            $p_gallery5 = "img/".$gallery5;
            move_uploaded_file($_FILES['gallery5']['tmp_name'],$p_gallery5);
        }
        $gallery6 = $_POST['o_gallery6'];
        if(isset($_FILES['gallery6']['name']) && !empty($_FILES['gallery6']['name'])){
            $gallery6 = "g6".time().$_FILES['gallery6']['name'];
            $p_gallery6 = "img/".$gallery6;
            move_uploaded_file($_FILES['gallery6']['tmp_name'],$p_gallery6);
        }
        $sql = "UPDATE post  SET name = '$name' , u_id = '$u_id', picture = '$pic', price = '$price', detail = '$detail',gallery1 = '$gallery1', gallery2 = '$gallery2', gallery3 = '$gallery3' , gallery4 = '$gallery4' , gallery5 = '$gallery5' , gallery6 = '$gallery6' WHERE id = $id";
        $query = mysqli_query($conn,$sql);
        if ($query) {
            echo "<script>";
            echo "sweet01()";
            echo "</script>";
        } else {
            echo "<script>";
            echo "sweet02()";
            echo "</script>";
        }
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
    <div class="jumbotron">
        <h1 class="display-4 mt-5 text-center">แก้ไขโพสต์</h1>
    </div>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="text-center">
                <input type="hidden" name="u_id" value="<?=$_SESSION['s_id']?>">
                <input type="hidden" name="pic" value="<?=$row_post['picture']?>">
                <div class="form-group">
                    <img id="blah" src="img/<?=$row_post['picture']?>" height="250px" width="400px">
                </div>
                <div class="form-group">
                    <input type='file' name="picture"  id="imgInp">
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-form-label text-right col-3 col-md-4">ชื่อ</label>
                        <input type="text" name="name" value="<?=$row_post['name']?>" maxlength="200" placeholder="ชื่อ" required class="form-control col-6 col-md-6">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-form-label text-right col-3 col-md-4">ราคา</label>
                        <input type="number" name="price" value="<?=$row_post['price']?>" maxlength="20" placeholder="ราคา" required class="form-control col-6 col-md-6">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-form-label text-right col-3 col-md-4">รายละเอียด</label>
                        <textarea type="text" name="detail"  placeholder="รายละเอียด" required class="form-control col-6 col-md-6"><?=$row_post['detail']?></textarea>
                    </div>
                </div>
                <div class="form-group">
                <h4>แกลเลอรี่</h4>
                    <div class="row">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="hidden" name="o_gallery1" value="<?=$row_post['gallery1']?>">
                        <input type="hidden" name="o_gallery2" value="<?=$row_post['gallery2']?>">
                        <input type="hidden" name="o_gallery3" value="<?=$row_post['gallery3']?>">
                        <input type="hidden" name="o_gallery4" value="<?=$row_post['gallery4']?>">
                        <input type="hidden" name="o_gallery5" value="<?=$row_post['gallery5']?>">
                        <input type="hidden" name="o_gallery6" value="<?=$row_post['gallery6']?>">
                        <div class="col-6 col-md-4 my-2">
                            <img id="g1" src="img/<?=!empty($row_post['gallery1']) ? "".$row_post['gallery1']."" : "preview.png"?>" height="250px" width="100%">
                            <input type="file" id="img1" name="gallery1" class="mt-2">
                        </div>
                        <div class="col-6 col-md-4 my-2">
                            <img id="g2" src="img/<?=!empty($row_post['gallery2']) ? "".$row_post['gallery2']."" : "preview.png"?>" height="250px" width="100%">
                            <input type="file" id="img2" name="gallery2" class="mt-2">
                        </div>
                        <div class="col-6 col-md-4 my-2">
                            <img id="g3" src="img/<?=!empty($row_post['gallery3']) ? "".$row_post['gallery3']."" : "preview.png"?>" height="250px" width="100%">
                            <input type="file" id="img3" name="gallery3" class="mt-2">
                        </div>
                        <div class="col-6 col-md-4 my-2">
                            <img id="g4" src="img/<?=!empty($row_post['gallery4']) ? "".$row_post['gallery4']."" : "preview.png"?>" height="250px" width="100%">
                            <input type="file" id="img4" name="gallery4" class="mt-2">
                        </div>
                        <div class="col-6 col-md-4 my-2">
                            <img id="g5" src="img/<?=!empty($row_post['gallery5']) ? "".$row_post['gallery5']."" : "preview.png"?>" height="250px" width="100%">
                            <input type="file" id="img5" name="gallery5" class="mt-2">
                        </div>
                        <div class="col-6 col-md-4 my-2">
                            <img id="g6" src="img/<?=!empty($row_post['gallery6']) ? "".$row_post['gallery6']."" : "preview.png"?>" height="250px" width="100%">
                            <input type="file" id="img6" name="gallery6" class="mt-2">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-5">
                    <button class="btn btn-primary" name="submit">ยืนยัน</button>
                    <button class="btn btn-danger">ยกเลิก</button>
                </div>
            </div>
        </form>
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });

        function gallery1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#g1').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img1").change(function(){
            gallery1(this);
        });

        function gallery2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#g2').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img2").change(function(){
            gallery2(this);
        });

        function gallery3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#g3').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img3").change(function(){
            gallery3(this);
        });

        function gallery4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#g4').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img4").change(function(){
            gallery4(this);
        });

        function gallery5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#g5').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img5").change(function(){
            gallery5(this);
        });

        function gallery6(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#g6').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img6").change(function(){
            gallery6(this);
        });
    </script>
</body>


</html>