=== WP Dynamic Keywords Injector ===
Contributors: mughees.hafeez
Donate link: https://www.seerox.com/
Tags: dynamic, keywords, injector, insertion, title, page title, title tags, seo, ads, adwords, spintax, landing page
Requires at least: 3.8
Tested up to: 6.7.1
Stable tag: 2.3.26
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

WP Dynamic Keywords Injector inserts dynamic keywords, spintax, page title and title tag.

== Description ==

WP Dynamic Keywords Injector inserts the keyword from browser's address bar, if not given in URL then the spintax will be placed and if both not found then the default keyword will be placed. Also this plugin will change the title tag and page title if they are given in browser’s address bar.

[youtube https://www.youtube.com/watch?v=4DMTdlvIisY]

This will allow users to insert dynamic keywords not only in page title, page content but also in meta title for the landing pages. Used to be promoted on adwards. 
This functionality has been implemented through shortcode given below is a sample shortcode.

[seerox_wpdki_dyn_keywords default=&#34;These are default keywords. Test1, Test2&#34; spintax=&#34;{Text|to|Spin}&#34;]

To put the default value please change the &#34;default&#34; attribute value of shortcode.
To add spintax please change value of &#34;spintax&#34; attribute.

To inject keywords from URL, please use &#34;dyn_keyword&#34; query string parameter from browser's address bar. e.g http://example.tld/sample-page/?dyn_keyword=your_desired_keywords

To inject page title from URL, please use &#34;page_title&#34; query string parameter. sample link is given below.
http://example.tld/sample-page/?page_title=your_desired_page_title

To change meta title from URL, please use &#34;title&#34; query string parameter. sample link is given below.
http://example.tld/sample-page/?title=your_desired_meta_title

Please Note: These all query string parameters can be used with combinations as well. The sample link is given below.
http://example.tld/sample-page/?dyn_keyword=your_desired_keywords&page_title=your_desired_page_title&title=your_desired_meta_title

WPDKI providing you ability to define search keyword &#34;search_keyword&#34; in Page URL as parameter which you can then use in meta title, page/post title and content as &#34;SEARCH_KEYWORD&#34;. An example is given below for your better understanding. 

WPDKI brings a new feature, Whitelisting Keywords functionality for Title and Page Title. In this feature admin can control to show Replace Keywords in Title and Page Title. If this functionality is turned on Plugin will allow to display only Keywords which are whitelisted by admin. If this functionality is turned off then those keywords will show in Title and Page Title which you put in Page URL as parameter.If this functionality is turned on and no keyword is define in Whitelist Keyword box then Default Title and Page Title will Display.

http://example.tld/sample-page/?search_keyword=Search+Keyword
This keyword can be use in title, page_title and in default value of dyn_keyword shortcode like.
http://example.tld/sample-page/?title=Its+SEARCH_KEYWORD+title&page_title=SEARCH_KEYWORD+Heading&search_keyword=Search+Keyword

[seerox_wpdki_dyn_keywords default=&#34;This SEARCH_KEYWORD is Draft.&#34;]

<div style="text-align:center"><strong><a href="https://tastewp.com/new?pre-installed-plugin-slug=wp-dynamic-keywords-injector&redirect=admin.php%3Fpage%3Dseerox_wpdki_settings&ni=true">Click here</a></strong> to play with it</div>

<h4>PRO</h4>

WP Dynamic Keywords Injector plugin is also available in a professional version which includes more functionality, and more flexibility!

<ul>
<li>Unlimited Landing Pages</li>
<li>Unlimited Multiple Sub Keywords</li>
<li>Interface to Manage Keywords</li>
<li>Perfect Quality Scores</li>
<li>Dynamic Images</li>
<li>Dynamic Videos</li>
<li>Dynamic Spintax</li>
<li>Keyword Groups</li>
<li>HTML enabled Keyword Fields</li>
<li>IFrame Support</li>
<li>WP Shortcodes Support</li>
<li>Generate Dynamic Links</li>
<li>Download all possible Links</li>
<li>Import and Export Keywords</li>
<li>Relevant Posts Links list ShortCode</li>
<li>Relevant Random Post Link ShortCode</li>
</ul>

<a href="https://wpdki.com/">Upgrade to Pro</a>



== Installation ==


= Minimum Requirements =

* WordPress 3.8 or greater
* PHP version 5.2.4 or greater

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t need to leave your web browser. To do an automatic install of WP Dynamic Keywords Injector, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type “WP Dynamic Keywords Injector” and click Search Plugins. Once you’ve found our keywords injector plugin you can view details about it such as the point release, rating and description. Most importantly of course, you can install it by simply clicking &#34;Install Now&#34;.

= Manual installation =

The manual installation method involves downloading our keywords injector plugin and uploading it to your webserver via your favourite FTP application. The WordPress codex contains [instructions on how to do this here](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

= Updating =

Automatic updates should work when you will update the plugin.

= Dummy keywords =

WP Dynamic Keywords Injector comes with some keywords you can use to see keywords look. [seerox_wpdki_dyn_keywords default=&#34;These are default keywords. Test1, Test2&#34; spin_text=&#34;Text to Spin&#34;]

== Frequently Asked Questions ==

= Where can I find WP Dynamic Keywords Injector documentation and user guides? =

For help setting up WP Dynamic Keywords Injector please refer to our user guide

= Where can I get support or talk to other users? =

If you get stuck, you can ask for help in the WP Dynamic Keywords Injector Plugin Forum.

== Screenshots ==

1. screenshot-1.gif
2. screenshot-2.gif
3. screenshot-3.gif
4. screenshot-4.gif
5. screenshot-5.gif

== Changelog ==

2.3.21

* All User Inputs though URL are senitized and validated

2.3.20

* Compatibility checked with wordpress 6.4.3
* Vulnerability issue resolved for WP Dynamic Keyword Injector.
* Security Issues Handled Properly.

2.3.16

* Compatibility checked with wordpress 6.1.1
* Vulnerability issue resolved for WPDKI Pro trial form.

2.3.14

* Rank Math SEO “title not updating” Issue resolved and made compatible with latest version.

2.3.11

* Compatibility checked with wordpress 6.0


2.3.9

* Canonical links issue resolved
* Internal linking issue resolved


2.3.8

Shortcode compatibility with:

* Rank Math SEO

2.3.7

Update Internal Links compatibility with:

* Elementor

2.3.3

Compatibility checked with wordpress 5.5.1

2.3.1

Enhanced functionality for shortcode [seerox_wpdki_dyn_keywords]

* ?dyn_keyword parameter now allow users to add &#34;-&#34; for space.


2.3

Shortcode compatibility with:

* Yoast SEO Plugin
* All in One SEO Pack Plugin


2.2.2

Improve PHP7 compatibility.
Bug fixes.

2.2.1

Bug fixes.

2.2

Providing a new feature, Whitelisting Keywords functionality for Title and Page Title.

2.1

* Introduce a new feature, providing you ability to define search keyword &#34;search_keyword&#34; in Page URL as parameter which you can then use in meta title, page/post title and content as &#34;SEARCH_KEYWORD&#34; .
* More Controls to change Conical Links, Internal Links, Meta Tag Values and Page Title Meta value.

2.0

* Admin Setting Menu Added for manual control over content injection
* Content internal permalinks
* Shortcodes trigger in META-TAG's content
* Dynamic Canonical URL for custom post types
* Settings menu for active/deactive features
* shortcode optimised for spin text
* bug and performance issues removal

1.0

* Feature - Default Keywords - if no spintax and dynamic keywords then default placed.
* Feature - Spintax - if no dynamic keywords given then spintax placed.
* Feature - Dynamic Keywords - overrides default and spintax.
* Feature - Page Title - overrides the page title.
* Feature - Title Tag - overrides the title tag.
* Fix - Fixed Double Quote and Single Quote while outputting dyn_keywordl

== Upgrade Notice ==

Checkout new spintax features.