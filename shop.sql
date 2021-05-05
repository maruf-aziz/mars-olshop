-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2021 at 06:26 AM
-- Server version: 5.7.24
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_address`
--

CREATE TABLE `tb_address` (
  `id` int(11) NOT NULL,
  `road` varchar(255) DEFAULT NULL,
  `sub_district` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `main` enum('yes','no') NOT NULL DEFAULT 'no',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_number` char(50) NOT NULL,
  `bank_user` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`bank_id`, `bank_name`, `bank_number`, `bank_user`, `created_at`, `updated_at`) VALUES
(1, 'BRI', '635746429372', 'MARS', '2021-01-05 04:41:21', '2021-01-05 04:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category_product`
--

CREATE TABLE `tb_category_product` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category_product`
--

INSERT INTO `tb_category_product` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(12, 'Handphone', '2021-01-05 06:04:17', '2021-01-05 06:04:17'),
(13, 'Kamera', '2021-01-05 06:04:23', '2021-01-05 06:04:23'),
(14, 'Tv', '2021-01-05 06:04:29', '2021-01-05 06:04:29'),
(15, 'Laptop', '2021-01-05 06:04:37', '2021-01-05 06:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_page_about`
--

CREATE TABLE `tb_page_about` (
  `id` int(11) NOT NULL,
  `status_banner` enum('active','no') NOT NULL DEFAULT 'no',
  `img` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_page_about`
--

INSERT INTO `tb_page_about` (`id`, `status_banner`, `img`, `description`) VALUES
(1, 'active', 'About_1609821566195.png', '<h3>Our Story<br><br></h3><p>Mars electronik merupakan toko elektronik yang menyediakan berbagai kembutuhan elektronik anda.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_page_cart`
--

CREATE TABLE `tb_page_cart` (
  `id` int(11) NOT NULL,
  `status_banner` enum('active','no') NOT NULL DEFAULT 'no',
  `table_title1` varchar(255) DEFAULT NULL,
  `table_title2` varchar(255) DEFAULT NULL,
  `table_title3` varchar(255) DEFAULT NULL,
  `table_title4` varchar(255) DEFAULT NULL,
  `btn_name1` varchar(255) DEFAULT NULL,
  `status_text1` enum('active','no') NOT NULL DEFAULT 'no',
  `btn_name2` varchar(255) DEFAULT NULL,
  `status_btn2` enum('active','no') NOT NULL DEFAULT 'no',
  `footer_title` varchar(255) DEFAULT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `btn_name3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_page_cart`
--

INSERT INTO `tb_page_cart` (`id`, `status_banner`, `table_title1`, `table_title2`, `table_title3`, `table_title4`, `btn_name1`, `status_text1`, `btn_name2`, `status_btn2`, `footer_title`, `title1`, `title2`, `title3`, `btn_name3`) VALUES
(1, 'no', 'PRODUCT', 'PRICE', 'QTY', 'TOTAL', 'Belanja Kembali', 'active', 'Selesaikan Belanja', 'active', 'Cart Total', 'Date of use', 'Addres', 'Total', 'PROCEED TO CHECKOUT');

-- --------------------------------------------------------

--
-- Table structure for table `tb_page_contact`
--

CREATE TABLE `tb_page_contact` (
  `id` int(11) NOT NULL,
  `status_banner` enum('active','no') NOT NULL DEFAULT 'no',
  `maps` text,
  `title` varchar(255) DEFAULT NULL,
  `btn_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_page_contact`
--

INSERT INTO `tb_page_contact` (`id`, `status_banner`, `maps`, `title`, `btn_name`) VALUES
(1, 'active', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1830.2038235521593!2d110.36785111418752!3d-7.741049668275977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59762dee5515:0xc30e002c446c5829!2sDENAYU KITCHEN!5e0!3m2!1sid!2sid!4v1598935297238!5m2!1sid!2sid', 'Find Denayu Kitchen ', 'send');

-- --------------------------------------------------------

--
-- Table structure for table `tb_page_home`
--

CREATE TABLE `tb_page_home` (
  `id` int(11) NOT NULL,
  `status_slider` enum('active','no') NOT NULL DEFAULT 'no',
  `title_1` varchar(255) DEFAULT NULL,
  `status_title_1` enum('active','no') NOT NULL DEFAULT 'no',
  `title_2` varchar(255) DEFAULT NULL,
  `status_title_2` enum('active','no') NOT NULL DEFAULT 'no',
  `status_3` enum('active','no') NOT NULL DEFAULT 'no',
  `title_4` varchar(255) DEFAULT NULL,
  `status_title_4` enum('active','no') NOT NULL DEFAULT 'no',
  `title_5` varchar(255) DEFAULT NULL,
  `status_title_5` enum('active','no') NOT NULL DEFAULT 'no',
  `info_1` varchar(255) DEFAULT NULL,
  `info_2` varchar(255) DEFAULT NULL,
  `info_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_page_home`
--

INSERT INTO `tb_page_home` (`id`, `status_slider`, `title_1`, `status_title_1`, `title_2`, `status_title_2`, `status_3`, `title_4`, `status_title_4`, `title_5`, `status_title_5`, `info_1`, `info_2`, `info_3`) VALUES
(1, 'active', 'POPULAR', 'active', 'New Product', 'active', '', NULL, '', NULL, '', 'Mars', '100% original', 'Recomended');

-- --------------------------------------------------------

--
-- Table structure for table `tb_page_shop`
--

CREATE TABLE `tb_page_shop` (
  `id` int(11) NOT NULL,
  `status_banner` enum('active','no') NOT NULL DEFAULT 'no',
  `sidebar1` varchar(255) DEFAULT NULL,
  `status_slidebar_1` enum('active','no') NOT NULL DEFAULT 'no',
  `sidebar2` varchar(255) DEFAULT NULL,
  `sub_sidebar2` varchar(255) DEFAULT NULL,
  `btn_sub_sidebar2` varchar(255) DEFAULT NULL,
  `status_sidebar2` enum('active','no') NOT NULL DEFAULT 'no',
  `sorting1` varchar(255) DEFAULT NULL,
  `title1_sorting1` varchar(255) DEFAULT NULL,
  `title2_sorting1` varchar(255) DEFAULT NULL,
  `value1` varchar(255) DEFAULT NULL,
  `value2` varchar(255) DEFAULT NULL,
  `status_sorting1` enum('active','no') NOT NULL DEFAULT 'no',
  `sorting_in_detail` varchar(255) DEFAULT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `val_title1` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `val_title2` varchar(255) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `val_title3` varchar(255) DEFAULT NULL,
  `title4` varchar(255) DEFAULT NULL,
  `val_title4` varchar(255) DEFAULT NULL,
  `status_detail_sorting` enum('active','no') NOT NULL DEFAULT 'no',
  `btn_name` varchar(255) DEFAULT NULL,
  `detail_sidebar1` varchar(255) DEFAULT NULL,
  `status_detail_sidebar1` enum('active','no') NOT NULL DEFAULT 'no',
  `detail_sidebar2` varchar(255) DEFAULT NULL,
  `status_detail_sidebar2` enum('active','no') NOT NULL DEFAULT 'no',
  `detail_sidebar3` varchar(255) DEFAULT NULL,
  `status_detail_sidebar3` enum('active','no') NOT NULL DEFAULT 'no',
  `footer_title` varchar(255) DEFAULT NULL,
  `status_footer` enum('active','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_page_shop`
--

INSERT INTO `tb_page_shop` (`id`, `status_banner`, `sidebar1`, `status_slidebar_1`, `sidebar2`, `sub_sidebar2`, `btn_sub_sidebar2`, `status_sidebar2`, `sorting1`, `title1_sorting1`, `title2_sorting1`, `value1`, `value2`, `status_sorting1`, `sorting_in_detail`, `title1`, `val_title1`, `title2`, `val_title2`, `title3`, `val_title3`, `title4`, `val_title4`, `status_detail_sorting`, `btn_name`, `detail_sidebar1`, `status_detail_sidebar1`, `detail_sidebar2`, `status_detail_sidebar2`, `detail_sidebar3`, `status_detail_sidebar3`, `footer_title`, `status_footer`) VALUES
(1, 'no', 'Category', 'active', 'Filter', 'Price', 'Filter', 'active', 'Sorting Asc Desc', 'Price Low To High', 'Price High To Low', 'asc', 'desc', 'active', 'SIZE', '', '', '', '', '', '', '', '', 'no', 'Add To Cart', 'Description', 'active', '', 'no', '', 'no', 'New Products', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_popular`
--

CREATE TABLE `tb_popular` (
  `popular_id` int(11) NOT NULL,
  `popular_product` int(11) NOT NULL,
  `popular_order` int(11) NOT NULL COMMENT 'order 1, 2, dst',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_popular`
--

INSERT INTO `tb_popular` (`popular_id`, `popular_product`, `popular_order`, `created_at`, `updated_at`) VALUES
(33, 76, 1, '2021-01-05 06:21:00', '2021-01-05 06:21:00'),
(34, 81, 2, '2021-01-05 06:21:07', '2021-01-05 06:21:07'),
(35, 78, 3, '2021-01-05 06:21:14', '2021-01-05 06:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_stock` int(11) DEFAULT NULL,
  `product_desc` text,
  `product_img` text NOT NULL,
  `product_status` enum('ready','pre order','not ready') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `product_name`, `product_category`, `product_price`, `product_stock`, `product_desc`, `product_img`, `product_status`, `created_at`, `updated_at`) VALUES
(74, 'ASUS E203MAH', 15, 3300000, 5, '<p xss=removed>Laptop ASUS ini dibekali dengan layar 11,6 inci yang sudah didukug dengan teknologi <span xss=removed>ASUS Tru2Life Video</span> untuk optimalisasi hasil video dan <span xss=removed>ASUS SonicMaster</span> di sektor audio.</p><p xss=removed>Terlebih layar ini bisa dibuka hingga 180 derajat di atas permukaan yang datar, di mana ASUS juga mengklaim engselnya punya <em>build quality</em> yang sudah tahan uji buka-tutup hingga 20 ribu kali.</p><p xss=removed>Untuk sektor performa, ASUS E203MAH ini dipersenjatai dengan prosesor <span xss=removed>Intel Celeron N4000</span> dengan dukungan RAM 2GB DDR4 dan HDD 500GB,</p>', 'pr_1609827091831.png', 'ready', '2021-01-05 06:11:32', '2021-01-05 06:11:32'),
(75, 'HP 14-CK0012TU', 15, 3500000, 10, '<p xss=removed>Kalau kamu lagi mencari harga laptop murah kualitas bagus di kisaran 3 jutaan, ada <span xss=removed>HP 14-CK0012TU</span> yang modelnya cocok buat para pelajar yang masih sekolah.</p><p xss=removed>Dapur pacunya masih sama, didukung dengan <span xss=removed>Intel Celeron N4000</span> dan HDD 500GB. Namun dengan kapasitas RAM 4GB DDR4 yang terasa lebih lega.</p><p xss=removed>Kalaupun kamu hendak menyimpan berbagai data, seperti tugas, film, drakor, atau anime di dalamnya Jaka sarankan untuk melakukan <em>upgrade</em> HDD minimal hingga 1TB</p>', 'pr_1609827159615.png', 'ready', '2021-01-05 06:12:39', '2021-01-05 06:12:39'),
(76, 'Nikon D3300', 13, 4200000, 10, '<p xss=removed>Rilis tahun 2014, <span xss=removed>Nikon D3300</span> memiliki kisaran harga <span xss=removed>4 jutaan</span> di tahun 2020. Meski harganya relatif murah, kamera DSLR untuk pemula ini memiliki kualitas foto dan video yang tak main-main.</p><p xss=removed><a href=\"https://jalantikus.com/gadgets/harga-kamera-nikon/\" data-href=\"https://jalantikus.com/gadgets/harga-kamera-nikon/\" class=\"link-internal\" target=\"_blank\" xss=removed>Nikon D3300</a> hadir dengan kemampuan sensor kamera <span xss=removed>24,2 MP</span> dan kualitas video 1920x1080.</p><p xss=removed>Jadi, kamera DSLR ini cocok untuk pemula yang sedang belajar videografi. Dengan range ISO 100-12800, DSLR ini diklaim data mengambil foto dengan jelas bahkan saat gelap sekalipun.</p><p xss=removed>Tak hanya itu, Nikon D3300 juga dilengkapi dengan Wi-Fi sehingga kamu bisa dengan mudah mengirim foto hasil jepretan.</p>', 'pr_1609827254370.png', 'ready', '2021-01-05 06:14:14', '2021-01-05 06:14:14'),
(77, 'Canon EOS 700D', 13, 6000000, 2, '<p xss=removed>Tak hanya Nikon, Canon juga terbilang cukup laris di dunia fotografi. Salah satu kamera DSLR yang <a href=\"https://jalantikus.com/gadgets/gadget-lensa-kamera-cannon/\" data-href=\"https://jalantikus.com/gadgets/gadget-lensa-kamera-cannon/\" class=\"link-internal\" target=\"_blank\" xss=removed>cocok untuk pemula merk Canon</a> adalah EOS 700D.</p><p xss=removed>Dilengkapi dengan <span xss=removed>resolusi kamera 18MP</span>, Canon EOS 700D dapat menghasilkan foto dengan noise rendah.</p><p xss=removed>ISO kamera ini dapat ditingkatkan hingga <span xss=removed>12800</span> sehingga dapat mengambil gambar dengan baik meskipun minim cahaya.</p><p xss=removed>Ditambah lagi, <a href=\"https://jalantikus.com/gadgets/harga-kamera-canon/\" data-href=\"https://jalantikus.com/gadgets/harga-kamera-canon/\" class=\"link-internal\" target=\"_blank\" xss=removed>Canon EOS 700D</a> memiliki fitur layar LCD Vari-Angle yang memungkinkannya diputar hingga 360 derajat.</p>', 'pr_1609827316405.png', 'ready', '2021-01-05 06:15:16', '2021-01-05 06:15:16'),
(78, 'Xiaomi Redmi 9C', 12, 1350000, 5, '<p xss=removed>Dibekali <span xss=removed>RAM 4GB</span> dengan memori internal <span xss=removed>64GB</span>, Redmi 9C juga ditenagai <em>chipset</em> <span xss=removed>MediaTek Helio G35</span> yang cukup gahar, termasuk untuk game berat sekalipun.</p><p xss=removed>Kelebihan lainnya adalah HP murah RAM besar di bawah 2 juta ini adalah kapasitas baterai <span xss=removed>5.000 mAH</span>, sangat cukup untuk <em>multitasking</em> seharian.</p><p xss=removed><span xss=removed>Kelebihan Xiaomi Redmi 9C</span></p><ul xss=removed><li xss=removed><div class=\"li-wrapper\" xss=removed>Banyak pilihan warna.</div></li><li xss=removed><div class=\"li-wrapper\" xss=removed>Baterai jumbo.</div></li><li xss=removed><div class=\"li-wrapper\" xss=removed>Fitur kamera cukup lengkap.</div></li></ul><p xss=removed><span xss=removed>Kekurangan Xiaomi Redmi 9C</span></p><ul xss=removed><li xss=removed><div class=\"li-wrapper\" xss=removed>Bodi plastik.</div></li><li xss=removed><div class=\"li-wrapper\" xss=removed>Kapasitas memori internal tergolong kecil.</div></li></ul>', 'pr_1609827392950.png', 'ready', '2021-01-05 06:16:33', '2021-01-05 06:16:33'),
(79, 'Samsung Galaxy M31', 12, 3300000, 4, '<p xss=removed>Selanjutnya, ada HP RAM 6GB murah, yakni Samsung Galaxy M31. Salah satu keunggulan lainnya adalah kapasitas baterai <span xss=removed>6.000 mAh</span> yang kuat untuk aktivitas berat seharian.</p><p xss=removed>Selain itu, Galaxy M31 menjadi <a href=\"https://jalantikus.com/gadgets/hp-kamera-selfie-beresolusi-besar/\" data-href=\"https://jalantikus.com/gadgets/hp-kamera-selfie-beresolusi-besar/\" class=\"link-internal\" target=\"_blank\" xss=removed>HP dengan kamera selfie beresolusi besar</a>, yaitu <span xss=removed>32 MP</span> yang mampu menangkap hasil swafoto dengan jernih.</p><p xss=removed>Layarnya yang sebesar <span xss=removed>6,4 inci</span> juga sudah bertipe Super AMOLED, dengan resolusi <span xss=removed>Full HD (1080 x 2340 pixels)</span> dan rasio yang mencapai <span xss=removed>19,5:9</span>, sehingga tampilan visualnya menjadi sangat lega.</p><p xss=removed><span xss=removed>Kelebihan Samsung Galaxy M31</span></p><ul xss=removed><li xss=removed><div class=\"li-wrapper\" xss=removed>Layar Super AMOLED.</div></li><li xss=removed><div class=\"li-wrapper\" xss=removed>Kamera utama 64MP.</div></li><li xss=removed><div class=\"li-wrapper\" xss=removed>Baterai jumbo.</div></li></ul><p xss=removed><span xss=removed>Kekurangan Samsung Galaxy M31</span></p><ul xss=removed><li xss=removed><div class=\"li-wrapper\" xss=removed>Dapur pacu belum ada peningkatan.</div></li><li xss=removed><div class=\"li-wrapper\" xss=removed>Belum ada NFC.</div></li></ul>', 'pr_1609827460923.png', 'ready', '2021-01-05 06:17:41', '2021-01-05 06:17:41'),
(80, 'Samsung 75 Q95T QLED Smart 4K Smart TV', 14, 52999999, 4, '<p xss=removed>Dengan teknologi QLED ini, <span xss=removed>gambar yang dihasilkan jauh lebih tajam dan terang</span> ketimbang gambar yang dihasilkan oleh TV LED biasa.</p><p xss=removed>Maka dari itu, nggak heran kalau harga Smart TV dengan teknologi QLED dari Samsung ini memang jauh lebih tinggi dari harga tipe lainnya.</p>', 'pr_1609827565500.png', 'ready', '2021-01-05 06:20:40', '2021-01-05 06:20:40'),
(81, 'Samsung Crystal UHD 4K Smart TV TU8000', 14, 4500000, 4, '<p xss=removed>Dengan <span xss=removed>layar panel 4K pada setiap produknya</span>, kualitas gambar yang dihasilkan oleh deretan TV Smart Samsung di seri ini tidak perlu diragukan lagi.</p><p xss=removed>Untuk harga Smart TV <a href=\"https://jalantikus.com/tips/monitor-gaming-4k-hdr-terbaik-2019-benq/\" data-href=\"https://jalantikus.com/tips/monitor-gaming-4k-hdr-terbaik-2019-benq/\" class=\"link-internal\" target=\"_blank\" xss=removed>seri 4K</a> dari Samsung ini pun lebih rendah ketimbang QLED, dan <span xss=removed>masih bisa dibilang cukup terjangkau</span> ketimbang seri sebelumnya.</p>', 'pr_1609827625380.png', 'ready', '2021-01-05 06:20:25', '2021-01-05 06:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-08-08 17:00:00', '2020-08-08 17:00:00'),
(2, 'member', '2020-08-08 17:00:00', '2020-08-08 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_type` varchar(255) NOT NULL,
  `setting_name` varchar(255) DEFAULT NULL,
  `setting_value` varchar(255) DEFAULT NULL,
  `setting_desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`setting_id`, `setting_type`, `setting_name`, `setting_value`, `setting_desc`, `created_at`, `updated_at`) VALUES
(1, 'setting_logo', 'logo', 'Logo_1609821331767.png', 'logo', '2020-08-15 04:41:04', '2020-08-15 04:41:04'),
(2, 'setting_logo', 'favicon', 'fav_1609821391675.png', 'favicon', '2020-08-15 04:41:04', '2020-08-15 04:41:04'),
(3, 'setting_social_media', 'instagram', 'https://www.instagram.com/', 'instagram', '2020-08-15 04:43:17', '2020-08-15 04:43:17'),
(4, 'setting_social_media', 'facebook', 'https://www.facebook.com/', 'facebook', '2020-08-15 04:43:17', '2020-08-15 04:43:17'),
(5, 'setting_social_media', 'youtube', 'https://www.instagram.com/', 'youtube', '2020-08-15 04:43:17', '2020-08-15 04:43:17'),
(6, 'setting_social_media', 'whatsapp', 'https://api.whatsapp.com/', 'whatsapp', '2020-08-15 04:43:17', '2020-08-15 04:43:17'),
(7, 'setting_social_media', 'path', 'https://www.instagram.com/', 'path', '2020-08-15 04:43:17', '2020-08-15 04:43:17'),
(8, 'setting_social_media', 'twitter', 'https://www.instagram.com/', 'twitter', '2020-08-15 04:43:17', '2020-08-15 04:43:17'),
(9, 'setting_mail', 'mail_address', 'marselectronik@gmail.com', 'mail_address', '2020-08-15 04:43:54', '2020-08-15 04:43:54'),
(10, 'setting_banner', 'shop', 'banner_1597581927247.png', 'shop', '2020-08-15 04:45:40', '2020-08-15 04:45:40'),
(11, 'setting_banner', 'cart', 'banner_1597581953627.png', 'cart', '2020-08-15 04:45:40', '2020-08-15 04:45:40'),
(12, 'setting_banner', 'blog', 'banner_1597582125239.png', 'blog', '2020-08-15 04:45:40', '2020-08-15 04:45:40'),
(13, 'setting_banner', 'about', 'banner_1597582164279.png', 'about', '2020-08-15 04:45:40', '2020-08-15 04:45:40'),
(14, 'setting_banner', 'contact', 'banner_1597582154578.png', 'contact', '2020-08-15 04:45:40', '2020-08-15 04:45:40'),
(15, 'setting_footer', 'copyright', 'Copyright @ marselectronict2020', 'copyright', '2020-08-15 04:47:47', '2020-08-15 04:47:47'),
(16, 'setting_footer', 'question', '<p><b>ada yang bisa saya bantu ?</b></p>', 'question', '2020-08-15 04:47:47', '2020-08-15 04:47:47'),
(17, 'setting_money', 'mata_uang', 'IDR', 'mata_uang', '2020-08-17 00:09:48', '2020-08-17 00:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_tittle` varchar(255) DEFAULT NULL,
  `slider_body` varchar(255) DEFAULT NULL,
  `slider_banner` text,
  `slider_order` int(11) NOT NULL COMMENT 'order 1 , 2 , dst',
  `created_at` mediumint(9) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`slider_id`, `slider_tittle`, `slider_body`, `slider_banner`, `slider_order`, `created_at`, `updated_at`) VALUES
(27, 'MARS ELECTRONIK', '<p>Belanja cepat dan mudah serta terpercaya</p>', 'sld_1609826599567.png', 1, 2021, '2021-01-05 06:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction`
--

CREATE TABLE `tb_transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_total` int(11) NOT NULL,
  `transaction_discount` double NOT NULL DEFAULT '0',
  `transaction_uniq_number` int(11) NOT NULL,
  `transaction_code` varchar(255) NOT NULL COMMENT 'code for invoice',
  `transaction_usage` date DEFAULT NULL,
  `transaction_addres` varchar(255) NOT NULL,
  `transaction_paid` int(11) NOT NULL DEFAULT '0',
  `transaction_status` enum('menunggu','diproses') NOT NULL DEFAULT 'menunggu',
  `transaction_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction_confirm`
--

CREATE TABLE `tb_transaction_confirm` (
  `confirm_id` int(11) NOT NULL,
  `confirm_code` int(11) NOT NULL,
  `confirm_img` text NOT NULL,
  `confirm_total` int(11) NOT NULL,
  `confirm_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction_detail`
--

CREATE TABLE `tb_transaction_detail` (
  `transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `transaction_product_id` int(11) DEFAULT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_price` int(11) NOT NULL,
  `transaction_detail_subtotal` bigint(20) NOT NULL,
  `transaction_detail_discount` int(11) NOT NULL,
  `transaction_detail_extra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_addres` varchar(255) DEFAULT NULL,
  `user_phone` char(13) NOT NULL,
  `user_img` text,
  `user_last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_role`, `user_email`, `user_pass`, `user_addres`, `user_phone`, `user_img`, `user_last_login`, `created_at`, `updated_at`) VALUES
(1, 'mars', 1, 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'jl Matematika , Tiyosan', '43786938720', 'usr_1609826140967.png', '2021-01-05 04:22:59', '2020-08-08 17:00:00', '2021-01-05 05:55:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `tb_category_product`
--
ALTER TABLE `tb_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_page_about`
--
ALTER TABLE `tb_page_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_page_cart`
--
ALTER TABLE `tb_page_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_page_contact`
--
ALTER TABLE `tb_page_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_page_home`
--
ALTER TABLE `tb_page_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_page_shop`
--
ALTER TABLE `tb_page_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_popular`
--
ALTER TABLE `tb_popular`
  ADD PRIMARY KEY (`popular_id`),
  ADD KEY `popular_product` (`popular_product`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category` (`product_category`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tb_transaction_confirm`
--
ALTER TABLE `tb_transaction_confirm`
  ADD PRIMARY KEY (`confirm_id`),
  ADD KEY `confirm_user` (`confirm_user`),
  ADD KEY `confirm_code` (`confirm_code`);

--
-- Indexes for table `tb_transaction_detail`
--
ALTER TABLE `tb_transaction_detail`
  ADD PRIMARY KEY (`transaction_detail_id`),
  ADD KEY `tb_transaction_detail_ibfk_2` (`transaction_product_id`),
  ADD KEY `tb_transaction_detail_ibfk_1` (`transaction_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role` (`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_address`
--
ALTER TABLE `tb_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_category_product`
--
ALTER TABLE `tb_category_product`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_page_about`
--
ALTER TABLE `tb_page_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_page_cart`
--
ALTER TABLE `tb_page_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_page_contact`
--
ALTER TABLE `tb_page_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_page_home`
--
ALTER TABLE `tb_page_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_page_shop`
--
ALTER TABLE `tb_page_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_popular`
--
ALTER TABLE `tb_popular`
  MODIFY `popular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_transaction_confirm`
--
ALTER TABLE `tb_transaction_confirm`
  MODIFY `confirm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_transaction_detail`
--
ALTER TABLE `tb_transaction_detail`
  MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD CONSTRAINT `tb_address_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_popular`
--
ALTER TABLE `tb_popular`
  ADD CONSTRAINT `tb_popular_ibfk_1` FOREIGN KEY (`popular_product`) REFERENCES `tb_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `tb_product_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `tb_category_product` (`category_id`);

--
-- Constraints for table `tb_transaction_confirm`
--
ALTER TABLE `tb_transaction_confirm`
  ADD CONSTRAINT `tb_transaction_confirm_ibfk_1` FOREIGN KEY (`confirm_user`) REFERENCES `tb_user` (`user_id`),
  ADD CONSTRAINT `tb_transaction_confirm_ibfk_2` FOREIGN KEY (`confirm_code`) REFERENCES `tb_transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaction_detail`
--
ALTER TABLE `tb_transaction_detail`
  ADD CONSTRAINT `tb_transaction_detail_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `tb_transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaction_detail_ibfk_2` FOREIGN KEY (`transaction_product_id`) REFERENCES `tb_product` (`product_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `tb_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
