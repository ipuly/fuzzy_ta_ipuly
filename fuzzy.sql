-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2022 at 08:48 PM
-- Server version: 10.3.32-MariaDB-log-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aviljepa_fuzzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(35) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `ukuran` smallint(6) NOT NULL,
  `tahun_produksi` char(4) NOT NULL,
  `stok` smallint(6) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar1` varchar(30) DEFAULT NULL,
  `gambar2` varchar(30) DEFAULT NULL,
  `gambar3` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `id_brand`, `harga`, `ukuran`, `tahun_produksi`, `stok`, `keterangan`, `gambar1`, `gambar2`, `gambar3`) VALUES
(27, 'Celana Panjang', 4, 11, 52000, 60, '2018', 10, 'SERAGAM SEKOLAH CELANA PANJANG KARET BIRU SMP MERK SERAGAM - 27', '2201131119251.jpg', NULL, NULL),
(28, 'Celana Panjang', 4, 13, 62500, 50, '2019', 10, 'Javatex Seragam Panjang Celana Sekolah Anak', '2201131122581.jpg', NULL, NULL),
(29, 'Celana Panjang', 4, 12, 63000, 39, '2018', 10, 'Celana sekolah panjang hitam SMA/SMK/STM', '2201131124441.jpg', NULL, NULL),
(30, 'Celana Panjang', 4, 14, 80000, 56, '2019', 10, 'Celana sekolah panjang hitam SMA/SMK/STM', '2201131126041.jpg', NULL, NULL),
(31, 'Tas Polo alto ', 1, 8, 188000, 60, '2019', 3, 'POLO GIVES - Tas Ransel Original Import Ransel Polo Original', '2201131859501.jpg', NULL, NULL),
(34, 'Tas Rebook original', 1, 5, 250000, 30, '2020', 5, 'Tas Reebok Original ', '2201131902351.jpg', NULL, NULL),
(35, 'Tas Nike', 1, 2, 376000, 40, '2018', 2, 'Tas Nike original', '2201131908331.jpg', NULL, NULL),
(37, 'Sepatu Nike', 3, 2, 1120000, 70, '2019', 2, 'Sepatu Nike Original', '2201160032481.jpg', NULL, NULL),
(39, 'Sepatu Rebook', 3, 5, 500000, 38, '2020', 10, 'Sepatu Rebook Original', '2201160126171.jpg', NULL, NULL),
(40, 'Sepatu Eagle', 3, 6, 350000, 52, '2019', 4, 'Sepatu Eagle Original', '2201160127041.jpg', NULL, NULL),
(41, 'Sepatu Pro Att', 3, 7, 120000, 59, '2019', 20, 'Sepatu Pro att', '2201160128271.jpg', NULL, NULL),
(42, 'Baju Osis SMA Seragam', 2, 11, 80000, 38, '2019', 20, 'Baju Sekolah OSIS merk SERAGAM', '2201160131591.jpg', NULL, NULL),
(43, 'Baju Osis SMA Alisan', 2, 14, 100000, 52, '2019', 20, 'Baju Sekolah OSIS merk ALISAN', '2201160132331.jpg', NULL, NULL),
(44, 'Baju Osis SMA Bullova', 2, 13, 85000, 63, '2019', 20, 'Baju Sekolah OSIS merk BULOVA', '2201160133111.jpg', NULL, NULL),
(45, 'Baju Osis SMA Purnama', 2, 12, 90000, 48, '2019', 20, 'Baju Sekolah OSIS merk PURNAMA', '2201160133391.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `nama_brand` varchar(35) NOT NULL,
  `bobot` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`, `bobot`) VALUES
(1, 'Adidas', 95),
(2, 'Nike', 95),
(3, 'Piero', 85),
(4, 'Ortuseight', 80),
(5, 'Reebok', 88),
(6, 'Eagle', 75),
(7, 'Pro att', 25),
(8, 'Polo', 90),
(9, 'Inflico', 60),
(10, 'Eiger', 86),
(11, 'seragam', 60),
(12, 'purnama', 36),
(13, 'bullova', 57),
(14, 'allisan', 83);

