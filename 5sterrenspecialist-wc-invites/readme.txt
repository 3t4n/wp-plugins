=== 5sterrenspecialist invite ===
Contributors: 5sterrenspecialist
Tags: 5sterrenspecialist, 5-sterrenspecialist-invite, rich, snippets
Requires at least: 4.6.0
Tested up to: 6.6.2
Stable tag: 1.1
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin is made by 5sterrenspecialist.nl to automatically invite WooCommerce clients to leave a review.

== Description ==
This plugin is made by 5sterrenspecialist.nl to automatically invite WooCommerce clients to leave a review.

== Installation ==
The company ID and Password / Hash can be found in the example script on https://www.5sterrenspecialist.nl/dashboard/5-sterrengroeipromotor/automated-reviews
For blacklisted domains, separate by comma. For example: bol.com, amazon.com

== Frequently Asked Questions ==

Does this plugin require the other 5-sterrenspecialist plug-in?

Both plugins work separately. The ‘Rich Snippet’ plugin is made to show the review score. This plugin connects WooCommerce to the 5-sterrenspecialist API.

 
Where do I find the ‘Company ID’ and ‘Password / Hash’?

This can be found in the example script on https://www.5sterrenspecialist.nl/dashboard/5-sterrengroeipromotor/automated-reviews

 
Does it export all orders?

It only connects to the 5-sterrenspecialist when an order is set to completed (afgerond).

What is the ‘blacklisted domain’ function for?

When using 3th party integrations like bol.com, it is not recommended to invite them to leave a review (as bol.com has its own review system). For each bol.com client, it uses a *@bol.com e-mail address. By excluding this domain, the webshop won’t invite these clients.

How long does it take before I can see the WooCommerce clients in the 5-sterrenspecialist dashboard?

There can be a delay of a couple of hours before it shows up in the ‘Exporteer klantgegevens’ area.


Why isn’t my review invite send?

Besides the delay (which can be set in the settings), not all review invites are send. In case somebody ordered shortly before, a double invite is not recommended and the invite won’t be send. With the ‘debug-mode’ on, the API response will provide the status.

== Changelog ==
1.0: Final version for 5-sterrenspecialist clients

1.1: Fixed bug with blacklist and subdomains 

== Upgrade Notice ==
The latest version for max stability