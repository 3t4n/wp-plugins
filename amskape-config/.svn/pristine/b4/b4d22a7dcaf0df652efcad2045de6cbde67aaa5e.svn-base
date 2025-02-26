<div class="welcome-panel-content">
	<div class="welcome-panel-column-container">
		<div class="welcome-panel-column"><br>
			<h2 class="title">
				IP Configurations
			</h2>
						
			<table class="form-table" id="email_settings" style="width:80% !important;">
				<tbody>
					<tr class="form-field form-required <?php echo isset($error['wpda_ip']) ? 'form-invalid' : ''; ?>">
						<th scope="row"><label for="wpda_ip">IP <span class="description">
						(required)</span></label></th>
						<td><input name="options[wpda_ip]" type="text" id="wpda_ip" 
						value="<?php echo esc_html(get_option('wpda_ip')); ?>" aria-required="true" 
						autocapitalize="none" autocorrect="off" maxlength="200">
						<em> Multiple IP should be seperated with with comma(,).</em></td>
						<td>My IP- <?php echo wpda_get_client_ip(); ?></td>
					</tr>
					<?php
						$developer_mode = esc_html(get_option('wpda_cf7_message'));
						$disable_gutenberg = esc_html(get_option('wpda_disable_gutenberg'));
					?>
					<tr class="form-field form-required">
						<th scope="row"><label for="wpda_cf7_message">Custom Validation Message </th>
						<td><input type="checkbox" name="options[wpda_cf7_message]" id="wpda_cf7_message" value="1"
							<?php echo $developer_mode ?'checked="checked"':''; ?>> 
							<strong>Enable Custom Validation Message</strong> 
						</td>
						<td><em> This option is available for only Contact Form 7 Plugin .</em></td>
					</tr>

					<tr class="form-field form-required">
						<th scope="row"><label for="wpda_cf7_message">Disable Gutenberg Editor ? </th>
						<td><input type="checkbox" name="options[wpda_disable_gutenberg]" id="wpda_disable_gutenberg" value="1"
							<?php echo $disable_gutenberg ?'checked="checked"':''; ?>>
							Yes
						</td>
						<td></td>
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
			<hr>
			<div class="code-box">
				<h3>Verify IP </h3>
				<ul>
					<li>
						<code>
							if(function_exists('wpda_verify_ip')){<br>
								//Where $ip is default My IP<br>
								wpda_verify_ip($ip); </br>
							}
						</code>
					</li>				
				</ul>
				<h3>Get IP List </h3>
				<ul>
					<li>
						<code>
							if(function_exists('get_ip')){<br>
								//Where $array_output true -> return array output, false -> comma seprated string<br>
								wpda_get_ip($array_output); </br>
							}
						</code>
					</li>
					
				</ul>

				<h3>For debug output </h3>
				<ul>
					<li>
						<code>
							if(function_exists('debug')){<br>
								//Where $input can be array|string|boolean<br>
								debug($input); </br>
							}							
						</code>
					</li>
					
				</ul>
				<h3>For debug and die output </h3>
				<ul>
					<li>
						<code>
							if(function_exists('dd')){<br>
								//Where $input can be array|string|boolean<br>
								dd($input); </br>
							}							
						</code>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
</div>
	<script type='text/javascript'>
jQuery(function($){
	
	$('#save').click(function(event){
		// $('.form-required').each(function() {
		// 	var value= $(this).find("input").val();
		// 	if(value == ""){
		// 		event.preventDefault();
		// 		$(this).addClass("form-invalid");
		// 	}else{
		// 		$(this).removeClass("form-invalid");
		// 	}
		// });
	});
	
	
});
</script>