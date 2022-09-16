<section class="main-panel">
    <div class="container">

        <div class="section-title d-flex func">
            <h3 class="fw-bolder mb-4">Data Supplier</h3>
            <button class="add1">
                <a href="?page=supplier&action=tambah" class="">
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
                                <th width="5%">ID</th>
                                <th width="30%">NAMA</th>
                                <th width="20%">NO HP</th>
                                <th width="40%">ALAMAT</th>
                                <th width="5%">AKSI</th>
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
                                <td align="center" width="250px">
                                    <a class="editb"
                                        href="?page=supplier&action=update&id_supplier=<?php echo $row['id_supplier']; ?>"><i
                                            class='mdi mdi-pencil-box-outline' style="color: #624DE3;"></i></a>
                                    <a onclick="return confirm('Anda yakin menghapus data ini ?')" class="editb"
                                        href="?page=supplier&action=hapus&id_supplier=<?php echo $row['id_supplier']; ?>"><i
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
    </div>
</section>