<?php
#~~~~~~~~~~~~~~~~ Menu / Config ~~~~~~~~~~~~~~~~
function byrev_horizontal_full_cat_option() {
	if (isset($_POST['cc_submit'])){ 
		$data['exclude_cat'] = attribute_escape($_POST['cc_exclude_cat']);
		$data['cahe_timeout'] = attribute_escape($_POST['cc_cahe_timeout']);
		$data['bg_cat_warp'] = attribute_escape($_POST['cc_bg_cat_warp']);
		$data['bg_subcat_line'] = attribute_escape($_POST['cc_bg_subcat_line']);		
		$data['basecat_color'] = attribute_escape($_POST['cc_basecat_color']);		
		$data['subcat_color'] = attribute_escape($_POST['cc_subcat_color']);
		$data['bord_cat_warp'] = attribute_escape($_POST['cc_bord_cat_warp']);
		$data['bord_subcat_line'] = attribute_escape($_POST['cc_bord_subcat_line']);	
		$data['level0_width'] = attribute_escape($_POST['cc_level0_width']);
		if (isset($_POST['cc_default_css'])) { $data['default_css'] = attribute_escape($_POST['cc_default_css']); } else { $data['cache'] = 'off'; }
		if (isset($_POST['cc_cache'])) { $data['cache'] = attribute_escape($_POST['cc_cache']); } else { $data['cache'] = 'off'; }		
		if (isset($_POST['cc_hide_emty_cat'])) { $data['hide_emty_cat'] = attribute_escape($_POST['cc_hide_emty_cat']); } else { $data['hide_emty_cat'] = 'off'; }	
		update_option('ByREV_Full_Categories', $data);
		update_option('ByREV_Full_Categories_Cache', array('css'=>'','html'=> array('code'=>'', 'time'=>0) ) );
		$data_saved = true;		 
	} else { $data_saved = false; }
$data = get_option('ByREV_Full_Categories');
?>
<script type="text/javascript">
<!--
function toggle_visibility(id) { var e = document.getElementById(id); if(e.style.display == 'block') e.style.display = 'none';  else e.style.display = 'block'; }
//-->
</script>
	<style>._hcatx fieldset {border: 1px solid #ccc; padding: 5px 0 5px 5px; margin-top: 5px; width: 430px; } ._hcat1 span {width: 150px; color: blue; display: inline-block;} ._hcat0 span {width: 170px; color: red; display: inline-block;} ._hcat2 span {width: 170px; color: green; display: inline-block;}</style>
	<form method="POST" action="">
	<div class="_hcatx">
	<h3>ByREV Horizontal Full Categories Administration</h3>
	<div class="_hcat0">
	<fieldset><legend><b>Basic Config</b></legend>
	<span>Hide Empty Categories: &nbsp;</span><input type="checkbox" name="cc_hide_emty_cat" value="on" <?php if ($data['hide_emty_cat'] == "on" ) {echo 'checked';} ?>></label>
	<br />
	<label><span>Exclude Categories: &nbsp;</span><input name="cc_exclude_cat" type="text" value="<?php echo $data['exclude_cat']; ?>" size="16" /> (comma separated)</label>
	</fieldset>
	</div>
	
	<br />	
	<div class="_hcat2">
	<fieldset><legend><b>Cache Result</b></legend>
	<span>Enable: &nbsp;</span><input onchange="toggle_visibility('cache_option')" type="checkbox" name="cc_cache" value="on" <?php if ($data['cache'] == "on" ) {echo 'checked';} ?>> (Maximize Performance)</label>
	<br />
	<div id="cache_option" style="display: <?php if ($data['cache'] == "on" ) {echo 'block';} else {echo 'none';} ?>;" >
	<label><span>TimeOut: &nbsp;</span><input name="cc_cahe_timeout" type="text" value="<?php echo $data['cahe_timeout']; ?>" size="16" /> sec.</label>
	</div>	
	</fieldset>
	</div>		
	<br />	
	<div class="_hcat1">	
	<label><span>Use Default CSS: &nbsp;</span><input onchange="toggle_visibility('css_option')" type="checkbox" name="cc_default_css" value="on" <?php if ($data['default_css'] == "on" ) {echo 'checked';} ?>>  (else load your own css style!)</label>
	<hr>
	<div id="css_option" style="display: <?php if ($data['default_css'] == "on" ) {echo 'block';} else {echo 'none';} ?>;" >
	<fieldset><legend><b>Background Color</b></legend>
		<label><span>Category Warp :&nbsp;</span><input name="cc_bg_cat_warp" type="text" value="<?php echo $data['bg_cat_warp']; ?>" size="26" /></label>
		<br />	
		<label><span>SubCategory Line:&nbsp;</span><input name="cc_bg_subcat_line" type="text" value="<?php echo $data['bg_subcat_line']; ?>" size="26" /></label>
	</fieldset>  
	<fieldset><legend><b>Link Color</b></legend>
		<label><span>Base Category:&nbsp;</span><input name="cc_basecat_color" type="text" value="<?php echo $data['basecat_color']; ?>" size="20" /></label>
		<br />	
		<label><span>SubCategory:&nbsp;</span><input name="cc_subcat_color" type="text" value="<?php echo $data['subcat_color']; ?>" size="20" /></label>
	</fieldset>
	<fieldset><legend><b>Border Color</b></legend>
		<label><span>Category Warp:&nbsp;</span><input name="cc_bord_cat_warp" type="text" value="<?php echo $data['bord_cat_warp']; ?>" size="20" /></label>
		<br />	
		<label><span>SubCategory Line:&nbsp;</span><input name="cc_bord_subcat_line" type="text" value="<?php echo $data['bord_subcat_line']; ?>" size="20" /> (Underline)</label>
	</fieldset>
	<br />	
	<label>Level 1 Category Width:&nbsp;<input name="cc_level0_width" type="text" value="<?php echo $data['level0_width']; ?>" size="5" />px (Pixels)</label>	
	</div>	<!-- css_option -->
	</div> <!-- _hcat1 -->
	</div> <!-- _hcatx -->
	<br />	
	<input type="submit" value="Submit" name="cc_submit"> <?php if ($data_saved) { echo '<b style="color: red;">Data Saved ...</b>'; } ?>
	</form>
<?php
}

function byrev_horizontal_full_cat_menu() {
  add_options_page('ByREV Horizontal Full Categories Options', 'ByREV Full Categories', 'administrator', 'byrev-horizontal-full-categories', 'byrev_horizontal_full_cat_option');
}

#~~~ activate/deactivate
function byrev_horizontal_full_activate() {
$data = array('hide_emty_cat'=>'on','exclude_cat'=>'1','cache'=>'on', 'cahe_timeout'=>'3600','default_css'=>'on', 'level0_width'=>'100',
'bg_cat_warp'=>'rgba(255, 255, 255, 0.7)','bg_subcat_line'=>'rgba(255, 240, 240, 0.7)','basecat_color'=>'#ff0000', 'subcat_color'=>'#0000ff','bord_cat_warp'=>'#ffdddd', 'bord_subcat_line'=>'#ffcccc');
	update_option('ByREV_Full_Categories', $data);
	update_option('ByREV_Full_Categories_Cache', array('css'=>'','html'=> array('code'=>'', 'time'=>0) ) );
}
function byrev_horizontal_full_deactivate() { 
	delete_option('ByREV_Full_Categories'); 
	delete_option('ByREV_Full_Categories_Cache');
}
?>