<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="node_modules/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendor/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="admin.php"><img src="img/icon.png" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="admin.php">
                <h1>Xenon Store</h1>
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>

            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">

                <li class="nav-item">
                    <a class="nav-link" href="admin.php">
                        <h3 class="nav-title">
                            <span class="nav-title-icon text-white mr-2">
                                <i class="mdi mdi-home"></i>
                            </span> Dashboard
                        </h3>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <h3 class="nav-title">
                            <span class="nav-title-icon text-white mr-2">
                                <i class="mdi mdi-archive"></i>
                            </span> Storage
                        </h3>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/icons/mdi.html">
                        <h3 class="nav-title">
                            <span class="nav-title-icon text-white mr-2">
                                <i class="mdi mdi-cart"></i>
                            </span> Transaction
                        </h3>
                    </a>
                </li>


                <li class="nav-item sidebar-actions">
                    <span class="">
                        <div class="border-bottom">
                            <h6 class="font-weight-normal mb-3">Profile</h6>
                        </div>
                    </span>
                </li>
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <h3 class="nav-title">
                            <span class="nav-title-icon text-white mr-2">
                                <i class="mdi mdi-account"></i>
                            </span> Admin
                        </h3>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon mr-2">
                            <i class="mdi mdi-home"></i>
                        </span> Dashboard
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span>Overview <i
                                    class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

</body>

</html>