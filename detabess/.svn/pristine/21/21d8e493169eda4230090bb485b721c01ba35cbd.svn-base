<?php
add_action( 'pre_get_posts', 'dtbs_search_data' );


/**
 * 特定のデタベスに登録さている項目を取得して返却
 *
 * @param int $cd_id デタベスのIDを指定
 *
 * @return array
*/
if ( ! function_exists( 'dtbs_item_all_column_list' ) ) {
	function dtbs_item_all_column_list( $cd_id = 0 ) {
		$res_list = array();

		if ( ! is_numeric( $cd_id ) || $cd_id <= 0 ) {
			return false;
		}

		global $wpdb;
		$res = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'dtbs_item WHERE cd_id=%d ORDER BY cdi_sort_no', $cd_id ) );
		foreach ( $res as $val ) {
			$res_list[ $val->cdi_id ]['cdi_title']      = $val->cdi_title;
			$res_list[ $val->cdi_id ]['cdi_current_id'] = $val->cdi_current_id;
			$res_list[ $val->cdi_id ]['cdi_style']      = $val->cdi_style;
			$res_list[ $val->cdi_id ]['cdi_sort_no']    = $val->cdi_sort_no;
		}
		return $res_list;
	}
}

/**
 * 登録されているデタベスを削除
 *
 * @param int $cd_id デタベスのIDを指定
 * @param array $target_data マスターとアイテムがツリー状になった配列
 *
 * @return ture;
 */
if ( ! function_exists( 'dtbs_delete' ) ) {
	function dtbs_delete( $cd_id, $target_data ) {

		if ( ! is_numeric( $cd_id ) || $cd_id <= 0 ) {
			return false;
		}

		global $wpdb;

		foreach ( $target_data as $key => $val ) {
			switch ( $key ) {
				case 'master':
					$wpdb->delete( $wpdb->prefix . 'dtbs', array( 'cd_id' => $cd_id ), array( '%d' ) );
					break;

				case 'item':
					foreach ( $val as $cdi_id => $item_val ) {
						$wpdb->delete( $wpdb->prefix . 'dtbs_item', array( 'cdi_id' => $cdi_id ), array( '%d' ) );

						if ( isset( $item_val['detail'] ) ) {
							foreach ( $item_val['detail'] as $cdd_id => $detail_val ) {
								$wpdb->delete( $wpdb->prefix . 'dtbs_detail', array( 'cdd_id' => $cdd_id ), array( '%d' ) );
								$wpdb->delete( $wpdb->prefix . 'dtbs_match', array( 'cdd_id' => $cdd_id ), array( '%d' ) );
							}
						}
					}
					break;
			}
		}
		return true;
	}
}

