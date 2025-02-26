<?php
/**
 * WordPressでAJAXを利用するためのJSを出力
 */
function dtbs_search_ajax() {
 ?>
 <script>var dtbs_ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';</script>
<?php
}


/**
 * 管理画面から、項目の小項目データを取得するAJAX
 *
 * @param int $_GET['cdi_id'] 項目のID
 * @param int $_GET['cdd_id'] 小項目のIDを指定
 *
 * @return json
 */
function dtbs_admin_child_data() {

	$list				= array();
	$cdi_current_id     = array();

	if ( false === is_user_logged_in() ) {
		return $list;
	}
	if ( ! isset( $_GET['cdi_id'] )  || ! is_numeric( $_GET['cdi_id'] ) || $_GET['cdi_id'] <= 0) {
		return $list;
	}

	$cdi_id			= sanitize_key( $_GET['cdi_id'] );
	$param_cdd_id	= sanitize_key( $_GET['cdd_id'] );

	global $wpdb;
	$cdi_id_array = $wpdb->get_results( $wpdb->prepare( 'SELECT cd_id, cdi_id, cdi_style FROM ' . $wpdb->prefix . 'dtbs_item WHERE cdi_current_id=%d ORDER BY cdi_sort_no', $cdi_id), 'ARRAY_A' );

	if ( is_array( $cdi_id_array ) && count( $cdi_id_array ) > 0 ) {
		foreach ( $cdi_id_array as $cdi_id_val ) {

			$list[ $cdi_id_val['cdi_id'] ]['data'] = '';
			$cdi_current_id[]                      = $cdi_id_val['cdi_id'];

			$child_list = dtbs_detail_child_list( $cdi_id_val['cdi_id'], $param_cdd_id );

			switch ( $cdi_id_val['cdi_style'] ) {
				case 'pulldown':
					foreach ( $child_list as $cdd_id => $cdd_value ) {
						$list[ $cdi_id_val['cdi_id'] ]['data'] .= '<option value="' . $cdd_id . '">' . $cdd_value['cdd_value'] . ' ( ' . number_format( $cdd_value['count'] ) . " )</option>\n";
					}
					break;

				case 'radio':
					foreach ( $child_list as $cdd_id => $cdd_value ) {
						$list[ $cdi_id_val['cdi_id'] ]['data'] .= '<label><input type="radio" name="dtbs_added_item_list[' . $cdi_id_val['cdi_id'] . ']" value="' . $cdd_id . '" class="dtbs_detail_' . $cdd_id . '"><span><i></i>' . $cdd_value['cdd_value'] . '<span class="dtbs_item_select_length">( ' . number_format( $cdd_value['count'] ) . ' )</span></span></label>' . "\n";
					}
					break;

				default:
					foreach ( $child_list as $cdd_id => $cdd_value ) {
						$list[ $cdi_id_val['cdi_id'] ]['data'] .= '<label><input type="checkbox" name="dtbs_added_item_list[' . $cdi_id_val['cdi_id'] . '][' . $cdd_id . ']" value="' . $cdd_id . '" class="dtbs_detail_' . $cdd_id . '"><span><i></i>' . $cdd_value['cdd_value'] . '</span> <span class="dtbs_item_select_length">( ' . number_format( $cdd_value['count'] ) . ' )</span></span></label>' . "\n";
					}
					break;
			}
		}
	}

	// 選択された項目以下に子要素が無いか確認
	$list['xclusion'] = array();
	do {
		if ( isset( $cdi_current_id ) ) {
			$current_id = implode( ',', $cdi_current_id );
		}
		$child_array    = $wpdb->get_results( 'SELECT cdi_id, cdi_current_id FROM ' . $wpdb->prefix . 'dtbs_item WHERE cdi_current_id IN ( ' . $current_id . ' ) ORDER BY cdi_sort_no', 'ARRAY_A' );
		$cdi_current_id = array();
		if ( count( $child_array ) > 0 ) {
			foreach ( $child_array as $child_val ) {
				$cdi_current_id[] = $list['xclusion'][] = $child_val['cdi_id'];
			}
		}
	} while ( count( $child_array ) > 0 );

	echo json_encode( $list );
	die();
}


