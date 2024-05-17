-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2023 lúc 03:12 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `myphoneshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `Order_details_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Num` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductPrice` int(255) NOT NULL,
  `ProductThumbnail` varchar(255) NOT NULL,
  `ProductStock` int(100) NOT NULL,
  `ProductType` varchar(255) NOT NULL,
  `ProductDescription` text NOT NULL,
  `ProductStatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `ProductPrice`, `ProductThumbnail`, `ProductStock`, `ProductType`, `ProductDescription`, `ProductStatus`) VALUES
(1, 'Iphone 12 Tím', 1200, 'iphone-12-tim-1-600x600.jpg', 100, 'Iphone', 'Chip Unisoc SC9863A1RAM: 4 GBDung lượng: 256 GBCamera sau: 8 MPCamera trước: 5 MPPin 5000 mAh, Sạc 10 W', 0),
(2, 'Iphone 13 Xanh', 1300, 'iphone-13-blue-1-600x600.jpg', 100, 'Iphone', 'Chip Unisoc SC9863A1RAM: 4 GBDung lượng: 256 GBCamera sau: 8 MPCamera trước: 5 MPPin 5000 mAh, Sạc 10 W', 0),
(5, 'Iphone 14 plus đen', 1450, 'iPhone-14-plus-thumb-den-600x600.jpg', 100, 'Iphone', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 0),
(7, 'Samsung Galaxy S22 đen', 1200, 'Galaxy-S22-Black-600x600.jpg', 100, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(8, 'Samsung Galaxy S22 Plus trắng', 1250, 'Galaxy-S22-Plus-White-600x600.jpg', 50, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(9, 'Samsung Galaxy S22 Ultra trắng', 1300, 'Galaxy-S22-Ultra-White-600x600.jpg', 30, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(10, 'Iphone 14 pro max đen', 1550, 'iphone-14-pro-max-den-thumb-600x600.jpg', 10, 'Iphone', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(12, 'Iphone Pro Vàng', 1450, 'iphone-14-pro-vang-thumb-600x600.jpg', 10, 'Iphone', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(13, 'Iphone 14', 1400, 'iPhone-14-thumb-do-600x600.jpg', 3, 'Iphone', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(14, 'Iphone XI Đen', 1100, 'iphone-xi-den-600x600.jpg', 10, 'Iphone', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(15, 'Oppo A55', 1000, 'oppo-a55-4g-thumb-new-600x600.jpg', 15, 'Oppo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(16, 'Oppo A77 Đen', 1100, 'oppo-a77s-den-thumb-1-2-600x600.jpg', 5, 'Oppo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(17, 'Oppo A96 Đen', 1150, 'oppo-a96-den-thumb-1-600x600.jpg', 12, 'Oppo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(18, 'Oppo N2 Flip Tím', 1200, 'oppo-find-n2-flip-purple-thumb-1-600x600-1-600x600.jpg', 14, 'Oppo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(19, 'Oppo X5 Pro Đen', 1250, 'oppo-find-x5-pro-den-thumb-600x600.jpg', 10, 'Oppo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(20, 'Oppo Reno 6 Xám', 1250, 'oppo-reno6-pro-grey-600x600.jpg', 11, 'Oppo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(21, 'Oppo Reno7 Z ', 1150, 'oppo-reno7-z-5g-thumb-2-1-600x600.jpg', 17, 'Oppo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(22, 'Oppo Reno 8 Pro Xanh', 1300, 'oppo-reno8-pro-thumb-xanh-1-600x600.jpg', 14, 'Oppo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(23, 'Oppo Reno8 T Đen', 1100, 'oppo-reno8t-4g-den1-thumb-600x600.jpg', 19, 'Oppo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(24, 'Oppo Reno 8T Vàng', 1200, 'oppo-reno8t-vang1-thumb-600x600.jpg', 13, 'Oppo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(25, 'Realme 9I Xanh', 1100, 'Realme-9i-xanh-thumb-600x600.jpg', 15, 'Realme', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(26, 'Realme 9 Pro Plus Xanh', 1200, 'realme-9-pro-plus-5g-blue-thumb-600x600.jpg', 8, 'Realme', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(27, 'Realme 10', 1200, 'realme-10-thumb-1-600x600.jpg', 4, 'Realme', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(28, 'Realme C30S Xanh', 1300, 'Realme-c30s-xanh-temp-600x600.jpg', 6, 'Realme', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(29, 'Realme C33 Xanh', 1200, 'realme-c33-thumb-xanh-600x600.jpg', 7, 'Realme', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(30, 'Realme C35', 900, 'realme-c35-thumb-new-600x600.jpg', 12, 'Realme', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(31, 'Realme C35 Vàng', 850, 'realme-c35-vang-thumb-600x600.jpg', 15, 'Realme', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(32, 'Samsung Galaxy A04S Đen', 800, 'samsung-galaxy-a04s-den-thumb-1-600x600.jpg', 14, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(33, 'Samsung Galaxy A04', 750, 'samsung-galaxy-a04-thumb-1-600x600.jpg', 4, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(34, 'Samsung Galaxy A13 Cam', 600, 'Samsung-Galaxy-A13-cam-thumb-600x600.jpg', 6, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(35, 'Samsung Galaxy A14 Nâu', 700, 'samsung-galaxy-a14-5g-nau-thumb-600x600.jpg', 5, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(36, 'Samsung Galaxy A14 Đen', 800, 'samsung-galaxy-a14-black-thumb-600x600.jpg', 4, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(37, 'Samsung Galaxy A23 Đen', 1000, 'sam-sung-galaxy-a23-5g-den-thumb-600x600.jpg', 8, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(38, 'Samsung Galaxy A23 Cam', 1000, 'samsung-galaxy-a23-cam-thumb-600x600.jpg', 14, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(39, 'Samsung Galaxy A24 Đen', 1100, 'samsung-galaxy-a24-black-thumb-600x600.jpg', 13, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(40, 'Samsung Galaxy A33', 1250, 'samsung-galaxy-a33-5g-thumb-new-1-600x600.jpg', 14, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(41, 'Samsung Galaxy A34 Bạc', 1100, 'samsung-galaxy-a34-5g-bac-thumb-600x600.jpg', 12, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(42, 'Samsung Galaxy A53 Xanh', 550, 'Samsung-Galaxy-A53-xanh-thumb-600x600.jpg', 10, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(43, 'Samsung Galaxy A54 Tím', 400, 'samsung-galaxy-a54-5g-tim-thumb-600x600.jpg', 12, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(44, 'Samsung Galaxy A73 Xanh', 500, 'samsung-galaxy-a73-5g-xanh-thumb-600x600.jpg', 3, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(45, 'Samsung Galaxy M53 Nâu', 700, 'samsung-galaxy-m53-nau-thumb-600x600.jpg', 10, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(46, 'Samsung Galaxy S20 Xanh Lá', 1000, 'samsung-galaxy-s20-fan-edition-xanh-la-thumbnew-600x600.jpeg', 9, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(47, 'Samsung Galaxy S21 FE Vàng', 1050, 'Samsung-Galaxy-S21-FE-vang-1-2-600x600.jpg', 11, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(48, 'Samsung Galaxy S23', 650, 'samsung-galaxy-s23-600x600.jpg', 10, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(49, 'Samsung Galaxy S23 Plus', 700, 'samsung-galaxy-s23-plus-600x600.jpg', 10, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(50, 'Samsung Galaxy S23 Utra', 1000, 'samsung-galaxy-s23-ultra-1-600x600.jpg', 18, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(51, 'Samsung Galaxy Z Flip 4 Tím', 1000, 'samsung-galaxy-z-flip4-5g-128gb-thumb-tim-600x600.jpg', 14, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(52, 'Samsung Galaxy Z Fold 4 Trắng', 1100, 'samsung-galaxy-z-fold4-kem-256gb-600x600.jpg', 12, 'Samsung', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(53, 'Vivo T1X Xanh', 900, 'vivo-t1x-xanh-thumb-600x600.jpg', 14, 'Vivo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(54, 'Vivo V23E', 700, 'Vivo-V23e-1-2-600x600.jpg', 16, 'Vivo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(55, 'Vivo V25 Vàng', 750, 'vivo-v25-5g-vang-thumb-1-1-600x600.jpg', 13, 'Vivo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(56, 'Vivo V25 Pro Xanh', 800, 'vivo-v25-pro-5g-xanh-thumb-1-600x600.jpg', 17, 'Vivo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(57, 'Vivo V27E', 900, 'vivo-v27e-1-600x600.jpg', 16, 'Vivo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(58, 'Vivo Y02S', 1000, 'vivo-y02s-thumb-1-2-3-600x600.jpg', 18, 'Vivo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(59, 'Vivo Y16 Vàng', 950, 'vivo-y16-vang-thumb-600x600.jpg', 12, 'Vivo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(60, 'Vivo Y21 Trắng', 1000, 'vivo-y21-white-01-1-600x600.jpg', 19, 'Vivo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(61, 'Vivo Y35 Đen', 1000, 'vivo-y35-thumb-den-600x600.jpg', 4, 'Vivo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1),
(62, 'Vivo Y55 Đen', 1250, 'vivo-y55-den-thumb-600x600.jpg', 2, 'Vivo', 'Chip Unisoc SC9863A1  RAM: 4 GB  Dung lượng: 256 GB  Camera sau: 8 MP  Camera trước: 5 MP  Pin 5000 mAh, Sạc 10 W', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` int(12) NOT NULL,
  `Birthday` date NOT NULL,
  `Role` tinyint(10) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`Username`, `Password`, `Fullname`, `Email`, `Address`, `Phone`, `Birthday`, `Role`, `Status`, `ID`) VALUES
