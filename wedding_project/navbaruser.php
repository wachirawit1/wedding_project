<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        let n = $('.dropdown-item.waves-effect.waves-light').length;
        if (n > 0) {
            $('.badge').text(n);
        } else {
            $('.badge').hide();
        }

    });
</script>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow sticky-top">
    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" width="70"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto" style="font-size: 18px;">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#post">โพสต์ <span class="sr-only"></span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="progress.php">อีเวนท์<span class="sr-only"></span></a>
            </li>


            <li class="nav-item dropdown ">
                <!-- check login -->
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<a class='nav-link dropdown-toggle text-secondary' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                    echo "สวัสดี" . " " . "คุณ" . $_SESSION['name'] . "</a>";
                } else {
                    echo "<script type='text/javascript'>";
                    echo "alert('ยังไม่ได้เข้าสู่ระบบ โปรดเข้าสู่ระบบอีกครั้ง');";
                    echo "window.location = 'index.php ;";
                    echo "</script>";
                }

                ?>

                <div class="dropdown">
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 90px;">
                        <a class="dropdown-item" href="profile.php">ดูข้อมูลส่วนตัว</a>

                        <a class="dropdown-item" href="report.php">งานที่กำลังทำ</a>

                        <a class="dropdown-item" href="history.php">ประวัติอีเวนท์</a>

                        <div class="dropdown-divider"></div>

                        <!-- Button trigger modal -->
                        <a type="button" class="btn dropdown-item" data-toggle="modal" data-target="#exampleModal" style="color: red;">
                            ออกจากระบบ
                        </a>
                    </div>
                </div>
            </li>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-5" aria-controls="navbarSupportedContent-5" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
        </ul>
    </div>
</nav>

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
                <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                <a href="logout.php?logout=1" type="button" class="btn btn-danger">ยืนยัน</a>
            </div>
        </div>
    </div>
</div>