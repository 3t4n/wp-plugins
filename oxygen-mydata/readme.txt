=== Oxygen MyData for WooCommerce ===
Author: oxygensuite
Author URI: https://www.pelatologio.gr/
Plugin URI: https://wordpress.org/plugins/oxygen-mydata/
Contributors: oxygensuite, spyrosvl
Tags: oxygen, mydata, invoices, woocommerce invoices , invoices Greece
Requires at least: 5.5
Tested up to: 6.7.2
WC requires at least: 4.7
WC tested up to: 9.6.2
Version: 1.0.56
Stable tag: 1.0.56
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Automate your WooCommerce store and accounting by syncing orders and more between WooCommerce and Oxygen Suite.

== Description ==

Automatically issue invoices & receipts from your eshop.

Connecting the eshop (woocommerce) with your Oxygen ERP is now an extremely useful tool for your business. This interface permits the optimization of all operations and saves valuable time.

Oxygen offers a complete solution with the Oxygen WooCommerce plugin, which allows eshops to be connected with Oxygen Pelatologio ERP using an API Key.

With the woocommerce plugin from Oxygen you can:

-Transfer orders from eshop to ERP
-Automatically create customer contacts from eshop to Oxygen
-Automatically issue of receipts and invoices in Oxygen without additional ECR (using the myData provider)
-View and automatically send PDF documents to customers
-Manage order status
-NEW: Ability to select Oxygen Checkout for card billing

**An account with https://www.pelatologio.gr/ is required.**

== Installation ==

1. Choose to add a new plugin, then click upload
2. Upload the oxygen-mydata zip
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Setup the plugin via WooCommerce -> Settings -> Oxygen

== Frequently Asked Questions ==

=  Is it possible to have a test account? =

Yes. Contact us to help you in order to log in with a test account in the environment.

= How does Oxygen Checkout works =

During Checkout along with all other payment methods (cash on delivery, bank deposit, etc.), the option “Oxygen Payments (Debit/Credit Card)” appears, a secure payment environment opens and the customer can complete the transaction.

= Can I issue receipts through Oxygen Woocommerce Plugin? =

Yes. You can issue receipts as Oxygen Pelatologio is a certified e-invoicing Provider from ΑΑDΕ.

= Where can I find the API key? =

You can have the API Key from https://www.pelatologio.gr/ if you have an active account on the ERP or Cloud Cash Register.

= Will it work with the data that my clients already have? =

You can select the fields your customers already have with the data required by myData. The plugin can create these fields to be filled by your customer when completing the order.

= Will it automatically generate an invoice? =

Yes! There is an option on the plugin's settings page.

= Can my customers view and download the invoice or the receipt? =

Yes. A download button will appear in the customer's order list once the invoice or receipt is issued.

= Can a tech support specialist connect remotely for help in case of a problem? =

Yes. An Oxygen tech support specialist can be connected through a remote desktop for 2 hours with your developer with an extra fee.

== Screenshots ==

1. Oxygen Payments on Payments Methods WooCommerce
2. Oxygen Payments option on Checkout page
3. Oxygen Payment Modal
4. Oxygen Payment Modal Android Devices
5. Oxygen Payment Modal Apple Devices
6. Oxygen settings 1
7. Oxygen settings 2
8. Oxygen settings 3
9. Oxygen settings in Greek 1
10. Oxygen settings in Greek 2
11. Oxygen settings in Greek 3
12. Oxygen settings in Greek 4
13. Oxygen settings in Greek 5
14. Orders page WooCommerce download/view Oxygen documents
15. Oxygen metabox on order edit screen
16. My account page invoice view action

== Notes ==
- Ensure WooCommerce is active before using this plugin.
- You must have an account in pelatologio app

== Changelog ==

= 1.0.56 =
* Add extra conditions for address field check on create contact

= 1.0.55 =
* Fixed bug with address field for invoices

= 1.0.54 =
* Fixed bug with multiple identical contacts

