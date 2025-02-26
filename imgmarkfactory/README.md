=== ImgMarkFactory ===
Contributors: ntuummm
Tags: watermark, image watermark, bulk watermark, image protection, watermarking
Requires at least: 5.0
Tested up to: 6.7
Stable tag: 1.0.0
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Add professional watermarks to your images with real-time preview and drag-and-drop positioning. Support for both text and image watermarks.

== Description ==

ImgMarkFactory is a user-friendly plugin that helps you add watermarks to your images efficiently. With its intuitive interface, you can watermark multiple images simultaneously while previewing changes in real-time.

= Key Features =

* Process up to 3 images simultaneously
* Text watermarks
* Real-time preview with drag-and-drop positioning
* Adjustable opacity settings
* Custom watermark positioning
* Supports PNG and JPG formats
* Interactive preview mode
* Supports images up to 500KB

= Current Features and Limitations =

* Export Limit: 20 images per hour
* Export Quality: Fixed at 70%
* Batch Size: Process up to 3 images at once
* File Size Limit: Each image must be ≤ 500KB
* Font Size: Fixed font size for all text watermarks
* Formats Supported: PNG and JPG/JPEG only

= System Requirements =

* PHP GD Library
* WordPress 5.0 or higher
* PHP 7.2 or higher
* 

== External Services ==

This plugin connects to a third-party API provided by **ImgMarkFactory API** to process images with watermark overlays and export the final result.

* **Service Provider:** ImgMarkFactory API
* **What It Does:** Processes image watermarking and generates the final watermarked image export.
* **What Data is Sent:**  
   - Image file itself as Base64
   - Image resolution  
   - Image name  
   - Watermark text color  
   - Watermark opacity  
   - Watermark text position  
   - Canvas size  
   - File size (used solely for monitoring traffic and adjusting service capacity)  
* **What Data is NOT Stored:**  
   - The image file itself, including file names, content, or copies, is never stored. Only the file size is logged for traffic monitoring.  
* **When Data is Sent:**  
   - Data is sent whenever the watermark text, position, opacity, color, or canvas size is changed.  
   - When the user clicks "Apply Watermark"  
* **Service URL(s):**

1. **`https://api.ntuummm.com/api/free/v1/generate-image-with-watermark-preview`**  
   - **Purpose:**  
     Generates a **real-time preview** of the image with the watermark applied.  
   - **How It Works:**  
     - When users adjust watermark settings (e.g., text, position, color, opacity, or canvas size), this endpoint processes the image and generates a preview.  
     - Allows users to see an up-to-date preview before final export.  
   - **Data Sent:**  
     - Image itself as Base64
     - Image resolution  
     - Watermark text  
     - Watermark text color  
     - Watermark opacity  
     - Position of the watermark text  
     - Canvas size  

2. **`https://api.ntuummm.com/api/free/v1/export-images-with-watermark`**  
   - **Purpose:**  
     Generates and exports the **final image** with the watermark applied.  
   - **How It Works:**  
     - When users click **"Apply Watermark"** to save the image, this endpoint processes the request and delivers the final watermarked image.  
   - **Data Sent:**  
     - Image itself as Base64
     - Image resolution  
     - Image name  
     - Watermark text  
     - Watermark text color  
     - Watermark opacity  
     - Position of the watermark text  
     - Canvas size  
   - **Additional Information:**  
     - File size is logged for traffic monitoring and service capacity adjustments.  
     - No actual image content, file names, or copies are stored by the service.

* **Key Differences Between Endpoints:**
   - **`generate-image-with-watermark-preview`**:  
     Focuses on generating **real-time previews** of the watermark while the user adjusts settings.  
   - **`export-images-with-watermark`**:  
     Generates and delivers the **final exported image** after the user confirms and clicks "Apply Watermark"

* **Terms of Service and Privacy Policy:**  
   [Privacy Policy](https://ntuummm.github.io/my/img-mark-factory/index.html)

Users must review and agree to the privacy policy of the ImgMarkFactory API before using this plugin.


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/imgmarkfactory` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the Settings->ImgMarkFactory screen to configure the plugin.
4. Upload images and start watermarking!

== Frequently Asked Questions ==

= Which image formats are supported? =

Currently, the plugin supports PNG and JPG/JPEG formats.

= How many images can I watermark at once? =

You can watermark up to 3 images simultaneously.

= Is there a limit to how many images I can export? =

Yes, there is a limit of 20 exported images per hour.

= What's the quality of exported images? =

The plugin exports images at 70% quality.

= Do I need any special server requirements? =

Yes, your server must have the PHP GD Library installed. Most WordPress hosts include this by default.

= Are there any restrictions on the image size? =

Yes, each image must be no larger than 500KB. If you attempt to upload an image exceeding this size, the upload will fail.

= Can I adjust the position of the watermark? =

Yes, you can adjust the position of the text or image watermark by dragging it directly on the preview! Alternatively, you can select a predefined position using the "Watermark Position" dropdown.

= Why does the preview look low quality? =

The preview quality may appear low to ensure faster loading and adjustments, but rest assured, this does not affect the quality of the final export. 

== Screenshots ==

1. Main plugin interface
2. Watermark customization options
3. Real-time preview with drag-and-drop
4. Batch processing interface

== Changelog ==

= 1.0.0 =
* Initial release
* Real-time preview functionality
* Drag-and-drop positioning for text watermarks
* Adjustable opacity settings
* Fixed font size for text
* Batch processing (up to 3 images)
* Export in PNG and JPG formats
* Basic positioning presets
* Export quality fixed at 70%

== Upgrade Notice ==

= 1.0.0 =
Initial release of ImgMarkFactory. Includes essential watermarking features with real-time preview.