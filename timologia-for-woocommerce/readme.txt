=== Timologia for WooCommerce ===
Contributors: John Athanasiou, exentric
Tags: invoice, woocommerce, checkout, checkout fields, timologio, τιμολόγιο, timologia, τιμολόγια
Requires at least: 4.0
Tested up to: 6.1
Stable tag: 2.6.2
WC requires at least: 2.2
WC tested up to: 7.1.0
License: GNU General Public License V3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.txt

Add invoice functionality to checkout page and adds editable fields to user profile and to order page per Greek standards

== Description ==

Add invoice functionality to checkout page and adds editable fields to user profile and to order page per Greek standards

#### Features

* Ads required fields for invoicing in checkout page (vat, tax office and profession)
* Choose if you want the Company Field to be moved to the invoice fields 
* Checks if user has asked for invoice and makes the fields required
* Inserts the fields on back end user profile page, so admin can view or edit them
* Displays field in admin order details, admin can pull them from user profile in case of phone order and edit them
* Includes invoice fields in emails send to customers
* [DEMO of free version >>](https://dev.exentric.gr/free-version/)<br /><br />

> **Timologia for WooCommerce PRO**<br />
> [DEMO PRO >>](https://dev.exentric.gr/)<br /><br />
> This plugin offers a pro version which comes with the following features:<br /><br />
> - Coming Soon POL39<br />
> - Get VAt details from AADE in backend and create customer account<br />
> - Coming Soon PDF invoice with own numbering, PDF Receipt with own numbering<br />
> - Customers VAT gets validated against AADE tool and fields are filled in automatically<br />
> - CHANGE THE TEXT IN DROPDOWN FROM Yes - No, to whatever you want e.g. Invoice - Receipt<br />
> - Marks all fields with the required css<br />
> - Choose to move the company field with the timologio fields<br />
> - If you choose to move the company field it becomes required<br />
> - Customers VAT gets validated against the EU VIES tool<br />
> - IF the VAT fails the check, order will not proceed and customer will be notified<br />
> - If VAT is validated, the responce from VIES is recorded in the admin order screen<br />
> - Option to disable VAT validation<br />
> [Upgrade to Timologia for WooCommerce PRO >>](https://www.exentric.gr/web-design-blog/woocommerce/woocommerce-vat-validation.htm)

#### Requirements:

* WordPress version: 3.5.1+
* Apache version: 2.1+
* PHP version: 5.4+

== Installation ==

Please consult WordPress plugin [installation guide](https://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

== Frequently Asked Questions ==

For any extra support please visit [exentric web design](https://www.exentric.gr).

== Screenshots ==

1. Checkout page with fields
2. User profile on back end with fields inserted
3. Back end order with fields 
4. Back end order with fields editable by admin
5. Choose to move company field
6. Put required class on vat fields
7. VIES return fields saved in order page
8. VAT validation fail on checkout page

== Changelog ==

#### 2.6.2

* Minor language changes

#### 2.6.1

* Fixed undefined index notice 

#### 2.6

* Added settings tab in woccommerce settings 
* Added option to move company field to Invoice fields

#### 2.5

* Removed showing optional on all fields even when VAT invoice is selected
* Added css for some themes that hide the label 

#### 2.0.1

* Fixed problem with required fields

#### 2.0.0

* Fixed php warnings
* Woocommerce 3.5 compatible

#### 1.0.2

* Fixed order details to show Yes or No instead of Y / N 

#### 1.0.1

* Fixed yes/no selection not translating with WPML

#### 1.0

* Initial release
