<?php

/*
Plugin Name: AzonBox
Plugin URI:  https://wordpress.org/plugins/azonbox/
Description: Add custom content box for Amazon product to your post or page using Editor button.
Version:     1.1.2
Author:      Marketever
Author URI:  http://marketever.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*
 * Plugin Main css including.
 */
function ce_main_style_css_enque(){
	wp_enqueue_style( 'ce-content-main-css', plugins_url('/css/style.css', __FILE__));
}
add_action('wp_footer', 'ce_main_style_css_enque');

function ce_content_box_shortcodes_mce_css() {
	wp_enqueue_style('ce-content-icon-css', plugins_url('/css/icon.css', __FILE__) );	
}
add_action( 'admin_enqueue_scripts', 'ce_content_box_shortcodes_mce_css' );

/*
 * making values global to use in shortcode.
 */
$titlecolor  = '';
$secondtitle = '';
if(get_option('azonbox_option_name')){
	$azonboxop = get_option('azonbox_option_name');
	$titlecolor  = $azonboxop['title_color'];
	$secondtitle = $azonboxop['second_title'];
}


/*
 * shortcode style one attribute function
 * Return ob_get_clean().
 */
function ce_content_box1_shortcode($atts) {
    

	$ce_atts = shortcode_atts( array(
			'tagt' => '',
			'imgurl' => 'http://placehold.it/200x200/',
			'imgdsc' => '',
			'lnktxt' => '',
			'linkl' => '#',
			'headline' => '',
			'subhline' => '',
			'text' => '',
	), $atts );
	
	global $titlecolor;
	global $secondtitle;
	
	ob_start();
	
	?>
	
	<div class="ce-content">
		<div class="ce-inner-left">
			<div class="ce-inr-tag">
				<p class="ce-tag-para"><?php echo wp_kses_post( $ce_atts[ 'tagt' ] ); ?></p>
			</div>
			<a rel="nofollow" href="<?php echo wp_kses_post( $ce_atts[ 'linkl' ] ); ?>" class="ce-img-link">
				<img src="<?php echo wp_kses_post( $ce_atts[ 'imgurl' ] ) ; ?>" alt="product" class="ce-inn-img">
			</a>
			<p class="ce-img-disc"><?php echo wp_kses_post( $ce_atts[ 'imgdsc' ] ) ; ?></p>
			<a rel="nofollow" href="<?php echo  wp_kses_post( $ce_atts[ 'linkl' ] ) ; ?>" class="ce-button"><?php echo wp_kses_post( $ce_atts[ 'lnktxt' ] )  ; ?></a>
		</div>
		<div class="ce-inner-right">
			<a rel="nofollow" href="<?php echo wp_kses_post( $ce_atts[ 'linkl' ] )  ; ?>" class="ce-heading-right">
				<p class="ce-right-h3" style="color:<?php echo $titlecolor; ?>;"><?php echo wp_kses_post( $ce_atts[ 'headline' ] ) ; ?></p>
				<p class="ce-right-link" style="color:<?php echo $secondtitle; ?>;"><?php echo wp_kses_post( $ce_atts[ 'subhline' ] )  ; ?></p>
			</a>
			<p class="ce-text-right"><?php echo wp_kses_post( $ce_atts[ 'text' ] )  ; ?></p>
		</div>
		<div class="ce-clear-fix"></div>
	</div>
	
<?php
	return ob_get_clean();
}
 
/*
 * shortcode two attribute function
 * Return output.
 */
