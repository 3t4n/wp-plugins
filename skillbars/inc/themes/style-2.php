<?php
	if ( ! defined( 'ABSPATH' ) ) {
		die( "Can't load this file directly" );
	}
?>

<style type="text/css">
	.skillbar-area-<?php echo esc_attr( $postid ); ?>{
		margin:0;
		padding:0;
		position: relative;
	}
	.skillbar-area-<?php echo esc_attr( $postid ); ?> .single-skill-item {
		overflow: hidden;
		margin-bottom: 20px;
	}
	.skillbar-area-<?php echo esc_attr( $postid ); ?> .single-skill-item:last-child {
		margin-bottom: 0;
	}
	.skillbar-area-<?php echo esc_attr( $postid ); ?> .single-skill-item h6 {
		font-size: <?php echo esc_attr($tp_title_fontsize_option); ?>px;
		text-transform: <?php echo esc_attr($tp_title_font_case); ?>;
		font-style: <?php echo esc_attr($tp_title_font_style); ?>;
	    margin-bottom: 15px;
	    margin-top: 0;
	    text-transform: capitalize;
	}
	.skillbar-area-<?php echo esc_attr( $postid ); ?> .single-skill-item .progress {
	    display: -ms-flexbox;
	    display: flex;
	    height: 6px;
	    overflow: visible;
	    font-size: initial;
	    background-color: #182768;
	    border-radius: <?php echo esc_attr($tp_item_border_radius); ?>px;
	}
	.skillbar-area-<?php echo esc_attr( $postid ); ?> .single-skill-item .progress-bar {
		overflow: visible;
		position: relative;
		border-radius: <?php echo esc_attr($tp_item_border_radius); ?>px;
	}
	.skillbar-area-<?php echo esc_attr( $postid ); ?> .single-skill-item .progress-bar span {
	    position: absolute;
	    right: 0;
	    bottom: 20px;
	    color: #fff;
	    font-size: 14px;
	    font-weight: 700;
	    padding: 3px 6px;
	    line-height: 1;
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
                <h6 style="color:<?php echo $title_color; ?>"><?php echo esc_attr( $skill['title'] ); ?></h6>
            <?php endif; ?>
            <div class="progress" style="background:<?php echo $bg_color; ?>">
				<div class="progress-bar" data-percent="<?php echo esc_attr( $skill['percentage'] ); ?>%" role="progressbar" style="background:<?php echo $bar_color; ?>;width:<?php echo esc_attr( $skill['percentage'] ); ?>%" aria-valuenow="<?php echo esc_attr( $skill['percentage'] ); ?>" aria-valuemin="0" aria-valuemax="100">
		            <?php if ( ! empty( $skill['percentage'] ) ) : ?>
		                <span style="color:<?php echo $percent_color; ?>"><?php echo esc_attr( $skill['percentage'] ); ?>%</span>
		            <?php endif; ?>
				</div>
			</div>
        </div>
	<?php } ?>
</div>