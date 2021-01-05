-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2020 pada 02.57
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int(11) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` char(23) NOT NULL,
  `tbl_status_id` int(6) UNSIGNED NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `token` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'user-default.jpg',
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `nama`, `nip`, `tbl_status_id`, `password`, `username`, `token`, `foto`, `is_active`, `created_at`, `update_at`) VALUES
(117, 'SMK Negeri 2 Nganjuk', '-', 0, '$2y$10$Ciu2L5GzrfgbB5WhUOtI3ezJp7sdwYVadtZ/OuCT1E.', 'smkn2nganjuk', 'U8K2E4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(118, 'Dra. Yatini, M.Si', '19650923 199412 2 002', 1, '$2y$10$O/cQWTkuf8ADlrI9DBJqc.ZPbntQaP1qQs000sRMdKt', 'yatini', 'K5H9J5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(119, 'Yun Suharni, S.Pd, M.Pd', '19620810 198703 2 012', 2, '$2y$10$hBrzqs59P3Cl7KENc82go.s8iMfvmCL6rW0LKSCHpf5', 'yunsuharni', 'Y4M2L8', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(120, 'Dra. Sumarsih, M.Pd', '19661015 199502 2 001', 2, '$2y$10$V4EsEM6RiaksGfoDeHdvXuDV441zESvZxrmQxMFZmve', 'sumarsih', 'P9R8C8', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(121, 'Dra. Sri Indini', '19630719 199512 2 001', 2, '$2y$10$QhdG/pJIM28Yl63R/Dq9/ugrx.DUdtygaJ3HoSB.0yx', 'sriindini', 'H5Y7G2', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(122, 'Dra. Sri Retno Wijayati', '19620601 198603 2 010', 2, '$2y$10$0FsvBYMUzHetLJalIRbQHuazlSEOB2dMuXYZoy5QXp4', 'sriretno', 'X1M8S1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(123, 'Drs. Moch. Hufron, MM', '19610221 198903 1 005', 2, '$2y$10$sLVg.aqPU0hhYySWyMfnuOB81WGtltB8JX/iuVj0TDw', 'mochhufron', 'Y7A4O5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(124, 'Dra. Susilo Yuniarti', '19630612 199403 2 005', 2, '$2y$10$D9f58QhIXNYnaddkTxsrOudSG0NidtLrkikavbO8dLH', 'susiloyuniarti', 'D7S8U8', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(125, 'Sugeng Widodo, S.Pd', '19650202 198903 1 013', 2, '$2y$10$NL8shA4TsHU6jBHNadU4BO7bcLokdzrhptWEm9rlA0M', 'sugengwidodo', 'X7H6W9', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(126, 'Nunik Karuniarini, S.Pd, M.Pd', '19640630 198903 2 008', 2, '$2y$10$0ZqQs9cz8UzNfVBhPD.OsOhOXAJ.HkGc7o5PqvH4EKP', 'nunikkaruniarini', 'N7X7Y7', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(127, 'Wijono, S.Pd', '19640703 198903 1 018', 2, '$2y$10$h6DoGjDqWDKS12yG.WefAOhWBKfbhdHqSMZPeYhC0gm', 'wijono', 'W6D9C3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(128, 'Yuli Astuti, S.Pd', '19640710 198903 2 013', 2, '$2y$10$kXO7cuhvPeX7NdQtQdTUQe53Wj/pXFtYKXJmLXPjRxy', 'yuliastuti', 'L7C9E1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(129, 'Sumardi, S.Pd', '19630507 198903 1 013', 2, '$2y$10$lJA5yma9oia1GSNTn/Qm2.5Yjo077S/UDZmU9mfkVBh', 'sumardi', 'H8E9Q5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(130, 'Dra. Istiara Marheny', '19660104 199512 2 003', 2, '$2y$10$y5QXe7rVIQ.gEjwm5vgpBOKellxS5dznrqSd56GRgRM', 'istiaramarheny', 'T8U7D9', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(131, 'Sundariyatin Qulbiyatun N, S.Pd', '19711225 200003 2 003', 2, '$2y$10$ELoOGYypjDzOOEVfrhhqpuozONQxhlCbSz9uEJppjsj', 'sundariyatin', 'V9X8W1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(132, 'Suharyati, S.Pd, M.M.Pd', '19700302 200003 2 004', 2, '$2y$10$BHzjIzWeCKO8Xr3Bl2.8QOL5nPf9PsUVdSjtcp/XDif', 'suharyatim', 'P8Y3W2', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(133, 'Heny Dwi Purwokanti, S.Pd, MM', '19670104 199003 2 010', 2, '$2y$10$.IKJ2UWolxNfwxMHbXja2eW5bCHft7W10EJQbK11wxC', 'henydwip', 'N9F7L6', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(134, 'Yudi Hermawan, SE, M.Pd', '19711227 199803 1 011', 2, '$2y$10$OJ99ZkjV75kgYFq0UULjzej/lpD9btgdwx3vtQx9jRp', 'yudihermawan', 'T5I8J4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(135, 'Dra. Sami Prastiwi, M.Pd', '19660314 199003 2 008', 2, '$2y$10$pAK4FY2NEmD9TXKPDzRnDuaYYprjAnrPVhmMYXovpvm', 'samiprastiwi', 'X5J3A6', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(136, 'Dra. Eny Suprapti', '19651014 199303 2 005', 2, '$2y$10$8xy4o4eokogbf5S4gw8APu/CCuNHY78siLW0uqa7W0S', 'enysuprapti', 'S8M5U5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(137, 'Setiyobudi, S.Pd', '19700110 200012 1 001', 2, '$2y$10$OMGJAhIBKUS7IxdERVzakuNYsQCt7AhqdldZ/2Em3HM', 'tiyobudi', 'C6Q8E3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(138, 'Sri Wahyuningsih, SE', '19770628 200312 2 009', 2, '$2y$10$me4VFoj0c7wwOXgXO6n5meqLgvKV3WtcEDikJkP3icW', 'sriwahyuningsih', 'X1V4N6', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(139, 'Tutik Sriwinarti, S.Pd, M.Pd', '19680402 200501 2 016', 2, '$2y$10$PgrPagiEn54rbtMol.VUV.ATJEt6CUD1d2oJ6vYa53Q', 'tutiksriwinarti', 'W7D7W3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(140, 'Endang Werdiningsih NR. S.Pd, M.Pd', '19660909 200701 2 013', 2, '$2y$10$ncY913sUEYdZghtmrohPbeeCTBD6o8SF1T25T.DZmn8', 'endangwerdi', 'N1H2A3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(141, 'Nurul Chusna Pujiastuti, S.Pd', '19691024 200801 2 009', 2, '$2y$10$.YI/32oZqcL.T5/rkwmN8O5p6dPvV8g315Dxh6BOYef', 'nurulchusna', 'M3L2T2', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(142, 'Dra. Dwi Kanthi Setyodewi', '19610806 200701 2 002', 2, '$2y$10$iQmSk/whYI9cp7DTdBPdPeqC9oC0BvK650JXZV1Ecx.', 'dwikanthi', 'S5U1O6', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(143, 'Joko Sugeng Nurcahyo, S.Pd', '19651101 200701 1 014', 2, '$2y$10$9ei4gcnFOu/davfEEEnVvu0J040/IURpQkz7AxF8vkb', 'jokosugeng', 'V7E4T3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(144, 'Wiwik Suryati, M.Pd', '19680820 200701 2 023', 2, '$2y$10$zBF3IgYWdy8/IeFxQe0sBu08F7sUEoknIslqs9/iGs1', 'wiwiksuryati', 'Q5A6I1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(145, 'Darsih, S.Pd', '19700212 200801 2 013', 2, '$2y$10$9oGaDxjaCx0y4uFz3h4Sn.V65LCIAQ5B.o5XzwWhFEm', 'darsih', 'J2X1V5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(146, 'Herlin Sumaryati, SE', '19740627 200801 2 005', 2, '$2y$10$NAJ91pPqqtffPlft2mX5pec/3Ur0mZvZHIz741JyDxf', 'herlinsumaryati', 'Q6I5T4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(147, 'Budi Neny Yunita, S.Pd', '19830101 200904 2 014', 2, '$2y$10$UlLZpSSm6twP2ZFDjrxUTOhlFuy09igU3OnOVOEoldw', 'budineny', 'W7L2C9', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(148, 'Eko Prasetiyo', '19671124 199503 1 005', 2, '$2y$10$Vc446e7UycYfeBi/9ox8ge/xrjgKJaqL8OUnZtMPK8g', 'ekoprasetiyo', 'J3P3Q6', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(149, 'Didiek Suhendro, S.Pd', '19680507 200501 1 005', 2, '$2y$10$zR671Yoicygdf8iK08IzbuZ./G3bK.jfumgK.ysGxMp', 'didieksuhendro', 'A3R2F7', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(150, 'Dra. Erni Handayani, M.Pd', '19690212 200701 2 025', 2, '$2y$10$4D3Hy7dP.L/Fs6eHQpUw4eMuOQ7sUPXMhOqcOTcu6Bi', 'ernihandayani', 'V9O5M4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(151, 'Anis Mahmida,  M.Pd', '19700812 200801 2 013', 2, '$2y$10$6weg0az6OYBRDatTU2kvTe8sEw9ff2.eMRmk38MxiVK', 'anismahmida', 'M1B7M2', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(152, 'Yuni Setyowati, S.Pd, MM', '19730612 200801 2 010', 2, '$2y$10$OY6O780OSacIqyPVZukYwutUkJRzP4fOy7W0.CRIVox', 'yunisetyowati', 'P3E3X1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(153, 'Erwanto Wibowo, S.Pd, M.Si', '19741219 200801 1 008', 2, '$2y$10$kqzyvRs50Nk2SQFKO4UHmOPDC5k9JxGCL3BQrgqnRxL', 'erwanto', 'X2P5U4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(154, 'Iin Ainul Mafrudhoh, S.Pd', '19790917 200801 2 013', 2, '$2y$10$4WnyXKXmbuK.Qx3Pa6wKweeFXx2LM9qk0H/QzkZiHJY', 'iinainul', 'Y7U6T4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(155, 'Munaji, S.Pd, MM', '19690305 200701 1 022', 2, '$2y$10$ElUWAQ4JUWW8w8zL.o6FLO69ik1iMkh9elxrLr6LaUV', 'munaji', 'D9P8D1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(156, 'Kirana Basuki, S.Pd', '19690507 200801 1 013', 2, '$2y$10$1rGuqKZQVEyyK6NiE4TGNulT0dfZfCMYdh0tmEg1WSL', 'kiranabasuki', 'T9I2M1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(157, 'Warsini, S.Pd', '19700516 200801 2 011', 2, '$2y$10$Ym78xdBmtZh7MimapqCRuu0IuOgtmHJtTRm6oZl88ea', 'warsini', 'V7W6K3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(158, 'Sri Wuryaningsih, S.Pd', '19690629 200801 2 009', 2, '$2y$10$Cjb1BmD3VXyrC/nFSYT1M.rKt/4LtmTTGK1biPQDfzy', 'sriwurya', 'W4M7D9', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(159, 'Wahjuning Lestari, S.Pd, MM', '19720207 200801 2 013', 2, '$2y$10$bJ7OobcZ4oD1DCzx4J9DL.32qHIyvuNztpiMjIZup6V', 'wahjuninglestari', 'G4L5I5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(160, 'Nurchayati, S.Pd', '19670902 200801 2 008', 2, '$2y$10$jtQeL7ozC3Np8LVdiIutWOpe7wzmnrC.d6w./xHm6Xx', 'nurchayati', 'A5T3M7', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(161, 'Istikomah, S.Pd,  M.Pd', '19690506 200801 2 025', 2, '$2y$10$ikvbR6EohBppkUPyo8sts.7jZKRS409oA22HZK9pe.q', 'istikomah', 'F2A1R7', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(162, 'Yuni Istiana, S.Pd', '19730607 200801 2 008', 2, '$2y$10$s4cATp6R9hCefu54UbygqOdsHCDT96AhoOWukZRoHMA', 'yuniistiana', 'N4A2Y6', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(163, 'Heru Subandono, S.Pd', '19850128 201001 1 007', 2, '$2y$10$/lKCkLUgXHGA1OkEMTJmoeMx/yPduKSkjTjUTOdLG7U', 'herusubandono', 'T9E2J1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(164, 'Supiyan, S.Pd, MM', '19710119 200501 1 007', 2, '$2y$10$TehhuGr1oQ3ZSSR/GoHBluNex18f9JktL0K3GX2/iz6', 'supiyan', 'M7S2G1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(165, 'Drs. Supriyanto', '19630604 200801 1 002', 2, '$2y$10$6dT71vwZZEo1Xp0u/fhmmurGSJOkOghCKga9C63jrvX', 'supriyanto', 'W9B9I3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(166, 'Etty Sulistyoningtyas, S.Sn', '19761009 200903 2 001', 2, '$2y$10$Hh7DNJddT5Jd/Soj/gCpeOfAYTgl7bSB2UL6W7ys8Ir', 'ettysulis', 'L6Y4V8', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(167, 'Nur Laili Saadah, S.Pd', '19930428 201903 2 015', 2, '$2y$10$tIs5jSGZ8/8FrLwdvd0o0.2GPLF1Yf6y7CwKr5/mqgk', 'nurlaili', 'E8V2H3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(168, 'Rokhmad, S.Pd', '19660309 199010 1 001', 3, '$2y$10$UEEv7BujCsUfkpPFrCnK7OoiqF4znKMWi3LPLLc5PoS', 'rokhmad', 'I6T9A6', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(169, 'Donny Kaleb Setiawan, S.Th', '19780421  200604  1  02', 2, '$2y$10$dOaw/N.E7Doan.T1HKkr/.huK5fCZKkixm2Fy5mVb1t', 'donnykaleb', 'W7M8J9', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(170, 'Agus Sutrisno, S.Pd', '19710806 200801 1 015', 2, '$2y$10$b2r.U/kNpByQ2vkbqko0d.qnPsAdZeU.duDhrPuKAGy', 'agussutrisno', 'U3I7O4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(171, 'Fitri Rahmawati, S.Pd', '19731101 200801 2 007', 2, '$2y$10$9kRf/4iRdfabKYKMCQvBg.L8w13TEkeuJcWRMl.BkPe', 'fitrirahmawati', 'W1O9X6', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(172, 'Hariyati, S.Pd', '19751009 200801 2 009', 2, '$2y$10$G8vl8eFD/uF1i3OVVUaAve5iZ/46OGubYyzg32e1U22', 'hariyati', 'H1Y8R2', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(173, 'Henny Roesellaningtias, S.S, M.Pd', '19701007 200801 2 015', 2, '$2y$10$BvZuvKlFtJFaTf4x9eA/K.nyLFan3duWXPeR27aRUYd', 'hennyroella', 'O3K7C3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(174, 'Partini, S.Ag', '-', 2, '$2y$10$alW.jJpPzUBaUKGvYBH5D.iS6VBQpGIW6EUqSQnnqop', 'partinisag', 'Y6A3B1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(175, 'Supratikno, S.Pd', '19710606 200801 1 009', 2, '$2y$10$Il4cdIt/JKgZY6b0phNagO4MVV0zTOxxNaVdV8v0Xb3', 'supratikno', 'A2E2X8', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(176, 'Ira Ratnawati, S.Pd.', '-', 2, '$2y$10$B69wAvJ9mOcBDJSW/iENoe2gWQR/aPcFCO2MvqWKANq', 'iraratnawati', 'F9S7D7', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(177, 'Erni Kholifah, S.Pd', '-', 2, '$2y$10$uUoBGBHPTCCqlQpHQgd9JuGKrAn29EsfeVBVCEth/tx', 'ernikholifah', 'A2T4Y5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(178, 'Febria Dwi Kurniati, S.Pd.I', '-', 2, '$2y$10$ok629sama6E7Yof7MP6TOOg56/HewI6zaN067q9ZGXZ', 'febriadwikurnia', 'K9M7Y9', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(179, 'Waluyanti Tri Lestari, S.Pd', '-', 2, '$2y$10$CiDjzJ177o5Z6Z4hetHVDOjt0FN/6E3xQpsrszozd7Q', 'waluyantitrilestari', 'X7T8M5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(180, 'Farida Dwi Kurniawaty, S.Pd', '-', 2, '$2y$10$kO16H..0gM8.CJc7e1CfL.2Nx2yrTnLnQofxJ6XmKav', 'faridadwikurnia', 'N4S7W8', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(181, 'Priyono, S.Pd', '-', 2, '$2y$10$Z97VPH/v5wonG9w2G5/Fg.5SaZ5hU3s7oxLB807TL9K', 'priyono', 'A9E7R8', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(182, 'Endang Wuryaningsih, S.Pd', '-', 2, '$2y$10$2cCm5PuIooTwFGFfzf56AuAgtYZAM.WVui.DUClPRr.', 'endangwuryaningsih', 'M2J3U9', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(183, 'Imania Dwy Anissa, S.Pd', '-', 2, '$2y$10$0AKIyr8MAhsHVllWlW7N1eVoF/paCbFjWHeeODwmJUB', 'imaniadwyanissa', 'N5F6N7', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(184, 'Popy Aulia Putri, S.Pd', '-', 2, '$2y$10$W807qIo3Xb4VlGOAPTy2kul2.P2UM9V9U0fwtKQRbbR', 'popyauliaputri', 'H2E6Y6', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(185, 'Ervin Naviatin, S.Pd.I', '-', 2, '$2y$10$6SAninimpFXpv3/h7Xc6ouob6UhUPr3IZ.Nvt4pVzok', 'ervinnaviatini', 'A5W2K4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(186, 'Suharti, S.Pd', '-', 2, '$2y$10$qI0TSXzLHOPFyMjkF3GuMuBTRsCx.e6mzeSIm6LNiyT', 'suharti', 'B8J7L3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(187, 'Hera Bianti, S.Pd', '-', 2, '$2y$10$GSgYLbmcQLl3VkjByTElDOaKzrSGClEPO0x8KV.RFTR', 'herabianti', 'R6S7J5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(188, 'Farida Tri Utami, S.Pd', '-', 2, '$2y$10$cyAcKkPjokkTGpNQZTAaHeqBS.5xDNEQRTFpPP9iV2R', 'faridatriutami', 'D3A7F1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(189, 'Danang Setya Anggara, S.Pd', '-', 2, '$2y$10$JN7VhrIFNbQndKyIhCRdpu2yHCYWHmaeKBZktayYdk2', 'danangtyaanggara', 'G4Q9B1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(190, 'Elok Prasetyaningsih, S.Pd', '-', 2, '$2y$10$Ucue2U9rvYPssFJbUbr1cuFXXQCJq.ZcYMaOcJAa.EX', 'elokpratyaningsih', 'Q5H1Y5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(191, 'Nur Hasanah, S.Pd', '-', 2, '$2y$10$B6qMYstzlQclw2syhkuta.RnRemGHFGPQCotxFUiChZ', 'nurhasanah', 'M8A2D4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(192, 'Sherly Purwana Arini, S.Pd', '-', 2, '$2y$10$DC68ik7EKK/.J0fdql3PRe69k16gzwv9dPr8SzH8zvx', 'sherlypurwanaarini', 'U9G8L4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(193, 'Mohamad Baedowi, S.Pd.I', '-', 2, '$2y$10$yTdGSW2fAW33B2cnim1Kf.5uf0t8hbmrPIlk0qJtM07', 'mohamadbaedowii', 'O4V3V3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(194, 'Muntamah, S.Pd.I', '-', 2, '$2y$10$wnNpdFZ6rCyWR904V79ll.b9EJoj4sS2s9CDVp464tG', 'muntamahi', 'U2Y5W1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(195, 'Nita Triana Dewi, S.Pd', '-', 2, '$2y$10$a/LY43FfdAeiCaKsyT562eKbObCeGvScRVfpr1oAaXZ', 'nitatrianadewi', 'N1X9Y4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(196, 'Evita Liliani Libria, S.Psi', '-', 2, '$2y$10$93Dj430AkawDOkUl17IjgOmncNlzW6uKHLHGbX0ICv7', 'evitaliliani', 'L8F8W4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(197, 'Zahrina Firdausi, S.Pd', '-', 2, '$2y$10$/YdIBZGBVJwKcwZngB8PneNrHr2UCPko/yPIkGIWN7E', 'zahrinafirda', 'A4V4L1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(198, 'Auliyana Ragil Satiti, S.Pd', '-', 2, '$2y$10$7I6wuEchHdmHQu05opXPkOW9gfbH.XyQPSUQu/apnHP', 'auliyana', 'U8Y4B5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(199, 'Kiky Bella Ariza Ulfa, S.Pd', '-', 2, '$2y$10$0s10tuc4ASjibMO/zXSLM.cFfIOICbr/3FSk.dxiB8r', 'kikybella', 'B9K5V6', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(200, 'Lia Ananda Putri, S.Pd', '-', 2, '$2y$10$vj02Uf955Fa5RLXW6CsC4.jqek5H3atoqnqV/7lyZmS', 'liaanandaputri', 'R3G8P3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(201, 'Eka Nur Fitriana, S.Pd', '-', 2, '$2y$10$06NN72tjHfNykrrs9dvuWerzumvSYq8xqEy21sVB49J', 'ekanurfitriana', 'W3E3C3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(202, 'Yenny Esti Maradhina, S.Pd', '-', 2, '$2y$10$ayhZNafkJ0AN2CoXNcexe.NPsICMhLdcz7kaOCX5rpm', 'yennyesti', 'Q5F8E9', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(203, 'Sulis Styawati', '-', 3, '$2y$10$GY9h1CCJVQqkJAqbJeTRXut1WlMpW8tlYhs2Cd1uYQq', 'sulis', 'V3S9T4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(204, 'Sunardi', '-', 4, '$2y$10$E7gkUYlW41lqPStQUC7ylOHCHsS7BnGaXfk1eyA8yvW', 'sunardi', 'A1M9Q7', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(205, 'Linda dwi Astutik, S.Pd', '-', 4, '$2y$10$EwNhAK43C3NaGOJqOgRXief1uBA6Wzyai06wtHvO6P2', 'lindadwi', 'J7R5L7', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(206, 'Nurwanto', '-', 4, '$2y$10$yeKG9H.gHahaI/XNJKjXZOyTw0eq7WIjufr3T2Nvyh3', 'nurwanto', 'U3N4P3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(207, 'Jumiati', '-', 4, '$2y$10$Bpk31OZRsZYG0dY./CqpcO08MMOeEKUwAFdMruyqooL', 'jumiati', 'B5Q6L3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(208, 'Arief Nugroho, S.E', '-', 4, '$2y$10$9ulp2NWjAe4Byfxlhfe52uk/95n3xU3x51FP0.dSMT5', 'ariefnugroho', 'V6M6D6', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(209, 'Tantri Rahayu, S.Pd', '-', 4, '$2y$10$4zeTHxnOQ4c0iPT6JqYhUu1sqcvEn74yZPuF4j92AAz', 'tantrirahayu', 'G1I8H5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(210, 'Purwanto', '-', 5, '$2y$10$9quCCsCw6BV65hyBhx.LOO/0soAIeFC97/NLaPXm8mb', 'purwanto', 'Y6I3T7', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(211, 'Siti Kofshoh Saudah', '-', 4, '$2y$10$PcsNAuI.eSkRxQmtIbINY.HP2DaEtEfcUvxJAHJAmNY', 'saudah', 'Y3W1M3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(212, 'Azis Subhan, S.Pd. I', '-', 4, '$2y$10$N15wdOyqdHWAweOZBG/IbeSM64zCWtO3PhSTpWqiFef', 'azissubhan', 'S1F8S3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(213, 'Novika Warianti, S.Kom', '-', 4, '$2y$10$55aItgOA6GgBAsVWhy3yfe9VL.eAKMJj7BnkrJfxod6', 'novikawarianti', 'Y2Q1W7', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(214, 'Suparkun', '-', 5, '$2y$10$jTzDuAb0pRsM6JujLOWJ.eumkPS5jLfmqvX9yAr9ZFz', 'suparkun', 'U6L8M7', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(215, 'Jayit Setyo Putro', '-', 4, '$2y$10$7Ae1F/maLGTXc5dXX7NmNu025rGnoQVOHKncS89gEUR', 'jayitsetyo', 'A5X2B3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(216, 'Joko Suyono', '-', 4, '$2y$10$5mKVkdFk7Z2TkvO5DGeBGuG4/YnvUTnC..ZRX6Lbki4', 'jokosuyono', 'N5U1J2', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(217, 'Widodo', '-', 4, '$2y$10$Obeo106ToVFQfh9V2O5awelc702yG/CyVvxWRLPjhTX', 'widodo', 'W5W7F4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(218, 'Eko Suhartoyo, S.Kom', '-', 4, '$2y$10$S3bVa4uW8ws4gCKQWhFZ9uPqcJ.JhZxzaatI9gaNHp2', 'ekosuhartoyo', 'D7W6I4', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(219, 'Andriyanto Romadhon Kurniawan, S.Kom', '-', 4, '$2y$10$IbAssYZFQgiZxdQjSVRKD.sIPX94OOgfiUF0HF.yLqA', 'andriyanto', 'O5P1E3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(220, 'Hanisa Valentina F', '-', 4, '$2y$10$BQWHmegd3tVXJoZbugId0exitc.veXUstP7asuaTZNs', 'hanisavalen', 'R5S3D5', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(221, 'Muhaji Saputro', '-', 4, '$2y$10$Eahn/DQrM.LZygELsATqs.O7ujnzeXEupQJWuhzFspT', 'muhajisaputro', 'Q4U7G3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(222, 'Nizar Parwasesa', '-', 4, '$2y$10$i5HV2o7jFX9HITHm.cfn0OiEQ6hPwq4kmKNKbMdLOYd', 'nizarparwa', 'U7S2O1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(223, 'Isa Ansori', '-', 4, '$2y$10$5nRR.BBqiRtZuboyt5lmIOHH0Qp0kB2b7eZFjE/MHOi', 'isaansori', 'I5M3O8', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(224, 'Sheerif Budi Anggoro', '-', 4, '$2y$10$Y8iHF9MwLYfkpDTo/0rHSug.UHXX4QOdJ.U6t1T0/wF', 'sheerifbudi', 'E6J4P1', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(225, 'Yoga Adi Nugraha', '-', 4, '$2y$10$WMH5MyDGUZBgnmHAFg6gU.xfkLnUFD3OtPvIti0Yh4J', 'yogaadi', 'E7A8T2', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(226, 'Ratu Putri Rosa Wijayanti', '-', 4, '$2y$10$rTZIgmWetOjqXwI8wa4zTe7pqJDkkbUpwm2rOBhyfJ4', 'ratuputrirosa', 'F7Q5B3', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00'),
(227, 'Eko Tri Yustikawan', '-', 4, '$2y$10$HvjBw1fHIyvHh.wtdCKFZuReYlWh3voxg07K1vP7u5C', 'ekotriyus', 'J2N9G9', 'user-default.jpg', 1, '2020-08-03 08:31:00', '2020-08-03 08:31:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `idpresensi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `idpegawai` int(11) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `masuk` time NOT NULL,
  `longtitude_masuk` varchar(100) DEFAULT NULL,
  `latitude_masuk` varchar(100) DEFAULT NULL,
  `pulang` time NOT NULL,
  `longtitude_pulang` varchar(100) DEFAULT NULL,
  `latitude_pulang` varchar(100) DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL,
  `status` varchar(14) NOT NULL,
  `masuk` time NOT NULL,
  `pulang` time NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`idstatus`, `status`, `masuk`, `pulang`, `is_active`, `created_at`, `update_at`) VALUES
(0, 'Administrator', '00:00:00', '00:00:00', 1, '2020-08-02 08:04:55', '2020-08-02 08:04:55'),
(1, 'Kepala Sekolah', '07:00:00', '16:00:00', 1, '2020-08-02 08:04:55', '2020-08-02 08:04:55'),
(2, 'Guru', '07:00:00', '16:00:00', 1, '2020-08-02 08:04:55', '2020-08-02 08:04:55'),
(3, 'KTU', '07:00:00', '16:00:00', 1, '2020-08-02 08:04:55', '2020-08-02 12:44:41'),
(4, 'Staf TU\r\n', '06:00:00', '18:00:00', 1, '2020-08-02 08:04:55', '2020-08-02 12:44:18'),
(5, 'Security', '06:00:00', '12:00:00', 1, '2020-08-02 08:04:55', '2020-08-02 12:44:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`),
  ADD KEY `tbl_status_id` (`tbl_status_id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`idpresensi`),
  ADD KEY `idpegawai` (`idpegawai`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idstatus`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idpegawai` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `idpresensi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
