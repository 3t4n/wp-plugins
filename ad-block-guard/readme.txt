=== The Ultimate AdBlock Detector (Recoup Revenue and Increase Registrations) ===
Contributors: Wutime
Plugin Name: The Ultimate AdBlock Detector - AdBlock Guard
Tags: adblock, adblock detection, adblock detector
Donate link: https://www.wutime.com/
Plugin URI: https://www.wutime.com/downloads/wp-adblock-guard/
Requires at least: 5.0
Tested up to: 6.7.1
Requires PHP: 7.4
Stable tag: 2.2.7
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: ad-block-guard
Domain Path: /languages

AdBlock Guard is a powerful, flexible, efficient AdBlock detection plugin that stops AdBlockers instantly.

== Description ==

**The Ultimate AdBlock Guard Plugin – Your Content’s Best Defense Against AdBlockers**

Say goodbye to lost Ad revenue and hello to maximum content visibility with **AdBlock Guard**. This powerful WordPress plugin is engineered to detect all AdBlock extensions and DNS-level adblockers. Whether your visitors are using a laptop, PC, phone, or tablet, our proprietary detection runs seamlessly across all devices and browsers, ensuring your ads are always seen.

**Increase Revenue, Boost Subscriptions, Increase Registrations**

An extremely lightweight and powerful AdBlock Detector that supports custom overlays "Per Role" and custom page and content-type exclusions.

= Unrivaled Detection Capabilities =

AdBlock Guard effectively detects all the most commonly used AdBlock extensions and DNS-level AdBlockers:

* **Beats All Popular AdBlock Extensions:**
  * AdBlock Plus
  * uBlock Origin
  * Ghostery
  * AdGuard
  * Privacy Badger
  * Fair AdBlocker
  * 100's more fully supported!

* **Beats All Major DNS-Level AdBlockers:**
  * Pi-hole
  * Private Internet Access: MACE
  * AdGuard Home
  * NextDNS
  * OpenDNS
  * Quad9
  * And numerous others...

= Why Choose AdBlock Guard? =

Don't let AdBlockers dictate your revenue. With AdBlock Guard, you’re equipped with the most advanced tools to ensure your ads are seen by everyone, no matter what.

== Compatible Plugins ==

This plugin has been tested and verified to work seamlessly with the following plugins:

