 <?php
    include "../nofaktur.php";
    ?>
 <section class="main-panel">
     <div class="container">

         <div class="section-title d-flex func">
             <h3 class="fw-bolder mb-4">Data Transaksi</h3>
             <button class="add1">
                 <a href="?page=transaksi&action=tambah&nofaktur=<?php echo $nofaktur; ?>" class="">
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
                                 <th>NO</th>
                                 <th>NO FAKTUR</th>
                                 <th>TANGGAL</th>
                                 <th>ID PELANGGAN</th>
                                 <th>TOTAL</th>
                                 <th>AKSI</th>
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
                                 <td align="center" width="250px">
                                     <a class="editb"
                                         href="?page=transaksi&action=detail&nofaktur=<?php echo $row['no_faktur']; ?>"><i
                                             class='mdi mdi-playlist-check' style="color: #0066FF;"></i></a>
                                     <a class="editb"
                                         href="../transaksi/struk.php?nofaktur=<?php echo $row['no_faktur']; ?>"><i
                                             class='mdi mdi-printer' style="color: #624DE3;"></i></a>
                                 </td>
                             </tr>
                             <?php
     }

 ?>

                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </section>