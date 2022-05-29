<?php
	$kode = $_GET['id_supplier'];
	$sql = pg_query($conn,"delete from supplier where id_supplier='$kode'");
   
?>

<script type="text/javascript">
alert("Data Berhasil di Hapus");
window.location.href = "?page=supplier";
</script>