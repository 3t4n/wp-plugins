<?php

if (!class_exists('ADL_team_enqueue')):
class ADL_team_enqueue {

    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'), 999);
        // best hook to enqueue scripts for front-end is 'template_redirect'
        // 'Professional WordPress Plugin Development' by Brad Williams
        add_action('template_redirect', array($this, 'front_end_enqueue_scripts'));
    }

    public function admin_enqueue_scripts($page) {
        global $pagenow, $typenow, $ADL_team;
        if ( ADL_TEAM_POST_TYPE == $typenow || ADL_TEAM_SHORT_CODE_POST_TYPE == $typenow) {
            wp_enqueue_style( 'adl-team-cmb2', ADL_TEAM_ADMIN_ASSETS . 'css/cmb2.min.css', false, ADL_TEAM_VERSION );
            wp_dequeue_style('jquery-ui-css'); // fix collision with EDD, handles found in edd/includes/scripts.php, priority also needed to be increased on the hook.
            wp_enqueue_style( 'jquery-ui', ADL_TEAM_ADMIN_ASSETS . 'css/jquery-ui.min.css', array('adl-team-admin-style'), ADL_TEAM_VERSION);
            wp_enqueue_style( 'adl-team-admin-style', ADL_TEAM_ADMIN_ASSETS . 'css/adl-team-admin.css', false, ADL_TEAM_VERSION );
            wp_enqueue_style( 'adl-team-nice-select-style', ADL_TEAM_ADMIN_ASSETS . 'css/nice-select.css', false, ADL_TEAM_VERSION );
            wp_enqueue_style( 'sweetalertcss', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css', false, ADL_TEAM_VERSION );
            wp_enqueue_script( 'adl-team-nice-js', ADL_TEAM_ADMIN_ASSETS . 'js/jquery.nice-select.min.js', array( 'jquery' ), ADL_TEAM_VERSION, true );
            wp_enqueue_script( 'sweetalert', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js', array( 'jquery' ), ADL_TEAM_VERSION, true );
            wp_enqueue_script( 'sweetalert', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js', array( 'jquery' ), ADL_TEAM_VERSION, true );


            wp_enqueue_script( 'adl-team-admin-js', ADL_TEAM_ADMIN_ASSETS . 'js/adl-team-admin.js', array(
                'jquery',
                'wp-color-picker',
                'jquery-ui-accordion',
                'jquery-ui-slider',
                'adl-team-nice-js',
                'sweetalert',
            ), ADL_TEAM_VERSION, true );
            wp_enqueue_style('wp-color-picker');

            $adl_team_obj = array(
                'nonceAction' => $ADL_team->nonceAction(),
                'nonce'       => wp_create_nonce( $ADL_team->nonceText() ),
                'AdminAsset'  => ADL_TEAM_ADMIN_ASSETS,
            );
            wp_localize_script( 'adl-team-admin-js', 'adl_team_obj', $adl_team_obj );
            wp_enqueue_media();

        }

    }

    public function front_end_enqueue_scripts($page) {
        // register fontsawesome and other css so that they load in the bottom of the page only when shortcode is used.
        //scripts
        wp_register_script('adl-team-owl-carousel-js', ADL_TEAM_PUBLIC_ASSETS . 'js/owl.carousel.min.js', array('jquery'), ADL_TEAM_VERSION);
        wp_register_script('adl-team-appear-js', ADL_TEAM_PUBLIC_ASSETS . 'js/jquery.appear.js', array('jquery'), ADL_TEAM_VERSION);
        wp_register_script('adl-team-public-js', ADL_TEAM_PUBLIC_ASSETS . 'js/adl-team-public.js', array('jquery', 'adl-team-owl-carousel-js', 'adl-team-appear-js'), ADL_TEAM_VERSION);
        wp_register_script('featherlight-js', ADL_TEAM_PUBLIC_ASSETS . 'js/featherlight.js', array('jquery', 'adl-team-owl-carousel-js', 'adl-team-appear-js','adl-team-public-js'), ADL_TEAM_VERSION);

        // Styles
        wp_register_style('adl-team-font-awesome-min', ADL_TEAM_PUBLIC_ASSETS . 'css/font-awesome.min.css', false, ADL_TEAM_VERSION);
        wp_register_style('adl-team-owl-carousel-style', ADL_TEAM_PUBLIC_ASSETS . 'css/owl.carousel.css', false, ADL_TEAM_VERSION);
        wp_register_style('adl-team-core-style', ADL_TEAM_PUBLIC_ASSETS . 'css/style.css', array('adl-team-font-awesome-min', 'adl-team-owl-carousel-style'), ADL_TEAM_VERSION);
        wp_register_style('featherlight', ADL_TEAM_PUBLIC_ASSETS . 'css/featherlight.css',array('adl-team-font-awesome-min', 'adl-team-owl-carousel-style','adl-team-core-style'), ADL_TEAM_VERSION);
    }
}



endif;