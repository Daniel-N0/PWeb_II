<?php
require_once 'Model.php';

if (isset($_GET['id_hapus'])) {
    $id_member = $_GET['id_hapus'];
    if (hapusMember($id_member)) {
        echo "<script>alert('Data member berhasil dihapus!'); window.location.href='Member.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data member!'); window.location.href='Member.php';</script>";
    }
}

$data_member = getMember();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member - Perpustakaan</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; color: #333; padding: 20px; }
        .container { max-width: 1100px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #2c3e50; }
        .action-header { display: flex; justify-content: flex-end; margin-bottom: 20px; }        
        .btn { padding: 10px 15px; border-radius: 5px; text-decoration: none; color: white; font-weight: bold; font-size: 14px; }
        .btn-add { background-color: #28a745; }
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
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid #dee2e6; }
        th, td { padding: 12px; text-align: left; }
        th { background-color: #343a40; color: white; }
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
    <h2>Data Member Perpustakaan</h2>
    
    <div class="action-header">
        <a href="FormMember.php" class="btn btn-add">Tambah Data Member</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Nomor Member</th>
                <th>Alamat</th>
                <th>Tgl Mendaftar</th>
                <th>Tgl Terakhir Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($data_member)) {
                $no = 1;
                foreach ($data_member as $member) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($member['nama_member']) . "</td>";
                    echo "<td>" . htmlspecialchars($member['nomor_member']) . "</td>";
                    echo "<td>" . htmlspecialchars($member['alamat']) . "</td>";
                    echo "<td>" . htmlspecialchars($member['tgl_mendaftar']) . "</td>";
                    echo "<td>" . htmlspecialchars($member['tgl_terakhir_bayar']) . "</td>";
                    echo "<td>
                            <a href='FormMember.php?id_edit=" . $member['id_member'] . "' class='btn btn-edit'>Edit</a>
                            <a href='Member.php?id_hapus=" . $member['id_member'] . "' class='btn btn-delete' onclick=\"return confirm('Yakin ingin menghapus member ini?');\">Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data member.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<a href="Index.php" class="back-link">Kembali ke Menu</a>
</body>
</html>