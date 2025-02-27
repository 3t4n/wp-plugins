<?php

add_action( 'wp_enqueue_scripts', 'add_thickbox' );
//add_shortcode('themoneytizer', 'themoneytizer_shortcode');
add_action('wp_enqueue_scripts', 'themoneytizer_rc_asc_replace_shortcode');
add_action('media_buttons', 'themoneytizer_media_buttons', 15);
add_action('admin_footer', 'themoneytizer_media_buttons_popup');
add_action('wp_enqueue_media', 'themoneytizer_scripts');

function themoneytizer_rc_asc_shortcode_exists($shortcode = false ) {
    global $shortcode_tags;

    if ( ! $shortcode )
        return false;

    if ( array_key_exists( $shortcode, $shortcode_tags ) )
        return true;

    return false;
}

function themoneytizer_rc_asc_replace_shortcode() {
    $shortcode = 'themoneytizer';

    if( themoneytizer_rc_asc_shortcode_exists( $shortcode ) ) {
        remove_shortcode( $shortcode );
    }
	add_shortcode($shortcode, 'themoneytizer_shortcode');
}

function themoneytizer_shortcode( $atts ) {
    
    $api = new themoneytizer_API();
    $display = $api->getSpace($atts['id']);

	return $display;
}

function themoneytizer_media_buttons($context) {
    
    $container_id = 'themoneytizer_media_buttons_popup';
    $title = __('Ajouter un emplacement The Moneytizer','themoneytizer');
  
    _e( '<a href="#TB_inline?width=600&height=550&inlineId=themoneytizer_buttons_popup" title="Ajouter un emplacement The Moneytizer" class="button thickbox">Ajouter un emplacement The Moneytizer</a>','themoneytizer');
}

function themoneytizer_media_buttons_popup() {
    $api = new themoneytizer_API();
    $website = $api->getWebsite(get_option('themoneytizer_setting_token'));

   _e( '<div id="themoneytizer_buttons_popup" style="display:none;">
    <h2>Choisissez l\'emplacement à insérer :</h2>
    <p>Sélectionnez l\'emplacement publicitaire que vous souhaitez insérer sur votre site puis cliquez le bouton ci-dessous.</p>
    <select id="themoneytizer_select_space">
        <option selected="selected">-- Choisissez un emplacement --</option>','themoneytizer');

        $spaces = $website->site_tags;
        if(!is_null($spaces)) {
            foreach ($spaces as $space) {
                if($space->tag_type == 0 && $space->tag_name == $space->form_name){
		
					$token = $website->site_id.'-'.$space->ad_id;
					echo '<option data-token="'.$token.'" value="'.$token.'"><b>';
					_e($space->tag_name,'themoneytizer');
					echo'</b></option>';
                }
            }
        }
        echo '
    </select>&nbsp;&nbsp;&nbsp;
    <select id="themoneytizer_select_align">';
        _e('<option value="left" selected="selected">Aligné à gauche</option>','themoneytizer');
        _e('<option value="center">Centré</option>','themoneytizer');
        _e('<option value="right">Aligné à droite</option>','themoneytizer');
    echo'</select>
    <br/><br/>
    <button class="button button-primary button-large">';
	_e('Insérer cet emplacement','themoneytizer');
	echo'</button>
    </div>';
}

function themoneytizer_scripts() {
    $dir = plugin_dir_url( __FILE__ );
    wp_enqueue_script('media_button_script', $dir.'js/media_button.js', array('jquery'), '1.0', true);
    wp_enqueue_style('thickbox_admin_style', $dir.'css/style.css', [], '1.0');
}
