<?php
add_action( 'admin_menu', 'scrolltotop_admin_menu' );

function scrolltotop_admin_menu() {
	$settings = add_options_page( esc_html__( 'scrollToTop Settings', 'scrolltotop' ), 'scrollToTop', 'manage_options', 'scrolltotop_settings_page', 'scrolltotop_settings' );
	if ( ! $settings ) {
		return;
	}

	add_action( 'load-' . $settings, 'scrolltotop_admin_styles' );
}

function scrolltotop_admin_styles() {
	global $global_scrolltotop_version, $global_scrolltotop_dir_url;
	wp_enqueue_style( 'scrolltotop', $global_scrolltotop_dir_url . 'assets/css/admin-styles.min.css', array(), $global_scrolltotop_version );
	wp_enqueue_script( 'scrolltotop', $global_scrolltotop_dir_url . 'assets/js/admin-scripts.min.js', array( 'jquery' ), $global_scrolltotop_version );
	wp_enqueue_script( 'hc-sticky', $global_scrolltotop_dir_url . 'assets/js/hc-sticky.min.js', array( 'jquery' ), $global_scrolltotop_version );
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker-alpha', $global_scrolltotop_dir_url . 'assets/js/wp-color-picker-alpha.min.js', array(
		'wp-color-picker'
	), '1.0.0', true );
}

add_action( 'admin_init', 'scrolltotop_register_settings' );

function scrolltotop_register_settings() {
	register_setting( 'scrolltotop_settings', 'scrolltotop_plugin_settings', 'scrolltotop_plugin_settings_validate' );
}

function scrolltotop_settings() {
	global $global_scrolltotop_version;
	?>
    <div class="wrap sarvarov-wrap">

        <h2 class="scrolltotop-title"><?php esc_html_e( 'scrollToTop Settings', 'scrolltotop' ); ?> <span
                    class="scrolltotop-version">v<?= $global_scrolltotop_version ?></span></h2>

        <section class="plugin-settings" role="main">

            <form method="post" action="options.php">
				<?php settings_fields( 'scrolltotop_settings' ); ?>
				<?php do_settings_sections( 'scrolltotop' ); ?>
				<?php submit_button(); ?>
            </form>

			<?php require_once plugin_dir_path( __FILE__ ) . 'scrolltotop-admin-sidebar.php'; ?>

            <div id="loader" class="loader loader-inprogress">
                <div class="loader-activity"></div>
                <noscript>
                    <style>#loader {
                            display: none !important;
                        }</style>
                </noscript>
            </div>

        </section>

    </div>

	<?php
}

add_action( 'admin_init', 'scrolltotop_setting_sections_fields' );

