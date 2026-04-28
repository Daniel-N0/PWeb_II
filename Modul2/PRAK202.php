<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK202</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>

<?php
$namaErr = $nimErr = $jkErr = "";
$nama = $nim = $jk = "";
$isValid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    if (empty($_POST["nama"])) {
        $namaErr = "nama tidak boleh kosong";
        $isValid = false;
    } else {
        $nama = htmlspecialchars($_POST["nama"]);
    }

    if (empty($_POST["nim"])) {
        $nimErr = "nim tidak boleh kosong";
        $isValid = false;
    } else {
        $nim = htmlspecialchars($_POST["nim"]);
    }

    if (empty($_POST["jk"])) {
        $jkErr = "jenis kelamin tidak boleh kosong";
        $isValid = false;
    } else {
        $jk = htmlspecialchars($_POST["jk"]);
    }
}
?>

<form action="" method="POST">
    Nama: 
    <input type="text" name="nama" value="<?= $nama; ?>"> 
    <span class="error">* <?= $namaErr; ?></span>
    <br>
    
    Nim: 
    <input type="text" name="nim" value="<?= $nim; ?>"> 
    <span class="error">* <?= $nimErr; ?></span>
    <br>
    
    Jenis Kelamin: 
    <span class="error">* <?= $jkErr; ?></span><br>
    
    <input type="radio" name="jk" value="Laki-laki" <?= ($jk == "Laki-laki") ? "checked" : ""; ?>> Laki-laki<br>
    <input type="radio" name="jk" value="Perempuan" <?= ($jk == "Perempuan") ? "checked" : ""; ?>> Perempuan<br>
    
    <button type="submit" name="submit">Submit</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid) {
    echo "<h2>Output:</h2>";
    echo "$nama <br>";
    echo "$nim <br>";
    echo "$jk <br>";
}
?>

</body>
</html>