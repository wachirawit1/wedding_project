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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>wedding</title>
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


    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="mainuser.php">Home</a></li>
            <li class="breadcrumb-item"><a href="progress.php">progress</a></li>
            <li class="breadcrumb-item active" aria-current="page">select traditional</li>
        </ol>
    </nav>

    <?php

    $userid = $_SESSION['userid'];
    $sql = "SELECT * FROM event where userid = '$userid' AND status = 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    ?>

    <div class="container p-4 mb-4 mt-3 rounded bg-light shadow" id="box">

        <h2 class="text-center text-secondary ">สร้างกำหนดการ</h2>

        <div class="row my-3">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h5>เช็คลิสต์</h5>
                        <p class="text-secondary" id="text-progress"></p>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-5">
                        <div class="w3-light-grey w3-round-xlarge my-3">
                            <div class="w3-container w3-green w3-round-xlarge" id="progress" style="width:25%">25%</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <form action="scheduledb.php" method="POST">
            <div class="form-group row">

                <label for="date" class="col-sm-2 col-form-label text-danger">กำหนดวันแต่งงาน</label>
                <div class="col-sm-8">
                    <input type="date" class="count form-control" id="date" name="date" value="<?php if (isset($row['due_date'])) {
                                                                                                    echo $row['due_date'];
                                                                                                } else {
                                                                                                    echo "";
                                                                                                } ?>">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                </div>
            </div>
        </form>

        <!-- Display the countdown timer in an element -->
        <div class="row my-3">
            <div id="showCountDown" class="mt-4 text-center col">
                <span id="days" class="bg-white border rounded text-center p-2 mx-1"></span> :
                <span id="hours" class="bg-white border rounded text-center p-2 mx-1"></span> :
                <span id="minutes" class="bg-white border rounded text-center p-2 mx-1"></span> :
                <span id="seconds" class="bg-white border rounded text-center p-2 mx-1"></span>
            </div>
        </div>


        <div class="row my-4 ">
            <div class="col-md-5 bold font-weight-bold">
                งบประมาณที่ใช้
            </div>
            <div class="col-md-4 text-success">
                <?php

                $sql = "SELECT total_budget FROM event WHERE userid = $userid AND status = 1";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                echo "฿" . number_format($row['total_budget'], 2);

                ?>
            </div>
        </div>

        <div class="row justify-content-md-end my-3">
            <div class="col col-2">
                <select id="myFilter" class="form-control">
                    <option value="">ทั้งหมด</option>
                    <option value="เตรียมแล้ว">เตรียมแล้ว</option>
                    <option value="ยังไม่เตรียม">ยังไม่เตรียม</option>
                </select>
            </div>
            <div class="col col-md-1">
                <a href="edit_schedule.php" class="btn btn-primary"><i class="fas fa-edit">แก้ไข</i></a>
            </div>
            <div class="col col-md-1">
                <button class="btn btn-success">สำเร็จ</button>
            </div>
        </div>

        <div class="overflow-auto" style=" height: 500px; ">

            <?php
            $userid = $_SESSION['userid'];
            $sql = "SELECT * FROM `activity_event` 
            INNER JOIN activity ON activity_event.a_id = activity.a_id 
            INNER JOIN item_list ON activity_event.list_id = item_list.list_id 
            INNER JOIN event ON activity_event.e_id = event.e_id
            WHERE activity_event.e_id = (SELECT e_id FROM event WHERE event.userid = $userid )
            AND event.status = 1  ";
            $query1 = mysqli_query($conn, $sql . " GROUP BY activity_event.a_id");
            $row = mysqli_fetch_array($query1);

            if (!isset($row)) { ?>
                <div>
                    <h3 class="display-4 text-center text-secondary">ยังไม่มีข้อมูล</h3>
                </div>
            <?php } else {

            ?>

                <table class="table table-light table-hover ">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <!-- <th scope="col">กิจกรรม</th> -->
                            <th scope="col">อุปกรณ์</th>
                            <th scope="col">จำนวน</th>
                            <th scope="col">ราคา</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="myTable">

                        <?php
                        foreach ($query1 as $key => $value) {
                        ?>
                            <tr>
                                <td colspan="5" class="text-center" style="background-color: #dbb89a; color:white ;"><?php echo $value['a_name']; ?></td>
                            </tr>
                            <?php
                            $a_id = $value['a_id'];
                            $query = mysqli_query($conn, $sql . " AND activity_event.a_id='$a_id'");

                            $n = 1;
                            $budget = 0;
                            foreach ($query as $row) {
                            ?>


                                <tr class="count">
                                    <th scope="row"><?php echo $n; ?></th>
                                    <!-- <td><?php echo $row['a_name']; ?></td> -->
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td><?php echo number_format($row['price'], 0); ?></td>
                                    <td class="text-center">

                                        <?php
                                        if ($row['ae_status'] == 'uncheck' || $row['status'] == '') { ?>
                                            <button class="btn btn-danger" id="btn_status" name="<?= $row['ae_id'] ?>" onclick="changeStatus('<?= $row['ae_id'] ?>')">ยังไม่เตรียม</button>
                                        <?php } else { ?>
                                            <button class="task btn btn-success" name="<?= $row['ae_id'] ?>">เตรียมแล้ว</button>
                                        <?php } ?>


                                    </td>
                                    <input type="hidden" name="id" id="id" value="<?= $row['ae_id'] ?>">
                                </tr>



                        <?php $n++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            <?php } ?>

        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script>
        let count = $(".count").length;
        let task = $(".task").length;

        console.log(count);
        console.log(task);
        $(document).ready(function() {

            // tasking progress
            let totalCount = task / count * 100;
            let toPercent = parseInt(totalCount) + "%";

            $("#text-progress").html("เตรียมงานไปแล้ว(" + task + "จาก" + count + ")");
            $("#progress").attr("style", "width:" + toPercent);
            $("#progress").html(toPercent);

            // filter
            $("#myFilter").on("change", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });



        });

        function changeStatus(uid) {

            document.getElementsByName(uid)[0].className = "btn btn-success";
            document.getElementsByName(uid)[0].innerHTML = "เตรียมแล้ว";


            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    swal({
                        title: "การแจ้งเตือน",
                        text: "อัปเดตข้อมูลแล้ว",
                        icon: "success",
                        button: "ตกลง"
                    });

                    task++; //checklist

                    let totalCount = task / count * 100;
                    let toPercent = parseInt(totalCount) + "%";

                    $("#text-progress").html("เตรียมงานไปแล้ว(" + task + "จาก" + count + ")");
                    $("#progress").attr("style", "width:" + toPercent);
                    $("#progress").html(toPercent);
                }
            }
            var params = 'id=' + uid;
            xhttp.open("POST", "status_db.php", true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send(params);
        }


        let date = document.getElementById('date');
        let days = document.getElementById('days');
        let hours = document.getElementById('hours')
        let minutes = document.getElementById('minutes');
        let seconds = document.getElementById('seconds');
        if (date.value) {


            // Set the date we're counting down to
            var countDownDate = new Date(date.value).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                document.getElementById("days").innerHTML = days + " วัน ";
                document.getElementById("hours").innerHTML = hours + " ชั่วโมง ";
                document.getElementById("minutes").innerHTML = minutes + " นาที ";
                document.getElementById("seconds").innerHTML = seconds + " วินาที ";

                if (!countDownDate) {
                    document.getElementById("showCountDown").innerHTML = "ยังไม่กำหนด";
                }

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("showCountDown").innerHTML = "ครบกำหนด";
                }
            }, 1000);

            task++;

            let totalCount = task / count * 100;
            let toPercent = parseInt(totalCount) + "%";

            $("#text-progress").html("เตรียมงานไปแล้ว(" + task + "จาก" + count + ")");
            $("#progress").attr("style", "width:" + toPercent);
            $("#progress").html(toPercent);

        } else if (!date.value) {

            document.getElementById('showCountDown').style.display = "none";
        }
    </script>





















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>


</html>