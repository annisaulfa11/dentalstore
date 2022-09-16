<section class="main-panel d-flex">
    <div class="container card">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Tambah Barang</h3>

        </div>
        <?php 
        $kode = $_GET['id_barang'];
        $sql = pg_query($conn, "select * from barang where id_barang='$kode'");
        $tampil = pg_fetch_assoc($sql);

if (isset($_POST['simpan'])) {
    $nama_barang = $_POST['nama_barang'];
    $satuan = $_POST['satuan'];
    $id_supplier = $_POST['supplier'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_kategori = $_POST['idk'];
    

    if($stok < 1){
        ?>
        <script type="text/javascript">
        alert("Masukkan STOK dengan benar!");
        window.location.href = "?page=barang&action=update&id_barang=<?php echo $kode; ?>";
        </script>
        <?php
    }  else if($harga < 1000){
        ?>
        <script type="text/javascript">
        alert("Masukkan HARGA dengan benar!");
        window.location.href = "?page=barang&action=update&id_barang=<?php echo $kode; ?>";
        </script>
        <?php
    } else {
        $sql = pg_query($conn,"update  barang  set nama_barang='$nama_barang',satuan='$satuan', id_supplier='$id_supplier', harga='$harga', stok='$stok', id ='$id_kategori' where id_barang='$kode'");
    }

if ($sql) {
?>

        <script type="text/javascript">
        alert("Data Berhasil di Edit");
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
                        <input type="text" value="<?php echo $tampil['id_barang']?>" name="id_barang"
                            class="form-control" maxlength="5" readonly />
                    </div>
                </div>

                <label for="">Nama</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" value="<?php echo $tampil['nama_barang']?>" name="nama_barang"
                            class="form-control" required />
                    </div>
                </div>

                <label for="">Satuan</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" value="<?php echo $tampil['satuan']?>" name="satuan" class="form-control"
                            required />
                    </div>
                </div>

                <label for="">Harga</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="number" value="<?php echo $tampil['harga']?>" name="harga" class="form-control"
                            required />
                    </div>
                </div>

                <input type="submit" name="simpan" value="Simpan" class="but mb-4 w-50 mt-2">

            </div>
            <div class="col-sm-6">


                <label for="">Stok</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="number" value="<?php echo $tampil['stok']?>" name="stok" class="form-control"
                            readonly />
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