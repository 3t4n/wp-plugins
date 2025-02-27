=== Total User Count Shortcode ===
Contributors: morganhvidt
Tags: user count, roles, total users, tally, all users
Author URI: https://puri.io/
Author: Morgan Hvidt
Donate link: https://morganhvidt.com/donate
Requires at least: 5.0
Tested up to: 6.5
Requires PHP: 7.0
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Display the total amount of users in your WP with the [total_user_count] shortcode plugin

== Description ==

Total User Count Shortcode provides a simple way to display the number of registered users on your WordPress site. It's a lightweight plugin with no admin screen, offering a straightforward shortcode: `[total_user_count]`.

### Features:

- **Display Total Users**: Use `[total_user_count]` to show the total number of users.
- **Filter by Role**: Specify a user role to display counts for, e.g., `[total_user_count role="customer"]` for WooCommerce customers.
- **Combine Roles**: Tally multiple roles together, e.g., `[total_user_count role="subscriber, author"]`.
- **Support for Custom Roles**: Works with custom user roles added by other plugins.

### Common WordPress User Roles:

- subscriber
- author
- editor
- contributor
- administrator
- customer (WooCommerce)

### Social Proof:

Showcase your site's popularity by displaying the number of users anywhere on your site using the shortcode.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Use the shortcode `[total_user_count]` in your posts, pages, or widgets to display the user count.
4. No further configuration is needed.

== Frequently Asked Questions ==

### Can I use the shortcode anywhere?

Yes, the shortcode can be placed in any post, page, or widget area, and within any content like paragraphs or headings (H1, H2, etc.).




== Screenshots ==

1. Total User Count Shortcode display on page
2. Total User Count shortcode for WordPress user roles.


== Changelog ==

= 1.1.2 =

* Count (sum) multiple user roles within one shortcode.
* Tested and ready for WordPress 6.5
* Ready for PHP 8.3

= 1.1.1 =

* Tested and ready for WordPress 5.6

= 1.1.0 =

* New: support for getting specific user role counts e.g [total_user_count role="subscriber"]
* Tested and ready for WordPress 5.5

= 1.0.5 =

* Tested and ready for WordPress 5.3

= 1.0.4 =

* Tested and ready for WordPress 5.2

= 1.0.3 =

* Tested and ready for WordPress 5.1

= 1.0.1 =

* Tested with Gutenberg and WordPress 5.0

= 1.0.0 =
* Total User Count Shortcode goes live on WordPress.org