function scrolltotop_setting_sections_fields() {
	// general settings
	add_settings_section( 'stt_general', esc_html__( 'General Settings', 'scrolltotop' ), '__return_false', 'scrolltotop' );
	add_settings_field( 'stt_mode', esc_html__( 'Mode', 'scrolltotop' ), 'stt_mode_field', 'scrolltotop', 'stt_general' );
    add_settings_field( 'stt_scroll_offset', esc_html__( 'Scroll offset', 'scrolltotop' ), 'stt_scroll_offset_field', 'scrolltotop', 'stt_general' );
    add_settings_field( 'stt_scroll_to', esc_html__( 'Scroll to value/element', 'scrolltotop' ), 'stt_scroll_to_field', 'scrolltotop', 'stt_general' );

    // bar settings
	add_settings_section( 'stt_bar_settings', esc_html__( 'Bar Settings', 'scrolltotop' ), '__return_false', 'scrolltotop' );
	add_settings_field( 'stt_bar_position', esc_html__( 'Position', 'scrolltotop' ), 'stt_bar_position_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_element_position', esc_html__( 'Element position', 'scrolltotop' ), 'stt_bar_element_position_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_width', esc_html__( 'Width', 'scrolltotop' ), 'stt_bar_width_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_opacity', esc_html__( 'Opacity', 'scrolltotop' ), 'stt_bar_opacity_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_top_offset', esc_html__( 'Top offset', 'scrolltotop' ), 'stt_bar_top_offset_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_horizontal_offset', esc_html__( 'Horizontal offset', 'scrolltotop' ), 'stt_bar_horizontal_offset_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_arrow_icon', esc_html__( 'Arrow icon', 'scrolltotop' ), 'stt_bar_arrow_icon_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_background_color', esc_html__( 'Background color & opacity', 'scrolltotop' ), 'stt_bar_background_color_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_text', esc_html__( 'Text', 'scrolltotop' ), 'stt_bar_text_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_text_distance', esc_html__( 'Distance between text & arrow', 'scrolltotop' ), 'stt_bar_text_distance_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_fade_duration', esc_html__( 'Fade effect duration', 'scrolltotop' ), 'stt_bar_fade_duration_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_allow_back', esc_html__( 'Back to bottom', 'scrolltotop' ), 'stt_bar_allow_back_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_arrow_rotate_speed', esc_html__( 'Arrow rotate speed', 'scrolltotop' ), 'stt_bar_arrow_rotate_speed_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_hover_transition', esc_html__( 'Smooth hover duration', 'scrolltotop' ), 'stt_bar_hover_transition_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_text_offset', esc_html__( 'Elements offset', 'scrolltotop' ), 'stt_bar_text_offset_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_color', esc_html__( 'Elements color & opacity', 'scrolltotop' ), 'stt_bar_color_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_arrow_size', esc_html__( 'Arrow size', 'scrolltotop' ), 'stt_bar_arrow_size_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_caption_size', esc_html__( 'Text size', 'scrolltotop' ), 'stt_bar_caption_size_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_caption_position', esc_html__( 'Text position', 'scrolltotop' ), 'stt_bar_caption_position_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_caption_font', esc_html__( 'Text font', 'scrolltotop' ), 'stt_bar_caption_font_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_make_smaller', esc_html__( 'Make smaller', 'scrolltotop' ), 'stt_bar_make_smaller_field', 'scrolltotop', 'stt_bar_settings' );
	add_settings_field( 'stt_bar_hide', esc_html__( 'Hide on small devices', 'scrolltotop' ), 'stt_bar_hide_field', 'scrolltotop', 'stt_bar_settings' );

	// transformed button
	add_settings_field( 'stt_bar_transformed_size', esc_html__( 'Transformed bar size', 'scrolltotop' ), 'stt_bar_transformed_size_field', 'scrolltotop', 'stt_bar_settings', array( 'class' => 'stt-transformed' ) );
	add_settings_field( 'stt_bar_transformed_horizontal_position', esc_html__( 'Transformed bar horizontal position', 'scrolltotop' ), 'stt_bar_transformed_horizontal_position_field', 'scrolltotop', 'stt_bar_settings', array( 'class' => 'stt-transformed' ) );
	add_settings_field( 'stt_bar_transformed_horizontal_offset', esc_html__( 'Transformed bar horizontal offset', 'scrolltotop' ), 'stt_bar_transformed_horizontal_offset_field', 'scrolltotop', 'stt_bar_settings', array( 'class' => 'stt-transformed' ) );
	add_settings_field( 'stt_bar_transformed_vertical_position', esc_html__( 'Transformed bar vertical position', 'scrolltotop' ), 'stt_bar_transformed_vertical_position_field', 'scrolltotop', 'stt_bar_settings', array( 'class' => 'stt-transformed' ) );
	add_settings_field( 'stt_bar_transformed_vertical_offset', esc_html__( 'Transformed bar vertical offset', 'scrolltotop' ), 'stt_bar_transformed_vertical_offset_field', 'scrolltotop', 'stt_bar_settings', array( 'class' => 'stt-transformed' ) );
	add_settings_field( 'stt_bar_transformed_border_radius', esc_html__( 'Transformed bar border radius', 'scrolltotop' ), 'stt_bar_transformed_border_radius_field', 'scrolltotop', 'stt_bar_settings', array( 'class' => 'stt-transformed' ) );

	// button settings
	add_settings_section( 'stt_button_settings', esc_html__( 'Button Settings', 'scrolltotop' ), '__return_false', 'scrolltotop' );
	add_settings_field( 'stt_button_position', esc_html__( 'Position', 'scrolltotop' ), 'stt_button_position_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_padding', esc_html__( 'Padding', 'scrolltotop' ), 'stt_button_padding_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_opacity', esc_html__( 'Opacity', 'scrolltotop' ), 'stt_button_opacity_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_horizontal_offset', esc_html__( 'Horizontal offset', 'scrolltotop' ), 'stt_button_horizontal_offset_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_vertical_offset', esc_html__( 'Vertical offset', 'scrolltotop' ), 'stt_button_vertical_offset_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_arrow_icon', esc_html__( 'Arrow icon', 'scrolltotop' ), 'stt_button_arrow_icon_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_border_radius', esc_html__( 'Border radius', 'scrolltotop' ), 'stt_button_border_radius_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_arrow_color', esc_html__( 'Arrow color & opacity', 'scrolltotop' ), 'stt_button_arrow_color_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_arrow_size_field', esc_html__( 'Arrow size', 'scrolltotop' ), 'stt_button_arrow_size_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_background_color', esc_html__( 'Background color & opacity', 'scrolltotop' ), 'stt_button_background_color_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_animation', esc_html__( 'Animation', 'scrolltotop' ), 'stt_button_animation_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_hover_transition', esc_html__( 'Smooth hover duration', 'scrolltotop' ), 'stt_button_hover_transition_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_make_smaller', esc_html__( 'Make smaller', 'scrolltotop' ), 'stt_button_make_smaller_field', 'scrolltotop', 'stt_button_settings' );
	add_settings_field( 'stt_button_hide', esc_html__( 'Hide on small devices', 'scrolltotop' ), 'stt_button_hide_field', 'scrolltotop', 'stt_button_settings' );

	// advanced settings
	add_settings_section( 'stt_advanced', esc_html__( 'Advanced Settings', 'scrolltotop' ), '__return_false', 'scrolltotop' );
	add_settings_field( 'stt_sticky_container', esc_html__( 'Sticky container', 'scrolltotop' ), 'stt_sticky_container_field', 'scrolltotop', 'stt_advanced' );
	add_settings_field( 'stt_script_loading', esc_html__( 'Script loading', 'scrolltotop' ), 'stt_script_loading_field', 'scrolltotop', 'stt_advanced' );
	add_settings_field( 'stt_advanced_background_width', esc_html__( 'Advanced background', 'scrolltotop' ), 'stt_advanced_background_width_field', 'scrolltotop', 'stt_advanced' );
	add_settings_field( 'stt_enqueue_styles', esc_html__( 'Load scrollToTop CSS files?', 'scrolltotop' ), 'stt_enqueue_styles_field', 'scrolltotop', 'stt_advanced' );
	add_settings_field( 'stt_inline_styles', esc_html__( 'Load scrollToTop inline CSS?', 'scrolltotop' ), 'stt_inline_styles_field', 'scrolltotop', 'stt_advanced' );
	add_settings_field( 'stt_custom_css', esc_html__( 'Custom CSS styles', 'scrolltotop' ), 'stt_custom_css_field', 'scrolltotop', 'stt_advanced' );
}

function stt_bar_position_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_position' );
	?>
    <fieldset>
        <p>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_position]"
                       value="0" <?php checked( 0, $settings ); ?> />
				<?php esc_html_e( 'Left', 'scrolltotop' ); ?>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_position]"
                       value="1" <?php checked( 1, $settings ); ?> />
				<?php esc_html_e( 'Right', 'scrolltotop' ); ?>
            </label>
        </p>
    </fieldset>

	<?php
}

function stt_bar_element_position_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_element_position' );
	?>
    <fieldset>
        <p>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_element_position]"
                       value="0" <?php checked( 0, $settings ); ?> />
				<?php esc_html_e( 'Top', 'scrolltotop' ); ?>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_element_position]"
                       value="1" <?php checked( 1, $settings ); ?> />
				<?php esc_html_e( 'Bottom', 'scrolltotop' ); ?>
            </label>
        </p>
    </fieldset>

	<?php
}

function stt_bar_top_offset_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_top_offset' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_top_offset]" type="number" min="0" id="stt_bar_top_offset"
           value="<?= (int) $settings ?>" class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
	<?php
}

function stt_bar_horizontal_offset_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_horizontal_offset' );
	?>

    <input name="scrolltotop_plugin_settings[stt_bar_horizontal_offset]" type="number" min="0"
           id="stt_bar_horizontal_offset" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>

	<?php
}

