(function($) {
  $(document).ready(function() {
	  if ($('input.rad_over').is(':checked')) {
	  	$('input[name="lbll_settings[lbll_inside_pos]"]').attr('disabled', 'disabled');
			$('input[name="lbll_settings[lbll_inside_pos]"]').attr('checked',false);
	  } else {
	  	$('input[name="lbll_settings[lbll_inside_pos]"]').removeAttr('disabled');
	  }
	  
	  
  	$('input[name="lbll_settings[lbll_title_type]"]').on('click', function() {
		if ($(this).val() == '1') {
            $('input[name="lbll_settings[lbll_inside_pos]"]').attr('disabled', 'disabled');
			$('input[name="lbll_settings[lbll_inside_pos]"]').attr('checked',false);
        }
        else {
            $('input[name="lbll_settings[lbll_inside_pos]"]').removeAttr('disabled');
        }
	});
  });
})(jQuery);