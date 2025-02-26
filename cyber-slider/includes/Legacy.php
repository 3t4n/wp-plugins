<?php

/**
 * Legacy plugin functionality.
 * All v1.x related functionality is located here.
 *
 * @author CyberSpeclab
 * @since 1.0
 */
class ESL_Legacy {

    /**
     * Parent class object
     *
     * @since 1.0
     */
    private static $class;

    /**
     * Initialize legacy functionality
     *
     * @since 1.0
     */
    public static final function init( $class ) {

        global $pagenow;

        /** Store parent */
        self::$class = $class;

        /** Hook old shortcodes */
        add_shortcode( 'showslider', array( $class, 'do_shortcode' ) );
        add_shortcode( 'cybershowslider', array( $class, 'do_shortcode' ) );

        /** Continue only if there are legacy settings to act upon */
        if ( get_option( 'cybershowslider_version' ) || get_option( 'activation' ) || get_option( 'sImg1' ) ) {

            /** Import settings admin notice */
            if ( $pagenow == 'plugins.php' && !get_option( 'cyberslider_major_upgrade' ) )
                add_action( 'admin_notices', create_function( '', '_e( "<div class=\'message updated\'><p>Don\'t forget to import your old Cyber Slider settings. <a href=\'admin.php?page=cyberslider_edit_slideshow\'>Click here.</a></p></div>", "cyberslider" );' ) );

            /** Hook actions */
            add_action( 'cyberslider_edit_slideshow_actions', array( __CLASS__, 'do_legacy_import' ) );
            add_action( 'cyberslider_edit_settings_actions', array( __CLASS__, 'do_legacy_import' ) );
            add_action( 'cyberslider_edit_settings_actions', array( __CLASS__, 'do_legacy_remove' ) );
            add_action( 'cyberslider_welcome_panel_before', array( __CLASS__, 'print_legacy_message' ) );
            add_action( 'cyberslider_settings_after', array( __CLASS__, 'print_legacy_settings_field' ), 10, 2 );

        }

    }

    /**
     * Imports old settings from the old Cyber Slider plugin (v1.x).
     * We don't do this automatically in the ESL_Upgrade class. Instead, we give the user the choice through the 'Edit Slideshow' panel.
     * This is because users were having issues with the plugin deactivating after upgrade, failing to fire the automatic process.
     * Although this solution isn't ideal, it is the best failsafe.
     *
     * @since 1.0
     */
    public static final function legacy_import() {

        /** Reset the plugin */
        cyberslider::get_instance()->uninstall();
        cyberslider::get_instance()->activate();

        /** Get default slideshow settings */
        $slideshow = cyberslider::get_instance()->slideshow_defaults();

        /** Transfer the settings */
        $slideshow->dimensions->width = get_option( 'width' );
        $slideshow->dimensions->height = get_option( 'height' );
        $slideshow->dimensions->responsive = false;
        $slideshow->transitions->effect = ( get_option( 'transition' ) == 'fade' ) ? 'fade' : 'slide';
        $slideshow->transitions->duration = get_option( 'transpeed' );
        $slideshow->navigation->arrows = ( get_option( 'buttons' ) == '' ) ? 'false' : 'true';
        $slideshow->navigation->pagination = ( get_option( 'sPagination' ) == '' ) ? 'false' : 'true';
        $slideshow->playback->pause = get_option( 'interval' );

        /** Add the slides */
        $slideshow->slides = array();
        for ( $i = 1; $i <= 10; $i++ ) {

            /** Check if the slide has an image. Bail if not. */
            $image = get_option( "sImg{$i}" );
            if ( empty( $image ) )
                continue;

            /** Resize the image and get its thumbnail */
            $sizes = (object) array(
                'thumbnail' => (object) array(
                    'url' => $image
                )
            );

            /** Add the slide image & link */
            $slideshow->slides[] = (object) array(
                'id' => $i,
                'url' => $image,
                'alt' => null,
                'title' => null,
                'link' => get_option( "sImgLink{$i}" ),
                'linkTarget' => '_blank',
                'sizes' => $sizes
            );

        }

        /** Update the slideshow settings */
        update_option( 'cyberslider_slideshow', $slideshow );

        /** Flag upgrade */
        update_option( 'cyberslider_major_upgrade', 1 );

    }

    /**
     * Does a legacy settings import
     *
     * @since 1.0
     */
    public static final function do_legacy_import( $page ) {

        /** Imports legacy Cyber Slider setting */
        if ( isset( $_POST['legacy-import'] ) ) {

            /** Security check */
            if ( !self::$class->security_check( 'legacy-import', $page ) ) {
                wp_die( __( 'Security check has failed. Import has been prevented. Please try again.', 'cyberslider' ) );
                exit();
            }

            /** Do upgrade (thus importing settings) */
            self::legacy_import();

            /** Queue message */
            return self::$class->queue_message( __( 'Cyber Slider settings have been imported.', 'cyberslider' ), 'updated' );

        }

    }

