<nav class="navbar navbar-expand-lg py-3 navbar-light bg-white sticky-top">
    <a class="navbar-brand" href="traditional.php"><img src="assets/images/logo2.png" width="120px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item ">
                    <a class="nav-link" href="mainadmin.php">หน้าแรก <span class="sr-only">(current)</span></a>
                </li> -->
            <!----<li class="nav-item ">
                <a class="nav-link" href="mainstore.php">หน้าแรก<span class="sr-only">(current)</span></a>
            </li> ---->
            <li class="nav-item ">
                <a class="nav-link" href="storepost.php">โพสต์ของคุณ<span class="sr-only">(current)</span></a>
            </li>


            <li class="nav-item dropdown active">
                <!-- check login -->
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<a class='nav-link dropdown-toggle text-secondary' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                    echo "ร้าน" . " " . $_SESSION['s_name'] . "</a>";
                } else {
                    echo "<script type='text/javascript'>";
                    echo "alert('ยังไม่ได้เข้าสู่ระบบ โปรดเข้าสู่ระบบอีกครั้ง');";
                    echo "window.location = 'login.php ;";
                    echo "</script>";
                }

                ?>


                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 90px;">
                    <!-- <a class="dropdown-item" href="profile.php">ดูข้อมูลส่วนตัว</a> -->

                    <a class="dropdown-item" href="store_info.php">ข้อมูลร้าน</a>
                    <div class="dropdown-divider"></div>

                    <!-- Button trigger modal -->
                    <a type="button" class="btn dropdown-item " data-toggle="modal" data-target="#logout" style="color: red;">
                        ออกจากระบบ
                    </a>

                </div>

            </li>

        </ul>

    </div>

</nav>
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