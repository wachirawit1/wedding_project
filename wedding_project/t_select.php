<?php session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>

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

    <title>wedding</title>
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
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                    <a href="logout.php?logout=1" type="button" class="btn btn-danger">ยืนยัน</a>
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb -->
    <nav aria-label="breadcrumb position-static">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="mainuser.php" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="progress.php" class="text-decoration-none">progress</a></li>
            <li class="breadcrumb-item active" aria-current="page">traditional</li>
        </ol>
    </nav>



    <div class="container p-4 my-2 bg-light" id="box">

       


        <div class="row">
            <div class="col">
                <h1 class=" text-center text-secondary">โปรดเลือกประเพณี</h1>
            </div>
        </div>





        <div data-aos="fade-up">

            <?php
            include('condb.php');
            $path = "assets/tradition_img/";
            $sql = "SELECT * FROM traditional";
            $query = mysqli_query($conn, $sql);
                    
            $n = 0;
            while ($row = mysqli_fetch_array($query)) {
                if ($n == 0) {
                    echo '<div class="row mb-3" >';
                } ?>

                <div class="col-6 mt-4 mb-3">
                    <div class="card bg-white" style="width: 500px; ">
                        <form action="t_activity.php" method="POST">
                            <img class="card-img-top" src="<?php echo $path . $row['trad_img'] ?>" alt="Card image cap" style="height: 400px;">
                            <div class="card-body">
                                <h2 class="card-title font-weight-bold"><?php echo $row['trad_name'] ?></h5>
                                    <input type="hidden" name="t_id" id="" value="<?php echo $row['t_id'] ?>">
                                    <input type="hidden" name="traditional" value="<?php echo $row['trad_name'] ?>">
                                    <button type="submit" class="btn btn-primary d-block ml-auto" style="width: fit-content;">เลือก</button>
                            </div>
                        </form>
                    </div>
                </div>

            <?php $n++;
                if ($n == 2) {
                    echo "</div>";
                    $n = 0;
                }
            }
            ?>


        </div>



    </div>
    </div>















    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3 bg-white border-top">
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