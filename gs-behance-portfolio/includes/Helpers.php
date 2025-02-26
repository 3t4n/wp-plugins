<?php
namespace GSBEH\ShortcodeBuilder;

// if direct access than exit the file.
defined('ABSPATH') || exit;

class Helpers {

    /**
     * Retrives option for the settings.
     * 
     * @since 2.0.12
     * 
     * @param string $option  The option name.
     * @param string $section Settings section name.
     * @param mixed  $default The default value.
     * 
     * @return mixed Saved or the default result of the setting.
     */
    public function getOption( $option, $section, $default = '' ) {
        $options = get_option( $section );
        if ( isset( $options[ $option ] ) ) {
            return $options[ $option ];
        }

        return $default;
    }

    
    /**
     * Get plugin license status
     * 
     * @since  2.0.12
     * @return string The plugin lincense status valid or invalid.
     */
    public function get_license_status() {
        return get_option( 'GS_BEHANCE_LICENSE_STATUS', 'invalid' );
    }

    // public function isProActive() {
    //     return defined( 'GSBEH_VERSION_PRO' );
    // }

    /**
     * Updates option for the settings.
     * 
     * @since 2.0.12
     * 
     * @param string $option  The option name.
     * @param string $section Settings section name.
     * @param mixed  $value   The value to save.
     * 
     * @return boolean Save status.
     */
    public function updateOption( $option, $section, $value ) {
        $options = get_option( $section );
        if ( is_array( $options ) && array_key_exists( $option, $options ) ) {
            $options[ $option ] = $value;
            update_option( $section, $options );
            return true;
        }
        return false;
    }

    /**
     * Returns each item columns.
     * 
     * @since 2.0.12
     * 
     * @param string $desktop         The option name.
     * @param string $tablet          Settings section name.
     * @param string $mobile_portrait The value to save.
     * @param string $mobile          The value to save.
     * 
     * @return string Item columns.
     */
    public function getColumnClasses( $desktop = '3', $tablet = '4', $mobile_portrait = '6', $mobile = '12' ) {
        return sprintf('col-lg-%s col-md-%s col-sm-%s col-xs-%s', $desktop, $tablet, $mobile_portrait, $mobile );
    }

    /**
     * Fetch behance item categories.
     * 
     * @since 2.0.8
     * 
     * @param mixed $id The behance item id.
     * 
     * @return string Joint categories string.
     */
    public function fetchProjectCategories( $id ) {
        $wpdb       = gsbehBuilder()->data->getWpdb();
        $tableName  = gsbeh()->db->getDataTable();
        $fields     = $wpdb->get_results( "SELECT bfields FROM {$tableName} WHERE beid={$id}", ARRAY_A );

        foreach( $fields as $shot ) {
            $bfields = unserialize( $shot[ 'bfields' ] );
            foreach ( $bfields  as  $bcat) {
                $bcat_termname[] = $bcat['name'];
            }  
            $bcat_termname = $bcat_termname ?? '';
            $gs_behance_cats_link = str_replace(' ', '-', $bcat_termname);
            $gs_behance_cats_link = str_replace('/', '-', $gs_behance_cats_link);
            $gs_behance_cats_link = is_array($gs_behance_cats_link) ? $gs_behance_cats_link : [''];
            $gs_be_cats = join( " ", $gs_behance_cats_link );
            $gs_be_cats = strtolower($gs_be_cats);
        }
        return  $gs_be_cats;
    }

    /**
     * Returns shortcodes as select option.
     * 
     * @since 2.0.8
     * @param boolean $options If we want's the value as options.
     * @param boolean $default If we want's the value as the default option.
     * 
     * @return mixed Options array or the default value.
     */
    public function getShortcodeAsOptions() {
        $shortcodes = gsbehBuilder()->manager->getShortcodesAsList();
        if ( empty( $shortcodes ) ) {
            return;
        }

        return array_combine(
            wp_list_pluck( gsbehBuilder()->manager->getShortcodesAsList(), 'id' ),
            wp_list_pluck( gsbehBuilder()->manager->getShortcodesAsList(), 'shortcode_name' )
        );

    }

    /**
     * Returns shortcodes as select option just for visual composer.
     * 
     * @since 2.0.8
     * @return array Options array
     */
    public function getVcShortcodeOptions() {
        $shortcodes = $this->getShortcodeAsOptions();

        if ( empty( $shortcodes ) ) {
            return;
        }

        return array_flip( $shortcodes );
    }

    /**
     * Returns generated image with attributes.
     * 
     * @since 2.0.8
     */
    public function getShotThumbnail( $src, $alt, $extraClasses = [] ) {
        $disable = wp_validate_boolean( gsbehBuilder()->preferences->get( 'disable_beh_lazy_load' ) );
        $classes = array_merge( [], $extraClasses );

        if ( $disable ) {
            $classes[] = gsbehBuilder()->preferences->get( 'lazy_load_class' );
        }

        return sprintf( '<img src="%s" alt="%s" class="%s" />', $src, $alt, implode( ' ', $classes ) );
    }

    /**
     * Returns default item from shortcode list.
     * 
     * @since 2.0.8
     */
    public function getDefaultOption() {
        $shortcodes = gsbehBuilder()->manager->getShortcodesAsList();

        if ( ! empty( $shortcodes ) ) {
            return $shortcodes[0]['id'];
        }

        return '';
    }
}