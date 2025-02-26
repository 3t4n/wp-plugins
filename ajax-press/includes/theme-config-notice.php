<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

$theme_name = Ajax_Press\Theme_Configs::instance()->get_theme_name();

$hide_notice_url = add_query_arg( [
	'action' => 'ajax_press_configuration',
	'type'   => 'hide_notice'
], admin_url() );


$configure_url = add_query_arg( [
	'action' => 'ajax_press_configuration',
	'type'   => 'configure'
], admin_url() );


if ( 'new' == $configure_status ) { ?>
    <i class="dashicons dashicons-superhero notice-icon"></i>

    <div class="notice-text">
        You are using <strong><?php echo esc_html( $theme_name ); ?></strong> theme. Click the <b>Install default settings</b>
        button to install default settings for your theme.
        <br> Or, you can setup the settings manually from the <code>Ajax Press > Settings</code> page.
    </div>

    <div class="notice-actions">
        <a href="<?php echo esc_url( $hide_notice_url ); ?>"
           class="button button-link-delete">I will setup manually</a>
        <a href="<?php echo esc_url( $configure_url ); ?>"
           class="button button-primary">Install default settings for <?php echo $theme_name; ?> theme</a>
    </div>

<?php } elseif ( 'switch' == $configure_status ) { ?>
    <i class="dashicons dashicons-superhero notice-icon"></i>

    <div class="notice-text">
        You have switched your theme to <strong><?php echo esc_html( $theme_name ); ?></strong>. Click the <b>Install default settings</b>
        button to install the default settings for your theme.

        <br> Or, you can update the settings manually from the <code>Ajax Press > Settings</code> page.
    </div>

    <div class="notice-actions">
        <a href="<?php echo esc_url( $hide_notice_url ); ?>"
           class="button button-link-delete">I will setup manually</a>
        <a href="<?php echo esc_url( $configure_url ); ?>"
           class="button button-primary">Install default settings for <?php echo $theme_name; ?> theme</a>
    </div>
<?php }
