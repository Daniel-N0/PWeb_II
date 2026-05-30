<?php
require_once 'Model.php';

if (isset($_GET['id_hapus'])) {
    $id_buku = $_GET['id_hapus'];
    if (hapusBuku($id_buku)) {
        echo "<script>alert('Data buku berhasil dihapus!'); window.location.href='Buku.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data buku!'); window.location.href='Buku.php';</script>";
    }
}

$data_buku = getBuku();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - Perpustakaan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        .action-header { display: flex; justify-content: flex-end; margin-bottom: 20px; }
        .btn {
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 14px;
        }
        .btn-add { background-color: #28a745; }
        .btn-back { background-color: #6c757d; }
        .btn-edit { 
            background-color: #ffc107; 
            color: #212529; 
            padding: 6px 12px; 
            display: inline-block; 
            margin: 3px; 
            border-radius: 4px;
        }
        .btn-delete { 
            background-color: #dc3545; 
            padding: 6px 12px; 
            display: inline-block; 
            margin: 3px; 
            border-radius: 4px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #dee2e6;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        tr:nth-child(even) { background-color: #f2f2f2; }   
        .back-link { 
            position: fixed; 
            bottom: 20px; 
            left: 20px; 
            text-decoration: none; 
            color: #333; 
            font-weight: bold; 
            background-color: white; 
            padding: 10px 15px; 
            border-radius: 5px; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.15); 
            transition: all 0.3s; 
        }
        .back-link:hover { 
            background-color: #e2e6ea; 
            transform: translateY(-2px); 
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Buku Perpustakaan</h2>
    
    <div class="action-header">
        <a href="FormBuku.php" class="btn btn-add">Tambah Data Buku</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($data_buku)) {
                $no = 1;
                foreach ($data_buku as $buku) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($buku['judul_buku']) . "</td>";
                    echo "<td>" . htmlspecialchars($buku['penulis']) . "</td>";
                    echo "<td>" . htmlspecialchars($buku['penerbit']) . "</td>";
                    echo "<td>" . htmlspecialchars($buku['tahun_terbit']) . "</td>";
                    echo "<td>
                            <a href='FormBuku.php?id_edit=" . $buku['id_buku'] . "' class='btn btn-edit'>Edit</a>
                            <a href='Buku.php?id_hapus=" . $buku['id_buku'] . "' class='btn btn-delete' onclick=\"return confirm('Yakin ingin menghapus buku ini?');\">Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>Belum ada data buku.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<a href="Index.php" class="back-link">Kembali ke Menu</a>
</body>
</html>