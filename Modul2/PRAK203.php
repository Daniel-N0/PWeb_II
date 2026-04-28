<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK203</title>
</head>
<body>
    <?php
    $nilai = isset($_POST['nilai']) ? htmlspecialchars($_POST['nilai']) : '';
    $dari = isset($_POST['dari']) ? $_POST['dari'] : '';
    $ke = isset($_POST['ke']) ? $_POST['ke'] : '';
    $hasil_teks = "";

    if (isset($_POST['submit'])) {
        $v = (float)$nilai;
        $c = 0;

        if ($dari == "Celcius") {
            $c = $v;
        } elseif ($dari == "Fahrenheit") {
            $c = ($v - 32) * 5/9;
        } elseif ($dari == "Rheamur") {
            $c = $v * 5/4;
        } elseif ($dari == "Kelvin") {
            $c = $v - 273.15;
        }

        if ($ke == "Celcius") {
            $hasil = $c;
            $simbol = "°C";
        } elseif ($ke == "Fahrenheit") {
            $hasil = ($c * 9/5) + 32;
            $simbol = "°F";
        } elseif ($ke == "Rheamur") {
            $hasil = $c * 4/5;
            $simbol = "°R";
        } elseif ($ke == "Kelvin") {
            $hasil = $c + 273.15;
            $simbol = "°K";
        }

        $hasil_teks = "Hasil Konversi: " . number_format($hasil, 1) . " $simbol";
    }
    ?>

    <form action="" method="POST">
        Nilai: <input type="number" step="any" name="nilai" value="<?= $nilai ?>" required><br>
        
        Dari:<br>
        <input type="radio" name="dari" value="Celcius" <?= ($dari == "Celcius") ? "checked" : "" ?> required> Celcius<br>
        <input type="radio" name="dari" value="Fahrenheit" <?= ($dari == "Fahrenheit") ? "checked" : "" ?>> Fahrenheit<br>
        <input type="radio" name="dari" value="Rheamur" <?= ($dari == "Rheamur") ? "checked" : "" ?>> Rheamur<br>
        <input type="radio" name="dari" value="Kelvin" <?= ($dari == "Kelvin") ? "checked" : "" ?>> Kelvin<br>
        
        Ke:<br>
        <input type="radio" name="ke" value="Celcius" <?= ($ke == "Celcius") ? "checked" : "" ?> required> Celcius<br>
        <input type="radio" name="ke" value="Fahrenheit" <?= ($ke == "Fahrenheit") ? "checked" : "" ?>> Fahrenheit<br>
        <input type="radio" name="ke" value="Rheamur" <?= ($ke == "Rheamur") ? "checked" : "" ?>> Rheamur<br>
        <input type="radio" name="ke" value="Kelvin" <?= ($ke == "Kelvin") ? "checked" : "" ?>> Kelvin<br>
        
        <button type="submit" name="submit">Konversi</button>
    </form>

    <?php if ($hasil_teks !== ""): ?>
        <h2><?= $hasil_teks ?></h2>
    <?php endif; ?>

</body>
</html>