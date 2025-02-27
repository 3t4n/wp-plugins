<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//print_r( $hmlsSlideTemplate );
foreach ( $hmlsSlideTemplate as $option_name => $option_value ) {
    if ( isset( $hmlsSlideTemplate[$option_name] ) ) {
        ${"" . $option_name}  = $option_value;
    }
}
?>
<form name="hmls_slide_template_form" role="form" class="form-horizontal" method="post" action="" id="hmls-slide-template-form">
    <table class="hmls-slide-template-settings-table">
        <tr>
            <th scope="row" colspan="3">
                <span><?php _e('Select a Template', HMLS_TXT_DOMAIN); ?> :</span>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Default', HMLS_TXT_DOMAIN); ?> :</label>
            </th>
            <td>
                <input type="radio" name="hmls_template" id="hmls_template_default" value="<?php _e('default', HMLS_TXT_DOMAIN); ?>" <?php if ( 'default' === $hmls_template ) { echo 'checked'; } ?>>
            </td>
            <td>
                <label for="hmls_template_default" class="hmls-template-label">
                    <img src="<?php echo esc_url( HMLS_ASSETS ) ; ?>img/default.jpg" alt="<?php _e('Default', HMLS_TXT_DOMAIN); ?>">
                </label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Classic', HMLS_TXT_DOMAIN); ?> :</label>
            </th>
            <td>
                <input type="radio" name="hmls_template" id="hmls_template_classic" value="<?php _e('classic', HMLS_TXT_DOMAIN); ?>" <?php if ( 'classic' === $hmls_template ) { echo 'checked'; } ?>>
            </td>
            <td>
                <label for="hmls_template_classic" class="hmls-template-label">
                    <img src="<?php echo esc_url( HMLS_ASSETS ) ; ?>img/classic.jpg" alt="<?php _e('classic', HMLS_TXT_DOMAIN); ?>">
                </label>
            </td>
        </tr>
    </table>
    <p class="submit"><button id="updateSlideTemplate" name="updateSlideTemplate" class="button hmls-button button-primary"><?php _e('Save Settings', HMLS_TXT_DOMAIN); ?></button></p>
</form>