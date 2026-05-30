<?php
require_once 'Model.php';

date_default_timezone_set('Asia/Jakarta');

$id_member = '';
$nama_member = '';
$nomor_member = '';
$alamat = '';
$tgl_mendaftar = date('Y-m-d\TH:i');
$tgl_terakhir_bayar = '';
$is_edit = false;

if (isset($_GET['id_edit'])) {
    $is_edit = true;
    $id_member = $_GET['id_edit'];
    $member = getMemberById($id_member);
    
    if ($member) {
        $nama_member = $member['nama_member'];
        $nomor_member = $member['nomor_member'];
        $alamat = $member['alamat'];
        $tgl_mendaftar = date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar']));
        $tgl_terakhir_bayar = $member['tgl_terakhir_bayar'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_member = $_POST['nama_member'];
    $nomor_member = $_POST['nomor_member'];
    $alamat = $_POST['alamat'];
    $tgl_mendaftar = date('Y-m-d H:i:s', strtotime($_POST['tgl_mendaftar']));
    $tgl_terakhir_bayar = $_POST['tgl_terakhir_bayar'];

    if (isset($_POST['id_member']) && !empty($_POST['id_member'])) {
        $id_member = $_POST['id_member'];
        if (editMember($id_member, $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar)) {
            header("Location: Member.php");
            exit;
        }
    } else {
        if (tambahMember($nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar)) {
            header("Location: Member.php");
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
    <title><?= $is_edit ? "Edit" : "Tambah" ?> Data Member</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; padding: 20px; box-sizing: border-box; }
        .form-container { background: white; padding: 30px 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 500px; }
        h2 { text-align: center; color: #2c3e50; margin-bottom: 25px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input[type="text"], input[type="datetime-local"], input[type="date"], textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 16px; font-family: inherit; }
        input:focus, textarea:focus { border-color: #007bff; outline: none; }
        .btn-submit { width: 100%; padding: 12px; border: none; border-radius: 5px; font-size: 16px; font-weight: bold; cursor: pointer; color: white; background-color: #28a745; margin-top: 15px; }
        .btn-submit:hover { background-color: #218838; }    
        .back-link { position: fixed; bottom: 20px; left: 20px; text-decoration: none; color: #333; font-weight: bold; background-color: white; padding: 10px 15px; border-radius: 5px; box-shadow: 0 2px 8px rgba(0,0,0,0.15); transition: all 0.3s; }
        .back-link:hover { background-color: #e2e6ea; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="form-container">
    <h2><?= $is_edit ? "Form Edit Member" : "Form Tambah Member" ?></h2>
    
    <form action="" method="POST" autocomplete="off">
        <input type="hidden" name="id_member" value="<?= $id_member ?>">

        <div class="form-group">
            <label for="nama_member">Nama Member:</label>
            <input type="text" id="nama_member" name="nama_member" required value="<?= htmlspecialchars($nama_member) ?>">
        </div>

        <div class="form-group">
            <label for="nomor_member">Nomor Member:</label>
            <input type="text" id="nomor_member" name="nomor_member" required value="<?= htmlspecialchars($nomor_member) ?>">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="3" required><?= htmlspecialchars($alamat) ?></textarea>
        </div>

        <div class="form-group">
            <label for="tgl_mendaftar">Tanggal Mendaftar:</label>
            <input type="datetime-local" id="tgl_mendaftar" name="tgl_mendaftar" required value="<?= $tgl_mendaftar ?>">
        </div>

        <div class="form-group">
            <label for="tgl_terakhir_bayar">Tanggal Terakhir Bayar:</label>
            <input type="date" id="tgl_terakhir_bayar" name="tgl_terakhir_bayar" required value="<?= $tgl_terakhir_bayar ?>">
        </div>

        <button type="submit" class="btn btn-submit">Simpan Data</button>
    </form>
</div>

<a href="Member.php" class="back-link">Kembali ke Tabel</a>

</body>
</html>