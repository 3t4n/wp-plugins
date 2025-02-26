=== Dynamic Input For WPForms (DFXA) ===
Contributors: wpdebuglog  
Tags: wpforms, dynamic field, custom field, hidden fields, dynamic text  
Requires at least: 5.0  
Tested up to: 6.6
Stable tag: 1.0.0  
Requires PHP: 7.2  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

Easily add dynamic text, dynamic hidden fields, and advanced customization to WPForms.

== Description ==

DFXA For WPForms is an addon that allows users to add dynamic and hidden fields to their WPForms. 
This addon provides powerful options for pre-filling fields, passing dynamic data, and customizing input values on the fly.
Ideal for developers and marketers who need to personalize form interactions without manual input.

**Features:**
- Add hidden fields with dynamic values.
- Pass URL parameters into form fields.
- Auto-populate fields with post data, user data, or other custom values.
- Enhance WPForms functionality with minimal effort.
- Simple and lightweight, with no unnecessary bloat.

### **Included Shortcodes:**

Add **Dynamic Text** or **Dynamic Hidden** input field. 
Then edit field options > Advanced > Default Value. 
Finally, add correct shortcode.

1. **[dfxa_get_url]**  
   Retrieves a current URL.  
   **Usage:** `[dfxa_get_url]`  

2. **[dfxa_bloginfo]**  
   Retrieves WordPress site information, like site title or description.  
   **Usage:** `[dfxa_bloginfo key="name"]`  
   Example: Outputs the blog’s name based on the provided key.

3. **[dfxa_referrer]**  
   Displays the referrer URL (the page the user came from).  
   **Usage:** `[dfxa_referrer]`

4. **[dfxa_post_var]**  
   For pages that use a WP_POST object, this acts as an alias for `dfxa_post_var` so those attributes work here as well.
   **Usage:** `[dfxa_post_var key="title"]`  
   Example: Get the page title

5. **[dfxa_post_meta]**  
   Fetches custom post meta for a given post ID.  
   **Usage:** `[dfxa_post_meta post_id="123" key="custom_field"]`  
   Example: Retrieves the meta value stored under `custom_field` for post ID 123.

6. **[dfxa_GET]**  
   Retrieves GET parameter values directly from the URL.  
   **Usage:** `[dfxa_GET param="id"]`  
   Example: If the URL is `https://example.com?id=42`, the shortcode will output `42`.


== Installation ==

1. Upload the `dfxa-for-wpforms` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to WPForms -> Add New or edit an existing form.
4. Add the new 'Dynamic Hidden' Or 'Dynamic Text' field or any custom field provided by the addon.
5. Save the form and enjoy the extended features.

== Frequently Asked Questions ==

= How do I pass URL parameters to form fields? =  
Use the URL query parameter as the field's dynamic value, e.g., `?name=Arshid`. The field will automatically populate with "Arshid."

= Does this plugin work with the free version of WPForms? =  
Yes! This addon works with both the free and pro versions of WPForms.

= Can I customize hidden field values dynamically? =  
Yes. You can use post data, user meta, or custom scripts to pre-fill hidden fields.

== Screenshots ==

1. **New Hidden Field in WPForms Builder**  
2. **Auto-Populated Form Field Based on URL Parameters**  
3. **Dynamic Value Handling in Hidden Fields**

== Changelog ==

= 1.0.0 =  
* Initial release.  
* Added support for dynamic and hidden fields.  
* Custom field class enhancements.

== Upgrade Notice ==

= 1.0.0 =  
Initial release — no upgrades necessary at this time.

== License ==

This plugin is open-source and licensed under GPLv2 or later. For more information, visit [GPLv2 License](https://www.gnu.org/licenses/gpl-2.0.html).
