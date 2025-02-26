<?php
/**
* Author : Keivan Kamali
*/
if(!defined('ABSPATH')) exit();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php wp_head(); ?>

		<style type="text/css">
			html, body {
				width: 100%;
				height: 100%;
				margin: 0px;
			}
		</style>
	</head>
	<body  >
		<div id="wb3dtheme" style="width: 100%;height: 100%;position: absolute;">
			<?php
			// Start the loop.
			while(have_posts()) : the_post();
					echo do_shortcode(get_the_content());
			// End the loop.
			endwhile;
			?>
		</div>
		<?php wp_footer(); ?>
		
	</body>
</html>