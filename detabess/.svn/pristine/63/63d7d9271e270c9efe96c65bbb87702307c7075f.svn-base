<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * デタベスのトップページかどうかを確認
 */
function dtbs_check_current_page_list() {
	$current_screen = get_current_screen();
	if ( ! is_object( $current_screen ) || 'toplevel_page_detabess' !== $current_screen->base ) {
		return;
	}
	if ( wp_doing_ajax() ) {
		return;
	}
}
add_action( 'admin_enqueue_scripts', 'dtbs_check_current_page_list' );


/**
 * デタベスの登録リスト一覧メニューを生成
 */
function dtbs_list() {
	// 現在登録されているリストを取得
	$dtbs_list = dtbs_get_list();

	// 表示エリアのリストを取得
	$target_area = dtbs_get_target_area();

	?>
<div class="wrap">
 <div id="icon-users" class="icon32"><br /></div>
	<h1 class="wp-heading-inline"><?php _e( 'Registration List', DTBS_SCNAME ); ?></h1>
	<a href="<?php echo admin_url( 'admin.php?page=dtbs_reg' ); ?>" class="page-title-action aria-button-if-js" role="button" aria-expanded="false"><?php _e( 'Add', DTBS_SCNAME ); ?></a>
	<hr class="wp-header-end">

	<?php if ( ! empty( $dtbs_list ) ) { ?>
	<table class="wp-list-table widefat fixed striped ">
		<thead>
			<tr>
				<th scope="col" id ='wp_dtbs_id'>ID</th>
				<th scope="col" id ='wp_dtbs_title'><?php _e( 'title', DTBS_SCNAME ); ?></th>
				<th scope="col" id ='wp_dtbs_target'><?php _e( 'Setting Target', DTBS_SCNAME ); ?></th>
			</tr>
		</thead>
			<tbody id="the-list">
		<?php	foreach ( $dtbs_list as $no => $val ) { ?>
					<tr class="no-items">
						<td class="colspanchange"><a href="<?php echo admin_url( 'admin.php?page=dtbs_reg&cd_id=' . dtbs_delete_escape_string( $val['cd_id'] ) ); ?>"><?php echo dtbs_delete_escape_string( $val['cd_id'] ); ?></a></td>
						<td class="colspanchange"><?php echo esc_html( dtbs_delete_escape_string( $val['cd_title'] ) ); ?></td>
						<td class="colspanchange">
							<ul>
							<?php
							if ( isset( $val['dtbs_target'] ) ) {
								foreach ( $target_area as $area => $area_val ) {
									if ( in_array( $area, $val['dtbs_target'] ) ) {
										?>
								<li><?php echo esc_html( dtbs_delete_escape_string( $area_val ) ); ?></li>
										<?php
									}
								}
							}
							?>
							</ul>
						</td>
				</tr>
	<?php	} ?>
		</tbody>
	</table>

		<?php
	} else {
		_e( 'No registered detabess', DTBS_SCNAME );
	}
	?>
</div>
	<?php
}
?>