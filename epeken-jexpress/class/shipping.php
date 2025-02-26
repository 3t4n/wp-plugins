<?php
if(!defined('ABSPATH')) exit;
class EpekenJexpress extends WC_Shipping_Method {
    public function __construct(){
        $this -> logger = new WC_Logger();
        $this -> id = 'jexpress';
        $this -> title = 'Jexpress';
        $this -> method_title = 'JExpress';
        $this -> method_description = __('Jexpress shipping method');
        $this -> enabled = 'yes';
        $this -> is_disc_applicable = false;
        $this -> real_discount = 0;
        $this -> init_form_fields();
        $this -> init_settings(); 
       }
    public function writelog($str){
        $logger = $this -> logger;
        $logger -> add($this -> id, $str);
    }
    public function init_form_fields(){
        $this -> form_fields  = array(
        'enabled' => array(
        'title'   => __('Enable/Disable','woocommerce'),
        'type'    => 'checkbox',
        'label'   => __('Enable this shipping method','woocommerce'),
        'default' => 'yes',
        ),
       'pilihan_origin' => array(
          'type' => 'pilihan_origin'
        ),
       'pilihan_layanan' => array(
           'type' => 'pilihan_layanan'
       ),
       'user_credential' => array(
            'type' => 'user_credential'
       ),
       'shipper_info' => array(
            'type' => 'shipper_info'
       )
     );
        add_action('woocommerce_update_options_shipping_'.$this->id,array(&$this, 'process_admin_options'));
        add_action('woocommerce_update_options_shipping_methods',array(&$this, 'process_admin_options'));					
        add_action('woocommerce_update_options_shipping_'.$this->id, array( &$this, 'process_update_settings' ) );
        add_action('admin_enqueue_scripts', array(&$this,'admin_enqueue_scripts'));
        add_action('woocommerce_checkout_update_order_meta', array(&$this, 'action_on_order_created'));
    }

    public function process_update_settings() {
        update_option('epeken_jexpress_api_username', sanitize_text_field($_POST['username']));
        update_option('epeken_jexpress_api_password', sanitize_text_field($_POST['password']));
        update_option('epeken_jexpress_api_client_id', sanitize_text_field($_POST['client_id']));
        epeken_jexpress_save_credential(sanitize_text_field($_POST['username']), sanitize_text_field($_POST['password']),
			   sanitize_text_field($_POST['client_id']));
    }

    public function generate_user_credential_html() {
        ob_start();
        $username = sanitize_text_field(get_option('epeken_jexpress_api_username'));
        $password = sanitize_text_field(get_option('epeken_jexpress_api_password'));
        $client_id = sanitize_text_field(get_option('epeken_jexpress_api_client_id'));
        echo '<tr align="left">';
        echo '<th scope="row" class="titledesc">JExpress User <br>Credential</th>';
        echo '<td>';
        echo '<p>Username <br><input type="text" placeholder="admin" value = "'.esc_html($username).'" name="username"/></p>';
        echo '<p>Password <br><input type="text" placeholder="admin" value = "'.esc_html($password).'" name="password" /></p>';
        echo '<p>Client ID <br><input type="text" value = "'.esc_html($client_id).'" name="client_id" /></p>';
        echo '</td></tr>';
        return ob_get_clean();
    }
    public function generate_pilihan_layanan_html() {
        ob_start();
        
        return ob_get_clean();
    }
    public function generate_shipper_info_html() {
        ob_start();
        
        return ob_get_clean();
    }
    public function generate_pilihan_origin_html() {  
        ob_start();
        $city = epeken_code_to_city(sanitize_text_field(get_option('epeken_data_asal_kota')));
        echo '<tr align="left">';
        echo '<th scope="row" class="titledesc">Pilihan Kota Asal</th>';
        echo '<td><p><strong>';
        if (empty($city)) {
            echo 'Belum Dipilih. 
            (Silakan pilih kota asal pada 
            <a href="admin.php?page=wc-settings&tab=shipping&section=epeken_courier">
            setting plugin Epeken All Kurir</a>)';
        }else{
            echo esc_html($city);
        }
        echo '</strong></p></td>';
        echo '</tr>';
        return ob_get_clean();
      }
      public function calculate_shipping($package=array()){
        $options = get_option('woocommerce_jexpress_settings'); #return array
        if($options['enabled'] !== 'yes')
            return;
        $shipping = WC_Shipping::instance();
        $methods = $shipping -> get_shipping_methods();
        $epeken_all_kurir = $methods['epeken_courier'];
        $epeken_all_kurir -> get_destination_city_and_kecamatan();
        $shipping_city = sanitize_text_field(urldecode($epeken_all_kurir -> shipping_city));
        $shipping_kecamatan = sanitize_text_field(urldecode($epeken_all_kurir -> shipping_kecamatan));
        $destination_province = sanitize_text_field(urldecode($epeken_all_kurir -> destination_province));
        $origin_city = sanitize_text_field(get_option('epeken_data_asal_kota'));
	$origin_city = epeken_code_to_city($origin_city);
	$weight_unit = sanitize_text_field(get_option('woocommerce_weight_unit'));
        $weight = $this -> get_package_weight($package);
        if($weight_unit === 'kg')
	        $weight = $weight * 1000; //to gram
        
        $rates = epeken_jexpress_price($origin_city,$shipping_city,$shipping_kecamatan,$destination_province,$weight);
        if(empty($rates))
            return;
        $rates = json_decode($rates,true);
        
        if(!is_array($rates['result']))
            return;
        
        foreach($rates['result'] as $rate){
            
            if($rate['total_price'] <= 0)
                continue;

            $t = $this -> title.' '.$rate['service'];     
            $normalized_rate = array('id' => $this -> id.'_'.$rate['service'],
                'label' => $t.' ('.$rate['etd'].')',
                'cost' => $rate['total_price'],
                'taxes' => false
            );
            
            $this -> add_rate( $normalized_rate );
        }
        
    }
    public function get_package_weight($packages) {
        $tweight = 0;
            foreach($packages['contents'] as $package) {
                $product_id = $package['product_id'];
            $quantity = $package['quantity'];
            if($package['variation_id'] > 0){
                $product_id = $package['variation_id'];
            }
            $product = wc_get_product($product_id);
            $weight = $quantity * floatval($product -> get_weight());
            $tweight += $weight;
        }
        return $tweight;
    }
}

?>
