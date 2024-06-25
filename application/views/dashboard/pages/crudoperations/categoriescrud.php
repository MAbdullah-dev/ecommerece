<!DOCTYPE html>
<html lang="en">

<head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../dashboardAssets/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../dashboardAssets/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../dashboardAssets/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../dashboardAssets/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../dashboardAssets/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../dashboardAssets/assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo" href="../../index.html"><img src="../dashboardAssets/assets/images/logo.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../dashboardAssets/assets/images/logo-mini.svg" alt="logo" /></a>
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
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><?php echo $_SESSION['user_name'] ?></p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo BASEURL ?>AuthController/logout">
                                <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
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
                                <span class="text-secondary text-small">store_owner</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASEURL ?>/DashboardController/dashboardpage">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
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
                        </div>
                    </li>
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
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                            <span class="menu-title">Forms</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="../../pages/forms/basic_elements.html">Form Elements</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                            <span class="menu-title">Charts</span>
                            <i class="mdi mdi-chart-bar menu-icon"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="../../pages/charts/chartjs.html">ChartJs</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <span class="menu-title">Tables</span>
                            <i class="mdi mdi-table-large menu-icon"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="../../pages/tables/basic-table.html">Basic table</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <span class="menu-title">User Pages</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-lock menu-icon"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../../pages/samples/login.html"> Login </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../../pages/samples/register.html"> Register </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../docs/documentation.html" target="_blank">
                            <span class="menu-title">Documentation</span>
                            <i class="mdi mdi-file-document-box menu-icon"></i>
                        </a>
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
                                    <h4 class="card-title">Category Management</h4>
                                    <div class="container mt-5">
                                        <div class="alert alert-warning alert-dismissible fade show d-none" id="CerrorAlert" role="alert">
                                            <strong>ERRORS!</strong>
                                            <ul id="CerrorList"></ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" id="CerrorAlert" aria-label="Close"></button>
                                        </div>
                                        <form id="categoryForm">
                                            <div class="mb-3">
                                                <label for="categoryName" class="form-label">Category Name</label>
                                                <input type="text" name="name" id="categoryName" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add Category</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Categories List</h4>
                                    <div class="container mt-5">
                                        <table class="table table-bordered" id="categoryList">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Categories will be loaded here via AJAX -->
                                            </tbody>
                                        </table>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">TRASH DATA</h4>
                                    <div class="container mt-5">
                                        <table class="table table-bordered" id="softDeletedCategoryList">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Soft-deleted categories will be dynamically loaded here -->
                                            </tbody>
                                        </table>
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
        <script src="../dashboardAssets/assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="../dashboardAssets/assets/js/off-canvas.js"></script>
        <script src="../dashboardAssets/assets/js/misc.js"></script>
        <script src="../dashboardAssets/assets/js/settings.js"></script>
        <script src="../dashboardAssets/assets/js/jquery.cookie.js"></script>
        <script src="../dashboardAssets/assets/js/todolist.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
        <!-- endinject -->

        <script>
            $(document).ready(function() {
                // Handle form submission for adding a category
                $('#categoryForm').on('submit', function(e) {
                    e.preventDefault();
                    let form = new FormData(this);
                    $.ajax({
                        url: "<?php echo BASEURL ?>/CategoryController/addCategory",
                        method: 'post',
                        data: form,
                        processData: false,
                        contentType: false,
                        success: function(res) {
                            let response = $.parseJSON(res);

                            if (response.status === 400 && response.message) {
                                let errorMessage = '<ul>';
                                errorMessage += '<li>' + response.message + '</li>';
                                errorMessage += '</ul>';
                                document.getElementById('CerrorList').innerHTML = errorMessage;
                                document.getElementById('CerrorAlert').classList.remove('d-none'); // Show the alert
                            } else if (response.status === 200) {
                                document.getElementById('CerrorAlert').classList.add('d-none'); // Hide the alert
                                alert(response.message || 'Category added successfully!');
                                $('#categoryForm')[0].reset();
                                loadCategories(); // Refresh categories list after adding a new category
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                            alert('An error occurred while processing your request. Please try again.');
                        }
                    });
                });

                // Load categories on page load
                function loadCategories() {
                    $.ajax({
                        url: "<?php echo BASEURL ?>/CategoryController/getCategories",
                        method: 'get',
                        success: function(res) {
                            let categories = $.parseJSON(res);
                            let output = '';
                            if (Array.isArray(categories)) {
                                categories.forEach(function(category) {
                                    output += `
                            <tr>
                                <td>${category.id}</td>
                                <td>${category.name}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm update-btn" data-id="${category.id}" data-name="${category.name}">Update</button>
                                    <button class="btn btn-danger btn-sm softdelete-btn" data-id="${category.id}">Soft Delete</button>
                                </td>
                            </tr>
                        `;
                                });
                            } else {
                                output = '<tr><td colspan="3">No categories found</td></tr>';
                            }
                            $('#categoryList tbody').html(output);
                            $('#categoryList').DataTable();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }

                // Load soft-deleted categories
                function loadSoftDeletedCategories() {
                    $.ajax({
                        url: "<?php echo BASEURL ?>/CategoryController/getSoftDeletedCategories",
                        method: 'get',
                        success: function(res) {
                            let categories = $.parseJSON(res);
                            let output = '';
                            if (Array.isArray(categories)) {
                                categories.forEach(function(category) {
                                    output += `
                            <tr>
                                <td>${category.id}</td>
                                <td>${category.name}</td>
                                <td>
                                    <button class="btn btn-success btn-sm restore-btn" data-id="${category.id}">Restore</button>
                                    <button class="btn btn-danger btn-sm delete-btn" data-id="${category.id}">Permanent Delete</button>
                                </td>
                            </tr>
                        `;
                                });
                            } else {
                                output = '<tr><td colspan="3">No soft-deleted categories found</td></tr>';
                            }
                            $('#softDeletedCategoryList tbody').html(output);
                            $('#softDeletedCategoryList').DataTable();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }

                // Soft delete category
                $(document).on('click', '.softdelete-btn', function() {
                    let id = $(this).data('id');
                    $.ajax({
                        url: "<?php echo BASEURL ?>/CategoryController/softDeleteCategory",
                        method: 'post',
                        data: {
                            id: id
                        },
                        success: function(res) {
                            alert('Category soft deleted successfully');
                            loadCategories();
                            loadSoftDeletedCategories();
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                            alert('An error occurred while processing your request. Please try again.');
                        }
                    });
                });

                // Restore soft-deleted category
                $(document).on('click', '.restore-btn', function() {
                    let id = $(this).data('id');
                    $.ajax({
                        url: "<?php echo BASEURL ?>/CategoryController/restoreCategory",
                        method: 'post',
                        data: {
                            id: id
                        },
                        success: function(res) {
                            alert('Category restored successfully');
                            loadCategories();
                            loadSoftDeletedCategories();
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                            alert('An error occurred while processing your request. Please try again.');
                        }
                    });
                });

                // Permanently delete category
                $(document).on('click', '.delete-btn', function() {
                    let id = $(this).data('id');
                    $.ajax({
                        url: "<?php echo BASEURL ?>/CategoryController/deleteCategory",
                        method: 'post',
                        data: {
                            id: id
                        },
                        success: function(res) {
                            alert('Category permanently deleted successfully');
                            loadSoftDeletedCategories();
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                            alert('An error occurred while processing your request. Please try again.');
                        }
                    });
                });

                // Update category - Show update modal with data
                $(document).on('click', '.update-btn', function() {
                    let id = $(this).data('id');
                    let name = $(this).data('name');
                    $('#categoryId').val(id);
                    $('#updateCategoryName').val(name);
                    $('#updateCategoryModal').modal('show');
                });

                // Update category - Submit form
                $('#updateCategoryForm').on('submit', function(e) {
                    e.preventDefault();
                    let form = $(this).serialize();
                    $.ajax({
                        url: "<?php echo BASEURL ?>/CategoryController/updateCategory",
                        method: 'post',
                        data: form,
                        success: function(res) {
                            let response = $.parseJSON(res);
                            if (response.status === 200) {
                                alert('Category updated successfully');
                                $('#updateCategoryModal').modal('hide');
                                $('#updateCategoryError').addClass('d-none');
                                loadCategories();
                            } else {
                                $('#updateCategoryError').removeClass('d-none').text(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                            alert('An error occurred while processing your request. Please try again.');
                        }
                    });
                });

                // Call loadCategories and loadSoftDeletedCategories on page load
                loadCategories();
                loadSoftDeletedCategories();
            });
        </script>

        <!-- Modal -->
        <div class="modal fade" id="updateCategoryModal" tabindex="-1" aria-labelledby="updateCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateCategoryModalLabel">Update Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span data-bs-dismiss="modal" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="updateCategoryForm">
                            <input type="hidden" id="categoryId" name="id">
                            <div class="form-group">
                                <label for="updateCategoryName">Category Name</label>
                                <input type="text" class="form-control" id="updateCategoryName" name="name">
                            </div>
                            <div id="updateCategoryError" class="alert alert-danger d-none"></div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>