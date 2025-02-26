=== New Zealand Shipping Zones for WooCommerce ===
Contributors: chthnc
Author: Daniel Shaw
Author URI: https://danielshaw.co.nz
Tags: Shipping, New Zealand, Aotearoa, Rural delivery, WooCommerce
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 5.6.2
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Sets up New Zealand standard and rural shipping zones for WooCommerce.

== Description ==

This plugin creates shipping zones for standard and rural delivery across 
the North Island and South Island of New Zealand:

* North Island (Rural)
* South Island (Rural)
* North Island
* South Island

== Installation ==

### Minimum requirements

* WooCommerce 2.6 or higher is required for shipping zones

### Automatic installation

1. Visit Plugins > Add New
2. Search for "New Zealand Shipping Zones for WooCommerce"
3. Click the Install Now button and wait for the installation to complete
4. Click the Activate button
5. Visit WooCommerce > Settings > Shipping > Shipping zones to enter shipping methods for each shipping zone.

### Updating

It's recommended you always back up your site before updating.

== Frequently Asked Questions ==

= What shipping zones will be added? =

Four new shipping zones are added:

* North Island (Rural)
* South Island (Rural)
* North Island
* South Island

= What happens if a shipping zone already exists? =

No existing shipping zone will be overwritten. For example, if a shipping zone called North Island was created before the plugin is activated:

* the existing North Island shipping zone will remain untouched
* three new shipping zones will be created: North Island (Rural), South Island (Rural), and South Island.

= Why is the shipping cost not displaying in the cart/checkout? =

At least one shipping method must be set for the shipping zone. Please see WooCommerce's [Flat Rate Shipping](https://docs.woocommerce.com/document/flat-rate-shipping/) tutorial for an example of how to apply a shipping method.

= Why have zone names been added without regions? =

Your web server must have `allow_url_fopen` enabled to retrieve the region data. Please contact your webhost if you're unsure how to check this.

= Is the order of the zones important? =

Yes, the rural shipping zones must appear above the standard ones in the Zone name column.

= Are shipping zones removed if the plugin is removed? =

No, deactivating or deleting the plugin will not remove the shipping zones. Shipping zones can be manually removed via WooCommerce > Shipping > Shipping Zones.

= Why did my zone regions for North Island and South Island shipping zones disappear? =

Region codes were updated in the [WooCommerce 7.1.0 release](https://github.com/woocommerce/woocommerce/pull/35011). Shipping zones configured with this plugin prior to the WooCommerce 7.1.0 release are no longer recognised by WooCommerce.

The easiest solution is to manually reassign the correct regions for the North Island and South Island zones.

== Changelog ==

= 1.0.2 =

* Fix: Declare plugin compatibility for WooCommerce High Performance Order Storage (HPOS) data structure. Affects future installs with HPOS enabled by default or when HPOS is enabled manually via Settings > Advanced > Experimental Features. See [High Performance Order Storage Upgrade Recipe book](https://github.com/woocommerce/woocommerce/wiki/High-Performance-Order-Storage-Upgrade-Recipe-Book#declaring-extension-incompatibility).

= 1.0.1 =

* Fix: Update region codes for configuring zone regions in North Island and South Island shipping zones. Affects new installs on WooCommerce 7.1.0+. See [Update New Zealand subdivisions in states.php](https://github.com/woocommerce/woocommerce/pull/35011).

= 1.0 =

* Initial release.
