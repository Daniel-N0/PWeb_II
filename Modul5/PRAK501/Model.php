<?php

require_once 'Koneksi.php';

function getMember() {
    $conn = koneksi();
    try {
        $stmt = $conn->prepare("SELECT * FROM member");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error getMember: " . $e->getMessage();
        return [];
    }
}

function tambahMember($nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    $conn = koneksi();
    try {
        $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar]);
        return true;
    } catch (PDOException $e) {
        echo "Error tambahMember: " . $e->getMessage();
        return false;
    }
}

function getMemberById($id_member) {
    $conn = koneksi();
    try {
        $stmt = $conn->prepare("SELECT * FROM member WHERE id_member = ?");
        $stmt->execute([$id_member]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error getMemberById: " . $e->getMessage();
        return null;
    }
}

function editMember($id_member, $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    $conn = koneksi();
    try {
        $sql = "UPDATE member 
                SET nama_member = ?, nomor_member = ?, alamat = ?, tgl_mendaftar = ?, tgl_terakhir_bayar = ? 
                WHERE id_member = ?";
        $stmt = $conn->prepare($sql);
        
        $stmt->execute([$nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar, $id_member]);
        return true;
    } catch (PDOException $e) {
        echo "Error editMember: " . $e->getMessage();
        return false;
    }
}

function hapusMember($id_member) {
    $conn = koneksi();
    try {
        $stmt = $conn->prepare("DELETE FROM member WHERE id_member = ?");
        $stmt->execute([$id_member]);
        return true;
    } catch (PDOException $e) {
        echo "Error hapusMember: " . $e->getMessage();
        return false;
    }
}

function getBuku() {
    $conn = koneksi();
    try {
        $stmt = $conn->prepare("SELECT * FROM buku");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error getBuku: " . $e->getMessage();
        return [];
    }
}

function tambahBuku($judul_buku, $penulis, $penerbit, $tahun_terbit) {
    $conn = koneksi();
    try {
        $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$judul_buku, $penulis, $penerbit, $tahun_terbit]);
        return true;
    } catch (PDOException $e) {
        echo "Error tambahBuku: " . $e->getMessage();
        return false;
    }
}

function getBukuById($id_buku) {
    $conn = koneksi();
    try {
        $stmt = $conn->prepare("SELECT * FROM buku WHERE id_buku = ?");
        $stmt->execute([$id_buku]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error getBukuById: " . $e->getMessage();
        return null;
    }
}

function editBuku($id_buku, $judul_buku, $penulis, $penerbit, $tahun_terbit) {
    $conn = koneksi();
    try {
        $sql = "UPDATE buku SET judul_buku = ?, penulis = ?, penerbit = ?, tahun_terbit = ? WHERE id_buku = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$judul_buku, $penulis, $penerbit, $tahun_terbit, $id_buku]);
        return true;
    } catch (PDOException $e) {
        echo "Error editBuku: " . $e->getMessage();
        return false;
    }
}

function hapusBuku($id_buku) {
    $conn = koneksi();
    try {
        $stmt = $conn->prepare("DELETE FROM buku WHERE id_buku = ?");
        $stmt->execute([$id_buku]);
        return true;
    } catch (PDOException $e) {
        echo "Error hapusBuku: " . $e->getMessage();
        return false;
    }
}

function getPeminjaman() {
    $conn = koneksi();
    try {
        $sql = "SELECT peminjaman.*, member.nama_member, buku.judul_buku 
                FROM peminjaman 
                JOIN member ON peminjaman.id_member = member.id_member 
                JOIN buku ON peminjaman.id_buku = buku.id_buku";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error getPeminjaman: " . $e->getMessage();
        return [];
    }
}

function tambahPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $conn = koneksi();
    try {
        $sql = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali]);
        return true;
    } catch (PDOException $e) {
        echo "Error tambahPeminjaman: " . $e->getMessage();
        return false;
    }
}

function getPeminjamanById($id_peminjaman) {
    $conn = koneksi();
    try {
        $stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
        $stmt->execute([$id_peminjaman]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error getPeminjamanById: " . $e->getMessage();
        return null;
    }
}

function editPeminjaman($id_peminjaman, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $conn = koneksi();
    try {
        $sql = "UPDATE peminjaman SET id_member = ?, id_buku = ?, tgl_pinjam = ?, tgl_kembali = ? WHERE id_peminjaman = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali, $id_peminjaman]);
        return true;
    } catch (PDOException $e) {
        echo "Error editPeminjaman: " . $e->getMessage();
        return false;
    }
}

function hapusPeminjaman($id_peminjaman) {
    $conn = koneksi();
    try {
        $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?");
        $stmt->execute([$id_peminjaman]);
        return true;
    } catch (PDOException $e) {
        echo "Error hapusPeminjaman: " . $e->getMessage();
        return false;
    }
}
?>