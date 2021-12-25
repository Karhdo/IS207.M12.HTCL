-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 03, 2021 lúc 08:02 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `QuanLySanPham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `HOADON`
--

CREATE TABLE `HOADON` (
  `SOHD` int(11) NOT NULL,
  `NGHD` datetime NOT NULL,
  `HOTENKH` varchar(50) NOT NULL,
  `SDT` char(15) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `DIACHI` varchar(50) NOT NULL,
  `TINH` varchar(20) NOT NULL,
  `QUAN` varchar(20) NOT NULL,
  `PHUONG` varchar(20) NOT NULL,
  `THANHTOAN` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `HOADON`
--

INSERT INTO `HOADON` (`SOHD`, `NGHD`, `HOTENKH`, `SDT`, `EMAIL`, `DIACHI`, `TINH`, `QUAN`, `PHUONG`, `THANHTOAN`) VALUES
(212411053, '2021-12-03 01:56:56', 'Tran Minh Hoang', '0123456789', 'minhhoang@gmail.com', '77 Hai Ba Trung', 'Ho Chi Minh', 'Thu Duc', 'Chanh Lo', 0),
(330342269, '2021-12-03 01:54:23', 'Vo Pham Duy Duc', '0987654321', 'duyduc@gmail.com', '123 Nguyen Trai', 'Ho Chi Minh', 'Quan 7', 'Nghia Chanh', 0),
(823624616, '2021-12-03 01:50:36', 'Do Trong Khanh', '0912345678', 'dotrongkhanh37@gmail.com', '123 Nguyen Cong Phuong', 'Quang Ngai', 'Quang Ngai', 'Quang Ngai', 0),
(859108619, '2021-12-03 01:59:26', 'Luong Minh Tri', '0765387267', 'triminh@gmail.com', '96 Hung Vuong', 'Ho Chi Minh', 'Quan 4', 'Tran Phu', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'trongkhanh1109', '110901'),
(2, 'duyduc1810', '181001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `QLSP`
--

CREATE TABLE `QLSP` (
  `SOHD` int(11) NOT NULL,
  `MASP` char(4) NOT NULL,
  `SL` int(11) NOT NULL,
  `DONGIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `QLSP`
--

INSERT INTO `QLSP` (`SOHD`, `MASP`, `SL`, `DONGIA`) VALUES
(823624616, 'SP01', 4, 20000),
(823624616, 'SP05', 1, 8000),
(823624616, 'SP06', 1, 15000),
(330342269, 'SP04', 2, 50000),
(330342269, 'SP03', 2, 40000),
(330342269, 'SP08', 2, 14000),
(212411053, 'SP01', 1, 5000),
(212411053, 'SP02', 1, 10000),
(212411053, 'SP03', 1, 20000),
(859108619, 'SP01', 1, 5000),
(859108619, 'SP04', 1, 25000),
(859108619, 'SP03', 1, 20000),
(859108619, 'SP08', 1, 7000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `SANPHAM`
--

CREATE TABLE `SANPHAM` (
  `MASP` char(4) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `DVT` varchar(50) NOT NULL,
  `NUOCSX` varchar(50) NOT NULL,
  `GIA` int(11) NOT NULL,
  `HINHANH` varchar(50) NOT NULL,
  `LOAISP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `SANPHAM`
--

INSERT INTO `SANPHAM` (`MASP`, `TenSP`, `DVT`, `NUOCSX`, `GIA`, `HINHANH`, `LOAISP`) VALUES
('SP01', 'Phan viet bang', 'hop', 'VietNam', 5000, './../image/phan.jpeg', 'phan'),
('SP02', 'Phan viet khong bui', 'hop', 'VietNam', 10000, './../image/phan.jpeg', 'phan'),
('SP03', 'But bi Thien Long', 'hop', 'VietNam', 20000, './../image/but.jpeg', 'but'),
('SP04', 'But muc Thien Long', 'hop', 'VietNam', 25000, './../image/but_muc.jpeg', 'but'),
('SP05', 'Vo 200 trang', 'cuon', 'VietNam', 8000, './../image/vo.jpeg', 'tap'),
('SP06', 'Bang hoc sinh Thien Long', 'cai', 'VietNam', 15000, './../image/bang.jpeg', 'bang'),
('SP07', 'Vo campus', 'cuon', 'VietNam', 10000, './../image/vo_2.jpeg', 'tap'),
('SP08', 'But muc do', 'cay', 'VietNam', 7000, './../image/but_muc_do.jpeg', 'but');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `HOADON`
--
ALTER TABLE `HOADON`
  ADD PRIMARY KEY (`SOHD`);

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `QLSP`
--
ALTER TABLE `QLSP`
  ADD KEY `SOHD` (`SOHD`),
  ADD KEY `QLSP_ibfk_1` (`MASP`);

--
-- Chỉ mục cho bảng `SANPHAM`
--
ALTER TABLE `SANPHAM`
  ADD PRIMARY KEY (`MASP`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `QLSP`
--
ALTER TABLE `QLSP`
  ADD CONSTRAINT `QLSP_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `SANPHAM` (`MaSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
