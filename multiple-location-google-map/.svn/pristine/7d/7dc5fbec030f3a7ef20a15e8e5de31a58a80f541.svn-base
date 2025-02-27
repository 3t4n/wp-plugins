<?php 
if (!defined('ABSPATH')){
exit; // Exit if accessed directly
}
global $styleSettings;
$current_user = wp_get_current_user();
    if ($current_user->has_cap('manage_location_google_map')) {
if(isset($_POST['mlgm_style_savle']))
{
	
	$styleSettings=array(
			'mlgm_map_border'=>sanitize_text_field($_POST['mlgm_map_border']),
			'select_location_marker'=>esc_url_raw($_POST['select_location_marker']),
			'select_location_marker_val'=>absint($_POST['select_location_marker_val'])
	);
	update_option('mlgm_style_settings',$styleSettings);
	echo '<div class="updated">Your settings have been saved.</div>';
}
}

if(get_option('mlgm_style_settings'))
{
$styleSettings=get_option('mlgm_style_settings');
}
?>

<form action="" method="post">
<table  class="mlgm-map-setting-table">
  <tr>
    <td width="200" align="left" valign="top"><strong><?php _e('Map Border Color :','mlgm'); ?></strong></td>
    <td><input class="mlgm-map-input color-field" type="text" name="mlgm_map_border" id="mlgm_map_border" value="<?php if(!empty($styleSettings['mlgm_map_border'])){echo $styleSettings['mlgm_map_border']; }else {} ?>" /></td>
  </tr>
    <td width="200" align="left" valign="top"><strong><?php _e('Select Location Marker :','mlgm') ?></strong></td>
    <td>
    <input type="hidden" value="<?php if(!empty($styleSettings['select_location_marker_val'])){echo $styleSettings['select_location_marker_val']; }else {} ?>" name="select_location_marker_val" id="select_location_marker_val" />
    <input type="hidden" value="<?php if(!empty($styleSettings['select_location_marker'])){echo $styleSettings['select_location_marker']; }else {} ?>" name="select_location_marker" id="select_location_marker" />
     <span class="locatio-icon <?php if(!empty($styleSettings['select_location_marker_val']) && $styleSettings['select_location_marker_val']==1){echo 'locatio-icon-active'; } ?>"><img src="<?php echo MLGM_PLUGIN_URL ?>asset/images/location_icon_0009_Layer-1.png" alt="1"/></span>
     <span class="locatio-icon <?php if(!empty($styleSettings['select_location_marker_val']) && $styleSettings['select_location_marker_val']==2){echo 'locatio-icon-active'; } ?>"><img src="<?php echo MLGM_PLUGIN_URL ?>asset/images/location_icon_0008_Layer-2.png" alt="2"/></span>
     <span class="locatio-icon <?php if(!empty($styleSettings['select_location_marker_val']) && $styleSettings['select_location_marker_val']==3){echo 'locatio-icon-active'; } ?>"><img src="<?php echo MLGM_PLUGIN_URL ?>asset/images/location_icon_0007_Layer-3.png" alt="3"/></span>
     <span class="locatio-icon <?php if(!empty($styleSettings['select_location_marker_val']) && $styleSettings['select_location_marker_val']==4){echo 'locatio-icon-active'; } ?>"><img src="<?php echo MLGM_PLUGIN_URL ?>asset/images/location_icon_0006_Layer-4.png" alt="4"/></span>
     <span class="locatio-icon <?php if(!empty($styleSettings['select_location_marker_val']) && $styleSettings['select_location_marker_val']==5){echo 'locatio-icon-active'; } ?>"><img src="<?php echo MLGM_PLUGIN_URL ?>asset/images/location_icon_0005_Layer-5.png" alt="5"/></span>
<span class="locatio-icon <?php if(!empty($styleSettings['select_location_marker_val']) && $styleSettings['select_location_marker_val']==6){echo 'locatio-icon-active'; } ?>"><img src="<?php echo MLGM_PLUGIN_URL ?>asset/images/location_icon_0004_Layer-6.png" alt="6"/></span>
<span class="locatio-icon <?php if(!empty($styleSettings['select_location_marker_val']) && $styleSettings['select_location_marker_val']==7){echo 'locatio-icon-active'; } ?>"><img src="<?php echo MLGM_PLUGIN_URL ?>asset/images/location_icon_0003_Layer-7.png" alt="7"/></span>
<span class="locatio-icon <?php if(!empty($styleSettings['select_location_marker_val']) && $styleSettings['select_location_marker_val']==8){echo 'locatio-icon-active'; } ?>"><img src="<?php echo MLGM_PLUGIN_URL ?>asset/images/location_icon_0002_Layer-8.png" alt="8"/></span>
<span class="locatio-icon <?php if(!empty($styleSettings['select_location_marker_val']) && $styleSettings['select_location_marker_val']==9){echo 'locatio-icon-active'; } ?>"><img src="<?php echo MLGM_PLUGIN_URL ?>asset/images/location_icon_0001_Layer-9.png" alt="9"/></span>
<span class="locatio-icon <?php if(!empty($styleSettings['select_location_marker_val']) && $styleSettings['select_location_marker_val']==10){echo 'locatio-icon-active'; } ?>"><img src="<?php echo MLGM_PLUGIN_URL ?>asset/images/location_icon_0000_Layer-10.png" alt="10"/></span>
</td>
</tr>
 <tr>
     <td><button class="button button-primary" id="mlgm_style_savle" name="mlgm_style_savle" type="submit"><?php _e('Save Settings','mlgm'); ?></button>
</td>
</tr>
</table>
</form>