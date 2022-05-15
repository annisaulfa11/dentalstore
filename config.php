<?php

$host       =  "localhost";
$dbuser     =  "postgres";
$dbpass     =  "postgres";
$port       =  "5432";
 $dbname    =  "dental_house_store";

// script koneksi php postgree
$link = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
 
if($link)
{
    echo "Koneksi Berhasil";
}else
{
    echo "Gagal melakukan Koneksi";
}
?>