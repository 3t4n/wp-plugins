=== Action Runner by The Rite Sites ===
Contributors: theritesites
Donate link: https://www.theritesites.com
Tags: Hooks, Templating, Actions, Filters
Requires at least: 4.0
Requires PHP: 7.0+
Tested up to: 5.6
Stable tag: trunk
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

New Blocks can often ignore action and filter hooks in php or theme templates. This plugin hopes to solve that using shortcodes!

== Description ==
With the increasing popularity of blocks, developers and store owners alike have been finding some templating features missing normally available through the use of PHP and [WordPress Hooks](https://developer.wordpress.org/plugins/hooks/).
The WordPress community is [hard at work](https://www.npmjs.com/package/@wordpress/hooks) to create the extensibility tools and framework that exists in PHP into javascript, but some of the tools are not quite there!

This plugin creates a couple new shortcodes to help bridge the gap temporarily, as well as help users/admins with "templating" without going into your theme or plugins.

The first shortcode is in relation to [WordPress Actions](https://developer.wordpress.org/plugins/hooks/actions/) and aptly follows the parameter naming convention.
`
[action_runner_trs name="woocommerce_before_cart"]
`

The second shortcode, in relation to [WordPress Filters](https://developer.wordpress.org/plugins/hooks/filters/)
`
[filter_runner_trs name="woocommerce_shipping_estimate_html" content="Shipping options will be updated during checkout."]
`

There are serious limitations these shortcodes have to offer users. The functions do_action() and apply_filters() can have complex code attached to them, and may rely on global variables that are typically accessible on pages the Hooks have existed on.
The code is written in a way that even in the block editor, the shortcodes will not attempt to execute in the administrative side of your website. This is especially notable as the Block Editor attempts to render the code of a shortcode as a preview and writing in the database as post_content.
We recommend users to put this plugin on a staging server and do a test of the specific Hooks you would like to use on the applicable page(s) as to not break any user experiences.

Originally designed to work with the [WooCommerce Blocks](https://wordpress.org/plugins/woo-gutenberg-products-block/) Cart and Checkout pages, we needed to enable users to have the message that notified users can apply their [Points and Rewards](https://woocommerce.com/products/woocommerce-points-and-rewards/),
it also works with plugins that hook into upsell actions or couponing like [Pretty Coupons](https://www.theritesites.com/plugins/pretty-coupons-for-woocommerce/), [Smart Coupon](https://woocommerce.com/products/smart-coupons/), or even your own custom action, which can be created on the fly!

This plugin pairs nicely with getting custom solutions to your front end quickly for testing or quick notices on your website, especially when using a snippets plugin.


== Installation ==

1. Upload `action-runner-by-the-rite-sites` to the `/wp-content/plugins/` directory or download the zip directly from the plugin directory.
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==


== Screenshots ==


== Changelog ==

= 1.0.0 =

* Initial release


== Upgrade Notice ==
