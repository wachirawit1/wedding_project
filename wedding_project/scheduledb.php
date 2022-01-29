<!DOCTYPE html>
<html lang="en">

<head>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f0e1dc;
        }
    </style>

</head>

<body>
    <div class="container">
        <?php
        include('condb.php');
        session_start();

        $userid = $_SESSION['userid'];
        $date = $_POST['date'];

        $sql = "UPDATE `event` SET `due_date`= '$date' WHERE userid = $userid AND status = 1";
        $result = mysqli_query($conn, $sql);

        if ($result) { ?>
            <!-- <div class="card box d-flex mt-5">
                <div class="card-header">แจ้งเตือน</div>
                <div class="card-body">
                    <h5 class="card-title">กำหนดวันที่จัดงาน</h5>
                    <div class="alert alert-success " role="alert">
                        <p class="card-text">สำเร็จ!!</p>
                    </div>
                </div>
            </div> -->
            <script>
                swal({
                    title: "การแจ้งเตือน",
                    text: "อัปเดตข้อมูลสำเร็จ",
                    icon: "success",
                    button: false
                });
            </script>
            <meta http-equiv="refresh" content="2; url=schedule.php">
        <?php } else { ?>
            <div class="card box d-flex mt-5">
                <div class="card-header">แจ้งเตือน</div>
                <div class="card-body">
                    <h5 class="card-title">กำหนดวันที่จัดงาน</h5>
                    <div class="alert alert-danger " role="alert">
                        <p class="card-text">ไม่สำเร็จ!!!!</p>
                        <meta http-equiv="refresh" content="2; url=schedule.php">
                    </div>
                </div>
            </div>
        <?php }
        ?>


    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

</body>

</html>