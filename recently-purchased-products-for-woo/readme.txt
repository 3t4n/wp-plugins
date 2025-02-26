=== Recently Purchased Products For Woo ===

Author:            worldweb
Contributors:      worldweb
Plugin Name:       Recently Purchased Products For Woo
Plugin URI:        https://wordpress.org/plugins/recently-purchased-products-for-woo/
Tags:              recent purchases, purchases, last purchases, recent orders, woocommerce
Author URI:        https://worldwebtechnology.com
Requires at least: 5.8
Requires PHP:      7.4
Tested up to:      6.6.1
Stable tag:        1.1.3
License:           GPLv2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Version:           1.1.3

Display Recently Purchased Products For Woocommerce using Widget and Shortcode

== Description ==

[youtube https://www.youtube.com/watch?v=QwJKw7KI_3k]

[Video](https://www.youtube.com/watch?v=QwJKw7KI_3k)  |  [Docs](https://recentpurchase.worldwebtechnology.com/document/)  |  [Support](mailto:help.worldweb@gmail.com)  | [Demo](https://recentpurchase.worldwebtechnology.com/) | [Website](https://www.worldwebtechnology.com/)

Display Recently Purchased Products for <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">Woocommerce</a>. Plugin supports Widget and Shortcodes to display recently purchased products.

**Main Features**
* Shortcode with list, grid and slider options.
* Widget to display lists in sidebar.
* Define how many products you want to display.

**How to use The Shortcode**

You can use the shortcode to dispaly list of recently purchased products. Here's an example of how you can show the recently purchased 6 products with grid view:

`[recently_purchased_products limit="8" view="grid" category="hide" grid_cols="4" img_size="150" img_type="product" cart="Show" rating="show" customer_info="show"]`

Below are the shortcode supported options:

* title: Display the title on top of listing. Default is empty.
* limit: Used to limit the number of products. Default is 5.
* order: Order of listing either ASC or DESC. Default is DESC.
* img: Show or hide the product image in listing. Default is Show.
* img_size: Specify image size 50 if you want 50x50 image Default is 100.
* img_type: Image type like product image / customer avatar image, Option are product and avatar, Default is product.
* date: Show or hide product date. Default is Show.
* price: Show or hide the product price. Default is Show.
* category: Show or hide the product category. .
* cart: Show or hide the Add to cart button. Default is Hide.
* rating: Show or hide the Product rating. Default is Hide.
* view: Define the view layout. Option are grid and list. Default is list.
* grid_cols: Number of grid columns will show, if grid view is set Default is 4.
* customer_info: Show customer information with the recent product, Default is show and it will display Full Name, 'first_name' is for First Name, 'last_name' is for Last Name.

Here's an example of how you can show the recently purchased 6 products with Slider view:

`[recently_purchased_products_slider title=""  limit="6" category="show" cart="Show" rating="hide" order="DESC"  img="show" img_size'="150"  img_type="product" customer_info="first_name" date="show" price="show"  slidestoshow="4" slidestoscroll="1" autoplay="true" dots="true" arrow="true" infinite="true"]`

Below are the shortcode supported options:

* title: Display the title on top of Slider. Default is empty.
* limit: Used to limit the number of products. Default is 5.
* category: Show or hide the product category. Default is Show.
* cart: Show or hide the Add to cart button. Default is Hide.
* rating: Show or hide the Product rating. Default is Hide.
* order: Order of listing either ASC or DESC. Default is DESC.
* img: Show or hide the product image in Slider. Default is Show.
* img_size: Specify image size 50 if you want 50x50 image.
* img_type: Image type like product image / customer avatar image, Option are product and avatar, Default is product.
* customer_info: Show customer information with the recent product, Default is show and it will display Full Name, 'first_name' is for First Name, 'last_name' is for Last Name.
* date: Show or hide product date. Default is Show.
* price: Show or hide the product price. Default is Show.
* slidestoshow: Show number of slide visible. Default is 1.
* slidestoscroll: Number of slide scroll on next/prev slide. Default is 1.
* autoplay: Autoplay slider. Option are true and false Default is true.
* dots: Show dots for the slider, Option are true and false, Default is true.
* arrow: Show arrow for the next and previous slide. Option are true and false, Default is true.
* infinite: Scroll infinite loop for the slider. Option are true and false, Default is true.


**Widget: Recently Purchased Products For Woocommerce**

Below are the Widget supported options

* Title: Display the title on top of Widget.
* Image: Show or hide the product image in Widget.
* Image Size: Specify image size 50 if you want 50x50 image.
* Image Type: Image type like product image / customer avatar image, Default is product.
* Number of products to show: Used to limit the number of products.
* Date: Show or hide product date. Default is Show.
* Price: Show or hide the product price. Default is Show.
* Category: Show or hide the product category. Default is Show.
* Product Rating: Show or hide the Product rating.
* Order: Order of listing either ASC or DESC. Default is DESC.
* Add to Cart Button: Show or hide the Add to cart button.
* Customer Info: Show customer information with the recent product, Default is show and it will display Full Name, 'first_name' is for First Name, 'last_name' is for Last Name.
* Show in Slider: Show or hide the Widget as Slider.
* Slider Dots: Show dots for the slider.
* Slider Arrow: Show arrow for the next and previous slide.
* Auto Play: Show Slider as Autoplay slider.
* Slider Infinite: Scroll infinite loop for the slider. Default is true.

== Installation ==

1. Unzip the downloaded zip file
2. Upload the included folder to '/wp-content/plugins' directory of your WordPress installation
3. Activate the plugin via the WordPress Plugins page
4. Now, You will see settings link on plugin page. Click on it then you wil redirect to the settings page of plugin.

== Screenshots ==

1. List of Recently Purchased Products with Grid View
2. List of Recently Purchased Products with List View
3. Slider view of Recently Purchased Products
4. Widget view of Recently Purchased Products in sidebar
5. Backend Side Elementor Widget
6. Backend Side Elementor Widget Options
7. Backend Side Elementor Widget Options for Slider View
8. Front Side Elementor Widget Slider View
9. Front Side Elementor Widget Grid View
10. Front Side Elementor Widget List View

== Frequently Asked Questions ==

= How to display grid view instead of list? =

Put <code>view="grid"</code> in the shortcode.

= How it's getting products from orders? =

Plugin will get only first products from each orders and display it.

= Will it work for multiple purchased items in single order? =

Yes, in the version 1.0.4, we have added feature to allowed for multiple items in single order.

= How can I showcase recently purchased products? =

You can showcase the recently purchased products using a shortcode and a Widget.

= Is it possible to customize the properties or parameters of the shortcode? =

Yes, the shortcode comes with numerous pre-built attributes that you can modify.

= Can I utilize the shortcode in Elementor? =

Yes, you can display the products using the shortcode in Elementor.

= Can I use this plugin on multi-site WordPress? =

Absolutely, this plugin fully supports multi-site WordPress installations.

== Changelog ==

= 1.1.3 (Aug 22, 2024) =
* Minor bug fixes.

= 1.1.2 (Aug 21, 2024) =
* Minor bug fixes.

= 1.1.1 (Jul 18, 2024) =
* Demo and document update.

= 1.1.0 (Jul 10, 2024) =
* Checked with the Latest WordPress version 6.5.5

= 1.0.10 (May 14, 2024) =
* Bugs and Deprecations fixes

= 1.0.9 (May 06, 2024) =
* Shortcode attributes updated for the Customer Info (First Name, Last Name, Full Name)
* Minor bug fixes

= 1.0.8 (May 01, 2024) =
* Shortcode attributes updated
* Minor bug fixes

= 1.0.7 (Jan 30, 2024) =
* New Feature Update: A Recent Purchases Widget for Elementor has been introduced to showcase recently bought products.
* Minor bug fixes

= 1.0.6 (Nov 21, 2023) =
* Fixed: Minor issues.

= 1.0.5 =
* Fixed: Admin notice about "Requires WooCommerce plugin WooCommerce"

= 1.0.4 =
* Fixed: Desktop design issues for Slider
* Fixed: Responsive design issues for Widget
* Fixed: Multiple products items from a single order aren't showing in Widget & Slider
* Fixed: Design issue when slider set in Widget
* Displayed default image when no image was selected in the product
* Added more options as attributes Grid/List View shortcode
* Added Auto-play option as an attribute in Slider shortcode
* Improved Slider & Widget design

= 1.0.3 =
* Added new shortcode for slider.
* Added slider option in widget.
* Resolved Responsive issue and Layout Misalignment.
* Show product category on top of the product title.
* Added customer info, category, image type (product image / customer image), rating, grid columns, display cart.

= 1.0.2 =
* Check WordPress Version 6.1 compatibility.

= 1.0.1 =
* Tested with WordPress 5.8
* Tested with WooCommerce 5.5.2

= 1.0 =
* Initial release.