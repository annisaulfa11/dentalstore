<section class="main-panel d-flex">
    <div class="container card">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Tambah Supplier</h3>

        </div>
        <?php 

if (isset($_POST['simpan'])) {
$id_supplier = $_POST['id_supplier'];
$nama = $_POST['nama_supplier'];
$telpon = $_POST['no_hp'];
$alamat = $_POST['alamat'];


$sql = pg_query($conn, "insert into supplier (id_supplier,nama_supplier,no_hp,alamat) values('$id_supplier','$nama','$telpon','$alamat')");

if ($sql) {
?>

        <script type="text/javascript">
        alert("Data Berhasil di Simpan");
        window.location.href = "?page=supplier";
        </script>


        <?php
}
}
?>
        <form method="POST">
            <label for="">Id Supplier</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="id_supplier" class="form-control" maxlength="5" required />
                </div>
            </div>
            <label for="">Nama</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="nama_supplier" class="form-control" required />
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