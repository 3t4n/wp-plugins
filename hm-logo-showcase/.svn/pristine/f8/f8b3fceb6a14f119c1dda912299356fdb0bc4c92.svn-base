<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
//print_r( $hmlsGridStyleSettings );
foreach ( $hmlsGridStyleSettings as $option_name => $option_value ) {
    if ( isset( $hmlsGridStyleSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="hmls_grid_styles_form" role="form" class="form-horizontal" method="post" action="" id="hmls-grid-styles-form">
    <table class="hmls-grid-styles-settings-table">
        <tr>
            <th scope="row" colspan="2">
                <hr><span><?php 
_e( 'Parent Container', HMLS_TXT_DOMAIN );
?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Border Width', HMLS_TXT_DOMAIN );
?> :</label>
            </th>
            <td>
                <input type="number" min="0" max='30' step="1" name="hmls_grid_container_border_width" value="<?php 
esc_attr_e( $hmls_grid_container_border_width );
?>" >
                <code><?php 
_e( 'px', HMLS_TXT_DOMAIN );
?></code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Border Color', HMLS_TXT_DOMAIN );
?> :</label>
            </th>
            <td>
                <input class="wbg-wp-color" type="text" name="hmls_grid_container_border_color" id="hmls_grid_container_border_color" value="<?php 
esc_attr_e( $hmls_grid_container_border_color );
?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Border Radius', HMLS_TXT_DOMAIN );
?> :</label>
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
_e( 'Padding', HMLS_TXT_DOMAIN );
?> :</label>
            </th>
            <td>
                <input type="number" min="0" max='30' step="1" name="hmls_grid_container_padding_top" value="<?php 
esc_attr_e( $hmls_grid_container_padding_top );
?>" style="width:60px;" >
                <code><?php 
_e( 'top', HMLS_TXT_DOMAIN );
?></code>
                <input type="number" min="0" max='30' step="1" name="hmls_grid_container_padding_right" value="<?php 
esc_attr_e( $hmls_grid_container_padding_right );
?>" style="width:60px;" >
                <code><?php 
_e( 'right', HMLS_TXT_DOMAIN );
?></code>
                <input type="number" min="0" max='30' step="1" name="hmls_grid_container_padding_bottom" value="<?php 
esc_attr_e( $hmls_grid_container_padding_bottom );
?>" style="width:60px;" >
                <code><?php 
_e( 'bottom', HMLS_TXT_DOMAIN );
?></code>
                <input type="number" min="0" max='30' step="1" name="hmls_grid_container_padding_left" value="<?php 
esc_attr_e( $hmls_grid_container_padding_left );
?>" style="width:60px;" >
                <code><?php 
_e( 'left', HMLS_TXT_DOMAIN );
?></code>
                <code>( <?php 
_e( 'px', HMLS_TXT_DOMAIN );
?> )</code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Background Color', HMLS_TXT_DOMAIN );
?> :</label>
            </th>
            <td>
                <input class="wbg-wp-color" type="text" name="hmls_grid_container_bg_color" id="hmls_grid_container_bg_color" value="<?php 
esc_attr_e( $hmls_grid_container_bg_color );
?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row" colspan="2">
                <hr><span><?php 
_e( 'Logo Container', HMLS_TXT_DOMAIN );
?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Border Width', HMLS_TXT_DOMAIN );
?> :</label>
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
_e( 'Border Color', HMLS_TXT_DOMAIN );
?> :</label>
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
_e( 'Border Radius', HMLS_TXT_DOMAIN );
?> :</label>
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
_e( 'Background Color', HMLS_TXT_DOMAIN );
?> :</label>
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
            <th scope="row" colspan="2">
                <span><?php 
_e( 'Item/Logo Hover', HMLS_TXT_DOMAIN );
?> :</span>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Border Color', HMLS_TXT_DOMAIN );
?> :</label>
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
_e( 'Background Color', HMLS_TXT_DOMAIN );
?> :</label>
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
        <button id="updateGridStyles" name="updateGridStyles" class="button hmls-button button-primary">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php 
_e( 'Save Settings', HMLS_TXT_DOMAIN );
?>
        </button>
    </p>
</form>