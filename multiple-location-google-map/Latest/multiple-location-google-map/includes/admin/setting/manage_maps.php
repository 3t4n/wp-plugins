<?php 
if (!defined('ABSPATH')){
exit; // Exit if accessed directly
}
global $generalSettings;
$current_user = wp_get_current_user();
if ($current_user->has_cap('manage_location_google_map')) { 
if(isset($_POST['MlgmGeneralSettings']))
{
    
    $generalSettings=array(
	        'page_id'=>absint($_POST['setmapPage']),
			'defaultCity'=>sanitize_text_field($_POST['defaultCity']),
			'mlgm_map_width'=>absint($_POST['mlgm_map_width']),
			'mlgm_map_height'=>absint($_POST['mlgm_map_height']),
			'mlgm_zoomlevel'=>absint($_POST['mlgm_zoomlevel']),
			'mlgm_map_border'=>sanitize_text_field($_POST['mlgm_map_border']),
			'mlgm_map_effect_ddnsz'=>absint($_POST['mlgm_map_effect_ddnsz']),
			'mlgm_map_effect_dmc'=>absint($_POST['mlgm_map_effect_dmc'])
	);
	update_option('mlgm_general_settings',$generalSettings);
	echo '<div class="updated">Your settings have been saved.</div>';
}
}

if(get_option('mlgm_general_settings'))
{
$generalSettings=get_option('mlgm_general_settings');
}
?>

<form action="" method="post">
<table  class="mlgm-map-setting-table">
<tr>
    <td width="165" align="left" valign="middle"><strong><?php _e('Select Page :','mlgm') ?></strong></td>
    <td><?php $pages=get_pages( array('post_type' => 'page','post_status' => 'publish')); ?>
   <select id="setmapPage" name="setmapPage" class="mlgm-map-input">
     <option value="0" <?php echo ($generalSettings['page_id']==0)?'selected="selected"':'';?>><?php _e('Select Page','mlgm'); ?></option>
       <?php
		foreach ($pages as $page){
			$selected=($generalSettings['page_id']==$page->ID)?'selected="selected"':'';
			echo '<option '.$selected.' value="'.$page->ID.'">'.$page->post_title.'</option>';
		}
		?>
    </select><small><?php _e('Page where ticket system will be displayed. This page should contain the shortcode [MLGM]','mlgm'); ?></small></td>
  </tr>
  <tr>
    <td width="165" align="left" valign="middle"><strong><?php _e('Primary Location :','mlgm'); ?></strong></td>
    <td><input class="mlgm-map-input" type="text" id="defaultCity" name="defaultCity" value="<?php if(!empty($generalSettings['defaultCity'])){echo $generalSettings['defaultCity']; }else {} ?>" /><small><?php _e('Enter Default City','mlgm'); ?> </small></td>
  </tr>
  <tr>
    <td width="165" align="left" valign="middle"><strong><?php _e('Map Width :','mlgm'); ?></strong></td>
    <td><input class="mlgm-map-input" type="text" id="mlgm_map_width" name="mlgm_map_width" value="<?php if(!empty($generalSettings['mlgm_map_width'])){echo $generalSettings['mlgm_map_width']; }else { } ?>" /><small><?php _e('Enter Map Width (please enter only numeric characters)','mlgm'); ?> </small></td>
  </tr>
  <tr>
    <td width="165" align="left" valign="middle"><strong><?php _e('Map Height :','mlgm'); ?></strong></td>
    <td><input class="mlgm-map-input" type="text" id="mlgm_map_height" name="mlgm_map_height" value="<?php if(!empty($generalSettings['mlgm_map_height'])){echo $generalSettings['mlgm_map_height']; }else {} ?>" /><small><?php _e('Enter Map Height (please enter only numeric characters)','mlgm'); ?> </small></td>
  </tr>
  <tr>
    <td width="165" align="left" valign="middle"><strong><?php _e('Zoom Level : ','mlgm'); ?></strong></td>
    <td>
<div class="range"> 
    <div id="map_zoom_level"></div>
</div>
    <input class="mlgm-map-input" type="hidden" id="mlgm_zoomlevel" name="mlgm_zoomlevel" value="<?php if(!empty($generalSettings['mlgm_zoomlevel'])){echo $generalSettings['mlgm_zoomlevel']; }else { echo 6; } ?>" /><small id="mlgm_zoom_range"></small></td>
  </tr>
    <tr>
     <td width="165" align="left" valign="top"><strong></strong></td>
     <td><div class="mlgm-map-row"><input <?php echo ($generalSettings['mlgm_map_effect_ddnsz']==1)?'checked="checked"':'';?> type="checkbox" value="1" id="disable_drag_and_scrollwheel_zooming" name="mlgm_map_effect_ddnsz" /><strong><?php _e('Disable drag and scrollwheel zooming','mlgm'); ?></strong> </div>
     <div class="mlgm-map-row"><input <?php echo ($generalSettings['mlgm_map_effect_dmc']==1)?'checked="checked"':'';?> type="checkbox" value="1" id="disable_map_controll" name="mlgm_map_effect_dmc" /><strong><?php _e('Disable map controll','mlgm'); ?></strong></div>
     </td>
  </tr>
  </tr>
 <tr>
     <td><button class="button button-primary" id="MlgmGeneralSettings" name="MlgmGeneralSettings" type="submit"><?php _e('Save Settings','mlgm'); ?></button>
</td>
  </tr>
</table>
</form>