=== Emb3D Model Viewer ===
Contributors: netfarm
Tags: 3d, 3d model viewer, widget
Requires at least: 5.7
Tested up to: 6.1.1
Stable tag: 1.0.6
Requires PHP: 7.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A 3D model viewer for Elementor and WooCommerce

== Description ==

This plugin allows you to embed a 3D model viewer in your Elementor or WooCommerce site.
3D models are all the rage these days. Whether you're an architect, product designer, or marketer,
chances are you've needed to find a way to show off your work in 3D.

Emb3D Model Viewer is a 3D model viewer widget for Elementor and WooCommerce.
With it, you can easily embed 3D models into your pages and products, and view them in real-time.

It's perfect for showing off products, architecture, or any other kind of 3D model.
And, because it's built on WebGL, it's super fast and smooth.

So, if you're looking for a way to show off your 3D work in a beautiful, interactive way,
Emb3D Model Viewer is the perfect solution.

**[See in action](https://www.emb3d.com/)**

== Frequently Asked Questions ==

= Which 3D files currently this plugin support?

It supports GLB/GLFT and Proprietary EMB3D format,
the Premium version also supports 3DS, ASE, DAE, FBX, OBJ, PLY, STL

= How to upload a model with separate model and texture files?

Put all file in a zip file, upload the archive, please note that Elementor will block
zip files by default, you need to enable this option (for svg, but applies also to zip):

<https://el-mentor.com/elementor-faqs/svg-support-elementor/>

A simpler solution is to change the zip file extension to mzip, so it will be
handled directly as 3D model format.

An even better solution would be to use our powerful optimized format emb3d,
you can convert your model for free at: <https://app.emb3d.com/>

= How to upload large model files?

You need to increase `post_max_size` and `upload_max_filesize` in your `php.ini`,
you may also need to increase the respective option in your webserver,
e.g. if using **NGINX** `client_max_body_size`

== Screenshots ==

1. Adding Emb3D Model Viewer Widget when editing a page with Elementor
2. Options panel, click upload button
3. Selecting a model from library or uploading new one
4. Changing the background color
5. WooCommerce product image replaced with a 3D Model

== Changelog ==

= 1.0.6 =
* Fixed registration check
* Added background / progress color option for WooCommerce

= 1.0.5 =
* Added Control to disable light on Elementor widget

= 1.0.4 =
* Corrected wrong Netfarm URL

= 1.0.3 =
* Small fixes

= 1.0.2 =
* Fixes, enabled Premium registration

= 1.0.1 =
* Fixes

= 1.0.0 =
* First public release.

== Features ==

* Elementor: integrates seamlessly with Elementor Editor through a specific widget, supporting background and sizing
* WooCommerce: you can attach a 3d model to a product, adding a link or replacing the product image
* Media Library integration: Models are handled like other Media
* Rotation and Zoom, it also supports touch
* LIGHT: GLB and GLFT models supported, Proprietary Compressed and Optimized Emb3D format to secure your models
* PREMIUM: No waterkmark
* PREMIUM: EMB3D, GLB, GLTF, 3DS, ASE, DAE, FBX, OBJ, PLY, STL
* PREMIUM: Multiple viewer in the same page

== Installation ==

Elementor:

* You will find Emb3D Viewer widget in Elementor Editor, with various options and preview

WooCommerce:

* While editing a product, locate Emb3D Model Viewer meta box and click "Select model"
