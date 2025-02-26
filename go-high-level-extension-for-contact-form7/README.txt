=== GHL Contact Bridge – Send Contact Form 7 leads to GHL CRM ===
Contributors: ibsofts, laddoo
Donate link: https://donate.stripe.com/14keXEbyJ2xp43SdQR
Tags: Addons,Highlevel,Lead Connector,automation,contactform7
Requires at least: 4.0
Tested up to: 6.7
Stable tag: 1.0.2
Requires PHP: 7.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This Contact Form 7 extension seamlessly syncs with GoHighLevel CRM for streamlined lead management and enhanced follow-up.

== Description ==

🌐 <a href="https://www.ibsofts.com/plugins">Official Website</a> | 📖 <a href="https://support.ibsofts.com/knowledgebase/categories/go-high-level-extension-for-contact-form-7-free">Documentation</a> | 💁 <a href="https://support.ibsofts.com/">Support</a>

This plugin sends Contact Form 7 Data to Go High Level on form submission.

If you are not aware, of what GHL is, please review [here](https://www.gohighlevel.com/?fp_ref=ibsofts "GoHighLevel")

= 🚀 Level Up with GHL Contact Bridge – Send Contact Form 7 leads to GHL CRM =

This *Go High Level extension* is a valuable tool for users who want to integrate their Contact Form 7 with Go High Level CRM. This extension provides a simple and efficient way to transfer form data to Go High Level CRM, enabling users to manage their leads and follow up with potential customers more effectively. Whether they are managing a small business or a large organization, this extension can help users streamline their lead management process and improve their overall workflow.


= 🚀 What Makes it the Best Extension =


☑️ Connect GHL Locations for subaccounts.
☑️ Send leads on the connected accounts in GHL CRM.
☑️ Manage multiple projects simultaneously. 
☑️ Increase process efficiency.
☑️ Add multiple tags on specific forms according to one's choice.
☑️ Add global tags for all the forms.
☑️ Provide customization options.
☑️ Free to use.


= 🚀 Important Points to Remember =


☑️ While creating a form in Contact Form 7 always use the same fields value which you map in the mapping fields section in plugin settings.
☑️ Add tags in the form to get better results in GHL.
☑️ Check the documentation for more information. [Click Here](https://support.ibsofts.com/knowledgebase/categories/go-high-level-extension-for-contact-form-7-free)



== Installation ==


= Installing and Activating =


☑️ To get started with the Go High Level extension, users need to install and activate it. They can do this by downloading the extension from the WordPress Plugin Directory. 
☑️ Once the extension has been downloaded, it can be installed by uploading it to the WordPress site's plugin directory. 
☑️ After installation, it can be activated by navigating to the plugins page in the WordPress dashboard and clicking the Activate button next to the Go High Level Plugin.


= Setting up the Plugin =


Once the Go High Level extension is activated, follow the settings listed below:

*Setting 1*

☑️ Open the plugin settings and move to the Connect With GHL tab and connect your GHl Business Account.
☑️ Now move to Mapping Fields tab and Map the Name,Email and Phone No fields.
☑️ Now move to the Global settings tab and add the Global tags this tags will send when there is no form specific tags(This Part is Optional).
☑️ Now it is ready to transfer form data to GoHighLevel CRM.

*Setting 2*

☑️ Go to Contact Forms under Contact side menu.
☑️ Go to the edit of the form and then GHL For CF7.
☑️ Fill the form-specific tag (If needed).
☑️ Click the checkbox if you want to sends lead in GHL for this specific form.
☑️ Now go to the Form tab in the form setting and add the required fields make sure to add the same fields value which you map in the Mapping Fields section in plugin.

When a user submits a form, the data is automatically transferred to Go High Level CRM and can be viewed in the lead section of the CRM. This makes it easy for users to keep track of their leads and follow up with potential customers.

== External Services ==

This plugin sends form data (name, email, phone number) from Contact Form 7 submissions to Go High Level CRM (LeadConnector). The data is sent to Go High Level to create or update a contact record.

**Service Used**: Go High Level CRM (LeadConnector)
**Data Sent**: Form name, email, phone number.
**When Data is Sent**: Data is sent when a Contact Form 7 submission is made on your site.
**Purpose**: To sync form submissions with Go High Level CRM for lead management.
**Authentication**: The plugin authenticates with Go High Level using OAuth 2.0.
   **Access Token**:  An access token is used to authenticate API requests. This token expires after 24 hours.
   **Refresh Token**: When the access token expires, a refresh token is used to request a new access token without requiring the user to reauthenticate. The refresh token is automatically used by the plugin to ensure seamless operation.
   
**API Endpoints Used**:
**Token Endpoint**: https://services.leadconnectorhq.com/oauth/token
 This endpoint is used to obtain the initial access token and refresh the token when expired.
   
- **Contact Upsert Endpoint**: https://services.leadconnectorhq.com/contacts/upsert
   - This endpoint is used to create or update contact data (name, email, phone number) in Go High Level CRM.

- **Location Endpoint**: https://services.leadconnectorhq.com/locations/{location_id}
   - This endpoint is used to fetch location data (i.e. selected subaccount location name).

**Links to Terms and Privacy Policy**:
 **Go High Level Terms of Service**: [Go High Level Terms of Service](https://www.gohighlevel.com/terms-of-service)
 **Go High Level Privacy Policy**: [Go High Level Privacy Policy](https://www.gohighlevel.com/privacy)

Please note that the plugin automatically manages the OAuth token refresh process, so users do not need to take any additional action once the initial authentication is complete.



== Frequently Asked Questions ==


= What data will this extension send from the forms? =


Name, email, and phone type data of Contact Form are sent to the Go High Level API.
Subfield data of name type is also sent including Prefix, First Name, Middle Name, Last Name, and Suffix.

= Can we link the Contact form to GHL sub-accounts? =

Yes, we can connect any sub-account locations under the Connect with GHL tab. This allows managing different projects at the same time.


== Screenshots ==

1. Installing and Activation Plugin "GHL Contact Bridge – Send Contact Form 7 leads to GHL CRM".
2. Connect With GHL
3. Mapping Fields
4. Global Tag Setting
5. Help/Support
6. Form setup
7. Form specific Tag setting

== Documentation & Support ==

For more detailed instructions and documentation, visit our **[Documentation.](https://support.ibsofts.com/knowledgebase/categories/go-high-level-extension-for-contact-form-7-free)**   
  
If you need any help or customization in the plugin, please connect with us **[HERE](https://www.ibsofts.com/contact-us/)**



= 🚀 More Products from ib Softs =

👉 [GHL Gravity Bridge – Send Gravity Forms leads to GHL CRM - Free](https://wordpress.org/plugins/go-high-level-extension-for-gravity-form/)
👉 [Go High Level Extension For Gravity Forms - Pro](https://www.ibsofts.com/plugins/go-high-level-extension-for-gravity-forms/)
👉 [GHL Connect for WooCommerce - Free](https://wordpress.org/plugins/ghl-connect/)
👉 [GHL Connect for WooCommerce - Pro](https://www.ibsofts.com/plugins/ghl-connect-for-woocommerce-pro/)
👉 [Go High Level Extension For Contact Form 7 - Pro](https://www.ibsofts.com/plugins/go-high-level-extension-for-contact-form-7/)
👉 Go High Level Extension For JotForm - Free(Coming Soon)
👉 [Go High Level Extension For JotForm - Pro](https://www.ibsofts.com/plugins/go-high-level-extension-for-jotform/)
👉 [Boom Fest](https://wordpress.org/plugins/boom-fest/)
👉 [Reviews for WooCommerce](https://wordpress.org/plugins/reviews-for-woocommerce/)
👉 For more web services and solutions, please visit [ibarts.co](https://www.ibarts.co/contact-us/)

== Changelog ==
= 1.0.2 =
* Modify the plugin display name.

= 1.0.1 =
* Added new products on Our Products tab.

= 1.0 =
* First version for Go high level extension for Contact Form 7.


== Upgrade Notice ==
= 1.0.2 =
* Modify the plugin display name.

= 1.0.1 =
* Added new products on Our Products tab.

= 1.0 =
* First version for Go high level extension for Contact Form 7.