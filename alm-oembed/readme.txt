=== ALM oEmbed ===
Contributors: mfenner
Tags: oembed, embed, alm, altmetrics, metrics, doi, plos, res-comms
Requires at least: 3.2
Tested up to: 3.9.2
Stable tag: 1.1.2
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Paste in a ALM article URL to a page or post, and it will display the citation with metrics.

== Description ==

Paste in a ALM article URL to a page or post, and it will display the citation with metrics.

== Installation ==

1. Upload the plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Paste a URL into a page or post with the following format: `http://alm.plos.org/articles/info:doi/10.1371/journal.pone.0036790, where the DOI must be known to the ALM server (`alm.plos.org` in this case).

To change the ALM server that is whitelisted, change the configuration in Settings -> ALM oEmbed. The default is:

Format: http://alm.plos.org/articles/*

Provider: http://alm.plos.org/oembed

== Changelog ==

= 1.1.2 =

Bug fixes.

= 1.1.1 =

Added example URL with preview.

= 1.1 =

Added admin menu for custom oEmbed provider.

= 1.0.3 =

Added additional ALM servers.

= 1.0.2 =

Use DOI as oEmbed endpoints

= 1.0.1 =

Updated oEmbed endpoints

= 1.0 =

* initial release
