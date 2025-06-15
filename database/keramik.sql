-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2025 pada 06.38
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
-- Database: `keramik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nama_album` char(50) NOT NULL,
  `slug_album` char(50) NOT NULL,
  `foto` text NOT NULL,
  `created_by` char(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` char(20) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id_album`, `nama_album`, `slug_album`, `foto`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(2, 'Vidio Pembuatan', 'vidio-pembuatan', 'vidio-pembuatan20250228224636.jpg', 'superadmin', '2025-02-28 17:12:59', 'superadmin', '2025-02-28 22:46:38'),
(4, 'nyobaaannn', 'nyobaaannn', 'nyobaaannn20250228225059.jpg', 'superadmin', '2025-02-28 22:50:59', NULL, NULL),
(5, 'dssds', 'dssds', 'dssds20250228230412.jpg', 'superadmin', '2025-02-28 23:04:12', NULL, NULL),
(6, 'gambar', 'gambar', 'sedang-gambar20250228230441.png', 'superadmin', '2025-02-28 23:04:43', 'superadmin', '2025-03-24 03:31:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `nama_berita` varchar(100) NOT NULL,
  `slug_berita` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `foto_type` char(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` char(50) NOT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `modified_by` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `nama_berita`, `slug_berita`, `deskripsi`, `kategori`, `foto`, `foto_type`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(8, 'Lomba Foto LDWN 2023', 'lomba-foto-ldwn-2023', '<p>Dalam rangka memeriahkan LOMBA DESA WISATA NUSANTARA 2023 dan sebagai bagian dari rangkaian kegiatan ROAD TO LOMBA DESA WISATA NUSANTARA 2023, Kami menggelar KOMPETISI KREATIF LDWN 2023 yaitu LOMBA FOTO. Kompetisi ini bersifat INDIVIDU/PERORANGAN dan TERBUKA UNTUK UMUM serta GRATIS tanpa dipungut biaya.<br><br>TEMA LOMBA : \"BERWISATA...KE DESA AJA\"<br><br>OBYEK LOMBA : Obyek Foto berupa aktivitas di desa wisata, keindahan pemandangan dan atraksi wisata serta fasilitas wisatayang ada di desa wisata seluruh Indonesia.<br><br>PERIODE KOMPETISI : 01 SEPTEMBER - 8 OKTOBER 2023<br><br>HADIAH LOMBA FOTO :<br>JUARA I : Rp. 2.500.000,00<br>JUARA II : Rp. 1.500.000,00<br>JUARA III : Rp. 1.000.000,00</p>', 4, 'lomba-foto-ldwn-202320230908201256', '.jpg', '2023-09-08 20:11:54', 'superadmin', '2025-02-26 18:35:55', 'superadmin'),
(9, 'WORKSHOP PENGENALAN KERAMIK', 'workshop-pengenalan-keramik', '<p data-start=\"297\" data-end=\"613\">Plered kembali mencatatkan peningkatan ekspor keramik ke pasar internasional. Pada tahun 2023, ekspor keramik Plered hanya mencakup 3 negara, yakni Amerika, Inggris, dan Turki. Namun, pada tahun 2024, jumlah negara tujuan ekspor bertambah menjadi 6 negara, termasuk Polandia, Australia, Yunani, Spanyol, dan India.</p>\r\n<p data-start=\"615\" data-end=\"947\">Menurut data UPTD Litbang Keramik Plered, total pengiriman tahun ini mencapai <strong data-start=\"693\" data-end=\"709\">14 kontainer</strong>, dengan Amerika tetap menjadi pasar utama dengan <strong data-start=\"759\" data-end=\"774\">7 kontainer</strong>. Kepala UPTD Litbang Keramik Plered, Bapak [Nama], menyatakan bahwa permintaan internasional meningkat berkat kualitas produk yang terjaga serta promosi yang lebih aktif.</p>\r\n<p data-start=\"949\" data-end=\"1115\">Untuk memperluas pasar, UPTD Litbang Keramik Plered juga terus mendorong para pengrajin lokal untuk meningkatkan inovasi produk dan mengikuti standar ekspor global.</p>', 3, 'workshop-pengenalan-keramik20250226163118', '.jpg', '2025-02-26 16:31:19', 'superadmin', NULL, ''),
(10, 'LOMBA WORKSHOP UPTD', 'lomba-workshop-uptd', '<p>sfsfrgrsgsgsgs</p>', 4, 'lomba-workshop-uptd20250226174843', '.png', '2025-02-26 17:48:43', 'superadmin', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_desc` text NOT NULL,
  `company_address` text NOT NULL,
  `company_maps` text NOT NULL,
  `company_phone` char(30) NOT NULL,
  `company_phone2` char(30) NOT NULL,
  `company_fax` char(30) NOT NULL,
  `company_email` char(30) NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL,
  `created_by` char(50) NOT NULL,
  `modified_by` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id_company`, `company_name`, `company_desc`, `company_address`, `company_maps`, `company_phone`, `company_phone2`, `company_fax`, `company_email`, `foto`, `foto_type`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 'UPTD LITBANG KERAMIK PLERED PURWAKARTA', 'UPTD Litbang Keramik Plered adalah unit penelitian dan pengembangan yang berfokus pada inovasi, pelestarian, dan pengembangan industri kerajinan keramik di Plered, Purwakarta. Tempat ini menjadi pusat edukasi bagi pengrajin, pelajar, dan masyarakat dalam memahami proses produksi keramik, mulai dari teknik tradisional hingga modern. Selain itu, UPTD ini juga berperan dalam meningkatkan daya saing produk keramik Plered melalui pelatihan, penelitian, dan promosi.', 'Jl. Raya Anjun-Plered-Purwakarta Jl. Raya Plered No.12B, Anjun, Kec. Plered, Kabupaten Purwakarta, Jawa Barat 41162', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16327777.649419477!2d108.84621849858628!3d-2.415291213289622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sen!2sid!4v1506312173230\" width=\"100%\" height=\"200\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '6287737968218', '', '-', 'uptdlitbang@gmail.com', 'uptd-litbang-keramik-plered20250226082700', '.png', '2023-01-03 00:00:00', NULL, 'amperakoding', 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `nama_foto` char(100) NOT NULL,
  `slug_foto` char(100) NOT NULL,
  `foto` text NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` char(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` char(20) NOT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `album_id`, `nama_foto`, `slug_foto`, `foto`, `deskripsi`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 2, 'Proses Pembuatan Keramik', 'proses-pembuatan-keramik', 'proses-pembuatan-keramik20250228173114.jpg', 'Perpaduan unik dari warna kulit dan warna yang lebih elegan seperti dark imperial blue dan ruby membuat skema warna ini ideal untuk desain website yang bertujuan untuk menyampaikan pesan tertentu. Nuansa yang ditampilkan cenderung elegan namun masih tergolong menyenangkan.', 'superadmin', '2025-02-28 17:31:14', 'superadmin', '2025-02-28 22:01:54'),
(3, 2, 'Proses Pembuatan Keramikkkkk', 'proses-pembuatan-keramikkkkk', 'proses-pembuatan-keramikkkkk20250228175806.png', 'ini adalah foto', 'superadmin', '2025-02-28 17:58:07', 'superadmin', '2025-02-28 18:01:56'),
(4, 2, 'Proses Pembuatan Keramik', 'proses-pembuatan-keramik', 'foto-halaman-admin20250228180227.png', 'foto halaman admin1', 'superadmin', '2025-02-28 18:02:29', 'superadmin', '2025-02-28 18:04:11'),
(5, 2, 'nnzznznznnz', 'nnzznznznnz', 'foto-halaman-admin120250228202858.png', 'foto halaman admin1', 'superadmin', '2025-02-28 20:06:12', 'superadmin', '2025-02-28 20:28:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `slug_kat` varchar(20) NOT NULL,
  `created_by` char(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` char(50) NOT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kat`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(3, 'Berita', 'berita', 'superadmin', '2023-09-08 19:14:12', 'superadmin', '2025-02-26 17:47:13'),
(4, 'Perlombaan', 'perlombaan', 'superadmin', '2025-02-26 17:47:53', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` char(50) NOT NULL,
  `nohp` char(50) NOT NULL,
  `created_by` char(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` char(50) NOT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama_kontak`, `nohp`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(5, 'UPTD LITBANG KERAMIK PLERED', '6287737968218', 'superadmin', '2023-09-08 20:14:12', 'superadmin', '2025-02-28 23:07:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `provinsi_id`, `nama_kota`) VALUES
(1, 21, 'Aceh Barat'),
(2, 21, 'Aceh Barat Daya'),
(3, 21, 'Aceh Besar'),
(4, 21, 'Aceh Jaya'),
(5, 21, 'Aceh Selatan'),
(6, 21, 'Aceh Singkil'),
(7, 21, 'Aceh Tamiang'),
(8, 21, 'Aceh Tengah'),
(9, 21, 'Aceh Tenggara'),
(10, 21, 'Aceh Timur'),
(11, 21, 'Aceh Utara'),
(12, 32, 'Agam'),
(13, 23, 'Alor'),
(14, 19, 'Ambon'),
(15, 34, 'Asahan'),
(16, 24, 'Asmat'),
(17, 1, 'Badung'),
(18, 13, 'Balangan'),
(19, 15, 'Balikpapan'),
(20, 21, 'Banda Aceh'),
(21, 18, 'Bandar Lampung'),
(22, 9, 'Bandung'),
(24, 9, 'Bandung Barat'),
(25, 29, 'Banggai'),
(26, 29, 'Banggai Kepulauan'),
(27, 2, 'Bangka'),
(28, 2, 'Bangka Barat'),
(29, 2, 'Bangka Selatan'),
(30, 2, 'Bangka Tengah'),
(31, 11, 'Bangkalan'),
(32, 1, 'Bangli'),
(33, 13, 'Banjar'),
(35, 13, 'Banjarbaru'),
(36, 13, 'Banjarmasin'),
(37, 10, 'Banjarnegara'),
(38, 28, 'Bantaeng'),
(39, 5, 'Bantul'),
(40, 33, 'Banyuasin'),
(41, 10, 'Banyumas'),
(42, 11, 'Banyuwangi'),
(43, 13, 'Barito Kuala'),
(44, 14, 'Barito Selatan'),
(45, 14, 'Barito Timur'),
(46, 14, 'Barito Utara'),
(47, 28, 'Barru'),
(48, 17, 'Batam'),
(49, 10, 'Batang'),
(50, 8, 'Batang Hari'),
(51, 11, 'Batu'),
(52, 34, 'Batu Bara'),
(53, 30, 'Bau-Bau'),
(54, 9, 'Bekasi'),
(56, 2, 'Belitung'),
(57, 2, 'Belitung Timur'),
(58, 23, 'Belu'),
(59, 21, 'Bener Meriah'),
(60, 26, 'Bengkalis'),
(61, 12, 'Bengkayang'),
(62, 4, 'Bengkulu'),
(63, 4, 'Bengkulu Selatan'),
(64, 4, 'Bengkulu Tengah'),
(65, 4, 'Bengkulu Utara'),
(66, 15, 'Berau'),
(67, 24, 'Biak Numfor'),
(68, 22, 'Bima'),
(70, 34, 'Binjai'),
(71, 17, 'Bintan'),
(72, 21, 'Bireuen'),
(73, 31, 'Bitung'),
(74, 11, 'Blitar'),
(76, 10, 'Blora'),
(77, 7, 'Boalemo'),
(78, 9, 'Bogor'),
(80, 11, 'Bojonegoro'),
(81, 31, 'Bolaang Mongondow (Bolmong)'),
(82, 31, 'Bolaang Mongondow Selatan'),
(83, 31, 'Bolaang Mongondow Timur'),
(84, 31, 'Bolaang Mongondow Utara'),
(85, 30, 'Bombana'),
(86, 11, 'Bondowoso'),
(87, 28, 'Bone'),
(88, 7, 'Bone Bolango'),
(89, 15, 'Bontang'),
(90, 24, 'Boven Digoel'),
(91, 10, 'Boyolali'),
(92, 10, 'Brebes'),
(93, 32, 'Bukittinggi'),
(94, 1, 'Buleleng'),
(95, 28, 'Bulukumba'),
(96, 16, 'Bulungan (Bulongan)'),
(97, 8, 'Bungo'),
(98, 29, 'Buol'),
(99, 19, 'Buru'),
(100, 19, 'Buru Selatan'),
(101, 30, 'Buton'),
(102, 30, 'Buton Utara'),
(103, 9, 'Ciamis'),
(104, 9, 'Cianjur'),
(105, 10, 'Cilacap'),
(106, 3, 'Cilegon'),
(107, 9, 'Cimahi'),
(108, 9, 'Cirebon'),
(110, 34, 'Dairi'),
(111, 24, 'Deiyai (Deliyai)'),
(112, 34, 'Deli Serdang'),
(113, 10, 'Demak'),
(114, 1, 'Denpasar'),
(115, 9, 'Depok'),
(116, 32, 'Dharmasraya'),
(117, 24, 'Dogiyai'),
(118, 22, 'Dompu'),
(119, 29, 'Donggala'),
(120, 26, 'Dumai'),
(121, 33, 'Empat Lawang'),
(122, 23, 'Ende'),
(123, 28, 'Enrekang'),
(124, 25, 'Fakfak'),
(125, 23, 'Flores Timur'),
(126, 9, 'Garut'),
(127, 21, 'Gayo Lues'),
(128, 1, 'Gianyar'),
(129, 7, 'Gorontalo'),
(131, 7, 'Gorontalo Utara'),
(132, 28, 'Gowa'),
(133, 11, 'Gresik'),
(134, 10, 'Grobogan'),
(135, 5, 'Gunung Kidul'),
(136, 14, 'Gunung Mas'),
(137, 34, 'Gunungsitoli'),
(138, 20, 'Halmahera Barat'),
(139, 20, 'Halmahera Selatan'),
(140, 20, 'Halmahera Tengah'),
(141, 20, 'Halmahera Timur'),
(142, 20, 'Halmahera Utara'),
(143, 13, 'Hulu Sungai Selatan'),
(144, 13, 'Hulu Sungai Tengah'),
(145, 13, 'Hulu Sungai Utara'),
(146, 34, 'Humbang Hasundutan'),
(147, 26, 'Indragiri Hilir'),
(148, 26, 'Indragiri Hulu'),
(149, 9, 'Indramayu'),
(150, 24, 'Intan Jaya'),
(151, 6, 'Jakarta Barat'),
(152, 6, 'Jakarta Pusat'),
(153, 6, 'Jakarta Selatan'),
(154, 6, 'Jakarta Timur'),
(155, 6, 'Jakarta Utara'),
(156, 8, 'Jambi'),
(157, 24, 'Jayapura'),
(159, 24, 'Jayawijaya'),
(160, 11, 'Jember'),
(161, 1, 'Jembrana'),
(162, 28, 'Jeneponto'),
(163, 10, 'Jepara'),
(164, 11, 'Jombang'),
(165, 25, 'Kaimana'),
(166, 26, 'Kampar'),
(167, 14, 'Kapuas'),
(168, 12, 'Kapuas Hulu'),
(169, 10, 'Karanganyar'),
(170, 1, 'Karangasem'),
(171, 9, 'Karawang'),
(172, 17, 'Karimun'),
(173, 34, 'Karo'),
(174, 14, 'Katingan'),
(175, 4, 'Kaur'),
(176, 12, 'Kayong Utara'),
(177, 10, 'Kebumen'),
(178, 11, 'Kediri'),
(180, 24, 'Keerom'),
(181, 10, 'Kendal'),
(182, 30, 'Kendari'),
(183, 4, 'Kepahiang'),
(184, 17, 'Kepulauan Anambas'),
(185, 19, 'Kepulauan Aru'),
(186, 32, 'Kepulauan Mentawai'),
(187, 26, 'Kepulauan Meranti'),
(188, 31, 'Kepulauan Sangihe'),
(189, 6, 'Kepulauan Seribu'),
(190, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(191, 20, 'Kepulauan Sula'),
(192, 31, 'Kepulauan Talaud'),
(193, 24, 'Kepulauan Yapen (Yapen Waropen)'),
(194, 8, 'Kerinci'),
(195, 12, 'Ketapang'),
(196, 10, 'Klaten'),
(197, 1, 'Klungkung'),
(198, 30, 'Kolaka'),
(199, 30, 'Kolaka Utara'),
(200, 30, 'Konawe'),
(201, 30, 'Konawe Selatan'),
(202, 30, 'Konawe Utara'),
(203, 13, 'Kotabaru'),
(204, 31, 'Kotamobagu'),
(205, 14, 'Kotawaringin Barat'),
(206, 14, 'Kotawaringin Timur'),
(207, 26, 'Kuantan Singingi'),
(208, 12, 'Kubu Raya'),
(209, 10, 'Kudus'),
(210, 5, 'Kulon Progo'),
(211, 9, 'Kuningan'),
(212, 23, 'Kupang'),
(214, 15, 'Kutai Barat'),
(215, 15, 'Kutai Kartanegara'),
(216, 15, 'Kutai Timur'),
(217, 34, 'Labuhan Batu'),
(218, 34, 'Labuhan Batu Selatan'),
(219, 34, 'Labuhan Batu Utara'),
(220, 33, 'Lahat'),
(221, 14, 'Lamandau'),
(222, 11, 'Lamongan'),
(223, 18, 'Lampung Barat'),
(224, 18, 'Lampung Selatan'),
(225, 18, 'Lampung Tengah'),
(226, 18, 'Lampung Timur'),
(227, 18, 'Lampung Utara'),
(228, 12, 'Landak'),
(229, 34, 'Langkat'),
(230, 21, 'Langsa'),
(231, 24, 'Lanny Jaya'),
(232, 3, 'Lebak'),
(233, 4, 'Lebong'),
(234, 23, 'Lembata'),
(235, 21, 'Lhokseumawe'),
(236, 32, 'Lima Puluh Koto/Kota'),
(237, 17, 'Lingga'),
(238, 22, 'Lombok Barat'),
(239, 22, 'Lombok Tengah'),
(240, 22, 'Lombok Timur'),
(241, 22, 'Lombok Utara'),
(242, 33, 'Lubuk Linggau'),
(243, 11, 'Lumajang'),
(244, 28, 'Luwu'),
(245, 28, 'Luwu Timur'),
(246, 28, 'Luwu Utara'),
(247, 11, 'Madiun'),
(249, 10, 'Magelang'),
(251, 11, 'Magetan'),
(252, 9, 'Majalengka'),
(253, 27, 'Majene'),
(254, 28, 'Makassar'),
(255, 11, 'Malang'),
(257, 16, 'Malinau'),
(258, 19, 'Maluku Barat Daya'),
(259, 19, 'Maluku Tengah'),
(260, 19, 'Maluku Tenggara'),
(261, 19, 'Maluku Tenggara Barat'),
(262, 27, 'Mamasa'),
(263, 24, 'Mamberamo Raya'),
(264, 24, 'Mamberamo Tengah'),
(265, 27, 'Mamuju'),
(266, 27, 'Mamuju Utara'),
(267, 31, 'Manado'),
(268, 34, 'Mandailing Natal'),
(269, 23, 'Manggarai'),
(270, 23, 'Manggarai Barat'),
(271, 23, 'Manggarai Timur'),
(272, 25, 'Manokwari'),
(273, 25, 'Manokwari Selatan'),
(274, 24, 'Mappi'),
(275, 28, 'Maros'),
(276, 22, 'Mataram'),
(277, 25, 'Maybrat'),
(278, 34, 'Medan'),
(279, 12, 'Melawi'),
(280, 8, 'Merangin'),
(281, 24, 'Merauke'),
(282, 18, 'Mesuji'),
(283, 18, 'Metro'),
(284, 24, 'Mimika'),
(285, 31, 'Minahasa'),
(286, 31, 'Minahasa Selatan'),
(287, 31, 'Minahasa Tenggara'),
(288, 31, 'Minahasa Utara'),
(289, 11, 'Mojokerto'),
(291, 29, 'Morowali'),
(292, 33, 'Muara Enim'),
(293, 8, 'Muaro Jambi'),
(294, 4, 'Muko Muko'),
(295, 30, 'Muna'),
(296, 14, 'Murung Raya'),
(297, 33, 'Musi Banyuasin'),
(298, 33, 'Musi Rawas'),
(299, 24, 'Nabire'),
(300, 21, 'Nagan Raya'),
(301, 23, 'Nagekeo'),
(302, 17, 'Natuna'),
(303, 24, 'Nduga'),
(304, 23, 'Ngada'),
(305, 11, 'Nganjuk'),
(306, 11, 'Ngawi'),
(307, 34, 'Nias'),
(308, 34, 'Nias Barat'),
(309, 34, 'Nias Selatan'),
(310, 34, 'Nias Utara'),
(311, 16, 'Nunukan'),
(312, 33, 'Ogan Ilir'),
(313, 33, 'Ogan Komering Ilir'),
(314, 33, 'Ogan Komering Ulu'),
(315, 33, 'Ogan Komering Ulu Selatan'),
(316, 33, 'Ogan Komering Ulu Timur'),
(317, 11, 'Pacitan'),
(318, 32, 'Padang'),
(319, 34, 'Padang Lawas'),
(320, 34, 'Padang Lawas Utara'),
(321, 32, 'Padang Panjang'),
(322, 32, 'Padang Pariaman'),
(323, 34, 'Padang Sidempuan'),
(324, 33, 'Pagar Alam'),
(325, 34, 'Pakpak Bharat'),
(326, 14, 'Palangka Raya'),
(327, 33, 'Palembang'),
(328, 28, 'Palopo'),
(329, 29, 'Palu'),
(330, 11, 'Pamekasan'),
(331, 3, 'Pandeglang'),
(332, 9, 'Pangandaran'),
(333, 28, 'Pangkajene Kepulauan'),
(334, 2, 'Pangkal Pinang'),
(335, 24, 'Paniai'),
(336, 28, 'Parepare'),
(337, 32, 'Pariaman'),
(338, 29, 'Parigi Moutong'),
(339, 32, 'Pasaman'),
(340, 32, 'Pasaman Barat'),
(341, 15, 'Paser'),
(342, 11, 'Pasuruan'),
(344, 10, 'Pati'),
(345, 32, 'Payakumbuh'),
(346, 25, 'Pegunungan Arfak'),
(347, 24, 'Pegunungan Bintang'),
(348, 10, 'Pekalongan'),
(350, 26, 'Pekanbaru'),
(351, 26, 'Pelalawan'),
(352, 10, 'Pemalang'),
(353, 34, 'Pematang Siantar'),
(354, 15, 'Penajam Paser Utara'),
(355, 18, 'Pesawaran'),
(356, 18, 'Pesisir Barat'),
(357, 32, 'Pesisir Selatan'),
(358, 21, 'Pidie'),
(359, 21, 'Pidie Jaya'),
(360, 28, 'Pinrang'),
(361, 7, 'Pohuwato'),
(362, 27, 'Polewali Mandar'),
(363, 11, 'Ponorogo'),
(364, 12, 'Pontianak'),
(366, 29, 'Poso'),
(367, 33, 'Prabumulih'),
(368, 18, 'Pringsewu'),
(369, 11, 'Probolinggo'),
(371, 14, 'Pulang Pisau'),
(372, 20, 'Pulau Morotai'),
(373, 24, 'Puncak'),
(374, 24, 'Puncak Jaya'),
(375, 10, 'Purbalingga'),
(376, 9, 'Purwakarta'),
(377, 10, 'Purworejo'),
(378, 25, 'Raja Ampat'),
(379, 4, 'Rejang Lebong'),
(380, 10, 'Rembang'),
(381, 26, 'Rokan Hilir'),
(382, 26, 'Rokan Hulu'),
(383, 23, 'Rote Ndao'),
(384, 21, 'Sabang'),
(385, 23, 'Sabu Raijua'),
(386, 10, 'Salatiga'),
(387, 15, 'Samarinda'),
(388, 12, 'Sambas'),
(389, 34, 'Samosir'),
(390, 11, 'Sampang'),
(391, 12, 'Sanggau'),
(392, 24, 'Sarmi'),
(393, 8, 'Sarolangun'),
(394, 32, 'Sawah Lunto'),
(395, 12, 'Sekadau'),
(396, 28, 'Selayar (Kepulauan Selayar)'),
(397, 4, 'Seluma'),
(398, 10, 'Semarang'),
(400, 19, 'Seram Bagian Barat'),
(401, 19, 'Seram Bagian Timur'),
(402, 3, 'Serang'),
(404, 34, 'Serdang Bedagai'),
(405, 14, 'Seruyan'),
(406, 26, 'Siak'),
(407, 34, 'Sibolga'),
(408, 28, 'Sidenreng Rappang/Rapang'),
(409, 11, 'Sidoarjo'),
(410, 29, 'Sigi'),
(411, 32, 'Sijunjung (Sawah Lunto Sijunjung)'),
(412, 23, 'Sikka'),
(413, 34, 'Simalungun'),
(414, 21, 'Simeulue'),
(415, 12, 'Singkawang'),
(416, 28, 'Sinjai'),
(417, 12, 'Sintang'),
(418, 11, 'Situbondo'),
(419, 5, 'Sleman'),
(420, 32, 'Solok'),
(422, 32, 'Solok Selatan'),
(423, 28, 'Soppeng'),
(424, 25, 'Sorong'),
(426, 25, 'Sorong Selatan'),
(427, 10, 'Sragen'),
(428, 9, 'Subang'),
(429, 21, 'Subulussalam'),
(430, 9, 'Sukabumi'),
(432, 14, 'Sukamara'),
(433, 10, 'Sukoharjo'),
(434, 23, 'Sumba Barat'),
(435, 23, 'Sumba Barat Daya'),
(436, 23, 'Sumba Tengah'),
(437, 23, 'Sumba Timur'),
(438, 22, 'Sumbawa'),
(439, 22, 'Sumbawa Barat'),
(440, 9, 'Sumedang'),
(441, 11, 'Sumenep'),
(442, 8, 'Sungaipenuh'),
(443, 24, 'Supiori'),
(444, 11, 'Surabaya'),
(445, 10, 'Surakarta (Solo)'),
(446, 13, 'Tabalong'),
(447, 1, 'Tabanan'),
(448, 28, 'Takalar'),
(449, 25, 'Tambrauw'),
(450, 16, 'Tana Tidung'),
(451, 28, 'Tana Toraja'),
(452, 13, 'Tanah Bumbu'),
(453, 32, 'Tanah Datar'),
(454, 13, 'Tanah Laut'),
(455, 3, 'Tangerang'),
(457, 3, 'Tangerang Selatan'),
(458, 18, 'Tanggamus'),
(459, 34, 'Tanjung Balai'),
(460, 8, 'Tanjung Jabung Barat'),
(461, 8, 'Tanjung Jabung Timur'),
(462, 17, 'Tanjung Pinang'),
(463, 34, 'Tapanuli Selatan'),
(464, 34, 'Tapanuli Tengah'),
(465, 34, 'Tapanuli Utara'),
(466, 13, 'Tapin'),
(467, 16, 'Tarakan'),
(468, 9, 'Tasikmalaya'),
(470, 34, 'Tebing Tinggi'),
(471, 8, 'Tebo'),
(472, 10, 'Tegal'),
(474, 25, 'Teluk Bintuni'),
(475, 25, 'Teluk Wondama'),
(476, 10, 'Temanggung'),
(477, 20, 'Ternate'),
(478, 20, 'Tidore Kepulauan'),
(479, 23, 'Timor Tengah Selatan'),
(480, 23, 'Timor Tengah Utara'),
(481, 34, 'Toba Samosir'),
(482, 29, 'Tojo Una-Una'),
(483, 29, 'Toli-Toli'),
(484, 24, 'Tolikara'),
(485, 31, 'Tomohon'),
(486, 28, 'Toraja Utara'),
(487, 11, 'Trenggalek'),
(488, 19, 'Tual'),
(489, 11, 'Tuban'),
(490, 18, 'Tulang Bawang'),
(491, 18, 'Tulang Bawang Barat'),
(492, 11, 'Tulungagung'),
(493, 28, 'Wajo'),
(494, 30, 'Wakatobi'),
(495, 24, 'Waropen'),
(496, 18, 'Way Kanan'),
(497, 10, 'Wonogiri'),
(498, 10, 'Wonosobo'),
(499, 24, 'Yahukimo'),
(500, 24, 'Yalimo'),
(501, 5, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(23, '::1', 'syahrulfajar046@gmail.com', 1742770106),
(24, '::1', 'syahrulfajar046@gmail.com', 1742770117),
(25, '::1', 'syahrulfajar046@gmail.com', 1742770157);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `npwp_perusahaan` varchar(50) NOT NULL,
  `alamat_perusahaan` varchar(1000) NOT NULL,
  `pj_perusahaan` varchar(100) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `negara_tujuan` varchar(100) NOT NULL,
  `metode_pengiriman` varchar(100) NOT NULL,
  `dokumen_pendukung` varchar(255) NOT NULL,
  `status_pengajuan` enum('Pending','Disetujui','Ditolak') DEFAULT 'Pending',
  `alasan_penolakan` text DEFAULT NULL,
  `surat_rekomendasi` varchar(255) DEFAULT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `nama_perusahaan`, `npwp_perusahaan`, `alamat_perusahaan`, `pj_perusahaan`, `kontak`, `nama_produk`, `jumlah_barang`, `negara_tujuan`, `metode_pengiriman`, `dokumen_pendukung`, `status_pengajuan`, `alasan_penolakan`, `surat_rekomendasi`, `tanggal_pengajuan`) VALUES
(28, 1, 'cv jaya berkah', '2112121', 'asdshdjhskdhkshks', 'fajar', '12345645544', 'PC gaming', 1, 'amerika serikat', 'Air Freight Export (Udara)', 'preview_surat_real3.pdf', 'Disetujui', NULL, 'surat_rekomendasi_28.pdf', '2025-03-22 01:38:50'),
(29, 1, 'wwewew', '32983232', 'sadada', 'fajar', 'syahrulfajar@gmail.com ', 'keramk', 1, 'china', 'Air Freight Export (Udara)', 'Surat_Resmi_Kabupaten_Purwakarta3.pdf', 'Ditolak', 'Kurang Lengkap Dokumennya', NULL, '2025-03-22 03:09:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `nama_slider` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `foto_size` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` char(50) NOT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `modified_by` char(50) NOT NULL,
  `uploader` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `no_urut`, `nama_slider`, `link`, `foto`, `foto_type`, `foto_size`, `created_at`, `created_by`, `modified_at`, `modified_by`, `uploader`) VALUES
(1, 2, 'Slider 1', '', '220230908215106', '.png', 203, '2023-01-04 00:00:00', 'superadmin', '2023-09-08 21:51:06', 'superadmin', ''),
(4, 1, 'slider', '', '120230908214626', '.png', 0, '2023-09-08 21:46:27', '', NULL, '', 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `provinsi` int(11) DEFAULT NULL,
  `kota` int(11) DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usertype` int(11) NOT NULL,
  `active` tinyint(3) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `activation_code` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `forgotten_password_code` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `forgotten_password_time` int(10) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `created_on` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone`, `provinsi`, `kota`, `address`, `usertype`, `active`, `ip_address`, `salt`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `last_login`, `created_on`, `modified`) VALUES
(1, 'SuperAdmin', 'superadmin', '$2y$08$TWMdtdacqPE5yEz9n1LwFuhEVmiDTTsupl12M45tCQihzF1tu2N/6', 'superadmin@gmail.com', '081228289766', 9, 376, 'gank beringin', 1, 1, '::1', NULL, 'c6ad242e6fd3de875568c7de5ba23af4a24137ef', 'tHafW45duPzrU3oWR0AVuO48b26088a3cd65edc4', 1621246176, 'bB6rq5Sj6ze5GT1bSdF0XO', 1742781783, 2147483647, '2025-03-24 09:03:03'),
(16, 'Administrator', 'administrator', '$2y$08$ZENojSErs5YajXhkhmbuNObyA/VOG.r49r95U3XgYgieOK9gBoToe', 'administrator@gmail.com', '087737968211', NULL, NULL, 'Klari', 2, 1, '::1', NULL, NULL, NULL, NULL, 'WEKcceZco3.JFuhC7nJ8MO', 1741253764, 1741251967, '2025-03-06 16:36:04'),
(20, 'fajar syahrul', 'fajarsyahrul23', '$2y$08$LmbGYpzZCzaiqIro8H083OMu4qoX1W5Ch0lAXNXzVMXWX7JADUjxW', 'syahrulfajar046@gmail.com', '087737968218', 9, 376, 'Nagrak', 4, 1, '::1', NULL, NULL, NULL, NULL, '8hgTpY/x4gvz/LBQFKtRme', 1741507822, 1741488086, '2025-03-09 15:10:22'),
(21, 'Fajar Syahrul Hidayat', 'syahrulfajar23', '$2y$08$j1dARs1zUX8rvmQAxAIsbO8Ut7RK1fQv3.Nkp21C63XNRQD3jYRoG', '2110631250007@student.unsika.ac.id', '087737968219', 9, 376, 'Kp.Nagrak', 4, 1, '::1', NULL, NULL, NULL, NULL, 'op9AOmc.u0XAIlA57vUBMe', 1742770252, 1742770235, '2025-03-24 05:50:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_group`
--

CREATE TABLE `users_group` (
  `id_group` int(11) NOT NULL,
  `name_group` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users_group`
--

INSERT INTO `users_group` (`id_group`, `name_group`) VALUES
(1, 'SuperAdmin'),
(2, 'Administrator'),
(4, 'Member Biasa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `album_id` (`album_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `fk_pengajuan_user` (`id_user`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id_group`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id_album`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `fk_pengajuan_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
