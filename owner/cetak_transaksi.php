<!DOCTYPE html>
<html>
<head>
	<title>CETAK TRANSAKSI</title>
</head>
<body>

	<center>

		<h2>DATA LAPORAN TRANSAKSI</h2>
		<h4>XENON DENTAL STORE</h4>

	</center>

	<table border="1" style="width: 100%">
		<tr>
            <th width="1%">N0</th>
            <th>NO FAKTUR</th>
            <th>TANGGAL</th>
            <th>ID PELANGGAN</th>
            <th width="5%">TOTAL</th>
		</tr>
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
            <td>Rp<?php echo $row['total']; ?></td>
        </tr>
		<?php 
		}
		?>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>