* **WooCommerce**: Supports custom exclusions and special page types (https://wordpress.org/plugins/woocommerce/)
* **WP Rocket**: Supports settings adjustments and cache rebuilding (https://wp-rocket.me/)

Please note that while we strive to maintain compatibility, updates to the listed plugins may affect functionality. For any issues or inquiries, we encourage you to contact our support team.

== Screenshots ==

1. General settings page: Configure global plugin settings.
2. Overlay settings per role: Manage overlay configurations for different user roles.
3. AdBlock overlay settings: Manage wording and buttons
4. AdBlock exclusions: Exclude pages and granuralize appearance
5. Advanced settings: Fine-tune advanced options for better compatibility.
6. Demo mode: Review each overlay for each user role 
7. Overlay example 1: Render as many, or as few buttons as you like
8. Overlay example 2: No buttons example
9. Overlay example 3: Dyanmic compact rendering example

== Installation ==

1. Install & Activate Plugin
2. Access `AdBlock Guard` Settings: admin.php?page=wuadblockguard_settings
3. Configure your overlays and enable AdBlock under 'General Settings'
4. Be sure to enable at least one role under 'Overlay Settings Per Role'
5. Launch the 'Demo' if you want to test
6. Use Incognito Windows with an AdBlock extension running to see live AdBlock overlays

== Frequently Asked Questions ==

= Does AdBlock Guard work with all browsers? =

Yes, AdBlock Guard is fully compatible with all major browsers, including Brave, Chrome, Firefox, Safari, and Edge.

= Can I customize the appearance of the detection overlay? =

Absolutely! The plugin allows you to fully customize the colors and styles to match your theme.

= Does this plugin affect my SEO? =

AdBlock Guard is designed to be SEO-friendly and will not negatively impact or interfere with your search engine rankings.

== Changelog ==

= 2.2.7 =
* Installer/upgrader fix

= 2.2.6 =
* (performance) Removed serializer completely
* (performance) Added transient for entire settings array for frontend
* (compatablity) All object caches now fully supported
* (updated) Logger date and time to match WordPress timezone
* (uninstaller) Remove all transients and options from WordPress and Object Cache

= 2.2.5 =
* (bug fix) Excluded Url's setting returned false under all conditions
* (bug fix) Excluded Url wildcard pattern was previously being ignored

= 2.2.4 =
* (bug fix) correct mistyped $filtered_roles to resolve notice

= 2.2.3 =
* (feature) Add "Globally exclude user roles from system" option
* (feature) Added "System check page" for UTF8 and WP Rocket cache system
* (bug fix) Unicode character encoding for emojiis when wordpress is utf8mb3
* (bug fix) If PHP 8.1+ and not utf8mb4, unicode emojiis will be stripped from settings
* (performance) [WP Rocket] compatability handler and feature to disable incompatible JS settings
* (performance) Improved cache detection including WP_CACHE fallback
* (updated) Serialize & sanitize all setting inputs (set defaults if missing)
* (overlay) Remove color reset icon (all colours are mandatory settings for overlay)

= 2.2.2 =
* (performance) Remove reliance on wp_cache_set in favour of custom cache solution
* (updated) Remove default buttons from overlays on install or reset

= 2.2.1 =
* (bug fix) Check for WooCommerce() existing prior to checking status

= 2.2.0 =
* (feature) Add custom javascript detection method
* (feature) Add custom css class name to detection algorithm 
* (feature) Add custom css class id to detection algorithm
* (overlay) Improve efficiency of detector rendering by caching all JavaScript
* (settings) Improve order and placement of options for brevity
* (settings) Move Url exclusions under the exclusions tab
* (settings) Remove "Visual / Text" tab from WYSWIG editor to ensure sanitized overlay html
* (performance) Upgrade: Detection code updated to version 2.2
* (performance) Refined exclusion logic and removed duplicates appearing across different types
* (performance) Globalized all settings and centralized serialized settings
* (bug fix) Missing license_key_page_callback() exception
* (updated) Style license and demo page to be more pleasing
* (updated) All Exclusion language to be precise and clear
* (updated) Monologger to always log critical errors and automatic upgrade notices

= 2.1.13 =
* (overlay) Cap font size for title to a maximum across all large screen sizes
* (mobile+demo) Add WP mobile-friendly classes to demo table
* (mobile+demo) Remove least important columns from demo table on <782px screens
* (mobile+demo) Add clearances for the admin wpadminbar when rendering overlay in demo mode

= 2.1.12 =
* Shade role tabs with a light red background for usability and clarity
* Fix TinyMCE Text to Visual tab switch with more robust jQuery
* Enable caching for performance improvement

= 2.1.11 =
* Fix: ensure "Text" alterations migrate immediately to "Visual" text editor
* Fix: ensure role overlays obey checkbox determining whether they're enabled or not
* Add feature "Allow content scrolling" to role overlays to allow content scrolling behind overlay
* Update the title on overlays to consume less space, including removing top/bottom margin
* Improve positioning and size of the close link

= 2.1.10 = 
* Add clear demo messaging: "In this demo, the close button is always enabled to avoid locking you in. Website visitors won't have this option."
* Remove log file

= 2.1.9 =
* Refactor uninstall to ensure all definitions exist prior to removal
* Ensure if there's a db issue the uninstall politely continues

= 2.1.8 =
* Add settings link to plugins page for customer convenience
* Add "Get Support" link to plugins page
* Remove notice from plugins update page if the software is licensed
* Update uninstaller to remove new "reminder prompt" option from database on cleanup

= 2.1.7 =
* Fix: [Front page] exclusion must always exclude homepage under all WordPres setups (is_home + is_front_page)
* Fix: Improve efficiency for excluded PAGE logic
* Fix: Improve efficiency for excluded POST (categories + tags)
* Add: Reminder prompt in demo mode informing admins that the overlay close button is ALWAYS enabled in demos

= 2.1.6 =
* Performance update
* Readme update

= 2.1.5 =
* Short description adjustment due to size

= 2.1.4 =
* Update plugin name in main plugin file

= 2.1.3 =
* Update banners
* Update main plugin file to force "view details" to be served from WordPress.org

= 2.1.2 =
* Updated name to "The Ultimate AdBlock Detector - AdBlock Guard"
* Removed redundant "Stable Tag" from main plugin file
* Updated installation instructions

= 2.1.1 =
* Tested with WP v6.7.1
* Update sync remote loading features

= 2.1.0 =
* Tested with WP v6.7.0
* Remind user to save changes if navigating after making changes
* Improved script loading to avoid 

= 2.0.16 =
* Verify against updated plugin check for security and syntax clarity
* Remove inline script tags in debugging and testing mode
* Remove print_r and replace with json_encode
* Test with WordPress 6.7
* Remove error_log() instances
* Add composer Monolog Logger()

= 2.0.15 =
* Remove identifier from <script> tags as a defensive measure

= 2.0.14 =
* Update class names to WUADBLOCKGUARD for uniqueness (37 + 1 updates)
* Consolidate classes from Ad_Block_Guard to AdBlockGuard
* Make all front-end <script> inclusions to use wp_enqueue_scripts()
* Make all admin <script> inclusions for AdBlock Guard demo use admin_enqueue_scripts()

= 2.0.13 =
* Update after WordPress Team review
* Removed unneeded /bin/ files (unneccessary files) from composer
* Updated composer installer to v2.3.0 (most recent compatible with PHP 7.4)
* Move inline overlay css to wp_add_inline_style()
* Moved HEREDOC to an actual file /src/script/loader.js
* Removed all example links to raw.githubusercontent.com
* Resolved for instances missing text domain for translations within code
* Updated 5 occurrences of the nonce not being sanitized
* Resolve generic function/class/define/namespace/option names in 3 spots in main plugin file

= 2.0.12 =
* Remove redundant class checks on require_once inclusions from plugin loader
* Fix: Critical Uncaught Error: Call to private AdBlockGuard\LicenseChecker::__construct()
* Remove: Assets_Loader class as it's not currently implemented or required
* Add WooCommerce exlusions and allow excluding

= 2.0.11 =
* Fix: Use default WP theme coloring values throughout plugin admin.css
* Fix: 'Exclude AdBlock on Pages' checkbox not working to reveal underlying options 
* Silence plugin.error_log if DEBUG isn't enabled
* Update build script to ensure flags are appropriately set for plugin.zip

= 2.0.10 =
* Resolved all plugin checker issues
* Added developer note to WP Reviewer explaing requiring direct output of sanitized JavaScript for detection

= 2.0.9 =
* Sanitation and escaping
* Resolved issues with WP Plugin Checker on translations and literals

= 2.0.8 =
* Add exclusions options
* Improved detection method with remote loading

= 2.0.7 =
* uninstaller.php updated to remove every transient
* Setup proper Carbon Fields validator checks for checkboxes that depend on multi-selects

= 2.0.6 =
* Setup nonces for all posts, regardless of the fact all posts are in the is_admin() section

= 2.0.5 =
* Translate all strings and provide proper translation feedback for translators

= 2.0.4 =
* Performance improvements
* Push updates and upgrade path improvements

= 2.0.3 =
* Compatible with PHP 7.4
* Tested compatability with WordPress v5.0

= 2.0.2 =
* Add: Complete exclusions system
* Add: WooCommerce default exclusions
* Add: Dynamic buttons system with coloring
* Rename plugin due to existing EasyList conflicts with previous plugin folder

= 2.0.1 =
* Fix: Issue with composer versioning of package
* Fix: Performance issues related to loading of assets
* Fix: Add versioning to all assets per release to bust caches
* Fix: Added proper PHP requirements to both composer.json and WP plugin
* Fix: Performance to exit early if certain call-types on main plugin file and not is_admin()
* Add: Scheduled cron for licensing

== External Services Used ==

This plugin, if selected, can retrieve updated CSS element names and identifiers from a selected "Easy List," as an example: [Easy List Example](https://easylist.to/easylist/easylist.txt).

Easy Lists are dual licensed under the GNU General Public License version 3 of the License, or (at your option) any later version, and Creative Commons Attribution-ShareAlike 3.0 Unported. The license file for Easy Lists can be found here: [Easy List License](https://easylist.to/pages/licence.html).

Easy Lists are also hosted by easylist-downloads.adblockplus.org, as an example: [Easy List Download](https://easylist-downloads.adblockplus.org/easylist.txt). These lists are also licensed with the same license: [Easy List License](https://easylist.to/pages/licence.html).

This plugin also defaults to using [Google's adsbygoogle.js](https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js) as a test case for remote loading of an advertisement test script. You can review [Google's privacy policy](https://policies.google.com/privacy?hl=en) and their [terms and conditions](https://policies.google.com/terms).

