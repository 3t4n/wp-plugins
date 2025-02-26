<?php
//add to menu dashboard
if( is_admin() ) {
  add_action( 'admin_menu', 'tf_testimonials_options' );
}
function tf_testimonials_options() {
  // subpage
  add_submenu_page( 'edit.php?post_type=tf_testimonials', 'Options', 'Options','manage_options', 'sc-admin-menu', 'sc_create_admin_dashboard' );
}
function sc_create_admin_dashboard() {
  ?>
  <div class="tf_options">
  <?php screen_icon(); ?>
  <h2>alpha Options</h2>

  <form action="options.php" method="post">

  <div class="options-inner">

  <?php 
  settings_fields('sc_options');
  do_settings_sections('sc-settings-admin');
  ?>

  </div> 

  <?php submit_button(); ?>
   
  </form>

  </div>
  <?php
}
if( is_admin() ) {
  add_action( 'admin_init', 'sc_register_options' );
}
function sc_register_options() {
  //add settings
  register_setting( 'sc_options', 'alpha-title' );
  register_setting( 'sc_options', 'alpha-title_clr' );
  register_setting( 'sc_options', 'alpha-background' );
  register_setting( 'sc_options', 'alpha-bubble' );
  register_setting( 'sc_options', 'alpha-layout' );
  register_setting( 'sc_options', 'alpha-delay' );
  register_setting( 'sc_options', 'alpha-autoplay' );
  register_setting( 'sc_options', 'alpha-bck-img' );
  register_setting( 'sc_options', 'alpha-text' );
  register_setting( 'sc_options', 'alpha-quotes' );
  add_settings_field('options', 'Options:', 'options_callback', 'sc-settings-admin', 'sc-defaults');
  add_settings_section( 'sc-defaults', 'Alpha Testimonials', 'stats_section_info', 'sc-settings-admin' );
}//sc_register_options

function options_callback() {
  $title = get_option('alpha-title');
  $title_color = get_option('alpha-title_clr');
  $bubble = get_option('alpha-bubble');
  $bck = get_option('alpha-background');
  $layout = get_option('alpha-layout');  
  $delay = get_option('alpha-delay');
  $autoplay = get_option('alpha-autoplay'); 
  $text_color = get_option('alpha-text');
  $quotes = get_option('alpha-quotes');
  $image_id = get_option('alpha-bck-img');
  $image_attributes = wp_get_attachment_image_src( $image_id, array(72,72));
  //creating actual fields that will hold the options
  $html = '<table>';
  $html .= '<tr><td><h4>Testimonials Layout</h4></td>';
  $html .= '<td class="op-wide"><label for="ldf" class="layout-sel active"><input type="radio" class="toggle layout" id="ldf" name="alpha-layout[]" value="default" ' . ( $layout[0] === 'default' ? 'checked="checked"' : '' )  . ' /><img src="'. plugin_dir_url( __FILE__ ) . '../assets/images/def.png' .'"/></label>';
  $html .= '<label for="lalt" class="layout-sel"><input type="radio" class="toggle layout" id="lalt" name="alpha-layout[]" value="alt" ' . ( $layout[0] === 'alt' ? 'checked="checked"' : '' ) . ' /><img src="'. plugin_dir_url( __FILE__ ) . '../assets/images/alt.png' .'"/></label></td></tr>';
  $html .= '<tr><td><h4>Section Title</h4><span class="description">Enter some text that will appear above testimonials, or leave it blank.</span></td>';
  $html .= '<td class="op-wide"><input type="text" id="alpha-title" name="alpha-title" value="' . $title . '" /></td></tr>';
  $html .= '<tr><td><h4>Title Color</h4></td>';
  $html .= '<td class="op-wide"><input type="text" id="alpha-title_clr" class="color" name="alpha-title_clr" value="' . ( !empty($title_color) ? $title_color : '#fafafa' ) . '" /></td></tr>';
  $html .= '<tr><td><h4>Background Color</h4><span class="description">Select a background color</span></td>';
  $html .= '<td class="op-wide"><input type="text" id="alpha-background" name="alpha-background" class="color" value="' . $bck . '" /></td></tr>';
  $html .= '<tr><td><h4>Background Image</h4><span class="description">Or Select a Testimonials section background image. To use color instead, you need to remove image.</span></td>';
  $html .= '<td class="op-wide"><img class="custom_image" src="'. $image_attributes[0] .'" width="100%" height="230" style="'. ( ! $image_id ? 'display:none;' : '' ) . ' display: block;  margin: auto;" />';
  $html .= '<a href="#" class="cus_image_add" style="'. (! $image_id ? '' : 'display:none;') .'">Add Background image</a>';
  $html .= '<a href="#" class="cus_image_remove" style="'. ( ! $image_id ? 'display:none;' : '' ) .'">Remove image</a> ';
  $html .= '<input class="cus_media_id" type="hidden" name="alpha-bck-img" value="'. $image_id .'">';
  $html .= '</td></tr>';
  $html .= '<tr><td><h4>Speech Bubble Background Color</h4></td>';
  $html .= '<td class="op-wide"><input type="text" id="alpha-bubble" class="color" name="alpha-bubble" value="' . ( !empty($bubble) ? $bubble : 'steelblue' ) . '" /></td></tr>';
  $html .= '<tr><td><h4>Text Color</h4></td>';
  $html .= '<td class="op-wide"><input type="text" id="alpha-text" class="color" name="alpha-text" value="' . ( !empty($text_color) ? $text_color : '#e7e7e7' ) . '" /></td></tr>';
  $html .= '<tr><td><h4>Quotes Color</h4></td>';
  $html .= '<td class="op-wide"><input type="text" id="alpha-quotes" class="color" name="alpha-quotes" value="' . ( !empty($quotes) ? $quotes : '#fefefe' ) . '" /></td></tr>';
  $html .= '<tr><td><h4>Autoplay</h4> <span class="description">Enable/Disable Autoplay</span></td>';
  $html .= '<td class="op-wide"><label for="enabled" id="enable" class="btn button-enable active"><input type="radio" class="toggle" id="enabled" name="alpha-autoplay[]" value="on" ' . ( $autoplay[0] === 'on' ? 'checked="checked"' : '' )  . ' /> Enable</label>';
  $html .= '<label for="disabled" id="disable" class="btn button-disable"><input type="radio" class="toggle" id="disable" name="alpha-autoplay[]" value="off" ' . ( $autoplay[0] === 'off' ? 'checked="checked"' : '' ) . ' /> Disable</label></td></tr>';
  $html .= '<tr id="delay" class="no-vis"><td><h4>Autoplay Delay</h4><span class="description">Choose between 2 and 10s (2000-10000ms).</span></td>';
  $html .= '<td class="op-wide"><input type="range" id="alpha-delay" name="alpha-delay" step="100" min="2000" max="10000" value="' . ( !empty($delay) ? $delay : 3500 ) . '" /><span id="delay-val">'. ( !empty($delay) ? $delay : 3500 ) . ' ms</span></td></tr>';
  $html .= '</table>';
  $html .= '<h4>For documentation visit <a href="http://themeflection.com/docs/alpha/">this link</a></h4>';
   $html .= '<em style="color: olive">Support me by voting my plugin at wordpress.org repository and spreading the word by sharing it on <a href="https://www.facebook.com/permalink.php?story_fbid=846004915448750&id=837559916293250">facebook</a>, or <a href="https://plus.google.com/+Themeflectionthemeflection/posts/c1Vjgir9E3G">google+</a>.</em>';

  echo $html;

}//stats_callback end

function stats_section_info() {
  echo 'Options';
}
?>