<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 


//this endopoints only are avalaible for admin 


    add_action('rest_api_init', function () {
        //para ver si el usuario ya existe 
        register_rest_route('bravo-sp', '/BRAVOSP_create', [
            'methods'   => WP_REST_Server::READABLE,
            'callback'  => 'BRAVOSP_create',
            'permission_callback' => '__return_true'
        ]);
        register_rest_route('bravo-sp', '/BRAVOSP_update', [
            'methods'   => WP_REST_Server::READABLE,
            'callback'  => 'BRAVOSP_update',
            'permission_callback' => '__return_true'
        ]);
        register_rest_route('bravo-sp', '/BRAVOSP_delete', [
            'methods'   => WP_REST_Server::READABLE,
            'callback'  => 'BRAVOSP_delete',
            'permission_callback' => '__return_true'
        ]);
        register_rest_route('bravo-sp', '/BRAVOSP_dismiss', [
            'methods'   => WP_REST_Server::READABLE,
            'callback'  => 'BRAVOSP_dismiss',
            'permission_callback' => '__return_true'
        ]);
    });


function BRAVOSP_create(WP_REST_Request $request){

    if (!BRAVOSP_isAllowedAjaxContext()) return;
            global $wpdb;
            $textTo=sanitize_text_field($request->get_param('searchFor'));
            $yourreplacement=sanitize_text_field($request->get_param('replaceBy'));
            $sql="INSERT INTO `".$wpdb->base_prefix."bravo_sp` (`ID`, `searchFor`, `replaceBy`) VALUES (NULL, '$textTo', '$yourreplacement');";
            $results=$wpdb->get_results($sql);
            $sql="SELECT * FROM `".$wpdb->base_prefix."bravo_sp` ORDER BY `".$wpdb->base_prefix."bravo_sp`.`ID` DESC";
            $results=$wpdb->get_results($sql);
            $response='<div id="message"  style="width:96%;max-width:800px;margin:10px auto" class="updated notice is-dismissible">
            <p>'.__('1 replacement added','bravo-search-replace').'</p><button type="button" onclick="BRAVOSPdismiss()" class="notice-dismiss">
            <span class="screen-reader-text">'.__('Dismiss.','bravo-search-replace').'</span></button>
            </div>
            <table class="wp-list-table widefat fixed striped table-view-list pages bravoTable"><tr><td class="bravoCell bravoCellHeader">Search For</td><td class="bravoCell bravoCellHeader">Replace By</td> <td style="width:40px"></td></tr>';
            if($wpdb->num_rows>0){
            foreach($results as $result){
            $response.='<tr id="trID"'.$result->ID.'"><td id=forID'.$result->ID.' class="bravoCell">'.$result->searchFor.'</td><td id="toID'.$result->ID.'"'." class='bravoCell'>".$result->replaceBy."</td>
            <td style='width:40px'><span class='edit BRAVOSPminiButton'><a onclick='BRAVOSP_edit(".$result->ID.")'>Edit</a> <br><span class='trash BRAVOSPminiButton'><a onclick='BRAVOSP_delete(".$result->ID.")'> Delete</a></td></tr>";
            }
            }
            $response.="</table>";
    
            echo $response;
    
    }


