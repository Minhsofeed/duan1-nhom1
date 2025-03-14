-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2024 at 02:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(1, 6, 19, 200000.00, 1, 450000.00);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(15, 1, 17, 6);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `ten_chuc_vu`) VALUES
(1, 'Quản trị viên'),
(2, 'Khách Hàng');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(1, 'Giầy Đá Bóng', NULL),
(2, 'Quần Áo Bóng Đá ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dia_chi_nguoi_nhan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` float NOT NULL,
  `ghi_chu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL,
  `voucher_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`, `voucher_id`) VALUES
(1, '#GDB01', 1, 'Nguyễn Văn Hùng ', 'hungnv@gmail.com', '0868020588', 'Hà Nội', '2024-11-21', 200000, NULL, 1, 1, NULL),
(2, '#GDB02', 2, 'Trần Minh Tuấn', 'tuan.tm@gmail.com', '0912345678', 'Hồ Chí Minh', '2024-11-20', 350000, NULL, 1, 2, NULL),
(3, '#GDB03', 3, 'Lê Thị Mai', 'mai.lt@gmail.com', '0908765432', 'Đà Nẵng', '2024-11-19', 150000, NULL, 2, 1, NULL),
(4, '#GDB04', 4, 'Phạm Văn Quân', 'quan.pv@gmail.com', '0987766555', 'Cần Thơ', '2024-11-18', 250000, NULL, 1, 2, NULL),
(5, '#GDB05', 5, 'Ngô Thị Lan', 'lan.ngo@gmail.com', '0976655444', 'Quảng Ninh', '2024-11-17', 180000, NULL, 2, 1, NULL),
(6, '#GDB06', 6, 'Bùi Minh Tâm', 'tam.bm@gmail.com', '0911223344', 'Bắc Giang', '2024-11-16', 120000, NULL, 1, 2, NULL),
(7, '#GDB07', 7, 'Dương Thanh Sơn', 'son.dts@gmail.com', '0922334455', 'Nghệ An', '2024-11-15', 300000, NULL, 2, 1, NULL),
(8, 'GB-3251', 19, 'trang chủ', 'trangchu1@gmail.com', '', '', '2024-12-03', 33030000, '', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(1, 5),
(2, 6),
(3, 7),
(4, 8),
(5, 9),
(6, 14);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `link_hinh_anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kho_hang`
--

CREATE TABLE `kho_hang` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong_ton` int NOT NULL,
  `ngay_cap_nhat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kich_thuocs`
--

CREATE TABLE `kich_thuocs` (
  `id` int NOT NULL,
  `ten_kich_thuoc` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mau_sacs`
--

CREATE TABLE `mau_sacs` (
  `id` int NOT NULL,
  `ten_mau` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ma_mau_hex` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'Ship COD'),
(2, 'Thanh Toán Online');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gia_san_pham` int NOT NULL,
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL,
  `hinh_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `so_luong` int NOT NULL,
  `luot_xem` int DEFAULT '0',
  `ngay_nhap` date NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `danh_muc_id` int NOT NULL,
  `trang_thai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(17, 'Đồng phục thi đấu Man city mùa 2024-2025', 1300000, 3000000.00, 'ao-mancity.jpg', 1, 0, '2024-12-17', '', 1, 1),
(18, 'áo thi dortmun mùa 24/25', 25000000, 0.00, 'ao-dortmun.jpeg', 1, 0, '2024-12-18', '', 1, 1),
(19, 'áo asenal ', 200000000, 1222222.00, 'ao-arsenal-2022.jpg', 1, 0, '2024-12-17', 'Áo thi đấu mùa giải mới ', 1, 1),
(20, 'giày puma sneaker', 240000, 12000000.00, 'giay1.jpg', 5, 0, '2024-12-12', '', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham_kich_thuocs`
--

CREATE TABLE `san_pham_kich_thuocs` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `kich_thuoc_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_pham_mau_sacs`
--

CREATE TABLE `san_pham_mau_sacs` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `mau_sac_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `anh_dai_dien` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `so_dien_thoai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gioi_tinh` tinyint(1) DEFAULT NULL,
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `chuc_vu_id` int NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(1, 'Nguyễn Văn Hùng', NULL, '2010-04-15', 'hungnv@gmail.com', '0868020588', 1, 'Hà Nội', '123456', 2, 2),
(2, 'Trần Minh Tuấn', 'Untitled-Copy of Page-1.png', '1992-07-22', 'tuan.tm@gmail.com', '0912345678', 1, 'Hồ Chí Minh', '$2y$10$03QpUBwIRaXMHKSoRbKlzuAETMik/zAopA2paZxDCP9ut1h4a1kxS', 1, 2),
(5, 'Lê Thị Mai', NULL, '1985-03-10', 'mai.lt@gmail.com', '0908765432', 0, 'Đà Nẵng', '123456', 1, 1),
(6, 'Phạm Văn Quân', NULL, '1996-11-05', 'quan.pv@gmail.com', '0987766555', 1, 'Cần Thơ', '123456', 2, 2),
(7, 'Ngô Thị Lan', NULL, '1990-08-14', 'lan.ngo@gmail.com', '0976655444', 0, 'Quảng Ninh', '123456', 1, 2),
(8, 'Bùi Minh Tâm', NULL, '1988-12-25', 'tam.bm@gmail.com', '0911223344', 1, 'Bắc Giang', '123456', 2, 1),
(9, 'Dương Thanh Sơn', NULL, '1995-06-17', 'son.dts@gmail.com', '0922334455', 1, 'Nghệ An', '123456', 1, 2),
(10, 'Vũ Minh Tuân', NULL, '2000-09-30', 'tuan.vm@gmail.com', '0933445566', 1, 'Hải Phòng', '123456', 2, 1),
(11, 'Nguyễn Thiên Thanh', NULL, '1993-01-18', 'thanh.nt@gmail.com', '0900112233', 0, 'Thanh Hóa', '123456', 1, 2),
(12, 'Vũ Thi Khánh Ly', 'Untitled.png', NULL, 'phanvietminh23@gmail.com', '012345', 2, 'Hà nội ', '$2y$10$/h7nXWW8uJJmG2H9.YObae.nrQQ9YDGRCW5xd8PZSfg0fq/1tLxA2', 1, 1),
(13, 'hai', NULL, NULL, 'hai@gmail.com', NULL, NULL, NULL, '$2y$10$TWKt6vaB.C692K7S8gmyn.mZMqqpBwaiFKTVDKQI8UJscbWYAzznG', 2, 1),
(14, 'lí', NULL, NULL, 'li@gmail.com', '09975665', 0, 'Hà nội 123', '$2y$10$q9msRrjHRPq5ASVkppQccuvfjLSifWMQPAnSIC3ODgUPFgu0ENu/6', 2, 1),
(15, 'Nguyễn trường Giang123', 'ao-arsenal-2022.jpg', NULL, 'phanvietminh2322@gmail.com', '012345678', 1, 'Hà nội ', '$2y$10$ulTYn9S8kIwdz2gaXZWQ8.p8sRWykemC6JCQdwqVhPJGT8q2Gbhkm', 1, 1),
(16, 'Nguyễn trường Giang123', 'logo.jpg', NULL, 'minh124@gmail.com', '012345', 1, 'Hà nội ', '$2y$10$AWJ.aOX4QtDjFpb8oZFkPe5be7BEVCC/pKdwq1KNNQhe2/Ks0SDPC', 1, 1),
(20, 'minh', NULL, '2024-11-05', 'minh@gmail.com', '0343991334', 1, 'hà nội', '123456', 1, 1),
(21, 'Nguyễn trường Giang123', 'giay1.jpg', NULL, '123@gmail.com', '012345', 1, 'Hà nội ', '$2y$10$ZCFBoCjucDKlwTpQMKzYI.IQDt3BxuA7E03bR82wBNIYlkloBAmWC', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Đang xử lý'),
(4, 'Đã đóng gói'),
(5, 'Đang giao hàng'),
(6, 'Đã giao hàng'),
(7, 'Đã hủy'),
(8, 'Hoàn trả'),
(9, 'Hoàn tiền'),
(10, 'Thất lạc');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int NOT NULL,
  `ma_voucher` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `gia_tri_giam_gia` decimal(10,2) NOT NULL,
  `loai_giam_gia` enum('percent','fixed') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_binh_luans_san_phams` (`san_pham_id`),
  ADD KEY `fk_binh_luans_tai_khoans` (`tai_khoan_id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chi_tiet_don_hangs_don_hangs` (`don_hang_id`),
  ADD KEY `fk_chi_tiet_don_hangs_san_phams` (`san_pham_id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chi_tiet_gio_hangs_gio_hangs` (`gio_hang_id`),
  ADD KEY `fk_chi_tiet_gio_hangs_san_phams` (`san_pham_id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_don_hangs_vouchers` (`voucher_id`),
  ADD KEY `fk_don_hangs_phuong_thuc_thanh_toans` (`phuong_thuc_thanh_toan_id`),
  ADD KEY `fk_don_hangs_trang_thai_don_hangs` (`trang_thai_id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gio_hangs_tai_khoans` (`tai_khoan_id`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hinh_anh_san_phams_san_phams` (`san_pham_id`);

--
-- Indexes for table `kho_hang`
--
ALTER TABLE `kho_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kho_hang_san_phams` (`san_pham_id`);

--
-- Indexes for table `kich_thuocs`
--
ALTER TABLE `kich_thuocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_san_phams_danh_mucs` (`danh_muc_id`);

--
-- Indexes for table `san_pham_kich_thuocs`
--
ALTER TABLE `san_pham_kich_thuocs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_san_pham_kich_thuocs_san_phams` (`san_pham_id`),
  ADD KEY `fk_san_pham_kich_thuocs_kich_thuocs` (`kich_thuoc_id`);

--
-- Indexes for table `san_pham_mau_sacs`
--
ALTER TABLE `san_pham_mau_sacs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_san_pham_mau_sacs_san_phams` (`san_pham_id`),
  ADD KEY `fk_san_pham_mau_sacs_mau_sacs` (`mau_sac_id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_tai_khoans_chuc_vus` (`chuc_vu_id`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kho_hang`
--
ALTER TABLE `kho_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kich_thuocs`
--
ALTER TABLE `kich_thuocs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `san_pham_kich_thuocs`
--
ALTER TABLE `san_pham_kich_thuocs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_pham_mau_sacs`
--
ALTER TABLE `san_pham_mau_sacs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD CONSTRAINT `fk_binh_luans_san_phams` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_binh_luans_tai_khoans` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `fk_chi_tiet_don_hangs_don_hangs` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_chi_tiet_don_hangs_san_phams` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD CONSTRAINT `fk_chi_tiet_gio_hangs_gio_hangs` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_chi_tiet_gio_hangs_san_phams` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `fk_don_hangs_phuong_thuc_thanh_toans` FOREIGN KEY (`phuong_thuc_thanh_toan_id`) REFERENCES `phuong_thuc_thanh_toans` (`id`),
  ADD CONSTRAINT `fk_don_hangs_trang_thai_don_hangs` FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai_don_hangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_don_hangs_vouchers` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`);

--
-- Constraints for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `fk_gio_hangs_tai_khoans` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD CONSTRAINT `fk_hinh_anh_san_phams_san_phams` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kho_hang`
--
ALTER TABLE `kho_hang`
  ADD CONSTRAINT `fk_kho_hang_san_phams` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `fk_san_phams_danh_mucs` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`);

--
-- Constraints for table `san_pham_kich_thuocs`
--
ALTER TABLE `san_pham_kich_thuocs`
  ADD CONSTRAINT `fk_san_pham_kich_thuocs_kich_thuocs` FOREIGN KEY (`kich_thuoc_id`) REFERENCES `kich_thuocs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_san_pham_kich_thuocs_san_phams` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `san_pham_kich_thuocs_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `san_pham_kich_thuocs_ibfk_2` FOREIGN KEY (`kich_thuoc_id`) REFERENCES `kich_thuocs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `san_pham_mau_sacs`
--
ALTER TABLE `san_pham_mau_sacs`
  ADD CONSTRAINT `fk_san_pham_mau_sacs_mau_sacs` FOREIGN KEY (`mau_sac_id`) REFERENCES `mau_sacs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_san_pham_mau_sacs_san_phams` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `san_pham_mau_sacs_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `san_pham_mau_sacs_ibfk_2` FOREIGN KEY (`mau_sac_id`) REFERENCES `mau_sacs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD CONSTRAINT `fk_tai_khoans_chuc_vus` FOREIGN KEY (`chuc_vu_id`) REFERENCES `chuc_vus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
