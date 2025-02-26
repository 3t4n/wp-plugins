(function ($) {

$(document).ready(function(){


	var controlled_palette_removal_message = 'Are you sure that you want to remove the controlled palette?  Any colors that you have in your palette will be lost after you save this setting. Note that if you Export Settings using the link below you could import these settings again later.';

    //<![CDATA[
	$('#blocksolid_options_tick_all').on('click', function() {
        $("input[type=checkbox].blocksolid_option_pro").each(function() {
                $(this).prop("checked", true);
        });
    });

	$('#blocksolid_options_untick_all').on('click', function() {

        $("input[type=checkbox].blocksolid_option_pro").each(function() {
            $(this).prop("checked", false);
        });

    });

	$('#blocksolid_options_set_defaults').on('click', function() {

        $(".pwd-vertical-spacing-option.small").each(function() {
                $(this).val('2vh');
        });

        $(".pwd-vertical-spacing-option.medium").each(function() {
                $(this).val('5vh');
        });

        $(".pwd-vertical-spacing-option.large").each(function() {
                $(this).val('9vh');
        });

		$(".pwd-horizontal-spacing-option.small").each(function() {
			$(this).val('2vw');
		});

		$(".pwd-horizontal-spacing-option.medium").each(function() {
			$(this).val('5vw');
		});

		$(".pwd-horizontal-spacing-option.large").each(function() {
			$(this).val('9vw');
		});

    });

	$('.blocksolid_field_allow_palette_control').on('change', function() {
	    var checked = $(this).is(':checked');
	    if(!(checked)) {
			if(!confirm(controlled_palette_removal_message)){
		         $(this).prop("checked", true);
		    }
		}
	});

}
);
})(jQuery);