    /**
     * Does the removal of legacy settings
     *
     * @since 1.0
     */
    public static final function do_legacy_remove( $page ) {

        /** Removes legacy Cyber Slider settings */
        if ( isset( $_POST['legacy-remove'] ) ) {

            /** Security check */
            if ( !self::$class->security_check( 'legacy-remove', $page ) ) {
                wp_die( __( 'Security check has failed. Removal has been prevented. Please try again.', 'cyberslider' ) );
                exit();
            }

            /** Horrific amount of options. God I was bad back then! */
            $options = array(
                'sImg1', 'sImg2', 'sImg3', 'sImg4', 'sImg5', 'sImg6', 'sImg7', 'sImg8', 'sImg9', 'sImg10',
                'sImglink1', 'sImglink2', 'sImglink3', 'sImglink4', 'sImglink5', 'sImglink6', 'sImglink7', 'sImglink8', 'sImglink9', 'sImglink10',
                'activation', 'width', 'height', 'shadow', 'interval', 'transition', 'bgcolour', 'transpeed', 'bwidth', 'bcolour', 'preload', 'starts',
                'buttons', 'source', 'featcat', 'featpost', 'padbottom', 'padleft', 'padright', 'paddingtop', 'shadowstyle', 'paginationon', 'paginationoff',
                'next', 'prev', 'pageposition', 'pageside', 'permalink', 'jquery', 'cybershowslider_version'
            );

            /** Delete the options */
            foreach ( $options as $option )
                delete_option( $option );

            /** Queue message */
            return self::$class->queue_message( __( 'Cyber Slider settings have been permanently deleted!', 'cyberslider' ), 'updated' );

        }
    }

    /**
     * Prints the legacy settings warning message in the "Welcome" panel.
     *
     * @since 1.0
     */
    public static final function print_legacy_message() {

        /** Display import legacy settings message in welcome panel */
        if ( !get_option( 'cyberslider_major_upgrade' ) ) :
            ?>
            <div class="welcome-panel-content">
                <?php
                    /** Security field */
                    wp_nonce_field( "cyberslider-legacy-import_{$_GET['page']}", "cyberslider-legacy-import_{$_GET['page']}", false );
                ?>
                <h2><?php _e( 'Legacy Settings Detected', 'cyberslider' ); ?></h2>
                <p class="about-description">
                    <?php _e( 'Click the button below to import your settings from Cyber Slider v1.x', 'cyberslider' ); ?>
                </p>
                <div class="welcome-panel-column-container">
                    <div class="welcome-panel-column">
                        <h4><?php _e( 'Import your old settings', 'cyberslider' ); ?></h4>
                        <input type="submit" name="legacy-import" class="button button-primary button-hero" value="<?php _e( 'Import my v1.x Cyber Slider settings.', 'cyberslider' ); ?>">
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <?php
        endif;

    }

    /**
     * Prints the legacy settings options fields in the "Settings" panel.
     *
     * @since 1.0
     */
    public static final function print_legacy_settings_field( $settings, $page ) {

        /** Display field related to legacy settings in "Settings" admin panel */
        ?>
        <h3><?php _e( 'Legacy Settings', 'cyberslider' ); ?></h3>
        <table class="form-table main-settings">
            <tbody>
                <tr valign="top">
                    <?php
                        /** Security nonce fields */
                        wp_nonce_field( "cyberslider-legacy-import_{$_GET['page']}", "cyberslider-legacy-import_{$_GET['page']}", false );
                        wp_nonce_field( "cyberslider-legacy-remove_{$_GET['page']}", "cyberslider-legacy-remove_{$_GET['page']}", false );
                    ?>
                    <th scope="row"><label><?php _e( 'Legacy Settings', 'cyberslider' ); ?></label></th>
                    <td>
                        <input type="submit" name="legacy-import" class="button button-primary warn" value="<?php _e( 'Import v1.x Settings', 'cyberslider' ); ?>">
                        <input type="submit" name="legacy-remove" class="button button-secondary warn" value="<?php _e( 'Remove v1.x Settings', 'cyberslider' ); ?>">
                        <p class="description"><?php _e( 'These buttons allow you to import and remove your old Cyber Slider v1.x settings. Only remove them if you are sure you will not be downgrading the plugin in the future.', 'cyberslider' ); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="divider"></div>
        <?php

    }

}

/**
 * Handy helper & legacy functions for displaying a slideshow
 *
 * @since 1.0
 */
if ( !function_exists( 'showslider' ) ) {
    function showslider() {
        echo ESL_Slideshow::get_instance()->display_slideshow();
    }
}
if ( !function_exists( 'cyber_slider' ) ) {
    function cyber_slider() {
        echo ESL_Slideshow::get_instance()->display_slideshow();
    }
}