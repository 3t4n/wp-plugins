=== NM Gift Registry and Wishlist Lite ===
Contributors: nmerii
Tags: wishlist, gift registry, wedding, birthday, woocommerce
Requires at least: 5.8
Tested up to: 6.7.1
Requires PHP: 7.4
Stable tag: 5.7
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

An advanced and highly customizable WOOCOMMERCE gift registry and wishlist plugin that allows you to create lists for any occasion.

== Description ==

NM Gift Registry and Wishlist for WOOCOMMERCE allows customers to create and add products to all kinds of gift registries and wishlists, from birthdays to weddings, anniversaries and other occasions. It can create both gift registries and wishlists. Designed with customers in mind, It provides tools needed to help them create the perfect list, get their items bought and generate sales for the store.

= Free version features =

* Create a gift registry or wishlist.
* Allow guests to create and manage wishlists.
* Add event date, description, partner's details and other profile information to the gift registry or wishlist.
* Add shipping information to the gift registry or wishlist using WooCommerce's shipping fields to blend well with the shipping setup on your site.
* Add simple, variable or grouped products directly to the gift registry or wishlist without fuss.
* Set the quantity desired of products added to the gift registry or wishlist.
* Add products from multiple gift registries or wishlists to the same cart and even add the same products to the cart as normal items.
* Track gift registry or wishlist items in the cart individually all the way up to checkout and order.
* Blocks and shortcodes for displaying wishlists, archives, add to wishlist button, wishlist cart and search form.
* Customize the appearance and position of the add to gift registry or wishlist button.
* Customize the wishlist items table, add or remove columns as necessary, sort columns in every way.
* Social sharing for the gift registry or wishlist.
* Advanced search form for searching gift registries or wishlists by title, name, email and other fields.

= Pro version features =

* Ability for each customer to have multiple gift registries or wishlists.
* Add multiple wishlist items to the cart at once.
* WooCommerce-like emails configurable to be sent to custom recipients and the wishlist owner at various stages such as when a wishlist is created, fulfilled and deleted, and when a wishlist item is ordered, purchased and refunded.
* Featured and background images for each gift registry or wishlist with various display styles.
* Ability to send custom messages to the gift registry or wishlist owner from the checkout page.
* Messages inbox for customers to view messages sent to them on the checkout page from their account area. Configure sending messages to customers' email.
* Settings for customers to manage the visibility and other properties of their gift registry or wishlist on the frontend.
* Ability to exclude individual wishlists from search results.
* Ability to mark an item as favourite in the wishlist and sort items by their favourite status.
* Extra settings for customizing the add to wishlist button and action completely to your liking.
* Extra setting for customizing plugin functionality.
* Ability to set separate shipping methods and rates for wishlist items and ability to ship wishlist items to the wishlist owner's address.
* Ability to hide or customize the wishlist owner's shipping address on the frontend when shipping to it.
* Ability to include/exclude products from being added to the wishlist.
* Ability to include/exclude product categories from being added to the wishlist.
* Allow wishlist owners to see details of who bought items for them.

== Screenshots ==

1. Customizable items table - add and remove columns, change column contents.
2. Identify items from multiple lists in cart, order and checkout.
3. Add simple, variable and grouped products to the list.
4. Display WooCommerce-like add-to-list notices.
5. Wishlist page appearance.
6. View overview information in the wishlist management page.
7. Add detailed profile information and customize visibility and required status of profile fields.
8. Add shipping address the WooCommerce way.
9. Administrators have Full management control over all lists.


== Upgrade Notice ==


== Changelog ==

(Full changelog available in changelog.txt file in plugin root directory)

= 5.7 =
* Tweak - Removed capabilities and roles feature from plugin.
* Tweak- Users can no longer be searched by user id in the admin wishlist page.
* Fix - Wislist items table progressbar and totals section do not update when wishlist item is deleted.
* Tweak - Removed body classes used to identify all gift registry pages such as single and archive on the frontend.
* Dev - Removed filter 'nmgr_cart_template'.
* Dev - Removed filter 'nmgr_frontend_inline_style'.
* Feature - Removed [nmgr_cart] shortcode.
* Feature - Added cart block.
* Feature - Added search block.
* Feature - Added add to wishlist button block.
* Feature - Added archives block.
* Feature - Added wishlist block.
* Tweak - Modified search widget (Some settings have been removed which can only be changed via filter).

= 5.6 =
* Dev - Deprecated action hook 'nmgr_archive_header'.
* Dev - Deprecated action hook 'nmgr_after_archive_title'.
* Fix - Removed more bugs present when using wishlist search widget.

= 5.5.1 =
* Fix - single wishlists not showing on frontend when search widget is active.

= 5.5 =
* Tweak - Changed api for plugin update from HTTP to REST.
* Fix - Wishlist edit screen is automatically set to gift-registry or wishlist type based on which module is enabled.
* Fix - Bug preventing search results from showing by default when search widget is used on pages.

= 5.4.2 =
* Fix - Page jump after toast notice is displayed.

= 5.4.1 =
* Fix - Bug preventing first new wishlist being created for user if adding to wishlist on frontend on fresh install.

= 5.4 =
* Feature - Added partial compatibility with woocommerce checkout blocks.
* Fix - Prevent 'new' and 'home' from being used as wishlist titles.
* Fix - Bug preventing wishlist items in cart from having their quantities updated in the cart.
* Dev - Removed abstract class NMGR_Data extended by classes NMGR_Wishlist and NMGR_Wishlist_Item.

= 5.3.2 =
* Fix - Error on wishlist items table when product does not exist.

= 5.3.1 =
* Tweak - Improved pagination speed on wishlist items table.

= 5.3.0 =
* Fix - Dropdown items showing in raw form on page load.
* Tweak - Wishist items totals shows amount purchased including tax.

= 5.2.0 =
* Fix - Bug preventing checkout page from submitting when cart is shipping to wishlist address.

= 5.1.0 =
* Feature - Optimized wishlist items table.
* Fix - Bug preventing product details from updating in wishlist items table when changed due to cache.
* Feature - Prices in wishlist items table are displayed witho woocommerce 'wc_get_price_to_display' function.

= 5.0 =
* Fix - Billing address overwritten by custom gift registry shipping address on checkout and my account page.
* Dev - Removed deprecated functions, methods and classes.
* Dev - Deleted NMGR_Items_View class.
* Dev - Removed nmgr_wishlist_itemmeta table and code related to table.
