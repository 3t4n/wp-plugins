<?php

/**********************************************************
*ADMIN PANEL
***********************************************************/
function ays_nk_options_page(){
    global $ays_nk_options;
    ob_start();
?>
	
    <div class="wrap">
	<form method="POST" action="options.php" id="#myForm">
        <h2 class="ays_nk_head">AYS Facebook Popoup Likebox</h2>
		<div class="tabs">
			<ul class="tab-liays_nks">
				<li class="active"><a href="#tab1">General</a></li>
				<li><a href="#tab2">Styles</a></li>
			</ul>
		
		<div class="tab-content">
			<div id="tab1" class="tab active">
				<p>General</p>
				
					
					<?php settings_fields('ays_nk_settings_group'); ?>
					
					<h4 class="ays_nk_inf">FB information</h4>
					<table align="center" cellpadding="20">
						<tr>
							<td class="ays_nk_table_cell">
								<label class="description" for="ays_nk_settings[fb_url]"><?php _e('Facebook page url','ays_nk_domain') ?></label><sup class="help">      ? <span class="desc">Description</span></sup>
							</td>
							<td>
								<input id="ays_nk_settings[fb_url]" class="ays_nk_res" name="ays_nk_settings[fb_url]" type="text" value="<?php echo $ays_nk_options['fb_url'];?>" />
							</td>
						</tr>
						<tr>
							<td class="ays_nk_table_cell">
								<label class="description" for="ays_nk_settings[showOn]"><?php _e('Show on','ays_nk_domain') ?></label><sup class="help">      ? <span class="desc">Description</span></sup>
							</td>
							<td>
								<input id="ays_nk_settings[ays_nk_fb_timeL]" class="ays_nk_res" name="ays_nk_settings[ays_nk_fb_timeL]" type="checkbox" value="tl" <?php echo checked('tl', $ays_nk_options['ays_nk_settings[ays_nk_fb_timeL]']);?><?php if($ays_nk_options['ays_nk_fb_timeL'] == "tl") echo "checked"; ?>/>
								<label for="ays_nk_settings[ays_nk_fb_timeL]"> Timeline</label>
								
								<input id="ays_nk_settings[ays_nk_fb_evS]" class="ays_nk_res" name="ays_nk_settings[ays_nk_fb_evS]" type="checkbox" value="evS" <?php checked('evS', $ays_nk_options['ays_nk_settings[ays_nk_fb_evS]']);?> <?php if($ays_nk_options['ays_nk_fb_evS'] == "evS") echo "checked"?>  />
								<label for="ays_nk_settings[ays_nk_fb_evS]"> Events</label>
								
								<input id="ays_nk_settings[ays_nk_fb_mS]" class="ays_nk_res" name="ays_nk_settings[ays_nk_fb_mS]" type="checkbox" value="mS" <?php echo checked('mS', $ays_nk_options['ays_nk_settings[ays_nk_fb_mS]']);?><?php if($ays_nk_options['ays_nk_fb_mS'] == "mS") echo "checked"; ?>/>
								<label for="ays_nk_settings[ays_nk_fb_mS]"> Messages</label>
							</td>
						</tr>
						<tr>
							<td class="ays_nk_table_cell">
								<label class="description" for="ays_nk_settings[ays_nk_fb_chgs]"><?php _e('Use in FB plugin','ays_nk_domain') ?></label><sup class="help">      ? <span class="desc">Description</span></sup>
							</td>
							<td>
								<input id="ays_nk_settings[ays_nk_fb_chgs1]" class="ays_nk_res" name="ays_nk_settings[ays_nk_fb_chgs1]" type="checkbox" value="sm" <?php echo checked('sm', $ays_nk_options['ays_nk_settings[ays_nk_fb_chgs1]']);?><?php if($ays_nk_options['ays_nk_fb_chgs1'] == "sm") echo "checked"; ?>/>
								<label for="ays_nk_settings[ays_nk_fb_chgs1]">Small header</label>
								
								<input id="ays_nk_settings[ays_nk_fb_chgs2]" class="ays_nk_res" name="ays_nk_settings[ays_nk_fb_chgs2]" type="checkbox" value="hcf" <?php checked('hcf', $ays_nk_options['ays_nk_settings[ays_nk_fb_chgs2]']);?> <?php if($ays_nk_options['ays_nk_fb_chgs2'] == "hcf") echo "checked"?>  />
								<label for="ays_nk_settings[ays_nk_fb_chgs2]">Hide Cover Photoes</label>
								
								<input id="ays_nk_settings[ays_nk_fb_chgs3]" class="ays_nk_res" name="ays_nk_settings[ays_nk_fb_chgs3]" type="checkbox" value="sff" <?php echo checked('sff', $ays_nk_options['ays_nk_settings[ays_nk_fb_chgs3]']);?><?php if($ays_nk_options['ays_nk_fb_chgs3'] == "sff") echo "checked"; ?>/>
								<label for="ays_nk_settings[ays_nk_fb_chgs3]">Show Friend Faces</label>
							
							</td>
						</tr>
						<tr>
							<td class="ays_nk_table_cell">
								<label class="description" for="ays_nk_settings[width]"><?php _e('Width','ays_nk_domain') ?></label><sup class="help">      ? <span class="desc">Description</span></sup>
							</td>
							<td>
								<input id="ays_nk_settings[width]" class="ays_nk_res" name="ays_nk_settings[width]" type="text" value="<?php echo $ays_nk_options['width']; ?>" />
							</td>
						</tr>
						<tr>
							<td class="ays_nk_table_cell">
								<label class="description" for="ays_nk_settings[height]"><?php _e('Height','ays_nk_domain') ?></label><sup class="help">      ? <span class="desc">Description</span></sup>
							</td>
							<td>
								<input id="ays_nk_settings[height]" class="ays_nk_res" name="ays_nk_settings[height]" type="text" value="<?php echo $ays_nk_options['height'];?>" />
							</td>
						</tr>
						<tr>
							<td class="ays_nk_table_cell">
								<label class="description" id="a_u_c_l" for="ays_nk_settings[aucl]"><?php _e('Auto close per seconds','ays_nk_domain') ?></label><sup class="help">      ? <span class="desc">Description</span></sup>
							</td>

							<td>
								<input id="ays_nk_settings[aucl]" class="ays_nk_res" name="ays_nk_settings[aucl]" type="number" value="<?php echo $ays_nk_options['aucl'];?>"/>
							</td>
						</tr>
						<tr>
							<td class="ays_nk_table_cell">
								<label class="description"><?php _e('Show only','ays_nk_domain') ?></label><sup class="help">      ? <span class="desc">Description</span></sup>
							</td>
							<td>
								<input id="ays_nk_settings[soe1]" class="ays_nk_res" name="ays_nk_settings[soe1]" type="checkbox" value="home" <?php echo checked('home', $ays_nk_options['ays_nk_settings[soe1]']);?><?php if($ays_nk_options['soe1'] == "home") echo "checked"; if($ays_nk_options['soe1'] == "" && $ays_nk_options['soe2'] == "" && $ays_nk_options['soe3'] == "" && $ays_nk_options['soe4'] == "") echo "checked";?>/>
								<label for="ays_nk_settings[soe1]">Homepage</label>
								<input id="ays_nk_settings[soe2]" class="ays_nk_res" name="ays_nk_settings[soe2]" type="checkbox" value="all" <?php checked('all', $ays_nk_options['ays_nk_settings[soe2]']);?> <?php if($ays_nk_options['soe2'] == "all") echo "checked"?>  />
								<label for="ays_nk_settings[soe2]">All pages</label>
								<input id="ays_nk_settings[soe3]" class="ays_nk_res" name="ays_nk_settings[soe3]" type="checkbox" value="pos" <?php echo checked('pos', $ays_nk_options['ays_nk_settings[soe3]']);?><?php if($ays_nk_options['soe3'] == "pos") echo "checked"; ?>/>
								<label for="ays_nk_settings[soe3]">Posts</label>
								<input id="ays_nk_settings[soe4]" class="ays_nk_res" name="ays_nk_settings[soe4]" type="checkbox" value="archives" <?php checked('archives', $ays_nk_options['ays_nk_settings[soe4]']);?> <?php if($ays_nk_options['soe4'] == "archives") echo "checked"?>  />
								<label for="ays_nk_settings[soe4]">Archives</label>
							</td>
						</tr>
						<tr>
							<td class="ays_nk_table_cell">
								<label class="description"><?php _e('Show promoter every "X" minutes','ays_nk_domain') ?></label><sup class="help">      ? <span class="desc">Description</span></sup>
							</td>
							<td>
								<label for="ays_nk_settings[siev]">X = </label><input class="ays_nk_res" id="ays_nk_settings[siev]" name="ays_nk_settings[siev]" type="number" value="<?php echo $ays_nk_options['siev']; ?>" />
							</td>
						</tr>
						<tr>
							<td class="ays_nk_table_cell">
								<label class="description" for="ays_nk_settings[tbl]"><?php _e('Text befor likebox','ays_nk_domain') ?></label><sup class="help">      ? <span class="desc">Description</span></sup>
							</td>
							<td>
								<input id="ays_nk_settings[tbl]" class="ays_nk_res" name="ays_nk_settings[tbl]" type="text" value="<?php echo $ays_nk_options['tbl'];?>" />
							</td>
						</tr>
						<tr>
							<td class="ays_nk_table_cell">
								<label class="description" for="ays_nk_settings[ays_nk_ccss]"><?php _e('Custom Css:','ays_nk_domain') ?></label>
							</td>
							<td>
								<textarea class="ays_nk_res" id="ays_nk_settings[ays_nk_ccss]" name="ays_nk_settings[ays_nk_ccss]" type="text"><?php echo $ays_nk_options['ays_nk_ccss']; ?></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="submit" class="button-primary" value="<?php _e('Save Options','ays_nk_domain');?>" />
								<input type="button"  id="ays_nk_bttn"  value="<?php _e('Reset Options','ays_nk_domain');?>" class="my_butt"/>
							</td>
						</tr>
					</table>
						
			</div>
	 
			<div id="tab2" class="tab">
				<p>Styles</p>
					<h4 class="ays_nk_inf">AYS Facebook Popoup Likebox Styles</h4>
                    <p>Styles will be available in <a href="http://ays-pro.com/index.php/wordpress/facebook-popup-likebox" target="_blaays_nk" style="font-size:18px;color:red;">PRO</a> version. Check there <a href="http://ays-pro.com/index.php/wordpress/facebook-popup-likebox" target="_blaays_nk" style="font-size:18px;color:red;">AYS-Pro</a></p>
			</div>
		</div>
	</div>
    </form>    
    </div>
    <?php
    echo ob_get_clean();
}

function ays_nk_add_options_liays_nk(){
    add_options_page('AYS Facebook Popoup Likebox Options','ays_nkFPSPopoup','manage_options','ays_nk-options','ays_nk_options_page');
    add_menu_page('ays_nkFPSPopoup', 'AYS Facebook Popoup Likebox', 'manage_options', 'ays_nk-options', 'ays_nk_options_page');
}
add_action('admin_menu','ays_nk_add_options_liays_nk');

function ays_nk_register_settings(){
    register_setting('ays_nk_settings_group','ays_nk_settings');
}
add_action('admin_init','ays_nk_register_settings');
?>
