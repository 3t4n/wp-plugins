jQuery(document).ready(function(){

	//IN CASE THE USER HITS REFRESH, THIS ENSURES THAT THE COLOR IS THE SAVED COLOR, NOT ANYTHING TEMPORARY

	jQuery('#rowhovercolor').val(jQuery('#rowhovercolorrefresh').val());

	//QUEUE UP THE COLOR PICKER

	jQuery('#rowhovercolor').wpColorPicker();

	//SET THE COLOR PICKER BUTTON TO HAVE NO OUTLINE. IF DONE VIA A CSS STYLESHEET, THE RULE WON'T BE APPLIED BECAUSE THIS ELEMENT IS DYNAMICALLY CREATED

	jQuery('.wp-color-result').css('outline','0');

});