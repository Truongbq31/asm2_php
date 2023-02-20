-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 14, 2023 lúc 02:23 PM
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
-- Cơ sở dữ liệu: `assignment_php2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`) VALUES
(1, 'truongkendy', '12345', 'truongbq31@gmail.com');

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
(9, 'CGV AEON Hà Đông');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_chieu`
--

CREATE TABLE `gio_chieu` (
  `id` int(11) NOT NULL,
  `ngay_chieu` date NOT NULL,
  `gio_bat_dau` time NOT NULL,
  `gio_ket_thuc` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gio_chieu`
--

INSERT INTO `gio_chieu` (`id`, `ngay_chieu`, `gio_bat_dau`, `gio_ket_thuc`) VALUES
(1, '2022-11-05', '18:20:37', '20:19:37'),
(2, '2023-02-10', '12:20:24', '15:20:24'),
(3, '2023-02-26', '12:28:00', '14:28:00'),
(6, '2023-02-19', '13:42:00', '15:42:00'),
(11, '2023-02-02', '13:08:00', '15:08:00'),
(12, '2023-02-04', '07:52:00', '09:52:00'),
(16, '2023-03-19', '10:54:00', '00:54:00');

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
(4, 'Naruto', '9af7188fd0a06855c1c12cbad33b34c9.jpg', 'Naruto Sipuden', 4),
(5, 'Dragon Ball Z', 'Dragon_Ball_Super_artwork.jpg', 'Dragon Ball Z', 4),
(6, 'Doraemon', 'Doraemon1.jpg', 'Không có giới thiệu hiihi', 3),
(30, 'Naruto', '35df1cef6b596381b6bdcdd79b45bb0c.jpg', 'Phòng VIP', 1),
(31, 'abc 123', 'z4074420824439_fb5123736d52ed7b881f39382ff4a7a4.jpg', 'ahihihihi', 1);

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
(8, 'Phòng 333', 2),
(17, 'assss', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suat_chieu`
--

CREATE TABLE `suat_chieu` (
  `id` int(11) NOT NULL,
  `id_phim` int(11) NOT NULL,
  `id_phong_chieu` int(11) NOT NULL,
  `id_gio_chieu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `suat_chieu`
--

INSERT INTO `suat_chieu` (`id`, `id_phim`, `id_phong_chieu`, `id_gio_chieu`) VALUES
(7, 5, 3, 11),
(8, 6, 3, 6),
(9, 4, 1, 12);

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
-- Chỉ mục cho bảng `gio_chieu`
--
ALTER TABLE `gio_chieu`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chi_nhanh`
--
ALTER TABLE `chi_nhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `gio_chieu`
--
ALTER TABLE `gio_chieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `phong_chieu`
--
ALTER TABLE `phong_chieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `suat_chieu`
--
ALTER TABLE `suat_chieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
