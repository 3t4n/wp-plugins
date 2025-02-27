<?php
/**
 * Plugin name:     Panda Video
 * Author:          Panda Video
 * Version:   		1.4.1
 * Author URI:      https://www.pandavideo.com/
 * Description:     Plug & Play of Panda Videos' player.
 * Text Domain: 	pandavideo
 * Domain Path:     /languages/
*/

DEFINE('PANDAVIDEO_PLUGIN_PATH', '/' . dirname( plugin_basename( __FILE__ ) ));

require_once( WP_PLUGIN_DIR . PANDAVIDEO_PLUGIN_PATH . '/includes/hooks/activatePlugin.php' );

function pandaVideo_registerReportBugControl( $controlsManager )
{
	require_once( WP_PLUGIN_DIR . PANDAVIDEO_PLUGIN_PATH . '/includes/controls/ReportBug.php' );
    $controlsManager->register( new \PandaVideo_ReportBug() );
}

function pandaVideo_registerPlayerWidget( $widgetsManager )
{
	require_once( WP_PLUGIN_DIR . PANDAVIDEO_PLUGIN_PATH . '/includes/widgets/Player.php' );
	$widgetsManager->register( new \PandaVideo_Player() );

	require_once( WP_PLUGIN_DIR . PANDAVIDEO_PLUGIN_PATH . '/includes/widgets/PandaButton.php' );
	$widgetsManager->register( new \PandaVideo_PandaButtons() );
}

function pandaVideo_loadTranslations() 
{	
	load_plugin_textdomain( 'pandavideo', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

function pandaVideo_loadCustomStyle() {
	?>
		<style>
			.elementor-element .icon .eicon-panda-icon {
				content: "";
				background-image: url("<?php echo apply_filters('sanitize_file_name', plugin_dir_url( __FILE__ ) . '/includes/assets/img/pandaIcon.svg') ?>");
				transform: scale(1.7);
				height: 28px;
				display: block;
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center center;
			}
		</style>
	<?php
}

add_action( 'elementor/widgets/register', 'pandaVideo_registerPlayerWidget' );
add_action( 'elementor/controls/register', 'pandaVideo_registerReportBugControl' );
add_action( 'elementor/editor/footer', 'pandaVideo_loadCustomStyle');
add_action( 'init', 'pandaVideo_loadTranslations', 1 );