<section class="main-panel">
    <div class="container">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Data Barang</h3>

        </div>




        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table id="table_id" class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>NAMA</th>
                                <th>SATUAN</th>
                                <th>HARGA</th>
                                <th>STOK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../config.php";
                                $no = 1;
     $sql = "select * from barang";
     $hasil = pg_query($conn,$sql);
     while($row = pg_fetch_assoc($hasil)) {
    ?>
                            <tr class="alert">
                                <td><?php echo $row['id_barang']; ?></td>
                                <td><?php echo $row['nama_barang']; ?></td>
                                <td><?php echo $row['satuan']; ?></td>
                                <td>Rp<?php echo $row['harga']; ?></td>
                                <td><?php echo $row['stok']; ?></td>
                            </tr>
                            <?php
     }
     pg_close($conn);
 ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form action="../cetak/cetak_barang.php" target="_blank" class="d-flex justify-content-end ">
            <button class="add mt-4" type="submit">
                <i class='mdi mdi-printer'></i> Print
            </button>
        </form>

    </div>
</section>