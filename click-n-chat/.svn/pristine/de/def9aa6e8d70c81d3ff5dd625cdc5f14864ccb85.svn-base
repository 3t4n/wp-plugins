
 
jQuery('.color-picker').iris({
	// or in the data-default-color attribute on the input
	defaultColor: true,
	// a callback to fire whenever the color changes to a valid color
	change: function(event, ui){},
	// a callback to fire when the input is emptied or an invalid color
	clear: function() {},
	// hide the color picker controls on load
	hide: true,
	// show a group of common colors beneath the square
	palettes: true
});


jQuery(document).ready(function($) {
	
	$("#sortable-user-list tbody").sortable({
        update: function(event, ui) {
            var order = $(this).sortable('toArray', { attribute: 'data-rowid' });

            $.ajax({
                url: click_n_chat_ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'click_n_chat_update_user_position_action',
                    order: order,
					security: click_n_chat_ajax_object.nonce,
                },
                success: function(response) {
                    console.log('Positions updated!');
                }
            });
        }
    });
	
    $('.cnc-header-info').on('change', function() {
		updateHeader();
    });

	$('.cnc-user-status').on('change', function(e) {
        e.preventDefault();
		console.log(click_n_chat_ajax_object);
        var data = {
            action: 'click_n_chat_update_user_status_action',
            status: $(this).is(":checked") ? '1' : '0',
			datacolumn: $(this).data('col'),
			uid: $(this).data('uid'),
			security: click_n_chat_ajax_object.nonce,
        };
        $.post(click_n_chat_ajax_object.ajax_url, data, function(response) {
            console.log(response)
        });
    });
	
	$('.cnc-auto-suggestion').on('change', function(e) {
        e.preventDefault();
		console.log(click_n_chat_ajax_object);
        var data = {
            action: 'click_n_chat_update_suggestions_action',
            status: $(this).is(":checked") ? '1' : '0',
			rid: $(this).data('rid'),
			security: click_n_chat_ajax_object.nonce,
        };
        $.post(click_n_chat_ajax_object.ajax_url, data, function(response) {
            console.log(response)
        });
    });
	
	$('#availability').on('change', function(e) {
        if ($(this).is(':checked')) {
            $('#availabilityDetail').fadeOut();  
        } else {
            $('#availabilityDetail').fadeIn();  
        }
    });
	
	$('#rangeValue').text($('#customRange1').val());
	$('.customRange').on('input', function(e) {
		var span = $(this).data('span');
		var sliderValue = $(this).val();
 		$('#'+span).text(sliderValue);
		e.preventDefault();
		
		if(span == "matchingPercenageRangeValue")
		{
			var data = {
				action: 'click_n_chat_update_matching_percenage_action',
				matching_percenage: $(this).val(),
				security: click_n_chat_ajax_object.nonce,
			};
			$.post(click_n_chat_ajax_object.ajax_url, data, function(response) {
				console.log(response)
			});
		}
		
		if(span == "headerPaddingRangeValue")
		{
			updateHeader();
		}
		
		if(span == "widgetIconSizeRangeValue")
		{
			$('.cnc-wooicons').each(function(index,item){
				$(this).css('width' , sliderValue+'px');
			});
		}
	});
	
	function updateHeader() {
			var popup_title = $("#popup_title").val();
			var bg_color = $('input[name="bg_color"]').val();
			var txt_color = $('input[name="txt_color"]').val();
			var border_style = $('input[name="border_style"]:checked').val();
			var border_style = $('input[name="border_style"]:checked').val();
			var header_padding = $("#header_padding").val();
			
			$('.cnc-text-header').html(popup_title);
			$('.cnc-chatbot-popup-header').css('background', bg_color);
			$('.cnc-chatbot-popup-header').css('padding', header_padding);
			$('.cnc-chatbot-popup-header').css('border-radius', border_style);
			$('.cnc-text-header').css('color', txt_color);
			
			$('#cnccalliconw').css('background', bg_color);
			$('#chatlefticonlw').css('background', bg_color);
	}
	
	$('.cnc-chat-info').on('change', function() {  
		updateChatSkin();
    });
	
	function updateChatSkin()
	{
		$('#cnc-received-content').css('background',$("#chat_bg_color").val());
	}
	
	// Toggle color options display
    $(".cncColorPickerBtn").click(function() {
      $("."+$(this).data("option")).toggle();
    });

    // Select color from color options
    $(".cnc-color-option").click(function() {
      let color = $(this).data("color");
	  let id = $(this).data("id")
      $("#"+id).val(color);
	  $("#btn_"+id).css('background',color);
      $("."+$(this).data("option")).hide();
	  updateHeader();
	  updateChatSkin();
    });

    // Close color options if clicking outside
    $(document).click(function(event) {
      if (!$(event.target).closest(".cnc-color-picker-container").length) {
        $(".cncSkinColorOptions").hide();
      }
    });
	
	if (typeof tinymce !== 'undefined' && tinymce.get('click_n_chat_greetings_message')) {
        tinymce.get('click_n_chat_greetings_message').on('change keyup', function() {
            var content = tinymce.get('click_n_chat_greetings_message').getContent();
            $('#cnc-received-content').html(content);
        });
    }
	$('#click_n_chat_greetings_message').on('input', function() {
        var content = $(this).val();
        $('#cnc-received-content').html(content);
    });
	
	
	$("#cnc-my_icon-social").html($('input[name=social_type]:checked').parent().find('.cnc-checkpoint').html());	
	$('input[name=social_type]').click(function() {
		if($(this).data('ftype')=="1")
		{
			showSocialTypePhone();
		}
		else
		{
			showSocialTypeText($(this).data('placeholder'));
		}
		$("#cnc-my_icon-social").html($(this).parent().find('.cnc-checkpoint').html());	
	});
	
	var showSocialTypePhone = function()
	{
		$("#country_code").val(iti.getSelectedCountryData().dialCode);
		$('#cnc_social_id_txt').fadeOut();
		$('#cnc_social_id_txt').attr("disabled",true);
		$('#cnc_social_id').attr("disabled",false);
		$('#cnc_social_id_div').fadeIn();
	}
	var showSocialTypeText = function(text)
	{
		$('#cnc_social_id_div').fadeOut();
		$('#cnc_social_id').attr("disabled",true);
		$('#cnc_social_id_txt').attr("disabled",false);
		$('#cnc_social_id_txt').fadeIn();
		$('#cnc_social_id_txt').attr("placeholder",text);
	}
	
	const cnc_social_id = document.querySelector("#cnc_social_id");
	var iti;
	if(cnc_social_id != undefined && cnc_social_id != null)
	{
		iti = window.intlTelInput(cnc_social_id, {
			initialCountry: "auto",
			separateDialCode: true,
			geoIpLookup: function(callback) {
				$.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
					var countryCode = (resp && resp.country) ? resp.country : "us";
					callback(countryCode);
				});
			},
			utilsScript: click_n_chat_ajax_object.plugin_url+"admin/assets/js/intlTelInputWithUtils.min.js",
		});
		
		// Update the hidden field with the country code
		cnc_social_id.addEventListener('countrychange', function() {
			$("#country_code").val(iti.getSelectedCountryData().dialCode);
		});
		
		if($("#submit").val() == 'Update User')
		{
			$("#country_code").val(iti.getSelectedCountryData().dialCode);
		}
	}
	
	
	var sort_by = 'name';
	var sort_order = 'asc';
	var search = {};
	
	function loadLeads(page = 1, sort_by = 'name', sort_order = 'asc', search = {}) {
		$.ajax({
			url: ajaxurl,
			method: 'POST',
			data: {
				action: 'click_n_chat_update_lead_list_action',
				page: page,
				sort_by: sort_by,
				sort_order: sort_order,
				security: click_n_chat_ajax_object.nonce,
				search: search
			},
			success: function(response) {
				$('#leadsTable tbody').html(response.table);
				$('#pagination').html(response.pagination);
			}
		});
	}
	
	if(click_n_chat_ajax_object.active_tab == "lead_list"){
		loadLeads();
	}
	
	$(document).on('click', '.sort', function(e) {
		e.preventDefault();
		sort_by = $(this).data('sort');
		sort_order = (sort_order === 'asc') ? 'desc' : 'asc';
		loadLeads(1, sort_by, sort_order, search);
	});
	
	$(document).on('keyup change', '#search-name, #search-email, #search-phone, #search-date', function() {
		search = {
			name: $('#search-name').val(),
			email: $('#search-email').val(),
			phone: $('#search-phone').val(),
			date: $('#search-date').val()
		};
		loadLeads(1, sort_by, sort_order, search);
	});
	
	$(document).on('click', '.page-link', function(e) {
		e.preventDefault();
		const page = $(this).data('page');
		loadLeads(page, sort_by, sort_order, search);
	});
	
	$('#export-csv').click(function() {
		var name = $('#search-name').val();
		var email = $('#search-email').val();
		var phone = $('#search-phone').val();
		var date = $('#search-date').val();
		var uri = click_n_chat_ajax_object.ajax_url+'?action=click_n_chat_update_lead_list_export_action&security='+click_n_chat_ajax_object.nonce+'&name='+name+'&email='+email+'&phone='+phone+'&date='+date;	
		var link = document.createElement("a");
		link.download = "Download";
		link.href = uri;
		link.click();
	
	});
	
	$(document).on('mouseover', '.pop_type_hover', function(e) {
		var imgSrc = click_n_chat_ajax_object.plugin_url+'assets/images/'+$(this).data("img")+'view.png';
		$("#pop_type_view_img").attr('src',imgSrc);
	});
	
	$(document).on('change', 'input[name=pop_type]', function(e) {
		if($(this).val() == "socialwidgets")
			$("#noAvailabilityOption").slideDown();
		else
			$("#noAvailabilityOption").slideUp();
	});
	

	$(document).on('change', '#woo_widget_style', function(e) {
		$("#woo-widget-wgs1").slideUp();
		$("#woo-widget-wgs2").slideUp();
		$("#woo-widget-wgs3").slideUp();
		$("#woo-widget-wgs4").slideUp();
		$("#woo-widget-wgs5").slideUp();
		$("#woo-widget-wgs6").slideUp();
		if($(this).val() == "justicons")
		{
			$("#woojustIconsSize").slideDown();
			$("#woojustIconsView").slideDown();
		}
		else
		{
			$("#woojustIconsSize").slideUp();
			$("#woojustIconsView").slideUp();
			$("#woo-widget-"+$(this).val()).slideDown();
		}
	});
	
	$(document).on('change', '#widget_style', function(e) {
		$("#widget-wgs1").slideUp();
		$("#widget-wgs2").slideUp();
		$("#widget-wgs3").slideUp();
		$("#widget-wgs4").slideUp();
		$("#widget-wgs5").slideUp();
		$("#widget-wgs6").slideUp();
		if($(this).val() == "justicons")
		{
			$("#justIconsSize").slideDown();
			$("#justIconsView").slideDown();
		}
		else
		{
			$("#justIconsSize").slideUp();
			$("#justIconsView").slideUp();
			$("#widget-"+$(this).val()).slideDown();
		}
	});
	
	$(document).on('change', '#pop_up_style', function(e) {
		$("#pop-widget-wgs1").slideUp();
		$("#pop-widget-wgs2").slideUp();
		$("#pop-widget-wgs3").slideUp();
		$("#pop-widget-wgs4").slideUp();
		$("#pop-widget-wgs5").slideUp();
		$("#pop-widget-wgs6").slideUp();
		$("#pop-widget-"+$(this).val()).slideDown();
	});
	
	$(document).on('change', 'input[name=widget_style]', function(e) {
		if($(this).val() == "justicons")
			$("#justIconsSize").slideDown();
		else
			$("#justIconsSize").slideUp();
	});
	
	$(document).on('change', 'input[name=woo_widget_style]', function(e) {
		if($(this).val() == "justicons")
			$("#justIconsSize").slideDown();
		else
			$("#justIconsSize").slideUp();
	});
	
	$(document).on('click', '#show-header-code-view', function(e) {
		$("#cnc-header-code-view").toggle();
	});
	
	$('.trashReplyButton').on('click', function(event) {
		event.preventDefault();
        var confirmed = confirm('Are you sure?');
        if (confirmed) {
			var formId = $(this).data('form-id');
            $('#trashReplyForm'+formId).submit();
        }
    });
	
	
	$('.nav-tab').click(function(e) {
        e.preventDefault();
        $('.nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        $('.tab-content-item').hide();
        var tabId = $(this).data('tab');
        $('#' + tabId).show();
    });
});




 

 
 