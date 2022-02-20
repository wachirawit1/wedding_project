<!doctype html>
<html lang="en">

<head>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

    <!-- effect -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- icon -->
    <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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

        .jumbotron {
            background-color: white;

        }

        a.nav-link:hover {
            color: #dbb89a !important;
        }

        .nav-item .btn {
            border: 1px solid grey;
        }

    </style>

</head>


<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        session_destroy();
        include('navbar.php');
    } else {
        include('navbaruser.php');
    }
    ?>


    <div class="container">
        <div class="py-5">

            <?php $category = $_GET['cate_name']; ?>
            <div class="my-3 text-center">
                <h2 class="text-secondary">หมวด <?= "$category" ?></h2>
            </div>

            <?php
            $cate_id = $_GET['cate_id'];
            include('condb.php');
            $sql = "SELECT * FROM `post` INNER JOIN store ON post.u_id = store.s_id WHERE store.cate_id = $cate_id AND post.status = 1;";
            $query = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($query);
            if ($num == 0) { ?>
                <div class="my-3 py-5 text-center">
                    <i class="fas fa-times-circle fa-10x text-muted"></i>
                </div>
            <?php } else { ?>
                <div class="row row-cols-1 row-cols-md-3 ">

                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                        <form action="view_post.php" method="POST">
                            <div data-aos="zoom-in" data-aos-duration="800">
                                <div class="col mb-4 ">
                                    <div class="card">
                                        <img src="img/<?= $row['picture'] ?>" class="card-img-top img-responsive" alt="..." height="125">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $row['name'] ?></h5>
                                            <p class="card-text">
                                                <?= $row['detail'] ?>
                                            </p>
                                        </div>
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="text-center p-2">
                                            <button type="submit" class="btn btn-block" style="background-color: #dbb89a ;color:white;" name="btn_submit">ดูโพสต์</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                <?php }
                } ?>



                </div>

        </div>
    </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>

</body>



</html>