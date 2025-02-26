<?php
/**
 * The title.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="acb-title">
	<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
</div>

<?php
	/**
	 * This hooks after the title display.
	 */
	do_action( "acb_{$template}_after_title", $args );
?>