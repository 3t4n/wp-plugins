===Admin Footer Version (rebranded)===
Contributors:luciano-croce,garrett-eclipse,swissspidy
Donate link:https://www.paypal.me/lucianocroce
Tags:admin-footer-version,servehappy,site-health,update-core,luciano-croce
Requires PHP:5.2.4
Requires at least:2.3
Tested up to:5.1
Stable tag:trunk
License:GPLv2 or later
License URI:https://www.gnu.org/licenses/gpl-2.0.html

show the rebranded version in the admin footer when it is activated or if it is in mu-plugins directory
==Description==
Show the **rebranded version** in the admin footer, (dashboard) when it is activated, or automatically, if it is in the mu-plugins directory.

**This WordPress plugin expand, secure, enhance, core code on /wp-admin/includes/update.php**

Development for this plugin takes place at [GitHub](https://github.com/luciano-croce/admin-footer-version-rebranded) and [Travis CI](https://travis-ci.org/luciano-croce/admin-footer-version-rebranded). [GlotPress Translations Compatible](https://translate.wordpress.org/projects/wp-plugins/admin-footer-version-rebranded).

Approved in the repository of the plugins directory on 2017-12-25
> this plugin use [Semantic Versioning](https://semver.org/) MAJOR.MINOR.PATCH

The PHP and SQL "alert system" of this plugin, **compatible with Serve Happy / Site Health specifications**, is based (at a glance) on the well-known red, orange, green, of "traffic light" method, so that any type of user is able to immediately identify, by means of a "visual color" warning, the necessary notices, even without having any specific technical preparation.

The final purpose of this "conceptual" plugin is to demostrate that is possible, whit a simple re-coding, and a good idea, to standardize, uniformizing, improve, requalifying, some aspects of WordPress that are put in the oblivion.
= Expand =
Necessary

* Show version (rebranded) in admin Update Footer area.
* Centralized dashboard messages for all declared installations.
* Centralized development / deployments for declared installations.
* Same code work with all declared versions of WP
* Same code work with all declared versions of PHP
* Same code work with all declared versions of SQL
* Same code work from WP 2.3+ to 5.1+ ~ 5.2-alpha
* Support Single / Multiuser (MU) / Multisite (MS) releases.
* Compatible with mu-plugins directory.
* Work in mu-plugins directory.
* Ready to the Famous 5 Minute Installation.
* Work with first step installation setup.
* NEW - Site Health / Serve Happy (specifications) compliant.
* NEW - System Overview of PHP / MySQL / MariaDB version used.
* NEW - Show System Overview in admin Footer Text area.
* NEW – System Overview show obsolete PHP versions.
* NEW – System Overview show obsolete SQL versions.
* FUTURE - Database Overview of resources usage (in development).
* FUTURE - Memory Overview of resources usage (in development).
* FUTURE - System Overview in Admin Bar / Toolbar (in development).
* FUTURE - System Overview recommendations (in development).
* FUTURE - Recommendations in Hello Dolly style (in development).
* FUTURE - System Overview control panel settings (in development).
= Enhance =
Includes

* Visual color messages for: development, upgrade, latest, previous.
* Visual color messages: deprecated, acceptable, supported, current.
* Visual color messages for: legacy, oldest, old, WordPress state.
* Visual color messages for: slow, fast, PHP and SQL state.
* Visual color messages for: high, medium, low, database usage state.
* Visual color messages for: high, medium, low, memory usage state.
* Introduces black, blue, green color concept not included in core.
* Introduces previous version concept not included in core.
* Introduces previous development concept not included in core.
* Concept of the previous version is for users of WP 4.9+
* Concept of the previous development is for developers of WP 4.9+
* Checking PHP / SQL / WP requirements before plugin activation.
* Compatibility with GlotPress translations.
* Translation files .mo are included in distro package.
* Automatic loading of included translation files when activated.
* Translation files work with online and offline installations.
= Secure =
Provides

* Disabled for all users except admins, ability to visualize version.
* Disabled version visualization for all users except admins.
* Only roles that manage options or core can update WordPress.
* Corrected the missing user role code for core updates.
* Corrected the missing user role code for development updates.
* Secured the user roles with capability can update WordPress.
* Only manage_options capability roles (WP 2.3+ to 2.9+).
* Only update_core capability roles (WP 3.0+ to 5.1+ ~ 5.2-alpha).
* System Overview obfuscated for non manage_options capability.
* System Overview obfuscated for non update_core capability.
= Table of classifications =
WordPress

 * Legacy version 2.3+ to 2.6+ - red color highlighted
 * Oldest version 2.7+ to 2.9+ - red color highlighted
 * Old version 3.0+ to 3.6+ - red color highlighted
 * Supported version 3.7+ to 4.8+ - orange color highlighted
 * Latest previous version 4.9+ - blue color highlighted
 * Latest available version 5.0+ - black color highlighted
 * Latest available version 5.1+ - green color highlighted
 * Development version 5.2-alpha - orange color highlighted

PHP

 * 5.2+ slow - deprecated version red color highlighted
 * 5.3+ slow - deprecated version red color highlighted
 * 5.4+ slow - deprecated version red color highlighted
 * 5.5+ slow - deprecated version red color highlighted
 * 5.6+ slow - acceptable version orange color highlighted
 * 7.0+ fast - end-of-life version red color highlighted
 * 7.1+ fast - supported version black color highlighted
 * 7.2+ fast - previous version blue color highlighted
 * 7.3+ fast - current version green color highlighted
 * 7.4+ fast - development version orange color highlighted

(PHP [end-of-life](https://secure.php.net/supported-versions.php) cycle)

MySQL

 * 5.0+ oldest version red color highlighted -- MyISAM
 * 5.1+ old version red color highlighted -- MyISAM
 * 5.5+ acceptable version orange color highlighted -- InnoDB
 * 5.6+ previous version blue color highlighted -- InnoDB
 * 5.7+ current version green color highlighted -- Percona
 * 8.0+ development version orange color highlighted -- Percona

MariaDB

 * 5.5+  acceptable version orange color highlighted -- XtraDB
 * 10.0+ acceptable version orange color highlighted -- XtraDB
 * 10.1+ supported version black color highlighted -- InnoDB
 * 10.2+ previous version blue color highlighted -- InnoDB
 * 10.3+ current version green color highlighted -- InnoDB
 * 10.4+ development version orange color highlighted -- InnoDB

Memory

 * 75% high memory usage - red color highlighted
 * 50% medium memory usage - orange color highlighted
 * 25% low memory usage - green color highlighted

(in development)
= Tips =
A neat trick, is to put this single file admin-footer-version-rebranded.php (not its parent directory) in the /wp-content/mu-plugins/ directory (create it if not exists) so you won't even have to enable it, and will be loaded by default, also, since first step installation of WordPress setup!

Also, for translation functionality, put all files of the single languages (admin-footer-version-rebranded-en_US.mo for example) that you need (not its parent directory) in the /wp-content/mu-plugins/ directory (create it if not exists) and will be loaded by default, they also, since first step installation of WordPress setup!

Note that mu-plugins functionality is available since WP 2.8+ or greater and is not present in WP 2.7+ or previous.
= About it =
The code of this plugin is not written with a PHP framework, but manually, with a simple PHP editor compatible UTF-8 without BOM, and Unix LF. To avoid code corruption, do not edit it with WordPress embedded editor, or with any specifications incompatible editor. This author is exonerated from any responsibility or damage (directly or indirectly) caused and due to the use of this bad practice.
> super light secure and fast plugin easy on server resources
= About me =
Admin Footer Version (rebranded) is developed by Luciano Croce, 13-years "officially" WordPress Plugins &amp; Themes Developer Senior, Co-Author of the plugin Classic Editor, polyglot (based on English, French, Spanish, German, Portuguese, Italian, Ligurian), GTE en_GB &amp; en_CA &amp; en_ZA &amp; LIJ, PTE and translator for Plugins &amp; Themes in more languages, PTE for Italian WordPress.org &amp; Plugins &amp; Themes Directory, Local Manager of Ligurian Language Community for WP LIJ, Validator English (UK) for WordPress.com, book author of TRUE DOS (the dark side of its history from the dark side of its users) Code Tweaker &amp; Bug Hunter, Security Mechanic &amp; WPMU Lover, Freelancer &amp; Volunteer.
> this is my best very useful and safe conceptual plugin of ever
= Translation =
Available in 25 langs 4 formal/informal variants, and others in becoming.

Translated by [Luciano Croce](https://profiles.wordpress.org/luciano-croce) in: Australian, Belgian FR, Brazilian, Canadian EN, Canadian FR, Catalan, Chilean, Colombian, English UK, French, German, Italian, **Ligurian**, New Zealander, Peruvian, Portuguese, Spanish, Swiss DE, Venezuelan.

Translated by [Dan Caragea](https://profiles.wordpress.org/dancaragea) in Romanian.

Translated by [Knut Sparhell](https://profiles.wordpress.org/knutsp) in [Norwegian](https://nettvendt.no/blog/2019/sidebunnversjon-for-admin-relansert-wordpress-org).

All contributions are appreciated and credited!

**Translators**, to test strings and partial translations use the plugin [Force Update Translations](https://wordpress.org/plugins/force-update-translations).
= Acknowledgements =
Thanks for corrections, suggestions, translation approvals to:

Team

 * Català / Catalan - València / Valencia -- ca
 * Deutsch (Schweiz) / German (Switzerland) -- de_CH
 * Deutsch / German -- de_DE
 * English (Australia) -- en_AU
 * English (Canada) -- en_CA
 * English (UK) -- en_GB
 * English (New Zealand) -- en_NZ
 * English (South Africa) -- en_ZA
 * Español de Argentina / Spanish (Argentina) -- es_AR
 * Español de Chile / Spanish (Chile) -- es_CL
 * Español de Colombia / Spanish (Colombia) -- es_CO
 * Español de Costa Rica / Spanish (Costa Rica) -- es_CR
 * Español / Spanish (Spain) -- es_ES
 * Español de Guatemala / Spanish (Guatemala) -- es_GT
 * Español de México / Spanish (Mexico) -- es_MX
 * Español de Perú / Spanish (Peru) -- es_PE
 * Español de Venezuela / Spanish (Venezuela) -- es_VE
 * Français de Belgique / French (Belgium) -- fr_BE
 * Français du Canada / French (Canada) -- fr_CA
 * Français / French (France) -- fr_FR
 * Nederlands (België) / Dutch (Belgium) -- nl_BE
 * Nederlands / Dutch -- nl_NL
 * Norsk bokmål / Norwegian (Bokmål) -- nb_NO
 * Polski / Polish -- pl_PL
 * Português do Brasil / Portuguese (Brazil) -- pt_BR
 * Português / Portuguese (Portugal) -- pt_PT
 * Română / Romanian -- ro_RO
 * Русский / Russian -- ru_RU
 * Svenska / Swedish -- sv_SE
 * Zenéize / Ligurian (Genoese) -- lij

This is the list of team that have helped me in language translations.

People

 * [Alin Marcu](https://profiles.wordpress.org/deconf) deconf
 * [Angelika Reisiger](https://profiles.wordpress.org/lageek) lageek
 * [Annabelle W](https://profiles.wordpress.org/yayannabelle) yayannabelle
 * [Braulio Aquino](https://profiles.wordpress.org/braulioaquino) braulioaquino
 * [Bossinger](https://profiles.wordpress.org/bossinger) bossinger
 * [Chantal Coolsma](https://profiles.wordpress.org/chantalc) chantalc
 * [Charles E. Frees-Melvin](https://profiles.wordpress.org/thee17) thee17
 * [Cubells](https://profiles.wordpress.org/cubells) cubells
 * [Dan Caragea](https://profiles.wordpress.org/dancaragea) dancaragea
 * [Daniel James](https://profiles.wordpress.org/danieltj) danieltj
 * [Didier Wolforg](https://profiles.wordpress.org/) wolforg
 * [Felipe Elia](https://profiles.wordpress.org/felipeelia) felipeelia
 * [Fernando Tellado](https://profiles.wordpress.org/fernandot) fernandot
 * [François-Xavier Bénard](https://profiles.wordpress.org/fxbenard) fxbenard
 * [Fredrik](https://profiles.wordpress.org/elbogen) elbogen
 * [Garrett Hyder](https://profiles.wordpress.org/garrett-eclipse) garrett-eclipse
 * [Gary Jones](https://profiles.wordpress.org/garyj) garyj
 * [Hedberg Chrille](https://profiles.wordpress.org/ctjernqvist) ctjernqvist
 * [Hugh Lashbrooke](https://profiles.wordpress.org/) hlashbrooke
 * [Jb Audras](https://profiles.wordpress.org/audrasjb) audrasjb
 * [Jean-Francois Arseneault](https://profiles.wordpress.org/jfarsen) jfarsen
 * [Jeroen Rotty](https://profiles.wordpress.org/jeroenrotty) jeroenrotty
 * [Johannes Jülg](https://profiles.wordpress.org/timse201) timse201
 * [Jordi Cuevas](https://profiles.wordpress.org/jordicuevas) jordicuevas
 * [Konstantin Obenland](https://profiles.wordpress.org/obenland) obenland
 * [Knut Sparhell](https://profiles.wordpress.org/knutsp) knutsp
 * [Mia Levesque](https://profiles.wordpress.org/mialevesque) mialevesque
 * [Naoko Takano](https://profiles.wordpress.org/nao) nao
 * [Nilo Velez](https://profiles.wordpress.org/nilovelez) nilovelez
 * [Pascal Birchler](https://profiles.wordpress.org/swissspidy) swissspidy
 * [Pascal Casier](https://profiles.wordpress.org/casiepa) casiepa
 * [Pedro Mendonça](https://profiles.wordpress.org/pedromendonca) pedromendonca
 * [Petya Raykovska](https://profiles.wordpress.org/petya) petya
 * [Presskopp](https://profiles.wordpress.org/presskopp) presskopp
 * [Ross McKay](https://profiles.wordpress.org/webaware) webaware
 * [Stephen Edgar](https://profiles.wordpress.org/netweb) netweb
 * [Tor-Bjorn Fjellner](https://profiles.wordpress.org/tobifjellner) tobifjellner
 * [Yui](https://profiles.wordpress.org/fierevere) fierevere
 * [Xavi Ivars](https://profiles.wordpress.org/xavivars) xavivars

This is the list of people that have helped me in language translations.
= Credits =
This plugin incorporates a little code portion of the WordPress files update.php and hello.php that is copyrighted by Automattic and released under the terms of GPLv2 or later license. This little code portion was modified and redistributed under the same terms of GPLv2 or later WordPress license, so that could be patched and extended, to meet the necessary requirements for its functions.
= Privacy =
This plugin does not collect or store any user related data or personally identifying information, does not set any cookies, and it does not connect to any third-party websites. It only uses functionality that is available in WordPress. In those terms, it does not affect your website users privacy in any way.
= GDPR =
This plugin does not collect or store any user related data or personally identifying information, but does not do anything to make your site less/more GDPR compliant. I have done my best to ensure that is 100% GDPR compliant, but I can't guarantee anything. To determine if your site is 100% GDPR compliant, please consult a lawyer.
==Screenshots==
1.  Screenshot 1  of 10 -- Security
2.  Screenshot 2  of 10 -- PHP & MySQL Overview
3.  Screenshot 3  of 10 -- Update to latest Version
4.  Screenshot 4  of 10 -- Latest Version
5.  Screenshot 5  of 10 -- Development Version
6.  Screenshot 6  of 10 -- Previous Version
7.  Screenshot 7  of 10 -- Supported Version
8.  Screenshot 8  of 10 -- Old Version
9.  Screenshot 9  of 10 -- Oldest Version
10. Screenshot 10 of 10 -- Legacy Version
==Changelog==
Approved in plugins directory 2017-12-25

Detailed changes are available on [GitHub](https://github.com/luciano-croce/admin-footer-version-rebranded/blob/master/CHANGES.md)

Full changelog are available in [changelog.txt](https://plugins.trac.wordpress.org/browser/admin-footer-version-rebranded/trunk/changelog.txt)
= Future Version =
Release Date: in becoming

* Adds placeholders support -- Thx Knut Sparhell
* Preemptive support for WP 5.3-alpha
* FIX - Screen readers -- removed title attributes
* NEW - Recommendations in Hello Dolly style
* NEW - Recommendations show requirements
* NEW - Adds Overview in Admin Bar / Toolbar
* NEW - Overview show DB / Memory usage
* NEW - Overview show DB / Memory details
* NEW - Overview show obsolete SQL versions
* NEW - System Overview control panel settings
= 1.1.5 =
Release Date: in becoming

* Site Health / Serve Happy specs compliant
* NEW - Adds Overview in admin Footer Text
* NEW - Overview show PHP / SQL version used
* NEW - Overview show obsolete PHP versions
= 1.0.5 =
Release Date: February 14, 2019

* Special **Saint Valentine** Edition &#10084;
* Compatible with WordPress 5.1 or later
* Preemptive support for WP 5.2-alpha
* Work with WordPress 2.3+ to 5.1+ ~ 5.2-alpha
* Work with MySQL 5.5+ to 5.7+ ~ 8.0 or later
* Work with MariaDB 5.5+ to 10.3+ ~ 10.4 or later
* Adds Romanian translation -- Thx Dan Caragea
* Adds Norwegian translation -- Thx Knut Sparhell
* Adds support for WP 2.4-bleeding testing
* Adds white color support in WP 2.8+ ~ 2.9+
* Improved translation strings in main file
* Reduced translation strings in main file
* NEW - Dismiss useless Core Update Nag
* UPD - Adds translators comments - i18n ~ l10n
* UPD - Updated included .mo translation files
* FIX - HTML coding issues in W3C validation
* FIX - Minor CSS color type issue in WP 2.9+
* FIX - Minor CSS color type issue in WP 2.8+
* FIX - Minor issue to work correctly with WP 2.7+
* FIX - Minor issue to work correctly with WP 2.3+
==Upgrade Notice==
= 1.0.4 =
Recommended [UPDATE] WP 2.3+ to 5.1+ ~ 5.2-alpha (2019-02-14) 1.0.5 Special Saint Valentine Edition &#10084; Introduces System Overview of PHP and SQL that show the obsolete versions 1.0.4 Introduces previous version concept not in core 1.0.3 Replaced spaces with tabulations to reduce size 1.0.2 Introduces legacy, oldest, old, and supported version concept 1.0.1 First public release