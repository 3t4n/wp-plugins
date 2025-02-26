

<?php
/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/
if(!defined('ABSPATH')) exit();
?>


					<span id="span_objectB1">4</span>
					<span id="span_objectB2">4</span>
					<span id="span_objectB3">4</span>
					<span id="span_objectB4">4</span>
					<span id="span_objectB5">4</span>
					<span id="span_objectB6">4</span>
					<span id="span_objectB7">4</span>
					<span id="span_objectB8">4</span>
					<span id="span_objectB9">4</span>
					<span id="span_objectB10">4</span>
					<span id="span_objectB11">4</span>
					<span id="span_objectB12">4</span>
					<span id="span_objectB13">4</span>
					<span id="span_objectB14">4</span>
					<span id="span_objectB15">4</span>
					<span id="span_objectB16">4</span>
					<span id="span_objectB17">4</span>
					<span id="span_objectB18">4</span>
					<span id="span_objectB19">4</span>
					<span id="span_objectB20">4</span>
					<span id="span_objectB21">4</span>
					<span id="span_objectB22">4</span>
					<span id="span_objectB25">4</span>
					<span id="span_objectB28">4</span>
					<span id="span_objectB29">4</span>
					<span id="span_objectB30">4</span>
					<span id="span_objectB31">4</span>
					<span id="span_objectBB"><?php esc_html_e('--------B--------', 'wb3d'); ?></span>
					<span id="span_objectBC"><?php esc_html_e('--------C--------', 'wb3d'); ?></span>
					<span id="span_objectBD"><?php esc_html_e('--------D--------', 'wb3d'); ?></span>
					<span id="span_objectBE"><?php esc_html_e('--------E--------', 'wb3d'); ?></span>
					<span id="span_objectBF"><?php esc_html_e('--------F--------', 'wb3d'); ?></span>
					<span id="span_objectBH"><?php esc_html_e('--------G--------', 'wb3d'); ?></span>
					<label id="label_effect_0"><?php esc_html_e('Effect :', 'wb3d'); ?></label>
					<select id="effect_0" >
						<option selected value="-1"><?php esc_html_e('None', 'wb3d'); ?></option>
					</select>
					<label id="label_noxy"><?php esc_html_e('X & Y :', 'wb3d'); ?></label>
					<select id="noxy" >
						<option selected value="0"><?php esc_html_e('Normal', 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e('None', 'wb3d'); ?></option>
					</select>
					<label id='label_x_right_menu' ><?php esc_html_e('X:', 'wb3d'); ?></label>
					<input id='x_right_menu' type="number" >
					<label id='label_y_right_menu' ><?php esc_html_e('Y:', 'wb3d'); ?></label>
					<input id='y_right_menu' type="number" >
					<label id='label_w_right_menu' ><?php esc_html_e('Width:', 'wb3d'); ?></label>
					<input min="0" id='w_right_menu' type="number">
					<label id='label_h_right_menu'><?php esc_html_e('Heightt', 'wb3d'); ?></label>
					<input min="0" id='h_right_menu' type="number">
					<label id='label_f_right_menu'><?php esc_html_e('Font:', 'wb3d'); ?></label>
					<input min="0" id='f_right_menu' type="number">
					<label class="wb3d_pointer" title="<?php esc_attr_e('Start', 'wb3d'); ?>" id='start_run_after_v_scroll' ><?php esc_html_e('S', 'wb3d'); ?></label>
					<label class="wb3d_pointer" title="<?php esc_attr_e('Reset', 'wb3d'); ?>" id='reset_run_after_v_scroll' ><?php esc_html_e('R', 'wb3d'); ?></label>
					<label class="wb3d_pointer" title="<?php esc_attr_e('End', 'wb3d'); ?>" id='end_run_after_v_scroll' ><?php esc_html_e('E', 'wb3d'); ?></label>
					<label class="wb3d_pointer" title="<?php esc_attr_e('Reset', 'wb3d'); ?>" id='reset2_run_after_v_scroll' ><?php esc_html_e('R', 'wb3d'); ?></label>
					<label id='label_run_after_v_scroll' ><?php esc_html_e('Run After V Scroll:', 'wb3d'); ?></label>
					<input id='run_after_v_scroll'  type="number">
					<label id='label_start_after' ><?php esc_html_e('Run After Time:', 'wb3d'); ?></label>
					<input id='start_after' step="0.1" min="0" type="number">
					<label id='label_run_to_v_scroll' ><?php esc_html_e('Run To V Scroll:', 'wb3d'); ?></label>
					<input min="0" id='run_to_v_scroll'  type="number">
					<label id='label_end_To' ><?php esc_html_e('Run To Time:', 'wb3d'); ?></label>
					<input id='end_To' step="0.1" min="0" type="number">
					<label id='label_show_in_range' ><?php esc_html_e('Show Object', 'wb3d'); ?></label>
					<select id="show_in_range" >
						<option value="0"><?php esc_html_e('Always Show', 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e('Hide&off Out Off Range', 'wb3d'); ?></option>
					</select>
						<label id="label_select_position"><?php esc_html_e('Position :', 'wb3d'); ?></label>
					<select  id="select_position"  >
						<option value="0"><?php esc_html_e('1-Absolute %', 'wb3d'); ?></option> 
						<option value="1"><?php esc_html_e('2-Fixed (Position:fixed) PX', 'wb3d'); ?></option> 
						<option value="2"><?php esc_html_e('3-Fixed (Position:fixed) %', 'wb3d'); ?></option> 
					</select>

					<label id='label_align_left' ><?php esc_html_e('Align X:', 'wb3d'); ?></label>
					<select id="align_left" >
						<option value="0"><?php esc_html_e('1-Left', 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e('2-Center', 'wb3d'); ?></option>
						<option value="2"><?php esc_html_e('3-Right', 'wb3d'); ?></option>
					</select>
					<label id='label_align_top' ><?php esc_html_e('Align Y:', 'wb3d'); ?></label>
					<select id="align_top" >
						<option value="0"><?php esc_html_e('1-Top', 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e('2-Center', 'wb3d'); ?></option>
						<option value="2"><?php esc_html_e('3-Bottom', 'wb3d'); ?></option>
					</select>
					<label id='label_width_res' ><?php esc_html_e('Width:', 'wb3d'); ?></label>
					<select  id="width_res"  >
						<option value="0"><?php esc_html_e("Screen Width", 'wb3d'); ?></option> 
                                    <option value="1"><?php esc_html_e("Screen Height", 'wb3d'); ?></option> 
					</select>

					<label id='label_height_res' ><?php esc_html_e('Height:', 'wb3d'); ?></label>
					<select id="height_res"  >
						<option value="0"><?php esc_html_e("Screen Width", 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e("Screen Height", 'wb3d'); ?></option>  
					</select>
					<label id='label_sizex_right_menu' ><?php esc_html_e('Effect width:', 'wb3d'); ?></label>
					<input step="0.01" min="0.01" id='sizex_right_menu'  type="number">
					<label id='label_sizey_right_menu' ><?php esc_html_e('Effect height:', 'wb3d'); ?></label>
					<input step="0.01" min="0.01" id='sizey_right_menu'  type="number">

					<label id="label_selecttimeorscroll"><?php esc_html_e('Move on effect:', 'wb3d'); ?></label>
					<select  id="selecttimeorscroll" >
						<option value="0"><?php esc_html_e('Time', 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e('Scroll (Down)', 'wb3d'); ?></option>
						<option value="2"><?php esc_html_e('Scroll (Down/Up)', 'wb3d'); ?></option>
						<option value="6"><?php esc_html_e('Drag Up', 'wb3d'); ?></option>
						<option value="7"><?php esc_html_e('Drag Down', 'wb3d'); ?></option>
						<option value="8"><?php esc_html_e('Drag Right', 'wb3d'); ?></option>
						<option value="9"><?php esc_html_e('Drag Left', 'wb3d'); ?></option>
						<option value="10"><?php esc_html_e('Click', 'wb3d'); ?></option>
						<option value="11"><?php esc_html_e('Hover', 'wb3d'); ?></option>
						<option value="5"><?php esc_html_e('None(Change by Event&Act)', 'wb3d'); ?></option>
					</select>
					<label id="label_select_auto_repeat" ><?php esc_html_e('Repeat :', 'wb3d'); ?></label>
					<select id="select_auto_repeat" >
						<option value="0"><?php esc_html_e('No Repeat :', 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e('Repeat', 'wb3d'); ?></option>
					</select>
					<label id="label_select_auto_slow" ><?php esc_html_e('Auto slow :', 'wb3d'); ?></label>
					<select id="select_auto_slow" >
						<option value="0"><?php esc_html_e('Fixed speed :', 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e('Auto Slow :', 'wb3d'); ?></option>
					</select>
					<label id="label_select_parallex"  ><?php esc_html_e('Parallex :', 'wb3d'); ?></label>
					<select id="select_parallex" >
						<option value="0"><?php esc_html_e('Disable', 'wb3d'); ?></option> 
						<option value="1"><?php esc_html_e('Enable', 'wb3d'); ?></option>
					</select>
					<label  id="label_parallax_selectmenu1"  ><?php esc_html_e('Parallex 1:', 'wb3d'); ?></label>
					<select  id="parallax_selectmenu1">
						<option value="0"><?php esc_html_e('None', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="1"><?php esc_html_e('Move X By X', 'wb3d'); ?></option>
						<option value="2"><?php esc_html_e('Move Y By Y', 'wb3d'); ?></option>                            
						<option disabled="disabled">---------------------</option>
						<option value="8"><?php esc_html_e('Rotate By X', 'wb3d'); ?></option>
						<option value="9"><?php esc_html_e('Rotate By Y', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="11"><?php esc_html_e('RotateX By X', 'wb3d'); ?></option>
						<option value="12"><?php esc_html_e('RotateX By Y', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="14"><?php esc_html_e('RotateY By X', 'wb3d'); ?></option>
						<option value="15"><?php esc_html_e('RotateY By Y', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="17"><?php esc_html_e('ScaleX By X', 'wb3d'); ?></option>
						<option value="18"><?php esc_html_e('ScaleX By Y', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="20"><?php esc_html_e('ScaleY By X', 'wb3d'); ?></option>
						<option value="21"><?php esc_html_e('ScaleY By Y', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="26"><?php esc_html_e('SkewX By X', 'wb3d'); ?></option>
						<option value="27"><?php esc_html_e('SkewX By Y', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="29"><?php esc_html_e('SkewY By X', 'wb3d'); ?></option>
						<option value="30"><?php esc_html_e('SkewY By Y', 'wb3d'); ?></option>
					</select>
					<label  id="label_parallax_spinner1"  ><?php esc_html_e('Value:', 'wb3d'); ?></label>
					<input id="parallax_spinner1" type="number">
					<label  id="label_parallax_selectmenu2"  ><?php esc_html_e('Parallex 2:', 'wb3d'); ?></label>
					<select  id="parallax_selectmenu2">
						<option value="0"><?php esc_html_e('None', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="1"><?php esc_html_e('Move X By X', 'wb3d'); ?></option>
						<option value="2"><?php esc_html_e('Move Y By Y', 'wb3d'); ?></option>                            
						<option disabled="disabled">---------------------</option>
						<option value="8"><?php esc_html_e('Rotate By X', 'wb3d'); ?></option>
						<option value="9"><?php esc_html_e('Rotate By Y', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="11"><?php esc_html_e('RotateX By X', 'wb3d'); ?></option>
						<option value="12"><?php esc_html_e('RotateX By Y', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="14"><?php esc_html_e('RotateY By X', 'wb3d'); ?></option>
						<option value="15"><?php esc_html_e('RotateY By Y', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="17"><?php esc_html_e('ScaleX By X', 'wb3d'); ?></option>
						<option value="18"><?php esc_html_e('ScaleX By Y', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="20"><?php esc_html_e('ScaleY By X', 'wb3d'); ?></option>
						<option value="21"><?php esc_html_e('ScaleY By Y', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="26"><?php esc_html_e('SkewX By X', 'wb3d'); ?></option>
						<option value="27"><?php esc_html_e('SkewX By Y', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="29"><?php esc_html_e('SkewY By X', 'wb3d'); ?></option>
						<option value="30"><?php esc_html_e('SkewY By Y', 'wb3d'); ?></option>
					</select>
					<label  id="label_parallax_spinner2"  ><?php esc_html_e('Value:', 'wb3d'); ?></label>
					<input id="parallax_spinner2" type="number">




				<div id="div_layerc" >
					<div id="slider_layer" >  
						<div id="slider_parent">
							<div id="slider_k1" class="pointer">
							</div>
						</div>
					</div>

					<div class="pointer" id="new_layers_object"><?php esc_html_e('New Object', 'wb3d'); ?></div>
					<div id="layers_object" ></div>
					<span id="span_slide6">1</span>
					<span id="span_slide7">1</span>
					<span id="span_slide8">1</span>
					<span id="span_slide9">1</span>
					<span id="span_slide10">1</span>
					<span id="span_slide11">1</span>
					<span id="span_slide12">1</span>
					<span id="span_slide13">1</span>
					<span id="span_slide14">1</span>
					<span id="span_slide15">1</span>
					<span id="span_slide16">1</span>
					<span id="span_slide17">1</span>
					<span id="span_slide18">1</span>
					<select id="pers_type" >
						<option value="0"><?php esc_html_e('1-Normal Object', 'wb3d'); ?> </option> 
						<option value="1"><?php esc_html_e('2-Object with Perspectiv', 'wb3d'); ?></option> 
						<option value="2"><?php esc_html_e('3-Object with Perspectiv & 3D', 'wb3d'); ?></option> 
					</select>
					<label id="label_layer_pers"><?php esc_html_e('Perspective:', 'wb3d'); ?></label>
					<label id="label_layer_type"><?php esc_html_e('Type:', 'wb3d'); ?></label>
					<select id="layer_type">
						<option value="0"><?php esc_html_e('Normal Layer', 'wb3d'); ?></option>
						<option disabled="disabled">----------------</option>
						<option value="2"><?php esc_html_e('Static layer', 'wb3d'); ?></option>
						<option disabled="disabled">----------------</option>
						<option value="9"><?php esc_html_e('Tab Title', 'wb3d'); ?></option>
						<option value="10"><?php esc_html_e('Tab Content', 'wb3d'); ?></option>
						<option disabled="disabled">----------------</option>
						<option value="11"><?php esc_html_e('Mouse Layer A', 'wb3d'); ?></option>
						<option value="12"><?php esc_html_e('Mouse Slide A', 'wb3d'); ?></option>
                                    <option value="13"><?php esc_html_e('Mouse Layer B', 'wb3d'); ?></option>
                                    <option value="14"><?php esc_html_e('Mouse Slide B', 'wb3d'); ?></option>
					</select>
					<label id="label_tab_number"><?php esc_html_e('Number:', 'wb3d'); ?></label>
					<input id='tab_number' type="number">
					<img alt="" id="let_status0" src="<?php echo esc_url(wb3d_plagin_images_URL);?>desktop.png" >
					<img alt="" id="let_status1" src="<?php echo esc_url(wb3d_plagin_images_URL);?>htablet.png" >
					<img alt="" id="let_status2" src="<?php echo esc_url(wb3d_plagin_images_URL);?>vtablet.png" >
					<img alt="" id="let_status3" src="<?php echo esc_url(wb3d_plagin_images_URL);?>mobile.png" >
					<div id="let_status" ></div>
					<label id="label_click-type"><?php esc_html_e('Click', 'wb3d'); ?></label>
					<select  id="click-type" >
						<option value="-1"><?php esc_html_e('None', 'wb3d'); ?></option>
						<option disabled="disabled" ><?php esc_html_e('-----Link-----', 'wb3d'); ?></option>
						<option value="0"><?php esc_html_e('Simple link', 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e('JS link', 'wb3d'); ?></option>
						<option disabled="disabled" ><?php esc_html_e('-----Slide Action (3D.W.B Module)-----', 'wb3d'); ?></option>
						<option value="2"><?php esc_html_e('Jump to slide (3D.W.B Module)', 'wb3d'); ?></option>
						<option value="3"><?php esc_html_e('Next slide (3D.W.B Module)', 'wb3d'); ?></option>
						<option value="4"><?php esc_html_e('Pre slide (3D.W.B Module)', 'wb3d'); ?></option>
						<option disabled="disabled">----------Scroll-----------</option>  
						<option value="10"><?php esc_html_e('Scroll to layer', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>          
						<option value="22"><?php esc_html_e('Clear save setting', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="11"><?php esc_html_e('Select color table 1', 'wb3d'); ?></option>
						<option value="12"><?php esc_html_e('Select color table 2', 'wb3d'); ?></option>
						<option value="13"><?php esc_html_e('Select color table 3', 'wb3d'); ?></option>
						<option value="14"><?php esc_html_e('Select color table 4', 'wb3d'); ?></option>
						<option value="15"><?php esc_html_e('Select color table 5', 'wb3d'); ?></option>
						<option value="16"><?php esc_html_e('Select color table 6', 'wb3d'); ?></option>
						<option value="17"><?php esc_html_e('Select color table 7', 'wb3d'); ?></option>
						<option value="18"><?php esc_html_e('Select color table 8', 'wb3d'); ?></option>
						<option value="19"><?php esc_html_e('Select color table 9', 'wb3d'); ?></option>
						<option value="20"><?php esc_html_e('Select color table 10', 'wb3d'); ?></option>
						<option disabled="disabled">---------------------</option>
						<option value="21"><?php esc_html_e('Text', 'wb3d'); ?></option>
					</select>

					<input type="text" disabled="disabled" id="click-link">          
					<label id="label_click-newpage"><?php esc_html_e('Link2', 'wb3d'); ?></label>
					<select  disabled="disabled" id="click-newpage" >
						<option value="0"><?php esc_html_e('New page', 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e('New page (No follow)', 'wb3d'); ?></option>
						<option value="2"><?php esc_html_e('Same page ', 'wb3d'); ?></option>
						<option value="3"><?php esc_html_e('Same page (No follow)', 'wb3d'); ?></option>
					</select>
					<label id="label_act_event"><?php esc_html_e('Event/Act', 'wb3d'); ?></label>
					<select  disabled="disabled" id="act_event" >
						<option value="0"><?php esc_html_e('No', 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e('Yes', 'wb3d'); ?></option> 
					</select>
					<label id="label_reset"><?php esc_html_e('Reset', 'wb3d'); ?></label>
					<select  disabled="disabled" id="layer_reset" >
						<option value="0"><?php esc_html_e('No', 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e('Yes', 'wb3d'); ?></option> 
					</select>
					<label id="label_pointer"><?php esc_html_e('Pointer', 'wb3d'); ?></label>
					<select  disabled="disabled" id="layer_pointer" >
						<option value="0"><?php esc_html_e('No', 'wb3d'); ?></option>
						<option value="1"><?php esc_html_e('Yes', 'wb3d'); ?></option> 
					</select>
                              <label id="label_selectable"><?php esc_html_e('Selectable', 'wb3d'); ?></label>
                              <select title="<?php esc_html_e('Scroll,Slider handle must select: No', 'wb3d'); ?>"  disabled="disabled" id="layer_selectable" >
                                    <option value="0"><?php esc_html_e('No', 'wb3d'); ?></option>
                                    <option value="1"><?php esc_html_e('Yes', 'wb3d'); ?></option> 
                              </select>
                              <label id="label_sizefunc"><?php esc_html_e('Size Function', 'wb3d'); ?></label>
                              <select title="<?php esc_html_e('Select Size Function', 'wb3d'); ?>"  disabled="disabled" id="layer_sizefunc" >
                                    <option value="0"><?php esc_html_e('.offsetWidth', 'wb3d'); ?></option>
                                    <option value="1"><?php esc_html_e('getBoundingClientRect', 'wb3d'); ?></option> 
                              </select>
                              <label id="label_overflow"><?php esc_html_e('Overflow 1', 'wb3d'); ?></label>
                              <select title="<?php esc_html_e('Not work in admin panel', 'wb3d'); ?>"  disabled="disabled" id="layer_overflow" >
                                    <option value="0"><?php esc_html_e('hidden', 'wb3d'); ?></option>
                                    <option value="1"><?php esc_html_e('visible', 'wb3d'); ?></option> 
                              </select>
                              <label id="label_overflow2"><?php esc_html_e('Overflow 2', 'wb3d'); ?></label>
                              <select title="<?php esc_html_e('needs a refresh', 'wb3d'); ?>"  disabled="disabled" id="layer_overflow2" >
                                    <option value="0"><?php esc_html_e('hidden', 'wb3d'); ?></option>
                                    <option value="1"><?php esc_html_e('visible', 'wb3d'); ?></option> 
                              </select>
				</div>