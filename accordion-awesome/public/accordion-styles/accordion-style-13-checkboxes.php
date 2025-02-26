<?php 
	$accordions = carbon_get_post_meta( get_the_ID(), 'accordion_items' );
?>
<div class="accordion-post-<?php echo esc_attr( get_the_ID() ); ?>">
	<div class="accordion-content accordion-style-tilubelas">
		<?php
		$no = 0;
		foreach ( $accordions as $accordion ) {
			$no++;
			$rand = rand();
			$post_content = apply_filters( 'the_content', $accordion['accordion_item_desc'] );
			?>
			<div class="ac-container rand-<?php echo esc_attr( $rand ); ?>">
				<input id="ac-<?php echo esc_attr( $no ); ?>" name="accordion-1" type="checkbox" class="acctar" />
				<label for="ac-<?php echo esc_attr( $no ); ?>" class="accordion-name">
					<?php accordion_title_class_view( $accordion['accordion_item_title'] ); ?>
				</label>
				<div class="ac-small accordion-description">
					<div class="inner-content">
						<?php echo wp_specialchars_decode( $post_content ); ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

<script>
(function($) {

	$(document).ready(function() {

		$('.ac-container').each(function() {
			var thisParent = $(this).find('.inner-content').outerHeight(),
				accordTar = $(this).find('.acctar'),
				accordTarbod = $(this).find('.ac-small');

			$(accordTar).on("change", function () {
				console.log(thisParent);
				if (this.checked) {
					accordTarbod.css('max-height', thisParent);
				} else {
					accordTarbod.css('max-height', '0');
				}
			});
		});
	});

}(jQuery));
</script>