/**
 * 対象の項目のリストを取得
 *
 * @param int $cdi_id アイテム項目のID
 * @param string $target どの項目を取得するか（default:all）
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_detail_list' ) ) {
	function dtbs_detail_list( $cdi_id = 0, $target = 'all' ) {

		if ( ! is_numeric( $cdi_id ) || $cdi_id <= 0 ) {
			return false;
		}

		$list = array();

		global $wpdb;
		if ( is_user_logged_in() ) {
			$res = $wpdb->get_results( $wpdb->prepare( 'SELECT d.cdd_id, cdd_value, COUNT(m.cdd_id) AS count FROM ' . $wpdb->prefix . 'dtbs_detail AS d LEFT JOIN ' . $wpdb->prefix . 'dtbs_match AS m ON d.cdd_id=m.cdd_id WHERE cdi_id=%d AND d.cdd_current_id=0 GROUP BY d.cdd_id ORDER BY cdd_sort_no', array( $cdi_id ) ), 'ARRAY_A' );
		} else {
			$res = $wpdb->get_results( $wpdb->prepare( 'SELECT d.cdd_id, cdd_value, COUNT(m.cdd_id) AS count FROM ' . $wpdb->prefix . 'dtbs_detail AS d LEFT JOIN ' . $wpdb->prefix . 'dtbs_match AS m ON d.cdd_id=m.cdd_id LEFT JOIN ' . $wpdb->prefix . 'posts AS p ON m.ID=p.ID WHERE cdi_id=%d AND d.cdd_current_id=0 AND post_status=%s GROUP BY m.cdd_id HAVING count > %d ORDER BY cdd_sort_no', array( $cdi_id, 'publish', 0 ) ), 'ARRAY_A' );
		}

		if ( ! empty( $res ) ) {
			foreach ( $res as $val ) {
				$list[ $val['cdd_id'] ]['cdd_value'] = esc_attr( dtbs_delete_escape_string( $val['cdd_value'] ) );
				$list[ $val['cdd_id'] ]['count']     = $val['count'];

				$child_res = $wpdb->get_results( $wpdb->prepare( 'SELECT cdi_id FROM ' . $wpdb->prefix . 'dtbs_detail WHERE cdd_current_id=%d GROUP BY cdi_id', $val['cdd_id'] ), 'ARRAY_A' );
				if ( is_array( $child_res ) && count( $child_res ) > 0 ) {
					$array_list = array();
					foreach ( $child_res as $vals ) {
						$array_list[] = $vals['cdi_id'];
					}
					$list[ $val['cdd_id'] ]['child'] = implode( ',', $array_list );
				}
			}
		}
		return $list;
	}
}


/**
 * 対象の項目の子項目になっているリストを取得
 *
 * @param int $cdi_id アイテム項目のID
 * @param int $cdd_current_id アイテム項目の親ID
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_detail_child_list' ) ) {
	function dtbs_detail_child_list( $cdi_id = 0, $cdd_current_id = 0 ) {

		if ( ! is_numeric( $cdi_id ) || $cdi_id <= 0 ) {
			return false;
		}
		if ( ! is_numeric( $cdd_current_id ) || $cdd_current_id <= 0 ) {
			return false;
		}

		$list = array();

		global $wpdb;
		$res = $wpdb->get_results( $wpdb->prepare( 'SELECT d.cdd_id, cdd_value, COUNT(m.cdd_id) AS count FROM ' . $wpdb->prefix . 'dtbs_detail AS d LEFT JOIN ' . $wpdb->prefix . 'dtbs_match AS m ON d.cdd_id=m.cdd_id WHERE cdi_id=%d AND d.cdd_current_id=%d GROUP BY d.cdd_id ORDER BY cdd_sort_no', array( $cdi_id, $cdd_current_id ) ), 'ARRAY_A' );

		foreach ( $res as $val ) {
			$list[ $val['cdd_id'] ]['cdd_value'] = esc_attr( dtbs_delete_escape_string( $val['cdd_value'] ) );
			$list[ $val['cdd_id'] ]['count']     = ( null === $val['count'] ) ? 0 : $val['count'];
		}
		return $list;
	}
}


/**
 * 登録されている項目ごとのリストを取得
 *
 * @param int $cd_id デタベスのIDを指定
 * @param string $target どの項目を取得するか（default:all）
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_detail_list_from_cdid' ) ) {
	function dtbs_detail_list_from_cdid( $cd_id = 0, $target = 'all' ) {

		$item = array();

		if ( ! is_numeric( $cd_id ) || $cd_id <= 0 ) {
			return $item;
		}

		if ( 'all' === $target ) {
			$item_list = dtbs_get_item_list( $cd_id );
			foreach ( $item_list as $cdi_id => $cdi_title ) {
				$item[ $cdi_id ]['title'] = $cdi_title;
				$item[ $cdi_id ]['list']  = dtbs_detail_list( $cdi_id, 'all' );
			}
		} else {
			$item_list = dtbs_item_all_column_list( $cd_id );
			foreach ( $item_list as $cdi_id => $val ) {
				$item[ $cdi_id ]['title'] = $val['cdi_title'];
				$item[ $cdi_id ]['style'] = $val['cdi_style'];
				$item[ $cdi_id ]['list']  = ( (string) 0 === $val['cdi_current_id'] ) ? dtbs_detail_list( $cdi_id, 'public' ) : array();
			}
			return $item;
		}
	}
}


/**
 * 登録されているリストの一覧を取得
 *
 * @param int $cd_id デタベスのIDを指定
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_get_list' ) ) {
	function dtbs_get_list( $cd_id = '' ) {
		global $wpdb;

		if ( empty( $cd_id ) ) {
			$dtbs_list = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'dtbs ORDER BY cd_id', 'ARRAY_A' );
		} elseif ( is_numeric( $cd_id ) ) {
			$dtbs_list = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'dtbs WHERE cd_id=%d', $cd_id ), 'ARRAY_A' );
		}

		foreach ( $dtbs_list as $no => $dtbs_val ) {
			$target = $wpdb->get_results( $wpdb->prepare( 'SELECT cd_target FROM ' . $wpdb->prefix . 'dtbs_target WHERE cd_id=%d', $dtbs_val['cd_id'] ), 'ARRAY_A' );
			foreach ( $target as $t_no => $target_val ) {
				$dtbs_list[ $no ]['dtbs_target'][ $t_no ] = $target_val['cd_target'];
			}
		}
		return $dtbs_list;
	}
}

/**
 * 登録されているデータベース項目の名称とその種類を取得
 *
 * @param int $cd_id デタベスのIDを指定
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_get_item_list' ) ) {
	function dtbs_get_item_list( $cd_id = 0 ) {

		$dtbs_list = array();

		if ( 0 === $cd_id || ! is_numeric( $cd_id ) ) {
			return $dtbs_list;
		}

		global $wpdb;
		if ( $cd_id > 0 ) {
			$res = $wpdb->get_results( $wpdb->prepare( 'SELECT cdi_id, cdi_title, cdi_style FROM ' . $wpdb->prefix . 'dtbs_item WHERE cd_id=%d ORDER BY cdi_sort_no', $cd_id ), 'ARRAY_A' );
		} else {
			$res = $wpdb->get_results( 'SELECT cdi_id, cdi_title, cdi_style FROM ' . $wpdb->prefix . 'dtbs_item ORDER BY cdi_sort_no', 'ARRAY_A' );
		}

		foreach ( $res as $val ) {
			$dtbs_list[ $val['cdi_id'] ]['cdi_title'] = $val['cdi_title'];
			$dtbs_list[ $val['cdi_id'] ]['cdi_style'] = $val['cdi_style'];
		}
		return $dtbs_list;
	}
}

/**
 * 対象のデタベスの親子リストを取得
 *
 * @param int $cd_id デタベスのIDを指定
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_get_child_tree' ) ) {
	function dtbs_get_child_tree( $cd_id = 0 ) {

		$tree = array();

		if ( 0 === $cd_id || ! is_numeric( $cd_id ) ) {
			return $tree;
		}

		global $wpdb;
		$res = $wpdb->get_results( $wpdb->prepare( 'SELECT cdi_current_id, cdi_id FROM ' . $wpdb->prefix . 'dtbs_item WHERE cd_id=%d AND cdi_current_id > 0 ORDER BY cdi_sort_no', $cd_id ), 'ARRAY_A' );
		if ( is_array( $res ) && count( $res ) > 0 ) {
			foreach ( $res as $val ) {
				$tree[ $val['cdi_current_id'] ][] = $val['cdi_id'];
			}
		}
		return $tree;
	}
}

/**
 * 対象のデタベスの親要素のリストを取得
 *
 * @param int $cd_id デタベスのIDを指定
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_get_current_tree' ) ) {
	function dtbs_get_current_tree( $cd_id = 0 ) {

		$tree = array();

		global $wpdb;

		if ( $cd_id > 0 ) {
			$res = $wpdb->get_results( $wpdb->prepare( 'SELECT cdi_id, cdi_current_id FROM ' . $wpdb->prefix . 'dtbs_item WHERE cd_id=%d AND cdi_current_id > %d ORDER BY cdi_sort_no', array( $cd_id, 0 ) ), 'ARRAY_A' );
		} else {
			$res = $wpdb->get_results( $wpdb->prepare( 'SELECT cdi_id, cdi_current_id FROM ' . $wpdb->prefix . 'dtbs_item ORDER BY cdi_sort_no' ), 'ARRAY_A' );
		}
		if ( is_array( $res ) && count( $res ) > 0 ) {
			foreach ( $res as $val ) {
				$tree[ $val['cdi_id'] ] = $val['cdi_current_id'];
			}
		}
		return $tree;
	}
}

/**
 * 対象の項目の子要素を配列にして返却する
 *
 * @param string $target 取得する範囲を指定（すべて：all / 限定:imit）
 * @param int $cdi_id アイテム項目のID
 * @param int $cdd_id 小項目のIDを指定
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_get_child_list' ) ) {
	function dtbs_get_child_list( $target = 'limit', $cdi_id = 0, $cdd_id = 0 ) {

		$child_list = array();

		if ( 0 === $cdi_id ) {
			return $child_list;
		}

		global $wpdb;

		if ( 'all' === $target ) {
			$res = $wpdb->get_results( $wpdb->prepare( 'SELECT d.cdd_id, cdd_value, COUNT(m.cdd_id) AS count FROM ' . $wpdb->prefix . 'dtbs_detail AS d LEFT JOIN ' . $wpdb->prefix . 'dtbs_match AS m ON d.cdd_id=m.cdd_id WHERE cdi_id=%d AND cdd_current_id=%d GROUP BY d.cdd_id ORDER BY cdd_sort_no', array( $cdi_id, $cdd_id ) ), 'ARRAY_A' );

		} elseif ( $cdd_id <= 0 ) {
			$res = array(
				array(
					'cdd_id'    => $cdi_id,
					'cdd_value' => '',
					'count'     => '',
				),
			);

		} else {
			$res = $wpdb->get_results( $wpdb->prepare( 'SELECT d.cdd_id, cdd_value, COUNT(m.cdd_id) AS count FROM ' . $wpdb->prefix . 'dtbs_detail AS d LEFT JOIN ' . $wpdb->prefix . 'dtbs_match AS m ON d.cdd_id=m.cdd_id LEFT JOIN ' . $wpdb->prefix . 'posts AS p ON m.ID=p.ID WHERE cdi_id=%d AND cdd_current_id=%d AND post_status IN ( ' . dtbs_sql_column() . ' ) GROUP BY d.cdd_id ORDER BY cdd_sort_no', array( $cdi_id, $cdd_id ) ), 'ARRAY_A' );

		}

		if ( is_array( $res ) && count( $res ) > 0 ) {
			foreach ( $res as $child ) {
				$child_list[ $child['cdd_id'] ]['name']  = esc_attr( dtbs_delete_escape_string( $child['cdd_value'] ) );
				$child_list[ $child['cdd_id'] ]['count'] = $child['count'];
			}
		}

		return $child_list;
	}
}


/**
 * 入力されてきたパラメータの分解
 *
 * @param string $sauce URLパラメータを指定
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_post_param_array' ) ) {
	function dtbs_post_param_array( $sauce = '' ) {

		if ( empty( $_GET['cdb'] ) && empty( $sauce ) ) {
			return;
		}

		$res_param = array();

		$key = ! empty( $sauce ) ? $sauce : $_SERVER['QUERY_STRING'];

		preg_match_all( '/ci([0-9]{1,})=([,0-9]{1,})?/us', $key, $param, PREG_SET_ORDER );
		if ( ! empty( $param ) ) {

			foreach ( $param as $val ) {
				if ( ! isset( $val[2] ) ) {
					continue;
				}

				if ( ! isset( $res_param[ $val[1] ] ) ) {
					$res_param[ $val[1] ] = $val[2];
				} else {
					$res_param[ $val[1] ] .= ',' . $val[2];
				}
			}
		}

		return $res_param;
	}
}

/**
 * パラメータの詳細分解
 *
 * @param string $data URLパラメータを指定
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_search_data_create' ) ) {
	function dtbs_search_data_create( $data = '' ) {
		$res['param'] = array();

		if ( isset( $data['cdb'] ) && preg_match( '/[0-9]{1,}/', $data['cdb'] ) ) {
			$res['cdb'] = $data['cdb'];
		}

		preg_match_all( '/ci([0-9]{1,})=([,0-9]{1,})?/us', $data, $param, PREG_SET_ORDER );
		if ( is_array( $param ) && count( $param ) > 0 ) {
			foreach ( $param as $val ) {
				if ( substr_count( $val[2], ',' ) > 0 ) {
					$res['param'][ $val[1] ] = explode( ',', $val[2] );
				} else {
					$res['param'][ $val[1] ] = $val[2];
				}
			}
		}
		return $res;
	}
}


/**
 * 検索結果への反映するための処理
 *
 * @param string $query WordPressのクエリを指定
 *
 * @return void
 */
