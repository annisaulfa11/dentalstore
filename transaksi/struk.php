<?php 
require("../config.php");

$kode = pg_fetch_assoc(pg_query($conn, "SELECT * FROM transaksi WHERE no_faktur='$_GET[nofaktur]'"));
$nofaktur = $kode['no_faktur'];
$tanggal = $kode['tanggal'];
?>

<body onload="javascript:print()">
    <h4>Struk Belanjaan</h4>
    <table>
        <tr>
            <td>XENON DENTAL STORE</td>
        </tr>
        <tr>
            <td>Jalan Palembang No.11, Ulak Karang Selatan, Padang</td>
        </tr>
    </table>

    <table>
        <tr>

        </tr>
        <tr>
            <br>
            <td>No Faktur &nbsp&nbsp</td>
            <td>: &nbsp&nbsp <?php echo $nofaktur ?></td>
        </tr>
        <tr>
            <br>
            <td>Tanggal &nbsp&nbsp</td>
            <td>: &nbsp&nbsp <?php echo $tanggal ?></td>
        </tr>
    </table>

    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah Beli</th>
            <th>Sub Total</th>
        </tr>
        <?php
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
            <td><?php echo $tampil['nama_barang'];?></td>
            <td><?php echo "Rp. ".number_format($tampil['harga'])?></td>
            <td><?php echo $tampil['qty'];?></td>
            <td><?php echo $total;?></td>
        </tr>
        <?php } ?>
    </table>
    <table align="left" style="border: none;">
        <tr>
            <td>Total &nbsp&nbsp</td>
            <td>: &nbsp&nbsp <?php echo $total_keseluruhan ?></td><br>
        </tr>
    </table>
</body>