function BRAVOSP_update(WP_REST_Request $request){

if (!BRAVOSP_isAllowedAjaxContext()) return;
    $textTo=sanitize_text_field($request->get_param('searchFor'));
    $yourreplacement=sanitize_text_field($request->get_param('replaceBy'));
    $id=$request->get_param('id');
    global $wpdb;
    $sql="UPDATE `".$wpdb->base_prefix."bravo_sp` SET `searchFor` = '".$textTo."', `replaceBy` = '".$yourreplacement."' WHERE `".$wpdb->base_prefix."bravo_sp`.`ID` = ".$id.";";
    $results=$wpdb->get_results($sql);
    $sql="SELECT * FROM `".$wpdb->base_prefix."bravo_sp` ORDER BY `".$wpdb->base_prefix."bravo_sp`.`ID` DESC";
    $results=$wpdb->get_results($sql);
    $response='<div id="message"  style="width:96%;max-width:800px;margin:10px auto" class="updated notice is-dismissible">
    <p>'.__('1 record edited','bravo-search-replace').'</p><button type="button" onclick="BRAVOSPdismiss()" class="notice-dismiss">
    <span class="screen-reader-text">'.__('Dismiss.','bravo-search-replace').'</span></button>
    </div>
    <table class="wp-list-table widefat fixed striped table-view-list pages bravoTable"><tr><td class="bravoCell bravoCellHeader">Search for</td><td class="bravoCell bravoCellHeader">Replace by</td> <td style="width:40px"></td></tr>';
    if($wpdb->num_rows>0){
    foreach($results as $result){
        $response.='<tr id="trID"'.$result->ID.'"><td id=forID'.$result->ID.' class="bravoCell">'.$result->searchFor.'</td><td id="toID'.$result->ID.'"'." class='bravoCell'>".$result->replaceBy."</td>
        <td style='width:40px'><span class='edit BRAVOSPminiButton'><a onclick='BRAVOSP_edit(".$result->ID.")'>Edit</a> <br><span class='trash BRAVOSPminiButton'><a onclick='BRAVOSP_delete(".$result->ID.")'> Delete</a></td></tr>";
    }
    }
    $response.="</table>";
    
    echo $response;
}



function BRAVOSP_delete(WP_REST_Request $request){

if (!BRAVOSP_isAllowedAjaxContext()) return;

    $id=$request->get_param('ID');
    global $wpdb;
    $sql="DELETE FROM `".$wpdb->base_prefix."bravo_sp` WHERE `".$wpdb->base_prefix."bravo_sp`.`ID` = $id";
    $results=$wpdb->get_results($sql);
    $sql="SELECT * FROM `".$wpdb->base_prefix."bravo_sp` ORDER BY `".$wpdb->base_prefix."bravo_sp`.`ID` DESC";
    $results=$wpdb->get_results($sql);
    $response='<div id="message"  style="width:96%;max-width:800px;margin:10px auto" class="updated notice is-dismissible">
    <p>'.__('1 replacement deleted','bravo-search-replace').'</p><button type="button" onclick="BRAVOSPdismiss()" class="notice-dismiss">
    <span class="screen-reader-text">'.__('Dismiss.','bravo-search-replace').'</span></button>
    </div>
    <table class="wp-list-table widefat fixed striped table-view-list pages bravoTable"><tr><td class="bravoCell bravoCellHeader">Search for</td><td class="bravoCell bravoCellHeader">Replace by</td> <td style="width:40px"></td></tr>';
    if($wpdb->num_rows>0){
    foreach($results as $result){
        $response.='<tr id="trID"'.$result->ID.'"><td id=forID'.$result->ID.' class="bravoCell">'.$result->searchFor.'</td><td id="toID'.$result->ID.'"'." class='bravoCell'>".$result->replaceBy."</td>
        <td style='width:40px'><span class='edit BRAVOSPminiButton'><a onclick='BRAVOSP_edit(".$result->ID.")'>Edit</a> <br><span class='trash BRAVOSPminiButton'><a onclick='BRAVOSP_delete(".$result->ID.")'> Delete</a></td></tr>";
    }
    }
    $response.="</table>";
    
    echo $response;
}

function BRAVOSP_dismiss(){
    update_option( 'BRAVOSP_notice', false);
return true;
}
        
function BRAVOSP_isAllowedAjaxContext(){
    $user_id = wp_validate_auth_cookie( $_COOKIE[LOGGED_IN_COOKIE], 'logged_in' );
    if(user_can($user_id,'activate_plugins')){
        return true;
    }
        else{
        return false;
    }    
}       
?>