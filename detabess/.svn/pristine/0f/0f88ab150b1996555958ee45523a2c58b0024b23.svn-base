<?php
/**
 * デタベスのベース情報を登録・更新
 */
function dtbs_reg() {

	$mode            = 'reg';
	$added_item_list = array();
	$sort_list       = array();

	$cd_title = '';

	if ( ! empty( $_POST ) && check_admin_referer( 'dtbs_post_type_nonce_action', 'dtbs_master_edit' ) ) {

		if ( isset( $_POST['dtbs_post_filter'] ) ) {

			switch ( $_POST['dtbs_post_filter'] ) {

				case 'dtbs_reg':
					$reged     = false;
					$dtbs_error = array();

					foreach ( $_POST as $key => $val ) {
						if ( preg_match( '/^cd_(.+)/u', $key ) ) {
							$sql_data_array[ $key ] = sanitize_text_field( $val );
							$sql_pattern_array[]    = '%s';
						}
					}

					$title = sanitize_text_field( $_POST['cd_title'] );
					if ( '' == $title ) {
						$dtbs_error['dtbs_title'] = __( 'Please enter a title.', DTBS_SCNAME );
					}

					if ( isset( $_POST['mode'] ) && $_POST['mode'] == 'edit' && isset( $_POST['cd_id'] ) ) {
						if ( is_numeric( $_POST['cd_id'] ) ) {
							$id = $_POST['cd_id'];
						} else {
							$dtbs_error['cd_id'] = __( 'Unknown data to be updated.', DTBS_SCNAME );
						}
					}

					// エラーがなかった場合
					if ( empty( $dtbs_error ) ) {

						if ( isset( $_POST['dtbs_sort_no'] ) ) {

							global $wpdb;

							$sort_array  = explode( ',', esc_attr( $_POST['dtbs_sort_no'] ) );
							$reged_array = array();

							switch ( $_POST['mode'] ) {

								case 'reg':
									$res = $wpdb->insert( $wpdb->prefix . 'dtbs', $sql_data_array, $sql_pattern_array );
									if ( false !== $res ) {
										$id = $wpdb->insert_id;

										if ( isset( $_POST['dtbs_target'] ) ) {
											foreach ( $_POST['dtbs_target'] as $val ) {
												$res   = $wpdb->insert(
													$wpdb->prefix . 'dtbs_target',
													array(
														'cd_id' => $id,
														'cd_target' => esc_attr( $val ),
													),
													array( '%d', '%s' )
												);
												$reged = ( false !== $res ) ? true : false;
											}
										}

										foreach ( $sort_array as $sort_no => $val ) {
											preg_match( '/^dtbs_(.+)_([0-9]{1,})/u', $val, $target_val );
											if ( isset( $target_val[2] ) ) {
												$reg_data = array();

												$title = sanitize_text_field( $_POST['new_cdi_title'][ $target_val[2] ] );
												if ( '' != $title ) {
													$reg_data['cdi_title']      = $title;
													$reg_data['cdi_current_id'] = ( $_POST['new_cdi_top_id'][ $target_val[2] ] > 0 && isset( $reged_array[ $_POST['new_cdi_top_id'][ $target_val[2] ] ] ) ) ? $reged_array[ $_POST['new_cdi_top_id'][ $target_val[2] ] ] : 0;
													$reg_data['cdi_style']      = esc_attr( $_POST['cdi_style'][ $target_val[2] ] );

													$cdi_current_id = dtbs_new_item_reg( $id, $reg_data, $sort_no++ );
													if ( false !== $cdi_current_id ) {
														$reged                         = true;
														$reged_array[ $target_val[2] ] = $cdi_current_id;
													} else {
														$reged = false;
													}
												}
											}
											if ( false === $reged ) {
												break 2;
											}
										}
										if ( false !== $reged ) {
											$_GET['cd_id'] = $id;
										}
										unset( $_POST );
									}
									break;

								case 'edit':
									$res = $wpdb->update( $wpdb->prefix . 'dtbs', $sql_data_array, array( 'cd_id' => $id ), $sql_pattern_array, array( '%d' ) );
									if ( false !== $res ) {
										if ( isset( $_POST['dtbs_target'] ) ) {
											foreach ( $_POST['dtbs_target'] as $val ) {
												$res   = $wpdb->replace(
													$wpdb->prefix . 'dtbs_target',
													array(
														'cd_id' => $id,
														'cd_target' => esc_attr( $val ),
													),
													array( '%d', '%s' )
												);
												$reged = ( false !== $res ) ? true : false;
											}
											$res   = $wpdb->query( $wpdb->prepare( 'DELETE FROM ' . $wpdb->prefix . "dtbs_target WHERE cd_id=%d AND cd_target NOT IN ('" . implode( "','", $_POST['dtbs_target'] ) . "')", $id ) );
											$reged = $res;
										} else {
											$res   = $wpdb->delete( $wpdb->prefix . 'dtbs_target', array( 'cd_id' => $id ), array( '%d' ) );
											$reged = ( false !== $res ) ? true : false;
										}

										$cdi_current_id = 0;
										foreach ( $sort_array as $sort_no => $val ) {
											preg_match( '/^dtbs_(.+)_([0-9]{1,})/u', $val, $target_val );
											if ( isset( $target_val[2] ) ) {
												$reg_data = array();

												if ( isset( $_POST['cdi_delete'][ $target_val[2] ] ) ) {
													$res   = $wpdb->delete( $wpdb->prefix . 'dtbs_item', array( 'cdi_id' => $target_val[2] ), array( '%d' ) );
													$reged = ( false !== $res ) ? true : false;

												} elseif ( $target_val[1] == 'added' ) {

													$cdi_title = sanitize_text_field( $_POST['added_cdi_title'][ $target_val[2] ] );
													if ( '' !== $cdi_title ) {

														$res   = $wpdb->update(
															$wpdb->prefix . 'dtbs_item',
															array(
																'cdi_current_id' => (int) $_POST['added_cdi_top_id'][ $target_val[2] ],
																'cdi_title'      => $cdi_title,
																'cdi_style'      => esc_attr( $_POST['cdi_style'][ $target_val[2] ] ),
																'cdi_sort_no'    => $sort_no++,
															),
															array( 'cdi_id' => $target_val[2] ),
															array( '%d', '%s', '%s', '%d' ),
															array( '%d' )
														);
														$reged = ( false !== $res ) ? true : false;
													} else {
														$reged = false;
													}
												} else {

													$reg_data = array();

													$title = sanitize_text_field( $_POST['new_cdi_title'][ $target_val[2] ] );
													if ( $title != '' ) {
														$reg_data['cdi_title'] = $title;
														if ( isset( $_POST['new_cdi_top_id'][ $target_val[2] ] ) && $_POST['new_cdi_top_id'][ $target_val[2] ] > 0 ) {
															if ( isset( $reged_array[ $_POST['new_cdi_top_id'][ $target_val[2] ] ] ) ) {
																$cdi_current_id = sanitize_key( $reged_array[ $_POST['new_cdi_top_id'][ $target_val[2] ] ] );
															} elseif ( isset( $_POST['added_cdi_title'][ $_POST['new_cdi_top_id'][ $target_val[2] ] ] ) ) {
																$cdi_current_id = sanitize_key( $_POST['new_cdi_top_id'][ $target_val[2] ] );
															} else {
																$cdi_current_id = 0;
															}
														} else {
															$cdi_current_id = sanitize_key( $_POST['new_cdi_top_id'][ $target_val[2] ] );
														}
														$reg_data['cdi_current_id'] = $cdi_current_id;
														$reg_data['cdi_style']      = sanitize_key( $_POST['cdi_style'][ $target_val[2] ] );
														$cdi_current_id             = dtbs_new_item_reg( $id, $reg_data, $sort_no++ );
														if ( false !== $cdi_current_id ) {
															$reged                         = true;
															$reged_array[ $target_val[2] ] = $cdi_current_id;
														} else {
															$reged = false;
														}
													}
												}
											}
											if ( false === $reged ) {
												break 2;
											}
										}
										unset( $_POST );
									}
									break;
							}
						}
					}
					break;

				case 'dtbs_del':
					if ( isset( $_POST['cd_id'] ) && is_numeric( $_POST['cd_id'] ) && $_POST['cd_id'] > 0 ) {
						$tree_data = dtbs_create_data_tree( esc_attr( $_POST['cd_id'] ) );
						if ( ! empty( $tree_data ) ) {
							$res = dtbs_delete( esc_attr( $_POST['cd_id'] ), $tree_data );
							if ( true == $res ) {
								$deleted = 'y';
							}
						}
					}
					break;
			}
		}
	}

	if ( ! empty( $_GET['cd_id'] ) && is_numeric( $_GET['cd_id'] ) && empty( $deleted ) ) {

		$mode = 'edit';
		// 対象データの読み出し
		$data     = dtbs_get_list( sanitize_key( $_GET['cd_id'] ) );
		$cd_id    = $data[0]['cd_id'];
		$cd_title = $data[0]['cd_title'];
		if ( ! empty( $data[0]['dtbs_target'] ) ) {
			$cd_target = $data[0]['dtbs_target'];
		}

		$added_item_list = dtbs_item_all_column_list( sanitize_key( $_GET['cd_id'] ) );
	}

	// リストの取得
	$target_area = dtbs_get_target_area();

	// 現在すでに登録されているリストの取得
	$used       = array();
	$reged_area = dtbs_get_list();
	if ( count( $reged_area ) > 0 ) {
		foreach ( $reged_area as $reged_target ) {
			if ( isset( $reged_target['dtbs_target'] ) ) {
				foreach ( $reged_target['dtbs_target'] as $position ) {
					$used[ $position ] = $position;
				}
			}
		}
	}

	$style = dtbs_get_item_style();

	if ( isset( $added_item_list ) ) {
		if ( count( $added_item_list ) <= 10 ) {
			// 添え字の最大値を取得
			$max_cdi_id = ( count( $added_item_list ) > 0 ) ? max( array_keys( $added_item_list ) ) : 0;
		}
	} else {
		$added_item_list = array();
	}

	for ( $i = 1; $i <= ( 10 - count( $added_item_list ) ); $i++ ) {
		$new_item_list[ ( $i + $max_cdi_id ) ] = '';
	}

	if ( ! empty( $reged ) && ( false === $reged ) ) { ?>
		<div class="error"><p><strong><?php _e( 'Failed to update. Please check the data you have entered.', DTBS_SCNAME ); ?></strong></p></div>
<?php } elseif ( ! empty( $dtbs_error ) ) { ?>
	<div class="error">
		<?php foreach ( $dtbs_error as $error_val ) { ?>
	<p><strong><?php echo esc_attr( $error_val) ; ?></strong></p>
		<?php	} ?>
	</div>
<?php } elseif ( ! empty( $deleted ) && 'y' == $deleted ) { ?>
<div class="updated"><p><strong><?php _e( 'Deleted', DTBS_SCNAME ); ?></strong></p></div>
<?php } elseif ( ! empty( $reged ) && ( true === $reged ) ) { ?>
		<div class="updated"><p><strong><?php _e( 'Saved', DTBS_SCNAME ); ?></strong></p></div>
<?php } ?>

<div class="wrap">
	<h1><?php ( 'reg' == $mode ) ? _e( 'Resister detabess', DTBS_SCNAME ) : _e( 'Editing detabess', DTBS_SCNAME ); ?></h1>

				<form class="" method="post" action="">

					<table class="form-table">
						<tbody>
							<tr>
							<th scope="row"><?php _e( 'Title', DTBS_SCNAME ); ?></th>
							<td>
								<input type="text" name="cd_title" value="<?php echo esc_attr( dtbs_delete_escape_string( $cd_title ) ); ?>" size="30" maxlength="30">
									<?php
									if ( isset( $_error['cd_title'] ) ) {
										echo esc_attr( $_error['cd_title'] );
									}
									?>
								</td>
							</tr>

							<tr>
							<th scope="row"><?php _e( 'Setting Target', DTBS_SCNAME ); ?></th>
							<td>
							<?php
							if ( ! empty( $target_area ) ) {
								foreach ( $target_area as $key => $val ) {
									if ( isset( $cd_target ) && false !== in_array( $key, $cd_target ) ) {
										$checked  = ' checked="checked"';
										$disabled = '';
									} elseif ( isset( $used[ $key ] ) ) {
										$checked  = '';
										$disabled = ' disabled="disabled"';
									} else {
										$checked  = '';
										$disabled = '';
									}
									?>

								<p>
										<label for="wp_dtbs_<?php echo esc_attr( $key ); ?>" ><input type="checkbox" name="dtbs_target[]" id="wp_dtbs_<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $key ); ?>"<?php echo esc_attr( $checked . $disabled ); ?>><?php echo esc_attr( $val ); ?> </label>
								</p>
									<?php
								}
							}
							?>
								<?php
								if ( isset( $_error['dtbs_target'] ) ) {
									echo esc_attr( $_error['dtbs_target'] );}
								?>
								</td>
							</tr>

							<tr>
							<th scope="row"><?php _e( 'Item', DTBS_SCNAME ); ?></th>
							<td>
									<div class="dtbs_list_wrap">
									<div class="dtbs_list_title">
											<ul>
												<li class="dtbs_list_title-order"></li>
												<li class="dtbs_list_title-items"><?php _e( 'Parent Item', DTBS_SCNAME ); ?></li>
												<li class="dtbs_list_title-name"><?php _e( 'Item Name', DTBS_SCNAME ); ?></li>
												<li class="dtbs_list_title-format"><?php _e( 'Display Format', DTBS_SCNAME ); ?></li>
												<?php
												if ( 'edit' == $mode ) {
													?>
													<li class="dtbs_list_title-delete"><?php _e( 'Delete', DTBS_SCNAME ); ?></li><?php } ?>
											</ul>
										</div>
										<div class="dtbs_list_detail dtbs_reg_area">
											<?php
											$now_count     = 1;
											foreach ( $added_item_list as $cdi_id => $val ) {
												$id_name     = 'dtbs_added_' . $cdi_id;
												$sort_list[] = $id_name;
												?>
											<ul class="item_block" id="<?php echo esc_attr( $id_name ); ?>">
											<li class="number"><span class="dashicons dashicons-sort"></span></li>
												<li class="items"><select name="added_cdi_top_id[<?php echo esc_attr( $cdi_id ); ?>]" id="added_cdi_top_id_<?php echo esc_attr( $cdi_id ); ?>" class="cdi_list">
													<option value="0"></option>
													<?php
													$now_pulldowncount = 1;
													foreach ( $added_item_list as $cdi_id_child => $val_child ) {
														if ( $now_count > $now_pulldowncount && $cdi_id_child != $cdi_id ) {
															if ( $val_child['cdi_style'] != 'checkbox' ) {
																$selected = ( $val['cdi_current_id'] == $cdi_id_child ) ? ' selected="selected"' : '';
															} else {
																$selected = ' disabled';
															}
															?>
														<option value="<?php echo esc_attr( $cdi_id_child ); ?>"<?php echo $selected; ?>><?php echo esc_attr( dtbs_delete_escape_string( $val_child['cdi_title'] ) ); ?></option>
															<?php
														}
														$now_pulldowncount++;
													}
													?>
													</select></li>
												<li class="name"><input type="text" name="added_cdi_title[<?php echo esc_attr( $cdi_id ); ?>]" value="<?php echo esc_attr( dtbs_delete_escape_string( $val['cdi_title'] ) ); ?>" id="added_cdi_title_<?php echo esc_attr( $cdi_id ); ?>" class="cdi_title" size="30" maxlength="30"></li>
												<li class="format"><select name="cdi_style[<?php echo esc_attr( $cdi_id ); ?>]" id="cdi_style_<?php echo esc_attr( $cdi_id ); ?>" class="cdi_style">
													<?php
													if ( isset( $style[ $val['cdi_style'] ] ) ) {
														foreach ( $style as $style_key => $style_val ) {
															$selected = ( $style_key == $val['cdi_style'] ) ? ' selected="selected"' : '';
															?>
													<option value="<?php echo esc_attr( $style_key ); ?>"<?php echo esc_attr( $selected ); ?>><?php echo esc_attr( $style_val ); ?></option>
															<?php
														}
													} else {
														foreach ( $style as $style_key => $style_val ) {
															$selected = ( 'checkbox' == $style_key ) ? ' selected="selected"' : '';
															?>
													<option value="<?php echo esc_attr( $style_key ); ?>"<?php echo esc_attr( $selected ); ?>><?php echo esc_attr( $style_val ); ?></option>
															<?php
														}
													}
													?>
													</select></li>
												<?php
												if ( 'edit' == $mode ) {

													?>
												<li class="delete"><label><input type="checkbox" name="cdi_delete[<?php echo esc_attr( $cdi_id ); ?>]" id="cdi_del_<?php echo esc_attr( $cdi_id ); ?>" class="cdi_del"></label></li><?php } ?>
													</ul>
												<?php
												$now_count++;
											}

											if ( isset( $new_item_list ) && count( $new_item_list ) > 0 ) {
												foreach ( $new_item_list as $no => $val ) {
													$id_name     = 'dtbs_new_' . $no;
													$sort_list[] = $id_name;
													?>
													<ul class="item_block" id="<?php echo esc_attr( $id_name ); ?>">
													<li class="number"><span class="dashicons dashicons-sort"></span></li>
												<li class="items"><select name="new_cdi_top_id[<?php echo esc_attr( $no ); ?>]" id="new_cdi_top_id_<?php echo esc_attr( $no ); ?>" class="cdi_list new_list">
													<option value="0"></option>
													<?php
													foreach ( $added_item_list as $cdi_id_child => $val_child ) {
														$disabled = ( $val_child['cdi_style'] == 'checkbox' ) ? ' disabled' : '';
														?>
														<option value="<?php echo esc_attr( $cdi_id_child ); ?>"<?php echo esc_attr( $disabled ); ?>><?php echo esc_attr( dtbs_delete_escape_string( $val_child['cdi_title'] ) ); ?></option>
														<?php
													}
													?>
													</select></li>
												<li class="name"><input type="text" name="new_cdi_title[<?php echo esc_attr( $no ); ?>]" value="<?php echo esc_attr( $val ); ?>" id="new_cdi_title_<?php echo esc_attr( $no ); ?>" class="cdi_title" size="30" maxlength="30"></li>
												<li class="format"><select name="cdi_style[<?php echo esc_attr( $no ); ?>]" id="cdi_style_<?php echo esc_attr( $no ); ?>" class="cdi_style">
														<?php foreach ( $style as $style_key => $style_val ) { ?>
													<option value="<?php echo esc_attr( $style_key ); ?>"><?php echo esc_attr( $style_val ); ?></option>
															<?php
														}
														?>
													</select></li>
													<?php
													if ( 'edit' == $mode ) {

														?>
												<li class="delete"></li><?php } ?>
											</ul>
													<?php
													$now_count++;
												}
											}
											?>
										</div>
										</div>
								</td>

							</tr>

							<tr class="dtbs_plus" id="dtbs_plus"></tr>
						</tbody>

						</table>

					<?php wp_nonce_field( 'dtbs_post_type_nonce_action', 'dtbs_master_edit' ); ?>
					<?php
					if ( 'edit' == $mode && isset( $cd_id ) && is_numeric( $cd_id ) && $cd_id > 0 ) {
						;}
					?>
					<input type="hidden" name="cd_id" value="<?php echo esc_attr( $cd_id ); ?>">
					<input type="hidden" name="mode" value="<?php echo esc_attr( $mode ); ?>">
					<input type="hidden" name="dtbs_sort_no" id="dtbs_sort_no" value="<?php echo implode( ',', $sort_list ); ?>'">
					<input type="hidden" name="dtbs_post_filter" value="dtbs_reg">
					<?php
					if ( 'reg' == $mode ) {
						$submit_button = __( 'Add', DTBS_SCNAME );
					} else {
						$submit_button = __( 'Change', DTBS_SCNAME );
					}
					?>
					<input type="submit" class="button-primary" name="dtbs_submit" value="<?php echo esc_attr( $submit_button ); ?>" />
				</form>

				<?php if ( 'edit' == $mode && is_numeric( $cd_id ) && $cd_id > 0 ) { ?>
				<form class="dtbs_del_form" method="post" action="">
					<?php wp_nonce_field( 'dtbs_post_type_nonce_action', 'dtbs_master_edit' ); ?>
				<input type="hidden" name="cd_id" value="<?php echo esc_attr( $cd_id ); ?>">
				<input type="hidden" name="dtbs_post_filter" value="dtbs_del">
				<input type="submit" class="" id="dtbs_del" value="<?php _e( 'Delete', DTBS_SCNAME ); ?>" />
				</form>
				<?php } ?>
</div>
	<?php

		$reg_param = array(
			'sort_list'  => $sort_list,
			'del_alert1' => __( 'Are you sure to delete this?', DTBS_SCNAME ),
			'del_alert2' => __( 'If you delete it, the data will be completely erased.', DTBS_SCNAME ),
		);
		wp_localize_script( 'detabess_admin', 'reg_param', $reg_param );

}

