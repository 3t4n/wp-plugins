jQuery(document).ready(function($) {
	
	// changes the tabs
	function adsmax_privacydocs_updateElementsClass(e) {
		var buttondivs = document.querySelectorAll('.adsmax_privacydocs_pagetab');
			buttondivs.forEach(function(buttondiv) {
			buttondiv.classList.remove('adsmax_privacydocs_pagetab_active', 'adsmax_privacydocs_pagetab_active');
			buttondiv.classList.add("adsmax_privacydocs_pagetab");
		});
		e.target.classList.add("adsmax_privacydocs_pagetab_active");
	}
	
	// show create all page
	$(document).on('click', '#adsmax_privacydocs_createall', function(e) {
		e.preventDefault();
		adsmax_privacydocs_updateElementsClass(e);
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'adsmax_privacydocs_show_page',
				thepage: 'createall'
			},
			success: function(response) {
				$("#adsmax_privacydocs_showpage").html(response);
			},
			error: function(xhr, status, error) {
				console.log(xhr.responseText);
			}
		});
	});
	
	// show privacy page
	$(document).on('click', '#adsmax_privacydocs_privacy', function(e) {
		e.preventDefault();
		adsmax_privacydocs_updateElementsClass(e);
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'adsmax_privacydocs_show_page',
				thepage: 'privacy'
			},
			success: function(response) {
				$("#adsmax_privacydocs_showpage").html(response);
			},
			error: function(xhr, status, error) {
				console.log(xhr.responseText);
			}
		});
	});
	
	// show terms page
	$(document).on('click', '#adsmax_privacydocs_terms', function(e) {
		e.preventDefault();
		adsmax_privacydocs_updateElementsClass(e);
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'adsmax_privacydocs_show_page',
				thepage: 'terms'
			},
			success: function(response) {
				$("#adsmax_privacydocs_showpage").html(response);
			},
			error: function(xhr, status, error) {
				console.log(xhr.responseText);
			}
		});
	});
	
	// show cookies page
	$(document).on('click', '#adsmax_privacydocs_cookies', function(e) {
		e.preventDefault();
		adsmax_privacydocs_updateElementsClass(e);
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'adsmax_privacydocs_show_page',
				thepage: 'cookies'
			},
			success: function(response) {
				$("#adsmax_privacydocs_showpage").html(response);
			},
			error: function(xhr, status, error) {
				console.log(xhr.responseText);
			}
		});
	});
	
	// show eula page
	$(document).on('click', '#adsmax_privacydocs_eula', function(e) {
		e.preventDefault();
		adsmax_privacydocs_updateElementsClass(e);
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'adsmax_privacydocs_show_page',
				thepage: 'eula'
			},
			success: function(response) {
				$("#adsmax_privacydocs_showpage").html(response);
			},
			error: function(xhr, status, error) {
				console.log(xhr.responseText);
			}
		});
	});
	
	// show disclaimers page
	$(document).on('click', '#adsmax_privacydocs_disclaimers', function(e) {
		e.preventDefault();
		adsmax_privacydocs_updateElementsClass(e);
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'adsmax_privacydocs_show_page',
				thepage: 'disclaimers'
			},
			success: function(response) {
				$("#adsmax_privacydocs_showpage").html(response);
			},
			error: function(xhr, status, error) {
				console.log(xhr.responseText);
			}
		});
	});
	
	// create all pages
	$(document).on('click', '#adsmax_privacydocs_btn', function(e) {
		e.preventDefault();
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'adsmax_privacydocs_create_legal_pages',
				thepage: 'all'
			},
			success: function(response) {
				$("#adsmax_privacydocs_showpage").prepend('<div id="wpautoaidocs_success">Pages created successfully!</div>');
				console.log('');
			}
		});
	});
	
	// create privacy page
	$(document).on('click', '#adsmax_privacydocs_createpage_privacy', function(e) {
		e.preventDefault();
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'adsmax_privacydocs_create_legal_pages',
				thepage: 'privacy'
			},
			success: function(response) {
				$("#adsmax_privacydocs_copysuccess").html('<p>Page created successfully!</p>');
				console.log('');
			}
		});
	});
	
	// create terms page
	$(document).on('click', '#adsmax_privacydocs_createpage_terms', function(e) {
		e.preventDefault();
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'adsmax_privacydocs_create_legal_pages',
				thepage: 'terms'
			},
			success: function(response) {
				$("#adsmax_privacydocs_copysuccess").html('<p>Page created successfully!</p>');
				console.log('');
			}
		});
	});
	
	// create cookies page
	$(document).on('click', '#adsmax_privacydocs_createpage_cookies', function(e) {
		e.preventDefault();
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'adsmax_privacydocs_create_legal_pages',
				thepage: 'cookies'
			},
			success: function(response) {
				$("#adsmax_privacydocs_copysuccess").html('<p>Page created successfully!</p>');
				console.log('');
			}
		});
	});
	
	// create eula page
	$(document).on('click', '#adsmax_privacydocs_createpage_eula', function(e) {
		e.preventDefault();
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'adsmax_privacydocs_create_legal_pages',
				thepage: 'eula'
			},
			success: function(response) {
				$("#adsmax_privacydocs_copysuccess").html('<p>Page created successfully!</p>');
				console.log('');
			}
		});
	});
	
	// create disclaimers page
	$(document).on('click', '#adsmax_privacydocs_createpage_disclaimers', function(e) {
		e.preventDefault();
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'adsmax_privacydocs_create_legal_pages',
				thepage: 'disclaimers'
			},
			success: function(response) {
				$("#adsmax_privacydocs_copysuccess").html('<p>Page created successfully!</p>');
				console.log('');
			}
		});
	});
	
	// copy text
	$(document).on('click', '#adsmax_privacydocs_copy_btn', function(e) {
		var text = $('#adsmax_privacydocs_copy_text').text(); 
		var textarea = $('<textarea>').val(text); 
		$('body').append(textarea); 
		textarea.select(); 
		document.execCommand('copy'); 
		textarea.remove(); 
		$('#adsmax_privacydocs_copysuccess').html('<p>Text copied!</p>');
	});
	
	// copy html
	$(document).on('click', '#adsmax_privacydocs_copyhtml_btn', function(e) {
		console.log('click html');
		var textarea = document.getElementById('adsmax_privacydocs_codebox');
		textarea.select(); 
		document.execCommand('copy'); 
		$('#adsmax_privacydocs_copysuccess').html('<p>HTML copied!</p>');
	});


});
