=== Plugin Name ===
Contributors: codyatseekom, keomony
Tags: seekom, ibex
Requires at least: 3.5
Tested up to: 3.8.1
Stable tag: 1.0.5

Users of iBex, add different booking widgets to your WordPress website.

== Description ==
This plugin is for users of the different [iBex packages](http://onlinepropertymanagementsystem.net). You must be a user of iBex for this plugin to work (as it links with your booking system).

This plugin is a version of the widgets found on [ibexplus.com](http://ibexplus.com). You can either use this plugin or install the widgets directly.

iBex is a cloud based online property management system/online booking system for hotels/motels/holiday parks/tours etc. [More information](http://onlinepropertymanagementsystem.net/) [Signup](http://ibex.seekom.com/wizard/?reseller=wordpress)

The booking widgets plugin works through the use of short codes. Each widget has its own unique code which can be placed in posts, pages and the sidebar.

Eg: `[ibw-bookingpage]` will place the iBex booking page. 
 
You can place each widget on a seperate page / area of your website.

== Installation ==

1. Upload `ibex-booking-widgets` to the `/wp-content/plugins/` directory
1. Activate the ibex-booking-widgets through the 'Plugins' menu in WordPress
1. Open the *Settings->iBex Widgets* options page and enter your *operator id* (this is the username of your main iBex login).
1. Add the Booking Page code to a page on your website, then set the default page to that page.
1. Add one of the shortcodes listed on the options page to a post/page in your website.

Note: Your plugins folder must be writeable for this to work (so it can build the theme files).

== Frequently Asked Questions ==
= Do I have to be an iBex customer to use this? =
Yes, you need to have an iBex account setup to use this plugin. See [this website](http://onlinepropertymanagementsystem.net/) for more information.

= Can't I just install the widgets normally? =
Yes you can, and you're welcome to if you want to. This plugin takes away some of the complexity involved with install the widgets (especially when it comes to WordPress).

= Can I use the shortcodes in the Appearance->Widgets section? =
Yes you can. Add a text widget and paste the short code in and it'll work.

= What about (widget name)? =
So far the booking pages (single & multi), date selector (vertical & horizontal), mini calendar and single-property last minute rate calendar widgets are included. If there's anything else you'd specifically like added, please raise a request with your account manager.

= I get a message saying "The jQuery version used in your website is out of date."! =
What this means is the jQuery library you're using is out of date and doesn't have the required data function. WordPress ships with the latest version natively, so make sure you've updated everything.
Otherwise what may be happening is a theme or plugin may be using its own version of jQuery (which is wrong) and preventing WordPress from using the latest version.

We don't have much control in this case, you'll need to try disabling each plugin until you can identify the one that's causing the issue.

= I get an error message! =
Errors should hopefully be caught, so if you run into something you can leave a message here. Most errors will be because something is conflicting with the plugin.

= Do I need to use a specific theme? =
Nope, this should work with any WordPress theme you can think of, as long as the theme doesn't do anything weird breaking the standard WordPress rules.

== Changelog ==
= 1.0.5 =
* Added the rmtype option to the single property booking page
* Cleaned up some of the underlying code so it's valid on newer PHP versions

= 1.0.4 =
Updating the booking page to fix the Firefox 22 issue ahead of its release.

= 1.0.3 =
Fixing an error that would stop the plugin from activating in some situations.

= 1.0.2 =
Fix: Horizontal date selector should work now

= 1.0.1 =
* Restoring the agent login panel when no RU is provided. To hide the panel completely, set the RU/Sales channel code to your operator ID.

= 1.0 =
* Complete rewrite of the code & the themeing options. This does mean you may have to reapply your widget shortcodes as their paramters may have changed.
* Added Rates Calendar (single property) as a widget
* Added Multi Property Booking Page as a widget
* Changed the way the Date Selector & Mini Calendar themes work/save
* Changed the backend code making it easier to add new widgets in the future

= 0.10 =
Adding in support for Google Analytics. You will need to setup GA already on your website (use another GA plugin) first.

= 0.9.3 =
Adding an option to force the booking page to always have scrollbars. In most cases this is not needed, but sometimes another script on your website will interfere preventing the bookings page from loading fully. This option means when this happens they customer will still be able to use the scrollbar and scroll the booking page.

= 0.9.2 =
Adding width & default height params to the booking widget. You can now specify width="500px" and height="200px" when placing the booking page.

= 0.9.1 =
Adding the rmtype param to all of the widgets. If you add rmtype=1234 then the final booking page when using that widget will only show room 1234 (you can specify multiple rooms using a ,).

= 0.9 =
Adding support for the Mini Calendar widget.

= 0.8.1 =
Updating the Safari fix for iPhone/iPads.

= 0.8 =
Fixing a fault introduced in Safari 5.1.4+ which prevented users from going past the first page of the booking scren.

= 0.7.1 =
Fixing up the horizontal date selector widget.

= 0.7 =
* Adding the horizontal/vertical date selector widgets.

= 0.6.1 =
* Fixing another fault with the javascript file which prevented the bookings page widget from loading.

= 0.6 =
* Fixing a fault with the javascript file preventing the bookings page widget from loading

= 0.5 =
* First public release
* Added Booking Page widget
* Added settings page

= 0.1 =
* Creation of the plugin

== Upgrade Notice ==
= 1.0.4 =
Updating the booking page to fix the Firefox 22 issue ahead of its release.

= 1.0.3 =
Fixing an error that would stop the plugin from activating in some situations.

= 1.0.2 =
Fix: Horizontal date selector should work now

= 1.0.1 =
Fixing an issue with the agent login part of the single property booking page.

= 1.0 =
The options page has changed quite a bit, please go back into it (ibex widgets) and check everything is set up correctly.

= 0.9.3 =
Adding an option to do with the bookings page on some websites.

= 0.9 =
Adding support for the Mini Calendar widget.

= 0.8.1 =
This release fixes an issue with iPhones and iPads with the booking page.

= 0.8 =
This release fixes an issue that was introduced with the latest version of Safari (5.1.4).

= 0.7.1 =
Fixing up the horizontal date selector widget.

= 0.7 =
New widgets added.

= 0.6 =
A fault with the bookings widget is fixed.

= 0.5 =
This is the first version that includes the working options page (no more file editing).