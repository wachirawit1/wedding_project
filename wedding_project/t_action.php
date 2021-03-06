<?php session_start();
include('condb.php');
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<body>
    <div id="wrapper">

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

        <?php
        include('navbar_admin.php');
        ?>


        <div class="main">

            <?php
            include('navbar_top.php');
            ?>

            <?php
            $t_id = $_GET['t_id'];
            $keyword = null;
            if (isset($_POST['search'])) {
                $keyword = $_POST['search'];
            }

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


            <!-- breadcrumb -->

            <div class="main-content">


                <div class="overflow-auto">


                    <div class="container-fluid" id="box">
                        <div class="panel ">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb" style=" background-color: #ffffff;">
                                    <li class="breadcrumb-item"><a href="traditional.php">traditional</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">action</li>
                                </ol>
                            </nav>
                            <div class=" d-flex justify-content-between">
                                <div class="p-2">
                                    <?php
                                    if (isset($_POST["action"]) && $_POST["action"] == "search") {
                                        echo "ผลการค้นหา : \"" . $_POST["search"] . "\"";
                                        $where_condition = "WHERE a_name LIKE '%" . $_POST["strsearch"] . "%' ";
                                    } else {
                                        $where_condition = "";
                                    }
                                    ?>
                                </div>

                                <div class=" panel-heading">
                                    <!-- <div class="row"> -->
                                    <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal">
                                        เพิ่มพิธีการ
                                    </button>
                                    <a href="item.php?t_id=<?= $t_id ?>" class="btn btn-success" name="button" id="button">เพิ่มอุปกรณ์</a>
                                </div>
                            </div>
                            <!-- Table -->
                            <table id="datatable" class="table table-striped no-margins
