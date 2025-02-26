=== Email Sync Between Woo and CM ===
Contributors: KNEET
Donate link: https://kneet.be
Tags: woocommerce, email, campaign monitor, sync, automation, e-commerce
Requires at least: 5.6
Tested up to: 6.7
Stable tag: 1.0
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Sync WooCommerce customer emails with Campaign Monitor when an order is marked as 'Processing'.

== Description ==

This plugin automatically adds customers to a Campaign Monitor list when their WooCommerce order is marked as 'Processing'.

Features:
- Seamless integration with WooCommerce.
- Automatic sync when an order reaches 'Processing' status.
- API key and List ID configuration in the WooCommerce settings.
- Test button to verify API connection and sync the last completed order.

== External Services ==
This plugin connects to the Campaign Monitor API (https://api.createsend.com/api/v3.3/subscribers/) to add customers to a mailing list. It sends:
- Email address
- First and last name
- Consent to track (Yes)

This happens when an order is set to "Processing" or when you manually test the plugin from the settings page.

Service provided by Campaign Monitor.
- Terms of Service: https://www.campaignmonitor.com/policies/#terms
- Privacy Policy: https://www.campaignmonitor.com/policies/#privacy

== Installation ==

1. Upload the email-sync-between-woo-andCM folder to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Navigate to WooCommerce > Sync Campaign Monitor to enter your API Key and List ID.
4. Click 'Test API Connection' to verify functionality.

== Frequently Asked Questions ==

= Does this plugin work with all WooCommerce stores? =

Yes, as long as WooCommerce is installed and activated.

= What happens if Campaign Monitor API credentials are incorrect? =

The sync will fail, and you can check error logs for details.

= Can I export all previous orders? =

No, this plugin only syncs new orders. However, you can manually export a CSV of customers via WooCommerce > Customers.

== Screenshots ==

1. Plugin settings page in the WooCommerce menu.

== Changelog ==

= 1.0.0 =
- First release.

== License ==

This plugin is licensed under the GPL v2 or later.

== Additional Information ==

This plugin is not affiliated with or endorsed by WooCommerce or Campaign Monitor.
