<?php
/**
 * Template Name: CP24 Default Template
 */

defined( 'ABSPATH' ) || exit;

require_once CP24_MULTI_SMTP_PATH . 'inc/layout/header/header-template.php';

?>
<div class="page-content" id="page-content">
	<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
	?>
</div>
<?php
include_once CP24_MULTI_SMTP_PATH . 'inc/layout/footer/footer-template.php';
?>
