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
                <label for="hmls_template_default"><?php _e('Normal', HMLS_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="radio" name="hmls_template" id="hmls_template_default" value="<?php _e('default', HMLS_TXT_DOMAIN); ?>" <?php if ( 'default' === $hmls_template ) { echo 'checked'; } ?>>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_template_grayscale"><?php _e('Grayscale', HMLS_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="radio" name="hmls_template" id="hmls_template_grayscale" value="<?php _e('grayscale', HMLS_TXT_DOMAIN); ?>" <?php if ( 'grayscale' === $hmls_template ) { echo 'checked'; } ?>>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_template_rtl"><?php _e('Right To Left', HMLS_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="radio" name="hmls_template" id="hmls_template_rtl" value="<?php _e('rtl', HMLS_TXT_DOMAIN); ?>" <?php if ( 'rtl' === $hmls_template ) { echo 'checked'; } ?>>
            </td>
        </tr>
    </table>
    <p class="submit"><button id="updateSlideTemplate" name="updateSlideTemplate" class="button hmls-button button-primary"><?php _e('Save Settings', HMLS_TXT_DOMAIN); ?></button></p>
</form>