<?php session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/80c612fc1e.js" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

        a.nav-link {
            color: grey;
        }

        a.nav-link:hover {
            color: #edab93 !important;
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ต้องการออกจากระบบ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <a href="logout.php?logout=1" type="button" class="btn btn-danger">ยืนยัน</a>
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style=" background-color: #ffffff;">
            <li class="breadcrumb-item"><a href="mainuser.php">Home</a></li>
            <li class="breadcrumb-item"><a href="progress.php">progress</a></li>
            <li class="breadcrumb-item"><a href="t_select.php">traditional</a></li>
            <li class="breadcrumb-item"><a href="t_activity.php">activity</a></li>
            <li class="breadcrumb-item active" aria-current="page">items</li>
        </ol>
    </nav>


    <form action="calculatedb.php" method="post">
        <div class="container p-4 mb-2 rounded bg-light">

            <h3 class="text-center font-weight-bold text-muted">สิ่งของภายในงาน</h3>

            <div data-aos="fade-up" style=" height: 510px; overflow-y: scroll; scrollbar-arrow-color:blue; scrollbar-face-color: #e7e7e7; scrollbar-3dlight-color: #a0a0a0; scrollbar-darkshadow-color:#888888">


                <table class="table table-light table-hover">
                    <thead style="font-size: 16px;">
                        <tr>
                            <th scope="col">#</th>
                            <!-- <th scope="col">กิจกรรม</th> -->
                            <th scope="col">ของที่ต้องใช้</th>
                            <th scope="col">จำนวน</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('condb.php');

                        $activity = $_POST['selected'];
                        $_SESSION['activity'] = $activity;
                        $t_id = $_POST['t_id'];
                        $activity = $_SESSION['activity'];
                        // print_r($_SESSION);
                        // exit();
                        $sql = "SELECT * FROM activity WHERE";
                        $isFirst = true;
                        foreach ($activity as $value) {
                            if($isFirst){
                                $sql .= " a_id='$value'";
                                $isFirst = false;
                            }else{
                                $sql .= " OR a_id='$value'";
                            }
                        }
                        $query = mysqli_query($conn, $sql);
                        // echo $sql;
                        // exit();
                        // $sql = "SELECT * FROM activity_listitem JOIN activity ON activity_listitem.a_id = activity.a_id
                        // JOIN item_list ON activity_listitem.list_id = item_list.list_id WHERE";
                        // $isFirst = true;
                        // foreach ($activity as $value) {
                        //     if ($isFirst) {
                        //         $sql .= " activity_listitem.a_id='$value'";
                        //         $isFirst = false;
                        //     } else {
                        //         $sql .= " OR activity_listitem.a_id='$value'";
                        //     }
                        // }
                        ?>
                        <?php foreach($query as $key => $value){?>
                        <tr>
                            <td colspan="4"><b><?=$value['a_name']?></b></td>
                        </tr>
                        <?php
                        // echo $sql;
                        // exit();
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
                                <td>.....</td>
                            </tr>

                            <input type="hidden" name="a_id[]" value="<?= $row['a_id'] ?>">
                            <input type="hidden" name="list_id[]" value="<?= $row['list_id'] ?>">
                            <input type="hidden" name="t_id" value="<?= $t_id ?>">
                        <?php 
                        $n++;
                        }
                        ?>
                        <?php }?>
                    </tbody>
                </table>






            </div>



        </div>
        <div class="container my-3">
            <span class="row m-2 d-flex flex-row mr-auto">

                <button type="submit" class="btn btn-primary">สร้าง</button>

            </span>
        </div>

    </form>










    <script>
        let calculate = document.getElementById('calculate');
        calculate.onclick = function calculate() {
            let item = [];
            let budget = document.getElementsByClassName('budget');
            for (let i = 0; i < budget.length; i++) {
                if (budget[i].value) {
                    item.push(budget[i].value)
                }
            }
            document.getElementById('demo').innerHTML = item.reduce(
                (sumBudget, item) => sumBudget + parseInt(item), 0
            )


        }
    </script>


    <footer class="bg-light text-center text-lg-start mt-3">
        <!-- Copyright -->
        <div class="text-center p-3">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</body>


</html>