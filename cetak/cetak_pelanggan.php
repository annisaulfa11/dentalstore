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
    <title>CETAK PELANGGAN</title>
</head>

<body>

    <center>

        <h2>DATA LAPORAN PELANGGAN</h2>
        <h4>XENON DENTAL STORE</h4>

    </center>

    <table border="1" style="width: 100%;">
        <thead>
            <tr>
                <th>ID PELANGGAN</th>
                <th>NAMA</th>
                <th>NO HP</th>
                <th>ALAMAT</th>
            </tr>
        </thead>
        <tbody>
            <?php
                                include "../config.php";
                                $no = 1;
     $sql = "select * from pelanggan order by id_pelanggan";
     $hasil = pg_query($conn,$sql);
     while($row = pg_fetch_assoc($hasil)) {
    ?>
            <tr class="alert">
                <td><?php echo $no++?></td>
                <td><?php echo $row['nama_pelanggan']; ?></td>
                <td><?php echo $row['no_hp']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
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