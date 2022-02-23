<?php session_start();
include('condb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

        #showCountDown {
            font-size: 30px;
        }

        a.nav-link {
            color: grey;
        }


        a.nav-link:hover {
            color: #dbb89a !important;
        }

        #saveEmail,
        #sendEmail {
            background-color: #dbb89a;
            color: white;
        }
    </style>
</head>

<body>


    <?php
    $userid = $_SESSION['userid'];
    $traditional = "SELECT traditional.trad_name , traditional.trad_img FROM event JOIN traditional ON event.t_id = traditional.t_id 
        WHERE event.userid = $userid AND event.status=1";
    $query = mysqli_query($conn, $traditional);
    $t_row = mysqli_fetch_row($query);
    ?>
    <div class="container-fluid text-center p-3">
        <img class="img-fluid" src="assets/tradition_img/<?= $t_row[1] ?>" alt="">
    </div>
    <div class="container">
        <h1><?= $t_row[0] ?></h1>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 my-3">
            <?php
            $sql = "SELECT * FROM `activity_event` 
        INNER JOIN activity ON activity_event.a_id = activity.a_id 
        WHERE e_id = (SELECT e_id FROM event WHERE event.userid = $userid AND event.status = 1 )
        GROUP BY activity.a_id";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
                <div class="col mt-3" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card" style="border-color: #dbb89a;">
                        <div class="card-header text-center" style="border-color: #dbb89a; background-color: #dbb89a;color: #ffffff;">
                            <?= $row['a_name'] ?>
                        </div>
                        <div class="card-body">
                            <?php
                            for ($i = 0; $i <= sizeof(explode("-", $row['a_detail'])); $i++) {
                                if (explode("-", $row['a_detail'])[$i] == "") {
                                    echo "";
                                } else {
                                    echo "- " . explode("-", $row['a_detail'])[$i] . "<br>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();


    </script>
</body>


</html>