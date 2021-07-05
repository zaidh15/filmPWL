-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 04.47
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfilman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `sinopsis` varchar(400) DEFAULT NULL,
  `rating` varchar(45) DEFAULT NULL,
  `durasi` varchar(45) DEFAULT NULL,
  `tahun` varchar(45) DEFAULT NULL,
  `gambar` varchar(15) DEFAULT NULL,
  `produksi_id` int(11) NOT NULL,
  `sutradara_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id`, `title`, `sinopsis`, `rating`, `durasi`, `tahun`, `gambar`, `produksi_id`, `sutradara_id`, `genre_id`) VALUES
(1, 'Godzilla vs Kong', 'Sebuah pertarungan epic dalam sinematik Monsterverse antara Godzilla dan Kong.Pertarungan Godzilla vs. Kong membuat umat manusia harus bertahan dengan berbagai cara. Salah satunya adalah memusnahkan kedua raksasa tersebut.Siapa yang akan menang?\r\n', '8,4', '1 jam 53 menit', '2021', 'godzi.jpg', 4, 1, 2),
(11, 'Outside The Wire', 'Kisah persahabatan serta perjuangan tentara m', '8,7', '1 jam 55 menit', '2021', 'outside.jpg', 3, 6, 1),
(15, 'Escape Plan', 'Kabur dari penjara dengan estetik', '9.0', '2 jam 15 menit', '2013', '.jpg', 2, 6, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id`, `nama`) VALUES
(1, 'Science Fiction'),
(2, 'Action');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `hp` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id`, `nama`, `email`, `alamat`, `hp`, `foto`) VALUES
(1, 'Pixar Animation Studios', NULL, 'PIXAR ANIMATION STUDIOS1200 PARK AVEEMERYVILLE, CA 94608', '(510) 922-3000', NULL),
(2, 'Paramount Picture', NULL, '5555 Melrose Avenue, Hollywood, California', '(323) 956-5000', 'paramount.jpg'),
(3, 'Starvision Plus', 'starvisionplus@indo.net.id', 'Jalan Cempaka Putih Raya No.11A, Cempaka Putih Tengah, RT.4/RW.6, Cemp. Putih Tim., Kec. Cemp. Putih, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10510', 'Tel: +6221 425 3390', 'Starvision Plus.png'),
(4, 'legendary pictures', 'legendarypictures@gmail.co.id', 'Burbank California, Amerika Serikat', '+1 001342', 'legend.jpg'),
(6, '20th Century Fox', '20thcenturyfox@gmail.com', 'Los Angeles, California, Amerika', '+1  002548', '20th Century Fox.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sutradara`
--

CREATE TABLE `sutradara` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL,
  `umur` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sutradara`
--

INSERT INTO `sutradara` (`id`, `nama`, `jenis_kelamin`, `umur`, `foto`) VALUES
(1, 'Christopher Nolan', 'Laki Laki', '50', 'chris.jpg'),
(2, 'Pete Docter', 'Laki Laki', '52', 'pete.jpg'),
(3, 'Adam Wingard', 'Laki laki', '38 ', 'adam.jpg'),
(6, 'Mikael Hamstrom', 'Laki laki', '60', 'Mikael Hamstrom.jpg'),
(7, 'Joko Anwar', 'Laki-Laki', '59', 'Joko Anwar.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isactive` enum('yes','no','banned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `role` enum('administrator','staff','anggota','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'anggota',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `isactive`, `role`, `created_at`, `updated_at`) VALUES
(1, 'sueb', 'sueb99@gmail.com', NULL, '$2y$10$/lBFu165/iYcntt6xXvMB.5uUwasAN8sokqqKWzp4eRzx24XpbyKK', NULL, 'yes', 'administrator', '2021-07-02 03:08:53', '2021-07-02 03:08:53'),
(2, 'yay', 'yay@gmail.com', NULL, '$2y$10$TYamTv5avk87sgzm85D5huagfReeSiGBQi/7CFAj3iBTE3mUHnMEm', NULL, 'yes', 'staff', '2021-07-02 03:58:07', '2021-07-02 03:58:07'),
(3, 'kududi', 'kudud123@gmail.com', NULL, '$2y$10$thjgl6MUuHA.tP60hNss6eKcsGWx5MLCPhlTZvy2kQUgCslL0lAo6', NULL, 'yes', 'anggota', '2021-07-02 04:30:21', '2021-07-02 04:30:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_film_produksi_idx` (`produksi_id`),
  ADD KEY `fk_film_sutradara1_idx` (`sutradara_id`),
  ADD KEY `fk_film_genre1_idx` (`genre_id`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sutradara`
--
ALTER TABLE `sutradara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sutradara`
--
ALTER TABLE `sutradara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_film_genre1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_film_produksi` FOREIGN KEY (`produksi_id`) REFERENCES `produksi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_film_sutradara1` FOREIGN KEY (`sutradara_id`) REFERENCES `sutradara` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
