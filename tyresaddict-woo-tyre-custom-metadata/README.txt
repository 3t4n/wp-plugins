=== TyresAddict - Tyre Custom Metadata for WooCommerce ===
Contributors: tyresaddict, mikedin
Tags: tyres, tyre search, automotive, auto parts, auto parts store, custom fields, tyre and wheel store, woocommerce search, custom tyre metadata
Requires at least: 4.7
Tested up to: 6.5.3
Requires PHP: 5.6
Stable tag: 2.2.11
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create custom tyre (size specification, season, vehicle, etc) and wheel metadata via MetaBox for WooCommerce Products. Show on product pages, edit.

== Description ==

This plugin support import of tyre and wheel specifications data and process it in WooCommerce Tyre shop.
You can edit tyre specifications at admin panel, Woo Product section. And this specs will shown on tyre or wheel product pages of your store.

#### Demo ####

[youtube https://www.youtube.com/watch?v=6dbQwodGSFk]

### Features ###

* Support tyre specifications in meta: season, full size like 195\60 R15 92T (and separated fields), stud, car type, suv type
* Support wheel specifications in meta: type, full size like 9x21 5x114.3 ET30 d73.1 (and separated fields)
* Separate wheel-tyre meta editors in Woo catgories
* Show on product page of WooCommerce after product info (tested on StoreFront)
* Do not show this data if fields is not filled (you can sell not only tyres)
* Show copy in Additional info
* Convert Load and Speed indexes to human-readable format (kg, km\h)
* Native CSV import support, use meta:field and this data will be used

### [PRO Features](http://b2b.tyresaddict.com/platforms/woocommerce/tyre-custom-metadata) ###

* Additional tyre fields: RunFlat, XL, RxxC
* Additional data types: SUV tyres (A/T, H/T, M/T, HP), Moto tyres, Origin etc...
* EU Label support: field and showing
* Tyre brand and wheel brand logos
* Options for display tyre info at shop and category pages, at product page
* Autofill for brands and models in wp-admin

#### Required Plugins ####

* WooCommerce
* Meta Box


== Installation ==

Requires WooCommerce and Meta Box

1. Install the plugin either via the WordPress.org plugin repository or by uploading the files to your server.
2. Activate the plugin from Plugins page.


== Screenshots ==

1. Edit tyre / product
2. Custom tyre fields at front-end
3. Additional info with tyre custom attributes


== Frequently Asked Questions ==

= The custom tyre or wheel info is not showing =

1. Please, check two plugins activated: WooCommerce and Metabox
2. Check working categories (tyres and wheels) in options, then check that your product is in needed category.
3. Custom fields do not show if there is no filled data in product. Just add data to fields in admin.

= Could I make tyre and wheel shop on WordPress and WooCommerce? =

Yes, of course! 
Infrastructure of WordPress is universal and more suitable for tyre shops, than most of CMS, even e-commerce oriented. 
And WP has a lot of features and plugins for customization and extend.


== Other plugins & solutions ==

For filtering WooCommerce products - Tyres
[TyresAddict - Tyre Product Filter for WooCommerce](https://wordpress.org/plugins/tyresaddict-woo-tyre-product-filter/)

For filtering WooCommerce products - Wheels
[TyresAddict - Wheel Product Filter](https://wordpress.org/plugins/tyresaddict-wheel-product-filter/)

#### If you like this plugin or you need other WooCommerce plugins for Tire and/or Wheel Shop check our page ####
  
[TyresAddict - Free & PAID solutions for WooCommerce](http://b2b.tyresaddict.com/platforms/woocommerce)
  

== Documentation ==

Full documentation is available [here](http://b2b.tyresaddict.com/platforms/woocommerce).


== Changelog ==

2.2.11

Fix admin css
Testing and update info

2.2.10

Testing and update info

2.2.8

Testing and update info

2.2.7

Testing and update info

2.2.6

Update info

2.2.4

WP version checked

2.2.2

* Readme and lang pack

2.2.0

* Improved category filters from Pro
* A lot of bugfixes from Pro
* New tyre fields
* Bugfixes for fields, js classes and actions for customize development

= 2.0.8 - Released: Jun, 15 - 2020  =

* readme & info additions

= 2.0.4 - Released: Jun, 14 - 2020  =

* Add: Wheels support
* Add: New tyre fields
* Add: Tyre/Wheel filtering in wp-admin, on frontend
* Fixes: more accurate type fields, wp-admin ui, other small fixes from Pro version
* Lang support: partial IT, ES, FR, improve textdomains and translation pipeline, improve RU

= 1.6.2 - Released: Apr, 22 - 2020  =

* Fix: text-domain & small fixes in readme

= 1.6.0 - Released: Apr, 20 - 2020  =

* Add: fields (see docs)
* Add: readme improve

= 1.4.0 - Released: Apr, 4 - 2020  =

* Fix: stable version number

= 1.2.0 - Released: Apr, 4 - 2020  =

* Add: ru_RU translation
* Small fixes not affecting the work, but include activation, so it's need to reactivate plugin

= 1.0.0 - Released: Mar, 31 - 2020  =

* Initial release

