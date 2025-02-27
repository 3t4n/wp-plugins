<?php

/**
 * The elementor way of footer file
 *
 * @package generic-elements
 * @since 1.0.3
 */

$theme_dark_mood = get_post_meta(get_the_ID(), 'enable_dark_mood', true);
$theme_dark_class = $theme_dark_mood ? 'theme-dark' : '';

?>

<!DOCTYPE html>
<html class="<?php print esc_attr($theme_dark_class); ?>" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="generic-el site">
		<?php do_action('generic_el_header'); ?>
		<?php if (get_option('generic_gsap_enable_option') == '1') : ?>
			<div id="smooth-wrapper">
				<div id="smooth-content">
				<?php endif; ?>
				<?php do_action('generic_el_breadcrumb'); ?>