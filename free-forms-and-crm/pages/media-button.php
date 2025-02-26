<script type="text/javascript">
	jQuery(document).ready(function($) {
	    $( '#add_wbs_form' ).submit(function(e){
	        e.preventDefault();
			var form_id = $( '#wbsfselector' ).val();
	        window.send_to_editor( '[wbsf id="' + form_id + '"]' );
	        window.tb_remove();
			$.ajax({
				type: "POST",
				url:'admin-ajax.php',
				dataType: 'text',
				data: {
					action: 'wbs_update_form', 
					form_id: form_id
				},
				success : function(responseText) {
					$('#free-forms-crm-update-success').show();
				}	
			});
	    });
		
		
	});
</script>
<div id="wbs_form">
	<form id="add_wbs_form" class="media-upload-form type-form validate">
		<h3 class="media-title"><?php echo esc_html_e("Insert WBS Form", 'wbs', 'free-forms-and-crm'); ?></h3>
		<p><?php echo esc_html_e("Select a form below to insert into any Post or Page.", 'free-forms-and-crm'); ?></p>
		<select id="wbsfselector" name="wbsfselector">
			<?php foreach( $forms as $form ) : 
			?>
				<option value="<?php echo esc_attr($form->id); ?>"><?php echo esc_html($form->name); ?></option>
			<?php endforeach; ?>
		</select>
		<p><input type="submit" class="button-primary" value="Insert Form" /></p>
	</form>
</div>