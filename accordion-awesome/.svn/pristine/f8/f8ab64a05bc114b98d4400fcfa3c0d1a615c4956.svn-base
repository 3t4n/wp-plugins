<?php 
	$accordions = carbon_get_post_meta( get_the_ID(), 'accordion_items' );
	$header_name = carbon_get_post_meta( get_the_ID(), 'accordion_header_name' );
?>
<div class="accordion-content accordion-post-<?php echo esc_attr( get_the_ID() ); ?>">
	<div class="accordion-style-tujuh accordion-wrapper tujuh">
		<?php accordion_header_name( $header_name ); ?>
		<ul>
			<?php
			$no = 1;
			foreach ( $accordions as $accordion ) {
				$nop = $no++;
				$post_content = apply_filters( 'the_content', $accordion['accordion_item_desc'] ); ?>
				<li class="li-<?php echo esc_attr( $nop ); ?>">
					<input type="checkbox" checked>
					<i></i>
					<?php accordion_title_class_view( $accordion['accordion_item_title'] ); ?>
					<div class="accordion-description">
						<?php echo wp_specialchars_decode( $post_content ); ?>
					</div>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>

<style>
	<?php
	$no = 1;
	foreach ( $accordions as $accordion ) {
		$nop = $no++;
		$anim = 0.5 * $nop;
		?>
		.accordion-style-tujuh ul .li-<?php echo esc_attr( $nop ); ?> {
			animation-delay: <?php echo esc_attr( $anim ); ?>s;
		}
	<?php } ?>
</style>
