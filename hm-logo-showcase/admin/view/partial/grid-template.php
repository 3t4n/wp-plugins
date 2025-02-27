<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
?>
<form name="hmls_grid_template_form" role="form" class="form-horizontal" method="post" action="" id="hmls-grid-template-form">
<?php 
wp_nonce_field( 'hmls_grid_temp_settings_action', 'hmls_grid_temp_settings_nonce_field' );
?>
    <table class="hmls-grid-template-settings-table">
        <tr>
            <th scope="row" colspan="3">
                <span><?php 
_e( 'Select a Template', HMLS_TXT_DOMAIN );
?> :</span>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_grid_temp_default"><?php 
_e( 'Default', HMLS_TXT_DOMAIN );
?></label>
            </th>
            <td>
                <input type="radio" name="hmls_grid_template" id="hmls_grid_temp_default" value="default" <?php 
if ( 'default' === $hmls_grid_template ) {
    echo 'checked';
}
?>>
            </td>
            <td>
                <label for="hmls_grid_temp_default" class="hmls_grid_temp_default">
                    <img src="<?php 
echo esc_url( HMLS_ASSETS );
?>img/logo-showcase-grid-temp-zoom-in.jpg" alt="<?php 
_e( 'Default', HMLS_TXT_DOMAIN );
?>">
                </label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_grid_temp_il"><?php 
_e( 'Image Over Link', HMLS_TXT_DOMAIN );
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
            <td>
                <label for="hmls_grid_temp_il" class="hmls_grid_temp_il">
                    <img src="<?php 
echo esc_url( HMLS_ASSETS );
?>img/logo-showcase-grid-temp-inner-link.jpg" alt="<?php 
_e( 'Default', HMLS_TXT_DOMAIN );
?>">
                </label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_grid_temp_only_logo"><?php 
_e( 'Only Logo', HMLS_TXT_DOMAIN );
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
            <td>
                <label for="hmls_grid_temp_only_logo" class="hmls_grid_temp_only_logo">
                    <img src="<?php 
echo esc_url( HMLS_ASSETS );
?>img/logo-showcase-grid-temp-only-logo.jpg" alt="<?php 
_e( 'Default', HMLS_TXT_DOMAIN );
?>">
                </label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_grid_temp_only_grayscale"><?php 
_e( 'Only Grayscale', HMLS_TXT_DOMAIN );
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
            <td>
                <label for="hmls_grid_temp_only_grayscale" class="hmls_grid_temp_only_grayscale">
                    <img src="<?php 
echo esc_url( HMLS_ASSETS );
?>img/logo-showcase-grid-temp-only-grayscale.jpg" alt="<?php 
_e( 'Default', HMLS_TXT_DOMAIN );
?>">
                </label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_grid_temp_gray_color"><?php 
_e( 'Gray to Color', HMLS_TXT_DOMAIN );
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
            <td>
                <label for="hmls_grid_temp_gray_color" class="hmls_grid_temp_gray_color">
                    <img src="<?php 
echo esc_url( HMLS_ASSETS );
?>img/logo-showcase-grid-temp-only-gray-color.jpg" alt="<?php 
_e( 'Default', HMLS_TXT_DOMAIN );
?>">
                </label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_grid_temp_color_gray"><?php 
_e( 'Color to Gray', HMLS_TXT_DOMAIN );
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
            <td>
                <label for="hmls_grid_temp_color_gray" class="hmls_grid_temp_color_gray">
                    <img src="<?php 
echo esc_url( HMLS_ASSETS );
?>img/logo-showcase-grid-temp-color-gray.jpg" alt="<?php 
_e( 'Default', HMLS_TXT_DOMAIN );
?>">
                </label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_grid_temp_category"><?php 
_e( 'With Category', HMLS_TXT_DOMAIN );
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
            <td>
                <label for="hmls_grid_temp_category" class="hmls_grid_temp_category">
                    <img src="<?php 
echo esc_url( HMLS_ASSETS );
?>img/logo-showcase-grid-temp-with-category.jpg" alt="<?php 
_e( 'Default', HMLS_TXT_DOMAIN );
?>">
                </label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_grid_temp_title"><?php 
_e( 'With Title', HMLS_TXT_DOMAIN );
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
            <td>
                <label for="hmls_grid_temp_title" class="hmls_grid_temp_title">
                    <img src="<?php 
echo esc_url( HMLS_ASSETS );
?>img/logo-showcase-grid-temp-with-title.jpg" alt="<?php 
_e( 'Default', HMLS_TXT_DOMAIN );
?>">
                </label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_grid_temp_title_desc"><?php 
_e( 'With Title & Description', HMLS_TXT_DOMAIN );
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
            <td>
                <label for="hmls_grid_temp_title_desc" class="hmls_grid_temp_title_desc">
                    <img src="<?php 
echo esc_url( HMLS_ASSETS );
?>img/logo-showcase-grid-temp-with-title-desc.jpg" alt="<?php 
_e( 'Default', HMLS_TXT_DOMAIN );
?>">
                </label>
            </td>
        </tr>
    </table>
    <p class="submit"><button id="updateGridTemplate" name="updateGridTemplate" class="button hmls-button button-primary"><?php 
_e( 'Save Settings', HMLS_TXT_DOMAIN );
?></button></p>
</form>