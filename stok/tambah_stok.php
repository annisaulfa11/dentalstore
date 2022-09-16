<section class="main-panel d-flex">
    <div class="container card">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Tambah Stok Barang</h3>

        </div>
        <?php 
        $barang = pg_query($conn, "SELECT * FROM barang");
        $jsArray1 = "var nama_barang = new Array();";  
        $date = date("Y-m-d");

if (isset($_POST['simpan'])) {
$id_barang = $_POST['kode_barang'];
$stok = $_POST['stok'];

$sql = pg_query($conn, "INSERT into stok (tanggal, id_barang, stok) values('$date', '$id_barang','$stok')");
$sql1 = pg_query($conn, "UPDATE barang SET stok=stok + '$stok' WHERE id_barang='$id_barang'");

    ?>
        <script type="text/javascript">
        alert("Data Berhasil di Simpan");
        window.location.href = "?page=barang";
        </script>
        <?php
}

?>

        <form method="POST" class="d-flex" onsubmit="cek()">
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="">Tanggal</label>
                    <div class="form-line">
                        <input type="text" name="tanggal" class="form-control" value="<?php echo  date("d/m/Y");?>"
                            readonly />
                    </div>
                </div>

                <div class="form-group">
                    <label>Id Barang</label>
                    <input type="text" name="kode_barang" class="form-control" list="datalist1"
                        onchange="changeValue(this.value)" aria-describedby="basic-addon2" required>
                    <datalist id="datalist1">
                        <?php if(pg_num_rows($barang)) {?>
                        <?php while($row_brg= pg_fetch_array($barang)) {?>
                        <option value="<?php echo $row_brg["id_barang"]?>"> <?php echo $row_brg["id_barang"]?>
                            <?php 
                                $jsArray1 .= "nama_barang['" . $row_brg['id_barang'] . "'] = {nama_barang:'" . addslashes($row_brg['nama_barang']) . "'};"; 
                                } ?>
                            <?php } ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" readonly>
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


                </select>
            </div>


    </div>

    </form>


    </div>
</section>
<script>
<?php echo $jsArray1; ?>

function changeValue(id_barang) {
    document.getElementById("nama_barang").value = nama_barang[id_barang].nama_barang;
};
</script>