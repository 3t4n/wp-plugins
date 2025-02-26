<?php

if ( !class_exists('PT_Metabox') ):

class PT_Metabox {


    function __construct (){
        add_action('add_meta_boxes', [$this, 'pt_add_meta_box'] );
        // edit_post hooks is better than save_post hook for nice checkbox
        // http://wordpress.stackexchange.com/questions/228322/how-to-set-default-value-for-checkbox-in-wordpress
        add_action( 'edit_post', [$this, 'pt_meta_save'], 10, 2);

    }


    function pt_add_meta_box() {
        // METABOXES FOR PRICING TABLE
        add_meta_box( 'pt_metabox', __( 'Pricing Table Setting', PT_TEXTDOMAIN ), [$this, 'pt_metabox_cb'], PT_POST_TYPE, 'normal' );
        add_meta_box( 'pt_metabox_notice', __( 'ADL Pricing Table Pro', PT_TEXTDOMAIN ), [$this, 'pt_metabox_promotion_cb'], PT_POST_TYPE, 'side' );
    }



    /**
     * Display metabox for Pricing Table
     * @param $post
     */
    function pt_metabox_cb( $post ){
        // Add a nonce field so we can check for it later.
        wp_nonce_field( 'pt_metabox_save', 'pt_metabox_nounce' );
        // package data, unique to each pacakage
        $adl_table_data = get_post_meta($post->ID, 'adl_pt_data_group', true);
        //overall table data, unique to each table
        $pt_package_theme = get_post_meta($post->ID, 'pt_package_theme', true);

        $pt_total_old_pack = count($adl_table_data); // to know present package number so that js can name 'column' number accordingly.
        $pt_total_current_pack = get_post_meta($post->ID, 'pt_total_current_pack', true); // this value will be replaced by js dynamically when new package added, so that it can keep track of key number of value.

        // SETTING FOR 'bordered' THEME
        $pt_style4_ = get_post_meta($post->ID, 'pt_style4_', true); // value is array
        $pt_style5_ = get_post_meta($post->ID, 'pt_style5_', true); // value is array
        $pt_style6_ = get_post_meta($post->ID, 'pt_style6_', true); // value is array


        // FONTS SETTING
        $headerFS = get_post_meta($post->ID, 'headerFS', true);
        $priceFS = get_post_meta($post->ID, 'priceFS', true);
        $planFS = get_post_meta($post->ID, 'planFS', true);
        $featureFS = get_post_meta($post->ID, 'featureFS', true);
        $buttonFS = get_post_meta($post->ID, 'buttonFS', true);


        // allowed html
        $allowed_html = ['a' => [
            'class' => [],
        ]];
        // markup
        include_once('pt-metabox-markup.php');
    }

    public function pt_metabox_promotion_cb( $post ) {
        ?>
        <div class="pt-upgrade-notice">
            <p>If you like ADL Pricing Table Plugin, then you can enjoy more useful features such as 6 different themes and Font Awesome icon support by upgrading to the Pro version.</p>
            <p><a target="_blank" href="https://adlplugins.com/plugin/adl-pricing-table-pro" class="button">Upgrade to Pro</a></p>

        </div>
        <!--ends pt-upgrade-notice-->
    <?php
    }





    public function pt_meta_save( $post_id, $post ) {

        if ( PT_POST_TYPE != $post->post_type) {return;}
        // Perform checking for before saving
        $is_autosave = wp_is_post_autosave($post_id);
        $is_revision = wp_is_post_revision($post_id);
        $is_valid_nonce = (isset($_POST['pt_metabox_nounce']) && wp_verify_nonce( $_POST['pt_metabox_nounce'], 'pt_metabox_save' )? 'true': 'false');

        if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;
        // fix problem of data disappearing when quick edit is enabled. WP IS DOING AJAX On Quick Edit Page.
        if ( defined('DOING_AJAX') && DOING_AJAX ) {
            return;
        }
        // Is the user allowed to edit the post or page?
        if ( !current_user_can( 'edit_post', $post_id )) return;


        // get the array of all the packages.
        $adl_pt_data_group = (!empty($_POST['adl_pt_data_group'])) ? $_POST['adl_pt_data_group'] : [] ;

        // loop through the packages array and check if its value is specified.

        if ( empty($adl_pt_data_group) ) {
            $adl_pt_data_group = [''];
        }


        //foreach ( $adl_pt_data_group as $key => $packages ){
        //
        //
        //
        //    // if any important key of package data is not assigned then remove that package from the array to be saved in DB.
        //
        //    if (
        //        empty( $packages['pt_package_title'] ) ||
        //        empty( $packages['pt_package_price'] ) ||
        //        empty( $packages['pt_package_features'] ) ||
        //        empty( $packages['pt_package_time'] ) ||
        //        empty( $packages['pt_package_btn_url'] )
        //    ) {
        //        unset($adl_pt_data_group[$key]);
        //    }
        //
        //}

        $pt_package_theme = ( isset($_POST['pt_package_theme']) && !empty($_POST['pt_package_theme']) ) ? sanitize_text_field($_POST['pt_package_theme']) : '';

        // get table data unique to each table
        $pt_total_current_pack = ( isset($_POST['pt_total_current_pack']) && !empty($_POST['pt_total_current_pack']) ) ? absint($_POST['pt_total_current_pack']) : 0;
        // theme data
        $pt_style4_ = ( isset($_POST['pt_style4_']) && !empty($_POST['pt_style4_']) ) ? array_map('sanitize_text_field', $_POST['pt_style4_']) : [''];
        $pt_style5_ = ( isset($_POST['pt_style5_']) && !empty($_POST['pt_style5_']) ) ? array_map('sanitize_text_field', $_POST['pt_style5_']) : [''];
        $pt_style6_ = ( isset($_POST['pt_style6_']) && !empty($_POST['pt_style6_']) ) ? array_map('sanitize_text_field', $_POST['pt_style6_']) : [''];

        // FONTS SETTINGS
        $headerFS = (!empty($_POST['headerFS']) ) ? absint($_POST['headerFS']) : null;
        $priceFS = (!empty($_POST['priceFS']) ) ? absint($_POST['priceFS']) : null;
        $planFS = (!empty($_POST['planFS']) ) ? absint($_POST['planFS']) : null;
        $featureFS = (!empty($_POST['featureFS']) ) ? absint($_POST['featureFS']) : null;
        $buttonFS = (!empty($_POST['buttonFS']) ) ? absint($_POST['buttonFS']) : null;



        // persist to the DB
            update_post_meta($post_id, 'adl_pt_data_group', $adl_pt_data_group); // value is array
            update_post_meta($post_id, 'pt_package_theme', $pt_package_theme);
            update_post_meta($post_id, 'pt_total_current_pack', $pt_total_current_pack);
            // Individual Themes
            update_post_meta($post_id, 'pt_style4_', $pt_style4_); // value is array
            update_post_meta($post_id, 'pt_style5_', $pt_style5_); // value is array
            update_post_meta($post_id, 'pt_style6_', $pt_style6_); // value is array



        // Font Settings
        update_post_meta($post_id, 'headerFS', $headerFS);
        update_post_meta($post_id, 'priceFS', $priceFS);
        update_post_meta($post_id, 'planFS', $planFS);
        update_post_meta($post_id, 'featureFS', $featureFS);
        update_post_meta($post_id, 'buttonFS', $buttonFS);


    }



}


endif;