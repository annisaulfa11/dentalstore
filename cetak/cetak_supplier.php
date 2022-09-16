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
    <title>CETAK SUPPLIER</title>
</head>

<body>

    <center>

        <h2>DATA LAPORAN SUPPLIER</h2>
        <h4>XENON DENTAL STORE</h4>

    </center>

    <table border="1" style="width: 100%;">
        <thead>
            <tr>
                <th width="50px">ID</th>
                <th width="200px">NAMA</th>
                <th width="130px">NO HP</th>
                <th width="250px">ALAMAT</th>
            </tr>
        </thead>
        <tbody>
            <?php
                                include "../config.php";
                                $no = 1;
     $sql = "select * from supplier order by id_supplier";
     $hasil = pg_query($conn,$sql);
     while($row = pg_fetch_assoc($hasil)) {
    ?>
            <tr class="alert">
                <td><?php echo $row['id_supplier']; ?></td>
                <td><?php echo $row['nama_supplier']; ?></td>
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