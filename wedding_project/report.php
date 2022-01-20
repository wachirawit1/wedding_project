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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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

        #saveEmail,
        #sendEmail {
            background-color: #dbb89a;
            color: white;
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
    <?php include('navbaruser.php'); ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="mainuser.php">Home</a></li>
            <li class="breadcrumb-item"><a href="progress.php">progress</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>


    <div class="container">
        <div class="row mt-3">
            <div class="col-4 ">
                <?php

                $userid = $_SESSION['userid'];
                $sql = "SELECT * FROM event where userid = '$userid'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

                ?>

                <input type="hidden" class="form-control" id="date" name="date" value="<?php if (isset($row['due_date'])) {
                                                                                            echo $row['due_date'];
                                                                                        } else {
                                                                                            echo "";
                                                                                        } ?>">
                <div class="list-group shadow" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">ข้อมูล</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">อุปกรณ์</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">การตอบรับการเข้าร่วมงาน</a>
                </div>

            </div>
            <div class="col-8 shadow">
                <div class="">
                    <div class="tab-content" id="nav-tabContent">
                        <!-- data1 -->
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <!-- Display the countdown timer in an element -->
                            <div class="d-flex justify-content-center mt-3">
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

                        </div>
                        <!-- data2 -->
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
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
                                        INNER JOIN event ON activity_event.e_id = event.e_id
                                        WHERE activity_event.e_id = (SELECT e_id FROM event WHERE event.userid = $userid )
                                        AND event.status = 1  ";
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
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                            <?php
                            $userid = $_SESSION['userid'];
                            $sql = "SELECT * FROM `email_list` WHERE email_id = (SELECT email.email_id FROM email WHERE email.e_id = (SELECT event.e_id FROM event WHERE event.userid = $userid))";
                            $query = mysqli_query($conn, $sql);
                            $num_rows = mysqli_num_rows($query);
                            $n = 1;
                            ?>

                            <div class="py-2 d-flex justify-content-end">

                                <select id="myFilter" class="form-control" style="width: 9rem;">
                                    <option value="">ทั้งหมด</option>
                                    <option value="รอการตอบรับ">รอการตอบรับ</option>
                                    <option value="เข้าร่วม">เข้าร่วม</option>
                                    <option value="ไม่เข้าร่วม">ไม่เข้าร่วม</option>
                                    <option value="ไม่แน่ใจ">ไม่แน่ใจ</option>
                                </select>
                                <button class="btn btn-success ml-2" onclick="ExportToExcel('xlsx')">
                                    <i class="bi bi-file-earmark-excel"></i>ดาวน์โหลด
                                </button>

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
                                        ดูเหมือนว่าคุณยังไม่ได้ส่งอีเมบใช่ไหม? <a href="SendingE.php" class="alert-link">กลับไปส่งอีเมลเดี๋ยวนี้</a>
                                    </div>

                                <?php } else { ?>
                                    <table id="tbl_exporttable_to_xls" class="table mt-1 bg-white table-hover">
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

    </div>





    <!-- <footer class="bg-light text-center text-lg-start " > 
        
        <div class="text-center p-3 border-top bg-white">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        
    </footer>  -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        // AOS.init({
        //     duration: 1000
        // });
        $(document).ready(function() {
            let replying = $('.replying');
            replying.each(function() {
                console.log($(this).html().trim());
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

            $("#myFilter").on("change", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });


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
        } else if (!date.value) {

            document.getElementById('showCountDown').style.display = "none";
        }
    </script>

</body>

</html>