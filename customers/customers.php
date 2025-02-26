<?php 
/*
Plugin Name: Customers
Plugin URI: http://wordpress.org/extend/plugins/customers/
Version: 1.1.0
Author: F. Marié
Description: Directory for customers, suppliers, friends or others groups
*/

/*  Copyright 2012 F. Marié

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, published by
    the Free Software Foundation, either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/*
Flags by http://www.sbesson.com/fra/creations/flags.php
*/
define('CUSTOMERS_VERSION', '1.1.0'); // Actual version
define('CUSTOMERS_DIR', dirname(__FILE__)); // General directory
define('CTS_INC', CUSTOMERS_DIR.'/includes'); // Include's directory
define('CTS_IMG_ADMIN', CUSTOMERS_DIR.'/images'); // Images's directory - here you dl yours own images of customers
define('CTS_TPL', CUSTOMERS_DIR.'/templates'); // Templates's directory
define('CTS_LOCAL_URL', WP_CONTENT_URL.'/plugins/customers'); // default url
define('CTS_ADM', CUSTOMERS_DIR.'/admin'); // Include's directory
define('CTS_IMG', CTS_LOCAL_URL.'/images'); // Images's directory - Display on Webpage
define('CTS_FLG', CTS_LOCAL_URL.'/flags'); // Flags's directory
if (file_exists(CTS_LOCAL_URL.'/config.php')) include_once(CTS_LOCAL_URL.'/config.php'); // includes local config file if exists
define('CTS_TPF','bycountries'); //Name of your template file (without extension) who stored into templates's directory
// Class
class Customers {