if ( ! function_exists( 'dtbs_search_data' ) ) {
	function dtbs_search_data( $query ) {

		$param = dtbs_post_param_array();

		// 通常の検索の場合
		if ( ! isset( $_GET['cdb'] ) || ! is_numeric( $_GET['cdb'] ) ) {
			return;
		}

		$cdb = 0;

		if ( isset( $_GET['cdb'] ) ) {
			$cdb = sanitize_key( $_GET['cdb'] );

			if ( ! is_numeric( $cdb ) ) {
				return;
			}
		} else {
			return;
		}

		// 検索ページではない場合
		if ( ! $query->is_search() ) {
			return;
		}

		// 管理画面,メインクエリに干渉しないために必須
		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}

		$target_postID = ( is_array( $param ) && count( $param ) > 0 ) ? dtbs_target_list( $cdb, $param ) : dtbs_all_postid_list( $cdb );

		if ( count( $target_postID ) > 0 ) {
			$query->set( 'post__in', $target_postID );
		} else {
			$query->set( 'post__in', array( 0 ) );
		}
		return true;
	}
}


/**
 * パラメータから、該当する投稿IDのリストを返却
 *
 * @param int $cd_id デタベスのIDを指定
 * @param array パラメータ毎に区切られた配列を指定
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_target_list' ) ) {
	function dtbs_target_list( $cd_id = '', $param = array() ) {

		$target_postID = array();

		if ( '' == $cd_id || ! preg_match( '/[0-9]{1,}/', $cd_id ) ) {
			return $target_postID;
		}

		$sql_from_param = $sql_where_param = $before_table = '';

		global $wpdb;

		foreach ( $param as $cdi_id => $cdd_id ) {

			if ( preg_match( '/,/', $cdd_id ) ) {

				$sql_where_param_sep = '';
				$param_sep           = explode( ',', $cdd_id );

				foreach ( $param_sep as $no => $param_val_sep ) {
					$target_table         = ( '' == $sql_where_param_sep ) ? 'p' : $before_table;
					$sql_from_param      .= '  STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_match AS m' . $cdi_id . '_' . $no . ' ON ' . $target_table . '.ID=m' . $cdi_id . '_' . $no . '.ID';
					$sql_where_param_sep .= 'm' . $cdi_id . '_' . $no . '.cdd_id=' . $param_val_sep . ' AND ';
					$before_table         = 'm' . $cdi_id . '_' . $no;
				}
				$sql_where_param .= ' AND (' . substr( $sql_where_param_sep, 0, -5 ) . ')';

			} elseif ( is_numeric( $cdd_id ) && $cdd_id > 0 ) {
				$sql_from_param  .= ' STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_match AS m' . $cdi_id . ' ON p.ID=m' . $cdi_id . '.ID';
				$sql_where_param .= ' AND m' . $cdi_id . '.cdd_id=' . $cdd_id;
			}
		}

		$res = $wpdb->get_results( 'SELECT DISTINCT p.ID FROM ' . $wpdb->prefix . 'dtbs_target AS t STRAIGHT_JOIN ' . $wpdb->prefix . 'posts AS p ON t.cd_target=p.post_type' . $sql_from_param . ' WHERE post_status IN (' . dtbs_sql_column() . ') ' . $sql_where_param . ' AND t.cd_id=' . $cd_id, 'ARRAY_A' );
		if ( ! empty( $res ) ) {
			foreach ( $res as $ids ) {
					$target_postID[] = $ids['ID'];
			}
		}
		return $target_postID;
	}
}


/**
 * 検索対象となった項目から、検索結果のタイトルを生成して返却
 *
 * @param string $title 現タイトル
 *
 * @return string
 */
