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
                <th>NAMA</th>
                <th>SATUAN</th>
                <th>HARGA</th>
                <th>STOK</th>
            </tr>
        </thead>
        <tbody>
            <?php
                                include "../config.php";
                                $no = 1;
     $sql = "select * from barang";
     $hasil = pg_query($conn,$sql);
     while($row = pg_fetch_assoc($hasil)) {
    ?>
            <tr class="alert">
                <td><?php echo $row['id_barang']; ?></td>
                <td><?php echo $row['nama_barang']; ?></td>
                <td><?php echo $row['satuan']; ?></td>
                <td>Rp<?php echo number_format($row['harga']); ?></td>
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