<?php 
	$accordions = carbon_get_post_meta( get_the_ID(), 'accordion_items' );
	$accordion_name_color_hover_active = carbon_get_post_meta( get_the_ID(), 'accordion_title_hover' );
?>
<div class="accordion-post-<?php echo esc_attr( get_the_ID() ); ?>">
	<div class="accordion-content accordion-style-dua">
		<div class="wrapper">
			<div id="st-accordion" class="st-accordion">
				<ul>
					<?php
					foreach ( $accordions as $accordion ) {  ?>
					<li>
						<a href="#" class="accordion-name">
							<?php echo wp_specialchars_decode($accordion['accordion_item_title'] ); ?>
							<span class="st-arrow fa fa-chevron-down"></span>
						</a>
						<div class="st-content accordion-description">
							<?php echo apply_filters( 'the_content', $accordion['accordion_item_desc'] ); ?>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php wp_enqueue_script( 'ta-accordion-awesome', plugin_dir_url( __DIR__ ) . 'js/jquery.accordion.js', array( 'jquery' ), '', false ); ?>
<?php wp_enqueue_script( 'ta-easing-awesome', plugin_dir_url( __DIR__ ) . 'js/jquery.easing.1.3.js', array( 'jquery' ), '', false ); ?>

<script type="text/javascript">
(function($) {
	'use strict';

	$(document).ready(function() {
		$('.accordion-post-<?php echo esc_attr(get_the_ID()); ?> #st-accordion').accordion();
	});

})( jQuery );
</script>
