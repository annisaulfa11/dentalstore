<section class="main-panel">
    <div class="container">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Data Transaksi</h3>

        </div>






        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table id="table_id" class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NO FAKTUR</th>
                                <th>TANGGAL</th>
                                <th>ID PELANGGAN</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../config.php";
                                $no = 1;
     $sql = "select * from transaksi";
     $hasil = pg_query($conn,$sql);
     while($row = pg_fetch_assoc($hasil)) {
    ?>
                            <tr class="alert">
                                <td><?php echo $no++;?></td>
                                <td><?php echo $row['no_faktur']; ?></td>
                                <td><?php echo $row['tanggal']; ?></td>
                                <td><?php echo $row['id_pelanggan']; ?></td>
                                <td>Rp<?php echo number_format($row['total']); ?></td>
                            </tr>
                            <?php
     }

 ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form action="../cetak/cetak_transaksi.php" target="_blank" class="d-flex justify-content-end ">
            <button class="add mt-4" type="submit">
                <i class='mdi mdi-printer'></i> Print
            </button>
        </form>
    </div>
</section>