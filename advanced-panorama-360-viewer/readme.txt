=== Advanced Panorama 360 Viewer ===
Contributors: wpshopifyexpert
Donate Link: https://buymeacoffee.com/shehabulislam
Tags: panorama, 360-degree, image viewer, Gutenberg block, 360 image
Requires at least: 5.6
Tested up to: 6.7
Stable tag: 1.0.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Display immersive 360-degree panoramas on your WordPress site with our feature-rich 360 image viewer Gutenberg block.

== Description ==

Advanced Panorama 360 image Viewer is a powerful WordPress plugin that allows you to easily embed and display 360-degree panoramic images on your website. With a dedicated Gutenberg block, this plugin seamlessly integrates with the WordPress block editor, making it easy to create engaging, interactive content for your visitors.

= Key Features =

* Gutenberg block for easy integration with the WordPress block editor
* Support for 360-degree panoramic images
* Customizable controls for user interaction
* Ability to add custom hotspots for additional information
* Option to set up default hotspots
* Responsive design for optimal viewing on all devices
* Lightweight and optimized for fast loading times

= Use Cases =

* Real Estate: Showcase property interiors and exteriors with immersive 360-degree views
* Tourism: Display panoramic views of scenic locations or attractions
* Education: Create interactive learning experiences for museums or historical sites
* Events: Offer 360-degree views of venues for weddings, conferences, or exhibitions
* Product Showcases: Display products in a 360-degree view for e-commerce sites


== Shortcode Usage ==

You can use the Advanced Panorama 360 Viewer shortcode to embed panoramas in your posts, pages, or anywhere shortcodes are supported. The basic syntax is:

[advance_panorama_viewer]

= Shortcode Attributes =

The shortcode supports the following attributes:

1. id (optional): A unique identifier for the panorama viewer.
   Default: null

2. panorama (required): The URL of the panorama image.
   Default: null

3. title (optional): The title of the panorama.
   Default: null

4. author (optional): The author or creator of the panorama.
   Default: null

5. auto_load (optional): Whether to load the panorama automatically.
   Accepted values: "true" or "false"
   Default: "true"

6. draggable (optional): Whether the panorama can be dragged to pan around.
   Accepted values: "true" or "false"
   Default: "true"

7. align (optional): Alignment of the panorama viewer.
   Accepted values: "left", "center", "right"
   Default: ""

8. class_name (optional): Additional CSS class(es) for the panorama viewer container.
   Default: null

9. height (optional): The height of the panorama viewer.
   Default: "400px"

10. width (optional): The width of the panorama viewer.
    Default: "100%"

= Examples =

Basic usage:
[advance_panorama_viewer panorama="https://example.com/path/to/panorama.jpg"]

With additional attributes:
[advance_panorama_viewer panorama="https://example.com/path/to/panorama.jpg" title="Beautiful Sunset" author="John Doe" height="600px" auto_load="false"]

Aligned to the right with custom class:
[advance_panorama_viewer panorama="https://example.com/path/to/panorama.jpg" align="right" class_name="my-custom-panorama" width="80%"]

= Notes =

- The 'panorama' attribute is required. Without it, the viewer will not display properly.
- Use percentage or pixel values for 'height' and 'width' attributes (e.g., "100%", "400px").
- When using the shortcode in a page builder or custom HTML block, you may need to wrap it in a shortcode block or use the appropriate syntax for your specific editor.


== Installation ==

1. Upload the `advanced-panorama-360-viewer` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use the Gutenberg block to add a 360-degree panorama to your post or page

== Frequently Asked Questions ==

= What image formats are supported? =

The plugin supports equirectangular images in common web formats such as JPG, PNG, and WebP. For best results, use high-quality equirectangular images with a 2:1 aspect ratio.

= Can I use this plugin with page builders other than Gutenberg? =

The plugin is designed to work seamlessly with the Gutenberg block editor. While it doesn't provide native support for other page builders, you can use the plugin's shortcode in any page builder that supports shortcodes. We're considering adding support for more page builders in future updates.

= How can I optimize the performance of 360-degree panoramas on my site? =

To ensure optimal performance, we recommend using compressed images, enabling browser caching, and using a content delivery network (CDN) for your website. The plugin is designed to load resources efficiently, but large panoramic images may still impact page load times.

= Can I customize the viewer controls? =

Yes, the Gutenberg block provides options to customize the viewer controls. You can choose to show or hide controls, and even specify custom control settings to tailor the user experience.

= Does this plugin support VR viewing? =

Currently, the plugin does not have built-in VR support. However, we're exploring the possibility of adding WebVR compatibility in a future release.

== Screenshots ==

1. 360-degree panorama viewer in action
2. Gutenberg block settings
3. Custom hotspot editor
4. Panorama viewer on mobile devices

== Changelog ==

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.0 =
This is the first release of the Advanced Panorama 360 Viewer plugin.

== Additional Info ==

For more information, please visit our [official website](https://wpshopifyexpert.com/advanced-panorama-360-viewer).

= Credits =

This plugin uses the following open-source libraries:
* [Three.js](https://threejs.org/) - For 3D rendering
* [Pannellum](https://pannellum.org/) - For panorama viewing functionality

= Privacy Policy =

Advanced Panorama 360 Viewer does not collect or store any personal data. It functions solely to display 360-degree panoramic content on your WordPress site.

## Source Code Availability

To comply with WordPress.org guidelines and ensure transparency, we provide access to the uncompressed source code of our JavaScript files. This is important for the review process and for users who wish to examine or modify the code.

### Accessing the Source Code

The uncompressed JavaScript source files are available in the `src` folder of our plugin repository. You can find these files at:

[https://github.com/shehabulislam/advanced-panorama-360-viewer/tree/main/src](https://github.com/shehabulislam/advanced-panorama-360-viewer/tree/main/src)

Included in the src folder as well.

We utilized an open-source library for image viewing: https://github.com/mpetroff/pannellum.

= Support =

For support inquiries, please visit our [support forum](https://wpshopifyexpert.com/support) or contact us at wordpress@wpshopifyexpert.com.

= Contribute =

If you'd like to contribute to the development of this plugin, visit our [GitHub repository](https://github.com/shehabulislam/advanced-panorama-360-viewer).
