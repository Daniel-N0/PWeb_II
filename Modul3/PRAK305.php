<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK305</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="kata" required>
        <button type="submit" name="submit">submit</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $kata = $_POST['kata'];
        $panjang = strlen($kata);
        $arr_kata = str_split($kata);

        echo "<b>Input:</b><br><br>";
        echo "$kata<br><br>";
        
        echo "<b>Output:</b><br><br>";

        for ($i = 0; $i < $panjang; $i++) {
            for ($j = 0; $j < $panjang; $j++) {
                if ($j == 0) {
                    echo strtoupper($arr_kata[$i]);
                } 
                else {
                    echo strtolower($arr_kata[$i]);
                }
            }
        }
    }
    ?>
</body>
</html>
