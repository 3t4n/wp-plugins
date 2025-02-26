var e2wl_reload_page_after_ajax = false;
jQuery(function ($) {

	var get_id_from_link_anchor = function(el){
		var jq_el = $(el);
		var id = null;
		if ( typeof jq_el.attr('id') == "undefined" && jq_el.attr('href').substr(0,1) === "#" ){
			id = jq_el.attr('href').substr(1);
			//var id = jq_el.attr('href').substr(1).split('-');
		}
		else id =  jq_el.attr('id').split('-')[1];

		return id;
	}

	$(document).on("click", ".e2wl-order-info", function () {
		var id = get_id_from_link_anchor(this);

		$.e2wl_show_order(id);
		return false;
	});


	$(document).on("click", ".e2wl-ebay-sync", function () {
		var item_sync_btn =  $(this);
		item_sync_btn.prop("disabled",true);

		var ext_id = get_id_from_link_anchor(this);

		var item_info_btn = $(this).siblings('.e2wl-order-info')[0],
			id = get_id_from_link_anchor(item_info_btn);


		if (typeof e2wl_get_order_tracking_code !== "undefined") {
			ext_id_array = ext_id.split('-');

			data = [];
			for (k in ext_id_array) {

				ext_id = ext_id_array[k];
				data.push({'ext_order_id':ext_id});
			}
			e2wl_get_next_tracking_code(data, 0, 200, function(index, ext_id, tracking_codes, status){

				if (tracking_codes && tracking_codes.length>0){
					item_sync_btn.hide();
					e2wl_save_tracking_code(id, tracking_codes, function(res){

						if (res !== null) {
							if (res.state === 'ok') {
								alert(e2wl_script_data.lang.tracking_sync_done + ' ['+ext_id+']');
							} else {
								alert(res.message);
							}
						}

					});

				} else {
					switch (status) {
						case 500:
							alert(e2wl_script_data.lang.error_cant_do_tracking_sync);
							break;
						case 404:
							alert(e2wl_script_data.lang.error_didnt_do_find_ebay_order_num+data.ext_order_id);
							break;
						case 401:
							alert(e2wl_script_data.lang.error_cant_do_tracking_sync_login_to_account);
							break;
						case 403:
							alert(e2wl_script_data.lang.error_403_code+data.ext_order_id);
							break;
						default:
							alert(e2wl_script_data.lang.no_tracking_codes_for_order);
					}

					item_sync_btn.prop("disabled",false);
				}
			});

		} else {
			item_sync_btn.prop("disabled",false);
			alert(e2wl_script_data.lang.error_please_install_new_extension);
		}

		return false;
	});

	$.e2wl_show_order = function (id) {
		$('<div id="e2wl-dialog' + id + '"></div>').dialog({
			dialogClass: 'e2wl-dialog',
			modal: true,
			width: "400px",
			title: e2wl_script_data.lang.ebay_info + ": " + id,
			open: function () {
				$('#e2wl-dialog' + id).html(e2wl_script_data.lang.please_wait_data_loads);
				var data = {'action': 'e2wl_order_info', 'id': id};

				$.post(ajaxurl, data, function (response) {

					var json = jQuery.parseJSON(response);

					if (json.state === 'error') {
						console.log(json);
					} else {
						$('#e2wl-dialog' + json.data.id).html(json.data.content.join('<br/>'));
					}
				});

			},
			close: function (event, ui) {
				$("#e2wl-dialog" + id).remove();
			},
			buttons: {
				Ok: function () {
					$(this).dialog("close");
				}
			}
		});

		return false;

	};

	var sync_btn =  $('#e2wl_bulk_order_sync_manual');

	sync_btn.on('click', function() {
		sync_btn.prop("disabled",true);

		if (typeof e2wl_get_order_tracking_code !== "undefined") {
			sync_btn.val(e2wl_script_data.lang.please_wait);
			e2wl_get_fulfilled_orders(function(data){

				var cnt = data.length;
				sync_btn.val(e2wl_script_data.lang.sync_process + ' 0/' + cnt + '...');

				if (cnt > 0 )
					e2wl_get_next_tracking_code(data, 0, 200, function(index, ext_id, tracking_codes, status) {
						var is_return = false;

						switch (status) {
							case 500:
								alert(e2wl_script_data.lang.error_cant_do_tracking_sync);
								sync_btn.val(e2wl_script_data.lang.tracking_sync);
								sync_btn.prop("disabled",false);
								is_return = true;
								break;

							case 404:
								console.log(e2wl_script_data.lang.error_didnt_do_find_ebay_order_num+data[index].ext_order_id);
								break;

							case 401:
								alert(e2wl_script_data.lang.error_cant_do_tracking_sync_login_to_account);
								sync_btn.val(e2wl_script_data.lang.tracking_sync);
								sync_btn.prop("disabled", false)
								is_return = true;
								break;

							case 403:
								console.log(e2wl_script_data.lang.error_403_code+data[index].ext_order_id);
								break;
						}

						if (is_return) {
							return false;
						}

						sync_btn.val(e2wl_script_data.lang.sync_process + ' ' + (index+1) + '/' + cnt + '...');

						if ( index === cnt-1 ) {
							sync_btn.val(e2wl_script_data.lang.sync_done);
							sync_btn.prop("disabled", false);
						}
						if (tracking_codes && tracking_codes.length>0){
							e2wl_save_tracking_code(data[index].order_id, tracking_codes, function(res){

								if (res !== null) {
									if (res.state === 'error') {
										console.log(res.message);
									}
								}

							});
						}
					});
				else {
					sync_btn.val(e2wl_script_data.lang.tracking_sync);
					sync_btn.prop("disabled", false);
				}
			});

		} else {
			sync_btn.val(e2wl_script_data.lang.tracking_sync);
			alert(e2wl_script_data.lang.error_please_install_new_extension);
		}

		return false;
	});

	var e2wl_get_next_tracking_code = function(data, i, status_code, callback_func) {

		if ((status_code == 200 || status_code == 404 || status_code == 403) && i < data.length)   {

			e2wl_get_order_tracking_code(data[i].ext_order_id, function( response){

				//fixed the chrome extnesion bug sending the html together with codes
				var normalized_codes = [];
				for ( var code in response.tracking_codes){
					result = response.tracking_codes[code].match(/>?([A-Z,0-9]+)<?/gm);
					normalized_codes.push(result[0]);
				}

				callback_func(i, data[i].ext_order_id, normalized_codes /*response.tracking_codes*/, response.status_code);

				return e2wl_get_next_tracking_code(data, i+1, response.status_code, callback_func);

			})
		}

		return true;
	};

	var e2wl_get_fulfilled_orders = function(callback_func){
		var data = {'action': 'e2wl_get_fulfilled_orders'};

		jQuery.post(ajaxurl, data).done(function (response) {
			var json = jQuery.parseJSON(response);

			if (json.state !== 'ok') {
				console.log(json);
			}

			if (json.state === 'error') {
				//do smth
			} else {

				callback_func(json.data);
			}

		}).fail(function (xhr, status, error) {
		});
	};

	var e2wl_save_tracking_code = function(id, tracking_codes, func){
		var data = {'action': 'e2wl_save_tracking_code', 'id' : id, 'tracking_codes' : tracking_codes};
		jQuery.post(ajaxurl, data).done(function (response) {
			var json = jQuery.parseJSON(response);
			func(json);

		}).fail(function (xhr, status, error) {
			func(null);
		});
	}
});

