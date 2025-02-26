<?php 

require_once 'ad.constant.php';

function print_ad_menu_form($ad_array){
	
?>

<div style="padding:8px;">
<h2><?php echo AD_ADSENSE_DEAMON_TITLE . ' (v' . AD_ADSENSE_DEAMON_VERSION . ')' ?></h2>
by Yong Mook Kim - <a href="http://www.mkyong.com/contact-mkyong/" target="_blank">Contact Me</a> | 
<a href="http://www.mkyong.com/blog/adsense-daemon-wordpress-plugin/" target="_blank">Bug Report &amp; Feature Request</a>

</div>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="ad_form" name="ad_form">

<?php 

	foreach($ad_array as $obj){
?>	
<div style="padding:8px; margin-bottom:16px; width:770px; background-color: white; border: 1px solid rgb(221, 221, 221);">
    
	<div style="padding-left:4px;">
		<h3><?php echo $obj->get_ad_name(); ?></h3>
	</div>
	
	<div style="padding-left:16px;">
		Put Your Google Adsense Code or Any HTML Code Here
	</div>
	<div style="padding:8px;">
		<textarea name="<?php echo $obj->option_ad_data; ?>" rows="15" cols="100" style="background-color:#F9F9F9;"><?php echo $obj->get_ad_data(); ?></textarea>
	</div>

	<div style="padding:8px 8px 16px 16px;">
		Display in : 
		<select name="<?php echo $obj->option_append_type; ?>" style="width:160px">
			<option value="<?php echo AD_SELECT_NONE; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_NONE) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_NONE; ?></option>
			<option value="<?php echo AD_SELECT_LEFT_FLOAT; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_LEFT_FLOAT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_LEFT_FLOAT; ?></option>
			<option value="<?php echo AD_SELECT_RIGHT_FLOAT; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_RIGHT_FLOAT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_RIGHT_FLOAT; ?></option>
			<option value="<?php echo AD_SELECT_BEFORE_CONTENT; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_BEFORE_CONTENT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_BEFORE_CONTENT; ?></option>
			<option value="<?php echo AD_SELECT_AFTER_CONTENT; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_AFTER_CONTENT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_AFTER_CONTENT; ?></option>
			<option value="<?php echo AD_SELECT_PARA1; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_PARA1) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_PARA1; ?></option>
			<option value="<?php echo AD_SELECT_PARA2; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_PARA2) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_PARA2; ?></option>
			<option value="<?php echo AD_SELECT_PARA3; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_PARA3) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_PARA3; ?></option>
			<option value="<?php echo AD_SELECT_PARA4; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_PARA4) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_PARA4; ?></option>
			<option value="<?php echo AD_SELECT_PARA5; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_PARA5) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_PARA5; ?></option>
			<option value="<?php echo AD_SELECT_PARA6; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_PARA6) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_PARA6; ?></option>
			<option value="<?php echo AD_SELECT_PARA7; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_PARA7) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_PARA7; ?></option>
			<option value="<?php echo AD_SELECT_PARA8; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_PARA8) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_PARA8; ?></option>
			<option value="<?php echo AD_SELECT_PARA9; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_PARA9) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_PARA9; ?></option>
			<option value="<?php echo AD_SELECT_PARA10; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_PARA10) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_PARA10; ?></option>
			<option value="<?php echo AD_SELECT_RADOM_PARA; ?>" <?php echo ($obj->get_append_type()==AD_SELECT_RADOM_PARA) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_RADOM_PARA; ?></option>
		</select> 
	</div>
	<div style="padding:0px 8px 16px 16px;">
		Display ads for post published after :  <input type="text" name="<?php echo $obj->option_ad_after_day; ?>" value="<?php echo $obj->get_ad_after_day() ?>" size="2" maxlength="3"/> day(s). (0 = immediately)
	</div>
	<div style="padding:0px 8px 16px 16px;">
		Do not display ads to users from website :  <input type="text" name="<?php echo $obj->option_ad_block_user; ?>" value="<?php echo $obj->get_ad_block_user() ?>" size="30" maxlength="200"/> (e.g : digg.com, dzone.com)
	</div>
	<div style="padding:0px 8px 16px 16px;">
		Do not display ads to this category :  <input type="text" name="<?php echo $obj->option_ad_block_cat; ?>" value="<?php echo $obj->get_ad_block_cat() ?>" size="30" maxlength="200"/> (e.g : feature, tutorials)
	</div>
	<div style="padding:0px 8px 16px 16px;">
		Display ads to this category :  <input type="text" name="<?php echo $obj->option_ad_allow_cat; ?>" value="<?php echo $obj->get_ad_allow_cat() ?>" size="30" maxlength="200"/> (e.g : feature, tutorials)
	</div>
	
</div>

<?php 
	}
?>

<div style="padding:16px 16px 16px 560px">
		<input onclick="if (confirm('Are you sure to reset all settings?'))return true;return false" name="<?php echo AD_FORM_CLEAR; ?>" value="Reset" type="submit" style="width:100px;"/>
		<input name="<?php echo AD_FORM_SAVE; ?>" value="Save" type="submit" style="width:100px;" />
</div>

</form>

<div style="padding:8px 8px 32px 8px; margin-bottom:16px; width:770px; background-color: white; border: 1px solid rgb(221, 221, 221);">
 
<h3>Advance Configuration</h3>

<div style="padding:16px;">
You are allow to disable the advertisement to display in certain post.<br/><br/>
1. Put &lt;!-- Adsense Daemon Ads1 Disabled --&gt; within post to disable the #1 Daemom template code.<br/>
2. Put &lt;!-- Adsense Daemon Ads2 Disabled --&gt; within post to disable the #2 Daemom template code.<br/>
3. Put &lt;!-- Adsense Daemon Ads3 Disabled --&gt; within post to disable the #3 Daemom template code.<br/>
4. Put &lt;!-- Adsense Daemon Ads4 Disabled --&gt; within post to disable the #4 Daemom template code.<br/>
</ul>
</div>

</div>

<?php 
} 
?>