function stt_mode_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_mode' );
	?>
    <fieldset>
        <p>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_mode]"
                       value="0" <?php checked( 0, $settings ); ?> />
				<?php esc_html_e( 'Bar', 'scrolltotop' ); ?>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_mode]"
                       value="1" <?php checked( 1, $settings ); ?> />
				<?php esc_html_e( 'Button', 'scrolltotop' ); ?>
            </label>
        </p>
    </fieldset>
	<?php
}

function stt_advanced_background_width_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_advanced_background_width' );
	?>
    <label>
		<?php esc_html_e( "Width:", 'scrolltotop' ); ?> <input
                name="scrolltotop_plugin_settings[stt_advanced_background_width]" type="number" min="0"
                id="stt_advanced_background_width" value="<?= (int) $settings ?>"
                class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
    </label>

    <p class="description"><?php esc_html_e( "0 – disable advanced background", 'scrolltotop' ); ?></p>

	<?php $settings = scrolltotop_get_plugin_settings( 'stt_advanced_background_sticky' ); ?>

    <label class="stt_margin_top_15px">
        <input name="scrolltotop_plugin_settings[stt_advanced_background_sticky]" type="checkbox"
               id="stt_advanced_background_sticky"
               value="1" <?php checked( 1, $settings ); ?> /><?php esc_html_e( 'Enable sticky width', 'scrolltotop' ); ?>
    </label>

	<?php $settings = scrolltotop_get_plugin_settings( 'stt_advanced_background_hide' ); ?>

    <label class="stt_margin_top_15px"><?php esc_html_e( "Hide advanced background if user's screen is less than", 'scrolltotop' ); ?>
        <input name="scrolltotop_plugin_settings[stt_advanced_background_hide]" type="number" min="0"
               id="stt_advanced_background_hide" value="<?= (int) $settings ?>"
               class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
    </label>

    <p class="description"><?php esc_html_e( "0 – don't hide", 'scrolltotop' ); ?></p>
	<?php
}

function stt_scroll_offset_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_scroll_offset' );
	?>
    <label><?php esc_html_e( 'Show scrollToTop after scrolling', 'scrolltotop' ); ?>
        <input name="scrolltotop_plugin_settings[stt_scroll_offset]" type="number" min="0" id="stt_scroll_offset"
               value="<?= (int) $settings ?>" class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
    </label>
    <p class="description"><?php esc_html_e( '0 – is always visible', 'scrolltotop' ); ?></p>
	<?php
}

function stt_scroll_to_field() {
    $settings = scrolltotop_get_plugin_settings( 'stt_scroll_to' );
    ?>
    <label>
        <input name="scrolltotop_plugin_settings[stt_scroll_to]" type="text" id="stt_scroll_to"
               value="<?= $settings ?>" />
    </label>
    <p class="description"><?php _e( 'Can be number of pixels (without <code>px</code>) or jQuery selectors like: <code>#example</code>, <code>.example:first</code>', 'scrolltotop' ); ?></p>
    <?php
}

function stt_bar_text_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_text' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_text]" type="text" placeholder="Scroll to Top" id="stt_bar_text"
           value="<?= $settings ?>"/>
	<?php
}

function stt_bar_text_distance_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_text_distance' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_text_distance]" type="number" min="0" id="stt_bar_text_distance"
           value="<?= (int) $settings ?>" class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
	<?php
}

function stt_bar_fade_duration_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_fade_duration' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_fade_duration]" type="number" min="0" step="100" max="1000"
           id="stt_bar_fade_duration" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'ms', 'scrolltotop' ); ?>
    <p class="description"><?php esc_html_e( '0 – disable fade effect', 'scrolltotop' ); ?></p>

	<?php $settings = scrolltotop_get_plugin_settings( 'stt_bar_animation_on_load' ); ?>

    <label class="stt_margin_top_15px">
        <input name="scrolltotop_plugin_settings[stt_bar_animation_on_load]" type="checkbox"
               id="stt_bar_animation_on_load"
               value="1" <?php checked( 1, $settings ); ?> /><?php esc_html_e( 'Disable fade effect on page load', 'scrolltotop' ); ?>
    </label>
	<?php
}

function stt_bar_allow_back_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_allow_back' );
	?>
    <fieldset>
        <p>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_allow_back]"
                       value="0" <?php checked( 0, $settings ); ?> />
				<?php esc_html_e( 'Yes', 'scrolltotop' ); ?>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_allow_back]"
                       value="1" <?php checked( 1, $settings ); ?> />
				<?php esc_html_e( 'No', 'scrolltotop' ); ?>
            </label>
        </p>
    </fieldset>
	<?php
}

function stt_script_loading_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_script_loading' );
	?>
    <select name="scrolltotop_plugin_settings[stt_script_loading]" id="stt_script_loading">
        <option value="0" <?php selected( 0, $settings ); ?>><?php esc_html_e( 'Normal', 'scrolltotop' ); ?></option>
        <option value="1" <?php selected( 1, $settings ); ?>><?php esc_html_e( 'Async', 'scrolltotop' ); ?></option>
        <option value="2" <?php selected( 2, $settings ); ?>><?php esc_html_e( 'Defer', 'scrolltotop' ); ?></option>
    </select>
    <p class="description"><span
                class="stt-warning"><?php esc_html_e( "Warning!", 'scrolltotop' ); ?></span> <?php esc_html_e( "Don't change this unless you know what you're doing", 'scrolltotop' ); ?>
    </p>
	<?php
}

function stt_bar_width_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_width' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_width]" type="number" id="stt_bar_width"
           value="<?= (int) $settings ?>" class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>

	<?php $settings = scrolltotop_get_plugin_settings( 'stt_bar_sticky' ); ?>

    <label class="stt_margin_top_15px">
        <input name="scrolltotop_plugin_settings[stt_bar_sticky]" type="checkbox" id="stt_bar_sticky"
               value="1" <?php checked( 1, $settings ); ?> /><?php esc_html_e( 'Enable sticky width', 'scrolltotop' ); ?>
    </label>
	<?php
}

function stt_bar_opacity_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_opacity' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_opacity]" type="number" min="5" max="100" step="5"
           id="stt_bar_opacity" value="<?= (int) $settings ?>" class="small-text"/> %
	<?php
}

