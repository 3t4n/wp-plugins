=== Article Gallery Slider ===
Contributors: Module Express
Donate link: http://beautiful-module.com/
Tags: responsive Article Gallery Slider,Article Gallery Slider,mobile touch Article Gallery Slider,image slider,responsive header gallery slider,responsive banner slider,responsive header banner slider,header banner slider,responsive slideshow,header image slideshow
Requires at least: 3.5
Tested up to: 4.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A quick, easy way to add an Responsive header Image Gallery Vertical OR Responsive Article Gallery Slider inside wordpress page OR Template. Also mobile touch Article Gallery Slider

== Description ==

This plugin add a Responsive Article Gallery Slider in your website. Also you can add Responsive Article Gallery Slider page and mobile touch slider in to your wordpress website.

View [DEMO](http://beautiful-module.com/demo/article-gallery-slider/) for additional information.

= Installation help and support =

The plugin adds a "Responsive Article Gallery Slider" tab to your admin menu, which allows you to enter Image Title, Content, Link and image items just as you would regular posts.

To use this plugin just copy and past this code in to your header.php file or template file 
<code><div class="headerslider">
 <?php echo do_shortcode('[sp_article.gallery]'); ?>
 </div></code>

You can also use this Article Gallery Slider inside your page with following shortcode 
<code>[sp_article.gallery] </code>

Display Article Gallery Slider catagroies wise :
<code>[sp_article.gallery cat_id="cat_id"]</code>
You can find this under  "Article Gallery Slider-> Gallery Category".

= Complete shortcode is =
<code>[sp_article.gallery cat_id="9" width="400" autoplay_interval="3000"]</code>
 
Parameters are :

* **limit** : [sp_article.gallery limit="-1"] (Limit define the number of images to be display at a time. By default set to "-1" ie all images. eg. if you want to display only 5 images then set limit to limit="5")
* **cat_id** : [sp_article.gallery cat_id="2"] (Display Image slider catagroies wise.) 
* **width** : [sp_article.gallery width="400"] (Set width or not. value is number OR percentage)
* **autoplay_interval** : [sp_article.gallery width="400" autoplay_interval="3000"] (Set autoplay interval)
* **items** : [sp_article.gallery items="4"] (Set slider number that you want to display)

= Features include: =
* Mobile touch slide
* Responsive
* Shortcode <code>[sp_article.gallery]</code>
* Php code for place image slider into your website header  <code><div class="headerslider"> <?php echo do_shortcode('[sp_article.gallery]'); ?></div></code>
* Article Gallery Slider inside your page with following shortcode <code>[sp_article.gallery] </code>
* Easy to configure
* Smoothly integrates into any theme
* CSS and JS file for custmization

== Installation ==

1. Upload the 'article-gallery-slider' folder to the '/wp-content/plugins/' directory.
2. Activate the 'Article Gallery Slider' list plugin through the 'Plugins' menu in WordPress.
3. If you want to place Article Gallery Slider into your website header, please copy and paste following code in to your header.php file  <code><div class="headerslider"> <?php echo do_shortcode('[sp_article.gallery limit="-1"]'); ?></div></code>
4. You can also display this Images slider inside your page with following shortcode <code>[sp_article.gallery limit="-1"] </code>


== Frequently Asked Questions ==

= Are there shortcodes for Article Gallery Slider items? =

If you want to place Article Gallery Slider into your website header, please copy and paste following code in to your header.php file  <code><div class="headerslider"> <?php echo do_shortcode('[sp_article.gallery limit="-1"]'); ?></div>  </code>

You can also display this Article Gallery Slider inside your page with following shortcode <code>[sp_article.gallery limit="-1"] </code>



== Screenshots ==
1. Designs Views from admin side
2. Catagroies shortcode

== Changelog ==

= 1.0 =
Initial release