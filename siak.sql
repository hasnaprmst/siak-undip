-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2022 at 05:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siak`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_departemen`
--

CREATE TABLE `data_departemen` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_departemen`
--

INSERT INTO `data_departemen` (`nip`, `nama`) VALUES
('0987654321', 'departemen');

-- --------------------------------------------------------

--
-- Table structure for table `data_dosen`
--

CREATE TABLE `data_dosen` (
  `nip` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_dosen`
--

INSERT INTO `data_dosen` (`nip`, `nama_dosen`) VALUES
('196511071992031003', 'Drs. Eko Adi Sarwoko, M.Kom.'),
('197007051997021001', 'Priyo Sidik Sasongko, S.Si., M.Kom.'),
('197108111997021004', 'Dr. Aris Sugiharto, S.Si., M.Kom.'),
('197308291998022001', 'Beta Noranita, S.Si, M.Kom'),
('197404011999031002', 'Dr. Aris Puji Widodo, S.Si, M.T'),
('197601102009122002', 'Dinar Mutiara K N, S.T., M.InfoTech.(Comp)., Ph.D.'),
('197805022005012002', 'Sukmawati Nur Endah, S.Si, M.Kom'),
('197805162003121001', 'Helmie Arif Wibawa, S.Si, M.Cs'),
('197902122008121002', 'Indra Waspada, ST, M.T.I'),
('197905242009121003', 'Sutikno, ST, M.Cs'),
('197907202003121002', 'Nurdin Bahtiar, S.Si, M.T'),
('198009142006041002', 'Edy Suharto, S.T., M.Kom.'),
('198010212005011003', 'Ragil Saputra, S.Si, M.Cs'),
('198104202005012001', 'Dr. Retno Kusumaningrum, S.Si, M.Kom'),
('198104212008121002', 'Panji Wisnu Wirawan, S.T., M.T.'),
('198106202015041002', 'Muhammad Malik Hakim, S.T., M.T.I.'),
('198203092006041002', 'Dr. Eng. Adi Wibowo, S.Si, M.Kom'),
('198302032006041002', 'Satriyo Adhy, S.Si, M.T'),
('198404112019031009', 'Fajar Agung Nugroho, S.Kom., M.Cs.'),
('198511252018032001', 'Rismiyati, B.Eng, M.Cs'),
('198803222020121010', 'Prajanto Wahyu Adi, M.Kom.'),
('198903032015042002', 'Khadijah, S.Kom, M.Cs'),
('199112092022041011', 'Adhe Setya Pramayoga, S.Kom., M.T.');

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `nama` varchar(50) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `doswal` varchar(50) NOT NULL,
  `nomor_hp` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kabupaten_kota` varchar(50) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`nama`, `nim`, `email`, `doswal`, `nomor_hp`, `alamat`, `provinsi`, `kabupaten_kota`, `angkatan`, `status`, `semester`) VALUES
('FAHREL GIBRAN ALGANI', '24060120120001', 'fahrelgibran@gmail.com', 'Khadijah, S.Kom, M.Cs', '081282538854', 'Jl. Kumalasari I No. 100, Tangerang Selatan', 'BANTEN', 'KOTA TANGERANG SELATAN', 2019, 'AKTIF', 7),
('JASON ALHILAL SABDA DEWA', '24060120120002', 'jesdew@gmail.com', 'Dr. Eng. Adi Wibowo, S.Si, M.Kom', '0857871465250', 'Jl. Minggu Hari Libur, Kupang', 'NUSA TENGGARA TIMUR', 'KOTA KUPANG', 2017, 'LULUS', 9),
('NADIATUS SALAM', '24060120120006', 'nadiatus@gmail.com', 'Dr. Aris Puji Widodo, S.Si, M.T', '081267735248', 'Jl. Kimono Sari, Palembang', 'SUMATERA SELATAN', 'KOTA PALEMBANG', 2018, 'LULUS', 9),
('NIKOLAS WIDAD', '24060120120009', 'nikol@gmail.com', 'Khadijah, S.Kom, M.Cs', '087896780245', 'Jl. Tengah Tenggara, Malang', 'JAWA TIMUR', 'KOTA MALANG', 2021, 'AKTIF', 3),
('ALISYA RAHMA SAFITRA', '24060120120025', 'alisya@gmail.com', 'Khadijah, S.Kom, M.Cs', '081248358357', 'Jl. Cahaya Rasa, Semarang', 'JAWA TENGAH', 'KOTA SEMARANG', 2018, 'LULUS', 9),
('FARID REZA NURHUDA', '24060120120039', 'jay@gmail.com', 'Satriyo Adhy, S.Si, M.T', '087854787745', 'Jl. Utara Maju, Malang', 'JAWA TIMUR', 'KOTA MALANG', 2021, 'AKTIF', 3),
('PUTRA PETANG', '24060120120120', 'petang@gmail.com', 'Dr. Eng. Adi Wibowo, S.Si, M.Kom', '085689466354', 'Jl. Maju Mundur, Manokwari', 'PAPUA BARAT', 'KOTA MANOKWARI', 2017, 'MENINGGAL DUNIA', 9),
('I MADE KRESNA ARYA WIGUNA', '24060120130002', 'madekres@gmail.com', 'Satriyo Adhy, S.Si, M.T', '0878670425271', 'Jl. Pintu Kayu, Bandung', 'JAWA BARAT', 'BANDUNG', 2017, 'LULUS', 9),
('CHANDRA NUGARAHANINDITO', '24060120130008', 'chandradito@gmail.com', 'Panji Wisnu Wirawan, S.T., M.T.', '0813763923683', 'Jl. Kuning Sejati, Wonogiri', 'JAWA TENGAH', 'KABUPATEN WONOGIRI', 2022, 'CUTI', 1),
('SALMA NORA RENADA', '24060120130026', 'renada@gmail.com', 'Dr. Aris Puji Widodo, S.Si, M.T', '085667839243', 'Jl. Anggrek', 'DKI JAKARTA', 'JAKARTA', 2018, 'LULUS', 9),
('FELLIA GESSANGIE YOHANSHAH PUTERI', '24060120130047', 'fellia@gmail.com', 'Beta Noranita, S.Si, M.Kom', '085853378354', 'Jl. Cibinong Indah 2, Bogor', 'JAWA BARAT', 'KABUPATEN BOGOR', 2019, 'AKTIF', 7),
('AULIA CHAIRUNISA PUTRI', '24060120130050', 'auliacp@gmail.com', 'Dr. Retno Kusumaningrum, S.Si, M.Kom', '085852378545', 'Jl. Miilo, Demak', 'JAWA TENGAH', 'KOTA DEMAK', 2019, 'CUTI', 7),
('MUHAMMAD FIKRI ALFAQIH', '24060120130078', 'fikrialfaqih@gmail.com', 'Satriyo Adhy, S.Si, M.T', '081231896547', 'Jl. Sidomuncul Indah, Jakarta Selatan', 'DKI JAKARTA', 'KOTA JAKARTA SELATAN', 2021, 'AKTIF', 3),
('RATU AUBREY KHAIRANI', '24060120130124', 'ratuaubrey@gmail.com', 'Khadijah, S.Kom, M.Cs', '081354544844', 'Jl. Kalimalang, Jakarta', 'DKI JAKARTA', 'KOTA JAKARTA TIMUR', 2020, 'MANGKIR', 5),
('TOBIAS MARTIN SUENA', '24060120140040', 'tobiasmartin05@gmail.com', 'Khadijah, S.Kom, M.Cs', '081909338354', 'Jl. Rasamala B2/17. Perumahan Beringin Indah. Ngaliyan', 'JAWA TENGAH', 'KOTA SEMARANG', 2020, 'UNDUR DIRI', 5),
('FARID REZA NURHUDA', '24060120140080', 'rezajay@gmail.com', 'Dr. Retno Kusumaningrum, S.Si, M.Kom', '085753372634', 'Jl. Tambun Raya, Bekasi', 'JAWA BARAT', 'KABUPATEN BEKASI', 2019, 'MANGKIR', 7),
('GARRY YEHOSYAFAT', '24060120140115', 'garry@gmail.com', 'Dr. Aris Puji Widodo, S.Si, M.T', '081316179629', 'Jl. Duta Indah, Bekasi', 'JAWA BARAT', 'KOTA BEKASI', 2020, 'DO', 5),
('SULTAN JODI PERWIRA', '24060120140123', 'jodiperwira@gmail.com', 'Beta Noranita, S.Si, M.Kom', '081909988154', 'Jl. Andaperada 1 No. 5, Malang', 'JAWA TIMUR', 'KOTA MALANG', 2022, 'UNDUR DIRI', 1),
('HASNA PARAMESTI AHMAD', '24060120140130', 'hasnaprmst@gmail.com', 'Khadijah, S.Kom, M.Cs', '085784044137', 'Jl. Harapan, Jakarta', 'DKI JAKARTA', 'KOTA JAKARTA TIMUR', 2020, 'AKTIF', 5),
('ANDIRA FAQIH MUHAMMAD', '24060120140142', 'andirafaqih@gmail.com', 'Satriyo Adhy, S.Si, M.T', '081909338175', 'Jl. Melati III, Semarang', 'JAWA TENGAH', 'KOTA SEMARANG', 2022, 'CUTI', 1),
('FARAH TISTI PARANPARA', '24060120140145', 'fartisfr@gmail.com', 'Satriyo Adhy, S.Si, M.T', '085888612115', 'Jl. Siliwangi Raya No. 81, Bekasi', 'JAWA BARAT', 'KOTA BEKASI', 2020, 'AKTIF', 5),
('TASKIA ROROINTAN SUGYANTI', '24060120140152', 'taskiaintan@gmail.com', 'Beta Noranita, S.Si, M.Kom', '081309734390', 'Jl. Timoho Timur III, Tangerang Selatan', 'BANTEN', 'KOTA TANGERANG SELATAN', 2018, 'LULUS', 9),
('ILMA DZAKIAH MULIA', '24060120140153', 'ilmadzakiah@gmail.com', 'Satriyo Adhy, S.Si, M.T', '0816787988683', 'Jl. Pasar Senen, Jakarta Selatan', 'DKI JAKARTA', 'KOTA JAKARTA SELATAN', 2022, 'AKTIF', 1),
('ANISATUL MARIFAH', '24060120140154', 'anisatul@gmail.com', 'Dinar Mutiara K N, S.T., M.InfoTech.(Comp)., Ph.D.', '085725447454', 'Jl. Pelita Hati, Jepara', 'JAWA TENGAH', 'KOTA JEPARA', 2020, 'AKTIF', 5),
('MUHAMMAD RIFQI ZAIDAN', '24060120140160', 'rifqizaidan@gmail.com', 'Khadijah, S.Kom, M.Cs', '085889368378', 'Jl. Kusna Harapan Jaya, Pontianak', 'SULAWESI BARAT', 'KOTA PONTIANAK', 2017, 'AKTIF', 11),
('WILDAN KAMAL ALLAM', '24060120140165', 'wildankamal@gmail.com', 'Panji Wisnu Wirawan, S.T., M.T.', '081987988523', 'Jl. Bisa Mulia, Surabaya', 'JAWA TIMUR', 'KOTA SURABAYA', 2022, 'DO', 0),
('ABYAN ARDIATAMA', '24060120140167', 'abyan@gmail.com', 'Dr. Eng. Adi Wibowo, S.Si, M.Kom', '085682190809', 'Jl. Simatupang TB, Semarang', 'JAWA TENGAH', 'KOTA SEMARANG', 2021, 'AKTIF', 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_operator`
--

