<?php
settings_errors();

$count = $countText =  2;
$audios = get_option('audio_f');
$btn_type_audios = get_option('button_type');
$btn_color_audios = get_option('button_color');
$width = get_option('width_btn');
$height = get_option('height_btn');
$second_play = get_option('second_play');
$shortcodes =  (get_option('short_dis')) ? get_option('short_dis') : array();

$display1 = $display2 = "style='display:none;'";
if(!empty($shortcodes)) {
	$display1 = "style='display:block;'";
	$count = sizeof($shortcodes) + 1;
}


$texts = get_option('text_conv');
$text_btn = get_option('text_btn_type');
$text_btn_color = get_option('text_btn_color');
$text_width = get_option('text_width_btn');
$text_height = get_option('text_height_btn');
$shortcodesText =  (get_option('short_dis_text')) ? get_option('short_dis_text') : array();
if(!empty($shortcodesText)) {
	$display2 = "style='display:block;'";
	$countText = sizeof($shortcodesText) + 1;
}
?>
<div class="wrap">
	 <h2><?php echo esc_html__('Audio Text Settings', 'wp-sales-pitch');?></h2>
	<div class="meta-box-sortables ui-sortable aud-text-wrap">
		<div class="postbox" id="p1">
			<div class="container">
				<form action="options.php" name="audio-form" method="post" id="audio-form" enctype="multipart/form-data">

				    <?php 
				    settings_fields( 'audio-options-group' );
				    do_settings_sections( 'audio-options-group' ); ?>
			     	<table class="form-table">
				        <tr valign="top">
					         <th scope="row"><?php echo esc_html__('Audio File*', 'wp-sales-pitch')?></th>
					        <th scope="row"> <?php echo esc_html__('Button* ', 'wp-sales-pitch');?> <br/><span>(Please select speaker/play button to diaplay in shortcode)</span></th>
					        <th scope="row"><?php echo esc_html__('Button Type*', 'wp-sales-pitch');?></th>
					        <th scope="row"><?php echo esc_html__('Seconds*', 'wp-sales-pitch')?></th>
					        <th scope="row"><?php echo esc_html__('Action', 'wp-sales-pitch');?></th>
                            <th scope="row"><?php echo esc_html__('Shortcode', 'wp-sales-pitch');?></th>				   		</tr>
				   		<?php if(!empty($shortcodes)) {
				   			foreach ($shortcodes as $key2 => $value) { 
				   				
				   				$key = $key2 + 1;

				   				?>
				   				<tr data-id="<?php echo esc_attr($key);?>">
						       		<td>
						       			<input type="file" id="audio-file" accept=".mp3,.m4a,.ogg,.wav" data-id="<?php echo esc_attr($key);?>" name="audio_f[]" value="<?php echo esc_html($audios[$key2]); ?>">
						       			<span><?php echo esc_html($audios[$key2]); ?></span>
						       		</td>
						       		<td>						      
						       			<label><?php echo esc_html__('Type:', 'wp-sales-pitch');?></label>


						       			<select name="button_type[]" class="button-type" data-id="<?php echo esc_attr($key);?>">
						       				<option value="speaker" <?php if($btn_type_audios[$key2] == 'speaker') { echo esc_attr("selected"); } ?>><?php echo esc_html__('Speaker', 'wp-sales-pitch');?></option>
		       								<option value="play" <?php if($btn_type_audios[$key2] == 'play') { echo esc_attr("selected"); } ?>><?php echo esc_html__('Play', 'wp-sales-pitch');?></option>	       								
						       			</select>
						       			<br/><br/>
						       			<label><?php echo esc_html__('Color:', 'wp-sales-pitch');?></label>
						       			
						       			<select name="button_color[]" class="button-color" data-id="<?php echo esc_attr($key);?>">
						       				<option value="red" <?php if($btn_color_audios[$key2] == 'red') { echo esc_attr("selected"); } ?>><?php echo esc_html__('Red', 'wp-sales-pitch');?></option>
		       								<option value="black" <?php if($btn_color_audios[$key2] == 'black') { echo esc_attr("selected"); } ?>><?php echo esc_html__('Black', 'wp-sales-pitch');?></option>
		       								<option value="blue" <?php if($btn_color_audios[$key2] == 'blue') { echo esc_attr("selected"); } ?>><?php echo esc_html__('Blue', 'wp-sales-pitch');?></option>
						       			</select>
						       		</td>
						       		<td>
						       			<label><?php  echo esc_html__('Width : (in px)', 'wp-sales-pitch');  ?></label>
						       			<input type="text" class="width_btn" class="width_btn" name="width_btn[]" data-id="<?php echo esc_attr($key);?>" value="<?php echo esc_attr($width[$key2]); ?>" placeholder="20">esc_attr(
						       			<br/><br/>
						       			<label><?php  echo esc_html__('Height : (in px)', 'wp-sales-pitch');  ?></label>
						       			<input type="text" class="height_btn" name="height_btn[]" data-id="<?php echo esc_attr($key);?>" value="<?php echo esc_attr($height[$key2]); ?>" placeholder="20">
						       		</td>
						       		<td>
						       			<input type="number" min="1"  data-id="<?php echo esc_attr($key);?>" name="second_play[]" value="<?php echo esc_attr($second_play[$key2]); ?>">
						       		</td>				       		
						       		<td>
						       			<button type="button" class="gen-short button"  data-id="<?php echo esc_attr($key);?>" id="gen-short" value="save_audio"><?php echo esc_html__('Generate Shortcode', 'wp-sales-pitch');?></button>
						       			
						       		</td>
						       		<td data-id="<?php echo esc_attr($key);?>" class="short-code">
						       			<input type="text" name="short_dis[]" id="short_dis<?php echo esc_attr($key);?>" value='<?php echo esc_attr($value);?>' readonly data-id="<?php echo esc_attr($key);?>">
						       			<?php if($key > 1) { ?>
						       				<button type="button" data-id="<?php echo esc_attr($key);?>" title="Remove" value="remove" class="remove_row btn button btn-close"><?php echo esc_html__('X', 'wp-sales-pitch')?></button>
						       			<?php } ?>
						       			<button type="button" data-toggle="tooltip" data-placement="bottom" title="Copied" class="button copy-short" data-id="<?php echo esc_attr($key);?>"><?php echo esc_html__('Copy', 'wp-sales-pitch');?></button>
						       			
						       		</td>
						       	</tr>
						       	
				   			<?php }
				   		} else { ?>
				       	<tr data-id="1">
				       		<td>
				       			<input type="file" id="audio-file" accept=".mp3,.m4a,.ogg,.wav" data-id="1" name="audio_f[]" >
				       		</td>
				       		<td>
				       			<label><?php echo esc_html__('Type:', 'wp-sales-pitch');?></label>
				       			<select name="button_type[]" class="button-type" data-id="1">
				       				<option value="speaker"><?php echo esc_html__('Speaker', 'wp-sales-pitch');?></option>
       								<option value="play"><?php echo esc_html__('Play', 'wp-sales-pitch');?></option>	       								
				       			</select>
				       			<br/><br/>
				       			<label><?php echo esc_html__('Color:', 'wp-sales-pitch');?></label>
				       			<select name="button_color[]" class="button-color" data-id="1">
				       				<option value="red"><?php echo esc_html__('Red', 'wp-sales-pitch');?></option>
       								<option value="black"><?php echo esc_html__('Black', 'wp-sales-pitch');?></option>
       								<option value="blue"><?php echo esc_html__('Blue', 'wp-sales-pitch');?></option>
				       			</select>
				       		</td>
				       		<td>
				       			<label><?php  echo esc_html__('Width : (in px)', 'wp-sales-pitch');  ?></label>
				       			<input type="text" class="width_btn" name="width_btn[]" data-id="1" value="" placeholder="20">
				       			<br/><br/>
				       			<label><?php  echo esc_html__('Height : (in px)', 'wp-sales-pitch');  ?></label>
				       			<input type="text" class="height_btn" name="height_btn[]" data-id="1" value="" placeholder="20">
				       		</td>
				       		<td>
				       			<input type="number" min="1"  data-id="1" name="second_play[]">
				       		</td>				       		
				       		<td>
				       			<button type="button" class="gen-short button"  data-id="1" id="gen-short" value="save_audio"><?php echo esc_html__('Generate Shortcode', 'wp-sales-pitch');?></button>
				       			
				       		</td>
				       		<td data-id="1" class="short-code">
				       			<input type="text" name="short_dis[]" id="short_dis1" value="" readonly data-id="1">
				       			<button type="button" title="Remove" value="remove" class="remove_row btn button btn-close" style="display:none;"><?php echo esc_html__('X', 'wp-sales-pitch')?></button>
				       			<button type="button" data-toggle="tooltip" data-placement="bottom" title="Copied" class="button copy-short"  data-id="1"><?php echo esc_html__('Copy', 'wp-sales-pitch');?></button>
				       			
				       		</td>
				       	</tr>
				       <?php } ?>
				       	<tr class="new-row"></tr>
				       	<tr>
				       		<td colspan="4">
				       			<button class="button button-primary" type="submit"><?php echo esc_html__('Save Changes', 'wp-sales-pitch');?></button>				       		
				       		</td>
				       		<td>
				       			<button class="button add-more" type="button" id="add-more-aud" <?php echo esc_html($display1); ?> ><?php echo esc_html__('Add More', 'wp-sales-pitch');?></button>
				       		</td>
				       	</tr>
				    </table>
				</form>
				<input type="hidden" value="<?php echo esc_attr($count); ?>" id="aud-count" />
			</div>
		</div>
		<div class="postbox" id="p2">
			 <div class="container">
				<form action="options.php" method="post" name="text-form" id="text-form">

				    <?php 
				    settings_fields( 'text-options-group' );
				    do_settings_sections( 'text-options-group' ); ?>
				    <table class="form-table">
					        <tr valign="top">
						        <th scope="row"><?php echo esc_html__('Text*', 'wp-sales-pitch');?></th>
						        <th scope="row"><?php echo esc_html__('Button*', 'wp-sales-pitch');?><br/><span>(Please select speaker/play button to diaplay in shortcode)</span></th>
						        <th scope="row"><?php echo esc_html__('Button Sizes*', 'wp-sales-pitch');?> </th>
						        <th scope="row"><?php echo esc_html__('Action', 'wp-sales-pitch');?></th>
						        <th scope="row"><?php echo esc_html__('Shortcode', 'wp-sales-pitch');?></th>
					   		</tr>
					   		<?php if(!empty($shortcodesText)) {
				   			foreach ($shortcodesText as $key2 => $value) { 
				   				$key = $key2 + 1;
				   				?>
					       	<tr data-id="<?php echo esc_attr($key);?>">
					       		<td>
					       			<textarea name="text_conv[]" data-id="<?php echo  esc_attr($key);?>" rows="5" cols="50" maxlength="100"><?php echo esc_attr($texts[$key2]); ?></textarea>
					       		</td>
					       		<td>
					       			<label>Type: </label>
					       			<select name="text_btn_type[]" class="button-text-type" data-id="<?php echo esc_attr($key);?>">
					       				<option value="speaker" <?php if($text_btn[$key2] == 'speaker') { echo esc_attr("selected"); } ?>><?php echo esc_html__('Speaker', 'wp-sales-pitch');?></option>
	       								<option value="play" <?php if($text_btn[$key2] == 'play') { echo esc_attr("selected"); } ?>><?php echo esc_html__('Play', 'wp-sales-pitch');?></option>	       								
					       			</select>
					       			<br/><br/>
					       			<label><?php echo esc_html__('Color:', 'wp-sales-pitch');?></label>
					       			<select name="text_btn_color[]" class="button-text-color" data-id="<?php echo esc_attr($key);?>">
					       				<option value="red" <?php if($text_btn_color[$key2] == 'red') { echo esc_attr("selected"); } ?>><?php echo esc_html__('Red', 'wp-sales-pitch');?></option>
	       								<option value="black" <?php if($text_btn_color[$key2] == 'black') { echo esc_attr("selected"); } ?>><?php echo esc_html__('Black', 'wp-sales-pitch');?></option>
	       								<option value="blue" <?php if($text_btn_color[$key2] == 'blue') { echo esc_attr("selected"); } ?>><?php echo esc_html__('Blue', 'wp-sales-pitch');?></option>
					       			</select>
					       		</td>
					       		<td>
					       			<label><?php  echo esc_html__('Width : (in px)', 'wp-sales-pitch');  ?></label>
					       			<input type="text" class="text_width_btn" name="text_width_btn[]" data-id="<?php echo esc_attr($key);?>" value="<?php echo esc_attr($text_width[$key2]); ?>" placeholder="20">
					       			<br/><br/>
					       			<label><?php  echo esc_html__('Height : (in px)', 'wp-sales-pitch');  ?></label>
					       			<input type="text" class="text_height_btn" name="text_height_btn[]" data-id="<?php  echo esc_attr($key);?>" value="<?php echo esc_attr($text_height[$key2]); ?>" placeholder="20">
				       			</td>		       		
					       		<td>
					       			<button type="button" class="gen-short-text button"  data-id="<?php echo esc_attr($key);?>" id="gen-short-text" value="save_text"><?php echo esc_html__('Generate Shortcode', 'wp-sales-pitch');?></button>
					       			

					       		</td>
					       		<td data-id="1" class="short-code">
					       			<input type="text" name="short_dis_text[]" id="short_text<?php echo esc_attr($key);?>" value='<?php echo esc_attr($value);?>' readonly data-id="<?php echo esc_attr($key);?>">
					       			<?php if($key > 1) { ?>
				       					<button type="button" data-id="<?php echo esc_attr($key);?>" title="Remove" value="remove" class="remove_row btn button btn-close"><?php echo esc_html__('X', 'wp-sales-pitch');?></button>
				       				<?php } ?>
					       			<button type="button" data-toggle="tooltip" data-placement="bottom" title="Copied" class="button copy-short-text" data-id="<?php echo esc_attr($key);?>"><?php echo esc_html__('Copy', 'wp-sales-pitch');?></button>
					       			
					       		</td>
					       	</tr>
					       <?php } 
					   } else { ?>
					       	<tr data-id="1">
					       		<td>
					       			<textarea name="text_conv[]" data-id="1" rows="5" cols="50" maxlength="100"></textarea>
					       		</td>
					       		<td>
					       			<label><?php echo esc_html__('Type:', 'wp-sales-pitch');?> </label>
					       			<select name="text_btn_type[]" class="button-type" data-id="1">
					       				<option value="speaker"><?php echo esc_html__('Speaker', 'wp-sales-pitch');?></option>
	       								<option value="play"><?php echo esc_html__('Play', 'wp-sales-pitch');?></option>	       								
					       			</select>
					       			<br/><br/>
					       			<label><?php echo esc_html__('Color:', 'wp-sales-pitch');?></label>
					       			<select name="text_btn_color[]" class="button-type" data-id="1">
					       				<option value="red"><?php echo esc_html__('Red', 'wp-sales-pitch');?></option>
	       								<option value="black"><?php echo esc_html__('Black', 'wp-sales-pitch');?></option>
	       								<option value="blue"><?php echo esc_html__('Blue', 'wp-sales-pitch');?></option>
					       			</select>
					       		</td>
					       		<td>
					       			<label><?php  echo esc_html__('Width : (in px)', 'wp-sales-pitch');  ?></label>
					       			<input type="text" class="text_width_btn" name="text_width_btn[]" data-id="1" value="" placeholder="20">
					       			<br/><br/>
					       			<label><?php  echo esc_html__('Height : (in px)', 'wp-sales-pitch');  ?></label>
					       			<input type="text" class="text_height_btn" name="text_height_btn[]" data-id="1" value="" placeholder="20">
				       			</td>			       		
					       		<td>
					       			<button type="button" class="gen-short-text button"  data-id="1" id="gen-short-text" value="save_text"><?php echo esc_html__('Generate Shortcode', 'wp-sales-pitch');?></button>	       			

					       		</td>
					       		<td data-id="1" class="short-code-text">
					       			<input type="text" name="short_dis_text[]" id="short_text1" value="" readonly data-id="1">
					       			<button type="button" title="Remove" value="remove" class="remove_row btn button btn-close" style="display:none;"><?php echo esc_html__('X', 'wp-sales-pitch');?></button>
					       			<button type="button" data-toggle="tooltip" data-placement="bottom" title="Copied" class="button copy-short-text" data-id="1"><?php echo esc_html__('Copy', 'wp-sales-pitch');?></button>
					       			
					       		</td>
					       	</tr>
					       <?php } ?>
					       	<tr class="new-row-text"></tr>
					       	<tr>
					       		<td colspan="3">
					       			<button class="button button-primary" type="submit"><?php echo esc_html__('Save Changes', 'wp-sales-pitch');?></button>				       		
					       		</td>
					       		<td>
					       			<button class="button add-more" type="button" id="add-more-text" <?php echo esc_html($display2); ?>> <?php echo esc_html__('Add More', 'wp-sales-pitch');?></button>
					       		</td>
				       	</tr>
					   </table>
				</form>
				<input type="hidden" value="<?php echo esc_attr($countText); ?>" id="text-count" />
			</div>
		</div>
</div>