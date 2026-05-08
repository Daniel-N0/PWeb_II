<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK303</title>
</head>
<body>
    <?php
    $bawah = isset($_POST['bawah']) ? htmlspecialchars($_POST['bawah']) : '';
    $atas = isset($_POST['atas']) ? htmlspecialchars($_POST['atas']) : '';
    ?>

    <form method="POST">
        Batas Bawah : <input type="number" name="bawah" value="<?= $bawah ?>" min="1" required><br>
        Batas Atas : <input type="number" name="atas" value="<?= $atas ?>" min="1" required><br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $i = (int)$bawah; 
        $batas_atas = (int)$atas;

        do {
            if (($i + 7) % 5 == 0) {
                echo "<img src='https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png' width='15px'> ";
            } else {
                echo "$i ";
            }
            
            $i++; 
        } while ($i <= $batas_atas); 
    }
    ?>
</body>
</html>