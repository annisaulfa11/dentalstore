<?php
	$kode = $_GET['id_pelanggan'];
	$sql = pg_query($conn,"delete from pelanggan where id_pelanggan='$kode'");
   
?>

<script type="text/javascript">
alert("Data Berhasil di Hapus");
window.location.href = "?page=pelanggan";
</script>