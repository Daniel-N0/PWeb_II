<?php
require_once 'Model.php';

$id_buku = '';
$judul_buku = '';
$penulis = '';
$penerbit = '';
$tahun_terbit = '';
$is_edit = false;

if (isset($_GET['id_edit'])) {
    $is_edit = true;
    $id_buku = $_GET['id_edit'];
    $buku = getBukuById($id_buku);
    
    if ($buku) {
        $judul_buku = $buku['judul_buku'];
        $penulis = $buku['penulis'];
        $penerbit = $buku['penerbit'];
        $tahun_terbit = $buku['tahun_terbit'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    if (isset($_POST['id_buku']) && !empty($_POST['id_buku'])) {
        $id_buku = $_POST['id_buku'];
        if (editBuku($id_buku, $judul_buku, $penulis, $penerbit, $tahun_terbit)) {
            header("Location: Buku.php");
            exit;
        }
    } else {
        if (tambahBuku($judul_buku, $penulis, $penerbit, $tahun_terbit)) {
            header("Location: Buku.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $is_edit ? "Edit" : "Tambah" ?> Data Buku</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .form-container { background: white; padding: 30px 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 500px; }
        h2 { text-align: center; color: #2c3e50; margin-bottom: 25px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 16px; }
        input[type="text"]:focus, input[type="number"]:focus { border-color: #007bff; outline: none; }
        .btn-submit { width: 100%; padding: 12px; border: none; border-radius: 5px; font-size: 16px; font-weight: bold; cursor: pointer; color: white; background-color: #28a745; margin-top: 15px; }
        .btn-submit:hover { background-color: #218838; }
        .back-link { position: fixed; bottom: 20px; left: 20px; text-decoration: none; color: #333; font-weight: bold; background-color: white; padding: 10px 15px; border-radius: 5px; box-shadow: 0 2px 8px rgba(0,0,0,0.15); transition: all 0.3s; }
        .back-link:hover { background-color: #e2e6ea; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="form-container">
    <h2><?= $is_edit ? "Form Edit Buku" : "Form Tambah Buku" ?></h2>
    
    <form action="" method="POST" autocomplete="off">
        <input type="hidden" name="id_buku" value="<?= $id_buku ?>">

        <div class="form-group">
            <label for="judul_buku">Judul Buku:</label>
            <input type="text" id="judul_buku" name="judul_buku" required value="<?= htmlspecialchars($judul_buku) ?>">
        </div>

        <div class="form-group">
            <label for="penulis">Penulis:</label>
            <input type="text" id="penulis" name="penulis" required value="<?= htmlspecialchars($penulis) ?>">
        </div>

        <div class="form-group">
            <label for="penerbit">Penerbit:</label>
            <input type="text" id="penerbit" name="penerbit" required value="<?= htmlspecialchars($penerbit) ?>">
        </div>

        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" required value="<?= htmlspecialchars($tahun_terbit) ?>">
        </div>

        <button type="submit" class="btn btn-submit">Simpan Data</button>
    </form>
</div>

<a href="Buku.php" class="back-link">Kembali ke Tabel</a>

</body>
</html>