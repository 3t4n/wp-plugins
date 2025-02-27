<?php
/*
	Plugin Name:  FaniMani.pl
	Plugin URI:   https://fanimani.pl/plugin-wordpress/
	Description:  Narzędzia i dodatki ułatwiające zbieranie darowizn
	Version:      1.1.14
	Author:       FaniMani.pl
	Author URI:   https://fanimani.pl
	License:      GPL2
	License URI:  https://www.gnu.org/licenses/gpl-2.0.html
	Text Domain:  fanimani
	Domain Path:  /languages/
*/

$fanimaniVersion='1.1.14';

if(!wp_next_scheduled('fanimaniFaniSEOUpdate')){
    wp_schedule_event(current_time('timestamp'),'hourly','fanimaniFaniSEOUpdate');
}

add_filter('query_vars', 'fanimaniQueryVars');
add_action('parse_request', 'fanimaniParseRequest');
add_action('wp_footer','fanimaniFaniSEOFooter');
add_action('wp_footer','fanimaniFooterCSS');
add_action('wp_footer','fanimaniWidgetDisplay');
add_action('plugins_loaded', 'fanimaniInit');

function fanimaniInit() {
    load_plugin_textdomain( 'fanimani', false, basename( dirname( __FILE__ ) ) . '/languages');
}

if(is_admin()){
  	add_action('plugin_action_links_'.plugin_basename( __FILE__ ),'fanimaniPluginLinks');
  	add_action('admin_menu','fanimaniMenuItems');
  	add_action('admin_init','fanimaniOptions');
  	add_action('admin_enqueue_scripts','fanimaniEnqueueStyles');
}

function fanimaniEnqueueStyles(){
	global $fanimaniVersion;
	wp_enqueue_script('fanimani',plugins_url('fanimani.js',__FILE__),array('wp-color-picker'),$fanimaniVersion,true);
	wp_enqueue_style('wp-color-picker');
}

function fanimaniOptions(){
	register_setting('fanimaniSettingsMain','fanimaniUuid');

	register_setting('fanimaniFaniSEOSettings','fanimaniFaniSEOActive');
	register_setting('fanimaniFaniSEOSettings','fanimaniFaniSEOTitle');
  	register_setting('fanimaniFaniSEOSettings','fanimaniFaniSEOColor');
  	register_setting('fanimaniFaniSEOSettings','fanimaniFaniSEOBackground');

  	register_setting('fanimaniWidgetSettings','fanimaniWidgetActive');
}

function fanimaniPluginLinks($fanimaniLinks){
	$fanimaniLinks = array_merge(array(
		'<a href="'.esc_url(admin_url('options-general.php?page=fanimani-settings')).'">'.__('FaniMani.pl settings','fanimani').'</a>'
	), $fanimaniLinks );
	return $fanimaniLinks;
}

function fanimaniQueryVars($fanimaniQueryVars) {
	$fanimaniQueryVars[]='fanimaniFaniAction';
    return $fanimaniQueryVars;
}

function fanimaniParseRequest($fanimaniWP){
    if(array_key_exists('fanimaniFaniAction',$fanimaniWP->query_vars)){
    	switch($fanimaniWP->query_vars['fanimaniFaniAction']){
    		case 'fanimaniFaniSEOUpdate':
    			echo fanimaniFaniSEOUpdate(true);
    		break;

    		case 'fanimaniFaniSEODeleteCron':
    			fanimaniFaniSEODeleteCron();
    		break;
    	}
    	
		exit();
    } 
}

function fanimaniMenuItems(){
	add_submenu_page('options-general.php', 'FaniMani.pl', 'FaniMani.pl', 'manage_options', 'fanimani-settings', 'fanimaniSettings');
}

