-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2019 pada 07.35
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_menu`
--

CREATE TABLE `app_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_menu`
--

INSERT INTO `app_menu` (`id`, `menu`, `icon`) VALUES
(1, 'TRANSAKSI', 'fas fa-fw fa-money-bill-wave'),
(2, 'LAPORAN', 'fas fa-fw fa-file-signature'),
(4, 'AKUN', 'fas fa-fw fa-file-invoice'),
(5, 'PENGATURAN', 'fas fa-fw fa-wrench'),
(6, 'MANAJEMEN', 'fas fa-fw fa-cog');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_sub_menu`
--

CREATE TABLE `app_sub_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `sub_menu` varchar(50) NOT NULL,
  `link` varchar(128) NOT NULL,
  `icon` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_sub_menu`
--

INSERT INTO `app_sub_menu` (`id`, `id_menu`, `sub_menu`, `link`, `icon`) VALUES
(1, 1, 'PEMASUKAN', 'transaksi/pemasukan', 'fas fa-fw fa-cog'),
(2, 1, 'PENGELUARAN', 'transaksi/pengeluaran', 'fas fa-fw fa-cog'),
(3, 1, 'HUTANG', 'transaksi/tmbh_hutang', 'fas fa-fw fa-cog'),
(4, 1, 'PEMBAYARAN HUTANG', 'transaksi/byr_hutang', 'fas fa-fw fa-cog'),
(5, 1, 'PIUTANG', 'transaksi/tmbh_piutang', 'fas fa-fw fa-cog'),
(6, 1, 'PENYETORAN PIUTANG', 'transaksi/str_piutang', 'fas fa-fw fa-cog'),
(7, 1, 'PENGALIHAN ASET', 'transaksi/pglh_aset', 'fas fa-fw fa-cog'),
(8, 1, 'SET SALDO AWAL', 'transaksi/set_saldoAwal', 'fas fa-fw fa-cog'),
(9, 2, 'JURNAL', 'laporan/jurnal', 'fas fa-fw fa-cog'),
(10, 2, 'BUKU BESAR', 'laporan/buku_besar', 'fas fa-fw fa-cog'),
(11, 2, 'INFORMASI SALDO', 'laporan/informasi_saldo', 'fas fa-fw fa-cog'),
(12, 2, 'LAPORAN BULANAN', 'laporan/laporan_bulanan', 'fas fa-fw fa-cog'),
(13, 2, 'LAPORAN TAHUNAN', 'laporan/laporan_tahunan', 'fas fa-fw fa-cog'),
(16, 4, 'AKUN ASET', 'akun/akun_aset', 'fas fa-fw fa-cog'),
(17, 4, 'AKUN PEMASUKAN', 'akun/akun_pemasukan', 'fas fa-fw fa-cog'),
(18, 4, 'AKUN PENGELUARAN', 'akun/akun_pengeluaran', 'fas fa-fw fa-cog'),
(19, 4, 'AKUN HUTANG', 'akun/akun_hutang', 'fas fa-fw fa-cog'),
(20, 4, 'AKUN PIUTANG', 'akun/akun_piutang', 'fas fa-fw fa-cog'),
(21, 5, 'USER SETTING', 'pengaturan/user_setting', NULL),
(22, 5, 'SET PASSWORD', 'pengaturan/set_password', 'fas fa-fw fa-cog'),
(23, 5, 'RESET DATA', 'pengaturan/reset_data', 'fas fa-fw fa-cog'),
(24, 6, 'MANAJEMEN USER', 'admin/manajemenUser', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset`
--

CREATE TABLE `aset` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_asset` varchar(128) DEFAULT NULL,
  `nama_aset` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`id`, `id_user`, `kode_asset`, `nama_aset`) VALUES
