<section class="main-panel d-flex">
    <div class="container card">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Tambah Pelanggan</h3>

        </div>
        <?php 

if (isset($_POST['simpan'])) {
$nama = $_POST['nama_pelanggan'];
$telpon = $_POST['no_hp'];
$alamat = $_POST['alamat'];


$sql = pg_query($conn, "insert into pelanggan (nama_pelanggan,no_hp,alamat) values('$nama','$telpon','$alamat')");

if ($sql) {
?>

        <script type="text/javascript">
        alert("Data Berhasil di Simpan");
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
                    <input type="text" name="nama_pelanggan" class="form-control" required />
                </div>
            </div>

            <label for="">No HP</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="no_hp" maxlength="12" class="form-control" required />
                </div>
            </div>


            <label for="">Alamat</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="alamat" class="form-control" required />
                </div>
            </div>




            <input type="submit" name="simpan" value="Simpan" class="but mb-4 w-25">

        </form>


    </div>
</section>