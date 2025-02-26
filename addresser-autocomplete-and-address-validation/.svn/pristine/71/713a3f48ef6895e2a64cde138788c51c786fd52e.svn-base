<?php 
/*
*
*   ***** Addresser *****
*
*   Ajax Request
*   
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if


function addresser_curl($url,$apiKey){
    $args = array(
        'headers' => array(
            'x-api-key' => $apiKey
        )
    );
    $result = wp_remote_get( $url, $args );

    $response = wp_remote_retrieve_body( $result ) ;

    return $response;
}
/*
Ajax Requests
*/
add_action( 'wp_ajax_addresser_getautocomplete_frontend_ajax', 'addresser_getautocomplete_frontend_ajax' );
add_action( 'wp_ajax_nopriv_addresser_getautocomplete_frontend_ajax', 'addresser_getautocomplete_frontend_ajax' );
function addresser_getautocomplete_frontend_ajax(){   
    global $wpdb;
    $table_name = $wpdb->prefix.'wc_admin_notes';
    ob_start();
    $apiKey = get_option( 'wc_addressers_tab_apikey' );

    if(!empty($apiKey)){

        $url = 'https://api.addresser.com.au/getautocomplete/all?search_word='.sanitize_text_field($_POST['search']).'';

        $response = addresser_curl($url,$apiKey);

        $response = str_replace("'", '"', $response);

        $data = json_decode($response,true);

        if(isset($data['errorCode']) && array_key_exists("errorCode", $data)){

            $array = array('response'=>true,'response_code'=>201,'data'=>[]);

            $checkIfExists = $wpdb->get_var("SELECT * FROM `$table_name` WHERE `name` = 'wc-admin-addressers-api-error'");

            if ($checkIfExists == NULL) {
                $wpdb->insert($table_name, array(
                    'name' => 'wc-admin-addressers-api-error',
                    'type' => 'error',
                    'locale' => 'en_US',
                    'title' => 'Addressers API',
                    'content' => $data['errorMessage'],
                    'content_data' => '{}',
                    'status' => 'unactioned',
                    'source' => 'woocommerce-addressers',
                    'date_created' => date('Y-m-d h:m:s'),
                    'date_reminder' => '',
                    'is_snoozable' => 0,
                    'layout' => 'plain',
                    'image' => '',
                    'is_deleted' => 0,
                    'is_read' => 0,
                    'icon' => 'info',
                ));
            }else{
                $wpdb->update($table_name, array('content'=>$data['errorMessage']), array('note_id'=>$checkIfExists));
            }
            
        }else{
            
            $checkIfExists = $wpdb->get_var("SELECT * FROM `$table_name` WHERE `name` = 'wc-admin-addressers-api-error'");

            $wpdb->delete( $table_name, array( 'note_id' => $checkIfExists ) );

            $array = array('response'=>true,'response_code'=>200,'data'=>$data);

        }

        echo wp_send_json($array);
        
    }else{

        $array = array('response'=>false,'response_code'=>4076,'data'=>'Api key not found please add the api key');

        echo wp_send_json($array);
    }
    wp_die();
}


add_action( 'wp_ajax_addresser_getmetadata_frontend_ajax', 'addresser_getmetadata_frontend_ajax' );
add_action( 'wp_ajax_nopriv_addresser_getmetadata_frontend_ajax', 'addresser_getmetadata_frontend_ajax' );
function addresser_getmetadata_frontend_ajax(){   
    ob_start();
    $apiKey = get_option( 'wc_addressers_tab_apikey' );

    if(!empty($apiKey)){

        $url = 'https://api.addresser.com.au/getmetadata/all?_id='.sanitize_text_field($_POST['id']).'';

        $response = addresser_curl($url,$apiKey);

        $data = json_decode($response);

        $array = array('response'=>true,'response_code'=>200,'data'=>$data);

        echo wp_send_json($array);

    }else{

        $array = array('response'=>false,'response_code'=>4076,'data'=>'Api key not found please add the api key');

        echo wp_send_json($array);

    }

    wp_die();
}