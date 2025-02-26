=== Ajax Press - Easily Enable Fast Ajax Navigation   ===
Contributors: wpmilitary
Tags: ajax, ajaxify, ajax search, comments, navigation, search, fast, performance, seo, speed, ajax wordpress
Requires at least: 5.0
Tested up to: 5.9.3
Requires PHP: 5.6
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

If you need to load your site faster and without any page reloads, then Ajax Press is the right tool for you. Your site will appear faster and more impressively using the Ajax Press plugin.

== Description ==
If you need to load your site faster and without any page reloads, then Ajax Press is the right tool for you. Your site will appear faster and more impressively using the Ajax Press plugin.


Ajax Press uses [Ajax](https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX) (XmlHttpRequest) and  [pushState](https://developer.mozilla.org/en-US/docs/Web/Guide/API/DOM/Manipulating_the_browser_history) deliver a fast browsing experience to your site users.

It allows you to completely transform the user experience of standard websites to make users feel like they are browsing an app, especially for those with low bandwidth connections.

**No more full page reloads. No more multiple HTTP requests.**

== Ajax Press Features ==
* **Ajax Page Load** -  Loads your site using AJAX without any page refresh.
* **Ajax Search** -  Users can search your site without any page reload.
* **Ajax Comments** -  Users can post comments on your site without any page reloads.
* **Ajax Login** -  Users can login to your site without any page reloads.
* **Ajaxify Forms** -  You can make any form ajaxify on your site that has an internal action link.
* **Page Transition Animatio** -  Multiple page transition animation is available to add a more attractive page switching mode.
* **Preloader** -  Multiple preloader available to show before the ajax page is loaded.
* **Custom JavaScripts** -  You can execute custom JavaScripts, after every ajax page is loaded.
* **Multiple Content Selectors** -  You can replace multiple content parts/ selectors of your page.

== Basic Usage ==
After activating the plugin, you have to configure the Ajax Press settings from the `Ajax Press > Settings` page.

If your theme is listed on our predefined list, then you will see an admin notice with a button to install the default settings for your theme.

If your theme is not listed on our predefined list, then you have to set the settings manually for your theme on the `Ajax Press > Settings` page.
Generally, you have to set the main content container selectors (not header navigation) which will be replaced on every page change. You have to set the main content selector in the Main content selector input box. You can use any valid CSS selector (ID, Class) in the input box.
Example: - ``#content``, ``#main`` and ``.site-content`` etc.

== Developer Tips ==

1. The vanilla js `DOMContentLoaded` and jQuery `ready` event runs every time the ajax request is completed.

1. When the ajax request is start the javascript `pjax:send` event is fired. You can use this event to execute javascript at the start of the ajax request.

    **Example :** ``document.addEventListener('pjax:send', function(){...your codes});``

1. When the ajax request is completed the javascript `pjax:complete` event is fired. You can use this event to execute javascript when the ajax request is completed.

    **Example :** `document.addEventListener('pjax:complete', function(){...your codes});`

1. Use jQuery ready event instead of the ready function to initialize your jQuery codes.

    **Example :** ``$(document).ready(function(){...your codes});``

    **Not:** ``$(document).ready(...your codes);``


== Screenshots ==
1. Ajax Press Settings

== Changelog ==

= 1.0.1 =
* Fix: Fixed JSON parse error issue.

= 1.0.0 =
* Initial release