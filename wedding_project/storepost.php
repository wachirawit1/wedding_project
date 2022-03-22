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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php
        $note = '';
        if (isset($_SESSION['status']) && !empty($_SESSION['status'])) {
            $sql_note = "SELECT * FROM store WHERE s_id = " . $_SESSION['s_id'] . "";
            $query_note = mysqli_query($conn, $sql_note);
            $r_note = mysqli_fetch_assoc($query_note);
            $note = $r_note['note'];
        }

        ?>
        <script>
            var status = "<?= $_SESSION['status'] ?>";
            if (status == 2) {
                var note = "<?= $note ?>";
            }

            function sweetS0() {
                Swal.fire({
                    icon: 'warning',
                    title: 'รอการตรวจสอบการอนุมัติ',
                    // text: '',
                }).then((result) => {
                    window.location = 'logout.php?logout=1'
                })
            }

            function sweetS2() {
                Swal.fire({
                    icon: 'error',
                    title: 'ไม่ได้รับการอนุมัติ',
                    text: "หมายเหตุ : " + note,
                }).then((result) => {
                    window.location = 'logout.php?logout=1'
                })
            }
        </script>
        <title>Wedding Planner</title>
        <style>
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
        } elseif ($_SESSION['status'] == 0) {
            echo '<script>';
            echo 'sweetS0();';
            echo '</script>';
            exit();
        } elseif ($_SESSION['status'] == 2) {
            echo '<script>';
            echo 'sweetS2();';
            echo '</script>';
            exit();
        }
        ?>
        <?php include('navbar_store.php') ?>


        <div class="container-fluid bg-light ">


            <div class="container">
                <div>
                    <h2 class="text-center pt-5">โพสต์ของฉัน</h2>

                    <div class="text-right">
                        <a href="create_post.php" class="btn " style="background-color: #dbb89a;color: #ffff;">สร้างโพสต์ใหม่</a>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">


                    <?php
                    $id_store = $_SESSION['s_id'];
                    $sql_select = "SELECT * FROM post WHERE id_store = '$id_store'";
                    $query_select = mysqli_query($conn, $sql_select);
                    $num = mysqli_num_rows($query_select);
                    if ($num == 0) { ?>


                        <div class="alert alert-warning d-block " role="alert">
                            <h4 class="alert-heading">แจ้งเตือน</h4>
                            <p>ร้านของคุณยังไม่มีโพสต์</p>
                            <hr>
                            <p class="mb-0">เริ่มสร้างโพสต์เลย</p>
                        </div>


                        <?php } else {
                        foreach ($query_select as $value) {
                        ?>
                            <div class="col-12 col-md-4 mb-5">
                                <div class="card h-100">
                                    <img src="img/<?= $value['picture'] ?>" class="card-img-top" height="250px" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center"><?= $value['name'] ?></h5>


                                        <?php if ($value['status'] == 1) { ?>
                                            <form action="view_storepost.php" method="POST">
                                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                <!--<a href="view_storepost.php?id=<?= $value['id'] ?>" class="btn  col-12" style="background-color: #dbb89a;">ดูโพสต์</a>-->
                                                <button type="submit" class="btn col-12" style="background-color: #dbb89a;color: #ffff;" name="btn_submit">ดูโพสต์</button>
                                            </form>
                                        <?php } elseif ($value['status'] == 2) { ?>
                                            <form action="view_storepost.php" method="POST">
                                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                <!--<a href="view_storepost.php?id=<?= $value['id'] ?>" class="btn  col-12 btn-danger">ไม่อนุมัติโพสต์</a>-->
                                                <button type="submit" class="btn col-12 btn-danger" name="btn_submit">ไม่อนุมัติโพสต์</button>
                                            </form>
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-12 col-xl-6">
                                                    <form action="view_storepost.php" method="POST">
                                                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                        <!--<a href="view_storepost.php?id=<?= $value['id'] ?>" class="btn col-12 col-md-6 btn-warning">กำลังตรวจสอบ</a>-->
                                                        <button type="submit" class="btn col-12 btn-warning" name="btn_submit">กำลังตรวจสอบ</button>
                                                    </form>
                                                </div>
                                                <div class="col-12 col-xl-6">
                                                    <form action="edit_storepost.php" method="POST">
                                                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                        <!--<a href="edit_storepost.php?id=<?= $value['id'] ?>" class="btn col-12 col-md-6 btn-secondary">แก้ไข</a>-->
                                                        <button type="submit" class="btn col-12 btn-secondary" style="width:100%;" name="btn_submit2">แก้ไข</button>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>


                </div>
            </div>
        </div>

        <footer class="footer-16371 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 text-center">
                        <div class="footer-site-logo mb-4">
                            <a href="#" style="color: #dbb89a;">Wedding Planner</a>
                        </div>
                        <ul class="list-unstyled nav-links mb-5">
                            <li><a href="about.php">About</a></li>
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
                            <p class="mb-0"><small>&copy; Wedding planner official</small></p>
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