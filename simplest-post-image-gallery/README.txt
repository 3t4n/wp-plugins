=== Simplest Post Image Gallery ===
Contributors: artisare
Donate link: artisare.lv/wordpress-plugin
Tags: post, page, image, images, gallery, simple, simplest
Requires at least: 3.0.1
Tested up to: 4.9.8
Requires PHP: 5.6
Stable tag: 1.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simplest Post/Page image gallery. Attach images to each of the posts. Comes with the basic and intuitive admin interface.

== Description ==

Simplest Post Image Gallery is the simplest and straightforward way how to attach images to your posts/pages and then be able to display them in your template. 

Very basic and straightforward way how to attach images to your post/page via the admin interface. Even your grandma will understand this right away :)

== Installation ==

1. Upload `simplest-post-image-gallery` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php $image_array = implest_post_image_gallery_array($post_id); ?>` in your template file to retrieve the images for that post/page.

== Frequently Asked Questions ==

= Can I change how images are displayed in my theme =

Yes, plugin public function returns the ID of images that are attached to the post/page. And them display them with `<?php wp_get_attachment_image($image_id,'thumbnail', 1, 1); ?>` function for example and place those images where and how you want them within that page. Or you can even use `<?php get_post_meta($post->ID, 'post_images', true); ?>` function in template and retrieve those IDs yourself.

= Can I use Lightbox/Fancybox to display post images =

Yes, you display them in your theme in any way how you see it fit. See the above answer

== Screenshots ==

1. Select images that are already attached to your media library within the post/page edit screen.

== Changelog ==

= 1.0 =
Stable version, code compiled as a proper plugin