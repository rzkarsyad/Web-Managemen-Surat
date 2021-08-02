-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2021 pada 00.40
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage-mail`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_urut`
--

CREATE TABLE `kode_urut` (
  `id` int(11) NOT NULL,
  `kode` varchar(25) DEFAULT NULL,
  `created` year(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kode_urut`
--

INSERT INTO `kode_urut` (`id`, `kode`, `created`) VALUES
(263, '0001', 2021),
(268, '0002', 2021),
(271, '0003', 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `nomor_urut` varchar(25) NOT NULL,
  `nomor_surat` varchar(256) NOT NULL,
  `perihal` varchar(256) NOT NULL,
  `tembusan` varchar(256) NOT NULL,
  `tujuan` varchar(256) NOT NULL,
  `tgl_surat` date NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `nomor_urut`, `nomor_surat`, `perihal`, `tembusan`, `tujuan`, `tgl_surat`, `keterangan`) VALUES
(77, '0001', '001', '0001', '002', '0001', '2021-02-12', '1'),
(78, '0002', '00', 'aa', 'aa', 'aa', '2021-02-21', 'aa'),
(79, '0003', '0200.200.2/022', 'sd', 'dsd', 'sdsd', '2021-08-03', 'sd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `bagian_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `bagian_id`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(15, 'Rizki Muhammad Aulia Arsyad', '', 'work.rzkarsyad@gmail.com', 1, 'default.jpg', '$2y$10$9Likp4Hi8YPR0Q0da8GbJuAKKl2UfnN5v7mRUntNofWCKYural7zm', 1, 1, 1627941956),
(17, 'Rizki Arsyad', '', 'lokambin5@gmail.com', 0, 'default.jpg', '$2y$10$.CD.GYjnWrfbqc5h4Epul.5HzD5Gr927vq7cBi/9FpdCgtrRwfuuu', 3, 1, 1627944017);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 3, 3),
(8, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_bagian`
--

CREATE TABLE `user_bagian` (
  `id` int(11) NOT NULL,
  `bagian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_bagian`
--

INSERT INTO `user_bagian` (`id`, `bagian`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknik Komputer'),
(3, 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Operator'),
(2, 'Admin'),
(3, 'User'),
(4, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Operator'),
(2, 'Administrator'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'operator', 'fas fa-fw fa-tachometer-alt', 1),
(2, 1, 'Role', 'operator/role', 'fas fa-fw fa-user-tie', 1),
(3, 1, 'Pengguna', 'operator/member', 'fas fa-user-friends', 1),
(4, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 4, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 3, 'Dashboard Pengguna', 'user', 'fas fa-fw fa-tachometer-alt', 1),
(7, 3, 'Data Surat Keluar', 'user/sk', 'fas fa-mail-bulk', 1),
(156, 3, 'Laporan Surat Keluar', 'user/lapsk', 'fas fa-print', 1),
(157, 3, 'Pengaturan', 'user/pengaturan', 'fas fa-cogs', 1),
(159, 1, 'Data Bagian', 'operator/bagian', 'fas fa-users', 1),
(160, 1, 'Data Surat Keluar', 'operator/dataSK', 'fas fa-mail-bulk', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(11, 'auliaarsyad1608@gmail.com', 'YMMXpYImPl5F1SO4kVbNnJp9mUDpimmPZxLxg8GzNf4=', 1612072018),
(12, 'auliaarsyad1608@gmail.com', 'v9+gGZfxBDpXRRSeMummg6v3xgDY6Kikc9JirANRJZs=', 1613118639),
(13, 'work.rzkarsyad@gmail.com', 'YHVKZMb02/RPGidfuxs7fyJm2tg6GiirPsOIrQ/COuQ=', 1627941956),
(14, 'work.rzkarsyad@gmail.com', 'f3bY08U3oQFovJiwy7bdUkk3bcYpU86FFLbuCrdrvYU=', 1627943345),
(15, 'work.rzkarsyad@gmail.com', '5nVh+oDqL3jJvjYsMVWOkkonCl1ZIdKEQOo7ckK7q08=', 1627943640),
(16, 'work.rzkarsyad@gmail.com', 'yRemhd20ywOsgbxroyLRiWAV0shqY6DeyIZJ7bRe9Vg=', 1627943786),
(17, 'lokambin5@gmail.com', 'ddJeDRkdNnCT+RkRmUqd6bdzyHIU7IWihjrTMzFdN1c=', 1627943939),
(18, 'lokambin5@gmail.com', 'zB3fza4qRi+Hjzx9Fqzso84Hrs/1dsUR1mmde9slEvA=', 1627944017);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kode_urut`
--
ALTER TABLE `kode_urut`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_bagian`
--
ALTER TABLE `user_bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kode_urut`
--
ALTER TABLE `kode_urut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_bagian`
--
ALTER TABLE `user_bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
