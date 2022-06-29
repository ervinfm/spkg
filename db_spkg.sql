-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2022 pada 13.17
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spkg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` varchar(50) NOT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `nbm_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(256) NOT NULL,
  `ttl_guru` varchar(255) NOT NULL,
  `gender_guru` varchar(1) NOT NULL,
  `telp_guru` varchar(15) NOT NULL,
  `alamat_guru` text NOT NULL,
  `img_guru` varchar(256) DEFAULT NULL,
  `created_guru` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `id_user`, `nbm_guru`, `nama_guru`, `ttl_guru`, `gender_guru`, `telp_guru`, `alamat_guru`, `img_guru`, `created_guru`) VALUES
('1GhC90eBvrgPy6uVqF2tXsTJAxw78D', '04494775897859116283626370058312531', '172518', 'Ismail Marzuki, S.KM', 'Sleman, 18 Oktober 1978', 'L', '089901829167', 'l. Panembahan Senopati No.1-3, Ngupasan, Kec. Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55122', 'guru-172518.png', '2022-06-27 01:08:01'),
('99844622586478595', '99844622586478595', '545549', 'Dadang Priyatmaji, S.Sos.I', 'Yogyakarta, 23 Maret 1972', 'L', '08123412345678', 'Jl. Cik Di Tiro No.23, Terban, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55223', 'guru-545549.jpg', '2022-06-26 19:42:07'),
('KT7oWLin40NMHzvfXSAaPmIV5ey9Jp', '62766949733061441274583818290035052', '418429', 'Andra Sutepa, S.Pd', 'Bantul', 'L', '079901728190', '-', NULL, '2022-06-28 18:47:28'),
('mLOxGa2fiztsCARuhIK57oNwvXlyHY', '54175165488512930792914606240392338', '771884', 'Karenina Kelana, S.Pd', 'Wates, 15 Juni 1982', 'P', '07166781929', '-', NULL, '2022-06-28 18:48:14'),
('u25d1IqZK9DWTrecg8FGUpAlPt0Skw', '49928275407882774950161583166341306', '731265', 'David Sudrajad, S.Pd', 'Sleman', 'L', '087717172828', 'Jl. Jend. Sudirman, Gowongan, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233', NULL, '2022-06-28 04:01:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `data_kriteria` varchar(256) NOT NULL,
  `atribut_kriteria` varchar(256) NOT NULL,
  `bobot_kriteria` varchar(50) NOT NULL,
  `created_kriteria` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `data_kriteria`, `atribut_kriteria`, `bobot_kriteria`, `created_kriteria`) VALUES
