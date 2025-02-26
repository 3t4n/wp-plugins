=== About Author Box ===
Contributors:      WPKube
Tags:              author, authors, author box, author box, about author, after content, before content
Requires at least: 4.7.0
Tested up to:      5.9
Requires PHP:      5.4
Stable tag:        1.0.3

Display information about the post author automatically or using a shortcode.

== Description ==

Easily display an information box for the post author after or before post content.

Aside of the automatic display before post content and after post content you can also use a shortcode to display an author box. The shortcode is [about_author_box]

You can change the default settings for the shortcode in the "Shortcode" sections of the settings page. You can also pass parameters as part of the shortcode which overwrite those settings.

Accepted parameters are:

- avatar ( 1 or 0, 1 to show 0 to hide )
- avatar_size ( numeric value, default 120 )
- avatar_style ( square/rounded/circle )
- avatar_position ( left/right )
- name ( 1 or 0, 1 to show 0 to hide ))
- date ( 1 or 0, 1 to show 0 to hide )
- bio ( 1 or 0, 1 to show 0 to hide )
- social ( 1 or 0, 1 to show 0 to hide )
- style_border ( none/horizontal/full )

Example usage:

<pre>[about_author_box avatar_size="90" bio="no" style_border="horizontal"]</pre>

== Installation ==

- **WordPress Plugins Directory**: Navigate to *Plugins* → *Add New* in the WordPress admin and search “About Author Box”. Click *Install* and then *Activate*.
- **Zip Upload**: Navigate to *Plugins* → *Add New* → *Upload Plugin* in the WordPress admin. Browse to the .zip file containing the plugin on your computer and upload, then activate.
- **Manual FTP Upload**: Upload the plugin folder to `/wp-content/plugins/`. Navigate to *Plugins* in the WordPress admin and activate.

== Changelog ==

= 1.0.3 =
* Update `Tested up to` to 5.9

= 1.0.2 =
* Escape/sanitize dynamic values

= 1.0.1 =
* Escape/sanitize dynamic values for HTML attributes

= 1.0.0 =
* Initial Release
