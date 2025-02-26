jQuery(function($){
	$('#wmsg_button').on('click', function(){		
		var wmsg_veriler = $('#wmsg_veriler').serialize();
		document.getElementById('wmsg_bekle1').style.display='inline'
		$.ajax({
			url: wmsg_form_ajax.ajax_url,
			type:'POST',
			data : {
				action : 'wmsg_form_ajax',
				recaptcha : 2,
				security : wmsg_form_ajax.ajax_nonce,
				data : wmsg_veriler
			},	
			success:function(e){
				$('#wmsg_gelenveri').html('').html(e);
				document.getElementById('wmsg_bekle1').style.display='none'
			}
		});
	});


	$('#wmsg_button2').on('click', function(){
		var wmsg_veriler2 = $('#wmsg_veriler2').serialize();
		document.getElementById('wmsg_bekle2').style.display='inline'
		$.ajax({
			url: wmsg_form_ajax.ajax_url,
			type:'POST',
			data : {
				action : 'wmsg_form_ajax',
				recaptcha : 1,
				security : wmsg_form_ajax.ajax_nonce,
				data : wmsg_veriler2
			},	
			success:function(e){
				$('#wmsg_gelenveri2').html('').html(e);
				document.getElementById('wmsg_bekle2').style.display='none'
			}
		});
		
	});

	var modal = document.getElementById('wmsg_id01');

	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}



},jQuery)