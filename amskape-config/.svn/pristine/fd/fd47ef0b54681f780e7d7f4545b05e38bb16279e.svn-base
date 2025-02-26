<div class="welcome-panel-content">
	<div class="welcome-panel-column-container">
		<div class="welcome-panel-column"><br>
			<h2 class="title">
				Admin Login
			</h2>

			<table class="form-table" id="email_settings" style="width:80% !important;">
				<tbody >
					<tr class="form-field form-required <?php echo isset($error['wpda_logo_url']) ? 'form-invalid' : ''; ?>">
						<th scope="row"><label for="wpda_logo_url">Logo URL <span class="description">
						(required)</span></label></th>
						<td><input name="options[wpda_logo_url]" type="text" id="wpda_logo_url" 
						value="<?php echo esc_html(get_option('wpda_logo_url')); ?>" aria-required="true" 
						autocapitalize="none" autocorrect="off" maxlength="500"></td>
					</tr>
					<tr class="form-field">
						<th scope="row"><label for="wpda_bg_size">Logo Size </label></th>
						<td><input name="options[wpda_bg_size]" type="number" id="wpda_bg_size" style="width:auto;"
						value="<?php echo esc_html(get_option('wpda_bg_size')); ?>"  
						step=".5" min="0" max="1000">px</td>
					</tr>
					<tr class="form-field">
						<th scope="row"><label for="wpda_logo_bg_color">Logo Background Color </label></th>
						<td><input name="options[wpda_logo_bg_color]" type="text" id="wpda_logo_bg_color"
						value="<?php echo esc_html(get_option('wpda_logo_bg_color')); ?>"  
						maxlength="20"></td>
					</tr>
					<tr class="form-field">
						<th scope="row"><label for="wpda_bg_position">Logo Position </label></th>
						<td>
						<select name="options[wpda_bg_position]" id="wpda_bg_position">
							<?php foreach(['center','initial','unset','top','right','bottom','left'] as $pos): ?>
								<option <?php echo $pos == esc_html(get_option('wpda_bg_position'))?'selected="selected"':''?>
								value="<?php echo $pos;?>"><?php echo $pos;?></option>
							<?php endforeach; ?>
						</select>
						</td>
					</tr>
					<tr class="form-field">
						<th scope="row"><label for="wpda_bg_color">Background Color </label></th>
						<td><input name="options[wpda_bg_color]" type="text" id="wpda_bg_color"
						value="<?php echo esc_html(get_option('wpda_bg_color')); ?>"  
						maxlength="20"></td>
					</tr>
					<tr class="form-field">
						<th scope="row"><label for="wpda_login_bg_color">Login Box Background Color </label></th>
						<td><input name="options[wpda_login_bg_color]" type="text" id="wpda_login_bg_color"
						value="<?php echo esc_html(get_option('wpda_login_bg_color')); ?>"  
						maxlength="20"></td>
					</tr>
					<tr class="form-field">
						<th scope="row"><label for="wpda_login_color">Login Text Color </label></th>
						<td><input name="options[wpda_login_color]" type="text" id="wpda_login_color"
						value="<?php echo esc_html(get_option('wpda_login_color')); ?>"
						maxlength="20"></td>
					</tr>
					<tr class="form-field">
						<th scope="row"><label for="wpda_additional_style">Additional Style</label></th>
						<td><textarea name="options[wpda_additional_style]" rows="10" 
						id="wpda_additional_style" ><?php echo esc_html(get_option('wpda_additional_style')); ?></textarea></td>
					</tr>
					
				</tbody>
				<tfoot>
					<tr class="form-field">
						<th scope="row"></th>
						<td>
							<input type="submit" name="save" class="button button-primary" id="save" value="Save Changes">
							<input type="submit" name="cancel" value="Cancel" class="button button-default ">
						</td>
					</tr>
				</tfoot>
			</table>
			 
		</div>
	</div>
</div>
	<script type='text/javascript'>
jQuery(function($){
	
	$('#save').click(function(event){
		$('.form-required').each(function() {
			var value= $(this).find("input").val();
			if(value == ""){
				event.preventDefault();
				$(this).addClass("form-invalid");
			}else{
				$(this).removeClass("form-invalid");
			}
		});
	});
	
	
});
</script>