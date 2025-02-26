<?php
// plugin root folder
$audem_base_dir = WP_PLUGIN_URL . '/' . str_replace(basename( __FILE__), "" ,plugin_basename(__FILE__));


// Allow shortcodes in widgets

add_filter('widget_text', 'do_shortcode');

/* Shortcodes to Zurb Foundation 4+ Framework */

// Rows [row][/row]

function audemedia_shortcode_row( $atts, $content = null ) {
   return '<div class="row">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'row', 'audemedia_shortcode_row' );

// Columns [column][/column]

function audemedia_shortcode_column( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'center' => '',
		'number' => '',
		), $atts ) );

	// Set the 'center' variable
	if ($center == 'true') {
	$center = 'centered';
	}

	return '<div class="small-12 large-' . esc_attr($number) . ' columns ' . esc_attr($center) .'"><p>' . do_shortcode($content) . '</p></div>';
}

add_shortcode( 'column', 'audemedia_shortcode_column' );

// Buttons [button][/button]

function audemedia_shortcode_button( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'link' => '#',
		'size' => 'medium',
		'background' => '',
		'style' => ''
		), $atts ) );

	return '<a href="' . esc_attr($link) . '" style="background:' . esc_attr($background) . '" class="' . esc_attr($size) . ' ' . esc_attr($style) . '  button">' . $content . '</a>';
}

add_shortcode( 'button', 'audemedia_shortcode_button' );

// Panels [panel][/panel]

function audemedia_shortcode_panel( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'type' => '',
		'style' => '',
        'background' => '',
		), $atts ) );

	return '<div class="panel ' . esc_attr($type) . ' ' . esc_attr($style) . ' " style="background:' . esc_attr($background) . '">' . do_shortcode($content) . '</div>';
}

add_shortcode( 'panel', 'audemedia_shortcode_panel' );

// Pricing Boxes [pricingbox][/pricingbox]

function audemedia_shortcode_pricingbox( $atts, $content = null ) {
   
   extract( shortcode_atts( array(
		'title' => '',
		'price' => '',
        'description' => '',
        'link' => '',
        'linktext' => '',
		), $atts ) );

   return '<ul class="pricing-table"><li class="title">' . esc_attr($title) . '</li><li class="price">' . esc_attr($price) . '</li><li class="description">' . esc_attr($description) . '</li>' . do_shortcode($content) . '<li class="cta-button"><a class="button" href="' . esc_attr($link) . '">' . esc_attr($linktext) . '</a></li></ul>';
}

add_shortcode( 'pricingbox', 'audemedia_shortcode_pricingbox' );


/*--------------------------------------*/
/*    Clean up Shortcodes
/*--------------------------------------*/
function aude_clean_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']',
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'aude_clean_shortcodes');

// Add Shortcodes to Post / Pages

add_action('media_buttons','add_sh_select',11);
function add_sh_select(){
    global $shortcode_tags;
    $shortcode_list = '';
     /* ------------------------------------- */
     /* enter names of shortcode to exclude below */
     /* ------------------------------------- */
    $exclude = array("caption", "gallery", "wp_caption", "embed");
    echo '<select id="sh_select"><option>Choose Shortcode</option>';
    foreach ($shortcode_tags as $key => $val){
            if(!in_array($key,$exclude)){
            $shortcodes_list .= '<option value="['.$key.'][/'.$key.']">'.$key.'</option>';
            }
        }
     echo $shortcodes_list;
     echo '</select>';
}
add_action('admin_head', 'button_js');
function button_js() {
        echo '<script type="text/javascript">
        jQuery(document).ready(function(){
           jQuery("#sh_select").change(function() {
                          send_to_editor(jQuery("#sh_select :selected").val());
                          return false;
                });
        });
        </script>';
}




?>