<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waktunya Coffee Break - Winkopi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-[#5A3A31] to-[#3E2A24] flex items-center justify-center min-h-screen">
    <div class="text-center p-6 max-w-md mx-auto bg-white bg-opacity- rounded-xl shadow-lg backdrop-blur-md">
        <!-- Gambar -->
        <img alt="Hands holding a cup of coffee with latte art"
            class="rounded-lg mb-6 mx-auto w-full max-w-xs md:max-w-md shadow-lg hover:scale-105 transition-transform duration-300"
            src="https://storage.googleapis.com/a1aa/image/Xul3aKf6E936I6HXjhsGnTQfm3ft6SxeZ58cDfMs3Ukf4JC9E.jpg" />

        <!-- Judul -->
        <h1 class="text-3xl font-bold mb-5 tracking-wide">
            Waktunya Coffee Break
        </h1>
        <p class="text-black-300 mb-6 leading-relaxed">
            Your daily dose of fresh brew delivered to your doorstep. Start your coffee journey now!
        </p>
        <button
            class="bg-[#F28C28] text-white py-3 px-6 rounded-full mb-4 w-full text-lg font-semibold shadow-lg hover:bg-[#d37722] transition-all duration-300 transform hover:scale-105"
            onclick="window.location.href='menu.php'">
            Masuk
        </button>
        <a class="text-[#F28C28] text-base font-semibold hover:text-[#d37722] transition duration-200"
            href="login_admin.php">
            Masuk sebagai Admin
        </a>
    </div>
</body>

</html>