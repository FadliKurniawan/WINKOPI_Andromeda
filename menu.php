<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Winkopi Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white">
    <div class="relative overflow-hidden">
        <!-- Header -->
        <header class="bg-gradient-to-r from-[#341D15] to-[#AE6B36] text-gray-400 text-center w-full">
            <nav class="w-full flex justify-between items-center px-6 py-4">
                <div class="flex justify-center items-center space-x-4">
                    <img src="images/logo.png" alt="Winkopi Logo" class="w-10 h-10 object-contain" />
                    <span class="text-white text-2xl font-bold">Winkopi</span>
                </div>
            </nav>
        </header>

        <!-- Search Bar -->
        <div class="w-11/12 h-14 bg-white rounded-lg border border-gray-300 mx-auto mt-5 flex items-center px-4">
            <form method="GET" class="w-full flex items-center">
                <input type="text" name="searchName" placeholder="Search by name..."
                    class="flex-1 outline-none text-gray-500 text-sm px-2" />
                <select name="searchCategory"
                    class="ml-2 border border-gray-300 rounded-lg text-gray-700 text-sm px-2">
                    <option value="">All Categories</option>
                    <option value="Kopi">Kopi</option>
                    <option value="Non Kopi">Non Kopi</option>
                    <option value="Minuman Dingin">Minuman Dingin</option>
                </select>
                <button type="submit"
                    class="w-11 h-11 bg-[#C67C4E] rounded-lg flex items-center justify-center ml-2">
                    <i class="fas fa-search text-white"></i>
                </button>
            </form>
        </div>

        <!-- Menu Section -->
        <section id="menu" class="mt-10">
            <?php
            // Koneksi ke database
            $conn = new mysqli("localhost", "root", "", "db_winkopi");

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Ambil parameter pencarian
            $searchName = isset($_GET['searchName']) ? $_GET['searchName'] : '';
            $searchCategory = isset($_GET['searchCategory']) ? $_GET['searchCategory'] : '';

            // Query data menu dengan pencarian
            $sql = "SELECT * FROM menu WHERE 1";
            if (!empty($searchName)) {
                $sql .= " AND nama_menu LIKE '%" . $conn->real_escape_string($searchName) . "%'";
            }
            if (!empty($searchCategory)) {
                $sql .= " AND kategori = '" . $conn->real_escape_string($searchCategory) . "'";
            }
            $sql .= " ORDER BY kategori, nama_menu";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $currentCategory = "";
                while ($row = $result->fetch_assoc()) {
                    // Tampilkan judul kategori jika berganti kategori
                    if ($row['kategori'] != $currentCategory) {
                        if ($currentCategory != "") echo "</div>"; // Tutup div kategori sebelumnya
                        $currentCategory = $row['kategori'];
                        echo "<h2 class='text-2xl sm:text-3xl font-bold text-[#341D15] my-4 text-center'>" . $currentCategory . "</h2>";
                        echo "<div class='menu-container grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4'>";
                    }
                    // Tampilkan item menu
                    echo "<div class='menu-item bg-white rounded-lg shadow-md overflow-hidden relative flex flex-col sm:flex-row items-center sm:items-start sm:gap-6 p-6 hover:shadow-lg transition'>";
                    echo "<img src='menu/" . $row['gambar'] . "' alt='Image of " . $row['nama_menu'] . "' class='w-full sm:w-32 sm:h-32 object-cover rounded-md'>";
                    echo "<div class='mt-4 sm:mt-0 sm:flex-1'>";
                    echo "<h3 class='text-lg sm:text-xl font-semibold text-gray-800'>" . $row['nama_menu'] . "</h3>";
                    echo "<p class='text-gray-600 sm:text-lg'>Kategori: " . $row['kategori'] . "</p>";
                    echo "<p class='text-xl sm:text-2xl text-gray-700'>Rp " . number_format($row['harga'], 0, ',', '.') . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<p class='text-center text-gray-500'>Tidak ada menu yang sesuai pencarian.</p>";
            }
            $conn->close();
            ?>
        </section>

        <!-- Footer -->
        <footer class="bg-[#341D15] text-white text-center py-6">
            <div class="flex justify-center items-center space-x-4">
                <img src="images/logo.png" alt="Winkopi Logo" class="w-10 h-10 object-contain" />
                <span class="text-lg font-semibold">Winkopi</span>
            </div>
            <div class="mt-4 text-sm">
                <p>&copy; 2024 Winkopi. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>

</html>