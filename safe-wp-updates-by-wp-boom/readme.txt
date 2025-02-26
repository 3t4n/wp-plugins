=== "Safe WP Updates" by WP Boom ===
Tags: development, testing, utility
Requires at least: 6.2
Tested up to: 6.7.1
Stable tag: 1.3.61
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A site cloning and visual testing tool that allows creation of development sites for WordPress update testing.

== Description ==

A site cloning and visual testing tool that allows creation of development sites for WordPress update testing through visual comparison via the Wp Boom service.

== 3rd Party or External Services ==

This plugin utilizes (2) 3rd party services located at:
= https://app.wpboom.com/api/v1 =
* This service is the core of our plugin which allows us to queue remote screenshot of web pages and manage account-specific details for registered and unregistered usage of our snapshot service.
* Terms of Service Link: https://www.wpboom.com/terms-of-service/

= https://openai.chrisbond.dev/tunnel.php =
* This service allows us to overcome certain roadblocks that occur due restrictions that users may not know exist on their host (such as internal IP addressing and DNS). These issues usually result in the inability for this plugin to communicate with our service located at https://app.wpboom.com
* Terms of Service Link: Link is embedded in JSON response when unauthenticated requests are made (you can see the response just by visiting the page at https://openai.chrisbond.dev/tunnel.php) and are the same terms located at https://www.wpboom.com/terms-of-service/


== Frequently Asked Questions ==

= How do I install WP-CLI? =

IF WP-CLI is not aleady installed, contact your HOST to request it.

= How much does the WP Boom service cost? =

The service is free but is limited to 2 sites and 10 snapshot a week per site. Upgrade options are available.

== Screenshots ==

1. development site created 
2. update plugins on dev site
3. register or login
4. once connected to WP Boom service, list of pages and Screenshots
5. example of image comparison
6. WP Boom service overview
7. development site creation popup

== Changelog ==

= 1.3.61 =
* Release Date Jan 13 2025
* Fixed various issues to fall inline with WordPress guidelines

= 1.3.4 =
* Release Date Oct 28 2024
* Fixed an issue with WordPress endpoint communication from WpBoom service 

= 1.3.3 =
* Release Date Oct 22 2024
* Various sanitization and escaping fixes. 

= 1.3.2 =
* Release Date Aug 7th 2024 
* Added wp_nonce to form submissions.

= 1.3.0 =
* Release Date July 23th 2024
* Added methods to better test WP-CLI availability.

= 1.2.32 =
* Release Date July 12th 2024
* Changes to dev site action button group

= 1.2.1 =
* Release Date July 9th 2024
* Changes to text
* Fixed a bug where a pending crawl was not correctly identified
* Fixed an issue where plugin would enter into an infinite loop if a site did not exist in WP Boom service (post registration)
* Removed Site Health information from dashboard as it caused delays in rending on sites with lots of files

= 1.1.1 =
* Release Date July 7th 2024
* Added hosted plugin update to allow updating from within WordPress
* Improvements to dev site spawn scheduling
* Various UI improvements
* Fixed some performance and bug issues
* Fixed snapshot image indexing
* Finished remote integration with WP BOOM service

= 1.1.0 =
* Release Date May 20th 2024
* Removed integrated snapshotting from plugin
* Added ability to update plugins on spawned dev sites
* Partial remote integration with WP BOOM service
* Streamlined registration/login process

= 1.1 =
* Release Date Dec 12th 2023
* Initial Release
* Implemented dev site spawning via scheduled events

= 1.0 =
* Release Date May 7th 2023
* Initial Release
