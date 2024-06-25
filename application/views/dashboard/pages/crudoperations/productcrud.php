<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name FROM categories";
$result = $conn->query($sql);
$categories = $result->fetch_all(MYSQLI_ASSOC);

// if ($result->num_rows > 0) {
// Fetch all rows

// Print categories for demonstration
// foreach ($categories as $category) {
//     // echo "ID: " . $category['id'] . " - Name: " . $category['name'] . "<br>";
// }
// } else {
//     echo "0 results";
// }

$conn->close();
?>

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
              <!-- <a class="dropdown-item" href="#"> -->
                <!-- <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a> -->
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
                  <h4 class="card-title">Inser your New Product</h4>
                  <div class="container mt-5">
                    <div class="alert alert-warning alert-dismissible fade show d-none" id="errorAlert" role="alert">
                      <strong>ERRORS!</strong>
                      <ul id="errorList"></ul>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" id="errorAlert" aria-label="Close"></button>
                    </div>
                    <form id="uploadProductForm">
                      <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" name="price" id="price" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="categories" class="form-label">Categories</label>
                        <select class="form-control" id="categories" name="categories[]" multiple>
                          <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary">Upload Product</button>
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
                  <h4 class="card-title">Product Table</h4>
                  <div class="container mt-5">
                    <table class="table" id="productTable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">ProductName</th>
                          <th scope="col">Description</th>
                          <th scope="col">Image</th>
                          <th scope="col">Price</th>
                          <th scope="col">Stock</th>
                          <th scope="col">Delete</th>
                          <th scope="col">Update</th>
                        </tr>
                      </thead>
                      <tbody id="productList"></tbody>
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
                  <h4 class="card-title">Soft Deleted Product Table</h4>
                  <div class="container mt-5">
                    <table class="table" id="softProductTable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">ProductName</th>
                          <th scope="col">Description</th>
                          <th scope="col">Image</th>
                          <th scope="col">Price</th>
                          <th scope="col">Stock</th>
                          <th scope="col">Delete</th>
                          <th scope="col">Update</th>
                        </tr>
                      </thead>
                      <tbody id="softProductList"></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <!-- <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
      </div>
    </footer> -->
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
    <script src="../dashboardAssets/assets/js/todolist.js"></script>
    <script src="../dashboardAssets/assets/js/jquery.cookie.js"></script>
    <!-- endinject -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <script>
      // $('#productTable').DataTable();
      // $('#softProductTable').DataTable();
      $(document).ready(function() {
        // Initialize DataTables
        let productTable = $('#productTable').DataTable();
        let softProductTable = $('#softProductTable').DataTable();

        // Form submission for uploading a product
        $('#uploadProductForm').on('submit', function(e) {
          e.preventDefault();
          let form = new FormData(this);
          $.ajax({
            url: "<?php echo BASEURL ?>/ProductController/uploadProduct",
            method: 'post',
            data: form,
            contentType: false,
            processData: false,
            success: function(res) {
              let response = $.parseJSON(res);
              if (response.status === 400 && response.errors) {
                let errorMessage = '<ul>';
                for (let key in response.errors) {
                  errorMessage += '<li>' + response.errors[key] + '</li>';
                }
                errorMessage += '</ul>';
                document.getElementById('errorList').innerHTML = errorMessage;
                document.getElementById('errorAlert').classList.remove('d-none'); // Show the alert
              } else if (response.status === 200) {
                document.getElementById('errorAlert').classList.add('d-none'); // Hide the alert
                alert('Product uploaded successfully!');
                $('#uploadProductForm')[0].reset();
                showData();
              } else {
                document.getElementById('errorAlert').classList.add('d-none'); // Hide the alert
              }
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });
        });

        // Function to fetch and display all products
        function showData() {
          $.ajax({
            url: "<?php echo BASEURL ?>/ProductController/showData",
            method: 'get',
            success: function(res) {
              let products = $.parseJSON(res);
              let output = '';
              if (Array.isArray(products)) {
                products.forEach(function(product) {
                  output +=
                    `<tr>
                  <th scope="row">${product.id}</th>
                  <td>${product.name}</td>
                  <td>${product.description}</td>
                  <td><img src="${product.image}" alt="${product.name}" width="50" height="50"></td>
                  <td>${product.price}</td>
                  <td>${product.stock}</td>
                  <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal" id="update-btn" data-id="${product.id}">Update</button></td>
                  <td><button class="btn btn-danger btn-sm" id="softdelete-btn" data-id="${product.id}">Temporary Delete</button></td>
                </tr>`;
                });
              } else {
                output = '<tr><td colspan="8">No products found</td></tr>';
              }
              productTable.clear().destroy(); // Clear and destroy existing table
              document.getElementById('productList').innerHTML = output;
              productTable = $('#productTable').DataTable(); // Reinitialize DataTables
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });
        }

        // Function to fetch and display soft-deleted products
        function showSoftData() {
          $.ajax({
            url: "<?php echo BASEURL ?>/ProductController/getSoftDeletedProducts",
            method: 'get',
            success: function(res) {
              let softProducts = $.parseJSON(res);
              let output = '';
              if (Array.isArray(softProducts)) {
                softProducts.forEach(function(product) {
                  output +=
                    `<tr>
                  <th scope="row">${product.id}</th>
                  <td>${product.name}</td>
                  <td>${product.description}</td>
                  <td><img src="${product.image}" alt="${product.name}" width="50" height="50"></td>
                  <td>${product.price}</td>
                  <td>${product.stock}</td>
                  <td><button class="btn btn-primary btn-sm" id="restore-btn" data-id="${product.id}">Restore</button></td>
                  <td><button class="btn btn-danger btn-sm" id="permanentdelete-btn" data-id="${product.id}">Permanent Delete</button></td>
                </tr>`;
                });
              } else {
                output = '<tr><td colspan="8">No products found</td></tr>';
              }
              softProductTable.clear().destroy(); // Clear and destroy existing table
              document.getElementById('softProductList').innerHTML = output;
              softProductTable = $('#softProductTable').DataTable(); // Reinitialize DataTables
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });
        }

        // Event delegation for soft delete operation
        $('#productList').on("click", "#softdelete-btn", function() {
          let id = $(this).attr('data-id');
          $.ajax({
            url: "<?php echo BASEURL ?>/ProductController/softdeleteProduct",
            method: 'post',
            data: {
              id: id
            },
            success: function(res) {
              alert('Product soft-deleted successfully!');
              showData(); // Refresh the table data
              showSoftData(); // Refresh the soft-deleted table data
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });
        });

        // Event delegation for permanent delete operation
        $('#softProductList').on("click", "#permanentdelete-btn", function() {
          let id = $(this).attr('data-id');
          $.ajax({
            url: "<?php echo BASEURL ?>/ProductController/permanentDeleteProduct",
            method: 'post',
            data: {
              id: id
            },
            success: function(res) {
              alert('Product permanently deleted successfully!');
              showSoftData(); // Refresh the table data
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });
        });

        // Event delegation for restore operation
        $('#softProductList').on("click", "#restore-btn", function() {
          let id = $(this).attr('data-id');
          $.ajax({
            url: "<?php echo BASEURL ?>/ProductController/restoreProduct",
            method: 'post',
            data: {
              id: id
            },
            success: function(res) {
              alert('Product restored successfully!');
              showData(); // Refresh the active table data
              showSoftData(); // Refresh the soft-deleted table data
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });
        });

        // Event delegation for update operation
        $('#productList').on("click", "#update-btn", function() {
          let id = $(this).attr('data-id');
          $.ajax({
            url: "<?php echo BASEURL ?>/ProductController/getProductupdate",
            method: 'get',
            data: {
              id: id
            },
            success: function(res) {
              let product = $.parseJSON(res);
              $('#updateProductForm #product_id').val(product.id);
              $('#updateProductForm #name').val(product.name);
              $('#updateProductForm #description').val(product.description);
              $('#updateProductForm #price').val(product.price);
              $('#updateProductForm #stock').val(product.stock);
              $('#updateProductForm #categories').val(product.categories); // Assuming categories is an array
              $('#updateModal').modal('show');
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });
        });

        // Form submission for updating a product
        $('#updateProductForm').on('submit', function(e) {
          e.preventDefault();
          let form = $(this).serialize(); // Serialize the form data
          $.ajax({
            url: "<?php echo BASEURL ?>/ProductController/updateProduct",
            method: 'post',
            data: form, // Send serialized form data
            success: function(res) {
              let response = $.parseJSON(res);
              if (response.status === 400 && response.errors) {
                let errorMessage = '<ul>';
                for (let key in response.errors) {
                  errorMessage += '<li>' + response.errors[key] + '</li>';
                }
                errorMessage += '</ul>';
                document.getElementById('uerrorList').innerHTML = errorMessage;
                document.getElementById('uerrorAlert').classList.remove('d-none'); // Show the alert
              } else if (response.status === 200) {
                document.getElementById('uerrorAlert').classList.add('d-none'); // Hide the alert
                alert('Product updated successfully!');
                $('#updateProductForm')[0].reset();
                $('#updateModal').modal('hide');
                showData(); // Refresh the table data
              } else {
                document.getElementById('uerrorAlert').classList.add('d-none'); // Hide the alert
              }
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });
        });

        // Initial data fetch
        showData();
        showSoftData();
      });
    </script>







    <!-- Modal -->
    <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="updateModalLabel">Update Product</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="alert alert-warning alert-dismissible fade show d-none" id="uerrorAlert" role="alert">
              <strong>ERRORS!</strong>
              <ul id="uerrorList"></ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <form id="updateProductForm">
              <input type="hidden" name="product_id" id="product_id">
              <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control">
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" id="image" name="image" class="form-control">
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control">
              </div>
              <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control">
              </div>
              <div class="mb-3">
                <label for="categories" class="form-label">Categories</label>
                <select class="form-control" id="categories" name="categories[]" multiple>
                  <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

</body>

</html>