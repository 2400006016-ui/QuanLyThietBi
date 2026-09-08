-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2026 at 11:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlymuontrathietbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bang_lich_su_muon_tra`
--

CREATE TABLE `bang_lich_su_muon_tra` (
  `MaLichSu` int(11) NOT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `MaPhieuMuon` int(11) NOT NULL,
  `HanhDong` varchar(100) NOT NULL,
  `ThoiGian` datetime NOT NULL,
  `NguoiThucHien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bang_lich_su_muon_tra`
--

INSERT INTO `bang_lich_su_muon_tra` (`MaLichSu`, `MaNguoiDung`, `MaPhieuMuon`, `HanhDong`, `ThoiGian`, `NguoiThucHien`) VALUES
(168, 18, 136, 'Đăng ký mượn thiết bị', '2026-08-19 14:36:31', 'SinhVien'),
(169, 18, 137, 'Duyệt mượn', '2026-08-19 14:41:10', 'SinhVien'),
(170, 18, 138, 'Đăng ký mượn thiết bị', '2026-08-19 14:53:56', 'SinhVien'),
(171, 18, 139, 'Đăng ký mượn thiết bị', '2026-08-19 15:07:44', 'SinhVien'),
(172, 18, 140, 'Đăng ký mượn thiết bị', '2026-08-19 15:07:50', 'SinhVien'),
(173, 18, 141, 'Đăng ký mượn thiết bị', '2026-08-19 15:10:11', 'SinhVien'),
(174, 18, 142, 'Đăng ký mượn thiết bị', '2026-08-19 15:11:01', 'SinhVien'),
(175, 32, 143, 'Đăng ký mượn thiết bị', '2026-08-26 14:22:26', 'SinhVien'),
(176, 32, 144, 'Đăng ký mượn thiết bị', '2026-08-26 14:22:38', 'SinhVien'),
(177, 32, 145, 'Đăng ký mượn thiết bị', '2026-08-26 14:22:48', 'SinhVien'),
(178, 33, 171, 'GV muon', '2026-08-29 19:51:32', 'GiangVien'),
(179, 33, 172, 'GV muon', '2026-08-29 19:51:57', 'GiangVien'),
(180, 33, 171, 'GV tra', '2026-08-29 19:52:26', 'GiangVien'),
(181, 33, 173, 'GV muon', '2026-08-29 19:52:48', 'GiangVien'),
(182, 33, 173, 'GV tra', '2026-08-29 19:52:51', 'GiangVien'),
(183, 33, 172, 'GV tra', '2026-08-29 19:52:52', 'GiangVien'),
(184, 33, 175, 'GV muon', '2026-08-29 20:18:18', 'GiangVien'),
(185, 33, 175, 'GV tra', '2026-08-29 20:19:07', 'GiangVien'),
(186, 33, 174, 'GV tra', '2026-08-29 20:19:08', 'GiangVien'),
(187, 33, 176, 'GV muon', '2026-08-29 20:21:04', 'GiangVien'),
(188, 33, 180, 'GV muon', '2026-08-29 20:30:35', 'GiangVien'),
(189, 33, 180, 'GV tra', '2026-08-29 20:31:09', 'GiangVien'),
(190, 33, 178, 'GV tra', '2026-08-29 20:31:14', 'GiangVien'),
(191, 33, 179, 'GV tra', '2026-08-29 20:31:30', 'GiangVien'),
(192, 33, 177, 'GV tra', '2026-08-29 20:31:31', 'GiangVien'),
(193, 33, 176, 'GV tra', '2026-08-29 20:31:31', 'GiangVien'),
(194, 33, 181, 'GV muon', '2026-08-29 20:31:39', 'GiangVien'),
(195, 33, 181, 'GV tra', '2026-08-29 20:31:44', 'GiangVien'),
(196, 45, 185, 'GV muon', '2026-09-06 20:50:20', 'GiangVien'),
(197, 45, 196, 'GV muon', '2026-09-07 15:23:06', 'GiangVien'),
(198, 45, 185, 'GV tra', '2026-09-07 15:23:10', 'GiangVien'),
(199, 45, 197, 'GV muon', '2026-09-07 15:25:48', 'GiangVien'),
(200, 45, 198, 'GV muon', '2026-09-07 15:25:53', 'GiangVien'),
(201, 45, 199, 'GV muon', '2026-09-07 15:25:55', 'GiangVien'),
(202, 45, 200, 'GV muon', '2026-09-07 15:26:00', 'GiangVien'),
(203, 45, 201, 'GV muon', '2026-09-07 15:26:02', 'GiangVien'),
(204, 45, 202, 'GV muon', '2026-09-07 15:26:04', 'GiangVien'),
(205, 45, 203, 'GV muon', '2026-09-07 15:26:06', 'GiangVien'),
(206, 45, 204, 'GV muon', '2026-09-07 15:26:10', 'GiangVien'),
(207, 45, 205, 'GV muon', '2026-09-07 15:26:13', 'GiangVien'),
(208, 45, 206, 'GV muon', '2026-09-07 15:26:15', 'GiangVien'),
(209, 45, 207, 'GV muon', '2026-09-07 15:26:17', 'GiangVien'),
(210, 45, 207, 'GV tra', '2026-09-07 15:26:22', 'GiangVien'),
(211, 45, 206, 'GV tra', '2026-09-07 15:26:23', 'GiangVien'),
(212, 45, 205, 'GV tra', '2026-09-07 15:26:23', 'GiangVien'),
(213, 45, 204, 'GV tra', '2026-09-07 15:26:24', 'GiangVien'),
(214, 45, 203, 'GV tra', '2026-09-07 15:26:24', 'GiangVien'),
(215, 45, 202, 'GV tra', '2026-09-07 15:26:25', 'GiangVien'),
(216, 45, 201, 'GV tra', '2026-09-07 15:26:25', 'GiangVien'),
(217, 45, 200, 'GV tra', '2026-09-07 15:26:26', 'GiangVien'),
(218, 45, 199, 'GV tra', '2026-09-07 15:26:26', 'GiangVien'),
(219, 45, 198, 'GV tra', '2026-09-07 15:26:27', 'GiangVien'),
(220, 45, 197, 'GV tra', '2026-09-07 15:26:27', 'GiangVien'),
(221, 45, 221, 'GV muon', '2026-09-07 16:02:14', 'GiangVien'),
(222, 45, 221, 'GV tra', '2026-09-07 16:02:30', 'GiangVien'),
(223, 45, 222, 'GV muon', '2026-09-07 16:02:55', 'GiangVien'),
(224, 45, 222, 'GV tra', '2026-09-07 16:02:56', 'GiangVien'),
(225, 45, 223, 'GV muon', '2026-09-07 16:04:24', 'GiangVien'),
(226, 45, 223, 'GV tra', '2026-09-07 16:04:54', 'GiangVien'),
(227, 45, 224, 'GV muon', '2026-09-07 16:05:23', 'GiangVien');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `MaNguoiDung` int(11) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `mssv` varchar(20) DEFAULT NULL,
  `Quyen` varchar(50) NOT NULL,
  `Email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`MaNguoiDung`, `TenDangNhap`, `MatKhau`, `HoTen`, `mssv`, `Quyen`, `Email`) VALUES
