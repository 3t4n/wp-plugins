<?php 
$id=$post->ID;
$data_setting = unserialize(get_post_meta($id,'GPV_custom_setting_'.$id, true));
if(!(isset($data_setting['GPV_setting_action']) && isset($id))){
	$data_setting = unserialize(get_option('GPV_Default_Setting', true));
} 

function gpvcolorfun($name,$data,$c1,$c2,$c3){
	?>
	<input type="radio" name="<?php echo $name;?>" value="<?php echo $c1;?>" <?php echo($data==$c1)?'checked':''; ?>><span class="gpv-color-radio" style="background:<?php echo $c1; ?>;"></span>
	<input type="radio" name="<?php echo $name;?>" value="<?php echo $c2;?>" <?php echo($data==$c2)?'checked':''; ?>><span class="gpv-color-radio" style="background:<?php echo $c2; ?>;"></span>
	<input type="radio" name="<?php echo $name;?>" value="<?php echo $c3;?>" <?php echo($data==$c3)?'checked':''; ?>><span class="gpv-color-radio" style="background:<?php echo $c3; ?>;"></span>
	<?php
}

?>
<section class="gpv-layout-section">	
	<div class="gpv-layout-container">		
		<input type="radio" id="gallery_1" name="gpv_template" value="gallery1" <?php echo ($data_setting['gpv_template']=='gallery1')?'checked':''; ?>>
		<label for="gallery_1">			
			<img src="<?php echo GPV_URL;?>/images/gallery-1.png" alt="layout image">
			<h3 align="center">Layout 1</h3>
		</label>

		<input class="gpv_box" type="radio" id="gallery_2" name="gpv_template" value="gallery2" disabled>
		<label for="gallery_2" id="gallery_layout_2">
			<div class="gpv_ribbon"><span><a href="https://webdzier.com/plugins/gallery-photo-video-pro/" target="_blank">Get Pro</a></span></div>
			<img src="<?php echo GPV_URL;?>/images/gallery-2.png" alt="layout image">
			<h3 align="center">Layout 2</h3>
		</label>		
	</div>
	
