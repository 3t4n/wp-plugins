jQuery(document).ready(function($) {

	$('#widgets-right .spcolor, .inactive-sidebar .spcolor').wpColorPicker();

	$(document).ajaxComplete(function() {
        $('#widgets-right .spcolor, .inactive-sidebar .spcolor').wpColorPicker();
    }); 

 });    