(5, 2, '1111', 'Kas'),
(6, 2, '1112', 'Bank BNI'),
(7, 2, '1113', 'Bank BCA'),
(8, 2, '1114', 'Lain-lain'),
(41, 1, '1111', 'Kas'),
(42, 1, '1112', 'Bank BNI'),
(43, 1, '1113', 'Bank BCA'),
(44, 1, '1114', 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `debitur_acc`
--

CREATE TABLE `debitur_acc` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_debitur` varchar(128) DEFAULT NULL,
  `nama_debitur` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `debitur_acc`
--

INSERT INTO `debitur_acc` (`id`, `id_user`, `kode_debitur`, `nama_debitur`) VALUES
(5, 2, '5111', 'debitur 1'),
(6, 2, '5112', 'debitur 2'),
(7, 2, '5113', 'debitur 3'),
(8, 2, '5114', 'debitur 4'),
(38, 1, '5111', 'debitur 1'),
(39, 1, '5112', 'debitur 2'),
(40, 1, '5113', 'debitur 3'),
(41, 1, '5114', 'debitur 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `id_kreditur` int(11) NOT NULL,
  `tanggal_hutang` int(11) NOT NULL,
  `tanggal_jatuh_tempo` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang_byr`
--

CREATE TABLE `hutang_byr` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `id_kreditur` int(11) NOT NULL,
  `id_hutang` int(11) DEFAULT NULL,
  `tanggal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kreditur_acc`
--

CREATE TABLE `kreditur_acc` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_kreditur` varchar(128) DEFAULT NULL,
  `nama_kreditur` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kreditur_acc`
--

INSERT INTO `kreditur_acc` (`id`, `id_user`, `kode_kreditur`, `nama_kreditur`) VALUES
(5, 2, '4111', 'kreditur 1'),
(6, 2, '4112', 'kreditur 2'),
(7, 2, '4113', 'kreditur 3'),
(8, 2, '4114', 'kreditur 4'),
(39, 1, '4111', 'kreditur 1'),
(40, 1, '4112', 'kreditur 2'),
(41, 1, '4113', 'kreditur 3'),
(42, 1, '4114', 'kreditur 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `id_akun_pemasukan` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan_acc`
--

CREATE TABLE `pemasukan_acc` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_pemasukan` varchar(128) DEFAULT NULL,
  `nama_pemasukan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan_acc`
--

INSERT INTO `pemasukan_acc` (`id`, `id_user`, `kode_pemasukan`, `nama_pemasukan`) VALUES
(5, 2, '2111', 'Hasil Usaha'),
(6, 2, '2112', 'Gaji'),
(7, 2, '2113', 'Uang Saku'),
(8, 2, '2114', 'Lain-lain'),
(38, 1, '2111', 'Hasil Usaha'),
(39, 1, '2112', 'Gaji'),
(40, 1, '2113', 'Uang Saku'),
(41, 1, '2114', 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengalihan_aset`
--

CREATE TABLE `pengalihan_aset` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_aset_asal` int(11) NOT NULL,
  `id_aset_tujuan` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `id_akun_pengeluaran` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_acc`
--

CREATE TABLE `pengeluaran_acc` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_pengeluaran` varchar(128) DEFAULT NULL,
  `nama_pengeluaran` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran_acc`
--

INSERT INTO `pengeluaran_acc` (`id`, `id_user`, `kode_pengeluaran`, `nama_pengeluaran`) VALUES
(5, 2, '3111', 'Rumah'),
(6, 2, '3112', 'Listrik'),
(7, 2, '3113', 'Transportasi'),
(8, 2, '3114', 'Air'),
(38, 1, '3111', 'Rumah'),
(39, 1, '3112', 'Listrik'),
(40, 1, '3113', 'Transportasi'),
(41, 1, '3114', 'Air');

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang`
--

CREATE TABLE `piutang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `id_debitur` int(11) NOT NULL,
  `tanggal_piutang` int(11) NOT NULL,
  `tanggal_jatuh_tempo` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang_byr`
--

CREATE TABLE `piutang_byr` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `id_debitur` int(11) NOT NULL,
  `id_piutang` int(11) DEFAULT NULL,
  `tanggal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `ID` int(11) NOT NULL,
  `ROLE` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`ID`, `ROLE`) VALUES
(1, 'Admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `saldo_aset`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `saldo_aset` (
`id_user` int(11)
,`id_aset` int(11)
,`saldo` decimal(40,0)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_awal`
--

CREATE TABLE `saldo_awal` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `saldo_hutang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `saldo_hutang` (
`id` int(11)
,`id_user` int(11)
,`id_aset` int(11)
,`id_kreditur` int(11)
,`tanggal_hutang` int(11)
,`tanggal_jatuh_tempo` int(11)
,`jumlah` int(11)
,`keterangan` varchar(128)
,`jumlah_hutang` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `saldo_piutang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `saldo_piutang` (
`id` int(11)
,`id_user` int(11)
,`id_aset` int(11)
,`id_debitur` int(11)
,`tanggal_piutang` int(11)
,`tanggal_jatuh_tempo` int(11)
,`jumlah` int(11)
,`keterangan` varchar(128)
,`jumlah_piutang` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `tgl_daftar` int(11) NOT NULL,
  `is_active` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `role_id`, `username`, `email`, `password`, `foto`, `tgl_daftar`, `is_active`) VALUES
(1, 1, 'Eko Teguh Wicaksono', 'admin@gmail.com', '$2y$10$5K.RUHE1ohiAxXqTKXUP1uh8uisZ5dyslBkABRHkoCXSIZR.HqNw6', '5d328f9f27b10.png', 1562990644, 1),
(2, 2, 'Akun Member', 'member@gmail.com', '$2y$10$2G1n7x9/n5wFzt8CuH4rQuBacrHRWO2ZfsM6cN6bTGMt1AEMYJ5W6', 'default.jpg', 1562997431, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access`
--

CREATE TABLE `user_access` (
  `ID` int(11) NOT NULL,
  `ROLE_ID` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access`
--

INSERT INTO `user_access` (`ID`, `ROLE_ID`, `menu_id`) VALUES
(1, 1, 1),
(4, 1, 4),
(5, 1, 5),
(6, 2, 1),
(9, 2, 4),
(10, 2, 5),
(11, 1, 6);

-- --------------------------------------------------------

--
-- Struktur untuk view `saldo_aset`
--
DROP TABLE IF EXISTS `saldo_aset`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `saldo_aset`  AS  select `a`.`id_user` AS `id_user`,`a`.`id` AS `id_aset`,(((((((((select ifnull(sum(`p`.`jumlah`),0) from `pemasukan` `p` where (`p`.`id_aset` = `a`.`id`)) - (select ifnull(sum(`k`.`jumlah`),0) from `pengeluaran` `k` where (`k`.`id_aset` = `a`.`id`))) + (select ifnull(sum(`h`.`jumlah`),0) from `hutang` `h` where (`h`.`id_aset` = `a`.`id`))) - (select ifnull(sum(`hby`.`jumlah`),0) from `hutang_byr` `hby` where (`hby`.`id_aset` = `a`.`id`))) - (select ifnull(sum(`p`.`jumlah`),0) from `piutang` `p` where (`p`.`id_aset` = `a`.`id`))) + (select ifnull(sum(`pby`.`jumlah`),0) from `piutang_byr` `pby` where (`pby`.`id_aset` = `a`.`id`))) - (select ifnull(sum(`p`.`jumlah`),0) from `pengalihan_aset` `p` where (`p`.`id_aset_asal` = `a`.`id`))) + (select ifnull(sum(`pby`.`jumlah`),0) from `pengalihan_aset` `pby` where (`pby`.`id_aset_tujuan` = `a`.`id`))) + (select ifnull(sum(`p`.`jumlah`),0) from `saldo_awal` `p` where (`p`.`id_aset` = `a`.`id`))) AS `saldo` from `aset` `a` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `saldo_hutang`
--
DROP TABLE IF EXISTS `saldo_hutang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `saldo_hutang`  AS  select `h`.`id` AS `id`,`h`.`id_user` AS `id_user`,`h`.`id_aset` AS `id_aset`,`h`.`id_kreditur` AS `id_kreditur`,`h`.`tanggal_hutang` AS `tanggal_hutang`,`h`.`tanggal_jatuh_tempo` AS `tanggal_jatuh_tempo`,`h`.`jumlah` AS `jumlah`,`h`.`keterangan` AS `keterangan`,(`h`.`jumlah` - (select ifnull(sum(`hby`.`jumlah`),0) from `hutang_byr` `hby` where (`hby`.`id_hutang` = `h`.`id`))) AS `jumlah_hutang` from `hutang` `h` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `saldo_piutang`
--
DROP TABLE IF EXISTS `saldo_piutang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `saldo_piutang`  AS  select `p`.`id` AS `id`,`p`.`id_user` AS `id_user`,`p`.`id_aset` AS `id_aset`,`p`.`id_debitur` AS `id_debitur`,`p`.`tanggal_piutang` AS `tanggal_piutang`,`p`.`tanggal_jatuh_tempo` AS `tanggal_jatuh_tempo`,`p`.`jumlah` AS `jumlah`,`p`.`keterangan` AS `keterangan`,(`p`.`jumlah` - (select ifnull(sum(`pby`.`jumlah`),0) from `piutang_byr` `pby` where (`pby`.`id_piutang` = `p`.`id`))) AS `jumlah_piutang` from `piutang` `p` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `app_menu`
--
ALTER TABLE `app_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `app_sub_menu`
--
ALTER TABLE `app_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_APP_SUB_MENU_TO_APP_MENU` (`id_menu`);

--
-- Indeks untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ASET_TO_USER` (`id_user`);

--
-- Indeks untuk tabel `debitur_acc`
--
ALTER TABLE `debitur_acc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DEBITUR_ACC_TO_USER` (`id_user`);

--
-- Indeks untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_HUTANG_TO_ASET` (`id_aset`),
  ADD KEY `FK_HUTANG_TO_KREDITUR_ACC` (`id_kreditur`),
  ADD KEY `FK_HUTANG_TO_USER` (`id_user`);

--
-- Indeks untuk tabel `hutang_byr`
--
ALTER TABLE `hutang_byr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_HUTANG_BAYAR_TO_HUTANG` (`id_hutang`),
  ADD KEY `FK_HUTANG_BYR_TO_ASET` (`id_aset`),
  ADD KEY `FK_HUTANG_BYR_TO_KREDITUR_ACC` (`id_kreditur`),
  ADD KEY `FK_HUTANG_BYR_TO_USER` (`id_user`);

--
-- Indeks untuk tabel `kreditur_acc`
--
ALTER TABLE `kreditur_acc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_KREDITUR_ACC_TO_USER` (`id_user`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PEMASUKAN_TO_ASET` (`id_aset`),
  ADD KEY `FK_PEMASUKAN_TO_PEMASUKAN_ACC` (`id_akun_pemasukan`),
  ADD KEY `FK_PEMASUKAN_TO_USER` (`id_user`);

--
-- Indeks untuk tabel `pemasukan_acc`
--
ALTER TABLE `pemasukan_acc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PEMASUKAN_ACC_TO_USER` (`id_user`);

--
-- Indeks untuk tabel `pengalihan_aset`
--
ALTER TABLE `pengalihan_aset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengalihan_aset_to_user` (`id_user`),
  ADD KEY `fk_aset_asal` (`id_aset_asal`),
  ADD KEY `fk_aset_tujuan` (`id_aset_tujuan`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PENGELUARAN_TO_ASET` (`id_aset`),
  ADD KEY `FK_PENGELUARAN_TO_PENGELUARAN_ACC` (`id_akun_pengeluaran`),
  ADD KEY `FK_PENGELUARAN_TO_USER` (`id_user`);

--
-- Indeks untuk tabel `pengeluaran_acc`
--
ALTER TABLE `pengeluaran_acc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PENGELUARAN_ACC_TO_USER` (`id_user`);

--
-- Indeks untuk tabel `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PIUTANG_TO_ASET` (`id_aset`),
  ADD KEY `FK_PIUTANG_TO_DEBITUR_ACC` (`id_debitur`),
  ADD KEY `FK_PIUTANG_TO_USER` (`id_user`);

--
-- Indeks untuk tabel `piutang_byr`
--
ALTER TABLE `piutang_byr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PIUTANG_BAYAR_TO_USER` (`id_user`),
  ADD KEY `FK_PIUTANG_BYR_TO_ASET` (`id_aset`),
  ADD KEY `FK_PIUTANG_BYR_TO_DEBITUR_ACC` (`id_debitur`),
  ADD KEY `FK_PIUTANG_BYR_TO_PIUTANG` (`id_piutang`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `saldo_awal`
--
ALTER TABLE `saldo_awal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_saldo_awal_to_user` (`id_user`),
  ADD KEY `fk_saldo_awal_to_aset` (`id_aset`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USER_TO_ROLE` (`role_id`);

--
-- Indeks untuk tabel `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_USER_ACCESS_TO_APP_MENU` (`menu_id`),
  ADD KEY `FK_USER_ACCESS_TO_ROLE` (`ROLE_ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `app_menu`
--
ALTER TABLE `app_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `app_sub_menu`
--
ALTER TABLE `app_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `aset`
--
ALTER TABLE `aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `debitur_acc`
--
ALTER TABLE `debitur_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hutang_byr`
--
ALTER TABLE `hutang_byr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kreditur_acc`
--
ALTER TABLE `kreditur_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemasukan_acc`
--
ALTER TABLE `pemasukan_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `pengalihan_aset`
--
ALTER TABLE `pengalihan_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_acc`
--
ALTER TABLE `pengeluaran_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `piutang_byr`
--
ALTER TABLE `piutang_byr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `saldo_awal`
--
ALTER TABLE `saldo_awal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_access`
--
ALTER TABLE `user_access`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `app_sub_menu`
--
ALTER TABLE `app_sub_menu`
  ADD CONSTRAINT `FK_APP_SUB_MENU_TO_APP_MENU` FOREIGN KEY (`id_menu`) REFERENCES `app_menu` (`id`);

--
-- Ketidakleluasaan untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `FK_ASET_TO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `debitur_acc`
--
ALTER TABLE `debitur_acc`
  ADD CONSTRAINT `FK_DEBITUR_ACC_TO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD CONSTRAINT `FK_HUTANG_TO_ASET` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id`),
  ADD CONSTRAINT `FK_HUTANG_TO_KREDITUR_ACC` FOREIGN KEY (`id_kreditur`) REFERENCES `kreditur_acc` (`id`),
  ADD CONSTRAINT `FK_HUTANG_TO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `hutang_byr`
--
ALTER TABLE `hutang_byr`
  ADD CONSTRAINT `FK_HUTANG_BAYAR_TO_HUTANG` FOREIGN KEY (`id_hutang`) REFERENCES `hutang` (`id`),
  ADD CONSTRAINT `FK_HUTANG_BYR_TO_ASET` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id`),
  ADD CONSTRAINT `FK_HUTANG_BYR_TO_KREDITUR_ACC` FOREIGN KEY (`id_kreditur`) REFERENCES `kreditur_acc` (`id`),
  ADD CONSTRAINT `FK_HUTANG_BYR_TO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `kreditur_acc`
--
ALTER TABLE `kreditur_acc`
  ADD CONSTRAINT `FK_KREDITUR_ACC_TO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `FK_PEMASUKAN_TO_ASET` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id`),
  ADD CONSTRAINT `FK_PEMASUKAN_TO_PEMASUKAN_ACC` FOREIGN KEY (`id_akun_pemasukan`) REFERENCES `pemasukan_acc` (`id`),
  ADD CONSTRAINT `FK_PEMASUKAN_TO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `pemasukan_acc`
--
ALTER TABLE `pemasukan_acc`
  ADD CONSTRAINT `FK_PEMASUKAN_ACC_TO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengalihan_aset`
--
ALTER TABLE `pengalihan_aset`
  ADD CONSTRAINT `fk_aset_asal` FOREIGN KEY (`id_aset_asal`) REFERENCES `aset` (`id`),
  ADD CONSTRAINT `fk_aset_tujuan` FOREIGN KEY (`id_aset_tujuan`) REFERENCES `aset` (`id`),
  ADD CONSTRAINT `fk_pengalihan_aset_to_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `FK_PENGELUARAN_TO_ASET` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id`),
  ADD CONSTRAINT `FK_PENGELUARAN_TO_PENGELUARAN_ACC` FOREIGN KEY (`id_akun_pengeluaran`) REFERENCES `pengeluaran_acc` (`id`),
  ADD CONSTRAINT `FK_PENGELUARAN_TO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengeluaran_acc`
--
ALTER TABLE `pengeluaran_acc`
  ADD CONSTRAINT `FK_PENGELUARAN_ACC_TO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `piutang`
--
ALTER TABLE `piutang`
  ADD CONSTRAINT `FK_PIUTANG_TO_ASET` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id`),
  ADD CONSTRAINT `FK_PIUTANG_TO_DEBITUR_ACC` FOREIGN KEY (`id_debitur`) REFERENCES `debitur_acc` (`id`),
  ADD CONSTRAINT `FK_PIUTANG_TO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `piutang_byr`
--
ALTER TABLE `piutang_byr`
  ADD CONSTRAINT `FK_PIUTANG_BAYAR_TO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_PIUTANG_BYR_TO_ASET` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id`),
  ADD CONSTRAINT `FK_PIUTANG_BYR_TO_DEBITUR_ACC` FOREIGN KEY (`id_debitur`) REFERENCES `debitur_acc` (`id`),
  ADD CONSTRAINT `FK_PIUTANG_BYR_TO_PIUTANG` FOREIGN KEY (`id_piutang`) REFERENCES `piutang` (`id`);

--
-- Ketidakleluasaan untuk tabel `saldo_awal`
--
ALTER TABLE `saldo_awal`
  ADD CONSTRAINT `fk_saldo_awal_to_aset` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id`),
  ADD CONSTRAINT `fk_saldo_awal_to_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_USER_TO_ROLE` FOREIGN KEY (`role_id`) REFERENCES `role` (`ID`);

--
-- Ketidakleluasaan untuk tabel `user_access`
--
ALTER TABLE `user_access`
  ADD CONSTRAINT `FK_USER_ACCESS_TO_APP_MENU` FOREIGN KEY (`menu_id`) REFERENCES `app_menu` (`id`),
  ADD CONSTRAINT `FK_USER_ACCESS_TO_ROLE` FOREIGN KEY (`ROLE_ID`) REFERENCES `role` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