function fanimaniSettings(){
	$_813_faniAction=isset($_GET['faniAction'])?$_GET['faniAction']:'';
	$fanimaniTab=isset($_GET['faniTab'])?$_GET['faniTab']:'main';
	$fanimaniMessage='';

	if(htmlspecialchars($_813_faniAction)=='faniseo-update'){
		fanimaniFaniSEOUpdate();
		$fanimaniMessage='faniseo-updated';
	}

	$fanimaniPluginUrl='options-general.php?page=fanimani-settings';

	echo '
		<div class="wrap">
			<h1>FaniMani.pl</h1>';
			switch($fanimaniMessage){
				case 'faniseo-updated':
					echo '<div class="notice notice-success is-dismissible"><p>'.__('Links updated','fanimani').'</p></div>';
				break;
			}
			echo '
				<div class="nav-tab-wrapper">
			        <a href="'.admin_url($fanimaniPluginUrl.'&faniTab=main').'" class="nav-tab '; if($fanimaniTab=='main'){ echo 'nav-tab-active';} echo '">'.__('Main settings','fanimani').'</a>
			        <a href="'.admin_url($fanimaniPluginUrl.'&faniTab=widget').'" class="nav-tab '; if($fanimaniTab=='widget'){ echo 'nav-tab-active';} echo '">'.__('FaniMani Widget','fanimani').'</a>
			        <a href="'.admin_url($fanimaniPluginUrl.'&faniTab=faniseo').'" class="nav-tab '; if($fanimaniTab=='faniseo'){ echo 'nav-tab-active';} echo '">FaniSEO</a>
			        
			    </div>
		    ';

		    switch($fanimaniTab){
		    	case 'main':
		    		echo '
						<form method="post" action="options.php">';
			    			settings_fields('fanimaniSettingsMain');
			    			//do_settings_sections('fanimaniSettingsMain');
				    	echo '
						    <table class="form-table">
						        <tr valign="top">
							        <th scope="row">'.__('Beneficiary Key','fanimani').'</th>
							        <td>
							        	<input type="text" name="fanimaniUuid" value="'.esc_attr(get_option('fanimaniUuid')).'" class="regular-text" />
							        	<p class="description">'.__('Unique Beneficiary Key. You can find it in your Beneficiary Panel:<br/>Ustawienia profilu &raquo; Użytkownicy i dostęp &raquo; Klucz dostępu dla aplikacji','fanimani').'</p>
							        </td>
						        </tr>
						    </table>';
						submit_button();
					echo '</form>';
		    	break;

		    	case 'faniseo':
		    		$fanimaniUuid=get_option('fanimaniUuid');
		    		$fanimaniFaniSEOActive=get_option('fanimaniFaniSEOActive');
		    		$fanimaniFaniSEOLinks=get_option('fanimaniFaniSEOLinks');
		    		$fanimaniFaniSEOUpdate=get_option('fanimaniFaniSEOUpdate');
		    		if($fanimaniUuid){
			    		echo '
			    			<p>'.__('You can read more about FaniSEO at <a href="https://fanimani.pl/faniseo?utm_source=plugin-wordpress" taget="_blank">fanimani.pl/faniseo</a>','fanimani').'
			    				
			    			</p>
							<form method="post" action="options.php">';
				    			settings_fields('fanimaniFaniSEOSettings');
				    			//do_settings_sections('fanimaniFaniSEOSettings');
					    	echo '
							    <table class="form-table">
							   	 	<tr valign="top">
								        <th scope="row">'.__('Enable FaniSEO','fanimani').'</th>
								        <td>
								        	<label>
								        		<input type="checkbox" name="fanimaniFaniSEOActive" value="true" '.($fanimaniFaniSEOActive?'checked':'').' class="fanimaniToggleDisplayCheckbox"/>
								        		'.__('Enable FaniSEO','fanimani').'
								        	</label>
								        </td>
							        </tr>
							        <tr valign="top" class="fanimaniToggleDisplay">
								        <th scope="row">'.__('Section title','fanimani').'</th>
								        <td>
								        	<input type="text" name="fanimaniFaniSEOTitle" value="'.esc_attr(get_option('fanimaniFaniSEOTitle')).'" class="regular-text" placeholder="'.__('Our donors','fanimani').'" />
								        </td>
							        </tr>
							        <tr valign="top" class="fanimaniToggleDisplay">
								        <th scope="row">'.__('Color of texts and links','fanimani').'</th>
								        <td>
								        	<input type="text" name="fanimaniFaniSEOColor" value="'.esc_attr(get_option('fanimaniFaniSEOColor')?get_option('fanimaniFaniSEOColor'):'#ffffff').'" class="regular-text fanimaniColorpicker" />
								        </td>
							        </tr>
							        <tr valign="top" class="fanimaniToggleDisplay">
								        <th scope="row">Kolor tła</th>
								        <td>
								        	<input type="text" name="fanimaniFaniSEOBackground" value="'.esc_attr(get_option('fanimaniFaniSEOBackground')?get_option('fanimaniFaniSEOBackground'):'#000000').'" class="regular-text fanimaniColorpicker" />
								        	<p class="description">'.__('Make sure that there is appropriate contrast between the background and text color - e.g. dark background and light links or light background and dark links. The links must be clearly visible on the page. The offer can be cancelled due to poorly visible links.','fanimani').'</p>
								        </td>
							        </tr>
							    </table>
							    <p class="description"><span class="dashicons dashicons-info"></span> '.__('Do you use any caching plugins? Remember to clear the cache after changing the settings.','fanimani').'</p>
							';
				    
				    	submit_button();

				    	echo '</form>';
				    	echo '<div class="fanimaniToggleDisplay">';
					    	echo '<h2>'.__('Available links','fanimani').'</h2>';
					    	if($fanimaniFaniSEOUpdate){
					    		echo '<p>'.__('Last update').': '.$fanimaniFaniSEOUpdate.'</p>';
					    	} else {
					    		echo '<p>'.__('Download links for the first time','fanimani').'</p>';
					    	}
					    	
					    	echo '<p><a href="'.admin_url($fanimaniPluginUrl.'&faniTab=faniseo&faniAction=faniseo-update').'" class="button button-primary">'.__('Download links','fanimani').'</a></p>';
					    	if($fanimaniFaniSEOLinks){
					    		echo '
						    		<table class="widefat fixed" cellspacing="0">
						    			<thead>
						    				<tr>	
									            <th class="manage-column" scope="col">'.__('Start date','fanimani').'</th>
									            <th class="manage-column" scope="col">'.__('End date','fanimani').'</th>
									            <th class="manage-column" scope="col">'.__('Link','fanimani').'</th>
									            <th class="manage-column" scope="col">'.__('Anchor text','fanimani').'</th>
									            <th class="manage-column" scope="col">'.__('Title attribute','fanimani').'</th>
					    					</tr>
					    				</thead>
					    				<tbody>
					    		';

					    		foreach($fanimaniFaniSEOLinks as $fanimaniFaniSEOLink){
					    			echo '
						    			<tr class="alternate">
								            <td>'.$fanimaniFaniSEOLink['offer_start'].'</td>
								            <td>'.$fanimaniFaniSEOLink['offer_end'].'</td>
								            <td>'.$fanimaniFaniSEOLink['offer_url'].'</td>
								            <td>'.$fanimaniFaniSEOLink['offer_anchortext'].'</td>
								            <td>'.$fanimaniFaniSEOLink['offer_title'].'</td>
								        </tr>
									';
								}
					    		echo '</tbody>
					    		</table>
					    		<p class="description"><span class="dashicons dashicons-info"></span> '.__('Do you use any caching plugins? Remember to clear the cache after downloading new links.','fanimani').'</p>';
					    	} else {
					    		echo __('No available links','fanimani');
					    	}
					    	echo '</div>'; 
					   	} else {
					   		echo '<p>';
					   		printf(__('Please enter the <strong>Beneficiary Key</strong> in <a href="%d">Main settings tab</a>','fanimani'), $fanimaniPluginUrl.'&tab=main');
					   		echo '</p>';
					   	}
		    	break;

		    	case 'widget':
		    		echo '
						<form method="post" action="options.php">';
			    			settings_fields('fanimaniWidgetSettings');
			    			//do_settings_sections('fanimaniWidgetSettings');

			    			$fanimaniUuid=get_option('fanimaniUuid');
		    				$fanimaniWidgetActive=get_option('fanimaniWidgetActive');

		    				if($fanimaniUuid){
						    	echo '
						    		<p>
						    			'.__('FaniMani Widget is an easy tool that will help you "squeeze out" a bit more from your website.','fanimani').'
						    			<br/>
										'.__('Configure selected features in the "Widget" section in your <a href="https://fanimani.pl?utm_source=plugin-wordpress" target="_blank">Beneficiary Panel </a> at FaniMani.pl','fanimani').'<br/>
										'.__('You can read more about the Widget at <a href="https://fanimani.pl/widget/?utm_source=plugin-wordpress" taget="_blank">fanimani.pl/widget</a>','fanimani').'.<br/>
										'.__('Use the option below to add the Widget to your website.','fanimani').'
						    			
						    			
						    			</p>
								    <table class="form-table">
								        <tr valign="top">
									        <th scope="row">'.__('Enable FaniMani Widget','fanimani').'</th>
									        <td>
									        	<label>
									        		<input type="checkbox" name="fanimaniWidgetActive" value="true" '.($fanimaniWidgetActive?'checked':'').' />
									        		'.__('Enable FaniMani Widget','fanimani').'
									        	</label>
									        </td>
								        </tr>
								    </table>
								    <p class="description"><span class="dashicons dashicons-info"></span> '.__('Do you use any caching plugins? Remember to clear the cache after changing the settings.','fanimani').'</p>
								    ';
								submit_button();
								echo '</form>';
							} else {
								echo '<p>';
								printf(__('Please enter the <strong>Beneficiary Key</strong> in <a href="%d">Main settings tab</a>','fanimani'), $fanimaniPluginUrl.'&tab=main');
								echo '</p>';
							}
		    	break;
		    }

		
}


