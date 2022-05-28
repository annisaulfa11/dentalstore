<?php
    include "../nofaktur.php";
   $nofaktur = kode_random(5);
   if(isset($_POST['simpan'])){
     
   
       // SIMPAN DATA PENJUALAN
       $date = date("Y-m-d");
       $id_pelanggan = $_POST['pelanggan'];

   
       $sql = "INSERT into transaksi (no_faktur,tanggal,id_pelanggan,total) values ('$nofaktur','$date','$id_pelanggan','$total')";
       $hasil = pg_query($conn,$sql);


   
        if ($hasil) {
          ?>

<script>
alert('data berhasil disimpan ');
</script>
<?php
        }
        $sql = "select * from detail_transaksi where no_faktur='$nofaktur'";
        $barang = pg_query($conn,$sql);
 
   
         while ($data_barang = pg_fetch_assoc($barang)) {
   
            pg_query($conn,"UPDATE barang SET stok=stok -'$data_barang[qty]' WHERE id_barang='$data_barang[id_barang]'");
               echo "<script>alert('data tidak mencukupi ');</script>";
   
           }
          
         }

   
     if(isset($_POST['tambahkan'])){
       // TAMBAH BARANG KE PENJUALAN
       $nofaktur = $_GET['no_faktur'];
       $id_barang = $_POST['id_barang'];
       $pelanggan = $_POST['pelanggan'];
       $total_bayar = $_POST['total_bayar'];
       $qty = $_POST['qty'];
       $s_total = $_POST['s_total'];
       
      
       pg_query($conn,"insert into detail_transaksi(no_faktur,id_barang,qty,total) values ('$nofaktur','$id_barang','$qty','$s_total')");
     }
    
   ?>

<section class="main-panel d-flex">
    <div class="container card">
        <div class="section-title">
            <h3 class="fw-bolder mb-4">Data Barang</h3>

        </div>
        <form action="" method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>No Faktur</label>
                        <input type="text" class="form-control" name="nofaktur" value="<?php echo $nofaktur; ?>"
                            readonly="">
                    </div>
                    <div class="form-group">
                        <label for="id_barang">Id Barang</label>
                        <input type="text" class="form-control" name="id_barang" maxlength="5" onkeyup="hitung()"
                            required>
                    </div>
                    <div class="form-group button">
                        <input type="submit" name="tambahkan" value="Tambahkan" class="but">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input class="form-control" type="text" readonly="" style="text-align: right;"
                            name="total_bayar" id="total_bayar" onkeyup="hitungSubTotal(detail_barang)"
                            value="<?php echo $total_bayar;?>">
                    </div>
                    <div class="form-group">
                        <label>qty : </label>
                        <input class="form-control" type="number" style="text-align: right;" name="qty" id="qty" min="1"
                            value="" onkeyup="hitungSubTotal(detail_barang)" required>
                    </div>
                    <div class="form-group">
                        <label>Sub Total : </label>
                        <input class="form-control" type="number" style="text-align: right;" name="s_total" id="s_total"
                            required>

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
                                <th>qty</th>
                                <th>TOTAL</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../config.php";
                                $no = 1;
                                $total_bayar = 0;
     $sql1 = "select a.*, b.nama_barang , a.qty, b.harga from detail_transaksi a JOIN barang b ON a.id_barang = b.id_barang WHERE a.no_faktur ='$nofaktur'";
     $data = pg_query($conn,$sql1);
     while($row = pg_fetch_assoc($data)) {
        $total_bayar += $row['total'];
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
                                        href="?kodepj=<?=$_GET['nofaktur']?>&page=transaksi&aksi=hapus&id=<?php echo $row['id']?>"
                                        class="btn btn-danger">Delete</a>
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
                      <option value='$id_konsumen[id_pelanggan]'>$id_konsumen[nama]</option>
                    ";
                  }
                  ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" class="form-control" name="total_bayar"
                            value="<?php echo $total_bayar; ?>" />
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
var detail_barang = null;

function hitung() {
    var id_barang = document.getElementsByName("id_barang")[0].value;
    if (id_barang != "") {
        // Jika barcode sudah terisi, maka ambil data barangnya
        axios.get("page/penjualan/ambil-detail-barang.php?id_barang=" + id_barang)
            .then(function(res) {
                detail_barang = res.data;

                if (detail_barang == null) {
                    document.getElementsByName("total_bayar")[0].value = 1;
                } else {
                    document.getElementsByName("total_bayar")[0].value = detail_barang.harga_jual;
                }
                hitungSubTotal(detail_barang);
            })
    }

}

function hitungSubTotal(detail_barang_sekarang) {
    var qty = parseInt(document.getElementById('qty').value);
    detail_barang_sekarang.stok = parseInt(detail_barang.stok);

    // cek qty yang diketik apakah dibawah stok atau tidak
    if (qty > detail_barang_sekarang.stok) {
        alert("qty barang melebihi stok");
        document.getElementById('qty').value = 0;
    } else if (qty == 0) {
        alert("qty barang tidak boleh kosong");
        document.getElementById('qty').value = 1;
    } else {
        var total_bayar = document.getElementById('total_bayar').value * qty;
        var sub_total = parseInt(total_bayar);
        if (!isNaN(sub_total)) {
            var s_total = document.getElementById('s_total').value = sub_total;
        }
    }
}
</script>