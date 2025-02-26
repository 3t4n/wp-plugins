=== Woocommerce Product Category for Each New User ===
Contributors: ABI Web Design
Tags: product category, new user, woocommerce product category
Requires at least: 3.0 
Requires PHP: 5.3
Tested up to: 4.7.4
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automatically creates a product category for each new user.

== Description ==
This simple plugin just creates a product category for each new user.

= Features Included =
* Checking if a product category is already set for the user.
* Creates a product category for each new user.


= Usage =
* Once install the plugin go to plugins list and activate it.

= Problems and Support =
To get fastest response use the support page in the plugin area on WordPress.org

= Please Review! =
I would love some feedback. I will try and respond to any issues you might have.

= Comments, Feedback and Request Features =
To send any suggestions, comments, or feedback about this plugin send a [mail to us]
(martin@abi-webdesign.com). 

== Installation ==

1. Upload the plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enjoy it.


== Frequently asked questions ==

1. Why would I need it?
    * It is helpful if you plan developing associated with the clients products.
    
2. Does this plugin create product categories for all users?
    * No. You will probably not need admins to have their own categories. The plugin creates categories only for users with role "Customer".
    If you need it to work with all roles find the following code in woocommerce-product-category-for-each-new-user.php: "$blogusers = get_users( 'orderby=nicename&role=customer' );" and replace it with this one "$blogusers = get_users( 'orderby=nicename' );"
    
3. What is the name of the category of each user?
    * Both name and slug are the user's nicename.

	
== Changelog ==

= 1.1 =
Changed for Wordpress Plugin Directory compliance.

= 1.0 =
First Release.

== Upgrade Notice ==

There is no need to upgrade just yet.

== Screenshots ==

Not available


