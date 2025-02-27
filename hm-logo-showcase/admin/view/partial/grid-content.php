<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
//print_r( $hmlsGridContentSettings );
foreach ( $hmlsGridContentSettings as $option_name => $option_value ) {
    if ( isset( $hmlsGridContentSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="hmls_grid_settings_form" role="form" class="form-horizontal" method="post" action="" id="hmls-grid-settings-form">
    <table class="hmls-grid-settings-table">
        <tr class="hmls_cols_desktop">
            <th scope="row">
                <label for="hmls_cols_desktop"><?php 
_e( 'Logo Columns Desktop', HMLS_TXT_DOMAIN );
?></label>
            </th>
            <td>
                <select name="hmls_cols_desktop" class="medium-text">
                    <?php 
for ($gridColsCounter = 1; $gridColsCounter < 11; $gridColsCounter++) {
    ?>
                        <option value="<?php 
    printf( '%d', $gridColsCounter );
    ?>" <?php 
    echo ( $gridColsCounter == $hmls_cols_desktop ? 'selected' : '' );
    ?> ><?php 
    printf( '%d', $gridColsCounter );
    ?></option>
                        <?php 
}
?>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row" colspan="2">
                <hr><span><?php 
_e( 'Item/Logo', HMLS_TXT_DOMAIN );
?></span><hr> 
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label for="hmls_grid_display_tooltip"><?php 
_e( 'Display Tooltip', HMLS_TXT_DOMAIN );
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
_e( 'Logo Gap', HMLS_TXT_DOMAIN );
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
                <label for="hmls_grid_zoom_in"><?php 
_e( 'Zoom in on hover', HMLS_TXT_DOMAIN );
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
    </table>
    <hr>
    <p class="submit">
        <button id="updateGridContent" name="updateGridContent" class="button hmls-button button-primary">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php 
_e( 'Save Changes', HMLS_TXT_DOMAIN );
?>
        </button>
    </p>
</form>