<?php
	$kode = $_GET['id_barang'];
	$sql = pg_query($conn,"delete from barang where id_barang='$kode'");
   
?>

<script type="text/javascript">
alert("Data Berhasil di Hapus");
window.location.href = "?page=barang";
</script>