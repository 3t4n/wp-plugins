<?php

if ( !class_exists('PT_Shortcode') ):

class PT_Shortcode {

    function __construct (){
        add_shortcode('adl_pricing_table', [$this, 'pt_shortcode_output']);
    }




    public function pt_shortcode_output( $atts, $content = null ) {
                global $post;
                ob_start();
                extract( shortcode_atts( [ 'id' => 0, ], $atts ) );
                wp_enqueue_style('pt-core');
                $package_data = get_post_meta($id, 'adl_pt_data_group', true);
                $pt_package_theme = get_post_meta($id, 'pt_package_theme', true);


                // allowed html for the font awesome icon
                $allowed_html = ['a' => [
                    'class' => [],
                ]];

                // FONTS SETTING
                $headerFS = get_post_meta($id, 'headerFS', true) .'px';
                $priceFS = get_post_meta($id, 'priceFS', true).'px';
                $planFS = get_post_meta($id, 'planFS', true).'px';
                $featureFS = get_post_meta($id, 'featureFS', true).'px';
                $buttonFS = get_post_meta($id, 'buttonFS', true).'px';

                // count packages number to make div responsive
                $package_count = count($package_data);
                switch($package_count){
                    case 5:
                    case 4:
                        $columns = 'col-sm-6 col-md-3';
                        break;
                    case 3:
                        $columns = 'col-sm-6 col-md-4';
                        break;
                    case 2:
                        $columns = 'col-sm-6';
                        break;
                    default:
                        $columns = 'col-sm-12 col-md-6  col-md-offset-3';

                }
                $ptTblID = 'ID_'.rand();
                if ( is_array($package_data) && count($package_data) ) {
                    ( ! empty( $pt_package_theme ) ) ? include PT_DIR . 'themes/' . $pt_package_theme . '/index.php' : include PT_DIR . 'themes/style4/index.php';
                }else{
                    echo 'No Table Found';
                }
                $content = ob_get_clean();
                return $content;

    }



}



endif;