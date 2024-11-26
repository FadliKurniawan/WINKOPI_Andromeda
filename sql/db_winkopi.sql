-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2024 pada 04.37
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_winkopi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `kategori`, `harga`, `gambar`, `created_at`) VALUES
(1, 'Kopi Susu', 'Kopi', 15000, 'kopi susu.jpg', '2024-11-24 19:02:42'),
(2, 'Kopi Susu Caramel', 'Kopi', 15000, 'kopi susu caramel.jpg', '2024-11-24 19:02:42'),
(3, 'Cappuccino', 'Kopi', 10000, 'cappucino.jpg', '2024-11-24 19:02:42'),
(4, 'Kopi Hitam', 'Kopi', 5000, 'kopi hitam.jpg', '2024-11-24 19:02:42'),
(5, 'Red Velvet', 'Non Kopi', 15000, 'redvelvet.jpg', '2024-11-24 19:02:42'),
(6, 'Vanilla', 'Non Kopi', 15000, 'vanilla.jpg', '2024-11-24 19:02:42'),
(7, 'Taro', 'Non Kopi', 15000, 'taro.jpg', '2024-11-24 19:02:42'),
(8, 'Matcha', 'Non Kopi', 15000, 'matcha.jpg', '2024-11-24 19:02:42'),
(9, 'Coklat', 'Non Kopi', 15000, 'coklat.jpg', '2024-11-24 19:02:42'),
(10, 'Es Teh', 'Minuman Dingin', 5000, 'es teh.jpg', '2024-11-24 19:02:42'),
(11, 'Es Jeruk Yakult', 'Minuman Dingin', 10000, 'es jeruk yakult.jpg', '2024-11-24 19:02:42'),
(12, 'Es Jeruk Original', 'Minuman Dingin', 8000, 'es jeruk original.jpg', '2024-11-24 19:02:42'),
(13, 'Josu', 'Minuman Dingin', 8000, 'josu.png', '2024-11-24 19:02:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(3, 'winkopi', 'winkopi2024', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
