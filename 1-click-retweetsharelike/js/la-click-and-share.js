jQuery(document).ready(function($) {
    la_click_and_share_button_settings();
	$.receiveMessage(
		function(e){
			$("#networkpub_postbox").height(e.data.split("=")[1]+'px');
		},
		'http://www.linksalpha.com'
	);
	$("#site_links").live("change", function(event) {
		$.postMessage(
			$(this).val(),
			'http://www.linksalpha.com/post',
			parent
		);
	});
	setTimeout(function(){
		if($("#linksalpha_browser").length>0){
			if($("#linksalpha_post_extension_chrome").length == 0) {
				if($("#linksalpha_browser").val() == 'chrome') {
					$("#linksalpha_post_download_chrome").show();
				} else if($("#linksalpha_browser").val() == 'firefox') {
					$("#linksalpha_post_download_firefox").show();
				} else if($("#linksalpha_browser").val() == 'safari') {
					$("#linksalpha_post_download_safari").show();
				}
			} else {
				$("#linksalpha_post_download_chrome").remove();
				$("#linksalpha_post_download_firefox").remove();
				$("#linksalpha_post_download_safari").remove();
				$(".lacandsnw_post_meta_box_first").css('border-top-color', 'transparent');
			}
		}
	},3000);
	if($("#lacandsnw_post_update").length) {
		$("#lacandsnw_post_update").live("click", function() {
			$("body").append('<div id="lacandsnw_overlay"><iframe id="linksalpha_post_plugin" src="http://www.linksalpha.com/post2/postpopup?'+$("#lacandsnw_post_data").val()+'" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="100%" scrolling="no"></iframe></div>');
			return false;
		});
	}
	$.receiveMessage(
		function(e){
			if(e.data=='["close"]') {
				$("#lacandsnw_overlay").remove();
			}
		},
		'http://www.linksalpha.com'
	);
});

function oneclick_msg_fade(this_elem) {
	setTimeout(function(){
		this_elem.fadeOut();
	}, 5000);
}

function la_click_and_share_button_settings() {
    lacands_enable_switch_overlay();
    la_cas_setting_tabs();
    lacands_network_selector();
    lacands_ajax_calls();
}

function lacands_enable_switch_overlay() {
    jQuery(document).on('change', '.lacands_setting_container .switch input', function() {
       if (jQuery(this).is(':checked')) {
           jQuery(this).parents('.lacands_setting_container:first').find('._lacands_overlay').hide();
           jQuery(this).parents('.lacands_setting_container:first').find('.lacands_setting_content>._illustration').hide();
           jQuery(this).parents('.lacands_setting_container:first').find('.lacands_setting_content>._settings').show('slow');
       } else {
           jQuery(this).parents('.lacands_setting_container:first').find('._lacands_overlay').show();
           jQuery(this).parents('.lacands_setting_container:first').find('.lacands_setting_content>._illustration').show('slow');
           jQuery(this).parents('.lacands_setting_container:first').find('.lacands_setting_content>._settings').hide();
       }
       jQuery(this).parents('.lacands_setting_container:first').find('button[name=save_settings]').trigger('click');
    });
}

function lacands_ajax_calls() {
    var ajax_url = ajax_object.ajax_url;
    jQuery(document).on('click', 'button[name=save_settings]', function(){
        var data = {
            'action': 'lacands_share_button_settings',
        };
        var this_elem = jQuery(this);
        var this_form = this_elem.parents('form:first');
        jQuery.each(this_form.serializeArray(), function() {
            if (data[this.name] !== undefined) {
                if (!data[this.name].push) {
                    data[this.name] = [data[this.name]];
                }
                data[this.name].push(this.value || '');
            } else {
                data[this.name] = this.value || '';
            }
        });
        if (this_form.find('.lacands_network_selector').length) {
            var radio_selected = this_form.find('.lacands_setting_tab_content>[data-id="style"] input[type=radio]:checked');
            if (radio_selected.val() == 'original_buttons') {
                var selector_str = '.lacands_network_selector ._selected ._list[data-type=original] ._item';
            } else {
                var selector_str = '.lacands_network_selector ._selected ._list[data-type=all] ._item';
            }
            var selected_networks = [];
            this_form.find(selector_str).each(function(){
                selected_networks.push(jQuery(this).attr('data-id'));
            });
            data['selected_networks'] = selected_networks;
        }
        var lacandsnw_ajax_msg = jQuery(this).parents(".lacands_setting_container:first").prev();
        lacandsnw_ajax_msg.show();
        lacandsnw_ajax_msg.html('Updating...');
        jQuery.post(ajax_url, data, function(response) {
            lacandsnw_ajax_msg.html('Settings have been updated successfully');
            oneclick_msg_fade(lacandsnw_ajax_msg);
            if (jQuery('#upgrade_notice').length) {
                window.location.href = window.location.href;
            }
        });
        return false;
    });
}

function la_cas_setting_tabs() {
    jQuery(document).on('change', '.lacands_setting_tab_content>[data-id=style] input[type=radio]', function(){
        var this_elem = jQuery(this);
        var this_val = this_elem.val();
        if (this_val == 'original_buttons') {
            jQuery('.lacands_network_selector ._list[data-type=all]').hide();
            jQuery('.lacands_network_selector ._list[data-type=original]').show();
        } else {
            jQuery('.lacands_network_selector ._list[data-type=all]').show();
            jQuery('.lacands_network_selector ._list[data-type=original]').hide();
        }
    });
    jQuery(document).on('click', '.lacands_setting_tab', function(){
       var data_id = jQuery(this).attr('data-id');
       var settings_container = jQuery(this).parents('.lacands_setting_container:first');
       var tab_content = settings_container.find('.lacands_setting_tab_content').find('[data-id='+ data_id +']');
       settings_container.find('.lacands_setting_tab_content>div').hide();
       settings_container.find('.lacands_setting_tab').removeClass('_selected');
       jQuery(this).addClass('_selected');
       tab_content.show();
    });
}

function lacands_network_selector() {
    jQuery(document).on('click','.lacands_network_selector ._item', function() {
        var this_elem = jQuery(this).find('._action');
        var item = this_elem.parents('._item:first');
        var settings_container = jQuery(this).parents('.lacands_setting_container:first');
        if (this_elem.find('._data_all').is(':visible')) {
            var data_id = item.attr('data-id');
            var selected_list = settings_container.find('.lacands_network_selector ._selected ._list:visible');
            if (!selected_list.find('._item[data-id='+data_id+']').length) {
                selected_list.find('._item[data-id='+data_id+']');
                var item_clone = item.clone();
                item.addClass('_added');
                selected_list.append(item_clone);
                selected_list.animate({ scrollTop: selected_list[0].scrollHeight}, 1000);
            }
        } else {
            var data_id = item.attr('data-id');
            var all_item = settings_container.find('.lacands_network_selector ._all ._list:visible').find('._item[data-id='+data_id+']');
            all_item.removeClass('_added');
            item.remove();
        }
    });
    jQuery(document).on('keyup', '.lacands_network_selector ._search input', function() {
        var this_elem = jQuery(this);
        var this_val = this_elem.val().toLowerCase();
        var container = this_elem.parent().nextAll('._list:visible:first');
        if (!this_val) {
            container.find('._item').show();
        } else {
            container.find('._item').each(function(){
                var item = jQuery(this);
                if (item.text().toLowerCase().indexOf(this_val) > -1 ) {
                    item.show();
                } else {
                    item.hide();
                }
            });
        }
    });
}
