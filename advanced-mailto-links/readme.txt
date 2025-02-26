=== Advanced Mailto Links  ===
Contributors: wponlinesupport, anoopranawat 
Tags: mailto, mail pop up, email, email contact, email feature, email link, link, mail, mail contact, mail feature, mail link, send email, webmail    
Requires at least: 3.1
Tested up to: 5.3.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple way to enhance your mailto links with a convenient user interface.

== Description ==

A simple way to enhance your mailto links with a convenient user interface.

Check [Demo and Features](https://demo.wponlinesupport.com/advanced-mailto-links-demo/) for additional information.

Advanced Mailto Links is a WordPress plugin that enhances your mailto links. This tiny WordPress plugin adds extra features on mailto links, when user clicks on any mailto links, he/she has the option to compose an email in gmail, yahoo, outlook, email client app or copy the eamil. The plugin is compatible with all modern browsers and latest WordPress version.

= Shortcode Example =

<code>[amailto_link]</code>

You can also display mailto link in template/php file:

<code><?php echo do_shortcode('[amailto_link]'); ?></code>

= Use following parameters with shortcode =
<code>[amailto_link to="support@domain.com" subject="Hello" cc="support@domain.com" body="Hope you are doing well" text="Contact us"]</code>

* **to** : [amailto_link to="support@domain.com"] (Add the mail id to mailto).
* **subject** : [amailto_link subject="Hello"] (Subject for mail ).
* **cc**: [amailto_link cc="support@domain.com"] (CC for mail (if any)).
* **body** : [amailto_link body="Hope you are doing well"] (Body content part for mail (if any)).
* **text** : [amailto_link text="Contect us"] (Text for mail where user will click.).

= OR =

**If you do not want to use the shortcode and also you have aready added  "mailto" in your theme OR template file then just add class="mailtoui"**

It will replace Default email app to Advanced Mailto Link. For example:
<pre><code><a class="mailtoui" href="mailto:someone@example.com?Subject=Hello">Send Mail</a></code></pre>

Plugin is created with MailtoUI : MailtoUI is an open source JavaScript library that enhances your mailto links with a convenient user interface. It gives your users the flexibility to compose a new message using a browser-based email client or their default local email app. MailtoUI is written in vanilla JavaScript, so it's nice and lean with no dependencies to worry about. It works across virtually all devices and modern browsers for desktop and mobile.

== Installation ==

1. Upload the 'advanced-mailto-links.zip' folder to the '/wp-content/plugins/' directory.
2. Activate the "Advanced Mailto Links" list plugin through the 'Plugins' menu in WordPress.
3. Go to Advanced Mailto Links menu tab in the left side(WordPress admin menu) and check how it work.


== Changelog ==

= 1.0.1 (06-01-2020) =
* Fixed a small issue where mailto popup was not working without shortcode.

= 1.0 (01-01-2020) =
* Initial release.