/**
 * 管理画面から、項目の小項目データで除外をするリストを取得するAJAX
 *
 * @param int $_GET['cdi_id'] 項目のID
 *
 * @return json
 */
function dtbs_admin_child_xclusion() {
	$list = array();

	if ( false === is_user_logged_in() ) {
		return $list;
	}
	if ( ! isset( $_GET['cdi_id'] ) || ! is_numeric( $_GET['cdi_id'] ) || $_GET['cdi_id'] <= 0 ) {
		return $list;
	}

	$cdi_id = sanitize_key( $_GET['cdi_id'] );

	global $wpdb;
	$cdi_id_array = $wpdb->get_results( $wpdb->prepare( 'SELECT cd_id, cdi_id, cdi_style FROM ' . $wpdb->prefix . 'dtbs_item WHERE cdi_current_id=%d ORDER BY cdi_sort_no', $cdi_id ), 'ARRAY_A' );
	if ( is_array( $cdi_id_array ) && count( $cdi_id_array ) > 0 ) {
		foreach ( $cdi_id_array as $cdi_id_val ) {
			$cdi_current_id[]              = $cdi_id_val['cdi_id'];
			$list[ $cdi_id_val['cdi_id'] ] = 	$cdi_id;
		}

		do {
			if ( isset( $cdi_current_id ) ) {
				$current_id = implode( ',', $cdi_current_id );
			}
			$child_array    = $wpdb->get_results( 'SELECT cdi_id, cdi_current_id FROM ' . $wpdb->prefix . 'dtbs_item WHERE cdi_current_id IN ( ' . $current_id . ' ) ORDER BY cdi_sort_no', 'ARRAY_A' );
			$cdi_current_id = array();
			if ( count( $child_array ) > 0 ) {
				foreach ( $child_array as $child_val ) {
					$cdi_current_id[]             = $child_val['cdi_id'];
					$list[ $child_val['cdi_id'] ] = $child_val['cdi_current_id'];
				}
			}
		} while ( count( $child_array ) > 0 );
	}

	echo json_encode( $list );
	die();
}


/**
 * 項目の小項目データを取得するAJAX
 *
 * @param int $_GET['cdi_id'] 項目のID
 *
 * @return json
 */
