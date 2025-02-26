<?php
  if ( ! defined( 'ABSPATH' ) ) exit;
	$wpdb->query("CREATE TABLE `wp_twp_vid` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vid` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat` int(11) DEFAULT NULL,
  `thumbnail` int(11) NOT NULL,
  `twidth` int(11) NOT NULL,
  `theight` int(11) NOT NULL,
  `pwidth` int(11) NOT NULL,
  `pheight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

	$wpdb->query("CREATE TABLE `wp_twp_vid_cat` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `playlist` int(11) NOT NULL,
  `twidth` int(11) NOT NULL,
  `theight` int(11) NOT NULL,
  `pwidth` int(11) NOT NULL,
  `pheight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
?>