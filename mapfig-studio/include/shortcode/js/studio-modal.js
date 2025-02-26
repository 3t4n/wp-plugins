jQuery(function($) {
    $(document).ready(function(){
		$("input[name=studio_height], input[name=studio_width]").keydown(function (e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
				 // Allow: Ctrl+A
				(e.keyCode == 65 && e.ctrlKey === true) || 
				 // Allow: home, end, left, right, down, up
				(e.keyCode >= 35 && e.keyCode <= 40)) {
					 // let it happen, don't do anything
					 return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});
		
		$('#insert-studio-modal-map').click(open_media_window);
		$('#studio-admin-btn').click(function(e) {
			e.preventDefault();
			//Now retrieve all values
			var mapid  = $('select[name=studio_mapid]').val();
			var height = $('input[name=studio_height]').val();
			var width  = $('input[name=studio_width]').val();
			
			if(height == "" || width == "") {
				$('#studio-error').html('Height and Width is required');
				return;
			}
			else if(mapid==""){
				$('#studio-error').html('Map field is required');
				return;
			}
			
			$('select[name=studio_mapid]').val('');
			$('#studio-error').html('');
			
			//Now Create Link
			var linkcode = '[StudioMap mapid="'+mapid+'" height="'+height+'" width="'+width+'"]';
			
			send_to_editor(linkcode);
			tb_remove();
		});
	});
	
    function open_media_window() {
		tb_show('<i class="fa fa-leaf fa-2"></i> Studio Map', '#TB_inline?height=400&width=305&inlineId=studio-admin-input&modal=false', null);	
		var tbWindow = $('#TB_window');
		w = 350;
		h = 320;
		tbWindow.width(w);
		tbWindow.height(h);
		tbWindow.css('top',($(window).height()-h)/2);
		tbWindow.css('left',($(window).width()-w)/2);
		tbWindow.css('margin-left',0);		
		return false;
    }
});