</section>
<section class="GPV-section GPV-setting-section gpv_cfix">	
	<article class="">
		<table class="form-table" >
			<tr class="header-text-row">
				<th colspan="2"><h2 class="header-text"><?php _e( 'Gallery Photo Video Settings', GPV_TEXTDOMAIN ); ?></h2></th>					
			</tr>
		</table>
	</article>

	<section class="GPV_row gpv_cfix">
		<section class="GPV_left_column">			
			<div>
				<ul id="menu_link" style="margin-bottom:10px;">
					<li data-class="title_setting" class="conf"><?php _e( 'Title', GPV_TEXTDOMAIN ); ?></li>
					<li data-class="label_setting" ><?php _e( 'Label', GPV_TEXTDOMAIN ); ?></li>
					<li data-class="button_setting"><?php _e( 'Button', GPV_TEXTDOMAIN ); ?></li>
					<li data-class="image_setting"><?php _e( 'Image', GPV_TEXTDOMAIN ); ?></li>					
					<li data-class="container_setting"><?php _e( 'Gallery', GPV_TEXTDOMAIN ); ?></li>
					<li data-class="hover_effect"><?php _e( 'Hover Effect', GPV_TEXTDOMAIN ); ?></li>
					<li data-class="description_setting"><?php _e( 'Description', GPV_TEXTDOMAIN ); ?></li>											
					<li data-class="other_section"><?php _e( 'Other Setting', GPV_TEXTDOMAIN ); ?></li>								
					<li data-class="css_custom"><?php _e( 'Css Customize', GPV_TEXTDOMAIN ); ?></li>
					<li data-class="pro_features"><?php _e( 'Pro Features', GPV_TEXTDOMAIN ); ?></li>													
				</ul>			
			</div>
		</section>

		<section class="GPV_right_column">
			<form>
				<!--title_setting start-->
				<div class="GPV_setting_container title_setting">
					<input type="hidden" name="GPV_setting_action" value="getaction">										
					<table class="form-table" >
						<tr>
							<th><label><?php _e( 'Show Title  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td> 
								<input type="checkbox" name="GPV_setting_title" value="Yes" <?php echo ($data_setting['GPV_setting_title']=='Yes')?'checked':''; ?>>						
								<p class="description"><?php _e( 'Choose Option for hide/show Gallery Photo Video Title.', GPV_TEXTDOMAIN ); ?></p>
							</td>
						</tr>

						<tr class="title_property">
							<th><label><?php _e( 'Title Align :', GPV_TEXTDOMAIN ); ?></label></th>
							<td> 
								<input type="radio" name="GPV_setting_title_position" value="left" <?php echo ($data_setting['GPV_setting_title_position']=='left')?'checked':''; ?>><span><?php _e( 'Left', GPV_TEXTDOMAIN ); ?></span>
								<input type="radio" name="GPV_setting_title_position" value="center" disabled><span><?php _e( 'Center', GPV_TEXTDOMAIN ); ?></span>
								<input type="radio" name="GPV_setting_title_position" value="right" disabled><span><?php _e( 'Right', GPV_TEXTDOMAIN ); ?></span>
								<p class="description"><?php _e( 'Choose Option for Gallery Photo Video Title Position.', GPV_TEXTDOMAIN ); ?></p>
							</td>
						</tr>
						<tr class="title_property">
							<th><label><?php _e( 'Title Color  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>								
								<?php
								$name="GPV_setting_title_color"; $data=$data_setting['GPV_setting_title_color'];
								$c1="#3d3d3d";$c2="#1e73be";$c3="#dd3333";
								gpvcolorfun($name,$data,$c1,$c2,$c3);
								?>
								<p class="description">
									<?php printf( __('Choose any color to apply on Gallery Title. <a href="%s">Pro Version</a>',
									GPV_TEXTDOMAIN),pro_version_link); ?>
								</p>
							</td>
						</tr>	
					</table>					
				</div>
				<!--title_setting end-->

				<!--label_setting-->		
				<div class="GPV_setting_container label_setting">								
					<table class="form-table" >
						<tr>
							<th><label><?php _e( 'Show Label  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td> 
								<input type="checkbox" name="GPV_setting_label" value="Yes" <?php echo ($data_setting['GPV_setting_label']=='Yes')?'checked':''; ?>>						
								<p class="description"><?php _e( 'Select for hide/show Gallery All Images Label.', GPV_TEXTDOMAIN ); ?></p>
							</td>
						</tr>

						<tr class="label_property">
							<th><label><?php _e( 'Label Align :', GPV_TEXTDOMAIN ); ?></label></th>
							<td> 
								<input type="radio" name="GPV_setting_label_position" value="left" <?php echo ($data_setting['GPV_setting_label_position']=='left')?'checked':''; ?>><span><?php _e( 'Left', GPV_TEXTDOMAIN ); ?></span>
								<input type="radio" name="GPV_setting_label_position" value="center" <?php echo ($data_setting['GPV_setting_label_position']=='center')?'disabled':'disabled'; ?>><span><?php _e( 'Center', GPV_TEXTDOMAIN ); ?></span>
								<input type="radio" name="GPV_setting_label_position" value="right" <?php echo ($data_setting['GPV_setting_label_position']=='right')?'disabled':'disabled'; ?>><span><?php _e( 'Right', GPV_TEXTDOMAIN ); ?></span>
								<p class="description"><?php _e( 'Choose Option for Images label Align.', GPV_TEXTDOMAIN ); ?></p>
							</td>
						</tr>
						<tr class="label_property">
							<th><label><?php _e( 'Label Color  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>				
								
								<input type="text" value="#000000" class="GPV-color-field" data-default-color="#000000" disabled/>
								<p class="description"><?php printf( __('Choose any color to apply on images Label. <a href="%s">Pro Version</a>',
								GPV_TEXTDOMAIN),pro_version_link); ?></p>
							</td>
						</tr>
					</table>					
				</div><!--label_setting end-->

				<!--button_setting start-->
				<div class="GPV_setting_container button_setting">					
					<table class="form-table">
						<tr>
							<th><label><?php _e( 'Button Position :', GPV_TEXTDOMAIN ); ?></label></th>
							<td> 
								<input type="radio" name="GPV_setting_button_position" value="left" <?php echo ($data_setting['GPV_setting_button_position']=='left')?'checked':''; ?>><span><?php _e( 'Left', GPV_TEXTDOMAIN ); ?></span>
								<input type="radio" name="GPV_setting_button_position" value="right" <?php echo ($data_setting['GPV_setting_button_position']=='right')?'disabled':'disabled'; ?>><span><?php _e( 'Right', GPV_TEXTDOMAIN ); ?></span>
								<p class="description"><?php _e( 'Choose Option for Button Position.', GPV_TEXTDOMAIN ); ?></p>
							</td>
						</tr>						
						<tr>
							<th><label><?php _e( 'Button Text Color  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>								
								<?php
								$name="GPV_setting_button_text_color"; $data=$data_setting['GPV_setting_button_text_color'];
								$c1="#DDD";$c2="#1e73be";$c3="#333333";
								gpvcolorfun($name,$data,$c1,$c2,$c3);
								?>
								<p class="description"><?php _e( 'Choose any color to apply on button Text.', GPV_TEXTDOMAIN ); ?></p>
							</td>
						</tr>
						<tr>
							<th><label><?php _e( 'Button Border Color  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>
								<?php
								$name="GPV_setting_button_border_color"; $data=$data_setting['GPV_setting_button_border_color'];
								$c1="#DDD";$c2="#1e73be";$c3="#333333";
								gpvcolorfun($name,$data,$c1,$c2,$c3);
								?>
								<p class="description">	<?php _e( 'Choose any color to apply on button border.', GPV_TEXTDOMAIN ); ?></p>
							</td>
						</tr>
						<tr>
							<th><label><?php _e( 'Button BG Color  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>								
								<?php
								$name="GPV_setting_button_background_color"; $data=$data_setting['GPV_setting_button_background_color'];
								$c1="#cdcdcd";$c2="#1e73be";$c3="#333333";
								gpvcolorfun($name,$data,$c1,$c2,$c3);
								?>
								<p class="description">	<?php _e( 'Choose any color to apply on button Background.', GPV_TEXTDOMAIN ); ?></p>
							</td>
						</tr>
					</table>

				</div>
				<!--button_setting start-->

				<!--description_setting start-->
				<div class="GPV_setting_container description_setting">					
					<table class="form-table">
						<tr>
							<th><label><?php _e( 'Show Description  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td> 
								<input type="checkbox" name="GPV_setting_description" value="Yes" <?php echo ($data_setting['GPV_setting_description']=='Yes')?'checked':''; ?>>						
								<p class="description"><?php _e( 'Choose Option for hide/show <b>Gallery</b> All Images Description.', GPV_TEXTDOMAIN ); ?></p>
							</td>
						</tr>
						<tr class="description_property">
							<th><label><?php _e( 'Description Text Color  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>

								<?php
								$name="GPV_setting_description_text_color"; $data=$data_setting['GPV_setting_description_text_color'];
								$c1="#cdcdcd";$c2="#1e73be";$c3="#3f3f3f";
								gpvcolorfun($name,$data,$c1,$c2,$c3);
								?>
								<p class="description">	<?php _e( 'Choose any color to apply on Images Description Text.', GPV_TEXTDOMAIN ); ?></p>
							</td>
						</tr>
						<tr class="description_property">
							<th><label><?php _e( 'Description Word :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>
								<input type="number" name="GPV_setting_description_char" value="<?php echo $data_setting['GPV_setting_description_char']; ?>" style="padding:6px; width:62%;">
								<button class="GPV_dafult_char button button-primary"><?php _e( 'Default', GPV_TEXTDOMAIN ); ?></button>											
								<p class="description des_char_class">
									<?php printf( __('Enter Max 400 word. <a href="%s">Pro Version</a>',
									GPV_TEXTDOMAIN),pro_version_link); ?>
								</p>
							</td>
						</tr>
					</table>

				</div>
				<!--description_setting start-->

				<!--image_setting start-->
				<div class="GPV_setting_container image_setting">					
					<table class="form-table">
						<tr>
							<th><label><?php _e( 'Image Layout  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td> 
								<input type="radio" name="GPV_setting_image_layout" value="cir" <?php echo ($data_setting['GPV_setting_image_layout']=='cir')?'checked':''; ?>><span style=""><?php _e( 'Circle', GPV_TEXTDOMAIN ); ?></span>
								<input type="radio" name="GPV_setting_image_layout" value="rec" <?php echo ($data_setting['GPV_setting_image_layout']=='rec')?'checked':''; ?>><span><?php _e( 'Rectangle', GPV_TEXTDOMAIN ); ?></span>					
							</td>
						</tr>						
						<tr>
							<th><label><?php _e( 'Image Open BG Color  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>								
								<?php
								$name="GPV_setting_open_img_background_color"; $data=$data_setting['GPV_setting_open_img_background_color'];
								$c1="#e5e5e5";$c2="#1e73be";$c3="#dd3333";
								gpvcolorfun($name,$data,$c1,$c2,$c3);
								?>
								<p class="description"><?php _e( 'Choose any color to apply on image open container background.', GPV_TEXTDOMAIN ); ?></p>
							</td>
						</tr>
						<tr>
							<th><label><?php _e( 'Image Border Show  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>
								<input type="checkbox" name="GPV_setting_img_border_show" value="Yes" <?php echo ($data_setting['GPV_setting_img_border_show']=='Yes')?'checked':''; ?>>						
								<p class="description">
									<?php _e( 'Choose Option for hide/show image border.', GPV_TEXTDOMAIN ); ?>
								</p>
							</td>
						</tr>
						<tr class="image_property">
							<th><label><?php _e( 'Image Border Size  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>
								<select name="GPV_setting_img_border_size" id="GPV_setting_img_border_size">
									<?php 
									for ($i=1; $i <=5 ; $i++) { 
										?>
										<option value="<?php echo $i; ?>" <?php echo selected($data_setting['GPV_setting_img_border_size'],$i); echo($i==1 || $i==2)?'':'disabled'; ?> ><?php echo $i; ?></option>
										<?php
									}
									?>
								</select>	
								<p class="description"><?php _e( 'Select image border Size.', GPV_TEXTDOMAIN ); ?>	</p>
							</td>
						</tr>
						<tr class="image_property">
							<th><label><?php _e( 'Image Border Color  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>								
								<?php
								$name="GPV_setting_img_border_color"; $data=$data_setting['GPV_setting_img_border_color'];
								$c1="#444444";$c2="#1e73be";$c3="#dd3333";
								gpvcolorfun($name,$data,$c1,$c2,$c3);
								?>
								<p class="description"><?php _e( 'Choose any color to apply on image border.', GPV_TEXTDOMAIN ); ?>
									
								</p>
							</td>
						</tr>							
					</table>
				</div>
				<!--image_setting start-->

				<!--other_section start-->
				<div class="GPV_setting_container other_section">					
					<table class="form-table">
						<tr>
							<th><label><?php _e( 'Show Icon On Image  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>
								<input type="checkbox" name="GPV_setting_icon_open" value="Yes" <?php echo ($data_setting['GPV_setting_icon_open']=='Yes')?'checked':''; ?>>
								<p class="description"><?php _e( 'Choose Option for Show icon on image.', GPV_TEXTDOMAIN ); ?></p>
							</td>								
						</tr>
						<tr>
							<th><label><?php _e( 'Link Open New Tab  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td> 
								<input type="checkbox" name="GPV_setting_link_open" value="Yes" <?php echo ($data_setting['GPV_setting_link_open']=='Yes')?'checked':''; ?>>						
								<p class="description"><?php _e( 'Choose Option for Link open New Tab OR Same Tab .', GPV_TEXTDOMAIN ); ?></p>
							</td>
						</tr>
						<tr>
							<th><label><?php _e( 'Close Icon Color  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td>

								<?php
								//$name="GPV_setting_close_icon_color"; $data=$data_setting['GPV_setting_close_icon_color'];
								//$c1="#888";$c2="#1e73be";$c3="#dd3333";
								//gpvcolorfun($name,$data,$c1,$c2,$c3);
								?>
								<input type="#888" class="GPV-color-field" value="#888" data-default-color="#888" disabled/>
								<p class="description"><?php printf( __('Choose any color to apply on Close icon. <a href="%s" target="_blank">Pro Version</a>',
								GPV_TEXTDOMAIN), pro_version_link); ?></p>
								
							</td>
						</tr>	
						<tr>				
							<th><label><?php _e( 'Lightbox  :', GPV_TEXTDOMAIN ); ?></label></th>
							<td> 
								<?php $light_box=array('Swipe_Box','Nivo_Box','Pretty_Photo','Fancy_Box'); ?>					
								<select name="GPV_setting_lightbox">
									<optgroup label="select">
										<?php 
										foreach( $light_box as $ligntbox){
											?>
											<option value="<?php echo $ligntbox;?>" <?php selected($data_setting['GPV_setting_lightbox'],$ligntbox); echo($ligntbox=='Swipe_Box')?'':'disabled'; ?>><?php echo ucfirst(trim(str_replace('_', " ", $ligntbox)));?></option>
											<?php
										}
										?>
									</optgroup>
								</select>
								<p class="description">
									<p class="description">
										<?php printf( __('Choose Lightbox. <a href="%s" target="_blank">Pro Version</a>',
										GPV_TEXTDOMAIN), pro_version_link); ?>
									</p>									 
								</td>
							</tr>						
							<tr>				
								<th><label><?php _e( 'Font Style  :', GPV_TEXTDOMAIN ); ?></label></th>
								<td> 					
									<select name="GPV_setting_font_style">
										<optgroup label="select">
											<?php 
											$font_deault=array('Theme Font','Arial','_arial_black','Courier New','georgia','grande','_helvetica_neue','_impact','_lucida','_OpenSansBold','_palatino','_sans','Sans-Serif','_tahoma','_times','_trebuchet','_verdana');

											foreach($font_deault as $val){
												?>
												<option value="<?php if($val=='Theme Font'){echo 'inherit';}else{echo $val;} ?>" <?php selected($data_setting['GPV_setting_font_style'],$val) ?>><?php echo ucfirst(trim(str_replace('_', " ", $val)));?></option>
												<?php
											}										
											?>
										</optgroup>
									</select>
									<p class="description">
										<?php printf( __('Choose Font Style. <a href="%s" target="_blank">Pro Version</a>',
										GPV_TEXTDOMAIN), pro_version_link); ?>										 
									</td>
								</tr>
								<tr>				
									<th><label><?php _e( 'Column Layout  :', GPV_TEXTDOMAIN ); ?></label></th>
									<td> 					
										<select name="GPV_setting_column_layout">
											<optgroup label="select">
												<?php 
												for($i=1; $i<=10; $i++){
													?>
													<option value="<?php echo $i;?>" <?php selected($data_setting['GPV_setting_column_layout'],$i); echo($i>=5)?'disabled':''; ?> >Column Layout <?php echo $i; ?></option>
													<?php
												}
												?>
											</optgroup>
										</select>
										<p class="description">
											<?php printf( __('Choose Column Layout. <a href="%s" target="_blank">Pro Version</a>',
											GPV_TEXTDOMAIN),pro_version_link); ?>											
										</td>
									</tr>
								</table>

							</div>
							<!--other_section end-->			

							<!--css_custom start-->
							<div class="GPV_setting_container css_custom">					
								<table class="form-table">
									<tr >
										<th scope="row"><label><?php _e( 'Custom CSS :', GPV_TEXTDOMAIN ); ?></label></th>
										<td>
											<textarea  name="GPV_setting_Custom_CSS" style="width:80%;height:100px;"><?php echo $data_setting['GPV_setting_Custom_CSS']; ?></textarea>
											<p class="description">
												<?php _e( 'Enter any custom css you want to apply on this gallery.<br>', GPV_TEXTDOMAIN ); ?>
												<?php _e( 'Note: Please Do Not Use <b>Style</b> Tag With Custom CSS.', GPV_TEXTDOMAIN ); ?>
												
											</p>
										</td>
									</tr>
								</table>
							</div>
							<!--css_custom start-->	

							<!--container_setting start-->
							<div class="GPV_setting_container container_setting">					
								<table class="form-table">
									<tr>
										<th><label><?php _e( 'Gallery BG. Color  :', GPV_TEXTDOMAIN ); ?></label></th>
										<td>								
											<?php
											$name="GPV_setting_container_background_color"; $data=$data_setting['GPV_setting_container_background_color'];
											$c1="#edf1f2";$c2="#1e73be";$c3="#000000";
											gpvcolorfun($name,$data,$c1,$c2,$c3);
											?>
											<p class="description">	<?php _e( 'Choose any color to apply on container background.', GPV_TEXTDOMAIN ); ?></p>
										</td>
									</tr>
									<tr>
										<th><label><?php _e( 'Gallery Open BG. Color  :', GPV_TEXTDOMAIN ); ?></label></th>
										<td>								
											<?php
											$name="GPV_setting_container_open_color"; $data=$data_setting['GPV_setting_container_open_color'];
											$c1="#edf1f2";$c2="#1e73be";$c3="#000000";
											gpvcolorfun($name,$data,$c1,$c2,$c3);
											?>
											<p class="description">	<?php _e( 'Choose any color to apply on container Open background.', GPV_TEXTDOMAIN ); ?></p>
										</td>
									</tr>
								</table>
							</div>
							<!--container_setting start-->

							<!--hover_effect start-->
							<div class="GPV_setting_container hover_effect">					
								<table class="form-table">	
									<tr>
										<th><label><?php _e( 'Show Hover Effect  :', GPV_TEXTDOMAIN ); ?></label></th>
										<td> 
											<input type="checkbox" name="GPV_setting_hover_effect_show" value="Yes" <?php echo ($data_setting['GPV_setting_hover_effect_show']=='Yes')?'checked':''; ?>>						
											<p class="description"><?php _e( 'Choose Option for hide/show images Hover Effect.', GPV_TEXTDOMAIN ); ?></p>
										</td>
									</tr>	
									<tr class="hover_property">
										<th><label><?php _e( 'Hover Effect  :', GPV_TEXTDOMAIN ); ?></label></th>
										<td>
											<?php $hover_effect=array('bottom-to-top','top-to-bottom','left-to-right','right-to-left','rotate-in','rotate-out','open-up','open-down','open-left','open-right','come-left','come-right'); ?>					
											<select name="GPV_setting_hover_effect">
												<optgroup label="select">
													<?php 
													foreach( $hover_effect as $h_effect){
														?>
														<option value="<?php echo $h_effect;?>" <?php selected($data_setting['GPV_setting_hover_effect'],$h_effect); echo($h_effect=='bottom-to-top' || $h_effect=='top-to-bottom')?'':'disabled'; ?>><?php echo ucfirst(trim(str_replace('-', " ", $h_effect)));?></option>
														<?php
													}
													?>
												</optgroup>
											</select>
											<p class="description">
												<?php printf( __('Choose Hover Effect. <a href="%s" target="_blank">Pro Version</a>',
												GPV_TEXTDOMAIN),pro_version_link); ?>												
											</td>
										</tr>				
										<tr class="hover_property">
											<th><label><?php _e( 'Image Hover Color :', GPV_TEXTDOMAIN ); ?></label></th>
											<td>												
												<input type="text" value="#384959" class="GPV-color-field" data-default-color="#384959" disabled/>
												<p class="description"><?php printf( __('Choose any color to apply on Image Hover Color. <a href="%s" target="_blank">Pro Version</a>',
												GPV_TEXTDOMAIN),pro_version_link); ?></p>
											</td>
										</tr>
									</table>
								</div>
								<!--hover_effect end-->	

								<!--pro_features start-->
								<div class="GPV_setting_container pro_features" >
									<div style="width:55%; height:439px; margin:0 auto; overflow:auto;">
										<ul style="list-style: inherit;">
											<li><?php _e( 'Multiple Image Uploader', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Multiple Shortcode', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Youtube/Vimeo Video', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( '10 Column layouts', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Show/Hide Hover effect', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( '12 Hover effect', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Unlimited Hover color', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( '500+ of Google Font Style', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Hide/Show Gallery Title', GPV_TEXTDOMAIN ); ?> </li>
											<li><?php _e( 'Left/Center/Right Gallery Title Align', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Gallery Title Unlimeted Color', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Hide/Show Gallery Label', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Left/Center/Right Gallery Label Align', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Gallery Label Unlimeted Color', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Video frame Height Customizable for every image', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Button Text Customizable for every image', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Button Show/Hide for every image', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Button Position Left/Right', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Unlimited Button Text Color', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Unlimited Button Border Color', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Unlimited Button Background Color', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Circel/Rectangle Image Layout', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Unlimited Image Open Container Background Color', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Show/Hide Image Border', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( '5 Image Border Size', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Unlimited Image Border Color', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Unlimited Gallery Background Color', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Unlimited Gallery Open Background Color', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Show/Hide Image Description', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Unlimited Image Description Text Color', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'et limit Description Word', GPV_TEXTDOMAIN ); ?>S</li>
											<li><?php _e( 'Yes/No External Link Open New Tab', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( 'Unlimited Close Icon Color', GPV_TEXTDOMAIN ); ?></li>
											<li><?php _e( '4 Lightbox', GPV_TEXTDOMAIN ); ?> </li>
											<li><?php _e( 'Custom CSS Option', GPV_TEXTDOMAIN ); ?></li>
										</ul>
									</div>					

								</div>
								<!--pro_features end-->		
							</form>			
						</section>
					</section>	
					<a href="<?php echo esc_url(live_demo_link); ?>" target="_blank" style=" margin-top: 24px; display: block;">
						<img  src="<?php echo GPV_URL; ?>/images/gpv-footer-image.png" style="width:100%;" alt="footer image">
					</a>
				</section>
				<script type="text/javascript">
				var menu_link=jQuery('.GPV-setting-section .GPV_left_column #menu_link li');
				var GPV_setting_container=jQuery('.GPV-setting-section .GPV_setting_container');

				var title_property_obj=jQuery('table .title_property');
				var label_property_obj=jQuery('table .label_property');
				var image_property_obj=jQuery('table .image_property');
				var description_property_obj=jQuery('table .description_property');
				var hover_property_obj=jQuery('table .hover_property');

				var GPV_setting_title_obj=jQuery('input[name=GPV_setting_title]');
				var GPV_setting_label_obj=jQuery('input[name=GPV_setting_label]');
				var GPV_setting_img_border_show_obj=jQuery('input[name=GPV_setting_img_border_show]');
				var GPV_setting_description_obj=jQuery('input[name=GPV_setting_description]');
				var GPV_setting_hover_effect_show_obj=jQuery('input[name=GPV_setting_hover_effect_show]');


				var GPV_setting_title='<?php echo $data_setting["GPV_setting_title"] ?>';
				var GPV_setting_label='<?php echo $data_setting["GPV_setting_label"] ?>';
				var GPV_setting_img_border_show='<?php echo $data_setting["GPV_setting_img_border_show"] ?>';
				var GPV_setting_description='<?php echo $data_setting["GPV_setting_description"] ?>';
				var GPV_setting_hover_effect_show='<?php echo $data_setting["GPV_setting_hover_effect_show"] ?>';

				jQuery(function(){	

					jQuery('.title_setting').addClass('gpv-active-div');
					jQuery('#menu_link li:first-of-type').addClass('gpv-active-link');
					GPV_setting_container.find('.GPV_right_column div:first-of-type').fadeIn('slow');
					menu_link.click(function(){
						var li_class=jQuery(this).data('class');
						menu_link.removeClass('gpv-active-link');
						jQuery(this).addClass('gpv-active-link');		
						GPV_setting_container.removeClass('gpv-active-div').hide();
						jQuery('.'+li_class).fadeIn('slow');		
					});	

					title_showhide(GPV_setting_title,title_property_obj);
					title_showhide(GPV_setting_label,label_property_obj);
					title_showhide(GPV_setting_img_border_show,image_property_obj);
					title_showhide(GPV_setting_description,description_property_obj);
					title_showhide(GPV_setting_hover_effect_show,hover_property_obj);

					GPV_setting_title_obj.click(function(){
						var value=jQuery(this).is(':checked');
						title_showhide(value,title_property_obj);
					});

					GPV_setting_label_obj.click(function(){
						var value=jQuery(this).is(':checked');
						title_showhide(value,label_property_obj);
					});

					GPV_setting_img_border_show_obj.click(function(){
						var value=jQuery(this).is(':checked');
						title_showhide(value,image_property_obj);
					});

					GPV_setting_description_obj.click(function(){
						var value=jQuery(this).is(':checked');
						title_showhide(value,description_property_obj);
					});

					GPV_setting_hover_effect_show_obj.click(function(){
						var value=jQuery(this).is(':checked');
						title_showhide(value,hover_property_obj);
					});

					jQuery('input[name=GPV_setting_description_char]').keyup(function(){
						var des_char=jQuery(this).val();
						if(des_char>=401){
							jQuery('.des_char_class').addClass('word-class-active');
						}else{
							jQuery('.des_char_class').removeClass('word-class-active');
						}
					});
					function title_showhide(value,obj){		
						if(value=='Yes' || value==true){
							obj.fadeIn();
						}else{
							obj.hide();
						}
					}
				});
</script>