	function __construct() {
		global $customers,$wpdb,$template; // globalize the variable
		
		// manages plugin activation and deactivation
		register_activation_hook( __FILE__, array(&$this, 'activate') );
		register_deactivation_hook( __FILE__, array(&$this, 'deactivate') );

		// stopping here if we are going to deactivate the plugin
		if (isset($_GET['action']) && $_GET['action'] == 'deactivate' && isset($_GET['plugin']) && $_GET['plugin'] == 'customers/customers.php')
			return;

		// manages plugin upgrade
		add_filter('upgrader_post_install', array(&$this, 'post_upgrade'));

		if (is_admin()) {
			require_once(CTS_ADM.'/customersadmin.php');
		} else {
			include_once(CTS_INC.'/core.php');
			add_filter('the_content', 'template',11);
		}
	}
	function deactivate() {
		$style = '<p style = "font-family: sans-serif; font-size: 12px; color: #333; margin: -5px">%s</p>';
		return sprintf($style, __('The application has been disabled'));
	}
	function activate() {
		$style = '<p style = "font-family: sans-serif; font-size: 12px; color: #333; margin: -5px">%s</p>';
			$r = $this->_activate();

		if (!$r){
			die (sprintf($style, __('For some reasons, Customers could not create a table in your database.', 'customers')));
		}else{
			return sprintf($style, __('Activation ok !'));
		}
	}
	// plugin activation
	function _activate() {
		global $wpdb;
		$bdd = $wpdb->prefix . 'pays';
		$r = $wpdb->query("CREATE TABLE IF NOT EXISTS $bdd (`rowid` int(11) NOT NULL auto_increment, `code` varchar(2) NOT NULL, `fr` varchar(255) NOT NULL, `en` varchar(255) default NULL, PRIMARY KEY  (`rowid`));");
		if ($r === true) $wpdb->query("INSERT INTO $bdd (`rowid`, `code`, `en`) VALUES (1, 'AF', 'Afghanistan'), (2, 'ZA', 'South Africa'), (3, 'AL', 'Albania'), (4, 'DZ', 'Algeria'), (5, 'DE', 'Germany'), (6, 'AD', 'Andorra'), (7, 'AO', 'Angola'), (8, 'AI', 'Anguilla'), (9, 'AQ', 'Antarctica'), (10, 'AG', 'Antigua & Barbuda'), (11, 'AN', 'Netherlands Antilles'), (12, 'SA', 'Saudi Arabia'), (13, 'AR', 'Argentina'), (14, 'AM', 'Armenia'), (15, 'AW', 'Aruba'), (16, 'AU', 'Australia'), (17, 'AT', 'Austria'), (18, 'AZ', 'Azerbaijan'), (19, 'BJ', 'Benin'), (20, 'BS', 'Bahamas, The'), (21, 'BH', 'Bahrain'), (22, 'BD', 'Bangladesh'), (23, 'BB', 'Barbados'), (24, 'PW', 'Palau'), (25, 'BE', 'Belgium'), (26, 'BZ', 'Belize'), (27, 'BM', 'Bermuda'), (28, 'BT', 'Bhutan'), (29, 'BY', 'Belarus'), (30, 'MM', 'Myanmar (ex-Burma)'), (31, 'BO', 'Bolivia'), (32, 'BA', 'Bosnia and Herzegovina'), (33, 'BW', 'Botswana'), (34, 'BR', 'Brazil'), (35, 'BN', 'Brunei Darussalam'), (36, 'BG', 'Bulgaria'), (37, 'BF', 'Burkina Faso'), (38, 'BI', 'Burundi'), (39, 'CI', 'Ivory Coast (see Cote d''Ivoire)'), (40, 'KH', 'Cambodia'), (41, 'CM', 'Cameroon'), (42, 'CA', 'Canada'), (43, 'CV', 'Cape Verde'), (44, 'CL', 'Chile'), (45, 'CN', 'China'), (46, 'CY', 'Cyprus'), (47, 'CO', 'Colombia'), (48, 'KM', 'Comoros'), (49, 'CG', 'Congo'), (50, 'KP', 'Korea, Demo. People''s Rep. of'), (51, 'KR', 'Korea, (South) Republic of'), (52, 'CR', 'Costa Rica'), (53, 'HR', 'Croatia'), (54, 'CU', 'Cuba'), (55, 'DK', 'Denmark'), (56, 'DJ', 'Djibouti'), (57, 'DM', 'Dominica'), (58, 'EG', 'Egypt'), (59, 'AE', 'United Arab Emirates'), (60, 'EC', 'Ecuador'), (61, 'ER', 'Eritrea'), (62, 'ES', 'Spain'), (63, 'EE', 'Estonia'), (64, 'US', 'United States'), (65, 'ET', 'Ethiopia'), (66, 'FI', 'Finland'), (67, 'FR', 'France'), (68, 'GE', 'Georgia'), (69, 'GA', 'Gabon'), (70, 'GM', 'Gambia, the'), (71, 'GH', 'Ghana'), (72, 'GI', 'Gibraltar'), (73, 'GR', 'Greece'), (74, 'GD', 'Grenada'), (75, 'GL', 'Greenland'), (76, 'GP', 'Guinea, Equatorial'), (77, 'GU', 'Guam'), (78, 'GT', 'Guatemala'), (79, 'GN', 'Guinea'), (80, 'GQ', 'Equatorial Guinea'), (81, 'GW', 'Guinea-Bissau'), (82, 'GY', 'Guyana'), (83, 'GF', 'Guiana, French'), (84, 'HT', 'Haiti'), (85, 'HN', 'Honduras'), (86, 'HK', 'Hong Kong, (China)'), (87, 'HU', 'Hungary'), (88, 'BV', 'Bouvet Island'), (89, 'CX', 'Christmas Island'), (90, 'NF', 'Norfolk Island'), (91, 'KY', 'Cayman Islands'), (92, 'CK', 'Cook Islands'), (93, 'FO', 'Faroe Islands'), (94, 'FK', 'Falkland Islands (Malvinas)'), (95, 'FJ', 'Fiji'), (96, 'GS', 'S. Georgia and S. Sandwich Is.'), (97, 'HM', 'Heard and McDonald Islands'), (98, 'MH', 'Marshall Islands'), (99, 'PN', 'Pitcairn Island'), (100, 'SB', 'Solomon Islands'), (101, 'SJ', 'Svalbard and Jan Mayen Islands'), (102, 'TC', 'Turks and Caicos Islands'), (103, 'VI', 'Virgin Islands, U.S.'), (104, 'VG', 'Virgin Islands, British'), (105, 'CC', 'Cocos (Keeling) Islands'), (106, 'UM', 'US Minor Outlying Islands'), (107, 'IN', 'India'), (108, 'ID', 'Indonesia'), (109, 'IR', 'Iran, Islamic Republic of'), (110, 'IQ', 'Iraq'), (111, 'IE', 'Ireland'), (112, 'IS', 'Iceland'), (113, 'IL', 'Israel'), (114, 'IT', 'Italy'), (115, 'JM', 'Jamaica'), (116, 'JP', 'Japan'), (117, 'JO', 'Jordan'), (118, 'KZ', 'Kazakhstan'), (119, 'KE', 'Kenya'), (120, 'KG', 'Kyrgyzstan'), (121, 'KI', 'Kiribati'), (122, 'KW', 'Kuwait'), (123, 'LA', 'Lao People''s Democratic Republic'), (124, 'LS', 'Lesotho'), (125, 'LV', 'Latvia'), (126, 'LB', 'Lebanon'), (127, 'LR', 'Liberia'), (128, 'LY', 'Libyan Arab Jamahiriya'), (129, 'LI', 'Liechtenstein'), (130, 'LT', 'Lithuania'), (131, 'LU', 'Luxembourg'), (132, 'MO', 'Macao, (China)'), (133, 'MG', 'Madagascar'), (134, 'MY', 'Malaysia'), (135, 'MW', 'Malawi'), (136, 'MV', 'Maldives'), (137, 'ML', 'Mali'), (138, 'MT', 'Malta'), (139, 'MP', 'Northern Mariana Islands'), (140, 'MA', 'Morocco'), (141, 'MQ', 'Martinique'), (142, 'MU', 'Mauritius'), (143, 'MR', 'Mauritania'), (144, 'YT', 'Mayotte'), (145, 'MX', 'Mexico'), (146, 'FM', 'Micronesia, Federated States of'), (147, 'MD', 'Moldova, Republic of'), (148, 'MC', 'Monaco'), (149, 'MN', 'Mongolia'), (150, 'MS', 'Montserrat'), (151, 'MZ', 'Mozambique'), (152, 'NP', 'Nepal'), (153, 'NA', 'Namibia'), (154, 'NR', 'Nauru'), (155, 'NI', 'Nicaragua'), (156, 'NE', 'Niger'), (157, 'NG', 'Nigeria'), (158, 'NU', 'Niue'), (159, 'NO', 'Norway'), (160, 'NC', 'New Caledonia'), (161, 'NZ', 'New Zealand'), (162, 'OM', 'Oman'), (163, 'UG', 'Uganda'), (164, 'UZ', 'Uzbekistan'), (165, 'PE', 'Peru'), (166, 'PK', 'Pakistan'), (167, 'PA', 'Panama'), (168, 'PG', 'Papua New Guinea'), (169, 'PY', 'Paraguay'), (170, 'NL', 'Netherlands'), (171, 'PH', 'Philippines'), (172, 'PL', 'Poland'), (173, 'PF', 'French Polynesia'), (174, 'PR', 'Puerto Rico'), (175, 'PT', 'Portugal'), (176, 'QA', 'Qatar'), (177, 'CF', 'Central African Republic'), (178, 'CD', 'Congo, Democratic Rep. of the'), (179, 'DO', 'Dominican Republic'), (180, 'CZ', 'Czech Republic'), (181, 'RE', 'Reunion'), (182, 'RO', 'Romania'), (183, 'GB', 'Saint Pierre and Miquelon'), (184, 'RU', 'Russia (Russian Federation)'), (185, 'RW', 'Rwanda'), (186, 'SN', 'Senegal'), (187, 'EH', 'Western Sahara'), (188, 'KN', 'Saint Kitts and Nevis'), (189, 'SM', 'San Marino'), (190, 'PM', 'Saint Pierre and Miquelon'), (191, 'VA', 'Vatican City State (Holy See)'), (192, 'VC', 'Saint Vincent and the Grenadines'), (193, 'SH', 'Saint Helena'), (194, 'LC', 'Saint Lucia'), (195, 'SV', 'El Salvador'), (196, 'WS', 'Samoa'), (197, 'AS', 'American Samoa'), (198, 'ST', 'Sao Tome and Principe'), (199, 'SC', 'Seychelles'), (200, 'SL', 'Sierra Leone'), (201, 'SG', 'Singapore'), (202, 'SI', 'Slovenia'), (203, 'SK', 'Slovakia'), (204, 'SO', 'Somalia'), (205, 'SD', 'Sudan'), (206, 'LK', 'Sri Lanka (ex-Ceilan)'), (207, 'SE', 'Sweden'), (208, 'CH', 'Switzerland'), (209, 'SR', 'Suriname'), (210, 'SZ', 'Swaziland'), (211, 'SY', 'Syrian Arab Republic'), (212, 'TW', 'Taiwan'), (213, 'TJ', 'Tajikistan'), (214, 'TZ', 'Tanzania, United Republic of'), (215, 'TD', 'Chad'), (216, 'TF', 'French Southern Territories - TF'), (217, 'IO', 'British Indian Ocean Territory'), (218, 'TH', 'Thailand'), (219, 'TL', 'Timor-Leste (East Timor)'), (220, 'TG', 'Togo'), (221, 'TK', 'Tokelau'), (222, 'TO', 'Tonga'), (223, 'TT', 'Trinidad & Tobago'), (224, 'TN', 'Tunisia'), (225, 'TM', 'Turkmenistan'), (226, 'TR', 'Turkey'), (227, 'TV', 'Tuvalu'), (228, 'UA', 'Ukraine'), (229, 'UY', 'Uruguay'), (230, 'VU', 'Vanuatu'), (231, 'VE', 'Venezuela'), (232, 'VN', 'Viet Nam'), (233, 'WF', 'Wallis and Futuna'), (234, 'YE', 'Yemen'), (235, 'YU', 'Saint Pierre and Miquelon'), (236, 'ZM', 'Zambia'), (237, 'ZW', 'Zimbabwe'), (238, 'MK', 'Macedonia, TFYR'); ");
		if ($r === false) return false;
		$bdd = $wpdb->prefix . 'customers';
		$r = $wpdb->query("CREATE TABLE  IF NOT EXISTS $bdd ( `cuid` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,`cupays` INT( 11 ) NOT NULL ,`cuname` VARCHAR( 50 ) NOT NULL ,`cuadr1` VARCHAR( 150 ) NOT NULL ,`cuadr2` VARCHAR( 150 ) NOT NULL ,`cucp` VARCHAR( 50 ) NOT NULL ,`cutown` VARCHAR( 100 ) NOT NULL ,`cutel` VARCHAR( 50 ) NOT NULL ,`cufax` VARCHAR( 50 ) NOT NULL ,`cumail` VARCHAR( 50 ) NOT NULL ,`cuweb` VARCHAR( 150 ) NOT NULL ,`culogo` VARCHAR( 250 ) NOT NULL ,INDEX (  `cupays` )) ;");
		if ($r === false) return false;
		return true;
		if(@mkdir(CTS_IMG,0777,true)){
			return true;
		}else{
			return false;
		}
	}
} //Customers


if (class_exists("Customers"))
	new Customers();

?>