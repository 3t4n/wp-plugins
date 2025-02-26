=== Affiliate Links Cloaking ===
Contributors: goodext
Tags: links, link, cloacking, affiliate
Requires at least: 4.7
Tested up to: 6.7.1
Stable tag: 0.9.4
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Real working plugin for cloak links from search engines.

== Description ==

There are few methods to cloak links from search engines. But most methods do not work.

Most popular bad methods are:

* Cloak by JavaScript -- it is not work now. Because Google and other search engins can run JS-code and can recognise your link.
* Cloak by redirect -- spiders can follow redirect, and this method also can't work. The weight of your web page is leaked through this type of links.

= What to do? =

The only working method we know for cloak links at the moment is to cloak links via FORM with method POST.

According to the standard, search engines should never send POST forms. Since POST requests are used to change information on the site. And if search engines send them, the consequences can be unpredictable.

How does this method work? Instead of each link, a form with a button is created. When clicked, the form is sent with subsequent redirection to the target site.

The link url is not contained in the HTML code of the page. The form contains only the link id. When sending the form, the link address is extracted only in the handler, before redirection to target site.

The search engine has no way to find out the link address (and whether it exists at all).

This plugin use this method.

= Why cloak links? =

Search engines pessimize sites in search results if they find many outgoing links. Search engines especially do not like referral links and links to low-trust sites.

== Screenshots ==

1. Creating link
2. Link on the site
3. Site statistics 

== Changelog ==

= 0.9.0 =
* First release.
