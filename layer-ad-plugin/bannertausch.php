<?php
/*
Plugin Name: Layer-AD Bannertausch
Plugin URI: http://layer-ad.info
Description: Bannertausch Plugin
Author: Layer-AD
Version: 0.5
*/

function lab_absichern($id, $content = true)
{
	if( $content == true) $id = preg_replace('/[^0-9a-z]/','',$id);
	else $id = preg_replace('/[^0-9]/','',$id);

	return $id;
}

function lab_settings() 
{
	if ($_POST['action'] == 'update')
	{
		$lab_onoff = lab_absichern($_POST['lab_onoff'], false);
		$lab_userid = lab_absichern($_POST['lab_userid'], false);
		$lab_kat = lab_absichern($_POST['lab_kat']);
		$lab_ad = lab_absichern($_POST['lab_ad']);
		
		update_option('lab_onoff', $lab_onoff);
		update_option('lab_userid', $lab_userid);
		update_option('lab_kat', $lab_kat);
		update_option('lab_ad', $lab_ad);

		$message = '<div id="message" class="updated fade"><p><strong>Bannertausch: Einstellungen aktualisiert</strong></p></div>'; 
	} 
	else
	{
		$lab_onoff = get_option('lab_onoff');
		$lab_userid = get_option('lab_userid');
		$lab_kat = get_option('lab_kat');
		$lab_ad = get_option('lab_ad');
	}
	
	if($lab_onoff == "0") $lab_option[1][1] = 'selected';
	else $lab_option[1][2] = 'selected';
	
	if($lab_kat == "politik") $lab_option[2][1] = 'selected';
	elseif($lab_kat == "fussball") $lab_option[2][2] = 'selected';
	elseif($lab_kat == "kommerziell") $lab_option[2][3] = 'selected';

	if($lab_ad == "banner") $lab_option[3][1] = 'selected';
	elseif($lab_ad == "layer") $lab_option[3][2] = 'selected';
	elseif($lab_ad == "beide") $lab_option[3][3] = 'selected';

	echo '
	
	<style>
	<!--
		
		input.labform,
		select.labform
		{
			color: #444444;
			width: 200px;
			margin-right: 10px;
		}		
	
	-->
	</style>

	<div class="wrap">

		'.$message.'

		<div id="icon-options-general" class="icon32"><br /></div>

		<h2>Layer-AD Bannertausch</h2>

		<form method="post" action="">

			<input type="hidden" name="action" value="update" />

			<h3>Einstellungen</h3>
			
			<p>
			
				<select class="labform" name="lab_onoff">
				
					<option value="0" ' . $lab_option[1][1] . '>Keine Werbung anzeigen</options>
					
					<option value="1" ' . $lab_option[1][2] . '>Werbung anzeigen</options>
					
				</select>Werbung anzeigen?
				
			</p>

			<p>
			
				<input class="labform" name="lab_userid" type="text" value="' . $lab_userid . '"><a target="_blank" href="http://www.layer-ad.info">Layer-AD</a> Benutzer-ID
				
			</p>

			<p>
			
				<select class="labform" name="lab_kat">
				
					<option value="politik" ' . $lab_option[2][1] . '>Politische Seite</options>
					
					<option value="fussball" ' . $lab_option[2][2] . '>Fu&szlig;ball,- oder Fanseite</options>
					
					<option value="kommerziell" ' . $lab_option[2][3] . '>Sonstiges</options>
					
				</select>Kategorie Ihrer Seite
				
			</p>
			
			<p>
			
				<select class="labform" name="lab_ad">

					<option value="banner" ' . $lab_option[3][1] . '>468x60 Banner</options>

					<option value="layer" ' . $lab_option[3][2] . '>800x470 Layer</options>

					<option value="beide" ' . $lab_option[3][3] . '>Banner &amp; Layer</options>

				</select>Auswahl der Banner
				
			</p>

			<br />

			<input type="submit" class="button-secondary" value="&Auml;nderungen speichern" />

		</form>
		
		<br />
		
		<small>Hinweis: Layer werden nur Besuchern angezeigt, die nicht in Ihrem Blog eingeloggt sind!</small>

	</div>';
 }

function lab_admin_menu()
{  
	add_options_page('Layer-AD Bannertausch', 'Layer-AD Bannertausch', 'manage_options', 'layer_ad_bannertausch', 'lab_settings');  
}
 
add_action("admin_menu", "lab_admin_menu"); 

function lab_468x60($content)
{
	$lab_onoff = get_option('lab_onoff');
	$lab_userid = get_option('lab_userid');
	$lab_kat = get_option('lab_kat');
	$lab_ad = get_option('lab_ad');
	
	if( (true == is_single() || true == is_page()) && $lab_onoff == 1 && ($lab_ad == "banner" || $lab_ad == "beide") )
	{
		$banner = '<div id="layer_ad_468x60"><a target="_blank" href="http://www.layer-ad.info/"><img style="text-decoration: none; border: none; padding: 0; margin: 0;" src="http://layer-ad.info/images/werbung.png"></a><br />';

		$banner .= '<script language="javascript" src="http://layer-ad.info/bannertausch/'.$lab_userid.'/'.$lab_kat.'/468x60/"></script>';

		$banner .= '<noscript><a target="_blank" href="http://layer-ad.info/verweis/7/"><img src="http://imgload.info/files/rgh1287342836t.jpg"></a></noscript></div>';

		$return = $content . $banner;

		return $return;
	}

	return $content;
}

add_action('the_content', 'lab_468x60');

function lab_800x470() 
{	
	$lab_onoff = get_option('lab_onoff');
	$lab_userid = get_option('lab_userid');
	$lab_kat = get_option('lab_kat');
	$lab_ad = get_option('lab_ad');
	
	if( false == is_user_logged_in() && $lab_onoff == 1 && ($lab_ad == "layer" || $lab_ad == "beide") )
	{
		echo '<script language="javascript" src="http://layer-ad.info/bannertausch/' . $lab_userid . '/' . $lab_kat . '/800x470/"></script>';
	}	
}

add_action('wp_footer', 'lab_800x470');

?>