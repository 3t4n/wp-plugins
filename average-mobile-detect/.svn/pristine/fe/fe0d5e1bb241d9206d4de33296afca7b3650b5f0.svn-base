
=== Average Mobile Detect ===

Contributors: average.technology,joerhoney
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7AF7P3TFKQ2C2
Tags: mobile, mobile detect, mobile detection, mobile redirect, mobile site redirect, mobile redirection, mobile site redirection, 301 redirect to mobile site, mobile device, redirect mobile device, desktop site to mobile site redirect
Requires at least: 3.0.1
Tested up to: 4.1
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Redirects mobile traffic to mobile site, allows visitors to opt for desktop site, provides shortcodes and widget to generate links to mobile site

== Description ==

> **Notice**
> Average is changing its name to AddFunc (thank goodness). Therefore, this plugin has been republished as [AddFunc Mobile Detect](https://wordpress.org/plugins/addfunc-mobile-detect/). The "AddFunc version" is compatible with the "Average version," so installation and activation is risk-free. This also enables you to manually transfer all of your redirects to the "AddFunc version" if you're going to switch to it (although some values will automatically carry over from the "Average version"). Keeping both versions running simultaneously after transferring your redirects however, is not recommended. The "Average version" will remain available with minimal support until it becomes a burden for AddFunc (probably for many years to come, as of 2014). Any new features will only be added to the "AddFunc version," so it is of course the recommended version (at least moving forward). Thanks!

Uses [Mobile Detect](http://mobiledetect.net/) to redirect mobile traffic to your mobile website.

*   Redirects on a page-by-page basis (posts and custom post types included). For example; `yourwebsite.com/contact/` will redirect mobile devices to `yourmobilewebsite.com/contact/` instead of always redirecting to your mobile home page.

*   This can be overridden on any page individually with a convenient meta box adjacent to the WYSIWYG (usually underneath, by default).

*   Sets a cookie to remember which version of your website (desktop or mobile, usually) your visitors opted for (so it's okay to set a link on your mobile site to view the desktop version).

*   Includes a widget for inserting a link back to your mobile site, which is only generated for mobile devices.

*   Includes two shortcodes for generating links to your mobile site. One is generated only for mobile devices and the other is generated regardless.

*   No CSS rules are used and classes are provided, yielding coders full reign to style generated links to fit the website theme. Shortcodes even allow you to set the link's classes.

*   Adds a class to the `<body>` ("`mobile-detected`") to help coders write styles specifically for mobile devices.

*   Leaves 404 errors untouched, allowing you to maintain 404 statuses.

Basically, it gives you loads of control of your mobile redirects.

**Custom support tickets are available**

See [Other Notes][1] tab for details.

[1]: http://wordpress.org/plugins/average-mobile-detect/other_notes/

== Installation ==

1. Upload the entire `average-mobile-detect` directory to the `/wp-content/plugins/` directory of the desktop website (the website doing the redirecting)
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enter the URL you want to redirect mobile devices to in Settings > Mobile Detect
4. Confirm the auto-populated URL of the desktop website is correct or override it.
5. Test, as one always should. :)

== Frequently Asked Questions ==

= What's so great about a "page-by-page" redirecting? =

This can help search engines understand the relationship between your desktop and mobile website. It also makes the mobile user experience much more fluid when clicking a link to a particular page on your website (they don't get dump onto your mobile home page, where they then have to figure out where the page they were looking for is).

= What's wrong with redirecting to the home/front page? =

1. If you have links published in your marketing campaign that go directly to individual pages of your website, you probably want those links to take visitors to those pages respectively, mobile users included. If you don't have such links published, search engines do.
2. Redirecting all search engines to your home page can lower its status, as it can make your home page appear to be a 404 page.

= What's the point of having optional links to the mobile website? =

Suppose your mobile website has a link to your desktop website (e.g. "View desktop version" or "Full Site") and the user clicks it. Average Mobile Detect sets a cookie to remember that the visitor has opted for the desktop website. Now let's say your visitor changed his/her mind and wants the mobile site again. A link to the mobile site is the obvious solution, but in most cases you wouldn't want that link to show up on desktop computers, so we don't generate it. Conveniently, these generated links automatically use whatever URL you enter in on the settings page, so even if you later have your mobile website at another URL, you'll never need to directly update these links.

= What about tablets? =

Currently, tablets are treated as desktops. Generally they do a fine job of displaying desktop websites. However, in a future release, there may be a setting to treat tablets as mobile devices if desired. In this case, the default for tablets will always remain to be regarded as desktops.

= I activated the plugin and nothing happened. =

All options are turned OFF by default to avoid unwanted surprises. Be sure to set the domain name of your mobile website in Settings > Mobile Detect, before activating the redirect function.

= Does it really require WordPress 3.0.1 or later? =

I have not tested it on earlier versions. In fact, I could use help with testing. Feel free to try it out in an earlier version and let me know if it works! :)

= Does Average have a website =

When a coconut falls on the beach and no one is around to hear it, does it make a sound... I mean no. Not yet.

== Screenshots ==

1. Set the URL to your mobile website and activate. The URI of your desktop website should be automatically populated, but if for whatever reason you need to change it just enter it into the appropriate field. This page also serves as a reference for the shortcodes included.

2. An optional widget also generates a link to your mobile website. The link displays only on mobile devices.

3. Pages and post (and custom post types) are equipped with a meta box for overriding its own mobile redirect location (e.g. if the page on your desktop site is `yourdesktopsite.com/sales`, but on your mobile site it isn't `yourmobilesite.com/sales`, but `yourmobilesite.com/mobilespecials` instead, you can override the redirect with `/mobilespecials` in this field.

== Changelog ==

= 1.2 =
11-Dec-2014

*   Announces move to [AddFunc Mobile Detect](https://wordpress.org/plugins/addfunc-mobile-detect/)
*   Fixes metabox nonce
*   Changes xdefaultvalue() to avrgxmobdefault()
*   Checks for avrgxmobdefault() before running it

= 1.1 =
15-Oct-2014

*   Adds shortcode [mobilesite] back in for older websites that are using it (websites created before Average Mobile Detect was released on the WordPress repository)
*   Adds CSS class "mobile-site-opt" to link output by widget to replace css class "mobile-site-link"
*   Declares CSS class "mobile-site-link" deprecated for widgets (not deprecated for shortcode). Use "mobile-site-opt" instead. This was decided upon to avoid confusion between the widget and the shortcode when styling.

= 1.0 =
27-Aug-2014

*   Prepared for release

= 0.8 =
25-Aug-2014

*   Removes shortcode [mobilesite]
*   Adds shortcode [mobilesitelink]. Parameters: text, class and page
*   Adds shortcode [mobilesitebutton] (display on mobile devices only). Parameters: text, class and page

= 0.7.2 =
20-Aug-2014

*   Changes database field names back, as that would be an unnecessary hassle for previous installs. Fields changed are:
  -   mobile_site_uri changed back to:  the_mobile_site_uri
	-   desktop_site_uri changed back to:  non_mobile_site_uri
*   Removes metabox to prepare plugin for release

= 0.7.1 =
22-Jul-2014

*   Redirects desktop page to equivlant mobile page instead of always the mobile Home page (example: website.com/about/ => m.website.com/about/)
*   No longer redirects 404 errors (for better or for worse, but this was a side effect of the above)
*   Changes curtain database field names, so upgrading must be backed up and done carefully. Fields changed are:
  -    the_mobile_site_uri  changed to:  mobile_site_uri
	-    non_mobile_site_uri  changed to:  desktop_site_uri
*   Adds a metabox for specifying a particular page on the mobile site to redirect the desktop version of the page to (saves the data, but doesn't do anything with it yet)

= 0.7 =
26-Jun-2014

*   Now checks if class Mobile_Detect has been declared already before attempting to declare it

= 0.6 =
2-Jun-2014

*   No longer redirects tables to the mobile website (needs to be made optional in the future)

= 0.5 =
11-Feb-2014

*   Adds class .mobile-detected to body if isMobile() returns true

= 0.4 =
2-Dec-2013

*   Removes "This is the Mobile Site" ($is_the_mobile_site), hence eliminating the need to install this plugin on the mobile website
*   Adds [mobilesite] shortcode. Takes text="Optional" (overrides default link text: "View Mobile Version") and classes="optional" (overrides default class: "mobile-site-link")

= 0.3 =
2-Dec-2013

*   FIX: All known bugs, except subdomains still have limited support:
  1.   This version of Average Mobile Detect does not fully support subdomains in the Non-mobile Website URI field. This field is used to set the cookie for your non-mobile website, which tells it whether to redirect the device or not. However, you can still use a website that resides on a subdomain. To do this, omit all characters that come before the first period, but leave the period there (example: .your-website.com). Be aware that this will set the cookie for all subdomains pertaining to the root domain name (so in our example, the cookie would be set for all of these: m.your-website.com, www.your-website.com, other.your-website.com, even-unregistered-subdomains.your-website.com, etc.)
  2.   As the redirect is governed by a cookie set/changed by both the mobile website and the non-mobile website entered above, the "Non-mobile Website URI" feild must be filled in exactly the same on both websites. (This plugin has to be installed and active on both websites.)
*   Mobile Site Link doubles as link to non-mobile site as entered in Non-mobile Website URI if "This is the Mobile Website" is set to "Yes". Due to the above limited support however, this doesn't work when using a subdomain

= 0.2 =
26-Nov-2013

*   Adds Mobile Site Link widget which generates a link to the mobile site (for mobile devices only)... and a lot of bugs

= 0.1 =
19-Nov-2013

*   Uses MobileDetect.php to detect whether device is mobile or not and redirects mobile users to another location (specified in Settings)
*   Sets a cookie to track whether the mobile user wants the mobile site or the full site. Cookie expires on browser close

== Custom Support ==

If you have a custom support need, [please purchase your support ticket here](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7AF7P3TFKQ2C2). Support tickets are responded to within 24 hours, but we answer them as soon as possible.

**How it works**

1.   [Purchase a support ticket via PayPal](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7AF7P3TFKQ2C2)
2.   You get a chance to provide the best way to contact you and a description of your need
3.   I contact you as soon as I can (no less than 24 hours) and help resolve your issue

**Note:** This is for custom needs for help, not problems with the plugin, or instructions that should already be explain in the description. If you feel there are important details omitted from the description, installation steps, etc. of the plugin, please report them in the Support forum. Thanks!

== Upgrade Notice ==
