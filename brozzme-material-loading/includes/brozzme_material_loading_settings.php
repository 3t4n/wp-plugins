<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 08/05/16
 * Time: 12:46
 */

add_action( 'admin_init', 'brozzme_material_loading_settings_init' );

function brozzme_material_loading_settings_init(  ) {

    register_setting( 'brozzmeMaterialLoadingGeneralSettings', 'b_material_general_settings' );

    add_settings_section(
        'brozzmeMaterialLoadingGeneralSettings_section',
        __( 'General settings option for Brozzme Material Loading', 'brozzme-material-loading' ),
        'brozzme_material_loading_general_settings_section_callback',
        'brozzmeMaterialLoadingGeneralSettings'
    );
    add_settings_field(
        'bml_enable',
        __( 'Enable Material loading', 'brozzme-material-loading' ),
        'bml_enable_render',
        'brozzmeMaterialLoadingGeneralSettings',
        'brozzmeMaterialLoadingGeneralSettings_section'
    );
    add_settings_field(
        'bml_homepage_color',
        __( 'Home page color', 'brozzme-material-loading' ),
        'bml_homepage_color_render',
        'brozzmeMaterialLoadingGeneralSettings',
        'brozzmeMaterialLoadingGeneralSettings_section'
    );
    add_settings_field(
        'bml_color',
        __( 'Bar color', 'brozzme-material-loading' ),
        'bml_color_render',
        'brozzmeMaterialLoadingGeneralSettings',
        'brozzmeMaterialLoadingGeneralSettings_section'
    );
    add_settings_field(
        'bml_height',
        __( 'Bar height', 'brozzme-material-loading' ),
        'bml_height_render',
        'brozzmeMaterialLoadingGeneralSettings',
        'brozzmeMaterialLoadingGeneralSettings_section'
    );
    add_settings_field(
        'bml_template',
        __( 'Special template', 'brozzme-material-loading' ),
        'bml_template_render',
        'brozzmeMaterialLoadingGeneralSettings',
        'brozzmeMaterialLoadingGeneralSettings_section'
    );
    add_settings_field(
        'bml_always_show_bar',
        __( 'Always show bar', 'brozzme-material-loading' ),
        'bml_always_show_bar_render',
        'brozzmeMaterialLoadingGeneralSettings',
        'brozzmeMaterialLoadingGeneralSettings_section'
    );
    add_settings_section(
        'brozzmeMaterialLoadingHelp_section',
        __( 'Help for Brozzme Material Loading', 'brozzme-material-loading' ),
        'brozzme_material_loading_help_section_callback',
        'brozzmeMaterialLoadingHelp'
    );
    add_settings_field(
        'bml_help',
        __( 'Help', 'brozzme-material-loading' ),
        'bml_help_render',
        'brozzmeMaterialLoadingHelp',
        'brozzmeMaterialLoadingHelp_section'
    );
}
function brozzme_material_loading_help_section_callback(  ) {

    echo __( 'Help / FAQ ', 'brozzme-material-loading' );


}
function bml_help_render(){

}

