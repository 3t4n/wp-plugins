<?php 
function minddnd_wa_admin_styles($hook){
  if ( 'settings_page_minddnd-wa-submenu-page' == $hook ) {
    wp_enqueue_style( 'minddnd_wa_admin_styles', plugin_dir_url( __FILE__ ) . 'minddnd-wa-admin-styles.css'  );
  }
}

add_action( 'admin_enqueue_scripts', 'minddnd_wa_admin_styles' );

function minddnd_wa_settings() {
  if( !get_option( 'minddnd_wa_settings' ) ) {
      add_option( 'minddnd_wa_settings' );
  }

  add_settings_section(
    'minddnd_wa_settings_section',
    __( 'Announcement Banner Settings', 'wp-website-announcements' ),
    'minddnd_wa_settings_section_callback',
    'minddnd-wa-submenu-page'
  );

  add_settings_field( 
  	'minddnd_wa_settings_section_show_announcement', 
  	__('Show Announcement Banner', 'wp-website-announcements'), 
  	'minddnd_wa_settings_section_show_announcement_html', 
  	'minddnd-wa-submenu-page', 
  	'minddnd_wa_settings_section'
  );

  add_settings_field( 
    'minddnd_wa_settings_section_announcement_position', 
    __('Announcement Banner Position', 'wp-website-announcements'), 
    'minddnd_wa_settings_section_announcement_position_html', 
    'minddnd-wa-submenu-page', 
    'minddnd_wa_settings_section'
  );

  add_settings_field( 
    'minddnd_wa_settings_section_announcement_placement', 
    __('Announcement Banner Placement', 'wp-website-announcements'), 
    'minddnd_wa_settings_section_announcement_placement_html', 
    'minddnd-wa-submenu-page', 
    'minddnd_wa_settings_section'
  );

  add_settings_field( 
    'minddnd_wa_background_color', 
    __('Background Color', 'wp-website-announcements'), 
    'minddnd_wa_settings_background_color_html', 
    'minddnd-wa-submenu-page', 
    'minddnd_wa_settings_section'
  );

  add_settings_field( 
    'minddnd_wa_text_color', 
    __('Text Color', 'wp-website-announcements'), 
    'minddnd_wa_settings_text_color_html', 
    'minddnd-wa-submenu-page', 
    'minddnd_wa_settings_section'
  );

  add_settings_field( 
    'minddnd_wa_height', 
    __('Banner Height', 'wp-website-announcements'), 
    'minddnd_wa_settings_height_html', 
    'minddnd-wa-submenu-page', 
    'minddnd_wa_settings_section'
  );

    add_settings_field( 
    'minddnd_wa_padding_top', 
    __('Top Padding', 'wp-website-announcements'), 
    'minddnd_wa_settings_top_padding_html', 
    'minddnd-wa-submenu-page', 
    'minddnd_wa_settings_section'
  );

  add_settings_field( 
    'minddnd_wa_close_button', 
    __('Close Button', 'wp-website-announcements'), 
    'minddnd_wa_settings_wa_close_html', 
    'minddnd-wa-submenu-page', 
    'minddnd_wa_settings_section'
  );

  add_settings_field( 
    'minddnd_wa_close_banner_duration', 
    __('Close Banner Duration', 'wp-website-announcements'), 
    'minddnd_wa_close_banner_duration_html', 
    'minddnd-wa-submenu-page', 
    'minddnd_wa_settings_section'
  );

  add_settings_field( 
    'minddnd_wa_settings_section_announcement_msg', 
    __('Announcement Banner Message', 'wp-website-announcements'), 
    'minddnd_wa_settings_section_announcement_msg_html', 
    'minddnd-wa-submenu-page', 
    'minddnd_wa_settings_section'
  );


  add_settings_field( 
    'minddnd_wa_settings_section_announcement_linkable', 
    __('Make Message a Link?', 'wp-website-announcements'), 
    'minddnd_wa_settings_section_announcement_linkable_html', 
    'minddnd-wa-submenu-page', 
    'minddnd_wa_settings_section'
  );

  add_settings_field( 
    'minddnd_wa_settings_section_announcement_link', 
    __('Link URL', 'wp-website-announcements'), 
    'minddnd_wa_settings_section_announcement_link_html', 
    'minddnd-wa-submenu-page', 
    'minddnd_wa_settings_section'
  );

  add_settings_field( 
    'minddnd_wa_settings_section_custom_css', 
    __('Custom CSS', 'wp-website-announcements'), 
    'minddnd_wa_settings_section_custom_css', 
    'minddnd-wa-submenu-page', 
    'minddnd_wa_settings_section'
  );

  register_setting( 'minddnd_wa_plgn_settings', 'minddnd_wa_settings' );
}

add_action( 'admin_init', 'minddnd_wa_settings' );

