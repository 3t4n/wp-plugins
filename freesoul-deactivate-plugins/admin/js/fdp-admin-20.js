jQuery(document).ready(function($){
	plugsN = $('.eos-dp-plugin-name').length;
	eos_dpBody = $('body');
	right = eos_dp_js.is_rtl ? 'left' : 'right';
	psiButtons = $('.eos-dp-psi-preview');
	if(plugsN > 15){
		localStorage.setItem('eos_dp_orientation','eos-dp-vertical');
	}
	var	orientation = localStorage.getItem('eos_dp_orientation'),
		remote_help_email = $('#advanced_help_email'),
		remote_help_username = $('#advanced_help_username'),
		remote_help_password = $('#advanced_help_password');
	if(orientation && 'eos-dp-horizontal' === orientation){
		eos_dpBody.addClass('eos-dp-horizontal');
		eos_dp_set_horizontal_cell_width();
	}
	$('#eos-dp-setts .eos-dp-post-name-wrp,#eos-dp-table-head th:first-child').css('background',$('body').css('background'));
	if('eos_dp_admin' === eos_dp_js.page){
		var main_menu_items = document.getElementsByClassName('eos-dp-admin-main-menu-link'),
			n = 0;
		if(main_menu_items){
			var main_menu_itemsLen = main_menu_items.length;
			if(main_menu_items.length > 0){
				var menu_topFirsts = document.getElementsByClassName('menu-top-first'),
					menu_topFirstsLen = menu_topFirsts.length;
				for(n;n < menu_topFirstsLen;++n){
					var link = menu_topFirsts[n].getElementsByTagName('a')[0],
						k = 0;
					if('undefined' !== typeof(link) && 'undefined' !== typeof(link.href)){
						for(k;k < main_menu_itemsLen;++k){
							if(link.href.length > 4 && 'undefined' !== typeof(main_menu_items[k].href) && link.href === main_menu_items[k].href && 'undefined' !== link.text){
								main_menu_items[k].getElementsByTagName('h4')[0].innerText = link.text;
							}
						}
					}
				}
			}
		}
	}
	$('.eos-dp-duplicated-url a.eos-dp-title').each(function(){
		var href = this.href;
		$('a.eos-dp-title[href="' + href + '"]').each(function(){
			$(this).closest('tr').find('td').on('click',function(){
				var source_row = $(this).closest('tr');
				setTimeout(function(){
					$('a.eos-dp-title[href="' + href + '"]').each(function(){
						eos_dp_clone_row_options(source_row,$(this).closest('tr'));
					});
				},1000);
			});
		});
	});
	$('#eos-dp-setts').on('click','.fdp-row-actions-ico',function(){
		$(this).closest('tr').toggleClass('fdp-actions-on');
		$(this).closest('td').toggleClass('eos-dp-hover');
	});
	$('#eos-dp-lock-single-post').on('click',function(){
		$('.eos-dp-post-name-wrp .eos-dp-lock-post').trigger('click');
		$(this).toggleClass('eos-post-locked');
	});
	$(".eos-dp-eos_dp_menu .eos-dp-td-chk-wrp").on("click", function () {
		$(this).closest('tr').addClass('eos-post-locked');
		$('#eos-dp-lock-single-post').addClass('eos-post-locked');
	});
	$('#eos-dp-lock-all').on("click",function(){
		$('.eos-dp-post-row').not('.eos-post-locked').each(function(){
			$(this).find('.eos-dp-lock-post').trigger('click');
		});
	});
	$('#eos-dp-unlock-all').on("click",function(){
		$('.eos-post-locked').each(function(){
			$(this).find('.eos-dp-lock-post').trigger('click');
		});
	});
	$("td").on("click", function () {
		$(this).closest('tr').find('td')
			.removeClass('eos-dp-auto-checked')
			.css('opacity','1')
	});
	$(".eos-dp-paste-post-types").on("click", function () {
		var btn = $(this),tr = btn.closest('tr');
		btn.addClass('eos-dp-progress');
		tr.find('td').addClass('eos-dp-progress');
		$.ajax({
			type : "POST",
			url : ajaxurl,
			data : {
				"nonce" : $("#fdp_pro_deactivation_page").val(),
				"post_type" : $(this).closest('table').attr('data-post_type') || tr.attr('data-post-type'),
				"action" : 'eos_dp_pro_paste_from_post_types'
			},
			success : function (response) {
				if(response && '' !== response){
					try{
						var plugins = response.split(',');
						tr.find('input[type="checkbox"]').each(function(){
							var chk = $(this);
							chk.removeAttr('checked');
							eos_dp_update_chks(chk);
						});
						for(idx in plugins){
							if('' !== plugins[idx]){
								var td = tr.find('[data-path="' + plugins[idx] + '"]');
								td.removeClass('eos-dp-active');
								td.find('input[type="checkbox"]').prop('checked',true);
							}
						}
					}
					catch(err){
						throw 'Something went wrong. Not possible to get the post type settings.';
						return;
					}
				}
				btn.removeClass('eos-dp-progress');
				tr.find('td').removeClass('eos-dp-progress');
			}
		});
		return false;
	});
	$("#eos-dp-autosuggest-all").on("click", function () {
		window.eos_dp_actual_row_in_progress = 0;
		$('.eos-dp-pro-autosettings').first().trigger('click');
		$('#eos-dp-lock-all').trigger('click');
	});
	$(".eos-dp-pro-autosettings-all-from-row").on("click", function () {
		window.eos_dp_actual_row_in_progress = 0;
		$(this).parent().find('.eos-dp-pro-autosettings').trigger('click');
		return false;
	});
	$('.eos-dp-title,#eos-dp-setts th span').on('hover',function(){
		$(this).css('transform','scale(1.05)').css('transform-origin','0 0').css('display','inline-block');
	});
	$('.eos-dp-title,#eos-dp-setts th span').on('mouseleave',function(){
		$(this).css('transform','scale(1)');
	});
	$('.eos-dp-invert-selection').on('click',function(){
		eos_dp_invert_selection($(this).closest('tr'));
		return false;
	});
	$('.eos-dp-copy').on('click',function(){
		var row = $(this).closest('tr');
		window.eos_dp_last_copied_row = eos_dp_row2setts(row);
		localStorage.setItem('eos_dp_last_copied_row',JSON.stringify(window.eos_dp_last_copied_row));
		return false;
	});
	$('.eos-dp-paste').on('click',function(){
		var row = $(this).closest('tr');
		eos_dp_paste_last_copied_setts(row);
		return false;
	});
	$('#fdp-select-all-single-post').on('click',function(event){
		$('.eos-dp-td-chk-wrp input').each(function(){
			var chk = $(this);
			chk.attr('checked',false).trigger('click');
			chk.closest('td').addClass('eos-dp-active');
		});
	});
	$('#fdp-unselect-all-single-post').on('click',function(event){
		$('.eos-dp-td-chk-wrp input').each(function(){
			var chk = $(this);
			chk.attr('checked',true).trigger('click');
			chk.closest('td').removeClass('eos-dp-active');
		});
	});
	$('.eos-dp-preview').on('click',function(event){
		var a = this,
			theme = 'undefined' !== typeof(is_single_post) && is_single_post ? $('.eos-dp-themes-list').val() : $(a).closest('td').find('.eos-dp-themes-list').val(),
			row_class = $(a).hasClass('eos-dp-archive-preview') ? '.eos-dp-archive-row' : '.eos-dp-post-row',
			row = 'undefined' !== typeof(is_single_post) && is_single_post ? $(row_class) : $(this).closest(row_class),
			colN = 0,
			chk;
			$(a).addClass('eos-dp-progress');
		var button = $(this),
			page_speed_insights = button.attr('data-page_speed_insights'),
			admin = 'undefined' !== typeof(eos_dp_js.page) && 'eos_dp_admin' === eos_dp_js.page ? '_admin' : '',
			data = {
				"nonce" : $("#eos_dp" + admin + '_setts').val() || $("#eos_dp_arch_setts").val(),
				"post_type": button.closest('.eos-dp-archive-row').attr('data-post-type'),
				"tax": button.closest('.eos-dp-archive-row').attr('data-tax'),
				"plugin_path" : eos_dp_plugins_row(row),
				"page_speed_insights" : page_speed_insights,
				"action" : 'eos_dp_preview'
			};
		if('_admin' === admin){
			data.admin_page = button.closest('tr').find('.eos-dp-title').attr('href');
		}
		else{
			data.post_id = button.closest('.eos-dp-actions').attr('data-post-id');
		}
		row.find('.eos-dp-post-name-wrp').addClass('eos-dp-progress');
		$.ajax({
			type : "POST",
			url : ajaxurl,
			data : data,
			success : function (response) {
				if (parseInt(response) == 1) {
					row.find('.eos-dp-post-name-wrp').removeClass('eos-dp-progress');
					var first_href = a.href,
						theme_arg = '',
						encode_url = 'undefined' !== typeof(a.dataset.encode_url) && 'true' === a.dataset.encode_url;
					if('_admin' !== admin){
						if('dummy_html' !== theme){
							theme_arg = encode_url ? '%26theme%3D' + theme : '&theme=' + theme;
							a.href = a.href.split('%26theme%3D')[0].replace('&','%26') + '%26theme%3D' + theme;
						}
						else{
							a.href = a.href.split('=http')[0].split('%3Dhttp')[0] + '=' + eos_dp_js.html_url;
						}
					}
					if(encode_url){
						a.href = a.href.split('%26theme%3D')[0].split('&').join('%26').split('=').join('%3D') + theme_arg;
						a.href += 'dummy_html' !== theme ? '%26time%3D' + Date.now() : '';
					}
					else{
						a.href = a.href.split('&theme=')[0].split('%26').join('&').split('%3D').join('=');
						a.href += 'dummy_html' !== theme ? '&time=' + Date.now() : '';
					}
					if('_admin' === admin){
						a.href += '&backend_usage=true';
						a.href += '&theme=' + button.closest('tr').find('.eos-dp-row-theme').closest('td').hasClass('eos-dp-active');
					}
					a.href = a.href.replace('%3Dhttps','=https').replace('%3Dhttp','=http');
					window.open(a.href,'_blank');
					a.href = first_href;
					$(a).removeClass('eos-dp-progress');
					return true;
				}
				else{
					row.find('.eos-dp-post-name-wrp').removeClass('eos-dp-progress');
					alert( 'Something went wrong' );
				}
				$(a).removeClass('eos-dp-progress');
			}
		});
		return false;
	});
	$('.eos-dp-post-name-wrp').on('mouseover',function(){
		$('.eos-dp-post-name-wrp').removeClass('eos-dp-next-row-hover');
		$(this).removeClass('eos-dp-not-hover');
		$(this).closest('tr').next().find('.eos-dp-post-name-wrp').addClass('eos-dp-next-row-hover');
	});
	$('.eos-dp-themes-list').on('click',function(){
		$(this).closest('td').addClass('eos-dp-hover').removeClass('eos-dp-not-hover');
		return false;
	});
	$('.eos-dp-close-actions,.eos-dp-actions a').not('.eos-dp-themes-list').on('click',function(){
		$(this).closest('td').removeClass('eos-dp-hover').addClass('eos-dp-not-hover');
		if(-1 !== this.className.indexOf('eos-dp-close-actions')) return false;
	});
	$('#eos-dp-setts input[type=checkbox]').on('mouseenter',function(){
		$(this).eos_dp_shiftSelectable();
	});
	$('#eos-dp-setts').on('click','input[type=checkbox]',function(){
		$(this).closest('td').toggleClass('eos-dp-active');
		var inc = $(this).closest('td').hasClass('eos-dp-active') ? 1 : -1;
		window.eos_dp_grouped = false;
		window.eos_dp_last_modified_row = $(this).closest('tr');
		window.eos_dp_last_modified_row.attr('data-active-plugins',parseInt(window.eos_dp_last_modified_row.attr('data-active-plugins')) + inc);
		window.eos_dp_last_modified_row.attr('data-disabled-plugins',parseInt(window.eos_dp_last_modified_row.attr('data-disabled-plugins')) - inc);
	});
	$('.eos-dp-priority-post-type').on('click',function(){
		var chk = $(this);
		if(chk.hasClass('eos-dp-priority-post-type')){
			if(!chk.is(':checked')){
				chk.closest('.eos-dp-priority-post-type-wrp').addClass('eos-dp-priority-active');
			}
			else{
				chk.closest('.eos-dp-priority-post-type-wrp').removeClass('eos-dp-priority-active');
			}
			return;
		}
	});
	$('.eos-dp-global-chk-col').on('click',function(){
		var chk = $(this),
			checked = chk.is(':checked'),
			data_col = chk.attr('data-col'),
			path = chk.closest('th').find('.eos-dp-plugin-name').attr('data-path'),
			col_class = '.eos-dp-col-' + data_col,
			dependencies = 'undefined' !== typeof(eos_dp_js.dependencies) ? JSON.parse(eos_dp_js.dependencies) : false;
		if('theme' === data_col){
			col_class = '.eos-dp-row-theme';
		}
		var prevStatus = [];
		$(col_class).each(function(){
			prevStatus.push($(this).is(':checked'));
		});
		eos_dp_update_chk_wrp(chk,checked);
		var chks = $(col_class).filter(':visible');
		chks.attr('checked',checked);
		if(!chk.is(':checked')){
			chks.closest('td').addClass('eos-dp-active');
			$(col_class).filter(':visible').addClass('eos-dp-active');
		}
		else{
			chks.closest('td').removeClass('eos-dp-active');
			$(col_class).filter(':visible').removeClass('eos-dp-active');
		}
		if('woocommerce/woocommerce.php' === path){
			$('.eos-dp-woo-row [data-path="woocommerce/woocommerce.php"]').each(function(){
				$(this).addClass('eos-dp-active');
				$(this).find('input[type="checkbox"]').attr('checked',false);
			});
		}
		if(dependencies && 'undefined' !== typeof(dependencies[path])){
			fdp_update_add_ons_columns(chk[0],path,dependencies[path].strings);
		}
		$(col_class).each(function(idx,el){
			var row = $(this).closest('tr');
			if(checked !== prevStatus[idx]){
				var inc = checked ? -1 : 1,row = $(this).closest('tr');
				row.attr('data-active-plugins',parseInt(row.attr('data-active-plugins')) + inc);
				row.attr('data-disabled-plugins',parseInt(row.attr('data-disabled-plugins')) - inc);
			}
		});
	});
	$('.eos-dp-lock-post').on('click',function(){
		$(this).closest('tr').toggleClass('eos-post-locked');
	});
	$('#eos-dp-setts').on('click','.eos-dp-global-chk-row',function(){
		var chk = $(this),checked = chk.is(':checked'),chks = chk.closest('.eos-dp-post-row').find('input[type=checkbox]').not('.eos-dp-default-post-type,.eos-dp-lock-post'),tr = chk.closest('tr');
		chks.attr('checked',checked);
		eos_dp_update_chks(chks);
		eos_dp_update_chk_wrp(chk,checked);
		var pN = parseInt($('.fdp-plug-filter').last().attr('data-max')),p = chk.closest('span').hasClass('eos-dp-active-wrp') ? [pN,0] : [0,pN];
		tr.attr('data-active-plugins',p[0]);
		tr.attr('data-disabled-plugins',p[1]);
		if('undefined' !== typeof(eos_dp_js.page) && 'eos_dp_menu' === eos_dp_js.page) tr.addClass('eos-post-locked');
	});
	$('.eos-dp-reset-col').on('click',function(){
		$('.eos-dp-col-' + $(this).attr('data-col')).each(function(){
			var checked = $(this).attr('data-checked') === 'checked' ? true : false;
			$(this).attr('checked',checked);
			eos_dp_update_chks($(this));
		});
		$(this).closest('.eos-dp-global-chk-col-wrp').find('.eos-dp-global-chk-col').attr('checked',false);
		eos_dp_update_chk_wrp($(this),checked);
	});
	$('.eos-dp-reset-row').on('click',function(){
		$(this).closest('.eos-dp-post-row').find('input[type=checkbox]').each(function(){
			var checked = $(this).attr('data-checked') === 'checked' ? true : false;
			$(this).attr('checked',checked);
			eos_dp_update_chks($(this));
		});
		$(this).closest('td').find('.eos-dp-global-chk-row').attr('checked',false);
		eos_dp_update_chk_wrp($(this),checked);
	});
	$('.eos-dp-global-chk-post_type').on('click',function(){
		var chk = $(this);
		var checked = chk.is(':checked');
		$('.eos-dp-post-' + chk.attr('data-post_type')).find('input[type=checkbox]').attr('checked',checked);
		eos_dp_update_chks($('.eos-dp-post-' + chk.attr('data-post_type')).find('input[type=checkbox]'));
		eos_dp_update_chk_wrp(chk,checked);
	});
	$('.eos-dp-reset-post_type').on('click',function(){
		$('.eos-dp-post-' + $(this).attr('data-post_type') + ' input[type=checkbox]').each(function(){
			var checked = $(this).attr('data-checked') === 'checked' ? true : false;
			$(this).attr('checked',checked);
			eos_dp_update_chks($(this));
		});
	});
	$('.eos-dp-plugin-name span a').each(function(){
		var name_wrp = $(this);
		if(name_wrp.text().length > 37){
			name_wrp.text(name_wrp.text().substring(0,34) + ' ...');
		}
	});
	$('.eos-dp-title').each(function(){
		var name_wrp = $(this);
		if(name_wrp.text().length > 60){
			name_wrp.text(name_wrp.text().substring(0,57) + ' ...');
		}
	});
	$("#eos-dp-add-url").on("click", function () {
		var last_row = $('.eos-dp-url.eos-hidden');
		last_row.clone().insertAfter(last_row);
		last_row.removeClass('eos-hidden');
		return false;
	});
	$(".eos-dp-default-post-type-wrp").on("click", function () {
		var input = $(this).find('input');
		if(input[0].hasAttribute('checked')){
			input.attr('checked',null);
		}
		else{
			input.attr('checked',true);
		}
	});
	$('#eos-dp-setts').on('click','.eos-dp-delete-url',function(){
		$(this).closest('tr').remove();
	});

	$(".eos-dp-setts-menu-item").on("click", function () {
		$(".eos-dp-setts-menu-item").removeClass('eos-active');
		$(this).addClass('eos-active');
	});
	$(".eos-dp-save-eos_dp_by_post_type").on("click", function () {
		$('.eos-dp-opts-msg').addClass('eos-hidden');
		var data_post_type = {},
			post_types = document.getElementsByClassName('eos-dp-post-type');
		eos_dp_show_all_plugins();
		for(var n = 0;n < post_types.length;++n){
			var plugins = [];
			var chks = post_types[n].getElementsByClassName('eos-dp-td-post-type-chk-wrp');
			for(k = 0;k < chks.length;++k){
				if(!$(chks[k].getElementsByTagName('input')).closest('td').hasClass('eos-dp-active')){
					plugins[k] = document.getElementById('eos-dp-plugin-name-' + (k + 1)).getAttribute('data-path');
				}
			}
			var flg = $(post_types[n]).find('.eos-dp-priority-post-type-wrp').hasClass('eos-dp-priority-active') ? '1' : '0',
				def = $(post_types[n]).find('.eos-dp-default-post-type').is(':checked') ? '1' : '0';
			data_post_type[post_types[n].getAttribute('data-post-type')] = [flg,plugins.join(','),def];
		};
		eos_dp_restore_plugins_filter();
		eos_dp_send_ajax($(this),{
			"nonce" : $("#eos_dp_pt_setts").val(),
			"eos_dp_pt_setts" : JSON.stringify(data_post_type),
			"action" : 'eos_dp_save_post_type_settings'
		});
		return false;
	});
	$(".eos-dp-save-eos_dp_url").on("click", function () {
		$('.eos-dp-opts-msg').addClass('eos-hidden');
		var data_url = {},
			urls = document.getElementsByClassName('eos-dp-url'),url = '';
		eos_dp_show_all_plugins();
		for(var n = 0;n < urls.length - 1;++n){
			var plugins = [];
			var chks = urls[n].getElementsByClassName('eos-dp-td-url-chk-wrp');
			for(k = 0;k < chks.length;++k){
				if(!$(chks[k].getElementsByTagName('input')).closest('td').hasClass('eos-dp-active')){
					plugins[k] = document.getElementById('eos-dp-plugin-name-' + (k + 1)).getAttribute('data-path');
				}
			}
			url = $(urls[n]).find('.eos-dp-url-input').val();
			data_url[n] = {};
			data_url[n]['url'] = url;
			data_url[n]['plugins'] = plugins.join(',');
		};
		eos_dp_restore_plugins_filter();
		eos_dp_send_ajax($(this),{
			"nonce" : $("#eos_dp_url_setts").val(),
			"eos_dp_url_setts" : JSON.stringify(data_url),
			"action" : 'eos_dp_save_url_settings'
		});
		return false;
	});
	$(".eos-dp-save-eos_dp_menu").on("click", function () {
		$('.eos-dp-opts-msg').addClass('eos-hidden');
		eos_dp_remove_all_filters();
		var data_checked = 'not checked',
			actual_checked = '',
			chk,
			post_id = '',
			data = {},
			eos_dp_post_types = [],
			eos_dp_urls = {},
			ids_locked = [],
			ids_unlocked = [],
			str = '',
			modified = [],
			bit = 0,
			row,
			jbin;
		$('.eos-dp-post-row').each(function(){
			row = $(this),
			modified = [];
			str = '';
			post_id = row.attr('data-post-id');
			if('undefined' !== typeof(post_id)){
				eos_dp_urls[post_id] = row.attr('data-url');
				if(row.hasClass('eos-post-locked')){
					ids_locked.push(post_id);
				}
				else{
					ids_unlocked.push(post_id);

				}
				jbin = $.map(row.find('td').not('.eos-dp-post-name-wrp'),function(val,i){
					return $(val).hasClass('eos-dp-active') ? '1' : '0';
				});
				row.find('input[type=checkbox]').filter(':visible').not('.eos-dp-global-chk-row').each(function(){
					chk = $(this);
					data_checked = chk.attr('data-checked');
					actual_checked = chk.is(':checked') ? 'checked' : 'not-checked';
					bit = actual_checked !== data_checked ? '1' : '0';
					str += actual_checked === 'checked' ? ',' + chk.closest('td').attr('data-path') : ',';
				});
				if(jbin.join('') !== row.attr('data-bin') || (row.hasClass('eos-post-locked') && 'true' === row.find('.eos-dp-actions').attr('data-need-custom-url'))){
					data['post_id_' + post_id] = str.substring(1,(str.length));
				}
			}
		});
		if('undefined' !== typeof(eos_dp_need_custom_url)){
			eos_dp_need_custom_url_dyn = JSON.parse(JSON.stringify(eos_dp_need_custom_url));
			data['eos_dp_need_custom_url'] = JSON.stringify(eos_dp_need_custom_url_dyn);
		}
		$('#eos-dp-singles-sub .eos-dp-submenu-item').each(function(){
			eos_dp_post_types.push($(this).attr('data-post-type'));
		});
		data['ids_locked'] = ids_locked;
		data['ids_unlocked'] = ids_unlocked;
		data['post_type'] = $('#eos-dp-setts').attr('data-post_type');
		data['eos_dp_post_types'] = JSON.stringify(eos_dp_post_types);
		data['eos_dp_urls'] = JSON.stringify(eos_dp_urls);
		var ajax_loader = $(this).next(".ajax-loader-img");
		ajax_loader.removeClass('eos-not-visible');
		eos_dp_restore_all_filters();
		$.ajax({
			type : "POST",
			url : ajaxurl,
			data : {
				"nonce" : $("#eos_dp_setts").val(),
				"eos_dp_setts" : data,
				"action" : 'eos_dp_save_settings'
			},
			success : function (response) {
				ajax_loader.addClass('eos-not-visible');
				if (parseInt(response) == 1) {
					$('.eos-dp-opts-msg_success').removeClass('eos-hidden');
					var checked = '';
					$('#eos-dp-setts input[type=checkbox]').each(function(){
						checked = $(this).is(':checked') ? 'checked' : 'not-checked';
						$(this).attr('data-checked',checked);
					});
				} else {
					eos_dp_show_errors(response);
				}
			}
		});
		return false;
	});
	$(".eos-dp-save-eos_dp_by_archive,.eos-dp-save-eos_dp_by_term_archive").on("click", function () {
		$('.eos-dp-opts-msg').addClass('eos-hidden');
		eos_dp_show_all_plugins();
		var data_checked = 'not checked',
			actual_checked = '',
			chk,
			post_id = '',
			archive_id = '',
			archive_url = '',
			dataArchives = {},
			dataArchivesUrls = {},
			str = '',
			modified = [],
			bit = 0,
			archiveRow,
			row;
		$('#eos-dp-by-archive-section .eos-dp-archive-row').each(function(){
			str = '';
			row = $(this);
			row.find('input[type=checkbox]').not('.eos-dp-global-chk-row').each(function(){
				chk = $(this);
				str += chk.is(':checked') ? ',' + chk.closest('td').attr('data-path') : ',';
			});
			dataArchives[row.attr('data-href')] = str;
			dataArchivesUrls[row.attr('data-url')] = [row.attr('data-post-type'),str];
		});
		var ajax_loader = $(this).next(".ajax-loader-img");
		ajax_loader.removeClass('eos-not-visible');
		eos_dp_restore_plugins_filter();
		$.ajax({
			type : "POST",
			url : ajaxurl,
			data : {
				"nonce" : $("#eos_dp_arch_setts").val(),
				"archives" : dataArchives,
				"archivesUrls" : dataArchivesUrls,
				"action" : 'eos_dp_save_archives_settings'
			},
			success : function (response) {
				ajax_loader.addClass('eos-not-visible');
				if (parseInt(response) == 1) {
					$('.eos-dp-opts-msg_success').removeClass('eos-hidden');
					var checked = '';
					$('#eos-dp-setts input[type=checkbox]').each(function(){
						checked = $(this).is(':checked') ? 'checked' : 'not-checked';
						$(this).attr('data-checked',checked);
					});
				} else {
					eos_dp_show_errors(response);
				}
			}
		});
		return false;
	});
	$(".eos-dp-save-eos_dp_mobile").on("click", function () {
		$('.eos-dp-opts-msg').addClass('eos-hidden');
		var chk,str = '';
		$('.eos-dp-mobile').each(function(){
			chk = $(this);
			str += !chk.is(':checked') ? ',' + $(this).attr('data-path') : ',';
		});
		eos_dp_send_ajax($(this),{
			"nonce" : $("#eos_dp_mobile_setts").val(),
			"eos_dp_mobile" : str,
			"action" : 'eos_dp_save_mobile_settings'
		});
		return false;
	});
	$(".eos-dp-save-eos_dp_search").on("click", function () {
		$('.eos-dp-opts-msg').addClass('eos-hidden');
		var chk,str = '';
		$('.eos-dp-search').each(function(){
			chk = $(this);
			str += !chk.is(':checked') ? ',' + $(this).attr('data-path') : ',';
		});
		eos_dp_send_ajax($(this),{
			"nonce" : $("#eos_dp_search_setts").val(),
			"eos_dp_search" : str,
			"action" : 'eos_dp_save_search_settings'
		});
		return false;
	});
	$(".eos-dp-save-eos_dp_admin_url").on("click", function () {
		$('.eos-dp-opts-msg').addClass('eos-hidden');
		eos_dp_show_all_plugins();
		var data_url = {},
			urls = document.getElementsByClassName('eos-dp-url'),
			url = '';
		for(var n = 0;n < urls.length - 1;++n){
			var plugins = [],
				chks = urls[n].getElementsByClassName('eos-dp-td-url-chk-wrp');
			for(k = 0;k < chks.length;++k){
				if(!$(chks[k].getElementsByTagName('input')).closest('td').hasClass('eos-dp-active')){
					plugins[k] = document.getElementById('eos-dp-plugin-name-' + (k + 1)).getAttribute('data-path');
				}
			}
			url = $(urls[n]).find('.eos-dp-url-input').val();
			data_url[n] = {};
			data_url[n]['url'] = url;
			data_url[n]['plugins'] = plugins.join(',');
		};
		eos_dp_restore_plugins_filter();
		eos_dp_send_ajax( $(this),{
			"nonce" : $("#eos_dp_admin_url_setts").val(),
			"eos_dp_admin_url_setts" : JSON.stringify(data_url),
			"action" : 'eos_dp_save_admin_url_settings'
		} );
		return false;
	});
	$(".eos-dp-save-eos_dp_integration").on("click", function () {
		eos_dp_show_all_plugins();
		$('.eos-dp-opts-msg').addClass('eos-hidden');
		var data_action = {},
			data_action_theme = {},
			actions = document.getElementsByClassName('eos-dp-integration-row'),
			action = '';
		for(var n = 0;n < actions.length;++n){
			var plugins = [],
				chks = actions[n].getElementsByClassName('eos-dp-td-integration-chk-wrp');
			for(k = 0;k < chks.length - 1;++k){
				if($(chks[k]).is(':visible') && !$(chks[k].getElementsByTagName('input')).closest('td').hasClass('eos-dp-active')){
					plugins[k] = document.getElementById('eos-dp-plugin-name-' + (k + 1)).getAttribute('data-path');
				}
			}
			action = $(actions[n]).attr('data-integration');
			data_action[action] = plugins.join(',');
			data_action_theme[action] = $(chks[k].getElementsByTagName('input')).closest('td').hasClass('eos-dp-active');
		};
		eos_dp_restore_plugins_filter();
		eos_dp_send_ajax( $(this),{
			"nonce" : $("#eos_dp_integration_actions_setts").val(),
			"integration_plugins" : JSON.stringify(data_action),
			"integration_theme" : JSON.stringify(data_action_theme),
			"action" : 'eos_dp_save_integration_actions_settings'
		} );
		return false;
	});
	$(".eos-dp-save-eos_dp_admin").on("click", function () {
		eos_dp_show_all_plugins();
		$('.eos-dp-opts-msg').addClass('eos-hidden');
		var data_admin = {},
			theme_activation = {},
			section = $('#eos-dp-by-admin-section'),
			eos_dp_admin = document.getElementsByClassName('eos-dp-admin-row');
		for(var n = 0;n < eos_dp_admin.length;++n){
			var plugins = [],
			chks = eos_dp_admin[n].getElementsByClassName('eos-dp-td-admin-chk-wrp');
			for(var k = 0;k < chks.length - 1;++k){
				if(!$(chks[k].getElementsByTagName('input')).closest('td').hasClass('eos-dp-active')){
					plugins[k] = $('#eos-dp-plugin-name-' + (k + 1)).attr('data-path');
				}
			}
			var key = eos_dp_admin[n].getAttribute('data-admin');
			theme_activation[key] = $(chks[k].getElementsByTagName('input')).closest('td').hasClass('eos-dp-active');
			data_admin[key] = plugins.join(',');
		}
		var icons = {},
			parent_titles = {};
		$('#adminmenu a').each(function(){
			var menu_item = $(this);
			if(menu_item.hasClass('menu-top')){
				var	icon = menu_item.find('.wp-menu-image').attr('class'),
					parent_titleEl = menu_item.find('.wp-menu-name'),
					parent_title_remove = parent_titleEl.children('span').text(),
					parent_title = parent_titleEl.text().replace(parent_title_remove,''),
					icon_img = menu_item.find('img');
				if(icon && 'undefined' !== icon && icon_img.length < 1){
					icon = icon.replace('wp-menu-image ','').replace('dashicons-before ','');
				}
				else{
					icon = icon_img.length > 0 ? icon_img.attr('src') : '';
				}
				icons[menu_item.attr('href')] = icon;
				parent_titles[menu_item.attr('href')] = parent_title;
			}
		});
		var data = {
			"nonce" : $("#eos_dp_admin_setts").val(),
			"eos_dp_admin_setts" : JSON.stringify(data_admin),
			"menu_in_topbar" : $('#menu_in_topbar').is(':checked'),
			"replace_admin_menu" : false,
			"icons" : icons,
			"parent_titles" : parent_titles,
			"admin_menus" : eos_dp_admin_pages,
			"theme_activation" : JSON.stringify(theme_activation),
			"action" : 'eos_dp_save_admin_settings'
		};
		if($('#replace_admin_menu').is(':checked')){
			data["replace_admin_menu"] = true,
			data["admin_menu_html"] = $('#adminmenu').html(),
			data["admin_menu"] = section.attr('data-menu'),
			data["admin_submenu"] = section.attr('data-submenu');
		}
		eos_dp_restore_plugins_filter();
		eos_dp_send_ajax($(this),data);
		return false;
	});
	$(".eos-dp-save-eos_dp_firing_order").on("click", function () {
		$('.eos-dp-opts-msg').addClass('eos-hidden');
		var plugins = [];
		$('.eos-dp-plugin.ui-sortable-handle').each(function(){
			plugins.push($(this).attr('data-path'));
		});
		eos_dp_send_ajax($(this),{
			"nonce" : $("#eos_dp_firing_order_setts").val(),
			"eos_dp_plugins" : plugins,
			"action" : 'eos_dp_save_firing_order'
		});
		return false;
	});
	$('#current-page-selector').on('keypress',function(e){
		if(e.which == 13) {
			if(parseInt(this.value) - this.value !== 0) return false;
			window.location.href = $(this).attr('data-url') + '&eos_page=' + this.value;
		}
	});
	$('#eos-dp-setts').on('mouseenter','td',function(){
		if($(this).closest('tr').hasClass('fdp-row-separator')) return;
		var extra_class = $(this).parent().hasClass('eos-dp-active') ? ' eos-dp-plugin-active' : ' eos-dp-plugin-not-active',
			idxX = $(this).index(),
			idxY = 'undefined' !== typeof(eos_dp_js.page) && 'eos_dp_admin' === eos_dp_js.page ? $(this).closest('tr').index($('.eos-dp-post-row')) : $(this).closest('tr').index();
		if($(this).find('.eos-dp-td-chk-wrp')){
			$('.eos-dp-name-th').eq(idxX - 1).addClass('eos-dp-plugin-hover' + extra_class);
			$('#eos-dp-setts td[data-path="' + this.dataset.path + '"]').addClass('eos-dp-col-hover');
		}
		if('undefined' !== typeof(eos_dp_js.page) && 'eos_dp_admin' === eos_dp_js.page){
			$(this).closest('tr').addClass('eos-dp-row-hover');
		}
		else{
			$('.eos-dp-post-row').eq(idxY - 2).addClass('eos-dp-row-hover');
		}
	});
	$('#eos-dp-setts').on('dblclick','.eos-dp-post-name-wrp',function(){
		$('.eos-dp-post-row').addClass('eos-hidden');
		$('#fdp-singles-filter span').removeClass('eos-dp-active');
		$(this).closest('tr').removeClass('eos-hidden');
	});
	$('#eos-dp-setts').on('mouseleave','td',function(){
		var idxX = $(this).index(),
			idxY = 'undefined' !== typeof(eos_dp_js.page) && 'eos_dp_admin' === eos_dp_js.page ? $(this).closest('tr').index($('.eos-dp-post-row')) : $(this).closest('tr').index();
		if($(this).find('.eos-dp-td-chk-wrp')){
			$('.eos-dp-name-th').eq(idxX - 1).removeClass('eos-dp-plugin-hover').removeClass('eos-dp-plugin-active').removeClass('eos-dp-plugin-not-active');
			$('#eos-dp-setts td[data-path="' + this.dataset.path + '"]').removeClass('eos-dp-col-hover');
		}
		if('undefined' !== typeof(eos_dp_js.page) && 'eos_dp_admin' === eos_dp_js.page){
			$(this).closest('tr').removeClass('eos-dp-row-hover');
		}
		else{
			$('.eos-dp-post-row').eq(idxY - 2).removeClass('eos-dp-row-hover');
		}
	});
	$('#eos-dp-posts-per-page,#eos-dp-orderby-sel,#eos-dp-order-sel,#eos-dp-device').on('change',function(){
		var post_type = $('#eos-dp-singles-title').attr('data-post-type'),href = eos_dp_posts_href(this,post_type);
		document.getElementById('eos-dp-order-refresh').href = href;
		return false;
	});
	$('#eos-dp-toggle-pagination').on('click',function(){
		var el = $('#eos-dp-order-wrp');
		el.toggleClass('eos-hidden');
		if(!el.hasClass('eos-hidden')){
			$('.eos-dp-search-wrp').addClass('eos-hidden');
		}
	});
	$('#eos-dp-toggle-search').on('click',function(){
		var el = $('.eos-dp-search-wrp');
		el.toggleClass('eos-hidden');
		if(!el.hasClass('eos-hidden')){
			$('#eos-dp-order-wrp').addClass('eos-hidden');
		}
	});
	$('#eos-dp-post-search-submit').on('click',function(){
		window.location.href = $(this).attr('data-url') + '&eos_post_title=' + encodeURI($(this).prev().val()) + '&posts_per_page=' + document.getElementById('eos-dp-posts-per-page').value;
		return false;
	});
	$('#eos-dp-by-cat-search-submit').on('click',function(){
		window.location.href = $(this).attr('data-url') + '&eos_cat=' + $('#eos-dp-by-cat-search select').val() + '&posts_per_page=' + document.getElementById('eos-dp-posts-per-page').value;
		return false;
	});
	var eos_dp_plugins_comparison = $("#eos-dp-plugins-comparison");
	if(eos_dp_plugins_comparison.length > 0){
		$('#eos-dp-show-comparison').on('click',function(){
			$([document.documentElement, document.body]).animate({
				scrollTop: $("#eos-dp-plugins-comparison").offset().top
			},1000);
		});
	}
	else{
		$('#eos-dp-show-comparison').remove();
	}
	$('#eos-dp-go-to-top').on('click',function(){
		$([document.documentElement, document.body]).animate({
			scrollTop: 0
		},500);
	});
	$('#eos-dp-collapse-all').on('click',function(){
		$('.eos-dp-plugin-info-section').removeClass('open').addClass('close');
	});
	$('#eos-dp-expand-all').on('click',function(){
		$('.eos-dp-plugin-info-section').removeClass('close').addClass('open');
	});
	$('.eos-dp-toggle-div').on('click',function(){
		var div = $(this).closest('.eos-dp-plugin-info-section'),
			is_open = div.hasClass('open');
		$('.eos-dp-plugin-info-section').removeClass('open').addClass('close');
		if(is_open){
			div.removeClass('open').addClass('close');
		}
		else{
			div.addClass('open').removeClass('close');
		}
	});
	$("#eos-dp-popup-close").on("click",function(e){
		$('#eos-dp-popup').hide();
	});
	$("#wp-admin-bar-eos-dp-menu li>a").on("click",function(e){
		e.stopPropagation();
		e.stopImmediatePropagation();
		if($("#eos-dp-get-screen").hasClass('eos-dp-active')){
			var href = this.href;
			if(href && href.length > 4){
				$('#eos-dp-setts a').each(function(){
					if(this.href === href){
						var ofs = $('#eos-dp-setts').hasClass('fixed') ? $('#eos-dp-table-head').height() : 2*$('#eos-dp-table-head').height();
						$([document.documentElement,document.body]).animate({
							scrollTop: $(this).closest('tr').offset().top - ofs - $('#wpadminbar').height() - 130
						},2000);
						$("#eos-dp-get-screen").removeClass('eos-dp-active');
						return false;
					}
				});
			}
			return false;
		}
	});
	$("#eos-dp-get-screen").on("click", function () {
		$(this).toggleClass('eos-dp-active');
		if($(this).hasClass('eos-dp-active')){
			$('#wp-admin-bar-eos-dp-menu').addClass('hover');
		}
		else{
			$('#wp-admin-bar-eos-dp-menu').addClass('hover');
		}
	});
	$("#eos-dp-stop-process").on("click", function () {
		window.eos_dp_stop_process = true;
		var table_temp = {},
			row = {};
		$('.eos-dp-post-row').each(function(n,r){
			$(this).find('td').not('.eos-dp-post-name-wrp').each(function(idx,el){
				row[idx] = $(this).hasClass('eos-dp-active') ? 1 : 0;
			});
			table_temp[n] = JSON.stringify(row);
		});
		window.localStorage.setItem('fdp_table_temp',JSON.stringify(table_temp));
		$(this).addClass('eos-dp-not-active');
		window.location.href = window.location.href + '&fdp-process=stopped'
	});
	if(window.location.href.indexOf('&fdp-process=stopped') > 0){
		eos_dp_update_table_by_local_storage();
		history.pushState({},null,window.location.href.replace('&fdp-process=stopped',''));
	}
	$(".eos-dp-pro-autosettings").on("click", function () {
		window.eos_dp_autosuggest_counter = 0;
		if('undefined' !== typeof(window.eos_dp_stop_process) && window.eos_dp_stop_process){
			window.eos_dp_stop_process = false;
			return;
		}
		$('#eos-dp-stop-process').removeClass('eos-dp-not-active');
		$('#eos-dp-autosuggest-msg').removeClass('eos-hidden');
		$('#eos-dp-autosuggest-msg-error').addClass('eos-hidden');
		var button = 'undefined' !== typeof(is_single_post) && is_single_post ? $('.eos-dp-post-row td').first() : $(this),
			backend = 'undefined' !== typeof(eos_dp_js.page) && 'eos_dp_admin' === eos_dp_js.page,
			ajax_loader = $(this).next(".ajax-loader-img"),
			plugins= [],
			data = {
				"offset" : 0,
				"nonce" : backend ? $("#eos_dp_pro_auto_settings_admin").val() : $("#eos_dp_pro_auto_settings").val(),
				"action" : backend ? 'eos_dp_pro_auto_settings_admin' : 'eos_dp_pro_auto_settings'
			};
		$('.eos-dp-plugin-name').each(function(){
			plugins.push($(this).attr('data-path'));
		});
		data.plugins = plugins.join(',');
		if(backend){
			data.admin_page = button.closest('tr').find('.eos-dp-title').attr('href');
		}
		else{
			if('undefined' !== typeof(eos_dp_js.page) && 'eos_dp_by_archive' === eos_dp_js.page){
				data.post_type = button.closest('tr').attr('data-post-type');
			}
			else{
				data.post_id = 'undefined' !== typeof(is_single_post) && is_single_post ? $('.eos-dp-actions').attr('data-post-id') : button.closest('.eos-dp-actions').attr('data-post-id');
			}
		}
		if('undefined' !== typeof(eos_dp_js.dependencies)){
			data.dependencies = eos_dp_js.dependencies;
		}
		window.eos_dp_row =  button.closest('tr');
		$('.eos-dp-section table').addClass('eos-dp-progress');
		ajax_loader.removeClass('eos-hidden').removeClass('eos-not-visible');
		eos_dp_row.addClass('eos-test-in-progress');
		eos_dp_animate_checkboxes();
		button
			.addClass('eos-active-test')
			.closest('table').addClass('eos-dp-progress');
		$('.eos-dp-autochecked').removeClass('eos-dp-autochecked');
		eos_dp_send_autosuggest_request(button,data);
		return false;
	});
	$("#eos-dp-storage-btns-set span").on("click", function () {
		eos_dp_memorize_table($(this).attr('data-id'));
	});
	if('undefined' !== typeof(eos_dp_storage_page_id)){
		eos_dp_memorize_table(eos_dp_storage_page_id);
	}
	$("#eos-dp-storage-btns-get span,#eos-dp-restore-options").on("click", function () {
		eos_dp_fill_table_by_storage($(this).attr('data-id'));
	});
	setTimeout(function(){
		remote_help_username.val(remote_help_username.attr('data-value'));
		remote_help_password.val(remote_help_password.attr('data-value'));
	},1000);
	$(".fdp-filter-all").on("click", function () {
		$('#fdp-singles-filter span').addClass('eos-dp-active');
		$(".fdp-filter-hide-all").removeClass('eos-active');
		$(this).addClass('eos-active');
		$('.eos-dp-post-row').removeClass('eos-hidden');
	});
	$(".fdp-filter-hide-all").on("click", function () {
		$('#fdp-singles-filter span').removeClass('eos-dp-active');
		$(".fdp-filter-all").removeClass('eos-active');
		$(this).addClass('eos-active');
		$('.eos-dp-post-row').addClass('eos-hidden');
	});
	$("#fdp-singles-filter .dashicons").on("click", function () {
		$("#fdp-singles-filter .dashicons").removeClass('eos-dp-active');
		$(this).addClass('eos-dp-active');
		$('.fdp-filter-all').removeClass('eos-active');
		jQuery('.eos-dp-post-row').addClass('eos-hidden');
		jQuery(this.dataset.class).removeClass('eos-hidden');
	});
	$("#eos-dp-ajax-slug").on("click", function () {
		$('.eos-dp-ajax-desc').addClass('eos-hidden');
		$('.eos-dp-ajax-slug').removeClass('eos-hidden');
	});
	$("#eos-dp-ajax-desc").on("click", function () {
		$('.eos-dp-ajax-slug').addClass('eos-hidden');
		$('.eos-dp-ajax-desc').removeClass('eos-hidden');
	});
	if('undefined' !== typeof(eos_dp_js.page) && ('eos_dp_url' === eos_dp_js.page || 'eos_dp_firing_order' === eos_dp_js.page || 'eos_dp_ajax' === eos_dp_js.page || 'eos_dp_logged' === eos_dp_js.page ) ){
		$('.eos-dp-urls').sortable({
			axis : "y",
			containment : "parent",
			items: ".eos-dp-url"
		});
		$('.eos-dp-firing-order').sortable({
			axis : "y",
			containment : "parent",
			items: ".eos-dp-plugin"
		});
		$('.eos-dp-logged').sortable({
			axis : "y",
			containment : "parent",
			items: ".eos-dp-logged-row"
		});
		$('.eos-ui-sortable').disableSelection();
	}
	$('#fdp-create-plugin').on('click',function(){
		$('#fdp-success,#fdp-fail').addClass('eos-hidden');
		var data = {
			"nonce" : $("#fdp_create_plugin").val(),
			"plugin_name" : $("#fdp-create-plugin-name").val(),
			"plugin_author" : $("#fdp-create-plugin-author").val(),
			"plugin_author_uri" : $("#fdp-create-plugin-author_uri").val(),
			"plugin_description" : $("#fdp-create-plugin-description").val(),
			"action" : 'eos_dp_create_plugin'
		},
		button = $(this);
		button.addClass('eos-dp-progress');
		$.ajax({
			type : "POST",
			url : ajaxurl,
			data : data,
			success : function (response) {
				button.removeClass('eos-dp-progress');
				if('' !== response) {
					var json = JSON.parse(response);
					if(0 === json || 'undefined' !== typeof(json.error)){
						var failMsg = $('#fdp-fail');
						failMsg.text('');
						if('' !== json.error){
							failMsg.text(json.error);
						}else{
							failMsg.text(failMsg.attr('data-default_msg'));
						}
						if('' === failMsg.text()) failMsg.text(failMsg.attr('data-default_msg'));
						failMsg.removeClass('eos-hidden');
						return;
					}
					else{
						if('undefined' !== typeof(json.edit) && 'false' !== json.edit){
							$('#fdp-edit-new-plugin').attr('href',json.edit.split('&amp;').join('&')).removeClass('eos-hidden');
						}
						else{
							$('#fdp-edit-new-plugin').addClass('eos-hidden');
						}
						if('undefined' !== typeof(json.activate) && 'false' !== json.activate){
							$('#fdp-activate-new-plugin').attr('href',json.activate.split('&amp;').join('&')).removeClass('eos-hidden');
						}
						else{
							$('#fdp-activate-new-plugin').addClass('eos-hidden');
						}
					}
					$('.eos-dp-opts-msg_success').removeClass('eos-hidden');
				}
			}
		});
		return false;
	});
	$('#collapse-button').on('click',function(){
		$('body').toggleClass('folded');
	});
	$('.fdp-plugins-slider').on('input',function(){
		var ofs = -parseInt(this.value) * $('#eos-dp-setts td').last().width();
		$('.fdp-plugins-slider').val(this.value);
		$('.eos-dp-post-row td, #eos-dp-table-head .eos-dp-name-th').not('.eos-dp-post-name-wrp').css('transform','translateX(' + ofs + 'px)');
	});
	$('#fdp-toggle-storage').on('click',function(){
		$('#eos-dp-storage-wrp').toggleClass('eos-hidden');
	});
	$('.fdp-plug-filter').on('click',function(){
		var th = $('.eos-dp-name-th'),
			tr = $('.eos-dp-post-row'),
			min = parseInt(this.dataset.min),
			max = parseInt(this.dataset.max),
			collection;
		$('.fdp-plug-filter').removeClass('eos-active');
		$(this).addClass('eos-active');
		th.removeClass('eos-hidden').removeClass('eos-prepare-hidden');
		tr.find('td').removeClass('eos-hidden').removeClass('eos-prepare-hidden');
		if('all' !== this.dataset.min){
			th.addClass('eos-prepare-hidden');
			tr.find('td').not('.eos-dp-post-name-wrp').addClass('eos-prepare-hidden');
			th.slice(min - 1,max).removeClass('eos-prepare-hidden');
			tr.each(function(){
				$(this).find('td').not('eos-dp-post-name-wrp').slice(min,max + 1).removeClass('eos-prepare-hidden');
			});
		}
		$('.eos-prepare-hidden').addClass('eos-hidden').removeClass('eos-prepare-hidden');
    $('.fdp-plugins-slider').val(0).trigger('input');
	});
	$('.fdp-hooks-global-delete').on('click',function(){
		var wrp = $(this).closest('.fdp-hooks-global-actions');
		$.ajax({
			type : "POST",
			url : ajaxurl,
			data : {
				"post_id" : wrp.attr('data-post_id'),
				"hook_name" : wrp.attr('data-hook_name'),
				"function_name" : wrp.attr('data-function_name'),
				"nonce" : $("#eos_dp_global_hooks_nonce").val(),
				"action" : 'eos_dp_pro_global_hooks_delete_row'
			},
			success : function (response) {
				if('1' === response){
					wrp.closest('tr').css('background','#ebbcbdf').fadeOut(500);
				}
				else{
					alert('Hook not removed. Refresh the pag and try again.');
				}
			}
		});
		return false;
	});
	if(psiButtons && psiButtons.length > 0){
		setInterval(function(){
			$.ajax({
				type : "POST",
				url : ajaxurl,
				cacge : false,
				data : {
					"nonce" : $("#eos_dp_key").val(),
					"action" : 'eos_dp_updated_key_for_preview'
				},
				success : function (response) {
					if('' !== response){
						var href = '';
						psiButtons.each(function(){
							href = this.href.split('%26eos_dp_preview%3D')[0];
							this.href = href + '%26eos_dp_preview%3D' + response;
						});
					}
				}
			});
		},5000);
	}
	window.onscroll = eos_move_table_head;
	window.onbeforeunload = function(event){
		window.scrollTo(0,0);
		$('html, body').css({
			overflow: 'hidden',
			height: '100%'
		});
	};
	if('undefined' !== typeof(eos_dp_js.page) && 'eos_dp_admin' === eos_dp_js.page){
		jQuery("#adminmenu").contextMenu([
		  [{
	      text: "Disable Plugins",
	      action: function () {
	        eos_dp_go_to_item();
	      }
	    }],
		],{
			name: "FDP",
			offsetX: 15,
			offsetY: 5
		});
	}
	fdp_synchronize_dependencies();
});

