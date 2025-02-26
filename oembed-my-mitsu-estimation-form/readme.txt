=== Oembed for My Mitsu Estimation Form ===
Contributors: ounziw
Donate link: http://pledgie.com/campaigns/8706
Description: You can embed an estimation(calculation) form, provided by a webservice in Japan called My Mitsu.
Tags: oembed, estimation, calculation
Requires at least: 4.0
Tested up to: 4.8
Author: Fumito MIZUNO
Author URL: https://rescuework.nagoya/blog/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin allows users to put a My Mitsu form in your website.

== Description ==

https://www.youtube.com/watch?v=A1PRBAyd1ig

My Mitsu, is a webservice in Japan, allows users to create an estimation(calculation) form. A powerful form allows you to create a conditional form with calculation, and outputs a PDF file. Optionally, you can create a PayPal payment link. It is suited for business persons.
https://my-mitsu.com/ (written in Japanese.)

My Mitsu allows you to put a form into your WordPress website, by filling in a html code, like
&lt;iframe src="..." width="..." height="..."&gt;&lt;/iframe&gt;

This plugin allows you to output an iframe html tag in a simple way. Simply filling in a url will ouput an iframe html code.

https://my-mitsu.jp/estimation/274 will output &lt;iframe src="https://my-mitsu.jp/estimation/274" id="mymitsu" width="640" height="960"&gt;&lt;/iframe&gt;

The width/height is determined by the $content_width, which is set in your theme. If you plan to change the width/height, you can use a filter hook.

* Note * In order to create an estimation form, you need to register My Mitsu https://my-mitsu.jp/register .


Filter Sample

This plugin allows you to set the values for width, and height. You can alter them by hooking the "mymitsu_oembed_width" and "mymitsu_oembed_height" filter. Here is a sample code.

`add_filter( 'mymitsu_oembed_width', 'my_embed_width' );
 function my_embed_width() {
     return 800;
 }`

== Installation ==

1. Install a plugin and activate it
1. Upload `oembed_for_my_mitsu_estimation_form' to the `/wp-content/plugins/` directory

== Screenshots ==

1. This plugin outputs an iframe.

== Changelog ==

= 1.1 =
* plugin page in the admin area

= 1.0 =
* initial release