/**
 * 新しい登録時のitemデータ登録
 *
 * @param int $id デタベスのIDを指定
 * @param array 投稿時に送られてきた項目データの配列
 * @param int  $sort_no 表示の順番の数値
 *
 * @return int itemに登録されたitemID
 */
function dtbs_new_item_reg( $id, $reg_data, $sort_no ) {
	global $wpdb;
	$res = $wpdb->insert(
		$wpdb->prefix . 'dtbs_item',
		array(
			'cd_id'          => $id,
			'cdi_current_id' => $reg_data['cdi_current_id'],
			'cdi_title'      => $reg_data['cdi_title'],
			'cdi_style'      => $reg_data['cdi_style'],
			'cdi_sort_no'    => $sort_no,
		),
		array( '%d', '%d', '%s', '%s', '%d' )
	);
	return ( false !== $res ) ? $wpdb->insert_id : false;
}

/**
 * 各投稿へのデータベース内容の登録・更新
 *
 * @param int $post_ID 投稿ID
 * @param array $_POST 投稿に紐付く項目の情報
 *
 * @return void
 */
function dtbs_item_reg( $post_ID ) {

	if ( in_array( get_post_status( $post_ID ) , array( 'auto-draft', 'inherit' ) ) ) {
		return false;
	}

	if ( ( ! empty( $_POST['dtbs_item'] ) || ! empty( $_POST['dtbs_added_item_list'] ) ) && check_admin_referer( 'dtbs_post_item_action', 'dtbs_post_item_data' ) ) {

		$dtbs_list = dtbs_get_item_list( esc_attr( $_POST['cd_id'] ) );

		$cd_id = ( ! empty( $_POST['cd_id'] ) && is_numeric($_POST['cd_id']) && $_POST['cd_id'] > 0 ) ? esc_attr( $_POST['cd_id'] ) : '';

		$current_tree = dtbs_get_current_tree( esc_attr( $cd_id ) );

		global $wpdb;

		// cdd_idを取得するSQL
		$get_cdd_id_sql = 'SELECT cdd_id FROM ' . $wpdb->prefix . 'dtbs_detail WHERE cdi_id=%d AND cdd_current_id=%d AND cdd_value=%s';

		// マッチングテーブルのデータを一旦削除
		$del_target_cdd_ids = $wpdb->get_results( $wpdb->prepare( 'SELECT cdd_id FROM ' . $wpdb->prefix . 'dtbs_item AS i STRAIGHT_JOIN ' . $wpdb->prefix . 'dtbs_detail AS d ON i.cdi_id=d.cdi_id WHERE i.cd_id=%d ORDER BY d.cdd_id', $cd_id ), 'ARRAY_N' );

		if ( ! empty( $del_target_cdd_ids ) ) {
			foreach ( $del_target_cdd_ids as $lines ) {
				$ex_ids[] = $lines[0];
			}
			$wpdb->query( $wpdb->prepare( 'DELETE FROM ' . $wpdb->prefix . 'dtbs_match WHERE ID=%d AND cdd_id IN (' . implode( ',', $ex_ids ) . ')', array( $post_ID ) ) );
		} else {
			$wpdb->delete( $wpdb->prefix . 'dtbs_match', array( 'ID' => $post_ID ), array( '%d' ) );
		}

		// すでに登録されている項目が選択されていた場合は追加
		if ( ! empty( $_POST['dtbs_added_item_list'] ) ) {
			foreach ( $_POST['dtbs_added_item_list'] as $cdi_id => $vals ) {

				switch ( $dtbs_list[ $cdi_id ]['cdi_style'] ) {
					case 'pulldown':
					case 'radio':
						$res                    = $wpdb->insert(
							$wpdb->prefix . 'dtbs_match',
							array(
								'ID'     => $post_ID,
								'cdd_id' => esc_attr( $vals ),
							),
							array( '%d', '%d' )
						);
						$reg_data[ $cdi_id ][0] = esc_attr( $vals );
						break;

					default:
						foreach ( $vals as $cdd_id ) {
							$res = $wpdb->insert(
								$wpdb->prefix . 'dtbs_match',
								array(
									'ID'     => $post_ID,
									'cdd_id' => esc_attr( $cdd_id ),
								),
								array( '%d', '%d' )
							);
						}
						break;
				}
			}
		}

		// 入力されてきたデータのチェック
		if ( ! empty( $_POST['dtbs_item'] ) ) {

			foreach ( $_POST['dtbs_item'] as $cdi_id => $vals ) {

				$cdd_current_id = ( isset( $current_tree[ $cdi_id ] ) && isset( $reg_data[ $current_tree[ $cdi_id ] ][0] ) ) ? $reg_data[ $current_tree[ $cdi_id ] ][0] : 0;

				foreach ( $vals as $val ) {
					$val = trim( $val );
					if ( '' != $val ) {
						$cdd_id = $wpdb->get_var( $wpdb->prepare( $get_cdd_id_sql, array( $cdi_id, $cdd_current_id, $val ) ) );
						if ( null === $cdd_id ) {
							$res    = $wpdb->query( $wpdb->prepare( 'INSERT INTO ' . $wpdb->prefix . 'dtbs_detail (cdi_id, cdd_current_id, cdd_value, cdd_sort_no) SELECT %d, %d, %s, MAX(cdd_sort_no)+1 FROM ' . $wpdb->prefix . 'dtbs_detail WHERE cdi_id=%d AND cdd_current_id=%d', $cdi_id, $cdd_current_id, $val, $cdi_id, $cdd_current_id ) );
							$cdd_id = ( false !== $res ) ? $wpdb->insert_id : false;
						}
						if ( $cdd_id > 0 ) {
							$res                   = $wpdb->insert(
								$wpdb->prefix . 'dtbs_match',
								array(
									'ID'     => $post_ID,
									'cdd_id' => esc_attr( $cdd_id ),
								),
								array( '%d', '%d' )
							);
							$reg_data[ $cdi_id ][] = esc_attr( $cdd_id );
						}
					}
				}
			}
		}

		dtbs_reg_count_update( $cd_id );
	}
}

