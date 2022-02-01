<?php session_start();
include('condb.php');
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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


        /* Standard syntax */
        a.nav-link:hover {
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
    $keyword = null;
    if(isset($_POST['search'])){
        $keyword = $_POST['search'];
    }
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

include('navbar_admin.php');
$id = $_GET['id'];
$sql_data = "SELECT *FROM store WHERE s_id = $id";
$query_data = mysqli_query($conn,$sql_data);
$row_data = mysqli_fetch_assoc($query_data);
?>

<div class="card container my-5  bg-light shadow rounded" id="box"  >
    <div class="container my-5 py-5" >
        <h4 class="text-center">ข้อมูลสมาชิกร้านค้า</h4>
        <form action="reject_store_db.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="form-group text-center">
                    <img id="blah" src="img/<?=$row_data['s_img']?>" alt="your image" width="300" />
                
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อผู้ใช้</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" id="" placeholder="" value="<?=$row_data['username']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-9">
                    <input type="email" name="s_email" class="form-control" id="" placeholder="" value="<?=$row_data['s_email']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อร้านค้า</label>
                <div class="col-sm-5">
                    <input type="text" name="s_name" class="form-control" id="" placeholder="" value="<?=$row_data['s_name']?>" readonly>
                </div>
                <div class="col-sm-4">
                    <select class="custom-select" id="validationDefault04" name="category" disabled>
                    <option selected disabled value="">เลือกหมวดหมู่ร้านค้า</option>
                    <?php
                    include('condb.php');
                    $sql = "SELECT * FROM category";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query)) { ?>
                    <option <?=$row_data['cate_id'] == $row['cate_id']?'selected':''?> value="<?= $row['cate_id'] ?>"><?= $row['cate_name'] ?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">โทรศัพท์</label>
                <div class="col-sm-9">
                    <input type="text" name="s_tel" class="form-control" id="" placeholder="" value="<?=$row_data['s_tel']?>" pattern="[0-9]{10}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ที่อยู่</label>
                <div class="col-sm-9">
                    <input type="text" name="s_address" class="form-control" id="" placeholder="" value="<?=$row_data['s_address']?>"  readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="IDcard" class="col-sm-2 col-form-label">บัตรประชาชน</label>
            <div class="col-sm-9">
                    <img id="blah" src="assets/category_img/<?=$row_data['IDcard_img']?>" alt="your image" width="300" />
                
            </div>
                    </div>
            <?php if(!empty($_GET['function'])){ ?>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">หมายเหตุ :</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="note" placeholder="ระบุหมายเหตุ" required></textarea>
                    </div>
                </div>
                <div class="card-footer text-center">
                <button type="submit" class="btn btn-success">ไม่อนุมัติ</button>
                <a href="approve_store.php?id=<?=$id?>" type="submit" name="" class="btn btn-success">ย้อนกลับ</a>
                </div>
            <?php }elseif($row_data['status'] == 0 && empty($_GET['function'])){?>
                <div class="card-footer text-center">
                    
                <a href="approve_store_db.php?id=<?=$id?>" type="submit" onclick="return confirm('ต้องการอนุมัติร้านค้านี้ใช่หรือไม่')" class="btn btn-success">อนุมัติ</a>
                <a href="approve_store.php?id=<?=$id?>&function=reject" class="btn btn-success">ไม่อนุมัติ</a>
            <?php }elseif($row_data['status'] == 2){  ?>
                <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">หมายเหตุ :</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="note" placeholder="ระบุหมายเหตุ" readonly><?=$row_data['note']?></textarea>
                </div>
            </div>
            <?php } ?>

            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                    <a href="logout.php?logout=1" type="button" class="btn btn-danger">ยืนยัน</a>
                </div>
            </div>
        </div>
    </div>

 <footer class="bg-light text-center text-lg-start bg-white border fixed-bottom" >
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