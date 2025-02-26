jQuery(document).ready(function(){


	jQuery('.acb_slider').each(function(){

		var inputID = '#'+jQuery(this).attr('id').replace('slider_','');

		jQuery(this).slider({
			value:jQuery(inputID).val(),
			min: 0,
			max: 100,
			step: 5,
			slide: function(event, ui) {
				inputID = '#'+jQuery(this).attr('id').replace('slider_','');
				jQuery(inputID+'display').text(ui.value+'%');
				jQuery(inputID).val(ui.value);
				updateBorders(inputID,ui.value);
			}
		});

	});

	/* THE SLIDER MOVE IN 5% INTERVALS, WHICH KEEPS IT FROM FOLLOWING THE USER'S MOUSE EXACTLY. TO
	   AVOID HAVING THE CURSOR CONSTANTLY FLIPPING FROM AUTO TO EW-RESIZE, THESE TWO FUNCTIONS ADD
	   THE EW-CURSOR CSS TO THE ENTIRE SLIDER TRACK WHEN THE SLIDER IS CLICKED DOWN, AND REMOVE IT
	   WHEN THE MOUSE CLICK IS LIFTED. THE MOUSEUP FUNCTION IS SET TO BODY IN CASE THE USER TRACKS
	   OFF OF THE SLIDER TRACK BEFORE RELEASING THE CLICK.  */

	jQuery('.acb_slider a').mousedown(function(){

		jQuery(this).parent().css('cursor','ew-resize');

	});

	jQuery('body').parent().mouseup(function(){

		jQuery('.acb_slider').css('cursor','auto');

	});

});

function updateBorders (inputID,opacity) {

	if (inputID == '#lightopacity') {

		var color = 'rgba(255,255,255,'+parseFloat(opacity)/100+')';

		jQuery('#adminmenu li.menu-top,#adminmenu li.wp-menu-separator,#adminmenu #collapse-menu').css('border-top-color',color);

	}

	else if (inputID == '#darkopacity') {

		var color = 'rgba(0,0,0,'+parseFloat(opacity)/100+')';

		jQuery('#adminmenu li.menu-top,#wpadminbar,#adminmenu li.wp-menu-separator').css('border-bottom-color',color);

		jQuery('#adminmenu').css('border-top-color',color);

	}

}