function dtbs_cdd_child_data() {

	$list                 = array();
	$cdi_current_id       = array();
	$child_list_get       = 'n';
	$child_selected_array = array();

	if ( ! isset( $_GET['cdi_id'] ) || ! is_numeric( $_GET['cdi_id'] ) || $_GET['cdi_id'] <= 0 ) {
		return $list;
	}

	$cdi_id = sanitize_key( $_GET['cdi_id'] );
	$cdd_param_id = ( isset( $_GET['cdd_id'] ) ) ? sanitize_key( $_GET['cdd_id'] ) : 0;

    if ( isset( $_GET['cdc_id'] ) ) {
        $cdc_id = sanitize_key( $_GET['cdc_id'] );

		$child_selected_array = explode( ',', $cdc_id );
		if ( ! empty( $child_selected_array ) ) {
			foreach ( $child_selected_array as $no => $val ) {
				if ( 0 === $val ) {
					unset( $child_selected_array[ $no ] );
				}
			}
		}
		if ( ! empty( $child_selected_array ) ) {
			$child_selected_array = array_unique( $child_selected_array );
			if ( count( $child_selected_array ) > 0 ) {
				foreach ( $child_selected_array as $no => $val ) {
					if ( ! preg_match( '/^[0-9]+$/', $val ) ) {
						unset( $child_selected_array[ $no ] );
					}
				}
			}
		}
	}

	global $wpdb;
	$cdi_id_array = $wpdb->get_results( $wpdb->prepare( 'SELECT cd_id, cdi_id, cdi_style FROM ' . $wpdb->prefix . 'dtbs_item WHERE cdi_current_id=%d ORDER BY cdi_sort_no', $cdi_id ), 'ARRAY_A' );
	if ( is_array( $cdi_id_array ) && count( $cdi_id_array ) > 0 ) {
		foreach ( $cdi_id_array as $cdi_id_val ) {

			$cdi_current_id[] = $cdi_id_val['cdi_id'];

			$list[ $cdi_id_val['cdi_id'] ]['current']       = $cdi_id;
			$list[ $cdi_id_val['cdi_id'] ]['cdd_id']        = $cdd_param_id;
			$list[ $cdi_id_val['cdi_id'] ]['type']          = $cdi_id_val['cdi_style'];
			$list['child'][ $cdi_id_val['cdi_id'] ]['data'] = '';

			$child_list = dtbs_get_child_list( 'limit', $cdi_id_val['cdi_id'], $cdd_param_id );

			switch ( $cdi_id_val['cdi_style'] ) {
				case 'pulldown':
					$list['child'][ $cdi_id_val['cdi_id'] ]['selected'] = array();
					$list['child'][ $cdi_id_val['cdi_id'] ]['data']    .= '<option value="0">' . "</option>\n";

					foreach ( $child_list as $cdd_id => $cdd_value ) {
						$check_flug = '';
						if ( in_array( $cdd_id, $child_selected_array ) ) {
							$check_flug = ' selected';
							$list['child'][ $cdi_id_val['cdi_id'] ]['selected'][] = $cdd_id;
						}

						$res = $wpdb->get_results( $wpdb->prepare( 'SELECT cdi_id FROM ' . $wpdb->prefix . 'dtbs_detail WHERE cdd_current_id=%d GROUP BY cdi_id', $cdd_id ), 'ARRAY_A' );

						if ( is_array( $res ) && count( $res ) > 0 ) {
							$list['child'][ $cdi_id_val['cdi_id'] ]['data'] .= '<option value="' . $cdd_id . '" data-child="' . $res[0]['cdi_id'] . '"' . $check_flug . '>' . $cdd_value['name'] . "</option>\n";
						} else {
							$list['child'][ $cdi_id_val['cdi_id'] ]['data'] .= '<option value="' . $cdd_id . '"' . $check_flug . '>' . $cdd_value['name'] . "</option>\n";
						}
					}
					break;

				case 'radio':
					$list['child'][ $cdi_id_val['cdi_id'] ]['selected'] = array();
					$list['child'][ $cdi_id_val['cdi_id'] ]['data']    .= '<label><input type="radio" name="ci' . $cdi_id_val['cdi_id'] . '" value="0"><span><i></i>' . __( 'all', DTBS_SCNAME ) . '</span></label>' . "\n";

					foreach ( $child_list as $cdd_id => $cdd_value ) {
						$check_flug = '';
						if ( in_array( $cdd_id, $child_selected_array ) ) {
							$check_flug = '  checked="checked"';
							$list['child'][ $cdi_id_val['cdi_id'] ]['selected'][] = $cdd_id;
						}
						$res = $wpdb->get_results( $wpdb->prepare( 'SELECT cdi_id FROM ' . $wpdb->prefix . 'dtbs_detail WHERE cdd_current_id=%d GROUP BY cdi_id', $cdd_id ), 'ARRAY_A' );

						if ( is_array( $res ) && count( $res ) > 0 ) {
							$list['child'][ $cdi_id_val['cdi_id'] ]['data'] .= '<label><input type="radio" name="ci' . $cdi_id_val['cdi_id'] . '" value="' . $cdd_id . '" data-child="' . $res[0]['cdi_id'] . '"' . $check_flug . '><span><i></i>' . $cdd_value['name'] . '</span></label>' . "\n";
						} else {
							$list['child'][ $cdi_id_val['cdi_id'] ]['data'] .= '<label><input type="radio" name="ci' . $cdi_id_val['cdi_id'] . '" value="' . $cdd_id . '"' . $check_flug . '><span><i></i>' . $cdd_value['name'] . '</span></label>' . "\n";
						}
					}
					break;

				default:
					$list['child'][ $cdi_id_val['cdi_id'] ]['selected'] = array();

					foreach ( $child_list as $cdd_id => $cdd_value ) {
						$check_flug = '';
						if ( empty( $cdd_value['count'] ) ) {
							$list['child'][ $cdi_id_val['cdi_id'] ]['data'] .= '';
						} else {
							if ( in_array( $cdd_id, $child_selected_array ) ) {
								$check_flug = '  checked="checked"';
								$list['child'][ $cdi_id_val['cdi_id'] ]['selected'][] = $cdd_id;
							}
							$list['child'][ $cdi_id_val['cdi_id'] ]['data'] .= '<label><input type="checkbox" name="ci' . $cdi_id_val['cdi_id'] . '" value="' . $cdd_id . '"' . $check_flug . '><span><i></i>' . $cdd_value['name'] . '</span></label>' . "\n";
						}
					}
					break;
			}

			$list['child'][ $cdi_id_val['cdi_id'] ]['style'] = substr( $cdi_id_val['cdi_style'], 0, 1 );

			$current_id = $cdi_id_val['cdi_id'];

			// 選択された項目以下に子要素が無いか確認
			$list['xclusion'] = array();
			do {
				if ( isset( $cdi_current_id ) ) {
					$current_id = implode( ',', $cdi_current_id );
				}
				$child_array    = $wpdb->get_results( 'SELECT cdi_id, cdi_current_id FROM ' . $wpdb->prefix . 'dtbs_item WHERE cdi_current_id IN ( ' . $current_id . ' ) ORDER BY cdi_sort_no', 'ARRAY_A' );
				$cdi_current_id = array();
				if ( count( $child_array ) > 0 ) {
					foreach ( $child_array as $child_val ) {
						$cdi_current_id[] = $list['xclusion'][] = $child_val['cdi_id'];
					}
				}
			} while ( count( $child_array ) > 0 );
		}
	}

	echo json_encode( $list );
	die();
}


