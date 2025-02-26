=== ACF For Dokan ===
Plugin Name: ACF For Dokan
Plugin URI: https://wordpress.org/plugins/acf-for-dokan/
Author: krazyplugins
Author URI: http://krazyplugins.com/
Contributors: krazyplugins
Tags: acf, advanced custom fields, dokan, multivendor, marketplace
Donate link: https://krazyplugins.com/plugin-support/
Requires at least: 5.1
Tested up to: 6.4
Requires PHP: 5.6
Stable tag: 2.0
Copyright: (c) 2022 KrazyPlugins (krazyplugins@gmail.com)
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Allows admin to create new custom field for vendor add/edit product in vendor dashboard.

== Description ==

= Must have plugin when working with Dokan =

Create a custom field for vendors, exactly like you did for admins, and make it accessible from their dashboard to save development time.

> **This improve our marketplace running on Dokan**
> ~[maxsico](https://wordpress.org/support/topic/this-improve-our-marketplace-running-on-dokan/)

Admin can easily create custom fields for vendors while he is creating new products. While creating a custom field using Advance Custom Field, admin needs to select 'Vendor Edits Allowed' so that vendor can use that custom field. 

Right now the supported field types of ACF are text, textarea, number, url, select, checkbox, radio, file, email, WYSIWYG editor. The WYSIWYG editor will only work in edit product pages. The file ACF field type will only work in edit product pages.

You can use ACF functions like the_field, get_field to display the custom field value for the product.

<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLer1Itx6Jd4Haq8FGa5wN09ImaB0ku9AK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

#### Useful Links ####
* [**Documentation & How to**](https://krazyplugins.com/docs/acf-for-dokan-guide/?utm_source=wporg&utm_medium=organic&utm_campaign=readme "**Documentation & How to**")

The plugin will work with ACF and Dokan free as well as PRO versions.

[ACF For Dokan PRO](https://krazyplugins.com/product/acf-for-dokan-pro/?utm_source=readme&utm_medium=wporg&utm_campaign=free)
• Supported multiple ACF Field groups
• Conditional logic for product add/edit custom fields
• Ajax search for select field in product add/edit form
• Repeater field for product
• Gallery field for product
• Relationship field for product
• Taxonomy field for product
• Google Map field for product
• Dokan bookings - bookable products
• Create custom fields for vendor registration form as well as order post type
• Vendor can update it from edit account page
• Vendor can update order meta from edit order page in vendor dashboard
• Supported field types for vendor and order are text, textarea, number, url, select, email, checkbox, radio

> **I improved my project by 1000%**
> "Excellent plugin. I love it!, This is an essential plugin when using Dokan and ACF in its free or Pro version, but it is even better if you buy the version of ACF for Dokan Pro. Its support is spectacular." ~[@alaid](https://wordpress.org/support/topic/i-improved-my-project-by-1000/)

Pro Plugin Demo : <a href ="https://krazyplugins.com/demo/" target="_blank">View</a>

== 👉 Premium WooCommerce Plugin ==
* [ACF For WooCommerce](https://krazyplugins.com/product/acf-for-woocommerce/?utm_source=readme&utm_medium=wporg&utm_campaign=free)
* [ACF For WC Vendors Pro](https://krazyplugins.com/product/acf-for-wc-vendors-pro/?utm_source=readme&utm_medium=wporg&utm_campaign=free)
* [ACF For WooCommerce Variation](https://krazyplugins.com/product/acf-for-woocommerce-variation/?utm_source=readme&utm_medium=wporg&utm_campaign=free)
* [YITH Wishlist For Dokan](https://krazyplugins.com/product/yith-wishlist-for-dokan/?utm_source=readme&utm_medium=wporg&utm_campaign=free)

 = Trusted by many people just like you! =
ACF For Dokan is used on over 900+ websites and has received over 20 5-star reviews just like this one:

> **This plugin basically saved us**
> ~[@pinkpeach](https://wordpress.org/support/topic/this-plugin-basically-saved-us/)


== Installation ==

1. Copy the `acf-for-dokan` folder into your 'wp-content/plugins' folder.
2. Activate the ACF For Dokan plugin via the plugins admin page.
3. Create a new field via ACF and select the 'Vendor Edits Allowed'.

== Frequently Asked Questions ==

= How to use =
Admin can easily create custom fields for product. Admin will have an extra setting to allow Vendor to Edit option. If this is enabled, vendor can add/update the custom field from vendor dashboard.

= How do I display the field on the Product Page? =

You can add the below code in the active theme’s functions.php file:

`add_action( 'woocommerce_product_meta_end', 'acf_dokan_display_product_fields' );
function acf_dokan_display_product_fields(){
	echo '<div class="custom_fields"><span class="meta_title"> Product Code: '; // change Product Code label to the field label
		the_field( 'product_code' ); // change product_code to field slug
	echo '</div>';
}`

= Is there any documentation available? =
Yes, you can access [it from here](https://krazyplugins.com/docs/acf-for-dokan-guide/)

= Is there any way to test premium feature without purchsing ACF For Dokan PRO? =
Yes, you can try [ACF For Dokan PRO live demo](https://krazyplugins.com/demo/) to play with all features.


== Screenshots ==

1. It shows how you can enable custom field for add/edit product in vendor dashboard.
2. It shows list of all the fields enabled for vendor to add/edit.
3. It shows fields enabled from ACF in vendor dashboard add product popup.
4. It shows fields enabled from ACF in vendor dashboard edit product page.

== Changelog ==

= 2.0 =
* Added support of Freemius

= 1.3 =
* Added support of custom field require validation in edit product form

= 1.2 =
* Added support of radio and file ACF field type

= 1.1 =
* Added support of checkbox ACF field type

= 1.0.2 =
* Fixed foreach error

= 1.0 =
* Initial Release.
