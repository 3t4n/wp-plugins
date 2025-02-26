<?php
/**
 * 項目の登録・更新・削除系処理
 *
 * @param array $_POST 管理画面上からPOSTされた内容を元に、データベースに登録・更新・削除を行う
 */
if ( ! function_exists( 'dtbs_item_mng' ) ) {
	function dtbs_item_mng() {

		$cd_id = $cdi_id = $cdd_current_id = 0;

		if ( isset( $_POST['dtbs_item'] ) && check_admin_referer( 'dtbs_post_type_nonce_action', 'dtbs_item_update_field' ) ) {

			if ( isset( $_POST['cdn_list'] ) && is_numeric( $_POST['cdn_list'] ) && $_POST['cdn_list'] > 0 ) {
				$cd_id = sanitize_key( $_POST['cdn_list'] );
			}
			if ( isset( $_POST['cdin_list'] ) && is_numeric( $_POST['cdin_list'] ) && $_POST['cdin_list'] > 0 ) {
				$cdi_id = sanitize_key( $_POST['cdin_list'] );
			}
			if ( isset( $_POST['cdd_current_id'] ) && is_numeric( $_POST['cdd_current_id'] ) && $_POST['cdd_current_id'] > 0 ) {
				$cdd_current_id = sanitize_key( $_POST['cdd_current_id'] );
			}

			$res = dtbs_item_update( $_POST );

			if ( $res ) { ?>
				<div class="updated"><p><strong><?php _e( 'Updated', DTBS_SCNAME ); ?></strong></p></div>
				<?php
			}
		}

		$site_params = array( 'cdd_current_id' => $cdd_current_id );
		wp_localize_script( 'detabess_admin', 'item_params', $site_params );

		$dtbs_list = dtbs_get_list();
		?>

<div class="wrap">
	<h1><?php _e( 'detabess Item Edit', DTBS_SCNAME ); ?></h1>
	<p><?php _e( 'You can resister and edit list of items', DTBS_SCNAME ); ?></p>

<?php if ( is_array( $dtbs_list ) && count( $dtbs_list ) > 0 ) { ?>

	<form class="" method="post" action="">
		<div class="dtbs-edit-header" id="cdn_area">
			<ul class="dtbs-edit-header_list">
				<li class="dtbs-edit-header_item">
					<dl>
						<dt><?php _e( 'detabess', DTBS_SCNAME ); ?></dt>
						<dd>
							<select name="cdn_list" id="cdn_list">
<?php
foreach ( $dtbs_list as $no => $val ) {
	if ( $val['cd_id'] == $cd_id || 0 == $cd_id ) {
		$selsected = ' selected';
		$cd_id     = $val['cd_id'];
	} else {
		$selsected = '';
	}
	?>
								<option value="<?php echo esc_attr( $val['cd_id'] ); ?>"<?php echo esc_attr( $selsected ); ?>><?php echo esc_attr( dtbs_delete_escape_string( $val['cd_title'] ) ); ?></option>
	<?php
}
?>
							</select>
						</dd>
					</dl>
				</li>
				<li class="dtbs-edit-header_item">
					<dl>
						<dt><?php _e( 'List', DTBS_SCNAME ); ?></dt>
						<dd>
							<select name="cdin_list" id="cdin_list" class="cdin_list">
<?php
$cdi_list = dtbs_get_cdi_list( $cd_id, 'array' );

if ( is_array( $cdi_list ) && count( $cdi_list ) > 0 ) {
	foreach ( $cdi_list as $no => $val ) {
		$selsected = ( $no == $cdi_id ) ? ' selected' : '';
?>
								<option value="<?php echo esc_attr( $no ); ?>"<?php echo $selsected; ?>><?php echo esc_attr($val); ?></option>
<?php
		if ( $cdi_id <= 0 ) {
			$cdi_id = $no;
		}
	}
}
?>
							</select>
						</dd>
					</dl>
				</li>
			</ul>
		</div>

		<div class="dtbs-edit-contents">
			<h2 class="dtbs-edit-contents_heading"></h2>
<?php
$cdd_list = dtbs_get_cdd_list( $cdi_id, 'array', 'y' );

if ( ! empty( $cdd_list['list'] ) && count( $cdd_list['list'] ) > 0 ) {
	foreach ( $cdd_list['list'] as $current_id => $cdd_line ) {
		if ( $cdd_current_id == $current_id ) {
			echo dtbs_get_item_list_area( $cdd_line );
			break;
		}
	}
}
?>
			<p><?php _e( 'Deletion of non-zero items is not recommended, as deletion will cause the item to be excluded from the search.', DTBS_SCNAME ); ?><br />
			<?php _e( 'The number in parentheses () is the number of items that have been registered.', DTBS_SCNAME ); ?></p>

			<p class="dtbs-edit-button"><input type="submit" class="button-primary" id="dtbs_item_edit_submit" name="dtbs_item_edit_submit" value="<?php _e( 'change', DTBS_SCNAME ); ?>" /></p>
			<?php wp_nonce_field( 'dtbs_post_type_nonce_action', 'dtbs_item_update_field' ); ?>
		</div>
	</form>
<?php
		} else {
?>

	<p><?php _e( 'There are no items registered.', DTBS_SCNAME ); ?></p>

<?php
		}
?>
</div>
<?php
	}
}
?>
