<?php 
global $generalSettings;
if(isset($_POST['setydsGeneralSubBtn']))
{
    $current_user = wp_get_current_user();
    if ($current_user->has_cap('manage_options')) { 
    $generalSettings=array(
	        'page_id'=>absint($_POST['setmapPage']),
			'defaultCity'=>sanitize_text_field($_POST['defaultCity']),
			'MlgmGoogleApiKey'=>sanitize_text_field($_POST['MlgmGoogleApiKey']),
			'yds_map_width'=>absint($_POST['yds_map_width']),
			'yds_map_height'=>absint($_POST['yds_map_height']),
			'ydsgm_zoomlevel'=>absint($_POST['ydsgm_zoomlevel']),
			'yds_map_border'=>sanitize_text_field($_POST['yds_map_border']),
			'ydsgm_map_effect_ddnsz'=>absint($_POST['ydsgm_map_effect_ddnsz']),
			'ydsgm_map_effect_dmc'=>absint($_POST['ydsgm_map_effect_dmc'])
	);
	update_option('ydsts_general_settings',$generalSettings);
	echo '<div class="updated">Your settings have been saved.</div>';
}
}

if(get_option('ydsts_general_settings'))
{
$generalSettings=get_option('ydsts_general_settings');
}
?>

<form action="" method="post">
<table  class="yds-map-setting-table">
<tr>
    <td width="165" align="left" valign="middle"><strong><?php _e('Select Page :','mlgm') ?></strong></td>
    <td><?php $pages=get_pages( array('post_type' => 'page','post_status' => 'publish')); ?>
   <select id="setmapPage" name="setmapPage" class="yds-map-input">
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
    <td><input class="yds-map-input" type="text" id="defaultCity" name="defaultCity" value="<?php if(!empty($generalSettings['defaultCity'])){echo $generalSettings['defaultCity']; }else {} ?>" /><small><?php _e('Enter Default City','mlgm'); ?> </small></td>
  </tr>
  <tr>
    <td width="165" align="left" valign="middle"><strong><?php _e('Google Api Key :','mlgm'); ?></strong></td>
    <td><input class="yds-map-input" type="text" id="MlgmGoogleApiKey" name="MlgmGoogleApiKey" value="<?php if(!empty($generalSettings['MlgmGoogleApiKey'])){echo $generalSettings['MlgmGoogleApiKey']; }else {} ?>" /><small><?php _e('Google Api Key','mlgm'); ?> <a href="<?php echo esc_url(__('https://developers.google.com/maps/documentation/javascript/get-api-key', 'mlgm')); ?>" target="_blank"><?php _e('Get Api Key','mlgm'); ?></a> </small></td>
  </tr>
  <tr>
    <td width="165" align="left" valign="middle"><strong><?php _e('Map Width :','mlgm'); ?></strong></td>
    <td><input class="yds-map-input" type="text" id="yds_map_width" name="yds_map_width" value="<?php if(!empty($generalSettings['yds_map_width'])){echo $generalSettings['yds_map_width']; }else { } ?>" /><small><?php _e('Enter Map Width (please enter only numeric characters)','mlgm'); ?> </small></td>
  </tr>
  <tr>
    <td width="165" align="left" valign="middle"><strong><?php _e('Map Height :','mlgm'); ?></strong></td>
    <td><input class="yds-map-input" type="text" id="yds_map_height" name="yds_map_height" value="<?php if(!empty($generalSettings['yds_map_height'])){echo $generalSettings['yds_map_height']; }else {} ?>" /><small><?php _e('Enter Map Height (please enter only numeric characters)','mlgm'); ?> </small></td>
  </tr>
  <tr>
    <td width="165" align="left" valign="middle"><strong><?php _e('Zoom Level : ','mlgm'); ?></strong></td>
    <td>
<div class="range"> 
    <div id="map_zoom_level"></div>
</div>
    <input class="yds-map-input" type="hidden" id="ydsgm_zoomlevel" name="ydsgm_zoomlevel" value="<?php if(!empty($generalSettings['ydsgm_zoomlevel'])){echo $generalSettings['ydsgm_zoomlevel']; }else {echo 8;} ?>" /><small id="map_zoom_range"></small></td>
  </tr>
    <tr>
     <td width="165" align="left" valign="top"><strong></strong></td>
     <td><div class="yds-map-row"><input <?php echo ($generalSettings['ydsgm_map_effect_ddnsz']==1)?'checked="checked"':'';?> type="checkbox" value="1" id="disable_drag_and_scrollwheel_zooming" name="ydsgm_map_effect_ddnsz" /><strong><?php _e('Disable drag and scrollwheel zooming','mlgm'); ?></strong> </div>
     <div class="yds-map-row"><input <?php echo ($generalSettings['ydsgm_map_effect_dmc']==1)?'checked="checked"':'';?> type="checkbox" value="1" id="disable_map_controll" name="ydsgm_map_effect_dmc" /><strong><?php _e('Disable map controll','mlgm'); ?></strong></div>
     </td>
  </tr>
  </tr>
 <tr>
     <td><button class="button button-primary" id="setydsGeneralSubBtn" name="setydsGeneralSubBtn" type="submit"><?php _e('Save Settings','mlgm'); ?></button>
</td>
  </tr>
</table>
</form>