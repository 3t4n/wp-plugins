<?php 

/**
 * Enqueue Backend Scripts
 */
add_action( 'admin_enqueue_scripts', 'exggmap_enqueue_admin' );
function exggmap_enqueue_admin( $hook_suffix ) {
  $screen = get_current_screen(); 
  // Prevent Backend-script from loading in every admin page
  if($screen->id !== 'settings_page_exggmap_options_page') {
    return;
  }
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'backend-script-handle-maps', plugins_url('/js/gdpr-maps-backend-script.js', __FILE__ ), array( 'wp-color-picker' ), EXGGMAP_VERSION, true );
}

/**
 * Plugin Options and Settings
 */
add_action( 'admin_init', 'register_exggmap_settings' );
function register_exggmap_settings() {

  register_setting(
    'exggmap_option_group', // option_group
    'exggmap_option', // option_name
    'exggmap_sanitize'  // sanitize_callback
  );
  
  add_settings_section(
    'exggmap_section', // id
    __('Settings', 'exactly-gdpr-google-maps'), // title
    'exggmap_section_heading_callback', // callback
    'exggmap_options_page' // page
  );

  add_settings_field(
    'exggmap_google_iframe', // id
    __('Google Iframe', 'exactly-gdpr-google-maps'), // title
    'exggmap_google_iframe_callback' , // callback
    'exggmap_options_page', // page
    'exggmap_section' // section
  );

  add_settings_field(
    'exggmap_map_width',
    __('Map Width', 'exactly-gdpr-google-maps'),
    'exggmap_map_width_callback',
    'exggmap_options_page', 
    'exggmap_section'
  );

  add_settings_field(
    'exggmap_map_height', 
    __('Map Height', 'exactly-gdpr-google-maps'),
    'exggmap_map_height_callback' , 
    'exggmap_options_page', 
    'exggmap_section' 
  );

  add_settings_field(
    'exggmap_layer_text', 
    __('Layer Text', 'exactly-gdpr-google-maps'),
    'exggmap_layer_subtitle_callback' , 
    'exggmap_options_page', 
    'exggmap_section' 
  );

  add_settings_field(
    'exggmap_button_title',
    __('Button Title', 'exactly-gdpr-google-maps'), 
    'exggmap_button_title_callback',
    'exggmap_options_page',
    'exggmap_section'
  );

  add_settings_field(
    'exggmap_anchor_text',
    __('Anchor Text', 'exactly-gdpr-google-maps'), 
    'exggmap_anchor_text_callback',
    'exggmap_options_page',
    'exggmap_section'
  );
  
  add_settings_field(
    'exggmap_layer_background_color',
    __('Background Color', 'exactly-gdpr-google-maps'),
    'exggmap_layer_background_color_callback', 
    'exggmap_options_page',
    'exggmap_section'
  );

  add_settings_field(
    'exggmap_button_background_color',
    __('Button Background Color', 'exactly-gdpr-google-maps'),
    'exggmap_button_background_color_callback', 
    'exggmap_options_page',
    'exggmap_section'
  );

  add_settings_field(
    'exggmap_layer_font_color',
     __('Font Color', 'exactly-gdpr-google-maps'),
    'exggmap_layer_font_color_callback' ,
    'exggmap_options_page',
    'exggmap_section'
  );

  add_settings_field(
    'exggmap_enable_powered_by',
    '&#9829; ' . __('Activate the Powered By Link', 'exactly-gdpr-google-maps'),
    'exggmap_enable_powered_by_callback',
    'exggmap_options_page',
    'exggmap_section'
  );
} 


add_action('admin_menu', 'exggmap_plugin_menu');
function exggmap_plugin_menu(){
  add_options_page( 'Exactly GDPR Map Page', __('GDPR Google Maps', 'exactly-gdpr-google-maps'), 'manage_options','exggmap_options_page', 'exggmap_add_options');
}

function exggmap_add_options () { ?>
 
<h1><?php echo __('exovia GDPR Google Maps', 'exactly-gdpr-google-maps'); ?></h1>
<p style="font-size: 1.1rem; line-height: 2;"><?php echo __('Simply insert your exovia GDPR map using the shortcode below:', 'exactly-gdpr-google-maps') ?> <br><b style="font-size:1.25rem; background:white;">[exactly-gdpr-map]</b></p>
<form method="post" action="options.php">
  <?php
    settings_fields( 'exggmap_option_group' );
    do_settings_sections( 'exggmap_options_page' );
    submit_button();
  ?>
</form>

<?php }

/**
 * Sanitize
 */
