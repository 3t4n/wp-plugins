<div class="welcome-panel-content">
	<div class="welcome-panel-column-container">
		<div class="welcome-panel-column"><br>
			<h2 class="title">
				Email Configurations
			</h2>
			<?php
				$developer_mode = esc_html(get_option('wpda_email_developer_mode'));

			?>
			<div class="form-field">
				<input type="checkbox" name="options[wpda_email_developer_mode]" id="wpda_email_developer_mode" value="1"
				<?php echo $developer_mode ?'checked="checked"':''; ?>> 
				<strong>Enable developer mode</strong> [<em> If enable developer mode all the email will send to given address based on Static IP</em>]
			</div>
			
			<table class="form-table" id="email_settings" style="width:80% !important;">
				<tbody style="<?php echo !$developer_mode?'display:none;':''; ?>">
					<tr class="form-field form-required <?php echo isset($error['wpda_email_to']) ? 'form-invalid' : ''; ?>">
						<th scope="row"><label for="wpda_email_to">Email To <span class="description">
						(required)</span></label></th>
						<td><input name="options[wpda_email_to]" type="text" id="wpda_email_to" 
						value="<?php echo esc_html(get_option('wpda_email_to')); ?>" aria-required="true" 
						autocapitalize="none" autocorrect="off" maxlength="200">
						<em> Multiple email should be seperated with with comma(,).</em></td>
					</tr>
					<tr class="form-field <?php echo isset($error['wpda_email_cc']) ? 'form-invalid' : ''; ?>">
						<th scope="row"><label for="wpda_email_cc">Email Cc </label></th>
						<td><input name="options[wpda_email_cc]" type="text" id="wpda_email_cc" 
						value="<?php echo esc_html(get_option('wpda_email_cc')); ?>"  
						autocapitalize="none" autocorrect="off" maxlength="200">
						<em> Multiple email should be seperated with with comma(,).</em></td>
					</tr>
					<tr class="form-field <?php echo isset($error['wpda_email_bcc']) ? 'form-invalid' : ''; ?>">
						<th scope="row"><label for="wpda_email_bcc">Email Bcc </label></th>
						<td><input name="options[wpda_email_bcc]" type="text" id="wpda_email_bcc" 
						value="<?php echo esc_html(get_option('wpda_email_bcc')); ?>" 
						autocapitalize="none" autocorrect="off" maxlength="200">
						<em> Multiple email should be seperated with with comma(,).</em></td>
					</tr>
					<tr class="form-field <?php echo isset($error['wpda_email_bcc']) ? 'form-invalid' : ''; ?>">
						<th scope="row"><label for="wpda_email_bcc">Reply To </label></th>
						<td><input name="options[wpda_email_reply_to]" type="text" id="wpda_email_reply_to" 
						value="<?php echo esc_html(get_option('wpda_email_reply_to')); ?>" 
						autocapitalize="none" autocorrect="off" maxlength="200">
						<em> Multiple email should be seperated with with comma(,).</em></td>
					</tr>
					<tr class="form-field">
						<th scope="row"><label for="wpda_email_header">Headers </label></th>
						<td><textarea name="options[wpda_email_header]" rows="5" 
						id="wpda_email_header" ><?php echo esc_textarea(get_option('wpda_email_header')); ?></textarea></td>
					</tr>
				</tbody>
			</table>
			<h3> Email Template Customize</h3>
			<table class="form-table" style="width:80% !important;">
				<tbody>				
					<tr class="form-field">
						<th scope="row"><label for="wpda_email_template_header">Email Template Header </label></th>
						<td><textarea name="options[wpda_email_template_header]" rows="5" 
						id="wpda_email_template_header" ><?php echo esc_textarea(stripslashes_deep(get_option('wpda_email_template_header'))); ?></textarea>
						<br> <a target="_blank" href="<?php echo plugin_dir_url(__FILE__); ?>email_template_doc.txt" > <i>Email template sample</i></a>
						</td>
					</tr>
					<tr class="form-field">
						<th scope="row"><label for="wpda_email_template_footer">Email Template Footer </label></th>
						<td><textarea name="options[wpda_email_template_footer]" rows="5" 
						id="wpda_email_template_footer" ><?php echo esc_textarea(stripslashes_deep(get_option('wpda_email_template_footer'))); ?></textarea></td>
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
	
	
	$('#wpda_email_developer_mode').click(function(event){
		if($("#wpda_email_developer_mode").prop('checked') == true){
			$("#email_settings tbody").show();
		}else{
			$("#email_settings tbody").hide();
		}
	});
	
	$('#save').click(function(event){
		$('.form-required').each(function() {
			if($("#wpda_email_developer_mode").prop('checked') == true){
				var value= $(this).find("input").val();
				if(value == ""){
					event.preventDefault();
					$(this).addClass("form-invalid");
				}else{
					$(this).removeClass("form-invalid");
				}
			}
		});
	});
	
	
});
</script>
