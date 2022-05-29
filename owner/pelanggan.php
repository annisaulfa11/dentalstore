<section class="main-panel">
    <div class="container">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Data Pelanggan</h3>

        </div>

        <button class="add">
            <a href="?page=pelanggan&action=cetak" class="">
                <i class='mdi mdi-printer'></i>
            </a>
        </button>




        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>ID PELANGGAN</th>
                                <th>NAMA</th>
                                <th>NO HP</th>
                                <th>ALAMAT</th>
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