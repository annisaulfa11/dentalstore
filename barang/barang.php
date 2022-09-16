<section class="main-panel">
    <div class="container">
        <div class="section-title d-flex func">
            <h3 class="fw-bolder mb-4">Data Barang</h3>

            <button class="add1">
                <a href="?page=barang&action=tambah" class="">
                    <i class='mdi mdi-plus'></i>
                </a>
            </button>

        </div>





        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table id="table_id" class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>NAMA</th>
                                <th>ID SUPPLIER</th>
                                <th>SATUAN</th>
                                <th>HARGA</th>
                                <th>STOK</th>
                                <th width="50px">AKSI</th>
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
                                <td><?php echo $row['id_supplier']; ?></td>
                                <td><?php echo $row['satuan']; ?></td>
                                <td>Rp<?php echo $row['harga']; ?></td>
                                <td><?php echo $row['stok']; ?></td>
                                <td align="center" width="250px">
                                    <a class="editb"
                                        href="?page=barang&action=update&id_barang=<?php echo $row['id_barang']; ?>"><i
                                            class='mdi mdi-pencil-box-outline' style="color: #624DE3;"></i></a>
                                    <a onclick="return confirm('Anda yakin menghapus data ini ?')" class="editb"
                                        href="?page=barang&action=hapus&id_barang=<?php echo $row['id_barang']; ?>"><i
                                            class='mdi mdi-delete-outline' style="color: #A30D11;"></i></a>
                                </td>
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
            <form action="../cetak/cetak_barang.php" target="_blank" class="d-flex justify-content-end ">
                <button class="add mt-4" type="submit">
                    <i class='mdi mdi-printer'></i> Print
                </button>
            </form>
        </div>
    </div>
</section>