if ( ! function_exists( 'dtbs_search_title' ) ) {
	function dtbs_search_title( $title ) {

		if ( empty( $_GET['cdb'] ) ) {
			return $title;
		}

		$param = dtbs_post_param_array();

		if ( is_array( $param ) && count( $param ) > 0 ) {
			$sql_name_query = '';

			foreach ( $param as $cdi_id => $cdd_id ) {

				if ( preg_match( '/,/', $cdd_id ) ) {
					$param_sep = explode( ',', $cdd_id );
					foreach ( $param_sep as $cdd_id_val ) {
						if ( is_numeric( $cdi_id ) && is_numeric( $cdd_id_val ) && $cdd_id_val > 0 ) {
							$sql_name_query .= ' ( d.cdi_id =' . $cdi_id . ' AND cdd_id IN ( ' . $cdd_id_val . ' ) ) OR';
						}
					}
				} elseif ( is_numeric( $cdi_id ) && is_numeric( $cdd_id ) && $cdd_id > 0 ) {
					$sql_name_query .= ' ( d.cdi_id =' . $cdi_id . ' AND cdd_id IN ( ' . $cdd_id . ' ) ) OR';
				}
			}

			global $wpdb;
			$my_title = $before_title = '';
			$res      = $wpdb->get_results( 'SELECT cdd_id, cdi_title, cdd_value FROM ' . $wpdb->prefix . 'dtbs_item AS i LEFT JOIN ' . $wpdb->prefix . 'dtbs_detail AS d ON i.cdi_id=d.cdi_id WHERE' . substr( $sql_name_query, 0, -3 ) . ' ORDER BY cdi_sort_no', 'ARRAY_A' );
			foreach ( $res as $search_item ) {
				if ( $before_title != $search_item['cdi_title'] ) {
					$my_title .= '+' . esc_html( dtbs_delete_escape_string( $search_item['cdi_title'] ) ) . ':' . esc_html( dtbs_delete_escape_string( $search_item['cdd_value'] ) );
				} else {
					$my_title .= '/' . esc_html( dtbs_delete_escape_string( $search_item['cdd_value'] ) );
				}
				$before_title = esc_html( dtbs_delete_escape_string( $search_item['cdi_title'] ) );
			}
			$title = substr( $my_title, 1 );

		} else {
			$title = __( 'Search from all items', DTBS_SCNAME );
		}

		return $title;
	}
}


