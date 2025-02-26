=== A+ Testimonial Builder ===
Contributors: david.wenner@vocalreferences.com 
Tags: app, widgets
Requires at least: 5.0
Tested up to: 6.7.1
Stable tag: 1.0.0
Plugin Name: A+ Testimonial Builder
Company: Local Hits Media LLC
Plugin URL: https://www.vocalreferences.com/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Icon URI: assets/icon.svg

A simple and easy to use testimonial plugin for your website.

== Description ==

"A+ Testimonial Builder" is a powerful WordPress plugin designed to effortlessly collect and showcase testimonials on your website.
Whether you're looking to boost credibility, engage visitors, or build trust with potential customers, this plugin is your go-to solution.

Key Features:
    Testimonial Collection: Gather authentic testimonials from your customers in various formats, including audio, video, and text. Allow users to submit testimonials directly through your website.
    Easy Integration: Seamlessly integrate testimonial submission forms into any page or post on your WordPress site using simple shortcodes or widgets.
    Customizable Display: Display testimonials beautifully with customizable layouts. Showcase testimonials in sliders, grids, or single view formats to match your website's design.
    Media Support: Support for audio and video testimonials ensures a dynamic and engaging user experience.
    Moderation and Approval: Maintain control over testimonials with built-in moderation and approval workflows. Review and publish testimonials that align with your brand standards.
    SEO-Friendly: Enhance your website's SEO by showcasing authentic testimonials, boosting user-generated content, and increasing social proof.
    Responsive Design: Ensure testimonials look great on all devices with responsive and mobile-friendly layouts.

Why Choose "A+ Testimonial Builder"?
    Build Trust: Gain credibility by showcasing real customer testimonials in their own voices.
    Engage Visitors: Encourage interaction and engagement through multimedia testimonials.
    Increase Conversions: Leverage social proof to convert more visitors into customers.
With "A+ Testimonial Builder," harness the power of testimonials to elevate your brand and connect with your audience like never before. Start leveraging the voice of your satisfied customers to drive growth and success today!

== Screenshots ==
1. Icon used in the plugin page.

== Assets ==
- icon.svg

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/a-testimonial-builder` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the Settings->Plugin Name screen to configure the plugin.

== External Services ==

This plugin connects to and uses external services for enhanced functionality. Below are the details of each service, including what it is used for, what data is transmitted, and links to relevant policies.

### VocalReferences Merchant
- **Purpose**: Display images and content from VocalReferences merchant services in the plugin.
- **Data Sent**: The plugin fetches images and other content from `https://merchant.vocalreferences.com/` to display testimonials and related materials.
- **When Data is Sent**: Data is retrieved when the plugin features displaying VocalReferences content are loaded or configured.
- **Service Terms and Policies**:
  - [VocalReferences Terms of Service](https://www.vocalreferences.com/terms-and-conditions)
  - [VocalReferences Privacy Policy](https://www.vocalreferences.com/privacy)

### VocalReferences API
- **Purpose**: Retrieve and manage testimonial data using the VocalReferences API.
- **Data Sent**: Requests to `https://api.vocalreferences.com/` include identifiers or credentials required to fetch or manage testimonial content.
- **When Data is Sent**: Data is transmitted when interacting with VocalReferences API-related features within the plugin.
- **Service Terms and Policies**:
  - [VocalReferences Terms of Service](https://www.vocalreferences.com/terms-and-conditions)
  - [VocalReferences Privacy Policy](https://www.vocalreferences.com/privacy)

### YouTube API
- **Purpose**: Fetch and display embedded YouTube videos within the plugin's features.
- **Data Sent**: The plugin may send video identifiers to YouTube's API to retrieve and display video content. No user-specific data is sent unless explicitly configured.
- **When Data is Sent**: Data is transmitted only when users embed or interact with YouTube content.
- **Service Terms and Policies**:
  - [YouTube Terms of Service](https://www.youtube.com/t/terms)
  - [YouTube Privacy Policy](https://policies.google.com/privacy)

### Vimeo API
- **Purpose**: Fetch and display Vimeo videos within the plugin's features.
- **Data Sent**: The plugin sends video identifiers to Vimeo's API for displaying content. No personal data is sent by default.
- **When Data is Sent**: Data is transmitted when Vimeo content is embedded or interacted with by the user.
- **Service Terms and Policies**:
  - [Vimeo Terms of Service](https://vimeo.com/terms)
  - [Vimeo Privacy Policy](https://vimeo.com/privacy)

### Instagram
- **Purpose**: Display Instagram content (images or videos) as part of the plugin's functionality.
- **Data Sent**: URL of the Instagram post to retrieve associated media. No user-specific data is transmitted.
- **When Data is Sent**: Data is transmitted when Instagram content is embedded or interacted with by the user.
- **Service Terms and Policies**:
  - [Instagram Terms of Use](https://help.instagram.com/581066165581870)
  - [Instagram Privacy Policy](https://privacycenter.instagram.com/policy)

### Google Maps
- **Purpose**: Display location-based data via Google Maps in the plugin.
- **Data Sent**: Address or location coordinates for rendering maps. User consent is required for sending location data.
- **When Data is Sent**: Data is sent when users interact with map-related features in the plugin.
- **Service Terms and Policies**:
  - [Google Maps Terms of Service](https://www.google.com/help/terms_maps/)
  - [Google Privacy Policy](https://policies.google.com/privacy)

### Fancybox
- **Purpose**: Provide a responsive, interactive popup for viewing images and managing testimonials within the plugin.
- **Data Sent**: No data is sent externally when Fancybox is used. It operates entirely within the user's browser to enhance the display of images and testimonials.
- **When Used**: 
  - Fancybox is used for displaying images in a popup format for improved viewing experience.
  - Fancybox is also used for opening add/edit testimonial forms in a popup for better usability.
- **Service Terms and Policies**:
  - [Fancybox Documentation and License](https://fancyapps.com/fancybox/)

### Bootstrap 4.6.2
- **Purpose**: Provide a responsive, mobile-first design framework for structuring and styling the plugin's user interface.
- **Data Sent**: No data is sent externally by Bootstrap. It operates entirely within the user's browser.
- **When Used**: Bootstrap is used throughout the plugin for layout, styling, and responsive design.
- **Service Terms and Policies**:
  - [Bootstrap Documentation](https://getbootstrap.com/docs/4.6/)

### Bootstrap Colorpicker
- **Purpose**: Enable color selection functionality within the plugin.
- **Data Sent**: No data is sent externally by Bootstrap Colorpicker. It operates entirely within the user's browser.
- **When Used**: Bootstrap Colorpicker is used for allowing users to select colors in a user-friendly interface, particularly when customizing testimonials or other plugin features.
- **Service Terms and Policies**:
  - [Bootstrap Colorpicker Documentation](https://itsjavi.com/bootstrap-colorpicker/)

---

== Features and Functionality ==

This plugin is designed to integrate seamlessly as a **module of VocalReferences** ([https://www.vocalreferences.com/](https://www.vocalreferences.com/)). It extends the platform's functionality by enabling the display, management, and customization of testimonials on your WordPress site.

### Widget Layouts
The plugin provides multiple widget layouts to display testimonials:
- **Band Layout**: Horizontal display of testimonials with sleek design.
- **Horizon Layout**: Layered display with a horizon effect.
- **Masonry Layout**: Responsive grid layout based on available space.
- **Matrix Layout**: Structured, uniform grid for testimonials.
- **Square Layout**: Equal-sized blocks for clean presentation.

Each layout can be customized to match your site's design and branding, offering flexibility and style.

---
