=== Real IP ===
Contributors: yejun
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3494945
Tags: comments, spam, ip, proxy
Requires at least: 2.7
Tested up to: 2.7.1
Stable tag: trunk

Correct comment's ip address with X-Forwarded-For http header if you are behind a proxy or load balancer. There is no setting. It should start working once you activate it.

== Description ==

Correct comment's ip address with X-Forwarded-For http header if you are behind a proxy or load balancer. There is no setting. It should start working once you activate it.

Change log:

* 3/21/2009  1.3: Fixed a bug causing fatal error.
* 3/13/2009  1.2: PHP 4.0 support.	
*	     1.1: Data validation and reject private ips.

== Installation ==

1. Upload `real-ip.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Post a comment to see whether it works.