function stt_bar_arrow_icon_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_arrow_icon' );
	?>
    <fieldset class="arrow-icon-select">
        <p>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="f077" <?php checked( 'f077', $settings ); ?> />
                <i class="arrow-style-icon f077"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="e800" <?php checked( 'e800', $settings ); ?> />
                <i class="arrow-style-icon e800"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="e801" <?php checked( 'e801', $settings ); ?> />
                <i class="arrow-style-icon e801"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="f106" <?php checked( 'f106', $settings ); ?> />
                <i class="arrow-style-icon f106"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="f102" <?php checked( 'f102', $settings ); ?> />
                <i class="arrow-style-icon f102"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="e80d" <?php checked( 'e80d', $settings ); ?> />
                <i class="arrow-style-icon e80d"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="f0aa" <?php checked( 'f0aa', $settings ); ?> />
                <i class="arrow-style-icon f0aa"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="f148" <?php checked( 'f148', $settings ); ?> />
                <i class="arrow-style-icon f148"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="e802" <?php checked( 'e802', $settings ); ?> />
                <i class="arrow-style-icon e802"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="e805" <?php checked( 'e805', $settings ); ?> />
                <i class="arrow-style-icon e805"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="e807" <?php checked( 'e807', $settings ); ?> />
                <i class="arrow-style-icon e807"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="e80b" <?php checked( 'e80b', $settings ); ?> />
                <i class="arrow-style-icon e80b"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="e809" <?php checked( 'e809', $settings ); ?> />
                <i class="arrow-style-icon e809"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="e803" <?php checked( 'e803', $settings ); ?> />
                <i class="arrow-style-icon e803"></i>
            </label><br/>

            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_arrow_icon]"
                       value="e804" <?php checked( 'e804', $settings ); ?> />
                <i class="arrow-style-icon e804"></i>
            </label>
        </p>
    </fieldset>
	<?php
}

function stt_bar_arrow_rotate_speed_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_arrow_rotate_speed' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_arrow_rotate_speed]" type="number" min="0" step="50"
           id="stt_bar_arrow_rotate_speed" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'ms', 'scrolltotop' ); ?>
    <p class="description"><?php esc_html_e( '0 – instant rotate', 'scrolltotop' ); ?></p>
	<?php
}

function stt_bar_background_color_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_background_color' );
	?>

    <fieldset>
        <input type="text" class="color-picker" data-alpha="true" data-default-color="rgba( 0,0,0,0.2 )"
               name="scrolltotop_plugin_settings[stt_bar_background_color]" id="stt_bar_background_color"
               value="<?= sanitize_text_field( $settings ) ?>"/>
        <p class="description"><?php esc_html_e( 'Normal', 'scrolltotop' ); ?></p>
    </fieldset>

	<?php
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_background_color_on_hover' );
	?>
    <fieldset class="stt_margin_top_15px">
        <input type="text" class="color-picker" data-alpha="true" data-default-color="rgba( 0,0,0,0.3 )"
               name="scrolltotop_plugin_settings[stt_bar_background_color_on_hover]"
               id="stt_bar_background_color_on_hover" value="<?= sanitize_text_field( $settings ) ?>"/>
        <p class="description"><?php esc_html_e( 'On hover', 'scrolltotop' ); ?></p>
    </fieldset>
	<?php
}

function stt_bar_hover_transition_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_hover_transition' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_hover_transition]" type="number" min="0" step="50"
           id="stt_bar_hover_transition" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'ms', 'scrolltotop' ); ?>
    <p class="description"><?php esc_html_e( '0 – disable smooth effect', 'scrolltotop' ); ?></p>
	<?php
}

function stt_bar_text_offset_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_text_offset' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_text_offset]" type="number" min="0" id="stt_bar_text_offset"
           value="<?= (int) $settings ?>" class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
	<?php
}

function stt_bar_color_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_color' );
	?>
    <fieldset>
        <p>
            <input type="text" class="color-picker" data-alpha="true" data-default-color="#000000"
                   name="scrolltotop_plugin_settings[stt_bar_color]" id="stt_bar_color"
                   value="<?= $settings ?>"/>
        </p>
    </fieldset>
	<?php
}

function stt_bar_arrow_size_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_arrow_size' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_arrow_size]" type="number" min="0" max="100"
           id="stt_bar_arrow_size" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
    <p class="description"><?php esc_html_e( "0 – don't show the arrow", 'scrolltotop' ); ?></p>
	<?php
}

function stt_bar_caption_size_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_caption_size' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_caption_size]" type="number" min="0" max="30"
           id="stt_bar_caption_size" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
	<?php
}

function stt_bar_caption_position_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_caption_position' );
	?>
    <fieldset>
        <p>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_caption_position]"
                       value="0" <?php checked( 0, $settings ); ?> />
				<?php esc_html_e( 'Under the arrow', 'scrolltotop' ); ?>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_caption_position]"
                       value="1" <?php checked( 1, $settings ); ?> />
				<?php esc_html_e( 'To the right of the arrow', 'scrolltotop' ); ?>
            </label>
        </p>
    </fieldset>
	<?php
}

function stt_bar_caption_font_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_caption_font' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_caption_font]" type="text"
           placeholder="&#34;Arial&#34;, sans-serif" id="stt_bar_caption_font"
           value="<?= esc_attr( $settings ) ?>"/>
	<?php
}

function stt_sticky_container_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_sticky_container' );
	?>
    <input name="scrolltotop_plugin_settings[stt_sticky_container]" type="text" id="stt_sticky_container"
           value="<?= esc_attr( $settings ) ?>"/>
    <p class="description"><?php _e( "Usually this is <code>#primary</code>, <code>#wrapper</code>, <code>#secondary</code>, <code>#sidebar</code> or <code>#content</code>", 'scrolltotop' ); ?></p>
	<?php
}

function stt_enqueue_styles_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_enqueue_styles' );
	?>
    <fieldset>
        <p>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_enqueue_styles]"
                       value="0" <?php checked( 0, $settings ); ?> />
				<?php esc_html_e( 'Yes', 'scrolltotop' ); ?>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_enqueue_styles]"
                       value="1" <?php checked( 1, $settings ); ?> />
				<?php esc_html_e( 'No', 'scrolltotop' ); ?>
            </label>
        </p>
    </fieldset>
	<?php
}

