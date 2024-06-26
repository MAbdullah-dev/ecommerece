<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo BASEURL ?>/dashboardAssets/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>/dashboardAssets/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>/dashboardAssets/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>/dashboardAssets/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo BASEURL ?>/dashboardAssets/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo BASEURL ?>/dashboardAssets/assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo" href="../../index.html"><img src="<?php echo BASEURL ?>/dashboardAssets/assets/images/logo.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="<?php echo BASEURL ?>/dashboardAssets/assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <!-- <img src="<?php echo BASEURL ?>/dashboardAssets/assets/images/faces/face1.jpg" alt="image"> -->
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><?php echo $_SESSION['user_name'] ?></p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <!-- <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo BASEURL ?>AuthController/logout">
                                <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                    
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2"><?php echo $_SESSION['user_name'] ?></span>
                                <span class="text-secondary text-small">store_Owner</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                    <?php if ($_SESSION['user_role']==1) :?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASEURL ?>/DashboardController/dashboardpage">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">CRUD OPERATIONS</span>
                            <i class="menu-arrow"></i>
                            <i style="font-size: 18px;color: gray;" class="ri-table-line"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">

                                <?php if (isset($_SESSION['user_role'])) : ?>

                                    <?php if ($_SESSION['user_role'] == 1) : ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo BASEURL ?>DashboardController/productcrudPage">Product CRUD</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo BASEURL ?>DashboardController/categoriescrudPage">Category CRUD</a>
                                        </li>
                                    <?php elseif ($_SESSION['user_role'] == 2) : ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo BASEURL ?>DashboardController/productcrudPage">Product CRUD</a>
                                        </li>
                                    <?php else : ?>
                                        <li class="nav-item">
                                            <span class="nav-link">Unauthorized user</span>
                                        </li>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <li class="nav-item">
                                        <span class="nav-link">Unauthorized user</span>
                                    </li>
                                <?php endif; ?>

                                <li class="nav-item">
                                    <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                                </li>
                            </ul>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                            <span class="menu-title">Orders</span>
                            <i style="font-size: 18px; color: gray; margin-left: 7.8rem;" class="ri-shopping-bag-2-fill"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo BASEURL ?>DashboardController/orderpage">ORDER TABLE</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <!-- <h3 class="page-title"> Buttons </h3> -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <!-- <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Buttons</li> -->
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Inser your New Product</h4>
                                    <div class="container mt-5">
                                        <h1>Order Items</h1>
                                        
                                        <?php if (!empty($data)) : ?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Product Name</th>
                                                            <th>Quantity</th>
                                                            <th>Total Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        <?php foreach ($data['data'] as $item) : ?>
                                                            <tr>
                                                                <td><?php echo $item->id; ?></td>
                                                                <td><?php echo $item->product_name; ?></td>
                                                                <td><?php echo $item->quantity; ?></td>
                                                                <td><?php echo $item->totalprice; ?></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php else : ?>
                                            <div class="alert alert-warning" role="alert">
                                                No order items found.
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="<?php echo BASEURL ?>/dashboardAssets/assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="<?php echo BASEURL ?>/dashboardAssets/assets/js/off-canvas.js"></script>
        <script src="<?php echo BASEURL ?>/dashboardAssets/assets/js/misc.js"></script>
        <script src="<?php echo BASEURL ?>/dashboardAssets/assets/js/settings.js"></script>
        <script src="<?php echo BASEURL ?>/dashboardAssets/assets/js/todolist.js"></script>
        <script src="<?php echo BASEURL ?>/dashboardAssets/assets/js/jquery.cookie.js"></script>
        <!-- endinject -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>


</body>

</html>