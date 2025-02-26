<div class="welcome-panel-content">
	<div class="welcome-panel-column-container">
		<div class="welcome-panel-column">
			<h2 class="title">
				Test mail
			</h2>
				<strong> Email Developer Mode 
				<?php
					if(	get_option('wpda_email_developer_mode')){
						echo '<span style="color:green;"> Enabled</span>';
						if(!wpda_verify_ip())
							echo ' But Current IP <span  style="color:red;">'.(wpda_get_client_ip()).'</span> is not added in IP List</span>';
					}else{
						echo '<span style="color:red;"> Disabled</span>';
					}
					?></strong>		
			<table class="form-table" style="width:80% !important;">
				<tbody>
					<tr class="form-field form-required">
						<th scope="row"><label for="wpda_ip">Email To <span class="description">
						(required)</span></label></th>
						<td><input name="to" type="email" id="to" 
						value="" aria-required="true" 
						autocapitalize="none" autocorrect="off" maxlength="80"></td>
					</tr>
					
				</tbody>
				<tfoot>
					<tr class="form-field">
						<th scope="row"></th>
						<td>
							<input type="submit" name="send" class="button button-primary" id="send" value="Send Mail">
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
	
	$('#send').click(function(event){
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