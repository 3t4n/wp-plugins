<?php
defined('ABSPATH') or die('not allowed.');

if (!exist_option('tag-manager-add-custom-tag-manager')) return;

$data = array();
foreach ($myInstallationData as $option => $IF_SANITIZE){
    $data[$option] = get_option($option);
}
if (!$data['tag-manager-is-widget-active']) return;

if ($data['tag-manager-custom-id']){
	
	if ($data['tag-manager-loading-method']){
		add_action('wp_enqueue_scripts', function() use($plugin_base_url){
			wp_enqueue_script('add-custom-tag-manager', $plugin_base_url.'assets/js/gtm.js', 0, '1.0.0');
		});
	}else{
		add_action('wp_head', function() use($data){
			echo "<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','" . $data['tag-manager-custom-id'] . "');</script>
<!-- End Google Tag Manager -->";
		});
		add_action('wp_footer', function() use($data){
			echo '<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . $data['tag-manager-custom-id'] . '"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->';
		});
	}
}

if (trim($data['tag-manager-add-custom-script']) && $data['tag-manager-custom-placement']){
    
    $sections = array(
        '0' => false, 
        '1' => 'wp_head',
        '2' => 'body',
        '3' => 'wp_footer',
        '4' => 'shortcode',
    );
    if ($data['tag-manager-custom-placement'] == '1' || $data['tag-manager-custom-placement'] == '3'){ //IF HEAD OR FOOTER
        add_action($sections[$data['tag-manager-custom-placement']], 'tmcs_add_custom_script_to_dom');
    }
        if ($data['tag-manager-custom-placement'] == '2'){ //IF INSERT INSIDE ELEMENT WITH JQUERY SELECTOR
        add_action('wp_enqueue_scripts', function() use($plugin_base_url){
            wp_enqueue_script('add-custom-tag-manager-body-script', $plugin_base_url.'assets/js/gtmbody.js', array( 'jquery' ), '1.0.0', true );    
        });
            
        }
        if ($data['tag-manager-custom-placement'] == '4'){ //IF SHORTCODE
        //CALL SHORTCODE [customscript]
        add_shortcode('customscript', 'tmcs_add_custom_script_to_dom');
    }
    
}