-- --------------------------------------------------------

--
-- Table structure for table `derajat`
--

CREATE TABLE `derajat` (
  `id_dk` varchar(5) NOT NULL,
  `nama_dk` varchar(30) NOT NULL,
  `batas_atas` smallint(5) NOT NULL,
  `batas_bawah` smallint(5) NOT NULL,
  `id_parameter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `derajat`
--

INSERT INTO `derajat` (`id_dk`, `nama_dk`, `batas_atas`, `batas_bawah`, `id_parameter`) VALUES
('BRN01', 'tidak terkenal', 1, 60, 2),
('BRN02', 'terkenal', 20, 90, 2),
('BRN03', 'sangat terkenal', 70, 100, 2),
('DFZ01', 'tidak rekomendasi', 1, 40, 4),
('DFZ02', 'rekomendasi', 20, 90, 4),
('DFZ03', 'sangat rekomendasi', 60, 100, 4),
('HRG01', 'sangat mahal', 1, 30, 1),
('HRG02', 'mahal', 10, 60, 1),
('HRG03', 'sedang', 50, 90, 1),
('HRG04', 'murah', 70, 100, 1),
('THN01', 'sangat lama', 1, 40, 3),
('THN02', 'cukup lama', 20, 90, 3),
('THN03', 'baru', 60, 100, 3),
('UKR01', 'berat', 1, 40, 5),
('UKR02', 'sedang', 20, 90, 5),
('UKR03', 'ringan', 60, 100, 5);

-- --------------------------------------------------------

--
-- Table structure for table `detail_rules`
--

CREATE TABLE `detail_rules` (
  `id_detail_rules` int(11) NOT NULL,
  `id_rules` int(11) NOT NULL,
  `id_fuzzy` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_rules`
--

INSERT INTO `detail_rules` (`id_detail_rules`, `id_rules`, `id_fuzzy`) VALUES
(117, 113, 'HRG01'),
(118, 113, 'BRN01'),
(119, 113, 'THN01'),
(120, 113, 'UKR01'),
(121, 114, 'HRG01'),
(122, 114, 'BRN01'),
(123, 114, 'THN01'),
(124, 114, 'UKR02'),
(125, 115, 'HRG01'),
(126, 115, 'BRN01'),
(127, 115, 'THN01'),
(128, 115, 'UKR03'),
(129, 116, 'HRG01'),
(130, 116, 'BRN01'),
(131, 116, 'THN02'),
(132, 116, 'UKR01'),
(133, 117, 'HRG01'),
(134, 117, 'BRN01'),
(135, 117, 'THN02'),
(136, 117, 'UKR02'),
(137, 118, 'HRG01'),
(138, 118, 'BRN01'),
(139, 118, 'THN02'),
(140, 118, 'UKR03'),
(141, 119, 'HRG01'),
(142, 119, 'BRN01'),
(143, 119, 'THN03'),
(144, 119, 'UKR01'),
(145, 120, 'HRG01'),
(146, 120, 'BRN01'),
(147, 120, 'THN03'),
(148, 120, 'UKR02'),
(149, 121, 'HRG01'),
(150, 121, 'BRN01'),
(151, 121, 'THN03'),
(152, 121, 'UKR03'),
(153, 122, 'HRG01'),
(154, 122, 'BRN02'),
(155, 122, 'THN01'),
(156, 122, 'UKR01'),
(157, 123, 'HRG01'),
(158, 123, 'BRN02'),
(159, 123, 'THN01'),
(160, 123, 'UKR02'),
(161, 124, 'HRG01'),
(162, 124, 'BRN02'),
(163, 124, 'THN01'),
(164, 124, 'UKR03'),
(165, 125, 'HRG01'),
(166, 125, 'BRN02'),
(167, 125, 'THN02'),
(168, 125, 'UKR01'),
(169, 126, 'HRG01'),
(170, 126, 'BRN02'),
(171, 126, 'THN02'),
(172, 126, 'UKR02'),
(173, 127, 'HRG01'),
(174, 127, 'BRN02'),
(175, 127, 'THN02'),
(176, 127, 'UKR03'),
(177, 128, 'HRG01'),
(178, 128, 'BRN02'),
(179, 128, 'THN03'),
(180, 128, 'UKR01'),
(181, 129, 'HRG01'),
(182, 129, 'BRN02'),
(183, 129, 'THN03'),
(184, 129, 'UKR02'),
(185, 130, 'HRG01'),
(186, 130, 'BRN02'),
(187, 130, 'THN03'),
(188, 130, 'UKR03'),
(189, 131, 'HRG01'),
(190, 131, 'BRN03'),
(191, 131, 'THN01'),
(192, 131, 'UKR01'),
(193, 132, 'HRG01'),
(194, 132, 'BRN03'),
(195, 132, 'THN01'),
(196, 132, 'UKR02'),
(197, 133, 'HRG01'),
(198, 133, 'BRN03'),
(199, 133, 'THN01'),
(200, 133, 'UKR03'),
(201, 134, 'HRG01'),
(202, 134, 'BRN03'),
(203, 134, 'THN02'),
(204, 134, 'UKR01'),
(205, 135, 'HRG01'),
(206, 135, 'BRN03'),
(207, 135, 'THN02'),
(208, 135, 'UKR02'),
(209, 136, 'HRG01'),
(210, 136, 'BRN03'),
(211, 136, 'THN02'),
(212, 136, 'UKR03'),
(217, 138, 'HRG01'),
(218, 138, 'BRN03'),
(219, 138, 'THN03'),
(220, 138, 'UKR01'),
(221, 139, 'HRG01'),
(222, 139, 'BRN03'),
(223, 139, 'THN03'),
(224, 139, 'UKR02'),
(225, 140, 'HRG01'),
(226, 140, 'BRN03'),
(227, 140, 'THN03'),
(228, 140, 'UKR03'),
(229, 141, 'HRG02'),
(230, 141, 'BRN01'),
(231, 141, 'THN01'),
(232, 141, 'UKR01'),
(233, 142, 'HRG02'),
(234, 142, 'BRN01'),
(235, 142, 'THN01'),
(236, 142, 'UKR02'),
(237, 143, 'HRG02'),
(238, 143, 'BRN01'),
(239, 143, 'THN01'),
(240, 143, 'UKR03'),
(241, 144, 'HRG02'),
(242, 144, 'BRN01'),
(243, 144, 'THN02'),
(244, 144, 'UKR01'),
(245, 145, 'HRG02'),
(246, 145, 'BRN01'),
(247, 145, 'THN02'),
(248, 145, 'UKR02'),
(249, 146, 'HRG02'),
(250, 146, 'BRN01'),
(251, 146, 'THN02'),
(252, 146, 'UKR03'),
(253, 147, 'HRG02'),
(254, 147, 'BRN01'),
(255, 147, 'THN03'),
(256, 147, 'UKR01'),
(257, 148, 'HRG02'),
(258, 148, 'BRN01'),
(259, 148, 'THN03'),
(260, 148, 'UKR02'),
(261, 149, 'HRG02'),
(262, 149, 'BRN01'),
(263, 149, 'THN03'),
(264, 149, 'UKR03'),
(265, 150, 'HRG02'),
(266, 150, 'BRN02'),
(267, 150, 'THN01'),
(268, 150, 'UKR01'),
(269, 151, 'HRG02'),
(270, 151, 'BRN02'),
(271, 151, 'THN01'),
(272, 151, 'UKR02'),
(273, 152, 'HRG02'),
(274, 152, 'BRN02'),
(275, 152, 'THN01'),
(276, 152, 'UKR03'),
(277, 153, 'HRG02'),
(278, 153, 'BRN02'),
(279, 153, 'THN02'),
(280, 153, 'UKR01'),
(281, 154, 'HRG02'),
(282, 154, 'BRN02'),
(283, 154, 'THN02'),
(284, 154, 'UKR02'),
(285, 155, 'HRG02'),
(286, 155, 'BRN02'),
(287, 155, 'THN02'),
(288, 155, 'UKR03'),
(289, 156, 'HRG02'),
(290, 156, 'BRN02'),
(291, 156, 'THN03'),
(292, 156, 'UKR01'),
(293, 157, 'HRG02'),
(294, 157, 'BRN02'),
(295, 157, 'THN03'),
(296, 157, 'UKR02'),
(297, 158, 'HRG02'),
(298, 158, 'BRN02'),
(299, 158, 'THN03'),
(300, 158, 'UKR03'),
(301, 159, 'HRG02'),
(302, 159, 'BRN03'),
(303, 159, 'THN01'),
(304, 159, 'UKR01'),
(305, 160, 'HRG02'),
(306, 160, 'BRN03'),
(307, 160, 'THN01'),
(308, 160, 'UKR02'),
(309, 161, 'HRG02'),
(310, 161, 'BRN03'),
(311, 161, 'THN01'),
(312, 161, 'UKR03'),
(313, 162, 'HRG02'),
(314, 162, 'BRN03'),
(315, 162, 'THN02'),
(316, 162, 'UKR01'),
(317, 163, 'HRG02'),
(318, 163, 'BRN03'),
(319, 163, 'THN02'),
(320, 163, 'UKR02'),
(321, 164, 'HRG02'),
(322, 164, 'BRN03'),
(323, 164, 'THN02'),
(324, 164, 'UKR03'),
(325, 165, 'HRG02'),
(326, 165, 'BRN03'),
(327, 165, 'THN03'),
(328, 165, 'UKR01'),
(329, 166, 'HRG02'),
(330, 166, 'BRN03'),
(331, 166, 'THN03'),
(332, 166, 'UKR02'),
(333, 167, 'HRG02'),
(334, 167, 'BRN03'),
(335, 167, 'THN03'),
(336, 167, 'UKR03'),
(337, 168, 'HRG03'),
(338, 168, 'BRN01'),
(339, 168, 'THN01'),
(340, 168, 'UKR01'),
(341, 169, 'HRG03'),
(342, 169, 'BRN01'),
(343, 169, 'THN01'),
(344, 169, 'UKR02'),
(345, 170, 'HRG03'),
(346, 170, 'BRN01'),
(347, 170, 'THN01'),
(348, 170, 'UKR03'),
(349, 171, 'HRG03'),
(350, 171, 'BRN01'),
(351, 171, 'THN02'),
(352, 171, 'UKR01'),
(353, 172, 'HRG03'),
(354, 172, 'BRN01'),
(355, 172, 'THN02'),
(356, 172, 'UKR02'),
(357, 173, 'HRG03'),
(358, 173, 'BRN01'),
(359, 173, 'THN02'),
(360, 173, 'UKR03'),
(361, 174, 'HRG03'),
(362, 174, 'BRN01'),
(363, 174, 'THN03'),
(364, 174, 'UKR01'),
(365, 175, 'HRG03'),
(366, 175, 'BRN01'),
(367, 175, 'THN03'),
(368, 175, 'UKR02'),
(369, 176, 'HRG03'),
(370, 176, 'BRN01'),
(371, 176, 'THN03'),
(372, 176, 'UKR03'),
(373, 177, 'HRG03'),
(374, 177, 'BRN02'),
(375, 177, 'THN01'),
(376, 177, 'UKR01'),
(377, 178, 'HRG03'),
(378, 178, 'BRN02'),
(379, 178, 'THN01'),
(380, 178, 'UKR02'),
(381, 179, 'HRG03'),
(382, 179, 'BRN02'),
(383, 179, 'THN01'),
(384, 179, 'UKR03'),
(385, 180, 'HRG03'),
(386, 180, 'BRN02'),
(387, 180, 'THN02'),
(388, 180, 'UKR01'),
(389, 181, 'HRG03'),
(390, 181, 'BRN02'),
(391, 181, 'THN02'),
(392, 181, 'UKR02'),
(393, 182, 'HRG03'),
(394, 182, 'BRN02'),
(395, 182, 'THN02'),
(396, 182, 'UKR03'),
(397, 183, 'HRG03'),
(398, 183, 'BRN02'),
(399, 183, 'THN03'),
(400, 183, 'UKR01'),
(401, 184, 'HRG03'),
(402, 184, 'BRN02'),
(403, 184, 'THN03'),
(404, 184, 'UKR02'),
(405, 185, 'HRG03'),
(406, 185, 'BRN02'),
(407, 185, 'THN03'),
(408, 185, 'UKR03'),
(409, 186, 'HRG03'),
(410, 186, 'BRN03'),
(411, 186, 'THN01'),
(412, 186, 'UKR01'),
(413, 187, 'HRG03'),
(414, 187, 'BRN03'),
(415, 187, 'THN01'),
(416, 187, 'UKR02'),
(417, 188, 'HRG03'),
(418, 188, 'BRN03'),
(419, 188, 'THN01'),
(420, 188, 'UKR03'),
(421, 189, 'HRG03'),
(422, 189, 'BRN03'),
(423, 189, 'THN02'),
(424, 189, 'UKR01'),
(425, 190, 'HRG03'),
(426, 190, 'BRN03'),
(427, 190, 'THN02'),
(428, 190, 'UKR02'),
(429, 191, 'HRG03'),
(430, 191, 'BRN03'),
(431, 191, 'THN02'),
(432, 191, 'UKR03'),
(433, 192, 'HRG03'),
(434, 192, 'BRN03'),
(435, 192, 'THN03'),
(436, 192, 'UKR01'),
(437, 193, 'HRG03'),
(438, 193, 'BRN03'),
(439, 193, 'THN03'),
(440, 193, 'UKR02'),
(441, 194, 'HRG03'),
(442, 194, 'BRN03'),
(443, 194, 'THN03'),
(444, 194, 'UKR03'),
(445, 195, 'HRG04'),
(446, 195, 'BRN01'),
(447, 195, 'THN01'),
(448, 195, 'UKR01'),
(449, 196, 'HRG04'),
(450, 196, 'BRN01'),
(451, 196, 'THN01'),
(452, 196, 'UKR02'),
(453, 197, 'HRG04'),
(454, 197, 'BRN01'),
(455, 197, 'THN01'),
(456, 197, 'UKR03'),
(457, 198, 'HRG04'),
(458, 198, 'BRN01'),
(459, 198, 'THN02'),
(460, 198, 'UKR01'),
(461, 199, 'HRG04'),
(462, 199, 'BRN01'),
(463, 199, 'THN02'),
(464, 199, 'UKR02'),
(465, 200, 'HRG04'),
(466, 200, 'BRN01'),
(467, 200, 'THN02'),
(468, 200, 'UKR03'),
(469, 201, 'HRG04'),
(470, 201, 'BRN01'),
(471, 201, 'THN03'),
(472, 201, 'UKR01'),
(473, 202, 'HRG04'),
(474, 202, 'BRN01'),
(475, 202, 'THN03'),
(476, 202, 'UKR02'),
(477, 203, 'HRG04'),
(478, 203, 'BRN01'),
(479, 203, 'THN03'),
(480, 203, 'UKR03'),
(481, 204, 'HRG04'),
(482, 204, 'BRN02'),
(483, 204, 'THN01'),
(484, 204, 'UKR01'),
(485, 205, 'HRG04'),
(486, 205, 'BRN02'),
(487, 205, 'THN01'),
(488, 205, 'UKR02'),
(489, 206, 'HRG04'),
(490, 206, 'BRN02'),
(491, 206, 'THN01'),
(492, 206, 'UKR03'),
(493, 207, 'HRG04'),
(494, 207, 'BRN02'),
(495, 207, 'THN02'),
(496, 207, 'UKR01'),
(497, 208, 'HRG04'),
(498, 208, 'BRN02'),
(499, 208, 'THN02'),
(500, 208, 'UKR02'),
(501, 209, 'HRG04'),
(502, 209, 'BRN02'),
(503, 209, 'THN02'),
(504, 209, 'UKR03'),
(505, 210, 'HRG04'),
(506, 210, 'BRN02'),
(507, 210, 'THN03'),
(508, 210, 'UKR01'),
(509, 211, 'HRG04'),
(510, 211, 'BRN02'),
(511, 211, 'THN03'),
(512, 211, 'UKR02'),
(513, 212, 'HRG04'),
(514, 212, 'BRN02'),
(515, 212, 'THN03'),
(516, 212, 'UKR03'),
(517, 213, 'HRG04'),
(518, 213, 'BRN03'),
(519, 213, 'THN01'),
(520, 213, 'UKR01'),
(521, 214, 'HRG04'),
(522, 214, 'BRN03'),
(523, 214, 'THN01'),
(524, 214, 'UKR02'),
(525, 215, 'HRG04'),
(526, 215, 'BRN03'),
(527, 215, 'THN01'),
(528, 215, 'UKR03'),
(529, 216, 'HRG04'),
(530, 216, 'BRN03'),
(531, 216, 'THN02'),
(532, 216, 'UKR01'),
(533, 217, 'HRG04'),
(534, 217, 'BRN03'),
(535, 217, 'THN02'),
(536, 217, 'UKR02'),
(537, 218, 'HRG04'),
(538, 218, 'BRN03'),
(539, 218, 'THN02'),
(540, 218, 'UKR03'),
(541, 219, 'HRG04'),
(542, 219, 'BRN03'),
(543, 219, 'THN03'),
(544, 219, 'UKR01'),
(545, 220, 'HRG04'),
(546, 220, 'BRN03'),
(547, 220, 'THN03'),
(548, 220, 'UKR02'),
(549, 221, 'HRG04'),
(550, 221, 'BRN03'),
(551, 221, 'THN03'),
(552, 221, 'UKR03');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Tas'),
(2, 'Baju'),
(3, 'Sepatu'),
(4, 'Celana');

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `id_parameter` int(11) NOT NULL,
  `nama_parameter` varchar(30) NOT NULL,
  `keterangan` enum('1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`id_parameter`, `nama_parameter`, `keterangan`) VALUES
(1, 'harga', '1'),
(2, 'brand', '1'),
(3, 'tahun', '1'),
(4, 'defuzzy', '2'),
(5, 'ukuran', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id_rules` int(11) NOT NULL,
  `id_defuzzy` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id_rules`, `id_defuzzy`) VALUES
(113, 'DFZ01'),
(114, 'DFZ01'),
(115, 'DFZ01'),
(116, 'DFZ01'),
(117, 'DFZ01'),
(118, 'DFZ01'),
(119, 'DFZ01'),
(120, 'DFZ01'),
(121, 'DFZ01'),
(122, 'DFZ01'),
(123, 'DFZ01'),
(124, 'DFZ01'),
(125, 'DFZ01'),
(126, 'DFZ01'),
(127, 'DFZ01'),
(128, 'DFZ01'),
(141, 'DFZ01'),
(142, 'DFZ01'),
(143, 'DFZ01'),
(144, 'DFZ01'),
(145, 'DFZ01'),
(146, 'DFZ01'),
(147, 'DFZ01'),
(168, 'DFZ01'),
(169, 'DFZ01'),
(170, 'DFZ01'),
(171, 'DFZ01'),
(172, 'DFZ01'),
(173, 'DFZ01'),
(174, 'DFZ01'),
(177, 'DFZ01'),
(183, 'DFZ01'),
(195, 'DFZ01'),
(196, 'DFZ01'),
(197, 'DFZ01'),
(198, 'DFZ01'),
(199, 'DFZ01'),
(204, 'DFZ01'),
(129, 'DFZ02'),
(130, 'DFZ02'),
(131, 'DFZ02'),
(132, 'DFZ02'),
(133, 'DFZ02'),
(134, 'DFZ02'),
(135, 'DFZ02'),
(136, 'DFZ02'),
(138, 'DFZ02'),
(139, 'DFZ02'),
(140, 'DFZ02'),
(148, 'DFZ02'),
(149, 'DFZ02'),
(150, 'DFZ02'),
(151, 'DFZ02'),
(152, 'DFZ02'),
(153, 'DFZ02'),
(154, 'DFZ02'),
(155, 'DFZ02'),
(156, 'DFZ02'),
(157, 'DFZ02'),
(158, 'DFZ02'),
(159, 'DFZ02'),
(160, 'DFZ02'),
(161, 'DFZ02'),
(162, 'DFZ02'),
(163, 'DFZ02'),
(164, 'DFZ02'),
(165, 'DFZ02'),
(166, 'DFZ02'),
(167, 'DFZ02'),
(175, 'DFZ02'),
(176, 'DFZ02'),
(178, 'DFZ02'),
(179, 'DFZ02'),
(180, 'DFZ02'),
(181, 'DFZ02'),
(182, 'DFZ02'),
(184, 'DFZ02'),
(185, 'DFZ02'),
(186, 'DFZ02'),
(187, 'DFZ02'),
(188, 'DFZ02'),
(189, 'DFZ02'),
(190, 'DFZ02'),
(191, 'DFZ02'),
(192, 'DFZ02'),
(200, 'DFZ02'),
(201, 'DFZ02'),
(202, 'DFZ02'),
(203, 'DFZ02'),
(205, 'DFZ02'),
(206, 'DFZ02'),
(207, 'DFZ02'),
(208, 'DFZ02'),
(210, 'DFZ02'),
(211, 'DFZ02'),
(193, 'DFZ03'),
(194, 'DFZ03'),
(209, 'DFZ03'),
(212, 'DFZ03'),
(213, 'DFZ03'),
(214, 'DFZ03'),
(215, 'DFZ03'),
(216, 'DFZ03'),
(217, 'DFZ03'),
(218, 'DFZ03'),
(219, 'DFZ03'),
(220, 'DFZ03'),
(221, 'DFZ03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(35) DEFAULT NULL,
  `privilage` enum('1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama_user`, `privilage`) VALUES
(1, 'coba@gmail.com', '6228fcd5b58de800fd5798dd4cc5b6ccb233220b', 'user coba', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `derajat`
--
ALTER TABLE `derajat`
  ADD PRIMARY KEY (`id_dk`),
  ADD KEY `id_parameter` (`id_parameter`);

--
-- Indexes for table `detail_rules`
--
ALTER TABLE `detail_rules`
  ADD PRIMARY KEY (`id_detail_rules`),
  ADD KEY `id_rules` (`id_rules`),
  ADD KEY `id_fuzzy` (`id_fuzzy`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id_parameter`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id_rules`),
  ADD KEY `id_defuzzy` (`id_defuzzy`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `detail_rules`
--
ALTER TABLE `detail_rules`
  MODIFY `id_detail_rules` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=553;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id_parameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id_rules` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`);

--
-- Constraints for table `derajat`
--
ALTER TABLE `derajat`
  ADD CONSTRAINT `derajat_ibfk_1` FOREIGN KEY (`id_parameter`) REFERENCES `parameter` (`id_parameter`);

--
-- Constraints for table `detail_rules`
--
ALTER TABLE `detail_rules`
  ADD CONSTRAINT `detail_rules_ibfk_1` FOREIGN KEY (`id_rules`) REFERENCES `rules` (`id_rules`),
  ADD CONSTRAINT `detail_rules_ibfk_2` FOREIGN KEY (`id_fuzzy`) REFERENCES `derajat` (`id_dk`);

--
-- Constraints for table `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_ibfk_1` FOREIGN KEY (`id_defuzzy`) REFERENCES `derajat` (`id_dk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
