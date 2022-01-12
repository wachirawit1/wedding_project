<?php session_start();
include('condb.php');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>wedding</title>
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
            <p class='mb-0'><a href='login.php' class='alert-link'>กลับไปเข้าสู่ระบบ</a></p>
        </div>
    <?php
        exit;
    }
    ?>
 <?php

include('navbar_admin.php');
?>
        <div class="card container col-10 py-5 my-5 bg-light shadow rounded" id="box"  >
        <div class="container col-12  " >
        
        <div class="col  d-flex justify-content-between">
            <div class="p-2">
                <?php
                if(isset($_POST["action"]) && $_POST["action"] == "search"){
                    echo "ผลการค้นหา : \"".$_POST["strsearch"]."\"";
                    $where_condition = "WHERE trad_name LIKE '%".$_POST["strsearch"]."%' ";
                }else{
                    $where_condition = "";
                }
                ?>
      
        </div>
            <div class="p-2">
                <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addmodal">
                    เพิ่มอุปกรณ์    
                </button>
            </div>
        </div>
   
        <!--  -->
        <table class="table table-light table-hover  text-center align-center">
        <thead>
                <th scope="col">#</th>
                <th scope="col">อุปกรณ์</th>
                <th scope="col">จำนวน</th>
                <th scope="col">ตัวเลือก</th>
            </thead>
            <?php include('condb.php');

            

            if(!isset($_POST['search'])){

                $sql = "SELECT * FROM item_list  ORDER BY list_id DESC";
                $query = mysqli_query($conn, $sql);
    
            }
            else{
                
                $sql = "SELECT * FROM item_list where  item_name LIKE '%".$keyword."%'";
                $query = mysqli_query($conn, $sql);
            }


            ?>
            <tbody>

                <?php
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>

                        <!-- <th scope="row"><?php echo $i++ ?></th> -->
                        <td class="align-middle " scope="row"><?php echo $row['list_id'] ?></td>
                        <td class="align-middle"><?php echo $row['item_name'] ?></td>
                        <td class="align-middle"><?php echo $row['amount'] ?></td>
                        <td class="align-middle">

                            <a href="#edit<?= $row['list_id'] ?>" class="btn btn-warning" data-toggle="modal">แก้ไข</a>
                            <a href="#delete<?php echo $row['list_id']; ?>" class="btn btn-danger" data-toggle="modal">ลบ</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>

        </div>
        </div>
    </div> 
    
</div> 
    <!-- Modal -->
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
    <!-- popup เพิ่มitem -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มอุปกรณ์</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="item_add.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="#" class="col-sm-3 col-form-label">ชื่ออุปกรณ์</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="item_name" id="#" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-3 col-form-label">จำนวน</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="amount" id="#" placeholder="">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                        <button class="btn btn-success" type="submit" class="btn btn-primary">เพิ่ม</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    $sql_del = "SELECT * FROM item_list";
    $query_del = mysqli_query($conn, $sql_del);
    while ($row = mysqli_fetch_array($query_del)) {
        $list_id = $row['list_id'];
    ?>
        <!--- ลบ ---->
        <div class="modal fade" id="delete<?php echo $list_id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal">แจ้งเตือน!!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ต้องการลบ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <a href="item_del.php?id=<?php echo $list_id ?>" type="button" class="btn btn-primary">ยืนยัน</a>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>


    <?php
    $sql_edit = "SELECT * FROM item_list";
    $query_edit = mysqli_query($conn, $sql_edit);
    while ($row = mysqli_fetch_array($query_edit)) {
        $list_id = $row['list_id']
    ?>
        <!-- แก้ไข -->
        <div class="modal fade" id="edit<?= $list_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="item_edit.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" value="<?= $list_id ?>" name="list_id">
                            <div class="form-group row">
                                <label for="#" class="col-sm-3 col-form-label">ชื่ออุปกรณ์</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="item_name" id="#" value="<?= $row['item_name'] ?>" placeholder="">
                                </div>
                            </div>

                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="<?= $amount ?>" name="amount">
                            <div class="form-group row">
                                <label for="#" class="col-sm-3 col-form-label">จำนวน</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="amount" id="#" value="<?= $row['amount'] ?>" placeholder="">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button class="btn btn-success" type="submit" class="btn btn-primary">ยืนยัน</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    <?php
    }
    ?>
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