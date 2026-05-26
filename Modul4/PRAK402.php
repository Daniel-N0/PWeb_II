<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK402</title>
    <style>
        table { 
            border-collapse: collapse; 
            width: 600px; 
            text-align: left; 
        }
        th, td { 
            border: 1px solid black; 
            padding: 8px;

        }
        th { 
            background-color: #D3D3D3; 
        }
    </style>
</head>
<body>
    <?php
    $mahasiswa = [
        ["nama" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
        ["nama" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79],
        ["nama" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41],
        ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75]
    ];

    foreach ($mahasiswa as &$mhs) {
        $akhir = ($mhs["uts"] * 0.4) + ($mhs["uas"] * 0.6);
        $mhs["akhir"] = $akhir;

        if ($akhir >= 80) {
            $mhs["huruf"] = "A";
        } elseif ($akhir >= 70 && $akhir <= 79) {
            $mhs["huruf"] = "B";
        } elseif ($akhir >= 60 && $akhir <= 69) {
            $mhs["huruf"] = "C";
        } elseif ($akhir >= 50 && $akhir <= 59) {
            $mhs["huruf"] = "D";
        } else {
            $mhs["huruf"] = "E";
        }
    }
    unset($mhs); 
    ?>

    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        
        <?php foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $mhs["nama"] ?></td>
                <td><?= $mhs["nim"] ?></td>
                <td><?= $mhs["uts"] ?></td>
                <td><?= $mhs["uas"] ?></td>
                <td><?= $mhs["akhir"] ?></td>
                <td><?= $mhs["huruf"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>