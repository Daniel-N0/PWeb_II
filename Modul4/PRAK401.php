<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK401</title>
    <style>
    table { 
        border-collapse: collapse; 
    }
    td { 
        border: 1px solid black; 
        padding: 5px;
        width: 17px;       
        height: 17px;      
        text-align: center;
        font-size: 12px;    
    }
    </style>
</head>
<body>
    <?php
    $panjang = isset($_POST['panjang']) ? htmlspecialchars($_POST['panjang']) : '';
    $lebar = isset($_POST['lebar']) ? htmlspecialchars($_POST['lebar']) : '';
    $nilai = isset($_POST['nilai']) ? htmlspecialchars($_POST['nilai']) : '';
    ?>

    <form action="" method="POST">
        Panjang : <input type="number" name="panjang" value="<?= $panjang ?>" min="1" required><br>
        Lebar : <input type="number" name="lebar" value="<?= $lebar ?>" min="1" required><br>
        Nilai : <input type="text" name="nilai" value="<?= $nilai ?>" required><br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $p = (int)$panjang;
        $l = (int)$lebar;
        
        $arr_nilai = explode(" ", $nilai);
        
        if (count($arr_nilai) == ($p * $l)) {
            
            echo "<table>";
            $index = 0; 
            
            for ($i = 0; $i < $p; $i++) { // Perulangan untuk baris (Panjang)
                echo "<tr>";
                for ($j = 0; $j < $l; $j++) { 
                    echo "<td>" . $arr_nilai[$index] . "</td>";
                    $index++; 
                }
                echo "</tr>";
            }
            echo "</table>";
            
        } else {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        }
    }
    ?>
</body>
</html>