function fanimaniFaniSEOUpdate($fanimaniDisplayDebug=false){
	$fanimaniUuid=get_option('fanimaniUuid');
	
	$fanimaniFaniSEOLinks=array();
	if($fanimaniUuid){
		$fanimaniRequest=wp_remote_get('https://fanimani.pl/faniseo/getlinks/'.$fanimaniUuid.'?'.date('Ymdhis'));
		if(is_wp_error($fanimaniRequest)){
			return false; 
		} else {
			$fanimaniRequestBody=wp_remote_retrieve_body($fanimaniRequest);
			$fanimaniRequestData=json_decode($fanimaniRequestBody);



			if(!empty($fanimaniRequestData)){
				if($fanimaniRequestData->status=='ok'){
					foreach($fanimaniRequestData->links as $fanimaniFaniSEOLink){
						$fanimaniFaniSEOLinks[]=array(
							'offer_start' => $fanimaniFaniSEOLink->offer_start,
							'offer_end'	=> $fanimaniFaniSEOLink->offer_end,
							'offer_url'	=> $fanimaniFaniSEOLink->offer_url,
							'offer_anchortext'	=> $fanimaniFaniSEOLink->offer_anchortext,
							'offer_title'	=> $fanimaniFaniSEOLink->offer_title,
						);
					}
				}
			}
		}
	}
	
	update_option('fanimaniFaniSEOLinks',$fanimaniFaniSEOLinks);
	update_option('fanimaniFaniSEOUpdate',current_time('Y-m-d H:i:s'));

	if($fanimaniDisplayDebug){
		if($fanimaniUuid){
			echo 'UUID: ********'.substr($fanimaniUuid,-5).'<br/>';
		} else {
			echo 'UUID: '.__('None','fanimani').'<br/>';
		}
		echo __('Downloaded links','fanimani').': '.count($fanimaniFaniSEOLinks);
	}
}

