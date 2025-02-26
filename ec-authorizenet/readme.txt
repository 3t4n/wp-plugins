=== EC Authorize.net ===
Contributors: sftranna
Donate link: http://ecarobar.com/donate
Tags: Payment, payment gateway, Authorize.net, Paypal, Stripe, 
Requires at least: 3.0.1
Tested up to: 4.7.2
Stable tag: 0.3.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

EC Authorize.net is easy to use Wordpress Plugin and can be installed in just a few minutes.

== Description ==

EC Authorize.net is easy to use Wordpress Plugin and can be installed in just a few minutes.

Authorize.net is most widely used payment gateway to process payments online and accepts Visa, MasterCard, Discover and other variants of cards.

Recurring Payments option is added in version 0.3

Non-profits and eCommerce sites will using EC_Authorize.net to Quickly and Easily add one time and donations/Payments to their websites. 
It works with your existing Wordpress theme and content. No changes required. Just install and start getting payments/donations through Authorize.net. 


Your Thoughts => http://ecarobar.com/ec-authorize-net/

Sample Usage: [authorize_net amount=56]

== Installation ==
This section describes how to install the plugin and get it working.
e.g.

1. Upload `ec-authorize-net` to the `/wp-content/plugins/` directory

2. Activate the plugin through the 'Plugins' menu in WordPress

3. Use Shortcode [authorize_net] in your page/post/custom post

4. Use Shortcode [authorize_net] in your page/post/custom post

5. Use Shortcode [authorize_net_arb] in your page/post/custom post for the recurring form.



Available Options are amount, custom_amount. Where Amount is an integer value while custom_amount is True/False

== Frequently Asked Questions ==
= Can I request a new feature or custom development? =
Sure, I would be more than happy to help you. Please share your thoughts through sftranna@gmail.com

= How can I Specify an amount thought shortcode =
This is quite simple You can use [authorize_net amount=56]. Amount in the Shortcode has highest priority. 

= What is the priority wise hierarchy of the amount =
Amount can be specified at three levels as below 

1. Shortcode (Highest priority)

2. Admin Panel

3. Plugin's default (Don't mess with it as this is in code) (Least priority) -- deprecated

= I dont Like the current Payment Button, Can I update =
Yep, In Admin panel Upload your favourite Image comy it's path and path this path/image link in "Submit Button Image" field.

= May I get some sample Usage of the shortcode?? =
Yep Sure, You can Use following

1. [authorize_net]

2. [authorize_net amount=56]

3. [authorize_net custom_amount=true]

4. [authorize_net_arb] Use this shortcode in your post/Page for the recurring form.

== Screenshots ==
1. screenshot-1.png
2. screenshot-2.png

== Changelog ==
I recieved many request to include recurring  payment option in the Plugin so things are worked out and included in version 0.3.


Based on your suggestions and comments plugin is updated to version 0.2.
Changes in this version includes

1. Updated Header text on receipt page

2. Added invoice number in payment form

3. Added in admin enable/disable invoice number field 

4. Added div around form for styling id=ec_authorize_form_div and class=ec_authorize_form_div

5. Updated the label for  transaction mode "live" is now "live (Production Environment)"

6. Added Recurring Payment subscription in version 0.3.

Please keep posting you suggestions and bugs. We will Incorporate your suggestions in next version.

Thanks 
= 0.1 =
First Version.
= 0.2 =
1. Updated Header text on receipt page

2. Added invoice number in payment form

3. Added in admin enable/disable invoice number field 

4. Added div around form for styling id=ec_authorize_form_div and class=ec_authorize_form_div

5. Updated the label for  transaction mode "live" is now "live (Production Environment)"
= 0.3 =
1. Remove the old plugin and Install this plugin with the name "eCaroBar Authorize.net_arb"

2. Use the shortcode [authorize_net_arb] in your post for the recurring form.
and test the recurring feature. 
3. All the listing will be displayed in your admin panel. Please let me know if you face any problem.

4. (Old) short codes for the simple payment form are still valid like 
5. [authorize_net amount=56]
6. [authorize_net]
7. [authorize_net custom_amount=true]

= 0.3.1 =
1. Added support for jQuery Version 1.9
2. Fixed bug for custom amount

= 0.3.2 =
1. Updated the invoice number field to accept all characters.

= 0.3.3 =
1. Replaced $amount, $api_login_id, $transaction_key, $amount, $fp_timestamp, $fp_sequence with $amount, $api_login_id, $transaction_key, $fp_timestamp, $fp_sequence on 348
2. Replaced $amount, $api_login_id, $transaction_key, $amount, $fp_timestamp, $fp_sequence with $amount, $api_login_id, $transaction_key, $fp_timestamp, $fp_sequence on 350


== Upgrade Notice == 
Although this plugin does not disturb your site settings still for a security measure please backup your data before upgrading 

== Arbitrary section ==
You can use shortcode as following

1. [authorize_net]

2. [authorize_net amount=56]

3. [authorize_net custom_amount=true]

4. Some Terms Used for Deletion

5. Deleted Remotely : Your subscription is successfuly deleted from Authorize.net remote server

6. Single Delete : Shows that this subscription is deleted from your local database although still visible for a record. But could not be deleted from authorize.net because this is already deleted from there.

Have a look at [WordPress]http://ecarobar.com/ec-authorize-net/
