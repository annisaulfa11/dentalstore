<section class="main-panel">
    <div class="container">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Data Supplier</h3>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table id="table_id" class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th width="50px">ID</th>
                                <th width="200px">NAMA</th>
                                <th width="130px">NO HP</th>
                                <th width="250px">ALAMAT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../config.php";
                                $no = 1;
     $sql = "select * from supplier order by id_supplier";
     $hasil = pg_query($conn,$sql);
     while($row = pg_fetch_assoc($hasil)) {
    ?>
                            <tr class="alert">
                                <td><?php echo $row['id_supplier']; ?></td>
                                <td><?php echo $row['nama_supplier']; ?></td>
                                <td><?php echo $row['no_hp']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
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
        <form action="../cetak/cetak_supplier.php" target="_blank" class="d-flex justify-content-end ">
            <button class="add mt-4" type="submit">
                <i class='mdi mdi-printer'></i> Print
            </button>
        </form>

    </div>
</section>