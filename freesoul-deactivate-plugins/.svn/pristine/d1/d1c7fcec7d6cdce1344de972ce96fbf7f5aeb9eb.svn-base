jQuery(document).ready(function(){
	setTimeout(function(){eos_dp_rebuild_admin_menu();},2100);
});
function eos_dp_rebuild_admin_menu(){
	var t0 = performance.now();
	jQuery.ajax({
		type : "POST",
		url : ajaxurl,
		data : {
			"nonce" : eos_dp_menu.nonce,
			"action" : 'eos_dp_build_admin_menu'
		},
		success : function (response) {
			if('' !== response && response.indexOf('id="eos-dp-adminmenu"') > 0) {
				var menu_html = jQuery.parseHTML(response)[0],
					t1 = performance.now(),
					topItems = jQuery('#adminmenu .menu-top'),
					top_item,
					fdp_top_item,
					top_item_id = '',
					restore_items = '',
					restore_html,
					restore_item,
					href = '';
				jQuery('#adminmenu .wp-menu-separator').each(function(){
					jQuery(this).remove();
				});
				if(jQuery(menu_html).find('a').length <= jQuery('#adminmenu a').length) return;
				topItems.each(function(){
					top_item = jQuery(this);
					top_item_id =  top_item.attr('id');
					if(top_item_id){
						if(menu_html.innerHTML.indexOf('id="' + top_item_id + '"') > 0){
							restore_items += '<div id="eos-restore-' + top_item_id  + '">' + top_item.parent()[0].innerHTML + '</div>';
						}
					}
					top_item.remove();
				});
				jQuery(menu_html.innerHTML).insertBefore(jQuery('#collapse-button').closest('li'));
				jQuery('#adminmenuwrap')
					.css('position','absolute')
					.find('span.awaiting-mod,span.update-plugins').each(function(){
						jQuery(this).remove();
					});
				if('' !== restore_items){
					restore_html = jQuery.parseHTML(restore_items)[0];
					jQuery(restore_html).find('.wp-submenu a').each(function(){
						restore_item = jQuery(this);
						if(restore_item.find('span').length > 0){
							href = restore_item.attr('href');
							jQuery('[href="' + href + '"]').html(restore_item.html());
						}
					});
					jQuery(restore_html).find('.wp-menu-name').each(function(){
						restore_item = jQuery(this);
						if(restore_item.find('span').length > 0){
							href = restore_item.parent().attr('href');
							jQuery('[href="' + href + '"] .wp-menu-name').html(restore_item.html());
						}
					});
				}
				jQuery('head').append('<style id="fdp-admin-menu">#adminmenu .wp-menu-image{overflow:hidden}</style>');
				jQuery('#adminmenuwrap').on('hover','.wp-has-submenu .wp-menu-name',function(){
					jQuery(this).closest('li.wp-has-submenu').addClass('opensub').addClass('wp-not-current-submenu');
				});
				jQuery('#adminmenuwrap').on('mouseleave','li.wp-has-submenu',function(){
					jQuery(this).closest('li.wp-has-submenu').removeClass('opensub').removeClass('wp-not-current-submenu');
				});					
			}
			var tend = performance.now();
			console.log((tend - t0))/1000;
			console.log((tend - t1))/1000;
		}
	});
}
function eos_dp_add_query_arg(key,value,url){
	return url.indexOf('?') > 0 || url.indexOf('&') > 0 ? url + '&' + key + '=' + value : url + '?' + key + '=' + value;
}
