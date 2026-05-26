<!DOCTYPE html>
<html lang="id">
<head>
    <title>PRAK403</title>
    <style>
        table { 
            border-collapse: collapse; 
            width: 800px; 
        }
        th, td { 
            border: 1px solid black; 
            padding: 5px 8px; 
            text-align: left; 
        }
        th { 
            background-color: #D3D3D3; 
        }
        .revisi { 
            background-color: red; 
        }
        .tidak-revisi { 
            background-color: #00B050; 
        }
    </style>
</head>
<body>
    <?php
    $mahasiswa = [
        [
            "no" => 1, "nama" => "Ridho", 
            "mk" => [
                ["nama_mk" => "Pemrograman I", "sks" => 2],
                ["nama_mk" => "Praktikum Pemrograman I", "sks" => 1],
                ["nama_mk" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
                ["nama_mk" => "Arsitektur Komputer", "sks" => 3]
            ]
        ],
        [
            "no" => 2, "nama" => "Ratna", 
            "mk" => [
                ["nama_mk" => "Basis Data I", "sks" => 2],
                ["nama_mk" => "Praktikum Basis Data I", "sks" => 1],
                ["nama_mk" => "Kalkulus", "sks" => 3]
            ]
        ],
        [
            "no" => 3, "nama" => "Tono", 
            "mk" => [
                ["nama_mk" => "Rekayasa Perangkat Lunak", "sks" => 3],
                ["nama_mk" => "Analisis dan Perancangan Sistem", "sks" => 3],
                ["nama_mk" => "Komputasi Awan", "sks" => 3],
                ["nama_mk" => "Kecerdasan Bisnis", "sks" => 3]
            ]
        ]
    ];

    foreach ($mahasiswa as &$mhs) {
        $total_sks = 0;
        
        foreach ($mhs['mk'] as $mk) {
            $total_sks += $mk['sks'];
        }
        
        $mhs['total_sks'] = $total_sks;
        
        if ($total_sks < 7) {
            $mhs['keterangan'] = "Revisi KRS";
        } else {
            $mhs['keterangan'] = "Tidak Revisi";
        }
    }
    unset($mhs); 
    ?>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        
        <?php foreach ($mahasiswa as $mhs): ?>
            <?php 
                $jml_mk = count($mhs['mk']); 
            ?>
            
            <?php for ($i = 0; $i < $jml_mk; $i++): ?>
                <tr>
                    <?php if ($i == 0): ?>
                        <td><?= $mhs['no'] ?></td>
                        <td><?= $mhs['nama'] ?></td>
                        <td><?= $mhs['mk'][$i]['nama_mk'] ?></td>
                        <td><?= $mhs['mk'][$i]['sks'] ?></td>
                        <td><?= $mhs['total_sks'] ?></td>
                        
                        <?php 
                        $class = ($mhs['keterangan'] == "Revisi KRS") ? "revisi" : "tidak-revisi";
                        ?>
                        <td class="<?= $class ?>">
                            <?= $mhs['keterangan'] ?>
                        </td>
                        
                    <?php else: ?>
                        <td></td> <td></td> <td><?= $mhs['mk'][$i]['nama_mk'] ?></td>
                        <td><?= $mhs['mk'][$i]['sks'] ?></td>
                        
                        <td></td> <td></td> <?php endif; ?>
                </tr>
            <?php endfor; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>