<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK302</title>
</head>
<body>
    <?php
    $tinggi = isset($_POST['tinggi']) ? htmlspecialchars($_POST['tinggi']) : '';
    $alamat = isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : '';
    ?>

    <form method="POST">
        Tinggi: <input type="number" name="tinggi" value="<?= $tinggi ?>" min="1" required><br>
        Alamat Gambar: <input type="text" name="alamat" value="<?= $alamat ?>" required><br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $batas = (int)$tinggi;
        $i = 1;

        while ($i <= $batas) {
            $j = 1;
            while ($j < $i) {
                echo "<img src='$alamat' style='width: 20px; opacity: 0;'>";
                $j++;
            }

            $k = $batas;
            while ($k >= $i) {
                echo "<img src='$alamat' style='width: 20px;'>";
                $k--;
            }

            echo "<br>";
            $i++;
        }
    }
    ?>
</body>
</html>