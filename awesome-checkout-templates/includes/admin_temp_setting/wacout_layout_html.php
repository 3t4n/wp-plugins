<!-- layout section start-->
<div class="tab-pane <?php if(esc_html($tab) == "wacout_layout"){echo "active";}?>" id="wacout_metabox_side_tab1">
	
				<?php

						/*
						** check if select layout value is not empty
						* @selection value maybe 0,1,2
						*/
						if(isset($temp_layout_selection) && !empty($temp_layout_selection)){

						$select_lay = sanitize_text_field($temp_layout_selection);

						}else{
						$select_lay = '';
						}
						?>

						<div class="wacout_select_layout_div">
						<div class="wacout_select_layout_in">
							<div class="wacout_select_layout_lbl"><?php _e('Select layout','wacout');?></div>
							<select name='wacout_select_layout' id="wacout_select_layout">
								<option <?php if(absint($select_lay) == 0){echo "selected";}?> value="0"><?php _e('-- Select layout --' , 'wacout') ;?></option>
								<option <?php if(absint($select_lay) == 1){echo "selected";}?> value="1"><?php _e('One column layout' , 'wacout') ;?></option>
								<option <?php if(absint($select_lay) == 2){echo "selected";}?> value="2"><?php _e('Two column layout' , 'wacout') ;?></option>
								
							</select>
						</div>
						</div>


						<!-- one column layout-->
						<div id="wacout_one_column" <?php if(absint($select_lay) == 1){echo "style='display:block'";}else{echo "style='display:none'";}?> >
						<ul id="one_column_sortable">
							<?php
								/*
								** Check if sorting layout setting is not empty
								*/
								if(isset($temp_layout_sorting) && !empty($temp_layout_sorting)){

									$template_layout_fields = explode(",",sanitize_text_field($temp_layout_sorting));

								/*
								**Start foreach
								*/
								foreach($template_layout_fields as $template_layout_field):

									if(isset($template_layout_field) && !empty($template_layout_field)):

										$template_field_label = str_replace("_"," ",sanitize_text_field($template_layout_field));

										echo '<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'.esc_html($template_field_label).'</li>';

									endif;

								endforeach;
							?>
							<input type="hidden" name="wacout_template_layout" id="wacout_template_layout" value="<?php echo esc_attr($temp_layout_sorting);?>"><?php

							}else{
								$default_sorting_settings = array('Billing fields','Shipping fields','Order details','Payment information','Related products','Custom Section A','Custom Section B','Custom Section C');
								foreach($default_sorting_settings as $default_sorting_setting):

									echo '<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'.esc_html($default_sorting_setting).'</li>';

								endforeach;?>
								<input type="hidden" name="wacout_template_layout" id="wacout_template_layout" value="billing_fields,shipping_fields,order_details,payment_information,related_products,custom_section_a,custom_section_b,custom_section_c">
							<?php }
							?>
						</ul>
						</div>
						<!-- two column layout-->
						<div id="wacout_two_column" <?php if(absint($select_lay) == 2 ){echo "style='display:block'";}else{echo "style='display:none'";}?>>
						<ul id="wacout_column_left" class="connectedSortable">
							<?php

								if(isset($temp_layout_position['wacout_template_left']) && !empty($temp_layout_position['wacout_template_left'])){
									$temp_layout_left_psn = sanitize_text_field($temp_layout_position['wacout_template_left']);
									$temp_layout_left_positions = explode(",",$temp_layout_left_psn);
									foreach($temp_layout_left_positions as $temp_layout_left_position){
										$template_layouts = str_replace("_"," ",$temp_layout_left_position);
										echo '<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'.esc_html($template_layouts).'</li>';
									}
							?>
							<input type="hidden" name="layout_pos[wacout_template_left]" id="wacout_template_left" value="<?php echo esc_attr($temp_layout_left_psn);?>"><?php

							}else{
								$default_layout_settings = array('Billing fields','Shipping fields','Related products','Custom Section A');
								foreach($default_layout_settings as $default_layout_setting){
									echo '<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'.esc_html($default_layout_setting).'</li>';
								}
							?>
							<input type="hidden" name="layout_pos[wacout_template_left]" id="wacout_template_left" value="billing_fields,shipping_fields,related_products,custom_section_a">
							<?php }?>

						</ul>
						<ul id="wacout_column_right" class="connectedSortable">
							<?php

								if(isset($temp_layout_position['wacout_template_right']) && !empty($temp_layout_position['wacout_template_right'])){
									$temp_layout_right_psn = sanitize_text_field($temp_layout_position['wacout_template_right']);
									$temp_layout_right_positions = explode(",",$temp_layout_right_psn);
									foreach($temp_layout_right_positions as $temp_layout_right_position){
										$template_layouts = str_replace("_"," ",$temp_layout_right_position);
										echo '<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'.esc_html($template_layouts).'</li>';
									}
							?>
							<input type="hidden" name="layout_pos[wacout_template_right]" id="wacout_template_right" value="<?php echo esc_attr($temp_layout_right_psn);?>"><?php
								}else{
								$layout_setting = array('Order details','Payment information','Custom Section B','Custom Section C');
								foreach($layout_setting as $layout_settings){
								echo '<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'.esc_html($layout_settings).'</li>';
								}?>
							<input type="hidden" name="layout_pos[wacout_template_right]" id="wacout_template_right" value="order_details,payment_information,custom_section_b,custom_section_c">
							<?php }?>
						</ul>
						<div class="clear"></div>
						</div>

				



	
</div>
<!-- layout section end-->