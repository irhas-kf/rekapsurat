-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2021 pada 17.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `faskes`
--

CREATE TABLE `faskes` (
  `id_faskes` int(11) NOT NULL,
  `nama_faskes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faskes`
--

INSERT INTO `faskes` (`id_faskes`, `nama_faskes`) VALUES
(1, 'UPTD Puskesmas Blooto'),
(2, 'UPTD Puskesmas Gedongan'),
(3, 'UPTD Puskesmas Kedundung'),
(4, 'UPTD Puskesmas Kranggan'),
(5, 'UPTD Puskesmas Mentikan'),
(6, 'UPTD Puskesmas Wates');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id_jenis_surat` int(20) NOT NULL,
  `nama_jenis_surat` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_surat`
--

INSERT INTO `jenis_surat` (`id_jenis_surat`, `nama_jenis_surat`) VALUES
(1, 'PBID Bayi Baru lahir dan Balita Kurang Dari 1 Tahun'),
(2, 'PBID Penyakit Kronis'),
(3, 'PBID Ibu hamil'),
(4, 'PBID ex Mandiri'),
(5, 'Penonaktifan PBID');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posting`
--

CREATE TABLE `posting` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text DEFAULT NULL,
  `id_user` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posting`
--

INSERT INTO `posting` (`id`, `judul`, `konten`, `id_user`) VALUES
(1, 'Posting 1x', 'Hello World !', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_surat`
--

CREATE TABLE `rekap_surat` (
  `id_rekap_surat` int(10) NOT NULL,
  `id_faskes` int(11) DEFAULT NULL,
  `id_jenis_surat` int(11) DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `no_kartu_keluarga` char(16) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `nomor_kis` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekap_surat`
--

INSERT INTO `rekap_surat` (`id_rekap_surat`, `id_faskes`, `id_jenis_surat`, `nik`, `no_kartu_keluarga`, `nama`, `nomor_kis`, `alamat`, `keterangan`, `tanggal_pengajuan`) VALUES
(1, 5, 4, '3456098458903481', '3506374987450001', 'irhas', '3290459812', 'Kab. kediri', 'Test', '2021-05-10'),
(7, 2, 4, '3456098458903486', '3506121234320254', 'fadila', '3290459813', 'Kab. Telungagung', 'Test', '2022-01-15'),
(8, 5, 3, '3456098458903485', '3506374987450002', 'risa', '3290459821', 'Kab. Sambirejo', 'Test', '2021-06-16'),
(9, 1, 3, '3456098458903488', '3506374987450004', 'deby', 'ab322123', 'Kab. Madiun', 'Test', '2021-05-17'),
(10, 2, 1, '3456098458903488', '3506374987450001', 'risa', '3290459813', 'Kab Kediri', 'test', '2021-11-17'),
(11, 2, 3, '3456098458903485', '3506374987450001', 'deby', '3290459813', 'kediri', 'test', '2023-01-01'),
(12, 3, 3, '3456098458903485', '3506374987450001', 'risa', 'ab322123', 'jh', 'jbh', '2025-06-17'),
(15, 1, 1, '3456098458903481', '3506374987450001', 'yu', 'ab322123', 'hj', 'gh', '2021-05-17'),
(16, 4, 4, '3456098458903486', '3506374987450002', 'deby', 'ab322123', 'drrf', 'fy', '2021-05-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_data`
--

CREATE TABLE `user_data` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `LEVEL_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_data`
--

INSERT INTO `user_data` (`ID`, `USERNAME`, `PASSWORD`, `LEVEL_ID`) VALUES
(1, 'superadmin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2),
(3, 'staff', 'd033e22ae348aeb5660fc2140aec35850c4da997', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `ID` int(11) NOT NULL,
  `LEVEL` varchar(50) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`ID`, `LEVEL`) VALUES
(1, 'SUPER_ADMIN'),
(2, 'ADMIN'),
(3, 'STAFF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `ID` int(11) NOT NULL,
  `MODUL_ID` int(11) NOT NULL DEFAULT 0,
  `MENU` varchar(100) NOT NULL DEFAULT 'MENU',
  `LINK` varchar(100) NOT NULL DEFAULT '#',
  `ICON` varchar(100) DEFAULT NULL,
  `MAIN_MENU` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`ID`, `MODUL_ID`, `MENU`, `LINK`, `ICON`, `MAIN_MENU`) VALUES
(1, 8, 'Superadmin', '#', 'fa fa-rocket', 0),
(2, 9, 'Master', '#', 'fa fa-circle-o', 1),
(3, 1, 'Level', 'superadmin/user_level', 'fa fa-circle-o', 2),
(4, 2, 'Modul', 'superadmin/modul', 'fa fa-circle-o', 2),
(5, 10, 'Manajemen', '#', 'fa fa-circle-o', 1),
(6, 3, 'User Role', 'superadmin/user_role', 'fa fa-circle-o', 5),
(7, 4, 'Akun', 'superadmin/akun', 'fa fa-circle-o', 5),
(8, 6, 'Profil Akun', 'akun', 'fa fa-user', 0),
(9, 11, 'Menu', 'superadmin/menu', 'fa fa-circle-o', 2),
(10, 7, 'Posting', 'posting', 'fa fa-file', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_modul`
--

CREATE TABLE `user_modul` (
  `ID` int(11) NOT NULL,
  `MODUL` varchar(100) NOT NULL DEFAULT 'MODUL',
  `SUPERADMIN_ONLY` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_modul`
--

INSERT INTO `user_modul` (`ID`, `MODUL`, `SUPERADMIN_ONLY`) VALUES
(1, 'LEVEL', 1),
(2, 'MODUL', 1),
(3, 'USER_ROLE', 1),
(4, 'AKUN', 1),
(5, 'DASHBOARD', 0),
(6, 'PROFIL_AKUN', 0),
(7, 'POSTING', 0),
(8, 'SUPERADMIN', 1),
(9, 'MASTER', 1),
(10, 'MANAJEMEN', 1),
(11, 'MENU', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `ID` int(11) NOT NULL,
  `LEVEL_ID` int(11) NOT NULL,
  `MODUL_ID` int(11) NOT NULL,
  `_CREATE` int(1) NOT NULL DEFAULT 0,
  `_READ` int(1) NOT NULL DEFAULT 0,
  `_UPDATE` int(1) NOT NULL DEFAULT 0,
  `_DELETE` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`ID`, `LEVEL_ID`, `MODUL_ID`, `_CREATE`, `_READ`, `_UPDATE`, `_DELETE`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 0, 0, 0, 0),
(3, 1, 3, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 5, 1, 1, 1, 1),
(6, 2, 1, 0, 0, 0, 0),
(7, 2, 2, 0, 0, 0, 0),
(8, 2, 3, 0, 0, 0, 0),
(9, 2, 4, 0, 0, 0, 0),
(10, 2, 5, 1, 1, 1, 1),
(11, 3, 1, 0, 0, 0, 0),
(12, 3, 2, 0, 0, 0, 0),
(13, 3, 3, 0, 0, 0, 0),
(14, 3, 4, 0, 0, 0, 0),
(15, 3, 5, 1, 1, 1, 1),
(16, 1, 6, 0, 0, 0, 0),
(17, 2, 6, 0, 0, 0, 0),
(18, 3, 6, 1, 1, 1, 1),
(19, 1, 7, 0, 0, 0, 0),
(20, 2, 7, 0, 0, 0, 0),
(21, 3, 7, 1, 1, 1, 1),
(22, 1, 8, 0, 1, 0, 0),
(23, 2, 8, 0, 0, 0, 0),
(24, 3, 8, 0, 0, 0, 0),
(25, 1, 9, 0, 1, 0, 0),
(26, 2, 9, 0, 0, 0, 0),
(27, 3, 9, 0, 0, 0, 0),
(28, 1, 10, 0, 1, 0, 0),
(29, 2, 10, 0, 0, 0, 0),
(30, 3, 10, 0, 0, 0, 0),
(31, 1, 11, 1, 1, 1, 1),
(32, 2, 11, 0, 0, 0, 0),
(33, 3, 11, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `faskes`
--
ALTER TABLE `faskes`
  ADD PRIMARY KEY (`id_faskes`);

--
-- Indeks untuk tabel `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id_jenis_surat`);

--
-- Indeks untuk tabel `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekap_surat`
--
ALTER TABLE `rekap_surat`
  ADD PRIMARY KEY (`id_rekap_surat`),
  ADD KEY `id_faskes` (`id_faskes`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`);

--
-- Indeks untuk tabel `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `user_modul`
--
ALTER TABLE `user_modul`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `faskes`
--
ALTER TABLE `faskes`
  MODIFY `id_faskes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id_jenis_surat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `posting`
--
ALTER TABLE `posting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekap_surat`
--
ALTER TABLE `rekap_surat`
  MODIFY `id_rekap_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_data`
--
ALTER TABLE `user_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_modul`
--
ALTER TABLE `user_modul`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rekap_surat`
--
ALTER TABLE `rekap_surat`
  ADD CONSTRAINT `rekap_surat_ibfk_1` FOREIGN KEY (`id_faskes`) REFERENCES `faskes` (`id_faskes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekap_surat_ibfk_2` FOREIGN KEY (`id_jenis_surat`) REFERENCES `jenis_surat` (`id_jenis_surat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
