=== Address Autocomplete with Google ===
Contributors: marufsarkar  
Tags: address, autocomplete, google, API, address autocomplete  
Requires at least: 5.0  
Tested up to: 6.7  
Stable tag: 1.0.0  
Requires PHP: 7.4  
License: GPL-2.0-or-later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

Enable Google Places-powered address autocomplete for WordPress input fields. Supports country restrictions and place type selection.

== Description ==  
A simple address autocomplete feature for WordPress using the Google Places API.  
This plugin enables autocomplete functionality for address input fields using Google's Places API, making it easier for users to enter addresses accurately.  

== Installation ==  

1. Upload the plugin files to the `/wp-content/plugins/address-autocomplete-with-google/` directory, or install the plugin through the WordPress plugins screen directly.  
2. Activate the plugin through the 'Plugins' screen in WordPress.  
3. Go to **Settings > Address Autocomplete** to configure the plugin.  
4. Enter your **Google Places API Key** in the settings.  
5. Specify the target input fields using CSS selectors (e.g., `.address-input, #billing_address_1`).  
6. Save settings and test the autocomplete functionality on your website.  

== Frequently Asked Questions ==  

= How do I get a Google Places API Key? =  
- Go to the **[Google Cloud Console](https://console.cloud.google.com/)**.  
- Enable the **Places API** and **Maps JavaScript API**.  
- Generate an API key under **Credentials** and copy it into the plugin settings.  

= Does this plugin require a paid Google API key? =  
Yes, Google requires billing to be enabled for Places API usage, but they provide a free monthly usage quota.  

= Can I restrict the autocomplete to a specific country? =  
Yes, you can enter a **2-letter country code** (e.g., `US` for United States, `AU` for Australia) in the settings to limit autocomplete results to that country.  

= Can I choose different place types? =  
Yes, you can select from different **place types** such as:
- `geocode` (General locations)
- `address` (Physical addresses)
- `establishment` (Businesses & landmarks)
- `regions` (Administrative areas)
- `cities` (City-level search)

== External services ==  

This plugin uses the **Google Places API** to provide address autocomplete functionality.

- **What the service is and what it is used for**:  
  The Google Places API is used to offer address suggestions and autocomplete functionality for address input fields on your website.
  
- **What data is sent and when**:  
  The plugin sends user input data (such as location or address queries) to Google Maps API every time the autocomplete feature is used. This data is sent when the user starts typing an address in the input field, and the plugin makes an API request to fetch address suggestions.
  
- **Links to the service's terms and privacy policy**:  
  - [Google Terms of Service](https://cloud.google.com/terms)
  - [Google Privacy Policy](https://policies.google.com/privacy)

== Changelog ==  

= 1.0.0 =  
* Initial release.  
* Added support for Google Places API for address autocomplete.  
* Settings page for API key, input selectors, country restriction, and place types.  

== Upgrade Notice ==  
= 1.0.0 =  
- First release of Address Autocomplete with Google.  

== Screenshots ==  
1. **Settings Page** - Easily configure API key and target input fields.  
2. **Autocomplete in Action** - Address suggestions appear as users type.  
3. **Restrict to Country** - Set country restrictions for precise autocomplete.
