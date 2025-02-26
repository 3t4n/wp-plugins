
=== AddFunc Mobile Detect ===

Contributors: AddFunc,joerhoney
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7AF7P3TFKQ2C2
Tags: mobile, mobile detect, mobile detection, mobile redirect, page-by-page mobile redirect, page-by-page, individual page basis, per-page mobile redirect, per page mobile site redirect, mobile site redirect, mobile website redirect, mobile redirection, mobile site redirection, mobile website redirection, 301 redirect to mobile site, 301 redirect to mobile website, mobile device, mobile site, mobile website, mobile version, mobile site link, mobile website link, redirect mobile device, desktop site to mobile site redirect
Requires at least: 3.0.1
Tested up to: 4.8
Stable tag: 3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Redirects mobile traffic, allows visitors to opt back, optionally prevent redirection of WordPress' parts (Post, Home, Tags, etc.)

== Description ==

Uses [Mobile Detect](http://mobiledetect.net/) to redirect mobile traffic to your mobile website.

*   Redirects on a page-by-page basis (posts and custom post types included). For example; `yourwebsite.com/contact/` will redirect mobile devices to `yourmobilewebsite.com/contact/` instead of always redirecting to your mobile home page.

*   This can be overridden on any page individually with a convenient meta box adjacent to the WYSIWYG (usually underneath, by default).

*   Sets a cookie to remember which version of your website (desktop or mobile, usually) your visitors opted for (so it's okay to set a link on your mobile site to view the desktop version).

*   Provides options to NOT redirect basic parts of WordPress: the Front page (static), Pages, the "Home" page (blog posts page), Posts, Attachments, Authors, Categories, Dates, Tags and search results.

*   Includes a widget for inserting a link back to your mobile site, which is only generated for mobile devices.

*   Includes two shortcodes for generating links to your mobile site. One is generated only for mobile devices and the other is generated regardless.

*   No CSS rules are used and classes are provided, yielding coders full reign to style generated links to fit the website theme. Shortcodes even allow you to set the link's classes.

*   Adds a class to the `<body>` (`mobile-detected`) to help coders write styles specifically for mobile devices.

*   Leaves 404 errors untouched, allowing you to maintain 404 statuses.

Basically, it gives you loads of control over your mobile redirects.

== Installation ==

1. Upload the entire `addfunc-mobile-detect` directory to the `/wp-content/plugins/` directory of the desktop website (the website doing the redirecting) or simply install using the "Add Plugins" page in your WordPress install
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enter the URL you want to redirect mobile devices to in Settings > Mobile Detect
4. Confirm the auto-populated URL of the desktop website is correct or correct it if needed
5. Adjust other settings as needed
6. Test it out, as one always should :)

== Frequently Asked Questions ==

= I activated the plugin and nothing happened. =

All options are turned OFF by default to avoid unwanted surprises. Be sure to set the domain name of your mobile website in Settings > Mobile Detect, before activating the redirect function.

= What's so great about "page-by-page" redirecting? =

This can help search engines understand the relationship between your desktop and mobile website. It also makes the mobile user experience much more fluid when clicking a link to a particular page on your website (they don't get dump onto your mobile home page, where they then have to figure out where the page they were looking for is).

= What's wrong with redirecting to the home/front page? =

1. If you have links published in your marketing campaign that go directly to specific pages of your website, you probably want those links to take visitors to those pages respectively, mobile users included. If you don't have such links published, search engines do, regardless.
2. Redirecting all search engines to your home page can lower its status, as it can make your home page appear to be a 404 page.

= What's the point of having optional links to the mobile website? =

Suppose your mobile website has a link to your desktop website (e.g. "View desktop version" or "Full Site") and the user clicks it. AddFunc Mobile Detect sets a cookie to remember that the visitor has opted for the desktop website. Now let's say your visitor changed his/her mind and wants the mobile site again. A link to the mobile site is the obvious solution, but in most cases you wouldn't want that link to show up on desktop computers, so we don't generate it. Conveniently, these generated links automatically use whatever URL you enter in on the settings page, so even if you later have your mobile website at another URL, you'll never need to directly update these links.

= What about tablets? =

Generally tablets do a fine job of displaying desktop websites. But now as of version 3, AddFunc Mobile Detect gives you (the admin) the choice of treating tables the same as mobile devices or as desktops (default).

= Wouldn't a JavaScript solution be more reliable? =

Can I get a statistic? It really depends on how often you get visitors who have javascript turned off and whether you can do without those visitors. Likewise, I suppose, it depends on whether many of your visitors withhold their browser and system specs when requesting your website. Usually, neither of these are very common, but they both happen.

= Does it really require WordPress 3.0.1 or later? =

I have not tested it on earlier versions. In fact, I could use help with testing. Feel free to try it out in an earlier version and let me know if it works! :)

= Does AddFunc have a website =

When a coconut falls on the beach and no one is around to hear it, does it make a sound... I mean no. Not yet.

== Screenshots ==

1. Set the URL to your mobile website and activate. Choose whether to treat tablets the same as desktops or mobile devices. The URI of your desktop website should be automatically populated, but if (for whatever reason) you need to change it just enter it in the Desktop Website URI field. You may choose not to redirect mobile devices on any of the basic parts of WordPress — the Front page (static), Pages, the "Home" page (blog posts page), Posts, Attachments, Authors, Categories, Dates, Tags and search results. The options page also serves as a reference for the shortcodes that are available for use.

2. An optional widget also generates a link to your mobile website. The link displays only on mobile devices.

3. Pages and posts (and custom post types) are equipped with a meta box for overriding its own mobile redirect location (e.g. if the page on your desktop site is `yourdesktopsite.com/sales`, but on your mobile site it isn't `yourmobilesite.com/sales` and is `yourmobilesite.com/mobilespecials` instead, you can override the redirect with `/mobilespecials` in this field.

== Changelog ==

= 3.1 =
11-Jul-2016

*   Updates Mobile_Detect.php to current stable version (2.8.22)

= 3 =
22-Mar-2016

*   Adds option to treat tablets the same as mobile devices (still treats them the same as desktops by default)
*   Updates Mobile_Detect.php to current stable version (2.8.19)

= 2.1 =
22-Jul-2015

*   Code efficiency improvements, thanks to [mangstadt83's support topic](https://wordpress.org/support/topic/code-patch?replies=4#post-7161987)

= 2 =
29-Jun-2015

*   Provides the option to NOT redirect the Front page (static home page)
*   Provides the option to NOT redirect any Pages (all or none — excludes the Front page)
*   Provides the option to NOT redirect the Home page (blog posts page)
*   Provides the option to NOT redirect any Posts (all or none)
*   Provides the option to NOT redirect any Attachments (all or none)
*   Provides the option to NOT redirect any Authors (all or none)
*   Provides the option to NOT redirect any Categories (all or none)
*   Provides the option to NOT redirect any Dates (all or none)
*   Provides the option to NOT redirect any Tags (all or none)
*   Provides the option to NOT redirect search results
*   Replaced Mobile_Detect.php with current stable version (2.8.15)

= 1.1 =
04-Dec-2014

*   Fixed meta box nounce

= 1.0 =
16-Oct-2014

*   Adds shortcode [mobilesite]. Produces the exact same results as [mobilesitebutton]
*   Change CSS class of widget output to "mobile-site-opt" instead of "mobile-site-link" (to avoid confusion between the widget and the shortcode when styling)
*   Prepared for release as AddFunc Mobile Detect 1.0

27-Aug-2014

*   Submitted as Average Mobile Detect 1.0

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
  1.   This version of AddFunc Mobile Detect does not fully support subdomains in the Non-mobile Website URI field. This field is used to set the cookie for your non-mobile website, which tells it whether to redirect the device or not. However, you can still use a website that resides on a subdomain. To do this, omit all characters that come before the first period, but leave the period there (example: .your-website.com). Be aware that this will set the cookie for all subdomains pertaining to the root domain name (so in our example, the cookie would be set for all of these: m.your-website.com, www.your-website.com, other.your-website.com, even-unregistered-subdomains.your-website.com, etc.)
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
