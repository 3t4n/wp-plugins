<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * PHP Version 7
 *
 * @category Basic
 * @package  Advanced_Floating_Content
 * @author   CodeTides <codetides@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://www.codetides.com/
 * @since    1.0.0 
 */
?>
<div class="afc-panel">                        	
    <div class="afc-panel-div">
        <label for="bafckground_color"><?php esc_html_e( 'Position', 'advanced-floating-content' )?></label>
        <select style="width:22%;" name="ct_afc_position_place" id="ct_afc_position_place">
        <?php
            $options = array(
                'fixed'    => esc_html__( 'Fixed', 'advanced-floating-content' ),
                'absolute' => esc_html__( 'Absolute', 'advanced-floating-content' )
            );
            foreach ( $options as $key => $value ) {
        ?>
            <option value="<?php echo esc_attr($key); ?>" <?php if ($key === get_text_value(get_the_ID(), 'ct_afc_position_place', 'fixed')) { ?> selected="selected" <?php } ?>><?php echo esc_attr($value); ?></option>
        <?php } ?>
        </select>
        <select style="width:22%;" name="ct_afc_position_y" id="ct_afc_position_y">
            <?php
                $options = array(
                    'top'    => esc_html__( 'Top', 'advanced-floating-content' ),
                    'bottom' => esc_html__( 'Bottom', 'advanced-floating-content' )
                );
                foreach ( $options as $key => $value ) { 
            ?>
            <option value="<?php echo esc_attr($key); ?>" <?php if ($key === get_text_value(get_the_ID(), 'ct_afc_position_y', 'yes')) { ?> selected="selected" <?php } ?>><?php echo esc_attr($value); ?></option>
            <?php } ?>
        </select>
        <select style="width:22%;" name="ct_afc_position_x" id="ct_afc_position_x">
            <?php
                $options = array(
                    'left'  => esc_html__( 'Left', 'advanced-floating-content' ),
                    'right' => esc_html__( 'Right', 'advanced-floating-content' )
                );
                foreach ( $options as $key => $value ) { 
            ?>
                <option value="<?php echo esc_attr($key); ?>" <?php if ($key === get_text_value(get_the_ID(), 'ct_afc_position_x', 'yes')) { ?> selected="selected" <?php } ?>><?php echo esc_attr($value); ?></option>
            <?php } ?>
        </select>        
    </div>
    <div class="afc-panel-div">
        <label for="button"><?php esc_html_e( 'Show Close Button', 'advanced-floating-content' )?></label>
        <select style="width:71.1%;" name="ct_afc_close_button" id="ct_afc_close_button">
            <?php
                $options = array(
                    'yes' => esc_html__( 'Yes', 'advanced-floating-content' ),
                    'no'  => esc_html__( 'No', 'advanced-floating-content' )
                );
                foreach ( $options as $key => $value ) { 
            ?>
                <option value="<?php echo esc_attr($key); ?>" <?php if ($key === get_text_value(get_the_ID(), 'ct_afc_close_button', 'yes')) { ?> selected="selected" <?php } ?>><?php echo esc_attr($value); ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="afc-panel-div">
        <label for="width"><?php esc_html_e( 'Width', 'advanced-floating-content' )?></label>
        <div class="control-input">
            <input type="number" name="ct_afc_width" id="ct_afc_width" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_width', 100) ); ?>" class="" style="width:61.4%;">
            <select style="width:30%;" name="ct_afc_width_unit" id="ct_afc_width_unit">
                <?php
                    $options = array(
                        'px' => esc_html__( 'Pixels', 'advanced-floating-content' ),
                        '%'  => esc_html__( 'Percentage', 'advanced-floating-content' ),
                    );
                    foreach ( $options as $key => $value ) { 
                ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php if ($key === get_text_value(get_the_ID(), 'ct_afc_width_unit', 'px')) { ?> selected="selected" <?php } ?>><?php echo esc_attr($value); ?></option>
                <?php } ?>
            </select>
        </div>        
    </div>
    <div class="afc-panel-div">
        <label for="bafckground_color"><?php esc_html_e( 'Background Color', 'advanced-floating-content' )?></label>
        <div class="control-input">
            <input type="text" name="ct_afc_background_color" id="ct_afc_background_color" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_background_color', '#FFFFFF') ); ?>" class="color-picker-afc">
        </div>
    </div>
    <div class="afc-panel-div">
        <label for="margin"><?php esc_html_e( 'Margin', 'advanced-floating-content' )?></label>
        <div class="control-input">
            <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_margin_top" id="ct_afc_margin_top" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_margin_top', 0) ); ?>" class="" style="width:21%;">
            <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_margin_right" id="ct_afc_margin_right" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_margin_right', 0) ); ?>" class="" style="width:21%;">
            <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_margin_bottom" id="ct_afc_margin_bottom" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_margin_bottom', 0) ); ?>" class="" style="width:21%;">
            <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_margin_left" id="ct_afc_margin_left" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_margin_left', 0) ); ?>" class="" style="width:21.3%;">
        </div>            
    </div>
    <div class="afc-panel-div">
        <label for="border"><?php esc_html_e( 'Border', 'advanced-floating-content' )?></label>
        <div class="control-input">
            <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_border_top" id="ct_afc_border_top" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_border_top', 0) ); ?>" style="width:21%;">
            <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_border_right" id="ct_afc_border_right" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_border_right', 0) ); ?>" style="width:21%;">
            <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_border_bottom" id="ct_afc_border_bottom" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_border_bottom', 0) ); ?>" style="width:21%;">
            <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_border_left" id="ct_afc_border_left" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_border_left', 0) ); ?>" style="width:21.3%;">
        </div>            
    </div>
    <div class="afc-panel-div">
        <label for="border_properties"><?php esc_html_e( 'Border Properties', 'advanced-floating-content' ); ?></label>
        <div class="control-input">
            <select style="width:35%;" name="ct_afc_border_type" id="ct_afc_border_type">
                <?php
                    $options = array(
                        'dotted' => esc_html__( 'dotted', 'advanced-floating-content' ),
                        'solid'  => esc_html__( 'solid', 'advanced-floating-content' ),
                        'double' => esc_html__( 'double', 'advanced-floating-content' ),
                        'dashed' => esc_html__( 'dashed', 'advanced-floating-content' ),
                        'groove' => esc_html__( 'groove', 'advanced-floating-content' ),
                        'ridge'  => esc_html__( 'ridge', 'advanced-floating-content' ),
                        'inset'  => esc_html__( 'inset', 'advanced-floating-content' ),
                        'outset' => esc_html__( 'outset', 'advanced-floating-content' )
                    );
                    foreach ( $options as $key => $value ) { 
                ?>
                <option value="<?php echo esc_attr($key); ?>" <?php if ($key === get_text_value(get_the_ID(), 'ct_afc_border_type', 'solid')) { ?> selected="selected" <?php } ?>><?php echo esc_attr($value); ?></option>
                <?php } ?>
            </select>
            <input type="text" name="ct_afc_border_color" id="ct_afc_border_color" value="<?php echo get_text_value(get_the_ID(), 'ct_afc_border_color', '#FFFFFF'); ?>" class="color-picker-afc">
            <select style="width:35%;" name="ct_afc_border_radius" id="ct_afc_border_radius">
                <?php
                    $options = array(
                        '0' => esc_html__( 'Straight Cornor', 'advanced-floating-content' ),
                        '1' => esc_html__( 'Round Cornor', 'advanced-floating-content' )
                    );
                    foreach ( $options as $key => $value ) { 
                ?>
                <option value="<?php echo esc_attr($key); ?>" <?php if ($key === get_text_value(get_the_ID(), 'ct_afc_border_radius', '0')) { ?> selected="selected" <?php } ?>><?php echo esc_attr($value); ?></option>
                <?php } ?>
            </select>            
        </div>            
    </div>                       
</div>
<div id="advanced-floating-content-meta-box-nonce" class="hidden">
<?php wp_nonce_field( 'advanced_floating_content_save', 'advanced_floating_content_nonce' ); ?>
</div>