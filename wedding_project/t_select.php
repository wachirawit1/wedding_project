<?php session_start();

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
    }
    ?>

    <?php include('navbaruser.php') ?>



    <!-- breadcrumb -->
    <nav aria-label="breadcrumb position-static">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="mainuser.php" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="progress.php" class="text-decoration-none">progress</a></li>
            <li class="breadcrumb-item active" aria-current="page">traditional</li>
        </ol>
    </nav>



    <div class="container p-4 my-2 shadow bg-light" id="box">




        <div class="row">
            <div class="col">
                <h2 class=" text-center text-secondary">โปรดเลือกประเพณี</h2>
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
                    <div class="card shadow bg-white" style="width: 500px; ">
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









    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</body>


</html>