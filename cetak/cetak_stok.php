<!DOCTYPE html>
<html>

<head>
    <style>
    table {
        border-collapse: collapse;
        text-align: center;
        padding: 10px;
    }
    </style>
    <title>CETAK BARANG</title>
</head>

<body>

    <center>

        <h2>DATA LAPORAN BARANG</h2>
        <h4>XENON DENTAL STORE</h4>

    </center>

    <table border="1" style="width: 100%;">
        <thead>
            <tr>
                <th>ID </th>
                <th>TANGGAL</th>
                <th>ID SUPPLIER</th>
                <th>ID BARANG</th>
                <th>NAMA BARANG</th>
                <th>STOK</th>
            </tr>
        </thead>
        <tbody>
            <?php
                                include "../config.php";
                                $no = 1;

     $sql = "select a.*, b.nama_barang, b.id_supplier, c.nama_supplier from stok a, barang b, supplier c where a.id_barang = b.id_barang and b.id_supplier = c.id_supplier";
     $hasil = pg_query($conn,$sql);
     while($row = pg_fetch_assoc($hasil)) {
    ?>
            <tr class="alert">
                <td><?php echo $no++?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo $row['nama_supplier']; ?></td>
                <td><?php echo $row['id_barang']; ?></td>
                <td><?php echo $row['nama_barang']; ?></td>
                <td><?php echo $row['stok']; ?></td>
            </tr>
            <?php
     }
     pg_close($conn);
 ?>

        </tbody>
    </table>

    <script>
    window.print();
    </script>

</body>

</html>