">
                                <thead>
                                    <th>รหัส</th>
                                    <th style="width: 200px;">พิธีการ</th>
                                    <th>รายละเอียด</th>
                                    <th>อุปกรณ์</th>
                                    <th>ตัวเลือก</th>
                                </thead>
                                <?php include('condb.php');
                                //$t_id = $_GET['t_id'];

                                if (isset($_GET['t_id'])) {
                                    $t_id = $_GET['t_id'];
                                } else if (isset($_POST['t_id'])) {
                                    $t_id = $_POST['t_id'];
                                }


                                if (!isset($_POST['search'])) {

                                    $sql = "SELECT * FROM activity WHERE t_id = $t_id ORDER BY a_id DESC";
                                    $query = mysqli_query($conn, $sql);
                                } else {

                                    $sql = "SELECT * FROM activity WHERE t_id = $t_id and a_name LIKE '%" . $keyword . "%' ORDER BY a_id DESC";
                                    $query = mysqli_query($conn, $sql);
                                }
                                ?>
                                <tbody style="font-size: 14px;">

                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>


                                        <!-- <th scope="row"><?php echo $i++ ?></th> -->
                                        <th class="align-baseline " scope="row"><?php echo $row['a_id'] ?></th>
                                        <td class="align-baseline"><?php echo $row['a_name'] ?></td>
                                        <td class="align-baseline" style="width: 30rem;">
                                            <?php echo $row['a_detail'] ?>
                                        </td>
                                        <td class="align-baseline">
                                            <?php
                                            $sql_listitem = "SELECT * FROM activity_listitem LEFT JOIN item_list ON activity_listitem.list_id = item_list.list_id WHERE a_id = '" . $row['a_id'] . "'";
                                            $query_listitem = mysqli_query($conn, $sql_listitem);
                                            $num = 1;
                                            foreach ($query_listitem as $value_item) {
                                                echo $num++, '.', $value_item['item_name'];
                                                echo "<br>";
                                            }
                                            ?>
                                        </td>
                                        <td class="align-baseline" style="width: 10rem;">

                                            <a href="#edit<?= $row['a_id'] ?>" class="btn btn-warning" data-toggle="modal">แก้ไข</a>



                                            <a href="#delete<?php echo $row['a_id']; ?>" class="btn btn-danger" data-toggle="modal">ลบ</a>


                                        </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>

            </div>
            <!-- Modal -->
            <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                            <a href="logout.php?logout=1" type="button" class="btn btn-danger">ยืนยัน</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- popup เพิ่มพิธีการ -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลพิธีการ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="t_add.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="t_id" value="<?= $_GET['t_id'] ?>">
                                <div class="form-group row">
                                    <label for="#" class="col-sm-3 col-form-label">ชื่อพิธีการ</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="a_name" id="#" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="#" class="col-sm-3 col-form-label">รายละเอียดพิธีการ</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" rows="15" name="a_detail" id="#" placeholder=""></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mr-1">
                                    <label for="#" class="col-sm-3 col-form-label">อุปกรณ์</label>
                                    <div class="col-sm-9 overflow-auto" style="height: 18rem;">
                                        <?php
                                        $sql_item = "SELECT * FROM item_list WHERE t_id = $t_id";
                                        $query_item = mysqli_query($conn, $sql_item);
                                        foreach ($query_item as $value2) {
                                        ?>
                                            <div class="form-check ">
                                                <input class="form-check-input" type="checkbox" name="item_list[]" value="<?= $value2['list_id'] ?>">
                                                <label class="form-check-label">
                                                    <?= $value2['item_name'] ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                <button class="btn btn-success" type="submit" class="btn btn-primary">เพิ่ม</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!----ลบ---->
            <?php
            $sql_del = "SELECT * FROM activity";
            $query_del = mysqli_query($conn, $sql_del);
            while ($row = mysqli_fetch_array($query_del)) {
                $a_id = $row['a_id'];
            ?>
                <div class="modal fade" id="delete<?php echo $a_id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModal">แจ้งเตือน!!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                ต้องการลบ?
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <a href="t_del.php?id=<?php echo $a_id ?>&t_id=<?= $_GET['t_id'] ?>" type="button" class="btn btn-primary">ยืนยัน</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>


            <?php
            $sql_edit = "SELECT * FROM activity";
            $query_edit = mysqli_query($conn, $sql_edit);
            while ($row = mysqli_fetch_array($query_edit)) {
                $a_id = $row['a_id']
            ?>
                <!-- แก้ไข -->
                <div class="modal fade" id="edit<?= $a_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <input type="hidden" name="t_id" value="<?= $_GET['t_id'] ?>">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="t_edit.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" value="<?= $a_id ?>" name="a_id">
                                    <div class="form-group row">
                                        <input type="hidden" name="t_id" value="<?= $_GET['t_id'] ?>">
                                        <label for="#" class="col-sm-3 col-form-label">ชื่อพิธีการ</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="a_name" id="#" value="<?= $row['a_name'] ?>" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="#" class="col-sm-3 col-form-label">รายละเอียดพิธีการ</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" name="a_detail" id="#" placeholder=""><?= $row['a_detail'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mr-1">
                                        <label for="#" class="col-sm-3 col-form-label">อุปกรณ์</label>
                                        <div class="col-sm-9 overflow-auto" style="height: 18rem;">
                                            <?php
                                            $sql_item = "SELECT * FROM item_list WHERE t_id = $t_id";
                                            $query_item = mysqli_query($conn, $sql_item);
                                            $sql_check = "SELECT * FROM activity_listitem WHERE a_id = '" . $row['a_id'] . "'";
                                            $query_check = mysqli_query($conn, $sql_check);
                                            foreach ($query_item as $value2) {
                                            ?>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="checkbox" name="item_list[]" value="<?= $value2['list_id'] ?>" <?php
                                                                                                                                                            foreach ($query_check as $check) {
                                                                                                                                                                if ($check['list_id'] == $value2['list_id']) {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                }
                                                                                                                                                            }
                                                                                                                                                            ?>>
                                                    <label class="form-check-label">
                                                        <?= $value2['item_name'] ?>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                    <button class="btn btn-success" type="submit" class="btn btn-primary">ยืนยัน</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>












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
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>