jQuery.fn.contextMenu = function(data,params){
		var $body = jQuery("body"),
			keyMap = {},
			idKey = "fdp_right_", classKey = "fdp-right-",
			name = name || ("JCM_" + +new Date() + (Math.floor(Math.random() * 1000) + 1)),
			count = 0;
		var buildMenuHtml = function (mdata) {
			var menuData = mdata || data,
				idName = idKey + (mdata ? count++ : name),
				className = classKey + "box";
			var $mbox = jQuery('<div id="' + idName + '" class="' + className + '" style="position:absolute;display:none;padding:0 10px;z-index:99999999;background:#000;color:#fff">');
			jQuery.each(menuData, function (index, group) {
				if (!jQuery.isArray(group)) {
						throw TypeError();
				}
				index && $mbox.append('<div class="' + classKey + 'separ">');
				if(!group.length) return;
				var $ul = jQuery('<ul class="' + classKey + 'group">');
				jQuery.each(group, function (innerIndex, item) {
					var key, $li = jQuery("<li>" + item.text + (jQuery.isArray(item.items) && item.items.length ? buildMenuHtml(item.items) : "") + "</li>");
					jQuery.isFunction(item.action) && (key = (name + "_" + count + "_" + index + "_" + innerIndex), keyMap[key] = item.action, $li.attr("data-key", key));
					$ul.append($li).appendTo($mbox);
				});
			});
			var html = $mbox.get(0).outerHTML;
			$mbox = null;
			return html;
		},
		createContextMenu = function () {
			var $menu = jQuery("#" + idKey + name);
			if (!$menu.length) {
				var html = buildMenuHtml();
				$menu = jQuery(html).appendTo($body);
				jQuery("li", $menu).on("mouseover", function () {
					jQuery(this).addClass("hover").children("." + classKey + "box").show();
				}).on("mouseout", function () {
					jQuery(this).removeClass("hover").children("." + classKey + "box").hide();
				}).on("click", function () {
					var key = jQuery(this).data("key");
					key && (keyMap[key].call(this) !== false) && $menu.hide();
				});
				$menu.on("contextmenu", function () {
					return false;
				});
			}
			return $menu;
		};
		$body.on("mousedown", function (e) {
			var jid = ("#" + idKey + name);
			!jQuery(e.target).closest(jid).length && jQuery(jid).hide();
		});
		return this.each(function () {
			jQuery(this).on("contextmenu", function (e) {
				e.cancelBubble = true;
				e.preventDefault();
				var $menu = createContextMenu();
				$menu.show().offset({left: e.clientX + params.offsetX, top: e.clientY + params.offsetY});
				window.fdp_backend_item = e.target.innerText;
				window.fdp_row_target = e.target;
			});
		});
};

