<?php session_start();
include('condb.php');

//$p_id = $_GET['id'];

if (isset($_GET['id'])) {
    $p_id = $_GET['id'];
} else if (isset($_POST['p_id'])) {
    $p_id = $_POST['p_id'];
}

$sql_select = "SELECT *,post.name as p_name,post.id as p_id,post.status FROM post LEFT JOIN store ON post.u_id = store.s_id WHERE post.id = $p_id";
$query_select = mysqli_query($conn, $sql_select);
$row_select = mysqli_fetch_assoc($query_select);
?>

<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
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
    <link rel="stylesheet" href="carousel-slideshow-mibreit/dist/mibreit-gallery/css/mibreitGallery.css" />
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
      <div id="wrapper">

      <?php
    if (!isset($_SESSION['username'])) { ?>
        <div class='alert alert-danger' role='alert'>
            <h4 class='alert-heading'>??????????????????????????? !</h4>
            <p>????????????????????????????????????????????????????????????????????? ?????????????????????????????????????????????????????????????????????</p>
            <hr>
            <p class='mb-0'><a href='index.php' class='alert-link'>???????????????????????????????????????????????????</a></p>
        </div>
    <?php
        exit;
    }
    ?>

<?php 
         include('navbar_admin.php');
            ?>

            
         <div class="main">

         <?php 
         include('navbar_top.php');
            ?>
 
 <?php
    if (!isset($_SESSION['username'])) { ?>
        <div class='alert alert-danger' role='alert'>
            <h4 class='alert-heading'>??????????????????????????? !</h4>
            <p>????????????????????????????????????????????????????????????????????? ?????????????????????????????????????????????????????????????????????</p>
            <hr>
            <p class='mb-0'><a href='index.php' class='alert-link'>???????????????????????????????????????????????????</a></p>
        </div>
    <?php
        exit;
    }
    ?>
         <div class="main-content">
           
<div class="overflow-auto">
            <div class="container-fluid">

                <div class="panel">
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
                                <h5><b>???????????????????????? :</b></h5>
                                <p class="ml-4"><?= $row_select['s_name'] ?></p>
                                <h5><b>???????????? :</b></h5>
                                <p class="ml-4"><?= $row_select['price'] ?> ?????????</p>
                                <h5><b>?????????????????????????????? : </b></h5>
                                <p class="ml-4"><?= $row_select['detail'] ?></p>
                                <?php if ($row_select['status'] == 2) { ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4><span class="text-danger">***</span>????????????????????????<span class="text-danger">***</span></h4>
                                            <p class="ml-5"><?= $row_select['note'] ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if ($row_select['status'] == 0) { ?>
                            <div class="text-center">
                                <a href="#approve<?= $row_select['p_id'] ?>" class="btn btn-primary" data-toggle="modal">?????????????????????</a>
                                <a href="#reject<?= $row_select['p_id'] ?>" class="btn btn-danger" data-toggle="modal">??????????????????????????????</a>
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
                <!--- ????????????????????? ---->
                <div class="modal fade" id="approve<?php echo $p_id ?>" tabindex="-1" role="dialog" aria-labelledby="approve" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="confirm_post.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-content">
                                <input type="hidden" value="<?= $p_id ?>" name="p_id" id="p_id">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModal">???????????????????????????!!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ???????????????????????????????????????????????????????????????????
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">??????????????????</button>
                                    <button type="submit" name="confirm" class="btn btn-primary">??????????????????</button>
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
                <!-- ?????????????????????????????? -->
                <div class="modal fade" id="reject<?= $p_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">??????????????????????????????</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="reject_post.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" value="<?= $p_id ?>" name="p_id" id="p_id">
                                    <div class="form-group row">
                                        <label for="#" class="col-sm-3 col-form-label">????????????????????????</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" name="note" id="#" placeholder="????????????????????????????????????"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">??????????????????</button>
                                    <button class="btn btn-success" type="submit" class="btn btn-primary">??????????????????</button>
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
            ?? 2020 Copyright:
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

<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">???????????????????????????!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ????????????????????????????????????????????????????
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">??????????????????</button>
                    <a href="logout.php?logout=1" type="button" class="btn btn-danger">??????????????????</a>
                </div>
            </div>
        </div>
    </div>

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