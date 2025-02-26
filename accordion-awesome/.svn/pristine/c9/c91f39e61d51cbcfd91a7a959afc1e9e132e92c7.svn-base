<?php 
	$accordions = carbon_get_post_meta( get_the_ID(), 'accordion_items' );
	$accordion_icon_color = carbon_get_post_meta( get_the_ID(), 'accordion_icon_color' );

?>
<div class="accordion-post-<?php echo esc_attr( get_the_ID() ); ?>">
	<div class="accordion-content accordion-style-salapan">
		<div class="accordion">
			<ul>
				<?php
				$no = 0; foreach ( $accordions as $accordion ) { $no++;
				$post_content = apply_filters( 'the_content', $accordion['accordion_item_desc'] ); ?>
				<li class="accordion-item">
					<input id="s<?php echo esc_attr( $no ); ?>" class="hide" type="checkbox">
					<label for="s<?php echo esc_attr( $no ); ?>" class="accordion-label accordion-name"> 
						<?php echo wp_specialchars_decode( $accordion['accordion_item_title'] ); ?>
					</label>
					<label class="accordion-child accordion-description"><?php echo wp_specialchars_decode( $post_content ); ?></label>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
