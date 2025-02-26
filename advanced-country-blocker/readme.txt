=== Advanced Country Blocker ===
Contributors: brstefanovic
Tags: country, blocking, security, geolocation, ip blocking
Requires at least: 5.0
Tested up to: 6.7
Stable tag: 2.0.2
Requires PHP: 7.2
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

An advanced security plugin that blocks website visitors by country, with additional features like blacklisting, logging blocked attempts, admin bypass, and more.

== Description ==

**Advanced Country Blocker** helps you secure your WordPress site by restricting access based on the visitor's geolocation (country) or IP address. Upon activation, the plugin detects the activating admin’s country and automatically sets that as the only allowed country. All other visitors from different countries are blocked, unless they use a secret key parameter to temporarily whitelist their IP.

**Key Features:**

* **Automatically allows the admin’s country** on plugin activation.
* **Temporary access** via a customizable secret URL parameter (e.g., `?MySecretKey=1`).
* **Manual blacklisting** of specific countries or IP addresses for added security.
* **Optional email alerts** when new visitors are blocked.
* **Admin bypass** so logged-in admins can always access the site (toggleable in the code).
* **Detailed logging** of blocked attempts in a custom database table, displayed in the WP admin.
* **Custom "Blocked" page** functionality—show a custom message or redirect to a specific page instead of the default 403.

Use the plugin settings page (**Country Blocker** menu in WP admin) to configure the list of allowed countries, blacklisted countries, blacklisted IPs, and whether email alerts are enabled.

== Installation ==

1. **Upload the plugin folder** to the `/wp-content/plugins/` directory, or install via the WordPress "Add Plugin" feature.
2. **Activate the plugin** through the "Plugins" menu in WordPress.
3. Upon activation, the plugin will:
   * Detect the activating admin's IP.
   * Determine the corresponding country via the IP geolocation API.
   * Set that country as the **only** allowed country in the plugin settings.
4. Go to **Country Blocker** → **Settings** in your WordPress admin menu to adjust configurations (e.g., secret key, blacklisted countries, blacklisted IPs, etc.).

== Frequently Asked Questions ==

= My IP geolocation is incorrect. How do I fix it? =
Most IP geolocation services have occasional inaccuracies. You can manually add or remove countries on the settings page to adjust who is allowed or blocked.

= What if I accidentally block myself? =
You can add your IP manually to the temporary whitelist by using the URL parameter (`?YourSecretKey=1`), or log in as an admin (if admin bypass is enabled). Alternatively, you can deactivate the plugin via FTP or your hosting control panel and adjust settings.

= Does this plugin store any visitor data? =
The plugin stores IP addresses and (optionally) country codes in a custom log table when visitors are blocked. This is purely for security and administrative review. Remove or adjust this functionality as needed to comply with privacy regulations.

= Can I bypass the plugin if I’m an administrator? =
Yes, by default, if you are logged in with `manage_options` capability. You can change or remove this bypass in the plugin code.

== Screenshots ==

1. **Settings Page** – Configure allowed/blacklisted countries, IPs, and email alerts.
2. **Blocked Attempts Log** – View a list of recently blocked visitors.

== Changelog ==

= 2.0.2 =
* Added the blacklist mode

= 2.0.1 =
* Fixed WordPress Repo guideline issues

= 2.0.0 =
* Added logging to a custom database table.
* Added blacklisted country/IP feature.
* Added admin bypass for testing.
* Added email alerts.

= 1.1.0 =
* Defaulted to admin's country on plugin activation.
* Introduced secret URL key for temporary IP whitelisting.

= 1.0.0 =
* Initial plugin release with basic country blocking and default country code.

== Upgrade Notice ==

= 2.0.0 =
Upgrading to 2.0.0 will add new features like logging, blacklisting, and an optional email alert system. Make sure your database is set up correctly and that you’ve reviewed the new settings.

== License ==

This plugin is open-sourced software licensed under the [GPLv3 or later](https://www.gnu.org/licenses/gpl-3.0.html).

== External Services ==

This plugin uses the free IP geolocation service provided by [IP-API](http://ip-api.com/) to determine the visitor's country.  
Data sent to IP-API includes:
- Visitor’s IP address (to determine the country of origin).

Learn more about their:
- [Terms of Service](http://ip-api.com/terms)  
- [Privacy Policy](http://ip-api.com/privacy)
