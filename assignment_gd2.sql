-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 20, 2023 lúc 03:37 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `assignment_gd2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `trang_thai`) VALUES
(1, 'truongkendy', '827ccb0eea8a706c4c34a16891f84e7b', 'truongbq31@gmail.com', 1),
(2, 'cccc', '827ccb0eea8a706c4c34a16891f84e7b', 'gg@gg.ma', 0),
(8, 'truongkendy123', '202cb962ac59075b964b07152d234b70', 'admin31@gmail.com', 0),
(9, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin22@gmail.com', 1),
(10, '30944427', '202cb962ac59075b964b07152d234b70', 'ytbsadboy@gmail.com', 0),
(11, 'truongkendy1234', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_nhanh`
--

CREATE TABLE `chi_nhanh` (
  `id` int(11) NOT NULL,
  `ten_chi_nhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chi_nhanh`
--

INSERT INTO `chi_nhanh` (`id`, `ten_chi_nhanh`) VALUES
(1, 'CGV Bắc Từ Liêm'),
(2, 'CGV Vincom Nguyễn Chí Thanh'),
(41, 'CGV AEON Hà Đông');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_phim`
--

CREATE TABLE `loai_phim` (
  `id` int(11) NOT NULL,
  `ten_loai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai_phim`
--

INSERT INTO `loai_phim` (`id`, `ten_loai`) VALUES
(1, 'Hành Động'),
(2, 'Tình Cảm'),
(3, 'Kinh Dị'),
(4, 'Hoạt Hình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `id` int(11) NOT NULL,
  `ten_phim` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_loai_phim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`id`, `ten_phim`, `img`, `description`, `id_loai_phim`) VALUES
(4, 'Naruto', '9af7188fd0a06855c1c12cbad33b34c9.jpg', 'Naruto Sipuden', 1),
(5, 'Dragon Ball Z', 'Dragon_Ball_Super_artwork.jpg', 'Dragon Ball Z', 4),
(6, 'Doraemon', 'Doraemon1.jpg', 'Không có giới thiệu hiihi', 4),
(30, 'Naruto', '35df1cef6b596381b6bdcdd79b45bb0c.jpg', 'Phòng VIP', 2),
(36, 'Ahihi', 'z4017231994823_a58489c67cb4e04cad004ede18bc6c57.jpg', 'Phòng VIP', 4),
(38, 'Trường Kendy Đây', 'z4074420824439_fb5123736d52ed7b881f39382ff4a7a4.jpg', 'Quá tuyệt vời', 2),
(41, 'Naruto', '9af7188fd0a06855c1c12cbad33b34c9.jpg', 'Giấc Mơ Của Mẹ - Tập 77 | Phim Tình Cảm Gia Đình | Vieon', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_chieu`
--

CREATE TABLE `phong_chieu` (
  `id` int(11) NOT NULL,
  `ten_phong` varchar(255) NOT NULL,
  `id_chi_nhanh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phong_chieu`
--

INSERT INTO `phong_chieu` (`id`, `ten_phong`, `id_chi_nhanh`) VALUES
(1, 'Phòng VIP', 1),
(2, 'Phòng 301', 2),
(3, 'Phòng 101', 1),
(4, 'Phòng 102', 2),
(23, 'Cinema 6', 1),
(24, 'Cinema 678999', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suat_chieu`
--

CREATE TABLE `suat_chieu` (
  `id` int(11) NOT NULL,
  `id_phim` int(11) NOT NULL,
  `id_phong_chieu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `suat_chieu`
--

INSERT INTO `suat_chieu` (`id`, `id_phim`, `id_phong_chieu`) VALUES
(6, 5, 1),
(8, 6, 2),
(14, 31, 8),
(22, 31, 21),
(26, 38, 24),
(28, 36, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chi_nhanh`
--
ALTER TABLE `chi_nhanh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phong_chieu`
--
ALTER TABLE `phong_chieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suat_chieu`
--
ALTER TABLE `suat_chieu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `chi_nhanh`
--
ALTER TABLE `chi_nhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `phong_chieu`
--
ALTER TABLE `phong_chieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `suat_chieu`
--
ALTER TABLE `suat_chieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