('admin', 'Thuy11122002', 'Tăng Xuân Thủy', 'tangxuanthuy@gmail.com', 'TP HCM', 565215859, '2002-12-11', 0, 'Đang hoạt động', 1),
('manager1', '1', 'Phan Quốc Thịnh', 'phanquocthinh@gmail.com', 'An Giang', 123456789, '2002-03-21', 1, 'Đang hoạt động', 2),
('staff1', '2', 'Nguyễn Trần Công Đức Thịnh', 'ducthinh@gmail.com', 'Long An', 987654321, '2002-09-20', 2, 'Đang hoạt động', 3),
('customer1', '3', 'Lê Tuấn Thông ', 'letuanthong@gmail.com', 'Bình Dương', 111222333, '2002-10-22', 3, 'Đang hoạt động', 4),
('staff2', '2', 'Nguyễn Duy Thịnh', 'nguyenduythinh@gmail.com', 'TP HCM', 444555666, '2023-05-11', 2, 'Đang hoạt động', 5),
('customer2', '3', 'Phạm Tấn Duy', 'phamtanduy@gmail.com', 'TP HCM', 777888999, '2023-05-11', 3, 'Đang hoạt động', 7),
('customer3', '3', 'Vũ Hoàng Ân', 'vuhoangan@gmail.com', 'TP HCM', 123123123, '2023-05-11', 3, 'Đang hoạt động', 8),
('customer4', '3', 'Nguyễn Thành Nam', 'thanhnam@gmail.com', 'TP HCM', 111111222, '2023-05-11', 3, 'Đang hoạt động', 9),
('staff3', '2', 'Lê Văn Huy', 'levanhuy@gmail.com', 'Thanh Hóa', 999888777, '2023-05-11', 2, 'Ngưng hoạt động', 10),
('customer5', '111111', 'Võ Văn Tiến', 'vantien@gmail.com', 'TP HCM', 666555444, '2023-05-11', 3, 'Đang hoạt động', 11);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_details_ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_details_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `order` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
