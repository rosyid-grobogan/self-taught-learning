-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Mei 2017 pada 07.54
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
`id_informasi` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `judul`, `slug`, `konten`) VALUES
(3, 'Cara Pembelian', 'cara-pembelian', '<p>Untuk melakukan pemesanan, caranya sebagai berikut:</p>\r\n<ul>\r\n<li>Pilih salah satu produk yang Anda sukai, untuk melihat lebih banyak produk klik tombol Load More.</li>\r\n<li>Tekan tombol More Infor untuk melihat detail produk.</li>\r\n<li>Isi jumlah produk yang ingin dipesan, lalu klik tombl Tambah ke Keranjang</li>\r\n<li>SIlakan tambahkan lagi produk-produk lainya yang ingin dipesan dengan cara yang sama melalui halaman home atau kategori produk.&nbsp;Anda juga dapat menggunakan menu pencarian untuk mencari produk lebih spesifik.</li>\r\n<li>Isi keranjang dapat dilihat melalui link yang ada di samping form pencarian. Pada link tersebut juga dapat dilihat informasi mengenai total bayar dan jumlah item yang sudah dipesan tanpa harus diklik.</li>\r\n<li>Untuk pengaturan keranjang, misalnya ingin menghapusnya, dapat dilakukan melalui menu Keranjang Belanja.</li>\r\n<li>Jika semua yang dipesan ditambahkan ke keranjang, klik tombol Selesai.</li>\r\n<li>Isi biodata pemesan dengan lengkap, lalu klik tombol Lanjutkan.</li>\r\n<li>Selanjutnya, silakan kirimkan pembayaran beserta ongkos kirimnya sebelum 2 x 24 jam. Jika dalam waktu tersebut tidak melakukan pembayaran, maka pesanan Anda akan dibatalkan.</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `slug` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=36 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug`) VALUES
(34, 'Sepatu', 'sepatu'),
(29, 'Kaos', 'kaos'),
(28, 'Jaket', 'jaket'),
(27, 'Elektronik', 'elektronik'),
(31, 'Jam Tangan', 'jam-tangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
`id_keranjang` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `stok_temp` int(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=404 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id_menu` int(5) NOT NULL,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `induk` int(5) NOT NULL,
  `jenis_link` varchar(50) DEFAULT NULL,
  `link` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `urutan` int(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `induk`, `jenis_link`, `link`, `urutan`) VALUES
(10, 'BERANDA', 0, 'modul', 'home', 1),
(11, 'PRODUK', 0, 'modul', 'produk', 2),
(19, 'KAOS', 11, 'kategori', '29', 2),
(18, 'SEPATU', 11, 'kategori', '34', 1),
(17, 'KERANJANG BELANJA', 0, 'modul', 'keranjang', 3),
(16, 'HUBUNGI KAMI', 0, 'modul', 'pesan', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE IF NOT EXISTS `pengaturan` (
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `judul_website` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `favicon` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `provinsi` int(10) NOT NULL,
  `kota` int(10) NOT NULL,
  `telp` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `sms` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `bank` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `pemilik_rekening` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `rekening` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `facebook` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `twitter` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `instagram` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`email`, `judul_website`, `favicon`, `alamat`, `provinsi`, `kota`, `telp`, `sms`, `bank`, `pemilik_rekening`, `rekening`, `facebook`, `twitter`, `instagram`) VALUES
('nabil@localhost', 'Toko Online Shophy', 'favicon.png', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 10, 473, '085640919521', '085640919521', 'Mandiri', 'Rohi', '0239299201234', 'http://facebook.com/shophy', 'http://twitter.com/shophy', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`id_pesan` int(5) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `dibaca` enum('N','Y') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=40 ;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `email`, `subjek`, `pesan`, `tanggal`, `dibaca`) VALUES
(36, 'Daffa Shidqi Abdulloh', 'daffa.shidqi@gmail.com', 'Tanya harga produk', 'Ini pesan dari Daffa'' Shidqi Abdulloh', '2017-01-03', 'Y'),
(37, 'Daffa', 'daffa@gmail.com', 'tanya harga', 'Harganya bisa lebih murah ga', '2017-02-07', 'Y'),
(38, 'Hafis', 'hafis@gmail.com', 'Tanya produk', 'Jual kaos Galgil ga?', '2017-02-08', 'Y'),
(39, 'Latif', 'latif@gmail.com', 'Tanya produk baru', 'Ada produk baru?', '2017-01-28', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `berat` decimal(5,2) unsigned NOT NULL DEFAULT '0.00',
  `gambar` varchar(100) NOT NULL,
  `dibeli` int(5) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=600 ;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `slug`, `deskripsi`, `harga`, `stok`, `berat`, `gambar`, `dibeli`) VALUES
(569, 34, 'Volutpat Pretium', 'volutpat-pretium', '', 100000, 19, '1.00', 'pic1.jpg', 47),
(594, 27, 'Aenean hendrerit', 'aenean-hendrerit', '<p>Nulla facilisi. Etiam felis purus, dictum mollis metus efficitur, efficitur sagittis nulla. Aenean molestie lectus sed justo tincidunt tempor. Donec tempus libero ut fermentum mollis. Morbi pretium ligula libero, eget facilisis metus tempus vitae. Donec vestibulum rutrum facilisis. Ut vel velit vel nibh suscipit faucibus.</p>\r\n<p>Aliquam in sapien imperdiet, accumsan dolor vitae, auctor enim. Proin suscipit nisl nec ipsum pretium, a accumsan lacus interdum. Mauris tempus, felis vitae tempus rhoncus, nisl sapien placerat justo, eu accumsan massa odio nec ex. Sed nunc nulla, commodo eu odio et, dictum fermentum lectus. Cras ut nunc nibh. Donec bibendum diam lacus, eget aliquet lorem rhoncus et. In scelerisque velit vel rhoncus consectetur. Mauris ante lectus, viverra sit amet tincidunt nec, viverra in lacus.</p>', 50000, 30, '0.50', 'latest-product-img5.jpg', 1),
(582, 29, 'Consectetur Adipiscing', 'consectetur-adipiscing', '', 100000, 0, '4.00', 'pic2.jpg', 1),
(570, 34, 'Aenean Hendrerit', 'aenean-hendrerit', '', 120000, 10, '5.00', 'slider2.png', 1),
(595, 0, 'Curabitur consequat ', 'curabitur-consequat ', '<p>Mauris volutpat pretium ante, ultrices maximus nisl sagittis fermentum. Sed nec volutpat lacus, eget viverra justo. Curabitur elementum, diam vel condimentum consequat, felis massa vehicula mauris, a vulputate erat mauris ut lectus. Pellentesque ultrices, nulla ut ullamcorper aliquet, augue ipsum tempus augue, molestie vulputate nulla neque vel risus. Maecenas sed blandit lectus. Fusce maximus eleifend risus a suscipit. Vivamus maximus finibus risus, nec porttitor sem imperdiet quis. Cras sagittis mollis ipsum, sit amet blandit justo vulputate vel. Maecenas euismod risus ac aliquet blandit. Integer sit amet vulputate magna. Mauris nec malesuada libero, a pulvinar mauris. Cras et dui ut nibh sagittis euismod sed vel tellus. In gravida urna eget imperdiet fringilla. Aenean malesuada arcu sed libero ultrices, malesuada venenatis elit pellentesque. Etiam id hendrerit odio.</p>', 30000, 60, '0.10', 'latest-product-img4.jpg', 1),
(571, 29, 'Sapien Imperdiet', 'sapien-imperdiet', '', 300000, 5, '3.00', 'pic3.jpg', 1),
(574, 29, 'Nulla facilisi', 'nulla-facilisi', '', 250000, 96, '1.00', 'slider4.png', 16),
(593, 27, 'Morbi pretium', 'morbi-pretium', '<p>Aliquam in sapien imperdiet, accumsan dolor vitae, auctor enim. Proin suscipit nisl nec ipsum pretium, a accumsan lacus interdum. Mauris tempus, felis vitae tempus rhoncus, nisl sapien placerat justo, eu accumsan massa odio nec ex. Sed nunc nulla, commodo eu odio et, dictum fermentum lectus. Cras ut nunc nibh. Donec bibendum diam lacus, eget aliquet lorem rhoncus et. In scelerisque velit vel rhoncus consectetur. Mauris ante lectus, viverra sit amet tincidunt nec, viverra in lacus. Vestibulum tincidunt pretium euismod. Pellentesque ultrices efficitur sem vel iaculis. Nulla justo magna, elementum et mauris ac, viverra viverra odio. Nam malesuada, mauris sed sodales euismod, risus velit pharetra lorem, et semper erat mauris sed lorem. Nulla facilisi.</p>', 700000, 40, '2.00', 'latest-product-img6_1.jpg', 1),
(590, 29, 'Aenean Molestie', 'aenean-molestie', '', 100000, 23, '1.23', 'pic6.jpg', 1),
(596, 31, 'Vestibulum ut justo', 'vestibulum-ut-justo', '<p>m ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempor volutpat mauris, rutrum viverra sem aliquet et. Curabitur consequat congue risus, ut lobortis est rhoncus eu. Vestibulum convallis libero et suscipit mattis. Integer ipsum risus, consequat et velit a, fermentum ullamcorper enim. Aenean hendrerit vehicula pulvinar. Vestibulum ut justo nibh. Vivamus hendrerit neque odio, et auctor turpis ultrices eget. Integer tempor, lorem nec viverra efficitur, odio mauris accumsan orci, sed maximus orci nibh in augue. Morbi lectus ante, pulvinar nec cursus ac, rutrum quis neque. Aliquam erat volutpat. Praesent hendrerit commodo enim, a sollicitudin ligula ullamcorper at.</p>\r\n<p>Mauris volutpat pretium ante, ultrices maximus nisl sagittis fermentum.</p>', 150000, 20, '0.30', 'product-img1.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(5) NOT NULL,
  `status` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'Baru',
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `nama_pemesan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ongkir` int(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=122 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `status`, `tanggal`, `jam`, `nama_pemesan`, `alamat`, `email`, `telp`, `ongkir`) VALUES
(105, 'Baru', '2017-02-23', '14:37:42', 'Oke', 'Slawi, Tegal', 'oke@gmail.com', 'sip', 0),
(102, 'Lunas', '2016-12-15', '06:35:00', 'Annisa Nabil', 'Adiwerna, Tegal', 'nabil@gmail.com', '085688993444', 0),
(103, 'Lunas', '2017-01-11', '04:37:00', 'Daffa Shidqi', 'Slawi, Tegal', 'daffa@localhost', '085683844888', 0),
(106, 'Baru', '2017-02-23', '15:07:49', 'Azallea', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'azallea@gmail.com', '085712344555', 0),
(104, 'Baru', '2017-02-21', '02:54:34', 'ok', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(107, 'Baru', '2017-02-23', '15:08:12', 'Azallea', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'azallea@gmail.com', '085712344555', 0),
(108, 'Baru', '2017-03-03', '23:36:30', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(109, 'Baru', '2017-03-03', '23:36:31', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(110, 'Baru', '2017-03-03', '23:37:55', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(111, 'Baru', '2017-03-03', '23:39:13', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(112, 'Baru', '2017-03-03', '23:41:28', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(113, 'Baru', '2017-03-04', '02:12:06', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(114, 'Baru', '2017-03-04', '02:13:24', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(115, 'Baru', '2017-03-04', '02:14:14', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(116, 'Baru', '2017-03-04', '02:15:47', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(117, 'Baru', '2017-03-04', '02:16:51', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(118, 'Baru', '2017-03-04', '02:17:42', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(119, 'Baru', '2017-03-04', '02:18:55', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 0),
(120, 'Lunas', '2017-03-04', '02:19:37', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 101000),
(121, 'Lunas', '2017-03-04', '02:20:37', 'Daffa Shidqi', 'Jl. Citarum, Slawi Wetan, Slawi, Tegal', 'daffa@localhost', '085712344555', 101000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_detail` (
`id_detail` int(10) NOT NULL,
  `id_transaksi` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=23 ;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_detail`, `id_transaksi`, `id_produk`, `jumlah`) VALUES
(1, 103, 569, 10),
(2, 102, 574, 20),
(3, 102, 569, 10),
(4, 102, 571, 10),
(5, 102, 570, 10),
(10, 107, 582, 3),
(9, 107, 569, 3),
(11, 108, 569, 2),
(12, 108, 595, 3),
(13, 112, 594, 1),
(14, 112, 569, 1),
(15, 113, 595, 6),
(16, 114, 569, 4),
(17, 119, 569, 3),
(18, 119, 574, 2),
(19, 120, 569, 3),
(20, 120, 574, 2),
(21, 121, 569, 3),
(22, 121, 574, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
 ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
 ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
 ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
 ADD PRIMARY KEY (`id_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
MODIFY `id_informasi` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
MODIFY `id_keranjang` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=404;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `id_pesan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=600;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
