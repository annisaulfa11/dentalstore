<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex func">
            <h3 class="fw-bolder mb-4">Stok Masuk</h3>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table id="table_id" class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>TANGGAL</th>
                                <th>ID SUPPLIER</th>
                                <th>ID BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>STOK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../config.php";
                                $no = 1;

     $sql = "select a.*, b.nama_barang, b.id_supplier, c.nama_supplier from stok a, barang b, supplier c where a.id_barang = b.id_barang and b.id_supplier = c.id_supplier";
     $hasil = pg_query($conn,$sql);
     while($row = pg_fetch_assoc($hasil)) {
    ?>
                            <tr class="alert">
                                <td><?php echo $no++?></td>
                                <td><?php echo $row['tanggal']; ?></td>
                                <td><?php echo $row['nama_supplier']; ?></td>
                                <td><?php echo $row['id_barang']; ?></td>
                                <td><?php echo $row['nama_barang']; ?></td>
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
        <div class="d-flex justify-content-end mt-3">
            <form action="../cetak/cetak_stok.php" target="_blank" class="d-flex justify-content-end ">
                <button class="add mt-4" type="submit">
                    <i class='mdi mdi-printer'></i> Print
                </button>
            </form>
        </div>
    </div>
</section>