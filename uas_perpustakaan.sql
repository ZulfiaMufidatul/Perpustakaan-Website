-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2024 pada 13.07
-- Versi server: 10.4.28-MariaDB-log
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `nisn` varchar(10) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `kelas` varchar(8) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`nisn`, `nama_anggota`, `kelas`, `no_hp`, `foto`, `created_at`, `updated_at`) VALUES
('001111', 'Zulfia Mufidatul Ummah', 'VII G', '085387641924', 'IMG_4689.JPG', '2023-06-25 20:41:23', '2023-07-09 21:30:25'),
('001112', 'Ulfarida Miftakhul Jannah', 'VII F', '081575671203', 'miftaa.jpeg', '2023-06-25 20:42:15', '2023-06-25 20:42:15'),
('001113', 'sanggita', 'VII A', '0987623451764', 'IMG_4699.JPG', '2023-07-09 21:32:05', '2023-07-09 21:32:05'),
('001114', 'Zulfia Mufidatul', 'IX A', '081222444333', '3475b9a3-93fc-4f41-a9bb-81471f3fba81.JPG', '2024-06-20 23:52:02', '2024-06-20 23:52:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `stok_buku` int(10) NOT NULL,
  `buku_tersedia` int(20) NOT NULL,
  `sampul` varchar(5000) DEFAULT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`, `stok_buku`, `buku_tersedia`, `sampul`, `deskripsi`, `created_at`, `updated_at`) VALUES
('BK0100', 'Hujan', 'Tere Liye', 'PT. Gramedia Pustaka Utama', '2016', 5, 5, 'hujan.jpg', 'Novel Hujan menceritakan tentang kisah cinta sekaligus perjuangan hidup seorang perempuan yang bernama Laili. Laili yang baru berusia 13 tahun adalah seorang anak yatim piatu. Hari pertamanya bersekolah, terjadi sebuah bencana gunung meletus dan gempa dahsyat yang menghantam kota tempat ia tinggal.', '2023-06-23 18:49:22', '2023-07-09 21:09:03'),
('BK0101', 'Bumi', 'Tere Liye', 'PT. Gramedia Pustaka Utama', '2014', 4, 3, 'bumi.jpg', '', '2023-06-23 19:04:13', '2023-06-25 09:10:37'),
('BK0102', 'Bulan', 'Tere Liye', 'PT. Gramedia Pustaka Utama', '2015', 6, 3, 'bulan.jpg', '', '2023-06-23 19:07:31', '2023-06-25 09:11:03'),
('BK0103', 'Bahasa Indonesia Kelas VII', 'Titik Harsiati, Agus Trianto, dan E. Kosasih.', 'Pusat Kurikulum dan Perbukuan, Balitbang, Kemendikbud.', '2017', 200, 200, 'bindo.jpg', 'Pada tiap bab Buku Siswa ini terdapat bagian-bagian yang mencakup pengantar berisi fenomena komunikasi terkait dengan jenis teks yang dipelajari, pemodelan teks diikuti kotak info untuk meningkatkan pengetahuan tentang ciri umum teks, membaca/ menyimak intensif untuk melatih keterampilan reseptif sesuai teks yang dipelajari', '2023-06-23 19:10:48', '2023-06-25 17:17:20'),
('BK0104', 'Bahasa Inggris When English Rings a Bell', 'Wulan', 'Pusat Kurikulum dan Perbukuan, Balitbang, Kemendikbud.', '2001', 9, 7, 'bing.jpg', 'ISI SENDIRI', '2023-07-09 21:34:16', '2023-07-09 21:34:16'),
('BK0105', 'a', 'sdfghjknkdgkhalwidh', 'dfghjk', '1999', 7, 8, 'a.png', 'wefghjkldfghjk', '2024-07-02 07:08:35', '2024-07-02 07:08:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `kategori_buku` varchar(20) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori_buku`, `judul_buku`, `created_at`, `updated_at`) VALUES
('KTR001', 'Bahasa Indonesia', 'Bahasa Indonesia Kelas VII', '2023-06-24 08:33:36', '2023-06-24 08:33:36'),
('KTR002', 'Novel', 'Hujan', '2023-06-25 08:27:28', '2023-06-25 08:27:28'),
('KTR003', 'Bahasa Inggris', 'Bahasa Inggris When English Rings a Bell', '2023-07-09 21:35:23', '2023-07-09 21:35:23'),
('KTR004', 'cadf', 'Bahasa Indonesia Kelas VII', '2024-07-02 06:47:29', '2024-07-02 06:48:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(10) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_jatuhtempo` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_peminjaman` enum('Dipinjam','Dikembalikan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nisn`, `judul_buku`, `tanggal_pinjam`, `tanggal_jatuhtempo`, `tanggal_kembali`, `status_peminjaman`, `created_at`, `updated_at`) VALUES
('PJM001', '001111', 'Hujan', '2023-06-07', '2023-06-17', '2023-06-19', 'Dikembalikan', '2023-06-25 08:45:10', '2023-07-09 10:01:49'),
('PJM002', '001111', 'Hujan', '2023-06-04', '2023-06-14', '2023-06-20', 'Dikembalikan', '2023-06-25 21:11:01', '2023-07-09 10:02:05'),
('PJM003', '001111', 'Hujan', '2023-06-02', '2023-06-12', '2023-07-01', 'Dikembalikan', '2023-06-25 22:13:44', '2023-07-09 10:02:37'),
('PJM004', '001111', 'Hujan', '2023-10-28', '2023-11-07', '2023-11-07', 'Dikembalikan', '2023-07-09 03:36:48', '2023-07-09 10:03:13'),
('PJM005', '001111', 'Hujan', '2023-07-01', '2023-07-09', '2023-07-10', 'Dikembalikan', '2023-07-09 10:01:05', '2023-07-09 10:01:24'),
('PJM006', '001112', 'Bulan', '2021-12-31', '2022-01-05', NULL, 'Dipinjam', '2023-07-09 10:05:35', '2023-07-09 10:05:35'),
('PJM007', '001111', 'Hujan', '2023-01-01', '2023-01-10', '2023-01-12', 'Dikembalikan', '2023-07-09 10:12:47', '2023-07-09 10:13:11'),
('PJM008', '001111', 'Hujan', '2022-11-25', '2022-11-30', '2022-12-02', 'Dikembalikan', '2023-07-09 21:06:41', '2023-07-09 21:07:03'),
('PJM009', '001111', 'Hujan', '2025-11-30', '2025-01-01', '2025-01-02', 'Dikembalikan', '2024-06-12 06:22:27', '2024-06-12 06:23:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
--

CREATE TABLE `pengadaan` (
  `noTr` varchar(10) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `harga_buku` int(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `asal_dana` enum('Universitas','Yayasan','Fakultas','') NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengadaan`
--

INSERT INTO `pengadaan` (`noTr`, `judul_buku`, `harga_buku`, `jumlah`, `asal_dana`, `updated_at`, `created_at`) VALUES
('TR0100', 'Belajar HTML', 99000, 10, 'Universitas', '2024-06-23 10:40:45', '2024-06-20 08:35:12'),
('TR0101', '50 resep masakan', 50000, 6, 'Universitas', '2024-06-23 10:31:34', '2024-06-23 10:31:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_peminjaman`
--

CREATE TABLE `riwayat_peminjaman` (
  `id_riwayat` varchar(10) NOT NULL,
  `id_peminjaman` varchar(10) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_jatuhtempo` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `kondisi_buku` enum('Bagus','Rusak','','') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_stok` varchar(10) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `jml_stok` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_stok`, `id_buku`, `jml_stok`, `created_at`, `updated_at`) VALUES
('STK001', 'BK001', 2, NULL, '2023-06-18 01:54:05'),
('STK002', 'BK002', 4, '2023-06-21 05:31:06', '2023-06-22 05:31:06'),
('STK004', 'BK004', 9, '2023-06-09 07:03:53', '2023-06-09 07:04:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('admin','user','','') NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin1', 'admin1@gmail.com', NULL, '$2y$10$xUXf6D6UBCM2Lut/GmZJjeZ3d4Kqo3v8s0hrhbRDYy4d.0MuCZHnW', NULL, '2023-06-23 08:42:13', '2023-06-23 08:42:13'),
(4, 'user', 'user', 'user@gmail.com', NULL, '$2y$10$3Zj50WUkeHzUGFqiW8BcZ.VLlX4nWMU6Y6ykl.M/SJNmh1h72R8NS', NULL, '2023-06-23 08:43:21', '2023-06-23 08:43:21'),
(5, 'user', 'user2', 'user2@gmail.com', NULL, '$2y$10$RKO93xwRoA8czTsyIUq8R.HKmjzklmbnaUoevdjCZIAynOPq6w8Oa', NULL, '2023-06-26 18:48:28', '2023-06-26 18:48:28'),
(6, 'user', 'user1zulfia@gmail.com', 'user1zulfia@gmail.com', NULL, '$2y$10$VTc44h7hTLTKTjdQOlu87uNLrlKtS98OYcXpJfC/K3J7x6Bq3m3ay', NULL, '2023-07-09 08:08:36', '2023-07-09 08:08:36'),
(7, 'user', 'opet@gmail.com', 'opet@gmail.com', NULL, '$2y$10$VQmDnJNzW4vNj.49OPeRaOPICekyuPUKQqWCeW0zuflogOq/sW94W', NULL, '2023-07-09 20:43:39', '2023-07-09 20:43:39'),
(8, 'user', 'tedo@gmail.com', 'tedo@gmail.com', NULL, '$2y$10$tV8SmFAONpbITdl7yBigvOEdDKW1Vu.02e7C2VXQwExkSryF6ayWK', NULL, '2023-07-09 21:26:43', '2023-07-09 21:26:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `judul_buku` (`judul_buku`);

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
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `nisn` (`nisn`,`judul_buku`);

--
-- Indeks untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`noTr`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_peminjaman` (`id_peminjaman`,`nisn`,`id_buku`),
  ADD KEY `tanggal_pinjam` (`tanggal_pinjam`,`tanggal_jatuhtempo`,`tanggal_kembali`,`kondisi_buku`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_buku` (`id_buku`);

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
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
