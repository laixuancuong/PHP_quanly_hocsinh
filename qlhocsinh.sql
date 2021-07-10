-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 02, 2021 lúc 12:08 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlhocsinh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `ngaydk` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id_account`, `username`, `password`, `hoten`, `dienthoai`, `ngaydk`) VALUES
(3, 'cuong', '123', 'Lại Xuân Cường', 123, '2020-12-11 20:33:46'),
(5, 'admin', '123', 'N', 1234421, '2021-01-20 10:43:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baitap`
--

CREATE TABLE `baitap` (
  `mabt` int(11) NOT NULL,
  `noidung` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `malh` int(11) NOT NULL,
  `mamh` int(11) NOT NULL,
  `ngaydang` datetime NOT NULL,
  `hannap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang_gv`
--

CREATE TABLE `chucnang_gv` (
  `id_cn_gv` int(11) NOT NULL,
  `magv` int(11) NOT NULL,
  `mamh` int(11) NOT NULL,
  `makhoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chucnang_gv`
--

INSERT INTO `chucnang_gv` (`id_cn_gv`, `magv`, `mamh`, `makhoi`) VALUES
(1, 4, 18, 1),
(2, 1, 16, 1),
(3, 1, 16, 2),
(4, 2, 17, 1),
(5, 2, 17, 3),
(6, 2, 17, 2),
(7, 4, 18, 3),
(8, 7, 19, 1),
(9, 7, 19, 2),
(10, 8, 20, 1),
(11, 8, 20, 3),
(12, 12, 22, 1),
(13, 12, 22, 3),
(14, 11, 23, 1),
(15, 11, 23, 2),
(17, 13, 18, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `id_diem` int(11) NOT NULL,
  `diemtk` int(11) NOT NULL,
  `xeploai` varchar(11) NOT NULL,
  `mahs` int(11) NOT NULL,
  `id_namhoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem_chitiet`
--

CREATE TABLE `diem_chitiet` (
  `id_diem_ct` int(11) NOT NULL,
  `diemtx1` float NOT NULL,
  `diemtx2` float NOT NULL,
  `diemgk` float NOT NULL,
  `diemck` float NOT NULL,
  `mahs` int(11) NOT NULL,
  `mamh` int(11) NOT NULL,
  `id_kyhoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diem_chitiet`
--

INSERT INTO `diem_chitiet` (`id_diem_ct`, `diemtx1`, `diemtx2`, `diemgk`, `diemck`, `mahs`, `mamh`, `id_kyhoc`) VALUES
(21, 10, 4, 5, 7, 12, 16, 9),
(22, 8, 9, 9, 6, 13, 16, 9),
(23, 3, 6, 9, 5, 15, 16, 9),
(29, 6, 7, 10, 4, 12, 18, 9),
(30, 8, 4, 6, 7, 13, 18, 9),
(31, 5, 3, 9, 5, 15, 18, 9),
(32, 7, 6.25, 5, 9, 29, 16, 7),
(33, 8, 9, 8, 8, 29, 16, 8),
(34, 3, 4, 6, 3, 30, 16, 7),
(36, 3, 4, 6, 9, 30, 16, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem_tk`
--

CREATE TABLE `diem_tk` (
  `id_diem_tkm` int(11) NOT NULL,
  `diemhk1` float NOT NULL,
  `diemhk2` float NOT NULL,
  `diemtkm` float NOT NULL,
  `mahs` int(11) NOT NULL,
  `id_namhoc` int(11) NOT NULL,
  `mamh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diem_tk`
--

INSERT INTO `diem_tk` (`id_diem_tkm`, `diemhk1`, `diemhk2`, `diemtkm`, `mahs`, `id_namhoc`, `mamh`) VALUES
(21, 6.4, 0, 0, 12, 2, 18),
(22, 6.4, 0, 0, 13, 2, 18),
(23, 5.9, 0, 0, 15, 2, 18),
(25, 5.7, 0, 1.9, 12, 2, 16),
(26, 6.1, 0, 2, 13, 2, 16),
(27, 5.7, 0, 1.9, 15, 2, 16),
(28, 7.2, 8.1, 7.8, 29, 1, 16),
(29, 4, 6.6, 5.7, 30, 1, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `magv` int(11) NOT NULL,
  `hoten_dem` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `ten_gv` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `chucvu` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `gioitinh` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `sodt` varchar(11) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `tinhtrang` int(5) NOT NULL DEFAULT 1,
  `quyen` int(5) NOT NULL DEFAULT 0,
  `ngaydk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`magv`, `hoten_dem`, `ten_gv`, `password`, `chucvu`, `gioitinh`, `diachi`, `sodt`, `email`, `tinhtrang`, `quyen`, `ngaydk`) VALUES
(1, 'Nguyễn Văn', 'Nam', '123', 'GV', 'nam', '113 vinh', '1234', 'nn@gmail.com', 1, 1, '2021-01-16'),
(2, 'Lại Xuân', 'Vinh', '123', 'GV', 'nam', '15 Vinh', '987654', 'v@gmail.com', 1, 1, '2021-01-16'),
(4, 'Nguyễn Thị', 'Nga', '123', 'GV', 'nữ', '164 Vinh', '45678', 'n@gmail.com', 1, 1, '2021-01-16'),
(7, 'Hồ Xuân', 'Lan', '123', 'GV', 'nữ', '58A', '186', 'l@gmail.com', 1, 1, '2021-01-16'),
(8, 'Nguyễn Văn', 'Minh', '123', 'GV', 'Nam', '58V', '587', 'm@gmail.com', 1, 1, '2021-01-16'),
(10, 'ad', 'e', '123', '', 'Nam', 'a', '123', '@123', 1, 0, '0000-00-00'),
(11, 'Trần Văn', 'Lộc', '123', '', 'Nam', 'abn', '123123', 'a@gn', 1, 0, '0000-00-00'),
(12, 'Nguyễn Thị', 'Lý', '123', '', 'Nam', 'ab', '4324', '@dsd', 1, 0, '0000-00-00'),
(13, 'Trương Quang', 'Ninh', '123', '', 'Nam', 'a', '0987654321', 'lax@gmail.com', 1, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoclieu`
--

CREATE TABLE `hoclieu` (
  `mahl` int(11) NOT NULL,
  `noidung` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `file_kem` varchar(250) COLLATE utf8_vietnamese_ci NOT NULL,
  `mapc` int(11) NOT NULL,
  `ngaydang` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoclieu`
--

INSERT INTO `hoclieu` (`mahl`, `noidung`, `file_kem`, `mapc`, `ngaydang`) VALUES
(15, 'Giáo trình toán', 'file_tailieu/bao cao TTCN LXC.pdf', 53, '2021-05-25'),
(16, 'Một số công thức tư duy', 'file_tailieu/bao cao TTCN LXC.docx', 54, '2021-05-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `mahs` int(11) NOT NULL,
  `hoten_dem` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `ten_hs` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `matkhau` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `sodt` varchar(11) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `tinhtrang` int(5) NOT NULL DEFAULT 1,
  `id_khoahoc` int(11) NOT NULL,
  `ngaydk` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`mahs`, `hoten_dem`, `ten_hs`, `matkhau`, `ngaysinh`, `gioitinh`, `diachi`, `sodt`, `email`, `tinhtrang`, `id_khoahoc`, `ngaydk`) VALUES
(12, 'Nguyễn Văn', 'Anh', '123', '2001-01-13', 'Nam', '12 số 45', '12355', 'lx@gmail.com', 1, 4, '0000-00-00 00:00:00'),
(13, 'Lại Xuân', 'Anh', '123', '2001-01-05', 'Nam', 'Số 45', '34234', 'nb@gmail.com', 1, 4, '0000-00-00 00:00:00'),
(14, 'Nguyễn Thị', 'Bình', '123', '2001-01-05', 'Nữ', '45 số jfjf', '34236', 'b@gmail,com', 1, 4, '0000-00-00 00:00:00'),
(15, 'Nguyễn Thị', 'Như', '123', '2001-01-05', 'Nữ', 'Số 153', '12387', 'C@gmail.com', 1, 4, '0000-00-00 00:00:00'),
(17, 'Trần Thị', 'Hoa', '123', '2001-01-05', 'Nữ', 'Số 7347373', '12323786', 'lss@gmail.com', 1, 4, '2021-01-17 22:39:26'),
(18, 'Hồ Văn', 'Nam', '123', '2001-01-05', 'Nam', 'số 47564', '2387426', 'kh@gmail.com', 1, 4, '2021-01-17 22:41:20'),
(19, 'Tăng Văn', 'Kiệm', '123', '2001-01-05', 'Nam', 'dia chi 343', '8344367', 'ng@gmail.com', 1, 4, '2021-01-17 22:41:20'),
(22, 'Nguyễn Văn', 'A', '123', '2001-01-05', 'Nam', 'dđ', '33333', '@123', 1, 4, '2021-01-19 15:09:27'),
(23, 'a', 'bb', '123', '0000-00-00', 'Nam', 'aff', '12333', '@1', 1, 3, '2021-01-19 17:55:31'),
(26, 'Hồ Xuân', 'Anh', '123', '2000-08-11', 'Nam', '31jsh', '132123213', 'dasdasd', 1, 3, '2021-01-25 09:41:28'),
(27, 'Xuân', 'Minh', '123', '2000-02-27', 'Nam', 'af', '123', 'a', 1, 3, '2021-01-27 22:20:00'),
(28, 'Phan Anh', 'Hùng', '123', '2000-05-12', 'Nam', 'a', '0987654321', 'lax@gmail.com', 1, 4, '2021-05-22 13:34:01'),
(29, 'A', 'B', '123', '2000-05-22', 'Nam', '123', '123', 'admin@gmail.com', 1, 3, '2021-05-28 22:50:21'),
(30, 'B', 'C', '123', '2020-05-15', 'Nam', '123', '123', 'khachhang1@gmail.com', 1, 3, '2021-05-28 22:51:06'),
(31, 'Hoàng Anh', 'D', '123', '2000-05-21', 'Nữ', 'a', '123454', 'lax@gmail.com', 1, 3, '2021-05-30 07:10:19'),
(32, 'Nguyễn Thị', 'F', '123', '2000-05-14', 'Nữ', 'a', '123454', 'laxa@gmail.com', 1, 3, '2021-05-30 07:11:18'),
(33, 'Hồ Văn', 'K', '123', '2000-05-13', 'Nam', 'a', '0987654321', 'laxac@gmail.com', 1, 3, '2021-05-30 07:13:16'),
(34, 'Phan Anh', 'CB', '123', '2000-05-14', 'Nam', 'a', '123454', 'laxac@gmail.com', 1, 3, '2021-05-30 08:57:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `id_khoahoc` int(11) NOT NULL,
  `tenkhoahoc` varchar(20) NOT NULL,
  `id_namhoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`id_khoahoc`, `tenkhoahoc`, `id_namhoc`) VALUES
(3, 'K1', 1),
(4, 'K2', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoi`
--

CREATE TABLE `khoi` (
  `makhoi` int(11) NOT NULL,
  `tenkhoi` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khoi`
--

INSERT INTO `khoi` (`makhoi`, `tenkhoi`) VALUES
(1, '10'),
(2, '11'),
(3, '12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kyhoc`
--

CREATE TABLE `kyhoc` (
  `id_kyhoc` int(5) NOT NULL,
  `tenky` varchar(50) NOT NULL,
  `id_namhoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `kyhoc`
--

INSERT INTO `kyhoc` (`id_kyhoc`, `tenky`, `id_namhoc`) VALUES
(7, '1', 1),
(8, '2', 1),
(9, '1', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `malh` int(11) NOT NULL,
  `tenlop` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `makhoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`malh`, `tenlop`, `makhoi`) VALUES
(5, '10A1', 1),
(8, '10A3', 1),
(9, '10A4', 1),
(14, '10A5', 1),
(19, '10A6', 1),
(26, '12A7', 3),
(30, '10A8', 1),
(31, '10A9', 1),
(33, '11A2', 2),
(35, '10A7', 1),
(36, '11A1', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `mamh` int(11) NOT NULL,
  `tenmh` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`mamh`, `tenmh`) VALUES
(16, 'Toán'),
(17, 'Lý'),
(18, 'Hoá'),
(19, 'Sinh'),
(20, 'Sử'),
(21, 'Địa'),
(22, 'Văn'),
(23, 'Anh'),
(24, 'Tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `namhoc`
--

CREATE TABLE `namhoc` (
  `id_namhoc` int(11) NOT NULL,
  `namhoc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `namhoc`
--

INSERT INTO `namhoc` (`id_namhoc`, `namhoc`) VALUES
(1, '2019_2020'),
(2, '2020_2021');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `nd_chinh` varchar(250) NOT NULL,
  `noidung` varchar(1000) NOT NULL,
  `id_account` int(11) NOT NULL,
  `ngay_dang` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_news`, `image`, `nd_chinh`, `noidung`, `id_account`, `ngay_dang`) VALUES
(2, '', 'Nhà trường quyết định chuyển sang hình thức dạy - học trực tuyến từ ngày 23/05/2021', 'Căn cứ công văn sô 525/ĐHV-HCTH ngày 07/5/2021 của Hiệu trưởng về việc tiếp tục đẩy mạnh công tác phòng dịch Covid-19 và tình hình diễn biến phức tạp của dịch bênh. Nhà trường thông báo chuyển sang hình thức dạy - học trực tuyến từ ngày 15/5/2021. Trân trọng.', 3, '2021-05-19 08:43:09'),
(14, '', 'Thông báo tạm hoãn đợt thi học sinh giỏi dự kiến thi ngày 25/5/2021', '<p>Căn cứ c&ocirc;ng văn s&ocirc; 525/ĐHV-HCTH ng&agrave;y 07/5/2021 của Hiệu trưởng về việc tiếp tục đẩy mạnh c&ocirc;ng t&aacute;c ph&ograve;ng dịch Covid-19 v&agrave; t&igrave;nh h&igrave;nh diễn biến phức tạp của dịch b&ecirc;nh. Nh&agrave; trường th&ocirc;ng b&aacute;o tạm ho&atilde;n đợt thi học sinh giỏi&nbsp;dự kiến thi ng&agrave;y 25/5/2021. Đợt thi kế tiếp sẽ c&oacute; th&ocirc;ng b&aacute;o sau. Tr&acirc;n trọng.</p>\r\n', 3, '2021-05-19 21:28:26'),
(15, '', 'a', '<p>abc</p>\r\n', 3, '2021-05-19 21:28:36'),
(16, '', 'Chào mừng ngày sinh nhật Chủ tịch Hồ Chí Minh', '<p>adasdasd</p>\r\n', 3, '2021-05-19 21:54:43'),
(17, '', 'Thông báo hoãn lịch Tổng kết cuối năm 2020 - 2021', '<p>&aacute;dasd</p>\r\n', 3, '2021-05-19 21:55:42'),
(18, '', 'Dừng các hoạt động lễ hội ngày kỷ niệm 23/05/2021', '<p>&aacute;dasdasd</p>\r\n', 3, '2021-05-19 21:56:20'),
(19, '', 'Hội thi cán bộ nữ công giỏi', '<h2 style=\"text-align: center;\">Lời dẫn chương tr&igrave;nh Hội thi C&aacute;n bộ nữ c&ocirc;ng giỏi</h2>\r\n\r\n<p style=\"text-align: center;\"><strong>LỜI MỞ ĐẦU</strong></p>\r\n\r\n<p>- Bạn A dẫn</p>\r\n\r\n<p>&hellip;&hellip;&hellip;&hellip;.. v&agrave; &hellip;&hellip;&hellip;&hellip;.. xin h&acirc;n hoan ch&agrave;o đ&oacute;n Qu&yacute; vị đại biểu, qu&yacute; Thầy C&ocirc;, v&agrave; c&aacute;c bạn đ&atilde; đến tham dự hội thi &ldquo;C&aacute;n bộ nữ c&ocirc;ng giỏi&rdquo; cụm ............. h&ocirc;', 3, '2021-05-21 22:58:45'),
(20, '', 'Lịch thi cuối kỳ cho khối 12', '<p><strong>1. Lịch thi</strong></p>\r\n\r\n<p><strong><em>+ Ng&agrave;y thi</em></strong>: Buổi s&aacute;ng c&aacute;c ng&agrave;y Thứ Tư, Thứ Năm v&agrave; Thứ S&aacute;u (ng&agrave;y 20,21,22/ 5 /2020).</p>\r\n\r\n<p><strong><em>+ M&ocirc;n thi</em></strong>: To&aacute;n, L&yacute;, H&oacute;a, Sinh, Ngữ văn, Anh;</p>\r\n\r\n<p><strong><em>+ Điểm thi</em></strong><em>:&nbsp;</em>Điểm thi được lấy v&agrave;o điểm hệ số 3.</p>\r\n\r\n<p>+&nbsp;<strong><em>Nội dung thi</em></strong>:</p>\r\n\r\n<ul>\r\n	<li>M&ocirc;n To&aacute;n, H&oacute;a: chương tr&igrave;nh lớp 12;</li>\r\n	<li>M&ocirc;n Ngữ văn, Anh, L&yacute;, Sinh: chương tr&igrave;nh từ đầu học kỳ 2 (02/01/2020) đến nay.</li>\r\n</ul>\r\n', 3, '2021-05-21 23:00:44'),
(21, '', 'ad', '<p>&aacute;dasd</p>\r\n', 3, '2021-05-30 08:58:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phancong`
--

CREATE TABLE `phancong` (
  `mapc` int(11) NOT NULL,
  `id_namhoc` int(5) NOT NULL,
  `id_cn_gv` int(11) NOT NULL,
  `id_pc_cn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phancong`
--

INSERT INTO `phancong` (`mapc`, `id_namhoc`, `id_cn_gv`, `id_pc_cn`) VALUES
(53, 2, 2, 5),
(54, 2, 2, 7),
(55, 2, 14, 5),
(56, 2, 8, 5),
(57, 2, 1, 5),
(58, 2, 15, 14),
(62, 2, 8, 7),
(63, 1, 2, 49),
(64, 2, 1, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phancong_cn`
--

CREATE TABLE `phancong_cn` (
  `id_pc_cn` int(11) NOT NULL,
  `magv` int(11) NOT NULL,
  `malh` int(11) NOT NULL,
  `id_namhoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phancong_cn`
--

INSERT INTO `phancong_cn` (`id_pc_cn`, `magv`, `malh`, `id_namhoc`) VALUES
(1, 1, 9, 2),
(5, 2, 5, 2),
(7, 4, 8, 2),
(8, 7, 19, 2),
(14, 12, 36, 2),
(17, 8, 33, 2),
(47, 11, 31, 2),
(49, 1, 8, 1),
(50, 13, 26, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phancong_lh`
--

CREATE TABLE `phancong_lh` (
  `id_pc_lh` int(11) NOT NULL,
  `mahs` int(11) NOT NULL,
  `id_pc_cn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phancong_lh`
--

INSERT INTO `phancong_lh` (`id_pc_lh`, `mahs`, `id_pc_cn`) VALUES
(1, 12, 5),
(2, 13, 5),
(5, 17, 1),
(6, 15, 5),
(12, 23, 1),
(14, 22, 1),
(19, 23, 7),
(20, 22, 7),
(23, 23, 14),
(24, 26, 14),
(26, 29, 49),
(27, 29, 14),
(28, 30, 49),
(29, 31, 17),
(30, 32, 17),
(31, 33, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phonghoc`
--

CREATE TABLE `phonghoc` (
  `maph` int(11) NOT NULL,
  `chucnang` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `succhua` int(11) NOT NULL,
  `chuthich` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phonghoc`
--

INSERT INTO `phonghoc` (`maph`, `chucnang`, `succhua`, `chuthich`) VALUES
(1, 'Lý thuyết', 40, ''),
(2, 'Thực hành', 20, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoikhoabieu`
--

CREATE TABLE `thoikhoabieu` (
  `mapc` int(11) NOT NULL,
  `buoihoc` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `maph` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `matb` int(11) NOT NULL,
  `noidung` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinnhan`
--

CREATE TABLE `tinnhan` (
  `matn` int(11) NOT NULL,
  `tieude` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `noidung` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Chỉ mục cho bảng `baitap`
--
ALTER TABLE `baitap`
  ADD PRIMARY KEY (`mabt`),
  ADD KEY `malh` (`malh`),
  ADD KEY `mamh` (`mamh`);

--
-- Chỉ mục cho bảng `chucnang_gv`
--
ALTER TABLE `chucnang_gv`
  ADD PRIMARY KEY (`id_cn_gv`),
  ADD KEY `magv` (`magv`),
  ADD KEY `mamh` (`mamh`),
  ADD KEY `makhoi` (`makhoi`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`id_diem`),
  ADD KEY `mahs` (`mahs`),
  ADD KEY `id_namhoc` (`id_namhoc`);

--
-- Chỉ mục cho bảng `diem_chitiet`
--
ALTER TABLE `diem_chitiet`
  ADD PRIMARY KEY (`id_diem_ct`),
  ADD KEY `mahs` (`mahs`),
  ADD KEY `mamh` (`mamh`),
  ADD KEY `id_kyhoc` (`id_kyhoc`);

--
-- Chỉ mục cho bảng `diem_tk`
--
ALTER TABLE `diem_tk`
  ADD PRIMARY KEY (`id_diem_tkm`),
  ADD KEY `mahs` (`mahs`),
  ADD KEY `id_namhoc` (`id_namhoc`),
  ADD KEY `mamh` (`mamh`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`magv`);

--
-- Chỉ mục cho bảng `hoclieu`
--
ALTER TABLE `hoclieu`
  ADD PRIMARY KEY (`mahl`),
  ADD KEY `mapc` (`mapc`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`mahs`),
  ADD KEY `id_khoahoc` (`id_khoahoc`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`id_khoahoc`),
  ADD KEY `id_namhoc` (`id_namhoc`);

--
-- Chỉ mục cho bảng `khoi`
--
ALTER TABLE `khoi`
  ADD PRIMARY KEY (`makhoi`);

--
-- Chỉ mục cho bảng `kyhoc`
--
ALTER TABLE `kyhoc`
  ADD PRIMARY KEY (`id_kyhoc`),
  ADD KEY `id_namhoc` (`id_namhoc`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`malh`),
  ADD KEY `makhoi` (`makhoi`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mamh`);

--
-- Chỉ mục cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`id_namhoc`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `id_account` (`id_account`);

--
-- Chỉ mục cho bảng `phancong`
--
ALTER TABLE `phancong`
  ADD PRIMARY KEY (`mapc`),
  ADD KEY `id_namhoc` (`id_namhoc`),
  ADD KEY `id_cn_gv` (`id_cn_gv`),
  ADD KEY `id_pc_cn` (`id_pc_cn`);

--
-- Chỉ mục cho bảng `phancong_cn`
--
ALTER TABLE `phancong_cn`
  ADD PRIMARY KEY (`id_pc_cn`),
  ADD KEY `magv` (`magv`),
  ADD KEY `malh` (`malh`),
  ADD KEY `id_namhoc` (`id_namhoc`);

--
-- Chỉ mục cho bảng `phancong_lh`
--
ALTER TABLE `phancong_lh`
  ADD PRIMARY KEY (`id_pc_lh`),
  ADD KEY `mahs` (`mahs`),
  ADD KEY `id_pc_cn` (`id_pc_cn`);

--
-- Chỉ mục cho bảng `phonghoc`
--
ALTER TABLE `phonghoc`
  ADD PRIMARY KEY (`maph`);

--
-- Chỉ mục cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD KEY `mapc` (`mapc`),
  ADD KEY `buoihoc` (`buoihoc`),
  ADD KEY `maph` (`maph`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`matb`);

--
-- Chỉ mục cho bảng `tinnhan`
--
ALTER TABLE `tinnhan`
  ADD PRIMARY KEY (`matn`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `baitap`
--
ALTER TABLE `baitap`
  MODIFY `mabt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `chucnang_gv`
--
ALTER TABLE `chucnang_gv`
  MODIFY `id_cn_gv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `id_diem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `diem_chitiet`
--
ALTER TABLE `diem_chitiet`
  MODIFY `id_diem_ct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `diem_tk`
--
ALTER TABLE `diem_tk`
  MODIFY `id_diem_tkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `magv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `hoclieu`
--
ALTER TABLE `hoclieu`
  MODIFY `mahl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  MODIFY `mahs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `id_khoahoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `khoi`
--
ALTER TABLE `khoi`
  MODIFY `makhoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `kyhoc`
--
ALTER TABLE `kyhoc`
  MODIFY `id_kyhoc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `malh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `mamh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  MODIFY `id_namhoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `phancong`
--
ALTER TABLE `phancong`
  MODIFY `mapc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `phancong_cn`
--
ALTER TABLE `phancong_cn`
  MODIFY `id_pc_cn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `phancong_lh`
--
ALTER TABLE `phancong_lh`
  MODIFY `id_pc_lh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `phonghoc`
--
ALTER TABLE `phonghoc`
  MODIFY `maph` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `matb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tinnhan`
--
ALTER TABLE `tinnhan`
  MODIFY `matn` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chucnang_gv`
--
ALTER TABLE `chucnang_gv`
  ADD CONSTRAINT `chucnang_gv_ibfk_1` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`mamh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chucnang_gv_ibfk_2` FOREIGN KEY (`magv`) REFERENCES `giaovien` (`magv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chucnang_gv_ibfk_3` FOREIGN KEY (`makhoi`) REFERENCES `khoi` (`makhoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diem_chitiet`
--
ALTER TABLE `diem_chitiet`
  ADD CONSTRAINT `diem_chitiet_ibfk_2` FOREIGN KEY (`mahs`) REFERENCES `hocsinh` (`mahs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diem_chitiet_ibfk_3` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`mamh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diem_chitiet_ibfk_4` FOREIGN KEY (`id_kyhoc`) REFERENCES `kyhoc` (`id_kyhoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diem_tk`
--
ALTER TABLE `diem_tk`
  ADD CONSTRAINT `diem_tk_ibfk_1` FOREIGN KEY (`mahs`) REFERENCES `hocsinh` (`mahs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diem_tk_ibfk_2` FOREIGN KEY (`id_namhoc`) REFERENCES `namhoc` (`id_namhoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diem_tk_ibfk_3` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`mamh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoclieu`
--
ALTER TABLE `hoclieu`
  ADD CONSTRAINT `hoclieu_ibfk_1` FOREIGN KEY (`mapc`) REFERENCES `phancong` (`mapc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `hocsinh_ibfk_1` FOREIGN KEY (`id_khoahoc`) REFERENCES `khoahoc` (`id_khoahoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD CONSTRAINT `khoahoc_ibfk_1` FOREIGN KEY (`id_namhoc`) REFERENCES `namhoc` (`id_namhoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `kyhoc`
--
ALTER TABLE `kyhoc`
  ADD CONSTRAINT `kyhoc_ibfk_1` FOREIGN KEY (`id_namhoc`) REFERENCES `namhoc` (`id_namhoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_2` FOREIGN KEY (`makhoi`) REFERENCES `khoi` (`makhoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phancong`
--
ALTER TABLE `phancong`
  ADD CONSTRAINT `phancong_ibfk_3` FOREIGN KEY (`id_namhoc`) REFERENCES `namhoc` (`id_namhoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phancong_ibfk_4` FOREIGN KEY (`id_cn_gv`) REFERENCES `chucnang_gv` (`id_cn_gv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phancong_ibfk_5` FOREIGN KEY (`id_pc_cn`) REFERENCES `phancong_cn` (`id_pc_cn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phancong_cn`
--
ALTER TABLE `phancong_cn`
  ADD CONSTRAINT `phancong_cn_ibfk_1` FOREIGN KEY (`magv`) REFERENCES `giaovien` (`magv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phancong_cn_ibfk_2` FOREIGN KEY (`malh`) REFERENCES `lop` (`malh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phancong_cn_ibfk_3` FOREIGN KEY (`id_namhoc`) REFERENCES `namhoc` (`id_namhoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phancong_lh`
--
ALTER TABLE `phancong_lh`
  ADD CONSTRAINT `phancong_lh_ibfk_1` FOREIGN KEY (`mahs`) REFERENCES `hocsinh` (`mahs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phancong_lh_ibfk_4` FOREIGN KEY (`id_pc_cn`) REFERENCES `phancong_cn` (`id_pc_cn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