/**
 * 条件に対する該当件数を返却するAJAX
 *
 * @param int $_GET['scdb'] デタベスのID
 * @param
 *
 * @return json
 */
function dtbs_counter() {

	$count         = 0;
	$target_postID = '';
	$scd           = 0;

	if ( isset( $_GET['scdb'] ) ) {
		$param = dtbs_post_param_array( sanitize_dtbs_param( $_GET['scdb'] ) );

		if ( isset( $_GET['scdb']['scd'] ) && preg_match( '/[0-9]{1,}/', $_GET['scdb']['scd'] ) ) {
			$scd = $_GET['scdb']['scd'];
		} else {
			preg_match( '/scd=([0-9]{1,})/us', sanitize_dtbs_param( $_GET['scdb'] ), $scd_match );
			if ( isset( $scd_match[1] ) ) {
				$scd = $scd_match[1];
			}
		}

		// 検索対象が限定されている場合
		if ( is_array( $param ) && count( $param ) > 0 ) {
			$target_postID = dtbs_target_list( $scd, $param );
			$count = number_format( count( $target_postID ) );

			// すべての登録件数を返す
		} else {
			$count = number_format( dtbs_get_reged_count( $scd ) );
		}
	}
	echo esc_attr( $count );
	die();
}


/**
 * デタベスに登録されている項目を返却
 *
 * @param int    $cd_id デタベスのID
 * @param string $style 出力の形式（json / array）
 *
 * @return json / array
 */
function dtbs_get_cdi_list( $cd_id = 0, $style = 'json' ) {

	$list = array();
	if ( empty( $cd_id ) && ( ! isset( $_GET['cd_id'] ) || ! is_numeric( $_GET['cd_id'] ) || $_GET['cd_id'] <= 0 || ! is_user_logged_in() ) ) {
		return $list;
	}

	if ( isset( $_GET['cd_id'] ) && $_GET['cd_id'] > 0 ) {
		$cd_id = sanitize_key( $_GET['cd_id'] );
	}

	$cdi_list = dtbs_get_item_list( $cd_id );
	if ( count( $cdi_list ) > 0 ) {
		foreach ( $cdi_list as $cdi_id => $val ) {
			if ( 'json' === $style ) {
				$list[][ $cdi_id ] = dtbs_delete_escape_string( $val['cdi_title'] );
			} else {
				$list[ $cdi_id ] = dtbs_delete_escape_string( $val['cdi_title'] );
			}
		}
	}
	if ( 'json' === $style ) {
		echo json_encode( $list );
	} else {
		return $list;
	}
	die();
}

