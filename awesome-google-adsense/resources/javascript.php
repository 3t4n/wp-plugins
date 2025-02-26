<?php $directory_resources = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));?>
<link rel="stylesheet" href="<?=$directory_resources?>colorpicker/css/colorpicker.css" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="<?=$directory_resources?>colorpicker/js/colorpicker.js"></script>
<script type="text/javascript" src="<?=$directory_resources?>colorpicker/js/eye.js"></script>
<script type="text/javascript" src="<?=$directory_resources?>colorpicker/js/utils.js"></script>
<script type="text/javascript">
	var aff_code = '';
	$(document).ready(function(){
		aff_code = $('#aga_oh_api_key');
		$('#aga_border_color').keyup(function(){
			$('#aga_colorSelector1 div').css('backgroundColor', '#' + $(this).val());
		})
		$('#aga_background_color').keyup(function(){
			$('#aga_colorSelector2 div').css('backgroundColor', '#' + $(this).val());
		})
		$('#aga_link_color').keyup(function(){
			$('#aga_colorSelector3 div').css('backgroundColor', '#' + $(this).val());
		})
		$('#aga_text_color').keyup(function(){
			$('#aga_colorSelector4 div').css('backgroundColor', '#' + $(this).val());
		})
		$('#aga_url_color').keyup(function(){
			$('#aga_colorSelector5 div').css('backgroundColor', '#' + $(this).val());
		})
		$('#aga_colorSelector5').ColorPicker({
			color: '#<?=$values->aga_url_color?>',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#aga_colorSelector5 div').css('backgroundColor', '#' + hex);
				$('#aga_url_color').val(hex);
			},
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).ColorPickerHide();
			}
		});
		$('#aga_colorSelector4').ColorPicker({
			color: '#<?=$values->aga_text_color?>',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#aga_colorSelector4 div').css('backgroundColor', '#' + hex);
				$('#aga_text_color').val(hex);
			},
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).ColorPickerHide();
			}
		});
		$('#aga_colorSelector3').ColorPicker({
			color: '#<?=$values->aga_link_color?>',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#aga_colorSelector3 div').css('backgroundColor', '#' + hex);
				$('#aga_link_color').val(hex);
			},
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).ColorPickerHide();
			}
		});
		$('#aga_colorSelector2').ColorPicker({
			color: '#<?=$values->aga_background_color?>',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#aga_colorSelector2 div').css('backgroundColor', '#' + hex);
				$('#aga_background_color').val(hex);
			},
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).ColorPickerHide();
			}
		});
		$('#aga_colorSelector1').ColorPicker({
			color: '#<?=$values->aga_border_color?>',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#aga_colorSelector1 div').css('backgroundColor', '#' + hex);
				$('#aga_border_color').val(hex);
			},
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).ColorPickerHide();
			}
		});
		
		$('#set_donation').click(function(){
			$(this).hide();
			$('#set_donation_row').show();
		});
		
		$('#aga_form_save2, #aga_form_save1, #aga_form_save3').click(function() {
			saveAll();
		  	return false;
		});
		$('#aga_reset_colors').click(function(){
			var colors = {};
			$.data(colors,'aga_border_color','FFFFFF')
			$.data(colors,'aga_background_color','FFFFFF')
			$.data(colors,'aga_link_color','0000FF')
			$.data(colors,'aga_text_color','000000')
			$.data(colors,'aga_url_color','008000')
			$.each($.data(colors), function(k,v){
				$('#'+k).val(v);	
			});
			$('#aga_border_color, #aga_background_color, #aga_link_color, #aga_text_color, #aga_url_color, ').keyup();		
		});
		$('#oh_show').click(function(){
			$(this).hide();
			$('#aga_oh').show();
			$('#oh_hide').show();
		});
		$('#oh_hide').click(function(){
			$(this).hide();
			$('#aga_oh').hide();
			$('#oh_show').show();
		});
		$('#ads_show').click(function(){
			$(this).hide();
			$('#aga_ads').show();
			$('#ads_hide').show();
		});
		$('#ads_hide').click(function(){
			$(this).hide();
			$('#aga_ads').hide();
			$('#ads_show').show();
		});
		$('.aga_checkbox').change(function(){
			verifyCheckboxes();
		});
		verifyCheckboxes();
		$('#aga_language').change(function(){
			$.post("<?php echo WP_PLUGIN_URL; ?>/awesome-google-adsense/ajax.php",{
			action: 'change_language',
			aga_language: $('#aga_language').val()
			} ,
			function(data){
				if(data.STATUS == 'ok')
					location.href = window.location.pathname+'?page=awesome-google-adsense';
				else
					alert('<?=$trans['0066']?>');
			 }		
		, "json");	
		});
	});
	function saveAll(){
		//buttons and loaders
		btn = $('#aga_form_save1, #aga_form_save2, #aga_form_save3');
		loader = $('#aga_form_save1_loader, #aga_form_save2_loader, #aga_form_save3_loader');
		btn.hide();
		loader.show();
		
		
		//General Settings Adsense
		$.post("<?php echo WP_PLUGIN_URL; ?>/awesome-google-adsense/ajax.php",{
			action: 'save_aga_ads_general_settings',
			aga_ads_id: $('#aga_ads_id').val(),
			aga_ads_chanel: $('#aga_ads_chanel').val()
			} ,
			function(data){
				if(data.STATUS != 'ok'){
					if(data.ERROR_MESSAGE=='wrong_api_key')
						alert('<?=$trans['0064']?>');
					else
						alert('<?=$trans['0066']?>');
				}
				btn.show();
				loader.hide();
			 }		
		, "json");
		
		
		//Print Settings
		values_s = $('#aga_form_print_settings').serialize();
		$.post("<?php echo WP_PLUGIN_URL; ?>/awesome-google-adsense/ajax.php",{
			action: 'save_aga_print_settings',
			values: values_s
			} ,
			function(data){
				if(data.STATUS != 'ok'){
					alert('<?=$trans['0066']?>');
				}
			 }		
		, "json");
		
	}
	
	function verifyCheckboxes(){
		flag=0;
		$(".aga_checkbox").each(function(){
			temp = $(this).attr('checked');
			if	(temp==true)
				flag=1;
		});
		if (flag==0)
			$('#aga_label_ai_468_60').attr('checked', 'true');
	}	
</script>
