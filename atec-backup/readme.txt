=== atec Backup ===
Contributors: DocJoJo
Tags: All-in-one Backup and restore solution – fast & reliable.
Requires at least:4.9
Tested up to: 6.7
Requires PHP: 7.4
Requires CP: 1.7
Tested up to PHP: 8.4.1
Stable tag: 1.0.32
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

All-in-one Backup and restore solution – fast & reliable.

== Description ==

This plugin provides a fast & reliable backup and restore solution for the WP database and WP files.
Specific tables and paths can be excluded.

Backups are stored in the uploads folder on the local machine and can optionally be moved to FTP remote storage.
Automatic backup mode works in the background (using WP cron), but all backup types can be triggered manually at any time.

=== Specifications ===

Requires: ZIP and PDO extension.
Size: only 118 KB
CPU footprint (idle): <5 ms.

== 3rd party as a service ==

Once, when activating the plugin, an integrity check is requested from our server (https://atecplugins.com/) – if you give your permission.
Privacy policy: https://atecplugins.com/privacy-policy/

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory or through the `Plugins` menu.
2. Activate the plugin through the `Plugins` menu in WordPress.
3. Click "atec Backup" link in admin menu bar.
4. Enable Backups in the `Settings` tab.

== Frequently Asked Questions ==

== Screenshots ==

1. Dashboard
2. Settings
3. Backup
4. Restore (PRO feature)
5. FTP Settings (PRO feature)
6. FTP Transfer (PRO feature)

== Changelog ==

= 1.0.32 [2025.02.23] =
* str_pad

= 1.0.31 [2025.02.16] =
* new ATEC_fixit();

= 1.0.30 [2025.02.15] =
* (function() {

= 1.0.29 [2025.02.14] =
* atec_fixit

= 1.0.28 [2025.02.10] =
* New atec-fs filesystem

= 1.0.27 [2025.02.09] =
* Fixed Info DIV

= 1.0.26 [2025.02.09] =
* CP checked

= 1.0.25 [2025.02.09] =
* Fixed fixit

= 1.0.24 [2025.02.09] =
* Fixed atec_group

= 1.0.23 [2025.02.09] =
* WP approved

= 1.0.22 [2025.02.01] =
* Added settings sanitizing

= 1.0.21 [2025.01.26] =
* switched require_once -> require

= 1.0.20 [2025.01.03] =
* Fixed the SSH FPUT/FGET routine

= 1.0.19 [2025.01.02] =
* SQL optimized and atec-migrate support

= 1.0.18 [2024.12.23] =
* Fixed: uploadUrl and sort DirList (unix)

= 1.0.17 [2024.12.23] =
* Fixit: random string for download

= 1.0.16 [2024.12.23] =
* atec_fix_it

= 1.0.15 [2024.12.23] =
* atec_WPB_options

= 1.0.14 [2024.12.22] =
* Fixed cron job issues

= 1.0.13 [2024.12.18] =
* See cron time in settings

= 1.0.12 [2024.12.17] =
* Run manual backup now

= 1.0.11 [2024.12.17] =
* Fixed atec-wpb-ftp-pro

= 1.0.10 [2024.12.16] =
* ATEC_wpb_ftp_settings

= 1.0.9 [2024.12.14] =
* Review adjusts

= 1.0.8 [2024.11.22] =
* Optimized atec-*-install.php routine

= 1.0.7 [2024.11.21] =
* Improved OPC stats

= 1.0.6 [2024.11.17] =
* download backup files

= 1.0.5 [2024.11.02] =
* glob(*)

= 1.0.4 [2024.10.17] =
* Cron

= 1.0.3 [2024.10.12] =
* Cron

= 1.0.1, 1.0.2 [2024.10.11] =
* PDO

= 1.0.0 [2024.10.10] =
* Initial Release
