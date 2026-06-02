<?php
require_once 'Model.php';

$list_member = getMember();
$list_buku = getBuku();

$id_peminjaman = '';
$id_member_terpilih = '';
$id_buku_terpilih = '';
$tgl_pinjam = '';
$tgl_kembali = '';
$is_edit = false;

if (isset($_GET['id_edit'])) {
    $is_edit = true;
    $id_peminjaman = $_GET['id_edit'];
    $peminjaman = getPeminjamanById($id_peminjaman);
    
    if ($peminjaman) {
        $id_member_terpilih = $peminjaman['id_member'];
        $id_buku_terpilih = $peminjaman['id_buku'];
        $tgl_pinjam = $peminjaman['tgl_pinjam'];
        $tgl_kembali = $peminjaman['tgl_kembali'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_member_post = $_POST['id_member'];
    $id_buku_post = $_POST['id_buku'];
    $tgl_pinjam_post = $_POST['tgl_pinjam'];
    $tgl_kembali_post = $_POST['tgl_kembali'];

    if (strtotime($tgl_kembali_post) < strtotime($tgl_pinjam_post)) {
        echo "<script>alert('Gagal! Tanggal kembali tidak boleh lebih awal dari tanggal peminjaman.'); window.history.back();</script>";
        exit;
    }

    if (isset($_POST['id_peminjaman']) && !empty($_POST['id_peminjaman'])) {
        $id_peminjaman_post = $_POST['id_peminjaman'];
        if (editPeminjaman($id_peminjaman_post, $id_member_post, $id_buku_post, $tgl_pinjam_post, $tgl_kembali_post)) {
            header("Location: Peminjaman.php");
            exit;
        }
    } else {
        if (tambahPeminjaman($id_member_post, $id_buku_post, $tgl_pinjam_post, $tgl_kembali_post)) {
            header("Location: Peminjaman.php");
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
    <title><?= $is_edit ? "Edit" : "Tambah" ?> Peminjaman</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; padding: 20px; box-sizing: border-box; }
        .form-container { background: white; padding: 30px 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 500px; }
        h2 { text-align: center; color: #2c3e50; margin-bottom: 25px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input[type="date"], select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 16px; font-family: inherit; }
        input:focus, select:focus { border-color: #007bff; outline: none; }
        .btn-submit { width: 100%; padding: 12px; border: none; border-radius: 5px; font-size: 16px; font-weight: bold; cursor: pointer; color: white; background-color: #28a745; margin-top: 25px; }
        .btn-submit:hover { background-color: #218838; }
        .back-link { position: fixed; bottom: 20px; left: 20px; text-decoration: none; color: #333; font-weight: bold; background-color: white; padding: 10px 15px; border-radius: 5px; box-shadow: 0 2px 8px rgba(0,0,0,0.15); transition: all 0.3s; }
        .back-link:hover { background-color: #e2e6ea; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="form-container">
    <h2><?= $is_edit ? "Form Edit Peminjaman" : "Form Tambah Peminjaman" ?></h2>
    
    <form action="" method="POST" autocomplete="off">
        <input type="hidden" name="id_peminjaman" value="<?= $id_peminjaman ?>">

        <div class="form-group">
            <label for="id_member">Pilih Member:</label>
            <select id="id_member" name="id_member" required>
                <option value="">Pilih Member</option>
                <?php foreach ($list_member as $member): ?>
                    <option value="<?= $member['id_member'] ?>" <?= ($member['id_member'] == $id_member_terpilih) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($member['nama_member']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_buku">Pilih Buku:</label>
            <select id="id_buku" name="id_buku" required>
                <option value="">Pilih Buku</option>
                <?php foreach ($list_buku as $buku): ?>
                    <option value="<?= $buku['id_buku'] ?>" <?= ($buku['id_buku'] == $id_buku_terpilih) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($buku['judul_buku']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="tgl_pinjam">Tanggal Pinjam:</label>
            <input type="date" id="tgl_pinjam" name="tgl_pinjam" required value="<?= $tgl_pinjam ?>">
        </div>

        <div class="form-group">
            <label for="tgl_kembali">Tanggal Kembali:</label>
            <input type="date" id="tgl_kembali" name="tgl_kembali" required value="<?= $tgl_kembali ?>">
        </div>

        <button type="submit" class="btn btn-submit">Simpan Transaksi</button>
    </form>
</div>

<a href="Peminjaman.php" class="back-link">Kembali ke Tabel</a>

<script>
    const tglPinjam = document.getElementById('tgl_pinjam');
    const tglKembali = document.getElementById('tgl_kembali');

    tglPinjam.addEventListener('change', function() {
        tglKembali.min = this.value;
        
        if (tglKembali.value < this.value) {
            tglKembali.value = '';
        }
    });

    if(tglPinjam.value) {
        tglKembali.min = tglPinjam.value;
    }
</script>

</body>
</html>