/**
 * ユーザーが閲覧する公開画面で、検索エリアを表示する処理
 *
 * @param int $cd_id デタベスのIDを指定
 * @param string $class 指定をしたいclass名を入力
 *
 * @return string
 */
if ( ! function_exists( 'dtbs_create_search_area' ) ) {
	function dtbs_create_search_area( $cd_id = 0, $class = '' ) {

		if ( empty( dtbs_all_postid_list( $cd_id ) ) ) {
			return;
		}

		$url_params = dtbs_post_param_array();

		$list_array = dtbs_detail_list_from_cdid( $cd_id, 'top' );
		$child_tree = dtbs_get_child_tree( $cd_id );
		foreach ( $child_tree as $cdd => $child_val ) {
			foreach ( $child_val as $cdd_id ) {
				$child_tree_list[ $cdd_id ] = $cdd_id;

				if ( isset( $url_params[ $cdd_id ] ) || isset( $url_params[ $cdd ] ) ) {
					$cdd_current_id = ( isset( $url_params[ $cdd ] ) ) ? $url_params[ $cdd ] : $cdd;
					$target_list    = dtbs_get_child_list( 'limit', $cdd_id, $cdd_current_id );
					if ( count( $target_list ) > 0 ) {
						foreach ( $target_list as $list_key => $list_val ) {
							unset( $target_list[ $list_key ]['name'] );
							$target_list[ $list_key ]['cdd_value'] = $list_val['name'];
						}
						$list_array[ $cdd_id ]['list'] = $target_list;
					}
				}
			}
		}

		$class = ( '' != $class ) ? 'dtbs-list ' . $class : 'dtbs-list';
		if ( ! strpos( $class, 'table' ) && ! strpos( $class, 'side' ) ) {
			$class .= ' dtbs-list-table';
		}

		$from_class = sanitize_html_class( dtbs_get_form_class( $cd_id ) );
		$url_style  = sanitize_key( dtbs_get_url_style( $cd_id ) );

		if ( is_array( $list_array ) && count( $list_array ) > 0 ) {
			$list  = '<div class="">' . "\n";
			$list .= '<form role="search" id="dtbs_form' . $cd_id . '" class="' . $from_class . '">' . "\n";
			$list .= '<div class="' . $class . '" id="dtbs-list' . $cd_id . '" data-child="' . $url_style . '">' . "\n";

			foreach ( $list_array as $cdi_id => $val ) {

				$list .= '<dl class="dtbs_list">' . "\n";
				$list .= '<dt class="dtbs_title">' . esc_html( $val['title'] ) . "</dt>\n";
				$list .= '<dd class="dtbs_item">' . "\n";

				switch ( $val['style'] ) {
					case 'pulldown':
						$class_id_param = ( isset( $child_tree[ $cdi_id ] ) ) ? ' class="cdi_id_p change_current" id="ci' . $cdi_id . '"' : ' class="cdi_id_p" id="ci' . $cdi_id . '"';

						$list .= '<select name="ci' . $cdi_id . '"' . $class_id_param . '>' . "\n";
						$list .= '<option value="0"></option>' . "\n";
						foreach ( $val['list'] as $cdd_id => $cdd_val ) {
							$child    = ( isset( $cdd_val['child'] ) ) ? ' data-child="' . $cdd_val['child'] . '"' : '';
							$selected = ( isset( $url_params[ $cdi_id ] ) && $url_params[ $cdi_id ] == $cdd_id ) ? ' selected' : '';
							$list    .= '<option value="' . $cdd_id . '"' . $child . $selected . '>' . $cdd_val['cdd_value'] . "</option>\n";
						}
						$list .= "</select>\n";
						break;

					case 'radio':
						$class_id_param = ( isset( $child_tree[ $cdi_id ] ) ) ? ' class="cdi_id_r change_current" id="ci' . $cdi_id . '" data-child="' . implode( ',', $child_tree[ $cdi_id ] ) . '"' : ' class="cdi_id_r" id="ci' . $cdi_id . '"';
						$list          .= '<span' . $class_id_param . ">\n";
						if ( ! isset( $child_tree_list[ $cdi_id ] ) ) {
							$list .= '<label><input type="radio" name="ci' . $cdi_id . '" value="0"  checked="checked"><span><i></i>すべて</span></label>' . "\n";
						}
						foreach ( $val['list'] as $cdd_id => $cdd_val ) {
							$child    = ( isset( $cdd_val['child'] ) ) ? ' data-child="' . $cdd_val['child'] . '"' : '';
							$selected = ( isset( $url_params[ $cdi_id ] ) && $url_params[ $cdi_id ] == $cdd_id ) ? '  checked="checked"' : '';
							$list    .= '<label><input type="radio" name="ci' . $cdi_id . '" value="' . $cdd_id . '"' . $child . $selected . '><span><i></i>' . $cdd_val['cdd_value'] . '</span></label>' . "\n";
						}
						$list .= "</span>\n";
						break;

					default:
						$check_array    = ( isset( $url_params[ $cdi_id ] ) ) ? explode( ',', $url_params[ $cdi_id ] ) : array();
						$class_id_param = ( isset( $child_tree[ $cdi_id ] ) ) ? ' class="cdi_id_c change_current" id="ci' . $cdi_id . '"' : ' class="cdi_id_c" id="ci' . $cdi_id . '"';
						$list          .= '<span' . $class_id_param . ">\n";
						foreach ( $val['list'] as $cdd_id => $cdd_val ) {
							$selected = ( in_array( $cdd_id, $check_array ) ) ? '  checked="checked"' : '';
							$list    .= '<label><input type="checkbox" name="ci' . $cdi_id . '" value="' . $cdd_id . '"' . $selected . '><span><i></i>' . $cdd_val['cdd_value'] . '</span></label>' . "\n";
						}
						$list .= "</span>\n";
						break;
				}

				$list .= "</dd>\n";
				$list .= "</dl>\n";
			}

			$list .= "</div>\n";
			$list .= '<div class="dtbs_list_result">';
			$list .= '<div class="dtbs_count_view">' . __( 'Number of cases :', DTBS_SCNAME ) . '<span id="dtbs_couter' . $cd_id . '" class="dtbs_couter' . $cd_id . '"></span></div>' . "\n";

			$list .= '<p class="dtbs_list_submitWrap"><button type="submit" id="dtbs_search' . $cd_id . '" value="search" class="dtbs-list-submit">' . __( 'search', DTBS_SCNAME ) . '</button></p>' . "\n";
			$list .= "</form>\n";
			$list .= "</div>\n";
			$list .= "</div>\n";

			return $list;
		}
	}
}


