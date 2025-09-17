-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Sep 2025 pada 15.48
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
-- Database: `dbhospitalms`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblogin`
--

CREATE TABLE `tblogin` (
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tblogin`
--

INSERT INTO `tblogin` (`email`, `username`, `password`) VALUES
('dimas@gmail.com', 'dimas', '51947e3cf64ee746b6f2c73d174d525a'),
('iqbal@gmail.com', 'iqbal', '5c2fb951458b57e8e049d48a55cdddad'),
('nabila@gmail.com', 'nabila', '9c8aaad368f10f55699450d759a72501'),
('ucup@gmail.com', 'ucup', 'f71a7b3794ee89dad17344b66dec77f5'),
('yusuf@gmail.com', 'yusuf', 'add3deb05fc6625aae939041e4131624');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpasien`
--

CREATE TABLE `tbpasien` (
  `no_pasien` varchar(20) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `JK` varchar(10) NOT NULL,
  `umur` int(10) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpasien`
--

INSERT INTO `tbpasien` (`no_pasien`, `nama_pasien`, `JK`, `umur`, `no_telepon`, `alamat`) VALUES
('001', 'Budi Setiawan', 'Laki-laki', 30, '6281234567890', 'Jl. Merdeka No. 10'),
('002', 'Ani Rahayu', 'Perempuan', 25, '6282345678901', 'Jl. Jendral Sudirman No. 20'),
('003', 'Candra Surya', 'Laki-laki', 45, '6283456789012', 'Jl. Diponegoro No. 5'),
('004', 'Dewi Kusuma', 'Perempuan', 35, '6284567890123', 'Jl. Pahlawan No. 15'),
('005', 'Eko Pratama', 'Laki-laki', 28, '6285678901234', 'Jl. Gatot Subroto No. 30'),
('006', 'Fitri Indah', 'Perempuan', 22, '6286789012345', 'Jl. A. Yani No. 25'),
('007', 'Gilang Perdana', 'Laki-laki', 40, '6287890123456', 'Jl. Cikutra No. 8'),
('008', 'Hana Wijaya', 'Perempuan', 29, '6288901234567', 'Jl. Siliwangi No. 12'),
('009', 'Indra Gunawan', 'Laki-laki', 33, '6289012345678', 'Jl. Raya Bogor No. 40'),
('010', 'Joko Pranata', 'Laki-laki', 37, '6280123456789', 'Jl. Soekarno-Hatta No. 18'),
('011', 'udin tajudin', 'Laki-laki', 42, '08876382327', 'JL. PMI KP.walahir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpembayaran`
--

CREATE TABLE `tbpembayaran` (
  `no_pembayaran` varchar(20) NOT NULL,
  `no_pasien` varchar(20) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `harga_obat` int(20) NOT NULL,
  `jumlah_beli` int(10) NOT NULL,
  `total` int(40) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpembayaran`
--

INSERT INTO `tbpembayaran` (`no_pembayaran`, `no_pasien`, `nama_pasien`, `kode_obat`, `harga_obat`, `jumlah_beli`, `total`, `tanggal`) VALUES
('PYN001', '001', 'Budi Setiawan', 'OB001', 50000, 2, 100000, '2024-04-30'),
('PYN002', '002', 'Ani Rahayu', 'OB002', 75000, 3, 225000, '2024-04-29'),
('PYN003', '003', 'Candra Surya', 'OB003', 60000, 4, 240000, '2024-04-28'),
('PYN004', '004', 'Dewi Kusuma', 'OB004', 90000, 1, 90000, '2024-04-27'),
('PYN005', '005', 'Eko Pratama', 'OB005', 80000, 2, 160000, '2024-04-26'),
('PYN006', '006', 'Fitri Indah', 'OB006', 70000, 3, 210000, '2024-04-25'),
('PYN007', '007', 'Gilang Perdana', 'OB007', 55000, 4, 220000, '2024-04-24'),
('PYN008', '008', 'Hana Wijaya', 'OB008', 65000, 2, 130000, '2024-04-23'),
('PYN009', '009', 'Indra Gunawan', 'OB009', 85000, 1, 85000, '2024-04-22'),
('PYN010', '010', 'Joko Pranata', 'OB010', 95000, 3, 285000, '2024-04-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpembelian_obat`
--

CREATE TABLE `tbpembelian_obat` (
  `kode_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga_obat` int(20) NOT NULL,
  `stok_obat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpembelian_obat`
--

INSERT INTO `tbpembelian_obat` (`kode_obat`, `nama_obat`, `harga_obat`, `stok_obat`) VALUES
('OB001', 'Paracetamol', 5000, 100),
('OB002', 'Amoxicillin', 10000, 50),
('OB003', 'Loratadine', 7500, 75),
('OB004', 'Ventolin', 15000, 30),
('OB005', 'Metformin', 8000, 40),
('OB006', 'Omeprazole', 7000, 60),
('OB007', 'Aspirin', 6000, 80),
('OB008', 'Ranitidine', 8500, 55),
('OB009', 'Simvastatin', 9000, 45),
('OB010', 'Ibuprofen', 5500, 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpemeriksaan`
--

CREATE TABLE `tbpemeriksaan` (
  `no_pemeriksaan` varchar(10) NOT NULL,
  `no_pasien` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `diagnosa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpemeriksaan`
--

INSERT INTO `tbpemeriksaan` (`no_pemeriksaan`, `no_pasien`, `tanggal`, `diagnosa`) VALUES
('PEM001', '001', '2024-04-30', 'Demam'),
('PEM0011', '0011', '2024-05-10', 'demam'),
('PEM002', '002', '2024-04-29', 'Flu'),
('PEM003', '003', '2024-04-28', 'Tekanan Darah Tinggi'),
('PEM004', '004', '2024-04-27', 'Asma'),
('PEM005', '005', '2024-04-26', 'Diabetes'),
('PEM006', '006', '2024-04-26', 'Diare'),
('PEM007', '007', '2024-04-24', 'Stroke'),
('PEM008', '008', '2024-04-23', 'Maag'),
('PEM009', '009', '2024-04-22', 'Kolesterol Tinggi'),
('PEM010', '010', '2024-04-21', 'Patah Tulang'),
('PEM011', '001', '2024-05-01', 'Demam');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tbpasien`
--
ALTER TABLE `tbpasien`
  ADD PRIMARY KEY (`no_pasien`);

--
-- Indeks untuk tabel `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  ADD PRIMARY KEY (`no_pembayaran`),
  ADD KEY `no_pasien` (`no_pasien`,`kode_obat`);

--
-- Indeks untuk tabel `tbpembelian_obat`
--
ALTER TABLE `tbpembelian_obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indeks untuk tabel `tbpemeriksaan`
--
ALTER TABLE `tbpemeriksaan`
  ADD PRIMARY KEY (`no_pemeriksaan`),
  ADD KEY `no_pasien` (`no_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
