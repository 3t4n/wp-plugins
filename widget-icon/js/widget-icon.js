jQuery(document).ready(function($)
{
	var iconsFontLibrarySelected = '';

	$(document).on('click', 'input.wi_ct_custom', function(event)
	{
		var tab = $(this).prop('id').split('_');
		tab.pop();
		$('div#'+tab.join('_')+'_div').fadeIn('slow');
	});

	$(document).on('click', 'input.wi_ct_inheir', function(event)
	{
		var tab = $(this).prop('id').split('_');
		tab.pop();
		$('div#'+tab.join('_')+'_div').fadeOut('slow');
	});

	$(document).on('hover', '#widgets-right, .inactive-sidebar', function()
	{
		$(this).find('.widget-icon-color-picker').wpColorPicker();
	});

	$(document).on('hover', '.widget-icon-library', function(event)
	{
		iconsFontLibrarySelected = $(this).find(':selected').val();
	});

	$(document).on('change', '.widget-icon-library', function(event)
	{
		var iconsFontLibrary = $(this).find(':selected').val();
		var tab = $(this).prop('id').split('_');
		tab.pop();

		if(iconsFontLibrary === 'elusive')
		{
			var libClassElu = 'select#'+tab.join('_')+'_elusive';
			var libClassFaw = 'select#'+tab.join('_')+'_font-awesome';
			var libClassLast = 'select#'+tab.join('_')+'_'+iconsFontLibrarySelected;

			$(libClassElu).prop('name', $(libClassLast).prop('name'));
			$(libClassLast).prop('name', '');
			$(libClassFaw).hide();
			$(libClassElu).fadeIn(300);
		}
		else if(iconsFontLibrary === 'font-awesome')
		{
			var libClassElu = 'select#'+tab.join('_')+'_elusive';
			var libClassFaw = 'select#'+tab.join('_')+'_font-awesome';
			var libClassLast = 'select#'+tab.join('_')+'_'+iconsFontLibrarySelected;

			$(libClassFaw).prop('name', $(libClassLast).prop('name'));
			$(libClassLast).prop('name', '');
			$(libClassElu).hide();
			$(libClassFaw).fadeIn(300);
		}
	});

	$(document).on('ajaxStop', function()
	{
		$('#widgets-right .widget-icon-color-picker, .inactive-sidebar .widget-icon-color-picker').wpColorPicker();
	});
});