/**
 * アイテム項目のIDに登録されている項目を取得して返却
 *
 * @param int    $cdi_id アイテム項目のID
 * @param string $style 出力の形式（json形式 : json / array形式 : array）
 * @param string $count_view 登録されている件数を表示するか（表示:y / 表示しない:n）
 * @param string $count_view_style 登録されている件数の返却形式（件数を文字列で返却:'text' / 配列の要素で返却:'array'）
 *
 * @return json / array
 */
function dtbs_get_cdd_list( $cdi_id = 0, $style = 'json', $count_view = 'n', $count_view_style = 'text' ) {

	$list = array();
	$name = array();
	$res  = array();

	if ( 0 === $cdi_id && ( ! isset( $_GET['cdi_id'] ) || ! is_numeric( $_GET['cdi_id'] ) || $_GET['cdi_id'] <= 0 || ! is_user_logged_in() ) ) {
		return $list;
	}

	if ( isset( $_GET['cdi_id'] ) && $_GET['cdi_id'] > 0 ) {
		$cdi_id = sanitize_key( $_GET['cdi_id'] );
	}
	if ( isset( $_GET['count_view'] ) ) {
		$count_view = sanitize_key( $_GET['count_view' ] );
	}
	if ( isset( $_GET['count_view_style'] ) ) {
		$count_view_style = sanitize_key( $_GET['count_view_style'] );
	}

	global $wpdb;

	$count_sql = 'SELECT d.cdd_id, COUNT(m.cdd_id) AS count FROM ' . $wpdb->prefix . 'dtbs_detail AS d STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_match AS m ON d.cdd_id=m.cdd_id WHERE d.cdi_id=%d GROUP BY m.cdd_id';

	$cdd_list = $wpdb->get_results( $wpdb->prepare( 'SELECT a.cdd_id, a.cdd_current_id, a.cdd_value, b.cdd_value AS current_cdd_value, a.cdd_sort_no FROM ' . $wpdb->prefix . 'dtbs_detail AS a LEFT JOIN ' . $wpdb->prefix . 'dtbs_detail AS b ON a.cdd_current_id=b.cdd_id WHERE a.cdi_id=%d ORDER BY a.cdd_current_id, a.cdd_sort_no', $cdi_id ), 'ARRAY_A' );

	foreach ( $cdd_list as $val ) {

		$count_list     = array();
		$cdd_count_list = $wpdb->get_results( $wpdb->prepare( $count_sql, $cdi_id ), 'ARRAY_A' );
		if ( count( $cdd_count_list ) > 0 ) {
			foreach ( $cdd_count_list as $count_val ) {
				$count_list[ $count_val['cdd_id'] ] = number_format( $count_val['count'] );
			}
		}
		$count = ( isset( $count_list[ $val['cdd_id'] ] ) ) ? $count_list[ $val['cdd_id'] ] : 0;

		$cdd_value = esc_attr( dtbs_delete_escape_string( $val['cdd_value'] ) );

		if ( 'json' === $style ) {
			if ( 'y' === $count_view ) {

				if ( 'text' === $count_view_style ) {
					$list[ $val['cdd_current_id'] ][][ $val['cdd_id'] ] = $cdd_value . ' ( ' . number_format( $count ) . ' )';
				} else {
					$list[ $val['cdd_current_id'] ][ $val['cdd_id'] ][ $cdd_value ] = number_format( $count );
				}
			} else {
				$list[ $val['cdd_current_id'] ][][ $val['cdd_id'] ] = $cdd_value;
			}
		} else {
			$list[ $val['cdd_current_id'] ][ $val['cdd_id'] ]['cdd_value']         = $cdd_value;
			$list[ $val['cdd_current_id'] ][ $val['cdd_id'] ]['current_cdd_value'] = esc_attr( dtbs_delete_escape_string( $val['current_cdd_value'] ) );
			$list[ $val['cdd_current_id'] ][ $val['cdd_id'] ]['cdd_sort_no']       = esc_attr( $val['cdd_sort_no'] );
			if ( 'y' === $count_view ) {
				$list[ $val['cdd_current_id'] ][ $val['cdd_id'] ]['cdd_count'] = number_format( $count );
			}
		}
		$name[ $val['cdd_current_id'] ] = esc_html( dtbs_delete_escape_string( $val['current_cdd_value'] ) );
	}

	$res['list'] = $list;
	$res['name'] = $name;

	if ( 'json' === $style ) {
		echo json_encode( $res );
	} else {
		return $res;
	}
	die();
}


