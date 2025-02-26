<?php require_once('inc/number-to-word.php'); ?>
<?php function akbootstrapfaq_display() { ?>
	<?php if(esc_attr( get_option('faq_display_mode') ) == 1) { ?>
		<?php require_once('template/category-frontend.php'); ?>
	<?php }else { ?>
		<?php require_once('template/normal-frontend.php'); ?>
	<?php } ?>
<?php } ?>
<?php add_shortcode('ak_bootstrap_faq', 'akbootstrapfaq_display'); ?>