<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



function aoppt_pick_aTab()
{
	global $adsPop, $adsRed;

	$txtPop = 'ads1k_popunder_code';
	$txtRed = 'ads1k_redirect_code';

	$theTab = isset($_REQUEST['tab'])?trim($_REQUEST['tab']):'';
	$theTab = strtolower($theTab);

	if ($theTab != $txtPop && $theTab != $txtRed)
	{
		if ( $adsPop != false )
		{
			return $txtPop;
		}
		else
		if ($adsRed != false)
		{
			return $txtRed;
		}
		else
		if (!$adsPop && !$adsRed)
		{
			return $txtPop;
		}
	}
	else
	{
		return $theTab;
	}
}

function aoppt_switchTab()
{
	$active_txt = '';
	$active_tab = (isset($_REQUEST['tab'])) ? $_REQUEST['tab'] : aoppt_pick_aTab();

	if($active_tab == 'ads1k_popunder_code')
	{
		$active_txt .= '
				<a href="./admin.php?page=ads1k-com&amp;tab=ads1k_redirect_code" style="display:block; float:right; text-decoration: none;">
					<center style="font-size:0.65em; margin:0; padding:10px; background-color:#EEE; border:1px solid #DDD;" class="error settings-error notice">Switch to<br />Redirect Code Integration</center>
				</a>
						';
	}
	if($active_tab == 'ads1k_redirect_code')
	{
		$active_txt .= '
				<a href="./admin.php?page=ads1k-com&amp;tab=ads1k_popunder_code" style="display:block; float:right; text-decoration: none;">
					<center style="font-size:0.65em; margin:0; padding:10px; background-color:#EEE; border:1px solid #DDD;" class="error settings-error notice">Switch to<br />PopUnder Code Integration</center>
				</a>
						';
	}

	return $active_txt;
}

function aoppt_show_logo()
{
	$logo = '
			<a href="http://ads1k.com/pub/new_user.php" target="_blank" id="ads1k_logo" title="ads1k.com" style="display:inline-block;">
			<img
				style="margin:0; padding:0; max-height:40px; width:auto;"
				alt="Official Ads1K Logo"
				title="Ads1K Official Logo"
				src="' . plugins_url( 'images/logo.png', __FILE__ ) . '"
			/>
			</a>
			';
	return $logo;
}


function aoppt_ads1k_xKO()
{
	$theTab = isset($_REQUEST['tab'])?trim($_REQUEST['tab']):aoppt_pick_aTab();
	$theTab = strtolower($theTab);

	if (get_option('aoppt_ads_off') == true)
	echo '
		<ul>
			<li class="list-group-item list-group-item-danger">
				Popunder code is disabled for this website.
				<br />
				Click <a href="./admin.php?page=ads1k-com&tab='.$theTab.'&ads1k_switch=switch">here</a> to enable it!
			</li>
		</ul>
	';
} 

function aoppt_ads1k_xOK()
{
	$theTab = isset($_REQUEST['tab'])?trim($_REQUEST['tab']):aoppt_pick_aTab();
	$theTab = strtolower($theTab);

	$theURL = 'admin.php?page=ads1k-com&tab=';

	$switch = isset($_REQUEST['ads1k_switch'])?trim($_REQUEST['ads1k_switch']):'';

	$txtPop = 'ads1k_popunder_code';
	$txtRed = 'ads1k_redirect_code';

	if (($theTab != $txtPop) && ($theTab != $txtRed))
	{
		$theURL .= $theTab;
	}
	else
	{
		$theURL .= 'ads1k_popunder_code';
	}
	
	if ( isset($switch) )
	{
		if ($switch == 'switch')
		{
			if (get_option('aoppt_ads_off') == false)
			update_option('aoppt_ads_off', true);
			else
			update_option('aoppt_ads_off', false);

			wp_redirect($theURL);
			exit;
		}
	}
}

function aoppt_show_pop()
{
	global $adsPop;
	if(isset($adsPop) && !empty($adsPop))
	echo '

		<!-- Start ads1k.com PopUnder Script -->
		<script src="http://ads1k.com/pub/_jpopunder/popunder.min.js"></script>
		<script>under_pop ("'.$adsPop.'");</script>
		<!-- Stops ads1k.com PopUnder Script -->

	';
}

function aoppt_show_red()
{
	global $adsRed;
	if(isset($adsRed) && !empty($adsRed))
	echo '

		<!-- Start ads1k.com Redirect Script -->
		<form method="get" name="redirect" action="http://ads1k.com/pub/'.$adsRed.'/"></form>
		<script>
		document.forms["redirect"].submit();
		</script>
		<!-- Stops ads1k.com Redirect Script -->

		';
}

function aoppt_codValid($adsPop)
{
	$setting = 'aoppt_ads_Pop';
	if(filter_var($adsPop, FILTER_VALIDATE_URL) && strpos($adsPop, '/ads1k.com/') !== false)
	{
		$adsPop = str_replace('logs.php', '', $adsPop);
		if(substr($adsPop, -1) == '/'){ $adsPop = substr($adsPop, 0, -1); }
		$adsPop = explode('/', $adsPop);
		$adsPop = array_pop($adsPop);
	}

	if (preg_match('/^[a-z0-9]+$/', $adsPop) && strlen($adsPop) == 32)
	{
		return $adsPop;
	}
	else
	{
		$message = 'Publisher\'s ID isn\'t properly formatted';
		add_settings_error($setting, 'wid-error', $message, 'error');
		return false;
	}
}

function aoppt_includeT()
{
	include plugin_dir_path( __FILE__ ).'template.php';
}

?>