<?php

namespace GSBEH;

?>

<div class="gs-containeer">

    <div class="gs-roow">

		<?php foreach ( $gs_behance_shots as $single_shot ) :

			$classes = [ $columnClasses, 'beh-projects' ];
		
			?>

			<div class="<?php echo esc_attr( join( ' ', $classes ) ); ?>">

				<a href="<?php echo esc_url( $single_shot['url'] ); ?>" target="<?php echo esc_attr( $shortcode_settings['link_target'] ); ?>">
					<?php echo wp_kses_post( plugin()->helpers->get_shot_thumbnail( $single_shot['thumbnail'] ) ); ?>
				</a>

			</div>

		<?php endforeach; ?>

    </div>

	<?php do_action('gs_behance_custom_css'); ?>

</div>