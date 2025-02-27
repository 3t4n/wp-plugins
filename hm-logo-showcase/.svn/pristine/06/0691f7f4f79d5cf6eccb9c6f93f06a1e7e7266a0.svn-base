<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
//print_r( $hmlsSlideStylesSettings );
foreach ( $hmlsSlideStylesSettings as $option_name => $option_value ) {
    if ( isset( $hmlsSlideStylesSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="hmls_slide_styles_form" role="form" class="form-horizontal" method="post" action="" id="hmls-slide-styles-form">
    <table class="hmls-slide-styles-settings-table">
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <span><?php 
_e( 'Container', HMLS_TXT_DOMAIN );
?></span>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Border Color', HMLS_TXT_DOMAIN );
?> :</label>
            </th>
            <td>
                <input class="wbg-wp-color" type="text" name="hmls_slide_container_border_color" id="hmls_slide_container_border_color" value="<?php 
esc_attr_e( $hmls_slide_container_border_color );
?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php 
_e( 'Border Width', HMLS_TXT_DOMAIN );
?> :</label>
            </th>
            <td>
                <input type="number" min="0" max="10" step="1" name="hmls_slide_container_border_width" value="<?php 
esc_attr_e( $hmls_slide_container_border_width );
?>" class="small-text">
                <code><?php 
_e( 'px', HMLS_TXT_DOMAIN );
?></code>
            </td>
            <th scope="row">
                <label><?php 
_e( 'Border Radius', HMLS_TXT_DOMAIN );
?> :</label>
            </th>
            <td>
                <input type="number" name="hmls_slide_container_radius" value="<?php 
esc_attr_e( $hmls_slide_container_radius );
?>"  class="small-text">
                <code><?php 
_e( 'px', HMLS_TXT_DOMAIN );
?></code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Background Color', HMLS_TXT_DOMAIN );
?> :</label>
            </th>
            <td>
                <input class="wbg-wp-color" type="text" name="hmls_slide_container_bg_color" id="hmls_slide_container_bg_color" value="<?php 
esc_attr_e( $hmls_slide_container_bg_color );
?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php 
_e( 'Padding', HMLS_TXT_DOMAIN );
?> :</label>
            </th>
            <td colspan="3">
                <input type="number" min="0" max='200' step="1" name="hmls_slide_container_padding_top" value="<?php 
esc_attr_e( $hmls_slide_container_padding_top );
?>" style="width:60px;" >
                <code><?php 
_e( 'top', HMLS_TXT_DOMAIN );
?></code>
                <input type="number" min="0" max='200' step="1" name="hmls_slide_container_padding_right" value="<?php 
esc_attr_e( $hmls_slide_container_padding_right );
?>" style="width:60px;" >
                <code><?php 
_e( 'right', HMLS_TXT_DOMAIN );
?></code>
                <input type="number" min="0" max='200' step="1" name="hmls_slide_container_padding_bottom" value="<?php 
esc_attr_e( $hmls_slide_container_padding_bottom );
?>" style="width:60px;" >
                <code><?php 
_e( 'bottom', HMLS_TXT_DOMAIN );
?></code>
                <input type="number" min="0" max='200' step="1" name="hmls_slide_container_padding_left" value="<?php 
esc_attr_e( $hmls_slide_container_padding_left );
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
            <th scope="row" colspan="6" style="text-align: left;">
                <span><?php 
_e( 'Items/Logos', HMLS_TXT_DOMAIN );
?></span>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php 
_e( 'Border Width', HMLS_TXT_DOMAIN );
?> :</label>
            </th>
            <td>
                <input type="number" min="0" max="10" step="1" name="hmls_slide_border_width" value="<?php 
esc_attr_e( $hmls_slide_border_width );
?>"  class="small-text">
                <code><?php 
_e( 'px', HMLS_TXT_DOMAIN );
?></code>
            </td>
            <th scope="row">
                <label><?php 
_e( 'Border Color', HMLS_TXT_DOMAIN );
?> :</label>
            </th>
            <td>
                <input class="wbg-wp-color" type="text" name="hmls_slide_border_color" id="hmls_slide_border_color" value="<?php 
esc_attr_e( $hmls_slide_border_color );
?>">
                <div id="colorpicker"></div>
            </td>
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
            <th scope="row">
                <label><?php 
_e( 'Logo Height', HMLS_TXT_DOMAIN );
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
_e( 'Arrow Color', HMLS_TXT_DOMAIN );
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
            <th scope="row">
                <label><?php 
_e( 'Arrow Color: Hover', HMLS_TXT_DOMAIN );
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
_e( 'Dots Color', HMLS_TXT_DOMAIN );
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
            <th scope="row">
                <label><?php 
_e( 'Dots Active Color', HMLS_TXT_DOMAIN );
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
    <p class="submit"><button id="updateSlideStyles" name="updateSlideStyles" class="button hmls-button button-primary"><?php 
_e( 'Save Settings', HMLS_TXT_DOMAIN );
?></button></p>
</form>