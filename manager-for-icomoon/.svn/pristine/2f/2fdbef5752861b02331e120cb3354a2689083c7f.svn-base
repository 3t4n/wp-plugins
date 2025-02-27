jQuery( document ).ready(function() {
	m4i_checkbox_restore();
	jQuery('#restore-confirm').click(function(){
		m4i_checkbox_restore();
	});

	jQuery('.managerforicomoon-page-icons--copy').click(function(){
		let text = jQuery(this).data('text');
		let message = jQuery(this).data('message');
		m4i_copy_to_clipboard(text);
		m4i_toast(message, true, '4000');
	});

	jQuery('.managerforicomoon-toast').fadeIn( function(){
		if(jQuery(this).hasClass('managerforicomoon-toast--autohide')){
			setTimeout(function() { 
				jQuery('.managerforicomoon-toast--autohide').fadeOut(function(){
					jQuery(this).remove();
				});
			}, 3500);
		}
	});
});

function m4i_checkbox_restore(){
	if( jQuery('#restore-confirm').is(':checked') ){
		jQuery('#managerforicomoon-restore').prop("disabled",false);
	} else {
		jQuery('#managerforicomoon-restore').prop("disabled",true);
	}
}

function m4i_close_toast(element){
    jQuery(element).closest('.managerforicomoon-toast').fadeOut(function(){
        jQuery(this).remove();
    });
}

function m4i_copy_to_clipboard(txt){
	var cb = document.getElementById("clipboard");
	cb.value = txt;
	cb.style.display='block';
	cb.select();
	document.execCommand('copy');
	cb.style.display='none';
}

function m4i_toast(txt, replace, autoHide){
	var cssClass = 'managerforicomoon-toast managerforicomoon-toast--info';
	if(autoHide) {
		cssClass += ' managerforicomoon-toast--autohide';
	}
	let toast = '<div class="'+cssClass+'" style="display:none" data-duration="50000">'+
				txt+
				'<span class="managerforicomoon-toast--close dashicons dashicons-no-alt" onclick="m4i_close_toast(this);"></span>'
				'</div>';
	if(replace === true) {
		jQuery('.managerforicomoon-toast--container').html(toast);
	} else {
		jQuery('.managerforicomoon-toast--container').append(toast);
	}
	var last_toast = jQuery('.managerforicomoon-toast--container').children().last();
    last_toast.fadeIn();
    if (autoHide) {
        setTimeout(function() { 
            last_toast.fadeOut(function() {
                last_toast.remove();
            });
        }, autoHide);
    }
}