/**
 * 登録項目の編集を行うエリアを生成して返却
 *
 * @param array $data 表示対象となるデータを配列で指定
 *
 * @return string
 */
if ( ! function_exists( 'dtbs_get_item_list_area' ) ) {
	function dtbs_get_item_list_area( $data ) {

		$item_area  = '<tr id="cdd_new_item_" class="cdd_new_item">' . "\n";
		$item_area .= '<td class="name"><input type="text" class="dtbs_edit_detail_name" name="dtbs_item[new][]" value="">' . "</td>\n";
		$item_area .= '<td class="delete"></td>' . "\n";
		$item_area .= "</tr>\n";

		$edit_item_area  = '<tr id="cdd_item_cdd_item_id">' . "\n";
		$edit_item_area .= '<td class="name"><input type="text" class="dtbs_edit_detail_name" name="dtbs_item[update][cdd_item_id]" value="cdd_item_value">' . "</td>\n";
		$edit_item_area .= '<td class="delete"><label><input type="checkbox" class="dtbs_edit_detail_name" name="dtbs_item[del][cdd_item_id]" value="y"> (cdd_item_count)</label>' . "</td>\n";
		$edit_item_area .= "</tr>\n";

		$list_area  = '<li class="dtbs-edit-header_item dtbs_child_select_area">' . "\n";
		$list_area .= "<dl>\n";
		$list_area .= "<dt>title_val</dt>\n";
		$list_area .= "<dd>\n";
		$list_area .= '<select name="cdd_current_id" id="cdd_list" class="cdin_list">' . "\n";
		$list_area .= "dtbs_get_child_tree_res\n";
		$list_area .= "</select>\n";
		$list_area .= "</dd>\n";
		$list_area .= "</dl>\n";
		$list_area .= "</li>\n";

		$site_params = array(
			'add_item_area'  => $item_area,
			'edit_item_area' => $edit_item_area,
			'list_area'      => $list_area,
		);
		wp_localize_script( 'detabess_admin', 'def_params', $site_params );

		$res = '<table class="widefat striped" id="table-view-list">' . "\n";

		$res .= "<thead>\n";
		$res .= "<tr>\n";
		$res .= '<th class="name">' . __( 'Item Name', DTBS_SCNAME ) . "</th>\n";
		$res .= '<th class="delete">' . __( 'Delete', DTBS_SCNAME ) . "</th>\n";
		$res .= "</tr>\n";
		$res .= "</thead>\n";

		$res .= "<tbody>\n";

		foreach ( $data as $cdd_id => $val_array ) {
			$replace_array = array(
				'cdd_item_id'    => $cdd_id,
				'cdd_item_value' => $val_array['cdd_value'],
				'cdd_item_count' => $val_array['cdd_count'],
			);
			$search        = array_keys( $replace_array );
			$replace       = array_values( $replace_array );
			$res          .= str_replace( $search, $replace, $edit_item_area );
		}

		$res .= "</tbody>\n";
		$res .= "<tfoot>\n";
		$res .= '<td colspan="2">' . "\n";
		$res .= '<button type="button" class="button-primary dtbs_item_add"><span class="dashicons dashicons-insert"></span>' . __( 'Add', DTBS_SCNAME ) . "</button>\n";
		$res .= "</td>\n";
		$res .= "</tfoot>\n";
		$res .= "</table>\n";

		return $res;
	}
}


/**
 * 項目の登録・編集・削除の処理
 *
 * @param array $data 表示対象となるデータを配列で指定
 *
 * @return string
 */
if ( ! function_exists( 'dtbs_item_update' ) ) {
	function dtbs_item_update( $data ) {

		$error  = array();
		$cdi_id = $cdd_current_id = 0;

		if ( isset( $data['cdin_list'] ) && is_numeric( $data['cdin_list'] ) && $data['cdin_list'] > 0 ) {
			$cdi_id = $data['cdin_list'];
		}
		if ( isset( $data['cdd_current_id'] ) && is_numeric( $data['cdd_current_id'] ) && $data['cdd_current_id'] > 0 ) {
			$cdd_current_id = $data['cdd_current_id'];
		}

		global $wpdb;

		foreach ( $data['dtbs_item'] as $key => $vals ) {
			switch ( $key ) {
				case 'new':
					foreach ( $vals as $no => $val ) {
						if ( trim( strip_tags( $val ) ) != '' ) {
							$res = $wpdb->query( $wpdb->prepare( 'INSERT INTO ' . $wpdb->prefix . 'dtbs_detail ( cdi_id, cdd_current_id, cdd_value, cdd_sort_no ) SELECT %d, %d, %s, MAX( cdd_sort_no )+1 FROM ' . $wpdb->prefix . 'dtbs_detail WHERE cdi_id=%d AND cdd_current_id=%d', $cdi_id, $cdd_current_id, $val, $cdi_id, $cdd_current_id ) );
							if ( false === $res ) {
								$error[ $key ][ $no ] = 'no_reg';
							}
						}
					}
					break;

				case 'update':
					foreach ( $vals as $cdd_id => $val ) {
						if ( trim( strip_tags( $val ) ) != '' ) {
							$res = $wpdb->update( $wpdb->prefix . 'dtbs_detail', array( 'cdd_value' => $val ), array( 'cdd_id' => $cdd_id ), array( '%s' ), array( '%d' ) );
							if ( false === $res ) {
								$error[ $key ][ $cdd_id ] = 'no_reg';
							}
						}
					}
					break;

				case 'del':
					foreach ( $vals as $cdd_id => $val ) {
						$res = $wpdb->delete( $wpdb->prefix . 'dtbs_detail', array( 'cdd_id' => $cdd_id ), array( '%d' ) );
						if ( false === $res ) {
							$error[ $key ][ $cdd_id ] = 'no_reg';
						}
					}
					break;
			}
		}
		return ( count( $error ) > 0 ) ? true : $error;
	}
}


