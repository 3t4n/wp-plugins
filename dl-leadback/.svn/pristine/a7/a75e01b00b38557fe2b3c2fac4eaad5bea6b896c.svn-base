<?php
/*
Plugin Name: DL Leadback
Description: Получите в 2 раза больше звонков с сайта уже сегодня! Установите виджет обратного звонка для сайта. Больше звонков. Выше конверсия. Рост продаж.
Plugin URI: http://dd-l.name/wordpress-plugins/dl-leadback/
Version: 1.2.1
Tags: dl, leadback, call, live chat
Author: Dyadya Lesha (info@dd-l.name)
Author URI: http://dd-l.name
*/


add_action( 'admin_menu', 'dl_leadback_menu_page' );

function dl_leadback_menu_page(){ 

    add_menu_page( 
		'DL Leadback',
		'DL Leadback',
		'administrator',
		'dl_leadback_stat',
		'dl_leadback_page_stat',
		'dashicons-phone'
		);
	
	if(get_option('dl_leadback_campaign') == '') {
		
		add_submenu_page(
			'dl_leadback_stat', 
			'Настройки Leadback', 
			'Настройки', 
			'administrator', 
			'dl_leadback_calls', 
			'dl_leadback_page_calls'
			);	
		
	} else {	
		
		add_submenu_page(
			'dl_leadback_stat', 
			'Статистика Leadback', 
			'Статистика', 
			'administrator', 
			'dl_leadback_stat', 
			'dl_leadback_page_stat'
			);
		
		add_submenu_page(
			'dl_leadback_stat', 
			'Звонки Leadback', 
			'Звонки', 
			'administrator', 
			'dl_leadback_calls', 
			'dl_leadback_page_calls'
			);
		
		$secret_key = get_option('dl_leadback_secret_key');
		$client_id = get_option('dl_leadback_client_id');
		$url_referals = 'https://leadback.ru/api/referals.php?secret_key='. $secret_key .'&client_id='. $client_id;
		$json_data_referals = file_get_contents($url_referals);
		$json_data_referals = json_decode($json_data_referals, true);
		
		if ( $json_data_referals[totalCount] <> '0' ) {
		
		add_submenu_page(
			'dl_leadback_stat', 
			'Клиенты Leadback', 
			'Клиенты', 
			'administrator', 
			'dl_leadback_referals', 
			'dl_leadback_page_referals'
			);	
		
		}
		
		add_submenu_page(
			'dl_leadback_stat', 
			'Настройки Leadback', 
			'Настройки', 
			'administrator', 
			'dl_leadback_options', 
			'dl_leadback_page_options'
			);	
	
	}
		
	add_action( 'admin_init', 'dl_leadback_register_settings' );

	}


function dl_leadback_page_stat() { 
	
	if(get_option('dl_leadback_campaign') == '') {
		
		include 'page-options.php'; 
		
	} else {
		
		include 'page-stat.php';
		
	}
}

function dl_leadback_page_referals() {
	
	include 'page-referals.php';
	
}

function dl_leadback_page_options() {
	
	include 'page-options.php';
	
}

function dl_leadback_page_calls() {
	
	include 'page-calls.php';
	
}


// регистрируем настройки
function dl_leadback_register_settings() {
	
	register_setting( 'dl-leadback-settings-group', 'dl_leadback_secret_key' );
	register_setting( 'dl-leadback-settings-group', 'dl_leadback_client_id' );
	register_setting( 'dl-leadback-settings-group', 'dl_leadback_campaign' );
	
}


// Добавляем допалнительную ссылку настроек на страницу всех плагинов
function dl_leadback_settings_link($links) {
	
  $settings_link = '<a href="admin.php?page=dl_leadback_options">Настройки</a>';
  array_unshift($links, $settings_link);
  return $links;
  
}
$plugin = plugin_basename(__FILE__);

add_filter("plugin_action_links_$plugin", 'dl_leadback_settings_link' );


add_action("wp_footer", "dl_leadback_footer_code", 9999);

function dl_leadback_footer_code() {
	
	if(get_option('dl_leadback_campaign')) echo "<!-- Begin LeadBack code {literal} -->
<script>
    var _emv = _emv || [];
    _emv['campaign'] = '". get_option('dl_leadback_campaign') ."';
    
    (function() {
        var em = document.createElement('script'); em.type = 'text/javascript'; em.async = true;
        em.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'leadback.ru/js/leadback.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(em, s);
    })();
</script>
<!-- End LeadBack code {/literal} -->";

}


function dl_leadback_plugin_deactivation(){
	
   delete_option( 'dl_leadback_secret_key');
   delete_option( 'dl_leadback_client_id');
   delete_option( 'dl_leadback_campaign');
   
}

register_deactivation_hook( __FILE__, 'dl_leadback_plugin_deactivation');

function returnSiteName() {
	
	$secret_key = get_option('dl_leadback_secret_key');
	$client_id = get_option('dl_leadback_client_id');
	
	$campaign = get_option('dl_leadback_campaign');

	$get_url_widgets = array(
		'secret_key' => $secret_key,
		'client_id' => $client_id,
	);

	$url_widgets = 'https://leadback.ru/api/widgets.php?'. http_build_query($get_url_widgets);
	$json_data_widgets = file_get_contents($url_widgets);
	$json_data_widgets = json_decode($json_data_widgets, true);
	
	foreach($json_data_widgets[data] as $key => $value) {
		
		if( $json_data_widgets[data][$key][widget_key] == $campaign ) {
		
			$site_name = $json_data_widgets[data][$key][site];
		
		}

	}
	
	return $site_name;

}