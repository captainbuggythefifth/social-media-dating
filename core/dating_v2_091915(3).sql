-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2015 at 09:44 AM
-- Server version: 5.6.27-0ubuntu0.14.04.1
-- PHP Version: 5.6.16-2+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dating_v2_091915`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE IF NOT EXISTS `characters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `families_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `character_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `character_age` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `character_avatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `character_description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `character_avatar_mini` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=55 ;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `user_id`, `families_id`, `created_at`, `updated_at`, `character_name`, `character_age`, `character_avatar`, `character_description`, `status`, `character_avatar_mini`, `photo_id`) VALUES
  (53, '10', '1 ', '2015-12-20 21:20:52', '2015-12-20 21:20:52', 'Wala ra', '69', 'images/avatars/characters/normal/875057_10_Wala_ra_5e9cb552fa32f7d80e8c0697beb75b84.jpg', 'Yeah Yeah', 1, 'images/avatars/characters/mini/875057_10_Wala_ra_5e9cb552fa32f7d80e8c0697beb75b84.jpg', 63),
  (54, '4', '1 ', '2015-12-20 21:24:15', '2015-12-20 21:24:15', 'SKIMMER', '123', 'images/avatars/characters/normal/450776_4_SKIMMER_1382725-bigthumbnail.jpg', 'Yreah', 1, 'images/avatars/characters/mini/450776_4_SKIMMER_1382725-bigthumbnail.jpg', 64);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `comment_text` varchar(1000) NOT NULL,
  `comment_type` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_from_type` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL,
  `specy_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `mate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_photo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `from_user_id`, `to_user_id`, `comment_text`, `comment_type`, `status`, `created_at`, `updated_at`, `comment_from_type`, `photo_id`, `character_id`, `family_id`, `specy_id`, `post_id`, `mate_id`, `user_id`, `comment_photo_id`) VALUES
  (46, 10, 4, '', 2, 1, '2015-12-14 22:24:06', '2015-12-14 22:24:07', 5, 6, 0, 0, 0, 0, 0, 0, 43),
  (47, 10, 4, '', 2, 1, '2015-12-14 22:25:45', '2015-12-14 22:25:45', 5, 6, 0, 0, 0, 0, 0, 0, 44),
  (48, 10, 4, '', 2, 1, '2015-12-14 22:26:02', '2015-12-14 22:26:02', 5, 6, 0, 0, 0, 0, 0, 0, 45),
  (49, 10, 4, 'Way photo comment', 1, 1, '2015-12-14 23:41:18', '2015-12-14 23:41:18', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (50, 10, 4, '', 2, 1, '2015-12-15 00:01:35', '2015-12-15 00:01:35', 5, 6, 0, 0, 0, 0, 0, 0, 46),
  (51, 10, 4, 'Kani naay photo', 2, 1, '2015-12-15 00:10:34', '2015-12-15 00:10:34', 5, 6, 0, 0, 0, 0, 0, 0, 47),
  (52, 10, 4, 'Tsuy', 2, 1, '2015-12-15 00:45:16', '2015-12-15 00:45:17', 5, 6, 0, 0, 0, 0, 0, 0, 48),
  (53, 10, 4, 'Dili man diay tsuy', 1, 1, '2015-12-15 00:47:16', '2015-12-15 00:47:16', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (54, 10, 4, 'Dili man diay tsuy', 1, 1, '2015-12-15 00:47:28', '2015-12-15 00:47:28', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (55, 10, 4, 'waw', 1, 1, '2015-12-15 00:49:27', '2015-12-15 00:49:27', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (56, 10, 4, 'Sayup ang efktyur', 1, 1, '2015-12-15 01:09:59', '2015-12-15 01:09:59', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (57, 10, 4, 'Sajup :P', 1, 1, '2015-12-15 01:10:20', '2015-12-15 01:10:20', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (58, 10, 4, 'Sajup :P', 1, 1, '2015-12-15 01:12:09', '2015-12-15 01:12:09', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (59, 10, 4, 'Way sajup sa army', 2, 1, '2015-12-15 01:12:34', '2015-12-15 01:12:34', 5, 6, 0, 0, 0, 0, 0, 0, 49),
  (60, 10, 4, 'Way sajup sa army', 1, 1, '2015-12-15 01:12:39', '2015-12-15 01:12:39', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (61, 10, 4, 'Tsuya kaytasa!', 2, 1, '2015-12-15 01:22:03', '2015-12-15 01:22:03', 5, 6, 0, 0, 0, 0, 0, 0, 50),
  (62, 10, 4, 'Kani na gyyud', 2, 1, '2015-12-15 01:23:26', '2015-12-15 01:23:26', 5, 6, 0, 0, 0, 0, 0, 0, 51),
  (63, 10, 4, 'Kani na lang ui', 1, 1, '2015-12-15 01:24:52', '2015-12-15 01:24:52', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (64, 10, 4, 'Kani na sad :P', 2, 1, '2015-12-15 01:25:20', '2015-12-15 01:25:20', 5, 6, 0, 0, 0, 0, 0, 0, 52),
  (65, 10, 4, '', 2, 1, '2015-12-15 01:26:56', '2015-12-15 01:26:56', 5, 6, 0, 0, 0, 0, 0, 0, 53),
  (66, 10, 4, 'Yeah', 1, 1, '2015-12-15 20:51:44', '2015-12-15 20:51:44', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (67, 10, 4, 'Kani daw', 2, 1, '2015-12-15 20:52:19', '2015-12-15 20:52:19', 5, 6, 0, 0, 0, 0, 0, 0, 54),
  (68, 10, 4, 'Yeah', 1, 1, '2015-12-16 21:29:18', '2015-12-16 21:29:18', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (69, 10, 4, 'Mangape tah', 2, 1, '2015-12-16 21:29:53', '2015-12-16 21:29:53', 5, 6, 0, 0, 0, 0, 0, 0, 55),
  (70, 10, 4, 'IRU ', 1, 1, '2015-12-16 21:30:35', '2015-12-16 21:30:35', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (71, 10, 4, 'ALALLAH!', 1, 1, '2015-12-16 21:32:55', '2015-12-16 21:32:55', 5, 6, 0, 0, 0, 0, 0, 0, 0),
  (72, 10, 4, 'MEME', 2, 1, '2015-12-16 21:33:15', '2015-12-16 21:33:15', 5, 6, 0, 0, 0, 0, 0, 0, 56),
  (73, 10, 4, 'Tug tah', 2, 1, '2015-12-16 22:10:54', '2015-12-16 22:10:54', 5, 43, 0, 0, 0, 0, 0, 0, 57),
  (74, 10, 4, 'Yeah', 2, 1, '2015-12-16 22:11:24', '2015-12-16 22:11:24', 5, 43, 0, 0, 0, 0, 0, 0, 58),
  (75, 10, 4, 'Kape', 2, 1, '2015-12-16 22:24:09', '2015-12-16 22:24:09', 2, 0, 43, 0, 0, 0, 0, 0, 59),
  (76, 10, 4, 'ALALALH!', 2, 1, '2015-12-16 22:29:13', '2015-12-16 22:29:13', 2, 0, 44, 0, 0, 0, 0, 0, 60),
  (77, 10, 4, '', 2, 1, '2015-12-16 22:30:35', '2015-12-16 22:30:35', 2, 0, 43, 0, 0, 0, 0, 0, 61),
  (78, 10, 4, '', 2, 1, '2015-12-18 00:46:15', '2015-12-18 00:46:15', 2, 0, 43, 0, 0, 0, 0, 0, 62),
  (79, 4, 10, 'Diri daw', 1, 1, '2015-12-20 21:32:17', '2015-12-20 21:32:17', 5, 8, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(150) NOT NULL,
  `country_abbr` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=236 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_abbr`) VALUES
  (1, 'United States of America', 'US'),
  (2, 'Canada', 'CA'),
  (3, 'United Kingdom', 'GB'),
  (4, 'Afghanistan', 'AF'),
  (5, 'Albania', 'AL'),
  (6, 'Algeria', 'DZ'),
  (7, 'American Somoa', 'AS'),
  (8, 'Andorra', 'AD'),
  (9, 'Angola', 'AO'),
  (10, 'Anguilla', 'AI'),
  (11, 'Antarctica', 'AQ'),
  (12, 'Antigua and Barbuda', 'AG'),
  (13, 'Argentina', 'AR'),
  (14, 'Armenia', 'AM'),
  (15, 'Aruba', 'AW'),
  (16, 'Australia', 'AU'),
  (17, 'Austria', 'AT'),
  (18, 'Bahamas', 'BS'),
  (19, 'Bahrain', 'BH'),
  (20, 'Bangladesh', 'BD'),
  (21, 'Barbados', 'BB'),
  (22, 'Belarus', 'BY'),
  (23, 'Belgium', 'BE'),
  (24, 'Belize', 'BZ'),
  (25, 'Benin', 'BJ'),
  (26, 'Bermuda', 'BM'),
  (27, 'Bhutan', 'BT'),
  (28, 'Bolivia', 'BO'),
  (29, 'Bosnia and Herzegovina', 'BA'),
  (30, 'Botswana', 'BW'),
  (31, 'Bouvet Island', 'BV'),
  (32, 'Brazil', 'BR'),
  (33, 'British Indian Ocean Territory', 'IO'),
  (34, 'Brunei Darussalam', 'BN'),
  (35, 'Bulgaria', 'BG'),
  (36, 'Burkina Faso', 'BF'),
  (37, 'Burundi', 'BI'),
  (38, 'Cambodia', 'KH'),
  (39, 'Cameroon', 'CM'),
  (40, 'Cape Verde', 'CV'),
  (41, 'Cayman Islands', 'KY'),
  (42, 'Central African Republic', 'CF'),
  (43, 'Chad', 'TD'),
  (44, 'Chile', 'CL'),
  (45, 'China', 'CN'),
  (46, 'Christmas Island', 'CX'),
  (47, 'Cocos (Keeling) Islands', 'CC'),
  (48, 'Colombia', 'CO'),
  (49, 'Comoros', 'KM'),
  (50, 'Congo', 'CG'),
  (51, 'Cook Islands', 'CK'),
  (52, 'Costa Rica', 'CR'),
  (53, 'Croatia', 'HR'),
  (54, 'Cuba', 'CU'),
  (55, 'Cyprus', 'CY'),
  (56, 'Czech Republic', 'CZ'),
  (57, 'Denmark', 'DK'),
  (58, 'Djibouti', 'DJ'),
  (59, 'Dominica', 'DM'),
  (60, 'Dominican Republic', 'DO'),
  (61, 'East Timor', 'TP'),
  (62, 'Ecuador', 'EC'),
  (63, 'Egypt', 'EG'),
  (64, 'El Salvador', 'SV'),
  (65, 'Equatorial Guinea', 'GQ'),
  (66, 'Eritrea', 'ER'),
  (67, 'Estonia', 'EE'),
  (68, 'Ethiopia', 'ET'),
  (69, 'Faroe Islands', 'FO'),
  (70, 'Falkland Islands', 'FK'),
  (71, 'Fiji', 'FJ'),
  (72, 'Finland', 'FI'),
  (73, 'France', 'FR'),
  (74, 'French Guiana', 'GF'),
  (75, 'French Polynesia', 'PF'),
  (76, 'French Southern and Antarctic Lands', 'FQ'),
  (77, 'Gabon', 'GA'),
  (78, 'Gambia', 'GM'),
  (79, 'Georgia', 'GE'),
  (80, 'Germany', 'DE'),
  (81, 'Ghana', 'GH'),
  (82, 'Gibraltar', 'GI'),
  (83, 'Greece', 'GR'),
  (84, 'Greenland', 'GL'),
  (85, 'Grenada', 'GD'),
  (86, 'Guadaloupe', 'GP'),
  (87, 'Guam', 'GU'),
  (88, 'Guatemala', 'GT'),
  (89, 'Guinea', 'GN'),
  (90, 'Guinea-Bissau', 'GW'),
  (91, 'Guyana', 'GY'),
  (92, 'Haiti', 'HT'),
  (93, 'Heard Island and McDonald Islands', 'HM'),
  (94, 'Honduras', 'HN'),
  (95, 'Hong Kong', 'HK'),
  (96, 'Hungary', 'HU'),
  (97, 'Iceland', 'IS'),
  (98, 'India', 'IN'),
  (99, 'Indonesia', 'ID'),
  (100, 'Iran', 'IR'),
  (101, 'Iraq', 'IQ'),
  (102, 'Ireland', 'IE'),
  (103, 'Israel', 'IL'),
  (104, 'Italy', 'IT'),
  (105, 'Ivory Coast', 'CI'),
  (106, 'Jamaica', 'JM'),
  (107, 'Japan', 'JP'),
  (108, 'Jordan', 'JO'),
  (109, 'Kazakhstan', 'KZ'),
  (110, 'Kenya', 'KE'),
  (111, 'North Korea', 'KP'),
  (112, 'South Korea', 'KR'),
  (113, 'Kuwait', 'KW'),
  (114, 'Kyrgyzstan', 'KG'),
  (115, 'Laos', 'LA'),
  (116, 'Latvia', 'LV'),
  (117, 'Lebanon', 'LN'),
  (118, 'Lesotho', 'LS'),
  (119, 'Liberia', 'LR'),
  (120, 'Libya', 'LY'),
  (121, 'Liechtenstein', 'LI'),
  (122, 'Lithuania', 'LT'),
  (123, 'Luxembourg', 'LU'),
  (124, 'Macau', 'MO'),
  (125, 'Macedonia', 'MK'),
  (126, 'Madagascar', 'MG'),
  (127, 'Malawi', 'MW'),
  (128, 'Malaysia', 'MY'),
  (129, 'Maldives', 'MV'),
  (130, 'Mali', 'ML'),
  (131, 'Malta', 'MT'),
  (132, 'Marshall Islands', 'MH'),
  (133, 'Martinique', 'MQ'),
  (134, 'Mauritania', 'MR'),
  (135, 'Mauritius', 'MU'),
  (136, 'Mayotte', 'YT'),
  (137, 'Mexico', 'MX'),
  (138, 'Micronesia', 'FM'),
  (139, 'Moldova', 'MD'),
  (140, 'Monaco', 'MC'),
  (141, 'Mongolia', 'MN'),
  (142, 'Montserrat', 'MS'),
  (143, 'Morocco', 'MA'),
  (144, 'Mozambique', 'MZ'),
  (145, 'Myanmar', 'MM'),
  (146, 'Namibia', 'NA'),
  (147, 'Nauru', 'NR'),
  (148, 'Nepal', 'NP'),
  (149, 'Netherlands', 'NL'),
  (150, 'Netherlands Antilles', 'AN'),
  (151, 'New Caledonia', 'NC'),
  (152, 'New Hebrides', 'NH'),
  (153, 'New Zealand', 'NZ'),
  (154, 'Nicaragua', 'NI'),
  (155, 'Niger', 'NE'),
  (156, 'Nigeria', 'NG'),
  (157, 'Niue', 'NU'),
  (158, 'Norfolk Island', 'NF'),
  (159, 'Norway', 'NO'),
  (160, 'Oman', 'OM'),
  (161, 'Pakistan', 'PK'),
  (162, 'Palau', 'PW'),
  (163, 'Panama', 'PA'),
  (164, 'Papua New Guinea', 'PG'),
  (165, 'Paraguay', 'PY'),
  (166, 'Peru', 'PE'),
  (167, 'Philippines', 'PH'),
  (168, 'Pitcairn', 'PN'),
  (169, 'Poland', 'PL'),
  (170, 'Portugal', 'PT'),
  (171, 'Puerto Rico', 'PR'),
  (172, 'Qatar', 'QA'),
  (173, 'Reunion', 'RE'),
  (174, 'Romania', 'RO'),
  (175, 'Russia', 'RU'),
  (176, 'Rwanda', 'RW'),
  (177, 'St. Christopher-Nevis-Anguilla', 'KN'),
  (178, 'St. Helena', 'SH'),
  (179, 'St. Lucia', 'LC'),
  (180, 'St. Pierre and Miquelon', 'PM'),
  (181, 'St. Vincent', 'VC'),
  (182, 'Samoa', 'WS'),
  (183, 'San Marino', 'SM'),
  (184, 'Sao Tome and Principe', 'ST'),
  (185, 'Saudi Arabia', 'SA'),
  (186, 'Senegal', 'SN'),
  (187, 'Seychelles', 'SC'),
  (188, 'Sierra Leone', 'SL'),
  (189, 'Singapore', 'SG'),
  (190, 'Slovakia', 'SK'),
  (191, 'Slovenia', 'SI'),
  (192, 'Solomon Islands', 'SB'),
  (193, 'Somalia', 'SO'),
  (194, 'South Africa', 'ZA'),
  (195, 'Spain', 'ES'),
  (196, 'Sri Lanka', 'LK'),
  (197, 'Sudan', 'SD'),
  (198, 'Surinam', 'SR'),
  (199, 'Svalbard and Jan Mayen', 'SJ'),
  (200, 'Swaziland', 'SZ'),
  (201, 'Sweden', 'SE'),
  (202, 'Switzerland', 'CH'),
  (203, 'Syria', 'SY'),
  (204, 'Taiwan', 'TW'),
  (205, 'Tajikistan', 'TJ'),
  (206, 'Tanzania', 'TZ'),
  (207, 'Thailand', 'TH'),
  (208, 'Togo', 'TG'),
  (209, 'Tokelau Islands', 'TK'),
  (210, 'Tonga', 'TO'),
  (211, 'Trinidad and Tobago', 'TT'),
  (212, 'Tunisia', 'TN'),
  (213, 'Turkey', 'TR'),
  (214, 'Turks and Caicos Islands', 'TC'),
  (215, 'Tuvalu', 'TV'),
  (216, 'Uganda', 'UG'),
  (217, 'Ukraine', 'UA'),
  (218, 'United Arab Emirates', 'AE'),
  (219, 'United States Miscellaneous Pacific Islands', 'PU'),
  (220, 'Uruguay', 'UY'),
  (221, 'Uzbekistan', 'UZ'),
  (222, 'Vatican City', 'VA'),
  (223, 'Venezuela', 'VE'),
  (224, 'Vietnam', 'VN'),
  (225, 'Virgin Islands (U.S.)', 'VI'),
  (226, 'Wallis and Futana', 'WF'),
  (227, 'Western Sahara', 'EH'),
  (228, 'Yemen', 'YE'),
  (229, 'Yugoslavia', 'YU'),
  (230, 'Zaire', 'ZR'),
  (231, 'Zambia', 'ZM'),
  (232, 'Zimbabwe', 'ZW'),
  (233, 'Serbia', 'RS'),
  (234, 'Montenegro', 'ME'),
  (235, 'Republika Srpska', 'RS2');

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

