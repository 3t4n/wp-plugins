=== Html Content Shortcode ===
Contributors: epiphanyit321, souravjha
Tags: Shortcode, Plugin, User-Friendly
Requires at least: 4.7
Tested up to: 6.6
Stable tag: 1.0.0
Requires PHP: 8.2
License: GPLv2 or later
The Html Content Shortcode Plugin allows you to easily add custom HTML to your WordPress site using a simple shortcode.

== Description ==
The Html Content Shortcode Plugin allows you to easily add custom HTML to your WordPress site using a simple shortcode. This plugin provides a user-friendly interface in the WordPress backend for entering your HTML code, which can then be displayed on the frontend of your site with a shortcode.

### Features
1. **Easy HTML Entry:** Add your HTML code directly in the backend with a simple form.
2. **Shortcode Support:** Use the provided shortcode to display your HTML anywhere on your site.
3. **Customizable:** Tailor the HTML content as needed without any coding knowledge.
4. **Lightweight:** Minimal impact on site performance.

== Installation ==
* Upload the wp-html-display folder to the /wp-content/plugins/ directory.
* Activate the plugin through the 'Plugins' menu in WordPress.
* Navigate to HTML Content in the WordPress admin menu to enter your HTML code.

== Usage ==
After entering your HTML in the plugin settings, you can display it on your site using the shortcode:

[hcs_html_content]

Place this shortcode in any post, page, or widget where you want the HTML to appear.

== Settings ==
1. **HTML Content:** The main textarea where you can input your HTML code.
2. **Save Button:** Click to save your HTML for use with the shortcode.

== Example ==
1. Go to **HTML Content** in your WordPress admin panel.
2. Enter your desired HTML code (e.g., a custom button, an embedded video, etc.).
3. Save your changes.
4. Use [hcs_html_content] in your posts or pages to display the HTML.

== Frequently Asked Questions ==
= Can I use JavaScript in the HTML? =
Yes, you can add JavaScript within your HTML code, but ensure it doesn't conflict with other scripts on your site.

= Is it safe to use this plugin? =
Always validate and sanitize your HTML input. This plugin is designed for trusted users to add content. Use with caution to avoid XSS vulnerabilities.

= What if I want to change the shortcode? = 
You can modify the shortcode in the plugin code if needed, but this may require coding knowledge.

= Which WYSIWYG editor is used in the backend plugin ? =
The Html Content Shortcode Plugin is powered by [ckeditor5](https://ckeditor.com/ckeditor-5/).

== Screenshots ==

1. screenshot-1.png
2. screenshot-2.png

== Changelog ==

= 1.0.0 =
* Initial release of the Html Content Shortcode Plugin. 

== Upgrade Notice ==

= 1.0.0 =
* Initial release of the Html Content Shortcode Plugin.

== Contributing ==
If you'd like to contribute to the plugin, please fork the repository and submit a pull request. We welcome suggestions and improvements!
