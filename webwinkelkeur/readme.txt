=== WebwinkelKeur: Webshop keurmerk & reviews for WordPress ===
Contributors: apeschar
Tags: webwinkelkeur, sidebar, review, reviews, woocommerce, webwinkel keurmerk, webshop keurmerk, keurmerk
Requires at least: 4.4
Requires PHP: 7.0
Tested up to: 6.6.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Reviews verzamelen voor je WordPress website of WooCommerce webshop doe je met WebwinkelKeur.

=== Description ===

WebwinkelKeur is hét (grootste) keurmerk en reviewsysteem voor webwinkels. Met ons zorg je ervoor dat de omzet van jouw webwinkel wordt verhoogd.

**Webwinkel keurmerk**
Bemachtig ons [webshop keurmerk][3] en laat net als meer dan 6.000 andere webshops zien dat je webwinkel betrouwbaar is. Verdien aanvullende badges en blijf daarmee de concurrentie voor.

**Reviews voor webshops**
Geen webshop kan zonder het pro-actief verzamelen van reviews. Het verzamelen en tonen van betrouwbare reviews zorgt ervoor dat de conversie van je webwinkel flink verbeterd. Met WebwinkelKeur verzamel eenvoudig en automatisch reviews. We bieden je daarvoor [innovatieve review software][4] die het voor de klanten zo eenvoudig mogelijk maakt om reviews te plaatsen. WebwinkelKeur draagt daarbij zorg voor het eerlijk verzamelen van reviews, wat de betrouwbaarheid ten goede komt.

**Reviews voor producten**
Ook is het mogelijk product reviews te verzamelen via WebwinkelKeur.
Let wel: dit is een aparte extra dienst die is in te schakelen via je dashboard.
Zorg er daarnaast ook voor dat je de laatste versie van deze plugin hebt.
Product reviews zorgen voor extra feedback op je assortiment, social proof en minder retourverzoeken daar consumenten geinformeerder bestellen.
Ook krijg je sterren in Google search en kun je sterren krijgen in Google shopping door de feed die we bieden in te laden.
Lees het kennisbank stuk of onze blog voor meer informatie (hyperlinks)
Blog: [Product reviews nu beschikbaar voor jouw WooCommerce webshop!][6]
Kennisbank: [Klik hier][7]

**Over de plugin**
De WordPress plugin zorgt voor een eenvoudige integratie van het WebwinkelKeur binnen jouw WordPress website en WooCommerce webwinkel. Zo integreert de module automatisch de innovatieve [WebwinkelKeur Sidebar][1] binnen elke WordPress website of webwinkel.  Voor gebruikers van de WooCommerce plugin voor WordPress zorgt de module voor het automatisch versturen van reviewverzoeken aan je klanten. Bij elke afgewerkte bestelling wordt automatisch een uitnodiging naar de klant verzonden waarin hij uitgenodigd wordt om zijn ervaring te delen. Zo vergroot je het vertrouwen en de conversie van jouw webwinkel.

[Klik hier][2] voor meer informatie over de WordPress module.

**WebwinkelKeur lidmaatschap**
Deze plugin is geheel gratis te gebruiken, lidmaatschap van WebwinkelKeur is wel noodzakelijk. Bekijk onze [pakketten][5] voor meer informatie.

[1]: https://www.webwinkelkeur.nl/kennisbank/eenvoudige-integratie/integratie-mogelijkheden/sidebar/
[2]: https://www.webwinkelkeur.nl/kennisbank/eenvoudige-integratie/modules/wordpress-woocommerce
[3]: https://www.webwinkelkeur.nl/keurmerk
[4]: https://www.webwinkelkeur.nl/klantbeoordelingen
[5]: https://www.webwinkelkeur.nl/pakketten
[6]: https://www.webwinkelkeur.nl/product-reviews-nu-beschikbaar-voor-jouw-woocommerce-webshop/
[7]: https://www.webwinkelkeur.nl/kennisbank/meer-diensten/product-reviews/

=== Installation ===

1. Plaats de map "webwinkelkeur" in de map "wp-content/plugins" op de webserver.
1. De plugin kan nu worden geactiveerd in de administratieinterface. Ga daarvoor naar Plugins en klik op Activeren bij de WebwinkelKeur plugin.
1. Klik op Instellingen om de plugin te configureren.
1. Controleer of de sidebar op uw site wordt getoond.

=== Frequently ===

= Kan ik voorkomen dat voor bepaalde orders uitnodingen worden aangevraagd? =

Dat kan door de hook `webwinkelkeur_request_invitation` te implementeren:

~~~
add_filter('webwinkelkeur_request_invitation', function ($should_invite, WC_Order $order) {
    if ($order->get_total() < 10) {
        return false;
    }
    return $should_invite;
}, 10, 2);
~~~

=== Screenshots ===

1. WebwinkelKeur sidebar
2. WebwinkelKeur widget
3. WebwinkelKeur sidebar on a website
4. WebwinkelKeur sidebar highlights
5. WebwinkelKuer member page

=== Changelog ===

= 3.37 - 2024-09-26 =
* Hide popup after 10 minutes.

= 3.36 - 2024-08-26 =
* Bump **Tested up to** to WordPress 6.6.1.

= 3.35 - 2024-05-15 =
* WPML compatibility: fix duplicate review sync.

= 3.34 - 2024-03-20 =
* WPML compatibility: retrieve product data based on order language.

= 3.33 - 2024-01-23 =
* Support review sync in multisite setup.

= 3.32 - 2023-12-11 =
* Save reviews in the parent product of a variation, if available.

= 3.31 - 2023-11-23 =
* Fix product image for variations that don't have their own image.

