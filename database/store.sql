-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2015 at 05:18 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_barang` char(5) NOT NULL,
  `kd_kategori` char(5) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `stock` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`kd_barang`),
  KEY `kd_kategori` (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `kd_kategori`, `nm_barang`, `harga`, `stock`, `name`, `detail`) VALUES
('BR001', 'KB001', 'Mouse Itech', 10000, 7, 'barang/gambar/mouse itech.jpg', 'Mouse Itech'),
('BR002', 'KB001', 'Modem ZTE MF190', 125000, 5, 'barang/gambar/modem zte.jpg', '1. Type Port : USB 2.0 Kecepatan tinggi\r\n2. Supoort mechine : Semua Laptop dan PC\r\n3. Sistem Operasi yang kompatible :Windows XP SP2, Vista ( 32 bit dan 64 bit ), Windows 7, MAC OS 10.4 ke atas\r\n4. Fungsi : SMS, Layanan data. dll\r\n5. Standart Jaringan : HSUPA / HSDPA / WCDMA / EDGE / GPRS /\r\n6. Kecepatan Transmisi ( Maksimal ) : HSUPA 5.76 Mbps UpLoad | HSDPA 7.2 Mbps DownLoad\r\n7. Temperatur : Penyimpanan  : -400 C ~ +800 C | Operasi          : -100 C ~ +600 C\r\n8. Dimensi : 77.9 mm x 27 mm x 10.8 mm ( tanpa penutup )\r\n9. Berat : -+ 21g tanpa box'),
('BR003', 'KB001', 'Simbadda CST 6100N', 385000, 2, 'barang/gambar/Simbadda_CST_6100N.jpg', 'value="1. Model : Speaker PC\r\n2. Ukuran (L x W x H cm) : Array\r\n3. Berat (kg) : 3\r\n4. Warna : Hitam\r\n5. Tipe : CST 6100N\r\n6. Sistem Operasi : Other"'),
('BR004', 'KB002', 'Power Bank Samsung 3800 mAh', 29000, 4, 'barang/gambar/Pb_samsung_3800mAh.jpg', 'Merk : Samsung\r\nUkuran : 3800mAh\r\n'),
('BR005', 'KB002', 'Power Bank Advan 5200 mAh', 99000, 2, 'barang/gambar/pb advan 5200mah.jpg', 'Tipe : Power Bank\r\nMerk : Advan\r\nUkuran : 5200 mAh'),
('BR006', 'KB001', 'FlashDisk 8GB Toshiba', 55000, 0, 'barang/gambar/USB FlashDisk 8GB Toshiba.jpg', 'Tipe : Flashdisk\r\nMerk : Toshiba\r\nUkuran : 8 GB'),
('BR007', 'KB001', 'LCD Cleaner 3 in 1', 5000, 10, 'barang/gambar/Lapronics-4in1-Combo-Laptop-Screen-SDL124820686-1-e03ea.jpg', 'Tipe : Pembersih.\r\nFungsi : Pembersih Layar Leptop, Komputer, HP, dll'),
('BR008', 'KB001', 'KEY PROTECTOR 14â€', 3500, 1, 'barang/gambar/key.jpg', 'Tipe : Pelindung Keyboard\r\nUkuran : 14 inchi\r\n'),
('BR009', 'KB001', 'Kabel Data USB Warna', 9000, 10, 'barang/gambar/kabel data warna.jpg', 'Kabel Data USB Warna.\r\n'),
('BR010', 'KB001', 'PC CAMERA M TECH ', 50000, 1, 'barang/gambar/pc kamera m-tech zc-700w_5MP.jpg', 'value="M-Tech Webcam :\r\n5.0 Mega Pixel, USB 2.0, 6 LED light, Black Round, 360derajat rotatable"');

-- --------------------------------------------------------

--
-- Table structure for table `biaya_kirim`
--

CREATE TABLE IF NOT EXISTS `biaya_kirim` (
  `kd_biaya` char(6) NOT NULL,
  `nm_kota` varchar(60) NOT NULL,
  `via` varchar(20) NOT NULL,
  `biaya` int(11) NOT NULL,
  PRIMARY KEY (`kd_biaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya_kirim`
--

INSERT INTO `biaya_kirim` (`kd_biaya`, `nm_kota`, `via`, `biaya`) VALUES
('B00001', 'BAR - Banjarnegara', 'JNE-OKE', 13000),
('B00002', 'BAR - Banjarmangun', 'JNE-OKE', 15000),
('B00003', 'BAR - Batur', 'JNE-OKE', 15000),
('B00004', 'BAR - Bawang', 'JNE-OKE', 15000),
('B00005', 'BAR - Kalibening', 'JNE-OKE', 15000),
('B00006', 'BAR - Karangkobar', 'JNE-OKE', 15000),
('B00007', 'BAR - Madukara', 'JNE-OKE', 15000),
('B00008', 'BAR - Mandiraja', 'JNE-OKE', 15000),
('B00009', 'BAR - Pagentan', 'JNE-OKE', 15000),
('B00010', 'BAR - Pejawaran', 'JNE-OKE', 15000),
('B00011', 'BAR - Punggelan', 'JNE-OKE', 15000),
('B00012', 'BAR - Purwanegara', 'JNE-OKE', 15000),
('B00013', 'BAR - Purworejo Klampok', 'JNE-OKE', 15000),
('B00014', 'BAR - Rakit', 'JNE-OKE', 15000),
('B00015', 'BAR - Sigaluh', 'JNE-OKE', 15000),
('B00016', 'BAR - Susukan', 'JNE-OKE', 15000),
('B00017', 'BAR - Wanadadi', 'JNE-OKE', 15000),
('B00018', 'BAR - Wanayasa', 'JNE-OKE', 15000),
('B00019', 'LING - Bobotsari', 'JNE-OKE', 15000),
('B00020', 'LING - Bojongsari', 'JNE-OKE', 15000),
('B00021', 'LING - Bukateja', 'JNE-OKE', 15000),
('B00022', 'LING - Kaligondang', 'JNE-OKE', 15000),
('B00023', 'LING - Kalimanah', 'JNE-OKE', 15000),
('B00024', 'LING - Karanganyar', 'JNE-OKE', 15000),
('B00025', 'LING - Karang jambu', 'JNE-OKE', 15000),
('B00026', 'LING - Karang Moncol', 'JNE-OKE', 15000),
('B00027', 'LING - Karangreja', 'JNE-OKE', 15000),
('B00028', 'LING - Kejobong', 'JNE-OKE', 15000),
('B00029', 'LING - Kemangkon', 'JNE-OKE', 15000),
('B00030', 'LING - Kertanegara', 'JNE-OKE', 15000),
('B00031', 'LING - Kutasari', 'JNE-OKE', 15000),
('B00032', 'LING - Mrebet', 'JNE-OKE', 15000),
('B00033', 'LING - Padamara', 'JNE-OKE', 15000),
('B00034', 'LING - Pengadegan', 'JNE-OKE', 15000),
('B00035', 'LING - Purbalingga', 'JNE-OKE', 13000),
('B00036', 'LING - Rembang', 'JNE-OKE', 15000),
('B00037', 'MAS - Ajibarang', 'JNE-OKE', 12000),
('B00038', 'MAS - Banyumas', 'JNE-OKE', 12000),
('B00039', 'MAS - Baturaden', 'JNE-OKE', 12000),
('B00040', 'MAS - Cilongok', 'JNE-OKE', 12000),
('B00041', 'MAS - Cilongok', 'JNE-OKE', 12000),
('B00042', 'MAS - Gumelar', 'JNE-OKE', 12000),
('B00043', 'MAS - Jatilawang', 'JNE-OKE', 12000),
('B00044', 'MAS - Kalibagor', 'JNE-OKE', 12000),
('B00045', 'MAS - Karang Lewas', 'JNE-OKE', 12000),
('B00046', 'MAS - Kebasen', 'JNE-OKE', 12000),
('B00047', 'MAS - Kedungbanteng', 'JNE-OKE', 12000),
('B00048', 'MAS - Kembaran', 'JNE-OKE', 12000),
('B00049', 'MAS - Kemranjen', 'JNE-OKE', 12000),
('B00050', 'MAS - Lumbir', 'JNE-OKE', 12000),
('B00051', 'MAS - Pakuncen', 'JNE-OKE', 12000),
('B00052', 'MAS - Patikraja', 'JNE-OKE', 12000),
('B00053', 'MAS - Purwojati', 'JNE-OKE', 12000),
('B00054', 'MAS - Purwokerto Barat', 'JNE-OKE', 8000),
('B00055', 'MAS - Purwokerto', 'JNE-OKE', 8000),
('B00056', 'MAS - Purwokerto Selatan', 'JNE-OKE', 8000),
('B00057', 'MAS - Purwokerto Timur', 'JNE-OKE', 8000),
('B00058', 'MAS - Purwokerto Utara', 'JNE-OKE', 8000),
('B00059', 'MAS - Rawalo', 'JNE-OKE', 12000),
('B00060', 'MAS - Sokaraja', 'JNE-OKE', 12000),
('B00061', 'MAS - Somagede', 'JNE-OKE', 12000),
('B00062', 'MAS - Sumbang', 'JNE-OKE', 12000),
('B00063', 'MAS - Sumpiuh', 'JNE-OKE', 12000),
('B00064', 'MAS - Tambak', 'JNE-OKE', 12000),
('B00065', 'MAS - Wangon', 'JNE-OKE', 12000),
('B00066', 'CA - Adipala', 'JNE-OKE', 14000),
('B00067', 'CA - Bantarsari', 'JNE-OKE', 20000),
('B00068', 'CA - Binangun', 'JNE-OKE', 20000),
('B00069', 'CA - Cilacap', 'JNE-OKE', 14000),
('B00070', 'CA - Cilacap Selatan', 'JNE-OKE', 14000),
('B00071', 'CA - Cilacap Tengah', 'JNE-OKE', 14000),
('B00072', 'CA - Cilacap Utara', 'JNE-OKE', 14000),
('B00073', 'CA - Cimanggu', 'JNE-OKE', 20000),
('B00074', 'CA - Cipari', 'JNE-OKE', 20000),
('B00075', 'CA - Dayeuhluhur', 'JNE-OKE', 20000),
('B00076', 'CA - Gandrungmangu', 'JNE-OKE', 20000),
('B00077', 'CA - Jeruklegi', 'JNE-OKE', 20000),
('B00078', 'CA - Kampung Laut', 'JNE-OKE', 20000),
('B00079', 'CA - Karang Pucung', 'JNE-OKE', 20000),
('B00080', 'CA - Kawunganten', 'JNE-OKE', 20000),
('B00081', 'CA - Kedungrejo', 'JNE-OKE', 20000),
('B00082', 'CA - Kesugihan', 'JNE-OKE', 20000),
('B00083', 'CA - Kroya', 'JNE-OKE', 20000),
('B00084', 'CA - Majenang', 'JNE-OKE', 20000),
('B00085', 'CA - Maos', 'JNE-OKE', 20000),
('B00086', 'CA - Nusawungu', 'JNE-OKE', 20000),
('B00087', 'CA - Patimuan', 'JNE-OKE', 20000),
('B00088', 'CA - Sampang', 'JNE-OKE', 20000),
('B00089', 'CA - Sidareja', 'JNE-OKE', 20000),
('B00090', 'CA - Wanar', 'JNE-OKE', 20000),
('B00091', 'KEB - Adimulyo', 'JNE-OKE', 25000),
('B00092', 'KEB - Alian', 'JNE-OKE', 25000),
('B00093', 'KEB - Ambal', 'JNE-OKE', 25000),
('B00094', 'KEB - Ayah', 'JNE-OKE', 25000),
('B00095', 'KEB - Bonorowo', 'JNE-OKE', 25000),
('B00096', 'KEB - Buayan', 'JNE-OKE', 25000),
('B00097', 'KEB - Buluspesantren', 'JNE-OKE', 25000),
('B00098', 'KEB - Gombong', 'JNE-OKE', 25000),
('B00099', 'KEB - Karanganyar', 'JNE-OKE', 25000),
('B00100', 'KEB - Karanggayam', 'JNE-OKE', 25000),
('B00101', 'KEB - Karangsambung', 'JNE-OKE', 25000),
('B00102', 'KEB - Kebumen', 'JNE-OKE', 23000),
('B00103', 'KEB - Klirong', 'JNE-OKE', 25000),
('B00104', 'KEB - Kutowinangun', 'JNE-OKE', 25000),
('B00105', 'KEB - Kuwarasan', 'JNE-OKE', 25000),
('B00106', 'KEB - Mirit', 'JNE-OKE', 25000),
('B00107', 'KEB - Padureso', 'JNE-OKE', 25000),
('B00108', 'KEB - Pejagoan', 'JNE-OKE', 25000),
('B00109', 'KEB - Petanahan', 'JNE-OKE', 25000),
('B00110', 'KEB - Poncowarno', 'JNE-OKE', 25000),
('B00111', 'KEB - Prembun', 'JNE-OKE', 25000),
('B00112', 'KEB - Puring', 'JNE-OKE', 25000),
('B00113', 'KEB - Rowokele', 'JNE-OKE', 25000),
('B00114', 'KEB - Sadang', 'JNE-OKE', 25000),
('B00115', 'KEB - Sempor', 'JNE-OKE', 25000),
('B00116', 'KEB - Sruweng', 'JNE-OKE', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_upload` date NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tipe_file` varchar(10) NOT NULL,
  `ukuran_file` varchar(20) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id`, `tanggal_upload`, `nama_file`, `tipe_file`, `ukuran_file`, `file`) VALUES
