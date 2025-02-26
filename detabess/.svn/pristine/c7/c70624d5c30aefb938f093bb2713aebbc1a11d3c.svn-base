( function( $ ) {

	var dtbs_admin_common = dtbs_admin_common || {
		defaultStatus: {
			param_array: new Array(),
			sort_array: new Array(),
		},
	};

	// 読み込み時に、標準で選択されている項目の内容を保持
	$( window ).load(
		function() {
			if ( $( 'div[id^="dtbs_input_area"]' ).length ) {
				$( '.dtbs_item_list' ).each(
					function() {
						const this_id  = $( this ).attr( 'id' );
						const no_match = this_id.match( /(\d+)/ );
						const type     = $( this ).prop( 'class' ).match( /cdbtype_([a-z]+)/ );

						switch ( type[1] ) {
							case 'pulldown':
								dtbs_admin_common.defaultStatus.param_array[this_id] = { 'style' : 'pulldown' , 'sel' : $( '#child_' + no_match[1] ).val() };
									  break;

							case 'radio':
								dtbs_admin_common.defaultStatus.param_array[this_id] = { 'style' : 'radio' , 'sel' : $( 'input[name="dtbs_added_item_list[' + no_match[1] + ']"]:checked' ).val() };
							  break;

							default:
								let cb_val = [];
								$( '.dtbs_detail_' + no_match[1] + ':checked' ).map(
									function(){
										sel         = 'cdd' + $( this ).val();
										cb_val[sel] = $( this ).val();
									}
								)
								dtbs_admin_common.defaultStatus.param_array[this_id] = { 'style' : 'checkbox' , 'sel' : cb_val };
							  break;
						}
					}
				);
			}

			if ( $( '.cdi_list' ).length ) {
				$( '.cdi_list' ).each(
					function() {
						const option_id = $( this ).attr( 'id' );
						$( '#' + option_id ).hide();
						return false;
					}
				)
			}

			if ( $( '#cdin_list' ).length ) {
				const cdi_id = $( '#cdin_list' ).val();
				dtbs_get_current_item_list( cdi_id );
			}

			if ( $( '.dtbs_reg_area' ).length ) {
				if (typeof reg_param.sort_list !== 'undefined') {
					dtbs_admin_common.defaultStatus.sort_array = reg_param.sort_list;
				}
				dtbs_reg_sortable( $( '.dtbs_reg_area' ) );
			}
		}
	)

	$( document ).on(
		'change.all',
		'.change_current',
		function() {
			updateParrantPuldown();
		}
	);

	$( '.cdi_title, .new_cdi_title' ).change(
		function() {
			updateParrantPuldown();
		}
	)

	// 親カテゴリーが変更された時の挙動制御
	$( '.change_current' ).change(
		function() {

			let option_id = $( this ).attr( 'id' );
			let no_match  = option_id.match( /(\d+)/ );
			let id_no     = no_match[1];
			let elName    = 'dtbs_added_item_list[' + id_no + ']';
			let type      = $( this ).prop( 'class' ).match( /cdbtype_([a-z]+)/ );

			switch ( type[1] ) {
				case 'pulldown':
					selected = $( '#' + option_id ).val();
					  break;

				case 'radio':
					selected = $( 'input[name="' + elName + '"]:checked' ).val();
				 break;
			}

			dtbs_admin_get_child( no_match[1], selected );
		}
	);

	$( '.cdi_style' ).change(
		function() {
			updateParrantPuldown();
		}
	);

	$( '.cdi_del' ).change(
		function() {
			updateParrantPuldown();
		}
	);

	function updateParrantPuldown() {

		let text_array       = [];
		let sel_array        = [];
		let del_array        = [];
		let current_array    = [];
		let current_id_array = [];
		let res_data         = '';

		$.each(
			dtbs_admin_common.defaultStatus.sort_array,
			function( index,val ) {

				let sort_match = val.match( /^dtbs_(\D+)_(\d+)/ );
				if ( typeof sort_match[2] !== 'undefined' ) {

					if ( 0 === index ) {
						if ( $( '#new_cdi_top_id_' + sort_match[2] ).length ) {
							$( '#new_cdi_top_id_' + sort_match[2] ).hide();
						} else {
							$( '#added_cdi_top_id_' + sort_match[2] ).hide();
						}
					} else {
						if ( $( '#new_cdi_top_id_' + sort_match[2] ).length ) {
							$( '#new_cdi_top_id_' + sort_match[2] ).show();
						} else {
							$( '#added_cdi_top_id_' + sort_match[2] ).show();
						}
					}

					text_array[sort_match[2]] = $( '#' + sort_match[1] + '_cdi_title_' + sort_match[2] ).val();
					sel_array[index]          = $( '#' + sort_match[1] + '_cdi_top_id_' + sort_match[2] ).val();

					if ( $( '#cdi_del_' + sort_match[2] ).prop( 'checked' ) ) {
						del_array.push( sort_match[2] );
					}

					if ( typeof text_array[sort_match[2]] !== 'undefined' ) {
						current_array[index]    = text_array[sort_match[2]];
						current_id_array[index] = [sort_match[1], sort_match[2]];
					}
				}
			}
		);

		$.each(
			current_id_array,
			function( index,val ) {

				res_data = '<option value="0"></option>';
				$.each(
					current_id_array,
					function( loop_index,loop_val ) {

						if ( index > loop_index ) {
							if ( $.inArray( loop_val[1], del_array ) == -1 ) {
								if ( current_array[loop_index].length > 0 ) {
									if ($( '#cdi_style_' + loop_val[1] ).val().match( /^(?!checkbox)/ )) {
										if ( loop_val[1] == sel_array[index ]) {
											res_data += '<option value="' + loop_val[1] + '" selected="selected">' + html_escape( current_array[loop_index] ) + "</option>\n";
										} else {
											res_data += '<option value="' + loop_val[1] + '">' + html_escape( current_array[loop_index] ) + "</option>\n";
										}
									} else {
										res_data += '<option value="' + loop_val[1] + '" disabled>' + html_escape( current_array[loop_index] ) + "</option>\n";
									}
								}
							}
						} else {
							return false;
						}
					}
				);

				$( '#' + val[0] + '_cdi_top_id_' + val[1] ).children().remove();
				$( '#' + val[0] + '_cdi_top_id_' + val[1] ).append( res_data );

			}
		);
	}

	// ソートの着火
	function dtbs_reg_sortable( obj ) {

		obj.sortable(
			{
				handle: 'span',
				update: function( ev, ui ) {
					dtbs_admin_common.defaultStatus.sort_array = obj.sortable( 'toArray' );
					$( '#dtbs_sort_no' ).val( obj.sortable( 'toArray' ).join( ',' ) );
					updateParrantPuldown();
				}
			}
		);
	}

	function dtbs_admin_get_child( cdi_id, cdd_id ) {

		let target_id        = '';
		let target_serial_id = '';

		$.ajax(
			{
				type: 'GET',
				url: dtbs_ajaxurl,
				data: {
					'action' : 'dtbs_admin_child_data',
					'cdi_id' : cdi_id,
					'cdd_id' : cdd_id,
					'target' : 'all',
					'admin' : 'y'
				},
				success: function( response ){
					const child = $.parseJSON( response );

					$.each(
						child,
						function( index,val ){
							if (index.match( /(\d+)/ )) {
								target_serial_id = index;
								target_id        = 'child_' + index;

								$( '#' + target_id ).children().remove();
								$( '#' + target_id ).append( val.data );

								if (val.data !== '') {
									$( '#item_text_area' + index ).show()
								} else {
									$( '#item_text_area' + index ).hide();
								}

								if ( dtbs_admin_common.defaultStatus.param_array[target_id] ) {
									switch ( dtbs_admin_common.defaultStatus.param_array[target_id].style ) {
										case 'pulldown':
											$( '#' + target_id ).val( dtbs_admin_common.defaultStatus.param_array[target_id].sel );
											break;

										case 'radio':
											$( '[name="dtbs_added_item_list[' + index + ']"][value=' + dtbs_admin_common.defaultStatus.param_array[target_id].sel + ']' ).prop( 'checked',true );
											break;

										default:
											$.each(
												dtbs_admin_common.defaultStatus.param_array[target_id].sel,
												function( cb_index, cb_val ) {
													$( 'input[name="dtbs_added_item_list[' + index + '][' + cb_val + ']"]' ).prop( "checked",true );
												}
											)
											break;
									}
								}

							} else if ( 'xclusion' === index ) {
								if ( val !== '' ) {
									$( '#child_' + val ).children().remove();
									$( '#item_text_area' + val ).hide();
								} else {
									$( '#item_text_area' + target_serial_id ).show();
								}

							} else if ( 'ids' === index ) {
								if ( val.indexOf( Number( dtbs_admin_common.defaultStatus.param_array[target_id].sel ) ) >= 0 ) {
									dtbs_admin_get_child( target_serial_id, dtbs_admin_common.defaultStatus.param_array[target_id].sel );
								}
							}
						}
					);
				}
			}
		);
		return false;
	}

	// テキストエリア追加ボタンが押されたとき
	$( '.item_text_plus' ).click(
		function() {
			const clicked_id   = $( this ).attr( 'id' );
			const change_match = clicked_id.match( /(\d+)/ );

			let area_count = 0;
			$( '#dtbs_item_add_area' + change_match[1] + ' li' ).each(
				function(){
					area_count++;
					let dtbs_item_counts   = $( this ).attr( 'id' );
					let item_counts_match = dtbs_item_counts.match( /_(\d+)/ );
					if ( Number( item_counts_match[1] ) >= area_count ) {
						area_count++;
					}
				}
			);

			let view_data = '<li id="dtbs_item' + change_match[1] + '_' + area_count + '"><input type="text" name="dtbs_item[' + change_match[1] + '][' + area_count + ']" class="dtbs_item" value=""><span class="item_text_minus" id="item_text_minus' + change_match[1] + '_' + area_count + '">' + $( this ).data( 'minus_char' ) + '</span></li>';
			$( '#dtbs_item_add_area' + change_match[1] ).append( view_data );

			$.ajax(
				{
					type: 'GET',
					url: dtbs_ajaxurl,
					data: {
						'action' : 'dtbs_admin_child_xclusion',
						'cdi_id' : change_match[1]
					},
					success: function( response ){

						let child = $.parseJSON( response );

						$.each(
							child,
							function( index, val ) {
								$( '#child_' + index ).children().remove();
								if ( change_match[1] === val && dtbs_child_check( val, child ) === false ) {
									 $( '#item_text_area' + index ).show();
								} else {
									  $( '#item_text_area' + index ).hide();
								}
							}
						);
					}
				}
			);

			const style = $( '#dtbs_item_add_area' + change_match[1] ).data( 'style' );

			switch ( style ) {
				case 'pulldown':
					$( '#child_' + change_match[1] ).val( '0'.sel );
					break;

				case 'radio':
					$( '[name="dtbs_added_item_list[' + change_match[1] + ']"]' ).prop( 'checked',false );
					 break;
			}
			if (style == 'pulldown' || style == 'radio') {
				$( '#item_text_area' + change_match[1] ).hide();
			}
		}
	)

	// テキストエリア削除ボタンが押されたとき
	$( '.dtbs_view_area' ).on(
		'click',
		'.item_text_minus',
		function() {
			const clicked_id   = $( this ).attr( 'id' );
			const change_match = clicked_id.match( /(\d+)_(\d+)/ );
			$( '#dtbs_item' + change_match[1] + '_' + change_match[2] ).remove();
			$( '#item_text_area' + change_match[1] ).show();

			if ( dtbs_admin_common.defaultStatus.param_array['child_' + change_match[1]] ) {
				switch ( dtbs_admin_common.defaultStatus.param_array['child_' + change_match[1]].style ) {
					case 'pulldown':
						$( '#child_' + change_match[1] ).val( dtbs_admin_common.defaultStatus.param_array['child_' + change_match[1]].sel );
						break;

					case 'radio':
						$( 'input[name="dtbs_added_item_list[' + change_match[1] + ']"][value="' + dtbs_admin_common.defaultStatus.param_array['child_' + change_match[1]].sel + '"]' ).prop( 'checked', true );
						break;
				}
			}

			$.ajax(
				{
					type: 'GET',
					url: dtbs_ajaxurl,
					data: {
						'action' : 'dtbs_admin_child_xclusion',
						'cdi_id' : change_match[1]
					},
					success: function( response ){
						const child = $.parseJSON( response );

						$.each(
							child,
							function( index, val ) {

								if ( change_match[1] == val && dtbs_child_check( val, child ) == false ) {

									if ( dtbs_admin_common.defaultStatus.param_array['child_' + index] ) {
										switch ( dtbs_admin_common.defaultStatus.param_array['child_' + index].style ) {
											case 'pulldown':
												$( '#child_' + index ).val( dtbs_admin_common.defaultStatus.param_array['child_' + index].sel );
												break;

											case 'radio':
												$( 'input[name="dtbs_added_item_list[' + index + ']"][value="' + dtbs_admin_common.defaultStatus.param_array['child_' + index].sel + '"]' ).prop( 'checked', true );
												break;
										}
									}

									if ( dtbs_get_selsected_val( val ) === 0 ) {
										$( '#item_text_area' + index ).hide();
									} else {
										$( '#item_text_area' + index ).show();
									}
								}
							}
						)
					}
				}
			);
		}
	)

	function dtbs_child_check( id, child ) {
		$.each(
			child,
			function( index, val ){
				if ( Number( id ) === Number( index ) ) {
					return true;
				}
			}
		);
		return false;
	}

	function dtbs_get_selsected_val( val ) {
		let selsected = 0;

		switch (dtbs_admin_common.defaultStatus.param_array['child_' + val].style) {
			case 'pulldown':
				selsected = $( '#child_' + val ).val();
				break;

			case 'radio':
				selsected = $( 'input[name="dtbs_added_item_list[' + val + ']"]:checked' ).val();
				break;
		}
		if ( 'undefined' === selsected ) {
			selsected = 0;
		}

		return selsected;
	}

	// 項目名称変更処理において、データベース名が変更された際のリスト項目を変更する処理
	$( document ).on(
		'change',
		'#cdn_list',
		function() {
			const cd_id = $( this ).val();
			$( '.cdin_list' ).empty();
			$( '.cdbn_view' ).empty();

			if ( $( '#cdin_list' ).length ) {
				$.when(
					dtbs_get_cd_list( 'cdin_list', cd_id )
				).done(
					function() {
						dtbs_get_cdin_list( dtbs_get_current_cdin_id() );
					}
				);
			} else if ( $( '#cdid_list' ).length ) {
				$.when(
					dtbs_get_cd_list( 'cdid_list', cd_id )
				).done(
					function() {
						 dtbs_get_cdin_list( dtbs_get_current_cdid_id(), 'y', 'checkbox' );
					}
				);
			}
		}
	)

	// 項目名称変更処理において、リスト名が変更された際の登録項目の取得を着火
	$( document ).on(
		'change',
		'#cdin_list',
		function() {

			const cdi_id       = $( this ).val();
			let current_cdi_id = 0;

			$( '.cdbn_view' ).empty();

			$.when(
				dtbs_get_current_item_list( cdi_id ),
			).done(
				function(){
					if ( $( '#cdd_list' ).length ) {
						 current_cdi_id = $( '[name=cdd_current_id]' ).val();
					}
					dtbs_get_cdi_edit_list( cdi_id, current_cdi_id );
				}
			);
		}
	);

	// 絞り込み項目が選択されたとき
	$( document ).on(
		'change',
		'#cdd_list',
		function() {
			const cdi_id         = $( '[name=cdin_list]' ).val();
			const current_cdi_id = $( this ).val();
			dtbs_get_cdi_edit_list( cdi_id, current_cdi_id );
		}
	);

	// 項目名称変更処理において、リスト名が変更された際の登録項目の取得を着火0
	$( document ).on(
		'change',
		'#cdid_list',
		function() {
			const cdi_id = $( this ).val();
			$( '.cdbn_view' ).empty();
			dtbs_get_cdin_list( cdi_id, 'y', 'checkbox' );
		}
	)

	// 項目名称変更処理において、今どのリスト項目が選択されているかを確認してリターン
	function dtbs_get_current_cdin_id() {
		if ( $( '#cdn_area' ).length && $( '#cdin_list' ).length ) {
			  return cdi_id = $( '#cdin_list' ).val();
		}
		return false;
	}

	// 項目名称変更処理において、今どのリスト項目が選択されているかを確認してリターン
	function dtbs_get_current_cdid_id() {
		if ( $( '#cdn_area' ).length && $( '#cdid_list' ).length ) {
			  return cdi_id = $( '#cdid_list' ).val();
		}
		return false;
	}

	// 　データベース名が変更された際のリスト取得
	function dtbs_get_cd_list( target, cd_id ) {
		if ( cd_id > 0 ) {
			  const d = new $.Deferred();

			$.ajax(
				{
					type: 'GET',
					url: dtbs_ajaxurl,
					data: {
						'action' : 'dtbs_get_cdi_list',
						'cd_id' : cd_id
					},
					success: function( response ) {
						 const cdi_list = $.parseJSON( response );
						$.each(
							cdi_list,
							function( cd_index, cd_val ){
								$.each(
									cd_val,
									function( index, val ) {
										$( '#' + target ).append( '<option value="' + index + '">' + val + '</option>' );
									}
								);
							}
						);
						 d.resolve();
					}
				}
			);
			return d.promise();
		}
	}

	function dtbs_get_current_item_list(cdi_id) {

		$( '.dtbs-edit-contents_heading' ).text( $( '[name=cdin_list] option:selected' ).text() );

		const d = new $.Deferred();

		let option_data = '';

		if ( cdi_id > 0 ) {

			$( '.dtbs_child_select_area' ).remove();

			$.ajax(
				{
					type: 'GET',
					url: dtbs_ajaxurl,
					data: {
						'action' : 'dtbs_get_cdd_menu_list',
						'cdi_id' : cdi_id
					},
					success: function( response ) {
						let title = '';
						const res = $.parseJSON( response );
						if (item_params.cdd_current_id > 0) {
							target_no = item_params.cdd_current_id;
						} else {
							target_no = 0;
						}

						$.each(
							res,
							function( type, type_array ) {
								$.each(
									type_array,
									function( values_index, type_value ) {
										if ( 'list' === type ) {
											$.each(
												type_value,
												function( cdd_id, value ) {
													if ( target_no === cdd_id ) {
														option_data += '<option value="' + cdd_id + '" selected>' + value + '</option>';
													} else {
														option_data += '<option value="' + cdd_id + '">' + value + '</option>';
													}
												}
											);
										} else {
											title = type_value;
										}
									}
								);
							}
						);

						if ( option_data != '' ) {
							$( '.dtbs-edit-header_list' ).append( def_params.list_area.replace( /dtbs_get_child_tree_res/g,option_data ).replace( /title_val/g,title ) );
							d.resolve();
						} else {
							d.resolve();
						}
					}
				}
			);
		}
		return d.promise();
	}

	// 項目名称変更処理におけるリスト表示をする
	function dtbs_get_cdin_list( cdi_id, count_view='n', style='text', count_view_style='text' ) {

		if ( cdi_id > 0 ) {
			$.ajax(
				{
					type: 'GET',
					url: dtbs_ajaxurl,
					data: {
						'action' : 'dtbs_get_cdd_edit_list',
						'cdi_id' : cdi_id
					},
					success: function( response ) {
						dtbs_create_edit_area( response );
					}
				}
			);
		}
	}

	function dtbs_get_cdi_edit_list(cdi_id, current_cdi_id) {

		if ('' == cdi_id) {
			cdi_id = 0;
		}
		if ('' == current_cdi_id ) {
			current_cdi_id = 0;
		}
		if ( current_cdi_id > 0 ) {
			$( '.dtbs-edit-contents_heading' ).text( $( '[name=cdin_list] option:selected' ).text() + ' (' + $( '[name=cdd_current_id] option:selected' ).text() + ')' );
		}

		$.ajax(
			{
				type: 'GET',
				url: dtbs_ajaxurl,
				data: {
					'action' : 'dtbs_get_cdd_edit_list',
					'cdi_id' : cdi_id,
					'current_cd_id' : current_cdi_id,
				},
				success: function( response ) {
					dtbs_create_edit_area( response );
				}
			}
		);
	}

	// 項目編集の項目追加エリア作成
	$( document ).on(
		'click',
		'.dtbs_item_add',
		function() {
			$( '#table-view-list' ).children( 'tbody' ).append( def_params.add_item_area );
			if ( $( '.cdd_new_item' ).length > 0 ) {
				$( '#cdd_new_item_' ).attr( 'id', 'cdd_new_item_' + $( '.cdd_new_item' ).length );
			}
		}
	);

	$( document ).on(
		' click',
		'#dtbs_del',
		function() {
			return ( window.confirm( reg_param.del_alert1 + '\n' + reg_param.del_alert2 ) ) ? true : false;
		}
	);

	function dtbs_create_edit_area( data ) {
		$( '#table-view-list' ).find( 'tbody' ).children().remove();
		const res = $.parseJSON( data );
		$.each(
			res,
			function( type, values_array ){
				$.each(
					values_array,
					function( values_index, values ) {
						$.each(
							values,
							function( cdd_index, cdd_list ) {
								if ( 'list' === type ) {
									$.each(
										cdd_list,
										function( value, count ) {
											$( '#table-view-list' ).children( 'tbody' ).append( def_params.edit_item_area.replace( /cdd_item_id/g,cdd_index ).replace( /cdd_item_value/g,value ).replace( /cdd_item_count/g,count ) );
										}
									);
								}
							}
						);
					}
				);
			}
		);
		return true;
	}


	function html_escape(char) {
		return char.replace('<', '&lt;').replace('>', '&gt;').replace('"', '&quot;').replace('\\', '');
	}

})( jQuery );