/**
 * 指定された項目のIDに対して名称が書かれた配列を返す
 *
 * @param int $cdi_id アイテム項目のID
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_get_detail_list' ) ) {
	function dtbs_get_detail_list( $cdi_id = 0 ) {

		$list = array();

		if ( $cdi_id > 0 && is_numeric( $cdi_id ) ) {
			global $wpdb;
			$res = $wpdb->get_results( $wpdb->prepare( 'SELECT d1.cdd_id, d1.cdd_value FROM ' . $wpdb->prefix . 'dtbs_detail AS d1 WHERE d1.cdd_id IN ( SELECT DISTINCT( d2.cdd_current_id ) FROM ' . $wpdb->prefix . 'dtbs_detail AS d2 WHERE d2.cdi_id=%d ) ORDER BY d1.cdd_sort_no', $cdi_id ), 'ARRAY_A' );
			if ( is_array( $res ) && count( $res ) > 0 ) {
				foreach ( $res as $lines ) {
					$list[ $lines['cdd_id'] ] = $lines['cdd_value'];
				}
			}
		}
		return $list;
	}
}


/**
 * 管理画面内に表示する、各項目に指定できる形式を配列形式にして返却
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_get_item_style' ) ) {
	function dtbs_get_item_style() {
		$style = array(
			'pulldown' => __( 'pull-down menu', DTBS_SCNAME ),
			'radio'    => __( 'radio button', DTBS_SCNAME ),
			'checkbox' => __( 'checkbox', DTBS_SCNAME ),
		);

		return $style;
	}
}


/**
 * 編集対象に紐付けるエリアのリストを返却
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_get_target_area' ) ) {
	function dtbs_get_target_area() {
		$list['post'] = __( 'Posts', DTBS_SCNAME );
		return $list;
	}
}


/**
 * fromタグに入れるclass名を返却する
 *
 * @return string
 */
if ( ! function_exists( 'dtbs_get_form_class' ) ) {
	function dtbs_get_form_class( $id ) {
		return ( is_numeric( $id ) && $id > 0 ) ? 'dtbs_forms' : '';
	}
}


/**
 * fromタグに入れるstyleを返却する
 *
 * @return string
 */
if ( ! function_exists( 'dtbs_get_url_style' ) ) {
	function dtbs_get_url_style( $id ) {
		return ( is_numeric( $id ) && $id > 0 ) ? 'param' : '';
	}
}


/**
 * 検索エリアに表示するチェックボックスの存在チェック
 *
 * @return false
 */
if ( ! function_exists( 'dtbs_get_seatch_checkbox' ) ) {
	function dtbs_get_seatch_checkbox() {
		return false;
	}
}


/**
 * SQLで取得されたエスケープされた文字列の、エスケープ文字を削除して返却
 *
 * @param string $string エスケープを行いたい文字列
 *
 * @return string
 */
if ( ! function_exists( 'dtbs_delete_escape_string' ) ) {
	function dtbs_delete_escape_string( $string ) {
		return str_replace( '\\', '', esc_html( $string ) );
	}
}

/**
 * detabess独自のサニタイズ関数
 *
 * @param string $string サニタイズを行いたい文字列
 *
 * @return string
 */
if ( ! function_exists( 'sanitize_dtbs_param' ) ) {
	function sanitize_dtbs_param( $string ) {
		return preg_replace('/[^cdis0-9=,&]+/u', '', $string);
	}
}


/**
 * WordPressの管理画面にログインしているかどうかで、検索対象となるカラムを判断して返却
 *
 * @return string
 */
if ( ! function_exists( 'dtbs_sql_column' ) ) {
	function dtbs_sql_column() {
		return ( is_user_logged_in() ) ? "'publish','future','draft','pending','private'" : "'publish'";
	}
}


/**
 * リスト全体に対して対象の投稿IDを配列に入れて返却する
 *
 * @param int $cd_id デタベスのIDを指定
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_all_postid_list' ) ) {
	function dtbs_all_postid_list( $cd_id = 0 ) {

		$id_list = array();

		if ( ! is_numeric( $cd_id ) || $cd_id <= 0 ) {
			return $id_list;
		}

		global $wpdb;
		$res = $wpdb->get_results( $wpdb->prepare( 'SELECT DISTINCT p.ID FROM ' . $wpdb->prefix . 'posts AS p STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_match AS m ON p.ID=m.ID STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_detail AS d ON m.cdd_id=d.cdd_id STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_item AS i ON d.cdi_id=i.cdi_id WHERE post_status IN ( ' . dtbs_sql_column() . ' ) AND i.cd_id=%d', $cd_id ), 'ARRAY_A' );

		if ( ! empty( $res ) ) {
			foreach ( $res as $id_data ) {
				$id_list[] = $id_data['ID'];
			}
		}
		return $id_list;
	}
}


/**
 * 指定されたリストに対してデタベス登録されている件数を取得してデータベースに入れる
 *
 * @param int $cd_id デタベスのIDを指定
 *
 * @return NULL
 */
