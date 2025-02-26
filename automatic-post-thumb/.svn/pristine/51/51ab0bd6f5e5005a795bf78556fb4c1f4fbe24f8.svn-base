=== Automatic Post Thumb ===
Contributors: Devolux
Donate link: http://devolux.org/
Tags: images, thumbnail
Requires at least: 2.0.2
Tested up to: 2.7
Stable tag: 1.0

The plugin generates a thumbnail from the first image uploaded to a post.

== Description ==

The plugin extracts the first image uploaded to a wordpress post by using a simple database query. You are not obliged to insert it into your post, but of course you can do so. Please note that the database order of the images is not influenced by the way you order your images in a post. The first image uploaded will remain the thumbnail, even if you place at the end of your article. If you delete the first image, the second one will take its position. If no image at all is added to a post, the plugin delivers a default image (a white wordpress logo with light gray background).

The title of the thumbnail is generated out of the post title. You can insert the image anywhere in your theme inside the wp-loop by adding a template tag to the source code. Please be aware that the plugin does not resize or crop the images. It simply delivers the html tag. The styling is intended to be solved via CSS (s. "Installation").

Please report bugs at the plugin's homepage. 

== Installation ==
1. Upload "post_thumb" to the "/wp-content/plugins/" directory

2. Activate the plugin through the "Plugins" menu in WordPress

3. Place "&lt;?php post_thumb(); ?&gt;" inside the wp-loop of your template, where ever you want the thumbnail to appear.

4. A nice way to use this plugin is to link the images to the post by wrapping the plugin template tag into the post URL: 

&lt;a href=&quot;&lt;?php the_permalink(); ?&gt;&quot; rel=&quot;bookmark&quot; title=&quot;&lt;?php the_title(); ?&gt;&quot;&gt;&lt;?php post_thumb(); ?&gt;&lt;/a&gt;

5. Adjust display and image size using CSS. The plugin renounces on resizing the thumbnail because this can be done easily inside your style.css. You can used it at any place of your theme by giving it a "max-width" value. The height will automatically be adjusted and, in the case that the image is more narrow than the "max-width", it will keep its original dimensions.

== Frequently Asked Questions ==

Not yet available.

== Screenshots ==

[post-thumb screenshots](http://devolux.org/post-thumb "post-thumb Screenshots")

== A brief Markdown Example ==

&lt;a href=&quot;&lt;?php the_permalink(); ?&gt;&quot; rel=&quot;bookmark&quot; title=&quot;&lt;?php the_title(); ?&gt;&quot;&gt;&lt;?php post_thumb(); ?&gt;&lt;/a&gt;

