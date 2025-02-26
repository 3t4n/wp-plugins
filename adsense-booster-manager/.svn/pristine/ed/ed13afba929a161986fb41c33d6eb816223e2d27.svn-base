<div class="wrap">
<?php //show saved options message
if ( $_REQUEST['settings-updated'] == true ) : ?>
<div id="message" class="updated below-h2"><p><strong><?php _e( 'Options saved','infotheme' ); ?></strong></p></div>
<?php endif; ?>

	<?php include_once("global/header.php"); ?>
	
	<form method="post" action="options.php">
		<?php settings_fields( 'adm-global-settings-group' ); ?>
		<?php do_settings_sections( 'adm-global-settings-group' ); ?>
		<div id="adm_ad_settings">
			<div id="adm_adsrow">
				<div id="label"><?php _e( 'Ad Code 1','infotheme' ); ?></div>
				<div id="AdtxtBox"><textarea name="adm_gs_ad1"><?php _e(esc_attr( get_option('adm_gs_ad1') ),'infotheme'); ?></textarea></div>
			</div>
			 
			<div id="adm_adsrow">
				<div id="label"><?php _e( 'Ad Code 2','infotheme' ); ?></div>
				<div id="AdtxtBox"><textarea name="adm_gs_ad2"><?php _e(esc_attr( get_option('adm_gs_ad2') ),'infotheme'); ?></textarea></div>
			</div>
			
			<div id="adm_adsrow">
				<div id="label"><?php _e( 'Ad Code 3','infotheme' ); ?></div>
				<div id="AdtxtBox"><textarea name="adm_gs_ad3"><?php _e(esc_attr( get_option('adm_gs_ad3') ),'infotheme'); ?></textarea></div>
			</div>
			
			
			<div id="adm_adsrow">
			<div id="label"><?php _e( 'Ad Position','infotheme' ); ?></div>
			
				<div id="AdtxtBox">
				<table>
				<tbody>
				<tr>
				<td>
					<input type="checkbox" name="adm_gs_top" class="AdtxtBoxCheckbox" value="<?php _e('1','infotheme');?>" <?php if(get_option('adm_gs_top')): echo "checked='yes'";  endif; ?>/><?php _e( 'Top Of Post Assign','infotheme' ); ?>
				</td>
				<td>
					<select class="AdtxtBoxSelect" name="adm_gs_top_ad" <?php if(!get_option('adm_gs_top')){ echo "disabled";}?>>
						<?php for($i=1; $i<=3; $i++):?>
						<option value="ad<?php echo $i;?>" <?php if(get_option('adm_gs_top_ad') == 'ad'.$i): echo "selected"; endif;?>><?php echo "Ad Code ".$i;?></option>
						<?php endfor;?>
					</select>
				</td>
				<td>
				<select class="AdtxtBoxSelect" name="adm_gs_top_style" <?php if(!get_option('adm_gs_top_style')){ echo "disabled";}?>>
					<option>Ad Alignment</option>
					<option value="left" <?php if(get_option('adm_gs_top_style') == 'left'): echo "selected"; endif;?>>Left</option>
					<option value="right" <?php if(get_option('adm_gs_top_style') == 'right'): echo "selected"; endif;?>>Right</option>
					<option value="center" <?php if(get_option('adm_gs_top_style') == 'center'): echo "selected"; endif;?>>Center</option>
				</select>
				</td>
				</tr>
				<tr>
				<td>
				<input type="checkbox" name="adm_gs_mop" class="AdtxtBoxCheckbox" value="<?php _e('1','infotheme');?>" <?php if(get_option('adm_gs_mop')): echo "checked='yes'";  endif;?>/><?php _e( 'Middle Of Post Assign','infotheme' ); ?>
				</td>
				<td>
				<select class="AdtxtBoxSelect" name="adm_gs_mop_ad" <?php if(!get_option('adm_gs_mop')){ echo "disabled";}?>>
						<?php for($i=1; $i<=3; $i++):?>
						<option value="ad<?php echo $i;?>" <?php if(get_option('adm_gs_mop_ad') == 'ad'.$i): echo "selected"; endif;?>><?php echo "Ad Code ".$i;?></option>
						<?php endfor;?>
					</select>
				</td>
				<td>
				<select class="AdtxtBoxSelect" name="adm_gs_mop_style" <?php if(!get_option('adm_gs_mop_style')){ echo "disabled";}?>>
					<option>Ad Alignment</option>
					<option value="left" <?php if(get_option('adm_gs_mop_style') == 'left'): echo "selected"; endif;?>>Left</option>
					<option value="right" <?php if(get_option('adm_gs_mop_style') == 'right'): echo "selected"; endif;?>>Right</option>
					<option value="center" <?php if(get_option('adm_gs_mop_style') == 'center'): echo "selected"; endif;?>>Center</option>
				</select>
				</td>
				</tr>
				<tr>
				<td>
				<input type="checkbox" name="adm_gs_eop" class="AdtxtBoxCheckbox" value="<?php _e('1','infotheme');?>" <?php if(get_option('adm_gs_eop')): echo "checked='yes'";  endif;?>/><?php _e( 'End Of Post Assign','infotheme' ); ?>
				</td>
				<td>
					<select class="AdtxtBoxSelect" name="adm_gs_eop_ad" <?php if(!get_option('adm_gs_eop')){ echo "disabled";}?>>
						<?php for($i=1; $i<=3; $i++):?>
						<option value="ad<?php echo $i;?>" <?php if(get_option('adm_gs_eop_ad') == 'ad'.$i): echo "selected"; endif;?>><?php echo "Ad Code ".$i;?></option>
						<?php endfor;?>
					</select>
				</td>
				<td>
				<select class="AdtxtBoxSelect" name="adm_gs_eop_style" <?php if(!get_option('adm_gs_eop_style')){ echo "disabled";}?>>
					<option>Ad Alignment</option>
					<option value="left" <?php if(get_option('adm_gs_eop_style') == 'left'): echo "selected"; endif;?>>Left</option>
					<option value="right" <?php if(get_option('adm_gs_eop_style') == 'right'): echo "selected"; endif;?>>Right</option>
					<option value="center" <?php if(get_option('adm_gs_eop_style') == 'center'): echo "selected"; endif;?>>Center</option>
				</select>
				</td>
				</tr>
				<tr>
				<td>
				<input type="checkbox" name="adm_gs_afp" class="AdtxtBoxCheckbox" value="<?php _e('1','infotheme');?>" <?php if(get_option('adm_gs_afp')): echo "checked='yes'";  endif;?>/><?php _e( 'After First Paragraph Assign','infotheme' );?>
				</td>
				<td>
					<select class="AdtxtBoxSelect" name="adm_gs_afp_ad" <?php if(!get_option('adm_gs_afp')){ echo "disabled";}?>>
						<?php for($i=1; $i<=3; $i++):?>
						<option value="ad<?php echo $i;?>" <?php if(get_option('adm_gs_afp_ad') == 'ad'.$i): echo "selected"; endif;?>><?php echo "Ad Code ".$i;?></option>
						<?php endfor;?>
					</select>
				</td>
				<td>
				<select class="AdtxtBoxSelect" name="adm_gs_afp_style" <?php if(!get_option('adm_gs_afp_style')){ echo "disabled";}?>>
					<option>Ad Alignment</option>
					<option value="left" <?php if(get_option('adm_gs_afp_style') == 'left'): echo "selected"; endif;?>>Left</option>
					<option value="right" <?php if(get_option('adm_gs_afp_style') == 'right'): echo "selected"; endif;?>>Right</option>
					<option value="center" <?php if(get_option('adm_gs_afp_style') == 'center'): echo "selected"; endif;?>>Center</option>
				</select>
				</td>
				</tr>
				<tr>
				<td>
				<input type="checkbox" name="adm_gs_afi" class="AdtxtBoxCheckbox" value="<?php _e('1','infotheme');?>" <?php if(get_option('adm_gs_afi')): echo "checked='yes'";  endif;?>/><?php _e( 'After First Image Assign','infotheme' ); ?>
				</td>
				<td>
					<select class="AdtxtBoxSelect" name="adm_gs_afi_ad" <?php if(!get_option('adm_gs_afi')){ echo "disabled";}?>>
						<?php for($i=1; $i<=3; $i++):?>
						<option value="ad<?php echo $i;?>" <?php if(get_option('adm_gs_afi_ad') == 'ad'.$i): echo "selected"; endif;?>><?php echo "Ad Code ".$i;?></option>
						<?php endfor;?>
					</select>
				</td>
				<td>
				<select class="AdtxtBoxSelect" name="adm_gs_afi_style" <?php if(!get_option('adm_gs_afi_style')){ echo "disabled";}?>>
					<option>Ad Alignment</option>
					<option value="left" <?php if(get_option('adm_gs_afi_style') == 'left'): echo "selected"; endif;?>>Left</option>
					<option value="right" <?php if(get_option('adm_gs_afi_style') == 'right'): echo "selected"; endif;?>>Right</option>
					<option value="center" <?php if(get_option('adm_gs_afi_style') == 'center'): echo "selected"; endif;?>>Center</option>
				</select>
				</td>
				</tr>
				<tr>
				<td>
				<input type="checkbox" name="adm_gs_bfi" class="AdtxtBoxCheckbox" value="<?php _e('1','infotheme');?>" <?php if(get_option('adm_gs_bfi')): echo "checked='yes'";  endif;?>/><?php _e( 'Before First Image Assign','infotheme' ); ?>
				</td>
				<td>
					<select class="AdtxtBoxSelect" name="adm_gs_bfi_ad" <?php if(!get_option('adm_gs_bfi')){ echo "disabled";}?>>
						<?php for($i=1; $i<=3; $i++):?>
						<option value="ad<?php echo $i;?>" <?php if(get_option('adm_gs_bfi_ad') == 'ad'.$i): echo "selected"; endif;?>><?php echo "Ad Code ".$i;?></option>
						<?php endfor;?>
					</select>
				</td>
				<td>
				<select class="AdtxtBoxSelect" name="adm_gs_bfi_style" <?php if(!get_option('adm_gs_bfi_style')){ echo "disabled";}?>>
					<option>Ad Alignment</option>
					<option value="left" <?php if(get_option('adm_gs_bfi_style') == 'left'): echo "selected"; endif;?>>Left</option>
					<option value="right" <?php if(get_option('adm_gs_bfi_style') == 'right'): echo "selected"; endif;?>>Right</option>
					<option value="center" <?php if(get_option('adm_gs_bfi_style') == 'center'): echo "selected"; endif;?>>Center</option>
				</select>
				</td>
				</tr>
				<tr>
				<td>
				<input type="checkbox" name="adm_gs_blp" class="AdtxtBoxCheckbox" value="<?php _e('1','infotheme');?>" <?php if(get_option('adm_gs_blp')): echo "checked='yes'";  endif;?>/><?php _e( 'Before Last Paragraph Assign','infotheme' ); ?>
				</td>
				<td>
					<select class="AdtxtBoxSelect" name="adm_gs_blp_ad" <?php if(!get_option('adm_gs_blp')){ echo "disabled";}?>>
						<?php for($i=1; $i<=3; $i++):?>
						<option value="ad<?php echo $i;?>" <?php if(get_option('adm_gs_blp_ad') == 'ad'.$i): echo "selected"; endif;?>><?php echo "Ad Code ".$i;?></option>
						<?php endfor;?>
					</select>
				</td>
				<td>
				<select class="AdtxtBoxSelect" name="adm_gs_blp_style" <?php if(!get_option('adm_gs_blp_style')){ echo "disabled";}?>>
					<option>Ad Alignment</option>
					<option value="left" <?php if(get_option('adm_gs_blp_style') == 'left'): echo "selected"; endif;?>>Left</option>
					<option value="right" <?php if(get_option('adm_gs_blp_style') == 'right'): echo "selected"; endif;?>>Right</option>
					<option value="center" <?php if(get_option('adm_gs_blp_style') == 'center'): echo "selected"; endif;?>>Center</option>
				</select>
				</td>
				</tr>
				</tbody>
				</table>
			</div>
		</div>
		
		<div id="adm_adsrow">
			<div id="label"><?php _e( 'Ad Exclude By Post Id(eg: 1,5,6)','infotheme' ); ?></div>
				<div id="AdtxtBox">
					<input type="text" name="adm_gs_p_exclue" value="<?php _e( esc_attr(get_option('adm_gs_p_exclue')),'infotheme' );?>"/>
				</div>
		</div>
		
		<div id="adm_adsrow">
			<div id="label"><?php _e( 'Ad Exclude By Author','infotheme' ); ?></div>
				<div id="AdtxtBox">
					<select name="adm_gs_a_exclue">
					<option>Select Author</option>
					<?php $abm_AuthorData = get_users();
						foreach($abm_AuthorData as $abm_Author):
					?>
					<option value="<?php _e($abm_Author->ID,'infotheme');?>" <?php if(get_option('adm_gs_a_exclue') == $abm_Author->ID) echo "selected";?>><?php _e($abm_Author->display_name,'infotheme');?></option>
					<?php endforeach;?>
					</select>
					</div>
		</div>
		
		<div id="adm_adsrow">
			<div id="label"><?php _e( 'Appearance In Pages','infotheme' ); ?></div>
				<div id="AdtxtBox">
					<input type="checkbox" name="abm_appearance_check_page" value="<?php _e('1','infotheme');?>" <?php if(get_option('abm_appearance_check_page')) echo "checked";?>/>Pages
					<input type="checkbox" name="abm_appearance_check_post" value="<?php _e('1','infotheme');?>" <?php if(get_option('abm_appearance_check_post')) echo "checked";?>/>Posts
					<input type="checkbox" name="abm_appearance_check_cat" value="<?php _e('1','infotheme');?>" <?php if(get_option('abm_appearance_check_cat')) echo "checked";?>/>Categories
					<input type="checkbox" name="abm_appearance_check_archive" value="<?php _e('1','infotheme');?>" <?php if(get_option('abm_appearance_check_archive')) echo "checked";?>/>Archive
					<input type="checkbox" name="abm_appearance_check_home" value="<?php _e('1','infotheme');?>" <?php if(get_option('abm_appearance_check_home')) echo "checked";?>/>Homepage
				</div>
		</div>
		
		
	</div>
		
		<?php submit_button(); ?>

	</form>
	<?php include_once("global/footer.php"); ?>
	</div>