function stt_inline_styles_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_inline_styles' );
	?>
    <fieldset id="stt_inline_styles">
        <p>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_inline_styles]"
                       value="0" <?php checked( 0, $settings ); ?> />
				<?php esc_html_e( 'Yes', 'scrolltotop' ); ?>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_inline_styles]"
                       value="1" <?php checked( 1, $settings ); ?> />
				<?php esc_html_e( 'No', 'scrolltotop' ); ?>
            </label>
        </p>
    </fieldset>
	<?php
}

function stt_custom_css_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_custom_css' );
	?>
    <textarea name="scrolltotop_plugin_settings[stt_custom_css]" id="stt_custom_css"
              placeholder="#scrollToTop {&#10;     border-right: 1px solid #bbbbbb;&#10;}" id="stt_custom_css" cols="50"
              rows="12"><?= $settings ?></textarea>
	<?php
}

function stt_bar_make_smaller_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_make_smaller_width' );
	?>
    <label><?php esc_html_e( "Set width to", 'scrolltotop' ); ?>
        <input name="scrolltotop_plugin_settings[stt_bar_make_smaller_width]" type="number" min="0" step="5"
               id="stt_bar_make_smaller_width" value="<?= (int) $settings ?>"
               class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?></label>

	<?php $settings = scrolltotop_get_plugin_settings( 'stt_bar_make_smaller_screen' ); ?>

    <label>
		<?php esc_html_e( "if user's screen is less than", 'scrolltotop' ); ?>
        <input name="scrolltotop_plugin_settings[stt_bar_make_smaller_screen]" type="number" min="0"
               id="stt_bar_make_smaller_screen" value="<?= (int) $settings ?>"
               class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
    </label>
    <p class="description"><?php esc_html_e( "0 – don't make bar smaller", 'scrolltotop' ); ?></p>
	<?php
}

function stt_button_make_smaller_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_make_smaller_padding' );
	?>
    <label>
		<?php esc_html_e( "Set padding to", 'scrolltotop' ); ?>
        <input name="scrolltotop_plugin_settings[stt_button_make_smaller_padding]" type="number" min="0"
               id="stt_button_make_smaller_padding" value="<?= (int) $settings ?>"
               class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
    </label>

	<?php $settings = scrolltotop_get_plugin_settings( 'stt_button_make_smaller_arrow_size' ); ?>

    <label>
		<?php esc_html_e( "and arrow size to", 'scrolltotop' ); ?>
        <input name="scrolltotop_plugin_settings[stt_button_make_smaller_arrow_size]" type="number" min="0"
               id="stt_button_make_smaller_arrow_size" value="<?= (int) $settings ?>"
               class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
    </label>

	<?php $settings = scrolltotop_get_plugin_settings( 'stt_button_make_smaller_screen' ); ?>

    <label>
		<?php esc_html_e( "if user's screen is less than", 'scrolltotop' ); ?>
        <input name="scrolltotop_plugin_settings[stt_button_make_smaller_screen]" type="number" min="0"
               id="stt_button_make_smaller_screen" value="<?= (int) $settings ?>"
               class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
    </label>
    <p class="description"><?php esc_html_e( "0 – don't make button smaller", 'scrolltotop' ); ?></p>
	<?php
}

function stt_bar_hide_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_hide' );
	?>
    <label>
		<?php esc_html_e( "Hide if user's screen is less than", 'scrolltotop' ); ?>
        <input name="scrolltotop_plugin_settings[stt_bar_hide]" type="number" min="0" id="stt_bar_hide"
               value="<?= (int) $settings ?>" class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
    </label>

    <p class="description"><?php esc_html_e( "0 – don't hide", 'scrolltotop' ); ?></p>

	<?php $settings = scrolltotop_get_plugin_settings( 'stt_bar_transform_to_button' ); ?>

    <label class="stt_margin_top_15px">
        <input name="scrolltotop_plugin_settings[stt_bar_transform_to_button]" type="checkbox"
               id="stt_bar_transform_to_button"
               value="1" <?php checked( 1, $settings ); ?> /><?php esc_html_e( "Transform into button instead of hide", 'scrolltotop' ); ?>
        <span class="stt-new"><?= esc_html__( 'NEW', 'scrolltotop' ) ?></span>
    </label>
	<?php
}

function stt_bar_transformed_size_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_transformed_size' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_transformed_size]" type="number" min="0"
           id="stt_bar_transformed_size" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
	<?php
}

function stt_bar_transformed_vertical_position_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_transformed_vertical_position' );
	?>
    <fieldset>
        <p>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_transformed_vertical_position]"
                       value="0" <?php checked( 0, $settings ); ?> />
				<?php esc_html_e( 'Top', 'scrolltotop' ); ?>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_transformed_vertical_position]"
                       value="1" <?php checked( 1, $settings ); ?> />
				<?php esc_html_e( 'Bottom', 'scrolltotop' ); ?>
            </label>
        </p>
    </fieldset>
	<?php
}

function stt_bar_transformed_horizontal_position_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_transformed_horizontal_position' );
	?>
    <fieldset>
        <p>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_transformed_horizontal_position]"
                       value="0" <?php checked( 0, $settings ); ?> />
				<?php esc_html_e( 'Left', 'scrolltotop' ); ?>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_bar_transformed_horizontal_position]"
                       value="1" <?php checked( 1, $settings ); ?> />
				<?php esc_html_e( 'Right', 'scrolltotop' ); ?>
            </label>
        </p>
    </fieldset>
	<?php
}

function stt_bar_transformed_vertical_offset_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_transformed_vertical_offset' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_transformed_vertical_offset]" type="number" min="0"
           id="stt_bar_transformed_vertical_offset" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
	<?php
}

function stt_bar_transformed_horizontal_offset_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_transformed_horizontal_offset' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_transformed_horizontal_offset]" type="number" min="0"
           id="stt_bar_transformed_horizontal_offset" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
	<?php
}

function stt_bar_transformed_border_radius_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_bar_transformed_border_radius' );
	?>
    <input name="scrolltotop_plugin_settings[stt_bar_transformed_border_radius]" type="text"
           id="stt_bar_transformed_border_radius" value="<?= $settings ?>" class="small-text"/>
	<?php
}

