<?php

function themoneytizer_load_js_css_files_admin(){
    wp_enqueue_script('chart_library', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js',array(), 1.0, false);
    wp_enqueue_style('bootstrap_style', $src ='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css', array(), 1.0, false);
    wp_enqueue_script('bootstrap_library','https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js', array(), 1.0, false);
    wp_enqueue_script('jquery_ui', $src ='https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', array(), 1.0, false);
	wp_enqueue_style('jquery_ui_style', $src ='https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', array(), 1.0);
	wp_enqueue_script('jquery_validate',  plugins_url( '../js/jquery.validate.min.js', __FILE__ ), array(), 1.0, false);
	wp_enqueue_script('sweet_alert',  $src = 'https://cdn.jsdelivr.net/npm/sweetalert2@10', array(), 1.0, false);
	wp_enqueue_script('ajax-test', plugins_url( '../js/custom-script.js', __FILE__ ), array( 'jquery' ),1.0 );
	wp_enqueue_script('ads_txt_script', plugins_url( '../js/script_ads_txt.js', __FILE__ ), array( 'jquery' ), 1.0 );
	wp_enqueue_script('cmp_setting_script', plugins_url( '../js/script_cmp.js', __FILE__ ), array( 'jquery' ), 1.0);
	wp_localize_script('ajax-test', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ), 1.0 );

	/**
	* Enqueue remote script intro.js
	*/
	wp_enqueue_script('intro_js_script', 'https://unpkg.com/driver.js/dist/driver.min.js', array(), 1.0, true);

	/**
	* Enqueue remote style intro.js
	*/
	wp_enqueue_style('intro_js_style','https://unpkg.com/driver.js/dist/driver.min.css', array(), 1.0);

	/**
	* Enqueue local intro js config file
	*/
	switch(explode('_', get_locale())[0]){
		case 'fr':
			wp_enqueue_script('lazy_script', plugins_url( '../js/intro-languages/FR_script_intro_js.js', __FILE__ ), array(), 2, true);
			break;

		case 'pt':
			wp_enqueue_script('lazy_script', plugins_url( '../js/intro-languages/PT_script_intro_js.js', __FILE__ ), array(), 2, true);
			break;

		case 'es':
			wp_enqueue_script('lazy_script', plugins_url( '../js/intro-languages/ES_script_intro_js.js', __FILE__ ), array(), 2, true);
			break;

		case 'it':
			wp_enqueue_script('lazy_script', plugins_url( '../js/intro-languages/IT_script_intro_js.js', __FILE__ ), array(), 2, true);
			break;

		case 'de':
			wp_enqueue_script('lazy_script', plugins_url( '../js/intro-languages/DE_script_intro_js.js', __FILE__ ), array(), 2, true);
			break;

		default:
			wp_enqueue_script('lazy_script', plugins_url( '../js/intro-languages/US_script_intro_js.js', __FILE__ ), array(), 2, true);
			break;
	}

	if(get_option('themoneytizer_data_introduction')!=='1'){
		update_option('themoneytizer_data_introduction', '1');
		/**
		* Enqueue local script intro initiator
		*/
		wp_enqueue_script('lazy_script_initiator', plugins_url( '../js/script_intro_js.js', __FILE__ ), array('lazy_script'), 2, true);		
	}
	

	/**
	* Enqueue local script lazy
	*/
	wp_enqueue_script('lazy_script', plugins_url( '../js/lazy-loading.js', __FILE__ ), array(), 2, true);

	/**
	* Enqueue local script bill
	*/
	wp_enqueue_script('bill_script', plugins_url( '../js/script_bill.js', __FILE__ ), array(), 2, true);

	/**
	* Enqueue local script settings
	*/
	wp_enqueue_script('settings_script', plugins_url( '../js/script_settings.js', __FILE__ ), array(), 2, true);

	/**
	* Enqueue local script main
	*/
	wp_enqueue_script('main_script', plugins_url( '../js/script_main.js', __FILE__ ), array(), 2, true);

	/**
	* Enqueue local script form_tag
	*/
	wp_enqueue_script('form_tag_script', plugins_url( '../js/script_form_tag.js', __FILE__ ), array(), 2, true);
	
	/**
	* Enqueue local style
	*/
	wp_enqueue_style ('css_style', plugins_url( '../css/style.css', __FILE__ ), array(), 1.0);

	/**
	* Enqueue local script charts
	*/
	wp_enqueue_script('charts_script', plugins_url( '../js/charts.js', __FILE__ ), array(), 2, true);

	$lang_array = array(
		'themoney_lang' => __(strtolower(substr(get_bloginfo("language"), 3, 2)), 'plugin-domain' ),
	);
	wp_localize_script( 'lang_option', 'trad', $lang_array );
	$lang_array = array(
		'themoney_lang' => __(strtolower(substr(get_bloginfo("language"), 3, 2)), 'plugin-domain' ),
	);
	wp_localize_script( 'custom_script', 'trad', $lang_array );
	wp_enqueue_script('charts_script', array(), 1.0);
	wp_enqueue_script('lang_option', array(), 1.0);
}

