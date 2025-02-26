jQuery(document).ready(function(){

	// ON PAGE LOAD QUEUE UP WHICH BORDER OPACITY OPTIONS LOAD, DEPENDING ON THE SELECTION OF BORDER TYPE.

	if (jQuery('#bordertype').val() == 'dark' || jQuery('#bordertype').val() == 'none') {

		jQuery('input#lightopacity').parents('tr').hide();

	}

	if (jQuery('#bordertype').val() == 'light' || jQuery('#bordertype').val() == 'none') {

		jQuery('input#darkopacity').parents('tr').hide();

	}

	// WHEN BORDER TYPE IS CHANGED, CHANGE WHICH BORDER OPACITY OPTIONS ARE VISIBLE, DEPENDING ON THE SELECTION OF BORDER TYPE.

	jQuery('#bordertype').change(function() {

		if (jQuery(this).val() == '3D') {

			jQuery('input#lightopacity').parents('tr').show();

			jQuery('input#darkopacity').parents('tr').show();

			jQuery('#adminmenu li.menu-top,#adminmenu li.wp-menu-separator,#adminmenu #collapse-menu').css('border-top-width','1px');

			jQuery('#adminmenu li.menu-top,#wpadminbar,#adminmenu li.wp-menu-separator').css('border-bottom-width','1px');

			jQuery('#adminmenu').css('border-top-width','1px');

		}

		else if (jQuery(this).val() == 'light') {

			jQuery('input#lightopacity').parents('tr').show();

			jQuery('input#darkopacity').parents('tr').hide();

			jQuery('#adminmenu li.menu-top,#adminmenu li.wp-menu-separator,#adminmenu #collapse-menu').css('border-top-width','1px');

			jQuery('#adminmenu li.menu-top,#wpadminbar,#adminmenu li.wp-menu-separator').css('border-bottom-width','0');

			jQuery('#adminmenu').css('border-top-width','0');

		}

		else if (jQuery(this).val() == 'dark') {

			jQuery('input#lightopacity').parents('tr').hide();

			jQuery('input#darkopacity').parents('tr').show();

			jQuery('#adminmenu li.menu-top,#adminmenu li.wp-menu-separator,#adminmenu #collapse-menu').css('border-top-width','0');

			jQuery('#adminmenu li.menu-top,#wpadminbar,#adminmenu li.wp-menu-separator').css('border-bottom-width','1px');

			jQuery('#adminmenu').css('border-top-width','1px');

		}

		else {

			jQuery('input#lightopacity').parents('tr').hide();

			jQuery('input#darkopacity').parents('tr').hide();

			jQuery('#adminmenu li.menu-top,#adminmenu li.wp-menu-separator,#adminmenu #collapse-menu').css('border-top-width','0');

			jQuery('#adminmenu li.menu-top,#wpadminbar,#adminmenu li.wp-menu-separator').css('border-bottom-width','0');

			jQuery('#adminmenu').css('border-top-width','0');

		}

	});

	// LIVE PREVIEW THE CHANGES TO ADMIN BAR HEIGHT AS OPTION IS CHANGED

	jQuery('#restoreadminbarheight').change(function() {

		if (jQuery(this).val() == 'yes') {

			if (jQuery('html').hasClass('temp32px')) {jQuery('html').removeClass('temp32px');}

			jQuery('html').addClass('temp28px');

		} else {

			if (jQuery('html').hasClass('temp28px')) {jQuery('html').removeClass('temp28px');}

			jQuery('html').addClass('temp32px');

		}

	});

	// ON PAGE LOAD QUEUE UP WHETHER OR NOT THE ROW HOVER EFFECT COLOR PICKER WILL LOAD, DEPENDING ON THE SELECTION OF "SHOW ROW HOVER EFFECT?".
 
	if (jQuery('#showrowhovereffect').val() == 'no') {

		jQuery('input#rowhovercolor').parents('tr').hide();

	}

	// WHEN BORDER TYPE IS CHANGED, CHANGE WHETHER OR NOT THE ROW HOVER EFFECT COLOR PICKER IS VISIBLE, DEPENDING ON THE SELECTION OF "SHOW ROW HOVER EFFECT?".

	jQuery('#showrowhovereffect').change(function() {

		if (jQuery(this).val() == 'no') {

			jQuery('input#rowhovercolor').parents('tr').hide();

		}

		else {

			jQuery('input#rowhovercolor').parents('tr').show();

		}

	});

});