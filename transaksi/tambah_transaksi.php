<?php $barang=pg_query($conn, "SELECT * FROM barang");
$jsArray = "var harga = new Array();";
$jsArray1 = "var nama_barang = new Array();";  
$jsArray2 = "var stok = new Array();";  
 ?>
<?php
    
   $nofaktur = $_GET['nofaktur'];

   if(isset($_POST['simpan'])){
     
   
       // SIMPAN DATA PENJUALAN
       $date = date("Y-m-d");
       $id_pelanggan = $_POST['pelanggan'];
       $harga = $_POST['harga'];

   
       $sql = "INSERT into transaksi (no_faktur,tanggal,id_pelanggan,total) values ('$nofaktur','$date','$id_pelanggan','$harga')";
       $hasil = pg_query($conn,$sql);


   
        if ($hasil) {
          ?>

<script>
alert('data berhasil disimpan ');
window.location = "../transaksi/struk.php?nofaktur=<?= $nofaktur ?>";
</script>
<?php
        }
        $sql = "select * from detail_transaksi where no_faktur='$nofaktur'";
        $barang = pg_query($conn,$sql);
 
   
         while ($data_barang = pg_fetch_assoc($barang)) {
   
            pg_query($conn,"UPDATE barang SET stok=stok -'$data_barang[qty]' WHERE id_barang='$data_barang[id_barang]'");
   
           }

         }

   
     if(isset($_POST['tambahkan'])){
       // TAMBAH BARANG KE PENJUALAN
       $nofaktur = $_GET['nofaktur'];
       $id_barang = $_POST['kode_barang'];
       $pelanggan = $_POST['pelanggan'];
       $harga = $_POST['harga'];
       $qty = $_POST['qty'];
       $s_total = $_POST['subtotal'];
       
      
       pg_query($conn,"insert into detail_transaksi(no_faktur,id_barang,qty,total) values ('$nofaktur','$id_barang','$qty','$s_total')");
     }
    
   ?>

<section class="main-panel d-flex">
    <div class="container card">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Data Barang</h3>

        </div>
        <form method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tgl. Transaksi</label>
                        <input type="text" class="form-control form-control-sm" name="tgl_input"
                            value="<?php echo  date("j F Y");?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>No Faktur</label>
                        <input type="text" class="form-control" name="nofaktur" value="<?php echo $nofaktur; ?>"
                            readonly="">
                    </div>

                    <div class="form-group">
                        <label>Id Barang</label>
                        <input type="text" name="kode_barang" class="form-control" list="datalist1"
                            onchange="changeValue(this.value)" aria-describedby="basic-addon2" required>
                        <datalist id="datalist1">
                            <?php if(pg_num_rows($barang)) {?>
                            <?php while($row_brg= pg_fetch_array($barang)) {?>
                            <option value="<?php echo $row_brg["id_barang"]?>"> <?php echo $row_brg["id_barang"]?>
                                <?php $jsArray .= "harga['" . $row_brg['id_barang'] . "'] = {harga:'" . addslashes($row_brg['harga']) . "'};";
                                $jsArray1 .= "nama_barang['" . $row_brg['id_barang'] . "'] = {nama_barang:'" . addslashes($row_brg['nama_barang']) . "'};"; 
                                $jsArray2 .= "stok['" . $row_brg['id_barang'] . "'] = {stok:'" . addslashes($row_brg['stok']) . "'};";} ?>
                                <?php } ?>
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" readonly>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input type="number" class="form-control" id="harga" onchange="total()"
                            value="<?php echo $row['harga'];?>" name="harga" readonly>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control" name="stok" id="stok"
                            value="<?php echo $row['stok'];?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jumlah: </label>
                        <input type="number" class="form-control form-control-sm" id="qty" onchange="total()" name="qty"
                            placeholder="0" required>
                    </div>
                    <div class="form-group">
                        <label>Sub Total : </label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="subtotal" name="subtotal"
                                onchange="total()" name="subtotal" readonly>

                        </div>
                    </div>
                    <div class="form-group button">
                        <input type="submit" name="tambahkan" value="Tambahkan" class="but">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container card">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Data Transaksi</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>HARGA</th>
                                <th>JUMLAH</th>
                                <th>TOTAL</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../config.php";
                                $no = 1;
                                $harga = 0;
     $sql1 = "select a.*, b.nama_barang , a.qty, b.harga from detail_transaksi a JOIN barang b ON a.id_barang = b.id_barang WHERE a.no_faktur ='".$_GET['nofaktur']."'";
     $data = pg_query($conn,$sql1);
     while($row = pg_fetch_assoc($data)) {
        $harga += $row['total'];
    ?>
                            <tr class="alert">
                                <td><?php echo $no++;?></td>
                                <td><?php echo $row['id_barang']; ?></td>
                                <td><?php echo $row['nama_barang']; ?></td>
                                <td>Rp<?php echo number_format($row['harga']); ?></td>
                                <td><?php echo number_format($row['qty']); ?></td>
                                <td>Rp<?php echo number_format($row['total']); ?></td>
                                <td>
                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini !')"
                                        href="?nofaktur=<?=$_GET['nofaktur']?>&page=transaksi&action=hapus&id=<?php echo $row['id']?>"
                                        class='editb'><i class='mdi mdi-delete-outline' style="color: #A30D11;"></i></a>
                                </td>
                                </td>
                            </tr>
                            <?php
     }
 ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container card">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Pelanggan</h3>
        </div>
        <form action="" method="POST" target="_blank">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Pelanggan</label>

                        <select name="pelanggan" class="form-control">
                            <?php 
                  $pelanggan = pg_query($conn, "select * from pelanggan order by id_pelanggan");
                  while ($id_pelanggan = pg_fetch_assoc($pelanggan)) {
                    echo "
                      <option value='$id_pelanggan[id_pelanggan]'>$id_pelanggan[nama_pelanggan]</option>
                    ";
                  }
                  ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" class="form-control" name="harga" value="<?php echo $harga; ?>" />
                    </div>
                    <div class="text-right">
                        <input type="submit" name="simpan" value="Simpan" class="but mt-1 mb-3">

                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript">
<?php echo $jsArray; ?>
<?php echo $jsArray1; ?>
<?php echo $jsArray2; ?>

function changeValue(id_barang) {
    document.getElementById("nama_barang").value = nama_barang[id_barang].nama_barang;
    document.getElementById("harga").value = harga[id_barang].harga;
    document.getElementById("stok").value = stok[id_barang].stok;

};

function total() {
    var harga = parseInt(document.getElementById('harga').value);
    var jumlah_beli = parseInt(document.getElementById('qty').value);
    var jumlah_harga = harga * jumlah_beli;
    document.getElementById('subtotal').value = jumlah_harga;
}

function totalnya() {
    var harga = parseInt(document.getElementById('hargatotal').value);
    var pembayaran = parseInt(document.getElementById('bayarnya').value);
    var kembali = pembayaran - harga;
    document.getElementById('total1').value = kembali;
}

function printContent(print) {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(print).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>