(5, '2014-12-12', 'harga terbaru', 'doc', '373248', 'upload/files/harga terbaru.doc'),
(6, '2014-12-23', 'Kumpulan harga barang', 'docx', '16255', 'upload/files/Kumpulan harga barang.docx');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kd_kategori` char(5) NOT NULL,
  `nm_kategori` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nm_kategori`) VALUES
('KB001', 'Accesories Komputer'),
('KB002', 'Accesories Handphone'),
('KB003', 'Kategori Lain');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` char(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
('US01', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('US02', 'khatirudinm', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `idpemesan` char(6) NOT NULL,
  `email` varchar(40) NOT NULL,
  `passwords` varchar(35) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `level` varchar(6) NOT NULL,
  PRIMARY KEY (`idpemesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idpemesan`, `email`, `passwords`, `nama`, `alamat`, `telepon`, `level`) VALUES
('PS0001', 'khatirudin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Khatirudin', 'Sidomulyo RT 02 RW05 Petanahan Kebumen', '089665720218', 'member'),
('PS0002', 'wisnu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Wisnu Sugandi Putro', 'Watumas Rt 04/Rw 03 Purwokerto Utara Banyumas', '087635382012', 'member'),
('PS0003', 'yasir@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Muhammad yasier', 'Jl. Kemranjen-Buntu No.201 Kemranjen Banyumas', '089728360111', 'member'),
('PS0004', 'kamal@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Kamal Miftahul Amin', 'Jl. Pantai Ayah No.199 Ayah Kebumen', '085743920100', 'member'),
('PS0005', 'aliyudin@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Muhammad Aliyudin', 'Jl. Sunan Muria No.990 Kebumen Banyumas', '085678393092', 'member'),
('PS0006', 'kuat54@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Kuat Wahyudin', 'Perum Griya Satria Indah 2 No.45 Purwokerto Utara Banyumas', '087638300291', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE IF NOT EXISTS `pemesan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpemesan` char(6) NOT NULL,
  `id_beli` char(7) NOT NULL,
  `nm_pemesan` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `biayakirim` int(11) NOT NULL,
  `totalbayar` int(11) NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`id`, `idpemesan`, `id_beli`, `nm_pemesan`, `alamat`, `telp`, `tgl_pesan`, `biayakirim`, `totalbayar`, `status`) VALUES
(38, 'PS0001', '', 'Khatirudin', 'Sidomulyo RT 02 RW05 Petanahan Kebumen', '089665720218', '2015-01-23', 12000, 121000, 'Baru'),
(39, 'PS0001', '', 'Khatirudin', 'Sidomulyo RT 02 RW05 Petanahan Kebumen', '089665720218', '2015-01-23', 15000, 20000, 'Baru'),
(40, 'PS0002', '', 'Wisnu Sugandi Putro', 'Watumas Rt 04 Rw 03 Purwokerto Utara Banyumas', '087635382012', '2015-01-23', 13000, 18000, 'Baru'),
(41, 'PS0001', '', 'Khatirudin', 'Sidomulyo RT 02 RW05 Petanahan Kebumen', '089665720218', '2015-01-23', 15000, 114000, 'Baru'),
(42, 'PS0001', '', 'Khatirudin', 'Sidomulyo RT 02 RW05 Petanahan Kebumen', '089665720218', '2015-01-23', 15000, 20000, 'Baru'),
(43, 'PS0001', '', 'Khatirudin', 'Sidomulyo RT 02 RW05 Petanahan Kebumen', '089665720218', '2015-01-23', 25000, 33500, 'Baru'),
(44, 'PS0001', '', 'Khatirudin', 'Sidomulyo RT 02 RW05 Petanahan Kebumen', '089665720218', '2015-01-23', 25000, 66500, 'Baru'),
(45, 'PS0001', 'PBL0008', 'Khatirudin', 'Sidomulyo RT 02 RW05 Petanahan Kebumen', '089665720218', '2015-01-23', 25000, 124000, 'Baru');

-- --------------------------------------------------------

--
-- Table structure for table `pemesan_detail`
--

CREATE TABLE IF NOT EXISTS `pemesan_detail` (
  `idpemesan` char(6) NOT NULL,
  `id_beli` char(7) NOT NULL,
  `kd_barang` char(5) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `subtotal` int(11) NOT NULL,
  KEY `idpemesan` (`idpemesan`),
  KEY `idpemesan_2` (`idpemesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesan_detail`
--

INSERT INTO `pemesan_detail` (`idpemesan`, `id_beli`, `kd_barang`, `nm_barang`, `harga`, `jumlah`, `subtotal`) VALUES
('PS0001', 'PBL0001', 'BR007', 'LCD Cleaner 3 in 1', 5000, 2, 10000),
('PS0001', 'PBL0001', 'BR005', 'Power Bank Advan 5200 mAh', 99000, 1, 99000),
('PS0001', 'PBL0002', 'BR007', 'LCD Cleaner 3 in 1', 5000, 1, 5000),
('PS0002', 'PBL0003', 'BR007', 'LCD Cleaner 3 in 1', 5000, 1, 5000),
('PS0001', 'PBL0004', 'BR005', 'Power Bank Advan 5200 mAh', 99000, 1, 99000),
('PS0001', 'PBL0005', 'BR007', 'LCD Cleaner 3 in 1', 5000, 1, 5000),
('PS0001', 'PBL0006', 'BR007', 'LCD Cleaner 3 in 1', 5000, 1, 5000),
('PS0001', 'PBL0006', 'BR008', 'KEY PROTECTOR 14â€', 3500, 1, 3500),
('PS0001', 'PBL0007', 'BR007', 'LCD Cleaner 3 in 1', 5000, 2, 10000),
('PS0001', 'PBL0007', 'BR008', 'KEY PROTECTOR 14â€', 3500, 1, 3500),
('PS0001', 'PBL0007', 'BR009', 'Kabel Data USB Warna', 9000, 2, 18000),
('PS0001', 'PBL0007', 'BR001', 'Mouse Itech', 10000, 1, 10000),
('PS0001', 'PBL0008', 'BR005', 'Power Bank Advan 5200 mAh', 99000, 1, 99000);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_perus` char(5) NOT NULL,
  `nm_perus` varchar(50) NOT NULL,
  `almt_perus` varchar(250) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `atas_nm` varchar(30) NOT NULL,
  `profil` text NOT NULL,
  PRIMARY KEY (`id_perus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_perus`, `nm_perus`, `almt_perus`, `telp`, `email`, `bank`, `no_rek`, `atas_nm`, `profil`) VALUES
