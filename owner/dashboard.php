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
    <link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>
    <!-- partial -->
    <?php
    $date = date("Y-m-d");
    $sql = "SELECT COUNT(no_faktur) as jum FROM transaksi WHERE tanggal='$date'";
    $sql1 = "SELECT SUM(total) as tot FROM transaksi WHERE tanggal='$date'";
    $hasil = pg_query($conn,$sql);
    $data = pg_fetch_assoc($hasil);
    $hasil1 = pg_query($conn,$sql1);
    $data1 = pg_fetch_assoc($hasil1);
    $data2 = pg_fetch_assoc(pg_query($conn,"select sum(qty) as brg from detail_transaksi as a, transaksi as b where a.no_faktur = b.no_faktur and tanggal = '$date'"));
    $data3 = pg_query($conn,"select tanggal from transaksi group by tanggal");
    $data4 = pg_query($conn,"select sum(total) as total from transaksi group by tanggal");

?>
    <?php 
    $data_barang = pg_query($conn,"select a.nama_barang, a.id_barang from barang as a, detail_transaksi as b where a.id_barang = b.id_barang group by a.nama_barang, a.id_barang");
    $penjualan = pg_query($conn,"select sum(qty) as sold from detail_transaksi group by id_barang")
    ?>
    <section class="main-panel">
        <div>
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
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="small-box bg-purple">
                            <div class="inner">
                                <h3 id="transaksi_hari"><?php echo $data['jum']; ?></h3>
                                <p>Transaksi Hari Ini</p>
                            </div>
                            <div class="icon">
                                <i class="mdi mdi-cart"></i>
                            </div>
                            <a href="?page=transaksi" class="small-box-footer">
                                More Info <i class="mdi mdi-arrow-right-bold-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3 id="transaksi_hari">Rp<?php echo number_format($data1['tot']); ?></h3>
                                <p>Pendapatan Hari Ini</p>
                            </div>
                            <div class="icon">
                                <i class="mdi mdi-clipboard-text"></i>
                            </div>
                            <a href="?page=transaksi" class="small-box-footer">
                                More Info <i class="mdi mdi-arrow-right-bold-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3 id="transaksi_hari"><?php echo $data2['brg']; ?>0</h3>
                                <p>Barang Terjual Hari Ini</p>
                            </div>
                            <div class="icon">
                                <i class="mdi mdi-basket"></i>
                            </div>
                            <a href="?page=transaksi" class="small-box-footer">
                                More Info <i class="mdi mdi-arrow-right-bold-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ml-0 mr-0 ">
                            <div class="card-header bg-green">
                                <h3 class="title">Produk Terlaris</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="produkTerlaris"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ml-0 mr-0 ">
                            <div class="card-header bg-green">
                                <h3 class="title">Penjualan per Hari</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="penjualan"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script src="../js/Chart.js"></script>
    <script>
    var ctx = document.getElementById("produkTerlaris").getContext('2d');
    var ctx1 = document.getElementById("penjualan").getContext('2d');

    var mychart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [<?php while($row = pg_fetch_array($data_barang)) {
                    echo '"'.$row['nama_barang'].'",';
                }?>],
            datasets: [{
                label: '',
                data: [<?php while($row = pg_fetch_array($penjualan)) {
                    echo '"'.$row['sold'].'",';
                }?>],
                backgroundColor: ['#A85CF9', '#4B7BE5', '#C70A80', '#242F9B', '#F7FF93', '#005555',
                    '#e83e8c', '#20c997', '#6c757d', '#70be95', '#1600ff', '#ff00f4'
                ]
            }]

        }
    })
    var mychart1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: [<?php while($row = pg_fetch_array($data3)) {
                    echo '"'.$row['tanggal'].'",';
                }?>],
            datasets: [{
                label: '',
                data: [<?php while($row = pg_fetch_array($data4)) {
                    echo '"'.$row['total'].'",';
                }?>],
                backgroundColor: ['#A85CF9', '#4B7BE5', '#C70A80', '#242F9B', '#F7FF93', '#005555',
                    '#e83e8c', '#20c997', '#6c757d', '#70be95', '#1600ff', '#ff00f4'
                ]
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    })
    </script>
</body>

</html>