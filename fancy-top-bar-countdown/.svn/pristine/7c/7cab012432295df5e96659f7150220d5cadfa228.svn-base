<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wp_head(); 

	$page_class	= nncd_get_option( 'nncd_page_cd_style' );

	if ( empty( $page_class ) ) {
		$page_class = 'cdstyle-default';
	}

	$page_layout_class	= nncd_get_option( 'nncd_page_layout_cd_style' );

	if ( empty( $page_layout_class ) ) {
		$page_layout_class = 'layout-1';
	}

	$page_bg		= nncd_get_option( 'nncd_page_bg_style' );
	$page_bg_video	= nncd_get_option( 'nncd_page_bg_video' );

	if ( empty( $page_bg ) ) {
		$page_bg = 'color';
	}

?>



<div id="nn-cooming-soon-page-count-down" class="<?php echo esc_attr( $page_layout_class ) . ' ' . esc_attr( $page_class ); ?>">
	<?php 	
		if ( $page_bg == 'video' ) { ?>
			<div id="bgndVideo" class="player" data-property="{videoURL:'<?php echo esc_url( $page_bg_video ); ?>',containment:'body',autoPlay:true, mute:true, startAt:0, opacity:1, loop:true, showControls: false}"></div>
			<div class="nn-video-bg-pattern"></div>
	<?php } ?>
	<div class="container">
		<?php 
			switch ( $page_layout_class ) {
				case 'layout-1':
					nncd_page_content_layout1();
					break;
				case 'layout-2':
					nncd_page_content_layout2();
					break;
				case 'layout-3':
					nncd_page_content_layout3();
					break;
				case 'layout-4':
					nncd_page_content_layout4();
					break;
				
				default:
					nncd_page_content_layout1();
					break;
			}
		?>
	</div>
</div>

<?php wp_footer(); ?>
<?php nncd_page_datetime(); ?>
