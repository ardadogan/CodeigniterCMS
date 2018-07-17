-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Tem 2017, 14:40:45
-- Sunucu sürümü: 10.1.13-MariaDB
-- PHP Sürümü: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `zitelitik`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_user`
--

CREATE TABLE `admin_user` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `admin_user`
--

INSERT INTO `admin_user` (`userId`, `name`, `email`, `username`, `password`, `create_date`) VALUES
(1, 'Yönetici', '', 'admin', 'admin', '2015-11-11 09:21:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `app`
--

CREATE TABLE `app` (
  `id` int(11) NOT NULL,
  `appId` int(11) DEFAULT NULL,
  `google_site_verification` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `analytics_code` text COLLATE utf8_unicode_ci,
  `languageId` int(11) DEFAULT NULL,
  `title` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(260) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `app`
--

INSERT INTO `app` (`id`, `appId`, `google_site_verification`, `analytics_code`, `languageId`, `title`, `description`, `keywords`) VALUES
(1, 1, '', '', 0, NULL, NULL, NULL),
(2, 1, NULL, NULL, 1, 'Varsayılan Site Başlığı', '', ''),
(3, 1, NULL, NULL, 2, 'Page Tıtle', '', ''),
(4, 1, NULL, NULL, 3, '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `i_key` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `i_value` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `contact_info`
--

INSERT INTO `contact_info` (`id`, `categoryId`, `i_key`, `i_value`) VALUES
(1, 2, 'phone', '0212 654 8796'),
(4, 2, 'eposta', 'depo@sitelitik.com'),
(16, 1, 'eposta', '0'),
(15, 1, 'fax', '0'),
(14, 1, 'gsm', '0'),
(17, 1, 'adres', 'ADRES'),
(19, 1, 'phone', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact_info_category`
--

