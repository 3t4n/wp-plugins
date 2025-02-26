<?php // phpcs:ignore
/**
 * Easy Replace Image parts.
 *
 * @package eri
 */

$key      = filter_input( INPUT_GET, 'key', FILTER_DEFAULT );
$current  = max( 1, filter_input( INPUT_GET, 'paged', FILTER_VALIDATE_INT ) );
$id       = filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT ); // phpcs:ignore
$eri_cron = get_option( 'eri_cron' );
?>
<div class="wrap eri-feature">
	<h1 class="plugin-title">
		<span class="dashicons dashicons-format-gallery"></span>
		<?php esc_html_e( 'Easy Replace Image', 'eri' ); ?>
	</h1>

	<p>
		<?php esc_html_e( 'This plugin allows you to replace an attachment file by uploading another image or by downloading one from a specified URL, without deleting the attachment. The plugin handles the sub-sizes generation and the attachment metadata update, and you will see the result right away.', 'eri' ); ?>
	</p>

	<div class="options-boxes">
		<div id="eri-settings1" class="type-search">
			<h3><?php esc_html_e( 'Attachment Search', 'eri' ); ?></h3>
			<form id="eri-frm-search" method="get">
				<input type="hidden" name="page" value="easy-replace-image-settings">
				<input type="hidden" name="paged" id="eri-paged" value="<?php echo esc_attr( $current ); ?>">
				<input type="hidden" name="id" id="eri-id" value="<?php echo esc_attr( $id ); ?>">
				<input type="text" name="key" value="<?php echo esc_attr( $key ); ?>" class="first" onchange="eriResetImageItem()">
				<button type="submit" class="button action second"><span class="dashicons dashicons-search"></span> <?php esc_html_e( 'Search', 'eri' ); ?></button>
			</form>
			<p><?php esc_html_e( 'Search here for a specific image that you want to replace. The search will match the attachment ID, title, guid or image metadata.', 'eri' ); ?></p>

			<h3 class="search-result-title"><?php esc_html_e( 'Search results', 'eri' ); ?></h3>
			<?php
			if ( ! empty( $key ) ) {
				global $wpdb;
				$per_page = 5; // phpcs:ignore
				$key      = trim( $key );

				$query  = 'SELECT p.ID, p.post_title, p.guid FROM ' . $wpdb->prefix . 'posts AS p INNER JOIN ' . $wpdb->prefix . 'postmeta AS m ON ( m.post_id = p.ID AND p.post_type = %s )';
				$args   = [];
				$args[] = 'attachment';
				$query .= ' WHERE ( p.post_title LIKE %s OR p.post_name LIKE %s OR p.ID = %d OR p.guid LIKE %s OR m.meta_value LIKE %s ) AND p.post_mime_type LIKE %s ';
				$args[] = '%' . $wpdb->esc_like( $key ) . '%';
				$args[] = '%' . $wpdb->esc_like( $key ) . '%';
				$args[] = $key;
				$args[] = '%' . $wpdb->esc_like( $key ) . '%';
				$args[] = '%' . $wpdb->esc_like( $key ) . '%';
				$args[] = '%' . $wpdb->esc_like( 'image/' ) . '%';
				$total  = $wpdb->get_var( str_replace( 'p.ID, p.post_title, p.guid', 'count( distinct p.ID )', $wpdb->prepare( $query, $args ) ) ); // phpcs:ignore

				$query .= ' GROUP BY p.ID ORDER BY p.ID DESC LIMIT %d,%d';
				$args[] = ( $current - 1 ) * $per_page;
				$args[] = $per_page;
				$result = $wpdb->get_results( $wpdb->prepare( $query, $args ) ); // phpcs:ignore

				if ( ! empty( $result ) ) {
					echo self::pagination( $total, $per_page, 4 ); // phpcs:ignore
					?>
					<p>
						<?php
						echo wp_kses_post(
							// Translators: %1$d - number of items shown, %2$d - total items.
							sprintf( __( 'Showing %1$d items out of %2$d', 'eri' ), count( $result ), $total )
						);
						?>
					</p>
					<p><?php esc_html_e( 'Click the item from the list below to select it for replacement.', 'eri' ); ?></p>

					<ul class="search-result-wrap">
						<?php foreach ( $result as $row ) : ?>
							<?php $class = ( $id === (int) $row->ID ) ? ' is-selected' : ''; ?>
							<li class="search-result<?php echo esc_attr( $class ); ?>"
								id="eri-search-result-<?php echo (int) $row->ID; ?>"
								data-id="<?php echo (int) $row->ID; ?>"
								onclick="eriSelectImageItem( <?php echo (int) $row->ID; ?> );"
								onkeypress="eriSelectImageItem( <?php echo (int) $row->ID; ?> );"
								title="<?php esc_attr_e( 'Click to select the image', 'eri' ); ?>"
								tabindex="0">
								<div>
									<span class="image">
										<?php echo wp_get_attachment_image ( $row->ID, 'thumbnail', true ); // phpcs:ignore ?>
									</span>
									<span class="info">
										<?php echo esc_html( $row->post_title ); ?>
									</span>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php
				} else {
					esc_html_e( 'No image found.', 'eri' );
				}
			} else {
				esc_html_e( 'No search key applied.', 'eri' );
			}
			?>
		</div>

		<?php
		if ( empty( $id ) ) {
			?>
			<div class="type-eri">
				<h3><?php esc_html_e( 'Easy Replace Image', 'eri' ); ?></h3>
				<div class="placeholder">
					<?php esc_html_e( 'No attachment selected.', 'eri' ); ?>
				</div>
			</div>
			<?php
		} else {
			$post = get_post( $id ); // phpcs:ignore
			self::image_replace_ajax_elements_edit( $post );
		}
		?>

		<div class="type-selected">
			<h3><?php esc_html_e( 'Selected Image', 'eri' ); ?></h3>
			<?php
			if ( empty( $id ) ) {
				?>
				<div class="placeholder">
					<?php esc_html_e( 'No attachment selected.', 'eri' ); ?>
				</div>
				<?php
			} else {
				$url = wp_get_attachment_url( $id );
				?>
				<div class="wp_attachment_image wp-clearfix" id="media-head-<?php echo (int) $id; ?>">
					<p id="thumbnail-head-<?php echo (int) $id; ?>">
						<img class="thumbnail" src="<?php echo esc_url( $url ); ?>?v=<?php echo (int) time(); ?>" style="max-width:100%; display: flex;" alt="">
					</p>
					<div id="media-info-<?php echo (int) $id; ?>" class="media-info">
						<a href="<?php echo esc_url( admin_url( 'post.php?post=' . $post->ID . '&action=edit' ) ); ?>" title="<?php esc_attr_e( 'Click to go to the attachment page', 'eri' ); ?>"><?php esc_html_e( 'ID', 'eri' ); ?> <?php echo (int) $post->ID; ?></a>
						• <b><?php echo esc_html( $post->post_title ); ?></b>
						• <span><?php echo esc_html( $url ); ?></span>
					</div>
					<div id="media-extra-info-<?php echo (int) $id; ?>" class="media-extra-info">
						<?php echo wp_kses_post( self::make_extra_info( [], $id ) ); ?>
					</div>
				</div>
				<?php
			}
			?>
		</div>

		<div id="eri-settings0" class="type-cron">
			<h3><?php esc_html_e( 'Cron Tasks', 'eri' ); ?></h3>
			<form id="eri-frm-cron" method="post">
				<?php wp_nonce_field( 'eri_settings_save', 'eri_settings_nonce' ); ?>
				<label><input type="checkbox" name="eri_cron"<?php checked( true, $eri_cron ); ?>> <?php esc_html_e( 'use replacement cron tasks', 'eri' ); ?></label>
				<p><?php esc_html_e( 'If you enable the cron tasks, the URLs of images you replace will be searched inside the content of posts stored in the database, and string replacement will be attempted for the found references.', 'eri' ); ?></p>
				<?php submit_button(); ?>
			</form>
		</div>
	</div>

	<?php self::show_donate_text(); ?>
</div>
