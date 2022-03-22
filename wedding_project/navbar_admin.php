<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <link rel="icon" type="image/x-icon" href="assets/images/logo.png">
      <title>Wedding Planner</title>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="./admin/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="./admin/assets/css/plugins/icon-sets.css">
      <link rel="stylesheet" href="./admin/assets/css/plugins/waves.min.css">
      <link rel="stylesheet" href="./admin/assets/css/plugins/sweetalert.min.css">
      <link rel="stylesheet" href="./admin/assets/css/main.min.css">
      <link rel="stylesheet" href="./admin/assets/css/app.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700">


      <script></script>
   </head>

<div class="sidebar">
            <div class="brand"><a href="#">
               <img src="assets/images/logo.png" width="30%" alt="Codeside" style="margin-left:50px;margin-right:100px;"></img></a></div>
            <div class="sidebar-scroll">
               <nav>
                  <ul class="nav" id="menuList">
                  <?php if ($_SESSION['username'] != "admin") : ?>
                     <li><a href="traditional.php" class="menu_link"><i class="bi bi-grid-1x2"></i><span>จัดการประเพณี</span></a></li>
                     <li><a href="admin_post.php" class="menu_link"><i class="bi bi-link-45deg"></i><span>อนุมัติโพสต์</span></a></li>
                     <li><a href="category_store.php" class="menu_link"><i class="bi bi-plus-square"></i><span>หมวดหมู่ร้านค้า</span></a></li>
                     <li><a href="#" class=" menu_link"><i class="bi bi-arrow-bar-right"></i><span>ออกจากระบบ</span></a></li>
                     <li><a href="#" data-toggle="modal" data-target="#logout" class="menu_link"><i class="bi bi-film"></i><span>ออกจากระบบ</span></a></li>
                     <?php endif ?>
                  <?php if ($_SESSION['username'] == "admin") : ?>
                     <li><a href="traditional.php" class="menu_link"><i class="bi bi-grid-1x2"></i><span>จัดการประเพณี</span></a></li>
                     <li><a href="admin_post.php" class="menu_link"><i class="bi bi-link-45deg"></i><span>อนุมัติโพสต์</span></a></li>
                     <li><a href="category_store.php" class="menu_link"><i class="bi bi-plus-square"></i><span>หมวดหมู่ร้านค้า</span></a></li>
                     <li><a href="member_store.php" class="menu_link"><i class="bi bi-film"></i><span>สมาชิกร้านค้า</span></a></li>
                     <li><a href="#" data-toggle="modal" data-target="#logout" class="menu_link"><i class="bi bi-film"></i><span>ออกจากระบบ</span></a></li>
                  <?php endif ?>
                  </ul>
               </nav>
            </div>
</div>

      <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
      <script src="./admin/assets/js/bootstrap.min.js"></script>
      <script src="./admin/assets/js/plugins/slimscroll/slimscroll.min.js"></script>
      <script src="./admin/assets/js/plugins/waves/waves.min.js"></script>
      <script src="./assets/js/plugins/toastr/toastr.min.js"></script>
      <script src="./assets/js/plugins/sweetalert.min.js"></script>
      <script src="./admin/assets/js/theme.min.js"></script>
      <script src="./admin/assets/js/app.js"></script>


      <script>
       $(document).ready(function() {
            $('#datatable').DataTable();
      });
      </script>

     