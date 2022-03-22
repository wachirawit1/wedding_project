<?php session_start();
include('condb.php');
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">
<script>
    function sweet01() {
        Swal.fire({
            icon: 'success',
            title: 'ลบเรียบร้อยแล้ว',
        }).then((result) => {
            window.location = "member_store.php";
        })
    }

    function sweet02() {
        Swal.fire({
            icon: 'error',
            title: 'ลบไม่สำเร็จ',
        }).then((result) => {
            window.history.back();
        })
    }
</script>
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

<div class="main-content">
<div class="overflow-auto">


    <div class="container-fluid" id="box">
        <div class="panel">
            <div class="col d-flex justify-content-between">
                <div class="p-2">
                    <?php
                    if (isset($_POST["action"]) && $_POST["action"] == "search") {
                        echo "ผลการค้นหา : \"" . $_POST["search"] . "\"";
                        $where_condition = "WHERE cate_name LIKE '%" . $_POST["strsearch"] . "%' ";
                    } else {
                        $where_condition = "";
                    }
                    ?>
                </div>
            </div>
            <table id="datatable" class="table table-striped no-margins">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">ชื่อร้านค้า</th>
                    <th scope="col">Email</th>
                    <th scope="col">บัตรประชาชน</th>
                    <th scope="col">สถานะ</th>
                    <th>ตัวเลือก</th>
                </thead>
                <?php include('condb.php');

                if (!isset($_POST['search'])) {

                    $sql = "SELECT * FROM store  ";
                    $query = mysqli_query($conn, $sql);
                } else {

                    $sql = "SELECT * FROM store WHERE LIKE '%" . $keyword . "%'";
                    $query = mysqli_query($conn, $sql);
                }
                ?>
                <tbody>

                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_array($query)) {
                    ?>

                        <!-- <th scope="row"><?php echo $i++ ?></th> -->
                        <th class="align-middle " scope="row"><?php echo $row['s_id'] ?></th>
                        <td class="align-middle"><?php echo $row['s_name'] ?></td>
                        <td class="align-middle"><?= $row['s_email'] ?></td>
                        <td class="align-middle"><img src="assets/category_img/<?= $row['IDcard_img'] ?>" width="150px"></td>
                        <td class="align-middle">
                            <?php if ($row['status'] == 0) { ?>
                                <p class="text-warning">รอการตรวจสอบ</p>
                            <?php } elseif ($row['status'] == 1) { ?>
                                <p class="text-success">อนุมัติแล้ว</p>
                            <?php } else { ?>
                                <p class="text-danger">ไม่อนุมัติ</p>
                            <?php } ?>
                        </td>

                        <td class="align-middle">
                            <?php if ($row['status'] == 0) { ?>
                                <a href="approve_store.php?id=<?= $row['s_id'] ?>" class="btn btn-warning">ตรวจสอบ</a>
                            <?php } elseif ($row['status'] == 1) { ?>
                                <a href="approve_store.php?id=<?= $row['s_id'] ?>" class="btn btn-secondary">ดูข้อมูล</a>
                            <?php } else { ?>
                                <a href="approve_store.php?id=<?= $row['s_id'] ?>" class="btn btn-secondary">ดูข้อมูล</a>
                            <?php } ?>
                            <a href="#delete<?php echo $row['s_id']; ?>" class="btn btn-danger" data-toggle="modal">ลบ</a>
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






    <?php
    $sql_del = "SELECT * FROM store ";
    $query_del = mysqli_query($conn, $sql_del);
    while ($row = mysqli_fetch_array($query_del)) {
        $s_id = $row['s_id'];
    ?>
        <!--- ลบ ---->
        <div class="modal fade" id="delete<?php echo $s_id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal">แจ้งเตือน!!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            ต้องการลบ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                            <a href="?del=<?= $s_id ?>" type="submit" class="btn btn-primary">ยืนยัน</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
    </div>





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
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
   </body>
</html>