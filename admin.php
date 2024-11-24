<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_winkopi");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk menampilkan 5 menu terbaru dengan gambar
$sql = "SELECT nama_menu, kategori, gambar FROM menu ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);

// Query untuk menampilkan semua menu yang tersedia dengan gambar
$sql_all = "SELECT nama_menu, gambar FROM menu";
$result_all = $conn->query($sql_all);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin - Winkopi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#341D15] text-white min-h-screen p-6">
            <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
            <div class="flex flex-col space-y-4">
                <a href="#tambah-menu" class="text-lg flex items-center hover:text-gray-300 p-2 rounded-lg transition-all hover:bg-[#C67C4E]">
                    <i class="fas fa-plus mr-3"></i> Tambah Menu
                </a>
                <a href="#riwayat-menu" class="text-lg flex items-center hover:text-gray-300 p-2 rounded-lg transition-all hover:bg-[#C67C4E]">
                    <i class="fas fa-history mr-3"></i> Riwayat Menu Terbaru
                </a>
                <a href="#menu-tersedia" class="text-lg flex items-center hover:text-gray-300 p-2 rounded-lg transition-all hover:bg-[#C67C4E]">
                    <i class="fas fa-list mr-3"></i> Daftar Menu Tersedia
                </a>
            </div>
            <div class="mt-auto">
                <a href="logout.php" class="text-lg flex items-center hover:text-gray-300 p-2 rounded-lg transition-all hover:bg-[#C67C4E]">
                    <i class="fas fa-sign-out-alt mr-3"></i> Logout
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Tambah Menu Baru -->
            <section id="tambah-menu" class="mt-10 p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-3xl font-bold text-[#341D15] text-center mb-6">Tambah Menu Baru</h2>
                <form action="proses_tambah_menu.php" method="POST" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Menu -->
                        <div class="mb-4">
                            <label for="nama_menu" class="block text-lg font-semibold text-gray-700">Nama Menu</label>
                            <input type="text" id="nama_menu" name="nama_menu" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C67C4E]" required />
                        </div>

                        <!-- Kategori -->
                        <div class="mb-4">
                            <label for="kategori" class="block text-lg font-semibold text-gray-700">Kategori</label>
                            <select id="kategori" name="kategori" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C67C4E]" required>
                                <option value="Kopi">Kopi</option>
                                <option value="Non Kopi">Non Kopi</option>
                                <option value="Minuman Dingin">Minuman Dingin</option>
                            </select>
                        </div>

                        <!-- Harga -->
                        <div class="mb-4">
                            <label for="harga" class="block text-lg font-semibold text-gray-700">Harga</label>
                            <input type="number" id="harga" name="harga" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C67C4E]" required />
                        </div>

                        <!-- Gambar -->
                        <div class="mb-4">
                            <label for="gambar" class="block text-lg font-semibold text-gray-700">Gambar Menu</label>
                            <input type="file" id="gambar" name="gambar" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C67C4E]" accept="image/*" required />
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="w-full py-3 bg-[#C67C4E] text-white rounded-lg hover:bg-[#AE6B36] transition-colors">
                            Tambah Menu
                        </button>
                    </div>
                </form>
            </section>

            <!-- Riwayat Menu Terbaru -->
            <section id="riwayat-menu" class="mt-10">
                <h2 class="text-3xl font-bold text-center text-[#341D15] mb-6">Riwayat Menu Terbaru</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='bg-white rounded-lg shadow-md p-6 transform transition-transform hover:scale-105 hover:shadow-xl'>";
                            echo "<img src='menu/" . $row['gambar'] . "' alt='" . $row['nama_menu'] . "' class='w-full h-40 object-cover rounded-lg mb-4'>";
                            echo "<h3 class='text-lg font-semibold text-gray-800 mb-2'>" . $row['nama_menu'] . "</h3>";
                            echo "<p class='text-gray-600'>" . $row['kategori'] . "</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p class='text-center text-gray-500'>Tidak ada riwayat menu.</p>";
                    }
                    ?>
                </div>
            </section>

            <!-- Daftar Menu Tersedia -->
            <section id="menu-tersedia" class="mt-10">
                <h2 class="text-3xl font-bold text-center text-[#341D15] mb-6">Daftar Menu Tersedia</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    if ($result_all->num_rows > 0) {
                        while ($row = $result_all->fetch_assoc()) {
                            echo "<div class='bg-white rounded-lg shadow-md p-6 transform transition-transform hover:scale-105 hover:shadow-xl'>";
                            echo "<img src='menu/" . $row['gambar'] . "' alt='" . $row['nama_menu'] . "' class='w-full h-40 object-cover rounded-lg mb-4'>";
                            echo "<h3 class='text-lg font-semibold text-gray-800 mb-2'>" . $row['nama_menu'] . "</h3>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p class='text-center text-gray-500'>Tidak ada menu yang tersedia.</p>";
                    }
                    ?>
                </div>
            </section>
        </main>
    </div>

</body>

</html>

<?php
$conn->close();
?>