CREATE TABLE `contact_info_category` (
  `categoryId` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `contact_info_category`
--

INSERT INTO `contact_info_category` (`categoryId`, `name`) VALUES
(1, 'Merkez');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery_category`
--

CREATE TABLE `gallery_category` (
  `galleryId` int(11) NOT NULL,
  `type` varchar(15) COLLATE utf8_unicode_ci DEFAULT 'gallery' COMMENT 'gallery | product | page',
  `contentId` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `protected` float DEFAULT '0',
  `width` int(4) DEFAULT NULL,
  `height` int(4) DEFAULT NULL,
  `ratio` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'fill',
  `mobile_icon` varchar(40) COLLATE utf8_unicode_ci DEFAULT 'photo_size_select_actual'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `gallery_category`
--

INSERT INTO `gallery_category` (`galleryId`, `type`, `contentId`, `name`, `protected`, `width`, `height`, `ratio`, `mobile_icon`) VALUES
(1, 'product', 10, 'product', 0, 800, 800, 'fill', 'photo_size_select_actual'),
(2, 'product', 11, 'product', 0, 800, 800, 'fill', 'photo_size_select_actual'),
(4, 'product', 13, 'product', 0, 800, 800, 'fill', 'photo_size_select_actual'),
(8, 'product', 3, 'a', 0, 800, 600, 'fill', 'photo_size_select_actual'),
(9, 'product', 4, 'product', 0, 800, 800, 'fill', 'photo_size_select_actual'),
(10, 'page', 1, 'page', 0, 800, 475, 'fill', 'photo_size_select_actual'),
(11, 'gallery', NULL, 'Slider', 0, 1920, 600, 'fill', 'photo_size_select_actual'),
(12, 'gallery', NULL, 'Galeri', 0, 800, 600, 'fill', 'photo_size_select_actual'),
(13, 'product', 5, 'product', 0, 800, 800, 'fill', 'photo_size_select_actual');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery_photos`
--

CREATE TABLE `gallery_photos` (
  `photoId` int(11) NOT NULL,
  `galleryId` int(11) DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `language` int(11) DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `gallery_photos`
--

INSERT INTO `gallery_photos` (`photoId`, `galleryId`, `image`, `name`, `createDate`, `language`, `description`) VALUES
(1, 1, 'sitelitik.com-product_10.jpg', NULL, '2016-12-22 08:04:09', 0, NULL),
(2, 2, 'sitelitik.com-product_11.jpg', NULL, '2016-12-22 08:54:15', 0, NULL),
(3, 2, 'sitelitik.com-product_12.jpg', NULL, '2016-12-22 08:54:18', 0, NULL),
(4, 2, 'sitelitik.com-product_13.jpg', NULL, '2016-12-22 08:54:21', 0, NULL),
(5, 3, 'sitelitik.com-ieaiea.jpg', NULL, '2016-12-22 13:36:18', 0, NULL),
(6, 5, 'sitelitik.com-calismalarimiz.jpg', NULL, '2016-12-23 15:10:33', 0, NULL),
(7, 5, 'sitelitik.com-calismalarimiz_1.jpg', NULL, '2016-12-23 15:10:35', 0, NULL),
(8, 5, 'sitelitik.com-calismalarimiz_2.jpg', NULL, '2016-12-23 15:10:36', 0, NULL),
(9, 5, 'sitelitik.com-calismalarimiz_3.jpg', NULL, '2016-12-23 15:10:38', 0, NULL),
(10, 5, 'sitelitik.com-calismalarimiz_4.jpg', NULL, '2016-12-23 15:10:39', 0, NULL),
(11, 5, 'sitelitik.com-calismalarimiz_5.jpg', NULL, '2016-12-23 15:10:40', 0, NULL),
(12, 5, 'sitelitik.com-calismalarimiz_6.jpg', NULL, '2016-12-23 15:10:43', 0, NULL),
(13, 5, 'sitelitik.com-calismalarimiz_7.jpg', NULL, '2016-12-23 15:10:44', 0, NULL),
(14, 5, 'sitelitik.com-calismalarimiz_8.jpg', NULL, '2016-12-23 15:10:45', 0, NULL),
(15, 5, 'sitelitik.com-calismalarimiz_9.jpg', NULL, '2016-12-23 15:10:46', 0, NULL),
(16, 5, 'sitelitik.com-calismalarimiz_10.jpg', NULL, '2016-12-23 15:10:48', 0, NULL),
(17, 5, 'sitelitik.com-calismalarimiz_11.jpg', NULL, '2016-12-23 15:10:49', 0, NULL),
(18, 5, 'sitelitik.com-calismalarimiz_12.jpg', NULL, '2016-12-23 15:10:50', 0, NULL),
(19, 5, 'sitelitik.com-calismalarimiz_13.jpg', NULL, '2016-12-23 15:10:52', 0, NULL),
(20, 5, 'sitelitik.com-calismalarimiz_14.jpg', NULL, '2016-12-23 15:10:53', 0, NULL),
(21, 5, 'sitelitik.com-calismalarimiz_15.jpg', NULL, '2016-12-23 15:10:54', 0, NULL),
(22, 5, 'sitelitik.com-calismalarimiz_16.jpg', NULL, '2016-12-23 15:10:55', 0, NULL),
(23, 5, 'sitelitik.com-calismalarimiz_17.jpg', NULL, '2016-12-23 15:10:57', 0, NULL),
(24, 5, 'sitelitik.com-calismalarimiz_18.jpg', NULL, '2016-12-23 15:10:58', 0, NULL),
(25, 5, 'sitelitik.com-calismalarimiz_19.jpg', NULL, '2016-12-23 15:10:59', 0, NULL),
(26, 5, 'sitelitik.com-calismalarimiz_20.jpg', NULL, '2016-12-23 15:11:00', 0, NULL),
(27, 5, 'sitelitik.com-calismalarimiz_21.jpg', NULL, '2016-12-23 15:11:01', 0, NULL),
(28, 7, 'sitelitik.com-umran-hanim-tritikale.jpg', NULL, '2016-12-23 15:36:08', 0, NULL),
(29, 7, 'sitelitik.com-umran-hanim-tritikale_1.jpg', NULL, '2016-12-23 15:36:11', 0, NULL),
(30, 7, 'sitelitik.com-umran-hanim-tritikale_2.jpg', NULL, '2016-12-23 15:36:15', 0, NULL),
(31, 7, 'sitelitik.com-umran-hanim-tritikale_3.jpg', NULL, '2016-12-23 15:36:18', 0, NULL),
(32, 7, 'sitelitik.com-umran-hanim-tritikale_4.jpg', NULL, '2016-12-23 15:36:22', 0, NULL),
(33, 7, 'sitelitik.com-umran-hanim-tritikale_5.jpg', NULL, '2016-12-23 15:36:25', 0, NULL),
(34, 7, 'sitelitik.com-umran-hanim-tritikale_6.jpg', NULL, '2016-12-23 15:36:30', 0, NULL),
(35, 7, 'sitelitik.com-umran-hanim-tritikale_7.jpg', NULL, '2016-12-23 15:36:32', 0, NULL),
(36, 7, 'sitelitik.com-umran-hanim-tritikale_8.jpg', NULL, '2016-12-23 15:36:36', 0, NULL),
(37, 7, 'sitelitik.com-umran-hanim-tritikale.png', NULL, '2016-12-23 15:36:38', 0, NULL),
(38, 7, 'sitelitik.com-umran-hanim-tritikale_9.jpg', NULL, '2016-12-23 15:36:41', 0, NULL),
(39, 7, 'sitelitik.com-umran-hanim-tritikale_10.jpg', NULL, '2016-12-23 15:36:44', 0, NULL),
(40, 7, 'sitelitik.com-umran-hanim-tritikale_11.jpg', NULL, '2016-12-23 15:36:47', 0, NULL),
(41, 7, 'sitelitik.com-umran-hanim-tritikale_1.png', NULL, '2016-12-23 15:36:50', 0, NULL),
(42, 7, 'sitelitik.com-umran-hanim-tritikale_2.png', NULL, '2016-12-23 15:36:52', 0, NULL),
(43, 7, 'sitelitik.com-umran-hanim-tritikale_3.png', NULL, '2016-12-23 15:36:54', 0, NULL),
(44, 7, 'sitelitik.com-umran-hanim-tritikale_4.png', NULL, '2016-12-23 15:36:57', 0, NULL),
(45, 7, 'sitelitik.com-umran-hanim-tritikale_12.jpg', NULL, '2016-12-23 15:37:00', 0, NULL),
(46, 7, 'sitelitik.com-umran-hanim-tritikale_13.jpg', NULL, '2016-12-23 15:37:06', 0, NULL),
(47, 7, 'sitelitik.com-umran-hanim-tritikale_5.png', NULL, '2016-12-23 15:37:08', 0, NULL),
(48, 7, 'sitelitik.com-umran-hanim-tritikale_14.jpg', NULL, '2016-12-23 15:37:13', 0, NULL),
(49, 7, 'sitelitik.com-umran-hanim-tritikale_6.png', NULL, '2016-12-23 15:37:16', 0, NULL),
(50, 7, 'sitelitik.com-umran-hanim-tritikale_15.jpg', NULL, '2016-12-23 15:37:22', 0, NULL),
(51, 7, 'sitelitik.com-umran-hanim-tritikale_16.jpg', NULL, '2016-12-23 15:37:28', 0, NULL),
(61, 8, 'sitelitik.com-a_5.jpg', NULL, '2017-07-06 13:57:46', 0, NULL),
(62, 8, 'sitelitik.com-a_6.jpg', NULL, '2017-07-06 13:57:49', 0, NULL),
(63, 8, 'sitelitik.com-a_7.jpg', NULL, '2017-07-06 13:57:50', 0, NULL),
(64, 9, 'sitelitik.com-product_14.jpg', NULL, '2017-07-06 14:00:27', 0, NULL),
(65, 9, 'sitelitik.com-product_15.jpg', NULL, '2017-07-06 14:00:30', 0, NULL),
(66, 9, 'sitelitik.com-product_16.jpg', NULL, '2017-07-06 14:00:33', 0, NULL),
(67, 10, 'sitelitik.com-page.jpg', NULL, '2017-07-06 14:38:32', 0, NULL),
(68, 10, 'sitelitik.com-page_1.jpg', NULL, '2017-07-06 14:38:34', 0, NULL),
(69, 10, 'sitelitik.com-page_2.jpg', NULL, '2017-07-06 14:38:35', 0, NULL),
(70, 11, 'sitelitik.com-slider_3.jpg', NULL, '2017-07-06 15:29:16', 0, NULL),
(71, 13, 'sitelitik.com-product.jpg', NULL, '2017-07-06 15:32:12', 0, NULL),
(72, 13, 'sitelitik.com-product_1.jpg', NULL, '2017-07-06 15:32:16', 0, NULL),
(73, 13, 'sitelitik.com-product_2.jpg', NULL, '2017-07-06 15:32:19', 0, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `languages`
--

CREATE TABLE `languages` (
  `languageId` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default` float DEFAULT NULL,
  `latin` float DEFAULT '1',
  `status` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='http://www.localeplanet.com/icu/';

--
-- Tablo döküm verisi `languages`
--

INSERT INTO `languages` (`languageId`, `name`, `code`, `image`, `locale`, `country`, `alias`, `default`, `latin`, `status`) VALUES
(1, 'Türkçe', 'tr', 'tr.png', NULL, NULL, 'Türkçe', 1, 1, 1),
(2, 'English', 'en', 'en.png', NULL, NULL, 'İngilizce', 0, 1, 1),
(3, 'Deutsch', 'de', 'de.png', NULL, NULL, 'Almanca', 0, 1, 0),
(4, 'العربية', 'ar', 'ar.png', NULL, NULL, 'Arapça', 0, 0, 0),
(5, 'русский', 'ru', 'ru.png', NULL, NULL, 'Rusça', 0, 0, 0),
(6, 'azərbaycanca', 'az', 'az.png', NULL, NULL, 'Azerice', 0, 0, 0),
(7, 'български', 'bg', 'bg.png', NULL, NULL, 'Bulgarca', 0, 0, 0),
(8, 'বাংলা', 'bn', 'bn.png', NULL, NULL, 'Bengalce', 0, 0, 0),
(9, 'bosanski', 'bs', 'bs.png', NULL, NULL, 'Boşnakça', 0, 0, 0),
(10, 'català', 'ca', 'ca.png', NULL, NULL, 'Katalanca', 0, 0, 0),
(11, 'čeština', 'cs', 'cs.png', NULL, NULL, 'Çekçe', 0, 0, 0),
(12, '	dansk', 'da', 'da.png', NULL, NULL, 'Danca', 0, 1, 0),
(13, 'Ελληνικά', 'el', 'el.png', NULL, NULL, 'Yunanca', 0, 0, 0),
(14, 'esperanto', 'eo', 'eo.png', NULL, NULL, 'Esperanto', 0, 1, 0),
(15, '	español', 'es', 'es.png', NULL, NULL, 'İspanyolca', 0, 0, 0),
(16, 'eesti', 'et', 'et.png', NULL, NULL, 'Estonca', 0, 1, 0),
(17, 'euskara', 'eu', 'eu.png', NULL, NULL, 'Baskça', 0, 1, 0),
(18, 'فارسی', 'fa', 'fa.png', NULL, NULL, 'Farsça', 0, 0, 0),
(19, 'suomi', 'fi', 'fi.png', NULL, NULL, 'Fince', 0, 0, 0),
(20, 'français', 'fr', 'fr.png', NULL, NULL, 'Fransızca', 0, 0, 0),
(21, 'galego', 'gl', 'gl.png', NULL, NULL, 'Galiçyaca', 0, 0, 0),
(22, 'עברית', 'he', 'he.png', NULL, NULL, 'İbranice', 0, 0, 0),
(23, 'हिन्दी', 'hi', 'hi.png', NULL, NULL, 'Hintçe', 0, 0, 0),
(24, 'hrvatski', 'hr', 'hr.png', NULL, NULL, 'Hırvatça', 0, 0, 0),
(25, 'magyar', 'hu', 'hu.png', NULL, NULL, 'Macarca', 0, 0, 0),
(26, 'Հայերէն', 'hy', 'hy.png', NULL, NULL, 'Ermenice', 0, 0, 0),
(27, 'Bahasa Indonesia', 'id', 'id.png', NULL, NULL, 'Endonezce', 0, 1, 0),
(28, 'íslenska', 'is', 'is.png', NULL, NULL, 'İzlandaca', 0, 0, 0),
(29, '	italiano', 'it', 'it.png', NULL, NULL, 'İtalyanca', 0, 1, 0),
(30, '日本語', 'ja', 'ja.png', NULL, NULL, 'Japonca', 0, 0, 0),
(31, '	ქართული', 'ka', 'ka.png', NULL, NULL, 'Gürcüce', 0, 0, 0),
(32, '	қазақ тілі', 'kk', 'kk.png', NULL, NULL, 'Kazakça', 0, 0, 0),
(33, '한국어', 'ko', 'ko.png', NULL, NULL, 'Korece', 0, 0, 0),
(34, 'latviešu', 'lv', 'lv.png', NULL, NULL, 'Letonca', 0, 0, 0),
(35, 'norsk bokmål', 'no', 'no.png', NULL, NULL, 'Norveççe', 0, 1, 0),
(36, 'polski', 'pl', 'pl.png', NULL, NULL, 'Lehçe', 0, 0, 0),
(37, 'português', 'pt', 'pt.png', NULL, NULL, 'Portekizce', 0, 0, 0),
(38, 'română', 'ro', 'ro.png', NULL, NULL, 'Romence', 0, 1, 0),
(39, '	slovenčina', 'sk', 'sk.png', NULL, NULL, 'Slovakça', 0, 0, 0),
(40, 'shqip', 'sq', 'sq.png', NULL, NULL, 'Arnavutça', 0, 1, 0),
(41, 'Српски', 'sr', 'sr.png', NULL, NULL, 'Sırpça', 0, 0, 0),
(42, '	українська', 'uk', 'uk.png', NULL, NULL, 'Ukraynaca', 0, 0, 0),
(43, '中文', 'zh', 'zh.png', NULL, NULL, 'Çince', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log_login_try`
--

CREATE TABLE `log_login_try` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `request` text COLLATE utf8_unicode_ci,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `log_login_try`
--

INSERT INTO `log_login_try` (`id`, `ip`, `username`, `mail`, `password`, `from`, `request`, `description`, `date`) VALUES
(1, '127.0.0.1', 'admin', NULL, 'admin', NULL, 'Array\n(\n    [header] => Array\n        (\n            [Host] => sitelitik.com\n            [Connection] => keep-alive\n            [Content-Length] => 292\n            [Accept] => */*\n            [Origin] => http://sitelitik.com\n            [X-Requested-With] => XMLHttpRequest\n            [User-Agent] => Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36\n            [Content-Type] => multipart/form-data; boundary=----WebKitFormBoundaryV9kcbztGcTdurVvp\n            [Referer] => http://sitelitik.com/admin/login\n            [Accept-Encoding] => gzip, deflate\n            [Accept-Language] => tr-TR,tr;q=0.8,en-US;q=0.6,en;q=0.4\n            [Cookie] => _ga=GA1.2.158088994.1481262825; ci_session=d311606e26e2ebde96269b99a985a094022bad72\n        )\n\n    [post] => Array\n        (\n            [ebd1d809d656b482a04ee93c356ec9b5] => admin\n            [6b6959966021cf4e8df7519311a6ea19] => admin\n        )\n\n    [get] => Array\n        (\n        )\n\n)\n', 'incorrect input name : username', NULL),
(2, '127.0.0.1', 'admin', NULL, 'admin', NULL, 'Array\n(\n    [header] => Array\n        (\n            [Host] => sitelitik.com\n            [Connection] => keep-alive\n            [Content-Length] => 292\n            [Accept] => */*\n            [Origin] => http://sitelitik.com\n            [X-Requested-With] => XMLHttpRequest\n            [User-Agent] => Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36\n            [Content-Type] => multipart/form-data; boundary=----WebKitFormBoundary2vz3B58X61DUD2VF\n            [Referer] => http://sitelitik.com/admin/login\n            [Accept-Encoding] => gzip, deflate\n            [Accept-Language] => tr-TR,tr;q=0.8,en-US;q=0.6,en;q=0.4\n            [Cookie] => _ga=GA1.2.158088994.1481262825; ci_session=d311606e26e2ebde96269b99a985a094022bad72\n        )\n\n    [post] => Array\n        (\n            [ebd1d809d656b482a04ee93c356ec9b5] => admin\n            [6b6959966021cf4e8df7519311a6ea19] => admin\n        )\n\n    [get] => Array\n        (\n        )\n\n)\n', 'incorrect input name : username', NULL),
(3, '::1', 'admin', NULL, 'admin', NULL, 'Array\n(\n    [header] => Array\n        (\n            [Host] => localhost\n            [Connection] => keep-alive\n            [Content-Length] => 292\n            [Accept] => */*\n            [Origin] => http://localhost\n            [X-Requested-With] => XMLHttpRequest\n            [User-Agent] => Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36\n            [Content-Type] => multipart/form-data; boundary=----WebKitFormBoundaryxN18ly6PXkf9BRBK\n            [Referer] => http://localhost/ard/zitelitik/admin/login\n            [Accept-Encoding] => gzip, deflate, br\n            [Accept-Language] => tr-TR,tr;q=0.8,en-US;q=0.6,en;q=0.4\n            [Cookie] => ci_session=d5d3d7483ac04728364b1ca85bda9e52c66f7ad7\n            [AlexaToolbar-ALX_NS_PH] => AlexaToolbar/alx-4.0.1\n        )\n\n    [post] => Array\n        (\n            [a993ccffcbd5206638c5b7d3d7fe6b3f] => admin\n            [b2e90357a56331f263366504c06a696f] => admin\n        )\n\n    [get] => Array\n        (\n        )\n\n)\n', 'incorrect input name : username', NULL),
(4, '::1', 'admin', NULL, 'admin', NULL, 'Array\n(\n    [header] => Array\n        (\n            [Host] => localhost\n            [Connection] => keep-alive\n            [Content-Length] => 292\n            [Accept] => */*\n            [Origin] => http://localhost\n            [X-Requested-With] => XMLHttpRequest\n            [User-Agent] => Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36\n            [Content-Type] => multipart/form-data; boundary=----WebKitFormBoundaryTA9FydHlJXzYknz4\n            [Referer] => http://localhost/ard/zitelitik/admin/login\n            [Accept-Encoding] => gzip, deflate, br\n            [Accept-Language] => tr-TR,tr;q=0.8,en-US;q=0.6,en;q=0.4\n            [Cookie] => ci_session=d5d3d7483ac04728364b1ca85bda9e52c66f7ad7\n            [AlexaToolbar-ALX_NS_PH] => AlexaToolbar/alx-4.0.1\n        )\n\n    [post] => Array\n        (\n            [a993ccffcbd5206638c5b7d3d7fe6b3f] => admin\n            [b2e90357a56331f263366504c06a696f] => admin\n        )\n\n    [get] => Array\n        (\n        )\n\n)\n', 'incorrect input name : username', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `pageId` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'default.png',
  `createDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`pageId`, `categoryId`, `image`, `createDate`) VALUES
(1, 1, 'hakkimizda_4.png', '2016-12-02 06:58:56'),
(2, 1, 'vizyonumuz.jpg', '2016-12-02 06:59:36'),
(3, 1, 'misyonumuz.png', '2016-12-02 07:00:19'),
(4, 1, 'truncate-testi-icin-cok-uzun-sayfa-adi.jpg', '2016-12-23 10:24:29'),
(5, 1, 'default.png', '2016-12-23 12:47:07'),
(6, 7, 'bu-guzel-bi-fotograf.jpg', '2016-12-23 14:10:16'),
(7, 7, 'apollo-11.jpg', '2016-12-23 14:12:00'),
(8, 4, 'default.png', '2017-07-06 15:30:20'),
(9, 4, 'default.png', '2017-07-06 15:30:27'),
(10, 4, 'default.png', '2017-07-06 15:30:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages_category`
--

CREATE TABLE `pages_category` (
  `categoryId` int(11) NOT NULL,
  `protected` float DEFAULT '0',
  `width` int(4) DEFAULT NULL,
  `height` int(4) DEFAULT NULL,
  `ratio` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'fill',
  `img_required` float DEFAULT '0',
  `mobile_icon` varchar(40) COLLATE utf8_unicode_ci DEFAULT 'insert_drive_file'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `pages_category`
--

INSERT INTO `pages_category` (`categoryId`, `protected`, `width`, `height`, `ratio`, `img_required`, `mobile_icon`) VALUES
(4, 0, 800, 600, 'fill', 0, 'insert_drive_file');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages_category_lang`
--

CREATE TABLE `pages_category_lang` (
  `langId` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `languageId` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `pages_category_lang`
--

INSERT INTO `pages_category_lang` (`langId`, `categoryId`, `languageId`, `name`, `text`) VALUES
(11, 4, 1, 'Kurumsal', ''),
(12, 4, 2, '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages_lang`
--

CREATE TABLE `pages_lang` (
  `langId` int(11) NOT NULL,
  `pageId` int(11) DEFAULT NULL,
  `languageId` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8_unicode_ci,
  `description` varbinary(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `pages_lang`
--

INSERT INTO `pages_lang` (`langId`, `pageId`, `languageId`, `name`, `text`, `description`) VALUES
(1, 1, 1, 'Hakkımızda', '<p>T&uuml;rk&ccedil;e karakter testi.&nbsp;</p>\r\n<p>Quisque tristique mauris nulla, ac placerat nibh elementum vitae. Nullam non mollis nisl. Integer laoreet diam vitae hendrerit congue. Morbi dapibus fringilla ante, sit amet mollis augue dignissim sit amet. Vestibulum sem nulla, egestas vel vehicula ultrices, varius eget turpis. Sed ultrices interdum neque, fermentum euismod turpis elementum egestas. Nullam id porttitor nulla, eu auctor arcu. Pellentesque et purus maximus, blandit justo sed, tincidunt sapien. Sed nec congue tortor, id condimentum tellus. Suspendisse malesuada laoreet metus non lacinia. Suspendisse dignissim at enim quis imperdiet. Nulla fringilla diam id est bibendum, sit amet vestibulum enim vulputate. Integer eu sagittis dui. Etiam sit amet purus in velit sagittis aliquam non et lectus. Ut dignissim elit tristique odio feugiat, ut dictum nibh bibendum.</p>\r\n<p>Sed a elit vitae ex feugiat sollicitudin. Aenean eu accumsan mauris. Nulla ac fringilla velit, sit amet finibus dolor. Aenean venenatis purus malesuada libero cursus dapibus. Aliquam nisl felis, commodo at mauris ut, laoreet faucibus ipsum. Sed nulla metus, imperdiet vel sem et, dapibus auctor metus. Pellentesque sit amet ornare lacus, et varius urna. Nunc eget diam varius, egestas odio ut, pulvinar lorem. Duis imperdiet eu magna sit amet pharetra. Nunc eu hendrerit mauris. Vestibulum ultrices suscipit ligula, id rhoncus erat eleifend eget.</p>', NULL),
(2, 1, 2, 'About us', '<p>Quisque tristique mauris nulla, ac placerat nibh elementum vitae. Nullam non mollis nisl. Integer laoreet diam vitae hendrerit congue. Morbi dapibus fringilla ante, sit amet mollis augue dignissim sit amet. Vestibulum sem nulla, egestas vel vehicula ultrices, varius eget turpis. Sed ultrices interdum neque, fermentum euismod turpis elementum egestas. Nullam id porttitor nulla, eu auctor arcu. Pellentesque et purus maximus, blandit justo sed, tincidunt sapien. Sed nec congue tortor, id condimentum tellus. Suspendisse malesuada laoreet metus non lacinia. Suspendisse dignissim at enim quis imperdiet. Nulla fringilla diam id est bibendum, sit amet vestibulum enim vulputate. Integer eu sagittis dui. Etiam sit amet purus in velit sagittis aliquam non et lectus. Ut dignissim elit tristique odio feugiat, ut dictum nibh bibendum.</p>\r\n<p>Sed a elit vitae ex feugiat sollicitudin. Aenean eu accumsan mauris. Nulla ac fringilla velit, sit amet finibus dolor. Aenean venenatis purus malesuada libero cursus dapibus. Aliquam nisl felis, commodo at mauris ut, laoreet faucibus ipsum. Sed nulla metus, imperdiet vel sem et, dapibus auctor metus. Pellentesque sit amet ornare lacus, et varius urna. Nunc eget diam varius, egestas odio ut, pulvinar lorem. Duis imperdiet eu magna sit amet pharetra. Nunc eu hendrerit mauris. Vestibulum ultrices suscipit ligula, id rhoncus erat eleifend eget.</p>', NULL),
(3, 1, 3, 'Wir über uns', '', NULL),
(4, 1, 24, 'O nama', '', NULL),
(5, 2, 1, 'Vizyonumuz', '', NULL),
(6, 2, 2, 'Our Vision', '', NULL),
(7, 2, 3, 'Unsere Vision', '', NULL),
(8, 2, 24, 'Naša vizija', '', NULL),
(9, 3, 1, 'Misyonumuz', '<p>Peder Gabriel Brezilya''nın dağlarına, hristiyanlığı yaymak i&ccedil;in gider. Hristiyanlığın gelmesiyle birlikte bu dağlarda yaşayanların altın &ccedil;ağı da başlamış oluyor. Bir k&ouml;leci olan Mendoza kardeşini &ouml;ld&uuml;rm&uuml;ş ve Peder Gabriel sayesinde intihar etmekten vazge&ccedil;miştir. Peder Gabriel, misyonunda yardım etmesi i&ccedil;in Mendoza''yı yanına getirtiyor. Burada huzura kavuşan Mendoza, rahip olmak i&ccedil;in başvuruyor. Baskı altında olan kilise, Portekizlilere karşı &ccedil;ıkamadığından, topraklarda yeniden k&ouml;lecilerin olmasını da karşı koyamıyor. Mendoza s&ouml;z&uuml;n&uuml; tutmayıp, yerlilerin kendilerini nasıl savunması gerektiğini onlara g&ouml;steriyor, ancak Peder Gabriel, Mendoza''nın yerlilere bir rahip olarak yardım etmesini istiyor.</p>', NULL),
(10, 3, 2, 'Our Mission', '', NULL),
(11, 3, 3, 'Unsere Mission', '', NULL),
(12, 3, 24, 'Naša misija', '', NULL),
(13, 4, 1, 'Truncate Testi İçin Çok Uzun Sayfa Adı. Biraz daha ek lazım', '', NULL),
(14, 4, 2, '', '', NULL),
(15, 4, 3, '', '', NULL),
(16, 5, 1, 'Resimsiz Test ', '<p>iea</p>', NULL),
(17, 5, 2, '', '', NULL),
(18, 5, 3, '', '', NULL),
(19, 6, 1, 'Bu Güzel Bi fotoğraf', '<p class="p1"><span class="s1">Kullanıcılar eğer bir websitesinde rahat&ccedil;a gezinemiyorlarsa onu kullanmaya devam ederler mi? Etmezler, en azından uzun bir s&uuml;re. Web tasarımcıları bunu bilir. Tasarımcılar aynı zamanda bir websitesindeki bilginin anlamlı olması i&ccedil;in belli bir d&uuml;zen &ccedil;er&ccedil;evesinde yerleştirilmesi gerektiğini de bilirler. Bu nedenle wireframe oluşturmak, web tasarımın &ouml;nemli bir par&ccedil;ası olarak kabul edilir. Bu yazıda da wireframelerin neden web tasarımı i&ccedil;in bu kadar &ouml;nemli olduğunu anlatacağız.</span><span id="more-4129"></span></p>\r\n<p class="p1"><span class="s1"><strong>Wireframe Nedir?</strong></span></p>\r\n<p class="p3"><span class="s1">Temelde wireframe, bir web sayfasının farklı &ouml;gelerinin yerini ve boyutunu g&ouml;steren beyaz-siyah renkteki taslaktır.</span></p>\r\n<p class="p3"><span class="s1">İşte bir wireframe &ouml;rneği: (G&ouml;rsel gelecek)</span></p>\r\n<p class="p3"><span class="s1">Wireframe herhangi bir tasarım veya yaratıcı &ouml;geden yoksundur. Wireframe hazırlamaktaki ama&ccedil; web tasarımcılarına bir websitesinin d&uuml;zeninin kuşbakışı g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; g&ouml;stermektir. Aynı zamanda şu konularda da web tasarımcılarına &ouml;rnek olur:</span></p>\r\n<p><em><span class="s1">Kullanıcının websitesindeki bilgiyi nasıl işleyeceğinin planı</span></em></p>\r\n<p><em><span class="s1">Kullanıcıların aray&uuml;zle ile nasıl etkileşime gireceğinin planı</span></em></p>\r\n<h4 class="p1"><img class="aligncenter size-full wp-image-4136" src="http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf1.jpg" sizes="(max-width: 750px) 100vw, 750px" srcset="http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf1.jpg 750w, http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf1-300x169.jpg 300w, http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf1-360x202.jpg 360w, http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf1-1140x641.jpg 1140w" alt="" width="750" height="422" /></h4>\r\n<h4 class="p1"><span class="s1"><strong>Wireframe Neden &Ouml;nemlidir?</strong></span></h4>\r\n<p class="p5"><span class="s1">Wireframe aynı zamanda web tasarımcı ile m&uuml;şterinin, website yapısı hakkında aynı noktada olmalarını sağlar. Bir websitesinin nasıl g&ouml;r&uuml;nd&uuml;ğ&uuml;n&uuml; ve fonksiyonlarını belirler. Bu şekilde kullanıcıların ziyaret etmek istedikleri bir websitesi yaratabilirsiniz. Wireframeleri yanlış kullandığınızda ise d&uuml;zeltmesi uzun zaman alacak hatalar yapabilirsiniz.</span></p>\r\n<p class="p6"><span class="s1"><strong>Wireframeden En İyi Şekilde Yararlanma ve Ka&ccedil;ınılması Gerekenler</strong></span></p>\r\n<p class="p1"><span class="s1"><strong>1. Tasarımı Kompleks Bir Hale Sokmayın</strong></span></p>\r\n<p class="p4"><span class="s1">Websitesinin formu fonksiyonları destekliyor olmalı ve wireframe de aynı konsepte uygun olmalıdır. Bu durumda, websitesinin formu tasarım s&uuml;recidir. Detayları minimum tutun. Bir sayfadaki &ccedil;ok fazla tipografik detay veya bilgi kullanıcıların kafasının karışmasına neden olacaktır.</span></p>\r\n<p class="p1"><span class="s1"><strong>2. Tasarımı Basitleştirin</strong></span></p>\r\n<p class="p4"><span class="s1">Wireframe bir websitesinin fonksiyonunu, i&ccedil;erik yapısını ve davranışını belirler. Wireframe sadece kullanıcı aray&uuml;zleri eklendikten sonra websitesinin nasıl g&ouml;r&uuml;neceği hakkında fikir verir. Renkler ve tipografik stile yoğunlaşmayın. S&uuml;re&ccedil; i&ccedil;erisinde boşlukları doldurmak i&ccedil;in olduk&ccedil;a fazla vaktiniz olacak.</span></p>\r\n<p class="p1"><span class="s1"><strong>3. İ&ccedil;erik Organizasyonunu G&ouml;zden Ka&ccedil;ırmayın</strong></span></p>\r\n<p class="p4"><span class="s1">Wireframe, i&ccedil;eriğinizin nereye konumlandırılacağı hakkında fikir verir, fakat g&ouml;r&uuml;nt&uuml;lendiğinde nasıl olacağını size g&ouml;stermez. Lorem Ipsum&rsquo;a g&uuml;venmek bir hatadır, &ccedil;&uuml;nk&uuml; taslak genelde i&ccedil;eriğinizin ekranda nasıl g&ouml;r&uuml;neceği hakkında yanlış bir izlenim verir.</span></p>\r\n<p class="p1"><img class="aligncenter size-full wp-image-4137" src="http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf3.jpg" sizes="(max-width: 750px) 100vw, 750px" srcset="http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf3.jpg 750w, http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf3-300x169.jpg 300w, http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf3-360x202.jpg 360w, http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf3-1140x641.jpg 1140w" alt="" width="750" height="422" /></p>\r\n<p class="p1"><span class="s1"><strong>4. İ&ccedil;erik Hiyerarşisini &Ouml;nceliklendirin</strong></span></p>\r\n<p class="p4"><span class="s1">S&ouml;z konusu web tasarımı olduğunda, i&ccedil;erik hiyerarşisi kullanıcılara aradıklarını vermek a&ccedil;ısından hayatidir. Wireframe &ccedil;ıkarma s&uuml;recinde, kullanıcılarınızın &ouml;nemli g&ouml;rd&uuml;ğ&uuml; sorulara cevap verin. Ne bilmek istiyorlar? &Ouml;rneğin, mobil kullanıcılar cep telefonlarından sizin sitenizi ziyaret ettiklerinde neye bakıyorlar? Mobil kullanıcılar i&ccedil;eriğin ulaşılabilir ve b&uuml;t&uuml;n ekran boyutlarına uyumlu olmasını isterler. Bu durumda sizin &ccedil;ıkardığınız wireframe en yukarıda ilgili bilgiyi g&ouml;stermeli ve i&ccedil;eriğin gerisini saklamalıdır.</span></p>\r\n<p class="p7"><span class="s1"><strong>5. Test Etmeyi Unutmayın</strong></span></p>\r\n<p class="p4"><span class="s1">Bir &uuml;r&uuml;n&uuml; test etmeden pazara s&uuml;remezsiniz. Wireframeler de diğer kişilerle paylaşılmadan &ouml;nce test edilmelidirler. Sonu&ccedil;ta taslağın son halinin sizin d&uuml;ş&uuml;nd&uuml;ğ&uuml;n&uuml;z gibi &ccedil;alışacağının bir garantisi yok. Aynı zamanda wireframeleri test etmenin ve yeniden tasarlamanın olduk&ccedil;a kolay olduğunu da unutmayın. Fakat her noktasının tasarlanması ve bir websitesini değiştirmek o kadar kolay değildir.</span></p>\r\n<p class="p1"><span class="s1"><strong>6. Sık Sık Test Edin</strong></span></p>\r\n<p class="p3"><span class="s1">Web tasarımcıları iskelet d&uuml;zene bakarak her zaman karar veremeyeceklerini bilirler. Bazen taslağı &ccedil;alışır durumdayken test etmelisiniz. Belli zaman aralıklarında tasarımı test etmek en iyisidir. Bu web tasarımcılarına şu noktalarda kolaylık sağlar:</span></p>\r\n<p><em><span class="s1">Farklı kullanıcı deneyimlerini keşfetmek ve onları tanımlamak veya gelecek vaat edenleri geliştirmek</span></em></p>\r\n<p><em><span class="s1">Tasarım s&uuml;recinde kilit konuları tespit etmek</span></em></p>\r\n<p class="p1"><img class="aligncenter size-full wp-image-4138" src="http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf2.jpg" sizes="(max-width: 750px) 100vw, 750px" srcset="http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf2.jpg 750w, http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf2-300x169.jpg 300w, http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf2-360x202.jpg 360w, http://www.hasanyalcin.com/wp-content/uploads/2016/12/wf2-1140x641.jpg 1140w" alt="" width="750" height="422" /></p>\r\n<p class="p1"><span class="s1"><strong>7. Stili Fonksiyonların &Uuml;st&uuml;nde Tutmayın</strong></span></p>\r\n<p class="p4"><span class="s1">Wireframeler bir websitesinin ana bileşenlerini tanımlar. Ne yazık ki, bazı web tasarımcıları bunu unutmaya ve kendi kişisel stillerini işin i&ccedil;ine katmaya meyillidirler. Burada bahsettiklerimiz wireframelerine renk ekleyen tasarımcılar. Renk wireframe&rsquo;in amacına nasıl hizmet ediyor olabilir? Wireframe&rsquo;inize renk eklediğinizde, grafik mockup ile karıştırıyorsunuz demektir. Bu durum wireframein g&ouml;rsel a&ccedil;ıklığını tanımlamayı daha zor hale getirir.</span></p>\r\n<p class="p1"><span class="s1"><strong>8. G&ouml;rsel A&ccedil;ıklık İlk Amacınız Olsun</strong></span></p>\r\n<p class="p4"><span class="s1">G&ouml;rsel a&ccedil;ıklık wireframe&rsquo;de her zaman &ouml;nceliğiniz olmalıdır. Unutmayın wireframe&rsquo;in amacı bir websitesinin fonksiyonlarını g&ouml;stermektir, stilini değil. Bu nedenle grafik detayların wireframe&rsquo;de yeri yoktur. Wireframe&rsquo;leri elinizden geldiğince basit tutmaya &ccedil;alışın.</span></p>\r\n<p class="p1"><span class="s1"><strong>9. Her Ekrana Uyumlu Olmayı Atlamayın</strong></span></p>\r\n<p class="p4"><span class="s1">Kullanıcıların web sayfalarını kullanım şekli değişiyor ve web tasarımcıları da bu değişime ayak uydurmak zorundalar. Mobil dostu websitelerinin tasarımı da bu değişimlerden bir tanesi. Eğer tasarımcılar değişen d&uuml;nyaya ayak uydurmak istiyorlarsa, mobil ekranlar i&ccedil;in de wireframeler tasarlamak zorundalar. Bu tasarımlar m&uuml;kemmel olmak zorunda değil. Fakat web tasarımcıları i&ccedil;eriğin, d&uuml;zenin ve sayfaların g&ouml;r&uuml;nt&uuml;lenen her cihaza uyum sağlayacağını garanti etmeliler.</span></p>\r\n<p class="p1"><span class="s1"><strong>10. &Ccedil;ok Zaman Harcamayın</strong></span></p>\r\n<p class="p4"><span class="s1">Wireframe &ccedil;ıkarmak i&ccedil;in &ccedil;ok fazla zaman harcamayın. Bu s&uuml;re&ccedil; sadece tasarımcılara websitesindeki bilgi hiyerarşisini belirlemek i&ccedil;in bir harita oluşturmak amacıyla ger&ccedil;ekleştirilmektedir. Wireframelerin sadece projenize a&ccedil;ıklık getirdiğini ve websitesinin son haline gelmeden &ouml;nce yapılması gerekenlerin bir listesini oluşturduğunu unutmayın.</span></p>\r\n<p class="p1"><span class="s1"><strong>11. &Ccedil;ok Fazla Saklamayın</strong></span></p>\r\n<p class="p4"><span class="s1">Wireframe tasarlarken i&ccedil;eriğinizi &ccedil;ok fazla saklamayın. Bazı web tasarımcıları sadece ana sayfayı ve ilgili bilgilere ulaşmak i&ccedil;in kullanıcıların hangi alanlara tıklaması gerektiğini g&ouml;sterirler. Bu uygulamalar hem kullanıcılarınızı rahatsız edecektir, hem de arama motoru optimizasyonu i&ccedil;in olduk&ccedil;a k&ouml;t&uuml;d&uuml;r.</span></p>\r\n<p class="p1"><span class="s1"><strong>12. Alakalı İ&ccedil;eriğe Odaklanın</strong></span></p>\r\n<p class="p3"><span class="s1">Anasayfasında ilgili bilgileri bulunduran bir websitesinin kullanıcı d&ouml;n&uuml;ş oranı y&uuml;ksek olacaktır. B&uuml;y&uuml;k wireframe&rsquo;lerle &ccedil;alışma fırsatı yakalarsanız bunun size i&ccedil;eriğinizi farklı şekillerde organize etme ve daha fazla ilgili &ouml;zellik ekleme fırsatı verdiğini unutmayın.</span></p>', NULL),
(20, 6, 2, '', '', NULL),
(21, 6, 3, '', '', NULL),
(22, 7, 1, 'Apollo 11', '<p><strong>Apollo 11</strong>, <a class="mw-redirect" title="Ay (uydu)" href="https://tr.wikipedia.org/wiki/Ay_(uydu)">Ay</a> y&uuml;zeyine yapılan insanlı ilk uzay u&ccedil;uşudur. <a title="Amerika Birleşik Devletleri" href="https://tr.wikipedia.org/wiki/Amerika_Birle%C5%9Fik_Devletleri">Amerika Birleşik Devletleri</a>''nin bu uzay u&ccedil;uşunda <a title="Astronot" href="https://tr.wikipedia.org/wiki/Astronot">astronotlar</a> <a title="Neil Armstrong" href="https://tr.wikipedia.org/wiki/Neil_Armstrong">Neil Armstrong</a> ve <a title="Buzz Aldrin" href="https://tr.wikipedia.org/wiki/Buzz_Aldrin">Buzz Aldrin</a> 20 Temmuz 1969 g&uuml;n&uuml; saat 20:18''de (<a class="mw-redirect" title="EEZ" href="https://tr.wikipedia.org/wiki/EEZ">EEZ</a>) Ay y&uuml;zeyine iniş yapan ilk insanlar oldu. İnişten altı saat sonra 21 Temmuz g&uuml;n&uuml; 01:56''da (EEZ) Armstrong ay y&uuml;zeyine adım atarak bu konuda da bir ilki ger&ccedil;ekleştirdi. U&ccedil;uşun m&uuml;rettebatının &uuml;&ccedil;&uuml;nc&uuml; &uuml;yesi olan <a title="Michael Collins (astronot)" href="https://tr.wikipedia.org/wiki/Michael_Collins_(astronot)">Michael Collins</a> bu sırada Ay y&ouml;r&uuml;ngesinde Armstrong ve Aldrin''i taşıyan mod&uuml;lle bir araya gelmek i&ccedil;in beklemedeydi. G&ouml;revin &uuml;&ccedil; &uuml;yesi de sekiz g&uuml;n uzayda kaldıktan sonra d&uuml;nyaya d&ouml;nd&uuml;.</p>\r\n<p>16 Temmuz g&uuml;n&uuml; <a title="Florida" href="https://tr.wikipedia.org/wiki/Florida">Florida</a>''nın <a class="new" title="Merritt Island, Florida (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Merritt_Island,_Florida&amp;action=edit&amp;redlink=1">Merritt Island</a> kasabasında bulunan <a title="Kennedy Uzay Merkezi" href="https://tr.wikipedia.org/wiki/Kennedy_Uzay_Merkezi">Kennedy Uzay Merkezi</a>''nden <a title="Saturn V" href="https://tr.wikipedia.org/wiki/Saturn_V">Saturn V</a> tarafından fırlatılan Apollo 11, <a title="NASA" href="https://tr.wikipedia.org/wiki/NASA">NASA</a>''nın <a class="mw-redirect" title="Apollo projesi" href="https://tr.wikipedia.org/wiki/Apollo_projesi">Apollo projesinin</a> beşinci insanlı u&ccedil;uşuydu. Daha &ouml;nceki u&ccedil;uşlardan ikisi Ay &ccedil;evresinde u&ccedil;muş ve biri D&uuml;nya y&ouml;r&uuml;ngesinde Ay''a iniş manevralarını ger&ccedil;ekleştirmişti. Roket tarafından fırlatılan <a class="mw-redirect" title="Apollo Uzay Aracı" href="https://tr.wikipedia.org/wiki/Apollo_Uzay_Arac%C4%B1">uzay aracı</a> &uuml;&ccedil; b&ouml;l&uuml;me sahipti: &uuml;&ccedil; astronot ve erzaklarının bulunduğu <a title="Komuta Mod&uuml;l&uuml;" href="https://tr.wikipedia.org/wiki/Komuta_Mod%C3%BCl%C3%BC">Komuta Mod&uuml;l&uuml;</a>, y&ouml;n değiştirme amacıyla yakıt ve motorların bulunduğu <a title="Hizmet Mod&uuml;l&uuml;" href="https://tr.wikipedia.org/wiki/Hizmet_Mod%C3%BCl%C3%BC">Hizmet Mod&uuml;l&uuml;</a> ve bunların yanı sıra <a title="Ay mod&uuml;l&uuml;" href="https://tr.wikipedia.org/wiki/Ay_mod%C3%BCl%C3%BC">Ay Mod&uuml;l&uuml;</a>. Uzay aracı fırlatma roketi tarafından Ay rotasına sokulduktan sonra ikisi birbirinden ayrıldı ve uzay aracı &uuml;&ccedil; g&uuml;n boyunca Ay y&ouml;r&uuml;ngesine girinceye dek yoluna devam etti. Burada Armstrong ve Aldrin Ay Mod&uuml;l&uuml;''ne ge&ccedil;ti ve Ay''ın D&uuml;nya''ya bakan tarafında bulunan <a class="new" title="Sessizlik Denizi (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Sessizlik_Denizi&amp;action=edit&amp;redlink=1">Sessizlik Denizi</a>''ne iniş yaptı. Astronotlar ara&ccedil; dışındaki iki bu&ccedil;uk saat da dahil olmak &uuml;zere toplamda yaklaşık 21&frac12; saat boyunca Ay y&uuml;zeyinde kaldı.</p>\r\n<p>Ay''a ayak basarken Armstrong "[bir] insan i&ccedil;in k&uuml;&ccedil;&uuml;k, insanlık i&ccedil;in b&uuml;y&uuml;k bir adım" ifadesini kullandı. İniş canlı yayınla aktarıldığından bu s&ouml;z d&uuml;nya &ccedil;apındaki insanlar tarafından duyuldu. Apollo 11 <a title="Uzay Yarışı" href="https://tr.wikipedia.org/wiki/Uzay_Yar%C4%B1%C5%9F%C4%B1">Uzay Yarışı</a>''nı fiilen bitirdi ve ABD başkanı <a title="John F. Kennedy" href="https://tr.wikipedia.org/wiki/John_F._Kennedy">John F. Kennedy</a>''nin 1960''ların sonuna kadar Ay''a ulaşma hedefini ger&ccedil;ekleştirmiş oldu.</p>\r\n<p>&nbsp;</p>\r\n<div id="toc" class="toc">\r\n<div id="toctitle">\r\n<h2>İ&ccedil;indekiler</h2>\r\n<span class="toctoggle">&nbsp;[<a id="togglelink" tabindex="0"></a>gizle]&nbsp;</span></div>\r\n<ul>\r\n<li class="toclevel-1 tocsection-1"><a href="https://tr.wikipedia.org/wiki/Apollo_11#M.C3.BCrettebat"><span class="tocnumber">1</span><span class="toctext">M&uuml;rettebat</span></a>\r\n<ul>\r\n<li class="toclevel-2 tocsection-2"><a href="https://tr.wikipedia.org/wiki/Apollo_11#Asli_m.C3.BCrettebat"><span class="tocnumber">1.1</span><span class="toctext">Asli m&uuml;rettebat</span></a></li>\r\n<li class="toclevel-2 tocsection-3"><a href="https://tr.wikipedia.org/wiki/Apollo_11#Yedek_m.C3.BCrettebat"><span class="tocnumber">1.2</span><span class="toctext">Yedek m&uuml;rettebat</span></a></li>\r\n<li class="toclevel-2 tocsection-4"><a href="https://tr.wikipedia.org/wiki/Apollo_11#Destek_personeli"><span class="tocnumber">1.3</span><span class="toctext">Destek personeli</span></a></li>\r\n<li class="toclevel-2 tocsection-5"><a href="https://tr.wikipedia.org/wiki/Apollo_11#U.C3.A7u.C5.9F_y.C3.B6neticileri"><span class="tocnumber">1.4</span><span class="toctext">U&ccedil;uş y&ouml;neticileri</span></a></li>\r\n</ul>\r\n</li>\r\n<li class="toclevel-1 tocsection-6"><a href="https://tr.wikipedia.org/wiki/Apollo_11#U.C3.A7u.C5.9F"><span class="tocnumber">2</span><span class="toctext">U&ccedil;uş</span></a></li>\r\n<li class="toclevel-1 tocsection-7"><a href="https://tr.wikipedia.org/wiki/Apollo_11#Resim_galerisi"><span class="tocnumber">3</span><span class="toctext">Resim galerisi</span></a></li>\r\n<li class="toclevel-1 tocsection-8"><a href="https://tr.wikipedia.org/wiki/Apollo_11#Kaynak.C3.A7a"><span class="tocnumber">4</span><span class="toctext">Kaynak&ccedil;a</span></a></li>\r\n</ul>\r\n</div>\r\n<p>&nbsp;</p>\r\n<h2><span id="M.C3.BCrettebat" class="mw-headline">M&uuml;rettebat</span><span class="mw-editsection"><span class="mw-editsection-bracket">[</span><a class="mw-editsection-visualeditor" title="Değiştirilen b&ouml;l&uuml;m: M&uuml;rettebat" href="https://tr.wikipedia.org/w/index.php?title=Apollo_11&amp;veaction=edit&amp;section=1">değiştir</a><span class="mw-editsection-divider"> | </span><a title="Değiştirilen b&ouml;l&uuml;m: M&uuml;rettebat" href="https://tr.wikipedia.org/w/index.php?title=Apollo_11&amp;action=edit&amp;section=1">kaynağı değiştir</a><span class="mw-editsection-bracket">]</span></span></h2>\r\n<div class="thumb tright">\r\n<div class="thumbinner"><a class="image" href="https://tr.wikipedia.org/wiki/Dosya:Apollo_11_bootprint.jpg"><img class="thumbimage" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Apollo_11_bootprint.jpg/200px-Apollo_11_bootprint.jpg" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/89/Apollo_11_bootprint.jpg/300px-Apollo_11_bootprint.jpg 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/89/Apollo_11_bootprint.jpg/400px-Apollo_11_bootprint.jpg 2x" alt="" width="200" height="201" data-file-width="2349" data-file-height="2363" /></a>\r\n<div class="thumbcaption">\r\n<div class="magnify">&nbsp;</div>\r\nApollo 11''nin <a title="Ay mod&uuml;l&uuml;" href="https://tr.wikipedia.org/wiki/Ay_mod%C3%BCl%C3%BC">Ay mod&uuml;l&uuml;</a> pilotu <a title="Buzz Aldrin" href="https://tr.wikipedia.org/wiki/Buzz_Aldrin">Buzz Aldrin</a>''in <a title="&Ccedil;izme" href="https://tr.wikipedia.org/wiki/%C3%87izme">&ccedil;izme</a> izi. Aldrin, 20 Temmuz 1969''da <a class="mw-redirect" title="Ay (uydu)" href="https://tr.wikipedia.org/wiki/Ay_(uydu)">Ay</a> y&uuml;zeyinin toprak mekanizmasını incelemek amacıyla ger&ccedil;ekleştirilen bir saatlik Ara&ccedil; Dış Etkinliği (EVA)''nin &ccedil;er&ccedil;evesinde bunu g&ouml;r&uuml;nt&uuml;ledi.</div>\r\n</div>\r\n</div>\r\n<div class="thumb tright">\r\n<div class="thumbinner"><a class="image" href="https://tr.wikipedia.org/wiki/Dosya:Land_on_the_Moon_7_21_1969-repair.jpg"><img class="thumbimage" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Land_on_the_Moon_7_21_1969-repair.jpg/200px-Land_on_the_Moon_7_21_1969-repair.jpg" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Land_on_the_Moon_7_21_1969-repair.jpg/300px-Land_on_the_Moon_7_21_1969-repair.jpg 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Land_on_the_Moon_7_21_1969-repair.jpg/400px-Land_on_the_Moon_7_21_1969-repair.jpg 2x" alt="" width="200" height="237" data-file-width="2356" data-file-height="2795" /></a>\r\n<div class="thumbcaption">\r\n<div class="magnify">&nbsp;</div>\r\n21 Temmuz 1969 tarihli <em><a class="mw-redirect" title="Washington Post" href="https://tr.wikipedia.org/wiki/Washington_Post">Washington Post</a></em> gazetesini okuyan bir kız &ccedil;ocuğu, <em>Kartal kondu - İki adam ayda y&uuml;r&uuml;d&uuml;.</em> manşeti ile &ouml;nceki g&uuml;n Apollo 11 m&uuml;rettebatı <a class="mw-redirect" title="Neil Alden Armstrong" href="https://tr.wikipedia.org/wiki/Neil_Alden_Armstrong">Neil Alden Armstrong</a> ve <a class="mw-redirect" title="Edwin Aldrin" href="https://tr.wikipedia.org/wiki/Edwin_Aldrin">Edwin Eugene Aldrin Jr.</a>''nın (Pilot <a class="mw-redirect" title="Michael Collins (uzayadamı)" href="https://tr.wikipedia.org/wiki/Michael_Collins_(uzayadam%C4%B1)">Michael Collins</a> ise ayak basmadı) aya ayak bastığını aktardı.</div>\r\n</div>\r\n</div>\r\n<div class="thumb tleft">\r\n<div class="thumbinner"><a class="image" href="https://tr.wikipedia.org/wiki/Dosya:5927_NASA.jpg"><img class="thumbimage" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/5927_NASA.jpg/200px-5927_NASA.jpg" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8b/5927_NASA.jpg/300px-5927_NASA.jpg 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8b/5927_NASA.jpg/400px-5927_NASA.jpg 2x" alt="" width="200" height="201" data-file-width="2349" data-file-height="2362" /></a>\r\n<div class="thumbcaption">\r\n<div class="magnify">&nbsp;</div>\r\nApollo 11 <a title="Ay mod&uuml;l&uuml;" href="https://tr.wikipedia.org/wiki/Ay_mod%C3%BCl%C3%BC">Ay mod&uuml;l&uuml;</a></div>\r\n</div>\r\n</div>\r\n<div class="thumb tleft">\r\n<div class="thumbinner"><a class="image" href="https://tr.wikipedia.org/wiki/Dosya:Aldrin_Apollo_11_original.jpg"><img class="thumbimage" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/Aldrin_Apollo_11_original.jpg/200px-Aldrin_Apollo_11_original.jpg" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/9/98/Aldrin_Apollo_11_original.jpg/300px-Aldrin_Apollo_11_original.jpg 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/9/98/Aldrin_Apollo_11_original.jpg/400px-Aldrin_Apollo_11_original.jpg 2x" alt="" width="200" height="201" data-file-width="3912" data-file-height="3936" /></a>\r\n<div class="thumbcaption">\r\n<div class="magnify">&nbsp;</div>\r\n<a class="mw-redirect" title="Edwin Aldrin" href="https://tr.wikipedia.org/wiki/Edwin_Aldrin">Aldrin</a> Ay y&uuml;zeyinde. <a title="20 Temmuz" href="https://tr.wikipedia.org/wiki/20_Temmuz">20 Temmuz</a><a title="1969" href="https://tr.wikipedia.org/wiki/1969">1969</a>.</div>\r\n</div>\r\n</div>\r\n<h3><span id="Asli_m.C3.BCrettebat" class="mw-headline">Asli m&uuml;rettebat</span><span class="mw-editsection"><span class="mw-editsection-bracket">[</span><a class="mw-editsection-visualeditor" title="Değiştirilen b&ouml;l&uuml;m: Asli m&uuml;rettebat" href="https://tr.wikipedia.org/w/index.php?title=Apollo_11&amp;veaction=edit&amp;section=2">değiştir</a><span class="mw-editsection-divider"> | </span><a title="Değiştirilen b&ouml;l&uuml;m: Asli m&uuml;rettebat" href="https://tr.wikipedia.org/w/index.php?title=Apollo_11&amp;action=edit&amp;section=2">kaynağı değiştir</a><span class="mw-editsection-bracket">]</span></span></h3>\r\n<ul>\r\n<li><a title="Neil Armstrong" href="https://tr.wikipedia.org/wiki/Neil_Armstrong">Neil A. Armstrong</a>, Komutan</li>\r\n<li><a title="Michael Collins (astronot)" href="https://tr.wikipedia.org/wiki/Michael_Collins_(astronot)">Michael Collins</a>, Komuta Mod&uuml;l&uuml; Pilotu</li>\r\n<li><a title="Buzz Aldrin" href="https://tr.wikipedia.org/wiki/Buzz_Aldrin">Edwin "Buzz" E. Aldrin, Jr.</a>, Ay Mod&uuml;l&uuml; Pilotu</li>\r\n</ul>\r\n<p>M&uuml;rettebatın tamamı bu g&ouml;revden &ouml;nce bir başka uzay u&ccedil;uşunda g&ouml;rev almış olmak zorundaydı. Apollo 11, uzay u&ccedil;uşu tarihinde Apollo 10''dan sonra m&uuml;rettebatının tamamı daha &ouml;nce uzay u&ccedil;uşu yapmış astronotlardan oluşan ikinci g&ouml;revdi.<sup id="cite_ref-1" class="reference"><a href="https://tr.wikipedia.org/wiki/Apollo_11#cite_note-1">[1]</a></sup></p>\r\n<h3><span id="Yedek_m.C3.BCrettebat" class="mw-headline">Yedek m&uuml;rettebat</span><span class="mw-editsection"><span class="mw-editsection-bracket">[</span><a class="mw-editsection-visualeditor" title="Değiştirilen b&ouml;l&uuml;m: Yedek m&uuml;rettebat" href="https://tr.wikipedia.org/w/index.php?title=Apollo_11&amp;veaction=edit&amp;section=3">değiştir</a><span class="mw-editsection-divider"> | </span><a title="Değiştirilen b&ouml;l&uuml;m: Yedek m&uuml;rettebat" href="https://tr.wikipedia.org/w/index.php?title=Apollo_11&amp;action=edit&amp;section=3">kaynağı değiştir</a><span class="mw-editsection-bracket">]</span></span></h3>\r\n<ul>\r\n<li><a class="new" title="James Lovell (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=James_Lovell&amp;action=edit&amp;redlink=1">James A. Lovell, Jr.</a> (<em><a class="mw-redirect" title="Gemini 7" href="https://tr.wikipedia.org/wiki/Gemini_7">Gemini 7</a></em>, <em><a class="mw-redirect" title="Gemini 12" href="https://tr.wikipedia.org/wiki/Gemini_12">Gemini 12</a></em>, <em><a title="Apollo 8" href="https://tr.wikipedia.org/wiki/Apollo_8">Apollo 8</a></em>, <em><a title="Apollo 13" href="https://tr.wikipedia.org/wiki/Apollo_13">Apollo 13</a></em> g&ouml;revlerinde u&ccedil;tu), Komutan</li>\r\n<li><a class="new" title="Bill Anders (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Bill_Anders&amp;action=edit&amp;redlink=1">William A. Anders</a> (<em><a title="Apollo 8" href="https://tr.wikipedia.org/wiki/Apollo_8">Apollo 8</a></em> g&ouml;revinde u&ccedil;tu), Komuta Mod&uuml;l&uuml; Pilotu</li>\r\n<li><a class="new" title="Fred Haise (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Fred_Haise&amp;action=edit&amp;redlink=1">Fred W. Haise, Jr.</a> (<em><a title="Apollo 13" href="https://tr.wikipedia.org/wiki/Apollo_13">Apollo 13</a></em> g&ouml;revinde u&ccedil;tu), Ay mod&uuml;l&uuml; Pilotu</li>\r\n</ul>\r\n<h3><span id="Destek_personeli" class="mw-headline">Destek personeli</span><span class="mw-editsection"><span class="mw-editsection-bracket">[</span><a class="mw-editsection-visualeditor" title="Değiştirilen b&ouml;l&uuml;m: Destek personeli" href="https://tr.wikipedia.org/w/index.php?title=Apollo_11&amp;veaction=edit&amp;section=4">değiştir</a><span class="mw-editsection-divider"> | </span><a title="Değiştirilen b&ouml;l&uuml;m: Destek personeli" href="https://tr.wikipedia.org/w/index.php?title=Apollo_11&amp;action=edit&amp;section=4">kaynağı değiştir</a><span class="mw-editsection-bracket">]</span></span></h3>\r\n<ul>\r\n<li><a class="new" title="Charles Moss Duke, Jr. (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Charles_Moss_Duke,_Jr.&amp;action=edit&amp;redlink=1">Charles Moss Duke, Jr.</a>, Kaps&uuml;l İletişimcisi (CAPCOM)</li>\r\n<li><a class="new" title="Ronald Evans (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Ronald_Evans&amp;action=edit&amp;redlink=1">Ronald Evans</a>, CAPCOM</li>\r\n<li><a class="new" title="Owen K. Garriott (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Owen_K._Garriott&amp;action=edit&amp;redlink=1">Owen K. Garriott</a>, CAPCOM</li>\r\n<li><a class="new" title="Don L. Lind (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Don_L._Lind&amp;action=edit&amp;redlink=1">Don L. Lind</a>, CAPCOM</li>\r\n<li><a class="new" title="Ken Mattingly (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Ken_Mattingly&amp;action=edit&amp;redlink=1">Ken Mattingly</a>, CAPCOM</li>\r\n<li><a title="Bruce McCandless II" href="https://tr.wikipedia.org/wiki/Bruce_McCandless_II">Bruce McCandless II</a>, CAPCOM</li>\r\n<li><a class="new" title="Harrison Schmitt (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Harrison_Schmitt&amp;action=edit&amp;redlink=1">Harrison Schmitt</a></li>\r\n<li><a class="new" title="Jack Swigert (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Jack_Swigert&amp;action=edit&amp;redlink=1">Jack Swigert</a></li>\r\n</ul>\r\n<h3><span id="U.C3.A7u.C5.9F_y.C3.B6neticileri" class="mw-headline">U&ccedil;uş y&ouml;neticileri</span><span class="mw-editsection"><span class="mw-editsection-bracket">[</span><a class="mw-editsection-visualeditor" title="Değiştirilen b&ouml;l&uuml;m: U&ccedil;uş y&ouml;neticileri" href="https://tr.wikipedia.org/w/index.php?title=Apollo_11&amp;veaction=edit&amp;section=5">değiştir</a><span class="mw-editsection-divider"> | </span><a title="Değiştirilen b&ouml;l&uuml;m: U&ccedil;uş y&ouml;neticileri" href="https://tr.wikipedia.org/w/index.php?title=Apollo_11&amp;action=edit&amp;section=5">kaynağı değiştir</a><span class="mw-editsection-bracket">]</span></span></h3>\r\n<ul>\r\n<li>Clifford E. Charlesworth, Lead U&ccedil;uş Y&ouml;neticisi, Yeşil takım</li>\r\n<li>Gerald D. Griffin, Altın takım</li>\r\n<li><a class="new" title="Gene Kranz (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Gene_Kranz&amp;action=edit&amp;redlink=1">Gene Kranz</a>, Beyaz takım</li>\r\n<li><a class="new" title="Glynn Lunney (sayfa mevcut değil)" href="https://tr.wikipedia.org/w/index.php?title=Glynn_Lunney&amp;action=edit&amp;redlink=1">Glynn S. Lunney</a>, Siyah takım<sup id="cite_ref-2" class="reference"><a href="https://tr.wikipedia.org/wiki/Apollo_11#cite_note-2">[2]</a></sup></li>\r\n</ul>\r\n<h2><span id="U.C3.A7u.C5.9F" class="mw-headline">U&ccedil;uş</span><span class="mw-editsection"><span class="mw-editsection-bracket">[</span><a class="mw-editsection-visualeditor" title="Değiştirilen b&ouml;l&uuml;m: U&ccedil;uş" href="https://tr.wikipedia.org/w/index.php?title=Apollo_11&amp;veaction=edit&amp;section=6">değiştir</a><span class="mw-editsection-divider"> | </span><a title="Değiştirilen b&ouml;l&uuml;m: U&ccedil;uş" href="https://tr.wikipedia.org/w/index.php?title=Apollo_11&amp;action=edit&amp;section=6">kaynağı değiştir</a><span class="mw-editsection-bracket">]</span></span></h2>\r\n<p><a title="Ay mod&uuml;l&uuml;" href="https://tr.wikipedia.org/wiki/Ay_mod%C3%BCl%C3%BC">Ay mod&uuml;l&uuml;</a>''ne ge&ccedil;ebilmek i&ccedil;in Neil Armstrong Ay mod&uuml;l&uuml;''n&uuml; &ccedil;evreleyen adapt&ouml;r&uuml;n 4 b&uuml;y&uuml;k kapağını fırlatan patlayıcıları kullandı ve bu &ccedil;ok &ouml;nemliydi.Ateşleyerek birleştirme manevrasını yaptı. Sonrasında <a title="Komuta Mod&uuml;l&uuml;" href="https://tr.wikipedia.org/wiki/Komuta_Mod%C3%BCl%C3%BC">Komuta</a>-<a title="Hizmet Mod&uuml;l&uuml;" href="https://tr.wikipedia.org/wiki/Hizmet_Mod%C3%BCl%C3%BC">Hizmet Mod&uuml;l&uuml;</a>''ne U d&ouml;n&uuml;ş&uuml;n&uuml; yaptıracak roketleri de ateşleyerek Ay mod&uuml;l&uuml; ile Komuta Mod&uuml;l&uuml;''n&uuml; burun buruna getirdi. Mod&uuml;ller bu haldeyken Komuta Mod&uuml;l&uuml;''ndeki kenetleme d&uuml;zeneği sayesinde ikisi arasında ge&ccedil;iş olanağı sağlandı. Ay y&ouml;r&uuml;ngesine girebilmek i&ccedil;in ters duran Hizmet Mod&uuml;l&uuml;''n&uuml;n roketi ateşlenerek fren olarak kullanıldı. Ay y&ouml;r&uuml;ngesindeyken Edwin Aldrin ve Neil Armstrong Ay mod&uuml;l&uuml;''ne ge&ccedil;ti ve Ay mod&uuml;l&uuml;''n&uuml;n pilotu Edwin Aldrin fren g&ouml;revi g&ouml;ren ters haldeki roket sayesinde Komuta-Hizmet Mod&uuml;l&uuml;''nden ayrılarak Sessizlik Denizi''ne yumuşak bir iniş yaptı. Son kontrollerden sonra başpilot Neil Armstrong <a title="21 Temmuz" href="https://tr.wikipedia.org/wiki/21_Temmuz">21 Temmuz</a> <a title="1969" href="https://tr.wikipedia.org/wiki/1969">1969</a> tarihi 06.17 (GMT) saatinde Ay''a ayak bastı. İncelenmesi i&ccedil;in Ay''dan &ouml;rnekler toplayarak g&ouml;revlerini bitiren astronotlar Ay mod&uuml;l&uuml;''ne yeniden binerek Ay''dan ayrıldılar ve y&ouml;r&uuml;ngedeki araca kenetlendiler. Astronotlar Komuta Mod&uuml;l&uuml;''ne ge&ccedil;ince Ay mod&uuml;l&uuml; uzaya bırakıldı. Hizmet Mod&uuml;l&uuml;''n&uuml;n roketleri ateşlendi ve D&uuml;nya''ya doğru yola &ccedil;ıkıldı. Komuta Mod&uuml;l&uuml; dışında t&uuml;m par&ccedil;alar da bırakılarak B&uuml;y&uuml;k Okyanus''a paraş&uuml;tler kullanılarak inildi. Astronotlar D&uuml;nya''ya mikroorganizmalar taşımış olabileceklerinden 21 g&uuml;n karantinaya alındılar.</p>', NULL),
(23, 7, 2, '', '', NULL),
(24, 7, 3, '', '', NULL),
(25, 8, 1, 'Hakkımızda', '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500''lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960''larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>', NULL),
(26, 8, 2, '', '', NULL),
(27, 9, 1, 'Vizyon', '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500''lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960''larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>', NULL),
(28, 9, 2, '', '', NULL),
(29, 10, 1, 'Misyon', '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500''lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960''larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>', NULL),
(30, 10, 2, '', '', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`productId`, `categoryId`, `image`, `createDate`) VALUES
(1, 6, 'audi-r8.png', '2016-12-24 07:50:23'),
(2, 7, 'i8.png', '2016-12-24 07:51:26'),
(4, 2, 'default.png', '2017-07-06 14:00:15'),
(5, 13, 'default.png', '2017-07-06 15:31:30'),
(6, 13, 'default.png', '2017-07-06 15:31:36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_category`
--

CREATE TABLE `product_category` (
  `categoryId` int(11) NOT NULL,
  `parentId` int(11) DEFAULT '0',
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'default.png',
  `createDate` datetime DEFAULT NULL,
  `sira` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `product_category`
--

INSERT INTO `product_category` (`categoryId`, `parentId`, `image`, `createDate`, `sira`) VALUES
(3, 2, 'otomobil.png', '2016-12-24 07:36:00', NULL),
(4, 2, 'arazi-suv.png', '2016-12-24 07:37:00', NULL),
(5, 2, 'motosiklet.png', '2016-12-24 07:37:32', NULL),
(6, 3, 'audi.png', '2016-12-24 07:38:24', NULL),
(7, 3, 'bmw.png', '2016-12-24 07:39:01', NULL),
(8, 3, 'lamborghini_1.png', '2016-12-24 07:39:58', NULL),
(9, 2, 'test.png', '2016-12-24 11:04:01', NULL),
(10, 0, 'default.png', '2017-07-06 15:30:46', 1),
(11, 0, 'default.png', '2017-07-06 15:31:01', 2),
(12, 0, 'default.png', '2017-07-06 15:31:07', 3),
(13, 10, 'default.png', '2017-07-06 15:31:21', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_category_lang`
--

CREATE TABLE `product_category_lang` (
  `langId` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `languageId` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `product_category_lang`
--

INSERT INTO `product_category_lang` (`langId`, `categoryId`, `languageId`, `name`, `text`) VALUES
(5, 3, 1, 'Otomobil', NULL),
(6, 3, 2, 'Car', NULL),
(7, 4, 1, 'Arazi, Suv', NULL),
(8, 4, 2, 'Arazi, Suv', NULL),
(9, 5, 1, 'Motosiklet', NULL),
(10, 5, 2, 'Motorcycle', NULL),
(11, 6, 1, 'Audi', NULL),
(12, 6, 2, 'Audi', NULL),
(13, 7, 1, 'BMW', NULL),
(14, 7, 2, 'BMW', NULL),
(15, 8, 1, 'Lamborghini', NULL),
(16, 8, 2, 'Lamborghini', NULL),
(17, 9, 1, 'Test', NULL),
(18, 9, 2, '', NULL),
(19, 10, 1, 'Ürünler', NULL),
(20, 10, 2, '', NULL),
(21, 11, 1, 'Ürünler 2', NULL),
(22, 11, 2, '', NULL),
(23, 12, 1, 'Ürünler 3', NULL),
(24, 12, 2, '', NULL),
(25, 13, 1, 'Alt Kategori', NULL),
(26, 13, 2, '', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_lang`
--

CREATE TABLE `product_lang` (
  `langId` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `languageId` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `product_lang`
--

INSERT INTO `product_lang` (`langId`, `productId`, `languageId`, `name`, `text`) VALUES
(1, 1, 1, 'Audi R8', ''),
(2, 1, 2, 'Audi R8', ''),
(3, 2, 1, 'I8', ''),
(4, 2, 2, 'I8', ''),
(7, 4, 1, 'b', '<p>b</p>'),
(8, 4, 2, '', ''),
(9, 5, 1, 'Ürün', '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500''lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960''larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>'),
(10, 5, 2, '', ''),
(11, 6, 1, 'Ürün 2', '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500''lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960''larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>'),
(12, 6, 2, '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `social_accounts`
--

CREATE TABLE `social_accounts` (
  `accountId` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sef` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `social_accounts`
--

INSERT INTO `social_accounts` (`accountId`, `name`, `sef`, `url`) VALUES
(1, 'Flickr', 'flickr', ''),
(2, 'Twitter', 'twitter', ''),
(3, 'Pinterest', 'pinterest', ''),
(4, 'LinkedIn', 'linkedin', ''),
(5, 'Facebook', 'facebook', ''),
(6, 'Tumblr', 'tumblr', ''),
(7, 'Instagram', 'instagram', ''),
(8, 'Google Plus', 'google-plus', ''),
(9, 'Dribble', 'dribbble', ''),
(10, 'Dropbox', 'dropbox', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `words`
--

CREATE TABLE `words` (
  `wordId` int(11) NOT NULL,
  `tag` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'words'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `words`
--

INSERT INTO `words` (`wordId`, `tag`, `category`) VALUES
(1, 'Anasayfa', 'words'),
(2, 'Kurumsal', 'words'),
(3, 'Hakkımızda', 'words'),
(4, 'Vizyonumuz', 'words'),
(5, 'Misyonumuz', 'words'),
(6, 'Kalite Belgelerimiz', 'words'),
(7, 'Hizmetlerimiz', 'words'),
(8, 'İsteğe Özel Üretim', 'words'),
(9, 'Montaj', 'words'),
(10, 'De Montaj', 'words'),
(11, 'Referanslarımız', 'words'),
(12, 'İletişim', 'words'),
(13, 'Ürünlerimiz', 'words'),
(14, 'Sayfalar', 'words'),
(15, 'Galeri', 'words'),
(16, 'Dil', 'words'),
(17, 'Ürünler', 'words'),
(18, 'Ürünlerde ara', 'words'),
(19, 'Ürün Bulunamadı', 'words'),
(20, 'Gruplar', 'words'),
(21, 'İsim Soyisim', 'words'),
(22, 'Telefon No', 'words'),
(23, 'E-Posta Adresi', 'words'),
(24, 'Konu', 'words'),
(25, 'Mesajınız', 'words'),
(26, 'Gönder', 'words'),
(27, 'Telefon', 'words'),
(28, 'Adres', 'words'),
(29, 'E-Posta', 'words'),
(30, 'Fax', 'words'),
(31, 'GSM', 'words'),
(32, 'Varsayılan', 'words'),
(33, 'Merkez', 'words'),
(34, 'Fabrika', 'words'),
(35, 'Çevirisi Yapılacak Kelime', 'words'),
(36, 'Üye Girişi', 'words'),
(37, 'Epotsa yada Kullanıcı Adı', 'words'),
(38, 'Şifre', 'words'),
(39, 'Giriş Yap', 'words'),
(40, 'Beni hatırla!', 'words'),
(41, 'Şifremi unuttum?', 'words'),
(42, 'Sepetim', 'words'),
(43, 'Üye Ol', 'words'),
(44, 'Üye Giriş', 'words'),
(45, 'Blog', 'words'),
(46, 'S.s.s', 'words'),
(47, 'Bizden Haberler', 'words'),
(48, 'Tüm Haberler', 'words'),
(49, 'Sosyal Medya', 'words'),
(50, 'Lokasyonumuz', 'words');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `words_translate`
--

CREATE TABLE `words_translate` (
  `id` int(11) NOT NULL,
  `wordId` int(11) DEFAULT NULL,
  `languageId` int(11) DEFAULT NULL,
  `translation` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `words_translate`
--

INSERT INTO `words_translate` (`id`, `wordId`, `languageId`, `translation`) VALUES
(1, 1, 1, 'Anasayfa'),
(2, 1, 2, 'Home'),
(3, 29, 1, 'E-Posta'),
(4, 12, 1, 'İletişim'),
(5, 12, 2, 'Contact');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `words_translation_logs`
--

CREATE TABLE `words_translation_logs` (
  `id` int(11) NOT NULL,
  `word` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `words_translation_logs`
--

INSERT INTO `words_translation_logs` (`id`, `word`, `count`, `description`) VALUES
(1, 'Anasayfa', 2, 'kelime word tablosune eklendi'),
(2, 'Kurumsal', 2, 'kelime word tablosune eklendi'),
(3, 'Hakkımızda', 2, 'kelime word tablosune eklendi'),
(4, 'Vizyonumuz', 2, 'kelime word tablosune eklendi'),
(5, 'Misyonumuz', 2, 'kelime word tablosune eklendi'),
(6, 'Kalite Belgelerimiz', 2, 'kelime word tablosune eklendi'),
(7, 'Hizmetlerimiz', 2, 'kelime word tablosune eklendi'),
(8, 'İsteğe Özel Üretim', 2, 'kelime word tablosune eklendi'),
(9, 'Montaj', 2, 'kelime word tablosune eklendi'),
(10, 'De Montaj', 2, 'kelime word tablosune eklendi'),
(11, 'Referanslarımız', 2, 'kelime word tablosune eklendi'),
(12, 'İletişim', 2, 'kelime word tablosune eklendi'),
(13, 'Ürünlerimiz', 2, 'kelime word tablosune eklendi'),
(14, 'Sayfalar', 2, 'kelime word tablosune eklendi'),
(15, 'Galeri', 2, 'kelime word tablosune eklendi'),
(16, 'Dil', 2, 'kelime word tablosune eklendi'),
(17, 'Ürünler', 2, 'kelime word tablosune eklendi'),
(18, 'Ürünlerde ara', 2, 'kelime word tablosune eklendi'),
(19, 'Ürün Bulunamadı', 2, 'kelime word tablosune eklendi'),
(20, 'Tek', 1, 'Kelime word tablosunda yok'),
(21, 'Çoklu', 1, 'Kelime word tablosunda yok'),
(22, 'Gruplar', 2, 'kelime word tablosune eklendi'),
(23, 'İsim Soyisim', 2, 'kelime word tablosune eklendi'),
(24, 'Telefon No', 2, 'kelime word tablosune eklendi'),
(25, 'E-Posta Adresi', 2, 'kelime word tablosune eklendi'),
(26, 'Konu', 2, 'kelime word tablosune eklendi'),
(27, 'Mesajınız', 2, 'kelime word tablosune eklendi'),
(28, 'Gönder', 2, 'kelime word tablosune eklendi'),
(29, 'Telefon', 2, 'kelime word tablosune eklendi'),
(30, 'Adres', 2, 'kelime word tablosune eklendi'),
(31, 'E-Posta', 2, 'kelime word tablosune eklendi'),
(32, 'Fax', 2, 'kelime word tablosune eklendi'),
(33, 'GSM', 2, 'kelime word tablosune eklendi'),
(34, 'Varsayılan', 2, 'kelime word tablosune eklendi'),
(35, 'Merkez', 2, 'kelime word tablosune eklendi'),
(36, 'Fabrika', 2, 'kelime word tablosune eklendi'),
(37, 'Çevirisi Yapılacak Dil', 1, 'Kelime word tablosunda yok'),
(38, 'Çevirisi Yapılacak Kelime', 2, 'kelime word tablosune eklendi'),
(39, 'Üye Girişi', 2, 'kelime word tablosune eklendi'),
(40, 'Epotsa yada Kullanıcı Adı', 2, 'kelime word tablosune eklendi'),
(41, 'Şifre', 2, 'kelime word tablosune eklendi'),
(42, 'Giriş Yap', 2, 'kelime word tablosune eklendi'),
(43, 'Beni hatırla!', 2, 'kelime word tablosune eklendi'),
(44, 'Şifremi unuttum?', 2, 'kelime word tablosune eklendi'),
(45, 'Sepetim', 2, 'kelime word tablosune eklendi'),
(46, 'Üye Ol', 2, 'kelime word tablosune eklendi'),
(47, 'Üye Giriş', 2, 'kelime word tablosune eklendi'),
(48, 'Blog', 2, 'kelime word tablosune eklendi'),
(49, 'S.s.s', 2, 'kelime word tablosune eklendi'),
(50, 'Bizden Haberler', 2, 'kelime word tablosune eklendi'),
(51, 'Tüm Haberler', 2, 'kelime word tablosune eklendi'),
(52, 'Sosyal Medya', 2, 'kelime word tablosune eklendi'),
(53, 'Lokasyonumuz', 2, 'kelime word tablosune eklendi');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`userId`);

--
-- Tablo için indeksler `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact_info_category`
--
ALTER TABLE `contact_info_category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Tablo için indeksler `gallery_category`
--
ALTER TABLE `gallery_category`
  ADD PRIMARY KEY (`galleryId`);

--
-- Tablo için indeksler `gallery_photos`
--
ALTER TABLE `gallery_photos`
  ADD PRIMARY KEY (`photoId`);

--
-- Tablo için indeksler `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`languageId`);

--
-- Tablo için indeksler `log_login_try`
--
ALTER TABLE `log_login_try`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pageId`);

--
-- Tablo için indeksler `pages_category`
--
ALTER TABLE `pages_category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Tablo için indeksler `pages_category_lang`
--
ALTER TABLE `pages_category_lang`
  ADD PRIMARY KEY (`langId`);

--
-- Tablo için indeksler `pages_lang`
--
ALTER TABLE `pages_lang`
  ADD PRIMARY KEY (`langId`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Tablo için indeksler `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Tablo için indeksler `product_category_lang`
--
ALTER TABLE `product_category_lang`
  ADD PRIMARY KEY (`langId`);

--
-- Tablo için indeksler `product_lang`
--
ALTER TABLE `product_lang`
  ADD PRIMARY KEY (`langId`);

--
-- Tablo için indeksler `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`accountId`);

--
-- Tablo için indeksler `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`wordId`);

--
-- Tablo için indeksler `words_translate`
--
ALTER TABLE `words_translate`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `words_translation_logs`
--
ALTER TABLE `words_translation_logs`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `app`
--
ALTER TABLE `app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Tablo için AUTO_INCREMENT değeri `contact_info_category`
--
ALTER TABLE `contact_info_category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `gallery_category`
--
ALTER TABLE `gallery_category`
  MODIFY `galleryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `gallery_photos`
--
ALTER TABLE `gallery_photos`
  MODIFY `photoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- Tablo için AUTO_INCREMENT değeri `languages`
--
ALTER TABLE `languages`
  MODIFY `languageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- Tablo için AUTO_INCREMENT değeri `log_login_try`
--
ALTER TABLE `log_login_try`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Tablo için AUTO_INCREMENT değeri `pages_category`
--
ALTER TABLE `pages_category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `pages_category_lang`
--
ALTER TABLE `pages_category_lang`
  MODIFY `langId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Tablo için AUTO_INCREMENT değeri `pages_lang`
--
ALTER TABLE `pages_lang`
  MODIFY `langId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `product_category`
--
ALTER TABLE `product_category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `product_category_lang`
--
ALTER TABLE `product_category_lang`
  MODIFY `langId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Tablo için AUTO_INCREMENT değeri `product_lang`
--
ALTER TABLE `product_lang`
  MODIFY `langId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Tablo için AUTO_INCREMENT değeri `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `words`
--
ALTER TABLE `words`
  MODIFY `wordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Tablo için AUTO_INCREMENT değeri `words_translate`
--
ALTER TABLE `words_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `words_translation_logs`
--
ALTER TABLE `words_translation_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
