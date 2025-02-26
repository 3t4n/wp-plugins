=== abuse.ch httpBL check ===
Contributors: admin [at] abuse {dot} ch
Tags: blacklist, dnsbl, check, stop abusers, lookup, referer spam, rfi attack
Stable tag: 2.1
Requires at least: 2.0.2
Tested up to: 3.0.1

Check if a visitor is listed on httpBL.abuse.ch, see http://dnsbl.abuse.ch/faq.php#about_httpbl for more information.

== Description ==

This plugin checks if a visitor is listed on httpBL.abuse.ch.
httpBl is a DNSBL which can be used to blocks access from IPs which are:

- Known source of Hacking activities (mostly script kiddies)
- Source of Remote File Inclusion attacks (<a href="http://en.wikipedia.org/wiki/Remote_File_Inclusion" target="_blank" title="Information about RFI on wikipedia">RFI</a>)
- Hijacked webserver
- Scanning drones
- Source of referer Spam

For more information take a look at the <a href="http://dnsbl.abuse.ch/faq.php#about_httpbl" target="_blank" title="httpBL.abuse.ch FAQ">FAQ</a>.

== Changelog ==

= 2.1 =
- Added support for the new httpBL zone 127.0.0.5 (scanning drones)
- Added an Administration Menu (Settings-> abuse.ch httpBL)
- Changed logging format to "TIMESTAMP | IP address | Hostname | User-Agent | httpBL zone"
- Update Plugin description
- Made some changes to the HTML code

= 2.0 =
- Fixed an error in the logging function ($response instead of $responses)
- gethostbyaddr will now only be executed when logging is enabled

= 1.3 =
- Corrected some typing errors in check_httpbl.php
- Changed the message which a visitor receive, when he is listed at httpBL.abuse.ch. Now the message contains a link to the lookup form at http://dnsbl.abuse.ch/check.php where the visitor will find reason and time of the listing.

== Installation ==

1. Upload `check_httpbl.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Adjust the plugin settings if you want to

== Frequently Asked Questions ==

= Does this plugin protect my blog against comment Spam? =

No, httpBL.abuse.ch does not protect you from comment spam BUT it protects you from referer spammers.

== Screenshots ==

1. httpBL Option menu
2. If the IP address of the visitor is listed on httpBL.abuse.ch, the plugin will deny access to your blog and will display a error message
