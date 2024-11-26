<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_winkopi");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil id_menu dari form
$id_menu = $_POST['id_menu'];

// Hapus data dari database
$sql = "DELETE FROM menu WHERE id_menu = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_menu);

if ($stmt->execute()) {
    echo "<script>
        alert('Menu berhasil dihapus!');
        window.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus menu.');
        window.location.href = 'index.php';
    </script>";
}

$stmt->close();
$conn->close();