CREATE TABLE `data_operator` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_operator`
--

INSERT INTO `data_operator` (`nip`, `nama`) VALUES
('1234567890', 'operator1');

-- --------------------------------------------------------

--
-- Table structure for table `irs`
--

CREATE TABLE `irs` (
  `nim` varchar(20) NOT NULL,
  `semester_irs` int(5) NOT NULL,
  `jumlah_sks` int(5) NOT NULL,
  `upload_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `irs`
--

INSERT INTO `irs` (`nim`, `semester_irs`, `jumlah_sks`, `upload_file`) VALUES
('24060120130002', 1, 22, 'Rundown Futsal Positif.pdf'),
('24060120130002', 2, 22, 'Desain Plakat Seminar Anforcom 2022.pdf'),
('24060120130002', 3, 21, 'Desain Plakat Seminar Anforcom 2022.pdf'),
('24060120130002', 4, 24, 'Rundown Futsal Positif.pdf'),
('24060120130002', 5, 22, 'Rundown Futsal Positif.pdf'),
('24060120130002', 6, 23, 'Rundown Futsal Positif.pdf'),
('24060120130002', 7, 20, 'Rundown Futsal Positif.pdf'),
('24060120130002', 8, 18, 'Rundown Futsal Positif.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `nim` varchar(20) NOT NULL,
  `semester_khs` int(5) NOT NULL,
  `jumlah_sks` int(5) NOT NULL,
  `nilai_ip` decimal(3,2) NOT NULL,
  `upload_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`nim`, `semester_khs`, `jumlah_sks`, `nilai_ip`, `upload_file`) VALUES
('24060120130002', 1, 22, '3.50', 'Rundown Futsal Positif.pdf'),
('24060120130002', 2, 22, '3.80', 'Desain Plakat Seminar Anforcom 2022.pdf'),
('24060120130002', 3, 21, '3.00', 'Desain Plakat Seminar Anforcom 2022.pdf'),
('24060120130002', 4, 24, '3.90', 'Rundown Futsal Positif.pdf'),
('24060120130002', 5, 22, '3.80', 'Rundown Futsal Positif.pdf'),
('24060120130002', 6, 23, '3.70', 'Desain Plakat Seminar Anforcom 2022.pdf'),
('24060120130002', 7, 20, '3.90', 'Desain Plakat Seminar Anforcom 2022.pdf'),
('24060120130002', 8, 18, '3.80', 'Rundown Futsal Positif.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pkl`
--

CREATE TABLE `pkl` (
  `nim` varchar(15) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `status_pkl` varchar(20) NOT NULL,
  `nilai` varchar(3) NOT NULL,
  `upload_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pkl`
--

INSERT INTO `pkl` (`nim`, `angkatan`, `status_pkl`, `nilai`, `upload_file`) VALUES
('24060120120001', '2019', 'Lulus', 'A', ''),
('24060120120002', '2017', 'Lulus', 'A', ''),
('24060120120006', '2018', 'Lulus', 'A', ''),
('24060120120009', '2021', 'Belum Mengambil', ' ', ''),
('24060120120025', '2018', 'Lulus', 'B', ''),
('24060120120039', '2021', 'Belum Mengambil', '', ''),
('24060120120120', '2017', 'Lulus', 'C', ''),
('24060120130124', '2020', '', '', ''),
('24060120130002', '2017', 'Lulus', 'A', '24060120130002_PKL.pdf'),
('24060120130008', '2022', 'Belum Mengambil', '', ''),
('24060120130026', '2018', 'Lulus', 'B', ''),
('24060120130047', '2019', 'Lulus', 'A', ''),
('24060120130050', '2019', 'Lulus', 'B', ''),
('24060120130078', '2021', 'Belum Mengambil', '', ''),
('24060120140040', '2020', '', '', ''),
('24060120140080', '2019', 'Tidak Lulus', 'E', ''),
('24060120140115', '2020', '', '', ''),
('24060120140115', '2022', '', '', ''),
('24060120140130', '2020', 'Belum Mengambil', '', ''),
('24060120140142', '2022', 'Belum Mengambil', '', ''),
('24060120140145', '2020', 'Belum Mengambil', '', ''),
('24060120140152', '2018', 'Lulus', 'B', ''),
('24060120140153', '2022', 'Belum Mengambil', '', ''),
('24060120140154', '2020', 'Belum Mengambil', '', ''),
('24060120140160', '2017', 'Lulus', 'B', ''),
('24060120140167', '2021', 'Belum Mengambil', '', ''),
('24060120140165', '2022', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `nim` varchar(15) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `status_skripsi` varchar(15) NOT NULL,
  `nilai` varchar(3) NOT NULL,
  `lama_studi` varchar(2) NOT NULL,
  `tanggal_sidang` date NOT NULL,
  `upload_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`nim`, `angkatan`, `status_skripsi`, `nilai`, `lama_studi`, `tanggal_sidang`, `upload_file`) VALUES
('24060120120001', '2019', '', '', '', '0000-00-00', ''),
('24060120120002', '2017', 'Lulus', 'A', '8', '2022-09-01', ''),
('24060120120006', '2018', 'Lulus', 'A', '7', '2022-10-06', ''),
('24060120120009', '2021', '', '', '', '0000-00-00', ''),
('24060120120025', '2018', 'Lulus', 'A', '7', '2022-09-29', ''),
('24060120120039', '2021', '', '', '', '0000-00-00', ''),
('24060120120120', '2017', 'Tidak Lulus', 'E', '8', '2021-09-02', ''),
('24060120130124', '2020', '', '', '', '0000-00-00', ''),
('24060120130002', '2017', 'Lulus', 'A', '8', '2022-10-13', '24060120130002_Skripsi.pdf'),
('24060120130008', '2022', '', '', '', '0000-00-00', ''),
('24060120130026', '2018', 'Lulus', 'A', '7', '2022-09-30', ''),
('24060120130047', '2019', '', '', '', '0000-00-00', ''),
('24060120130050', '2019', '', '', '', '0000-00-00', ''),
('24060120130078', '2021', '', '', '', '0000-00-00', ''),
('24060120140040', '2020', '', '', '', '0000-00-00', ''),
('24060120140080', '2019', '', '', '', '0000-00-00', ''),
('24060120140115', '2020', '', '', '', '0000-00-00', ''),
('24060120140115', '2022', '', '', '', '0000-00-00', ''),
('24060120140130', '2020', '', '', '', '0000-00-00', ''),
('24060120140142', '2022', '', '', '', '0000-00-00', ''),
('24060120140145', '2020', '', '', '', '0000-00-00', ''),
('24060120140152', '2018', 'Lulus', 'A', '7', '2022-10-14', ''),
('24060120140153', '2022', '', '', '', '0000-00-00', ''),
('24060120140154', '2020', '', '', '', '0000-00-00', ''),
('24060120140160', '2017', '', '', '', '0000-00-00', ''),
('24060120140167', '2021', '', '', '', '0000-00-00', ''),
('24060120140165', '2022', '', '', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip_nim` varchar(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip_nim`, `email`, `password`, `status`) VALUES
('24060120120001', 'fahrelgibran@gmail.com', '1234', 'mahasiswa'),
('24060120120002', 'jesdew@gmail.com', '1234', 'mahasiswa'),
('24060120120006', 'nadiatus@gmail.com', '1234', 'mahasiswa'),
('24060120120009', 'nikol@gmail.com', '1234', 'mahasiswa'),
('24060120120025', 'alisya@gmail.com', '1234', 'mahasiswa'),
('24060120120039', 'jay@gmail.com', '1234', 'mahasiswa'),
('24060120120120', 'petang@gmail.com', '1234', 'mahasiswa'),
('24060120130124', 'ratuaubrey@gmail.com', '1234', 'mahasiswa'),
('24060120130002', 'madekres@gmail.com', '1234', 'mahasiswa'),
('24060120130008', 'chandradito@gmail.com', '1234', 'mahasiswa'),
('24060120130026', 'renada@gmail.com', '1234', 'mahasiswa'),
('24060120130047', 'feliia@gmail.com', '1234', 'mahasiswa'),
('24060120130050', 'auliacp@gmail.com', '1234', 'mahasiswa'),
('24060120130078', 'fikrialfaqih@gmail.com', '1234', 'mahasiswa'),
('24060120140040', 'tobiasmartin05@gmail.com', '1234', 'mahasiswa'),
('24060120140080', 'rezajay@gmail.com', '1234', 'mahasiswa'),
('24060120140115', 'garry@gmail.com', '1234', 'mahasiswa'),
('24060120140115', 'jodiperwira@gmail.com', '1234', 'mahasiswa'),
('24060120140130', 'hasnaprmst@gmail.com', '1234', 'mahasiswa'),
('24060120140142', 'andirafaqih@gmail.com', '1234', 'mahasiswa'),
('24060120140145', 'fartisfr@gmail.com', '1234', 'mahasiswa'),
('24060120140152', 'taskiaintan@gmail.com', '1234', 'mahasiswa'),
('24060120140153', 'ilmadzakiah@gmail.com', '1234', 'mahasiswa'),
('24060120140154', 'anisatul@gmail.com', '1234', 'mahasiswa'),
('24060120140160', 'rifqizaidan@gmail.com', '1234', 'mahasiswa'),
('196511071992031003', '', '5678', 'dosen'),
('197007051997021001', '', '5678', 'dosen'),
('197108111997021004', '', '5678', 'dosen'),
('197308291998022001', '', '5678', 'dosen'),
('197404011999031002', '', '5678', 'dosen'),
('197601102009122002', '', '5678', 'dosen'),
('197805022005012002', '', '5678', 'dosen'),
('197805162003121001', '', '5678', 'dosen'),
('197902122008121002', '', '5678', 'dosen'),
('197905242009121003', '', '5678', 'dosen'),
('197907202003121002', '', '5678', 'dosen'),
('198009142006041002', '', '5678', 'dosen'),
('198010212005011003', '', '5678', 'dosen'),
('198104202005012001', '', '5678', 'dosen'),
('198104212008121002', '', '5678', 'dosen'),
('198106202015041002', '', '5678', 'dosen'),
('198203092006041002', '', '5678', 'dosen'),
('198302032006041002', '', '5678', 'dosen'),
('198404112019031009', '', '5678', 'dosen'),
('198511252018032001', '', '5678', 'dosen'),
('198803222020121010', '', '5678', 'dosen'),
('198903032015042002', '', '5678', 'dosen'),
('199112092022041011', '', '5678', 'dosen'),
('1234567890', '', '5678', 'operator'),
('0987654321', '', '5678', 'departemen'),
('24060120140165', 'wildankamal@gmail.com', '1234', 'mahasiswa'),
('24060120140167', 'abyan@gmail.com', '1234', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi`
--

CREATE TABLE `verifikasi` (
  `nim` varchar(20) NOT NULL,
  `status_verifikasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifikasi`
--

INSERT INTO `verifikasi` (`nim`, `status_verifikasi`) VALUES
('24060120120001', 'Verified '),
('24060120140130', 'Verified '),
('24060120120006', 'Unverified'),
('24060120120009', 'Verified '),
('24060120120025', 'Unverified'),
('24060120120039', 'Unverified'),
('24060120120120', 'Unverified'),
('24060120130002', 'Verified '),
('24060120130008', 'Unverified'),
('24060120130026', 'Unverified'),
('24060120130047', 'Unverified'),
('24060120130050', 'Unverified'),
('24060120130078', 'Unverified'),
('24060120130124', 'Unverified'),
('24060120140040', 'Unverified'),
('24060120140080', 'Unverified'),
('24060120140115', 'Unverified'),
('24060120140123', 'Unverified'),
('24060120140142', 'Unverified'),
('24060120140145', 'Unverified'),
('24060120140152', 'Unverified'),
('24060120140153', 'Unverified'),
('24060120140154', 'Unverified'),
('24060120140160', 'Unverified'),
('24060120140165', 'Unverified'),
('24060120140167', 'Unverified'),
('24060120120002', 'Unverified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dosen`
--
ALTER TABLE `data_dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
