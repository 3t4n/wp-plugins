=== Image to WebP Converter ===
Contributors: sachinrajcp123
Tags: image optimization, webp, performance, image compression
Tested up to: 6.7
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Automatically convert uploaded images (PNG, JPG, JPEG) to WebP format to enhance website performance and reduce load times.

== Description ==

**Image to WebP Converter** is a WordPress plugin designed to optimize your website's images by converting uploaded PNG, JPG, and JPEG files to the WebP format automatically. With smaller image sizes and improved performance, this plugin helps boost your site's speed and user experience.

**Features include:**
- Automatic conversion of PNG, JPG, and JPEG images to WebP format.
- Reduced file sizes for faster website load times.
- Seamless integration with the WordPress media upload process.
- Easy setup with no coding required.
- Maintains the original image files alongside WebP images (unless you modify this behavior).
- Error handling and logging for missing server support.

Save bandwidth and provide a faster browsing experience for your visitors with this powerful image optimization tool.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/image-to-webp-converter` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. The plugin works automatically—upload your images, and they will be converted to WebP format.

== Frequently Asked Questions ==

= How does the plugin work? =  
The plugin hooks into the WordPress media upload process and converts supported image files (PNG, JPG, JPEG) to WebP format automatically using the GD library.

= Do I need any special server requirements? =  
Yes, your server must have the GD library with WebP support enabled. Contact your hosting provider if you’re unsure.

= Will the original images be deleted? =  
By default, the plugin keeps the original images intact. You can modify this behavior in the plugin code if necessary.

= What happens if WebP is not supported on my server? =  
If WebP support is unavailable, the plugin will log an error and skip the conversion process.

= Is this plugin compatible with caching plugins? =  
Yes, it is compatible. However, for caching plugins to serve WebP images, you may need additional configuration depending on your caching solution.

= How can I check if my server supports GD WebP? =  
You can check this by running a PHP info script or contacting your hosting provider for confirmation.

= What if I encounter an error? =  
Ensure that `WP_DEBUG` is enabled in your WordPress configuration file (`wp-config.php`) to log errors. Check the WordPress debug log for any error messages related to the plugin.

== Screenshots ==

1. **Media Library Example**: Optimized images in WebP format displayed in the Media Library.
2. **Upload Process**: A demonstration of image conversion during the upload process.

== Changelog ==

= 1.0 =
* Initial release of the Image to WebP Converter plugin.

= 1.0 =
* Updated plugin version to 1.0 for compatibility with the latest WordPress releases.
* Improved error handling for cases where GD WebP support is missing.
* Enhanced code readability with better prefixing and optimizations.
* Tested and ensured compatibility with WordPress 6.7 and PHP 8.2.

== Upgrade Notice ==

= 1.0 =
* Ensure your server supports GD library with WebP for optimal performance. If upgrading from version 1.0, verify server configuration for GD WebP support.