function exggmap_sanitize($input) {

$sanitary_values = array();

if ( isset( $input['exggmap_google_iframe'] ) ) {
  $sanitary_values['exggmap_google_iframe'] = strip_tags( $input['exggmap_google_iframe'], '<iframe>' );
}

if ( isset( $input['exggmap_button_title'] ) ) {
  $sanitary_values['exggmap_button_title'] = sanitize_text_field( $input['exggmap_button_title'] );
}
if ( isset( $input['exggmap_anchor_text'] ) ) {
  $sanitary_values['exggmap_anchor_text'] = sanitize_text_field( $input['exggmap_anchor_text'] );
}

if ( isset( $input['exggmap_map_width'] ) ) {
  $sanitary_values['exggmap_map_width'] = sanitize_text_field( $input['exggmap_map_width'] );
}

if ( isset( $input['exggmap_map_height'] ) ) {
  $sanitary_values['exggmap_map_height'] = sanitize_text_field( $input['exggmap_map_height'] );
}

if ( isset( $input['exggmap_layer_text'] ) ) {
  $sanitary_values['exggmap_layer_text'] = esc_textarea( $input['exggmap_layer_text'] );
}

if ( isset( $input['exggmap_layer_background_color'] ) ) {
  $sanitary_values['exggmap_layer_background_color'] = sanitize_text_field( $input['exggmap_layer_background_color'] );
}

if ( isset( $input['exggmap_button_background_color'] ) ) {
  $sanitary_values['exggmap_button_background_color'] = sanitize_text_field( $input['exggmap_button_background_color'] );
}

if ( isset( $input['exggmap_layer_font_color'] ) ) {
  $sanitary_values['exggmap_layer_font_color'] = sanitize_text_field( $input['exggmap_layer_font_color'] );
}

if ( isset( $input['exggmap_enable_powered_by'] ) ) {
  $sanitary_values['exggmap_enable_powered_by'] = $input['exggmap_enable_powered_by'];
}

return $sanitary_values;
}

/**
 * Field Callbacks
 */

function exggmap_google_iframe_callback() {
  $options = get_option('exggmap_option');
  printf(
    '<textarea class="large-text" rows="4" name="exggmap_option[exggmap_google_iframe]" id="exggmap_google_iframe">%s</textarea>',
    isset( $options['exggmap_google_iframe'] ) && !empty($options['exggmap_google_iframe']) ? esc_attr( $options['exggmap_google_iframe']) : '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2373.7378779644846!2d10.220001315391263!3d53.49101317156689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b1f261a2851b8d%3A0x888d5265c23338a6!2sSeniorenzentrum%20St.%20Klara!5e0!3m2!1sen!2sde!4v1586632120317!5m2!1sen!2sde" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>'
  );
  echo '<span>' . __('Replace this code with your iframe from Google Maps. You can find this under share and then include map.', 'exactly-gdpr-google-maps') . '<span/>';
}

function exggmap_map_width_callback() {
  $options = get_option('exggmap_option');
  printf(
    '<input class="regular-text" type="text" name="exggmap_option[exggmap_map_width]" id="exggmap_map_width" value="%s">',
    isset($options['exggmap_map_width'])  ? esc_attr( $options['exggmap_map_width']) : ''
  );
  echo '<br><span>' . __('Default Value:', 'exactly-gdpr-google-maps') . ' 16<span/>';
}

function exggmap_map_height_callback() {
  $options = get_option('exggmap_option');
  printf(
    '<input class="regular-text" type="text" name="exggmap_option[exggmap_map_height]" id="exggmap_map_height" value="%s">',
    isset($options['exggmap_map_height'])   ? esc_attr( $options['exggmap_map_height']) : ''
  );
  echo '<br><span>' . __('Default Value:', 'exactly-gdpr-google-maps') . ' 9<span/>';
}

function exggmap_button_title_callback() {
  $options = get_option('exggmap_option');
  printf(
    '<input class="regular-text" type="text" name="exggmap_option[exggmap_button_title]" id="exggmap_button_title" value="%s">',
    isset( $options['exggmap_button_title'] ) ? esc_attr( $options['exggmap_button_title']) : ''
  );
  echo '<br><span>' . __('Default Value:', 'exactly-gdpr-google-maps') .' ' . __('Load Map', 'exactly-gdpr-google-maps') . '<span/>';
}
function exggmap_anchor_text_callback() {
  $options = get_option('exggmap_option');
  printf(
    '<input class="regular-text" type="text" name="exggmap_option[exggmap_anchor_text]" id="exggmap_anchor_text" value="%s">',
    isset( $options['exggmap_anchor_text'] ) ? esc_attr( $options['exggmap_anchor_text']) : ''
  );
  echo '<br><span>' . __('Default Value:', 'exactly-gdpr-google-maps') .' ' . __('Learn More', 'exactly-gdpr-google-maps') . '<span/>';
}

