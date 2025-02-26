=== percent encode capital letter ===
Contributors: wokamoto
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=9S8AJCY7XB8F4&lc=JP&item_name=WordPress%20Plugins&item_number=wp%2dplugins&currency_code=JPY&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: permalink, URL, percent encoding uri, RFC3986
Requires at least: 2.5
Tested up to: 3.1
Stable tag: 1.0.0

This plugin makes regular URL by which percent encoding was carried out with a capital letter.

== Description ==

When you use [Options]-[Permalinks]-[Common Options]-[Date and name based], or %postname% in custom URL, entry title will be normalized for fitting to URL permitted letters.
If title has non-ASCII letters, those letters cannot be directly put in URL so they are percent-encoded. This is processed in sanitize_title_with_dashes_original() and utf8_uri_encode() . 

The reason capital letters in percent encoding required is described on RFC3986 section 2.1, 

<blockquote>The uppercase hexadecimal digits 'A' through 'F' are equivalent to   the lowercase digits 'a' through 'f', respectively.  If two URIs differ only in the case of hexadecimal digits used in percent-encoded octets, they are equivalent.</blockquote>

For consistency, URI producers and normalizers should use uppercase hexadecimal digits for all percent-encodings.
As you see  RFC2119 section 3, "should" means you may ignore it with valid reason.

This plugin makes regular URL by which percent encoding was carried out with a capital letter.

== Installation ==

1. Upload the entire `percent-encode-capital-letter` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Changelog == 

**1.0.0 - February 16, 2011**  
Initial release.
