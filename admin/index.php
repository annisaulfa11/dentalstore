<?php
include "../config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../node_modules/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendor/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/form.css">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
</head>

<body>
    <!-- partial:partials/_navbar.html -->
    <header>
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="../img/icon.png" alt="logo" /></a>
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
                        <a class="nav-link" href="../logout.php">
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
        <nav class="page-body-wrapper sidebar sidebar-offcanvas mt-4" id="sidebar">
            <ul class="nav">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <h3 class="nav-title">
                            <span class="nav-title-icon text-white mr-2">
                                <i class="mdi mdi-home"></i>
                            </span> Dashboard
                        </h3>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=pelanggan">
                        <h3 class="nav-title">
                            <span class="nav-title-icon text-white mr-2">
                                <i class="mdi mdi-account-multiple"></i>
                            </span> Pelanggan
                        </h3>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=supplier">
                        <h3 class="nav-title">
                            <span class="nav-title-icon text-white mr-2">
                                <i class="mdi mdi-truck-delivery"></i>
                            </span> Supplier
                        </h3>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="?page=barang" aria-expanded="false"
                        aria-controls="ui-basic">
                        <h3 class="nav-title">
                            <span class="nav-title-icon text-white mr-2">
                                <i class="mdi mdi-archive"></i>
                            </span> Barang
                        </h3>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=transaksi">
                        <h3 class="nav-title">
                            <span class="nav-title-icon text-white mr-2">
                                <i class="mdi mdi-cart"></i>
                            </span> Transaksi
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
        <!-- main-panel ends -->

    </header>
    <div>
        <?php
      $page = isset($_GET['page']) ? $_GET['page'] : "";
      $action = isset($_GET['action']) ? $_GET['action'] : "";

      if ($page==""){
          include "admin.php";
      }elseif ($page=="transaksi"){
          if ($action==""){
              include "../transaksi/transaksi.php";
          }elseif ($action=="tambah"){
              include "../transaksi/tambah_transaksi.php";
          }elseif ($action=="update"){
              include "update_KK.php";
          }else{
              include "hapus_KK.php";
          }
      }elseif ($page=="pelanggan"){
        if ($action==""){
            include "../pelanggan/pelanggan.php";
        }elseif ($action=="tambah"){
            include "../pelanggan/tambah_pelanggan.php";
        }elseif ($action=="update"){
            include "../pelanggan/edit_pelanggan.php";
        }else{
            include "../pelanggan/hapus_pelanggan.php";
        }
      }elseif ($page=="supplier"){
        if ($action==""){
            include "../supplier/supplier.php";
        }elseif ($action=="tambah"){
            include "../supplier/tambah_supplier.php";
        }elseif ($action=="update"){
            include "../supplier/edit_supplier.php";
        }else{
            include "../supplier/hapus_supplier.php";
        }
      }elseif ($page=="barang"){
        if ($action==""){
            include "../barang/barang.php";
        }elseif ($action=="tambah"){
            include "../barang/tambah_barang.php";
        }elseif ($action=="update"){
            include "../barang/edit_barang.php";
        }else{
            include "../barang/hapus_barang.php";
        }
       }else{
          include "admin.php";
      }
      ?>

    </div>

    <!-- container-scroller -->
    <script src="../js/axios.min.js"></script>
</body>

</html>