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

        .swal-button--confirm {
            padding: 7px 19px;
            border-radius: 2px;
            background-color: #dc3546;
            font-size: 12px;
        }


        .swal-button--cancel {
            padding: 7px 19px;
            border-radius: 2px;
            font-size: 12px;
            color: #ffffff;
            background-color: grey;
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
    <?php include('navbaruser.php'); ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="progress.php">progress</a></li>
            <li class="breadcrumb-item"><a href="SendingE.php">inviting</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>

    <?php

    $userid = $_SESSION['userid'];
    $sql = "SELECT * FROM event where userid = '$userid' AND status = 1";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    ?>
    <div class="container">
        <?php
        if ($num == 0) {
            echo "ยังไม่ได้สร้างอีเวนท์";
        } else { ?>
            <div class="row my-3">
                <div class="col-4 ">


                    <input type="hidden" class="form-control" id="date" name="date" value="<?php if (isset($row['due_date'])) {
                                                                                                echo $row['due_date'];
                                                                                            } else {
                                                                                                echo "";
                                                                                            } ?>">
                    <div class="list-group shadow" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#event" role="tab" aria-controls="home">ข้อมูลพิธีการ</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#checklist" role="tab" aria-controls="profile">Check list</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#replying" role="tab" aria-controls="profile">การตอบกลับการเข้าร่วมงาน</a>
                    </div>

                </div>
                <div class="col-8 shadow">
                    <div class="">
                        <div class="tab-content" id="nav-tabContent">
                            <!-- data1 -->
                            <div class="tab-pane fade show active" id="event" role="tabpanel" aria-labelledby="list-home-list">
                                <div class="p-3">
                                    <!-- Display the countdown timer in an element -->
                                    <div class="d-flex justify-content-center">
                                        <h2>นับถอยหลังวันแต่งงาน</h2>
                                    </div>
                                    <div class="row my-3">
                                        <div id="showCountDown" class="mt-4 text-center col">
                                            <span id="days" class="bg-white border rounded text-center p-2 mx-1"></span> :
                                            <span id="hours" class="bg-white border rounded text-center p-2 mx-1"></span> :
                                            <span id="minutes" class="bg-white border rounded text-center p-2 mx-1"></span> :
                                            <span id="seconds" class="bg-white border rounded text-center p-2 mx-1"></span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center p-4">
                                        <span class="text-success" style="font-size: 19px;"><?php echo "งบประมาณที่ใช้ : " . number_format($row['total_budget'], 2) . " บาท"; ?></span>
                                    </div>

                                    <div class="row row-cols-sm-1 row-cols-md-2 justify-content-center text-center">
                                        <div class="col-md-3">
                                            <a class="btn btn-primary" href="event_detail.php" target="_blank">
                                                ดูรายละเอียดพิธีการ
                                            </a>
                                        </div>
                                        <div class="col-md-3" id="endBtn">
                                            <?php
                                            if ($row['status'] == 1) { ?>
                                                <button type="button" class="btn btn-danger" onclick="endEvent()">เสร็จสิ้นอีเวนท์</button>
                                            <?php } elseif ($row['status'] == 2) { ?>
                                                <button type="button" class="btn btn-success">เสร็จสิ้นอีเวนท์แล้ว</button>
                                            <?php } else {
                                                echo "";
                                            } ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- data2 -->
                            <div class="tab-pane fade" id="checklist" role="tabpanel" aria-labelledby="list-profile-list">
                                <div class="row justify-content-md-end m-3">
                                    <div class="col col-md-2">
                                        <a href="edit_schedule.php" class="btn btn-primary"><i class="fas fa-edit">แก้ไข</i></a>
                                    </div>
                                </div>

                                <div style=" height: 510px; overflow-y: scroll; scrollbar-arrow-color:blue; scrollbar-face-color: #e7e7e7; scrollbar-3dlight-color: #a0a0a0; scrollbar-darkshadow-color:#888888">

                                    <div class="row bg-light p-4 rounded">

                                        <div class="col">
                                            <?php
                                            $userid = $_SESSION['userid'];
                                            $sql = "SELECT * FROM `activity_event` 
                                            INNER JOIN activity ON activity_event.a_id = activity.a_id 
                                            INNER JOIN item_list ON activity_event.list_id = item_list.list_id  
                                            WHERE e_id = (SELECT e_id FROM event WHERE event.userid = $userid AND event.status=1)";
                                            $query1 = mysqli_query($conn, $sql . " GROUP BY activity_event.a_id");
                                            $row = mysqli_fetch_array($query1);


                                            ?>

                                            <table class="table  table-light table-hover ">
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
                                                <tbody>

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


                                                            <tr>
                                                                <th scope="row"><?php echo $n; ?></th>
                                                                <!-- <td><?php echo $row['a_name']; ?></td> -->
                                                                <td><?php echo $row['item_name']; ?></td>
                                                                <td><?php echo $row['amount']; ?></td>
                                                                <td><?php echo number_format($row['price'], 0); ?></td>
                                                                <td>

                                                                    <?php
                                                                    if ($row['ae_status'] == 'uncheck' || $row['ae_status'] == '') { ?>
                                                                        <button class="btn btn-danger" id="btn_status" name="<?= $row['ae_id'] ?>" onclick="changeStatus('<?= $row['ae_id'] ?>')">ยังไม่เตรียม</button>
                                                                    <?php } else { ?>
                                                                        <button class="btn btn-success" name="<?= $row['ae_id'] ?>">เตรียมแล้ว</button>
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

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- data3 -->
                            <div class="tab-pane fade" id="replying" role="tabpanel" aria-labelledby="list-profile-list">
                                <!-- การตอบกลับอีเมล -->
                                <?php
                                $userid = $_SESSION['userid'];
                                $sql = "SELECT * FROM `email_list` WHERE email_id = (SELECT email.email_id FROM email WHERE email.e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid AND event.status = 1))";
                                $query = mysqli_query($conn, $sql);
                                $num_rows = mysqli_num_rows($query);
                                $n = 1;
                                ?>
                                <div class="row p-2 align-items-center">
                                    <div class="col d-flex justify-content-start">
                                        <div class="row">
                                            <div class="col" style="color: #dbb89a;">จำนวนแขกทั้งหมด : <span id="guest">100</span> คน </div>

                                        </div>
                                    </div>
                                    <span class="col d-flex justify-content-end">

                                        <select id="myFilter" class="form-control" style="width: 9rem;">
                                            <option value="100">ทั้งหมด</option>
                                            <option value="">รอการตอบรับ</option>
                                            <option value="accept">เข้าร่วม</option>
                                            <option value="reject">ไม่เข้าร่วม</option>
                                            <option value="notsure">ไม่แน่ใจ</option>
                                        </select>

                                        <button class="btn btn-success ml-2" onclick="ExportToExcel('xlsx')">
                                            <i class="fas fa-download"></i> </i>ดาวน์โหลด
                                        </button>

                                    </span>
                                </div>
                                <div class="overflow-auto" style="height: auto;">
                                    <?php
                                    if ($num_rows == 0) { ?>
                                        <table class="table mt-1 bg-white table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">ชื่อ-นามสกุล</th>
                                                    <th scope="col">ความสัมพันธ์</th>
                                                    <th scope="col">ที่อยู่อีเมล</th>
                                                    <th scope="col">การตอบรับ</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- แจ้งเตือน -->
                                        <div class="alert alert-warning" role="alert">
                                            ดูเหมือนว่าคุณยังไม่ได้ส่งอีเมลใช่ไหม? <a href="SendingE.php" class="alert-link">กลับไปส่งอีเมลเดี๋ยวนี้</a>
                                        </div>

                                    <?php } else { ?>
                                        <table id="tbl_exporttable_to_xls " class="table mt-1 bg-white table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">ชื่อ-นามสกุล</th>
                                                    <th scope="col">ความสัมพันธ์</th>
                                                    <th scope="col">ที่อยู่อีเมล</th>
                                                    <th scope="col">การตอบรับ</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                <?php while ($row = mysqli_fetch_array($query)) { ?>
                                                    <tr>
                                                        <th scope="row"><?= $n ?></th>
                                                        <td><?= $row['e_name'] ?></td>
                                                        <td>
                                                            <?php if ($row['relation'] == "") {
                                                                echo "ไม่ระบุ";
                                                            } else {
                                                                echo $row['relation'];
                                                            } ?>
                                                        </td>
                                                        <td><?= $row['address'] ?></td>
                                                        <td class="replying">
                                                            <?php
                                                            $reply = $row['replying'];
                                                            if ($reply == "accept") {
                                                                $reply = "เข้าร่วม";
                                                                echo $reply;
                                                            } else if ($reply == "reject") {
                                                                $reply = "ไม่เข้าร่วม";
                                                                echo $reply;
                                                            } else if ($reply == "notsure") {
                                                                $reply = "ไม่แน่ใจ";
                                                                echo $reply;
                                                            } else {
                                                                $reply = "รอการตอบรับ";
                                                                echo $reply;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                <?php $n++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        <?php } ?>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // AOS.init({
        //     duration: 1000
        // });
        $(document).ready(function() {
            let replying = $('.replying');
            replying.each(function() {
                // console.log($(this).html().trim());
                if ($(this).html().trim() == "เข้าร่วม") {
                    $(this).append('<i class="bi bi-check-circle-fill"></i>')
                    $(this).attr("class", "text-success");
                } else if ($(this).html().trim() == "ไม่เข้าร่วม") {
                    $(this).append('<i class="bi bi-x-circle-fill"></i>')
                    $(this).attr("class", "text-danger");
                } else if ($(this).html().trim() == "ไม่แน่ใจ") {
                    $(this).append('<i class="bi bi-question-circle"></i>')
                    $(this).attr("class", "text-warning");
                } else {
                    $(this).append('<i class="bi bi-clock"></i>')
                    $(this).attr("class", "text-info");
                }

                var rowCount = $("#myTable tr").length;
                $('#guest').text(rowCount);
            });

            // filtering ************
            $("#myFilter").on("change", function() {
                let value = $(this).find('option').filter(':selected').val();
                $.ajax({
                    url: 'filter.php',
                    method: 'post',
                    data: {
                        value: value
                    },
                    success: function(data) {
                        // console.log(data);
                        $('.overflow-auto').html(data)
                        let replying = $('.replying');
                        replying.each(function() {
                            // console.log($(this).html().trim());
                            if ($(this).html().trim() == "เข้าร่วม") {
                                $(this).append('<i class="bi bi-check-circle-fill"></i>')
                                $(this).attr("class", "text-success");
                            } else if ($(this).html().trim() == "ไม่เข้าร่วม") {
                                $(this).append('<i class="bi bi-x-circle-fill"></i>')
                                $(this).attr("class", "text-danger");
                            } else if ($(this).html().trim() == "ไม่แน่ใจ") {
                                $(this).append('<i class="bi bi-question-circle"></i>')
                                $(this).attr("class", "text-warning");
                            } else {
                                $(this).append('<i class="bi bi-clock"></i>')
                                $(this).attr("class", "text-info");
                            }

                        });
                    },
                    error: function(data) {
                        console.log("no");
                        console.error(data);
                    }
                });
            });


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
                        document.getElementById("showCountDown").innerHTML = "<p class='text-danger'>ครบกำหนดแล้ว</p>";
                        $('#endBtn').show();
                    }
                }, 1000);
            } else if (!date.value) {

                document.getElementById('showCountDown').style.display = "none";
            }

        });



        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('tbl_exporttable_to_xls');
            var wb = XLSX.utils.table_to_book(elt, {
                sheet: "sheet1"
            });
            return dl ?
                XLSX.write(wb, {
                    bookType: type,
                    bookSST: true,
                    type: 'base64'
                }) :
                XLSX.writeFile(wb, fn || ('การตอบรับการเข้าร่วมงาน.' + (type || 'xlsx')));
        }



        function endEvent() {
            swal({
                    title: "คุณแน่ใจหรือไม่?",
                    text: "ระบบจะเก็บข้อมูลของคุณไว้ในประวัติการใช้งาน",
                    icon: "warning",
                    buttons: ["cancel", {
                        text: "OK",
                        value: "end"
                    }]
                })
                .then((value) => {
                    if (value == "end") {
                        $.ajax({
                            url: "end_event.php",
                            data: {},
                            success: function(data) {
                                swal("สำเร็จแล้ว", {
                                        icon: "success",
                                        buttons: false,
                                        timer: 2000
                                    })
                                    .then((value) => {
                                        $('#endBtn button').text("เสร็จสิ้นอีเวนท์แล้ว");
                                        $('#endBtn button').attr("class", "btn btn-success");
                                        window.location.replace("history.php    ")
                                    });

                            }

                        });

                    }
                });
        }
    </script>

</body>

</html>