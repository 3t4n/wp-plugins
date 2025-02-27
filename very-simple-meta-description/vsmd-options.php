<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// add admin options page
function vsmd_menu_page() {
	add_options_page( esc_attr__( 'Meta description', 'very-simple-meta-description' ), esc_attr__( 'Meta description', 'very-simple-meta-description' ), 'manage_options', 'vsmd', 'vsmd_options_page' );
}
add_action( 'admin_menu', 'vsmd_menu_page' );

// add admin settings and such
function vsmd_admin_init() {
	// general section
	add_settings_section( 'vsmd-section-1', esc_attr__( 'General', 'very-simple-meta-description' ), 'vsmd_section_callback_1', 'vsmd' );

	add_settings_field( 'vsmd-field-4', esc_attr__( 'Uninstall', 'very-simple-meta-description' ), 'vsmd_field_callback_4', 'vsmd', 'vsmd-section-1' );
	register_setting( 'vsmd-options', 'vsmd-setting-4', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsmd-field-5', esc_attr__( 'Meta description', 'very-simple-meta-description' ), 'vsmd_field_callback_5', 'vsmd', 'vsmd-section-1' );
	register_setting( 'vsmd-options', 'vsmd-setting-5', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsmd-field-1', esc_attr__( 'Homepage', 'very-simple-meta-description' ), 'vsmd_field_callback_1', 'vsmd', 'vsmd-section-1' );
	register_setting( 'vsmd-options', 'vsmd-setting-1', array('sanitize_callback' => 'sanitize_key') );

	// post and page section
	add_settings_section( 'vsmd-section-2', esc_attr__( 'Post and page', 'very-simple-meta-description' ), 'vsmd_section_callback_2', 'vsmd' );

	add_settings_field( 'vsmd-field-2', esc_attr__( 'Excerpt', 'very-simple-meta-description' ), 'vsmd_field_callback_2', 'vsmd', 'vsmd-section-2' );
	register_setting( 'vsmd-options', 'vsmd-setting-2', array('sanitize_callback' => 'sanitize_key') );

	// category and tag section
	add_settings_section( 'vsmd-section-3', esc_attr__( 'Post category and tag', 'very-simple-meta-description' ), 'vsmd_section_callback_3', 'vsmd' );

	add_settings_field( 'vsmd-field-7', esc_attr__( 'Description', 'very-simple-meta-description' ), 'vsmd_field_callback_7', 'vsmd', 'vsmd-section-3' );
	register_setting( 'vsmd-options', 'vsmd-setting-7', array('sanitize_callback' => 'sanitize_key') );

	// woo section
	if ( class_exists( 'woocommerce' ) ) {
		add_settings_section( 'vsmd-section-4', esc_attr__( 'Product', 'very-simple-meta-description' ), 'vsmd_section_callback_4', 'vsmd' );

		add_settings_field( 'vsmd-field-3', esc_attr__( 'Product short description', 'very-simple-meta-description' ), 'vsmd_field_callback_3', 'vsmd', 'vsmd-section-4' );
		register_setting( 'vsmd-options', 'vsmd-setting-3', array('sanitize_callback' => 'sanitize_key') );

		add_settings_section( 'vsmd-section-5', esc_attr__( 'Product category and tag', 'very-simple-meta-description' ), 'vsmd_section_callback_5', 'vsmd' );

		add_settings_field( 'vsmd-field-6', esc_attr__( 'Description', 'very-simple-meta-description' ), 'vsmd_field_callback_6', 'vsmd', 'vsmd-section-5' );
		register_setting( 'vsmd-options', 'vsmd-setting-6', array('sanitize_callback' => 'sanitize_key') );
	}
}
add_action( 'admin_init', 'vsmd_admin_init' );

// section callbacks
function vsmd_section_callback_1() {
	echo '<ul>';
	echo '<li>'.esc_attr__( 'Search engines such as Google and Bing will use the meta description when displaying search results.', 'very-simple-meta-description' ).'</li>';
	echo '<li>'.esc_attr__( 'The meta description should reflect the content of your post or page.', 'very-simple-meta-description' ).'</li>';
	echo '<li>'.esc_attr__( 'Using the same meta description throughout your website is not recommended.', 'very-simple-meta-description' ).'</li>';
	echo '</ul>';
}

function vsmd_section_callback_2() {
	echo '<ul>';
	echo '<li>'.esc_attr__( 'You can write a summary of your post or page content in the "Excerpt" box of the editor.', 'very-simple-meta-description' ).'</li>';
	echo '<li>'.esc_attr__( 'This will be used as meta description for that post or page.', 'very-simple-meta-description' ).'</li>';
	echo '<li>'.esc_attr__( 'The summary of a static homepage will override the meta description from above.', 'very-simple-meta-description' ).'</li>';
	echo '</ul>';
}

function vsmd_section_callback_3() {
	echo '<ul>';
	echo '<li>'.esc_attr__( 'You can write a description of your category or tag page in the "Description" box.', 'very-simple-meta-description' ).'</li>';
	echo '<li>'.esc_attr__( 'This will be used as meta description for that category or tag page.', 'very-simple-meta-description' ).'</li>';
	echo '</ul>';
}

function vsmd_section_callback_4() {
	echo '<ul>';
	echo '<li>'.esc_attr__( 'You can write a description of your product in the "Product short description" box of the editor.', 'very-simple-meta-description' ).'</li>';
	echo '<li>'.esc_attr__( 'This will be used as meta description for that product.', 'very-simple-meta-description' ).'</li>';
	echo '</ul>';
}

function vsmd_section_callback_5() {
	echo '<ul>';
	echo '<li>'.esc_attr__( 'You can write a description of your category or tag page in the "Description" box.', 'very-simple-meta-description' ).'</li>';
	echo '<li>'.esc_attr__( 'This will be used as meta description for that category or tag page.', 'very-simple-meta-description' ).'</li>';
	echo '</ul>';
}

// general section - field callbacks
function vsmd_field_callback_4() {
	$value = get_option( 'vsmd-setting-4' );
	?>
	<input type='hidden' name='vsmd-setting-4' value='no'>
	<label><input type='checkbox' name='vsmd-setting-4' <?php checked( esc_attr($value), 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Do not delete settings when uninstalling plugin.', 'very-simple-meta-description' ); ?></label>
	<?php
}

function vsmd_field_callback_5() {
	$value = get_option( 'vsmd-setting-5' );
	$count = mb_strlen( $value, 'UTF-8' );
	?>
	<textarea name='vsmd-setting-5' rows='5' cols='50' maxlength='500' style='min-width:50%;'><?php echo esc_attr($value); ?></textarea>
	<?php
	if ( ($count > 160) || ($count < 120) ) {
		$counter = '<span style="color:red;">'.esc_attr($count).'</span>';
	} else {
		$counter = '<span style="color:green;">'.esc_attr($count).'</span>';
	}
	?>
	<p><?php printf( esc_attr__( 'The length of this meta description is %s characters.', 'very-simple-meta-description' ), $counter ); ?></p>
	<p><?php esc_attr_e( 'The recommended length is roughly between 120 and 160 characters.', 'very-simple-meta-description' ); ?></p>
	<?php
}

function vsmd_field_callback_1() {
	$value = get_option( 'vsmd-setting-1' );
	?>
	<input type='hidden' name='vsmd-setting-1' value='no'>
	<label><input type='checkbox' name='vsmd-setting-1' <?php checked( esc_attr($value), 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Use this meta description for homepage only.', 'very-simple-meta-description' ); ?></label>
	<?php
}

// post and page section - field callbacks
function vsmd_field_callback_2() {
	$value = get_option( 'vsmd-setting-2' );
	?>
	<input type='hidden' name='vsmd-setting-2' value='no'>
	<label><input type='checkbox' name='vsmd-setting-2' <?php checked( esc_attr($value), 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Use as meta description.', 'very-simple-meta-description' ); ?></label>
	<?php
}

// category and tag section - field callbacks
function vsmd_field_callback_7() {
	$value = get_option( 'vsmd-setting-7' );
	?>
	<input type='hidden' name='vsmd-setting-7' value='no'>
	<label><input type='checkbox' name='vsmd-setting-7' <?php checked( esc_attr($value), 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Use as meta description.', 'very-simple-meta-description' ); ?></label>
	<?php
}

// woo section - field callbacks
function vsmd_field_callback_3() {
	$value = get_option( 'vsmd-setting-3' );
	?>
	<input type='hidden' name='vsmd-setting-3' value='no'>
	<label><input type='checkbox' name='vsmd-setting-3' <?php checked( esc_attr($value), 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Use as meta description.', 'very-simple-meta-description' ); ?></label>
	<?php
}

function vsmd_field_callback_6() {
	$value = get_option( 'vsmd-setting-6' );
	?>
	<input type='hidden' name='vsmd-setting-6' value='no'>
	<label><input type='checkbox' name='vsmd-setting-6' <?php checked( esc_attr($value), 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Use as meta description.', 'very-simple-meta-description' ); ?></label>
	<?php
}

// display admin options page
function vsmd_options_page() {
?>
<div class="wrap">
	<h1><?php esc_attr_e( 'VS Meta Description', 'very-simple-meta-description' ); ?></h1>
	<form action="options.php" method="POST">
		<?php settings_fields( 'vsmd-options' );
		do_settings_sections( 'vsmd' );
		submit_button(); ?>
	</form>
</div>
<?php
}
