function fadeMessage(){
	jQuery('#message').fadeOut(1000,function(){
		jQuery(this).remove();
	});
}
jQuery(document).ready(function($){
	$('.CodeMirror').wrap('<div id="cm-wrap"></div>');	// necessary for ui-bug applying resizable to an overflow:hidden
	$('#cm-wrap').resizable();

	$('#template').submit(function(){
		$('#submit').val('Updating...');
		$('#submit').attr('disabled','disabled');

		$.post($(this).attr('action'), $(this).serialize(), function(){
			$('div.wrap h2').after('<div class="updated" id="message"><p>File edited successfully.</p></div>');

			$('html, body').animate({scrollTop:0}, 'slow', function(){
				$('#submit').removeAttr('disabled');
				$('#submit').val('Update File');

			});

			setTimeout('fadeMessage()',3000);
		});
		return false;
	});
});
