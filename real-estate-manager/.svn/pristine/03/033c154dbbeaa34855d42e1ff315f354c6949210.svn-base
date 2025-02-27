<?php
/**
 * The template file for displaying property archives
 *
 * @package Real Estate Manager
 * @since REM 1.0
 */

get_header();
?>
	<div class="ich-settings-main-wrap">
		<h2><?php echo get_the_archive_title(); ?></h2>
		<div class="row">
			<?php if( have_posts() ){ while( have_posts() ){ the_post(); ?>
				<div id="property-<?php the_ID(); ?>" <?php post_class('col-sm-3'); ?>>
					<?php do_action('rem_property_box', $post->ID) ?>
				</div><!-- /.col-sm-3 -->
			<?php } } ?>
		</div>
	</div>
<?php get_footer(); ?>