/**
 * 表示している場所が、リストの表示対象になっていれば投稿エリアを表示する
 *
 * @return string
 */
function dtbs_view_area_check() {

	global $pagenow;

	$post_type = '';

	// 新規登録の場合
	if ( 'post-new.php' == $pagenow ) {
		if ( isset( $_GET['post_type'] ) ) {
			$post_type = sanitize_key( $_GET['post_type'] );
		}
		if ( '' == $post_type ) {
			$post_type = 'post';
		}

		// 編集の場合
	} elseif ( 'post.php' == $pagenow && isset( $_GET['post'] ) && is_numeric( $_GET['post'] ) ) {
		$post_type = get_post_type( sanitize_key( $_GET['post'] ) );
	}

	$target_area = dtbs_get_target_area();
	if ( ! array_key_exists( $post_type, $target_area ) ) {
		return false;
	}

	global $wpdb;
	$title_data = $wpdb->get_results( 'SELECT cdb.cd_id, cd_title FROM ' . $wpdb->prefix . 'dtbs AS cdb LEFT JOIN ' . $wpdb->prefix . "dtbs_target AS t ON cdb.cd_id=t.cd_id WHERE cd_target='" . $post_type . "' ORDER BY cd_id", 'ARRAY_A' );

	if ( is_array( $title_data ) && count( $title_data ) > 0 ) {
		foreach ( $title_data as $title_val ) {
			add_meta_box( 'dtbs_input_area' . $title_val['cd_id'], $title_val['cd_title'], 'dtbs_view_area_form', array( $post_type ), 'normal', 'default', array( 'cd_id' => $title_val['cd_id'] ) );
		}
	}
}


