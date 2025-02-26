<?php
	require_once('js/main_js.php');
	require_once('js/chitika_ads_js.php');
	$network = getNetwork($_GET['page']); //stdClass Object ( [slug] => awesome_chitika_ads [name] => chitika Adsense [active] => no [last_edit] => 2011-05-09 )
	$values = json_decode(get_option('awesome_ads_chitika_json'));
	$chitika_users = json_decode(get_option('awesome_ads_users_chitika'));
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) {return;}
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="wrap">
	<div class="icon32" id="icon-edit"><br></div>
	<h2><?php echo NAME; echo ' - '; _e('chitika Adsense Settings','awesome_ads'); ?></h2>
	
	<form enctype="multipart/form-data" id="awesome_chitika_ads" method="post" action="" name="awesome_chitika_ads">
	
		<div class="metabox-holder has-right-sidebar" id="poststuff">
		  
			<div class="inner-sidebar" id="side-info-column">
				<div class="meta-box-sortables ui-sortable" id="side-sortables">
				  
					<div class="postbox" id="advman_submit">
						<div title="<?php _e('Click to toggle','awesome_ads'); ?>" class="handlediv"><br></div>
						<h3 class="hndle"><span><?php _e('Save Settings','awesome_ads'); ?></span></h3>
						<div class="inside">			
							<div class="misc-pub-section curtime">
								<span id="timestamp"><?php _e('Last edited:','awesome_ads'); ?> <b><?php echo $values->last_edit; ?></b></span>
							</div>
							<div class="misc-pub-section fb-like" data-href="http://wordpress.org/extend/plugins/awesome-ads/" data-send="true" data-width="250" data-show-faces="false"></div>
							<div style="text-align:right;padding:5px 3px 0px 0px;">
								<span class="submit" id="save_chitika_loader" style="display:none">
									<img src="/wp-admin/images/wpspin_light.gif"> <?php _e('Wait','awesome_ads');?>...
								</span>
								<input class="button-primary" type="button" value="<?php _e('Save Changes','awesome_ads');?>" id="save_chitika"> 
							</div>
						</div><!-- End Inside -->
					</div><!-- End PostBox -->
				  
					<div class="postbox" id="awesome_ads_chitika_account">
						<div title="<?php _e('Click to toggle','awesome_ads'); ?>" class="handlediv"><br></div>
						<h3 class="hndle"><span><?php _e('Display Settings','awesome_ads'); ?></span></h3>
						<div class="inside">
							<div style="font-size:small;">
								<table class="form-table">
									<tr>
										<td><?php _e('Ad Placement:','awesome_ads'); ?></td>
										<td>
											<select name="awesome_ads_chitika_positioning" id="awesome_ads_chitika_positioning">
												<option value="center" <?php if($values->awesome_ads_chitika_positioning == 'center') echo "selected='selected'" ?>><?php _e( 'Center' , 'best-chitika-adsense' );?></option>
												<option value="left" <?php if($values->awesome_ads_chitika_positioning == 'left') echo "selected='selected'" ?>><?php _e( 'Left' , 'best-chitika-adsense' );?></option>
												<option value="right" <?php if($values->awesome_ads_chitika_positioning == 'right') echo "selected='selected'" ?>><?php _e( 'Right' , 'best-chitika-adsense' );?></option>
												<option value="top-center" <?php if($values->awesome_ads_chitika_positioning == 'top-center') echo "selected='selected'" ?>><?php _e( 'Top/Center' , 'best-chitika-adsense' );?></option>
												<option value="top-left" <?php if($values->awesome_ads_chitika_positioning == 'top-left') echo "selected='selected'" ?>><?php _e( 'Top/Left' , 'best-chitika-adsense' );?></option>
												<option value="top-right" <?php if($values->awesome_ads_chitika_positioning == 'top-right') echo "selected='selected'" ?>><?php _e( 'Top/Right' , 'best-chitika-adsense' );?></option>
												<option value="bottom-center" <?php if($values->awesome_ads_chitika_positioning == 'bottom-center') echo "selected='selected'" ?>><?php _e( 'Bottom/Center' , 'best-chitika-adsense' );?></option>
												<option value="bottom-left" <?php if($values->awesome_ads_chitika_positioning == 'bottom-left') echo "selected='selected'" ?>><?php _e( 'Bottom/Left' , 'best-chitika-adsense' );?></option>
												<option value="bottom-right" <?php if($values->awesome_ads_chitika_positioning == 'bottom-right') echo "selected='selected'" ?>><?php _e( 'Bottom/Right' , 'best-chitika-adsense' );?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td ><?php _e('Ads in Home:','awesome_ads'); ?></td>
										<td><input type="checkbox" class='radio_style' <?php if($values->awesome_ads_chitika_home == 'on') echo "checked='checked'" ?> id="awesome_ads_chitika_home" name="awesome_ads_chitika_home" /></td>
									</tr>
									<tr>
										<td><?php _e('Ads in Posts:','awesome_ads'); ?></td>
										<td><input type="checkbox" class='radio_style' <?php if($values->awesome_ads_chitika_posts == 'on') echo "checked='checked'" ?> id="awesome_ads_chitika_posts" name="awesome_ads_chitika_posts" /></td>
									</tr>
									<tr>
										<td><?php _e('Ads in Pages :','awesome_ads'); ?></td>
										<td><input type="checkbox" class='radio_style' <?php if($values->awesome_ads_chitika_pages == 'on') echo "checked='checked'" ?> id="awesome_ads_chitika_pages" name="awesome_ads_chitika_pages" /></td>
									</tr>
									<tr>
										<td><?php _e( '# of ads in Posts' , 'best-chitika-adsense' );?></td>
										<td>
											<select id='awesome_ads_chitika_number_ads_posts' name='awesome_ads_chitika_number_ads_posts' >
												<option value="1" <?php if($values->awesome_ads_chitika_number_ads_posts == 1) echo "selected='selected'" ?>>1</option>
												<option value="2" <?php if($values->awesome_ads_chitika_number_ads_posts == 2) echo "selected='selected'" ?>>2</option>
												<option value="3" <?php if($values->awesome_ads_chitika_number_ads_posts == 3) echo "selected='selected'" ?>>3</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><?php _e( '# of ads in Pages' , 'best-chitika-adsense' );?></td>
										<td>
											<select id='awesome_ads_chitika_number_ads_pages' name='awesome_ads_chitika_number_ads_pages' >
												<option value="1" <?php if($values->awesome_ads_chitika_number_ads_pages == 1) echo "selected='selected'" ?>>1</option>
												<option value="2" <?php if($values->awesome_ads_chitika_number_ads_pages == 2) echo "selected='selected'" ?>>2</option>
												<option value="3" <?php if($values->awesome_ads_chitika_number_ads_pages == 3) echo "selected='selected'" ?>>3</option>
											</select>
										</td>
									</tr>
								</table>
							</div><!-- End small -->	
						</div><!-- End Inside -->
					</div><!-- end postbox -->
				  
					<div class="postbox" id="">
						<div title="<?php _e('Click to toggle','awesome_ads'); ?>" class="handlediv"><br></div>
						<h3 class="hndle"><span><?php _e('Notes','awesome_ads'); ?></span></h3>
						<div class="inside">
							<label for=""><?php _e('Any notes about this Network:','awesome_ads'); ?></label><br>
							<br>
							<textarea name="awesome_ads_chitika_notes" cols="28" rows="8" id="awesome_ads_chitika_notes"><?php echo awesome_utf8_urldecode($values->awesome_ads_chitika_notes); ?></textarea><br>
						</div><!-- End Inside -->
					</div><!-- End PostBox -->
				  
					<div class="postbox" id="set_donation_box" style="display:none">
						<div title="<?php _e('Click to toggle','awesome_ads'); ?>" class="handlediv"><br></div>
						<h3 class="hndle"><span><?php _e('Donation','awesome_ads'); ?></span></h3>
						<div class="inside">
							<table>
								<tr>
									<td>
										<div class="field_label"><?php _e('Donation','awesome_ads');?></div>
									</td>
									<td valign="top">
										<input type="text" id="awesome_ads_chitika_donation_percent" name="awesome_ads_chitika_donation_percent" size="3" value="<?php echo  $values->awesome_ads_chitika_donation_percent;?>"/> %
									</td>
								</tr>
							</table>
							<p style="font-size:x-small; color:gray;"><?php _e('The default donation rate is 5%. To disable the donation system fill in 0%.','awesome_ads');?></p>
						</div><!-- End Inside -->
					</div><!-- End PostBox -->
				  
					<input class="button" type="button" value="<?php _e('Set Donation','awesome_ads'); ?>" id="set_donation" style="padding:1px 3px;">
				  
				</div>
			</div><!-- side-info-column -->
		  
		  
			<div class="has-sidebar" id="post-body">
				<div class="has-sidebar-content" id="post-body-content">
				  <div class="meta-box-sortables ui-sortable" id="main-sortables">
					
					<div class="postbox" id="awesome_ads_chitika_account">
						<div title="<?php _e('Click to toggle','awesome_ads'); ?>" class="handlediv"><br></div>
						<h3 class="hndle"><span><?php _e('Display Settings','awesome_ads'); ?></span></h3>
						<div class="inside">
							<div style="font-size:small;">
								<table class="form-table">
									<tbody>
										<tr>
											<td>
												<label for="awesome_ads_status"><?php _e('This network is:','awesome_ads'); ?> </label>
											</td>
											<td>
												<input type="checkbox" class='radio_style' id="awesome_ads_chitika_status" name="awesome_ads_chitika_status" <?php if( $network->active == 'on'){echo 'checked="checked"';} ?> />
											</td>
										</tr>
										<tr>
											<td>
												<label for="awesome_ads_chitika_id"><?php _e('Chitika Username','awesome_ads'); ?></label>
											</td>
											<td>
												<input type="text" id="awesome_ads_chitika_chitika_id"  style="width:200px" name="awesome_ads_chitika_chitika_id" value="<?php echo awesome_utf8_urldecode($values->awesome_ads_chitika_chitika_id); ?>"/>
											</td>
										</tr>
										<tr>
											<td>
												<label for="awesome_ads_chitika_cc"><?php _e('Channel','awesome_ads'); ?></label>
											</td>
											<td>
												<input type="text" id="awesome_ads_chitika_chitika_cc"  style="width:200px" name="awesome_ads_chitika_chitika_cc" value="<?php if($values->awesome_ads_chitika_chitika_cc)echo awesome_utf8_urldecode($values->awesome_ads_chitika_chitika_cc); else echo 'Chitika Default';?>"/>
											</td>
										</tr>
									</tbody>
								</table>
							</div><!-- End small -->
						</div><!-- End Inside -->
					</div><!-- End PostBox -->
					
					<div class="postbox" id="advman_format">
						<div title="<?php _e('Click to toggle','awesome_ads'); ?>" class="handlediv"><br></div>
						<h3 class="hndle"><span><?php _e('Ad Format','awesome_ads'); ?></span></h3>
						<div class="inside">
							<div style="font-size:small;">
								<table class="form-table">
									<tr>
										<td><?php _e('Size','awesome_ads'); ?>: </td>
										<td colspan="2">
											<select name="awesome_ads_chitika_size" id="awesome_ads_chitika_size" >
												<option value="550x250"	<?php if($values->awesome_ads_chitika_size == '550x250') echo "selected='selected'" ?>><?php _e('550 x 250 MEGA-Unit'); ?></option>
												<option value="500x250"	<?php if($values->awesome_ads_chitika_size == '500x250') echo "selected='selected'" ?>><?php _e('500 x 250 MEGA-Unit'); ?></option>
												<option value="728x90"	<?php if($values->awesome_ads_chitika_size == '728x90') echo "selected='selected'" ?>><?php _e('728 x 90 Leaderboard'); ?></option>
												<option value="120x600"	<?php if($values->awesome_ads_chitika_size == '120x600') echo "selected='selected'" ?>><?php _e('120 x 600 Skyscraper'); ?></option>
												<option value="160x600"	<?php if($values->awesome_ads_chitika_size == '160x600') echo "selected='selected'" ?>><?php _e('160 x 600 Wide Skyscraper'); ?></option>
												<option value="468x250"	<?php if($values->awesome_ads_chitika_size == '468x250') echo "selected='selected'" ?>><?php _e('468 x 250 *New!* MEGA-Unit Jr.'); ?></option>
												<option value="468x180"	<?php if($values->awesome_ads_chitika_size == '468x180') echo "selected='selected'" ?>><?php _e('468 x 180 Blog Banner'); ?></option>
												<option value="468x120"	<?php if($values->awesome_ads_chitika_size == '468x120') echo "selected='selected'" ?>><?php _e('468 x 120 Blog Banner'); ?></option>
												<option value="468x90"	<?php if($values->awesome_ads_chitika_size == '468x90') echo "selected='selected'" ?>><?php _e('468 x 90 Small Blog Banner'); ?></option>
												<option value="468x60"	<?php if($values->awesome_ads_chitika_size == '468x60') echo "selected='selected'" ?>><?php _e('468 x 60 Mini Blog Banner'); ?></option>
												<option value="550x120"	<?php if($values->awesome_ads_chitika_size == '550x120') echo "selected='selected'" ?>><?php _e('550 x 120 Content Banner'); ?></option>
												<option value="550x90"	<?php if($values->awesome_ads_chitika_size == '550x90') echo "selected='selected'" ?>><?php _e('550 x 90 Content Banner'); ?></option>
												<option value="450x90"	<?php if($values->awesome_ads_chitika_size == '450x90') echo "selected='selected'" ?>><?php _e('450 x 90 Small Content Banner'); ?></option>
												<option value="430x90"	<?php if($values->awesome_ads_chitika_size == '430x90') echo "selected='selected'" ?>><?php _e('430 x 90 Small Content Banner'); ?></option>
												<option value="400x90"	<?php if($values->awesome_ads_chitika_size == '400x90') echo "selected='selected'" ?>><?php _e('400 x 90 Small Content Banner'); ?></option>
												<option value="300x250"	<?php if($values->awesome_ads_chitika_size == '300x250') echo "selected='selected'" ?>><?php _e('300 x 250 Rectangle'); ?></option>
												<option value="300x150"	<?php if($values->awesome_ads_chitika_size == '300x150') echo "selected='selected'" ?>><?php _e('300 x 150 Rectangle, Wide'); ?></option>
												<option value="300x125"	<?php if($values->awesome_ads_chitika_size == '300x125') echo "selected='selected'" ?>><?php _e('300 x 125 Mini Rectangle, Wide'); ?></option>
												<option value="300x70"	<?php if($values->awesome_ads_chitika_size == '300x70') echo "selected='selected'" ?>><?php _e('300 x 70 Mini Rectangle, Wide'); ?></option>
												<option value="250x250"	<?php if($values->awesome_ads_chitika_size == '250x250') echo "selected='selected'" ?>><?php _e('250 x 250 Square'); ?></option>
												<option value="200x200"	<?php if($values->awesome_ads_chitika_size == '200x200') echo "selected='selected'" ?>><?php _e('200 x 200 Small Square'); ?></option>
												<option value="160x160"	<?php if($values->awesome_ads_chitika_size == '160x160') echo "selected='selected'" ?>><?php _e('160 x 160 Small Square'); ?></option>
												<option value="336x280"	<?php if($values->awesome_ads_chitika_size == '336x280') echo "selected='selected'" ?>><?php _e('336 x 280 Rectangle'); ?></option>
												<option value="336x160"	<?php if($values->awesome_ads_chitika_size == '336x160') echo "selected='selected'" ?>><?php _e('336 x 160 Rectangle, Wide'); ?></option>
												<option value="334x100"	<?php if($values->awesome_ads_chitika_size == '334x100') echo "selected='selected'" ?>><?php _e('334 x 100 Small Rectangle, Wide'); ?></option>
												<option value="180x300"	<?php if($values->awesome_ads_chitika_size == '180x300') echo "selected='selected'" ?>><?php _e('180 x 300 Small Rectangle, Tall'); ?></option>
												<option value="180x150"	<?php if($values->awesome_ads_chitika_size == '180x150') echo "selected='selected'" ?>><?php _e('180 x 150 Small Rectangle'); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<table class="colors_table">
												<tr>
													<th colspan="2" style="padding-left:0px !important;">
														<h3><?php _e('Colors','awesome_ads'); ?>:</h3>
													</th>
												<tr>
												<tr>
													<td style="padding-left:10px;"><?php _e('Background Color','awesome_ads'); ?>:</td>
													<td><input class="color {pickerMode:'HVS'}" value="<?php echo $values->awesome_ads_chitika_background_color;?>" name="awesome_ads_chitika_background_color" id="awesome_ads_chitika_background_color"></td>
												</tr>
												<tr>
													<td style="padding-left:10px;"><?php _e('Border Color','awesome_ads'); ?>:</td>
													<td><input class="color {pickerMode:'HVS'}" value="<?php echo $values->awesome_ads_chitika_border_color;?>" name="awesome_ads_chitika_border_color" id="awesome_ads_chitika_border_color"></td>
												</tr>
												
												<tr>
													<td style="padding-left:10px;"><?php _e('Text Color','awesome_ads'); ?>:</td>
													<td><input class="color {pickerMode:'HVS'}" value="<?php echo $values->awesome_ads_chitika_text_color;?>" name="awesome_ads_chitika_text_color" id="awesome_ads_chitika_text_color"></td>
												</tr>
												<tr>
													<td style="padding-left:10px;"><?php _e('Url Color','awesome_ads'); ?>:</td>
													<td><input class="color {pickerMode:'HVS'}" value="<?php echo $values->awesome_ads_chitika_url_color;?>" name="awesome_ads_chitika_url_color" id="awesome_ads_chitika_url_color"></td>
												</tr>
											</table>
										</td>
									</tr>
									
								</table>
							</div><!-- End small -->
						</div><!-- End Inside -->
					</div><!-- End PostBox -->
					
					<div class="postbox" id="">
						<div title="<?php _e('Click to toggle','awesome_ads'); ?>" class="handlediv"><br></div>
						<h3 class="hndle"><span><?php _e('Author Revenue Sharing','awesome_ads'); ?></span> </h3>
						<div class="inside">
							<div style="font-size:x-small;color:gray;">
								<?php _e('This feature can share revenue with the author of the Post. Add the user you want to share and set the rate.','awesome_ads'); ?>
							</div>
							<br/>
							<div style="font-size:small;">
								<table id="chitika_users" class="wp-list-table widefat fixed tags" cellspacing=0 style="width:100% !important;">
									<thead>
									<tr>
										<th class="manage-column column-posts"><?php _e('User','awesome_ads'); ?></th>
										<th class="manage-column column-slug sortable desc"><?php _e('Adsense ID','awesome_ads'); ?></th>
										<th class="manage-column column-slug sortable desc"><?php _e('Custom Channel','awesome_ads'); ?></th>
										<th class="manage-column column-posts"><?php _e('%','awesome_ads'); ?></th>
										<th class="manage-column column-posts"><?php _e('Actions','awesome_ads'); ?></th>
									</tr>
									</thead>
									<tbody>
								  <?php
									$network = 'chitika';
									$authors = get_users_of_blog();
									if($chitika_users){
										foreach($authors as $u){
											if($u->user_id > 1 && in_array($u->user_id, $chitika_users)){
												$name_id_temp = 'awesome_ads_chitika_id_user_'.$u->user_id;
												$name_cc_temp = 'awesome_ads_chitika_cc_user_'.$u->user_id;
												$name_pc_temp = 'awesome_ads_chitika_percent_user_'.$u->user_id;
												echo '<tr class="alternate">
														<td><label for="cc_user_'.$u->user_id.'">'.$u->display_name.'</label></td>
														<td><input type="text" value="'.$values->$name_id_temp.'" name="awesome_ads_chitika_id_user_'.$u->user_id.'" id="awesome_ads_chitika_id_user_'.$u->user_id.'" /></td>
														<td><input type="text" value="'.$values->$name_cc_temp.'" name="awesome_ads_chitika_cc_user_'.$u->user_id.'" id="awesome_ads_chitika_cc_user_'.$u->user_id.'" /></td>
														<td><input type="text" size="3" value="'.$values->$name_pc_temp.'" name="awesome_ads_chitika_percent_user_'.$u->user_id.'" id="awesome_ads_chitika_percent_user_'.$u->user_id.'" /></td>
														<td><img src="/wp-admin/images/wpspin_light.gif" id="delete_user_loader'.$u->user_id.'" class="img_loader"><input class="button" type="button" value="'.__('Delete','awesome_ads').'" id="delete_user_chitika'.$u->user_id.'" style="padding:1px 3px;" onclick="deleteUser('.$u->user_id.',\''.$network.'\');"></td>
													</tr>';
											}
										}
									}
								  ?></tbody>
									<tr style="background:#e6e6e6;">
										<td>
											<select id="add_user_id">
												<option value="0"><?php _e('User ','awesome_ads'); ?></option>
												<?php 
													$authors = get_users_of_blog();
													foreach($authors as $u){
														if($u->user_id>1 && !in_array($u->user_id, $chitika_users)){
															echo '<option value="'.$u->user_id.'">'.$u->display_name.'</option>';
														}
													}
												?>
											</select>
										</td>
										<td><input type="text" id="add_user_ads_id" /></td>
										<td><input type="text" id="add_user_cc_id" /></td>
										<td><input type="text" size="3" value="100" id="add_user_percent"/></td>
										<td><img src="/wp-admin/images/wpspin_light.gif" id="add_user_loader" class="img_loader"><input class="button" type="button" value="<?php _e('Add','awesome_ads'); ?>" id="add_new_user" style="padding:1px 3px;"></td>
									</tr>
								  </table>
							</div><!-- End small -->
						</div><!-- End Inside -->
					</div><!-- End PostBox -->
					
				  </div>
				</div>
			</div><!-- post-body-content -->
		</div><!-- post-body -->
		<br class="clear">
	</form>
</div><!-- poststuff -->
<style>
.color{
	border:1px solid #ddd;
	width:60px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	text-align:center;
	font-size:10px;
}
.colors_table{width:100%;}
.colors_table td{padding:3px;}
input[type="text"]{
	font-size:x-small;
	color:#444;
}
.img_loader{display:none}
</style>