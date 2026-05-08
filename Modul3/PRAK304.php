<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK304</title>
</head>
<body>
    <?php
    $bintang = NULL;

    if (isset($_POST['bintang'])) {
        $bintang = (int)$_POST['bintang'];
    }
    if (isset($_POST['tambah'])) {
        $bintang++;
    }
    if (isset($_POST['kurang'])) {
        $bintang--;
    }
    ?>

    <?php if ($bintang === NULL): ?>
        <form action="" method="POST">
            Jumlah bintang <input type="number" name="bintang" min="1" required><br>
            <button type="submit" name="submit">Submit</button>
        </form>

    <?php else: ?>
        Jumlah bintang <?= $bintang ?><br><br><br>
        <?php
        for ($i = 0; $i < $bintang; $i++) {
            echo "<img src='https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png' width='70px' height='70px'> ";
        }
        ?>
        <br>
        
        <form action="" method="POST">
            <input type="hidden" name="bintang" value="<?= $bintang ?>">
            <button type="submit" name="tambah">Tambah</button><?php if ($bintang > 0): ?><button type="submit" name="kurang">Kurang</button><?php endif; ?>
        </form>
    <?php endif; ?>

</body>
</html>