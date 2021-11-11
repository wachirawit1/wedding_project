<?php session_start();
include('condb.php');

//$p_id = $_GET['id'];

if (isset($_GET['id'])) {
    $p_id = $_GET['id'];
} else if (isset($_POST['p_id'])) {
    $p_id = $_POST['p_id'];
}

$sql_select = "SELECT *,post.name as p_name,post.id as p_id FROM post LEFT JOIN store ON post.u_id = store.s_id WHERE post.id = $p_id";
$query_select = mysqli_query($conn, $sql_select);
$row_select = mysqli_fetch_assoc($query_select);
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
    <link rel="stylesheet" href="carousel-slideshow-mibreit/dist/mibreit-gallery/css/mibreitGallery.css" />
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
                    <img src="assets/images/logo2.png" width="160px">
                </div>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <div class="container-fluid m-2">
        <div class="row">
            <nav id="sidebar" class="nav flex-column">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item text-center p-3 ">
                            <a class="nav-link" href="profile.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="ml-2">ดูข้อมูลส่วนตัว</span></a>
                        </li>
                        <li class="nav-item text-center p-2 ">
                            <a class="nav-link active" href="traditional.php">
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ml-2">ออกจากระบบ</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
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
            <div class="card container py-5 bg-light shadow rounded">

                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center py-2"><?= $row_select['p_name'] ?></h2>
                        <div class="row py-2">
                            <div class="col-12 col-lg-6">
                                <div id="full-gallery" class="content-slideshow" style="position: relative;margin: 0;top: 2px;margin-left: auto;margin-right: auto;width: 100%;height: 30rem;overflow: hidden;">
                                    <div class="mibreit-imageElement" style="opacity:0">
                                        <img src="img/<?= $row_select['picture'] ?>" data-src="img/<?= $row_select['picture'] ?>" data-title="Image 1" alt="Image 2" class="col-12" />
                                    </div>
                                    <?php if (!empty($row_select['gallery1'])) { ?>
                                        <div class="mibreit-imageElement" style="opacity:0">
                                            <img src="img/<?= $row_select['gallery1'] ?>" data-src="img/<?= $row_select['gallery1'] ?>" data-title="Image 1" alt="Image 2" class="col-12" />
                                        </div>
                                    <?php }
                                    if (!empty($row_select['gallery2'])) {
                                    ?>
                                        <div class="mibreit-imageElement" style="opacity:0">
                                            <img src="img/<?= $row_select['gallery2'] ?>" data-src="img/<?= $row_select['gallery2'] ?>" data-title="Image 1" alt="Image 2" class="col-12" />
                                        </div>
                                    <?php }
                                    if (!empty($row_select['gallery3'])) {
                                    ?>
                                        <div class="mibreit-imageElement" style="opacity:0">
                                            <img src="img/<?= $row_select['gallery3'] ?>" data-src="img/<?= $row_select['gallery3'] ?>" data-title="Image 1" alt="Image 2" class="col-12" />
                                        </div>
                                    <?php }
                                    if (!empty($row_select['gallery4'])) {
                                    ?>
                                        <div class="mibreit-imageElement" style="opacity:0">
                                            <img src="img/<?= $row_select['gallery4'] ?>" data-src="img/<?= $row_select['gallery4'] ?>" data-title="Image 1" alt="Image 2" class="col-12" />
                                        </div>
                                    <?php }
                                    if (!empty($row_select['gallery5'])) {
                                    ?>
                                        <div class="mibreit-imageElement" style="opacity:0">
                                            <img src="img/<?= $row_select['gallery5'] ?>" data-src="img/<?= $row_select['gallery5'] ?>" data-title="Image 1" alt="Image 2" class="col-12" />
                                        </div>
                                    <?php }
                                    if (!empty($row_select['gallery6'])) {
                                    ?>
                                        <div class="mibreit-imageElement" style="opacity:0">
                                            <img src="img/<?= $row_select['gallery6'] ?>" data-src="img/<?= $row_select['gallery6'] ?>" data-title="Image 1" alt="Image 2" class="col-12" />
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="mibreit-thumbview">
                                    <div class="mibreit-thumbElement">
                                        <img src="img/<?= $row_select['picture'] ?>" width="100" height="80" alt="thumbnail" />
                                    </div>
                                    <?php if (!empty($row_select['gallery1'])) { ?>
                                        <div class="mibreit-thumbElement">
                                            <img src="img/<?= $row_select['gallery1'] ?>" width="100" height="80" alt="thumbnail" />
                                        </div>
                                    <?php }
                                    if (!empty($row_select['gallery2'])) { ?>
                                        <div class="mibreit-thumbElement">
                                            <img src="img/<?= $row_select['gallery2'] ?>" width="100" height="80" alt="thumbnail" />
                                        </div>
                                    <?php }
                                    if (!empty($row_select['gallery3'])) { ?>
                                        <div class="mibreit-thumbElement">
                                            <img src="img/<?= $row_select['gallery3'] ?>" width="100" height="80" alt="thumbnail" />
                                        </div>
                                    <?php }
                                    if (!empty($row_select['gallery4'])) { ?>
                                        <div class="mibreit-thumbElement">
                                            <img src="img/<?= $row_select['gallery4'] ?>" width="100" height="80" alt="thumbnail" />
                                        </div>
                                    <?php }
                                    if (!empty($row_select['gallery5'])) { ?>
                                        <div class="mibreit-thumbElement">
                                            <img src="img/<?= $row_select['gallery5'] ?>" width="100" height="80" alt="thumbnail" />
                                        </div>
                                    <?php }
                                    if (!empty($row_select['gallery6'])) { ?>
                                        <div class="mibreit-thumbElement">
                                            <img src="img/<?= $row_select['gallery6'] ?>" width="100" height="80" alt="thumbnail" />
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <br>
                                <h5><b>ผู้โพสต์ :</b></h5>
                                <p class="ml-4"><?= $row_select['s_name'] ?></p>
                                <h5><b>ราคา :</b></h5>
                                <p class="ml-4"><?= $row_select['price'] ?> บาท</p>
                                <h5><b>รายละเอียด : </b></h5>
                                <p class="ml-4"><?= $row_select['detail'] ?></p>
                                <?php if ($row_select['status'] == 2) { ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4><span class="text-danger">***</span>หมายเหตุ<span class="text-danger">***</span></h4>
                                            <p class="ml-5"><?= $row_select['note'] ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if ($row_select['status'] == 0) { ?>
                            <div class="text-center">
                                <a href="#approve<?= $row_select['p_id'] ?>" class="btn btn-primary" data-toggle="modal">อนุมัติ</a>
                                <a href="#reject<?= $row_select['p_id'] ?>" class="btn btn-danger" data-toggle="modal">ไม่อนุมัติ</a>
                            </div>
                        <?php } ?>
                    </div>

                </div>


            </div>

            <?php
            $sql_del = "SELECT * FROM post";
            $query_del = mysqli_query($conn, $sql_del);
            while ($row = mysqli_fetch_array($query_del)) {
                $p_id = $row['id'];
            ?>
                <!--- อนุมัติ ---->
                <div class="modal fade" id="approve<?php echo $p_id ?>" tabindex="-1" role="dialog" aria-labelledby="approve" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="confirm_post.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-content">
                                <input type="hidden" value="<?= $p_id ?>" name="p_id" id="p_id">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModal">แจ้งเตือน!!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    อนุมัติโพสต์ใช่หรือไม่?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" name="confirm" class="btn btn-primary">ยืนยัน</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <?php
            }
            ?>


            <?php
            $sql_reject = "SELECT * FROM post";
            $query_reject = mysqli_query($conn, $sql_reject);
            while ($row = mysqli_fetch_array($query_reject)) {
                $p_id = $row['id']
            ?>
                <!-- ไม่อนุมัติ -->
                <div class="modal fade" id="reject<?= $p_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ไม่อนุมัติ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="reject_post.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" value="<?= $p_id ?>" name="p_id" id="p_id">
                                    <div class="form-group row">
                                        <label for="#" class="col-sm-3 col-form-label">หมายเหตุ</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" name="note" id="#" placeholder="ระบุหมายเหตุ"></textarea>
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
    </div>

    
    <footer class="bg-light text-center text-lg-start bg-white border d-block">
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="carousel-slideshow-mibreit/dist/mibreit-gallery/mibreitGallery.min.js"></script>
    <script type="text/javascript">
        function preview(src) {
            // console.log(src);
            document.getElementById('preview').src = src;
        }
        $(document).ready(function() {
            mibreitGallery.createGallery({
                slideshowContainer: "#full-gallery",
                thumbviewContainer: ".mibreit-thumbview",
                titleContainer: "#full-gallery-title",
                allowFullscreen: !0,
                preloadLeftNr: 2,
                preloadRightNr: 3
            })
        })
    </script>
</body>

</html>