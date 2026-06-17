<?php
class koneksiDB {
    function getKoneksi() {
        $host = "localhost";
        $username = "root";
        $pass = ""; // Sesuaikan dengan password database Anda
        $db  = "kantor";
        
        $konek = mysqli_connect($host, $username, $pass, $db) or die ("Koneksi gagal " . mysqli_connect_error());
        return $konek;
    }
}
?>