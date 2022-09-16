<?php
header('Content-Type: application/json');
require("../config.php");

$id_barang = $_GET['id_barang'];

$sql = pg_query($conn,"select * from barang where id_barang='$id_barang'");

$tampil = pg_fetch_assoc($sql);

echo json_encode($tampil);

?>