/**
 * 登録されている項目名を返却する
 *
 * @param int $cdi_id アイテム項目のID
 *
 * @return json
 */
function dtbs_get_cdd_menu_list( $cdi_id = 0 ) {
	if ( isset( $_GET['cdi_id'] ) && is_numeric( $_GET['cdi_id'] ) && $_GET['cdi_id'] > 0 ) {
		$cdi_id = sanitize_key( $_GET['cdi_id'] );
	}

	$list = array();

	if ( ! is_user_logged_in() ) {
		return $list;
	}

	global $wpdb;

	$sql_check = $wpdb->get_row( $wpdb->prepare( 'SELECT cdi_current_id FROM ' . $wpdb->prefix . 'dtbs_item WHERE cdi_id=%d', $cdi_id ), 'ARRAY_A' );
	if ( $sql_check['cdi_current_id'] > 0 ) {

		$title           = $wpdb->get_row( $wpdb->prepare( 'SELECT cdi_title FROM ' . $wpdb->prefix . 'dtbs_item WHERE cdi_id=%d', $sql_check['cdi_current_id'] ), 'ARRAY_A' );
		$list['title'][] = $title['cdi_title'];
		$cdd_list        = $wpdb->get_results( $wpdb->prepare( 'SELECT d.cdd_id, d.cdd_value FROM ' . $wpdb->prefix . 'dtbs_item AS i STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_detail AS d ON i.cdi_current_id=d.cdi_id WHERE i.cdi_id=%d', $cdi_id ), 'ARRAY_A' );
		foreach ( $cdd_list as $val ) {
			$list['list'][][ $val['cdd_id'] ] = $val['cdd_value'];
		}
	}
	echo json_encode( $list );
	die();
}


/**
 * 項目名称変更処理におけるリスト表示をする
 *
 * @param int    $cdi_id アイテム項目のID
 * @param int    $current_cd_id アイテム項目の親ID
 * @param string $style 出力の形式（json形式 : json / array形式 : array）
 *
 * @return json
 */
function dtbs_get_cdd_edit_list( $cdi_id = 0, $current_cd_id = 0, $style = 'json' ) {

	$list = array(
		'list'       => array(),
		'breadcrumb' => array(),
	);

	if ( ! is_user_logged_in() ) {
		return $list;
	}

	if ( isset( $_GET['cdi_id'] ) && is_numeric( $_GET['cdi_id'] ) && $_GET['cdi_id'] > 0 ) {
		$cdi_id = sanitize_key( $_GET['cdi_id'] );
	}
	if ( isset( $_GET['current_cd_id'] ) && is_numeric( $_GET['cdi_id'] ) && $_GET['current_cd_id'] > 0 ) {
		$current_cd_id = sanitize_key( $_GET['current_cd_id'] );
	}

	global $wpdb;

	$cdd_list = dtbs_get_child_list( 'all', $cdi_id, $current_cd_id );



	
	foreach ( $cdd_list as $cdd_id => $val ) {
		if ( 'json' === $style ) {
			$list['list'][][ $cdd_id ][ $val['name'] ] = number_format( $val['count'] );
		} else {
			$list['list'][ $cdd_id ][ $val['name'] ] = number_format( $val['count'] );
		}
	}

	if ( 'json' === $style ) {
		echo json_encode( $list );
	} else {
		return $list;
	}
	die();
}
