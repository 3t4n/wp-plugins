<?php
/**
 * Security check
 *
 * Prevent direct access to the file.
 *
 * @since 1.3
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Contact Form 7 TextMe fields
 *
 * Add CF7 fields to TextME settings page.
 *
 * @param $textme_option
 *
 * @since 1.4
 */
function textme_sms_elementor_fields( $textme_option ) {


	$plugin_name    = 'elementor-pro/elementor-pro.php';
	$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );

	if ( in_array( $plugin_name, $active_plugins ) ) {
		?>
        <div class="postbox">

            <h2 class="hndle">
				<?php esc_html_e( 'Elementor forms Events', 'textme-sms-integration' ); ?>
            </h2>

            <div class="inside">

                <fieldset>
                    <label for="textme_elementor">
                        <input type="checkbox" id="textme_elementor" name="textme_elementor"
                               value="1" <?php if ( isset( $textme_option['textme_elementor'] ) == "1" ) {
							echo 'checked';
						} ?>/>
                        <span><?php esc_html_e( 'Send SMS to site admin when form submitted', 'textme-sms-integration' ); ?></span>
                    </label>
                </fieldset>


                <fieldset>
                    <label for="textme_elementor_user">
                        <input type="checkbox" id="textme_elementor_user" name="textme_elementor_user"
                               value="1" <?php if ( isset( $textme_option['textme_elementor_user'] ) == "1" ) {
							echo 'checked';
						} ?>/>
                        <span><?php esc_html_e( 'Send SMS to user when form submitted', 'textme-sms-integration' ); ?></span>
                    </label>
                    <div class="send_user_sms <?php if ( isset( $textme_option['textme_elementor_user'] ) != "1" ) {
						echo 'hidden';
					} ?>">
                        <table>
                            <tr>
                                <td>
                                    <span><?php esc_html_e( 'Content sent to user', 'textme-sms-integration' ); ?></span>
                                </td>
                                <td>
                                 <textarea id="textme_elementor_user_content"
                                           name="textme_elementor_user_content" cols="80"
                                           rows="3"
                                           class="all-options"><?php if ( isset( $textme_option['textme_elementor_user_content'] ) ) {
		                                 echo esc_textarea( $textme_option['textme_elementor_user_content'] );
	                                 } ?></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>

                </fieldset>


            </div>

        </div>
		<?php
	}

}

add_action( 'textme_sms_form_fields', 'textme_sms_elementor_fields', 10, 1 );


/**
 * Contact Form 7 mail sent
 *
 * TextME SMS on successful Contact Form 7 mail submission.
 *
 * @param $contact_form
 *
 * @since 1.0
 */
function textme_sms_elementor( $record, $ajax_handler ) {


	$sms_geteway = new \textme\sms_geteway();
	$account     = get_option( 'textme_sms_account' );
	$option      = get_option( 'textme_sms_option' );
	$fields      = $record->get( 'fields' );

	if ( 1 == $option['textme_elementor'] ) {


		$sms = '';
		foreach ( $fields as $key => $field ) {

			$sms .= $field['title'] . ': ' . $field['value'] . " \n ";
		}

		$sms_geteway->send_sms( $sms, $account['sms_phone'] );
	}

	if ( 1 == $option['textme_elementor_user'] ) {
		$phone = '';
		foreach ( $fields as $field ) {
			if ( $field['type'] == 'tel' ) {
				$phone = $field['value'];
			}
		}

		$sms_geteway->send_sms( $option['textme_elementor_user_content'], $phone );
	}

}

add_action( 'elementor_pro/forms/validation', 'textme_sms_elementor', 10, 2 );
