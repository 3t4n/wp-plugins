<?php
add_action('print_footer_scripts', 'ftm_js_form', 80);
function ftm_js_form() {
	?>
	<script type="text/javascript" >
	ftm_forms = [];
	jQuery(document).ready(function() {
		//	find form
		<?php 
		$forms = get_posts(['post_type' => 'ftm_form']);
		foreach($forms as $form){
		?>
		ftm_forms.push({name: "<?php echo get_post_meta( $form->ID, 'ftm_form_id', true ) ?>", id: "<?php echo $form->ID ?>"})
		<?php
			}
		?>
		ftm_reload_form()
	});
	
	//	ajax form
	jQuery(document).on("submit", "[ftm_form]",function(e){
		var ftm_form = jQuery(this);
		jQuery(ftm_form).trigger('ftm_submit');
		e.preventDefault();
		var ftm_data = new FormData();
		var ftm_form_data = new FormData(this);
		for(var ftm_pair of ftm_form_data.entries()) {
			if(ftm_pair[1].name){
				ftm_data.append('ftm_form_data['+ftm_pair[0]+'][]',ftm_pair[1],ftm_pair[1].name)
			}else{
				ftm_data.append('ftm_form_data['+ftm_pair[0]+']',ftm_pair[1])
			}
		}
		ftm_data.append("action", "ftm_form_submit");
		ftm_data.append("ftm_nonce", "<?php echo wp_create_nonce('ftm_ajax-nonce') ?>");
		ftm_data.append("ftm_post", jQuery(this).attr('ftm_form'));
		jQuery.ajax({
			type: 'POST',
			url: "<?php echo admin_url('admin-ajax.php') ?>",
			data: ftm_data,
			processData: false,
			contentType: false,
			success: function(data){
				try
				{
				  	response_data = JSON.parse(data);
				  	window[ response_data.respond ](response_data.form_id,response_data.form_title,response_data.field_title,response_data.field_name);
				  	jQuery(ftm_form).trigger(response_data.respond);
				  	jQuery(ftm_form).trigger('ftm_respond');
				}
			  	catch(e)
				{
				   console.log(data,e);
				}
			}
		});
		return false;
	})
	function ftm_validate_required(form_id,form_title,field_title,field_name){
		<?php echo get_option('ftm_validate_required'); ?>
	}
	function ftm_validate_type(form_id,form_title,field_title,field_name){
		<?php echo get_option('ftm_validate_type'); ?>
	}
	function ftm_mail_failed(form_id,form_title,field_title,field_name){
		<?php echo get_option('ftm_mail_failed'); ?>
	}
	function ftm_mail_success(form_id,form_title,field_title,field_name){
		<?php echo get_option('ftm_mail_success'); ?>
	}
	function ftm_reload_form(){
		jQuery.each(ftm_forms,function(key,ftm_form){
			console.log(ftm_form.name);
			jQuery(ftm_form.name).attr("ftm_form",ftm_form.id);
		})
	}
	</script>
	<?php
}
?>