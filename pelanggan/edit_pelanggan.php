<section class="main-panel d-flex">
    <div class="container card">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Edit Pelanggan</h3>

        </div>
        <?php 
        $kode = $_GET['id_pelanggan'];
        $sql = pg_query($conn, "select * from pelanggan where id_pelanggan='$kode'");
        $tampil = pg_fetch_assoc($sql);

if (isset($_POST['simpan'])) {

$nama = $_POST['nama_pelanggan'];
$telpon = $_POST['no_hp'];
$alamat = $_POST['alamat'];


$sql = pg_query($conn,"update  pelanggan  set nama_pelanggan='$nama',no_hp='$telpon', alamat='$alamat' where id_pelanggan='$kode'");

if ($sql) {
?>

        <script type="text/javascript">
        alert("Data Berhasil di Edit");
        window.location.href = "?page=pelanggan";
        </script>


        <?php
}
}


?>
        <form method="POST">

            <label for="">Nama</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="nama_pelanggan" value="<?php echo $tampil['nama_pelanggan']?>"
                        class="form-control" />
                </div>
            </div>

            <label for="">No HP</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="number" name="no_hp" maxlength="12" value="<?php echo $tampil['no_hp']?>"
                        class="form-control" />
                </div>
            </div>

            <label for="">Alamat</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="alamat" value="<?php echo $tampil['alamat']?>" class="form-control" />
                </div>
            </div>







            <input type="submit" name="simpan" value="Simpan" class="but mb-4 w-25">

        </form>


    </div>
</section>