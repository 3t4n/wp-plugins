=== AutoHan ===
Contributors: zuola
Donate link: https://www.autohan.org/#donate
Tags: autohan,hanzi,hanji,chinese,translation,js,user,experience,language,
Requires at least: 5.7.2
Tested up to: 6.7.1
Stable tag: 0.5
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Automatically switch to traditional Han characters (Kanji｜Hanzi｜漢字｜汉字), or simplified Han characters, which the website visitor is more accustomed to.

== Description ==

Automatically switch to traditional Han characters (Kanji｜Hanzi｜漢字｜汉字), or simplified Han characters, which the user is more accustomed to, based on the default language type accepted by the website visitor's browser. People in Singapore, Malaysia, Japan, China, Hong Kong, Taiwan, Macau, etc. have different Han character reading preferences. You can also switch manually.With this plugin, you don't need to maintain multiple additional Kanji versions of your content. Your reader will see the text he is used to.

= Introduction =

Welcome to install  AutoHan, the automatic traditional-simplified Kanji conversion plugin.

[youtube https://www.youtube.com/watch?v=ZVzJm9aM98Y]

Some people struggle to read traditional Kanji, and some people struggle to read simplified Kanji. The AutoHan automatic traditional-simplified conversion plugin can help all people who read Kanji.

The GB2312  character set  contains 6763 Kanji, but cannot display traditional Kanji; the BIG5  character set  used in Hong Kong, Macao and Taiwan contains 13,060 Kanji, but cannot display simplified Kanji. However, UTF-8  is commonly used on websites nowadays, which can display traditional and simplified Kanjis at same time.

We have made a Wordpress plugin, which can convert 1275 simplified and traditional Kanji correspondingly, which can improve the reading speed of readers who visit your website.



== How it works ==

Determine whether to convert Kanji in the webpage by identifying the language types that the web browser prefers to support by default. Readers who are accustomed to traditional Kanji see traditional Kanji, and those who are accustomed to simplified Kanji see simplified Kanji.

Based on the setting of the browser's acceptable language （&#x24;_SERVER['HTTP_ACCEPT_LANGUAGE’]）. Users can test the performance of this plugin in different regions by changing the language priority of Google Chrome browser

== Installation == 
Add a plugin in the Wordpress Dashboard, search with keywords Autohan, select Install now, and then enable it, so that the installation is complete without additional configuration.

=  Manually  Installation =
1. Download the autohan.zip file to your computer.
2. Unzip the file.
3. Upload the `autohan` folder to your `/wp-content/plugins/` directory.
4. Activate the plugin through the *Plugins* menu in WordPress.

If you want to add a button to manually switch, Goto the AutoHan menu and copy the HTML code and follow the instruction.

You can add the following HTML code to Dashboard ➟ Appearance ➟ Widgets ➟ Custom HTML
 
`<a href='javascript:AutoHan_StranBody()' id='StranLink'>繁体中文</a>`

Thus add the function to manually switch between traditional and simplified Han characters interface.

If you find this plugin helps, welcome to forward this video, any amount donation are welcome too.

Produced by ZUOLA TECHNOLOGY Co., Ltd.

== Upgrade Notice ==
if you satisfied and don't want any upgrade in there future, please just change the version from 0.2 to 100 or even bigger.

== Frequently Asked Questions ==

Q:Do I need to pay for it?
A:Not required, but donation are welcome.

Q:Do I need coding for it?
A:Not required, but learning code are welcome.

= What happend if I use CDN to cache my pages? =

It also works with CDN, switch to detect user Language via javascript in client side.

== Screenshots ==

1. Screenshot of  simplified Kanji interface.
2. Screenshot of  traditional Kanji interface

== Changelog ==

= 0.5 =
upgrade verstion tag only


= 0.4 =
added  [https://www.autohan.org](https://www.autohan.org "demonstration website") for demonstration purpose, add CDN support , provide public use

= 0.3 =
added swithc language link.

= 0.21 =
added video introduction.

= 0.2 =
added CDN support.

= 0.1 =
This is first version.

== How to feedback ==

Sent email to zuola.com@gmail.com , or post your feedback at  [official support forum](https://wordpress.org/support/plugin/autohan/ "Support")