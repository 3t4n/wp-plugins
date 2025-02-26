=== Show Event for Rosadigitale ===
Contributors: sarabroi,matteoenna  
Tags: map, shortcode, events, custom map, maps  
Requires at least: 5.0  
Tested up to: 6.7.1
Stable tag: 1.2
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl.html  

Show Event for Rosadigitale integrates with "Map in Each Post" to display events organized by the Rosadigitale movement on customized maps.

== Description ==

Show Event for Rosadigitale allows you to automatically fetch and display events organized by Rosadigitale on maps integrated within your posts. By using the shortcode from the "Map in Each Post" plugin, you can filter events by year and display them with specific location markers. The plugin pulls event data from the Rosadigitale website via a JSON API and adds these events to your maps.

**Features:**
- Integrates with "Map in Each Post" to display events on maps.
- Fetches event data from the Rosadigitale JSON API.
- Automatically adds event markers for each location (latitude and longitude).
- Filter events by year using shortcode attributes.
- Includes event titles and links to each event.

= Usage =

To display Rosadigitale events on a map, simply use the following shortcode with "Map in Each Post":

`[mapInEachPost rosadigitale="true" year="2024"]`

- `rosadigitale`: Set this to `"true"` to display Rosadigitale events.
- `year`: (optional) Filters events by year.

= Example =

To display all Rosadigitale events from 2024 on a map, use the shortcode:

`[mapInEachPost rosadigitale="true" year="2024"]`

= Requirements =

This plugin requires "Map in Each Post" to be installed and active for proper functionality.

== Installation ==

1. Install and activate "Map in Each Post".
2. Upload the `show-rosadigitale-events` plugin to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen.
3. Activate the plugin through the 'Plugins' screen in WordPress.
4. Use the `[mapInEachPost rosadigitale="true"]` shortcode to display events on your posts.

== Frequently Asked Questions ==

= What does this plugin do? =

This plugin integrates with "Map in Each Post" to fetch and display Rosadigitale events on customized maps in WordPress posts.

= How do I display only events from a specific year? =

You can filter the events by using the `year` attribute in the shortcode. For example, `[mapInEachPost rosadigitale="true" year="2024"]`.

= Can I use this plugin without "Map in Each Post"? =

No, "Map in Each Post" is required for the maps to function properly.

== Third-Party Services ==

This plugin fetches event data from Rosadigitale's public JSON API.

- **Service**: Rosadigitale Events API  
- **Purpose**: This API provides event data organized by Rosadigitale to be displayed on maps within WordPress posts.  
- **Data Sent**: The plugin does not send user data; it only retrieves publicly available event data, including event titles, descriptions, locations (latitude and longitude), and event dates from the API.  
- **Endpoint**: [https://rosadigitaleweek.com/wp-json/external-events/v1/posts/](https://rosadigitaleweek.com/wp-json/external-events/v1/posts/)  
- **Terms of Service**: [Rosadigitale Terms of Service](https://rosadigitaleweek.com/terms-and-conditions-for-rosadigitale-events-api-usage/)  
- **Privacy Policy**: [Rosadigitale Privacy Policy](https://rosadigitaleweek.com/privacy-policy-for-rosadigitale-events-api/)  

== Changelog ==

= 1.0.0 =
* Initial release
