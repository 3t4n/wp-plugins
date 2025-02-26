<?php
	if ( ! defined( 'ABSPATH' ) ) {
		die( "Can't load this file directly" );
	}
?>


<style type="text/css">
	.skillbar-area-<?php echo esc_attr( $postid ); ?>{
		margin:0;
		padding:0;
	}
	.skillbar-area-<?php echo esc_attr( $postid ); ?> .single-skill-item{
		margin-bottom: 15px;
	}
	.skillbar-area-<?php echo esc_attr( $postid ); ?> .skillbar  {
		position:  relative;
		display:  block;
		width:  100%;
		height:  42px;
		border-radius: <?php echo esc_attr($tp_item_border_radius); ?>px;
		-webkit-transition:  0.4s linear;
		-moz-transition:  0.4s linear;
		-ms-transition:  0.4s linear;
		-o-transition:  0.4s linear;
		transition:  0.4s linear;
		-webkit-transition-property:  width,  background-color;
		-moz-transition-property:  width,  background-color;
		-ms-transition-property:  width,  background-color;
		-o-transition-property:  width,  background-color;
		transition-property:  width,  background-color;
	}
	.skillbar-area-<?php echo esc_attr( $postid ); ?> .skillbar-titles h6  {
		font-size: <?php echo esc_attr($tp_title_fontsize_option); ?>px;
		text-transform: <?php echo esc_attr($tp_title_font_case); ?>;
		font-style: <?php echo esc_attr($tp_title_font_style); ?>;
		margin:0;
		padding:0;
		margin-bottom: 10px;
	}
	.skillbar-area-<?php echo esc_attr( $postid ); ?> .skillbar-bar  {
		height: 42px;
		width: 0px;
		border-radius: <?php echo esc_attr($tp_item_border_radius); ?>px;
	}
	.skillbar-area-<?php echo esc_attr( $postid ); ?> .skillbar-percent  {
		position:  absolute;
		right:  10px;
		top:  0;
		font-size:  12px;
		height:  42px;
		line-height:  42px;
		color:  #444;
		color:  rgba(0, 0, 0, 0.4);
	}
	.skillbar-area-<?php echo esc_attr( $postid ); ?> .no-percent .skillbar-percent  {
		display: none;
	}
</style>

<div class="skillbar-area-<?php echo esc_attr( $postid ); ?>">
	<?php foreach ( $skillbar_data as $index => $skill ) {

        // Set default colors if the values are empty
		$bg_color      = ! empty( $skill['bg_color'] ) ? esc_attr( $skill['bg_color'] ) : '#dddddd';
		$title_color   = ! empty( $skill['title_color'] ) ? esc_attr( $skill['title_color'] ) : '#333333';
		$bar_color     = ! empty( $skill['color'] ) ? esc_attr( $skill['color'] ) : '#0073aa';
		$percent_color = ! empty( $skill['percent_color'] ) ? esc_attr( $skill['percent_color'] ) : '#000000';
		?>
		<div class="single-skill-item">
            <?php if ( ! empty( $skill['title'] ) ) : ?>
                <div class="skillbar-titles"><h6 style="color:<?php echo $title_color; ?>"><?php echo esc_attr( $skill['title'] ); ?></h6></div>
            <?php endif; ?>
	        <div class="skillbar" data-percent="<?php echo esc_attr( $skill['percentage'] ); ?>%" style="background:<?php echo $bg_color; ?>">
	            <div class="skillbar-bar" style="background:<?php echo $bar_color; ?>"></div>
	            <?php if ( ! empty( $skill['percentage'] ) ) : ?>
	                <div class="skillbar-percent" style="color:<?php echo $percent_color; ?>"><?php echo esc_attr( $skill['percentage'] ); ?>%</div>
	            <?php endif; ?>
	        </div>
        </div>
	<?php } ?>
</div>