=== Beautiful Custom Invoices ===
Contributors: mokuapp
Donate link: https://mokuapp.io
Tags: invoices, clients
Requires at least: 4.7
Requires PHP: 5.6
Tested up to: 5.8
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Generate and send beautiful, custom invoices to your clients with ease.

== Description ==

Generate and send beautiful, custom invoices to your clients with ease.

= Features =

* Invoices
  * Create & manage invoices
  * Track invoices by status and due date
  * Multiple custom taxes
  * Print to PDF
  * Customizable logo and template, CSS
* Bank accounts
* Clients
  * Create & manage clients
  * Custom fields
* Company details
  * Edit default company details
  * Custom fields
  * Default taxes
* Dark and light mode!
* Multilingual
* PWA support

== Installation ==

1. Upload `bci` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Development ==

This plugin wraps [Serverless Invoices](https://github.com/mokuappio/serverless-invoices) Vue application and uses Wordpress' REST API for it's backend.
To make adjustments & build the Serverless Invoices Vue application follow these steps:

1. Pull the latest version of Serverless Invoices via `npm run clone`
2. Build the Serverless Invoices vue app `npm run build`

== Frequently Asked Questions ==

= Can I add multiple custom taxes? =

Yes, you can add any tax scheme.

= Can I save my invoice as PDF? =

Yes, you can print to PDF.

= Do you have X feature? =

We are happy to add your requested feature if it benefits other users as well.

== Screenshots ==

1. Track your invoices
2. In-line editing
3. Dark and light mode
4. Custom fields and taxes
5. Custom CSS
6. Multilingual

== Changelog ==

= 1.0 =
* Initial release