jQuery.fn.eos_dp_shiftSelectable = function() {
    var lastChecked,
		thisClass = jQuery(this).attr('class');
	if('undefined' === typeof(thisClass)) return;
	var boxesClasses = thisClass.split(' ');
    try{
		$boxes = jQuery('.' + boxesClasses[0] + ',.' + boxesClasses[1]);
	}
	catch(err){
		throw '.' + boxesClasses[0] + ',.' + boxesClasses[1] + ' is not a CSS selector';
		return;
	}
    $boxes.on('click',function(evt) {
        if(evt.shiftKey) {
			if(!lastChecked) {
				lastChecked = this;
				return;
			}
			var classes = jQuery(this).attr('class').split(' '),
				lastClasses = jQuery(lastChecked).attr('class'),
				diffClass = '',
				sameClasses = [],
				n = 0;
			for(n;n < classes.length;++n){
				if(lastClasses.indexOf(classes[n]) < 0 ){
					diffClass = classes[n];
				}
				else{
					sameClasses.push(classes[n]);
				}
			}
			sameClass = '.' + sameClasses.join(',');
			if('.' !== sameClasses && !window.eos_dp_grouped){
				var lastCheckedWrp = jQuery(lastChecked).parent('.eos-dp-td-chk-wrp'),
					lastCheckedClass = lastCheckedWrp.parent().attr('class'),
					dataChecked,
					start = jQuery(sameClass).parent('.eos-dp-td-chk-wrp').parent().index(lastCheckedWrp.parent()),
					end = jQuery(sameClass).parent('.eos-dp-td-chk-wrp').parent().index(jQuery(this).parent('.eos-dp-td-chk-wrp').parent()),
					group =  jQuery(sameClass).slice(Math.max(0,Math.min(start,end)),Math.max(start,end) + 1);
				if(lastCheckedClass.indexOf('eos-dp-active') > 0){
					var checked = false;
				}
				else{
					var checked = true;
				}
				group
					.attr('checked',checked)
					.trigger('change');

				group.parent('.eos-dp-td-chk-wrp').parent().attr('class',lastCheckedClass);
				window.eos_dp_grouped = true;
			}
			else{
				lastChecked = null;
				$boxes = null;
			}
        }
    });
	$boxes.on('mouseleave',function(evt) {
		if(!evt.shiftKey) {
			lastChecked = null;
			$boxes = null;
		}
	});
}
function eos_dp_go_to_item(){
	if('undefined' !== typeof(window.fdp_backend_item)){
		jQuery('.fdp-admin-menu-title').each(function(){
			if(window.fdp_backend_item === jQuery(this).text()){
				window.location.href = window.location.href + '&item=' + encodeURI(window.fdp_backend_item);
				return;
			}
		});
	}
}
function eos_dp_update_chks(chk){
	if(!chk.first().is(':checked')){
		chk.closest('td').addClass('eos-dp-active');
	}
	else{
		chk.closest('td').removeClass('eos-dp-active');
	}
}
function eos_move_table_head(){
	var table = document.getElementById('eos-dp-setts'),table_head = document.getElementById('eos-dp-table-head');
	if(null === table_head) return;
	if(table && ('undefined' === typeof(is_single_post) || true !== is_single_post)){
		if(window.scrollY > 150){
			window.fdp_tmoved = true;
			var first_col = jQuery('.eos-dp-post-row td'),
				ofs = first_col.outerWidth(),
				ofs = eos_dp_js.is_rtl !== '1' ? ofs : - ofs;
				table_head.style.transform = 'translateX(' + ofs + 'px)';
			table.className = 'fixed';
			jQuery('body').addClass('fdp-table-fixed');
			return;
		}
		else if(window.scrollY < 100 && 'undefined' !== typeof(window.fdp_tmoved)){
			setTimeout(function(){
				if(window.scrollY < 80){
					table.className = '';
					table_head.style.transform = 'none';
					jQuery('body').removeClass('fdp-table-fixed');
					return;
				}
			},200);
		}
	}
}
function eos_dp_update_chk_wrp(chk,checked){
	if(true === checked){
		chk.parent().removeClass('eos-dp-active-wrp').addClass('eos-dp-not-active-wrp');
	}
	else{
		chk.parent().addClass('eos-dp-active-wrp').removeClass('eos-dp-not-active-wrp');
	}
}
function eos_dp_go_to_post_type(post_type){
	var tableHead = jQuery('#eos-dp-setts.fixed');
	var offs = tableHead.length < 1 ? parseInt(jQuery('#eos-dp-setts').offset().top) : 0;
	jQuery('.eos-dp-post-name').each(function(){
		if(jQuery(this).text().toLowerCase().split(' ').join('-')  === post_type.toLowerCase().split(' ').join('-') ){
			var el = jQuery(this).closest('.eos-dp-filters-table');
			if('undefined' !== typeof(el)){
				jQuery('html,body').animate({
					scrollTop: parseInt(el.offset().top) - offs - 40
				},500);
			}
			return false;
		}
	});
}
function eos_dp_posts_href(el,post_type){
	var device = '',
		device_sel = document.getElementById('eos-dp-device');
	if(device_sel){
		device = '&device=' + device_sel.value;
	}
	return window.location.href.split('?')[0] + '?page=eos_dp_menu&eos_dp_post_type=' + post_type + '&orderby=' + document.getElementById('eos-dp-orderby-sel').value + '&order=' + document.getElementById('eos-dp-order-sel').value + '&posts_per_page=' + document.getElementById('eos-dp-posts-per-page').value + device;
}
function eos_dp_set_horizontal_cell_width(){
	var	w = (jQuery('.eos-dp-section').width() - jQuery('.eos-dp-post-name-wrp').outerWidth())/plugsN - 10;
	jQuery('.eos-dp-horizontal .eos-dp-td-chk-wrp,.eos-dp-horizontal .eos-dp-plugin-name').css('width',w + 'px');
}
function eos_dp_clone_row_options(source_row,destination_row){
	var setts = eos_dp_row2setts(source_row);
	eos_dp_paste_setts(setts,destination_row);
}
function eos_dp_row2setts(row){
	var setts = [];
	row.find('.eos-dp-td-chk-wrp').closest('td').each(function(){
		setts.push(!jQuery(this).hasClass('eos-dp-active'));
	});
	return setts;
}
function eos_dp_paste_setts(setts,row){
	var chks = row.find('.eos-dp-td-chk-wrp input');
	if(setts.length !== chks.length) return;
	chks.each(function(idx,el){
		var td = jQuery(el).closest('td'),chk = jQuery(el);
		if(!setts[idx]){
			td.addClass('eos-dp-active');
			chk.attr('checked',false);
		}
		else{
			td.removeClass('eos-dp-active');
			chk.attr('checked',true);
		}
	});
}
function eos_dp_paste_last_copied_setts(row){
	if('undefined' !== typeof(window.eos_dp_last_copied_row)){
		var setts = window.eos_dp_last_copied_row
	}
	else{
		var setts = localStorage.getItem('eos_dp_last_copied_row');
		if(setts && '' !== setts){
			setts = JSON.parse(setts);
		}
	}
	if(setts){
		eos_dp_paste_setts(setts,row);
	}
}
function eos_dp_animate_checkboxes(){
	var	counter = 0,
	cols = eos_dp_row.find('td');
	cols
		.css('opacity','1')
		.removeClass('eos-dp-auto-checked')
	fdpCheckboxesInterval = setInterval(function(){
		jQuery('.eos-dp-name-th').removeClass('eos-dp-plugin-hover');
		jQuery('.eos-dp-name-th').eq(counter - 1).addClass('eos-dp-plugin-hover');
		cols.css('opacity','1')
		cols.eq(counter)
				.css('opacity','0.6')
		++counter;
		if(counter > cols.length) counter = 0;
	},100);
}
function eos_dp_stop_checkbox_animation(){
	if('undefined' !== typeof(fdpCheckboxesInterval) && 'undefined' !== typeof(eos_dp_row)){
		clearInterval(fdpCheckboxesInterval);
		eos_dp_row.find('td').addClass('eos-dp-auto-checked').css('opacity','1');
		jQuery('.eos-dp-name-th').removeClass('eos-dp-plugin-hover');
		delete eos_dp_row;
	}
}
function eos_dp_pro_check_suggestion_execution(){
	if('undefined' !== typeof(window.eos_dp_actual_row_in_progress)){
		if(jQuery('.eos-dp-post-row').length - window.eos_dp_actual_row_in_progress < 1){
			if('undefined' !== typeof(fdpCheckboxesInterval)){
				window.clearInterval(fdpCheckboxesInterval);
			}
			if('undefined' !== typeof(window.eos_dp_pro_suggest_allInterval)){
				window.clearInterval(eos_dp_pro_suggest_allInterval);
			}
			window.eos_dp_actual_row_in_progress = 0;
		}
	}
}
function eos_dp_send_ajax( button,data ){
	var ajax_loader = button.next(".ajax-loader-img");
	ajax_loader.removeClass('eos-not-visible');
	jQuery.ajax({
		type : "POST",
		url : ajaxurl,
		data : data,
		success : function (response) {
			ajax_loader.addClass('eos-not-visible');
			jQuery('.eos-dp-section table').removeClass('eos-dp-progress');
			button.removeClass('eos-dp-progress');
			if (parseInt(response) == 1) {
				jQuery('.eos-dp-opts-msg_success').removeClass('eos-hidden');
			} else {
				eos_dp_show_errors(response);
			}
		}
	});
}
function eos_dp_send_ajax_popup( button,data ){
	var td = jQuery(button).closest('td');
	td.addClass("eos-dp-progress");
	jQuery.ajax({
		type : "POST",
		url : ajaxurl,
		data : data,
		success : function (response) {
			if(response) {
				var html = '';
				if( '' !== response){
					try{
						if(0 === response.indexOf('error-')){
							html += response.substring(6,response.length);
							jQuery('#eos-dp-popup-page-link').attr('href',button.dataset.url);
						}
						else{
							var json = jQuery.parseJSON(response),
								disabled = json.disabled,
								debug = json.eos_dp_debug,
								n = 0,
								type = 'log',
								msg = '',
								debug_type = [];
							html += '<p>URL: ' + json.url + '</p><br/>';
							if(disabled.length > 0){
								html += '<p><strong>The following plugins are disabled:</strong></p>';
							}
							else{
								html += '<p><strong>No Plugins are disabled:</strong></p>';
							}
							for(n in disabled){
								html += '<p>' + disabled[n] + '</p>';
							}
							html += '<p>----------------</p>';
							for(type in debug){
								debug_type = debug[type];
								for(msg in debug_type){
									html += '<p class="eos-dp-' + type + '">' + debug_type[msg] + '</p>';
								}
							}
							jQuery('#eos-dp-popup-page-link').attr('href',json.url);
						}
					}
					catch(err) {
						html += err.message;
					}
				}
				jQuery('#eos-dp-popup-txt').html(html);
				jQuery('#eos-dp-popup').show();
				if('function' === typeof(jQuery.fn.draggable)){
					jQuery('#eos-dp-popup').css('cursor','move').draggable();
				}
			}
			td.removeClass('eos-dp-progress');
			jQuery('.eos-dp-debug').removeClass('eos-dp-progress');
		}
	});
}
function eos_dp_show_errors(response){
	if(response !== '0' && response !== ''){
		jQuery('.eos-dp-opts-msg_warning').text(response);
		jQuery('.eos-dp-opts-msg_warning').removeClass('eos-hidden');
	}
	else{
		jQuery('.eos-dp-opts-msg_failed').removeClass('eos-hidden');
	}
}
function eos_dp_send_autosuggest_request(button,data){
	jQuery.ajax({
		type : "POST",
		url : ajaxurl,
		data : data,
		success : function (response){
			++window.eos_dp_autosuggest_counter;
			if('' !== response){
				jQuery('#eos-dp-autosuggest-msg').addClass('eos-hidden');
				if('error' !== response){
					json = jQuery.parseJSON(response);
					var row = 'undefined' !== typeof(is_single_post) && is_single_post ? jQuery('.eos-dp-post-row') : button.closest('.eos-dp-post-row'),
						path = '';
					row.find('input[type=checkbox]').filter(':visible').not('.eos-dp-global-chk-row').not('.eos-dp-lock-post').each(function(idx,el){
						if(idx + 1 > 4*(window.eos_dp_autosuggest_counter - 1) && idx < 4*(window.eos_dp_autosuggest_counter - 1) + 4 && idx < (jQuery('.eos-dp-name-th').length + 1)){
							chk = jQuery(this);
							path = chk.closest('td').attr('data-path');
							if(json.indexOf(path) > -1){
								chk
									.attr('checked',1)
									.closest('td').addClass('eos-dp-autochecked').removeClass('eos-dp-active').trigger('change')
							}
							else{
								chk
									.removeAttr('checked')
									.closest('td').addClass('eos-dp-autochecked').addClass('eos-dp-active').trigger('change')
							}
							chk.trigger('change');
						}

					});
					if('undefined' !== typeof(eos_dp_js.page) && 'eos_dp_admin' === eos_dp_js.page){
						var row = button.closest('tr'),
							href = row.find('.eos-dp-title').attr('href');
						jQuery('a.eos-dp-title[href="' + href + '"]').each(function(){
							eos_dp_clone_row_options(row,jQuery(this).closest('tr'));
						});
					}
					data.offset = 4*window.eos_dp_autosuggest_counter;
					if(parseInt(window.eos_dp_autosuggest_counter) < Math.ceil(jQuery('.eos-dp-name-th').length/4)){
						eos_dp_send_autosuggest_request(button,data);
					}
					else{
						if('eos_dp_admin' !== eos_dp_js.page){
							if('undefined' !== typeof(is_single_post)){
								jQuery('#eos-dp-lock-single-post').addClass('eos-post-locked');
							}
							else{
								row.addClass('eos-post-locked');
							}
						}
						eos_dp_stop_checkbox_animation();
						jQuery('.eos-dp-section table').removeClass('eos-dp-progress');
						jQuery('.eos-dp-autochecked').removeClass('eos-dp-autochecked');
						button
							.closest('tr').removeClass('eos-test-in-progress')
							.removeClass('eos-active-test')
							.closest('table').removeClass('eos-dp-progress')
							.next(".ajax-loader-img").addClass('eos-hidden').addClass('eos-not-visible');

						row.addClass('eos-post-locked');
						if('undefined' !== typeof(window.eos_dp_actual_row_in_progress) && null !== window.eos_dp_actual_row_in_progress){
							++window.eos_dp_actual_row_in_progress;
							var nextBtn = 'eos_dp_admin' !== eos_dp_js.page ? row.next().find('.eos-dp-pro-autosettings') : row.nextAll('.eos-dp-admin-row').first().find('.eos-dp-pro-autosettings');
							if(nextBtn.length > 0){
								nextBtn.trigger('click');
							}
							else{
								window.eos_dp_actual_row_in_progress = null;
							}
						}

						return false;
					}

				}
				else{
					jQuery('#eos-dp-autosuggest-msg-error').removeClass('eos-hidden');
					jQuery('.eos-dp-autochecked').removeClass('eos-dp-autochecked');
					eos_dp_stop_checkbox_animation();
					button
						.closest('tr').removeClass('eos-test-in-progress')
						.removeClass('eos-active-test')
						.closest('table').removeClass('eos-dp-progress')
						.next(".ajax-loader-img").addClass('eos-hidden').addClass('eos-not-visible');
					return false;
				}
			}
		}
	});
}
function eos_dp_debug_options(el){
	jQuery('.eos-dp-debug').addClass('eos-dp-progress');
	eos_dp_send_ajax_popup(el,{
		"nonce" : jQuery("#eos_dp_debug_options").val(),
		"url" : el.dataset.url,
		"action" : 'eos_dp_debug_options'
	});
	return false;
}
function eos_dp_memorize_table(storage_id){
	var tableObj = {},section = jQuery('.eos-dp-section'),table = section.find('table');
	table.find('.eos-dp-post-row').each(function(idx,el){
		var trOpts = [];
		jQuery(this).find('.eos-dp-td-chk-wrp').each(function(i,wrp){
			var td = jQuery(this).closest('td');
			if(td.hasClass('eos-dp-active')){
				trOpts.push(jQuery('#eos-dp-plugin-name-' + td.index()).attr('data-path'));
			}
		});
		tableObj[jQuery(this).attr('data-row_id')] = trOpts;
	});
	localStorage.setItem(storage_id,JSON.stringify(tableObj));
}
function eos_dp_get_table(storage_id){
	return jQuery.parseJSON(localStorage.getItem(storage_id));
}
function eos_dp_remove_table(storage_id){
	return localStorage.removeItem(storage_id);
}
function eos_dp_fill_table_by_storage(storage_id){
	var tableObj = eos_dp_get_table(storage_id),section = jQuery('.eos-dp-section'),table = section.find('table');
	for(row_id in tableObj){
		var paths = tableObj[row_id],row = table.find("[data-row_id='" + row_id + "']"),wrps = row.find('.eos-dp-td-chk-wrp');
		for(var n=0;n<wrps.length;++n){
			var td = jQuery(wrps[n].closest('td')),th = jQuery('#eos-dp-plugin-name-' + td.index());
			td.removeClass('eos-dp-active');
			th_path = th.attr('data-path');
			if(jQuery.inArray(th_path,paths) !== -1){
				td.addClass('eos-dp-active');
			}
		}
	}
}
function eos_dp_plugins_row(row){
	var plugin_path = '';
	row =  row instanceof jQuery ? row : jQuery(row);
	row.find('.eos-dp-td-chk-wrp input[type=checkbox]').each(function(){
		chk = jQuery(this);
		if(!chk.closest('td').hasClass('eos-dp-active') && !chk.hasClass('eos-dp-global-chk-row')){
			var data_path = chk.closest('td').attr('data-path');
			colN = jQuery(this).index();
			if('undefined' !== typeof(data_path)){
				plugin_path += ';pn:' + data_path;
			}
		}
		else{
			plugin_path += ';pn:';
		}
	});
	return plugin_path;
}
function eos_dp_closest_tagname(el,tagname){
	while(el !== document.body) {
			el = el.parentElement;
			if(el.tagName.toLowerCase() === tagname.toLowerCase()) return el;
	}
	return null;
}
function eos_filter_rows(){
	var rowsSel = [];
	jQuery("#fdp-singles-filter .dashicons").each(function(){
		if(jQuery(this).hasClass('eos-dp-active')){
			rowsSel.push(jQuery(this).attr('data-class'));
		}
	});
	jQuery('.eos-dp-post-row').addClass('eos-hidden');
	jQuery(rowsSel.join(',')).removeClass('eos-hidden');
}
function eos_dp_string_to_hash(string){
	string = string + Date.now();
	var hash = 0, i, chr, len;
	if(string.length === 0) return hash;
	for(i = 0;i < string.length;++i) {
		chr = string.charCodeAt(i);
		hash = ((hash << 5) - hash) + chr;
		hash |= 0;
	}
	return Math.abs(hash).toString();
}
function eos_dp_update_table_by_local_storage(){
	var table_temp = window.localStorage.getItem('fdp_table_temp');
	if(table_temp && '' !== table_temp){
		var json = JSON.parse(table_temp);
		jQuery('.eos-dp-post-row').each(function(n,r){
			jQuery(this).find('td').not('.eos-dp-post-name-wrp').each(function(idx,el){
				var cols = JSON.parse(json[n]);
				if(1 ===  cols[idx]){
					jQuery(this).addClass('eos-dp-active');
				}
				else{
					jQuery(this).removeClass('eos-dp-active');
				}
			});
		});
	}
}
function eos_dp_invert_selection(tr){
	jQuery.each(tr.find('td').not('.eos-dp-post-name-wrp'),function(){
		jQuery(this).find('input').trigger('click');
	});
	tr.addClass('eos-post-locked');
	return false;
}
function eos_dp_trigger_copy_row(el){
	jQuery(window.fdp_row_target).closest('tr').find('.eos-dp-copy').trigger('click');
}
function eos_dp_trigger_paste_row(el){
	jQuery(window.fdp_row_target).closest('tr').find('.eos-dp-paste').trigger('click');
}
function eos_dp_show_all_plugins(){
	var show_all = jQuery('#fdp-plug-filter-all');
	if(show_all && show_all.length > 0){
		window.plugins_filter = jQuery('.fdp-plug-filter.eos-active');
		show_all.trigger('click');
	}
}
function eos_dp_show_all_pages(){
	var show_all = jQuery('.fdp-filter-all');
	if(show_all && show_all.length > 0){
		window.pages_filter = jQuery('#fdp-singles-filter .eos-dp-active');
		show_all.trigger('click');
	}
}
function eos_dp_restore_plugins_filter(){
	if('undefined' !== typeof(window.plugins_filter)){
		window.plugins_filter.trigger('click');
	}
}
function eos_dp_restore_pages_filter(){
	if('undefined' !== typeof(window.pages_filter) && 1 === window.pages_filter.length){
		jQuery(window.pages_filter).trigger('click');
	}
}
function eos_dp_remove_all_filters(){
	eos_dp_show_all_plugins();
	eos_dp_show_all_pages();
}
function eos_dp_restore_all_filters(){
	eos_dp_restore_plugins_filter();
	eos_dp_restore_pages_filter();
}
function eos_dp_removeClass(class_name){
	var els = document.getElementsByClassName(class_name),n = 0;
	for(n;n < els.length;++n){
		els[n].className = els[n].className.replace(' ' + class_name,'').replace(class_name,'');
	}
}
function eos_dp_addClass(els,class_name){
	if(els && 'undefined' === typeof(els.length)){
		els.className = (els.className.replace(' ' + class_name,'').replace(class_name,'') + ' ' + class_name).trim();
	}
	else{
		for(var n = 0;n < els.length;++n){
			els[n].className = (els[n].className.replace(' ' + class_name,'').replace(class_name,'') + ' ' + class_name).trim();
		}
	}
}
function eos_dp_inViewport(e){
	if('undefined' === typeof(e)) return false;
	var b = e.getBoundingClientRect();
	return !(b.top > innerHeight || b.bottom < 0);
}
function fdp_synchronize_dependencies(){
	if('undefined' === typeof(eos_dp_js.dependencies)) return;
	var n=0,dependencies = JSON.parse(eos_dp_js.dependencies),single_column = 'undefined' !== typeof(eos_dp_js.page) && ('eos_dp_mobile' === eos_dp_js.page || 'eos_dp_search' === eos_dp_js.page);
	jQuery.each(dependencies,function(parent_plugin,arr){
		var strings = arr.strings;
		for(var k=0;k < strings.length;++k){
			var string = strings[k];
			jQuery('#eos-dp-setts').on('change','[data-path*="' + string + '"]',function(){
				fdp_update_parent(this,parent_plugin,string,single_column);
			});
		}
		jQuery('#eos-dp-setts').on('change','[data-path="' + parent_plugin + '"]',function(){
			fdp_update_add_ons(this,parent_plugin,strings,single_column);
		});
	});
}
function fdp_update_parent(el,parent_plugin,string,single_column){
	if(parent_plugin !== el.dataset.path){
		if(-1 !== el.dataset.path.indexOf('-' + string) || -1 !== el.dataset.path.indexOf(string + '-')){
			var parent_plugin_el = single_column ? jQuery('[data-path="' + parent_plugin + '"]') : jQuery(el).closest('tr').find('[data-path="' + parent_plugin + '"]');
			if('undefined' !== typeof(el.type) && 'checkbox' === el.type && jQuery(el).closest('td').hasClass('eos-dp-active')){
				parent_plugin_el.closest('td').addClass('eos-dp-active');
				parent_plugin_el.removeAttr('checked');
			}
			else if(-1 !== el.className.indexOf('eos-dp-active')){
				parent_plugin_el.addClass('eos-dp-active');
				parent_plugin_el.find('input').removeAttr('checked');
			}
		}
	}
}
function fdp_update_add_ons(el,parent_plugin,strings,single_column){
	if('undefined' !== typeof(el.type) && 'checkbox' === el.type){
		if(!el.checked) return;
	}
	else{
		if(-1 !== el.className.indexOf('eos-dp-active')) return;
	}
	var parent = single_column ? jQuery(el).closest('table') : jQuery(el).closest('tr');
	for(var k=0;k < strings.length;++k){
		var string = strings[k],plugins = parent.find('[data-path*="' + string + '"]');
		jQuery(plugins).each(function(){
			var path = this.dataset.path;
			if(-1 !== path.indexOf('-' + string) || -1 !== path.indexOf(string + '-')){
				if('undefined' !== typeof(this.type) && 'checkbox' === this.type){
					jQuery(this).closest('td').removeClass('eos-dp-active');
					jQuery(this).prop('checked',true);
				}
				else{
					jQuery(this).removeClass('eos-dp-active');
					jQuery(this).find('input').prop('checked',true);
				}
			}
		});
	}
}
function fdp_update_add_ons_columns(el,parent_plugin,strings){
	if(!el.checked) return;
	for(var k=0;k < strings.length;++k){
		var string = strings[k],plugins = 'woocommerce/woocommerce.php' !== parent_plugin ? jQuery('td[data-path*="' + string + '"]') : jQuery('td[data-path*="' + string + '"]').not('.eos-dp-woo-row td');
		jQuery(plugins).each(function(){
			var path = this.dataset.path;
			if(-1 !== path.indexOf('-' + string) || -1 !== path.indexOf(string + '-')){
				jQuery(this).removeClass('eos-dp-active');
				jQuery(this).find('input').prop('checked',true);
			}
		});
	}
}
