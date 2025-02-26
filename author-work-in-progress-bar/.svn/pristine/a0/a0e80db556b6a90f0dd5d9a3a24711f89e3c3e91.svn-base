<?php
// wp head hook
function pbp_progress_bar_head() 
{
	wp_enqueue_script('jquery');
	
	wp_register_style( 'pbp_progressbar_front_css', PBP_PROGRESSBAR_URL_PATH.'css/front.css', false, '1.0.0' );
	wp_enqueue_style( 'pbp_progressbar_front_css' );
	?>
	
	
	<script>
		jQuery(function() {
			jQuery(".meter > span").each(function() {
				jQuery(this)
					.data("origWidth", jQuery(this).width())
					.width(0)
					.animate({
						width: jQuery(this).data("origWidth")
					}, 1200);
			});
		});
	</script>
	
	
	<?php
}

// Progress bar Shortcode function 
function pbp_progressbar_shortcode($atts, $content = null)
{
	ob_start();
	
	
	$heading = ! empty( $atts['heading'] ) ? $atts['heading'] : '';
	$wip_title = ! empty( $atts['wip_title'] ) ? $atts['wip_title'] : '';
	$unit_of_measure = ! empty( $atts['unit_of_measure'] ) ? $atts['unit_of_measure'] : '';
	$your_goal = ! empty( $atts['your_goal'] ) ? intval( $atts['your_goal'] ) : '';
	$current_score = ! empty( $atts['current_score'] ) ? intval( $atts['current_score'] ) : '';
	$progress_bar_color = ! empty( $atts['progress_bar_color'] ) ? $atts['progress_bar_color'] : '';
	$progress_bar_border = ! empty( $atts['progress_bar_border'] ) ? $atts['progress_bar_border'] : 'red';
	$candy_stripe_options = ! empty( $atts['candy_stripe_options'] ) ? $atts['candy_stripe_options'] : 'none';
	$progress_bar_height = ! empty( $atts['progress_bar_height'] ) ? intval( $atts['progress_bar_height'] ) : '20';
	$progress_bar_media = ! empty( $atts['progress_bar_media'] ) ? $atts['progress_bar_media'] : '';
	$font_color = ! empty( $atts['font_color'] ) ? $atts['font_color'] : 'inherit';
	$more_information = ! empty( $atts['more_information'] ) ? $atts['more_information'] : '';
	$include_hyperlink = ! empty( $atts['include_hyperlink'] ) ? $atts['include_hyperlink'] : '';
	$hyperlink_text = ! empty( $atts['hyperlink_text'] ) ? $atts['hyperlink_text'] : '';
	$hyperlink = ! empty( $atts['hyperlink'] ) ? $atts['hyperlink'] : '';
	$include_own_progress_bar = ! empty( $atts['include_own_progress_bar'] ) ? $atts['include_own_progress_bar'] : '';
		
	$my_goal = number_format($current_score) . ' of ' .  number_format($your_goal) . ' <span style="text-transform: capitalize;">'. $unit_of_measure .'</span>';
	$percent_complete = round( $current_score / $your_goal * 100 );
	
	// Candy stripe code goes here...
	$candy_class = '';
	if($candy_stripe_options == 'none') {
		$candy_class = 'nostripes';
	}
	
	$widget_id = 'widget_'.rand().rand().rand();
	
	?>
	
	
	<style type="text/css">
	/* candystripe styling */
	#<?php echo $widget_id ?> .meter {
		height: <?php echo $progress_bar_height ?>px;
		<?php if($progress_bar_border != 'noborder') { ?>
		border: 1px solid <?php echo $progress_bar_border ?>;
		<?php } ?>
	}
	#<?php echo $widget_id ?> .meter > span:after, #<?php echo $widget_id ?> .animate > span > span {
		<?php if($candy_stripe_options == 'animated') { ?>
		-webkit-animation: move 2s linear infinite;
		-moz-animation: move 2s linear infinite;
		<?php } ?>
	}
	#<?php echo $widget_id ?> .extra-font-color {
		color: <?php echo $font_color ?> !important;
	}
	</style>
	
	<div class="wip-progress-shortcode" id="<?php echo $widget_id ?>">
		
		<div class="inner">
		
			<h2 class="widget-title extra-font-color"><?php echo esc_html( $heading ) ?></h2>
			
			<div class="pogress-bar-media progress-bar-class"><img src="<?php echo esc_url( $progress_bar_media ) ?>" /></div>
			
			<div class="wip-title progress-bar-class extra-font-color"><?php echo esc_html( $wip_title ) ?></div>
			
			<div class="progress-bar-class meter <?php echo esc_attr( $progress_bar_color ) . ' ' . $candy_class ?>">
				<span style="width: <?php echo $percent_complete ?>%"></span>
			</div>
			
			<div class="percent-complete progress-bar-class extra-font-color"><?php echo $percent_complete ?>% Complete</div>
			
			<div class="my-goal progress-bar-class extra-font-color"><?php echo $my_goal ?></div>
			
			<div class="more-info progress-bar-class extra-font-color"><?php echo esc_html( $more_information ) ?></div>
						
			<?php if($include_hyperlink == 'yes') { ?>
				<div class="custom-hyperlinked progress-bar-class"><a href="<?php echo esc_url( $hyperlink ) ?>" class="extra-font-color"><?php echo esc_html( $hyperlink_text ) ?></a></div>
			<?php } ?>
			
			<?php if($include_own_progress_bar == 'yes') { ?>
				<div class="include-progress-link progress-bar-class"><a href="http://authorbiztools.com/wip-progress-bar" class="extra-font-color">Get Your Own Progress Bar</a></div>
			<?php } ?>
		
		</div>
	
	</div>
	
	<?php
	
	$content = ob_get_clean();
	return $content;
}