function ce_content_box2_shortcode($atts) {


	$ce_atts = shortcode_atts( array(
			'imgurl' => 'http://placehold.it/400x200/',
			'imgdsc' => '',
			'lnktxt' => '',
			'linkl' => '#',
			'headline' => '',
			'subhline' => '',
			'text' => '',
	), $atts );
	
	global $titlecolor;
	global $secondtitle;

	ob_start();

	?>
	
	<div class="ce-content ce-content-full">
		<div class="ce-inner-left ce-inner-left-2">
			
			<a rel="nofollow" href="<?php echo wp_kses_post( $ce_atts[ 'linkl' ] ); ?>" class="ce-img-link">
				<img src="<?php echo wp_kses_post( $ce_atts[ 'imgurl' ] ) ; ?>" alt="product" class="ce-inn-img ce-box-img-2">
			</a>
			
			
		</div>
		<div class="ce-inner-right ce-inner-right-2">
			<a rel="nofollow" href="<?php echo wp_kses_post( $ce_atts[ 'linkl' ] )  ; ?>" class="ce-heading-right">
				<p class="ce-right-h3 ce-text-align-right" style="color:<?php echo $titlecolor; ?>;"><?php echo wp_kses_post( $ce_atts[ 'headline' ] ) ; ?></p>
				<p class="ce-right-link ce-text-align-right" style="color:<?php echo $secondtitle; ?>;"><?php echo wp_kses_post( $ce_atts[ 'subhline' ] )  ; ?></p>
			</a>
			<p class="ce-text-right ce-text-align-right"><?php echo wp_kses_post( $ce_atts[ 'text' ] )  ; ?></p>
			<a rel="nofollow" href="<?php echo  wp_kses_post( $ce_atts[ 'linkl' ] ) ; ?>" class="ce-button ce-button-2"><?php echo wp_kses_post( $ce_atts[ 'lnktxt' ] )  ; ?></a>
			<p class="ce-img-disc"><?php echo wp_kses_post( $ce_atts[ 'imgdsc' ] ) ; ?></p>
		</div>
		<div class="ce-clear-fix"></div>
	</div>
	
<?php
	return ob_get_clean();
}

 
/*
 * shortcode Three attribute function
 * Return output.
 */
function ce_content_box3_shortcode($atts) {


	$ce_atts = shortcode_atts( array(
			'imgurl' => 'http://placehold.it/180x150/',
			'imgdsc' => ' ',
			'lnktxt' => ' ',
			'linkl' => '#',
			'headline' => ' ',
			'subhline' => ' ',
			
	), $atts );
	
	global $titlecolor;
	global $secondtitle;

	ob_start();

	?>
	
	<div class="ce-content ce-content-full ce-content-border">
		<div class="ce-inner-left ce-inner-right-2">
			
			<a rel="nofollow" href="<?php echo wp_kses_post( $ce_atts[ 'linkl' ] ); ?>" class="ce-img-link">
				<img src="<?php echo wp_kses_post( $ce_atts[ 'imgurl' ] ) ; ?>" alt="product" class="ce-inn-img ce-inn-img-3">
			</a>
			
			
		</div>
		<div class="ce-inner-right ce-inner-left-2">
			<a rel="nofollow" href="<?php echo wp_kses_post( $ce_atts[ 'linkl' ] )  ; ?>" class="ce-heading-right">
				<p class="ce-right-h3 ce-heading-3" style="color:<?php echo $titlecolor; ?>;"><?php echo wp_kses_post( $ce_atts[ 'headline' ] ) ; ?></p>
				<p class="ce-right-link ce-right-para-3" style="color:<?php echo $secondtitle; ?>;"><?php echo wp_kses_post( $ce_atts[ 'subhline' ] )  ; ?></p>
			</a>
			<p class="ce-text-right"></p>
			<p class="ce-button-fix"> <a rel="nofollow" href="<?php echo  wp_kses_post( $ce_atts[ 'linkl' ] ) ; ?>" class="ce-button cebutton-3"><?php echo wp_kses_post( $ce_atts[ 'lnktxt' ] )  ; ?></a></p>
			<p class="ce-img-disc"><?php echo wp_kses_post( $ce_atts[ 'imgdsc' ] ) ; ?></p>
		</div>
		<div class="ce-clear-fix"></div>
	</div>
	
<?php
	return ob_get_clean();
}


/*
 * shortcode Registering.
 */