(1, 'Guru menyusun perencanaan pembelajaran aktif, kreatif, dan inovatif dengan mengoptimalkan lingkungan dan memanfaatkan TIK atau cara lain yang sesuai dengan konteks', 'K1', '0.25', '2022-06-26 17:23:53'),
(2, 'Guru melakukan evaluasi diri, refleksi dan pengembangan kompetensi untuk perbaikan kinerja secara berkala', 'K2', '0.25', '2022-06-26 17:23:53'),
(3, 'Guru melakukan pengambangan profesi berkelanjutan untuk meningkatkan pengetahuan, keteampilan, dan wawancara', 'K3', '0.25', '2022-06-26 17:23:53'),
(4, 'Guru mengembangkan strategi, model, metode, teknik, dan media pembelajaran yang kreatif dan inovatif', 'K4', '0.25', '2022-06-26 17:23:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_penilaian` varchar(50) NOT NULL,
  `id_guru` varchar(50) NOT NULL,
  `nilai_penilaian` varchar(256) DEFAULT NULL,
  `hasil_penilaian` varchar(50) NOT NULL,
  `created_penilaian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai_normal`
--

CREATE TABLE `tbl_nilai_normal` (
  `id_unnormal` int(11) NOT NULL,
  `id_penilaian` varchar(50) NOT NULL,
  `nilai_unnormal` varchar(256) NOT NULL,
  `nilai_normal` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_kriteria`
--

CREATE TABLE `tbl_sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `data_sub_kriteria` text NOT NULL,
  `level_sub_kriteria` int(1) NOT NULL,
  `created_sub_kriteria` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_sub_kriteria`
--

INSERT INTO `tbl_sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `data_sub_kriteria`, `level_sub_kriteria`, `created_sub_kriteria`) VALUES
(1, 1, 'Guru mampu: (1) menyusun RPP yang memfasilitasi seluruh siswa belajar aktif, inovatif, kreatif, efektif, dan menyenangkan seperti: merancang penelitian sederhana, melakukan tugas proyek tertentu berdasarkan ide-ide siswa sendiri dan mengoptimalkan lingkungan sekitar sebagai sumber belajar serta memanfaatkan TIK atau cara lain yang sesuai dengan konteksnya, (2) menjelaskan tahapan penyusunan RPP yang dibuatnya dengan memperhatikan hasil refleksi/evaluasi proses pembelajaran sebelumnya.', 4, '2022-06-26 17:25:26'),
(2, 1, 'Guru mampu: (1) menyusun RPP yang memfasilitasi seluruh siswa belajar aktif, inovatif, kreatif, efektif, dan menyenangkan, yang dapat dilihat dari aktivitas KBM yang menempatkan siswa sebagai subyek dalam kegiatan pembelajaran dengan mengoptimalkan pemanfaatan lingkungan sebagai sumber belajar, (2) menjelaskan tahapan penyusunan RPP yang dibuat berdasarkan ketentuan yang berlaku.', 3, '2022-06-26 17:25:26'),
(3, 1, 'Guru: (1) mampu menyusun RPP yang memfasilitasi seluruh siswa belajar aktif, kreatif dan inovatif yang dapat dilihat dari aktivitas kegiatan belajar mengajar (KBM) yang menempatkan siswa sebagai subyek dalam kegiatan pembelajaran, (2) kurang sistematis dalam menjelaskan tahapan penyusunan RPP yang dibuatnya.', 2, '2022-06-26 17:25:26'),
(4, 1, 'Guru menyusun RPP yang belum memfasilitasi seluruh siswa belajar aktif, kreatif, dan inovatif.', 1, '2022-06-26 17:25:26'),
(5, 2, 'Guru melakukan evaluasi dan refleksi diri melalui berbagai kegiatan seperti observasi kelas dan pemberian kuesioner tentang pelaksanaan pembelajaran, rekaman audio atau video, dan hasilnya didiskusikan serta diseminasikan ke teman sejawat yang difasilitasi sekolah/madrasah untuk perbaikan kinerja secara berkelanjutan yang terlihat pada perbaikan mutu pembelajaran dan capaian hasil belajar siswa.', 4, '2022-06-26 17:26:33'),
(6, 2, 'Guru melakukan perbaikan kinerja khususnya pembelajaran dalam pengembangan kompetensi secara berkelanjutan setelah melakukan refleksi dan evaluasi diri dengan membuat jurnal reflektif dan catatan harian.', 3, '2022-06-26 17:26:33'),
(7, 2, 'Guru sudah melakukan refleksi dan evaluasi diri untuk perbaikan kinerja dengan membuat catatan mengajar.', 2, '2022-06-26 17:26:33'),
(8, 2, 'Guru tidak melakukan atau masih memerlukan bantuan dalam melaksanakan refleksi dan evaluasi diri.', 1, '2022-06-26 17:26:33'),
(9, 3, 'Guru melakukan pengembangan profesi berkelanjutan atas inisiatif sendiri yang hasilnya berdampak terhadap peningkatan mutu pembelajaran dan capaian belajar siswa yang dilakukan melalui beragam bentuk kegiatan belajar melalui diskusi antarteman sejawat, KKG/MGMP atau sejenisnya, belajar daring, mengikuti diklat/seminar, publikasi ilmiah, karya inovatif dan membagikan praktik baik kepada orang lain di dalam dan di luar sekolah/madrasah baik secara lisan maupun tulisan melalui berbagai media.', 4, '2022-06-26 17:28:05'),
(10, 3, 'Guru melakukan pengembangan profesi berkelanjutan atas inisiatif sendiri yang hasilnya berdampak terhadap peningkatan mutu pembelajaran dan capaian belajar siswa yang dilakukan melalui beragam bentuk kegiatan belajar melalui diskusi antarteman sejawat, KKG/MGMP atau sejenisnya, belajar daring, mengikuti diklat/seminar, publikasi ilmiah, karya inovatif dan membagikan praktik baik kepada teman sejawat di sekolah/madrasah.', 3, '2022-06-26 17:28:05'),
(11, 3, 'Guru melakukan pengembangan profesi berkelanjutan atas anjuran/himbauan yang hasilnya berdampak terhadap peningkatan mutu pembelajaran dan capaian belajar siswa yang dilakukan melalui beragam bentuk kegiatan belajar melalui diskusi antarteman sejawat, KKG/MGMP atau sejenisnya, belajar daring, mengikuti diklat/seminar, publikasi ilmiah, karya inovatif.', 2, '2022-06-26 17:28:05'),
(12, 3, 'Guru melakukan pengembangan profesi berdasarkan inisiatif sekolah/madrasah yang hasilnya belum berdampak terhadap peningkatan mutu pembelajaran dan capaian belajar siswa dalam bentuk kegiatan yang masih terbatas dan hasilnya belum dibagikan kepada orang lain.', 1, '2022-06-26 17:28:05'),
(13, 4, 'Guru mengembangkan/memodifikasi strategi, model, metode, teknik, dan media pembelajaran inovatif dan kreatif yang dapat mendorong siswa belajar secara aktif, efektif, dan menyenangkan sesuai dengan tujuan pembelajaran serta menginspirasi teman sejawat dan/atau dapat diduplikasi oleh orang lain.', 4, '2022-06-26 17:29:08'),
(14, 4, 'Guru mengembangkan/memodifikasi strategi, model, metode, teknik, dan media pembelajaran inovatif dan kreatif yang dapat mendorong siswa belajar secara aktif, efektif, dan menyenangkan sesuai dengan tujuan pembelajaran.', 3, '2022-06-26 17:29:08'),
(15, 4, 'Guru mengembangkan/memodifikasi strategi, model, metode, teknik, dan media pembelajaran yang dapat mendorong siswa belajar secara aktif dan menyenangkan tanpa adanya kaitan langsung dengan tujuan pembelajaran.', 2, '2022-06-26 17:29:08'),
(16, 4, 'Guru mengembangkan/memodifikasi strategi, model, metode, teknik, dan media pembelajaran yang tidak mendorong tercapainya tujuan pembelajaran.', 1, '2022-06-26 17:29:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(50) NOT NULL,
  `username_user` varchar(256) NOT NULL,
  `password_user` varchar(256) NOT NULL,
  `level_user` int(1) NOT NULL,
  `status_user` int(1) NOT NULL,
  `created_user` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username_user`, `password_user`, `level_user`, `status_user`, `created_user`) VALUES
('99844622586478591', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, '2022-06-26 18:08:02'),
('99844622586478592', 'kepsek', '82b7283910ac7cb508ea7ecc645e5c944d7fb612', 2, 1, '2022-06-26 18:08:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `tbl_nilai_normal`
--
ALTER TABLE `tbl_nilai_normal`
  ADD PRIMARY KEY (`id_unnormal`);

--
-- Indeks untuk tabel `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai_normal`
--
ALTER TABLE `tbl_nilai_normal`
  MODIFY `id_unnormal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
