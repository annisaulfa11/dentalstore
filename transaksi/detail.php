<section class="main-panel">
    <div class="container">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Detail Transaksi</h3>

        </div>






        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nofaktur = $_GET['nofaktur'];
                            $no = 1;
		$sql= pg_query($conn,"SELECT * from transaksi, detail_transaksi, barang
                      where transaksi.no_faktur = detail_transaksi.no_faktur
                      and detail_transaksi.id_barang=barang.id_barang
                      and transaksi.no_faktur='$nofaktur'");
    $total_keseluruhan = 0;
		while($tampil = pg_fetch_assoc($sql)){ 
      $total_keseluruhan += $tampil['harga'] * $tampil['qty'];
      $total = $tampil['harga'] * $tampil['qty'];
	?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $tampil['nama_barang'];?></td>
                                <td><?php echo "Rp. ".number_format($tampil['harga'])?></td>
                                <td><?php echo $tampil['qty'];?></td>
                                <td><?php echo $total;?></td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>