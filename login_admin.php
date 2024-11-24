<?php
session_start(); // Mulai sesi

include_once("./assets/inc/conn.php");

// Periksa apakah pengguna sudah login sebelumnya
if (isset($_SESSION['username'])) {
    // Redirect pengguna ke halaman yang sesuai
    header("Location: index.php");
    exit();
}

$message = ""; // Variabel untuk menyimpan pesan notifikasi

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Mengambil data dari form
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Mengambil data dari form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Mengecek informasi login di database
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login berhasil
            $_SESSION['username'] = $username; // Set session username

            if ($username === 'admin') {
                // Jika username adalah 'admin', redirect ke admin.html
                $message = "Login Admin Berhasil";
                header("Location: admin.php");
                exit(); // Hentikan eksekusi script setelah mengarahkan pengguna
            } else {
                // Jika bukan admin, redirect ke index.php
                $message = "Login Berhasil";
                header("Location: index.php");
                exit(); // Hentikan eksekusi script setelah mengarahkan pengguna
            }
        } else {
            // Login gagal
            $message = "Invalid username or password";
        }
    }
}

$conn->close();
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Admin Login - Waktunya Coffee Break
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-[#5A3A31] to-[#3E2A24] flex items-center justify-center min-h-screen">
    <div class="text-center p-6 max-w-md mx-auto rounded-xl shadow-lg backdrop-blur-md">
        <!-- Gambar -->
        <img alt="Admin login illustration with a coffee cup and a lock symbol" class="rounded-lg mb-6 mx-auto w-full max-w-xs md:max-w-md shadow-lg hover:scale-105 transition-transform duration-300" height="300" src="https://storage.googleapis.com/a1aa/image/lHE5MhZAd7YzN1WorkRQiY1g6AemE8xeq7iQHbb7gdUgqN0TA.jpg" width="300" />
        <!-- Judul -->
        <h1 class="text-3xl font-bold mb-5 tracking-wide text-white">
            Admin Login
        </h1>
        <p class="text-white mb-6 leading-relaxed">
            Please enter your credentials to access the admin panel.
        </p>
        <!-- Form Login -->
        <form action="admin_dashboard.php" class="space-y-4" method="POST">
            <div>
                <label class="block text-left text-gray-200 font-semibold" for="username">
                    Username
                </label>
                <input class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#F28C28] focus:border-transparent" id="username" name="username" required="" type="text" />
            </div>
            <div>
                <label class="block text-left text-gray-200 font-semibold" for="password">
                    Password
                </label>
                <input class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#F28C28] focus:border-transparent" id="password" name="password" required="" type="password" />
            </div>
            <button id="submit" type="submit" class="bg-[#F28C28] text-white py-3 px-6 rounded-full w-full text-lg font-semibold shadow-lg hover:bg-[#d37722] transition-all duration-300 transform hover:scale-105">
                Login as Admin
            </button>
        </form>
        <a class="text-[#F28C28] text-base font-semibold hover:text-[#d37722] transition duration-200 mt-4 inline-block" href="index.html">
            Kembali ke Utama
        </a>
    </div>

    <?php if (!empty($message)) : ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "<?php echo $message; ?>",
                    icon: "<?php echo ($message === 'Login Berhasil' || $message === 'Login Admin Berhasil') ? 'success' : 'error'; ?>",
                    confirmButtonText: "OK"
                });
            });
        </script>
    <?php endif; ?>
    <script>
        (function() {
            'use strict'
            const forms = document.querySelectorAll('.requires-validation')
            Array.from(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>