function themoneytizer_load_js_css_files_front(){
    wp_enqueue_style('bootstrap_style', $src ='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css',$deps = array(), 1.0, $in_footer = false);
    wp_enqueue_script('bootstrap_js','https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js',$deps = array(), 1.0, $in_footer = false);
    wp_enqueue_script('jquery_ui', $src ='https://code.jquery.com/ui/1.12.1/jquery-ui.min.js',$deps = array(), 1.0, $in_footer = false);
	wp_enqueue_style('jquery_ui_style', $src ='https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', array(), 1.0);
	wp_enqueue_script('jquery_validate',  plugins_url( '../js/jquery.validate.min.js', __FILE__ ),$deps = array(), 1.0, $in_footer = false);
	wp_enqueue_script( 'ajax-test', plugins_url( '../js/custom-script.js', __FILE__ ), array( 'jquery' ), 1.0 );
	wp_localize_script( 'ajax-test', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ), 1.0 );
    
	wp_enqueue_script('lazy_script', plugins_url( '../js/lazy-loading.js', __FILE__ ),$deps = array(), 1.0, $in_footer = true);
	$lang_array = array(
		'themoney_lang' => __(strtolower(substr(get_bloginfo("language"), 3, 2)), 'plugin-domain' ),
	);

	wp_localize_script( 'lang_option', 'trad', $lang_array );

	$lang_array = array(
		'themoney_lang' => __(strtolower(substr(get_bloginfo("language"), 3, 2)), 'plugin-domain' ),
	);

	wp_localize_script( 'custom_script', 'trad', $lang_array );


    // Enqueue scripts
	wp_enqueue_script('lang_option',false,  array(), 1.0);
	wp_enqueue_style ('css_style', plugins_url( '../css/style.css', __FILE__ ),  array(), 1.0);
	wp_enqueue_script('custom_script', false, array(), 1.0);
	wp_enqueue_script('bill_script', false, array(), 1.0);
	wp_enqueue_script('settings_script', false, array(), 1.0);
    wp_enqueue_script('lazy_script',false, array(), 1.0);
}

function themoneytizer_frontend_header() {
	$data_auto = (array)json_decode(get_option('themoneytizer_data_auto'));
	if(gettype($data_auto)!='array'){
		$data_auto = [];
	}

	foreach($data_auto as $el){
		gettype($el->status);
		if($el->status == 'true' && in_array($el->ad_id, TAG_AUTOPLACE_HEAD)){
			echo stripslashes($el->tag);
		}
	}
}

function themoneytizer_frontend_footer() {
	$data_auto = (array)json_decode(get_option('themoneytizer_data_auto'));
	if(gettype($data_auto)!='array'){
		$data_auto = [];
	}

	foreach($data_auto as $el){
		if($el->status == 'true' && in_array($el->ad_id, TAG_AUTOPLACE_FOOTER)){
			echo stripslashes($el->tag);
		}
	}
}

/**
 * Prevent bootstrap and files conflict on other Backoffice pages
 */
if(isset($_GET['page'])&&$_GET['page']=='themoneytizer'){
	add_action('admin_enqueue_scripts', 'themoneytizer_load_js_css_files_admin');
}

add_action('wp_head', 'themoneytizer_frontend_header');
add_action('wp_footer', 'themoneytizer_frontend_footer');