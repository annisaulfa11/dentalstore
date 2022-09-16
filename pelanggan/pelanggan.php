<section class="main-panel">
    <div class="container">

        <div class="section-title d-flex func">
            <h3 class="fw-bolder mb-4">Data Pelanggan</h3>
            <button class="add1">
                <a href="?page=pelanggan&action=tambah" class="">
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
                                <th>ID PELANGGAN</th>
                                <th>NAMA</th>
                                <th>NO HP</th>
                                <th>ALAMAT</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../config.php";
                                $no = 1;
     $sql = "select * from pelanggan order by id_pelanggan";
     $hasil = pg_query($conn,$sql);
     while($row = pg_fetch_assoc($hasil)) {
    ?>
                            <tr class="alert">
                                <td><?php echo $no++?></td>
                                <td><?php echo $row['nama_pelanggan']; ?></td>
                                <td><?php echo $row['no_hp']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td align="center" width="250px">
                                    <a class="editb"
                                        href="?page=pelanggan&action=update&id_pelanggan=<?php echo $row['id_pelanggan']; ?>"><i
                                            class='mdi mdi-pencil-box-outline' style="color: #624DE3;"></i></a>
                                    <a onclick="return confirm('Anda yakin menghapus data ini ?')" class="editb"
                                        href="?page=pelanggan&action=hapus&id_pelanggan=<?php echo $row['id_pelanggan']; ?>"><i
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