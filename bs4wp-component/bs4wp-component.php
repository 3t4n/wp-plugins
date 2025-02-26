<?php
/**
 * @package BS4WP_Component
 * @version 1.1
 */
/*
* Plugin Name: 		BS4WP Component
* Plugin URI: 		http://wordpress.org/plugins/bs4wp-package/
* Description: 		Boostrap 4 Component Shortcode Plugin.
* Author: 			Hakik Zaman
* Version: 			1.1
* Author URI: 		https://github.com/hakikz
* License:     		GPL2
* License URI: 		https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:  	bs4wp-component
*/

if ( ! defined( 'ABSPATH' ) ) { return; }

function bs4wp_load_textdomain(){
    load_plugin_textdomain( "bs4wp-component", false, dirname(__FILE__)."/languages" );
}
add_action( "plugins_loaded", "bs4wp_load_textdomain" );

/**
 * ### Plugin Settings Registration
 */

function bs4wp_component_settings_init(){
	add_settings_section( "bs4wp_component_section", __( "Bootstrap 4 Component Settings", "bs4wp-component" ), "bs4wp_component_section_callback", "general" );
	add_settings_field( "bs4wp_component_select", __( "Option", "bs4wp-component" ), "bs4wp_component_select_field", "general", "bs4wp_component_section" );
	add_settings_field( "bs4wp_component_textarea", __( "Custom CSS", "bs4wp-component" ), "bs4wp_component_textarea_field", "general", "bs4wp_component_section" );
	register_setting( "general", "bs4wp_component_select", array("type" => "string", "sanitize_callback" => "sanitize_text_field", "default" => NULL) );
	register_setting( "general", "bs4wp_component_textarea", array("type" => "string", "sanitize_callback" => "addslashes", "default" => NULL) );
}
add_action( "admin_init", "bs4wp_component_settings_init" );

### bs4wp Component Section Callback
function bs4wp_component_section_callback(){
	echo "<p>".__( "Please Include Bootstrap4 To Theme", "bs4wp-component" )."</p>";
}

### Selectbox Implementing
function bs4wp_component_select_field(){
    $options = array(
		__( "No", "bs4wp-component" ),
		__( "Yes", "bs4wp-component" )
	);
    $list = get_option( "bs4wp_component_select" );
    printf('<select id="%s" name="%s">',"bs4wp_component_select", "bs4wp_component_select");
    foreach($options as $option){
        $selected = "";
        if($list == $option){
            $selected = "selected";
        }
        printf('<option value="%s" %s>%s</option>', $option, $selected, $option);
    }
    echo "</select>";
}

### Code Block Implementing
function bs4wp_component_textarea_field(){
    $code = get_option( "bs4wp_component_textarea" );
	printf('<textarea id="%s" name="%s">%s</textarea>', "bs4wp_component_code_block", "bs4wp_component_textarea", $code);
}


/**
 * ### Enqueue Scripts and Styles
 */

function bs4wp_asset(){
	$list = get_option( "bs4wp_component_select" );
	if( 'Yes' == $list ){
		wp_enqueue_style( "bs4wp-css-bootstrap", plugin_dir_url( __FILE__ )."public/css/bootstrap/bootstrap.min.css", null, "4.4.1" );
		wp_enqueue_script( "bs4wp-js-bootstrap", plugin_dir_url( __FILE__ )."public/js/bootstrap/bootstrap.min.js", array("jquery"), "4.4.1", true );
	}
	wp_enqueue_style( "bs4wp-css-main", plugin_dir_url( __FILE__ )."public/css/main.css", null, "1.0" );
	$custom_css = get_option( "bs4wp_component_textarea" );

	### Adding style from Plugin Settings
	wp_add_inline_style( 'bs4wp-css-main', $custom_css );

}
add_action( "wp_enqueue_scripts", "bs4wp_asset" );


/**
 * ### ShortCode Slider Container Block
 */
