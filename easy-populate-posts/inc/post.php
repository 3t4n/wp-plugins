<?php
/**
 * Easy Populate Posts post.
 *
 * @package spp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<div>
	<h3><?php esc_html_e( 'Post', 'spp' ); ?></h3>

	<h4><?php esc_html_e( 'Maximum', 'spp' ); ?></h4>
	<div class="row-span number-text">
		<input type="number" name="spp[max_number]" id="spp_max_number" value="<?php echo esc_attr( self::$settings['max_number'] ); ?>" size="15">
		<em><?php esc_html_e( 'how many to generate', 'spp' ); ?></em>
	</div>

	<h4><?php esc_html_e( 'Type', 'spp' ); ?></h4>
	<select name="spp[post_type]" id="spp_post_type">
		<?php if ( ! empty( self::$allowed_post_types ) ) : ?>
			<?php foreach ( self::$allowed_post_types as $k => $v ) : ?>
				<option value="<?php echo esc_attr( $k ); ?>"<?php selected( $k, self::$settings['post_type'] ); ?>><?php echo esc_attr( $v ); ?> (<?php echo esc_attr( $k ); ?>)</option>
			<?php endforeach; ?>
		<?php endif; ?>
	</select>

	<h4><?php esc_html_e( 'Author', 'spp' ); ?></h4>
	<div class="row-span number-text">
		<input type="number" name="spp[post_author]" id="spp_post_author" value="<?php echo esc_attr( self::$settings['post_author'] ); ?>" size="15" placeholder="<?php esc_attr_e( 'Author ID', 'spp' ); ?>">
		<em><?php esc_html_e( 'leave empty or 0 to use the current user', 'spp' ); ?></em>
	</div>

	<h4><?php esc_html_e( 'Parent', 'spp' ); ?></h4>
	<div class="row-span number-text">
		<input type="number" name="spp[post_parent]" id="spp_post_parent" value="<?php echo esc_attr( self::$settings['post_parent'] ); ?>" size="15" placeholder="<?php esc_attr_e( 'Parent ID', 'spp' ); ?>">
		<em><?php esc_html_e( 'for hierarchical type only', 'spp' ); ?></em>
	</div>

	<h4><?php esc_html_e( 'Date', 'spp' ); ?></h4>
	<select name="spp[date_type]" id="spp_date_type">
		<option value="0"<?php selected( 0, self::$settings['date_type'] ); ?>><?php esc_attr_e( 'random', 'spp' ); ?></option>
		<option value="3"<?php selected( 3, self::$settings['date_type'] ); ?>><?php esc_attr_e( 'specific date & status', 'spp' ); ?></option>
		<option value="1"<?php selected( 1, self::$settings['date_type'] ); ?>><?php esc_attr_e( 'in the past', 'spp' ); ?></option>
		<option value="2"<?php selected( 2, self::$settings['date_type'] ); ?>><?php esc_attr_e( 'in the future', 'spp' ); ?></option>
	</select>
	<div id="spp_specific_date_wrap"
		<?php if ( 3 !== (int) self::$settings['date_type'] ) : ?>
		style="display:none;"
		<?php endif; ?>>
		<div class="row-span two-one medium">
			<em><?php esc_html_e( 'date', 'spp' ); ?></em>
			<em><?php esc_html_e( 'hour', 'spp' ); ?></em>
			<input type="date" name="spp[specific_date]" id="spp_specific_date" value="<?php echo esc_attr( self::$settings['specific_date'] ); ?>" pattern="\d{4}-\d{2}-\d{2}" size="15" placeholder="<?php echo esc_attr( gmdate( 'Y-m-d' ) ); ?>">
			<input type="time" name="spp[specific_hour]" id="spp_specific_hour" value="<?php echo esc_attr( self::$settings['specific_hour'] ); ?>" size="6" placeholder="<?php echo esc_attr( gmdate( 'H:i' ) ); ?>">
		</div>
	</div>

	<h4><?php esc_html_e( 'Status', 'spp' ); ?></h4>
	<p id="spp_random_date_text0"<?php if ( 0 !== (int) self::$settings['date_type'] ) : ?>
		style="display:none;"
		<?php endif; ?>>
		<em><?php esc_html_e( 'will set a random status, correlated with the publish date', 'spp' ); ?></em>
	</p>
	<p id="spp_random_date_text3"<?php if ( 3 !== (int) self::$settings['date_type'] ) : ?>
		style="display:none;"
		<?php endif; ?>>
		<select name="spp[specific_status]" id="spp_specific_status">
			<option value=""<?php selected( '', self::$settings['specific_status'] ); ?>><?php esc_attr_e( 'random', 'spp' ); ?></option>
			<?php if ( ! empty( self::$allowed_post_statuses ) ) : ?>
				<?php foreach ( self::$allowed_post_statuses as $k => $v ) : ?>
					<option value="<?php echo esc_attr( $k ); ?>"<?php selected( $k, self::$settings['specific_status'] ); ?>><?php echo esc_attr( $v ); ?> (<?php echo esc_attr( $k ); ?>)</option>
				<?php endforeach; ?>
			<?php endif; ?>
		</select>
	</p>

	<p id="spp_random_date_text1"<?php if ( 1 !== (int) self::$settings['date_type'] ) : ?>
		style="display:none;"
		<?php endif; ?>>
		<em>
			<?php
			// Translators: %s - default value.
			echo esc_html( sprintf( __( 'the default value is %s', 'spp' ), __( 'published', 'spp' ) ) );
			?>
		</em>
	</p>
	<p id="spp_random_date_text2"<?php if ( 2 !== (int) self::$settings['date_type'] ) : ?>
		style="display:none;"
		<?php endif; ?>>
		<em>
			<?php
			// Translators: %s - default value.
			echo esc_html( sprintf( __( 'the default value is %s', 'spp' ), __( 'scheduled', 'spp' ) ) );
			?>
		</em>
	</p>

	<hr>
	<?php $cl = ! empty( self::$settings['cleanup_on_deactivate'] ) ? 'spp-will-cleanup' : ''; ?>
	<div id="spp-will-cleanup" class="fixed <?php echo esc_attr( $cl ); ?>">
		<label>
			<input type="checkbox" name="spp[cleanup_on_deactivate]" id="spp_cleanup_on_deactivate" <?php checked( self::$settings['cleanup_on_deactivate'], 1 ); ?> onclick="toggleCleanup();"> <b><?php esc_html_e( 'cleanup on deactivation', 'spp' ); ?></b> (<?php esc_html_e( 'the content populated with this plugin will be removed when the plugin get deactivates, including the images', 'spp' ); ?>)
		</label>
	</div>
</div>
