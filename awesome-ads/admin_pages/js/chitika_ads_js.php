<script src="<?php echo PLUGIN_URL; ?>admin_pages/resources/jquery.tzCheckbox/jquery.tzCheckbox.js"></script>
<script src="<?php echo PLUGIN_URL; ?>admin_pages/resources/colorpicker/jscolor.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN_URL; ?>admin_pages/resources/jquery.tzCheckbox/jquery.tzCheckbox.css" />
<script>
$j=jQuery.noConflict();
$j(document).ready(function() {
	
	$j('#set_donation').click(function(){
		$j(this).hide();
		$j('#set_donation_box').show();
	});
	
	$j('#save_chitika').click(function(){
		btn = $j(this);
		loader = $j('#save_chitika_loader');
		btn.hide();
		loader.show();
		$j('#awesome_ads_chitika_donation_percent').val(validarInteiro($j('#awesome_ads_chitika_donation_percent').val()));
		var data = {
			action: 'save-awesome_ads_chitika',
			values: $j("#awesome_chitika_ads").serialize()
		};
		
		$j.post(ajaxurl, data, function(data) {
			if(data.STATUS == 'ok'){
				//
			}
			else{
				alert('Error');
			}
			btn.show();
			loader.hide();
		}, "json");
	});
	
	$j('#awesome_ads_chitika_chitika_id').click(function(){
		if($j(this).val() == ''){
			$j(this).blur(function(){
				if($j(this).val() != '' && $j('#awesome_ads_chitika_status').attr('checked')==false){
					$j('#awesome_ads_chitika_status').change();
				}
			});
		}
	});
	
	$j('#add_new_user').click(function(){
		addNewUser('chitika');
	});
	
	$j('.radio_style').tzCheckbox({labels:['<?php _e('Enabled', 'awesome_ads'); ?>','<?php _e('Disabled', 'awesome_ads'); ?>']});
	$j('.on_off_style').tzCheckbox({labels:['<?php _e('On', 'awesome_ads'); ?>','<?php _e('Off', 'awesome_ads'); ?>']});

});
</script>
