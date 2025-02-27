<?php

if (!defined('ABSPATH')) { die(); }

?>

<div class="wrap page-loader-options-wrap">
        <h1>Page Loader</h1>
        
        <p>Here you can manage options of Page Loader plugin.</p>
        
        <form method="post" action="options.php">
        <?php settings_fields( 'page-loader-options' ); ?>
        <?php do_settings_sections( 'page-loader-options' ); ?>
        <table class="form-table">
            <tr valign="top">
            <th scope="row">Loader Icon Color</th>
            <td><input type="text" name="icon_color" class="pl-color-picker" data-default-color="#000000" value="<?php echo esc_attr( get_option('icon_color') ); ?>" /></td>
            </tr>
            <tr valign="top">
            <th scope="row">Background Color</th>
            <td><input type="text" name="background_color" class="pl-color-picker" data-default-color="#ffffff" value="<?php echo esc_attr( get_option('background_color') ); ?>" /></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Loader Icon</th>
            <td>
                <select name="loader_icon">
                    <option value="plcircle" <?php selected( esc_attr( get_option('loader_icon') ), 'plcircle' ); ?>>Loader 1</option>
                    <option value="plcircle2" <?php selected( esc_attr( get_option('loader_icon') ), 'plcircle2' ); ?>>Loader 2</option>
                    <option value="plfan" <?php selected( esc_attr( get_option('loader_icon') ), 'plfan' ); ?>>Loader 3</option>
                    <option value="plsqaure" <?php selected( esc_attr( get_option('loader_icon') ), 'plsqaure' ); ?>>Loader 4</option>
                    <option value="pldrop" <?php selected( esc_attr( get_option('loader_icon') ), 'pldrop' ); ?>>Loader 5</option>
                </select>
            </tr>
        </table>
        <?php submit_button(); ?>
    
        </form>
        <h1>Page Loader Preview:</h1>
        <div id="pl-preview-box" style="background: <?php echo esc_attr( get_option('background_color') ) ?>; padding: 50px; display: inline-block; margin-bottom: 10px;">
            <div class="<?php echo esc_attr( get_option('loader_icon') ) ?>" style="<?php
            $icon = esc_attr( get_option('loader_icon') );
            if ( $icon == "plcircle" || $icon == "plfan" ) {
            echo 'border-color: ';
            } else if ( $icon == "plcircle2" ) {
            echo 'border-top-color: ';
            } else {
            echo 'background: ';
            }
            echo esc_attr( get_option('icon_color') );
            ?>;"></div>
        </div>
    </div>