<?php 
/**********************************************************
 * Simple YouTube Responsive
 * Options Page, Since version 2.0.0
 *
 ***********************************************************/
if (!defined('ABSPATH')) {
    exit;
}

class eirudo_ytresponsive_plugin_options {
    public function __construct() {
		add_action( 'admin_menu', array( $this, 'menus' ) );
		add_action( 'admin_init', array( $this, 'sections' ) );
		add_action( 'admin_init', array( $this, 'fields' ) );
	}
	
	// Add Menu & Submenu
	public function menus() {
		// Add the menu item and page
		$page_title = 'YouTube Responsive Settings';
		$menu_title = 'YT Responsive';
		$capability = 'manage_options';
		$slug = 'eirudo_ytresponsive_options';
		$callback = array( $this, 'option_page' );
		$icon = 'dashicons-video-alt3';
		$position = 99;

		add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
		
		// Add sub menu
		add_submenu_page( $slug, $page_title, 'Configure', $capability, $slug, $callback );
	}

	
	// Content of Option Page / Menu
	public function option_page() { ?>
		<div class="wrap">
			<h2>YouTube Responsive Settings</h2>
<?php if (isset($_GET['settings-updated']) && $_GET['settings-updated']==='true' ) : 
// Update to new array settings 
eirudo_ytrp_options_updater();
?>
<div class="notice notice-success is-dismissible"> 
	<p><strong>Settings saved.</strong></p>
	<button type="button" class="notice-dismiss">
		<span class="screen-reader-text">Dismiss this notice.</span>
	</button>
</div>
<?php endif; ?>
<?php if (isset($_GET['settings-updated']) && $_GET['settings-updated']!=='true' ) : ?>
<div class="notice notice-error is-dismissible"> 
	<p><strong>Failed to save :(</strong></p>
	<button type="button" class="notice-dismiss">
		<span class="screen-reader-text">Dismiss this notice.</span>
	</button>
</div>
<?php endif; ?>

<style>
.erd-label{display:inline-block;border:1px solid #bbb;border-radius:4px;padding:0 5px;font-weight:600;}
.erd-span-color{color:#ca4a1f;}
</style>
			<form method="post" action="options.php">
				<?php
					settings_fields( 'eirudo_ytresponsive_options' );
					do_settings_sections( 'eirudo_ytresponsive_options' );
					submit_button();
				?>
			</form>
		</div> <?php
	}

	
	// Atur Sections (Mengkategorikan Fields Biar Enak)
	public function sections() {
		add_settings_section( 'eirudo_ytresponsive_option_configure', 'Default Settings', array( $this, 'section_callback' ), 'eirudo_ytresponsive_options' );
		add_settings_section( 'eirudo_ytresponsive_option_lazyload', 'Lazy Loading', array( $this, 'section_callback' ), 'eirudo_ytresponsive_options' );
    add_settings_section( 'eirudo_ytresponsive_option_troubleshoot', 'Troubleshoot & Advanced', array( $this, 'section_callback' ), 'eirudo_ytresponsive_options' );
	}

	
	// Callback / Menampilkan tiap Section 
	public function section_callback( $arguments ) {
		switch( $arguments['id'] ){
			case 'eirudo_ytresponsive_option_configure':
				echo 'Set default embed configuration if you not using custom attributes on your shortcode.';
				break;
      case 'eirudo_ytresponsive_option_lazyload':
  				echo 'Lazy load for better experience and speed up your site';
  				break;
      case 'eirudo_ytresponsive_option_troubleshoot':
      		echo 'For advanced user only. Leave default if not sure.';
      		break;
		}
	}


	// Semua fields pada Option Page
	public function fields() {
		// Define masing-masing fields
		$fields = array(
			array(
				'uid' => '_eirudo_ytresponsive_ratio',
				'option_key' => 'ratio',
				'label' => 'Video aspect ratios',
				'section' => 'eirudo_ytresponsive_option_configure',
				'type' => 'text',
				'options' => false,
				'placeholder' => '16:9',
				'helper' => 'Set default aspect ratios for width and height of the video.<br/>Default is 16:9.<br/>',
				'default' => '16:9',
        'attr' => ''
			),
			array(
				'uid' => '_eirudo_ytresponsive_maxwidth',
				'option_key' => 'maxwidth',
				'label' => 'Maximum Width',
				'section' => 'eirudo_ytresponsive_option_configure',
				'type' => 'text',
				'options' => false,
				'placeholder' => '100%',
				'helper' => 'Set maximum width of the video.<br/>Default is 100% (adapting it\'s container width).<br/>You may set maximum width using % or px',
				'default' => '100%',
        'attr' => ''
			),
			array(
				'uid' => '_eirudo_ytresponsive_classes',
				'option_key' => 'classes',
				'label' => 'Additional Classes',
				'section' => 'eirudo_ytresponsive_option_configure',
				'type' => 'text',
				'options' => false,
				'placeholder' => '',
				'helper' => 'Add additional classes to your YouTube video for custom your CSS Styling if needed.<br/>Separate multiple classes using a space',
				'default' => ''
			),
      array(
				'uid' => '_eirudo_ytresponsive_center',
				'option_key' => 'centered',
				'label' => 'Auto Align Center',
				'section' => 'eirudo_ytresponsive_option_configure',
				'type' => 'select',
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
				),
				'placeholder' => '',
				'helper' => 'Auto aligned-center if your video width is smaller than it\'s container.',
				'default' => 'yes'
			),
	 array(
				'uid' => '_eirudo_ytresponsive_autoplay',
				'option_key' => 'autoplay',
				'label' => 'Autoplay',
				'section' => 'eirudo_ytresponsive_option_configure',
				'type' => 'select',
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
				),
				'placeholder' => '',
				'helper' => 'Make all default video is autoplay.<br/>Autoplay automatically disabled if Lazy Load turned on.',
				'default' => 'no'
			),
	 array(
				'uid' => '_eirudo_ytresponsive_loop',
				'option_key' => 'loop',
				'label' => 'Loop video?',
				'section' => 'eirudo_ytresponsive_option_configure',
				'type' => 'select',
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
				),
				'placeholder' => '',
				'helper' => 'Replay the video after it ends',
				'default' => 'no'
			),
	 array(
				'uid' => '_eirudo_ytresponsive_fullscreen',
				'option_key' => 'allowfullscreen',
				'label' => 'Allow fullscreen?',
				'section' => 'eirudo_ytresponsive_option_configure',
				'type' => 'select',
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
				),
				'placeholder' => '',
				'helper' => 'Allow video to played in fullscreen mode?',
				'default' => 'yes'
			),
      array(
				'uid' => '_eirudo_ytresponsive_lazy',
				'option_key' => 'lazyload',
				'label' => 'Lazy Loading',
				'section' => 'eirudo_ytresponsive_option_lazyload',
				'type' => 'select',
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
				),
				'placeholder' => '',
				'helper' => 'Enable Lazy Loading to YouTube Videos (embeded by this plugin) for better site performance.',
				'default' => 'yes'
			),
      array(
				'uid' => '_eirudo_ytresponsive_thumbsize',
				'option_key' => 'thumb',
				'label' => 'Thumbnail Size',
				'section' => 'eirudo_ytresponsive_option_lazyload',
				'type' => 'select',
				'options' => array(
					'maxresdefault' => 'Max Resolution (1280x720)',
					'sddefault' => 'Standart Resolution (640x480)',
					'hqdefault' => 'Hiqh Resolution (480x360)',
					'mqdefault' => 'Medium Resolution (320x180)',
					'default' => 'Default (120x90)'
				),
				'placeholder' => '',
				'helper' => 'If you enabling Lazy Load, YouTube embed will load thumbnail instead, and load the video player when clicked.<br/>Choose thumbnail image size version for this.',
				'default' => 'hqdefault'
			),
      array(
				'uid' => '_eirudo_ytresponsive_css',
				'option_key' => 'css',
				'label' => 'CSS',
				'section' => 'eirudo_ytresponsive_option_troubleshoot',
				'type' => 'select',
				'options' => array(
					'header' => 'Header (default)',
					'inline' => 'Header (inline)',
				),
				'placeholder' => '',
				'helper' => 'For troubleshooting only if YouTube embed doesn\'t work.<br/>Default on header.',
				'default' => 'header'
		),
		 array(
				'uid' => '_eirudo_ytresponsive_js',
				'option_key' => 'js',
				'label' => 'JavaScript',
				'section' => 'eirudo_ytresponsive_option_troubleshoot',
				'type' => 'select',
				'options' => array(
					'footer' => 'Footer (default)',
					'inline' => 'Footer (inline)',
				),
				'placeholder' => '',
				'helper' => 'For troubleshooting only if YouTube embed doesn\'t work.<br/>Default on footer.',
				'default' => 'footer'
		),
		/*
		 array(
				'uid' => '_eirudo_ytresponsive_printedscripts',
				'option_key' => 'printedscripts',
				'label' => 'JavaScript',
				'section' => 'eirudo_ytresponsive_option_troubleshoot',
				'type' => 'select',
				'options' => array(
					'embedonly' => 'Only on page which has YouTube shortcode',
					'all' => 'All Pages',
				),
				'placeholder' => '',
				'helper' => '',
				'default' => 'embedonly'
		),
		*/
	);
		
		// Jadikan semuanya option field 
		foreach( $fields as $field ){
			add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'eirudo_ytresponsive_options', $field['section'], $field );
			register_setting( 'eirudo_ytresponsive_options', $field['uid'] );
		}
	}

	
	// Callback Field / Menampilkan form dari masing-masing field
	public function field_callback( $arguments ) {
		//$value = get_option( $arguments['uid'] ); // Get the current value, if there is one
		$valueAll = get_option( '_erdyt_options', eirudo_ytrp_default_settings() );
		$value = $valueAll[$arguments['option_key']];
			if( ! $value ) { // If no value exists
				$value = $arguments['default']; // Set to our default
			}
      $helper = array_key_exists( 'helper', $arguments ) ? '<p class="description" id="'.$arguments['uid'].'-desc">'.$arguments['helper'].'</p>' : '';
      $attr = array_key_exists( 'attr', $arguments ) ? $arguments['attr'] : '';
  	
		switch( $arguments['type'] ){
			case 'text': // If it is a text field
				$minlength = array_key_exists( 'minlength', $arguments ) ? ' minlength="'.$arguments['minlength'].'"' : '';
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s"  class="regular-text"%6$s />%5$s', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value, $helper, $attr  );
				break;
			case 'number': // If it is a number field
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s"  class="regular-text"%6$s />%5$s', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value, $helper, $attr  );
				break;
			case 'textarea': // If it is a textarea
				printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="30"%5$s>%3$s</textarea>%4$s', $arguments['uid'], $arguments['placeholder'], $value, $helper, $attr );
				break;
			case 'select': // If it is a select dropdown
				if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
					$options_markup = '';
					foreach( $arguments['options'] as $key => $label ){
						$options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value, $key, false ), $label );
					}
					printf( '<select name="%1$s" id="%1$s"%4$s>%2$s</select>%3$s', $arguments['uid'], $options_markup, $helper, $attr );
				}
			  break;
		}

	}

}

// Run Option Page
new eirudo_ytresponsive_plugin_options();