function stt_button_hide_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_hide' );
	?>
    <label>
		<?php esc_html_e( "Hide if user's screen is less than", 'scrolltotop' ); ?>
        <input name="scrolltotop_plugin_settings[stt_button_hide]" type="number" min="0" id="stt_button_hide"
               value="<?= (int) $settings ?>" class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
    </label>

    <p class="description"><?php esc_html_e( "0 – don't hide", 'scrolltotop' ); ?></p>
	<?php
}

function stt_button_position_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_position' );
	?>
    <fieldset>
        <p>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_position]"
                       value="0" <?php checked( 0, $settings ); ?> />
				<?php esc_html_e( 'Left', 'scrolltotop' ); ?>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_position]"
                       value="1" <?php checked( 1, $settings ); ?> />
				<?php esc_html_e( 'Right', 'scrolltotop' ); ?>
            </label>
        </p>
    </fieldset>
	<?php
}

function stt_button_padding_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_padding' );
	?>
    <input name="scrolltotop_plugin_settings[stt_button_padding]" type="number" min="0" id="stt_button_padding"
           value="<?= (int) $settings ?>" class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
	<?php
}

function stt_button_opacity_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_opacity' );
	?>
    <input name="scrolltotop_plugin_settings[stt_button_opacity]" type="number" min="5" max="100" step="5"
           id="stt_button_opacity" value="<?= (int) $settings ?>" class="small-text"/> %
	<?php
}

function stt_button_horizontal_offset_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_horizontal_offset' );
	?>
    <input name="scrolltotop_plugin_settings[stt_button_horizontal_offset]" type="number" min="0"
           id="stt_button_horizontal_offset" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
	<?php
}

function stt_button_vertical_offset_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_vertical_offset' );
	?>
    <input name="scrolltotop_plugin_settings[stt_button_vertical_offset]" type="number" min="0"
           id="stt_button_vertical_offset" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
	<?php
}

function stt_button_border_radius_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_border_radius' );
	?>
    <input name="scrolltotop_plugin_settings[stt_button_border_radius]" type="text" id="stt_button_border_radius"
           value="<?= $settings ?>" class="small-text"/>
	<?php
}

function stt_button_background_color_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_background_color' );
	?>
    <fieldset>
        <input type="text" class="color-picker" data-alpha="true" data-default-color="#f44336"
               name="scrolltotop_plugin_settings[stt_button_background_color]" id="stt_button_background_color"
               value="<?= sanitize_text_field( $settings ) ?>"/>
        <p class="description"><?php esc_html_e( 'Normal', 'scrolltotop' ); ?></p>
    </fieldset>

	<?php $settings = scrolltotop_get_plugin_settings( 'stt_button_background_color_on_hover' ); ?>

    <fieldset class="stt_margin_top_15px">
        <input type="text" class="color-picker" data-alpha="true" data-default-color="#ff1744"
               name="scrolltotop_plugin_settings[stt_button_background_color_on_hover]"
               id="stt_button_background_color_on_hover" value="<?= sanitize_text_field( $settings ) ?>"/>
        <p class="description"><?php esc_html_e( 'On hover', 'scrolltotop' ); ?></p>
    </fieldset>
	<?php
}

function stt_button_animation_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_animation' );
	?>
    <label>
		<?php esc_html_e( 'Effect:', 'scrolltotop' ); ?>
        <select name="scrolltotop_plugin_settings[stt_button_animation]" id="stt_button_animation">
            <option value="0" <?php selected( 0, $settings ); ?>><?php esc_html_e( 'None', 'scrolltotop' ); ?></option>
            <option value="1" <?php selected( 1, $settings ); ?>><?php esc_html_e( 'Slide', 'scrolltotop' ); ?></option>
            <option value="2" <?php selected( 2, $settings ); ?>><?php esc_html_e( 'Fade', 'scrolltotop' ); ?></option>
        </select>
    </label>

	<?php $settings = scrolltotop_get_plugin_settings( 'stt_button_animation_speed' ); ?>

    <label class="stt_margin_top_15px">
		<?php esc_html_e( 'Speed:', 'scrolltotop' ); ?>
        <input name="scrolltotop_plugin_settings[stt_button_animation_speed]" type="number" min="1" max="1000"
               id="stt_button_animation_speed" value="<?= (int) $settings ?>"
               class="small-text"/> <?php esc_html_e( 'ms', 'scrolltotop' ); ?>
    </label>

	<?php $settings = scrolltotop_get_plugin_settings( 'stt_button_animation_on_load' ); ?>

    <label class="stt_margin_top_15px">
        <input name="scrolltotop_plugin_settings[stt_button_animation_on_load]" type="checkbox"
               id="stt_button_animation_on_load"
               value="1" <?php checked( 1, $settings ); ?> /><?php esc_html_e( 'Disable animation on page load', 'scrolltotop' ); ?>
    </label>
	<?php
}

function stt_button_hover_transition_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_hover_transition' );
	?>
    <input name="scrolltotop_plugin_settings[stt_button_hover_transition]" type="number" min="0" step="50"
           id="stt_button_hover_transition" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'ms', 'scrolltotop' ); ?>
    <p class="description"><?php esc_html_e( '0 – disable smooth effect', 'scrolltotop' ); ?></p>
	<?php
}

function stt_button_arrow_color_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_arrow_color' );
	?>
    <fieldset>
        <p>
            <input type="text" class="color-picker" data-alpha="true" data-default-color="#ffffff"
                   name="scrolltotop_plugin_settings[stt_button_arrow_color]" id="stt_button_arrow_color"
                   value="<?= $settings ?>"/>
        </p>
    </fieldset>
	<?php
}

function stt_button_arrow_size_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_arrow_size' );
	?>
    <input name="scrolltotop_plugin_settings[stt_button_arrow_size]" type="number" min="5" max="100"
           id="stt_button_arrow_size" value="<?= (int) $settings ?>"
           class="small-text"/> <?php esc_html_e( 'px', 'scrolltotop' ); ?>
	<?php
}

