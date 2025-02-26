<?php 

class AllegroSyncFieldsSettingsForm {
	
	private $modelData;
	
	public function __construct($modelData = null){
		$this->modelData = $modelData;
	}
	
	public function show_settings_form(){
        $plgSettingsModel = $this->modelData['allegro_settings'];
        $plgSettings = $plgSettingsModel->get_settings();
		
		$installed_ver = get_option( "allegro_sync_db_version" );	
				
		$allegro_client_id = isset($plgSettings['allegro_client_id']) ? $plgSettings['allegro_client_id'] : "";;
		$redirect_uri = isset($plgSettings['woocommerce_url']) ? $plgSettings['woocommerce_url'] : "";
		$allegro_api_url = "https://allegro.pl/auth/oauth/authorize?response_type=code&client_id={$allegro_client_id}&redirect_uri=" . $redirect_uri;
		
        $html = $this->create_form(admin_url('admin.php?page=srtx_allegro_symc_settings'),'settingsForm')
            .'<table class="form-table" id="allegro_api_connect">'
            .'<tr valign="top"><th scope="row"><label for="allegro_last_updated">'.__('Last updated','e-strix-allegro-symc').'</label></th><td>'.$this->generate_text_input_disable('allegro_last_updated',false,(isset($plgSettings['allegro_last_updated']) ? $plgSettings['allegro_last_updated'] : null)).'</td></tr>'
            .'<tr valign="top"><th scope="row"><label for="allegro_versoin">'.__('Version','e-strix-allegro-symc').'</label></th><td>'.$installed_ver.'</td></tr>'
            .'<tr valign="top"><th scope="row"><label for="woocommerce_url">'.__('Shop URL','e-strix-allegro-symc').'</label></th><td>'.$this->generate_text_input('woocommerce_url',true,(isset($plgSettings['woocommerce_url']) ? $plgSettings['woocommerce_url'] : null),'regular-text').'</td></tr>'
            .'<tr valign="top"><td colspan="2"><h2>'.__('Allegro REST API:','e-strix-allegro-symc').'</h2><p>'.__("Log in Allegro API",'e-strix-allegro-symc').' <a href="'.$allegro_api_url.'" >'.__("Login",'e-strix-allegro-symc').'</a>.</p></td></tr>'
            .'<tr valign="top"><th scope="row"><label for="allegro_seller_id">'.__('Seller','e-strix-allegro-symc').'</label></th><td>'.$this->generate_text_input_disable('allegro_seller_id',false,(isset($plgSettings['allegro_seller_id']) ? $plgSettings['allegro_seller_id'] : null)).'</td></tr>'
            .'<tr valign="top"><th scope="row"><label for="allegro_client_id">'.__('Client ID / klucz WebAPI','e-strix-allegro-symc').'</label></th><td>'.$this->generate_text_input('allegro_client_id',true,(isset($plgSettings['allegro_client_id']) ? $plgSettings['allegro_client_id'] : null),'regular-text').'</td></tr>'
            .'<tr valign="top"><th scope="row"><label for="allegro_client_secret">'.__('Client Secret','e-strix-allegro-symc').'</label></th><td>'.$this->generate_text_input('allegro_client_secret',true,(isset($plgSettings['allegro_client_secret']) ? $plgSettings['allegro_client_secret'] : null),'regular-text').'</td></tr>'
            .'<tr valign="top"><td colspan="2"><h2>'.__('WooCommerce API:','e-strix-allegro-symc').'</h2><p>'.__("How to genereate WooCommerce API keys",'e-strix-allegro-symc').' <a href="https://docs.woocommerce.com/document/woocommerce-rest-api/"  target="_blank">'.__("See",'e-strix-allegro-symc').'</a>.</td></tr>'
            .'<tr valign="top"><th scope="row"><label for="woocommerce_ck">'.__('Customer key','e-strix-allegro-symc').'</label></th><td>'.$this->generate_text_input('woocommerce_ck',true,(isset($plgSettings['woocommerce_ck']) ? $plgSettings['woocommerce_ck'] : null),'regular-text').'</td></tr>'
            .'<tr valign="top"><th scope="row"><label for="woocommerce_cs">'.__('Customer secret','e-strix-allegro-symc').'</label></th><td>'.$this->generate_text_input('woocommerce_cs',true,(isset($plgSettings['woocommerce_cs']) ? $plgSettings['woocommerce_cs'] : null),'regular-text').'</td></tr>'
            .'</table>'
            .$this->get_save_button()
            .$this->end_form();
        return $html;
    }
	
	public function get_save_button(){
		return '<input class="button button-primary button-large" type="submit" value="'.__('Save','e-strix-allegro-symc').'" />';
	}
	
	public function create_form($action,$id = 'importAuctions',$method = 'POST'){
		return '<form id="'.$id.'" action="'.$action.'" method="'.$method.'">';
	}
	
	public function end_form(){
		return '</form>';
	}
	
	public function generate_hidden_input($name,$value = null){
		return '<input autocomplete="off" type="hidden" id="'.$name.'" name="'.$name.'" value="'.$value.'" />';
	}
	
	public function generate_text_input_disable($name,$required = null,$value = null,$class = ''){
		return '<input autocomplete="off" class="'.$class.'" id="'.$name.'" type="text"  disabled="disabled" name="'.$name.'" value="'.$value.'"'.($required?' required':'').'/>';
	}
	public function generate_text_input($name,$required = null,$value = null,$class = ''){
		return '<input autocomplete="off" class="'.$class.'" id="'.$name.'" type="text" name="'.$name.'" value="'.$value.'"'.($required?' required':'').'/>';
	}
	
	public function generate_number_input($name,$required = null,$value = null,$class = '',$min=1,$max=10){
		return '<input autocomplete="off" class="'.$class.'" id="'.$name.'" min="'.$min.'" max="'.$max.'" type="number" name="'.$name.'" value="'.$value.'"'.($required?' required':'').'/>';
	}
	
	public function generate_password_input($name,$required = null,$value = null,$class = ''){
		return '<input autocomplete="off" id="'.$name.'" type="password" class="'.$class.'" name="'.$name.'" value="'.$value.'"'.(!$value && $required ? ' required':'').'/>';
	}
}
?>