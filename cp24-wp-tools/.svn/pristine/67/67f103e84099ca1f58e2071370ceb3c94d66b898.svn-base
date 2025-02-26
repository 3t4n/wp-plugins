<?php
/**
 * Header template.
 */

defined( 'ABSPATH' ) || exit;

use Elementor\Plugin as Elementor;

$header_settings = apply_filters( 'cp24_frontend_header_settings', [] );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<header>
		<?php
			$post_id = $header_settings['template_id'];
			echo Elementor::instance()->frontend->get_builder_content_for_display( $post_id , true );
		?>
	</header>
	<?php wp_body_open(); ?>