function ce_content_box_register_shortcode() {
    add_shortcode( 'azonbox1', 'ce_content_box1_shortcode' );
    add_shortcode( 'azonbox2', 'ce_content_box2_shortcode' );
    add_shortcode( 'azonbox3', 'ce_content_box3_shortcode' );
    
}
 
add_action( 'init', 'ce_content_box_register_shortcode' );




// Filter Functions with Hooks
function ce_content_box_mce_button() {
	// Check if user have permission
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// Check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'ce_content_box_tinymce_plugin' );
		add_filter( 'mce_buttons', 'ce_content_boxregister_mce_button' );
	}
}
add_action('admin_head', 'ce_content_box_mce_button');

// Function for new button
function ce_content_box_tinymce_plugin( $plugin_array ) {
	$plugin_array['ce_content_box_mce_button'] = plugins_url('/js/plugin.js', __FILE__);
	return $plugin_array;
}

// Register new button in the editor
function ce_content_boxregister_mce_button( $buttons ) {
	array_push( $buttons, 'ce_content_box_mce_button' );
	return $buttons;
}

/* 
 * Settings Page class
 */
  

class AzonboxSettingsPage
{
	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $options;

	/**
	 * Start up
	 */
	public function __construct()
	{
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
	}

	/**
	 * Add options page
	 */
	public function add_plugin_page()
	{
		
		// This page will be under "Settings"
		
		add_menu_page( 
				'AzonBox Settings', 
				'AzonBox', 
				'manage_options', 
				'azonbox_settings', 
				array( $this, 'create_admin_page' ), 
				plugins_url( '/img/iconbox.jpg', __FILE__ ), 
				79
		);
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page()
	{
		// Set class property
		$this->options = get_option( 'azonbox_option_name' );
		?>
        <div class="wrap">
            <h2>AzonBox Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'azonbox_option_group' );   
                do_settings_sections( 'azonbox-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'azonbox_option_group', // Option group
            'azonbox_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'azonbox_setting_section_color', // ID
            'AzonBox Color Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'azonbox-setting-admin' // Page
        );  

        add_settings_field(
            'title_color', // ID
            'Title Color', // Title 
            array( $this, 'id_number_callback' ), // Callback
            'azonbox-setting-admin', // Page
            'azonbox_setting_section_color' // Section           
        );      

        add_settings_field(
            'second_title', 
            'Subtitle Color', 
            array( $this, 'title_callback' ), 
            'azonbox-setting-admin', 
            'azonbox_setting_section_color'
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['title_color'] ) )
            $new_input['title_color'] = sanitize_text_field( $input['title_color'] );

        if( isset( $input['second_title'] ) )
            $new_input['second_title'] = sanitize_text_field( $input['second_title'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Pick your colors below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function id_number_callback()
    {
        printf(
            '<input type="text" id="title_color" name="azonbox_option_name[title_color]" value="%s" class="azonbox-color-field" data-default-color="#336982" />',
            isset( $this->options['title_color'] ) ? esc_attr( $this->options['title_color']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function title_callback()
    {
        printf(
            '<input type="text" id="second_title" name="azonbox_option_name[second_title]" value="%s" class="azonbox-color-field" data-default-color="#ED143D" />',
            isset( $this->options['second_title'] ) ? esc_attr( $this->options['second_title']) : ''
        );
    }
}

if( is_admin() )
    $azonbox_settings_page = new AzonboxSettingsPage();

/*
 * color picker optation
 * 
 */

add_action( 'admin_enqueue_scripts', 'azonbox_enqueue_color_picker' );
function azonbox_enqueue_color_picker( $azonbox ) {
	// first check that $hook_suffix is appropriate for your admin page
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'azonbox-cp-script', plugins_url('js/cp-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
 
 /*
  * Settings link from plugin page
  */
  
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'azonbox_settings_link' );

function azonbox_settings_link ( $links ) {
 $mylinks = array(
 '<a href="' . admin_url( 'admin.php?page=azonbox_settings' ) . '">Settings</a>',
 '<a href="https://coderexpo.com/azonbox/">Pro Version</a>',
 );
return array_merge( $links, $mylinks );
}