function dtbs_reg_count_update( $cd_id = 0 ) {
	global $wpdb;
	$wpdb->query( $wpdb->prepare( 'UPDATE ' . $wpdb->prefix . 'dtbs SET cd_admin_rows = ( SELECT COUNT(*) FROM (SELECT p.ID FROM ' . $wpdb->prefix . 'posts AS p STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_match AS m ON p.ID=m.ID STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_detail AS d ON m.cdd_id=d.cdd_id STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_item AS i ON d.cdi_id=i.cdi_id WHERE post_status IN ( ' . dtbs_sql_column() . ' ) AND i.cd_id=%d GROUP BY p.ID) AS t ) WHERE cd_id=%d', array( $cd_id, $cd_id ) ) );
	$wpdb->query( $wpdb->prepare( 'UPDATE ' . $wpdb->prefix . 'dtbs SET cd_pub_rows = ( SELECT COUNT(*) FROM (SELECT p.ID FROM ' . $wpdb->prefix . 'posts AS p STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_match AS m ON p.ID=m.ID STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_detail AS d ON m.cdd_id=d.cdd_id STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_item AS i ON d.cdi_id=i.cdi_id WHERE post_status = "publish" AND i.cd_id=%d GROUP BY p.ID) AS t ) WHERE cd_id=%d', array( $cd_id, $cd_id ) ) );
	return;
}


/**
 * 指定されたリストに対してデタベス登録されている件数を取得して返却する
 *
 * @param int $cd_id デタベスのIDを指定
 *
 * @return int 登録件数
 */
function dtbs_get_reged_count( $cd_id = 0 ) {
	global $wpdb;
	if ( is_user_logged_in() ) {
		$column = 'cd_admin_rows';
	} else {
		$column = 'cd_pub_rows';
	}

	$count = $wpdb->get_var( $wpdb->prepare( 'SELECT ' . $column . ' FROM ' . $wpdb->prefix . 'dtbs WHERE cd_id=%d', $cd_id ) );
	return $count;
}


/**
 * 登録されているデタベスの情報をツリー状にして配列で返却
 *
 * @param int $cd_id デタベスのIDを指定
 *
 * @return array
 */
if ( ! function_exists( 'dtbs_create_data_tree' ) ) {
	function dtbs_create_data_tree( $cd_id = 0 ) {

		$res = array();

		if ( is_numeric( $cd_id ) && $cd_id > 0 ) {

			global $wpdb;

			$master_sql = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'dtbs WHERE cd_id=%d', $cd_id ), 'ARRAY_A' );

			$res['master'] = $master_sql[0];

			$detail_sql = 'SELECT * FROM ' . $wpdb->prefix . 'dtbs_detail WHERE cdi_id=%d ORDER BY cdd_sort_no';

			$item_data = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'dtbs_item WHERE cd_id=%d ORDER BY cdi_sort_no', $cd_id ), 'ARRAY_A' );

			if ( ! empty( $item_data ) ) {
				foreach ( $item_data as $i_no => $i_vals ) {
					$cdi_id = $i_vals['cdi_id'];
					unset( $i_vals['cdi_id'] );
					unset( $i_vals['cd_id'] );
					$res['item'][ $cdi_id ]['master'] = $i_vals;

					$detail_data = $wpdb->get_results( $wpdb->prepare( $detail_sql, $cdi_id ), 'ARRAY_A' );
					if ( ! empty( $detail_data ) ) {
						foreach ( $detail_data as $d_no => $d_vals ) {
							$cdd_id = $d_vals['cdd_id'];
							unset( $d_vals['cdd_id'] );
							unset( $d_vals['cdi_id'] );
							$res['item'][ $cdi_id ]['detail'][ $cdd_id ] = $d_vals;
						}
					}
				}
			}
		}

		return $res;
	}
}


/**
 * 記事に紐付いている要素をリストで出力（未実装）
 *
 * @param int $cd_id デタベスのIDを指定
 * @param int $post_id 投稿ID
 * @param bool $link リンクをするかどうかの確認
 *
 * @return false
 */
if ( ! function_exists( 'dtbs_view_data_list' ) ) {
	function dtbs_view_data_list( $cd_id = 0, $post_id = 0, $link = false ) {
		return '';
	}
}


/**
 * 投稿されていた記事が削除された際にデタベスのデータを削除する
 *
 * @param object 投稿情報のobject
 *
 * @return NULL
 */
function dtbs_match_data_del( $post ) {
	global $wpdb;
	$del_count = $wpdb->delete( $wpdb->prefix.'dtbs_match', array( 'ID' => $post->ID ), array( '%d' ) );
	return;
}

add_action( 'publish_to_trash',	'dtbs_match_data_del');
add_action( 'draft_to_trash',	'dtbs_match_data_del');
add_action( 'future_to_trash',	'dtbs_match_data_del');



/**
 * 投稿されていた記事のステータスが変更された際にデタベスに登録されている件数を書き直す
 *
 * @param string $new_status 変更後のステータス
 * @param string $old_status 変更前のステータス
 * @param object $post 投稿の情報
 *
 * @return NULL
 */
function dtbs_post_counter_update( $new_status, $old_status, $post ) {
	if ( $new_status != $old_status ) {
		$dtbs_list = dtbs_get_list();
		foreach ( $dtbs_list as $no => $val ) {
			dtbs_reg_count_update( $val['cd_id'] );
		}
	}
	return;
}

add_action( 'transition_post_status', 'dtbs_post_counter_update', 10, 3 );