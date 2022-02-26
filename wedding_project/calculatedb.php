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
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Wedding Planner</title>
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f0e1dc;
        }

        .box {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: auto;
            margin-bottom: auto;
        }
    </style>

</head>

<body>


    <div class="container">


        <?php
        include 'condb.php';

        $status = 1;



        $a_id = $_POST['a_id'];
        $list_id = $_POST['list_id'];
        $t_id = $_POST['t_id'];


        // $budget = $_POST['budget'];


        $userid = $_SESSION['userid'];


        // $all_budget = array_sum($budget);

        //เพิ่มอีเว้นท์
        $sql = "INSERT INTO event (userid , t_id,status) VALUES ('$userid','$t_id',$status)";
        $result = mysqli_query($conn, $sql);


        $sql = "SELECT e_id FROM event WHERE userid = '$userid' AND status = 1 ";
        $result = mysqli_query($conn, $sql);

    


        foreach ($a_id as $index => $a) {
            $a = $a_id[$index];
            $l = $list_id[$index];


            $sql = "INSERT INTO activity_event (a_id , list_id, e_id, ae_status) 
            VALUES ( '$a' , '$l' ,  (SELECT event.e_id FROM event WHERE event.userid = $userid AND event.status = 1), 'uncheck' ) ";
            mysqli_query($conn, $sql);
        }







        if ($result) {
        ?>

            <script>
                swal({
                    title: "การแจ้งเตือน",
                    text: "สร้างงานแต่งงานสำเร็จ",
                    icon: "success",
                    button: false
                });
            </script>
            <meta http-equiv="refresh" content="2; url=progress.php">
        <?php } ?>

    </div>


</body>


</html>