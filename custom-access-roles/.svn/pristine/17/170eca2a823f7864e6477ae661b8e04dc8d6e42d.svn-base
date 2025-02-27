=== Custom Access Roles ===
Contributors: room34
Donate link: http://room34.com/donation
Tags: access control, capabilities, roles, permissions, editing
Requires at least: 4.0
Tested up to: 6.7
Requires PHP: 5.6.0
Stable tag: 2.1.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create custom roles with editing capability for only specific pages, categories and post types.

== Description ==

_NEW IN VERSION 2.0.0: Users with a custom role will now only see the posts or pages they are assigned to. We've also streamlined the admin interface for easier configuration, and included additional instructions to help you get the proper capabilities assigned to your custom roles._

**Custom Access Roles** allows you to create, edit and delete custom roles for editing content. It was created to fill a need for a role editor plugin that is focused on providing easy-to-use admin tools for *restricting content editing access*. It is not concerned with restricting *viewing* access on the front end.

It is specifically intended for large sites with multiple content editors, where editors (by role, not individually) need to be restricted to only being able to edit specific areas of the site.

With this plugin, administrators of large sites have relatively fine-grained control over which user roles can edit which content, making it possible to manage a team of editors without concern that they will (accidentally or deliberately) edit content they should not have access to.

You can define a fully customized set of capabilities for each role, along with defining a specific set of post categories, pages, and custom post types to which those capabilities apply. For all other content, the role will have read-only access.

**Custom Access Roles** provides an easy interface for managing these roles and capabilities, with checkboxes for each capability grouped by the standard roles they're associated with, plus checkboxes for each post category, page, and custom post type, presented in an organized hierarchy.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to **Users > Custom Access Roles** to manage roles and capabilities.

== Frequently Asked Questions ==

= How do I grant access to Custom Post Types? =
If your CPT has its own capabilities, assign those capabilities to the role. Otherwise, CPTs use the same permissions as Posts. Assign `edit_posts` and all similar `edit_*_posts` capabilities. Note that this will give these users the ability to edit Posts as well, but only for the specific categories they've been given access to using this plugin. This is why "publish_posts" is not enabled by default.

= Users who should only be able to edit Posts see the Pages section, and vice versa =
The default capabilities set by the plugin assume basic editing capability for both Pages and Posts. If you are creating a role that should _only_ be able to edit Pages, under the Capabilities tab (when configuring the role) uncheck all capabilities containing the word "posts". Likewise, for roles who will only be editing Posts, uncheck all capabilities containing the word "pages".

Capabilities for CPTs are a bit more complicated, because some CPTs have their own custom capabilities, while others do not, and default to using the "posts" capabilities. You'll need to inspect the configuration of the CPT to determine which capabilities are used.

= How do I set up an order fulfillment role for WooCommerce? =
The "Shop Manager" user role in WooCommerce may have more capabilities than you would like, such as the ability to edit Posts, Pages and Products. It is possible to set up a fulfillment role that is focused mainly on WooCommerce orders, with no access to edit content. Unfortunately because of how the capabilities in WooCommerce are grouped, this role will still have the capability to edit all of the WooCommerce *Settings.*

1. Create a new custom role, and under the **Capabilities** tab, uncheck all of the standard capabilities except "read" (under Subscriber).

2. Still under **Capabilities**, scroll down to **Custom**, and check the boxes for all capabilities that contain the words "shop order(s)". Also check all of the "read" capabilities that include "product(s)", "shop coupon(s)", and "shop webhook(s)".

3. Also check the box for "manage woocommerce". This grants more permissions than we would like, but is necessary to grant *any* access to the WooCommerce admin pages, including Orders.

4. Optionally, check "view woocommerce reports" if the user should be allowed to view reports.

5. Under the **Content Access** tab, scroll down to **Custom Post Types** and check "Orders", "Refunds" and "Coupons".

6. Click **Save Changes**. This role is now ready to use.

== Screenshots ==

1. The first screen of the plugin admin. You can edit an existing custom role, create a new one, or delete an existing one. By default the plugin allows you to delete existing roles even if there are users assigned to them, although core WordPress roles and certain popular third-party plugin roles are restricted. You can change this by modifying a variable in the plugin source code. A future update will allow admins to change this setting without modifying code.

2. The screen where role capabilities and content access are set. Pages and Categories are listed in hierarchical order, with checkboxes to select which ones for which the role will have the assigned capabilities. For all others, the role will have read-only access.

3. You can find the settings for the plugin under **Custom Access Roles** in the **Users** menu.

== Changelog ==

= 2.1.2.1 - 2023.10.25 =

* Fixed fatal error on admin page in WordPress 6.4 (and possibly earlier versions) with PHP 8.1 (and possibly earlier versions), caused by incorrect type casting of two array variables' initial values as empty strings.

= 2.1.2 =

* Updated logo and icon assets.
* Updated "Tested up to" to 5.8.1.

= 2.1.1.1 =
* Added conditional to prevent undefined index notices.

= 2.1.1 =
* Tested with WordPress 5.0.3.
* Updated admin screen.

= 2.1.0 =
* Added ability to assign access to private Custom Post Types, e.g. the "shop_order" post type in WooCommerce. Instructions for setting up a WooCommerce order fulfillment role have been added to the FAQ page.

= 2.0.0 =
* __Pages and Posts lists now only show items the user can actually edit.__
* Improved Custom Access Roles configuration interface.
* Updated FAQ.

= 1.0.4.2 =
* Updated FAQ.

= 1.0.4.1 =
* Updated "Tested up to" to 4.7.

= 1.0.4 =
* Minor code cleanup.

= 1.0.3 =
* Fixed "Can't use method return value in write context" fatal error for PHP versions before 5.5.

= 1.0.2 =
* Removed anonymous function that was causing errors in PHP versions before 5.3.0.

= 1.0.1 =
* Fixed bug in output logic of CARoles::get_current_user_role() method.

= 1.0.0 =
* Tested against WordPress 4.6.
* Advanced to official 1.0 release.

= 0.3.5 =
* General file cleanup.

= 0.3.4 =
* Added banner image for WordPress Plugin Directory.
* Modified plugin description for clarity of purpose.

= 0.3.3 =
* Added PHPDoc-format comments to all class methods.

= 0.3.2 =
* Original version.

== Upgrade Notice ==

= 0.3.5 =

= 0.3.4 =
Improved descriptive information in WordPress Plugin Directory.

= 0.3.3 =
Initial release in WordPress Plugin Directory.
