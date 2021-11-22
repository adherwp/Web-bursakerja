-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 02:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bursamalang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
--

CREATE TABLE `bahasa` (
  `id_bahasa` int(11) NOT NULL,
  `bahasa` varchar(255) NOT NULL,
  `id_pencaker` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahasa`
--

INSERT INTO `bahasa` (`id_bahasa`, `bahasa`, `id_pencaker`) VALUES
(1, 'Indonesia ', 1),
(2, 'I', 2),
(3, 'Indonesia ', 0),
(4, 'Perancis ', 0),
(5, 'Indonesia ', 3),
(6, 'Perancis ', 3),
(7, 'Cina ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buat_artikel`
--

CREATE TABLE `buat_artikel` (
  `id_berita` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `pict_article` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buat_artikel`
--

INSERT INTO `buat_artikel` (`id_berita`, `id_company`, `judul_berita`, `deskripsi`, `pict_article`, `createdat`) VALUES
(2, 1, 'tes halo', '<p>halo tes</p>', 'ALB00058.jpg', '2019-08-01 02:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `buat_lowongan`
--

CREATE TABLE `buat_lowongan` (
  `id_jobpost` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `minimumsalary` varchar(255) NOT NULL,
  `maximumsalary` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buat_lowongan`
--

INSERT INTO `buat_lowongan` (`id_jobpost`, `id_company`, `jobtitle`, `description`, `minimumsalary`, `maximumsalary`, `experience`, `qualification`, `createdat`) VALUES
(104, 102, 'Lowongan jaga lilin', '<p>Jadi anda cukup jaga lilin saja</p>', '4000000', '5000000', '2', 'nganu', '2019-06-23 17:49:59'),
(105, 100, 'Lowongan Bakul Kopi', '<p>Jual kopi jadi barista keren</p>', '1000000', '1500000', '1', 'Buka Sachet', '2019-07-09 13:03:27'),
(106, 102, 'Buat Teh', '<p>Buat Teh gakalah keren sama kopi</p>', '1000000', '1500000', '1', 'Celupin Kopi', '2019-07-09 13:05:00'),
(107, 107, 'Jaga Kandang Ayam', '<p>Lowongan kerja Full Time hari kerja</p>', '500000', '1500000', '1', 'Telaten dan Sabar', '2019-08-01 00:50:27'),
(108, 102, 'Jaga Toko', '<p>Jaga toko24 jam</p>', '500000', '1200000', '1', 'SMA', '2019-07-31 15:53:12'),
(109, 107, 'tes lowongan', '<p>tes</p>', '10000', '2000', '2', 'dadada', '2019-08-01 03:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan_desa` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aboutme` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL DEFAULT '2',
  `id_pengusaha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `name`, `companyname`, `kecamatan`, `kelurahan_desa`, `alamat`, `contactno`, `website`, `email`, `password`, `aboutme`, `logo`, `createdAt`, `active`, `id_pengusaha`) VALUES
(100, 'McKenzie Mccarthy', 'Metus Facilisis Lorem Inc.', 'Dampit', 'Amadanom', 'Castelló', '07624 689915', 'http://learningfromscratch.online/', 'erat@Phasellusataugue.ca', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', NULL, '59cd0fd60ae8b.png', '2017-10-10 12:44:33', 1, 1),
(102, 'haicorp', 'haidar coporation', 'Ampelgading', 'Amadanom', 'Kedungkandang', '0099999999', 'hai.com', 'haidar@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'hai', '5d0d64746dc61.png', '2019-06-21 23:12:52', 1, 1),
(103, 'Banna', 'bakulan', 'Ampelgading', 'Amadanom', 'Aqchah', '1234567891', '', 'banna@mail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'bakulan opo onok e', '5d10d6be78132.jpg', '2019-06-24 13:57:18', 1, 0),
(104, 'Albanna', 'Biofarma', 'Dampit', 'Amadanom', 'Jln.Raya Amadanom No.12', '0878954641', 'biofarma.com', 'albanna@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'Bakulan obat', '5d1234732a360.png', '2019-06-25 14:49:23', 2, 0),
(105, '', 'bannana', 'Ampelgading', 'Argoyuwono', '', '9878675172', 'banana.na', 'nabanaban@mailn.na', '', 'bananan', '5d3932e3ed139.', '2019-07-25 04:41:07', 2, 1),
(106, '', 'banana', 'Ampelgading', 'Argoyuwono', '', '0987654321', 'testes.com', 'tes@test.com', '', 'banana', '5d3b38a555398.', '2019-07-26 17:30:13', 2, 1),
(107, '', 'sesilcompany', 'Bantur', 'Bandungrejo', 'ksndalkdas', '02587896654', '-', 'sesil@mail.com', '', 'macul sawah', '5d401b73c467b.', '2019-07-30 10:26:59', 1, 3),
(108, '', 'tes tes', 'Ampelgading', 'Argoyuwono', 'hahahaasdasd', '021212564658', 'naskdas.asd', 'masdn@na.asd', '', 'tes laggi', '5d4164a95977e.', '2019-07-31 09:51:37', 2, 1),
(109, '', 'umkm bakul cilok', 'Dau', 'Gadingkulon', 'jl terusan dau', '0887788788', 'cilokenak.com', 'haidaralvinanda@gmail.com', '', 'berjualan cilok', '5d42326bf33e2.', '2019-08-01 00:29:32', 1, 4),
(110, '', 'kandang ayam', 'Ampelgading', 'Argoyuwono', 'Jln. Ayam', '0921231321', 'ayam.com', 'ayam@mail.com', '', 'kandang ayam', '5d41b8dfd9315.', '2019-07-31 15:50:55', 1, 1),
(111, '', 'da', 'Bantur', 'Bandungrejo', 'da', 'da', 'da', 'da', '', 'da', '5d4263166d304.', '2019-08-01 03:57:10', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `name`, `id_kecamatan`) VALUES
(1, 'Argoyuwono', 1),
(2, 'Lebakharjo', 1),
(3, 'Bandungrejo', 2),
(4, 'Bantur', 2),
(5, 'Bakalan', 3),
(6, 'Bululawang', 3),
(7, 'Amadanom', 4),
(8, 'Baturetno', 4),
(9, 'Gadingkulon', 5),
(10, 'Kalisongo', 5),
(11, 'Banjarejo', 6),
(12, 'Donomulyo', 6),
(13, 'Gajahrejo', 7),
(14, 'Gedangan', 7),
(15, 'Balearjo', 8),
(16, 'Banjarejo', 8),
(17, 'Argosari', 9),
(18, 'Gadingkembar', 9),
(19, 'Arjosari', 10),
(20, 'Arjowilangun', 10),
(21, 'Ampeldento', 11),
(22, 'Bocek', 11),
(23, 'Bayem', 12),
(24, 'Kasembon', 12),
(25, 'Curungrejo', 13),
(26, 'Dilem', 13),
(27, 'Jambuwer', 14),
(28, 'Jatikerto', 14),
(29, 'Bedali', 15),
(30, 'Ketindan', 15),
(31, 'Babadan', 16),
(32, 'Balesari', 16),
(33, 'Banjarejo', 17),
(34, 'Banturejo', 17),
(35, 'Gampingan', 18),
(36, 'Pagak', 18),
(37, 'Balearjo', 19),
(38, 'Banjarejo', 19),
(39, 'Ampeldento', 20),
(40, 'Asrikaton', 20),
(41, 'Genengan', 21),
(42, 'Glanggang', 21),
(43, 'Argosuko', 22),
(44, 'Belung', 22),
(45, 'Bendosari', 23),
(46, 'Madiredo', 23),
(47, 'Argotirto', 24),
(48, 'Druju', 24);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL,
  `kode_kec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `name`, `phonecode`, `kode_kec`) VALUES
(1, 'Ampelgading', 1, 350706),
(2, 'Bantur', 2, 350703),
(3, 'Bululawang', 3, 350714),
(4, 'Dampit', 4, 350705),
(5, 'Dau', 5, 350722),
(6, 'Donomulyo', 6, 350701),
(7, 'Gedangan', 7, 350729),
(8, 'Gondanglegi', 8, 350710),
(9, 'Jabung', 9, 350717),
(10, 'Kalipare', 10, 350711),
(11, 'Karangploso', 11, 350723),
(12, 'Kasembon', 12, 350728),
(13, 'Kepanjen', 13, 350713),
(14, 'Kromengan', 14, 350731),
(15, 'Lawang', 15, 350725),
(16, 'Ngajum', 16, 350720),
(17, 'Ngantang', 17, 350727),
(18, 'Pagak', 18, 350702),
(19, 'Pagelaran', 19, 350733),
(20, 'Pakis', 20, 350718),
(21, 'Pakisaji', 21, 350719),
(22, 'Poncokusumo\r\n', 22, 350707),
(23, 'Pujon', 23, 350726),
(24, 'Sumbermanjing Wetan', 24, 350704),
(25, 'Wajak', 25, 350708),
(26, 'Turen', 26, 350709),
(27, 'Sumberpucung', 27, 350712),
(28, 'Tajinan', 28, 350715),
(29, 'Tumpang', 29, 350716),
(30, 'Wagir', 30, 350721),
(31, 'Singosari', 31, 350724),
(32, 'Tirtoyudo', 32, 350730),
(33, 'Wonosari', 33, 350732);

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_apply` int(11) NOT NULL,
  `id_jobpost` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_apply`, `id_jobpost`, `id_company`, `id_user`, `status`) VALUES
(2, 102, 101, 1, 2),
(3, 103, 101, 1, 1),
(4, 106, 102, 1, 0),
(5, 106, 102, 107, 2),
(6, 104, 102, 109, 1),
(7, 107, 107, 107, 2),
(8, 107, 107, 109, 1),
(9, 104, 102, 115, 0),
(10, 106, 102, 128, 0),
(11, 104, 102, 129, 0),
(12, 104, 102, 139, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mailbox`
--

CREATE TABLE `mailbox` (
  `id_mailbox` int(11) NOT NULL,
  `id_fromuser` int(11) NOT NULL,
  `fromuser` varchar(255) NOT NULL,
  `id_touser` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailbox`
--

INSERT INTO `mailbox` (`id_mailbox`, `id_fromuser`, `fromuser`, `id_touser`, `subject`, `message`, `createdAt`) VALUES
(1, 1, 'user', 0, 'tes', '<p>halo</p>', '2019-06-22 17:49:39'),
(2, 1, 'user', 102, 'Tolong Terima Saya', '<p>Assalamualaikum</p>', '2019-06-22 20:37:10'),
(3, 107, 'user', 102, 'Mohon  Terima Saya', '<p>Terimakasih atas kesempatan yang diberikan. Saya akan berusaha sebaik mungkin.</p>', '2019-08-01 01:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `pencaker`
--

CREATE TABLE `pencaker` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_pendaftaran` varchar(4) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(20) NOT NULL,
  `tinggi_badan` int(3) NOT NULL,
  `berat_badan` int(3) NOT NULL,
  `cacat_badan` varchar(50) NOT NULL,
  `cacat_lainnya` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `penghasil` varchar(10) NOT NULL,
  `pd_formal` varchar(100) NOT NULL,
  `penyelenggara` varchar(100) NOT NULL,
  `lama` int(11) NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `kerja_sekarang` varchar(50) NOT NULL,
  `j_kerja_pokok` varchar(20) NOT NULL,
  `j_kerja_sampingan` varchar(20) NOT NULL,
  `kerja1` varchar(50) NOT NULL,
  `jabatan1` varchar(50) NOT NULL,
  `lama1` varchar(100) NOT NULL,
  `upah1` varchar(20) NOT NULL,
  `alasan1` varchar(50) NOT NULL,
  `usaha2` varchar(50) NOT NULL,
  `jabatan2` varchar(50) NOT NULL,
  `lama2` varchar(100) NOT NULL,
  `upah2` varchar(20) NOT NULL,
  `alasan2` varchar(50) NOT NULL,
  `ingin_jabatan` varchar(50) NOT NULL,
  `penempatan` varchar(50) NOT NULL,
  `bersedia_upah` varchar(100) NOT NULL,
  `ingin_upah` int(11) NOT NULL,
  `bersedia_waktu` varchar(100) NOT NULL,
  `keadaan` varchar(50) NOT NULL,
  `pas_foto` varchar(200) NOT NULL,
  `ijazah` varchar(200) NOT NULL,
  `ktp` varchar(250) DEFAULT NULL,
  `akte` varchar(200) NOT NULL,
  `sertifikat` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencaker`
--

INSERT INTO `pencaker` (`id`, `nik`, `no_pendaftaran`, `tgl_pendaftaran`, `no_antrian`, `nama`, `tanggal_lahir`, `tmpt_lahir`, `jenis_kelamin`, `kecamatan`, `alamat`, `desa`, `agama`, `kewarganegaraan`, `tinggi_badan`, `berat_badan`, `cacat_badan`, `cacat_lainnya`, `status`, `penghasil`, `pd_formal`, `penyelenggara`, `lama`, `bahasa`, `kerja_sekarang`, `j_kerja_pokok`, `j_kerja_sampingan`, `kerja1`, `jabatan1`, `lama1`, `upah1`, `alasan1`, `usaha2`, `jabatan2`, `lama2`, `upah2`, `alasan2`, `ingin_jabatan`, `penempatan`, `bersedia_upah`, `ingin_upah`, `bersedia_waktu`, `keadaan`, `pas_foto`, `ijazah`, `ktp`, `akte`, `sertifikat`, `id_user`) VALUES
<<<<<<< HEAD
(0, '14567', '50', '2020-01-30', 1, 'Panji Awwaludi', '1999-12-01', 'Solo', 'L', 'Singosari', 'Semanggi barat No.28 (rumah pertama dari pertigaan/depan masjid, rumah warna putih, hijau)', 'Banjararum', 'Islam', 'Indonesia', 163, 56, '', '', 'Belum Kawin', 'Ya', '0', '', 0, 'Array', 'Mencari Pekerjaan', '', '', '', '', '', '', '', '', '', '', '', '', 'Manajer', 'Di Luar Negeri', 'Bulanan', 10000000, 'Jangka Panjang/Tetap', 'Telah Ditempatkan', '5e328e6db8ed4.jpg', '5e328e6dbfe79.jpg', '5e328e6dbffce.jpg', '5e328e6dc005d.jpg', '', 140),
(1, '8520', '1', '2020-01-30', 1, 'Reza', '2000-01-01', 'Malang', 'L', 'Kepanjen', 'Katu Street', 'Ardirejo', 'Islam', 'Indonesia', 178, 63, '', '', 'Belum Kawin', 'Ya', '0', '', 0, 'Indonesia', 'Sekolah', '', '', '', '', '', '', '', '', '', '', '', '', 'CEO', 'Di Luar Negeri', 'Bulanan', 20000000, 'Jangka Panjang/Tetap', 'Telah Ditempatkan', '5e3292a20a081.png', '5e3292a20abb0.png', '5e3292a20b785.png', '5e3292a20c3d2.png', '', 141),
(3, '781236', '1', '2020-02-26', 1, 'devto', '2009-02-13', 'Kediri', 'L', 'Gondanglegi', 'jl. setapak', 'Sumbersari', 'Islam', 'Indonesia', 160, 50, 'tangan putus', '', 'Belum Kawin', 'Ya', '0', '', 0, '0', 'Sekolah', '', '', '', '', '', '', '', '', '', '', '', '', 'Arsitek', 'Wilayah Tempat Pendaftaran', 'Mingguan', 9000000, 'Jangka Pendek/Kontrak', 'Telah Ditempatkan', '5e52a8cf3c96a.jpg', '5e52a8cf44849.jpg', '5e52a8cf5634c.png', '5e52a8cf568ac.png', '5e52a8cf3c4a1.zip', 146);
=======
(1, '14567', '50', '2020-01-30', 1, 'Panji Awwaludi', '1999-12-01', 'Solo', 'L', 'Singosari', 'Semanggi barat No.28 (rumah pertama dari pertigaan/depan masjid, rumah warna putih, hijau)', 'Banjararum', 'Islam', 'Indonesia', 163, 56, '', '', 'Belum Kawin', 'Ya', '0', '', 0, 'Array', 'Mencari Pekerjaan', '', '', '', '', '', '', '', '', '', '', '', '', 'Manajer', 'Di Luar Negeri', 'Bulanan', 10000000, 'Jangka Panjang/Tetap', 'Telah Ditempatkan', '5e328e6db8ed4.jpg', '5e328e6dbfe79.jpg', '5e328e6dbffce.jpg', '5e328e6dc005d.jpg', '', 140),
(2, '8520', '1', '2020-01-30', 1, 'Reza', '2000-01-01', 'Malang', 'L', 'Kepanjen', 'Katu Street', 'Ardirejo', 'Islam', 'Indonesia', 178, 63, '', '', 'Belum Kawin', 'Ya', '0', '', 0, 'Indonesia', 'Sekolah', '', '', '', '', '', '', '', '', '', '', '', '', 'CEO', 'Di Luar Negeri', 'Bulanan', 20000000, 'Jangka Panjang/Tetap', 'Telah Ditempatkan', '5e3292a20a081.png', '5e3292a20abb0.png', '5e3292a20b785.png', '5e3292a20c3d2.png', '', 141);
>>>>>>> 346faa881f33ce95291f85aea0ad9864c24e2133

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(100) NOT NULL,
  `tidak_tamat` varchar(200) DEFAULT NULL,
  `sd` varchar(200) DEFAULT NULL,
  `smp` varchar(200) DEFAULT NULL,
  `sma` varchar(200) DEFAULT NULL,
  `sm` varchar(200) DEFAULT NULL,
  `akta_dua` varchar(200) DEFAULT NULL,
  `akta_tiga` varchar(200) DEFAULT NULL,
  `sarjana` varchar(200) DEFAULT NULL,
  `doktor` varchar(200) DEFAULT NULL,
  `thn_tidak_tamat` varchar(100) DEFAULT NULL,
  `thn_sd` varchar(100) DEFAULT NULL,
  `thn_smp` varchar(100) DEFAULT NULL,
  `thn_sma` varchar(100) DEFAULT NULL,
  `thn_sm` varchar(100) DEFAULT NULL,
  `thn_akta_dua` varchar(100) DEFAULT NULL,
  `thn_akta_tiga` varchar(100) DEFAULT NULL,
  `thn_sarjana` varchar(100) DEFAULT NULL,
  `thn_doktor` varchar(100) DEFAULT NULL,
  `id_pencaker` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `tidak_tamat`, `sd`, `smp`, `sma`, `sm`, `akta_dua`, `akta_tiga`, `sarjana`, `doktor`, `thn_tidak_tamat`, `thn_sd`, `thn_smp`, `thn_sma`, `thn_sm`, `thn_akta_dua`, `thn_akta_tiga`, `thn_sarjana`, `thn_doktor`, `id_pencaker`) VALUES
(1, '', 'SD Gadungan', 'SMP Percopetan 2', 'SMA Negeri Kampungan ', '', '', '', 'POLINEMA', '', '', '2011', '2014', '2017', '', '', '', '2021', '', 1),
(2, '', 'asdfghj', 'cvbnm', 'cvbnm', '', '', '', 'dfghjkl', '', '', '2010', '2013', '2016', '', '', '', '2020', '', 2),
(3, '', '', 'SMP Negeri Konstruksi 4', '', '', '', '', '', '', '', '', '2019', '', '', '', '', '', '', 0),
(4, '', '', 'SMP Negeri Konstruksi 4', 'SMA Negeri Bangunan 1', '', '', '', '', '', '', '', '2017', '2019', '', '', '', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_non_formal`
--

CREATE TABLE `pendidikan_non_formal` (
  `id` int(11) NOT NULL,
  `penyelenggara` varchar(225) NOT NULL,
  `lama_kursus` varchar(225) NOT NULL,
  `thn_kursus` varchar(225) NOT NULL,
  `id_pencaker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_non_formal`
--

INSERT INTO `pendidikan_non_formal` (`id`, `penyelenggara`, `lama_kursus`, `thn_kursus`, `id_pencaker`) VALUES
(1, 'Departemen Tenaga Kerja', '10', '2021', 1),
(2, 'Tidak Ada', '', '', 1),
(3, 'Tidak Ada', '', '', 1),
(4, 'Departemen Tenaga Kerja', '10', '2019', 2),
(5, 'Tidak Ada', '', '', 2),
(6, 'Tidak Ada', '', '', 2),
(7, 'Instansi Pemerintahan Lainnya', '2', '2019', 0),
(8, 'Tidak Ada', '', '', 0),
(9, 'Tidak Ada', '', '', 0),
(10, 'Perusahaan', '2', '2020', 3),
(11, 'Perusahaan', '', '', 3),
(12, 'Tidak Ada', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengusaha`
--

CREATE TABLE `pengusaha` (
  `id_pengusaha` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nib` varchar(13) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengusaha`
--

INSERT INTO `pengusaha` (`id_pengusaha`, `nik`, `nib`, `nama`, `gender`, `email`, `password`, `createdAt`, `active`) VALUES
(1, 123456789, '123456789', 'McKenzie Mccarthy', 'Laki laki', 'banna@mail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '2019-07-02 14:16:52', 1),
(2, 1234567897, '321654', 'Bukan Banna', 'L', 'banna@banna.ban', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '2019-07-30 06:28:47', 1),
(3, 2147483647, '1235454', 'Sesilia', 'P', 'sesil@mail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '2019-07-30 10:12:14', 1),
(4, 2147483647, '12321313', 'hai corp', 'L', 'haidaralvinanda@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '2019-08-01 00:28:25', 1),
(5, 1232534, '1245454', 'mahmud', 'L', 'mahmud@gmail.com', 'MDdiNDMyZDI1MTcwYjQ2OWI1NzA5NWNhMjY5YmMyMDI=', '2020-01-07 08:03:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply_mailbox`
--

CREATE TABLE `reply_mailbox` (
  `id_reply` int(11) NOT NULL,
  `id_mailbox` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_mailbox`
--

INSERT INTO `reply_mailbox` (`id_reply`, `id_mailbox`, `id_user`, `usertype`, `message`, `createdAt`) VALUES
(1, 0, 0, 'company', '', '2019-06-21 20:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(250) NOT NULL,
  `skill` varchar(200) NOT NULL,
  `id_pencaker` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `skill`, `id_pencaker`) VALUES
(1, 'Baku Hantam', 1),
(2, 'Baku Hantam', 2),
(3, 'Ghibah', 0),
(4, 'silat', 0),
(5, 'silat', 3),
(6, 'Ghibah', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `aboutme` text,
  `komentar` varchar(1000) DEFAULT NULL,
  `activation_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `resume`, `hash`, `active`, `aboutme`, `komentar`, `activation_code`) VALUES
(1, 'dummy@test.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '5d0ebeda2aeb1.', NULL, 1, 'Bismillah', '', ''),
(101, 'haidaralvin@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '5d0d37fdebcee.pdf', 'fb2946006afcf84895e30f3955f7a2e7', 2, 'haidar', '', ''),
(102, 'bananan@mail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '5d400d51551b6.pdf', 'dce3f4365b195bd531c6eeb5e1f78492', 1, '', '', ''),
(104, 'nanana@mail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '5d4011dfc73a2.pdf', 'ac4ee335776e94993cc53eb77d100908', 1, '', '', ''),
(105, 'ahed.albanna98@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '5d40129ebc555.pdf', '8ef73c3e585aee55eda58f9d9008738f', 1, '', '', ''),
(106, 'banna.a@mail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '5d404d4c30312.pdf', '58d9594a5105a4f1832c1ea35905d8f6', 1, '', '', ''),
(107, 'sesil@mail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '5d40529f1ee77.pdf', '3c942085437520efd6b2250a98c3044c', 1, '', '', ''),
(108, 'admin@coba.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '5d407b526afee.pdf', '49c1a229227e2cf985fbae01f61de4b0', 1, '', '', ''),
(109, 'alvinanda90@gmail.com', 'OTU3MzljOGIyNGZjMGViN2FkNWIyMTQ3ZjAyOWFlY2Y=', '5d422e04454b1.pdf', 'eaafcb2d9692a2a15fb7a80de85be9ae', 1, '', '', ''),
(110, 'sesilliayam@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '5d42536b211bb.pdf', '8b11e30861f1622fed2e7c9cdd1a4c33', 2, '', '', ''),
(111, 'diskominfo@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '5d41b2aedc5c9.pdf', '06b719b331c0a0c970631099fb884d7c', 2, '', '', ''),
(112, 'hai@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '5d41b30a5f2b3.pdf', '0898a6df9edd6259a25d349f92fb63ad', 2, '', '', ''),
(113, 'test@gmail.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', '5d41b5b1afa64.pdf', 'c30d9885091fd7d2eb7c655dd9e09903', 1, '', '', ''),
(114, 'moko', 'NjM2YTRmNWY2N2Q0Y2I4NTUxZTNiZmJiYjZiZWIxMTU=', '5d42424a9c34f.pdf', '771a9f973f7b8f443f0c1a8c248205bd', 2, '', '', ''),
(115, 'ok', 'MDE3NmZmYjk5YzBhNzJhYTk1Nzc5ZWY2N2Q0ZGEwMmM=', '5d424b5d6ab50.pdf', '5e05b8dc7d6049449cd559a31fa651fc', 2, '', '', ''),
(129, 'panji@gmail.com', '123', '5e14abd2c2f96.pdf', '94ed1040f422e12543a470400e9d95fb', 1, '', '', ''),
(130, 'udin@gmail.com', '123', '5e169c3059e08.pdf', 'db820eed6a78d3d7e52d2fc926343e87', 2, '', '', ''),
(132, 'dummy1@test.com', '123', '5e1ac77228a80.pdf', 'afadb1224345202d05b1d45fffd6f3a9', 1, '', '', ''),
(133, 'dummy2@test.com', '123', '5e25b72363133.pdf', '4ae5ef52aeb808ae3ceb023ff4278869', 1, '', '', ''),
(134, 'reza@gmail.com', '1234', '5e3138f70afa4.pdf', '37f450a712dc4dcb99b882d54beed328', 2, '', '', ''),
(135, 'manco@gmail.com', '1234', '5e313a4cec56c.pdf', 'a38d0b5010fc3aca28d9d41eb70330db', 2, '', '', ''),
(136, 'kuyla@gmail.com', 'ZDAxY2MyNWU2ZGJjNjQzZjU2NjcwM2UyMDVjYmRkM2I=', '5e32774be5156.pdf', '7b30fae8c4ddce22bdddc7f4210d0954', 1, '', NULL, ''),
(137, 'detman@yahoo.com', 'YjMwMzYyYjZjY2YyZjQ3MDBhMGYyMGU4Y2U2MGUxZTk=', '5e327b07e0193.pdf', 'e261160572e68565145f7a14556913e9', 0, '', 'Penipuan', ''),
(138, 'dummy3@test.com', 'MDdiNDMyZDI1MTcwYjQ2OWI1NzA5NWNhMjY5YmMyMDI=', '5e327f6a56c5c.pdf', '3d9572e4e81c910603fbbff3c0193c5b', 2, '', NULL, ''),
(139, 'mantao@rocket.com', 'YWIwNTU1YmY2NmE4ZTE2NDA5ZjZhOGExYzJjM2Y0NzY=', '5e3281337d6ea.pdf', 'cde2845f3f1a07c0ebc932b8fc06ecbe', 2, '', NULL, ''),
(140, 'reza@rocketmail.com', 'YWU1YmFkZGM4OGEyODBhNTBlNmJkMzNmMWM1YzI2NTY=', '5e328d9682047.pdf', 'b1a2578d70a0e837fdcc52ef250a7347', 1, '', NULL, ''),
<<<<<<< HEAD
(141, 'ariestya@gmail.com', 'NTUwZGUzMTM4ZGJkNjMwMDJjZDQwZDI1YmRiOWNkMTg=', '5e3291d172a64.pdf', 'f6cee1c8f06267febab1c3f65e957aa5', 2, '', NULL, ''),
(145, 'hai@domai.com', 'MDdiNDMyZDI1MTcwYjQ2OWI1NzA5NWNhMjY5YmMyMDI=', '5e529f117bde6.pdf', '77ca31b53893c3c1e6816a6325a9caa0', 3, '', NULL, 'ca57609d2bfad94c45d84add5163ef0b'),
(146, 'mati@gmail.com', 'MDdiNDMyZDI1MTcwYjQ2OWI1NzA5NWNhMjY5YmMyMDI=', '5e52a4d405e13.pdf', '7635b0e37562c46e8bdd6574fb5892a2', 1, '', NULL, 'c36acb30555a2e03a6ec18a47a954200');
=======
(141, 'ariestya@gmail.com', 'NTUwZGUzMTM4ZGJkNjMwMDJjZDQwZDI1YmRiOWNkMTg=', '5e3291d172a64.pdf', 'f6cee1c8f06267febab1c3f65e957aa5', 2, '', NULL, '');
>>>>>>> 346faa881f33ce95291f85aea0ad9864c24e2133

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id_bahasa`);

--
-- Indexes for table `buat_artikel`
--
ALTER TABLE `buat_artikel`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `buat_lowongan`
--
ALTER TABLE `buat_lowongan`
  ADD PRIMARY KEY (`id_jobpost`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_apply`);

--
-- Indexes for table `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`id_mailbox`);

--
-- Indexes for table `pencaker`
--
ALTER TABLE `pencaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan_non_formal`
--
ALTER TABLE `pendidikan_non_formal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengusaha`
--
ALTER TABLE `pengusaha`
  ADD PRIMARY KEY (`id_pengusaha`);

--
-- Indexes for table `reply_mailbox`
--
ALTER TABLE `reply_mailbox`
  ADD PRIMARY KEY (`id_reply`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id_bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `buat_artikel`
--
ALTER TABLE `buat_artikel`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buat_lowongan`
--
ALTER TABLE `buat_lowongan`
  MODIFY `id_jobpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_apply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `id_mailbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `pencaker`
--
ALTER TABLE `pencaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
=======
>>>>>>> 346faa881f33ce95291f85aea0ad9864c24e2133
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendidikan_non_formal`
--
ALTER TABLE `pendidikan_non_formal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengusaha`
--
ALTER TABLE `pengusaha`
  MODIFY `id_pengusaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reply_mailbox`
--
ALTER TABLE `reply_mailbox`
  MODIFY `id_reply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
<<<<<<< HEAD
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
=======
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
>>>>>>> 346faa881f33ce95291f85aea0ad9864c24e2133
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
