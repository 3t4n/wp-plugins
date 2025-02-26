<?php
/**
 * Footer template.
 */

defined( 'ABSPATH' ) || exit;

use Elementor\Plugin as Elementor;

$settings = apply_filters( 'cp24_frontend_footer_settings', [] );
?>
<footer>
<?php
	$post_id = $settings['template_id'];

	echo Elementor::instance()->frontend->get_builder_content_for_display( $post_id , true );
?>
</footer>

<?php wp_footer(); ?>
</body>
</html>
