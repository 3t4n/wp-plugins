<?php
/**
 * Exit if accessed directly.
 *
 * @package brainspace
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Process form submission.
if ( ! empty( $_POST ) && check_admin_referer( 'eapm_export_posts', 'eapm_export_posts_nonce' ) ) {
	update_option( 'wpb-field-settings', serialize( $_POST ) );
	$this->settings = get_option( 'wpb-field-settings' ) ? unserialize( get_option( 'wpb-field-settings' ) ) : array();
}

// Define the default headings and get the post types.
$headings = array(
	'ID',
	'post_author',
	'post_date',
	'post_date_gmt',
	'post_content',
	'post_title',
	'post_excerpt',
	'post_status',
	'comment_status',
	'ping_status',
	'post_password',
	'post_name',
	'to_ping',
	'pinged',
	'post_modified',
	'post_modified_gmt',
	'post_content_filtered',
	'post_parent',
	'guid',
	'menu_order',
	'post_type',
	'post_mime_type',
	'comment_count',
	'filter',
);
$all_post_types = get_post_types( array( 'public' => true ) );

// Retrieve settings or set defaults.
$settings = $this->settings;
$settings['post_types'] = ! empty( $settings['post_types'] ) ? $settings['post_types'] : array( 'post' );
$settings['post_statuses'] = ! empty( $settings['post_statuses'] ) ? $settings['post_statuses'] : array( 'publish' );
$settings['post_keys'] = ! empty( $settings['post_keys'] ) ? $settings['post_keys'] : $headings;
$settings['meta_keys'] = ! empty( $settings['meta_keys'] ) ? $settings['meta_keys'] : array();

// Get the current page URL for form action.
$action_url = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';

// Render HTML.
?>
<form action="<?php echo esc_url( $action_url ); ?>" method="post" class="export-post-meta-form">
	<?php wp_nonce_field( 'eapm_export_posts', 'eapm_export_posts_nonce' ); ?>

	<div class="select-post-type-wrap">
		<p>Select which post types to be included in export:</p>
		<?php if ( ! empty( $all_post_types ) && is_array( $all_post_types ) ) : ?>
			<ul class="select-post-type-list">
				<?php foreach ( $all_post_types as $each_post_type ) : ?>
					<li class="select-post-type-list-item">
						<label>
							<input type="checkbox" name="post_types[]" value="<?php echo esc_attr( $each_post_type ); ?>" <?php echo in_array( $each_post_type, $settings['post_types'] ) ? 'checked="checked"' : ''; ?>>
							<strong><?php echo esc_html( $each_post_type ); ?></strong>
						</label>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>

	<div class="select-post-status-wrap">
		<p>Select which post statuses to be included in export:</p>
		<?php
			$post_statuses = get_post_statuses();
		if ( ! empty( $post_statuses ) && is_array( $post_statuses ) ) :
			?>
			<ul class="select-post-status-list">
				<?php foreach ( $post_statuses as $post_status => $post_status_label ) : ?>
					<li class="select-post-status-list-item">
						<label>
							<input type="checkbox" name="post_statuses[]" value="<?php echo esc_attr( $post_status ); ?>" <?php echo in_array( $post_status, $settings['post_statuses'] ) ? 'checked="checked"' : ''; ?>>
							<strong><?php echo esc_html( $post_status_label ); ?></strong>
						</label>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>

	<div class="select-fields-wrap">
		<p>Which post fields and post meta fields do you wish to export? <strong>(Multiple selection):</strong></p>
		<div class="select-dropdowns-wrap">
			<?php
			$allposts = $this->eapm_get_posts_by_name( $settings['post_types'] ); // Get all posts by selected types.
			$meta_keys = array_filter( $this->eapm_get_meta_keys_array( $allposts ) );
			$temp_array = array();

			foreach ( $meta_keys as $value ) {
				$temp_array = array_unique( array_merge_recursive( $temp_array, $value ), SORT_REGULAR );
			}

			$selected_meta_keys = $settings['meta_keys'];
			$selected_post_fields = $settings['post_keys'];
			?>

			<?php if ( ! empty( $headings ) && is_array( $headings ) ) : ?>
				<select class="post-field-dropbox" multiple="multiple" size="10" name="post_keys[]">
					<?php foreach ( $headings as $field ) : ?>
						<option value="<?php echo esc_attr( $field ); ?>" <?php echo in_array( $field, $selected_post_fields ) ? 'selected="selected"' : ''; ?>>
							<?php echo esc_html( $field ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			<?php endif; ?>

			<?php if ( ! empty( $temp_array ) && is_array( $temp_array ) ) : ?>
				<select class="post-meta-dropbox" multiple="multiple" size="<?php echo count( $temp_array ); ?>" name="meta_keys[]">
					<?php foreach ( $temp_array as $field ) : ?>
						<option value="<?php echo esc_attr( $field ); ?>" <?php echo in_array( $field, $selected_meta_keys ) ? 'selected="selected"' : ''; ?>>
							<?php echo esc_html( $field ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			<?php endif; ?>
		</div>
	</div>

	<div class="save-settings-btn">
		<input type="submit" value="Save settings" class="button">
		<p class="description">Scroll down to view result and download Post CSV file.</p>
	</div>
</form>

<?php

echo '<p class="generate-csv-btn"><a href="' . esc_url( home_url( 'wp-posts-export.csv' ) ) . '" class="button">' . esc_html__( 'Generate CSV file' , 'export-all-post-meta') . '</a></p>';

if ( $settings ) {
	$headings = $settings['post_keys'];
	$array = $this->eapm_get_post_from_settings();

	if ( ! empty( $settings['meta_keys'] ) ) {
		$headings = array_merge( $headings, $settings['meta_keys'] );
	}
	?>

	<table class="widefat post-data-table">
		<thead>
			<tr>
				<?php if ( ! empty( $headings ) && is_array( $headings ) ) : ?>
					<?php foreach ( $headings as $heading_title ) : ?>
						<th><?php echo esc_html( $heading_title ); ?></th>
					<?php endforeach; ?>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php if ( ! empty( $array->posts ) && is_array( $array->posts ) ) : ?>
				<?php foreach ( $array->posts as $row ) : ?>
					<tr>
						<?php foreach ( $settings['post_keys'] as $post_key ) : ?>
							<td><?php echo esc_html( wp_trim_words( $row->$post_key, 50 ) ); ?></td>
						<?php endforeach; ?>

						<?php foreach ( $settings['meta_keys'] as $meta_key ) : ?>
							<td>
								<?php
								$result = maybe_serialize( get_post_meta( $row->ID, $meta_key, true ) );
								if ( is_serialized( $result ) ) {
									$column_arr = maybe_unserialize( $result );
									$string = implode(
										' | ',
										array_filter(
											array_map(
												function ( $v, $k ) {
													if ( is_array( $v ) ) {
														$v = array_filter( $v );
														return $k . '[]=' . implode( ',', $v );
													} else {
														return $k . '=' . $v;
													}
												},
												$column_arr,
												array_keys( $column_arr )
											)
										)
									);
									echo esc_html( $string );
								} else {
									echo esc_html( $result );
								}
								?>
							</td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>

	<?php
	$current_paged = isset( $_GET['paged'] ) ? absint( $_GET['paged'] ) : 1;
	$args = array(
		'base'               => '%_%',
		'format'             => '?paged=%#%',
		'total'              => $array->max_num_pages,
		'current'            => max( 1, $current_paged ),
		'show_all'           => true,
		'prev_next'          => true,
		'prev_text'          => __( '« Previous' , 'export-all-post-meta' ),
		'next_text'          => __( 'Next »' , 'export-all-post-meta' ),
		'type'               => 'plain',
		'add_args'           => true,
		'add_fragment'       => '',
		'before_page_number' => '',
		'after_page_number'  => '',
	);
	echo "<div class='export-post-meta-pagination'>";
	echo wp_kses_post( paginate_links( $args ) );
	echo '</div>';
	?>
	<?php
}
?>