= 3.30 - 2023-11-10 =
* Use product variation if available for synchronizing products.

= 3.29 - 2023-10-30 =
* Silence PSR-0 deprecation warnings for `Requests` class.

= 3.28 - 2023-08-16 =
* Fix passing `null` to `strtotime`.

= 3.27 - 2023-08-09 =
* Fix default option selection on settings page.
* Make `wpml_language` order meta update compatible with WooCommerce High-Performance Order Storage.
* Remove pointless `wp_meta` hook.
* Reorder invitation options on settings page.

= 3.26 - 2023-07-10 =
* Improve error handling for product review sync.
* Don't trigger product review sync when submitting settings form with enter key.
* Improve nonce handling.

= 3.25 - 2023-06-29 =
* Prevent settings updates through cross-site request forgery.

= 3.24 - 2023-06-26 =
* Fix default invite option.
* Improve option labels.

= 3.23 - 2023-06-12 =
* Use `order_number` instead of `order_id`.

= 3.22 - 2023-06-05 =
* Fix issue with missing `is_wc_endpoint_url` function.

= 3.21 - 2023-06-02 =
* Add support for requesting consent before sending invitation.

= 3.20 - 2023-04-05 =
* Bump **Tested up to** to WordPress 6.2.

= 3.19 - 2022-02-23 =
* Bump **Tested up to** to WordPress 6.1.1.

= 3.18 - 2022-06-27 =
* Automatically create invitation errors table if it does not exist.

= 3.17 - 2022-04-07 =
* Use website language for rich snippet.

= 3.16 - 2022-02-04 =
* Handle disappearing transient timeouts.

= 3.15 - 2021-09-14 =
* Rename `trustprofile.io` to `trustprofile.com`.

= 3.14 - 2021-09-08 =
* Use `get_billing_email` method instead of `_billing_email` property to avoid a PHP warning.

= 3.13 - 2021-07-19 =
* Bump **Tested up to** to WordPress 5.8.

= 3.12 - 2021-07-13 =
* Clear WooCommerce review cache after inserting a new product review.

= 3.11 - 2021-06-30 =
* Retrieve possible GTIN meta keys, attributes in an asynchronous request.

= 3.10 - 2021-05-25 =
* Fix usage of undefined `DEFAULT_ORDER_STATUS` constant.

= 3.9 - 2021-04-13 =
* Fix the GTIN field on the product page which is added if no field provided by
  another plugin is selected.

= 3.8 - 2021-03-31 =
* Add missing template file to make manual product sync show its status again.

= 3.7 - 2021-03-31 =
* Bump tested WordPress version to 5.7.

= 3.6 - 2021-03-31 =
* Fix product review sync when settings form has not been saved since this functionality was added.
* Add button to sync all product reviews manually.
* Show error messages when manual product sync fails.

= 3.5 - 2021-03-22 =
* Allow overriding the sidebar template by creating `webwinkelkeur/sidebar.php` in your theme.

= 3.4 - 2021-01-27 =
* Support GTINs stored via Yoast SEO.

= 3.3 - 2021-01-13 =
* Add notice about product reviews feature.
* Make sure product review scheduled task is registered on every load.

= 3.2 - 2020-12-15 =
* Add sample values to GTIN meta/attribute selector.
* Add button for manually syncing product reviews.

= 3.1 - 2020-12-10 =
* Fix undefined function error when the `woocommerce-product-feeds` plugin is installed but the `woocommerce_gpf_show_element` function does not exist.

= 3.0 - 2020-12-07 =
* Allow order status selection for invites.
* Add product reviews.
* Require PHP 7.0.

= 2.4 - 2020-11-24 =
* Fix disabling JavaScript integration. Previously, the setting wasn't saved.
* Fix setting invitations to "Yes, after a customer's first order.". This setting was converted to "Yes, after every order." silently before.

= 2.3 - 2020-11-24 =
* Bump **Tested up to** to WordPress 5.6.

= 2.2 =
* Use new sidebar load method so only one request is needed.

= 2.1 =
* Bump **Tested up to** to WordPress 5.5.

= 2.0 =
* Release TrustProfile integration.

= 1.9 =
* Set `wpml_language` on orders, in case WooCommerce Multilingual plugin is missing.
* Bump WordPress, WooCommerce version compatibility.

= 1.8 =
* Add `[webwinkelkeur_rich_snippet]` shortcode.

= 1.7 =
* Add webwinkelkeur_request_invitation hook.
* Only request invitations for orders with type `shop_order`.

= 1.6.10 =
* Restore error silencing when invoking get_data.

= 1.6.9 =
* Fix fatal error when order contains incomplete unserialized objects.

= 1.6.8 =
* Bump WordPress compatibility to 5.2.

= 1.6.7 =
* Check required parameters before calling get_data().

= 1.6.6 =
* Log rich snippet errors to the developer console.

= 1.6.5 =
* Update changelog.

= 1.6.4 =
* Bump WordPress, WooCommerce compatibility.
* Fix error messages.

= 1.6.3 =
* Fix compatibility with some plug-ins that mess up get_data().

= 1.6.2 =
* Require PHP 5.6

= 1.6.1 =
* Note required PHP version.

= 1.6.0 =
* Send order totals.
* Fix phones sending

= 1.5.0 =
* Use new WebwinkelKeur API.
* Add sending additional order information feature

= 1.4.4 =
* Do not send interface language to WebwinkelKeur API.

= 1.4.3 =
* Add this changelog.
* Use order number for invitations, not order ID. (This is usually the same.)

= 1.4.2 =
* If using WPML, use the customer's language for the invitation.
* Move the plugin menu item from "Plugins" to "Settings".
