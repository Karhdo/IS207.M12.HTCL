-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 11, 2021 lúc 04:00 PM
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
-- Cơ sở dữ liệu: `QuanLyNhanSu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `CHINHANH`
--

CREATE TABLE `CHINHANH` (
  `MaChiNhanh` varchar(40) NOT NULL,
  `TenChiNhanh` varchar(40) NOT NULL,
  `DiaChi` varchar(40) NOT NULL,
  `MaCongTy` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `CHINHANH`
--

INSERT INTO `CHINHANH` (`MaChiNhanh`, `TenChiNhanh`, `DiaChi`, `MaCongTy`) VALUES
('CN01', 'Hà Nội', '76 Nguyễn Công Phương, Q.Hoàng Mai', 'CT01'),
('CN02', 'Đà Lạt', '123 Nguyễn Trãi', 'CT02'),
('CN03', 'Khánh Hoà', '274 Bùi Thị Xuân', 'CT03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `CONGTY`
--

CREATE TABLE `CONGTY` (
  `MaCongTy` varchar(40) NOT NULL,
  `TenCongTy` varchar(40) NOT NULL,
  `DiaChi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `CONGTY`
--

INSERT INTO `CONGTY` (`MaCongTy`, `TenCongTy`, `DiaChi`) VALUES
('CT01', 'Thế Giới Di Động', '125 Lê Văn Việt, Q.Thủ Đức, TP HCM'),
('CT02', 'CellPhoneS', '16 Hùng Vương, Q.Cầu Giấy, Hà Nội'),
('CT03', 'Viễn Thông A', '136 Nguyễn Thái Học, Q.1, TP HCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `NHANVIEN`
--

CREATE TABLE `NHANVIEN` (
  `MaNhanVien` varchar(40) NOT NULL,
  `TenNhanVien` varchar(40) NOT NULL,
  `LuongThang` float NOT NULL,
  `GioiTinh` tinyint(4) NOT NULL,
  `MaPhong` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `NHANVIEN`
--

INSERT INTO `NHANVIEN` (`MaNhanVien`, `TenNhanVien`, `LuongThang`, `GioiTinh`, `MaPhong`) VALUES
('NV01', 'Đỗ Minh Khánh', 25000000, 1, 'PB03'),
('NV02', 'Võ Phạm Duy Đức', 23000000, 1, 'PB03'),
('NV03', 'Phạm Anh Khoa', 30000000, 1, 'PB04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `PHONGBAN`
--

CREATE TABLE `PHONGBAN` (
  `MaPhong` varchar(40) NOT NULL,
  `TenPhong` varchar(40) NOT NULL,
  `MaChiNhanh` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `PHONGBAN`
--

INSERT INTO `PHONGBAN` (`MaPhong`, `TenPhong`, `MaChiNhanh`) VALUES
('PB01', 'Marketing', 'CN01'),
('PB02', 'Nhân sự', 'CN01'),
('PB03', 'Marketing', 'CN02'),
('PB04', 'Nhân sự', 'CN02');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `CHINHANH`
--
ALTER TABLE `CHINHANH`
  ADD PRIMARY KEY (`MaChiNhanh`),
  ADD KEY `MaCongTy` (`MaCongTy`);

--
-- Chỉ mục cho bảng `CONGTY`
--
ALTER TABLE `CONGTY`
  ADD PRIMARY KEY (`MaCongTy`);

--
-- Chỉ mục cho bảng `NHANVIEN`
--
ALTER TABLE `NHANVIEN`
  ADD PRIMARY KEY (`MaNhanVien`),
  ADD KEY `MaPhong` (`MaPhong`);

--
-- Chỉ mục cho bảng `PHONGBAN`
--
ALTER TABLE `PHONGBAN`
  ADD PRIMARY KEY (`MaPhong`),
  ADD KEY `MaChiNhanh` (`MaChiNhanh`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `CHINHANH`
--
ALTER TABLE `CHINHANH`
  ADD CONSTRAINT `CHINHANH_ibfk_1` FOREIGN KEY (`MaCongTy`) REFERENCES `CONGTY` (`MaCongTy`);

--
-- Các ràng buộc cho bảng `NHANVIEN`
--
ALTER TABLE `NHANVIEN`
  ADD CONSTRAINT `NHANVIEN_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `PHONGBAN` (`MaPhong`);

--
-- Các ràng buộc cho bảng `PHONGBAN`
--
ALTER TABLE `PHONGBAN`
  ADD CONSTRAINT `PHONGBAN_ibfk_1` FOREIGN KEY (`MaChiNhanh`) REFERENCES `CHINHANH` (`MaChiNhanh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