CREATE TABLE IF NOT EXISTS `families` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `family_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `species_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `family_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `photo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `families`
--

INSERT INTO `families` (`id`, `family_name`, `species_id`, `created_at`, `updated_at`, `family_description`, `status`, `photo_id`) VALUES
  (1, 'Homo Sapiens', '1', '2015-10-03 10:11:46', '2015-10-03 10:11:51', '', 1, 0),
  (2, 'Dogs', '2', '2015-10-03 10:13:02', '2015-10-03 10:13:07', '', 1, 0),
  (3, 'Cats', '2', '2015-10-12 19:28:45', '2015-10-12 19:28:51', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `like_type` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL,
  `specy_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `mate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `from_user_id`, `to_user_id`, `like_type`, `photo_id`, `character_id`, `family_id`, `specy_id`, `post_id`, `mate_id`, `user_id`, `comment_id`, `created_at`, `updated_at`, `status`) VALUES
  (1, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-15 03:15:13', '2015-12-15 03:16:45', 6),
  (2, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-15 03:17:45', '2015-12-15 03:18:05', 6),
  (3, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-15 03:19:04', '2015-12-15 21:06:24', 6),
  (4, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-15 21:07:56', '2015-12-15 21:08:01', 6),
  (5, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-15 21:09:17', '2015-12-15 21:09:54', 6),
  (6, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-15 21:12:53', '2015-12-15 21:13:21', 6),
  (7, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-15 21:13:32', '2015-12-15 21:13:35', 6),
  (8, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-15 21:13:38', '2015-12-15 21:45:00', 6),
  (9, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-15 21:45:09', '2015-12-15 21:45:12', 6),
  (10, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-15 21:45:13', '2015-12-15 21:52:12', 6),
  (11, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-15 23:52:27', '2015-12-16 00:37:33', 6),
  (12, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-16 00:37:37', '2015-12-16 00:37:39', 6),
  (13, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-16 00:38:10', '2015-12-16 00:38:12', 6),
  (14, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-16 00:38:13', '2015-12-16 00:38:21', 6),
  (15, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-16 00:38:22', '2015-12-16 00:38:25', 6),
  (16, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-16 00:38:26', '2015-12-16 00:40:41', 6),
  (17, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-16 00:40:42', '2015-12-16 00:40:53', 6),
  (18, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-16 00:40:56', '2015-12-16 00:40:59', 6),
  (19, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-16 00:44:48', '2015-12-17 20:16:40', 6),
  (20, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-16 01:37:07', '2015-12-16 01:37:32', 6),
  (21, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-16 01:37:43', '2015-12-16 17:16:52', 6),
  (22, 10, 4, 2, 0, 44, 0, 0, 0, 0, 0, 0, '2015-12-16 01:38:36', '2015-12-16 21:30:57', 6),
  (23, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-16 17:16:54', '2015-12-16 22:31:20', 6),
  (24, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-16 22:46:34', '2015-12-17 20:14:42', 6),
  (25, 10, 4, 2, 0, 47, 0, 0, 0, 0, 0, 0, '2015-12-17 16:53:38', '2015-12-17 21:31:27', 6),
  (26, 10, 4, 2, 0, 48, 0, 0, 0, 0, 0, 0, '2015-12-17 17:16:46', '2015-12-17 21:20:42', 6),
  (27, 10, 4, 2, 0, 44, 0, 0, 0, 0, 0, 0, '2015-12-17 20:10:24', '2015-12-17 20:15:09', 6),
  (28, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-17 20:15:04', '2015-12-17 20:16:22', 6),
  (29, 10, 4, 2, 0, 44, 0, 0, 0, 0, 0, 0, '2015-12-17 20:15:11', '2015-12-17 20:15:14', 6),
  (30, 10, 4, 2, 0, 44, 0, 0, 0, 0, 0, 0, '2015-12-17 20:15:15', '2015-12-17 21:14:28', 6),
  (31, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-17 20:16:24', '2015-12-17 20:16:26', 6),
  (32, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-17 20:16:28', '2015-12-17 20:24:04', 6),
  (33, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-17 20:17:18', '2015-12-17 20:17:20', 6),
  (34, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-17 20:17:45', '2015-12-17 20:18:09', 6),
  (35, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-17 20:21:11', '2015-12-17 20:24:31', 6),
  (36, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-17 20:24:11', '2015-12-17 20:24:13', 6),
  (37, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-17 20:24:15', '2015-12-17 20:24:17', 6),
  (38, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-17 20:24:18', '2015-12-17 20:24:20', 6),
  (39, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-17 20:24:21', '2015-12-17 20:24:23', 6),
  (40, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-17 20:24:25', '2015-12-17 21:13:26', 6),
  (41, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-17 20:29:35', '2015-12-17 20:29:54', 6),
  (42, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-17 20:29:56', '2015-12-17 20:29:59', 6),
  (43, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-17 20:30:50', '2015-12-17 20:30:52', 6),
  (44, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-17 20:31:32', '2015-12-17 20:31:43', 6),
  (45, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-17 20:31:54', '2015-12-17 20:32:40', 6),
  (46, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-17 20:58:25', '2015-12-17 21:13:21', 6),
  (47, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-17 21:13:22', '2015-12-17 21:18:13', 6),
  (48, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-17 21:13:27', '2015-12-17 21:13:28', 6),
  (49, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-17 21:13:29', '2015-12-17 21:15:34', 6),
  (50, 10, 4, 2, 0, 44, 0, 0, 0, 0, 0, 0, '2015-12-17 21:14:29', '2015-12-17 21:14:29', 1),
  (51, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-17 21:15:42', '2015-12-17 21:18:09', 6),
  (52, 10, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, '2015-12-17 21:18:14', '2015-12-17 21:18:14', 1),
  (53, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-17 21:18:16', '2015-12-17 21:30:51', 6),
  (54, 10, 4, 2, 0, 48, 0, 0, 0, 0, 0, 0, '2015-12-17 21:31:12', '2015-12-17 21:34:21', 6),
  (55, 10, 4, 2, 0, 48, 0, 0, 0, 0, 0, 0, '2015-12-17 21:34:29', '2015-12-17 21:35:13', 6),
  (56, 10, 4, 2, 0, 48, 0, 0, 0, 0, 0, 0, '2015-12-17 21:35:53', '2015-12-17 21:35:55', 6),
  (57, 10, 4, 2, 0, 48, 0, 0, 0, 0, 0, 0, '2015-12-17 21:35:57', '2015-12-17 21:36:01', 6),
  (58, 10, 4, 2, 0, 48, 0, 0, 0, 0, 0, 0, '2015-12-17 21:36:23', '2015-12-17 21:36:24', 6),
  (59, 10, 4, 2, 0, 48, 0, 0, 0, 0, 0, 0, '2015-12-17 21:36:31', '2015-12-17 21:36:31', 1),
  (60, 10, 4, 2, 0, 43, 0, 0, 0, 0, 0, 0, '2015-12-18 00:44:58', '2015-12-18 00:44:58', 1),
  (61, 4, 10, 5, 8, 0, 0, 0, 0, 0, 0, 0, '2015-12-20 21:26:33', '2015-12-20 21:26:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mates`
--

CREATE TABLE IF NOT EXISTS `mates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=290 ;

--
-- Dumping data for table `mates`
--

INSERT INTO `mates` (`id`, `from_user_id`, `to_user_id`, `status`, `created_at`, `updated_at`) VALUES
  (285, 10, 4, 6, '2015-12-10 01:30:17', '2015-12-10 01:30:27'),
  (286, 10, 4, 6, '2015-12-10 01:30:32', '2015-12-10 01:30:37'),
  (287, 10, 4, 10, '2015-12-10 01:30:42', '2015-12-10 02:25:31'),
  (288, 4, 10, 8, '2015-12-10 02:25:32', '2015-12-20 17:29:41'),
  (289, 5, 10, 8, '2015-12-21 02:06:19', '2015-12-21 02:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
  ('2015_09_19_052927_create_songs_table', 1),
  ('2015_09_23_085027_create_users_table', 2),
  ('2015_09_24_101633_create_sessions_table', 3),
  ('2015_09_25_062322_create_sessions_table', 4),
  ('2015_10_03_093538_create_characters_table', 5),
  ('2015_10_03_094213_create_families_table', 6),
  ('2015_10_03_094908_create_species_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `notification_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notification_from_type` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL,
  `specy_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `mate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `from_user_id`, `to_user_id`, `notification_type`, `status`, `created_at`, `updated_at`, `notification_from_type`, `photo_id`, `character_id`, `family_id`, `specy_id`, `post_id`, `mate_id`, `user_id`, `comment_id`) VALUES
  (1, 4, 10, 3, 1, '2015-12-05 04:56:50', '2015-12-05 04:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0),
  (2, 4, 10, 3, 1, '2015-12-05 04:57:21', '2015-12-05 04:57:21', 0, 0, 0, 0, 0, 0, 0, 0, 0),
  (3, 4, 10, 3, 1, '2015-12-05 05:17:08', '2015-12-05 05:17:08', 0, 0, 0, 0, 0, 0, 0, 0, 0),
  (4, 4, 10, 3, 1, '2015-12-07 19:11:36', '2015-12-07 19:11:36', 0, 0, 0, 0, 0, 0, 0, 0, 0),
  (5, 4, 10, 3, 1, '2015-12-07 19:12:37', '2015-12-07 19:12:37', 0, 0, 0, 0, 0, 0, 0, 0, 0),
  (6, 4, 10, 3, 1, '2015-12-10 01:46:09', '2015-12-10 01:46:09', 0, 0, 0, 0, 0, 0, 0, 0, 0),
  (7, 10, 4, 18, 1, '2015-12-15 00:45:17', '2015-12-15 00:45:17', 0, 0, 0, 0, 0, 0, 0, 0, 52),
  (8, 10, 4, 18, 1, '2015-12-15 00:47:16', '2015-12-15 00:47:16', 0, 0, 0, 0, 0, 0, 0, 0, 53),
  (9, 10, 4, 18, 1, '2015-12-15 00:47:28', '2015-12-15 00:47:28', 0, 0, 0, 0, 0, 0, 0, 0, 54),
  (10, 10, 4, 18, 1, '2015-12-15 00:49:28', '2015-12-15 00:49:28', 0, 0, 0, 0, 0, 0, 0, 0, 55),
  (11, 10, 4, 18, 1, '2015-12-15 01:09:59', '2015-12-15 01:09:59', 0, 0, 0, 0, 0, 0, 0, 0, 56),
  (12, 10, 4, 18, 1, '2015-12-15 01:10:20', '2015-12-15 01:10:20', 0, 0, 0, 0, 0, 0, 0, 0, 57),
  (13, 10, 4, 18, 1, '2015-12-15 01:12:09', '2015-12-15 01:12:09', 0, 0, 0, 0, 0, 0, 0, 0, 58),
  (14, 10, 4, 18, 1, '2015-12-15 01:12:34', '2015-12-15 01:12:34', 0, 0, 0, 0, 0, 0, 0, 0, 59),
  (15, 10, 4, 18, 1, '2015-12-15 01:12:39', '2015-12-15 01:12:39', 0, 0, 0, 0, 0, 0, 0, 0, 60),
  (16, 10, 4, 18, 1, '2015-12-15 01:22:03', '2015-12-15 01:22:03', 0, 0, 0, 0, 0, 0, 0, 0, 61),
  (17, 10, 4, 18, 1, '2015-12-15 01:23:26', '2015-12-15 01:23:26', 0, 0, 0, 0, 0, 0, 0, 0, 62),
  (18, 10, 4, 18, 1, '2015-12-15 01:24:52', '2015-12-15 01:24:52', 0, 0, 0, 0, 0, 0, 0, 0, 63),
  (19, 10, 4, 18, 1, '2015-12-15 01:25:20', '2015-12-15 01:25:20', 0, 0, 0, 0, 0, 0, 0, 0, 64),
  (20, 10, 4, 18, 1, '2015-12-15 01:26:56', '2015-12-15 01:26:56', 0, 0, 0, 0, 0, 0, 0, 0, 65),
  (21, 10, 4, 18, 1, '2015-12-15 20:51:44', '2015-12-15 20:51:44', 0, 0, 0, 0, 0, 0, 0, 0, 66),
  (22, 10, 4, 18, 1, '2015-12-15 20:52:19', '2015-12-15 20:52:19', 0, 0, 0, 0, 0, 0, 0, 0, 67),
  (23, 10, 4, 18, 1, '2015-12-16 21:29:18', '2015-12-16 21:29:18', 0, 0, 0, 0, 0, 0, 0, 0, 68),
  (24, 10, 4, 18, 1, '2015-12-16 21:29:53', '2015-12-16 21:29:53', 0, 0, 0, 0, 0, 0, 0, 0, 69),
  (25, 10, 4, 18, 1, '2015-12-16 21:30:35', '2015-12-16 21:30:35', 0, 0, 0, 0, 0, 0, 0, 0, 70),
  (26, 10, 4, 18, 1, '2015-12-16 21:32:55', '2015-12-16 21:32:55', 0, 0, 0, 0, 0, 0, 0, 0, 71),
  (27, 10, 4, 18, 1, '2015-12-16 21:33:15', '2015-12-16 21:33:15', 0, 0, 0, 0, 0, 0, 0, 0, 72),
  (28, 10, 4, 18, 1, '2015-12-16 22:10:54', '2015-12-16 22:10:54', 0, 0, 0, 0, 0, 0, 0, 0, 73),
  (29, 10, 4, 18, 1, '2015-12-16 22:11:24', '2015-12-16 22:11:24', 0, 0, 0, 0, 0, 0, 0, 0, 74),
  (30, 10, 4, 18, 1, '2015-12-16 22:24:09', '2015-12-16 22:24:09', 0, 0, 0, 0, 0, 0, 0, 0, 75),
  (31, 10, 4, 18, 1, '2015-12-16 22:29:13', '2015-12-16 22:29:13', 0, 0, 0, 0, 0, 0, 0, 0, 76),
  (32, 10, 4, 18, 1, '2015-12-16 22:30:35', '2015-12-16 22:30:35', 0, 0, 0, 0, 0, 0, 0, 0, 77),
  (33, 10, 4, 18, 1, '2015-12-18 00:46:15', '2015-12-18 00:46:15', 0, 0, 0, 0, 0, 0, 0, 0, 78),
  (34, 10, 4, 3, 1, '2015-12-20 17:29:41', '2015-12-20 17:29:41', 0, 0, 0, 0, 0, 0, 288, 0, 0),
  (35, 4, 10, 18, 1, '2015-12-20 21:32:17', '2015-12-20 21:32:17', 0, 0, 0, 0, 0, 0, 0, 0, 79);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo_link` varchar(155) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `photo_name` varchar(155) NOT NULL,
  `photo_description` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `photo_type`, `created_at`, `updated_at`, `photo_link`, `status`, `photo_name`, `photo_description`) VALUES
  (1, 0, 1, '2015-12-02 00:07:41', '2015-12-02 00:07:41', 'images/avatars/users/673980_1_captainbuggy_download.jpg', 1, '', 0),
  (2, 0, 1, '2015-12-02 00:08:00', '2015-12-02 00:08:00', 'images/avatars/users/415420_1_captainbuggy_JUMONG.jpg', 1, '', 0),
  (3, 0, 1, '2015-12-02 00:09:05', '2015-12-02 00:09:05', 'images/avatars/users/342440_1_captainbuggy_JUMONG.jpg', 1, '', 0),
  (4, 1, 1, '2015-12-02 00:10:31', '2015-12-02 00:10:31', 'images/avatars/users/387862_1_captainbuggy_Screenshot_from_2015-06-18_17:12:44.png', 1, '', 0),
  (5, 1, 1, '2015-12-02 01:13:23', '2015-12-02 01:13:23', 'images/avatars/users/614336_1_captainbuggy_JUMONG.jpg', 1, '', 0),
  (6, 1, 1, '2015-12-02 03:23:07', '2015-12-02 03:23:07', 'images/avatars/users/970362_1_captainbuggy_joker-the-joker-28092803-1920-1080.jpg', 1, '', 0),
  (7, 8, 1, '2015-12-02 20:43:49', '2015-12-02 20:43:49', 'images/avatars/users/315396_8_mary_JUMONG.jpg', 1, '', 0),
  (8, 10, 1, '2015-12-04 02:24:35', '2015-12-04 02:24:35', 'images/avatars/users/409526_10_captainbuggy_G6005615.JPG', 1, '', 0),
  (9, 10, 5, '2015-12-11 22:47:00', '2015-12-11 22:47:00', 'images/comments/845406_10_4_G6946630.JPG', 1, '', 0),
  (10, 10, 5, '2015-12-11 22:50:44', '2015-12-11 22:50:44', 'images/comments/569902_10_4_G6946630.JPG', 1, '', 0),
  (11, 10, 5, '2015-12-11 22:53:00', '2015-12-11 22:53:00', 'images/comments/79119_10_4_G6946630.JPG', 1, '', 0),
  (12, 10, 5, '2015-12-14 01:35:41', '2015-12-14 01:35:41', 'images/comments/960643_10_4_G6946620.JPG', 1, '', 0),
  (13, 10, 5, '2015-12-14 01:37:18', '2015-12-14 01:37:18', 'images/comments/560802_10_4_G6946620.JPG', 1, '', 0),
  (14, 10, 5, '2015-12-14 01:40:04', '2015-12-14 01:40:04', 'images/comments/304461_10_4_G6946620.JPG', 1, '', 0),
  (15, 10, 5, '2015-12-14 01:44:04', '2015-12-14 01:44:04', 'images/comments/300970_10_4_G6936608.JPG', 1, '', 0),
  (16, 10, 5, '2015-12-14 01:44:39', '2015-12-14 01:44:39', 'images/comments/209658_10_4_G6946620.JPG', 1, '', 0),
  (17, 10, 5, '2015-12-14 01:47:04', '2015-12-14 01:47:04', 'images/comments/652993_10_4_G6946621.JPG', 1, '', 0),
  (18, 10, 5, '2015-12-14 01:48:25', '2015-12-14 01:48:25', 'images/comments/17238_10_4_G6946625.JPG', 1, '', 0),
  (19, 10, 5, '2015-12-14 01:49:29', '2015-12-14 01:49:29', 'images/comments/111642_10_4_G6946626.JPG', 1, '', 0),
  (20, 10, 5, '2015-12-14 01:50:04', '2015-12-14 01:50:04', 'images/comments/482554_10_4_G6936607.JPG', 1, '', 0),
  (21, 10, 5, '2015-12-14 01:50:44', '2015-12-14 01:50:44', 'images/comments/225223_10_4_G6946622.JPG', 1, '', 0),
  (22, 10, 5, '2015-12-14 02:01:24', '2015-12-14 02:01:24', 'images/comments/939709_10_4_G6946620.JPG', 1, '', 0),
  (23, 10, 5, '2015-12-14 02:04:18', '2015-12-14 02:04:18', 'images/comments/398682_10_4_G6936608.JPG', 1, '', 0),
  (24, 10, 5, '2015-12-14 02:05:09', '2015-12-14 02:05:09', 'images/comments/523632_10_4_G6946621.JPG', 1, '', 0),
  (25, 10, 5, '2015-12-14 02:08:24', '2015-12-14 02:08:24', 'images/comments/107502_10_4_G6946620.JPG', 1, '', 0),
  (26, 10, 5, '2015-12-14 02:28:20', '2015-12-14 02:28:20', 'images/comments/154549_10_4_G6946625.JPG', 1, '', 0),
  (27, 10, 5, '2015-12-14 02:29:38', '2015-12-14 02:29:38', 'images/comments/51599_10_4_G6946630.JPG', 1, '', 0),
  (28, 10, 5, '2015-12-14 02:31:42', '2015-12-14 02:31:42', 'images/comments/396943_10_4_G6946631.JPG', 1, '', 0),
  (29, 10, 5, '2015-12-14 02:33:54', '2015-12-14 02:33:54', 'images/comments/611806_10_4_G6956632.JPG', 1, '', 0),
  (30, 10, 5, '2015-12-14 02:34:42', '2015-12-14 02:34:42', 'images/comments/728678_10_4_G6946627.JPG', 1, '', 0),
  (31, 10, 5, '2015-12-14 02:36:15', '2015-12-14 02:36:15', 'images/comments/500851_10_4_G6946630.JPG', 1, '', 0),
  (32, 10, 5, '2015-12-14 02:36:33', '2015-12-14 02:36:33', 'images/comments/230419_10_4_G6956633.JPG', 1, '', 0),
  (33, 10, 5, '2015-12-14 02:37:32', '2015-12-14 02:37:32', 'images/comments/198289_10_4_G6926604.JPG', 1, '', 0),
  (34, 10, 5, '2015-12-14 02:46:11', '2015-12-14 02:46:11', 'images/comments/938075_10_4_G6946623.JPG', 1, '', 0),
  (35, 10, 5, '2015-12-14 02:49:46', '2015-12-14 02:49:46', 'images/comments/437534_10_4_G6946621.JPG', 1, '', 0),
  (36, 10, 5, '2015-12-14 03:00:54', '2015-12-14 03:00:54', 'images/comments/164146_10_4_G6946621.JPG', 1, '', 0),
  (37, 10, 5, '2015-12-14 03:03:40', '2015-12-14 03:03:40', 'images/comments/830116_10_4_G6946621.JPG', 1, '', 0),
  (38, 10, 5, '2015-12-14 03:07:36', '2015-12-14 03:07:36', 'images/comments/80516_10_4_G6946622.JPG', 1, '', 0),
  (39, 10, 5, '2015-12-14 15:40:51', '2015-12-14 15:40:51', 'images/comments/976501_10_4_G6946620.JPG', 1, '', 0),
  (40, 10, 5, '2015-12-14 15:41:16', '2015-12-14 15:41:16', 'images/comments/190116_10_4_G6946622.JPG', 1, '', 0),
  (41, 10, 5, '2015-12-14 22:06:17', '2015-12-14 22:06:17', 'images/comments/32071_10_4_G6966655.JPG', 1, '', 0),
  (42, 10, 5, '2015-12-14 22:09:08', '2015-12-14 22:09:08', 'images/comments/648155_10_4_G6966656.JPG', 1, '', 0),
  (43, 10, 5, '2015-12-14 22:24:06', '2015-12-14 22:24:06', 'images/comments/314169_10_4_G6946620.JPG', 1, '', 0),
  (44, 10, 5, '2015-12-14 22:25:45', '2015-12-14 22:25:45', 'images/comments/769408_10_4_G6946620.JPG', 1, '', 0),
  (45, 10, 5, '2015-12-14 22:26:02', '2015-12-14 22:26:02', 'images/comments/525845_10_4_G6946622.JPG', 1, '', 0),
  (46, 10, 5, '2015-12-15 00:01:35', '2015-12-15 00:01:35', 'images/comments/905908_10_4_G6946621.JPG', 1, '', 0),
  (47, 10, 5, '2015-12-15 00:10:34', '2015-12-15 00:10:34', 'images/comments/873213_10_4_G6946620.JPG', 1, '', 0),
  (48, 10, 5, '2015-12-15 00:45:16', '2015-12-15 00:45:16', 'images/comments/569576_10_4_G6966666.JPG', 1, '', 0),
  (49, 10, 5, '2015-12-15 01:12:34', '2015-12-15 01:12:34', 'images/comments/776483_10_4_G6946620.JPG', 1, '', 0),
  (50, 10, 5, '2015-12-15 01:22:03', '2015-12-15 01:22:03', 'images/comments/781984_10_4_G6936609.JPG', 1, '', 0),
  (51, 10, 5, '2015-12-15 01:23:26', '2015-12-15 01:23:26', 'images/comments/501302_10_4_G6946620.JPG', 1, '', 0),
  (52, 10, 5, '2015-12-15 01:25:20', '2015-12-15 01:25:20', 'images/comments/541378_10_4_G6946620.JPG', 1, '', 0),
  (53, 10, 5, '2015-12-15 01:26:56', '2015-12-15 01:26:56', 'images/comments/640407_10_4_G6946621.JPG', 1, '', 0),
  (54, 10, 5, '2015-12-15 20:52:19', '2015-12-15 20:52:19', 'images/comments/729262_10_4_6203aa327a8770424890d92aa77c9b86.jpg', 1, '', 0),
  (55, 10, 5, '2015-12-16 21:29:53', '2015-12-16 21:29:53', 'images/comments/500471_10_4_1382725-bigthumbnail.jpg', 1, '', 0),
  (56, 10, 5, '2015-12-16 21:33:15', '2015-12-16 21:33:15', 'images/comments/340791_10_4_download.jpg', 1, '', 0),
  (57, 10, 5, '2015-12-16 22:10:54', '2015-12-16 22:10:54', 'images/comments/764669_10_4_1382725-bigthumbnail.jpg', 1, '', 0),
  (58, 10, 5, '2015-12-16 22:11:24', '2015-12-16 22:11:24', 'images/comments/487206_10_4_6203aa327a8770424890d92aa77c9b86.jpg', 1, '', 0),
  (59, 10, 5, '2015-12-16 22:24:09', '2015-12-16 22:24:09', 'images/comments/85906_10_4_1382725-bigthumbnail.jpg', 1, '', 0),
  (60, 10, 5, '2015-12-16 22:29:13', '2015-12-16 22:29:13', 'images/comments/748949_10_4_6203aa327a8770424890d92aa77c9b86.jpg', 1, '', 0),
  (61, 10, 5, '2015-12-16 22:30:35', '2015-12-16 22:30:35', 'images/comments/403256_10_4_5e9cb552fa32f7d80e8c0697beb75b84.jpg', 1, '', 0),
  (62, 10, 5, '2015-12-18 00:46:15', '2015-12-18 00:46:15', 'images/comments/52831_10_4_5e9cb552fa32f7d80e8c0697beb75b84.jpg', 1, '', 0),
  (63, 10, 2, '2015-12-20 21:20:52', '2015-12-20 21:20:52', 'images/avatars/characters/mini/875057_10_Wala_ra_5e9cb552fa32f7d80e8c0697beb75b84.jpg', 1, '', 0),
  (64, 4, 2, '2015-12-20 21:24:15', '2015-12-20 21:24:15', 'images/avatars/characters/mini/450776_4_SKIMMER_1382725-bigthumbnail.jpg', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_text` varchar(1000) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `post_type` int(11) NOT NULL,
  `post_to_type` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_information` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_name`, `user_information`, `payload`, `last_activity`) VALUES
  ('2cf0d2fe929cb9fcbd40782b1e66975caa8e2688', '', '', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRmV5R0dPUGxxY2cxaVRpNGRNQWUwN1NrbnpjRlI0cHBGOUExWXI3ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2Vycy9jcmVhdGUiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDQzMTY5MjYzO3M6MToiYyI7aToxNDQzMTY1MjI0O3M6MToibCI7czoxOiIwIjt9fQ==', 1443169263);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lyrics` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `songs_slug_unique` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `lyrics`, `slug`, `created_at`, `updated_at`) VALUES
  (1, 'Fall', NULL, '', '2015-09-18 22:25:56', '2015-09-18 22:25:56'),
  (2, 'Fall', 'asfaffasfaf asfsafsfafaf', 'fall', '2015-09-18 22:26:41', '2015-09-22 00:43:12'),
  (4, 'Boyfriend', 'John Scobert saaaa', 'boyfriend', '2015-09-18 22:27:10', '2015-09-22 01:08:34'),
  (7, 'ALALAH', 'ALALAH', 'ALALAH', '2015-09-22 01:28:37', '2015-09-22 01:28:37'),
  (8, 'ALALAH JOB 4', 'aaasfdasfasf', 'asfasfasfafsfafafafs', '2015-09-22 01:32:08', '2015-09-22 01:32:08'),
  (9, 'ALALAH JOB 4', 'aaasfdasfasf', 'asfasfasfafsfafafafs ddgsdgsdsdsdsdhshdsh', '2015-09-22 01:40:55', '2015-09-22 01:40:55'),
  (10, 'Asfasfaf asfafafafsafasfsafafafasf', 'asfafsasf  asfasfasfasfasfsaf', 'asfasfafsasfasf', '2015-09-23 00:35:59', '2015-09-23 00:36:24'),
  (11, 'John Job', 'John Job', 'John Job', '2015-09-23 00:37:15', '2015-09-23 00:37:15'),
  (12, 'asfafasgagasgdhdhfafdhdfh', 'adfhafhadfhjafyhasdfhdafhadf', 'hadfhadfjhadfghdfghDFHAHF', '2015-09-23 00:37:31', '2015-09-23 00:37:31'),
  (13, 'asfasfafsafsaf', 'asfasfsafafasfa', 'asfasfasfafafsafas', '2015-09-23 02:09:07', '2015-09-23 02:09:07'),
  (14, 'asfsafsfafsaf', 'asfafsafafafafafasfasf', 'sfafssafsafafafsafaf', '2015-09-23 02:22:02', '2015-09-23 02:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE IF NOT EXISTS `species` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `specy_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `specy_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '1',
  `photo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`id`, `specy_name`, `created_at`, `updated_at`, `specy_description`, `status`, `photo_id`) VALUES
  (1, 'Human', '2015-10-03 10:10:50', '2015-10-03 10:10:54', '', 1, 0),
  (2, 'Animal', '2015-10-03 10:17:13', '2015-10-03 10:17:19', '', 1, 0),
  (3, 'Alien', '2015-10-06 15:51:30', '2015-10-06 15:51:37', 'Yeah', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE IF NOT EXISTS `updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `update_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `character_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `like_id` int(11) NOT NULL,
  `mate_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `user_id`, `update_type`, `status`, `created_at`, `updated_at`, `character_id`, `comment_id`, `like_id`, `mate_id`, `post_id`) VALUES
  (9, 10, 4, 1, '2015-12-20 21:20:52', '2015-12-20 21:20:52', 53, 0, 0, 0, 0),
  (10, 4, 4, 1, '2015-12-20 21:24:16', '2015-12-20 21:24:16', 54, 0, 0, 0, 0),
  (11, 4, 8, 1, '2015-12-20 21:26:33', '2015-12-20 21:26:33', 0, 0, 61, 0, 0),
  (12, 4, 6, 1, '2015-12-20 21:32:17', '2015-12-20 21:32:17', 0, 79, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_character_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL DEFAULT '1',
  `current_character_avatar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `current_character_avatar_mini` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email_address`, `password`, `first_name`, `middle_name`, `last_name`, `avatar`, `country`, `current_character_id`, `gender`, `birth_date`, `created_at`, `updated_at`, `status`, `current_character_avatar`, `current_character_avatar_mini`, `photo_id`) VALUES
  (2, 'john', 'johnscobert@gmail.com', '$2y$10$DVRcqkriBY8jKN0cMlrla.SZ.y/j/lrEXrfAX3VfRhyKoYGzcyoeS', 'John', NULL, 'Scobert', 'images/avatars/users/970362_1_captainbuggy_joker-the-joker-28092803-1920-1080.jpg', '167', '43', 1, '2015-12-03', '2015-09-25 01:23:19', '2015-09-25 01:23:19', 1, 'images/avatars/characters/normal/8_1_Jumong_joker-the-joker-28092803-1920-1080.jpg', 'images/avatars/characters/mini/8_1_Jumong_joker-the-joker-28092803-1920-1080.jpg', 6),
  (3, 'alalah', 'alalah@gmail.com', '$2y$10$CdO1uvHXG5CoIHQUUgzDTOWdbJtrmWX45DRVNYOVACRUz4ZKWEyVu', 'John', NULL, 'Scobert', 'images/avatars/users/970362_1_captainbuggy_joker-the-joker-28092803-1920-1080.jpg', '167', '43', 1, '2015-09-30', '2015-09-25 01:27:02', '2015-09-25 01:27:02', 1, 'images/avatars/characters/normal/8_1_Jumong_joker-the-joker-28092803-1920-1080.jpg', 'images/avatars/characters/mini/8_1_Jumong_joker-the-joker-28092803-1920-1080.jpg', 6),
  (4, 'nickie', 'nik@gmail.com', '$2y$10$fO20KTh.VtddeSTLTuLNY.oYEG29qN/eyRSSm7mNVymWVGyXGEc8S', 'Nickie', NULL, 'Archua', 'images/avatars/users/970362_1_captainbuggy_joker-the-joker-28092803-1920-1080.jpg', '167', '54', 1, '2015-10-07', '2015-10-03 00:12:22', '2015-12-02 19:23:25', 1, 'images/avatars/characters/normal/8_1_Homer_Joker_download.jpg', 'images/avatars/characters/mini/8_1_Homer_Joker_download.jpg', 6),
  (5, 'brain', 'brain@gmail.com', '$2y$10$Faq5GjPIkzXHGzVkStzlPeAcfFMVwcW3zRZSkkm2jYTq4..i/F4RK', 'Brian', NULL, 'Olingay', 'images/avatars/users/970362_1_captainbuggy_joker-the-joker-28092803-1920-1080.jpg', '167', '43', 1, '2015-10-12', '2015-10-03 01:07:55', '2015-10-03 01:07:55', 1, 'images/avatars/characters/normal/8_1_Jumong_joker-the-joker-28092803-1920-1080.jpg', 'images/avatars/characters/mini/8_1_Jumong_joker-the-joker-28092803-1920-1080.jpg', 6),
  (6, 'rex', 'rex@gmail.com', '$2y$10$ocRP1qRI6rx6N8w5V5wQz.ytaVPvaDD4sSJqXqMSNG5jkuL7ubIhW', 'Rexon', NULL, 'De Los Reyes', NULL, '1', '43', 1, '2015-12-16', '2015-12-02 19:25:16', '2015-12-02 19:25:16', 1, '', NULL, 0),
  (7, 'karl', 'karl@gmail.com', '$2y$10$QE4gjA18OWAJwCVT/L7S8e73ThZOEJHK9.t1E39UHtrifGFUPAFNG', 'Karl', NULL, 'Espiritu', NULL, '1', '49', 1, '2015-12-17', '2015-12-02 19:57:05', '2015-12-02 19:57:06', 1, '', NULL, 0),
  (8, 'mary', 'mary@gmail.com', '$2y$10$/VLxDKu8TLP9/oKWdCrJuO9YCWRHYI.VMmGX.9JIve4/hotXzNTfe', 'Mary', NULL, 'Gale', 'images/avatars/users/315396_8_mary_JUMONG.jpg', '1', '50', 2, '2015-12-03', '2015-12-02 20:41:11', '2015-12-02 20:43:49', 1, '', NULL, 7),
  (9, 'cha', 'cha@gmail.com', '$2y$10$glul/FcAykRtyB1M0EOpxuP/rWjR2A5uA2NWrDtNoDxhLG9SR7EZ.', 'Chariss', NULL, 'Char', NULL, '3', '54', 2, '2015-12-09', '2015-12-02 21:50:14', '2015-12-02 21:50:14', 1, '', NULL, 0),
  (10, 'captainbuggy', 'captainbuggythefifth@gmail.com', '$2y$10$9iWbPvcV.CGtu8qgzasVdO0a35S.8XCPFpXWMA2aS4pm3QVTcg.R2', 'Gaudencio', NULL, 'Teves V', 'images/avatars/users/409526_10_captainbuggy_G6005615.JPG', '1', '53', 1, '1990-12-22', '2015-12-04 02:16:36', '2015-12-04 03:03:56', 1, 'images/avatars/characters/normal/8_1_Jumong_joker-the-joker-28092803-1920-1080.jpg', 'images/avatars/characters/mini/8_1_Jumong_joker-the-joker-28092803-1920-1080.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE IF NOT EXISTS `user_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_chat` int(11) DEFAULT '11',
  `user_profile` int(11) DEFAULT '1',
  `user_character` int(11) DEFAULT '21',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `user_chat_status` int(11) DEFAULT '111',
  `user_profile_status` int(11) NOT NULL DEFAULT '101',
  `user_character_status` int(11) NOT NULL DEFAULT '121',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`id`),
  UNIQUE KEY `unique_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`id`, `user_id`, `user_chat`, `user_profile`, `user_character`, `created_at`, `updated_at`, `status`, `user_chat_status`, `user_profile_status`, `user_character_status`) VALUES
  (1, 1, 11, 3, 21, '2015-12-02 03:34:04', '2015-12-01 19:34:04', 1, 112, 102, 121),
  (2, 2, 11, 1, 21, '2015-11-18 03:42:12', '2015-11-17 08:02:33', 1, 111, 101, 121),
  (3, 3, 11, 1, 21, '2015-11-18 03:42:13', '2015-11-17 08:02:33', 1, 111, 101, 121),
  (4, 4, 11, 1, 21, '2015-11-18 03:42:14', '2015-11-17 08:02:33', 1, 111, 101, 121),
  (5, 5, 11, 1, 21, '2015-11-18 03:42:16', '2015-11-17 08:02:33', 1, 111, 101, 121),
  (6, 6, 21, 1, 31, '2015-12-02 19:25:16', '2015-12-02 19:25:16', 1, 111, 101, 121),
  (7, 7, 21, 1, 31, '2015-12-02 19:57:06', '2015-12-02 19:57:06', 1, 111, 101, 121),
  (8, 8, 21, 1, 31, '2015-12-02 20:41:11', '2015-12-02 20:41:11', 1, 111, 101, 121),
  (9, 9, 13, 3, 21, '2015-12-03 05:50:39', '2015-12-02 21:50:39', 1, 111, 101, 121),
  (10, 10, 11, 1, 21, '2015-12-04 02:16:37', '2015-12-04 02:16:37', 1, 111, 101, 121);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;