('PER01', 'Zello Store', 'Jl. Dr. Soeparno No.199 Karangwangkal Purwokerto Utara', '0896 5865 8738 / 0857 0002 0896 ', 'Zellostore99@gmail.com   |   FB : zello comp', 'Bank Central Asia (BCA)', '0970370421', 'SUPRIONO', 'Zello Store Menjual berbagai macam  Accesories Computer dan Accesories Handphone');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE IF NOT EXISTS `tamu` (
  `id_tamu` char(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id_tamu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nama`, `email`, `komentar`) VALUES
('T0001', 'Khatirudin', 'radenkm18@gmail.com', 'Min kalo PowerBank gw beli lebih dari 5 dapet diskon kagak?? :)'),
('T0002', 'Coba', 'Coba@yahoo.com', 'Coba Insert'),
('T0003', 'Bayu', 'Bayu13@gmail.com', 'Mantap lah... Pengiriman cepat..\r\nTerima Kasih GS Shop'),
('T0004', 'Fais', 'AnakLanang@yahoo.co.id', 'Jamane wis canggih... tuku barang semakin cepet...\r\nBarange wis nyampe mba bro..\r\nmakasih :)..\r\nCepet Bingit nyampene'),
('T0005', 'sasdasd', 'adsada@gmail.com', 'qdadasda');

-- --------------------------------------------------------

--
-- Table structure for table `temp_beli`
--

CREATE TABLE IF NOT EXISTS `temp_beli` (
  `idpemesan` char(6) NOT NULL,
  `kd_barang` char(5) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `subtotal` int(11) NOT NULL,
  KEY `kd_barang` (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `totsem`
--

CREATE TABLE IF NOT EXISTS `totsem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpemesan` char(6) NOT NULL,
  `biayakirim` int(11) NOT NULL,
  `totalbayar` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idpemesan` (`idpemesan`),
  KEY `idpemesan_2` (`idpemesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `totsem`
--

INSERT INTO `totsem` (`id`, `idpemesan`, `biayakirim`, `totalbayar`) VALUES
(53, 'PS0001', 12000, 121000),
(54, 'PS0001', 15000, 20000),
(55, 'PS0002', 13000, 18000),
(56, 'PS0001', 15000, 114000),
(57, 'PS0001', 15000, 20000),
(58, 'PS0001', 25000, 33500),
(59, 'PS0001', 25000, 66500),
(60, 'PS0001', 25000, 124000);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `temp_beli`
--
ALTER TABLE `temp_beli`
  ADD CONSTRAINT `temp_beli_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
