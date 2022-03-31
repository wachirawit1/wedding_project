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

        .mybtn {
            border-color: #dbb89a;
            background-color: #dbb89a;
            color: #ffffff;
        }

        .mybtn:hover {
            border-color: #c5a58a;
            background-color: #c5a58a;
            color: #ffffff;
        }
    </style>

</head>


<body>


    <?php include('navbaruser.php'); ?>

    

    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="progress.php">progress</a></li>
            <li class="breadcrumb-item"><a href="t_select.php">traditional</a></li>
            <li class="breadcrumb-item"><a href="t_activity.php">activity</a></li>
            <li class="breadcrumb-item active" aria-current="page">items</li>
        </ol>
    </nav>


    <form action="calculatedb.php" method="post">
        <div class="container p-4 my-3 rounded bg-light shadow">

            <h3 class="text-center font-weight-bold text-muted">การเตรียมตัวภายในงาน</h3>

            <div data-aos="fade-up" style=" height: 510px; overflow-y: scroll; scrollbar-arrow-color:blue; scrollbar-face-color: #e7e7e7; scrollbar-3dlight-color: #a0a0a0; scrollbar-darkshadow-color:#888888">


                <table class="table table-light table-hover">
                    <thead class="thead-light" style="font-size: 16px;">
                        <tr>
                            <th scope="col">#</th>
                            <!-- <th scope="col">กิจกรรม</th> -->
                            <th scope="col">อุปกรณ์</th>
                            <th scope="col">จำนวน</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('condb.php');

                        $activity = $_POST['selected'];
                        $t_id = $_POST['t_id'];
                        $sql = "SELECT * FROM activity WHERE";
                        $isFirst = true;
                        foreach ($activity as $value) {
                            if ($isFirst) {
                                $sql .= " a_id='$value'";
                                $isFirst = false;
                            } else {
                                $sql .= " OR a_id='$value'";
                            }
                        }

                        $query = mysqli_query($conn, $sql);

                        foreach ($query as $key => $value) { ?>
                            <tr>
                                <td colspan="5" class="text-center" style="background-color: #dbb89a; color:white ;">
                                    <b><?= $value['a_name'] ?></b>
                                </td>
                            </tr>
                            <?php
                            $a_id = $value['a_id'];
                            $sql = "SELECT * FROM activity_listitem LEFT JOIN item_list ON activity_listitem.list_id = item_list.list_id WHERE activity_listitem.a_id = '$a_id'";
                            $query = mysqli_query($conn, $sql);
                            $n = 1;
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $n; ?></th>
                                    <!-- <td><?php echo $row['a_name']; ?></td> -->
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                </tr>
                                <input type="hidden" name="a_id[]" value="<?= $row['a_id'] ?>">
                                <input type="hidden" name="list_id[]" value="<?= $row['list_id'] ?>">
                                <input type="hidden" name="t_id" value="<?= $t_id ?>">
                            <?php
                                $n++;
                            }
                            ?>
                        <?php } ?>
                    </tbody>
                </table>


            </div>

            <div class="row justify-content-end my-3">
                <div class="col col-1">
                    <button type="submit" class="btn mybtn">สร้าง</button>
                </div>
            </div>
        </div>

    </form>










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