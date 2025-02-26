=== Shipping Class By Category For Woocommerce ===
Contributors: ah72king
Donate link: https://ahsandev.com/
Tags: shipping class, assign shipping class by category, bulk edit
Requires at least: 3.0.1
Tested up to: 6.6
Tested Woocommerce up to: 9.1
Requires PHP: 7.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily assign WooCommerce shipping classes to products by category, saving time and avoiding bulk edit limitations.

== Installation ==

= Minimum Requirements =

* Woocommerce Plugin must be installed and active.
* PHP 7.1 or greater is required (PHP 8.0 or greater is recommended)
* MySQL 5.6 or greater, OR MariaDB version 10.1 or greater, is required.

= Automatic installation =

Automatic installation is the easiest option -- WordPress will handle the file transfer, and you won’t need to leave your web browser. To do an automatic install of Shipping Class By Category For Woocommerce, log in to your WordPress dashboard, navigate to the Plugins menu, and click “Add New.”

In the search field type “Shipping Class By Category For Woocommerce” then click “Search Plugins.” Once you’ve found us, you can view details about it such as the point release, rating, and description. Most importantly of course, you can install it by clicking “Install Now,” and WordPress will take it from there.

= Manual installation =

Manual installation method requires downloading the Shipping Class By Category For Woocommerce plugin and uploading it to your web server via your favorite FTP application. The WordPress codex contains [instructions on how to do this here](https://wordpress.org/support/article/managing-plugins/#manual-plugin-installation).

== Detail Description ==

= General =

Shipping Class By Category For WooCommerce allows you to assign shipping classes to products based on their category in just a few clicks. Instead of manually editing each product or facing the limitations of bulk editing (which often fails with large product counts), this plugin lets you assign shipping classes efficiently, even for stores with thousands of products.

= Key Features: =

Assign a shipping class to all products within a selected category.
Option to display the shipping class column in the WooCommerce products table in the admin panel.
AJAX-based batch processing ensures your server won’t time out, even with large product catalogs.

= Why Use This Plugin? =
WooCommerce's built-in bulk editing feature is limited to 999 products and may cause server crashes on low-memory setups. Shipping Class By Category For WooCommerce solves this issue by using batch processing through AJAX, ensuring smooth operation even for large stores. This plugin automates the assignment process, allowing you to apply shipping classes to entire categories, saving hours of manual work.

= Settings =

Plugin give you an option to show shipping class assigned to product on products table in wordpress admin panel products listing page

== Screenshots ==
1. Main Assignment Screen
2. Settings

== Changelog ==

= 1.0.2 =
JavaScript and Style css is enqueued.

= 1.0.1 =
* Shipping Class assignment using Batch (Ajax basis) so server timeout do not happen on low memory servers if there are too many products in a category.

= 1.0.0 =
* Plugin is introduced.

== Frequently Asked Questions ==

= If I have to assign a shipping class to all the products in category but for few products i want a different shipping class =  
Yes, you can do that first assign a shipping class (which you want on all the products) to the category , then go to each of those few product edit page in Woocommerce where you want different shipping class and assign them individually.

= Can i assign a shipping class to variation =  
No, Currently that functionality is not given in this version. May be in Future.