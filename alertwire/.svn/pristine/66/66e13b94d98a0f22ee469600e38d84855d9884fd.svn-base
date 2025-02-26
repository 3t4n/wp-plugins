=== Plugin Name ===
Contributors: AlertWire
Donate link: https://www.alertwire.com
Tags: alert, notification, messaging, recall, notice, AlertWire, plugin, multiple
Requires at least: 3.0
Tested up to: 4.7
Stable tag: trunk
License: GPLv2

AlertWire plug-in to easily insert script tag for AlertWire client sites.

== Description ==

**AlertWire** is a system for centralized administration of alert/messaging for multiple sites.

Once your site has been configured in the AlertWire system, you can add this plug-in and set the data-token to enabled the checking of alerts.  When the 
page is rendered, a `<script>` tag will be inserted into the document being rendered. 

*How AlertWire Works*

1. The page is generated with the correct API server and `data-token` configured, typically added to the bottom of the page `body` tag.
1. An async script tag is executed (late as possible) which loads a small (<4K) javascript plug-in. This plug-in has no dependancies and will
not interfere with any existing frameworks like jQuery
1. A cross-domain JSON request is made to the AlertWire API service to determine if there are any active alerts for the `data-token` specified.
1. If there are one or more alerts to view, a CSS style-sheet will also be loaded from the API server.
1. The alerts are then generated dynamically into the document and styled automatically. There are several formats that are rendered
differently (e.g. page-top, lightbox, etc.).
1. Tracking pixels are generated to record when a check-in for alerts cccurs and when a view or close or click-through of an alert occurs.

*Notes*

* The javascript plug-in and CSS style-sheet are publically cached from a CDN and are very small, the impact on load times should be tiny.
* The CSS file is only loaded if there are alerts to be rendered.
* The javascript plug-in only introduces one symbol into the global scope, the *AlertWire* module. All other functionality is behind that scope.
* The plug-in will set a cookie when a user closes an alert to ensure it isn't displayed again. Depending on the alert type, this cookie may be a 
session cookie or a durable cookie with a 1 year expiration.
* A very small font file will be downloaded for the alert icons the first time an alert is displayed to an end user.

== Installation ==

= Automatic Installation =

1. Log into your WordPress admin
1. Click 'Plugins'
1. Click 'Add New'
1. Search for *AlertWire*
1. Click 'Install Now' under *AlertWire*
1. Activate the plugin through the *Plugins* menu in WordPress.
1. Navigate to the *Settings/AlertWire* page
1. Enter the `data-token` value provided on the site-setup page from the *AlertWire* system.
1. Optionally enter the ID (or other valid CSS selector) for the container element alerts should be inserted into.
1. Select if alerts should be shown on the Home/Front Page and/or the Single Post pages.

= Manual Installation =

1. Download from [here](https://www.alertwire.com/plugin/WordPress/AlertWire.zip) and unzip the plugin.
1. Upload the entire *AlertWire* directory to `/wp-content/plugins/`.
1. Activate the plugin through the *Plugins* menu in WordPress.
1. Navigate to the *Settings/AlertWire* page
1. Enter the `data-token` value provided on the site-setup page from the *AlertWire* system.
1. Optionally enter the ID (or other valid CSS selector) for the container element alerts should be inserted into.
1. Select if alerts should be shown on the Home/Front Page and/or the Single Post pages.

== Frequently Asked Questions ==

= Will this slow down my pages? =

* The javascript plug-in is very small, is loaded from a global CDN (content delivery network) and is publically cacheable for years. Once a 
end-user has visited your site it will be in their cache.

* The javascript snippet does a very fast JSON call that is publically cachable for 5 minutes (default), so even if your site is very heavily loaded it will be 
available long before any images are finished loading.

* The CSS file is only loaded *if* there are alerts to be rendered (not normally the case) and is also served from a CDN as a public long-cacheable file. 
This CSS file is under 2K and will only be downloaded one per end-user.

* The font file for the alert icons is downloaded only if there are alerts to be rendered and is also served from a CDN as a public long-cacheable file.
This font file is under 10K and will only be downloaded once per end-user.

* The actual script execution is very fast and will not block on any downloads.

= Will this break my pages? =

* All alerts are injected into the page in a `div` tag and the CSS generated is scoped via a nonce-based id. It should never interact with any styling on your page
but you might need to provide a placement anchor-element to ensure your site CSS doesn't hide the alert. The script snippet allows you to specify a container `div` 
to act as the parent for the injected alerts in case you need to adjust them around header or navigation elements.

* The alerts are deleted from the page DOM when closed so nothing remains on screen if the end-user closes the alert. The lightbox-style alert acts as a complete 
page take-over and thus might have z-index issues, by default the alerts will be z-index of at least 10000.

* If the javascript snippet has an error, nothing will be displayed so nothing will need to be hidden.

= What about updates? =

Since the *AlertWire* javascript client-side plug-in is long-cached, it has built-in ability to update itself to a new version. This is triggered by a 
version-requirement declared in the JSON response and is completely automatic.

= How much does this cost? =

The plug-in is free and use is included in the cost of an *AlertWire* system. For [more information about AlertWire](https://www.alertwire.com).

= What if I stop using AlertWire? =

Since the script does essentially nothing if there are no alerts configured for the site, your script will just silently keep working and display nothing.

= Is this secure? =

* Yes, everything is *only* loaded over HTTPS with OSCP stapling, Strict Transport Security (HSTS) required and preloaded in all browsers.
* No admin defined assets other than *pure text* are ever served to the end-user's browser.
* No CSS, JS, HTML or image assets are available for hacking/injecting.
* All *AlertWire*-supplied content is served via the [CloudFlare CDN](https://www.cloudflare.com) with
Qualsys SSL Labs [A+ SSL rating](https://www.ssllabs.com/ssltest/analyze.html?d=alertwire.com).
* The administration application is fully tested against the OWASP best-practice criteria. 

== Screenshots ==

== Screenshots ==

1. The plug-in settings screen, where you enter the `data-token` and select into what pages the script is injected.
1. The script that is injected at the bottom of the page.

== Changelog ==

= 1.2.2 =
Resaved all files in UTF8 *without* BOM so we don't bust headers 

= 1.2.1 =
Removed unneeded markup in setting page.

= 1.2 =
Change default endpoint to https and note version compatibility to 4.7 and update notes.

= 1.1.1 =
Bump revision in the plug-in itself.

= 1.1 =
Cleanup now that we're in the WordPress plug-in repo.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.2 =
Nothing to do, but you might want to explicitly point at https: for the .js file to save a redirection.