function stt_button_arrow_icon_field() {
	$settings = scrolltotop_get_plugin_settings( 'stt_button_arrow_icon' );
	?>
    <fieldset class="arrow-icon-select">
        <p>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="f077" <?php checked( 'f077', $settings ); ?> />
                <i class="arrow-style-icon f077"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="e800" <?php checked( 'e800', $settings ); ?> />
                <i class="arrow-style-icon e800"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="e801" <?php checked( 'e801', $settings ); ?> />
                <i class="arrow-style-icon e801"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="f106" <?php checked( 'f106', $settings ); ?> />
                <i class="arrow-style-icon f106"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="f102" <?php checked( 'f102', $settings ); ?> />
                <i class="arrow-style-icon f102"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="e80d" <?php checked( 'e80d', $settings ); ?> />
                <i class="arrow-style-icon e80d"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="f0aa" <?php checked( 'f0aa', $settings ); ?> />
                <i class="arrow-style-icon f0aa"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="f148" <?php checked( 'f148', $settings ); ?> />
                <i class="arrow-style-icon f148"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="e802" <?php checked( 'e802', $settings ); ?> />
                <i class="arrow-style-icon e802"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="e805" <?php checked( 'e805', $settings ); ?> />
                <i class="arrow-style-icon e805"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="e807" <?php checked( 'e807', $settings ); ?> />
                <i class="arrow-style-icon e807"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="e80b" <?php checked( 'e80b', $settings ); ?> />
                <i class="arrow-style-icon e80b"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="e809" <?php checked( 'e809', $settings ); ?> />
                <i class="arrow-style-icon e809"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="e803" <?php checked( 'e803', $settings ); ?> />
                <i class="arrow-style-icon e803"></i>
            </label>
            <br/>
            <label>
                <input type="radio" name="scrolltotop_plugin_settings[stt_button_arrow_icon]"
                       value="e804" <?php checked( 'e804', $settings ); ?> />
                <i class="arrow-style-icon e804"></i>
            </label>
        </p>
    </fieldset>
	<?php
}