function bml_enable_render (){
    $options = get_option( 'b_material_general_settings' );
    ?>
    <select name="b_material_general_settings[bml_enable]">
        <option value="true" <?php if ( $options['bml_enable'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-material-loading' );?></option>
        <option value="false" <?php if ( $options['bml_enable'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-material-loading' );?></option>

    </select>
<?php
}

function bml_color_render(){
    $options = get_option( 'b_material_general_settings' );

    ?>
    <input type='text' name='b_material_general_settings[bml_color]' value='<?php echo $options['bml_color']; ?>' class='color-field'>
<?php
}
function bml_homepage_color_render(){
    $options = get_option( 'b_material_general_settings' );
    ?>
    <input type='text' name='b_material_general_settings[bml_homepage_color]' value='<?php echo $options['bml_homepage_color']; ?>' class='color-field'>
<?php
}

function bml_height_render(){

    $options = get_option( 'b_material_general_settings' );
    ?>
    <input type='text' name='b_material_general_settings[bml_height]' value='<?php echo $options['bml_height']; ?>' >
<?php
}

function bml_template_render(){
    $options = get_option( 'b_material_general_settings' );
    ?>
    <select name="b_material_general_settings[bml_template]">
        <option value="minimal" <?php if ( $options['bml_template'] == 'minimal' ) echo 'selected="selected"'; ?>><?php _e( 'Minimal', 'brozzme-material-loading' );?></option>
        <option value="flash" <?php if ( $options['bml_template'] == 'flash' ) echo 'selected="selected"'; ?>><?php _e( 'Flash', 'brozzme-material-loading' );?></option>
        <option value="bounce" <?php if ( $options['bml_template'] == 'bounce' ) echo 'selected="selected"'; ?>><?php _e( 'Bounce', 'brozzme-material-loading' );?></option>
        <option value="centercircle" <?php if ( $options['bml_template'] == 'centercircle' ) echo 'selected="selected"'; ?>><?php _e( 'Center circle', 'brozzme-material-loading' );?></option>
        <option value="centeratom" <?php if ( $options['bml_template'] == 'centeratom' ) echo 'selected="selected"'; ?>><?php _e( 'Center atom', 'brozzme-material-loading' );?></option>
        <option value="centersimple" <?php if ( $options['bml_template'] == 'centersimple' ) echo 'selected="selected"'; ?>><?php _e( 'Center simple', 'brozzme-material-loading' );?></option>
        <option value="centerradar" <?php if ( $options['bml_template'] == 'centerradar' ) echo 'selected="selected"'; ?>><?php _e( 'Center radar', 'brozzme-material-loading' );?></option>
        <option value="loadingbar" <?php if ( $options['bml_template'] == 'loadingbar' ) echo 'selected="selected"'; ?>><?php _e( 'Loading bar', 'brozzme-material-loading' );?></option>
        <option value="cornerindicator" <?php if ( $options['bml_template'] == 'cornerindicator' ) echo 'selected="selected"'; ?>><?php _e( 'Corner indicator', 'brozzme-material-loading' );?></option>
        <option value="bigcounter" <?php if ( $options['bml_template'] == 'bigcounter' ) echo 'selected="selected"'; ?>><?php _e( 'Big counter', 'brozzme-material-loading' );?></option>
        <option value="flattop" <?php if ( $options['bml_template'] == 'flatop' ) echo 'selected="selected"'; ?>><?php _e( 'Flat top', 'brozzme-material-loading' );?></option>
        <option value="fillleft" <?php if ( $options['bml_template'] == 'fillleft' ) echo 'selected="selected"'; ?>><?php _e( 'Fill left', 'brozzme-material-loading' );?></option>
        <option value="barbershop" <?php if ( $options['bml_template'] == 'barbershop' ) echo 'selected="selected"'; ?>><?php _e( 'Barber shop', 'brozzme-material-loading' );?></option>
        <option value="macosx" <?php if ( $options['bml_template'] == 'macosx' ) echo 'selected="selected"'; ?>><?php _e( 'Macosx', 'brozzme-material-loading' );?></option>

    </select>
<?php
}

function bml_always_show_bar_render(){
    $options = get_option( 'b_material_general_settings' );
    ?>
    <select name="b_material_general_settings[bml_always_show_bar]">
        <option value="true" <?php if ( $options['bml_always_show_bar'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-material-loading' );?></option>
        <option value="false" <?php if ( $options['bml_always_show_bar'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-material-loading' );?></option>

    </select>
    <p><code><i><?php _e('Only apply to top bar (minimal, flash)', 'brozzme-material-laoding');?></i></code></p>
<?php
}
function brozzme_material_loading_general_settings_section_callback(  ) {

    echo __( 'Settings for automatic loading bar', 'brozzme-material-loading' );

}

function bml_options_page(  ) {

    ?>
    <div class="wrap">


        <h2>Brozzme Material loading</h2>
        <?php

        $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general_settings';
        ?>

        <h2 class="nav-tab-wrapper">
            <a href="?page=brozzme-material-loading&tab=general_settings" class="nav-tab <?php echo $active_tab == 'general_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'General settings', 'brozzme-material-loading' );?></a>
            <a href="?page=brozzme-material-loading&tab=help_options" class="nav-tab <?php echo $active_tab == 'help_options' ? 'nav-tab-active' : ''; ?>">Help</a>
        </h2>
        <form action='options.php' method='post'>
            <?php
            if( $active_tab == 'help_options' ) {
                settings_fields('brozzmeMaterialLoadingHelp');
                // do_settings_sections('brozzmeCookieNotificationHelp');
                brozzme_material_loading_help_page();
            }

            else {
                settings_fields('brozzmeMaterialLoadingGeneralSettings');
                do_settings_sections('brozzmeMaterialLoadingGeneralSettings');
                submit_button();
            }

            ?>

        </form>
    </div>
<?php
}

function brozzme_material_loading_help_page(){

?>
<div style="font-size:3.2vh;margin:15px;line-height: 3.7vh;padding-bottom: 15px;width: 60%;"><em><strong>Brozzme Material Loading</strong></em> is a WordPress plugin allows you to add an Automatic page load progress bar.<br/>This plugin has been developped to improve the integration in any theme with no coding skills.</div>

<div style="font-size:1.8vh;padding-bottom: 15px;width: 80%;line-height:2vh;">
    <em><strong>Brozzme Material Loading</strong></em> plugin creates a loading bar on each page, using the PACE.js library. <br/>
    Pace will automatically monitor your ajax requests, event loop lag, document ready state, and elements on your page to decide the progress, it will begin again with Ajax navigation.
    <br/>Brozzme Material Loading include 15 templates (from Pace.js). There is no file to edit, it's easy to choose and customize your loading bar, just choose colors, height of the bar in the settings panel.<br/>

</div>

<ul>
    <li>homepage color</li>
    <li>posts color</li>
    <li>Bar height</li>
</ul>

<div>This plugin have been tested up to WordPress 4.5.2</div>

    <h3>PREMIUM VERSION</h3>
    <p>Allow you to totally customize each animation behaviours, colors, element size, and conditionally load any template for each posts or page.</p>
<?php
}