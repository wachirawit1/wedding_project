
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
<div class="main-content">
<div class="overflow-auto">


    <div class="container-fluid" id="box">

    <div class="panel">

    
        <table id="datatable" class="table table-striped no-margins">
            <thead>
                <th scope="col">#</th>
                <th scope="col">หัวข้อโพสต์</th>
                <th scope="col">ผู้โพสต์</th>
                <th scope="col">รูปภาพ</th>
                <th scope="col">ตัวเลือก</th>
            </thead>
            <?php include('condb.php');

            if (!isset($_POST['search'])) {

                $sql = "SELECT *,post.name as p_name,post.id as p_id,post.status FROM post LEFT JOIN store ON post.u_id = store.s_id ORDER BY post.id DESC";
                $query = mysqli_query($conn, $sql);
            } else {

                $sql = "SELECT *,post.name as p_name,post.id as p_id,post.status FROM post , store where post.u_id = store.s_id and store.s_name LIKE '%" . $keyword . "%' ORDER BY post.id DESC";
                $query = mysqli_query($conn, $sql);
            }
            ?>
            <tbody>

                <?php
                $i = 1;
                while ($row = mysqli_fetch_array($query)) {
                ?>


                    <!-- <th scope="row"><?php echo $i++ ?></th> -->
                    <tr>
                        <th class="align-middle " scope="row"><?php echo $row['p_id'] ?></th>
                        <td class="align-middle"><?php echo $row['p_name'] ?></td>
                        <td class="align-middle"><?php echo $row['s_name'] ?></td>
                        <td class="align-middle"><img src="img/<?= $row['picture'] ?>" width="150px"></td>
                        <td class="align-middle">
                            <form action="approve_post.php" method="POST" style="display: inline-block;">
                                <input type="hidden" name="p_id" value="<?= $row['p_id'] ?>">
                                <?php if ($row['status'] == 0) { ?>
                                    <button type="submit" class="btn btn-warning" name="btn_submit">ตรวจสอบ</button>
                                <?php } elseif ($row['status'] == 1) { ?>
                                    <button type="submit" class="btn btn-success" name="btn_submit">อนุมัติแล้ว</button>
                                <?php } else { ?>
                                    <!--<a href="approve_post.php?id=<?= $row['p_id'] ?>" class="btn btn-secondary">ไม่อนุมัติ</a>-->
                                    <button type="submit" class="btn btn-secondary" name="btn_submit">ไม่อนุมัติ</button>
                                <?php } ?>
                            </form>
                            <a href="#delete<?php echo $row['p_id']; ?>" class="btn btn-danger" data-toggle="modal">ลบ</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>

    </div>

    </div>

    </div>


    <?php
    $sql_del = "SELECT * FROM post";
    $query_del = mysqli_query($conn, $sql_del);
    while ($row = mysqli_fetch_array($query_del)) {
        $p_id = $row['id'];
    ?>
        <!--- ลบ ---->
        <div class="modal fade" id="delete<?php echo $p_id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
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
                        <a href="admin_post_del.php?id=<?php echo $p_id ?>" type="button" class="btn btn-primary">ยืนยัน</a>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
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
    $sql_del = "SELECT * FROM traditional";
    $query_del = mysqli_query($conn, $sql_del);
    while ($row = mysqli_fetch_array($query_del)) {
        $t_id = $row['t_id'];
    ?>
        <script type="text/javascript">
            function readURL<?php echo $t_id ?>(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah<?php echo $t_id; ?>').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    <?php } ?>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    </form>



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