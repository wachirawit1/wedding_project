<?php if($_SESSION['username'] != "admin") : ?>
<nav class="navbar navbar-expand-lg py-3 ml-0 navbar-light bg-white ">
    <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0  flex-wrap flex-md-nowrap justify-content-between">
    <a class="navbar-brand" href="traditional.php" style="line-height: 25px; ">
                <div class="d-table m-auto">
                    <img src="assets/images/logo.png" width="70"></a>
                    
                </div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
</nav>
<div class="container-fluid">
    <div class="row">
  
        <nav id="sidebar" class="nav flex-column" >
            <div class="position-sticky">
                <ul class="nav flex-column">
                   <!---  <li class="nav-item text-center p-3 ">
                    <a class="nav-link" href="profile.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="ml-2">ดูข้อมูลส่วนตัว</span></a>
                    </li> --->
                    <li class="nav-item text-center p-3 ">
                        <a class="nav-link active"  href="traditional.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>

                            <span class="ml-2">จัดการประเพณี</span>
                        </a>
                    </li>
                    <li class="nav-item ml-0">
                        <a class="nav-link" href="admin_post.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            <span class="ml-2">อนุมัติโพสต์</span>
                        </a>
                    </li>
                    <li class="nav-item text-center p-3 ">
                        <a class="nav-link" href="category_store.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="ml-2">หมวดหมู่ร้านค้า</span>
                        </a>
                    </li>
                   
                    <li class="nav-item text-center p-2 ml-0">
                        <a type="nav-link" class="btn dropdown-item" data-toggle="modal" data-target="#logout" style="color: red;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> 
                            <span class="ml-2">ออกจากระบบ</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php endif ?>
        
        <?php if($_SESSION['username'] == "admin") : ?>
        <link href="assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="assets2/css/sb-admin-2.min.css" rel="stylesheet">
      
    <div class="row">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0  flex-wrap flex-md-nowrap justify-content-between">
    <a class="navbar-brand" href="traditional.php" style="line-height: 25px; ">
                <div class="d-table m-auto">
                    <img src="assets/images/logo.png" width="70"></a>
                    
                </div>
    </div>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item text-center p-3 ">
                        <a class="nav-link active"  href="traditional.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>

                            <span class="ml-2">จัดการประเพณี</span>
                        </a>
                    </li>

            <!-- Divider -->

            <!-- Heading -->
            <li class="nav-item ml-0">
                        <a class="nav-link" href="admin_post.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            <span class="ml-2">อนุมัติโพสต์</span>
                        </a>
                    </li>
                    <li class="nav-item text-center p-3 ">
                        <a class="nav-link" href="category_store.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="ml-2">หมวดหมู่ร้านค้า</span>
                        </a>
                    </li>

                    <li class="nav-item text-center p-3 ">
                        <a data-toggle="modal" data-target="#logout" class="nav-link" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> 
                            <span class="ml-2">ออกจากระบบ</span>
                        </a>
                    </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            

            <!-- Sidebar Message -->
        </ul>
        <!-- End of Sidebar -->
        <?php endif ?>