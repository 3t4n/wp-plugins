=== Footer Copyright ===
Contributors: zaforiqbal
Donate link: https://zaforiqbal.com 
Tags: copyright, shortcode
Requires at least: 4.6
Tested up to: 6.5.2
Stable tag: 1.2.1
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A simple plugin for website footer to display copyright symbol, text, year and company name in different order. Year gets automatically updated. 

== Description ==

This plugin shortcodes displays Company name, copyright text, symbol and update the copyright year automatically every year.


**Example**
1. [gigatech_copy_rights] **Copyright © 2023 Site Title. All rights reserved.**
2. [gigatech_copy_rights company="Your Company Name." start_year="2010"] **Copyright © 2010–2023 Your Company Name. All rights reserved.**
3. [gigatech_copy_rights company="Your Company Name."] **Copyright © 2023 Your Company Name. All rights reserved.**
4. [gigatech_copy_company company="Your Company Name"] **© Your Company Name 2023**
5. [gigatech_copy_company] **© Site Title 2023**
6. [gigatech_company_year company="Your Company Name"] **Your Company Name © 2023**
7. [gigatech_company_year] **Site Title © 2023**
8. [gt_cp_icon] **©**
9. [gt_year] **20XX**
10. [gt_site_name] **Site Title**


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin files to the `/wp-content/plugins/footer-copyright` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the shortcodes to display copyright in different formats


== Frequently Asked Questions ==

= Who should use Footer Copyright? =

Anyone who has a WordPress website can use Footer Copyright to keep the site always update in terms of Copyright year and text. 

= Do I need to have coding skills to use Footer Copyright? =

Absolutely not. Just place the shortcode in your WordPress website footer widget.

= Will it work in my pages or posts? =

Yes. 

== Changelog ==

= 1.2 =
* 3 more shortcodes added 
* [gt_cp_icon], [gt_year], [gt_site_name]  

= 1.0 =
* Initial version