// Show announcement radio buttons
function minddnd_wa_settings_section_show_announcement_html(){ 

  $options = get_option( 'minddnd_wa_settings' );

  $show_announcement = 'no'; // set as default when installed
  if( isset( $options[ 'show_announcement' ] ) ) {
    $show_announcement = esc_attr( $options['show_announcement'] );
  }

  $html = '<label for="wa_show_announcement_yes">Yes <input type="radio" id="wa_show_announcement_yes" name="minddnd_wa_settings[show_announcement]" value="yes"' . checked( 'yes', $show_announcement, false ) . '></label>&nbsp';

  $html .= '<label for="wa_show_announcement_no"> No
  	<input type="radio" id="wa_show_announcement_no" name="minddnd_wa_settings[show_announcement]" value="no"' . checked( 'no', $show_announcement, false ) . '></label><div class="wa-settings-details">Turn the Announcement Banner on and off as needed.</div>';

  echo $html;

}

// Announcement Banner position
function minddnd_wa_settings_section_announcement_position_html(){ 

  $options = get_option( 'minddnd_wa_settings' );

  $wa_position = 'relative';
  if( isset( $options[ 'wa_position' ] ) ) {
    $wa_position = esc_attr( $options['wa_position'] );
  }
    
  $html = '<label for="wa_position_relative">Relative
    <input type="radio" id="wa_position_relative" name="minddnd_wa_settings[wa_position]" value="relative"' . checked( 'relative', $wa_position, false ) . '></label>&nbsp';

  $html .= '<label for="wa_position_fixed">Fixed <input type="radio" id="wa_position_fixed" name="minddnd_wa_settings[wa_position]" value="fixed"' . checked( 'fixed', $wa_position, false ) . '></label><div class="wa-settings-details">The fixed setting will pin the banner to the top of the screen. It will stay pinned to the top even when scrolling. Relative will keep the banner in its normal position and it will scroll with the page.</div>';

  echo $html;
 
}

function minddnd_wa_settings_section_announcement_placement_html(){

  $options = get_option( 'minddnd_wa_settings' );

  $wa_placement = 'top';
  if( isset( $options[ 'wa_placement' ] ) ) {
    $wa_placement = esc_attr( $options['wa_placement'] );
  }
    
  $html = '<label for="wa_placement_top">Top
    <input type="radio" id="wa_placement_top" name="minddnd_wa_settings[wa_placement]" value="top"' . checked( 'top', $wa_placement, false ) . '></label>&nbsp';

  $html .= '<label for="wa_placement_bottom">Bottom <input type="radio" id="wa_placement_bottom" name="minddnd_wa_settings[wa_placement]" value="bottom"' . checked( 'bottom', $wa_placement, false ) . '></label><div class="wa-settings-details">The default Announcement Banner placement is at the top. </div>';

  echo $html;

}