function exggmap_layer_subtitle_callback() {
  $options = get_option('exggmap_option');
  printf(
    '<textarea class="large-text" rows="2" name="exggmap_option[exggmap_layer_text]" id="exggmap_layer_text">%s</textarea>',
    isset( $options['exggmap_layer_text'] ) ? esc_attr( $options['exggmap_layer_text']) : ''
  );
  echo '<br><span>' . __('Default Value:', 'exactly-gdpr-google-maps') .' ' . __('By loading the map you accept the privacy policy of Google.', 'exactly-gdpr-google-maps') . '<span/>';
}

function exggmap_layer_background_color_callback() {
  $options = get_option('exggmap_option');
  printf(
    '<input class="color-picker-field" type="text" name="exggmap_option[exggmap_layer_background_color]" id="exggmap_layer_background_color" value="%s">',
    isset( $options['exggmap_layer_background_color'] )  ? esc_attr( $options['exggmap_layer_background_color']) : ''
  );
   echo '<br><span>' . __('Default Value:', 'exactly-gdpr-google-maps') . ' #000000<span/>';
}

function exggmap_button_background_color_callback() {
  $options = get_option('exggmap_option');
  printf(
    '<input class="color-picker-field" type="text" name="exggmap_option[exggmap_button_background_color]" id="exggmap_button_background_color" value="%s">',
    isset( $options['exggmap_button_background_color'] )  ? esc_attr( $options['exggmap_button_background_color']) : ''
  );
   echo '<br><span>' . __('Default Value:', 'exactly-gdpr-google-maps') . ' #693e91<span/>';
}

function exggmap_layer_font_color_callback() {
  $options = get_option('exggmap_option');
  printf(
    '<input class="color-picker-field" type="text" name="exggmap_option[exggmap_layer_font_color]" id="layer_background_color" value="%s">',
    isset( $options['exggmap_layer_font_color'] )  ? esc_attr( $options['exggmap_layer_font_color']) : ''
  );
   echo '<br><span>' . __('Default Value:', 'exactly-gdpr-google-maps') . ' #ffffff<span/>';
}

function exggmap_enable_powered_by_callback() {
  $options = get_option('exggmap_option');
  printf(
    '<input type="checkbox" name="exggmap_option[exggmap_enable_powered_by]" id="exggmap_enable_powered_by" value="exggmap_enable_powered_by" %s>',
    ( isset( $options['exggmap_enable_powered_by'] ) && $options['exggmap_enable_powered_by'] === 'exggmap_enable_powered_by' ) ? 'checked' : ''
  );
  echo '<label for="exggmap_enable_powered_by">'. __('recommended', 'exactly-gdpr-google-maps') . '</label>';
  echo '<br><span class="exggmap-marker" style="display:none; color:#cc2e58; margin-top:.5rem">' . __('You have disabled credits. Please remember to include a corresponding note with a backlink to https://www.exovia.de/ in your privacy policy. You can simply copy the following HTML example into your imprint.', 'exactly-gdpr-google-maps') . '</span>';
  echo '<span class="exggmap-marker" style="display:none; color:#cc2e58;">' . __('You could copy the following HTML', 'exactly-gdpr-google-maps') . '</span>';
  echo '<br><span class="exggmap-marker" style="display:none; background-color:#000; color:white; font-size: 1rem; padding: 2rem; max-width:95%">' . 
    '<span class="exggmap-lang">' .  '&lt;h3&gt;Google Maps&lt;/h3&gt;&lt;br&gt;&lt;p&gt;To ensure protection against unwanted connections with external services from Google Maps, we use the GDPR Map Tool from the Hamburg-based &lt;a href=&quot;https://www.exovia.de&quot;&gt;web design agency exovia&lt;/a&gt;.&lt;/p&gt;'  . '</span>'  .
    '<span class="exggmap-lang" style="display:none;">' .  '&lt;h3&gt;Google Maps&lt;/h3&gt;&lt;br&gt;&lt;p&gt;Um Sie vor unerw&uuml;nschten Verbindungen mit externen Diensten von Google Maps zu sch&uuml;tzen, nutzen wir das GDPR Map Tool der &lt;a href=&quot;https://www.exovia.de&quot;&gt;Webdesign-Agentur exovia&lt;/a&gt; aus Hamburg.&lt;/p&gt;'  . '</span>' 
    .'</span>';
  echo '<br><span class="exggmap-marker"><span id="exggmap-language-switch" role="button" style="display:inline; border: 1px solid purple; padding: 2px 5px; cursor: pointer;">' . __('Switch Language', 'exactly-gdpr-google-maps') .'</span></span>';
}

/**
 * Section Callback
 */
function exggmap_section_heading_callback () {}

/**
 * Link from Plugin Page to Plugin Settings
 */
add_filter('plugin_action_links_' . EXGGMAP_PLUGIN_BASENAME, 'exggmap_add_plugin_page_settings_link');
function exggmap_add_plugin_page_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=exggmap_options_page' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}