function fanimaniFaniSEODeleteCron(){
	wp_clear_scheduled_hook('fanimaniFaniSEOUpdate');
}

function fanimaniFaniSEOFooter(){
	echo fanimaniFaniSEODisplay('list');
}

function fanimaniFooterCSS(){
	echo '
		<style>
			.admin-bar #fanimani-1proc-bar{
				top: 32px !important;
			}

			@media screen and (max-width: 782px){
				.admin-bar #fanimani-1proc-bar{
					top: 46px !important;
				}
			}

			.admin-bar #wpadminbar{
				z-index: 16777201!important;
			}
		</style>
	';
}

function fanimaniFaniSEODisplay($fanimaniMode='list'){
	$fanimaniFaniSEOActive=get_option('fanimaniFaniSEOActive');
	$fanimaniOutput='';

	if($fanimaniFaniSEOActive){
		$fanimaniOutput.='<div id="faniseo-ready" data-i-type="faniseo-i-wp"></div><!--FaniSEO-ready--><!--faniseo-ready--><!--faniseo-i-wp-->';
		$fanimaniFaniSEOLinks=get_option('fanimaniFaniSEOLinks');
		$fanimaniFaniSEOTitle=maybe_unserialize(get_option('fanimaniFaniSEOTitle'));
		$fanimaniFaniSEOColor=get_option('fanimaniFaniSEOColor')?get_option('fanimaniFaniSEOColor'):'#000000';
		$fanimaniFaniSEOBackground=get_option('fanimaniFaniSEOBackground')?get_option('fanimaniFaniSEOBackground'):'#ffffff';
		
		if($fanimaniFaniSEOLinks){
			$fanimaniFaniSEOLinks=maybe_unserialize($fanimaniFaniSEOLinks);
			switch($fanimaniMode){
				default:
				case 'list':
					$fanimaniOutput.='<div id="faniseo">';
					if($fanimaniFaniSEOTitle){
						$fanimaniOutput.='<div id="faniseoTitle">'.$fanimaniFaniSEOTitle.'</div>';
					}
					$fanimaniOutput.='<ul id="faniseoList">';
					foreach($fanimaniFaniSEOLinks as $fanimaniFaniSEOLink){
						$fanimaniOutput.='<li><a href="'.$fanimaniFaniSEOLink['offer_url'].'" title="'.$fanimaniFaniSEOLink['offer_title'].'">'.$fanimaniFaniSEOLink['offer_anchortext'].'</a></li>';
					}
					$fanimaniOutput.='</ul></div>';
					$fanimaniOutput.='
						<style>
							#faniseo{
								text-align:center;
								padding:50px 20px;
								position:relative;
								color:'.$fanimaniFaniSEOColor.';
								background:'.$fanimaniFaniSEOBackground.';
								box-sizing:border-box;
								-moz-box-sizing:border-box;
								-webkit-box-sizing:border-box;
							} 
							#faniseoTitle{
								margin:0 0 0.5em 0;
								font-size:1.3em;
								line-height:1.3em;
								position:relative;
							} 
							#faniseo a{
								text-decoration:none;
								color:'.$fanimaniFaniSEOColor.';
							}

							ul#faniseoList{
								list-style:none !important;
								margin:0 !important;
								padding:0 !important;
								text-align:center;
								vertical-align:top;
							}

							ul#faniseoList li{
							    padding:5px 10px;
							    margin:0;
							    display:inline-block;
							}
						</style>';
				break;

				case 'ul':
					$fanimaniOutput.='<div id="faniseo">';
					if($fanimaniFaniSEOTitle){
						$fanimaniOutput.='<div id="faniseoTitle">'.$fanimaniFaniSEOTitle.'</div>';
					}
					$fanimaniOutput.='<ul>';
					foreach($fanimaniFaniSEOLinks as $fanimaniFaniSEOLink){
						$fanimaniOutput.='<li><a href="'.$fanimaniFaniSEOLink['offer_url'].'" title="'.$fanimaniFaniSEOLink['offer_title'].'">'.$fanimaniFaniSEOLink['offer_anchortext'].'</a></li>';
					}
					$fanimaniOutput.='</ul>
					</div>';
					$fanimaniOutput.='<style>#faniseo{padding:20px 0;position:relative;color:'.$fanimaniFaniSEOColor.';background:'.$fanimaniFaniSEOBackground.';} #faniseoTitle{margin:0 0 0.5em 0;font-size:1.3em;line-height:1.3em;position:relative;}#faniseo a{text-decoration:none;color:'.$fanimaniFaniSEOColor.'}</style>';
				break;
			}
		}
	}
	

	return $fanimaniOutput;
}

function fanimaniWidgetDisplay(){
	$fanimaniLanguage='';
	$fanimaniUuid=get_option('fanimaniUuid');
	$fanimaniWidgetActive=get_option('fanimaniWidgetActive');
	if($fanimaniWidgetActive && $fanimaniUuid){
		if(defined('ICL_LANGUAGE_CODE')){
			if(ICL_LANGUAGE_CODE!='pl'){
				$fanimaniLanguage=' data-language="en" ';
			}
		}
		if(class_exists('TRP_Translate_Press')){
			if(substr( get_locale(), 0, 3 )!='pl_'){
				$fanimaniLanguage=' data-language="en" ';	
			}
		}
		
		echo '<script id="fanimani-widget-script" async type="text/javascript" src="https://widget2.fanimani.pl/'.$fanimaniUuid.'.js" '.$fanimaniLanguage.'></script>';
	}
}