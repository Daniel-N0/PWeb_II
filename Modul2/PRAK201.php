    <!DOCTYPE html>
    <html lang="id">
    <head>
        <title>PRAK201</title>
    </head>
    <body>
        <?php
        $val_nama1 = isset($_POST['nama1']) ? htmlspecialchars($_POST['nama1']) : '';
        $val_nama2 = isset($_POST['nama2']) ? htmlspecialchars($_POST['nama2']) : '';
        $val_nama3 = isset($_POST['nama3']) ? htmlspecialchars($_POST['nama3']) : '';
        ?>

        <form action="" method="POST">
            Nama: 1 <input type="text" name="nama1" value="<?= $val_nama1 ?>" required><br>
            Nama: 2 <input type="text" name="nama2" value="<?= $val_nama2 ?>" required><br>
            Nama: 3 <input type="text" name="nama3" value="<?= $val_nama3 ?>" required><br>
            <button type="submit" name="submit">Urutkan</button>
        </form>
        <br>

        <?php
        if (isset($_POST['submit'])) {
            $nama1 = strtolower($_POST['nama1']);
            $nama2 = strtolower($_POST['nama2']);
            $nama3 = strtolower($_POST['nama3']);

            if ($nama1 < $nama2 && $nama1 < $nama3) {
                if ($nama2 < $nama3) {
                    echo "$nama1<br>$nama2<br>$nama3";
                } else {
                    echo "$nama1<br>$nama3<br>$nama2";
                }
            } elseif ($nama2 < $nama1 && $nama2 < $nama3) {
                if ($nama1 < $nama3) {
                    echo "$nama2<br>$nama1<br>$nama3";
                } else {
                    echo "$nama2<br>$nama3<br>$nama1";
                }
            } else {
                if ($nama1 < $nama2) {
                    echo "$nama3<br>$nama1<br>$nama2";
                } else {
                    echo "$nama3<br>$nama2<br>$nama1";
                }
            }
        }
        ?>
    </body>
    </html>