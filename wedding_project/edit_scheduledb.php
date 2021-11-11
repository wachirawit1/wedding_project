<!DOCTYPE html>
<html lang="en">

<head>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding</title>


    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f0e1dc;
        }
    </style>

</head>

<body>
    <div class="container">
        <!-- อัพเดตราคาสิ่งของ -->
        <?php
        include('condb.php');
        session_start();

        $userid = $_SESSION['userid'];

        $budget = $_POST['budget'];
        $all_budget = array_sum($budget);

        $a_id = $_POST['a_id'];
        $list_id = $_POST['list_id'];

        foreach ($budget as $index => $value) {
            $a = $a_id[$index];
            $l = $list_id[$index];

            if ($value) {

                $sql = "UPDATE activity_event SET price = $value WHERE a_id = '$a' AND list_id = '$l' AND activity_event.e_id = (SELECT event.e_id FROM event WHERE event.userid =  $userid ) ";
                // echo $sql . "<br>";
                mysqli_query($conn, $sql);
            } else {
                $sql = "UPDATE activity_event SET price = $value WHERE a_id = '$a' AND list_id = '$l' AND activity_event.e_id = (SELECT event.e_id FROM event WHERE event.userid =  $userid ) ";

                mysqli_query($conn, $sql);
            }
        }
        // exit;

        //อัพเดตงบประมาณ
        $sql = "UPDATE `event` SET `total_budget`= $all_budget WHERE userid = $userid ";
        $result = mysqli_query($conn, $sql);

        if ($result) { ?>
            <div class="card box d-flex mt-5">
                <div class="card-header">แจ้งเตือน</div>
                <div class="card-body">
                    <h5 class="card-title">อัพเดต</h5>
                    <div class="alert alert-success " role="alert">
                        <p class="card-text">สำเร็จ!!</p>
                        <meta http-equiv="refresh" content="2; url=schedule.php">
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="card box d-flex mt-5">
                <div class="card-header">แจ้งเตือน</div>
                <div class="card-body">
                    <h5 class="card-title">อัพเดต</h5>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>