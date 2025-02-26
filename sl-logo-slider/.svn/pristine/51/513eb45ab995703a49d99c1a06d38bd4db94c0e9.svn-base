<?php
function sls_frontend_view(){
	
	global $wpdb;
	
	$table_images = $wpdb->prefix . "sls_images";
	$images_results = $wpdb->get_results( "SELECT * FROM $table_images Order By image_order ASC" );
	
	if ( ! empty( $images_results ) ) {
?>
		<div class="container">
			<div class="boxes-slickslider">
				<h2><?php echo get_option( 'sls_title_slider' )?></h2>
				<section class="customer-logos slider">
				<?php
					foreach ( (array) $images_results as $key => $sls_image_data) {
				?>
					<a rel="nofollow" <?php echo empty($sls_image_data->image_link_to) ? '' : 'target="_blank" href="'.$sls_image_data->image_link_to.'"'; ?>>
						<div class="slide"><img alt="<?php echo $sls_image_data->image_title ?>" src="<?php echo $sls_image_data->image_path . $sls_image_data->image_name ?>"></div>
					</a>
				<?php 
					}
				?>
				</section>
			</div>
		</div>

	<script type="text/javascript">
	jQuery( function ( $ ) {
		
		var SLS_SLIDES_TO_SHOW = <?php echo SLS_SLIDES_TO_SHOW; ?>;
		var SLS_SLIDES_TO_SCROLL = <?php echo SLS_SLIDES_TO_SCROLL; ?>;
		var SLS_AUTOPLAY = <?php echo SLS_AUTOPLAY; ?>;
		var SLS_AUTOPLAY_SPEED = <?php echo SLS_AUTOPLAY_SPEED; ?>;
		var SLS_ARROWS = <?php echo SLS_ARROWS; ?>;
		var SLS_DOTS = <?php echo SLS_DOTS; ?>;
		var SLS_PAUSE_ON_HOVER = <?php echo SLS_PAUSE_ON_HOVER; ?>;
		
		$('.customer-logos').slick({
			slidesToShow: SLS_SLIDES_TO_SHOW,
			slidesToScroll: SLS_SLIDES_TO_SCROLL,
			autoplay: (SLS_AUTOPLAY == "1") ? true : false,
			autoplaySpeed: SLS_AUTOPLAY_SPEED,
			arrows: (SLS_ARROWS == "1") ? true : false,
			dots: (SLS_DOTS == "1") ? true : false,
			pauseOnHover: (SLS_PAUSE_ON_HOVER == "1") ? true : false,
			responsive: [{
				breakpoint: 768,
				settings: {
					slidesToShow: 4
				}
			}, {
				breakpoint: 520,
				settings: {
					slidesToShow: 3
				}
			}]
		});
	});
	</script>
<?php
	}
}
add_filter('filter_sls_logo', 'sls_frontend_view');