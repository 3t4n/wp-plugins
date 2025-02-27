<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
//print_r( $hmlsSlideContentSettings );
foreach ( $hmlsSlideContentSettings as $option_name => $option_value ) {
    if ( isset( $hmlsSlideContentSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="hmls_slide_content_form" role="form" class="form-horizontal" method="post" action="" id="hmls-slide-content-form">
    <table class="hmls-slide-content-settings-table">
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Logo Per Slide', HMLS_TXT_DOMAIN );
?>:</label>
            </th>
            <td>
                <select name="hmls_logo_per_slide" class="medium-text">
                    <?php 
for ($logoPerSlideCounter = 1; $logoPerSlideCounter < 10; $logoPerSlideCounter++) {
    ?>
                        <option value="<?php 
    printf( '%d', $logoPerSlideCounter );
    ?>" <?php 
    echo ( $logoPerSlideCounter == $hmls_logo_per_slide ? 'selected' : '' );
    ?> ><?php 
    printf( '%d', $logoPerSlideCounter );
    ?></option>
                        <?php 
}
?>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_slide_autoplay"><?php 
_e( 'Enable Autoplay', HMLS_TXT_DOMAIN );
?>?</label>
            </th>
            <td>
                <input type="checkbox" name="hmls_slide_autoplay" id="hmls_slide_autoplay" value="true" <?php 
echo ( $hmls_slide_autoplay ? 'checked' : '' );
?> >
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_slide_center_mode"><?php 
_e( 'Enable Center Mode', HMLS_TXT_DOMAIN );
?>?</label>
            </th>
            <td>
                <input type="checkbox" name="hmls_slide_center_mode" id="hmls_slide_center_mode" value="true" <?php 
echo ( $hmls_slide_center_mode ? 'checked' : '' );
?> >
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Slide Interval', HMLS_TXT_DOMAIN );
?></label>
            </th>
            <td>
                <input type="number" name="hmls_slide_interval" value="<?php 
esc_attr_e( $hmls_slide_interval );
?>" >
                <code><?php 
_e( 'milliseconds', HMLS_TXT_DOMAIN );
?></code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Slide Height', HMLS_TXT_DOMAIN );
?></label>
            </th>
            <td>
                <?php 
?>
                        <span><?php 
echo '<a href="' . hls_fs()->get_upgrade_url() . '">' . __( 'Please Upgrade Now!', HMLS_TXT_DOMAIN ) . '</a>';
?></span>
                        <?php 
?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Slide Gap', HMLS_TXT_DOMAIN );
?></label>
            </th>
            <td>
                <?php 
?>
                        <span><?php 
echo '<a href="' . hls_fs()->get_upgrade_url() . '">' . __( 'Please Upgrade Now!', HMLS_TXT_DOMAIN ) . '</a>';
?></span>
                        <?php 
?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_slide_display_tooltip"><?php 
_e( 'Display Tooltip', HMLS_TXT_DOMAIN );
?>?</label>
            </th>
            <td>
                <?php 
?>
                        <span><?php 
echo '<a href="' . hls_fs()->get_upgrade_url() . '">' . __( 'Please Upgrade Now!', HMLS_TXT_DOMAIN ) . '</a>';
?></span>
                        <?php 
?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_slide_hide_arrow"><?php 
_e( 'Hide Arrow', HMLS_TXT_DOMAIN );
?>?</label>
            </th>
            <td>
                <?php 
?>
                        <span><?php 
echo '<a href="' . hls_fs()->get_upgrade_url() . '">' . __( 'Please Upgrade Now!', HMLS_TXT_DOMAIN ) . '</a>';
?></span>
                        <?php 
?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_hide_slider_dots"><?php 
_e( 'Hide Dots', HMLS_TXT_DOMAIN );
?>?</label>
            </th>
            <td>
                <input type="checkbox" name="hmls_hide_slider_dots" id="hmls_hide_slider_dots" value="true" <?php 
echo ( $hmls_hide_slider_dots ? 'checked' : '' );
?> >
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="updateSlideContent" name="updateSlideContent" class="button hmls-button button-primary">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php 
_e( 'Save Settings', HMLS_TXT_DOMAIN );
?>
        </button>
    </p>
</form>