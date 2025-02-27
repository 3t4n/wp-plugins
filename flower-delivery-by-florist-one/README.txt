=== Flower Delivery by Florist One ===
Contributors: floristone
Plugin Name: Flower Delivery by Florist One
Plugin URI: https://www.floristone.com/wordpress
Tags: flower delivery, send flowers, florist, flowers, affiliate program, commissions, flowershop, flower shop, local
Author URI: https://www.floristone.com
Author: Florist One
Requires at least: 4.1
Tested up to: 6.5.5
Stable tag: 3.9.1
Version: 3.9.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Sell fresh flowers on your website with our free plugin and receive a 20% commission on every sale. Florist One handles delivery to the United States and Canada using our network of 15,000 local florists. You make the sale, we take care of order fulfillment, Customer Service and everything else. No integration is needed with any commerce plugin. You don't even need an SSL certificate though you can use yours if you have one. Install our plugin in minutes and start selling flowers on your website!

Data for the plugin is from [Florist One](https://www.floristone.com/):

* [Terms and conditions can be found here](https://www.floristone.com/affiliate/aff_manager/index.cfm?fuseaction=newaff)  in the Affiliate Agreement
* [Our privacy policy can be found here](https://www.floristone.com/privacy.cfm)


== Installation ==

1. Download plugin as zip
2. Install through the 'Plugins' menu in WordPress > Add Plugin > Upload Plugin
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Follow the link to Florist One to sign up for a Florist One Affiliate ID
4. Click 'Flower Delivery' in admin dashboard menu and input your Florist One Affiliate ID
5. Place shortcode [flower-delivery] anywhere you want the Flower Storefront to appear
6. You will receive an email each time a flower sale is made or login to your Affiliate Control Panel at Florist One to track flower sales

== Upgrade Notice ==

3.9.1

Fix for XSS

3.8

* tested on Wordpress 6.5.5
* tested with PHP 8.3
* defined show_trees and choose_colors in admin
* function to check if checkout data exists and add to session
* defined variables for recipient state list
* fix for my cart total not showing correctly
* fix to design colors in admin when saving and using custom colors
* remove facility_id from checkout data

3.7

* tested on Wordpress 6.2
* tested with PHP 8.1
* style to center flower images on mobile
* fix for facility ID not saved in options by removing spaces in API URL
* created one function for API calls using PHP CURL
* used CURL options to increase API response time
* display flowers after payment with order number, remove order number in URL

3.6

* important fix for servers using openssl update to 3.0


3.5.15

* fix for custom color options not showing in admin

3.5.14

* add dropdown in Deliver To for multiple locations in checkout

3.5.13

* disallow autocomplete on recipient page, as it was being filled incorrectly

3.5.12

* fixed encoding bug on orders

3.5.11

* footer removed for modal / popup including, checkout button
* tree certificate added to plant trees

3.5.10

* fix for html code showing in customer service pop up
* added font-size css to row and col class to prevent conflicts of font size on menu and plant trees
* fix for variable escape in admin display


3.5.9

* added escaping functions for plant trees button

3.5.8

* fix trees in cart not working in modal
* fix checkout sanitizing and escaping
* fix escaping in shopping cart

3.5.7

* added terms and conditions, privacy policy to the readme
* fix escape for countries
* fix Internationalize function, replacing text_domain with flower-delivery-by-florist-one

3.5.6

* added further security with further sanitizing and escaping
* calling bootstrap remotely

3.5.5

* added further security with further sanitizing and escaping


3.5.0

* increase security on incoming and outgoing data by sanitizing and escaping
* improved email validation regex

3.1.0

* New look to plant trees
* New parameter to add country, &cou=
* New parameter to see plantree or flowers &show=flowers, $show=trees
* Fixed message when trees and plants are added to cart

3.0.4

* correction to how cart count is retrieved when there is no cart to eliminate session_start error.

3.0.3

* fix for session_start error for multisite
* add a shadow around tree image

3.0.2

* fix for console error Cannot read properties of null (reading 'addEventListener'), replaced javascript with jQuery
* center more button on category pages

3.0.1

* Correct styling issues, center text
* inherit font-size for text
* correct facility_id on checkout


3.0.0

* New responsive framework
* New setting option to show flowers first for only Funeral & Sympathy products
* Plant trees option on all products
* One-page checkout
* Accessibility option to change text size
* Elegant and modern look
* New setting option to use custom colors
* Compatibly checked with WordPress 5.9 and PHP 8

2.6.2

* debug php 8 error for settings

2.6.1

* label change to Plant Trees

2.6.0

* Bug fixes related to facilities, facility_id

2.5.5

* Allow for Sender Display Name to be entered and displayed on Tree Certificate

2.5.0

* Allows for international orders
* Allows for additional countries in addition to CA and US in countries in Bill To information
* Conditional fields based on the country selected for Postal Code and State

2.3.0

* Validation and trimming for all checkout fields (phone, email)
* Resolve conflicts with PHP 8

2.2.1

Important payment key change

2.2.0

Added plant tree in loving memory option for Funeral & Sympathy

== Screenshots ==

1. Category pages.
2. Individual item popup.
3. Easy to configure settings and options.
4. Highly configurable to match your website.


== Changelog ==

3.9.1

Fix for XSS

3.8

* tested on Wordpress 6.5.4
* tested with PHP 8.3
* defined show_trees and choose_colors in admin
* function to check if checkout data exists and add to session
* defined variables for recipient state list
* fix for my cart total not showing correctly
* fix to design colors in admin when saving and using custom colors
* remove facility_id from checkout data

3.7

* tested on Wordpress 6.2
* tested with PHP 8.1
* style to center flower images on mobile
* fix for facility ID not saved in options by removing spaces in API URL
* created one function for API calls using PHP CURL
* used CURL options to increase API response time
* display flowers after payment with order number, remove order number in URL

3.6

* important fix for servers using openssl update to 3.0

3.5.15

* fix for custom color options not showing in admin

3.5.14

* add dropdown in Deliver To for multiple locations in checkout

3.5.13

* disallow autocomplete on recipient page, as it was being filled incorrectly

3.5.12

* fixed encoding bug on orders

3.5.11

* footer removed for modal / popup including, checkout button
* tree certificate added to plant trees

3.5.10

* fix for html code showing in customer service pop up
* added font-size css to row and col class to prevent conflicts of font size on menu and plant trees
* fix for variable escape in admin display

3.5.9

* added escaping functions for plant trees button

3.5.8

* fix trees in cart not working in modal
* fix checkout sanitizing and escaping
* fix escaping in shopping cart

3.5.7

* added terms and conditions, privacy policy to the readme
* fix escape for countries
* fix Internationalize function, replacing text_domain with flower-delivery-by-florist-one

3.5.6

* added further security with further sanitizing and escaping
* calling bootstrap remotely

3.5.5

* added further security with further sanitizing and escaping

3.5.0

* increase security on incoming and outgoing data by sanitizing and escaping
* improved email validation regex

3.1.0

* New look to plant trees
* New parameter to add country, &cou=
* New parameter to see plantree or flowers &show=flowers, $show=trees
* Fixed message when trees and plants are added to cart

3.0.4

* correction to how cart count is retrieved when there is no cart to eliminate session_start error.


3.0.3

* fix for session_start error for multisite
* add a shadow around tree image

3.0.2

* fix for console error Cannot read properties of null (reading 'addEventListener'), replaced javascript with jQuery
* center more button on category pages

3.0.1

* Correct styling issues, center text
* inherit font-size for text
* correct facility_id on checkout

3.0.0

* New responsive framework
* New setting option to show flowers first for only Funeral & Sympathy products
* Plant trees option on all products
* One-page checkout
* Accessibility option to change text size
* Elegant and modern look
* New setting option to use custom colors
* Compatibly checked with WordPress 5.9 and PHP 8

2.6.2

* debug php 8 error for settings

2.6.1

* label change to Plant Trees

2.6.0

* Bug fixes related to facilities, facility_id

2.5.5

* Allow for Sender Display Name to be entered and displayed on Tree Certificate

2.5.0

* Allows for international orders
* Allows for additional countries in addition to CA and US in countries in Bill To information
* Conditional fields based on the country selected for Postal Code and State

2.3.0

* Validation and trimming for all checkout fields (phone, email)
* Resolve conflicts with PHP 8

2.2.1

Important payment key change

2.2.0

Added plant a tree in loving memory option for Funeral & Sympathy

1.0.4

Compatibility for WordPress 4.6

1.1.2

SSL no longer required for a secure order.

1.1.3

Page title bug fixed

1.1.4

Compatibility for WordPress 4.7

1.2.0

Added options for holiday / special occasions categories of flowers to be added to menu.

1.3.0

Adding new functionality for choosing particular florists

1.5.0

Critical update for non-ssl payment form users. Customers will not be able to check out after 5/31/17 if this plugin is not updated to this version (1.5.0).





== Frequently Asked Questions ==

= What is the Flower Delivery service by Florist One? =

Flower Delivery by Florist One lets you offer florist delivered flowers on your website. Flowers are delivered by Florist One and our network of 15,000 local florists. We handle all aspects of order fulfillment and Customer Service and you are paid a 20% commission on every sale.

= Is there a cost to use the Flower Delivery Plugin? =

No, the Flower Delivery Plugin is free to install and there are no on-going costs. We pay you a 20% commission when flowers are sold.

= Do I need an SSL certificate? =

No, you do not need an SSL certificate. Florist One provides you with a secure way for your visitors to buy flowers without having your own SSL. However, if you do have your own SSL, the Flower Delivery Plugin automatically detects that you have a plugin and it will be used for Checkout.

= How do I sign up for the Affiliate Program? =

Flower Delivery is used in conjunction with the Florist One Affiliate program. When you install the plugin, the Settings panel has a link through which visit Florist One to signup and obtain an Affiliate ID. This Affiliate ID is then entered into the Settings tab and is used to track your sales.

= How can I check my sales? =

Visit: https://www.floristone.com/affiliate/aff_manager/index.cfm and login with your Affiliate ID and password and run a report.

= Who handles Customer Service? =

Florist One handles all Customer Service on the orders. One of the tabs on the Flower Delivery is Customer Service which has our contact information. When flowers are sold, the customer also receives an Order Confirmation email with our contact information.

= Who delivers the flowers? =

Florist One handles the delivery through our network of 15,000 local florists in the US and Canada. Flowers are hand-delivered by local florists.

= How do I get paid? =

We pay by check on the first of the month for prior month sales. We require a $150 in sales to mail out a check, if you do not meet that threshold, your sales will carry forward to the following month. If you are overseas, we will pay you by PayPal.

= Do I have to be the in US and Canada to install the Flower Delivery Plugin? =

No you can be anywhere in the world and use the Flower Delivery. However, Flower Delivery offered by the plugin is only available in the United States and Canada.
