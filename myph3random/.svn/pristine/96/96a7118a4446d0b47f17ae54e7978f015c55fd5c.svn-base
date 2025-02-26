=== Plugin Name ===
Contributors: elmotheelk
Donate link: http://myph3.sf.net/
Tags: images, gallery, random
Requires at least: 2.0.0
Stable tag: 1.1.1

Reads from your myPh3 gallery and shows a random image from it on you Wordpress blog

== Description ==

A totally new Wordpress plugin, which reads from your myPh3 gallery and shows a random image from it on you Wordpress blog!

== Installation ==

Installation is easy. Place the myPh3.random.php file in you Wordpress /wp-content/plugins/ folder. Now, go to your blog's admin panel and activate the myPh3 random image plugin from the plugins menu. Next, go to the options pane of myPh3 to enter your myPh3 configuration details.

Finally, you'll have to edit your Wordpress theme files found in /wp-content/themes/<THEME_YOU_USE>/. Depending on where you want your image to appear. F.e. use the K2 theme sidebar by editing the /wp-plugins/themes/k2/sidebar.php file and after row number 49 ad the following code:

`
	<?php /* Latest Entries */ if (function_exists('myPh3_get_random') ) { ?>
	<div>
		<?php myPh3_get_random(); ?>
	</div>
	<?php } ?>`