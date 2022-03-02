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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap CSS -->
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
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="progress.php">progress</a></li>
            <li class="breadcrumb-item"><a href="schedule.php">schedule</a></li>
            <li class="breadcrumb-item active" aria-current="page">edit budget</li>
        </ol>
    </nav>
    <?php

    $userid = $_SESSION['userid'];
    $sql = "SELECT * FROM event where userid = '$userid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    ?>

    <div class="container p-4 mb-4 shadow bg-light rounded">

        <h2 class="text-center text-secondary">แก้ไขงบประมาณ</h2>



        <div class="overflow-auto" style=" height: 500px;">
            <?php
            $userid = $_SESSION['userid'];
            $sql = "SELECT * FROM `activity_event` 
            INNER JOIN activity ON activity_event.a_id = activity.a_id 
            INNER JOIN item_list ON activity_event.list_id = item_list.list_id  
            WHERE e_id = (SELECT e_id FROM event WHERE event.userid = $userid AND event.status=1)
                    ";

            $query1 = mysqli_query($conn, $sql . " GROUP BY activity_event.a_id");
            $row = mysqli_fetch_array($query1);

            ?>

            <form action="edit_scheduledb.php" method="post">
                <table class="table table-light table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <!-- <th scope="col">กิจกรรม</th> -->
                            <th scope="col">อุปกรณ์</th>
                            <th scope="col">งบประมาณ</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($query1 as $key => $value) {
                        ?>
                            <tr>
                                <td colspan="4" class="text-center" style="background-color: #dbb89a; color:white ;"><?php echo $value['a_name']; ?></td>
                            </tr>
                            <?php
                            $a_id = $value['a_id'];
                            $query = mysqli_query($conn, $sql . " AND activity_event.a_id='$a_id'");

                            $n = 1;
                            $budget = 0;
                            foreach ($query as $row) {
                            ?>

                                <tr>
                                    <th scope="row"><?php echo $n; ?></th>
                                    <!-- <td><?php echo $row['a_name']; ?></td> -->
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><input type="number" class="budget" name="budget[]" id="" value="<?php echo $row['price']; ?>" placeholder="<?php echo $row['price']; ?>"></td>
                                </tr>
                                <input type="hidden" name="a_id[]" value="<?= $row['a_id'] ?>">
                                <input type="hidden" name="list_id[]" value="<?= $row['list_id'] ?>">

                        <?php $n++;
                            }
                        }
                        ?>
                    </tbody>
                </table>


        </div>

        <div class="row my-4 justify-content-md-center">
            <div class="col">
                <button type="button" class="btn btn-primary" id="calculate">คำนวณ</button>
            </div>
            <div class="col-md-5">
                งบประมาณที่ใช้
            </div>
            <div class="col-md-4 text-success" id="demo">
                <?php

                $sql = "SELECT total_budget FROM event WHERE userid = $userid ";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                echo "฿" . number_format($row['total_budget'], 2);

                ?>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success" id="calculate">ยืนยัน</button>
            </div>
        </div>
        </form>
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

        let calculate = document.getElementById('calculate');
        calculate.onclick = function calculate() {
            let item = [];
            let budget = document.getElementsByClassName('budget');
            for (let i = 0; i < budget.length; i++) {
                if (budget[i].value) {
                    item.push(budget[i].value)
                }
            }
            document.getElementById('demo').innerHTML = new Intl.NumberFormat('th-TH', {
                style: 'currency',
                currency: 'THB'
            }).format(item.reduce(
                (sumBudget, item) => sumBudget + parseFloat(item), 0));


        }
    </script>
</body>


</html>