(1, 'admin', '$2y$10$nvHeDxArrRUR/LO/.Axq0.TKJ05yecbej587o.vZXjCkSppDZog8i', 'Quản Trị Viên', '', 'Admin', ''),
(39, '1', '$2y$10$1IGs6jtFGOih3fts..GyOONErHJiwPZ78LIa0q/ggMp4CauquU..S', '', '', 'QuanLy', ''),
(40, '2', '$2y$10$fHDH/jzgIEnvHajY57Mv7.notV6hzRZtJsCVKIjJfm1F2y8almijC', 'Sinh Viên', '', 'SinhVien', ''),
(45, '3', '$2y$10$RtE1U1N.3.tp5fxJwws5muBRigwaJXBNKtFoDsF1MuvFYu1a2Twl.', 'Giảng viên', '', 'GiangVien', '');

-- --------------------------------------------------------

--
-- Table structure for table `phieu_muon`
--

CREATE TABLE `phieu_muon` (
  `MaPhieuMuon` int(11) NOT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `MaThietBi` varchar(20) NOT NULL,
  `TenThietBi` varchar(200) NOT NULL,
  `MaPhong` varchar(50) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `NgayMuon` datetime NOT NULL,
  `NgayTra` datetime DEFAULT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieu_muon`
--

INSERT INTO `phieu_muon` (`MaPhieuMuon`, `MaNguoiDung`, `MaThietBi`, `TenThietBi`, `MaPhong`, `SoLuong`, `NgayMuon`, `NgayTra`, `TrangThai`) VALUES
(135, 134, '123324123', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Đã trả'),
(138, 18, 'TB06', '', 'A01', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Đã trả'),
(139, 18, 'TB01', '', 'A01', 0, '0000-00-00 00:00:00', '2026-08-19 15:09:48', 'Đã trả'),
(140, 18, 'TB03', '', 'A02', 0, '2026-08-19 15:07:50', NULL, 'Từ chối'),
(141, 18, 'TB01', '', 'A02', 0, '2026-08-19 15:10:38', '2026-08-19 15:10:46', 'Đã trả'),
(142, 18, 'TB03', '', 'A02', 0, '2026-08-19 15:11:01', NULL, 'Từ chối'),
(143, 32, 'CA1', '', 'A01', 0, '2026-08-28 13:01:46', '2026-08-29 16:53:10', 'Đã trả'),
(144, 32, 'TB01', '', 'A05', 0, '2026-08-26 14:22:38', NULL, 'Từ chối'),
(145, 32, 'TB03', '', 'A02', 0, '2026-08-26 14:22:48', NULL, 'Từ chối'),
(146, 32, 'CA1', '', '1', 0, '2026-08-29 14:03:16', NULL, 'Từ chối'),
(147, 32, 'CA1', '', '1', 0, '2026-08-29 14:03:47', NULL, 'Từ chối'),
(148, 32, 'TB01', '', '1', 0, '2026-08-29 15:11:59', NULL, 'Từ chối'),
(149, 32, 'CA1', '', '1', 0, '2026-08-29 15:16:20', NULL, 'Từ chối'),
(150, 32, 'CA1', '', '1', 0, '2026-08-29 15:25:37', NULL, 'Từ chối'),
(151, 32, 'TB01', '', '1', 0, '2026-08-29 15:26:24', NULL, 'Từ chối'),
(152, 32, 'CA1', '', '1', 0, '2026-08-29 15:26:49', NULL, 'Từ chối'),
(153, 32, 'CA1', '', '1', 0, '2026-08-29 15:26:55', NULL, 'Từ chối'),
(154, 32, 'CA1', '', 'A01', 0, '2026-08-29 15:27:03', NULL, 'Từ chối'),
(155, 32, 'TB01', '', '1', 7, '2026-08-29 16:52:54', '2026-08-29 16:53:11', 'Đã trả'),
(156, 32, 'CA1', 'USB', '1', 4, '2026-08-29 16:51:50', '2026-08-29 16:52:02', 'Đã trả'),
(157, 32, 'CA1', 'USB', 'A01', 3, '2026-08-29 16:53:38', '2026-08-29 16:54:50', 'Đã trả'),
(158, 32, 'CA1', 'USB', 'A01', 3, '2026-08-29 16:55:49', '2026-08-29 16:57:08', 'Đã trả'),
(159, 32, 'CA1', 'USB', 'A02', 1, '2026-08-29 16:58:12', '2026-08-29 17:00:27', 'Đã trả'),
(160, 32, 'CA1', 'USB', '1', 1, '2026-08-29 16:59:24', '2026-08-29 17:11:51', 'Đã trả'),
(161, 32, 'CA1', 'USB', '1', 1, '2026-08-29 17:11:35', '2026-08-29 17:11:58', 'Đã trả'),
(162, 32, 'CA1', 'USB', 'A04', 3, '2026-08-29 17:12:17', NULL, 'Từ chối'),
(163, 32, 'CA1', 'USB', '1', 5, '2026-08-29 17:19:14', '2026-08-29 17:28:03', 'Đã trả'),
(164, 32, 'CA1', 'USB', 'A03', 2, '2026-08-29 17:28:01', '2026-08-29 17:28:03', 'Đã trả'),
(165, 32, 'CA1', 'USB', '1', 1, '2026-08-29 18:27:52', NULL, 'Từ chối'),
(166, 32, 'CA1', 'USB', '1', 10, '2026-08-29 19:37:05', '2026-08-29 19:45:16', 'Đã trả'),
(167, 32, 'CA1', 'USB', 'A02', 9, '2026-08-29 19:37:00', NULL, 'Từ chối'),
(168, 32, 'TB01', 'Micro', '1', 7, '2026-08-29 19:45:00', '2026-08-29 19:45:16', 'Đã trả'),
(169, 32, 'TB01', 'Micro', 'A03', 6, '2026-08-29 19:43:57', NULL, 'Từ chối'),
(170, 32, 'TB01', 'Micro', 'A04', 1, '2026-08-29 19:44:09', '2026-08-29 19:45:17', 'Đã trả'),
(171, 33, 'CA1', '', '1', 0, '2026-08-29 19:51:32', NULL, 'Đã trả'),
(172, 33, 'TB01', '', '1', 0, '2026-08-29 19:51:57', NULL, 'Đã trả'),
(173, 33, 'TB02', '', '1', 0, '2026-08-29 19:52:48', NULL, 'Đã trả'),
(174, 33, 'TB01', '', '1', 0, '2026-08-29 20:17:40', NULL, 'Đã trả'),
(175, 33, 'TB04', '', '1', 0, '2026-08-29 20:18:18', NULL, 'Đã trả'),
(176, 33, 'TB02', '', 'A04', 0, '2026-08-29 20:21:04', NULL, 'Đã trả'),
(177, 33, 'CA1', '', 'A01', 0, '2026-08-29 20:26:37', NULL, 'Đã trả'),
(178, 33, 'TB03', '', 'A01', 0, '2026-08-29 20:26:55', NULL, 'Đã trả'),
(179, 33, 'TB03', '', 'B04', 0, '2026-08-29 20:26:59', NULL, 'Đã trả'),
(180, 33, 'TB01', '', 'A02', 0, '2026-08-29 20:30:35', NULL, 'Đã trả'),
(181, 33, 'CA1', '', 'A03', 0, '2026-08-29 20:31:39', NULL, 'Đã trả'),
(182, 32, 'CA1', 'USB', '1', 3, '2026-08-29 20:38:38', '2026-08-29 20:39:26', 'Đã trả'),
(183, 32, 'CA1', 'USB', 'A03', 4, '2026-08-29 20:47:27', '2026-08-29 20:47:38', 'Đã trả'),
(184, 40, 'CA1', 'USB', '1', 0, '2026-09-06 20:47:00', '2026-09-06 20:49:34', 'Đã trả'),
(185, 45, 'TB06', '', '1', 0, '2026-09-06 20:50:20', NULL, 'Đã trả'),
(186, 40, 'CA1', 'USB', '1', 0, '2026-09-07 14:45:11', '2026-09-07 14:45:37', 'Đã trả'),
(187, 40, 'CA1', 'USB', '1', 0, '2026-09-07 14:47:02', '2026-09-07 14:52:24', 'Đã trả'),
(188, 40, 'TB01', 'Micro', '1', 0, '2026-09-07 14:53:10', '2026-09-07 14:53:20', 'Đã trả'),
(189, 40, 'CA1', 'USB', '1', 0, '2026-09-07 14:52:42', NULL, 'Từ chối'),
(190, 40, 'CA1', 'USB', '1', 0, '2026-09-07 15:03:03', '2026-09-07 15:04:00', 'Đã trả'),
(191, 40, 'CA1', 'USB', '1', 0, '2026-09-07 15:04:14', '2026-09-07 15:05:06', 'Đã trả'),
(192, 40, 'CA1', 'USB', '1', 0, '2026-09-07 15:05:48', '2026-09-07 15:07:26', 'Đã trả'),
(193, 40, 'CA1', 'USB', '1', 0, '2026-09-07 15:08:15', '2026-09-07 15:08:23', 'Đã trả'),
(194, 40, 'CA1', 'USB', '1', 1, '2026-09-07 15:20:32', '2026-09-07 15:20:49', 'Đã trả'),
(195, 40, 'CA1', 'USB', '1', 1, '2026-09-07 15:20:32', '2026-09-07 15:20:49', 'Đã trả'),
(196, 45, 'CA1', '', '1', 0, '2026-09-07 15:23:06', NULL, 'Đã duyệt (GV)'),
(197, 45, 'CA1', '', '1', 0, '2026-09-07 15:25:48', NULL, 'Đã trả'),
(198, 45, 'CA1', '', '1', 0, '2026-09-07 15:25:53', NULL, 'Đã trả'),
(199, 45, 'CA1', '', '1', 0, '2026-09-07 15:25:55', NULL, 'Đã trả'),
(200, 45, 'CA1', '', '1', 0, '2026-09-07 15:26:00', NULL, 'Đã trả'),
(201, 45, 'CA1', '', '1', 0, '2026-09-07 15:26:02', NULL, 'Đã trả'),
(202, 45, 'CA1', '', '1', 0, '2026-09-07 15:26:04', NULL, 'Đã trả'),
(203, 45, 'CA1', '', '1', 0, '2026-09-07 15:26:06', NULL, 'Đã trả'),
(204, 45, 'CA1', '', '1', 0, '2026-09-07 15:26:10', NULL, 'Đã trả'),
(205, 45, 'CA1', '', '1', 0, '2026-09-07 15:26:13', NULL, 'Đã trả'),
(206, 45, 'CA1', '', '1', 0, '2026-09-07 15:26:15', NULL, 'Đã trả'),
(207, 45, 'CA1', '', '1', 0, '2026-09-07 15:26:17', NULL, 'Đã trả'),
(208, 40, 'TB06', 'Bút trình chiếu', '1', 1, '2026-09-07 15:31:38', '2026-09-07 15:31:45', 'Đã trả'),
(209, 40, 'TB06', 'Bút trình chiếu', 'A02', 1, '2026-09-07 15:31:30', NULL, 'Từ chối'),
(210, 40, 'TB01', 'Micro', '1', 1, '2026-09-07 16:00:12', '2026-09-07 16:00:40', 'Đã trả'),
(211, 40, 'TB06', 'Bút trình chiếu', '1', 1, '2026-09-07 16:00:34', '2026-09-07 16:00:40', 'Đã trả'),
(212, 40, 'TB06', 'Bút trình chiếu', 'A02', 1, '2026-09-07 16:00:08', NULL, 'Từ chối'),
(213, 40, 'TB06', 'Bút trình chiếu', '1', 1, '2026-09-07 16:00:30', NULL, 'Từ chối'),
(214, 40, 'TB06', 'Bút trình chiếu', '1', 1, '2026-09-07 16:00:56', '2026-09-07 16:01:02', 'Đã trả'),
(215, 40, 'TB06', 'Bút trình chiếu', 'A02', 1, '2026-09-07 16:00:50', NULL, 'Từ chối'),
(216, 40, 'TB06', 'Bút trình chiếu', '1', 1, '2026-09-07 16:01:07', NULL, 'Từ chối'),
(217, 40, 'TB06', 'Bút trình chiếu', 'A01', 1, '2026-09-07 16:01:29', '2026-09-07 16:01:42', 'Đã trả'),
(218, 40, 'TB01', 'Micro', 'A03', 1, '2026-09-07 16:01:33', '2026-09-07 16:01:43', 'Đã trả'),
(219, 40, 'TB01', 'Micro', 'A02', 1, '2026-09-07 16:01:27', '2026-09-07 16:01:43', 'Đã trả'),
(220, 40, 'TB06', 'Bút trình chiếu', '1', 1, '2026-09-07 16:02:08', NULL, 'Từ chối'),
(221, 45, 'TB06', '', '1', 0, '2026-09-07 16:02:14', NULL, 'Đã trả'),
(222, 45, 'TB06', '', '1', 0, '2026-09-07 16:02:55', NULL, 'Đã trả'),
(223, 45, 'TB01', '', '1', 0, '2026-09-07 16:04:24', NULL, 'Đã trả'),
(224, 45, 'TB06', '', '1', 0, '2026-09-07 16:05:23', NULL, 'Đã duyệt (GV)');

-- --------------------------------------------------------

--
-- Table structure for table `phong_lab`
--

CREATE TABLE `phong_lab` (
  `MaPhong` varchar(20) NOT NULL,
  `TenPhong` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phong_lab`
--

INSERT INTO `phong_lab` (`MaPhong`, `TenPhong`) VALUES
('1', '123'),
('A01', 'Phòng tin học A01'),
('A02', 'Phòng tin học A02'),
('A03', 'Phòng tin học A03'),
('A04', 'Phòng tin học A04'),
('A05', 'Phòng tin học A05'),
('B01', 'Phòng học B01'),
('B02', 'Phòng học B02'),
('B03', 'Phòng học B03'),
('B04', 'Phòng học B04'),
('B05', 'Phòng học B05'),
('B06', 'Phòng học B06'),
('B07', 'Phòng học B07'),
('B08', 'Phòng học B08'),
('B09', 'Phòng học B09'),
('B10', 'Phòng học B10'),
('C01', 'Phòng thực hành C01'),
('C02', 'Phòng thực hành C02'),
('C03', 'Phòng thực hành C03'),
('C04', 'Phòng thực hành C04');

-- --------------------------------------------------------

--
-- Table structure for table `thiet_bi`
--

CREATE TABLE `thiet_bi` (
  `MaThietBi` varchar(20) NOT NULL,
  `MaPhong` varchar(20) NOT NULL,
  `TenThietBi` varchar(100) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TinhTrang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thiet_bi`
--

INSERT INTO `thiet_bi` (`MaThietBi`, `MaPhong`, `TenThietBi`, `SoLuong`, `TinhTrang`) VALUES
('CA1', 'A01', 'USB', 23, 'Tốt'),
('TB01', 'A01', 'Micro', 10, 'Tốt'),
('TB02', 'A01', 'Điều khiển máy chiếu', 10, 'Tốt'),
('TB03', 'A03', 'Điều khiển máy lạnh', 12, 'Tốt'),
('TB04', 'A04', 'Dây âm thanh', 11, 'Tốt'),
('TB05', 'A05', 'Cáp HDMI', 10, 'Tốt'),
('TB06', 'B01', 'Bút trình chiếu', 1, 'Mới');

-- --------------------------------------------------------

--
-- Table structure for table `thiet_bi_muon`
--

CREATE TABLE `thiet_bi_muon` (
  `MaPhieuMuon` int(11) NOT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `MaThietBi` varchar(10) NOT NULL,
  `MaPhong` varchar(10) NOT NULL,
  `TenThietBi` varchar(200) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thiet_bi_muon`
--

INSERT INTO `thiet_bi_muon` (`MaPhieuMuon`, `MaNguoiDung`, `MaThietBi`, `MaPhong`, `TenThietBi`, `SoLuong`) VALUES
(196, 45, 'CA1', '1', 'USB', 1),
(224, 45, 'TB06', '1', 'Bút trình chiếu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thong_bao_nhac_nho`
--

CREATE TABLE `thong_bao_nhac_nho` (
  `id` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `tieu_de` varchar(255) DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `thoi_gian` timestamp NOT NULL DEFAULT current_timestamp(),
  `da_doc` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thong_bao_nhac_nho`
--

INSERT INTO `thong_bao_nhac_nho` (`id`, `ma_nguoi_dung`, `tieu_de`, `noi_dung`, `thoi_gian`, `da_doc`) VALUES
(36, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 163\nThiết bị USB - (CA1), số lượng 5, phòng 1 vào lúc 29/08/2026 17:19.\nPhiếu đã được duyệt mượn.\n        ', '2026-08-29 09:19:14', 1),
(37, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 164\nThiết bị USB - (CA1), số lượng 2, phòng A03 vào lúc 29/08/2026 17:25.\nPhiếu đã được duyệt mượn.\n        ', '2026-08-29 09:28:01', 1),
(38, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 163\nThiết bị USB - (CA1), số lượng 5, phòng 1 vào lúc 29/08/2026 17:19.\nPhiếu đã được duyệt trả.\n        ', '2026-08-29 09:28:03', 1),
(39, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 164\nThiết bị USB - (CA1), số lượng 2, phòng A03 vào lúc 29/08/2026 17:28.\nPhiếu đã được duyệt trả.\n        ', '2026-08-29 09:28:03', 1),
(40, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 165\nThiết bị USB - (CA1), số lượng 1, phòng 1 vào lúc 29/08/2026 18:27.\nPhiếu đã bị từ chối.\n        ', '2026-08-29 11:35:40', 1),
(41, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 166\nThiết bị USB - (CA1), số lượng 10, phòng 1 vào lúc 29/08/2026 19:33.\nPhiếu đã được duyệt mượn.\n        ', '2026-08-29 11:37:05', 1),
(42, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 167\nThiết bị USB - (CA1), số lượng 9, phòng A02 vào lúc 2026-08-29 19:37:00.\nPhiếu đã bị từ chối.\n        ', '2026-08-29 11:42:21', 1),
(43, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 170\nThiết bị Micro - (TB01), số lượng 1, phòng A04 vào lúc 29/08/2026 19:44.\nPhiếu đã được duyệt mượn.\n        ', '2026-08-29 11:44:09', 1),
(44, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 168\nThiết bị Micro - (TB01), số lượng 7, phòng 1 vào lúc 29/08/2026 19:43.\nPhiếu đã được duyệt mượn.\n        ', '2026-08-29 11:45:00', 1),
(45, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 169\nThiết bị Micro - (TB01), số lượng 6, phòng A03 vào lúc 2026-08-29 19:43:57.\nPhiếu đã bị từ chối.\n        ', '2026-08-29 11:45:00', 1),
(46, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 166\nThiết bị USB - (CA1), số lượng 10, phòng 1 vào lúc 29/08/2026 19:37.\nPhiếu đã được duyệt trả.\n        ', '2026-08-29 11:45:16', 1),
(47, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 168\nThiết bị Micro - (TB01), số lượng 7, phòng 1 vào lúc 29/08/2026 19:45.\nPhiếu đã được duyệt trả.\n        ', '2026-08-29 11:45:16', 1),
(48, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 170\nThiết bị Micro - (TB01), số lượng 1, phòng A04 vào lúc 29/08/2026 19:44.\nPhiếu đã được duyệt trả.\n        ', '2026-08-29 11:45:17', 1),
(49, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 182\nThiết bị USB - (CA1), số lượng 3, phòng 1 vào lúc 29/08/2026 20:35.\nPhiếu đã được duyệt mượn.\n        ', '2026-08-29 12:38:38', 0),
(50, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 182\nThiết bị USB - (CA1), số lượng 3, phòng 1 vào lúc 29/08/2026 20:38.\nPhiếu đã được duyệt trả.\n        ', '2026-08-29 12:39:26', 0),
(51, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 183\nThiết bị USB - (CA1), số lượng 4, phòng A03 vào lúc 29/08/2026 20:46.\nPhiếu đã được duyệt mượn.\n        ', '2026-08-29 12:47:27', 0),
(52, 32, 'Phiếu mượn thiết bị', '\nPhiếu mượn thiết bị 183\nThiết bị USB - (CA1), số lượng 4, phòng A03 vào lúc 29/08/2026 20:47.\nPhiếu đã được duyệt trả.\n        ', '2026-08-29 12:47:38', 0),
(53, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 184\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 06/09/2026 20:46.\nPhiếu đã được duyệt mượn.', '2026-09-06 12:47:00', 0),
(54, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 184\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 06/09/2026 20:47.\nPhiếu đã được duyệt trả.', '2026-09-06 12:49:34', 0),
(55, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 186\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 14:45.\nPhiếu đã được duyệt mượn.', '2026-09-07 06:45:11', 0),
(56, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 186\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 14:45.\nPhiếu đã được duyệt trả.', '2026-09-07 06:45:37', 0),
(57, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 187\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 14:45.\nPhiếu đã được duyệt mượn.', '2026-09-07 06:47:03', 0),
(58, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 187\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 14:47.\nPhiếu đã được duyệt trả.', '2026-09-07 06:52:24', 0),
(59, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 188\nThiết bị Micro - (TB01), số lượng 10, phòng 1 vào lúc 07/09/2026 14:52.\nPhiếu đã được duyệt mượn.', '2026-09-07 06:53:10', 0),
(60, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 189\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 14:52.\nPhiếu đã bị từ chối.', '2026-09-07 06:53:15', 0),
(61, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 188\nThiết bị Micro - (TB01), số lượng 10, phòng 1 vào lúc 07/09/2026 14:53.\nPhiếu đã được duyệt trả.', '2026-09-07 06:53:20', 0),
(62, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 190\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 15:02.\nPhiếu đã được duyệt mượn.', '2026-09-07 07:03:03', 0),
(63, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 190\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 15:03.\nPhiếu đã được duyệt trả.', '2026-09-07 07:04:00', 0),
(64, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 191\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 15:04.\nPhiếu đã được duyệt mượn.', '2026-09-07 07:04:15', 0),
(65, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 191\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 15:04.\nPhiếu đã được duyệt trả.', '2026-09-07 07:05:06', 0),
(66, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 192\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 15:05.\nPhiếu đã được duyệt mượn.', '2026-09-07 07:05:48', 0),
(67, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 192\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 15:05.\nPhiếu đã được duyệt trả.', '2026-09-07 07:07:26', 0),
(68, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 193\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 15:07.\nPhiếu đã được duyệt mượn.', '2026-09-07 07:08:15', 0),
(69, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 193\nThiết bị USB - (CA1), số lượng 12, phòng 1 vào lúc 07/09/2026 15:08.\nPhiếu đã được duyệt trả.', '2026-09-07 07:08:23', 0),
(70, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 194\nThiết bị USB - (CA1), số lượng 1, phòng 1 vào lúc 07/09/2026 15:09.\nPhiếu đã được duyệt mượn.', '2026-09-07 07:20:32', 0),
(71, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 195\nThiết bị USB - (CA1), số lượng 1, phòng 1 vào lúc 07/09/2026 15:10.\nPhiếu đã được duyệt mượn.', '2026-09-07 07:20:33', 0),
(72, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 194\nThiết bị USB - (CA1), số lượng 1, phòng 1 vào lúc 07/09/2026 15:20.\nPhiếu đã được duyệt trả.', '2026-09-07 07:20:49', 0),
(73, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 195\nThiết bị USB - (CA1), số lượng 1, phòng 1 vào lúc 07/09/2026 15:20.\nPhiếu đã được duyệt trả.', '2026-09-07 07:20:49', 0),
(74, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 208\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng 1 vào lúc 07/09/2026 15:31.\nPhiếu đã được duyệt mượn.', '2026-09-07 07:31:39', 0),
(75, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 209\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng A02 vào lúc 2026-09-07 15:31:30.\nPhiếu đã bị từ chối.', '2026-09-07 07:31:39', 0),
(76, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 208\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng 1 vào lúc 07/09/2026 15:31.\nPhiếu đã được duyệt trả.', '2026-09-07 07:31:45', 0),
(77, 0, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị undefined\nThiết bị undefined - (undefined), số lượng undefined, phòng undefined vào lúc undefined.\nPhiếu đã bị từ chối.', '2026-09-07 07:59:58', 0),
(78, 0, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị undefined\nThiết bị undefined - (undefined), số lượng undefined, phòng undefined vào lúc undefined.\nPhiếu đã bị từ chối.', '2026-09-07 07:59:58', 0),
(79, 0, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị undefined\nThiết bị undefined - (undefined), số lượng undefined, phòng undefined vào lúc undefined.\nPhiếu đã bị từ chối.', '2026-09-07 08:00:10', 0),
(80, 0, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị undefined\nThiết bị undefined - (undefined), số lượng undefined, phòng undefined vào lúc undefined.\nPhiếu đã bị từ chối.', '2026-09-07 08:00:10', 0),
(81, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 210\nThiết bị Micro - (TB01), số lượng 1, phòng 1 vào lúc 07/09/2026 16:00.\nPhiếu đã được duyệt mượn.', '2026-09-07 08:00:12', 0),
(82, 0, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị undefined\nThiết bị undefined - (undefined), số lượng undefined, phòng undefined vào lúc undefined.\nPhiếu đã bị từ chối.', '2026-09-07 08:00:12', 0),
(83, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 211\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng 1 vào lúc 07/09/2026 16:00.\nPhiếu đã được duyệt mượn.', '2026-09-07 08:00:34', 0),
(84, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 213\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng 1 vào lúc 2026-09-07 16:00:30.\nPhiếu đã bị từ chối.', '2026-09-07 08:00:34', 0),
(85, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 212\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng A02 vào lúc 2026-09-07 16:00:08.\nPhiếu đã bị từ chối.', '2026-09-07 08:00:34', 0),
(86, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 210\nThiết bị Micro - (TB01), số lượng 1, phòng 1 vào lúc 07/09/2026 16:00.\nPhiếu đã được duyệt trả.', '2026-09-07 08:00:40', 0),
(87, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 211\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng 1 vào lúc 07/09/2026 16:00.\nPhiếu đã được duyệt trả.', '2026-09-07 08:00:40', 0),
(88, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 214\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng 1 vào lúc 07/09/2026 16:00.\nPhiếu đã được duyệt mượn.', '2026-09-07 08:00:56', 0),
(89, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 215\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng A02 vào lúc 2026-09-07 16:00:50.\nPhiếu đã bị từ chối.', '2026-09-07 08:00:56', 0),
(90, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 214\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng 1 vào lúc 07/09/2026 16:00.\nPhiếu đã được duyệt trả.', '2026-09-07 08:01:02', 0),
(91, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 219\nThiết bị Micro - (TB01), số lượng 1, phòng A02 vào lúc 07/09/2026 16:01.\nPhiếu đã được duyệt mượn.', '2026-09-07 08:01:27', 0),
(92, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 217\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng A01 vào lúc 07/09/2026 16:01.\nPhiếu đã được duyệt mượn.', '2026-09-07 08:01:29', 0),
(93, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 216\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng 1 vào lúc 2026-09-07 16:01:07.\nPhiếu đã bị từ chối.', '2026-09-07 08:01:29', 0),
(94, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 218\nThiết bị Micro - (TB01), số lượng 1, phòng A03 vào lúc 07/09/2026 16:01.\nPhiếu đã được duyệt mượn.', '2026-09-07 08:01:33', 0),
(95, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 217\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng A01 vào lúc 07/09/2026 16:01.\nPhiếu đã được duyệt trả.', '2026-09-07 08:01:42', 0),
(96, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 218\nThiết bị Micro - (TB01), số lượng 1, phòng A03 vào lúc 07/09/2026 16:01.\nPhiếu đã được duyệt trả.', '2026-09-07 08:01:43', 0),
(97, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 219\nThiết bị Micro - (TB01), số lượng 1, phòng A02 vào lúc 07/09/2026 16:01.\nPhiếu đã được duyệt trả.', '2026-09-07 08:01:43', 0),
(98, 40, 'Phiếu mượn thiết bị', 'Phiếu mượn thiết bị 220\nThiết bị Bút trình chiếu - (TB06), số lượng 1, phòng 1 vào lúc 2026-09-07 16:02:08.\nPhiếu đã bị từ chối.', '2026-09-07 08:02:17', 0),
(99, 45, '1', '123', '2026-09-07 08:08:46', 0),
(100, 40, '223', '213', '2026-09-07 08:08:49', 0),
(102, 0, '[value-3]', '[value-4]', '0000-00-00 00:00:00', 0),
(103, -1, 'GV nhắn', '1123', '2026-09-07 08:48:14', 1),
(104, -1, 'SV nhắn', '3232', '2026-09-07 08:49:27', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bang_lich_su_muon_tra`
--
ALTER TABLE `bang_lich_su_muon_tra`
  ADD PRIMARY KEY (`MaLichSu`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`MaNguoiDung`);

--
-- Indexes for table `phieu_muon`
--
ALTER TABLE `phieu_muon`
  ADD PRIMARY KEY (`MaPhieuMuon`);

--
-- Indexes for table `phong_lab`
--
ALTER TABLE `phong_lab`
  ADD PRIMARY KEY (`MaPhong`);

--
-- Indexes for table `thiet_bi`
--
ALTER TABLE `thiet_bi`
  ADD PRIMARY KEY (`MaThietBi`);

--
-- Indexes for table `thiet_bi_muon`
--
ALTER TABLE `thiet_bi_muon`
  ADD PRIMARY KEY (`MaPhieuMuon`);

--
-- Indexes for table `thong_bao_nhac_nho`
--
ALTER TABLE `thong_bao_nhac_nho`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bang_lich_su_muon_tra`
--
ALTER TABLE `bang_lich_su_muon_tra`
  MODIFY `MaLichSu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `MaNguoiDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `phieu_muon`
--
ALTER TABLE `phieu_muon`
  MODIFY `MaPhieuMuon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `thong_bao_nhac_nho`
--
ALTER TABLE `thong_bao_nhac_nho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
