( function( $ ) {

	var dtbs_common = dtbs_common || {
		uriParams: {
			path: '',
			param_array: new Array(),
		},
		class_info:{
			scd: '',
			current: false,
			style: ''
		},
		group: {
			checkbox: 'cdi_id_c',
			radio: 'cdi_id_r',
			select: 'cdi_id_p',
			text: 'cdi_id_t'
		},
		child_tree: {
			childs: new Array(),
		},
	};

	// 読み込み時の動作
	$( window ).on(
		'load',
		function() {
			if ($( '.dtbs-list' ).length ) {
				$( '.dtbs-list' ).each(
					function() {

						let current_id            = $( this ).attr( 'id' );
						let this_dtbs_no           = current_id.match( /(\d+)/ );
						dtbs_common.class_info.scd = this_dtbs_no[1];
						dtbs_set_params( current_id );

						const now_param = dtbs_get_params();
						dtbs_get_count( dtbs_common.class_info.scd, now_param );
						dtbs_common.uriParams.param_array = Array();
					}
				);
				$( 'input[name="s"]' ).val( '' );
			}
			dtbs_common.child_tree.childs.splice( 0 );
		}
	)

	$( document ).on(
		'change',
		'[name^="ci"]',
		function() {

			// 対象のscdを取得
			const parent_dtbs_list     = $( this ).parents( '.dtbs-list' ).map(
				function() {
					return this.id.match( /dtbs-list(\d+)/ );
				}
			)
			dtbs_common.class_info.scd = parent_dtbs_list[1];

			// 作用をした項目のidを取得
			let target_id = $( this ).attr( 'id' );
			if ( ! target_id) {
				target_id = $( this ).closest( 'span' ).attr( 'id' );
			}

			// 作用をした項目が所属するデータベース番号を取得
			const list_id = $( this ).closest( '[id^="dtbs-list"]' ).attr( 'id' );

			$.when(
				dtbs_set_current_param( target_id ),
				dtbs_get_childtree_check( target_id ),
				dtbs_get_target_class_info( target_id ),
				dtbs_set_params( list_id )
			).done(
				function() {
					dtbs_get_count( dtbs_common.class_info.scd, dtbs_get_params() );
				}
			);

			dtbs_common.child_tree.childs.splice( 0 );
		}
	);

	$( document ).on(
		'keyup',
		'input[name="dtbs_keyword"]',
		function() {

			// 対象のscdを取得
			const parent_dtbs_list     = $( this ).parents( '.dtbs-list' ).map(
				function() {
					return this.id.match( /dtbs-list(\d+)/ );
				}
			)
			dtbs_common.class_info.scd = parent_dtbs_list[1];

			let target_id = $( this ).attr( 'id' );
			if ( ! target_id ) {
				target_id = $( this ).closest( 'span' ).attr( 'id' );
			}

			// 作用をした項目が所属するデータベース番号を取得
			const list_id = $( this ).closest( '[id^="dtbs-list"]' ).attr( 'id' );

			$.when(
				dtbs_set_current_text( target_id ),
				// パラメータを設定する
				dtbs_set_params( list_id )
			).done(
				function() {
					// 現在のパラメータを取得
					const now_param = dtbs_get_params();

					// 現在のアドレスに対する件数を取得
					dtbs_get_count( dtbs_common.class_info.scd, now_param );
				}
			);
		}
	);

	function dtbs_get_childtree_check( target_id ) {
		if ( dtbs_common.class_info.current ) {
			return dtbs_get_childtree( target_id, dtbs_common.class_info.scd, dtbs_common.class_info.style );
		}
	}

	function dtbs_set_current_param( target_id ) {
		const target_class = dtbs_get_target_class_info( target_id );

		switch ( target_class.style ) {
			case 'p':
				dtbs_common.uriParams.param_array[target_id] = dtbs_get_select_value( target_id );
				break;

			case 'r':
				dtbs_common.uriParams.param_array[target_id] = dtbs_get_radio_value( target_id );
				break;

			default:
				dtbs_common.uriParams.param_array[target_id] = dtbs_get_checkbox_value( target_id );
				break;
		}
		return true;
	}

	function dtbs_set_current_text( target_id ) {
		dtbs_common.uriParams.param_array[target_id] = dtbs_get_text_value( target_id );
	}

	// パラメータを設定する
	function dtbs_set_params( list_id ) {

		let input_name = '';
		let res        = '';

		$( '#' + list_id ).find( '.' + dtbs_common.group.checkbox ).each(
			function() {
				input_name = $( this ).attr( 'id' );
				res        = dtbs_get_checkbox_value( input_name );
				dtbs_edit_params( 'c', input_name, res, $( '#' + list_id ).attr( 'data-child' ) );
			}
		);

		$( '#' + list_id ).find( '.' + dtbs_common.group.radio ).each(
			function() {
				input_name = $( this ).attr( 'id' );
				res        = dtbs_get_radio_value( input_name );
				dtbs_edit_params( 'r', input_name, res );
			}
		);

		$( '#' + list_id ).find( '.' + dtbs_common.group.select ).each(
			function() {
				input_name = $( this ).attr( 'id' );
				res        = dtbs_get_select_value( input_name );
				dtbs_edit_params( 'p', input_name, res );
			}
		);

		$( '#' + list_id ).find( '.' + dtbs_common.group.text ).each(
			function() {
				input_name = $( this ).attr( 'id' );
				res        = dtbs_get_text_value( input_name );
				dtbs_edit_params( 't', input_name, res );
			}
		);
		return true;
	}

	// チェックボックスのチェック状態を確認
	function dtbs_get_checkbox_value( obj ) {
		let res       = new Array();
		const arr     = $( '[name="' + obj + '"]:checked' ).map(
			function() {
				return $( this ).val();
			}
		);
		const res_set = Array.from( new Set( arr ) );
		$.each(
			res_set,
			function( index, val ) {
				if ($( 'input[name="' + obj + '"][value="' + val + '"]' ).prop( 'checked' )) {
					res.push( val );
				}
			}
		);
		if ( res.length <= 0 ) {
			delete dtbs_common.uriParams.param_array[obj];
			return res.length;
		}
		return res;
	}

	// ラジオのボタンのチェック状態を確認
	function dtbs_get_radio_value ( obj ) {
		return $( 'input[name="' + obj + '"]:checked' ).val();
	}

	// セレクトがどこにいるかを確認
	function dtbs_get_select_value ( obj ) {
		return $( '[name="' + obj + '"]' ).val();
	}

	 // パラメータを取得する
	function dtbs_get_params( form_class='', type='ajax' ) {
		let  uri_param = '';

		for ( let key in dtbs_common.uriParams.param_array ) {
			if ( (key.match( /^ci\d+/ ) && (dtbs_common.uriParams.param_array[key] > 0) || $.isArray( dtbs_common.uriParams.param_array[key] )) || (key.match( /^cis/ ) && dtbs_common.uriParams.param_array[key] != '') ) {
				if ( form_class == '' || form_class == 'dtbs_forms' ) {
					if ( $.isArray( dtbs_common.uriParams.param_array[key] ) ) {
						uri_param += '&'　 + 　key + '=' + dtbs_common.uriParams.param_array[key].join( ',' );
					} else {
						uri_param += '&'　 + 　key + '=' + dtbs_common.uriParams.param_array[key];
					}
				} else {
					if ( 'ajax' === type ) {
						uri_param += ','　 + 　key + '_' + dtbs_common.uriParams.param_array[key];
					} else {
						const target_params = dtbs_common.uriParams.param_array[key];
						if ( $.isArray( target_params ) ) {
							const param_val = target_params.join( '_' );
							uri_param      += ','　 + 　key + '_' + param_val.replace( /,/g,'_' );
						} else {
							uri_param += ','　 + 　key + '_' + target_params.replace( /,/g,'_' );
						}
					}
				}
			}
		}
		return uri_param;
	}

	function dtbs_get_text_value( obj ) {
		return $( '#' + obj ).val();
	}

	// パラメータを保存する
	function dtbs_edit_params( style, key, val ) {
		let paramValue;

		if (0 == val && $.inArray( key, dtbs_common.uriParams.param_array ) ) {
			delete dtbs_common.uriParams.param_array[key];
		} else {
			switch ( style ) {
				case 'c':
					delete dtbs_common.uriParams.param_array[key];
					paramValue = ( val.indexOf( ',' ) > 0 ) ? decodeURIComponent( val.split( ',' ) ) : Array( decodeURIComponent( val ) );
					break;

				default:
					paramValue = ( val != null ) ? decodeURIComponent( val ) : false;
					break;
			}
			if (paramValue) {
				dtbs_common.uriParams.param_array[key] = paramValue;
			}
		}
	}

	// 対象のクラスの情報を取得
	function dtbs_get_target_class_info( target ) {

		if ( target.match( /^ci[0-9]{1,}/ ) ) {
			const target_class            = $( '#' + target ).attr( 'class' ).match( /cdi_id_([r|p|c])/ );
			dtbs_common.class_info.style   = target_class[1];
			dtbs_common.class_info.current = ($( '#' + target ).attr( 'class' ).match( /change_current/ )) ? true : false;
		} else {
			dtbs_common.class_info.style   = 't';
			dtbs_common.class_info.current = false;
		}
		return dtbs_common.class_info;
	}

	// 親子関係のある項目の子データを取得
	function dtbs_get_childtree( target_id ,scd, style ) {

		let no_match = target_id.match( /(\d+)/ );

		let data_child = data_child_id = 0;

		if ( 'r' === style ) {
			data_child = $( '#' + target_id ).attr( 'data-child' );
		} else if ( 'p' === style  ) {
			data_child = $( 'option[value="' + dtbs_common.uriParams.param_array[target_id] + '"]' ).attr( 'data-child' );
		}

		if ( data_child ) {
			let data_chid_array = [];
			let child_id;

			if (data_child.indexOf( ',' ) ) {
				data_chid_array = data_child.split( ',' );
			} else {
				data_chid_array.push( data_child );
			}

			$.each(
				data_chid_array,
				function( index, child ) {
					child_id = 'ci' + child;

					if ( dtbs_common.uriParams.param_array[child_id] ) {
						data_child_id_val = dtbs_common.uriParams.param_array[child_id];
						if ( $.isArray( data_child_id_val ) ) {
							data_child_id = data_child_id_val.join( ',' );
						} else {
							data_child_id = data_child_id_val;
						}
					}
				}
			);
		}

		if ( scd <= 0 ) {
			return false;
		}

		const cdd_id = dtbs_common.uriParams.param_array[target_id];

		return dtbs_child_load( no_match[1], cdd_id, data_child_id, target_id );
	}

	function dtbs_child_load( no, cdd_id, data_child_id, target_id ) {
		const defer = new $.Deferred();
		$.ajax(
			{
				type: 'GET',
				url: dtbs_ajaxurl,
				data: {
					'action' : 'dtbs_cdd_child_data',
					'cdi_id' : no,
					'cdd_id' : cdd_id,
					'cdc_id' : data_child_id,
				},
				success: function( response ) {
					dtbs_common.uriParams.param_array[target_id] = cdd_id;
					const child                                 = $.parseJSON( response );
					$.when(
						dtbs_parse_current_data( child.child )
					).done(
						function() {
							dtbs_xclusion_data( child.xclusion )
							defer.resolve();
						}
					);
				}
			}
		)
		return defer.promise();
	}

	// 対象となるデータの件数を取得して返却する
	function dtbs_get_count(scd, now_param ) {
		const uri_param = 'scd=' + dtbs_common.class_info.scd + now_param;
		$.ajax(
			　{
				type: 'GET',
				url: dtbs_ajaxurl,
				data: {
					'action' : 'dtbs_counter',
					'scdb' : uri_param,
				},
				success: function( response ) {
					$( '.dtbs_couter' + scd ).text( response );
				}
			}
		);
		return;
	}

	// JSON返却後の文字データ処理
	function dtbs_parse_current_data( child ) {

		const defer = new $.Deferred();
		$.when(
			$.each(
				child,
				function( index, val ) {
					$( '#ci' + index ).children().remove(),
					$( '#ci' + index ).append( val.data ),
					dtbs_child_selected( index, val.style, val.selected ),
					dtbs_common.child_tree.childs.push( index )
				}
			)
		).done(
			function() {
				defer.resolve();
			}
		);
		return defer.promise();
	}

	// URLパラメータで入っていた場合に、選択項目を選択した状態にする
	function dtbs_child_selected( index, style, selected ) {

		const target_id = 'ci' + index;

		if ( selected.length > 0 ) {
			$.each(
				selected,
				function( index, val ) {

					switch ( style ) {
						case 'p':
							$( '#' + target_id ).val( val );
							break;

						default:
							$( 'input[name="' + target_id + '"][value="' + val + '"]' ).prop( ' checked', true );
							break;
					}
					dtbs_common.uriParams.param_array[target_id] = val;
				}
			);
		} else {
			dtbs_common.uriParams.param_array[target_id] = 0;
		}
		return;
	}

	// JSON返却後の削除処理
	function dtbs_xclusion_data( xclusion ) {
		return $.each(
			xclusion,
			function( index, val ) {
				if ( $.inArray( val, dtbs_common.child_tree.childs ) < 0 ) {
					$( '#ci' + val ).children().remove();
				}
			}
		)
	}

	// 検索内容の送信
	$( document ).on(
		'submit',
		'[id^="dtbs_form"]',
		function( e ) {
			e.preventDefault();

			const submit_id  = $( this ).attr( 'id' ).match( /(\d+)/ );
			const form_class = $( '#dtbs_form' + submit_id ).attr( 'class' );

			dtbs_set_params( 'dtbs_form' + submit_id );

			const param = dtbs_get_params( form_class, 'search' );

			if ( form_class.match( /^([0-9a-z]+)$/ ) && 'dtbs_forms' !== form_class ) {
				location.href = ( '' === param ) ? def_params.site_url + '/' + form_class + '/' : def_params.site_url + '/' + form_class + '/' + param.substr( 1 ) + '/';
			} else {
				location.href = def_params.site_url + '/?s=' + param + '&cdb=' + submit_id[1];
			}
			return true;
		}
	);

} )( jQuery );
