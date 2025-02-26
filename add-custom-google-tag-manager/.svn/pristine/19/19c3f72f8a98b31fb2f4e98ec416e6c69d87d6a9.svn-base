<?php
$myInstallationData=array( //DATA INFORMATION FOR INSTALL/REMOVE PLUGIN DATA. (USED IN: CONFIG/SETUP.PHP / ASSETS/JS/GTM.PHP / FRONT/BUILDER.PHP)
    'tag-manager-add-custom-tag-manager'=>'1', //CHECK IF KEY EXISTS THEN PLUGIN INSTALLED AT DATABASE IF NOT PROBABLY ALL PLUGIN DELETED AS WELL.
    'tag-manager-custom-id'=>'', //TAG MANAGER ACCOUNT ID
    'tag-manager-custom-placement'=>'', //PLACEMENT OF CUSTOM HTML SCIRPT IN FRONT
    'tag-manager-is-widget-active'=>'', //IF THIS PLUGIN IS DE/ACTIVATE BY USER
    'tag-manager-add-custom-script'=>'', //CUSTOM LIVE HTML SCRIPT TO LOAD IN FRONT
    'tag-manager-custom-script-element'=>'', //CUSTOM SCRIPT ELEMENT SELECTOR TO LOAD CUSTOM SCRIPT
    'tag-manager-loading-method'=>'', //LOAD TAG MANAGER VIA WP_HEAD WP_FOOTER OR ASYNC SCRIPT IF ACTIVATE
);

if ( !function_exists('confirm_val') ){
    function confirm_val($val = false, $valconfirm = false, $output = false){
        if ($val == $valconfirm){
            echo $output;
            return true;
        }
        return false;
    }
}

if ( !function_exists('exist_option')){
    function exist_option( $arg ) {
    global $wpdb;
    $prefix = $wpdb->prefix;
    $db_options = $prefix.'options';
    $sql_query = 'SELECT * FROM ' . $db_options . ' WHERE option_name LIKE "' . $arg . '"';
    $results = $wpdb->get_results( $sql_query, OBJECT );
    if ( count( $results ) === 0 ) {
        return false;
    } else {
        return true;
    }
    }
}

if (!function_exists('find_wordpress_abspath')){
    function find_wordpress_abspath(){
        $abs_path = false;
        $curr_pos = __DIR__;
        $search = true;
        $limit = 20;
        $cur= 1;
        
        while ($search){
            if ($cur>=$limit){$search = false; }
            if ($files = @scandir($curr_pos)){
                if (in_array('wp-config.php', $files)){
                    $search = false;
                    $abs_path = $curr_pos;
                }else{
                    $curr_pos.= '/../';
                    $curr_pos = realpath($curr_pos);
                }
            }
            $cur++;
        }
        
        return $abs_path;
    }
}

if (!function_exists('tmcs_add_custom_script_to_dom')){
    function tmcs_add_custom_script_to_dom(){
        echo get_option('tag-manager-add-custom-script'); 
    }
}
