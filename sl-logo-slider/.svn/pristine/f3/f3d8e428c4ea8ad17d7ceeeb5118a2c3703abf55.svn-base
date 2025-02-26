jQuery(document).ready(function ($) {
	
	function call_sls_ajax_request(paramUrl, paramData){
		$.ajax({
			url: paramUrl,
			type: 'POST',
			data : paramData,
			contentType: false,
			processData: false,
			success: function(response){
				
				if(response.success === false){ 
					$('#popmsg').removeClass('notice-success');
					$('#popmsg').addClass('notice-error');
					$('#popmsg').show();
				}
				else { 
					$('#popmsg').removeClass('notice-error');
					$('#popmsg').addClass('notice-success');
					$('#popmsg').show();
					window.location.reload(true);
				}
				
				$('.message > span').html(response.msg);
			},
			error: function () {
				alert('Ajax Error!!');
			}
		});
		
		return false;		
	}
	
	$('.sl-btn-notice').on('click', function(){
		$('#popmsg').hide();
		return;
	});
	
	// Update SLS Title Slider
    $('#slsFormTitle').submit( function(event) {
		
		event.preventDefault();
		
		var serializeData = $(this).serializeArray();
		var postData = new FormData();
		
		$.each(serializeData, function(i, val) {
			postData.append(val.name, val.value);
		});
		
		var paramUrl = ajax_object.sls_ajax_url + '?action=sls_action_pro&sls_actions=update_title';
		call_sls_ajax_request(paramUrl, postData);		
		
    });
	
	// Delete SLS Title Slider
	$('#slsDelTitle').on('click', function(event){
		
		event.preventDefault();
		var paramUrl = ajax_object.sls_ajax_url + '?action=sls_action_pro&sls_actions=delete_title';
		call_sls_ajax_request(paramUrl, '');
		
	});
	
	// Upload SLS Image Slider
	$('#slsFormUpload').submit( function(event) {
		
		event.preventDefault();
		
		var serializeData = $(this).serializeArray();
		var postData = new FormData();
		
		$.each(serializeData, function(i, val) {
			postData.append(val.name, val.value);
		});
		
		var paramUrl = ajax_object.sls_ajax_url + '?action=sls_action_pro&sls_actions=add_image';
		call_sls_ajax_request(paramUrl, postData);		
		
    });
	
	// Update SLS Image Slider
	$('.slsFormList').submit( function(event) {
		
		event.preventDefault();
		
		var serializeData = $(this).serializeArray();
		var postData = new FormData();
		
		$.each(serializeData, function(i, val) {
			postData.append(val.name, val.value);
		});
		
		var paramUrl = ajax_object.sls_ajax_url + '?action=sls_action_pro&sls_actions=update_image';
		call_sls_ajax_request(paramUrl, postData);		
		
    });
	
	// Delete SLS Title Slider
	$('.slsDelImage').on('click', function(event){
		
		event.preventDefault();
		
		var imageID = $(this).attr('data-id');
		var paramUrl = ajax_object.sls_ajax_url + '?action=sls_action_pro&sls_actions=del_image&sls_image_id=' + imageID;
		call_sls_ajax_request(paramUrl, '');
		
	});
	
	// SLS Setting Options
	$('#slsFormSettings').submit( function(event) {
		
		event.preventDefault();
		
		var serializeData = $(this).serializeArray();
		var postData = new FormData();
		
		$.each(serializeData, function(i, val) {
			postData.append(val.name, val.value);
		});
		
		var paramUrl = ajax_object.sls_ajax_url + '?action=sls_action_pro&sls_actions=edit_settings';
		call_sls_ajax_request(paramUrl, postData);		
		
    });

});