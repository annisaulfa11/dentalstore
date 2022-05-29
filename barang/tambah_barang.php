<section class="main-panel d-flex">
    <div class="container card">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Tambah Barang</h3>

        </div>
        <?php 

if (isset($_POST['simpan'])) {
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$satuan = $_POST['satuan'];
$id_supplier = $_POST['supplier'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$id_kategori = $_POST['idk'];



$sql = pg_query($conn, "insert into barang (id_barang,nama_barang,id_supplier,stok,satuan,harga, id) values('$id_barang','$nama_barang','$id_supplier','$stok','$satuan','$harga','$id_kategori')");

if ($sql) {
?>

        <script type="text/javascript">
        alert("Data Berhasil di Simpan");
        window.location.href = "?page=barang";
        </script>


        <?php
}
}
?>

        <form method="POST" class="d-flex">
            <div class="col-sm-6">
                <label for="">Id Barang</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="id_barang" class="form-control" maxlength="5" required />
                    </div>
                </div>

                <label for="">Nama</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="nama_barang" class="form-control" required />
                    </div>
                </div>

                <label for="">Satuan</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="satuan" class="form-control" required />
                    </div>
                </div>

                <label for="">Harga</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="number" name="harga" class="form-control" required />
                    </div>
                </div>

                <input type="submit" name="simpan" value="Simpan" class="but mb-4 w-50 mt-2">

            </div>
            <div class="col-sm-6">


                <label for="">Stok</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="number" name="stok" class="form-control" required />
                    </div>
                </div>

                <label for="">Supplier</label>
                <div class="form-group">
                    <select name="supplier" data-placeholder="Pilih Kategori" class="form-control">
                        <?php 
                  $supplier = pg_query($conn, "select * from supplier order by id_supplier");
                  while ($id = pg_fetch_assoc($supplier)) {
                    echo "
                      <option value='$id[id_supplier]'>$id[nama_supplier]</option>
                    ";
                  }
                  ?>
                    </select>
                </div>

                <label for="">Kategori</label>
                <div class="form-group">
                    <select name="idk" data-placeholder="Pilih Kategori" class="form-control">
                        <?php 
                  $detail_kategori = pg_query($conn, "select * from detail_kategori order by id");
                  while ($id = pg_fetch_assoc($detail_kategori)) {
                    echo "
                      <option value='$id[id]'>$id[desc]</option>
                    ";
                  }
                  ?>
                    </select>
                </div>


            </div>

        </form>


    </div>
</section>