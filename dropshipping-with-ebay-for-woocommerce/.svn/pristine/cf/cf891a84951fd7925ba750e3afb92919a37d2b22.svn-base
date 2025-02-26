<?php

/**
 * Description of E2WL_Account
 *
 * @author Andrey
 */
if (!class_exists('E2WL_Account')) {

    class E2WL_Account {
        private static $_instance = null;
        
        public $custom_account = false;
        
        public $account_data = array('app_id'=>'', 'cert_id'=>'', 'tracking_id'=>'', 'network_id'=>'9', 'custom_id'=>'');
        
        static public function getInstance() {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        protected function __construct() {
            $this->account_type = e2wl_get_setting('account_type');
            $this->custom_account = e2wl_get_setting('use_custom_account');
            $this->account_data = array_merge($this->account_data, e2wl_get_setting('account_data'));
        }
        
        public function use_custom_account($use_custom_account = false) {
            $this->custom_account = $use_custom_account;
            e2wl_set_setting('use_custom_account', $this->custom_account);
        }
        
        public function get_account() {
            return !empty($this->account_data)?$this->account_data:array('app_id'=>'', 'cert_id'=>'', 'tracking_id'=>'', 'network_id'=>'9', 'custom_id'=>'');
        }
        
        public function save_account($app_id, $cert_id, $tracking_id, $network_id, $custom_id) {
            $this->account_data['app_id']=$app_id;
            $this->account_data['cert_id']=$cert_id;
            $this->account_data['tracking_id']=$tracking_id;
            $this->account_data['network_id']=$network_id;
            $this->account_data['custom_id']=$custom_id;
            e2wl_set_setting('account_data', $this->account_data);

            delete_option('_e2w_api_token');
        }

        public function get_access_token() {
            if(!$this->custom_account){
                return E2WL_ResultBuilder::buildError("You need to set up your eBay Client ID and Client Secret on the Setting > Account settings page");
            }

            if (e2wl_check_defined('E2WL_EBAY_CLIENT_ID')) {
                $app_id = E2WL_EBAY_CLIENT_ID;
            }else{
                $app_id = isset($this->account_data['app_id'])?$this->account_data['app_id']:"";
            }

            if (e2wl_check_defined('E2WL_EBAY_CLIENT_SECRET')) {
                $cert_id = E2WL_EBAY_CLIENT_SECRET;
            }else{
                $cert_id = isset($this->account_data['cert_id'])?$this->account_data['cert_id']:"";
            }

            if(empty($app_id) || empty($cert_id)){
                return E2WL_ResultBuilder::buildError("Input correct Client ID and Client Secret on the Setting > Account settings page");
            }

            $access_token = get_option('_e2w_api_token');
            if(false === $access_token || intval($access_token['expires_at'])<time()) {
                $request = e2wl_remote_post('https://api.ebay.com/identity/v1/oauth2/token', 
                    array('grant_type'=>'client_credentials', 'scope'=>'https://api.ebay.com/oauth/api_scope'),
                    array('headers'=>
                        array('Content-Type'=>'application/x-www-form-urlencoded', 
                        'Authorization'=>'Basic '.base64_encode($app_id.':'.$cert_id)
                        )
                    )
                );

                if (is_wp_error($request)) {
                    $result = E2WL_ResultBuilder::buildError($request->get_error_message());
                } else {
                    $body = json_decode($request['body'], true);

                    if(isset($body['error'])){
                        $result = E2WL_ResultBuilder::buildError($body['error_description']);
                    }else{
                        if(false === $access_token){
                            add_option('_e2w_api_token', array('access_token'=>$body['access_token'],'expires_at'=>time()+intval($body['expires_in'])), '', 'no');
                        }else{
                            update_option('_e2w_api_token', array('access_token'=>$body['access_token'],'expires_at'=>time()+intval($body['expires_in'])), 'no');
                        }
                        $result = E2WL_ResultBuilder::buildOk(array('access_token'=>$body['access_token']));
                    }
                }
            }else{
                $result = E2WL_ResultBuilder::buildOk(array('access_token'=>$access_token['access_token']));
            }
            return $result;
        }
        
        public function build_params(){
            if (defined('E2WL_ITEM_PURCHASE_CODE') && E2WL_ITEM_PURCHASE_CODE) {
                $item_purchase_code = E2WL_ITEM_PURCHASE_CODE;
            }else{
                $item_purchase_code = e2wl_get_setting('item_purchase_code');
            }

            if (e2wl_check_defined('E2WL_EBAY_CLIENT_ID')) {
                $app_id = E2WL_EBAY_CLIENT_ID;
            }else{
                $app_id = isset($this->account_data['app_id'])?$this->account_data['app_id']:"";
            }

            $result="token=".urlencode($item_purchase_code)."&version=".E2WL()->version.($this->custom_account?("&appID={$app_id}".(!empty($this->account_data['tracking_id'])?"&tracking_id={$this->account_data['tracking_id']}":'').(!empty($this->account_data['network_id'])?"&network_id={$this->account_data['network_id']}":'').(!empty($this->account_data['custom_id'])?"&custom_id={$this->account_data['custom_id']}":'')):'');
            return $result;
        }

        public function is_activated(){
            $item_purchase_code = e2wl_check_defined('E2WL_ITEM_PURCHASE_CODE')?E2WL_ITEM_PURCHASE_CODE:e2wl_get_setting('item_purchase_code');
            return !empty($item_purchase_code);
        }
    }

}
