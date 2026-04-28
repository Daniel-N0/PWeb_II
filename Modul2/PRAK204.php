<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK204</title>
</head>
<body>

<?php
$nilai = isset($_POST['nilai']) ? htmlspecialchars($_POST['nilai']) : '';
$hasil = "";

if (isset($_POST['submit'])) {
    $v = (int)$nilai;

    // Logika yang sudah diperbaiki
    if ($v == 0) {
        $hasil = "Nol";
    } elseif ($v >= 1 && $v <= 9) {
        $hasil = "Satuan";
    } elseif ($v >= 11 && $v <= 19) {
        $hasil = "Belasan";
    } elseif ($v == 10 || ($v >= 20 && $v <= 99)) {
        // Angka 10 dan 20-99 masuk ke Puluhan
        $hasil = "Puluhan";
    } elseif ($v >= 100 && $v <= 999) {
        $hasil = "Ratusan";
    } else {
        $hasil = "Anda Menginput Melebihi Limit Bilangan";
    }
}
?>

<form method="POST">
    Nilai: 
    <input type="number" name="nilai" min="0" value="<?= $nilai ?>" required>
    <br><br>
    <button type="submit" name="submit">Konversi</button>
</form>

<?php if ($hasil !== ""): ?>
    <h2>Hasil: <?= $hasil ?></h2>
<?php endif; ?>

</body>
</html>