= 1.0.53 =
* Fixed check for GR only vat numbers, not allow more than 9 digits
* Fixed on invoice email set language according to order's language

= 1.0.52 =
* Minor fixes

= 1.0.51 =
* Fixed oxygen payments enable/disable , get payments on click toggle oxygen payment gateway (reduce traffic /api calls)

= 1.0.50 =
* Fixed bug with the notices documents emails not able to sent

= 1.0.49 =
* Fixed at notices the duplicate contacts with same email , added identical contact check

= 1.0.48 =
* Fixed bug with documents attachments on email (on document creation an email send via a new email template)
* Fixed language on order infobox el/en
* Fixed bug with duplicate payment in app pelatologio , when order's payment way is oxygen-payment on checkout page
* Add new button on order's (oxygen column / box) , in order to send document as attachment to customer's email

= 1.0.47 =
* Fixed get selected logo for documents

= 1.0.46 =
* Minor fixes

= 1.0.45 =
* Fixed bug for empty item not get sku

= 1.0.44 =
* Fixed contacts for creating alp/apy documents - added check for identical contact on order's metadata compared to pelatologio app contact
* Fixed bug for duplicate documents creation on bulk actions buttons

= 1.0.43 =
* Remove notices from my account page

= 1.0.42 =
* Added ability to create as many notices as wp-admin wants from order's edit page

= 1.0.41 =
* Fixed bug on Oxygen Settings page , new option for default payment methods crushed the page (line 499)

= 1.0.40 =
* Added new option for default payment method, when an order has not any payment method, applied the selected default payment method
* Removed notice message for Oxygen Payments after dismiss it

= 1.0.39 =
* Minor fixes for caching(versioned) js files - using latest version

= 1.0.38 =
* Minor fixes for checking vat on checkout page (VIES)

= 1.0.37 =
* Fixed bug for (VIES) on checkout page,in case the input field billing_country , is set and locked to specific country

= 1.0.36 =
* Add extra messages during new contacts creation , when an invoice/receipt created - missing data fields

= 1.0.35 =
* minor fixes

= 1.0.34 =
* Fixed bug for oxygen payments , on user's pay order page
* Documents pdf no longer save in oxygen folder , because of waste of space
* Added option to use always parent sku code for variations products , on oxygen settings
* Change buttons and texts design on admin' s orders main page in woocommerce
* Change buttons and texts design in order's page meta box data

= 1.0.33 =
* Fixed bug with email attachments with order's details , oxygen plugin attaches document on order's details and send it to customer email (**SOS** option oxygen_order_attachment must be checked)

= 1.0.32 =
* Fixed contacts (company/client contact in pelatologio app) for creating invoice/notices (one company contact allowed per vat number)
* Added different button's and text's labels for receipts/invoices/notifications, on admin' s order panel, user's orders page and order processing page
* Fixed bug not showing created documents on user's orders page if self_fields option was enabled in oxygen settings panel
* Fixed bug if trp was null , get_checkout_language returned empty string ( by default returns EL )
* New add of plugin's settings manual pdf (on oxygen settings page)

= 1.0.31 =
* New option (yes/no) on oxygen settings page - fetch invoice data via vat number ( VIES supported )
* New feature - Search and fill company's mandatory fields for invoice creation via vat number field on checkout page
* VIES search if EU country is used for checkout
* Fixed bug with invoice language , now it gets the language from order metadata

= 1.0.30 =
* Add at oxygen settings page , an option for printing type of receipts (80mm or a4)

= 1.0.29 =
* Fixed oxygen payments modal window position fixed always center of the page

= 1.0.28 =
* Fixed oxygen payments modal window (conflicts for some bootstrap versions css)
* Add translations texts for oxygen payment modal

= 1.0.27 =
* Fixed TPDA/TPY on empty email create new contact, if exist vat number

= 1.0.26 =
* Add create new contact for empty email (on checkout)

