=== Payment Gateway using Mollie for Easy Digital Downloads ===
Contributors: pomegranate, alexmigf, yordansoares
Donate link: https://wpovernight.com
Tags: mollie, easy digital downloads, edd, payment, gateway
Requires at least: 4.7
Tested up to: 6.7
Stable tag: 3.2.17
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This is a gateway extension for Easy Digital Downloads plugin to accept Mollie payments in your store (iDEAL, SOFORT, Bancontact, Credit Card etc.)


== Description ==

This is a gateway extension for Easy Digital Downloads plugin to accept Mollie payments in your store.
Payment methods that are activated in your Mollie account will automatically become available in EDD and can either be enabled in the checkout or for only processing webhooks (to receive open payments even if the gateway is not enabled on your site for new payments)
Payments are processed offsite at mollie.com and the customer will be redirected back to your site after completing the payment.

The plugin requires API keys which can be acquired from the Mollie [account settings at www.mollie.com](https://my.mollie.com/dashboard/settings/profiles)

In addition to this free plugin, an extension for integrating with Recurring Payments can be purchased here: [Easy Digital Downloads - Mollie PRO](https://wpovernight.com/downloads/easy-digital-downloads-mollie-pro/). This extension will process subscription payments via Mollie automatically for EDD stores using the official [Recurring Payments](https://easydigitaldownloads.com/downloads/recurring-payments/) extension.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly (reccommended).
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Enter your API keys and choose test-mode for making test payments
4. Visit the Easy Digital Downlads payment gateway settings and select the Payment gateways you want to activate in your checkout page.
5. Select the payment icons you want to be visible on the checkout page.

== Frequently Asked Questions ==

== Screenshots ==



== Changelog ==

= 3.2.17 (2025-02-14) =
* Fix: Resolved issue where the refund script was not loading properly
* Translations: update translation template (POT)

= 3.2.16 (2025-01-20) =
* Fix: issue where the EDD Mailchimp add-on failed to capture checkout subscriptions
* Translations: update translation template (POT)

= 3.2.15 (2024-12-20) =
* New: bump PHP minimum version to 7.2
* Fix: resolve issue with charge-backs notice not hiding
* Fix: ensure charge-back notifications are properly deleted
* Translations: update translation template (POT)

= 3.2.14 (2024-11-04) =
* Fix: remove files from SVN that were mistakenly left undeleted
* Tested up to WP 6.7

= 3.2.13 (2024-10-31) =
* Fix: additional changes for plugin review compliance
* Translations: updated translation template (POT)

= 3.2.12 (2024-10-30) =
* New: comply with WP Plugin Check standards
* Translations: updated translation template (POT)

= 3.2.11 (2024-10-09) =
* Fix: issue where orders were not being marked as completed
* Fix: payment gateway icons not displaying in checkout
* Fix: load plugin translations later on `init`

= 3.2.10 (2024-06-26) =
* Tested up to WP 6.6

= 3.2.9 (2024-03-20) =
* Translations: fixed translator comments and placeholder numbering
* Translations: updated translation template (POT)
* Tested up to WP 6.5

= 3.2.8 (2023-11-08) =
* Tested up to WP 6.4

= 3.2.7 (2023-08-16) =
* Tested up to WP 6.3

= 3.2.6 (2022-12-07) =
* Fix: bug on multisite when redirecting from Mollie on failed/cancelled payments 
* Tested up to WP 6.2

= 3.2.5 (2022-12-07) =
* New: adds refund in Mollie checkbox to EDD3 initialize refund modal
* Fix: escape HTML properly before echoing
* Tested up to WP 6.1

= 3.2.4 (2022-10-04) =
* Plugin name change to comply with trademark rules
* New: adds new filter to payment total passed to Mollie: `edd_mollie_payment_total`
* New: show direct debit chargeback reason
* Tweak: die after payment failed
* Tweak: update mollie dashboard URLs
* Fix: escape HTML properly before echoing
* Fix: undefined payment variable
* Fix: escape query args for URLs

= 3.2.3 =
* New: don't show refund checkbox if there are chargebacks, to avoid overpaying
* Tweak: Use autoloader exclusively & allow other plugins to load Mollie libraries
* Updated bundled third party libraries
* Bumped PHP requirement to 7.1+
* Tested up to WP6.0

= 3.2.2 =
* New: Allow individual chargeback notice dismissal
* Fix: use "Site Address (URL)" as base for webhook (instead of "WordPress Address (URL)")
* Marked as tested up to WP5.8

= 3.2.1 =
* Fix: prevent notices from is_page check

= 3.2.0 =
* Feature: Admin notices for chargebacks, linking to the transaction and the EDD order
* Feature: Setting for SEPA Direct Debit offset for payments (SEPA transactions take a few days to process, this allows to initiate renewal payments a few days in advance) 
* Fix: reduce edd_get_cart_total calls to a minimum (temporary workaround for core EDD issue)
* Fix: PHP 8.0 deprecation notices

= 3.1.2 =
* Fix: Use alternate status update method (for third party plugins like All Access)
* Updated bundled third party libraries

= 3.1.1 =
* Updated bundled third party libraries

= 3.1.0 =
* Feature: Added option to check payments on order confirmation page (in addition to webhooks)
* Fix: increase priority of webhook checking to improve succesrate  

= 3.0.1 =
* Fix: Bank transfer gateway errors

= 3.0 =
* **Plugin rewritten from scratch for improved functionality:**
* Individual gateway settings allowing to change gateway names
* Transaction links from EDD's payment page
* Payments made in test mode will be marked as such (keeping them separate from live payments)
* Refunds can be processed either from your mollie dashboard (automatically updating the EDD payment) or from within EDD (triggering the refund on Mollie)
* Specific payment method name (iDEAL, Credit Card, etc) shown for each order
* Logging errors to EDD error log

= 2.2.4 =
* Fix missing Mollie assets

= 2.2.1 =
* Update error handling in new Mollie API

= 2.2 =
* Test stability for WP 5.3.2
* Update to Mollie API v2.12.1

= 2.1.8 =
* Test stability for WP 5.2

= 2.1.7.3 =
* Fix bug where Mollie webhook listener was triggered by WP comments approval

= 2.1.7.2 =
* Fixed duplicate payments

= 2.1.7.1 =
* Minor bugfix

= 2.1.7 =
* Fixed error in webhook handler.

= 2.1.6 =
* Added note for payment in case of a failed directdebit or banktransfer with the reasoncode.

= 2.1.5 =
* Improved webhook status updates handler

= 2.1.2 =
* fixed invalid payment ID in return URL

= 2.1.1 =
* fixed missing payment ID that triggers an error on checkout

= 2.1 =
* Updated Mollie API package to latest stable version
* Improved webhook handling for updating payment statuses

= 2.0.2 =
* Fixed error upon plugin activation when no API keys were present in the options

= 2.0.1 =
* Added language files and updated code for WordPress translations compliance

= 2.0 =
* First stable release with dynamic loading of all active payment gateways

== Upgrade Notice ==
