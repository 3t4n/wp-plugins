<?php

defined( 'ABSPATH' ) or exit;

class adoric_ajax
{    
    public function __construct()
    {
        $actions = [ 'adoric_install', 'deactivate_adoric_plugin' ];
        
        foreach ( $actions as $action ) {
            add_action( "wp_ajax_{$action}", array( $this, $action ) );
        }
    }
    
    public function adoric_install()
    {
        $id = filter_input(INPUT_POST, 'accountId');
        $validateAccountId = wp_remote_get( ADORIC__APP__HOST__ . "/v1/public/wp/validate-account?accountId={$id}&hostname={$_SERVER['HTTP_HOST']}" );
        $resultValidaton = json_decode(wp_remote_retrieve_body( $validateAccountId ), TRUE);
        
        error_log(print_r($resultValidaton, true));
        
        if ($resultValidaton === NULL) {
            wp_send_json_error('Service unavailable');
            return;
        }
        
        if ($resultValidaton['code'] == 200) {
            $getEmbedCodeForAccount = wp_remote_get(ADORIC__APP__HOST__ . "/v1/public/wp/get-activation-code?accountId={$id}");
            $embedCode = json_decode(wp_remote_retrieve_body( $getEmbedCodeForAccount ), TRUE);
            
            if ($embedCode['html']) {
                $res = ADORICWP::instance()->sql->update_account_data([
                    'account_id' => $id,
                    'domain_id' => $resultValidaton['data']['domainId'],
                    'embed_code' => base64_encode($embedCode['html'])
                ]);
                
                wp_send_json_success( [
                    'result' => $res,
                    'redirect' => admin_url( 'admin.php?page=' . ADORIC_MAIN_DIR . '/views/dashboard.php' )
                ] );
            } else {
                wp_send_json_error($embedCode['error']['details']);
            }
        } else {
            wp_send_json_error($resultValidaton['error']['details']);
        }
    }
    
    public function deactivate_adoric_plugin() {
        if (is_plugin_active( plugin_basename( ADORIC__FILE__ ) )) {
            deactivate_plugins( plugin_basename( ADORIC__FILE__ ) );
            flush_rewrite_rules();
            
            return wp_send_json_success( [
                'redirect' => get_admin_url()
            ] );
        }
    }
}