-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2020 pada 03.32
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_course`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chapter_course`
--

CREATE TABLE `chapter_course` (
  `id_chapter` int(11) NOT NULL,
  `no_chapter` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `src_pdf` varchar(128) DEFAULT NULL,
  `src_video` varchar(128) DEFAULT NULL,
  `id_course` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chapter_course`
--

INSERT INTO `chapter_course` (`id_chapter`, `no_chapter`, `deskripsi`, `src_pdf`, `src_video`, `id_course`) VALUES
(1, 1, 'Algoritma adalah langkah-langkah yang disusun secara tertulis dan berurutan untuk menyelesaikan suatu masalah. Sedangkan Algoritma Pemrograman adalah langkah-langkah yang ditulis secara berurutan untuk menyelesaikan masalah pemrograman komputer. Dalam pemrograman yang sederhana, algoritma merupakan langkah pertama yang harus ditulis sebelum menuliskan program. Masalah yang dapat diselesaikan dengan pemrograman komputer adalah masalah-masalah yang berhubungan dengan perhitungan matematik. Hal yang penting dikuasai dalam pemrograman adalah logika berpikir bagaimana cara memecahkan masalah pemrograman yang akan dibuat', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 4),
(2, 2, 'Algoritma adalah langkah-langkah yang disusun secara tertulis dan berurutan untuk menyelesaikan suatu masalah. Sedangkan Algoritma Pemrograman adalah langkah-langkah yang ditulis secara berurutan untuk menyelesaikan masalah pemrograman komputer. Dalam pemrograman yang sederhana, algoritma merupakan langkah pertama yang harus ditulis sebelum menuliskan program. Masalah yang dapat diselesaikan dengan pemrograman komputer adalah masalah-masalah yang berhubungan dengan perhitungan matematik. Hal yang penting dikuasai dalam pemrograman adalah logika berpikir bagaimana cara memecahkan masalah pemrograman yang akan dibuat', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 4),
(3, 3, 'Algoritma adalah langkah-langkah yang disusun secara tertulis dan berurutan untuk menyelesaikan suatu masalah. Sedangkan Algoritma Pemrograman adalah langkah-langkah yang ditulis secara berurutan untuk menyelesaikan masalah pemrograman komputer. Dalam pemrograman yang sederhana, algoritma merupakan langkah pertama yang harus ditulis sebelum menuliskan program. Masalah yang dapat diselesaikan dengan pemrograman komputer adalah masalah-masalah yang berhubungan dengan perhitungan matematik. Hal yang penting dikuasai dalam pemrograman adalah logika berpikir bagaimana cara memecahkan masalah pemrograman yang akan dibuat', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 4),
(4, 4, 'Algoritma adalah langkah-langkah yang disusun secara tertulis dan berurutan untuk menyelesaikan suatu masalah. Sedangkan Algoritma Pemrograman adalah langkah-langkah yang ditulis secara berurutan untuk menyelesaikan masalah pemrograman komputer. Dalam pemrograman yang sederhana, algoritma merupakan langkah pertama yang harus ditulis sebelum menuliskan program. Masalah yang dapat diselesaikan dengan pemrograman komputer adalah masalah-masalah yang berhubungan dengan perhitungan matematik. Hal yang penting dikuasai dalam pemrograman adalah logika berpikir bagaimana cara memecahkan masalah pemrograman yang akan dibuat', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 4),
(5, 5, 'Algoritma adalah langkah-langkah yang disusun secara tertulis dan berurutan untuk menyelesaikan suatu masalah. Sedangkan Algoritma Pemrograman adalah langkah-langkah yang ditulis secara berurutan untuk menyelesaikan masalah pemrograman komputer. Dalam pemrograman yang sederhana, algoritma merupakan langkah pertama yang harus ditulis sebelum menuliskan program. Masalah yang dapat diselesaikan dengan pemrograman komputer adalah masalah-masalah yang berhubungan dengan perhitungan matematik. Hal yang penting dikuasai dalam pemrograman adalah logika berpikir bagaimana cara memecahkan masalah pemrograman yang akan dibuat', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 4),
(6, 1, 'Algoritma adalah langkah-langkah yang disusun secara tertulis dan berurutan untuk menyelesaikan suatu masalah. Sedangkan Algoritma Pemrograman adalah langkah-langkah yang ditulis secara berurutan untuk menyelesaikan masalah pemrograman komputer. Dalam pemrograman yang sederhana, algoritma merupakan langkah pertama yang harus ditulis sebelum menuliskan program. Masalah yang dapat diselesaikan dengan pemrograman komputer adalah masalah-masalah yang berhubungan dengan perhitungan matematik. Hal yang penting dikuasai dalam pemrograman adalah logika berpikir bagaimana cara memecahkan masalah pemrograman yang akan dibuat', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 3),
(7, 2, 'Algoritma adalah langkah-langkah yang disusun secara tertulis dan berurutan untuk menyelesaikan suatu masalah. Sedangkan Algoritma Pemrograman adalah langkah-langkah yang ditulis secara berurutan untuk menyelesaikan masalah pemrograman komputer. Dalam pemrograman yang sederhana, algoritma merupakan langkah pertama yang harus ditulis sebelum menuliskan program. Masalah yang dapat diselesaikan dengan pemrograman komputer adalah masalah-masalah yang berhubungan dengan perhitungan matematik. Hal yang penting dikuasai dalam pemrograman adalah logika berpikir bagaimana cara memecahkan masalah pemrograman yang akan dibuat', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 3),
(8, 3, 'Python adalah salah satu bahasa pemrograman yang dapat melakukan eksekusi sejumlah instruksi multi guna secara langsung (interpretatif) dengan metode orientasi objek (Object Oriented Programming) serta menggunakan semantik dinamis untuk memberikan tingkat keterbacaan syntax. Sebagian lain mengartikan Python sebagai bahasa yang kemampuan, menggabungkan kapabilitas, dan sintaksis kode yang sangat jelas, dan juga dilengkapi dengan fungsionalitas pustaka standar yang besar serta komprehensif.', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 3),
(9, 4, 'Python adalah salah satu bahasa pemrograman yang dapat melakukan eksekusi sejumlah instruksi multi guna secara langsung (interpretatif) dengan metode orientasi objek (Object Oriented Programming) serta menggunakan semantik dinamis untuk memberikan tingkat keterbacaan syntax. Sebagian lain mengartikan Python sebagai bahasa yang kemampuan, menggabungkan kapabilitas, dan sintaksis kode yang sangat jelas, dan juga dilengkapi dengan fungsionalitas pustaka standar yang besar serta komprehensif.', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 3),
(10, 5, 'Python adalah salah satu bahasa pemrograman yang dapat melakukan eksekusi sejumlah instruksi multi guna secara langsung (interpretatif) dengan metode orientasi objek (Object Oriented Programming) serta menggunakan semantik dinamis untuk memberikan tingkat keterbacaan syntax. Sebagian lain mengartikan Python sebagai bahasa yang kemampuan, menggabungkan kapabilitas, dan sintaksis kode yang sangat jelas, dan juga dilengkapi dengan fungsionalitas pustaka standar yang besar serta komprehensif.', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 3),
(11, 1, 'Python adalah salah satu bahasa pemrograman yang dapat melakukan eksekusi sejumlah instruksi multi guna secara langsung (interpretatif) dengan metode orientasi objek (Object Oriented Programming) serta menggunakan semantik dinamis untuk memberikan tingkat keterbacaan syntax. Sebagian lain mengartikan Python sebagai bahasa yang kemampuan, menggabungkan kapabilitas, dan sintaksis kode yang sangat jelas, dan juga dilengkapi dengan fungsionalitas pustaka standar yang besar serta komprehensif.', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 2),
(12, 2, 'Python adalah salah satu bahasa pemrograman yang dapat melakukan eksekusi sejumlah instruksi multi guna secara langsung (interpretatif) dengan metode orientasi objek (Object Oriented Programming) serta menggunakan semantik dinamis untuk memberikan tingkat keterbacaan syntax. Sebagian lain mengartikan Python sebagai bahasa yang kemampuan, menggabungkan kapabilitas, dan sintaksis kode yang sangat jelas, dan juga dilengkapi dengan fungsionalitas pustaka standar yang besar serta komprehensif.', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 2),
(13, 3, 'Python adalah salah satu bahasa pemrograman yang dapat melakukan eksekusi sejumlah instruksi multi guna secara langsung (interpretatif) dengan metode orientasi objek (Object Oriented Programming) serta menggunakan semantik dinamis untuk memberikan tingkat keterbacaan syntax. Sebagian lain mengartikan Python sebagai bahasa yang kemampuan, menggabungkan kapabilitas, dan sintaksis kode yang sangat jelas, dan juga dilengkapi dengan fungsionalitas pustaka standar yang besar serta komprehensif.', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 2),
(14, 1, 'Python adalah salah satu bahasa pemrograman yang dapat melakukan eksekusi sejumlah instruksi multi guna secara langsung (interpretatif) dengan metode orientasi objek (Object Oriented Programming) serta menggunakan semantik dinamis untuk memberikan tingkat keterbacaan syntax. Sebagian lain mengartikan Python sebagai bahasa yang kemampuan, menggabungkan kapabilitas, dan sintaksis kode yang sangat jelas, dan juga dilengkapi dengan fungsionalitas pustaka standar yang besar serta komprehensif.', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 1),
(15, 2, 'Python adalah salah satu bahasa pemrograman yang dapat melakukan eksekusi sejumlah instruksi multi guna secara langsung (interpretatif) dengan metode orientasi objek (Object Oriented Programming) serta menggunakan semantik dinamis untuk memberikan tingkat keterbacaan syntax. Sebagian lain mengartikan Python sebagai bahasa yang kemampuan, menggabungkan kapabilitas, dan sintaksis kode yang sangat jelas, dan juga dilengkapi dengan fungsionalitas pustaka standar yang besar serta komprehensif.', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 1),
(16, 3, 'Python adalah salah satu bahasa pemrograman yang dapat melakukan eksekusi sejumlah instruksi multi guna secara langsung (interpretatif) dengan metode orientasi objek (Object Oriented Programming) serta menggunakan semantik dinamis untuk memberikan tingkat keterbacaan syntax. Sebagian lain mengartikan Python sebagai bahasa yang kemampuan, menggabungkan kapabilitas, dan sintaksis kode yang sangat jelas, dan juga dilengkapi dengan fungsionalitas pustaka standar yang besar serta komprehensif.', 'https://drive.google.com/file/d/1iAYA08ijM40rRF5qfv4Ayvh4FvrN3xgN/preview', 'https://www.youtube.com/embed/gLH_IJvuIJk', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `topik` varchar(128) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kelas_level` enum('free','premium') DEFAULT NULL,
  `src_img` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `course`
--

INSERT INTO `course` (`id_course`, `topik`, `deskripsi`, `kelas_level`, `src_img`) VALUES
(1, 'Python Part 2', 'Python adalah salah satu bahasa pemrograman yang dapat melakukan eksekusi sejumlah instruksi multi guna secara langsung (interpretatif) dengan metode orientasi objek (Object Oriented Programming) serta menggunakan semantik dinamis untuk memberikan tingkat keterbacaan syntax. Sebagian lain mengartikan Python sebagai bahasa yang kemampuan, menggabungkan kapabilitas, dan sintaksis kode yang sangat jelas, dan juga dilengkapi dengan fungsionalitas pustaka standar yang besar serta komprehensif.', 'premium', 'ilustrasi-home.png'),
(2, 'Python Part 1', 'Python adalah salah satu bahasa pemrograman yang dapat melakukan eksekusi sejumlah instruksi multi guna secara langsung (interpretatif) dengan metode orientasi objek (Object Oriented Programming) serta menggunakan semantik dinamis untuk memberikan tingkat keterbacaan syntax. Sebagian lain mengartikan Python sebagai bahasa yang kemampuan, menggabungkan kapabilitas, dan sintaksis kode yang sangat jelas, dan juga dilengkapi dengan fungsionalitas pustaka standar yang besar serta komprehensif.', 'premium', 'ilustrasi-home.png'),
(3, 'Algoritma dan Pemrograman ', 'Algoritma adalah langkah-langkah yang disusun secara tertulis dan berurutan untuk menyelesaikan suatu masalah.  Sedangkan Algoritma Pemrograman adalah langkah-langkah yang ditulis secara berurutan untuk menyelesaikan masalah pemrograman komputer.\r\n\r\nDalam pemrograman yang sederhana, algoritma merupakan langkah pertama yang harus ditulis sebelum menuliskan program. Masalah yang dapat diselesaikan dengan pemrograman komputer adalah masalah-masalah yang berhubungan dengan perhitungan matematik.\r\n\r\nHal yang penting dikuasai dalam pemrograman adalah logika berpikir bagaimana cara memecahkan masalah pemrograman yang akan dibuat.', 'premium', 'ilustrasi-home.png'),
(4, 'Algoritma dan Pemrograman ', 'Algoritma adalah langkah-langkah yang disusun secara tertulis dan berurutan untuk menyelesaikan suatu masalah.  Sedangkan Algoritma Pemrograman adalah langkah-langkah yang ditulis secara berurutan untuk menyelesaikan masalah pemrograman komputer.\r\n\r\nDalam pemrograman yang sederhana, algoritma merupakan langkah pertama yang harus ditulis sebelum menuliskan program. Masalah yang dapat diselesaikan dengan pemrograman komputer adalah masalah-masalah yang berhubungan dengan perhitungan matematik.\r\n\r\nHal yang penting dikuasai dalam pemrograman adalah logika berpikir bagaimana cara memecahkan masalah pemrograman yang akan dibuat.', 'free', 'ilustrasi-home.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_user`
--

CREATE TABLE `course_user` (
  `id_course_user` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_course` int(11) DEFAULT NULL,
  `lulus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `course_user`
--

INSERT INTO `course_user` (`id_course_user`, `id_users`, `id_course`, `lulus`) VALUES
(1, 1, 4, NULL),
(2, 1, 3, 1),
(3, 2, 4, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `langganan`
--

CREATE TABLE `langganan` (
  `id_langganan` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `langganan`
--

INSERT INTO `langganan` (`id_langganan`, `start_date`, `end_date`, `id_users`) VALUES
(1, '2020-12-18', '2021-02-16', 1),
(2, '2020-12-19', '2021-02-17', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress_user`
--

CREATE TABLE `progress_user` (
  `id_progress_user` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `id_course_user` int(11) DEFAULT NULL,
  `id_chapter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `progress_user`
--

INSERT INTO `progress_user` (`id_progress_user`, `status`, `id_course_user`, `id_chapter`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 0, 1, 4),
(5, 0, 1, 5),
(6, 0, 2, 6),
(7, 0, 2, 7),
(8, 0, 2, 8),
(9, 0, 2, 9),
(10, 0, 2, 10),
(11, 0, 3, 1),
(12, 0, 3, 2),
(13, 0, 3, 3),
(14, 0, 3, 4),
(15, 0, 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `choiceA` text DEFAULT NULL,
  `choiceB` text DEFAULT NULL,
  `choiceC` text DEFAULT NULL,
  `choiceD` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `id_course` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `question`
--

INSERT INTO `question` (`id_question`, `question`, `choiceA`, `choiceB`, `choiceC`, `choiceD`, `answer`, `id_course`) VALUES
(1, '1. Apa itu Python?', 'Jenis Ular', 'Bahasa Pemrograman', 'Bahasa Alien', 'Benar Semua', 'Bahasa Pemrograman', 1),
(2, '2. Sisi utama yang membedakan Python dengan bahasa lain adalah...', 'Aturan penulisan kode program', 'Aturan indentasi', 'Penanganan modul', 'Benar semua', 'Aturan indentasi', 1),
(3, '3. Fitur yang dimiliki Python adalah...', 'Memiliki library yang luas', 'Memiliki system pengelolaan memori otomatis', 'Berorientasi objek', 'Benar semua', 'Benar semua', 1),
(4, '4. Untuk membuat sebaris komentar pada Python menggunakan tanda', '{', '[', '#', '/*', '#', 1),
(5, '5. Yang bukan keyword (kata kunci dalam Python adalah', 'Lambda', 'Return', 'Elseif', 'Break', 'Elseif', 1),
(6, '6. Interpreter Python dapat memberitahu tipe data dari nilai yang dituliskan pada variabel, yaitu\r\ndengan menggunakn fungsi built-in ...', 'Def', 'Lambda', 'Pass', 'Type', 'Type', 1),
(7, '7. Perintah yang digunakan untuk membuat suatu fungsi dalam Python adalah...', 'Def', 'Lambda', 'a dan b benar', 'a dan b salah', 'Def', 1),
(8, '8.  Perintah perulangan pada Python menggunakan...', 'For, repeat until dan while', 'While dan for', 'while dan for do', 'For dan while do', 'For, repeat until dan while', 1),
(9, '9.  Kekurangan dari Python adalah...', 'Efisiensi dan fleksibilitas trade off tidak diberikan secara menyeluruh', 'Konstruksi pada saat aplikasi berjalan', 'Python bukan termasuk interpreter', 'Benar semua', 'Benar semua', 1),
(10, '10. Kelebihan dari Python adalah...', 'Adanya tahapan kompilasi sehingga kecepatan perubahan pembuatan system aplikasi meningkat', 'Diharuskan deklarasi tipe data', 'Manajemen memori manual', 'Salah semua', 'Salah semua', 1),
(11, '1. Apa itu Python?', 'Jenis Ular', 'Bahasa Pemrograman', 'Bahasa Alien', 'Benar Semua', 'Bahasa Pemrograman', 2),
(12, '2. Sisi utama yang membedakan Python dengan bahasa lain adalah...', 'Aturan penulisan kode program', 'Aturan indentasi', 'Penanganan modul', 'Benar semua', 'Aturan indentasi', 2),
(13, '3. Fitur yang dimiliki Python adalah...\r\n', 'Memiliki library yang luas ', 'Memiliki system pengelolaan memori otomatis  ', 'Berorientasi objek  ', 'Benar semua', 'Benar semua', 2),
(14, '4. Untuk membuat sebaris komentar pada Python menggunakan tanda\r\n', '{  ', '[ ', '#', '/*', '#', 2),
(15, '5. Yang bukan keyword (kata kunci dalam Python) adalah...\r\n ', 'Lambda  ', 'Return  ', 'Elseif', 'Break', 'Elseif', 2),
(16, '6. Interpreter Python dapat memberitahu tipe data dari nilai yang dituliskan pada variabel, yaitu dengan menggunakn fungsi built-in ...\r\n ', 'Def  ', 'Lambda ', 'Pass  ', 'Type', 'Type', 2),
(17, '7. Perintah yang digunakan untuk membuat suatu fungsi dalam Python adalah...\r\n', 'Def', 'Lambda ', 'a dan b benar  ', 'a dan b salah', 'Def', 2),
(18, '8. Perintah perulangan pada Python menggunakan...\r\n', 'For, repeat until dan while', 'While dan for  ', 'while dan for do  ', 'For dan while do', 'For, repeat until dan while', 2),
(19, '9. Kekurangan dari Python adalah...\r\n', 'Efisiensi dan fleksibilitas trade off tidak diberikan secara menyeluruh  ', 'Konstruksi pada saat aplikasi berjalan  ', 'Python bukan termasuk interpreter ', 'Benar semua', 'Benar semua', 2),
(20, '10. Kelebihan dari Python adalah..\r\n', 'Adanya tahapan kompilasi sehingga kecepatan perubahan pembuatan system aplikasi meningkat ', 'Diharuskan deklarasi tipe data   ', 'Manajemen memori manual ', 'Salah semua', 'Salah semua', 2),
(21, '1. Urutan langkah-langkah logis dalam menyelesaikan suatu masalah yang disusun secara sistematis dan logis disebut dengan:', 'Algoritma', 'Flowchart', 'Program', 'Programmer', 'Algoritma', 3),
(22, '2. Statemen Readln tanpa argumen berfungsi untuk... ', 'Menampilkan output', 'Membaca hasil program', 'Menunda eksekusi program sampai tombol enter ditekan', 'Jawaban A ,B dan C benar', 'Menunda eksekusi program sampai tombol enter ditekan', 3),
(23, '3. Unsur dari OOP (Object Oriented Programming) dimana sebuah object yang dapat diturunkan menjadi object yang baru dengan tidak menghilangkan sifat asli dari object tersebut adalah ', 'Program .Net', 'Encapsulation atau pemodelan', 'Polymorphism atau Polimorfisme', 'Inheritance atau penurunan', 'Inheritance atau penurunan', 3),
(24, '4. Berikut ini adalah beberapa kebutuhan komponen database pada borland delphi, kecuali:', 'Datadestination', 'AdoConnection', 'AdoTable', 'DBGrid', 'Datadestination', 3),
(25, '5. Untuk mengimplementasikan matriks dalam bahasa Pascal, dapat menggunakan data:', 'Record', 'Object', 'Array', 'Pointer', 'Array', 3),
(26, '6. Suatu kumpulan data item  yang masing-masing mempunyai jenis data berbeda, disebut dengan', 'Record', 'Pointer', 'Array', 'Function', 'Record', 3),
(27, '7. Bagian dari Jendela Delphi dimana merupakan kumpulan icon yang digunakan untuk merancang suatu aplikasi untuk membentuk sebuah aplikasi user interface, adalah :', 'Component Pallete', 'Form Designer', 'Object Inspector', 'Object Tree View', 'Component Pallete', 3),
(28, '8. Python memiliki mekanisme penciptaan class yang mirip dengan java ataupun c++. yang bukan merupakan perbedaan yang signifikan antara class pada python dengan c++ atau java adalah :', 'Semua anggota kelas bersifat publik', ' Atribut instance tidak perlu dideklarasikan', 'Anggota kelas dapat dijadikan sebagai private', 'Semua metode adalah metode instansi', 'Anggota kelas dapat dijadikan sebagai private', 3),
(29, '9. Suatu program terpisah dalam blok sendiri yang berfungsi sebagai subprogram disebut:', 'Block statemen', 'Fungsi', 'Prosedur', 'Looping', 'Prosedur', 3),
(30, '10. Untuk menggabungkan dua teks / string atau lebih pada Delphi digunakan simbol operator :', '^', '+', '$', '=', '+', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `first_name`, `last_name`, `phone_number`, `email`, `password`) VALUES
(1, 'Deva', 'Dimastawan', '081236392367', 'devadimastawan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Weda', 'Baskara', '081337239365', 'wedabaskara219@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `chapter_course`
--
ALTER TABLE `chapter_course`
  ADD PRIMARY KEY (`id_chapter`),
  ADD KEY `id_course` (`id_course`);

--
-- Indeks untuk tabel `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

--
-- Indeks untuk tabel `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id_course_user`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_course` (`id_course`);

--
-- Indeks untuk tabel `langganan`
--
ALTER TABLE `langganan`
  ADD PRIMARY KEY (`id_langganan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `progress_user`
--
ALTER TABLE `progress_user`
  ADD PRIMARY KEY (`id_progress_user`),
  ADD KEY `id_course_user` (`id_course_user`),
  ADD KEY `id_chapter` (`id_chapter`);

--
-- Indeks untuk tabel `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `id_course` (`id_course`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `chapter_course`
--
ALTER TABLE `chapter_course`
  MODIFY `id_chapter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id_course_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `langganan`
--
ALTER TABLE `langganan`
  MODIFY `id_langganan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `progress_user`
--
ALTER TABLE `progress_user`
  MODIFY `id_progress_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chapter_course`
--
ALTER TABLE `chapter_course`
  ADD CONSTRAINT `chapter_course_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_user_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `langganan`
--
ALTER TABLE `langganan`
  ADD CONSTRAINT `langganan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `progress_user`
--
ALTER TABLE `progress_user`
  ADD CONSTRAINT `progress_user_ibfk_1` FOREIGN KEY (`id_course_user`) REFERENCES `course_user` (`id_course_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_user_ibfk_2` FOREIGN KEY (`id_chapter`) REFERENCES `chapter_course` (`id_chapter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