// Background Color
function minddnd_wa_settings_background_color_html(){

  $options = get_option( 'minddnd_wa_settings' );
  $wa_background_color = '#FFF';
  if( isset( $options[ 'wa_background_color' ] ) ) {
    $wa_background_color = esc_attr( $options['wa_background_color'] );
  }

  $html = '<label for="wa_background_color">
    <input type="text" id="wa_background_color" name="minddnd_wa_settings[wa_background_color]" value="' . $wa_background_color . '"></label><div class="wa-settings-details">Hex code (Ex: #000000) or supported color name (Ex: Black). Default background color is white. (#FFF) </div>'; 
  echo $html;
}

// Text Color 
function minddnd_wa_settings_text_color_html(){
  $options = get_option( 'minddnd_wa_settings' );
  $wa_text_color = '#333';
  if( isset( $options[ 'wa_text_color' ] ) ) {
    $wa_text_color = esc_attr( $options['wa_text_color'] );
  }

  $html = '<label for="wa_text_color">
    <input type="text" id="wa_text_color" name="minddnd_wa_settings[wa_text_color]" value="' . $wa_text_color . '"></label><div class="wa-settings-details">Hex code (Ex: #000000) or supported color name (Ex: Black). Default text color is dark gray. (#333) </div>'; 
  echo $html;
}

// Banner Height
function minddnd_wa_settings_height_html(){
  $options = get_option( 'minddnd_wa_settings' );
  $wa_height = '';
  if( isset( $options[ 'wa_height' ] ) ) {
    $wa_height = esc_attr(  $options['wa_height'] );
  }

  $html = '<label for="wa_height">
    <input type="number" id="wa_height" name="minddnd_wa_settings[wa_height]" value="' . $wa_height . '"> <span>px</span></label><div class="wa-settings-details">Set a fixed height for your announcement banner. Leave this field blank to allow the banner contents to determine the height. Note: If you set a fixed height and your text is too long it will overflow outside the banner. </div>'; 
  echo $html;
}

// Padding Top 
function minddnd_wa_settings_top_padding_html(){

  $options = get_option( 'minddnd_wa_settings' );
  $wa_padding_top = '';
  if( isset( $options[ 'wa_padding_top' ] ) ) {
    $wa_padding_top = esc_attr( $options['wa_padding_top'] );
  }

  $html = '<label for="wa_padding_top">
    <input type="number" id="wa_padding_top" name="minddnd_wa_settings[wa_padding_top]" value="' . $wa_padding_top . '"> <span>px</span></label><div class="wa-settings-details">Add top padding the body element when the Announcement Banner is displayed. This can be useful when the banner is set to position: fixed.</div>'; 
  echo $html;
}

// include a close button
function minddnd_wa_settings_wa_close_html(){
  $options = get_option( 'minddnd_wa_settings' );
  $wa_close_btn = 'no';
  if( isset( $options[ 'wa_close_btn' ] ) ) {
    $wa_close_btn = esc_attr( $options['wa_close_btn'] );
  }

  $html = '<label for="wa_close_btn_yes">Yes
    <input type="radio" id="wa_close_btn_yes" name="minddnd_wa_settings[wa_close_btn]" value="yes"' . checked( 'yes', $wa_close_btn, false ) . '></label>&nbsp';

  $html .= '<label for="wa_close_btn_no">No <input type="radio" id="wa_close_btn_no" name="minddnd_wa_settings[wa_close_btn]" value="no"' . checked( 'no', $wa_close_btn, false ) . '></label><div class="wa-settings-details">The close button will hide the banner on click. </div>';
 
  echo $html;
}

// close banner duration options

function minddnd_wa_close_banner_duration_html(){
  $options = get_option( 'minddnd_wa_settings' );
  $wa_banner_duration = 0;
  if( isset( $options[ 'wa_banner_duration' ] ) ) {
    $wa_banner_duration = esc_html( intval( $options['wa_banner_duration'] )) ;
  }

  $html = '<label for="wa_banner_duration">
    <input type="number" id="wa_banner_duration" name="minddnd_wa_settings[wa_banner_duration]" value="' . $wa_banner_duration . '"> <span>Day(s)</span></label><div class="wa-settings-details">If the Close Button is enabled, use this field to set the number of days that the banner is hidden after a user closes it. Setting this value to 0 (zero) will allow the banner to be displayed again after each page load. </div>'; 
  echo $html;

}

// Announcement Banner Message

function minddnd_wa_settings_section_announcement_msg_html(){ 

  $options = get_option( 'minddnd_wa_settings' );

  $wa_message = '';
  
  if( isset( $options[ 'wa_message' ] ) ) {
    $allowed_html = wp_kses_allowed_html( 'post' );
    $wa_message = wp_kses($options['wa_message'], $allowed_html ); 
  }

  $html = '<label for="wa_message"></label><textarea id="wa_message" name="minddnd_wa_settings[wa_message]" rows="5" cols="50">' .  $wa_message . '</textarea><div class="wa-settings-details">HTML is allowed.</div>';

  echo $html;

}

function minddnd_wa_settings_section_announcement_linkable_html() {
  $options = get_option( 'minddnd_wa_settings' );

  $wa_make_linkable = 'no';
  if( isset( $options[ 'wa_make_linkable' ] ) ) {
    $wa_make_linkable = esc_html( $options['wa_make_linkable'] );
  }

  $html = '<label for="wa_make_linkable_yes">Yes <input type="radio" id="wa_make_linkable_yes" name="minddnd_wa_settings[wa_make_linkable]" value="yes"' . checked( 'yes', $wa_make_linkable, false ) . '></label>&nbsp';

  $html .= '<label for="wa_make_linkable_no"> No
    <input type="radio" id="wa_make_linkable_no" name="minddnd_wa_settings[wa_make_linkable]" value="no"' . checked( 'no', $wa_make_linkable, false ) . '></label><div class="wa-settings-details">Make the full text of the announcement banner message a link. </div>';

  echo $html;
}

function minddnd_wa_settings_section_announcement_link_html(){

  $options = get_option( 'minddnd_wa_settings' );
  $wa_link = '';
  if( isset( $options[ 'wa_link' ] ) ) {
    $wa_link = esc_html( $options['wa_link'] );
  }

  $html = '<label for="wa_link">
    <input type="text" id="wa_link" name="minddnd_wa_settings[wa_link]" value="' . $wa_link . '"></label><div class="wa-settings-details">URL for the message link. This will only work if Make Message a Link setting is set to Yes. </div>'; 
  echo $html;

}

// custom CSS
function  minddnd_wa_settings_section_custom_css() { 

  $options = get_option( 'minddnd_wa_settings' );

  $wa_custom_css = '';
  if( isset( $options[ 'wa_custom_css' ] ) ) {
    $wa_custom_css = esc_html( $options['wa_custom_css'] );
  }

  $html = '<label for="wa_custom_css"></label>
  <textarea id="wa_custom_css" name="minddnd_wa_settings[wa_custom_css]" rows="15" cols="50">' .  $wa_custom_css . '</textarea><div class="wa-settings-details">Add your own custom CSS. </div>';

  echo $html;

}

function minddnd_wa_settings_section_callback() {

  esc_html_e( 'The Announcements Banner Plugin allows you to post a custom message on your WordPress site.', 'wp-website-announcements' );

}