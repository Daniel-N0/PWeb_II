<?php
function koneksi() {
    $host = "localhost";
    $user = "root";       
    $password = "";       
    $db_name = "perpustakaan_daniel"; 
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Koneksi database gagal: " . $e->getMessage());
    }
}
?>