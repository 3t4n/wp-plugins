<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Measurement ID or Global site tag Class

class ACHTM_REALLY_SIMPLE_GST {
	function __construct() {
		add_action('wp_head', array($this, 'achtm_show_global_site_tag'));
	}

	public function achtm_show_global_site_tag() {
		$measurement_id = get_option( 'achtm_google_measurement_id' );
		if(isset($measurement_id) && !empty($measurement_id)){
			$ouput = <<<EOT
				
				<!-- Global site tag code generated with ACh Tag Manager plugin -->
				<script async src="https://www.googletagmanager.com/gtag/js?id=$measurement_id"></script>
				<script>
					window.dataLayer = window.dataLayer || [];
					function gtag(){dataLayer.push(arguments);}
					gtag('js', new Date());
					
					gtag('config', '$measurement_id');
				</script>      
				<!-- / Global site tag (gtag.js) - Google Analytics -->
EOT;
			echo $ouput;
		}
	}
}
new ACHTM_REALLY_SIMPLE_GST();

// Google Analytics ID Class

class ACHTM_REALLY_SIMPLE_GA {
	function __construct() {
		add_action('wp_head', array($this, 'achtm_show_google_analytics'));
	}

	public function achtm_show_google_analytics() {
		$analytics_code = get_option( 'achtm_google_anaytics_code' );
		if(isset($analytics_code) && !empty($analytics_code)){
			$ouput = <<<EOT
				
				<!-- Global site tag code generated with ACh Tag Manager plugin -->
				<script async src="https://www.googletagmanager.com/gtag/js?id=$analytics_code"></script>
				<script>
					window.dataLayer = window.dataLayer || [];
					function gtag(){dataLayer.push(arguments);}
					gtag('js', new Date());
					
					gtag('config', '$analytics_code');
				</script>      
				<!-- / Global site tag (gtag.js) - Google Analytics -->
EOT;
			echo $ouput;
		}
	}
}
new ACHTM_REALLY_SIMPLE_GA();

// Google Tag Manager Class

class ACHTM_GOOGLE_TAG_MANAGER {
	function __construct() {
		add_action('wp_head', array($this, 'achtm_header_google_tag_manager_id'));
		add_action('wp_body_open', array($this, 'achtm_body_google_tag_manager_id'));
	}

	public function achtm_header_google_tag_manager_id() {
		$tagmanager_id = get_option( 'achtm_tag_manager_id' );
		if(isset($tagmanager_id) && !empty($tagmanager_id)){
			$ouput = <<<EOT
				
				<!-- Google Tag Manager code generated with ACh Tag Manager plugin -->
				<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
				})(window,document,'script','dataLayer','$tagmanager_id');</script>
				<!-- / Google Tag Manager -->
EOT;
			echo $ouput;
		}
	}
	public function achtm_body_google_tag_manager_id() {
		$tagmanager_id = get_option( 'achtm_tag_manager_id' );
		if(isset($tagmanager_id) && !empty($tagmanager_id)){
			$ouput = <<<EOT
				
				<!-- Google Tag Manager (noscript) code generated with ACh Tag Manager plugin -->
				<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=$tagmanager_id"
				height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
				<!-- / Google Tag Manager (noscript) -->
EOT;
			echo $ouput;
		}
	}
}
new ACHTM_GOOGLE_TAG_MANAGER();

?>