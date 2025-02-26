=== Activity Tracker ===
Contributors: sahibkhaan
Tags: activity tracker, meta box, user activity
Tested up to: 6.7
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Tracks user activity when posts, pages, WooCommerce products, or custom post types are updated. Displays the activity log in a custom meta box.

== Description ==

Activity Tracker Meta is a lightweight WordPress plugin that helps you track user activity on the admin side. Whenever a post, page, WooCommerce product, or any custom post type is updated, the plugin stores the following data in the post meta:
- The username of the editor.
- The date and time of the update.

This data is displayed in a custom meta box on the edit screen for each post, page, or product.

**Features:**
- Tracks activity for posts, pages, WooCommerce products, and custom post types.
- Stores activity logs in post meta in an array format.
- Displays activity logs in a custom meta box on the admin edit screen.
- Lightweight and easy to use.

== Installation ==

1. Download the plugin ZIP file.
2. Go to **Plugins > Add New** in your WordPress dashboard.
3. Click **Upload Plugin** and select the downloaded ZIP file.
4. Click **Install Now** and then **Activate** the plugin.

== Frequently Asked Questions ==

= Does this plugin work with WooCommerce? =
Yes! The plugin tracks activity for WooCommerce products along with other post types.

= Does it work with custom post types? =
Absolutely. The plugin automatically tracks updates for all registered custom post types.

= Where is the activity data stored? =
The activity data is stored in the `_skat_activity_log` meta key as an array for each post, page, product, or custom post type.

= How can I see the activity log? =
The activity log is displayed in a custom meta box on the edit screen of the post, page, or product.

== Screenshots ==

1. **Activity Log Meta Box:** A preview of the activity log meta box showing user activity.
2. **Activity Log Meta Box:** No activity log recorded yet, displaying a placeholder message.

== Changelog ==

= 1.0.0 =
* Initial release.
* Tracks updates for posts, pages, WooCommerce products, and custom post types.
* Displays activity log in a custom meta box.
