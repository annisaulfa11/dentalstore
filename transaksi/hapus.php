<?php
$nofaktur = $_GET['nofaktur'];
	$id = $_GET['id'];
	$sql = pg_query($conn,"delete from detail_transaksi where id='$id'");
?>

<script type="text/javascript">
alert("Data Berhasil di Hapus");
window.location.href = "?page=transaksi&action=tambah&nofaktur=<?php echo $nofaktur;?>";
</script>