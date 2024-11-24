<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_winkopi");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama_menu = $_POST['nama_menu'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];

// Proses unggahan gambar
$gambar = $_FILES['gambar']['name'];
$gambar_tmp = $_FILES['gambar']['tmp_name'];
$gambar_path = 'menu/' . $gambar;

// Pindahkan gambar ke folder yang sesuai
move_uploaded_file($gambar_tmp, $gambar_path);

// Query untuk menambahkan menu baru
$sql = "INSERT INTO menu (nama_menu, kategori, harga, gambar, created_at) 
        VALUES ('$nama_menu', '$kategori', '$harga', '$gambar', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Menu berhasil ditambahkan'); window.location.href = 'admin.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
