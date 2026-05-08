<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK301</title>
</head>
<body>
    <?php
    $peserta = isset($_POST['peserta']) ? htmlspecialchars($_POST['peserta']) : '';
    ?>
    
    <form method="POST">
        Jumlah Peserta : <input type="number" name="peserta" value="<?= $peserta ?>" min="1" required><br>
        <button type="submit" name="submit">Cetak</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $batas = (int)$peserta;
        $i = 1; 

        while ($i <= $batas) {
            if ($i % 2 == 1) {
                echo "<h2 style='color: red;'>Peserta ke-$i</h2>";
            } else {
                echo "<h2 style='color: green;'>Peserta ke-$i</h2>";
            }
            $i++; 
        }
    }
    ?>
</body>
</html>