/**
 * 投稿ページにデータベースの登録項目を表示
 *
 * @param int $post_ID 投稿ページのID
 * @param array $params 投稿ページ内で取得した配列の情報
 *
 * @return string
 */
function dtbs_view_area_form( $post_ID, $params ) {
	global $wpdb;

	$cd_id = esc_attr( $params['args']['cd_id'] );

	$now_item_list   = array();
	$added_item_list = array();
	$child_tree      = array();
	$current_tree    = array();

	$dtbs_list = dtbs_get_item_list( $params['args']['cd_id'] );

	$now_dtbs_item = $wpdb->get_results( $wpdb->prepare( 'SELECT m.cdd_id, i.cdi_id FROM ' . $wpdb->prefix . 'dtbs_item AS i LEFT JOIN ' . $wpdb->prefix . 'dtbs_detail AS d ON i.cdi_id=d.cdi_id LEFT JOIN ' . $wpdb->prefix . 'dtbs_match AS m ON d.cdd_id=m.cdd_id WHERE ID=%d AND i.cd_id=%d ORDER BY cdd_sort_no', array( $post_ID->ID, $cd_id ) ), 'ARRAY_A' );

	if ( ! empty( $now_dtbs_item ) ) {

		foreach ( $now_dtbs_item as $item_var ) {

			if ( ! empty( $dtbs_list[ $item_var['cdi_id'] ]['cdi_style'] ) ) {
				// 現在表示対象になっているエリアの項目を取得
				switch ( $dtbs_list[ $item_var['cdi_id'] ]['cdi_style'] ) {
					case 'pulldown':
					case 'radio':
						$now_item_list[ $item_var['cdi_id'] ] = $item_var['cdd_id'];
						break;

					default:
						$now_item_list[ $item_var['cdi_id'] ][ $item_var['cdd_id'] ] = $item_var['cdd_id'];
						break;
				}
			}
		}
	}

	$child_tree = dtbs_get_child_tree( $params['args']['cd_id'] );
	if ( ! empty( $child_tree ) ) {
		foreach ( $child_tree as $current_id => $child_vals ) {
			foreach ( $child_vals as $val ) {
				$current_tree[ $val ] = $current_id;
			}
		}
	}

	$added_item_column_list = dtbs_item_all_column_list( $params['args']['cd_id'] );

	foreach ( $added_item_column_list as $cdi_id => $added ) {
		if ( 0 == $added['cdi_current_id'] ) {
			$added_item_list[ $cdi_id ] = dtbs_detail_list( $cdi_id );

		} else {

			if ( isset( $now_item_list[ $added['cdi_current_id'] ] ) && $now_item_list[ $added['cdi_current_id'] ] > 0 ) {
				$child_cdi_id = $now_item_list[ $added['cdi_current_id'] ];
			} elseif ( isset( $added_item_list[ $added['cdi_current_id'] ] ) ) {
				$child_cdi_id = key( $added_item_list[ $added['cdi_current_id'] ] );
			} else {
				$child_cdi_id = 0;
			}

			if ( $child_cdi_id > 0 ) {
				$added_item_list[ $cdi_id ] = dtbs_detail_child_list( $cdi_id, $child_cdi_id );
			}
		}
	}

	if ( is_array( $dtbs_list ) && count( $dtbs_list ) > 0 ) {
		?>
	<ul class='dtbs_view_area'>
<?php
		foreach ( $dtbs_list as $cdi_id => $val ) {
?>
		<li class="dtbs_item_title"><?php echo esc_html( $val['cdi_title'] ); ?></li>
		<li class="dtbs_item_select">
<?php
			if ( ! empty( $added_item_list[ $cdi_id ] ) && is_array( $added_item_list[ $cdi_id ] ) ) {

				$view_flug = 'y';
				if ( empty( $now_item_list ) && isset( $current_tree[ $cdi_id ] ) ) {
					$view_flug = 'n';
				}

				if ( isset( $added_item_list[ $cdi_id ] ) || isset( $current_tree[ $cdi_id ] ) && $current_tree[ $cdi_id ] ) {

					$child_param = ( isset( $child_tree[ $cdi_id ] ) ) ? ' class="change_current dtbs_item_list cdbtype_' . esc_attr( $val['cdi_style'] ) . '"  data-type="' . esc_attr( $val['cdi_style'] ) . '" id="child_' . $cdi_id . '"' : ' class="dtbs_item_list cdbtype_' . esc_attr( $val['cdi_style'] ) . '" id="child_' . $cdi_id . '"';
				}

				switch ( $val['cdi_style'] ) {
					case 'pulldown':
?>
			<select name="dtbs_added_item_list[<?php echo esc_attr( $cdi_id ); ?>]" <?php echo $child_param; ?>>
				<option value="0"></option>
<?php
						if ( 'y' == $view_flug ) {
							foreach ( $added_item_list[ $cdi_id ] as $cdd_id => $list_val ) {
								$selected = ( isset( $now_item_list[ $cdi_id ] ) && $now_item_list[ $cdi_id ] == $cdd_id ) ? ' selected="selected"' : '';
?>
				<option value="<?php echo $cdd_id; ?>"<?php echo $selected; ?>><?php echo esc_html( dtbs_delete_escape_string( $list_val['cdd_value'] ) ); ?> (<?php echo $list_val['count']; ?>)</option>
<?php
							}
						}
?>
			</select>
<?php
						break;

					case 'radio':
?>
			<div id="child_<?php echo $cdi_id; ?>"<?php echo $child_param; ?>>
<?php
						if ( 'y' == $view_flug ) {
							foreach ( $added_item_list[ $cdi_id ] as $cdd_id => $list_val ) {
								$selected = ( isset( $now_item_list[ $cdi_id ] ) && $now_item_list[ $cdi_id ] == $cdd_id ) ? ' checked="checked"' : '';
?>
				<label><input type="radio" name="dtbs_added_item_list[<?php echo $cdi_id; ?>]" value="<?php echo $cdd_id; ?>" class="dtbs_detail_<?php echo $cdi_id; ?>"<?php echo $selected; ?>><span><i></i><?php echo esc_html( dtbs_delete_escape_string( $list_val['cdd_value'] ) ); ?><span class="dtbs_item_select_length">(<?php echo number_format( $list_val['count'] ); ?>)</span></span></label>
<?php
							}
						}
?>
			</div>
<?php
						break;

					default:
?>
			<div id="child_<?php echo $cdi_id; ?>"<?php echo $child_param; ?>>
<?php
						if ( 'y' == $view_flug ) {
							foreach ( $added_item_list[ $cdi_id ] as $cdd_id => $list_val ) {
								$selected = ( isset( $now_item_list[ $cdi_id ][ $cdd_id ] ) ) ? ' checked="checked"' : '';
?>
				<label><input type="checkbox" name="dtbs_added_item_list[<?php echo $cdi_id; ?>][<?php echo $cdd_id; ?>]" value="<?php echo $cdd_id; ?>" class="dtbs_detail_<?php echo $cdi_id; ?>"<?php echo $selected; ?>><span><i></i><?php echo esc_html( dtbs_delete_escape_string( $list_val['cdd_value'] ) ); ?><span class="dtbs_item_select_length">(<?php echo number_format( $list_val['count'] ); ?>)</span></span></label>
<?php
							}
						}
?>
			</div>
<?php
						break;
				}
			}
?>
		</li>
		<li class="dtbs_item_add_area">
			<ul id="dtbs_item_add_area<?php echo esc_attr( $cdi_id ); ?>" data-style="<?php echo esc_attr( $val['cdi_style'] ); ?>"></ul>
			<?php $style = ( isset( $current_tree[ $cdi_id ] ) && ( ! isset( $now_item_list[ $current_tree[ $cdi_id ] ] ) || ! isset( $now_item_list[ $cdi_id ] ) ) ) ? ' style="display:none;"' : ''; ?>
			<span class="item_text_plus" id="item_text_area<?php echo esc_attr( $cdi_id ); ?>" data-minus_char="<?php _e( 'Cancel', DTBS_SCNAME ); ?>"<?php echo esc_attr( $style ); ?>><?php _e( 'Add', DTBS_SCNAME ); ?></span>
		</li>
<?php } ?>
	</ul>
	<input type="hidden" name="cd_id" value="<?php echo esc_attr( $params['args']['cd_id'] ); ?>">
<?php
		wp_nonce_field( 'dtbs_post_item_action', 'dtbs_post_item_data' );
	}
}


?>
