<?php
/**
 * SA Corona Banner Call Backs file.
 */

/**
 * top level menu item callback functions
 */
function options_page_content() {
  // check user capabilities
  if ( ! current_user_can( 'manage_options' ) ) {

    return;

  }

  if ( isset( $_GET[ 'settings-updated' ] ) ) {

    // add settings saved message with the class of "updated"
    add_settings_error( 'rbd_messages', 'rbd_message', __( 'Settings Saved', 'rbd' ), 'updated' );

  }

  // show error/update messages
  settings_errors( 'rbd_messages' );

  ?>

    <div class="wrap">
      <img src="<?php echo plugin_dir_url( __FILE__ ) . ( '../../assets/images/covid-500.jpg' );?>"/>
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

      <form action="options.php" method="post">
        <?php

        settings_fields( 'banner' );

        register_setting(
          __FILE__,
          'banner_options',
          array(
            'string',
            'validate_options'
          )
        ); // option group, option name, sanitize cb

        do_settings_sections( 'banner' );

        submit_button( 'Save Settings' );

        ?>
      </form>

    </div>

  <?php

}

/**
 * Get Banner Options
 *
 * @return array
 *
 */

function banner_options(){

  return get_option( 'banner_options' );

}

/**
 * Banner position
 *
 * @uses banner_options
 *
 */
function banner_position_field() {

  $options = banner_options();

  ?>

  <p class="description">
    <?php esc_html_e( 'Selected your preferred banner position.' ); ?>
  </p>

  <select id="banner_position" name="banner_options[banner_position]">
    <option value="" <?php echo ( "banner_topScroll" === $options['banner_position'] ? 'selected' : '' );?> >
      <?php esc_html_e( 'None', 'rbd' ); ?>
    </option>
    <option value="banner_topScroll" <?php echo ( "banner_topScroll" === $options['banner_position'] ? 'selected' : '' );?> >
      <?php esc_html_e( 'Top & scroll', 'rbd' ); ?>
    </option>
    <option value="banner_topFixed" <?php echo ( "banner_topFixed" === $options['banner_position'] ? 'selected' : '' );?> >
      <?php esc_html_e( 'Top & fixed', 'rbd' ); ?>
    </option>
    <option value="banner_bottomFixed" <?php echo ( "banner_bottomFixed" === $options['banner_position'] ? 'selected' : '' );?> >
      <?php esc_html_e( 'Bottom & fixed', 'rbd' ); ?>
    </option>
  </select>

  <ul>
    <li><strong>Top & scroll : </strong>Displays at the top of the site and scrolls with the page.</li>
    <li><strong>Top & fixed : </strong>Displays fixed at the top of the screen and the site scrolls behind it.</li>
    <li><strong>Bottom & fixed : </strong>Displays fixed at the bottom of the screen and the site scrolls behind it.</li>
  </ul>

  <?php

}

/**
 * Banner style
 *
 * @uses banner_options
 *
 */
function banner_elements_fields(){

  $options = banner_options();

?>
  <p class="description">
    <?php esc_html_e( 'By default the banner will display the text if no fields are selected below. select the fields you would like to display.' ); ?>
    </br>
    Default text: <strong>For more information on COVID-19 and government regulation: Click Here</strong>
  </p>

  <div class="row">
    <input id="banner_style_image" type="checkbox" name="banner_options[display][image]" value="on" data-val="on" <?php echo ( isset( $options['display']['image'] ) ? 'checked' : '' );?> >
    <label for="banner_style_image">COVID-19 Bannner image</label>
  </div>

  <div class="row">
    <input id="banner_number" type="checkbox" name="banner_options[display][number]" value="on" data-val="on" <?php echo ( isset( $options['display']['number'] ) ? 'checked' : '' );?> >
    <label for="banner_number">COVID-19 Telephone number</label>
  </div>

  <div class="row">
    <input id="banner_whatsapp" type="checkbox" name="banner_options[display][whatsapp]" value="on" data-val="on" <?php echo ( isset( $options['display']['whatsapp'] ) ? 'checked' : '' );?> >
    <label for="banner_whatsapp">COVID-19 WhatsApp number</label>
  </div>

  <div class="row">
    <input id="banner_text" type="checkbox" name="banner_options[bannertext]" value="on" data-val="on" <?php echo ( isset( $options['bannertext'] ) ? 'checked' : '' );?> >
    <label for="banner_text">COVID-19 Banner text</label>
  </div>

<?php }

/**
 * Banner colours
 *
 * @uses banner_options
 *
 */
function banner_colour_fields(){

  $options = banner_options();

?>
  <div class="row">
    <input type="text" id="banner_colour_background" name="banner_options[colours][background]" value="<?php echo ( isset( $options['colours']['background'] ) ? $options['colours']['background'] : '#ffffff' ) ;?>" class="cpa-color-picker" >
    <label for="banner_colour_background">Banner background color</label>
  </div>

  <div class="row">
    <input type="text" id="banner_colour_text" name="banner_options[colours][text]" value="<?php echo ( isset( $options['colours']['text'] )  ? $options['colours']['text'] : '#000000' ) ;?>" class="cpa-color-picker" >
    <label for="banner_colour_text">Banner text color</label>
  </div>

  <div class="row">
    <input type="text" id="banner_colour_link" name="banner_options[colours][link]" value="<?php echo ( isset( $options['colours']['link'] )  ? $options['colours']['link'] : '#e95211' ) ;?>" class="cpa-color-picker" >
    <label for="banner_colour_link">Banner link color</label>
  </div>

<?php }


function validate_options( $fields ) {

  $valid_fields = array();

  // Validate Background Color
  $background = strip_tags( stripslashes( trim( $fields['colours']['background'] ) ) );
  $text = strip_tags( stripslashes( trim( $fields['colours']['text'] ) ) );
  $link = strip_tags( stripslashes( trim( $fields['colours']['link'] ) ) );

  // Check if is a valid hex color
  if( FALSE === check_color( $background ) ) {

    // Set the error message
    add_settings_error( 'rbd_messages', 'rbd_message', __( 'Please select a valid backgrounnd colour', 'rbd' ), 'error' );

    // Get the previous valid value
    $valid_fields['colours']['background'] = $options['colours']['background'];

  } else {

    $valid_fields['colours']['background'] = $background;

  }

  // Check if is a valid hex color
  if( FALSE === check_color( $text ) ) {

    // Set the error message
    add_settings_error( 'rbd_messages', 'rbd_message', __( 'Please select a valid text colour', 'rbd' ), 'error' );

    // Get the previous valid value
    $valid_fields['colours']['text'] = $options['background']['text'];

  } else {

    $valid_fields['colours']['text'] = $text;

  }

  // Check if is a valid hex color
  if( FALSE === check_color( $link ) ) {

    // Set the error message
    add_settings_error( 'rbd_messages', 'rbd_message', __( 'Please select a valid link colour', 'rbd' ), 'error' );

    // Get the previous valid value
    $valid_fields['colours']['link'] = $options['colours']['link'];

  } else {

    $valid_fields['colours']['link'] = $link;

  }

  return apply_filters( 'validate_options', $fields);

}

/**
 * Function that will check if value is a valid HEX color.
 */
function check_color( $value ) {

  if ( preg_match( '/^#[a-f0-9]{6}$/i', $value ) ) { // if user insert a HEX color with #
    return true;
  }

  return false;

}
?>
