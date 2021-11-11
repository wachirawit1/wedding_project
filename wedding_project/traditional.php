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

<nav class="navbar navbar-expand-lg py-3 ml-0 navbar-light bg-white ">
    <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0  flex-wrap flex-md-nowrap justify-content-between">
    <a class="navbar-brand" href="traditional.php" style="line-height: 25px; ">
                <div class="d-table m-auto">
                    <img src="assets/images/logo2.png" width="160px"></a>
                    
                </div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <form action="traditional.php" method="post" class="form-inline">
        <input class="form-control mr-sm-2" type="search" name="strsearch" placeholder="Search" aria-label="Search">
        <input type="hidden" name="action" value="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
<div class="container-fluid">
    <div class="row">
  
        <nav id="sidebar" class="nav flex-column" >
            <div class="position-sticky">
                <ul class="nav flex-column">
                   <!---  <li class="nav-item text-center p-3 ">
                    <a class="nav-link" href="profile.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="ml-2">ดูข้อมูลส่วนตัว</span></a>
                    </li> --->
                    <li class="nav-item text-center p-3 ">
                        <a class="nav-link active"  href="traditional.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>

                            <span class="ml-2">จัดการประเพณี</span>
                        </a>
                    </li>
                    <li class="nav-item ml-0">
                        <a class="nav-link" href="admin_post.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            <span class="ml-2">อนุมัติโพสต์</span>
                        </a>
                    </li>
                    <li class="nav-item text-center p-3 ">
                        <a class="nav-link" href="category_store.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="ml-2">หมวดหมู่ร้านค้า</span>
                        </a>
                    </li>
                   
                    <li class="nav-item text-center p-2 ml-0">
                        <a type="nav-link" class="btn dropdown-item" data-toggle="modal" data-target="#logout" style="color: red;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> 
                            <span class="ml-2">ออกจากระบบ</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="card container py-5 my-5 bg-light shadow rounded" id="box"  >
        <div class="container " >
        
        <div class="col d-flex justify-content-between">
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
                    เพิ่มประเพณี
                </button>
            </div>
        </div>
     <table class="table table-light table-hover text-center align-center">
            <thead>
                <th scope="col">#</th>
                <th scope="col">ประเพณี</th>
                <th scope="col">รูปภาพ</th>
                <th scope="col">ตัวเลือก</th>
            </thead>
            <?php include('condb.php');

            $sql = "SELECT * FROM traditional $where_condition ORDER BY t_id DESC"; 
            $query = mysqli_query($conn, $sql);
            ?>
            <tbody>

                <?php
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
                ?>


                    <!-- <th scope="row"><?php echo $i++ ?></th> -->
                    <th class="align-middle " scope="row"><?php echo $row['t_id'] ?></th>
                    <td class="align-middle"><?php echo $row['trad_name'] ?></td>
                    <td class="align-middle"><img src="assets/tradition_img/<?= $row['trad_img'] ?>" width="150px"></td>

                    <td class="align-middle">
                        <a href="t_action.php?t_id=<?= $row['t_id'] ?>" class="btn btn-success" target="_blank">จัดการพิธีการ</a>
                        <a href="#edit<?= $row['t_id'] ?>" class="btn btn-warning" data-toggle="modal">แก้ไข</a>
                        <a href="#delete<?php echo $row['t_id']; ?>" class="btn btn-danger" data-toggle="modal">ลบ</a>
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
   
    

    <!-- popup เพิ่มประเพณี -->
    <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลประเพณี</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="trad_add.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="#" class="col-sm-3 col-form-label">วัฒนธรรรม</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="trad_name" id="#" placeholder="ไทย จีน เป็นต้น">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="#" class="col-sm-3 col-form-label">รูปภาพ</label>
                            <div class="col-sm-9">
                                <img src="" class="my-2" id="blah" alt="traditional pic" width="200">

                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02" value="" name="trad_img" onchange="readURL(this);">
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>

                                </div>
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
    </div>

    <?php
    $sql_del = "SELECT * FROM traditional";
    $query_del = mysqli_query($conn, $sql_del);
    while ($row = mysqli_fetch_array($query_del)) {
        $t_id = $row['t_id'];
    ?>
        <!--- ลบ ---->
        <div class="modal fade" id="delete<?php echo $t_id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
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
                        <a href="trad_del.php?id=<?php echo $t_id ?>" type="button" class="btn btn-primary">ยืนยัน</a>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
    </div>

    <?php
    $sql_edit = "SELECT * FROM traditional";
    $query_edit = mysqli_query($conn, $sql_edit);
    while ($row = mysqli_fetch_array($query_edit)) {
        $t_id = $row['t_id']
    ?>
        <!-- แก้ไข -->
        <div class="modal fade" id="edit<?= $t_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="trad_edit.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" value="<?= $t_id ?>" name="t_id" id="t_id">
                            <div class="form-group row">
                                <label for="#" class="col-sm-3 col-form-label">วัฒนธรรรม</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="trad_name" id="#" value="<?= $row['trad_name'] ?>" placeholder="">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="#" class="col-sm-3 col-form-label">รูปภาพ</label>
                                <div class="col-sm-9">
                                    <img src="assets/tradition_img/<?php echo $row['trad_img'] ?>" class="my-2" id="blah<?php echo $t_id; ?>" alt="traditional pic" width="200">

                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02" value="<?php echo $row['trad_img']; ?>" name="trad_img" onchange="readURL<?php echo $t_id; ?>(this);">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        </div>

                                    </div>
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





    <footer class="bg-light text-center text-lg-start bg-white border fixed-bottom" >
        <!-- Copyright -->
        <div class="text-center p-3">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    <?php
    $sql_del = "SELECT * FROM traditional";
    $query_del = mysqli_query($conn, $sql_del);
    while ($row = mysqli_fetch_array($query_del)) {
        $t_id = $row['t_id'];
    ?>
        <script type="text/javascript">
            function readURL<?php echo $t_id ?>(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah<?php echo $t_id; ?>').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    <?php } ?>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



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