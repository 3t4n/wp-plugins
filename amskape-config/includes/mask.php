<div class="welcome-panel-content">
	<div class="welcome-panel-column-container">
		<div class="welcome-panel-column"><br>
			<h2 class="title">
				Field Mask
			</h2>
			<em><a href="https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html" target="_blank">More examples</a></em>
			<table class="form-table" id="email_settings" style="width:80% !important;">
				<thead>
					<tr class="form-field">
						<th scope="row">
							Selector Class Name
						</th>
						<th scope="row">
							Masking Pattern 
						</th>
				</thead>
				<tbody >	
					<?php 
					$index = 0;
					$field_classess = get_option('wpda_field_class');
					if(!empty($field_classess)){
						foreach($field_classess as $index => $class){
							if($class == '')
								continue;
						?>			
							<tr class="form-field">
								<td class="form-required  <?php echo isset($error['wpda_field_class_'.$index]) ? 'form-invalid' : ''; ?>">
									<input name="options[wpda_field_class][]" type="text" id="wpda_field_class_<?php echo $index; ?>" 
									value="<?php echo esc_html(get_option('wpda_field_class')[$index]); ?>" aria-required="true" 
									autocapitalize="none" autocorrect="off" maxlength="200" data-value="<?php echo $index; ?>">
								</td>
								<td class="form-required <?php echo isset($error['wpda_field_pattern_'.$index]) ? 'form-invalid' : ''; ?>">
									<input name="options[wpda_field_pattern][]" type="text" id="wpda_field_pattern_<?php echo $index; ?>" 
									value="<?php echo esc_html(get_option('wpda_field_pattern')[$index]); ?>" aria-required="true" 
									autocapitalize="none" autocorrect="off" maxlength="200" data-value="<?php echo $index; ?>">
								</td>
								<td><input name="options[wpda_field_clear][<?php echo $index; ?>]" type="checkbox" id="wpda_field_clear_<?php echo $index; ?>" 
									value="1" <?php echo esc_html(get_option('wpda_field_clear')[$index]) == 1?'checked="checked"':''; ?>
									data-value="<?php echo $index; ?>"> Clear if not match
								</td>
							</tr>
						<?php 
							$index++;
						}
					}
					?>
					<tr class="form-field">
						<td class="form-required">
							<input name="options[wpda_field_class][]" type="text" id="wpda_field_class_<?php echo $index; ?>" 
							value="" aria-required="true" data-value="<?php echo $index; ?>"
							autocapitalize="none" autocorrect="off" maxlength="200" placeholder="phone">
						</td>
						<td class="form-required">
							<input name="options[wpda_field_pattern][]" type="text" id="wpda_field_pattern_<?php echo $index; ?>" 
							value="" aria-required="true" data-value="<?php echo $index; ?>"
							autocapitalize="none" autocorrect="off" maxlength="200" placeholder="000-000-0000">
						</td>
						<td>
							<input name="options[wpda_field_clear][<?php echo $index; ?>]" type="checkbox" id="wpda_field_clear_<?php echo $index; ?>" 
							value="1" data-value="<?php echo $index; ?>"> Clear if not match
						</td>
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
			var index= $(this).find("input").data('value');
			var field_class = $("#wpda_field_class_"+index).val();
			var field_pattern = $("#wpda_field_pattern_"+index).val();
			
			if(value == "" && (field_class != '' || field_pattern != '')){
				event.preventDefault();
				$(this).addClass("form-invalid");
			}
			else{
				$(this).removeClass("form-invalid");
			}
			
		});
	});
	
	
});
</script>