function bs4wp_component_shortcode_slider( $arguments, $content ) {
	$defaults  = array(
		'class'  => '',
		'id'     => '',
		'arrow' => 'no',
		'left_icon' => 'carousel-control-prev-icon',
		'right_icon' => 'carousel-control-next-icon',
		'dot'    => '',
	);
	
	$attributes = shortcode_atts( $defaults, $arguments );
	$content = do_shortcode( $content );

	/**
	 * ### Indicator Enable Condition
	 */
	if($attributes['dot'] != ''){
		$indicators = '<ol class="carousel-indicators">';
		for($i=0;$i<=$attributes['dot'];$i++){
			if($i == 0){
				$indicators .= '<li data-target="#'.$attributes['id'].'" data-slide-to="'.$i.'" class="active"></li>';
			}
			else{
				$indicators .= '<li data-target="#'.$attributes['id'].'" data-slide-to="'.$i.'"></li>';
			}
		}
		$indicators .= '</ol>';
	}

	/**
	 * ### Arrow Enable Condition
	 */
	if($attributes['arrow'] == 'yes'){
		$arrow_content = <<<EOD
		<a class="carousel-control-prev" href="#{$attributes['id']}" role="button" data-slide="prev">
			<span class="{$attributes['left_icon']}" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#{$attributes['id']}" role="button" data-slide="next">
			<span class="{$attributes['right_icon']}" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
EOD;
	}

	/**
	 * ### Slider Container
	 */
	$shortcode_output = <<<EOD
	<div id="{$attributes["id"]}" class="carousel slide {$attributes["class"]}" data-ride="carousel">
		{$indicators}
		<div class="carousel-inner">
			{$content}
		</div>
		{$arrow_content}
	</div>
EOD;
	return $shortcode_output;
}

add_shortcode( 'bs4slider', 'bs4wp_component_shortcode_slider' );


/**
 * ### ShortCode Slides Block
 */
function bs4wp_component_shortcode_slide( $arguments ) {
	$defaults   = array(
		'class'  => 'd-block w-100',
		'id'     => '',
        'size'   => 'large',
		'alt'    => '',
		'active' => '',
		'cap_class' => 'd-none d-md-block',
		'cap_title' => '',
		'cap_subtitle' => ''
	);
	$attributes = shortcode_atts( $defaults, $arguments );

	/**
	 * ### Condition for Caption
	 */

	//When Title and Subtitle not Blank 
	if($attributes['cap_title'] != '' && $attributes['cap_subtitle'] != ''){
		$caption = <<<EOD
		<div class="carousel-caption {$attributes['cap_class']}">
			<h5>{$attributes['cap_title']}</h5>
			<p>{$attributes['cap_subtitle']}</p>
		</div>
EOD;
	}
	//When Title not Blank but Subtitle Blank
	elseif($attributes['cap_title'] != '' && $attributes['cap_subtitle'] == ''){
		$caption = <<<EOD
		<div class="carousel-caption {$attributes['cap_class']}">
			<h5>{$attributes['cap_title']}</h5>
		</div>
EOD;
	}
	//When Title Blank but Subtitle not Blank
	elseif($attributes['cap_title'] == '' && $attributes['cap_subtitle'] != ''){
		$caption = <<<EOD
		<div class="carousel-caption {$attributes['cap_class']}">
			<h5>{$attributes['cap_title']}</h5>
		</div>
EOD;
	}else{
		$caption = "";
	}

	$image_src = wp_get_attachment_image_src($attributes['id'],$attributes['size']);

	$shortcode_output = <<<EOD
	<div class="carousel-item {$attributes['active']}">
		<img src="{$image_src[0]}" class="{$attributes['class']}" alt="{$attributes['alt']}">
		{$caption}
	</div>
EOD;
	return $shortcode_output;
}

add_shortcode( 'bs4slide', 'bs4wp_component_shortcode_slide' );


/**
 * ### Code Editor Initialization for CSS
 */
function bs4wp_css_code_editor(){
	if ( 'options-general' !== get_current_screen()->id ) {
        return;
    }
 
    // Enqueue code editor and settings for manipulating HTML.
    $settings = wp_enqueue_code_editor( array( 'type' => 'text/css' ) );
 
    // Bail if user disabled CodeMirror.
    if ( false === $settings ) {
        return;
    }
 
    wp_add_inline_script(
        'code-editor',
        sprintf(
            'jQuery( function() { wp.codeEditor.initialize( "bs4wp_component_code_block", %s ); } );',
            wp_json_encode( $settings )
        )
    );
}

add_action( 'admin_enqueue_scripts', 'bs4wp_css_code_editor' );

?>