function scrolltotop_plugin_settings_validate( $settings ) {
	if ( ! in_array( $settings['stt_bar_position'], array( 0, 1 ) ) ) {
		$settings['stt_bar_position'] = 0;
	}

	if ( ! isset( $settings['stt_bar_animation_on_load'] ) || ! in_array( $settings['stt_bar_animation_on_load'], array(
			0,
			1
		) ) ) {
		$settings['stt_bar_animation_on_load'] = 0;
	}

	if ( ! isset( $settings['stt_bar_transform_to_button'] ) || ! in_array( $settings['stt_bar_transform_to_button'], array(
			0,
			1
		) ) ) {
		$settings['stt_bar_transform_to_button'] = 0;
	}

	if ( ! isset( $settings['stt_button_animation_on_load'] ) || ! in_array( $settings['stt_button_animation_on_load'], array(
			0,
			1
		) ) ) {
		$settings['stt_button_animation_on_load'] = 0;
	}

	if ( ! in_array( $settings['stt_bar_element_position'], array( 0, 1 ) ) ) {
		$settings['stt_bar_element_position'] = 1;
	}

	if ( ! in_array( $settings['stt_bar_transformed_vertical_position'], array( 0, 1 ) ) ) {
		$settings['stt_bar_transformed_vertical_position'] = 1;
	}

	if ( ! in_array( $settings['stt_bar_transformed_horizontal_position'], array( 0, 1 ) ) ) {
		$settings['stt_bar_transformed_horizontal_position'] = 1;
	}

	if ( ! in_array( $settings['stt_mode'], array( 0, 1 ) ) ) {
		$settings['stt_mode'] = 0;
	}

	if ( ! in_array( $settings['stt_custom_css'], array( 0, 1 ) ) ) {
		$settings['stt_custom_css'] = 0;
	}

	if ( ! in_array( $settings['stt_inline_styles'], array( 0, 1 ) ) ) {
		$settings['stt_inline_styles'] = 0;
	}

	if ( ! in_array( $settings['stt_bar_allow_back'], array( 0, 1 ) ) ) {
		$settings['stt_bar_allow_back'] = 0;
	}

	if ( ! in_array( $settings['stt_script_loading'], array( 0, 1, 2 ) ) ) {
		$settings['stt_script_loading'] = 0;
	}

	$icon_array = array(
		'f077',
		'f106',
		'e801',
		'e800',
		'e80d',
		'f0aa',
		'f148',
		'e802',
		'e805',
		'e807',
		'e80b',
		'e809',
		'f102',
		'e803',
		'e804'
	);
	if ( ! in_array( $settings['stt_bar_arrow_icon'], $icon_array ) ) {
		$settings['stt_bar_arrow_icon'] = 'f077';
	}

	if ( ! in_array( $settings['stt_button_arrow_icon'], $icon_array ) ) {
		$settings['stt_button_arrow_icon'] = 'f077';
	}

	if ( ! in_array( $settings['stt_bar_caption_position'], array( 0, 1 ) ) ) {
		$settings['stt_bar_caption_position'] = 0;
	}

	if ( isset( $settings['stt_advanced_background_sticky'] ) && ! in_array( $settings['stt_advanced_background_sticky'], array(
			0,
			1
		) ) ) {
		$settings['stt_advanced_background_sticky'] = 0;
	}

	if ( isset( $settings['stt_bar_sticky'] ) && ! in_array( $settings['stt_bar_sticky'], array( 0, 1 ) ) ) {
		$settings['stt_bar_sticky'] = 0;
	}

	if ( ! in_array( $settings['stt_button_position'], array( 0, 1 ) ) ) {
		$settings['stt_button_position'] = 0;
	}

	if ( ! in_array( $settings['stt_button_animation'], array( 0, 1, 2 ) ) ) {
		$settings['stt_button_animation'] = 0;
	}

	$settings['stt_button_padding'] = absint( $settings['stt_button_padding'] );
	$settings['stt_button_opacity'] = absint( $settings['stt_button_opacity'] );
	if ( (int) $settings['stt_button_opacity'] > 100 ) {
		$settings['stt_button_opacity'] = 100;
	}
	$settings['stt_button_horizontal_offset'] = absint( $settings['stt_button_horizontal_offset'] );
	$settings['stt_button_vertical_offset']   = absint( $settings['stt_button_vertical_offset'] );
	$settings['stt_button_hover_transition']  = absint( $settings['stt_button_hover_transition'] );
	$settings['stt_button_arrow_size']        = absint( $settings['stt_button_arrow_size'] );
	$settings['stt_button_animation_speed']   = absint( $settings['stt_button_animation_speed'] );
	if ( (int) $settings['stt_button_animation_speed'] < 1 ) {
		$settings['stt_button_animation_speed'] = 200;
	}
	$settings['stt_button_padding']                = absint( $settings['stt_button_padding'] );
	$settings['stt_button_border_radius']          = trim( sanitize_text_field( $settings['stt_button_border_radius'] ) );
	$settings['stt_button_border_radius']          = is_numeric( substr( $settings['stt_button_border_radius'], - 1 ) ) && (int) $settings['stt_button_border_radius'] > 0 ? (int) $settings['stt_button_border_radius'] . 'px' : $settings['stt_button_border_radius'];
	$settings['stt_bar_transformed_border_radius'] = trim( sanitize_text_field( $settings['stt_bar_transformed_border_radius'] ) );
	$settings['stt_bar_transformed_border_radius'] = is_numeric( substr( $settings['stt_bar_transformed_border_radius'], - 1 ) ) && (int) $settings['stt_bar_transformed_border_radius'] > 0 ? (int) $settings['stt_bar_transformed_border_radius'] . 'px' : $settings['stt_bar_transformed_border_radius'];
	$settings['stt_bar_text']                      = trim( sanitize_text_field( $settings['stt_bar_text'] ) );
	$settings['stt_bar_caption_font']              = trim( sanitize_text_field( $settings['stt_bar_caption_font'] ) );
	$settings['stt_bar_top_offset']                = absint( $settings['stt_bar_top_offset'] );
	$settings['stt_bar_horizontal_offset']         = absint( $settings['stt_bar_horizontal_offset'] );
	$settings['stt_scroll_offset']                 = absint( $settings['stt_scroll_offset'] );

	$scrollTo = trim( $settings['stt_scroll_to'] );
    $settings['stt_scroll_to']                     = empty( $scrollTo ) || is_numeric( $scrollTo ) ? absint( $scrollTo ) : preg_replace( '/(px|em|%)$/m', '', sanitize_text_field( $scrollTo ) );

	$settings['stt_bar_fade_duration']             = absint( $settings['stt_bar_fade_duration'] );
	$settings['stt_bar_opacity']                   = absint( $settings['stt_bar_opacity'] );
	if ( (int) $settings['stt_bar_opacity'] > 100 ) {
		$settings['stt_bar_opacity'] = 100;
	}
	$settings['stt_bar_hover_transition']           = absint( $settings['stt_bar_hover_transition'] );
	$settings['stt_bar_text_offset']                = absint( $settings['stt_bar_text_offset'] );
	$settings['stt_bar_text_distance']              = absint( $settings['stt_bar_text_distance'] );
	$settings['stt_bar_arrow_rotate_speed']         = absint( $settings['stt_bar_arrow_rotate_speed'] );
	$settings['stt_bar_arrow_size']                 = absint( $settings['stt_bar_arrow_size'] );
	$settings['stt_bar_caption_size']               = absint( $settings['stt_bar_caption_size'] );
	$settings['stt_bar_make_smaller_width']         = absint( $settings['stt_bar_make_smaller_width'] );
	$settings['stt_button_make_smaller_padding']    = absint( $settings['stt_button_make_smaller_padding'] );
	$settings['stt_button_make_smaller_arrow_size'] = absint( $settings['stt_button_make_smaller_arrow_size'] );
	$settings['stt_button_make_smaller_screen']     = absint( $settings['stt_button_make_smaller_screen'] );
	if ( isset( $settings['stt_button_make_smaller_padding'] ) && (int) $settings['stt_button_make_smaller_padding'] > (int) $settings['stt_button_padding'] ) {
		$settings['stt_button_make_smaller_padding'] = (int) $settings['stt_button_padding'] - 5;
	}

	$settings['stt_bar_width'] = absint( $settings['stt_bar_width'] );
	if ( isset( $settings['stt_bar_width'] ) && (int) $settings['stt_bar_make_smaller_width'] > (int) $settings['stt_bar_width'] && (int) $settings['stt_bar_width'] > 100 && (int) $settings['stt_bar_sticky'] == 0 ) {
		$settings['stt_bar_make_smaller_width'] = (int) $settings['stt_bar_width'] - 50;
	}

	$settings['stt_bar_make_smaller_screen'] = absint( $settings['stt_bar_make_smaller_screen'] );
	$settings['stt_bar_hide']                = absint( $settings['stt_bar_hide'] );
	if ( (int) $settings['stt_bar_hide'] > (int) $settings['stt_bar_make_smaller_screen'] && ! empty( (int) $settings['stt_bar_make_smaller_screen'] ) ) {
		$settings['stt_bar_hide'] = (int) $settings['stt_bar_make_smaller_screen'] - 100;
	}

	$settings['stt_button_hide'] = absint( $settings['stt_button_hide'] );
	if ( (int) $settings['stt_button_hide'] > (int) $settings['stt_button_make_smaller_screen'] && ! empty( (int) $settings['stt_button_make_smaller_screen'] ) ) {
		$settings['stt_button_hide'] = (int) $settings['stt_button_make_smaller_screen'] - 100;
	}

	if ( isset( $settings['stt_advanced_background_width'] ) ) {
		$settings['stt_advanced_background_width'] = absint( $settings['stt_advanced_background_width'] );

		if ( isset( $settings['stt_bar_width'] ) && (int) $settings['stt_bar_width'] > (int) $settings['stt_advanced_background_width'] && (int) $settings['stt_advanced_background_width'] != 0 ) {
			$settings['stt_advanced_background_width'] = (int) $settings['stt_bar_width'] + 100;
		}
	}

	$settings['stt_advanced_background_hide'] = absint( $settings['stt_advanced_background_hide'] );
	if ( ( $settings['stt_mode'] === 0 && (int) $settings['stt_bar_hide'] >= (int) $settings['stt_advanced_background_hide'] ) || ( $settings['stt_mode'] === 1 && $settings['stt_button_hide'] >= $settings['stt_advanced_background_hide'] ) ) {
		$settings['stt_advanced_background_hide'] = 0;
	}

	$settings['stt_sticky_container'] = trim( $settings['stt_sticky_container'] );
	if ( (int) $settings['stt_mode'] === 0 && ! empty( $settings['stt_bar_sticky'] ) && ! empty( $settings['stt_advanced_background_sticky'] ) ) {
		$settings['stt_advanced_background_sticky'] = 0;
	}

	delete_transient( 'scrolltotop_dynamic_js' );
	delete_transient( 'scrolltotop_dynamic_css' );

	return $settings;
}