= 1.0.25 =
* Add extra checks for billing invoice checkbox and add contact on creating invoice/notice ( oxygen log file )
* Add a language option in oxygen settings panel , in order to select  of invoice/notice according to eshop language

= 1.0.24 =
* Fixed bug bool|string return type for php < 7.4

= 1.0.23 =
* Add new option about oxygen payments order status (after successful payment)
* Fixed SKU codes on variations products (product codes in app have to be the same with Woocommerce SKU)
* Fixed on auto creation checkout fields checkbox is checked then hide the rest fields vat, tax office etc oxygen settings
* Add download button in oxygen settings tab admin for system report latest oxygen log file
* Add download in oxygen settings tab admin for plugin's settings
* Fixed contacts creation during creation of invoice
* Fixed bug in oxygen payments ( print error message on oxygen log file )

= 1.0.22 =
* Fixed debug log oxygen payments
* Fixed if a payment way is disabled not show in oxygen payments methods

= 1.0.21 =
* Fixed broken url for oxygen payment

= 1.0.20 =
* Fixed assets for oxygen payments gateway

= 1.0.19 =
* Add frequently questions and answers
* Minor fixes

= 1.0.18 =
* Added Oxygen Payments gateway
* Fixed bug with variations products sku
* Increase requests timeout to 15 seconds

= 1.0.17 =
* Minor PHP related bug fixes
* Fixed variation SKU data

= 1.0.16 =
* Minor PHP related bug fixes

= 1.0.15 =
* Improved debug logging

= 1.0.14 =
* Added checkout company field check on invoice request

= 1.0.13 =
* Added API user look up by email
* Added invoice request check by various values
* Added checkout checks for required fields on invoice request
* Added actions to trigger document creation on bulk order status change
* Updated Greek translation
* Fixed switching the essential checkout fields to required when invoice is selected
* Fixed E_ERROR on API PDF look up by invoice ID
* Fixed wrongly create invoices when VAT ID is set but invoice is not requested
* Fixed document not created when email to customer is not enabled
* Removed not longer needed shutdown WP tweak

= 1.0.12 =
* Fixed WordPress caching issue
* Fixed user data auto load on manually created orders

= 1.0.11 =
* Fixed duplicate documents on button double click
* Fixed notice auto creation error

= 1.0.10 =
* Fixed minor logical PHP error with custom logos

= 1.0.9 =
* Added shipping code option
* Added the option to choose Default Invoice Document Type on order status
* Added order number on the infobox API field
* Added color labels on admin column for documents
* Added document attachment on WooCommerce emails
* Added logo image option on documents
* Better vat info fields handling on checkout
* Updated translation files

= 1.0.8 =
* Added empty plugin values on WooCommerce terms entry
* Forcing rounded values for vat and net amount of the orders to be sent to the API
* Better vat info handling
* Updated translation files

= 1.0.7 =
* Fixed invoice/notice auto creation
* Fixed language settings not saving
* Added default payment status for invoices and notices
* Added language support for invoices and notices

= 1.0.6 =
* Fixed coding typo

= 1.0.5 =
* Fixed sequence number for notices
* Fixed category for order fees
* Fixed customer being empty when switching between live and sandbox mode
* Added extra headers on API requests

= 1.0.4 =
* Fixed classification assignment
* Added the option to issue multiple notices

= 1.0.3 =
* Fixed 3rd party user fields selection values
* Added receipt default types and categories
* Added support for coupons
* Added support for not activated payment methods setup
* Added support for WooCommerce 7.0.0

= 1.0.2 =
* Minor code fixes
* Created additional messages and alerts

= 1.0.1 =
* Fixed wrong API key error
* Fixed live API URL
* Fixed default myData values
* UI improvements
* Added notice functionality
* Fixed duplicate client creation in the Oxygen platform

= 1.0.0 =
* Initial plugin release.

== Upgrade Notice ==

= 1.0.0 =
* Initial plugin release.
