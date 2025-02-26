<?php
function show_bs_video_slider( $atts, $content = null ) {
	extract( shortcode_atts(
					array(
		'category' => '',
					), $atts )
	);
	ob_start();

	global $post;
	$barrel_slider_options = get_option( 'barrel_video_slider_options' );
	if ( $barrel_slider_options['slider_speed'] != "" ) {
		$slider_speed = $barrel_slider_options['slider_speed'];
	} else {
		$slider_speed = 1000;
	}
	
	if ( $barrel_slider_options['slider_loop'] != "" ) {
		$slider_loop = $barrel_slider_options['slider_loop'];
	} else {
		$slider_loop = 'true';
	} 	
	if ( $barrel_slider_options['slider_effect'] != "" ) {
		$slider_effect = $barrel_slider_options['slider_effect'];
	} else {
		$slider_effect1 = "'horizontal'";
	}	
	if ( $barrel_slider_options['slider_arrow'] != "" ) {
		$slider_arrow = $barrel_slider_options['slider_arrow'];
	} else {
		$slider_arrow = 'true';
	}
	if ( $barrel_slider_options['slider_random'] != "" ) {
		$slider_random = $barrel_slider_options['slider_random'];
	} else {
		$slider_random = 'false';
	}
	if ( $barrel_slider_options['slider_pager'] != "" ) {
		$slider_pager = $barrel_slider_options['slider_pager'];
	} else {
		$slider_pager = 'true';
	}
	
	$confirm_code = md5(uniqid(rand()));
        $random_id = substr($confirm_code, 0, 16);
	?>
	<script>
		jQuery(document).ready(function ($) {
			$('.bxslider-<?php echo $random_id; ?>').bxSlider({
				infiniteLoop: <?php echo $slider_loop; ?>,
				speed:<?php echo $slider_speed; ?>,
				mode: <?php
	if ( $barrel_slider_options['slider_effect'] != "" ) {
		echo "'" . $slider_effect . "'";
	} else {
		echo $slider_effect1;
	}
	?>,
				controls:<?php echo $slider_arrow; ?>, 
				randomStart:<?php echo $slider_random; ?>,
				pager:<?php echo $slider_pager; ?>
			});

		});
	</script>

	<div class="br_video_slide">
		<?php
		if ( $category != "" ) {
			$category = explode( ",", $category );
			for ( $i = 0; $i < count( $category ); $i++ ) {
				$query_args = array(
					'posts_per_page' => -1,
					'post_type' => 'bs_video_slider',
					'order' => 'DESC',
					'orderby' => 'menu_order',
					// show the posts matching the slug of the Video category specified with the shortcode's attribute
					'tax_query' => array(
						array(
							'taxonomy' => 'bs_video_slider_tax',
							'field' => 'slug',
							'terms' => $category,
						)
					),
					'no_found_rows' => true,
				);
			}
		} else {
			$query_args = array(
				'posts_per_page' => -1,
				'post_type' => 'bs_video_slider',
				'order' => 'DESC',
				'orderby' => 'menu_order',
			);
		}
		$wp_query = new WP_Query( $query_args );
		?>
		<ul class="bxslider-<?php echo $random_id; ?>">
			<?php
			$query_args = array(
				'posts_per_page' => -1,
				'post_type' => 'bs_video_slider',
				'order' => 'DESC',
				'orderby' => 'menu_order'
			);
			$wp_query = new WP_Query( $query_args );
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
				$meta = get_post_meta( get_the_id() );
				foreach ( $meta['video_provider'] as $v ) {
					if ( $v == 'youtube' ) {
						?>
						<li class="barrel_li">
							<iframe src="https://www.youtube.com/embed/<?php echo $meta['video_url'][0]; ?>"  height="360"  frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
						</li>
					<?php
					}elseif ( $v == 'dailymotion' ) { ?>

						<li class="barrel_li">
							<iframe   frameborder="0" src="http://www.dailymotion.com/embed/video/<?php echo $meta['video_url'][0]; ?>" width="550" height="360"allowfullscreen></iframe>
						</li>
                                <?php }} endwhile;
			?>
		</ul>
	</div>
	<div style='color:#ccc; font-size: 9px; text-align:right;'><a href='http://www.junktheme.com/' title='visit us' target='_blank'>junk theme</a></div>
	<?php
	$content = ob_get_contents();
	ob_get_clean();
	return $content;

	
}

add_shortcode( 'bs_video_slider', 'show_bs_video_slider' );
add_action( 'wp_enqueue_scripts', 'barrel_enqueue_scripts' );

function barrel_enqueue_scripts() {
	wp_enqueue_style( 'bs_price_table', plugin_dir_url( __FILE__ ) . 'css/jquery.bxslider.css' );
	wp_enqueue_script( 'bs_video_js1', plugin_dir_url( __FILE__ ) . 'js/jquery.bxslider.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'bs_video_js2', plugin_dir_url( __FILE__ ) . 'js/plugins/jquery.fitvids.js' );
}

function print_script_header() {
	?>

	<?php
}

add_action( 'wp_footer', 'print_script_header' );
?>