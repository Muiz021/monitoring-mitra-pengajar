-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2024 at 07:59 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoringmitra`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `lokasi_id` bigint UNSIGNED DEFAULT NULL,
  `kode_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `lokasi_id`, `kode_kegiatan`, `nama`, `created_at`, `updated_at`) VALUES
(19, 5, 'KEGIAT003', 'VSGA BATCH 8 KOTA BONE', '2024-08-20 03:29:33', '2024-08-20 03:29:33'),
(20, 6, 'KEGIAT004', 'VSGA BATCH 8 KOTA BONE', '2024-08-20 03:29:52', '2024-08-20 03:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` double(8,2) NOT NULL,
  `is_benefit` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `name`, `weight`, `is_benefit`, `created_at`, `updated_at`) VALUES
(2, 'kualitas materi pelatihan', 25.00, 1, '2024-08-01 01:24:37', '2024-08-01 01:27:49'),
(3, 'metode penyampaian materi', 20.00, 1, '2024-08-01 01:27:28', '2024-08-01 01:27:28'),
(4, 'kedisiplinan dalam mengajar', 15.00, 1, '2024-08-01 01:30:06', '2024-08-01 01:30:06'),
(5, 'penggunaan media dan alat ajar', 20.00, 1, '2024-08-01 01:32:36', '2024-08-01 01:32:36'),
(7, 'komunikasi dan interaksi dengan peserta', 20.00, 1, '2024-08-01 01:37:03', '2024-08-01 01:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_maps` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama`, `alamat`, `link_maps`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'Fakultas Teknik Universitas Andi Djemma Palopo', 'Jl. Tandipau Lorong 4, Tomarundung, Kec. Wara Bar., Kota Palopo, Sulawesi Selatan 91911', 'https://maps.app.goo.gl/JYtQv9YSo5miaYiD6', 'http://127.0.0.1:8000/images/lokasi/fakultas-teknik-universitas-andi-djemma-palopo-20240817095501.jpeg', '2024-02-16 03:34:05', '2024-08-17 01:55:01'),
(3, 'Fakultas Ilmu Komputer Universitas Cokroaminoto Palopo', 'Dangerekko Jl. Latamacelling No.6, Tompotika, Kec. Wara Sel., Kota Palopo, Sulawesi Selatan 91921', 'https://maps.app.goo.gl/hb9dr2efDf8B8Fgj9', 'http://127.0.0.1:8000/images/lokasi/fakultas-ilmu-komputer-universitas-cokroaminoto-palopo-20240817095348.jpeg', '2024-03-10 22:35:23', '2024-08-17 01:53:48'),
(5, 'SMKN 1 Bone', 'Jalan Lapawawoi Karaeng Sigeri kr. sigeri, Biru, Kec. Tanete Riattang, Kabupaten Bone, Sulawesi Selatan 92716', 'https://maps.app.goo.gl/ATB5qk6r6pgcf2om8', 'http://127.0.0.1:8000/images/lokasi/smkn-1-bone-20240817103554.jpeg', '2024-08-17 02:35:54', '2024-08-20 03:33:18'),
(6, 'SMKN 7 Bone', 'Biru, Tanete Riattang, Kabupaten Bone, Sulawesi Selatan 92716', 'https://maps.app.goo.gl/Ee8K7PYfHQnF2pHT6', 'http://127.0.0.1:8000/images/lokasi/smkn-7-bone-20240817103746.jpeg', '2024-08-17 02:37:46', '2024-08-17 02:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_12_10_113211_create_mitra_table', 1),
(4, '2024_02_09_102603_create_lokasi_table', 1),
(5, '2024_02_15_104656_create_kegiatan_table', 2),
(6, '2024_02_15_114750_create_program_table', 2),
(7, '2024_02_16_112128_add_lokasi_id_to_kegiatan', 3),
(8, '2024_02_16_132039_create_pegawai_table', 4),
(9, '2024_02_24_102443_create_presensi_table', 5),
(10, '2024_02_24_153237_add_user_id_to_presensi_table', 6),
(11, '2024_06_23_133153_create_analisi_kinerjas_table', 7),
(12, '2024_07_09_152000_add_mitra_dan_program_to_kinerja_mitra_table', 8),
(13, '2024_07_11_160025_add_total_nilai_to_kinerja_mitra_table', 9),
(14, '2024_07_27_125139_create_kriterias_table', 10),
(15, '2024_07_27_133748_create_pertanyaans_table', 10),
(16, '2024_07_27_133956_create_skors_table', 10),
(17, '2024_08_04_124521_add_mitra_id_to_skors_table', 11),
(18, '2024_08_04_125841_add_program_id_to_skors_table', 12),
(19, '2024_08_05_143646_create_pelajars_table', 13),
(20, '2024_08_06_122709_add_pelajar_id_to_skors_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_ponsel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `user_id`, `nama`, `nomor_ponsel`, `mata_pelajaran`, `jenis_kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(3, 9, 'Tasmil', '085330109543', 'Associate Data Scientist', 'pria', 'kota makassar', '2024-03-10 22:51:25', '2024-08-17 00:14:02'),
(7, 14, 'Herman', '082192000121', 'Operator Komputer Madya', 'pria', 'kota makassar', '2024-08-06 06:29:40', '2024-08-17 05:31:50'),
(8, 16, 'Fadly Aprianto', '08111992056', 'Operator Komputer Madya', 'pria', 'kota makassar', '2024-08-17 00:13:15', '2024-08-17 00:13:15'),
(9, 17, 'Yayat Dendy Hadiyat', '082192576500', 'Penulis Naskah Program Siaran TV', 'pria', 'kota makassar', '2024-08-17 00:16:00', '2024-08-17 00:16:00'),
(10, 18, 'Muhammad Restu Singgih', '082192576500', 'Junior Graphic Designer', 'pria', 'kota makassar', '2024-08-17 00:16:55', '2024-08-17 00:16:55'),
(11, 19, 'Bahrawi', '085336861945', 'Junior Network Administrator', 'pria', 'kota makassar', '2024-08-17 05:37:55', '2024-08-17 05:37:55'),
(12, 20, 'Muhammad Arafah', '08114223877', 'Junior Web Developer', 'pria', 'kota makassar', '2024-08-18 06:40:28', '2024-08-18 06:40:28'),
(13, 21, 'Nuraeni Yuliati', '081340132902', 'Operator Komputer Madya', 'wanita', 'kota makassar', '2024-08-18 06:42:35', '2024-08-18 06:42:35'),
(14, 22, 'Nur Alam', '085242075291', 'Operator Komputer Madya', 'pria', 'kota makassar', '2024-08-18 06:43:37', '2024-08-18 06:43:37'),
(15, 23, 'Darman Fauzan', '085348053403', 'Operator Komputer Madya', 'pria', 'kota makassar', '2024-08-18 06:45:03', '2024-08-18 06:45:03'),
(16, 24, 'Taufiq', '085299583005', 'Junior Network Administrator', 'pria', 'kota makassar', '2024-08-18 06:46:13', '2024-08-18 06:46:13'),
(17, 25, 'Khaidir Mubarak Putrasyam', '081286854529', 'Junior Graphic Designer', 'pria', 'kota makassar', '2024-08-18 06:48:32', '2024-08-18 06:48:32'),
(18, 26, 'Rudy Hermayadi', '081242533083', 'Junior Network Administrator', 'pria', 'kota makassar', '2024-08-18 20:06:34', '2024-08-18 20:06:34'),
(19, 27, 'Muhammad Nur Akbar', '085242044250', 'Junior Graphic Designer', 'pria', 'kota makassar', '2024-08-19 00:30:43', '2024-08-19 00:30:43'),
(20, 28, 'Willem Musu', '081211362489', 'Junior Graphic Designer', 'pria', 'kota makassar', '2024-08-19 00:32:05', '2024-08-19 00:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_ponsel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('pria','wanita') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `user_id`, `nama`, `nomor_ponsel`, `gambar`, `jenis_kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 6, 'aco', '081122334455', 'http://127.0.0.1:8000/images/profil/aco-20240216142822.png', 'pria', 'samata', '2024-02-16 06:28:22', '2024-02-16 06:28:22'),
(3, 7, 'saso', '081343671284', 'http://127.0.0.1:8000/images/profil/saso-20240216171405.jpg', 'pria', 'todopuli', '2024-02-16 09:14:05', '2024-02-16 09:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `pelajars`
--

CREATE TABLE `pelajars` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_ponsel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelajars`
--

INSERT INTO `pelajars` (`id`, `user_id`, `nama`, `nomor_ponsel`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 'Syahrul', '085731330062', 1, '2024-08-05 20:03:16', '2024-08-21 07:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaans`
--

CREATE TABLE `pertanyaans` (
  `id` bigint UNSIGNED NOT NULL,
  `kriteria_id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaans`
--

INSERT INTO `pertanyaans` (`id`, `kriteria_id`, `question`, `created_at`, `updated_at`) VALUES
(1, 2, 'Materi yang disampaikan sesuai dengan kebutuhan peserta?', '2024-08-01 03:39:09', '2024-08-16 23:11:23'),
(2, 2, 'Materi pelatihan mudah dipahami oleh peserta?', '2024-08-01 06:32:31', '2024-08-16 23:12:06'),
(3, 2, 'Materi pelatihan relevan dengan topik yang diajarkan?', '2024-08-01 06:32:49', '2024-08-16 23:12:23'),
(6, 3, 'Pengajar mampu menyampaikan materi dengan jelas dan terstruktur?', '2024-08-05 05:00:58', '2024-08-16 23:15:27'),
(7, 2, 'Materi pelatihan diperbarui sesuai perkembangan terbaru di bidang terkait?', '2024-08-16 22:54:57', '2024-08-16 23:12:48'),
(8, 2, 'Materi pelatihan disusun secara sistematis dan terstruktur?', '2024-08-16 23:00:13', '2024-08-16 23:13:41'),
(9, 2, 'Materi yang disampaikan memberikan pengetahuan baru kepada peserta?', '2024-08-16 23:14:02', '2024-08-16 23:14:02'),
(10, 2, 'Materi pelatihan mendukung pengembangan keterampilan praktis peserta?', '2024-08-16 23:15:03', '2024-08-16 23:15:03'),
(11, 3, 'Pengajar menggunakan metode yang efektif dalam penyampaian materi?', '2024-08-16 23:16:05', '2024-08-16 23:16:05'),
(12, 2, 'Pengajar mampu membuat peserta tetap fokus selama pelatihan?', '2024-08-16 23:16:25', '2024-08-16 23:16:25'),
(13, 3, 'Pengajar menyampaikan materi dengan cara yang menarik?', '2024-08-16 23:16:48', '2024-08-16 23:16:48'),
(14, 3, 'Pengajar mampu menyampaikan konsep-konsep yang kompleks dengan sederhana?', '2024-08-16 23:18:00', '2024-08-16 23:18:00'),
(15, 4, 'Pengajar selalu hadir tepat waktu dalam setiap sesi pelatihan?', '2024-08-16 23:18:38', '2024-08-16 23:18:38'),
(16, 4, 'Pengajar menjalankan sesi pelatihan sesuai dengan jadwal yang ditentukan?', '2024-08-16 23:19:03', '2024-08-16 23:19:03'),
(17, 4, 'Pengajar selalu menjaga konsistensi dalam mengajar?', '2024-08-16 23:19:47', '2024-08-16 23:19:47'),
(18, 4, 'Pengajar memperlihatkan sikap profesional selama pelatihan?', '2024-08-16 23:20:07', '2024-08-16 23:25:39'),
(19, 5, 'Pengajar menggunakan media pembelajaran yang sesuai dengan materi?', '2024-08-16 23:20:58', '2024-08-16 23:20:58'),
(20, 4, 'Pengajar memastikan bahwa seluruh peserta mematuhi aturan yang ada selama pelatihan?', '2024-08-16 23:21:51', '2024-08-16 23:21:51'),
(21, 4, 'Pengajar selalu memberikan tugas atau pekerjaan rumah tepat waktu?', '2024-08-16 23:22:16', '2024-08-16 23:22:16'),
(22, 5, 'Pengajar menyajikan media pembelajaran yang menarik bagi peserta?', '2024-08-16 23:22:55', '2024-08-16 23:24:44'),
(23, 5, 'Pengajar mampu mengoperasikan alat bantu ajar dengan baik?', '2024-08-16 23:23:19', '2024-08-16 23:23:19'),
(24, 5, 'Pengajar menyediakan materi presentasi yang mudah diakses oleh peserta?', '2024-08-16 23:23:45', '2024-08-16 23:25:06'),
(25, 5, 'Pengajar menggunakan media visual yang membantu pemahaman materi?', '2024-08-16 23:27:20', '2024-08-16 23:27:20'),
(26, 5, 'Pengajar mengintegrasikan video atau simulasi dalam penyampaian materi?', '2024-08-16 23:27:49', '2024-08-16 23:27:49'),
(27, 7, 'Pengajar berkomunikasi dengan jelas dan mudah dipahami?', '2024-08-16 23:31:12', '2024-08-16 23:31:12'),
(28, 7, 'Pengajar terbuka terhadap pertanyaan dan masukan dari peserta?', '2024-08-16 23:32:02', '2024-08-16 23:32:02'),
(29, 7, 'Pengajar selalu memberikan umpan balik yang konstruktif kepada peserta?', '2024-08-16 23:32:37', '2024-08-16 23:32:37'),
(30, 7, 'Pengajar menciptakan suasana yang nyaman untuk berdiskusi?', '2024-08-16 23:32:56', '2024-08-16 23:32:56'),
(31, 7, 'Pengajar merespon pertanyaan peserta dengan cepat dan tepat?', '2024-08-16 23:54:26', '2024-08-16 23:54:26'),
(32, 7, 'Pengajar mampu menyesuaikan komunikasi dengan berbagai tipe peserta?', '2024-08-16 23:56:48', '2024-08-16 23:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` bigint UNSIGNED NOT NULL,
  `mitra_id` bigint UNSIGNED DEFAULT NULL,
  `kegiatan_id` bigint UNSIGNED NOT NULL,
  `kode_program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `mitra_id`, `kegiatan_id`, `kode_program`, `nama`, `created_at`, `updated_at`) VALUES
(28, 7, 19, 'PROG004', 'Operator Komputer Madya', '2024-08-20 06:55:18', '2024-08-20 06:55:18'),
(29, 8, 19, 'PROG005', 'Operator Komputer Madya', '2024-08-20 06:55:47', '2024-08-20 06:55:47'),
(30, 18, 19, 'PROG006', 'Operator Komputer Madya', '2024-08-20 06:56:03', '2024-08-20 06:56:03'),
(31, 11, 20, 'PROG007', 'Junior Network Administrator', '2024-08-20 06:56:39', '2024-08-20 06:56:39'),
(32, 19, 20, 'PROG008', 'Junior Graphic Designer', '2024-08-20 06:57:08', '2024-08-20 06:57:08'),
(33, 20, 20, 'PROG009', 'Junior Graphic Designer', '2024-08-20 06:57:23', '2024-08-20 06:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `skors`
--

CREATE TABLE `skors` (
  `id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `mitra_id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED NOT NULL,
  `pelajar_id` bigint UNSIGNED NOT NULL,
  `skor` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skors`
--

INSERT INTO `skors` (`id`, `question_id`, `mitra_id`, `program_id`, `pelajar_id`, `skor`, `created_at`, `updated_at`) VALUES
(33, 1, 7, 28, 1, 2, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(34, 2, 7, 28, 1, 3, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(35, 3, 7, 28, 1, 3, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(36, 6, 7, 28, 1, 3, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(37, 7, 7, 28, 1, 3, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(38, 8, 7, 28, 1, 3, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(39, 9, 7, 28, 1, 2, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(40, 10, 7, 28, 1, 4, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(41, 11, 7, 28, 1, 2, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(42, 12, 7, 28, 1, 4, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(43, 13, 7, 28, 1, 2, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(44, 14, 7, 28, 1, 4, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(45, 15, 7, 28, 1, 2, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(46, 16, 7, 28, 1, 3, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(47, 17, 7, 28, 1, 2, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(48, 18, 7, 28, 1, 4, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(49, 19, 7, 28, 1, 4, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(50, 20, 7, 28, 1, 4, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(51, 21, 7, 28, 1, 2, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(52, 22, 7, 28, 1, 3, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(53, 23, 7, 28, 1, 2, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(54, 24, 7, 28, 1, 4, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(55, 25, 7, 28, 1, 3, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(56, 26, 7, 28, 1, 2, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(57, 27, 7, 28, 1, 4, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(58, 28, 7, 28, 1, 4, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(59, 29, 7, 28, 1, 3, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(60, 30, 7, 28, 1, 1, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(61, 31, 7, 28, 1, 3, '2024-08-21 07:08:29', '2024-08-21 07:08:29'),
(62, 32, 7, 28, 1, 4, '2024-08-21 07:08:29', '2024-08-21 07:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `roles`, `created_at`, `updated_at`) VALUES
(6, 'aco', '$2y$10$oUqDjh6rxL33c4Qg243QVu/ZJoiW5y2yeYRmlNJTbLlZQmkdijPcS', 'pegawai', '2024-02-16 06:28:22', '2024-02-16 06:28:22'),
(7, 'saso', '$2y$10$Q1gISIlGcGQQQYRKRSS1f.Rkdw/kvA2QmPE3dR/bVMlF8ZCytdJqC', 'pegawai', '2024-02-16 09:14:05', '2024-02-16 09:14:05'),
(8, 'admin', '$2y$10$0Cwl2izEyKCI4hte8ojYgeNuYJiCzpt7/J8dq6IosU3qWn/v8U4fe', 'admin', NULL, NULL),
(9, 'Tasmil', '$2y$10$OAw.4w.CdphBLDmdZrngEe8BquJfJymGKrvlKzU7ZCGyRJboA7DGu', 'mitra', '2024-03-10 22:51:25', '2024-08-17 00:11:30'),
(11, 'syahrul', '$2y$10$JWE/BghZuLEOqIqQ1ZQxR.urM1ApgAP4Z1ET3aj4PkpK0ZHPg96Tu', 'pelajar', '2024-08-05 20:03:16', '2024-08-21 07:06:51'),
(14, 'herman01', '$2y$10$A/T/0SYsHidwe2NLT9yZq.ySz7AGgQQXYeoNhN//RXQSNmBRuH5lq', 'mitra', '2024-08-06 06:29:40', '2024-08-17 00:10:38'),
(16, 'fadly02', '$2y$10$25PQvmZI8TAPcSUcOJTsqe0Xecb2II0KG4dbCmWdumKdaOU76KIJ.', 'mitra', '2024-08-17 00:13:15', '2024-08-17 00:13:15'),
(17, 'yayat11', '$2y$10$6dL4HmESI2uCIh8edaj3Je8bEiMNz0nmakrgkLuLFUpdP1JQzwQbG', 'mitra', '2024-08-17 00:16:00', '2024-08-17 00:16:00'),
(18, 'restu03', '$2y$10$2GHcBHrZCG60GKWgsQyX3OVi/4/OW5KgdndUPRTMbesGjoBL4xVsK', 'mitra', '2024-08-17 00:16:55', '2024-08-17 00:16:55'),
(19, 'bahrawi', '$2y$10$rhg9sBcHdGIh6waZkxSNCOOf6kexvG8kGiEw/EDk3IxPjjaAYbuhy', 'mitra', '2024-08-17 05:37:55', '2024-08-17 05:37:55'),
(20, 'arafah', '$2y$10$rCUTOvKK7qUXHFcWu.eTNOwGHjrdaQ.NQ6o6PW248U/3g4JLzvAM2', 'mitra', '2024-08-18 06:40:28', '2024-08-18 06:40:28'),
(21, 'nureani', '$2y$10$vJXBzhH/sUS4jLCBpvdU8O9YP5d85luoeXW7pZ/FyBWAvLti7d.12', 'mitra', '2024-08-18 06:42:35', '2024-08-18 06:42:35'),
(22, 'nur_alam', '$2y$10$N2WnZpik1VwCTkb2QUw/TuuB9rV0xwm04Y3eA/OhGraRcHk2MSJvC', 'mitra', '2024-08-18 06:43:37', '2024-08-18 06:43:37'),
(23, 'darman', '$2y$10$ZjfYblK3U2/krWcq28mbNO9itoWBX29Z2an1A90pgIXgIvRJsQWqW', 'mitra', '2024-08-18 06:45:03', '2024-08-18 06:45:03'),
(24, 'taufiq', '$2y$10$I9VXw7t6Wp0G7SxO3rnrd.EURy8aCEdTbtpZt6cmdPt/cHP1kXlkO', 'mitra', '2024-08-18 06:46:13', '2024-08-18 06:46:13'),
(25, 'khaidir', '$2y$10$kNchohGG4WvEcLZECRjrg.5LatGqwyAOqaZ60SRTgDZgsOXFxOyRu', 'mitra', '2024-08-18 06:48:32', '2024-08-18 06:48:32'),
(26, 'rudy', '$2y$10$MQAvySerdjYeZvip9sFVH.Ui4aQp4oPnYM18bh6MjjBiVl6rxWOhe', 'mitra', '2024-08-18 20:06:34', '2024-08-18 20:06:34'),
(27, 'akbar', '$2y$10$8lq9AHBpHpGJoBwr12aXV.orVnk8JQtXTX0E9f4dsd1rU/x9ky6Re', 'mitra', '2024-08-19 00:30:43', '2024-08-19 00:30:43'),
(28, 'willie', '$2y$10$ZMwNvV9LrxsilMO.uPzy1e2UTs0msp/2XI9rtzX8sFdW6pGLOYMTi', 'mitra', '2024-08-19 00:32:05', '2024-08-19 00:32:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kegiatan_to_lokasi` (`lokasi_id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mitra_to_users` (`user_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pegawai_to_users` (`user_id`);

--
-- Indexes for table `pelajars`
--
ALTER TABLE `pelajars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_to_pelajar` (`user_id`);

--
-- Indexes for table `pertanyaans`
--
ALTER TABLE `pertanyaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaans_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_program_to_mitra` (`mitra_id`),
  ADD KEY `fk_program_to_kegiatan` (`kegiatan_id`);

--
-- Indexes for table `skors`
--
ALTER TABLE `skors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skors_question_id_foreign` (`question_id`),
  ADD KEY `skors_mitra_id_foreign` (`mitra_id`),
  ADD KEY `skors_program_id_foreign` (`program_id`),
  ADD KEY `skors_pelajar_id_foreign` (`pelajar_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelajars`
--
ALTER TABLE `pelajars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pertanyaans`
--
ALTER TABLE `pertanyaans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `skors`
--
ALTER TABLE `skors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_lokasi_id_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mitra`
--
ALTER TABLE `mitra`
  ADD CONSTRAINT `mitra_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelajars`
--
ALTER TABLE `pelajars`
  ADD CONSTRAINT `fk_users_to_pelajar` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pertanyaans`
--
ALTER TABLE `pertanyaans`
  ADD CONSTRAINT `pertanyaans_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_mitra_id_foreign` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skors`
--
ALTER TABLE `skors`
  ADD CONSTRAINT `skors_mitra_id_foreign` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skors_pelajar_id_foreign` FOREIGN KEY (`pelajar_id`) REFERENCES `pelajars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skors_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skors_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `pertanyaans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
