-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2021 lúc 08:24 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `steed`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `d_purchase` date NOT NULL,
  `status_bill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `freight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `id_user`, `d_purchase`, `status_bill`, `freight`, `bank`, `total_bill`) VALUES
(31, 2, '2021-10-12', '', 'Duck Ship', 'Duck Bank', 3540),
(32, 3, '2021-09-01', '', 'Duck Ship', 'Duck Bank', 4078),
(33, 2, '2021-08-11', '', 'Duck Ship', 'Duck Bank', 2914),
(34, 2, '2021-07-09', '', 'Duck Ship', 'Duck Bank', 3759),
(35, 3, '2021-06-01', '', 'Duck Ship', 'Duck Bank', 710),
(36, 3, '2021-09-17', '', 'Duck Ship', 'Duck Bank', 860),
(37, 2, '2021-10-19', '', 'Duck Ship', 'Duck Bank', 3624),
(38, 2, '2021-10-19', '', 'Duck Ship', 'Duck Bank', 1624),
(39, 3, '2021-10-19', '', 'Duck Ship', 'Duck Bank', 1484),
(40, 3, '2021-10-19', '', 'Duck Ship', 'Duck Bank', 703),
(41, 3, '2021-10-19', '', 'Duck Ship', 'Duck Bank', 463),
(42, 2, '2021-10-19', '', 'Duck Ship', 'Duck Bank', 4855);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `name_brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id_brand`, `name_brand`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Balenciaga'),
(4, 'Gucci'),
(5, 'Yeezy'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_shop`
--

CREATE TABLE `cart_shop` (
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `quantity_product` int(11) NOT NULL,
  `size_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_shop`
--

INSERT INTO `cart_shop` (`id_cart`, `id_product`, `id_user`, `quantity_product`, `size_product`) VALUES
(171, 42, 3, 1, 0),
(172, 19, 2, 1, 0),
(173, 37, 2, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Low Top'),
(3, 'Slip-on'),
(4, 'High Top'),
(6, 'Mule');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_bill`
--

CREATE TABLE `detail_bill` (
  `id_detail_bill` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name_product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_product` int(11) NOT NULL,
  `quantity_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_bill`
--

INSERT INTO `detail_bill` (`id_detail_bill`, `id_bill`, `id_product`, `name_product`, `price_product`, `quantity_product`) VALUES
(2, 31, 19, 'Gucci Leather Lug Sole Loafers', 910, 1),
(6, 32, 22, 'Nike Blazer Mid Off White All Hallow’s Eve', 517, 2),
(8, 32, 19, 'Gucci Leather Lug Sole Loafers', 910, 1),
(9, 33, 42, 'Adidas Yeezy 350 V2 Beluga 1.0', 812, 2),
(10, 33, 41, 'Nike SB Dunk Low Street Hawker', 430, 3),
(11, 34, 41, 'Nike SB Dunk Low Street Hawker', 430, 2),
(12, 34, 42, 'Adidas Yeezy 350 V2 Beluga 1.0', 812, 3),
(13, 34, 37, 'Nike Air Jordan 1 Shadow 2018', 463, 1),
(14, 35, 14, 'Converse Chuck Taylor All-Star Vulcanized Hi', 710, 1),
(15, 36, 41, 'Nike SB Dunk Low Street Hawker', 430, 2),
(16, 37, 40, 'Nike SB Dunk Low Pro QS x StrangeLove', 1812, 2),
(17, 38, 42, 'Adidas Yeezy 350 V2 Beluga 1.0', 812, 2),
(18, 39, 36, 'Nike Air Jordan 1 high 85 Varsity Red', 450, 1),
(19, 39, 22, 'Nike Blazer Mid Off White All Hallow’s Eve', 517, 2),
(20, 40, 39, 'Nike Air fear of god 1 Light Bone', 703, 1),
(21, 41, 37, 'Nike Air Jordan 1 Shadow 2018', 463, 1),
(22, 42, 22, 'Nike Blazer Mid Off White All Hallow’s Eve', 517, 1),
(23, 42, 36, 'Nike Air Jordan 1 high 85 Varsity Red', 450, 1),
(24, 42, 40, 'Nike SB Dunk Low Pro QS x StrangeLove', 1812, 1),
(25, 42, 37, 'Nike Air Jordan 1 Shadow 2018', 463, 1),
(26, 42, 39, 'Nike Air fear of god 1 Light Bone', 703, 1),
(27, 42, 19, 'Gucci Leather Lug Sole Loafers', 910, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name_p` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `param_p` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_p` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_p-1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_p-2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_p-3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_p-4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_new` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_p` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `size_p` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_update` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `name_p`, `param_p`, `img_p`, `img_p-1`, `img_p-2`, `img_p-3`, `img_p-4`, `price_new`, `sale`, `description`, `gender`, `type_p`, `id_category`, `brand`, `size_p`, `date_update`, `quantity`, `sold`) VALUES
(14, 'Converse Chuck Taylor All-Star Vulcanized Hi', 'converse-chuck-taylor-all-star-vulcanized-hi', '/public/images/product/shoes28.png', '/public/images/product/co1.jpg', '/public/images/product/co.jpg', '/public/images/product/co3.jpg', '/public/images/product/co2.jpg', 710, 0, '<h2>Product Description</h2>\r\n\r\n<p>The Converse Chuck Taylor All-Star Hi also made it way into &quot;The 10&quot; Collection. Made in collaboration with Virgil Abloh&#39;s Off-White and Nike, this series brought together all three brands for an exciting new rendition of the classic Converse Chuck Taylor. A part of the &quot;Ghosting&quot; Series, this pair comes in a white, cone and ice blue colorway. Sporting a reconstructed translucent upper, featuring a semi-revealing material to tie-in with the theme. Various materials are found throughout, as well as a red zip-tie, black branding and an icy blue translucent sole. Their release date was November 1st, 2017 where they were available alongside the rest of the Off-White x Nike &quot;Ghosting&quot; Collection. They were available in men&#39;s sizing at select retailers worldwide. If you&#39;re a fan of the Converse Chuck Taylor All-Star and Off-White, this is another must-have pair. Those looking for them can buy one online. If you have one to sell, hit up the marketplace and see what they are going for.</p>\r\n', 'man', 1, 4, 1, '37,38,39,40,41,42,43', '2021-10-15', 12, 1),
(19, 'Gucci Leather Lug Sole Loafers', 'gucci-leather-lug-sole-loafers', '/public/images/product/shoes23.png', '/public/images/product/gi.jpg', '/public/images/product/gi1.jpg', '/public/images/product/gi2.jpg', '/public/images/product/gi3.jpg', 910, 0, '<h1>PRODUCT DETAILS</h1>\r\n\r\n<p>Style&nbsp;&lrm;577236 DS800 1000</p>\r\n\r\n<p>A lug sole Horsebit loafer with blue rosebud print lining on the insole. A mainstay in Gucci history since the &#39;50s, the classic Horsebit loafer bridges the past to the present. A homage to the House&#39;s heritage rooted in the equestrian world, the emblematic shape is reworked in a contemporary shape on a rubber lug sole.</p>\r\n\r\n<ul>\r\n	<li>Black shiny leather</li>\r\n	<li>Women&#39;s</li>\r\n	<li>Gold embroidered bee on the back</li>\r\n	<li>Horsebit detail</li>\r\n	<li>Rubber lug sole</li>\r\n	<li>1&quot; height</li>\r\n	<li>Blue rosebud print lining</li>\r\n	<li>Made in Italy</li>\r\n</ul>\r\n', 'woman', 1, 6, 4, '37,38,39,40,41,42,43', '2021-10-12', 49, 3),
(22, 'Nike Blazer Mid Off White All Hallow’s Eve', 'nike-blazer-mid-off-white-all-hallows-eve', '/public/images/product/shoes20.png', '/public/images/product/hc.jpg', '/public/images/product/hc1.jpg', '/public/images/product/hc2.jpg', '/public/images/product/hc3.jpg', 517, 0, '<h2>Product Description</h2>\r\n\r\n<p>Don&rsquo;t sleep because Virgil Abloh continues to give the shoe game a nightmare with the Nike Blazer Mid Off-White All Hallow&rsquo;s Eve. This pumpkin inspired half of the &ldquo;Spooky Pack&rdquo; comes with a pale vanilla upper, total orange &ldquo;Swoosh&rdquo;, and pale vanilla sole. These released in September 2018 and retailed at $130. Get in the holiday spirit and cop now on StockX.</p>\r\n\r\n<blockquote>\r\n<p>Style : AA3832-700</p>\r\n\r\n<p>Colorway : CANVAS/TOTAL ORANGE-PALE VANILLA-BLACK</p>\r\n\r\n<p>Retail Price :$ 130</p>\r\n\r\n<p>Release Date :10/03/2018</p>\r\n</blockquote>\r\n', 'man', 1, 4, 1, '37,38,39,40,41,42,43', '2021-10-12', -1, 5),
(35, 'Nike air Jordan 4 Retro Union Guava Ice', 'nike-air-jordan-4-retro-union-guava-ice', '/public/images/product/Nike-air-Jordan-4-Retro-Union-Guava-Ice-1.jpg', '/public/images/product/ae3jpg.jpg', '/public/images/product/ae2.jpg', '/public/images/product/ae1.jpg', '/public/images/product/ae.jpg', 250, 10, '<h2>Product Description</h2>\r\n\r\n<p>Los Angeles-based sneaker/streetwear boutique, Union, joined forces for a second time with Jordan brand to drop the Air Jordan 4 Union Guava Ice. Similar to 2018&rsquo;s unique construction, the product of this second partnership isn&rsquo;t immune to creative design.<br />\r\n<br />\r\nThe Air Jordan 4 Union Guava Ice features many new elements never before seen on the silhouette. The most notable addition comes in the form of a foldable nylon tongue, showing off the &ldquo;Air Jordan&rdquo; logo traditionally stitched on the tongue&rsquo;s backside. From there, hits of Guava, Fusion Red, and Brigade Blue make this Air Jordan 4 one of the more colorful releases for the model.<br />\r\n<br />\r\nThe Air Jordan 4 Union Guava Ice released in August of 2020 for $250.</p>\r\n', 'man', 1, 1, 7, '37,38,39,40,41,42,43', '2021-10-15', 50, 0),
(36, 'Nike Air Jordan 1 high 85 Varsity Red', 'nike-air-jordan-1-high-85-varsity-red', '/public/images/product/jordan-1-Varsity-Red-1.jpg', '/public/images/product/jd1h3.jpg', '/public/images/product/jd1h2.jpg', '/public/images/product/jd1h1.jpg', '/public/images/product/jd1h4.jpg', 450, 10, '<h2>roduct Description</h2>\r\n\r\n<p><strong>Please note: Drawstring Bag and Hangtag must be included.<strong>&nbsp;Jordan Brand celebrated the 35th anniversary of the Jordan 1 by releasing Jordan 1 Retro High 85 Varsity Red, now available on StockX. This sneaker features the original 1985 silhouette including a raised upper and ankle padding. The color scheme is similar to the Bred colorway, reversing certain panels to present the design in a new light.<br />\r\n<br />\r\nThis Jordan 1 is composed of a black leather upper with red overlays. A white midsole, red outsole, and classic Jordan Wings branding on the ankle completes the design. These sneakers released in February of 2020 and retailed for $200.</strong></strong></p>\r\n', 'man', 1, 4, 1, '37,38,39,40,41,42,43', '2021-10-15', 50, 2),
(37, 'Nike Air Jordan 1 Shadow 2018', 'nike-air-jordan-1-shadow-2018', '/public/images/product/shoes4.png', '/public/images/product/jds4.jpg', '/public/images/product/jds3.jpg', '/public/images/product/jds2.jpg', '/public/images/product/jds1.jpg', 463, 10, '<h2>Product Description</h2>\r\n\r\n<p>Despite the name, the Air Jordan 1 Shadows are a pair that will put any fit of yours firmly in the spotlight. This very rare OG colorway has now hit shelves only three times, making these a must-own for any AJ1 collector. The shoe features a black and grey leather upper with original &ldquo;Nike Air&rdquo; branding on the tongue tag and insoles, along with a white midsole and black outsole. Dropping in April of 2018, they were released in mens and gradeschool sizes. Place a Bid on StockX today to stick your own pair of Shadows.</p>\r\n', 'man', 1, 4, 1, '37,38,39,40,41,42,43', '2021-10-15', 50, 3),
(38, 'Adidas Yeezy 350 Yecheil', 'adidas-yeezy-350-yecheil', '/public/images/product/ez.jpg', '/public/images/product/ey.jpg', '/public/images/product/ey1.jpg', '/public/images/product/ey2.jpg', '/public/images/product/ey3.jpg', 490, 0, '<h2>Product Description</h2>\r\n\r\n<p>Yeezy adds a flare to one of its most well-known designs with the adidas Yeezy 350 Yecheil Non-Reflective, now available on StockX. This 350 V2 strays away from the usual earth tones with a colorful palette, making it stand out from previous releases. This model was released in both reflective and non-reflective variations.<br />\r\n<br />\r\nThis Yeezy 350 V2 is composed of a black upper with white, red, yellow, and blue accents. A black Boost cushioned sole and black side stripe completes the design. These sneakers released in December of 2019 and retailed for $220.</p>\r\n', 'man', 1, 1, 2, '37,38,39,40,41,42,43', '2021-10-15', 50, 0),
(39, 'Nike Air fear of god 1 Light Bone', 'nike-air-fear-of-god-1-light-bone', '/public/images/product/Nf.jpg', '/public/images/product/nfe.jpg', '/public/images/product/nfe1.jpg', '/public/images/product/nfe2.jpg', '/public/images/product/nfe3.jpg', 703, 0, '<h2>Product Description</h2>\r\n\r\n<p>Note: Only select retailers included a dust bag with the Air Fear of God 1s during their initial release. As such we can not guarantee one will be included with your purchase.<br />\r\nStep into the bright lights while wearing the Air Fear Of God 1 Light Bone. This FOG1 comes with a grey upper, black Nike &ldquo;Swoosh&rdquo;, white midsole, and a translucent sole. This sneaker was released in December 2018 and retailed for $395. Don&rsquo;t miss out on a legendary sneaker, and a brand-new Nike silhouette, and cop these on StockX ASAP.</p>\r\n', 'woman', 1, 4, 1, '37,38,39,40,41,42,43', '2021-10-15', 50, 2),
(40, 'Nike SB Dunk Low Pro QS x StrangeLove', 'nike-sb-dunk-low-pro-qs-x-strangelove', '/public/images/product/Nike-SB-Dunk-Low-Pro-QS-x-StrangeLove-1.jpg', '/public/images/product/lv.jpg', '/public/images/product/lv1.jpg', '/public/images/product/lv2.jpg', '/public/images/product/lv3.jpg', 1812, 0, '<h2>Product Description</h2>\r\n\r\n<p>Nike SB celebrated Valentine&rsquo;s Day by connecting with legendary artists Todd Bratrud and Sean Cliver to release the Nike SB Dunk Low Strangelove Skateboards (Regular Box), now available on StockX. Todd has a history of being behind some of the most recognizable Nike SB colorways of all time and the Strangelove Dunk is another example of his creative prowess.<br />\r\n<br />\r\nThis SB Dunk Low is composed of a pink velvet upper with suede overlays and a red velvet Swoosh. Strangelove branding on the tongue, insole, and translucent outsole completes the design. These sneakers released in February of 2020 and retailed for $100.</p>\r\n', 'woman', 1, 1, 1, '37,38,39,40,41,42,43', '2021-10-15', 50, 3),
(41, 'Nike SB Dunk Low Street Hawker', 'nike-sb-dunk-low-street-hawker', '/public/images/product/shoes22.png', '/public/images/product/ga.jpg', '/public/images/product/ga1.jpg', '/public/images/product/ga2.jpg', '/public/images/product/ga3.jpg', 430, 0, '<h2>Product Description</h2>\r\n\r\n<p>The Nike Dunk Low continues its reign into the new year with the Street Hawker colorway. Originally thought to be a design to celebrate Chinese New Year, the story behind the upper is unique in itself, reflecting on the world-wide love for Chinese food.<br />\r\n<br />\r\nThe Nike Dunk Low Street Hawker is a piece of artwork in itself, as the upper features mismatched watercolors on a majority canvas, leather, and suede construction. From there, Chinese characters replace traditional &ldquo;Nike&rdquo; heel embroidery. Additionally, a stitched copper coin pays homage to Eastern culinary culture.<br />\r\n<br />\r\nThe Nike Dunk Low releases in January 2021 and retails for $110.</p>\r\n', 'woman', 1, 1, 1, '37,38,39,40,41,42,43', '2021-10-15', 50, 7),
(42, 'Adidas Yeezy 350 V2 Beluga 1.0', 'adidas-yeezy-350-v2-beluga-10', '/public/images/product/adidas-yeezy-350-v2-beluga-1.0.jpg', '/public/images/product/eq.jpg', '/public/images/product/eq1.jpg', '/public/images/product/eq2.jpg', '/public/images/product/eq3.jpg', 812, 5, '<h2>Product Description</h2>\r\n\r\n<p>The&nbsp;adidas Yeezy 350 Boost V2&nbsp;takes the silhouette that Kanye West made famous for adidas Originals and gives it new life. The Yeezy Boost releases have been some of the most notable driving forces in the resurgence of adidas&#39; popularity around the world. The low top Yeezy Boost 350 features a full length Boost cushioning system and a high end feel that has made it the go-to sneaker for everyone from celebrities like Kim Kardashian-West, Jay-Z, 2 Chainz and Future, as well as for athletes like Nick &quot;Swaggy P&quot; Young, Andrew Wiggins, Lewis Hamilton and anyone else who can get their feet in a pair. The Yeezy Boost 350 V2 adds a bold twist to Kanye&#39;s design with a bright orange (officially Solar Red) stripe across the Steel Grey/Beluga zebra-striped upper with the text YZY SPLY. The Steeple Gray/Beluga/Solar Red adidas Yeezy Boost 350 V2 is the first of the 2nd version colorways that release in 2016.</p>\r\n', 'man', 1, 1, 1, '37,38,39,40,41,42,43', '2021-10-15', 50, 7),
(43, 'Balenciaga Triple S Clear Black Blue Plus Y Factory', 'balenciaga-triple-s-clear-black-blue-plus-y-factory', '/public/images/product/balenciaga-triple-s-clear-black-blue.jpg', '/public/images/product/bal3.jpg', '/public/images/product/bal2.jpg', '/public/images/product/bal1.jpg', '/public/images/product/bal.jpg', 611, 5, '<blockquote>\r\n<p>Style</p>\r\n\r\n<p>544351W09ON1047</p>\r\n\r\n<p>Colorway</p>\r\n\r\n<p>BLACK</p>\r\n\r\n<p>Retail Price</p>\r\n\r\n<p>$995</p>\r\n</blockquote>\r\n', 'man', 1, 1, 3, '37,38,39,40,41,42,43', '2021-10-15', 50, 0),
(44, 'change name', 'change-name', '/public/images/product/1-1949.jpg', '/public/images/product/9489d8e57ed8f144d5f7ee01be764791.png', '/public/images/product/7896847-1-white.jpg', '/public/images/product/AAAABdhEfedbfC0dFzoI3xq2dP6QiO-FH6PFnDT96PLO1OT-CtKiTJgz9vGLRWaXANSQGGX4MHZi-alXxH12I_017w49gIhG.jpg', '/public/images/product/7896847-1-white.jpg', 12, 1, '<p>oke</p>\r\n', 'man', 1, 1, 1, '12', '2021-10-19', 12, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL,
  `rep_to_id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content_review` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `d_review` date NOT NULL,
  `star_review` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id_review`, `rep_to_id`, `id_product`, `id_user`, `content_review`, `d_review`, `star_review`) VALUES
(82, 0, 22, 3, 'ádsad', '2021-10-04', 0),
(108, 82, 22, 2, 'ok', '2021-10-15', 0),
(109, 0, 19, 2, 'Comment', '2021-10-19', 0),
(110, 109, 19, 2, 'rep cmt', '2021-10-19', 0),
(111, 0, 22, 3, 'checkk', '2021-10-19', 0),
(112, 0, 40, 3, 'oke', '2021-10-22', 0),
(113, 0, 40, 3, 'check', '2021-10-22', 0),
(114, 0, 40, 3, 'oke', '2021-10-22', 0),
(115, 0, 40, 3, 'aa', '2021-10-22', 0),
(116, 0, 40, 3, 'ee', '2021-10-22', 0),
(117, 0, 40, 3, 'not now', '2021-10-22', 0),
(118, 0, 40, 3, 'oki', '2021-10-22', 0),
(119, 118, 40, 3, 'oke', '2021-10-22', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_product`
--

CREATE TABLE `type_product` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_product`
--

INSERT INTO `type_product` (`id`, `type_name`) VALUES
(1, 'shoes'),
(2, 'hat'),
(3, 'bag'),
(4, 'other');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `email`, `phone`, `address`, `password`, `level`) VALUES
(1, 'Duck ', 'Baka', 'ducwithluv@gmail.com', '0905555555', '', '$2y$10$zi.3qwpE6GYHdEldM.8Y9e8PKr8MKCXdRzBg/y8HULYb.U0gbX6oG', 1),
(2, 'Duck', 'Baka', '123@gmail.com', '123', '', '$2y$10$tR5PPDVGXBFxKj0jn2iNL.R35jbTL7FBCUrhZvoKOEfqBSjQeCQgO', 1),
(3, 'Luck', 'Ky', 'aaa@gmail.com', '1234', '', '$2y$10$Y6Nb/c4AqwfJvSpfFJOIXuRfG0C1J/acepLVg53A/jdGxoZUL2dQO', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Chỉ mục cho bảng `cart_shop`
--
ALTER TABLE `cart_shop`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `key_id-product_cart` (`id_product`),
  ADD KEY `key_id-user_cart` (`id_user`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id_detail_bill`),
  ADD KEY `key_bill` (`id_bill`),
  ADD KEY `key_product_id` (`id_product`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `key_type` (`type_p`),
  ADD KEY `key_brand` (`brand`),
  ADD KEY `key_category_id` (`id_category`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `key_product` (`id_product`),
  ADD KEY `key_user` (`id_user`);

--
-- Chỉ mục cho bảng `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `cart_shop`
--
ALTER TABLE `cart_shop`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id_detail_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `cart_shop`
--
ALTER TABLE `cart_shop`
  ADD CONSTRAINT `key_id-product_cart` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `key_id-user_cart` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `key_bill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `key_product_id` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `key_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `key_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
