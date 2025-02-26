<?php

if(is_admin()){

 add_action('admin_menu', 'embed_options');
}

function embed_options()
{
		
	add_options_page('MMUnicode Embed', 'Unicode Embed', 'administrator', 'mmunicod_embed', 'mmunicode_adminpage');
}

function mmunicode_adminpage()
{
	if(isset($_POST))
	{
		if(isset($_POST['Submit']))
		{
			//update_option('fblike_display_page',$_POST['fblike_display_page']);
			
			update_option('uniemd_jquery',$_POST['uniemd_jquery']);
			update_option('uniemd_converter',$_POST['uniemd_converter']);
		}
		
	}
	
	if (get_option('uniemd_init') =="")
	{
		//init
		update_option('uniemd_init',1);
		update_option('uniemd_jquery',1);
		update_option('uniemd_converter',1);
	}
?>
	 <div class="wrap" style="font-size:13px;">

			<div class="icon32" id="icon-options-general"><br/></div><h2>Settings for Font Embed</h2>
			<form method="post" action="options-general.php?page=mmunicod_embed">
			<table class="form-table">
				<tr>
					<td width=200>
					<strong>jQuery ထည့်​သွင်း​ရန်</strong>
					</td>
					<td>
						<p>
						 <input type="checkbox" value="1"
						 <?php if (get_option('uniemd_jquery') == '1') echo 'checked="checked"'; 
						 ?> name="uniemd_jquery" id="uniemd_jquery" group="uniemd_admin"/>
					</td>
				</tr>
				<tr>
					<td>
						<strong>မှတ်ချက် unicode ​ေြပာင်း​စနစ်</strong>
					</td>
					<td>
						<p>
						 <input type="checkbox" value="1"
						 <?php if (get_option('uniemd_converter') == '1') echo 'checked="checked"'; 
						 ?> name="uniemd_converter" id="uniemd_converter" group="uniemd_converter"/>
					</td>
					<td>
					</td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />		
			</p>
			</form>
<?php
}
?>