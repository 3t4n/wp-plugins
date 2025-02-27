<?php
namespace PSSG_Sync_Sheet\App\Http;

use PSSG_Sync_Sheet\App\Service\Products;
use PSSG_Sync_Sheet\App\Core\Admin_Base;
use PSSG_Sync_Sheet\App\Service\Standalone;
/**
 * Whole Sheet manage and Create Access Tocket
 * update, edit Sheet related all things
 * will manage from here
 * 
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 */
class Sheet
{

    use Standalone;
    public $client_id;
    public $client_secret;
    public $action_hook_name = [];

    //for tokn
    public $client_email;
    public $private_key;
    public $sheet_range; //it will generate before update method call

    //for update sheet
    public $spreadsheet_id;
    public $sheet_name;
    public $API_KEY;
    public $tokn_key = 'pssg_eta_holo_akses_tokn';
    public $sheet_index_key = 'pssg_sheet_index_data'; //pssg_sheet_index


    public $Products;
    public $Admin_Base;
    public $Admin_Base_Settings;

    public $option_key = 'pssg_service_json_data';
    public $service_data;
    /**
     * Connection status or configuration
     * completion on Dashboard status
     * 
     * If false, No action will happend.
     * 
     *
     * @var boolean if setup complete and found all ok, then that value to be true, otherwise false by default
     */
    protected $configured = false;
    protected $errors = [];

    /**
     * Trigger event execution 
     * to be one time, that's why, I kept this 
     * property, so that, I can handle, If call one time, then I will not again call that same event trigger.
     *
     * @var boolean
     */
    public $event_triggered = false;
    public $order_event_triggered = false;
    protected $event_trigger_late = 2; //In second
    public $temp_stock_ids_key = 'pssg_temp_stock_ids';

    /**
     * asole single product edit hobe ki na,
     * seta ekhane joma thakbe, using get_option
     * 
     * Actually I will get this data from get_option
     * to pass permission on Single Product Edit.
     * 
     * To set permission on single product edit,
     * you have to syncronize Sheet first.
     * If you clear Sheet, then this value also be false.
     *
     * @var string
     */
    public $sheet_update_status_key = 'pssg_sheet_update_status';
    public $sheet_update_permission = false;

    //Actually which product already order but not sync yet, that will be stock here
    public $temp_stock_ids = [];

    public function __construct()
    {
      //Sheet Enable Disable Filter Hoook
      $sheet_bool = apply_filters('pssg_sheet_bool', true, 'construct' );
      if( ! $sheet_bool ) return;

      $this->Products = new Products();
      $this->Admin_Base = new Admin_Base();
      $this->Admin_Base_Settings = $this->Admin_Base->settings ?? [];
      
      $this->service_data = get_option( $this->option_key );
      if( empty($this->service_data) || empty( $this->service_data['client_email'] ) || empty( $this->service_data['private_key'] ) ){
        $this->errors[] = __( 'Problem in srvice file.', 'product-sync-master-sheet' );
      }
      //Configure part Start Here *****************


      $this->client_email = $this->service_data['client_email'] ?? '';
      $this->private_key = $this->service_data['private_key'] ?? '';


      
      

      $sheet_url = $this->Admin_Base_Settings['sheet_url'] ?? '';
      if( empty( $sheet_url ) ){
        $this->errors[] = __( 'Sheet URL is not added', 'product-sync-master-sheet' );
      }

      preg_match('/\/d\/(.+?)\//', $sheet_url, $matches);

      //updateer jonno ja ja lagbe
      // $this->spreadsheet_id = $matches[1] ?? '';
      $this->spreadsheet_id = $this->Admin_Base_Settings['spreadsheet_id'] ?? '';
      if( empty( $this->spreadsheet_id ) ){
        $this->errors[] = __( 'Spreadsheet ID not found!', 'product-sync-master-sheet' );
      }
      $this->sheet_name = $this->Admin_Base_Settings['sheet_name'] ?? '';//'Sheet4'; //Sheet4 - for local and Sheet3 for Online
      //Sheet name is not compulsory for making connection
      if( empty( $this->sheet_name ) ){
        $this->errors[] = __( 'Sheet name not founded', 'product-sync-master-sheet' );
      }
      $this->API_KEY = $this->Admin_Base_Settings['api_key'] ?? '';//'AIzaSyCnpI1iNBZDRu7coOrEkwtXjo4H_dMc2kc';

      if( empty( $this->API_KEY ) ){
        $this->errors[] = __( 'API key not found', 'product-sync-master-sheet' );
      }

      if(count($this->errors) == 0){
        $this->configured = true;
      }

      $this->sheet_update_permission = get_option( $this->sheet_update_status_key, false );
    }
    public function run()
    {
      //Sheet Enable Disable Filter Hoook
      $sheet_bool = apply_filters('pssg_sheet_bool', true, 'run' );
      if( ! $sheet_bool ) return;

      //eta database ba dashboard theke configure complete howar por e tru oben noile false thakbe.
      

      // AJAX Callback to handle Google OAuth redirect
      add_action('wp_ajax_pssg_syncronize_products', [$this,'update_sheet']);
      add_action('wp_ajax_noprev_pssg_syncronize_products', [$this,'update_sheet']);
      // AJAX Callback to handle Google OAuth redirect
      add_action('wp_ajax_pssg_cleared_sheet', [$this,'clear_online_sheet']);
      add_action('wp_ajax_noprev_pssg_cleared_sheet', [$this,'clear_online_sheet']);




      if( ! $this->configured ) return;

      // add_action('woocommerce_update_product', [$this,'update_sheet_single_product'], 10, 2);
      add_action('save_post', [$this,'save_post'], 10, 2);

      add_action('delete_post', [$this,'delete_post']);
      
      add_action('woocommerce_update_product_variation', [$this,'variation_product_update']);

      //for stock of all update and so on type update
      add_action('woocommerce_product_set_stock', [$this,'updated_props']);
      add_action('woocommerce_variation_set_stock', [$this,'updated_props']);

      add_action( 'variations_event_trigger_hook', [$this,'variations_event_trigger'] );
      add_action( 'order_event_trigger_hook', [$this,'order_event_trigger'] );
      $this->temp_stock_ids = get_option( $this->temp_stock_ids_key, [] );
      if( ! empty( $this->temp_stock_ids ) && is_array( $this->temp_stock_ids ) ){
        add_action( 'init', [$this,'order_event_trigger'] );
      }
    }

    
    /**
     * Specially for stock update on Order
     * or ti will work for any situation also
     * such: stock, stock_status, etc
     * 
     * When call following @hook
     * * woocommerce_product_set_stock
     * * woocommerce_variation_set_stock
     * * OR: woocommerce_product_object_updated_props ( asole eta dui kkhetrei call hoy - ami use korini)
     * 
     * Then I will store these data to wp option and after complete full order, I will call
     * a event trigger after few second
     *
     * @param object|null $product
     * @return void
     */
    public function updated_props( $product )
    {

      if( is_null( $product ) ) return;
      $product_id = $product->get_id();

      /**
       * Check if product is pass for sheet
       */
      $pass_for_sheet_update = $this->pass_query_args_for_update( $product_id );
      if( ! $pass_for_sheet_update ) return;

      $temp_stocks_ids = get_option( $this->temp_stock_ids_key, [] );
      $temp_stocks_ids[$product_id] = $product_id;
      update_option( $this->temp_stock_ids_key, $temp_stocks_ids );

      if( ! $this->order_event_triggered ){
        wp_schedule_single_event( time() + $this->event_trigger_late, 'order_event_trigger_hook', ['product_id']);
        $this->order_event_triggered = true;
      }
      
    }

    /**
     * When user order some product and woocommerce has update
     * stock using hook 
     * * woocommerce_product_set_stock
     * * woocommerce_variation_set_stock
     * * OR: woocommerce_product_object_updated_props ( asole eta dui kkhetrei call hoy - ami use korini)
     * 
     * 
     *
     * @return void
     */
    public function order_event_trigger($sample)
    {

      $ids = $temp_ids = get_option( $this->temp_stock_ids_key, [] );
      if( ! empty( $temp_ids ) && is_array( $temp_ids ) ){

        $stat = $this->multiple_products_update_online_sheet( array_keys( $temp_ids ) );
        if( ! empty( $stat['status'] ) && $stat['status'] == 'success' ){
          foreach($temp_ids as $product_id => $id){
            if( isset( $ids[$product_id] ) ){
              unset( $ids[$product_id] );
            }
          }
          update_option( $this->temp_stock_ids_key, $ids );
        }
        
        

        //Actually for Ajax actually, 
        //and die() available on this method, So No action will heppend after this method.
        // $this->multiple_products_update( array_keys( $temp_ids ) );

        //Nothing should here, because, die() func called on $this->multiple_products_update;
      }
      
    }

    /**
     * By $this->variation_product_update()
     * I hve called a event trigger with hook 'variations_event_trigger_hook'
     * AND to this method, I will $this->multiple_products_update($product_updates)
     *
     * @param int $product_id
     * @return void
     */
    public function variations_event_trigger($product_id)
    {

      $ids = $this->get_post__in( $product_id );

      if( ! empty( $ids ) ){
        $this->multiple_products_update( $ids );
      }
      
    }

    public function get_post__in( $product_id_or_parent_id )
    {

      $result = [];

      $product = wc_get_product( $product_id_or_parent_id );
      $type = $product->get_type();
      if ( $product && $type ==  'variation' ) {
        // Get the parent product ID
        $parent_id = $product->get_parent_id();
        // Add the parent product ID to the result array
        $result[] = $parent_id;

        $product = wc_get_product( $parent_id );
        // Get all child variations IDs
        $children_ids = $product->get_children();

        // Add child variation IDs to the result array
        $result = array_merge($result, $children_ids);
      }else if ( $product && $type ==  'variable' ) {
        $result[] = $product_id_or_parent_id;
        $children_ids = $product->get_children();
        $result = array_merge($result, $children_ids);
      }

      return $result;
    }


    public function sheet_clear()
    {

      if( ! $this->configured ){
        $response = [
          'status'  => 'failed',
          'error'   => 'configuredFailed',
          'errors'  => $this->errors,
        ];
        wp_send_json( $response );
        die();
      }
      if( empty( $product_ids ) || ! is_array( $product_ids ) ){
        $response = [
          'status'  => 'failed',
          'error'   => 'notFoundProductIDs',
          'errors'  => $this->errors,
        ];
        wp_send_json( $response );
        die();
      }

      $t_d = $this->get_token_data();
      if( empty( $t_d ) ){
        $response = [
          'status'  => 'failed',
          'error'   => 'AccessTokenFailed',
        ];
        wp_send_json( $response );
        die();
      }


      $SheetResponse = $this->clear_online_sheet();
      wp_send_json( $SheetResponse );

      die();

    }

    /**
     * This is a Batch Update
     * actually multiple product update to Online sheet using $product_ids array
     * 
     * ***************
     * IMPORTANT
     * ****************
     * DIE() available on this method, that's why, If call any where, bottom will not go
     * $product_ids TO BE AN ARRAY OF VARIATION'S ID OR ANY KIND OF PRODUCT ID.
     * 
     * 
     * eta mulot multiple product edit er kkhetre sheet a product reload korar jonno
     * tobe
     * ********************
     * Apatoto ei method use korbo na
     * ********************
     * karon reload korle thik moto reload hocche na. asole reload hocche but uporer dike ekoi jinis reload hocche sheet a
     * ejonno amora product update korar por ar reload korbo na.
     * asole dorkar e nai Sheet reload korar
     *
     * @param array $product_ids
     * @return array Return a array of value of product for Sheet converted data
     */
    public function multiple_products_update($product_ids = [])
    {

      if( ! $this->configured ){
        $response = [
          'status'  => 'failed',
          'error'   => 'configuredFailed',
          'errors'  => $this->errors,
        ];
        wp_send_json( $response );
        die();
      }
      if( empty( $product_ids ) || ! is_array( $product_ids ) ){
        $response = [
          'status'  => 'failed',
          'error'   => 'notFoundProductIDs',
          'errors'  => $this->errors,
        ];
        wp_send_json( $response );
        die();
      }

      $t_d = $this->get_token_data();
      if( empty( $t_d ) ){
        $response = [
          'status'  => 'failed',
          'error'   => 'AccessTokenFailed',
        ];
        wp_send_json( $response );
        die();
      }


      

      $SheetResponse = $this->multiple_products_update_online_sheet( $product_ids );
      wp_send_json( $SheetResponse );

      die();

    }

    /**
     * Getting sheet data for modify multiple product at a time
     * 
     * ek sathe onek gulo product edtit korte chaile
     * amora eta bebohar korbo
     *
     * @param array $product_ids
     * @return array Array of data which i would like to upload to sheet actually. Acuratley formatted data.
     */
    public function get_batch_data_multiple_row( $product_ids )
    {

      if( empty( $product_ids ) || ! is_array( $product_ids ) ) return [];
      $this->action_hook_name[] = __LINE__ . ' - Products::get_sheet_multiple_row';
      $values = $this->Products->get_sheet_multiple_row( $product_ids );
      $sheet_name = $this->sheet_name;
      $data = [];
      foreach( $values as $value ){
        $product_id = $value[0] ?? 0;
        
        $row_range = $this->get_sheet_index_range_by_id( $product_id );
        $this->action_hook_name[] = __LINE__ . ' - Sheet::get_sheet_index_range_by_id - ' . $product_id . ' - ' . $row_range;
        if( empty( $row_range ) ) continue;
        $data[] = [
          'range' => "$sheet_name!$row_range",
          'majorDimension' => 'ROWS',
          'values' => [$value],
          
        ];

      }

      return [
        'valueInputOption' => 'RAW',
        'data'  => $data,
      ];
    }

    /**
     * mone rakhte hobe eta ekhon testing mode ache
     * apatoto page id: 2 and 59(online) er kkhetrei ei method kaj korbe
     * 
     *
     * @return void
     */
    public function update_sheet()
    {

      if( ! $this->configured ){
        $response = [
          'status'  => 'failed',
          'error'   => 'configuredFailed',
          'errors'  => $this->errors,
        ];
        wp_send_json( $response );
        die();
      }

      $nonce = sanitize_text_field( wp_unslash( $_POST['nonce'] ?? '' ) );
      if( empty( $nonce ) || ! wp_verify_nonce( $nonce, plugin_basename( PSSG_BASE_FILE ) ) ) {
          wp_send_json(['status' => 'failed','message' => '', 'error' => __( 'Nonce not founded', 'product-sync-master-sheet' )]);
          wp_die();
      }

      $sheet_products_args = apply_filters( 'pssg_update_sheet_args', [] ); //array( 'posts_per_page' => 10, 'post_type' => 'product' )
      $this->Products = new Products( $sheet_products_args );
      $products = $this->Products;
      $paged = absint( $_POST['paged'] ?? 1 );

      $this->action_hook_name[] = __LINE__ . ' - Sheet::get_sheet_index';
      if( is_array( $this->get_sheet_index() ) && count( $this->get_sheet_index() ) >= $products->get_one_load_limit() ){
        $this->action_hook_name[] = __LINE__ . ' - Products::get_sheet_index';
        $response = [
          'status'  => 'failed',
          'error'   => 'LimitCross',
          'count' => count( $this->get_sheet_index() ),
          // 'count' => count( $products->get_sheet_index() ),
        ];
        wp_send_json( $response );
        die();
      }


      $t_d = $this->get_token_data();
      if( empty( $t_d ) ){
        $response = [
          'status'  => 'failed',
          'error'   => 'AccessTokenFailed',
        ];
        wp_send_json( $response );
        die();
      }

      $paged = absint( $_POST['paged'] ?? 1 );
      $this->action_hook_name[] = __LINE__ . ' - Products::set_paged';
      $products->set_paged($paged);
      $products->update_sheet_index = true;
      $this->action_hook_name[] = __LINE__ . ' - Products::get_sheet_row';
      $value = $products->get_sheet_row();

      if( empty( $value ) ){
        $response = [
          'status'  => 'failed',
          'error'   => 'ProductEmpty',
        ];
        wp_send_json( $response );
        die();
      }
      

      //It will need in update_online_sheet() method
      $this->action_hook_name[] = __LINE__ . ' - Products::getSheetRang';
      $this->sheet_range = $products->getSheetRang();

      
      $SheetResponse = $this->update_online_sheet( $value );
      $this->action_hook_name[] = __LINE__ . ' - Products::get_sheet_index';
      $SheetResponse['count'] = count( $products->get_sheet_index() );
      wp_send_json( $SheetResponse );

      die();
    }

    public function delete_post( $product_id )
    {
      $this->action_hook_name[] = __FUNCTION__;
      if ( get_post_type( $product_id ) !== 'product') return;
      $products = $this->Products;
      $this->action_hook_name[] = __LINE__ . ' - Products::get_sheet_row_by_product_id';
      $value = $products->get_sheet_row_by_product_id( $product_id );
      $newValues = [];
      $newValues[0] = array_map(function(){
        return "";
      }, $value[0]);

      

      $newValues[0][0] = 'deleted'; //It's a keyword, no need translation
      $newValues[0][1] = $value[0][1];
      $this->update_sheet_single_product( $product_id, $newValues );
    }

    
    /**
     * Update sheet when a product is saved
     * * When update a product
     * * when change andy variation
     * * when create a new product
     * 
     * Also added some condition when pass a query on setting page
     *
     * @param int $product_id The ID of the product
     * @param WP_Post $post The post object
     *
     * @return void
     *
     * @since 1.0.0.20
     */

     public function save_post( $product_id, $post )
     {

      /**
       * asole post_date_gmt prothom draft er somoy empty thake
       * etar madhome amra prothom draft status count korechi.
       * asole prothom post korar somoy draft status thakle ta amra 
       * sheet a update korbo na.
       */
      $post_date_gmt_pass = strtotime($post->post_date_gmt);
       if($post->post_status == "auto-draft") return;
       if($post->post_status == "draft" && $post_date_gmt_pass < 1 ) return;
       if ( get_post_type( $product_id ) !== 'product' && get_post_type( $product_id ) !== 'product_variation' ) return;
 
       

       /**
        * I have set a value on wp_option table
        * if already make a sheet on goog
        * Then save post will work. Otherwise return null here
        */
       if( ! $this->sheet_update_permission ) return;
       
       $product = wc_get_product( $product_id );
       if( empty( $product ) || is_null( $product ) || ! is_object( $product )) return;
 
       $type = $product->get_type();
 
       $pass_for_sheet_update = $this->pass_query_args_for_update( $product_id );

       if( ! $pass_for_sheet_update ) return;
 
       if( $type == 'variation' || $type == 'variable' ){
         $this->variation_product_update( $product_id );
       }
       $this->update_sheet_single_product( $product_id );
 
       
     }

    /**
     * Checking condition, if Query is set from setting page
     * 
     * @since 1.0.0.20
     *
     * @param int $product_id
     * @return bool
     */
    private function pass_query_args_for_update( $product_id ){
      $product = wc_get_product( $product_id );
      if( empty( $product ) || is_null( $product ) || ! is_object( $product )) return false;

      $type = $product->get_type();

      // $sheet_products_args = apply_filters( 'pssg_update_sheet_args', [] ); //array( 'posts_per_page' => 10, 'post_type' => 'product' )
      $this->Products = new Products();
      $query_args = $this->Products->args;

      $pass_for_sheet_update = true;

      if( ! empty( $query_args['post__in'] ) && is_array( $query_args['post__in'] ) ){
        $pass_for_sheet_update = false;
        $checking_product_id = $product_id;

        if( $type == 'variation' ){
          $parent_id = $product->get_parent_id();
          $checking_product_id = $parent_id;
        }

        
        
        $query = new \WP_Query( $query_args );

        // $post_ids = [];

      // Loop through the posts and collect their IDs
      if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
              $query->the_post();
              // $post_ids[] = get_the_ID();
              if($checking_product_id == get_the_ID()){
                $pass_for_sheet_update = true;
                //break here and return
                break;
              }
              
          }
      }

      // Reset post data
      wp_reset_postdata();
      }

      return $pass_for_sheet_update;
    }


    /**
     * If a variation update actually
     * we will call a Event Trigger and we will update all variations
     * where we have used @hook 'variations_event_trigger_hook'
     *
     * @param int $product_id
     * @return void
     */
    public function variation_product_update( $product_id )
    {
      $product = wc_get_product( $product_id );
      if( empty( $product ) || is_null( $product ) || ! is_object( $product )) return;

      $type = $product->get_type();
      if( ! $this->event_triggered && ( $type == 'variable' || $type == 'variation' ) ){
        wp_schedule_single_event( time() + 3, 'variations_event_trigger_hook', [$product_id]);
        $this->event_triggered = true;
      }


      
    }


    /**
     * Specially for Action Hook 'pssg_update_product_to_sheet'
     * It's our custom Hook. Specially for API Request Object
     * 
     * If Call here, Sheet will update
     *
     * @param int $product_id
     * @return void
     */
    public function product_to_sheet( $product_id )
    {
      if ( get_post_type( $product_id ) !== 'product' && get_post_type( $product_id ) !== 'product_variation' ) return;

      $this->update_sheet_single_product( $product_id );
    }

    public function update_sheet_single_product($product_id,  $modified_value = [])
    {

      if( empty($product_id) ) return;

      //REturn null if not product
      if ( ! wc_get_product( $product_id ) ) return;

      if( ! $this->sheet_update_permission ) return;


      $return_status = $this->spreadsheet_row_fixer();

      $products = new Products();
      
      $this->sheet_range = $this->get_sheet_index_range_by_id( $product_id );
      if( empty( $this->sheet_range ) ){
        //If not found, it will return null;
        /**
         * ki ki karone sheet_range na paoya zete pare.
         * 1 limit sesh hoye gele
         * 2. 
         */
        return;
      }
      
      $value = $products->get_sheet_row_by_product_id( $product_id );

      if( ! empty( $modified_value ) && is_array( $modified_value ) ){
        $value = $modified_value;
      }

      // return; //Curently disable google sheet update
      $this->update_online_sheet( $value );
    }


    /**
     * Getting and generating access token
     *
     * @return void
     */
    public function get_token_data()
    {

      if( ! $this->configured ) return;

        $tokn_key = $this->tokn_key;//'pssg_eta_holo_akses_tokn';

        $current_token_data = get_transient( $tokn_key );

        if( ! empty( $current_token_data ) ) return $current_token_data;

        $client_email = $this->client_email;
        $private_key = $this->private_key;
        $now = time();
        $exp = $now + 3600; //Shold be 3600 = 1 hour actually
        $payload = wp_json_encode(
          [
            'iss' => $client_email,
            'aud' => 'https://oauth2.googleapis.com/token',
            'iat' => $now,
            'exp' => $exp,
            'scope' => 'https://www.googleapis.com/auth/spreadsheets',
          ]
        );

        $header = wp_json_encode([
          'alg' => 'RS256',
          'typ' => 'JWT',
        ]);


        $base64_url_header = str_replace([ '+', '/', '=' ], [ '-', '_', '' ], base64_encode($header));
        $base64_url_payload = str_replace([ '+', '/', '=' ], [ '-', '_', '' ], base64_encode($payload));
        
        $signature = '';
        openssl_sign($base64_url_header . '.' . $base64_url_payload, $signature, $private_key, 'SHA256');
        $base64_url_signature = str_replace([ '+', '/', '=' ], [ '-', '_', '' ], base64_encode($signature));

        $jwt = $base64_url_header . '.' . $base64_url_payload . '.' . $base64_url_signature;
        
        $token_url = 'https://oauth2.googleapis.com/token';
        $body = [
          'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
          'assertion' => $jwt,
        ];
        
        $response = wp_remote_post(
          $token_url, [
            'body' => $body,
          ]
        );

        if (is_wp_error($response)) {
          
          error_log('Webhook request failed: ' . $response->get_error_message());
          return;
        }else{
          $response_body = wp_remote_retrieve_body($response);
          
          $token_data = json_decode($response_body, true);
          set_transient( $tokn_key, $token_data, 3500);
          return $token_data;
        }
        return;

        
    }


    /**
     * Method post hotei hobe,
     * noile eta mane batch update 
     * kaj korobe na
     * 
     * VAlue array zemon hote hobe
      ["valueInputOption"]=>
        string(3) "RAW"
        ["data"]=>
        array(5) {
          [0]=>
          array(3) {
            ["range"]=>
            string(13) "Sheet13!A3:J3"
            ["majorDimension"]=>
            string(4) "ROWS"
            ["values"]=>
            array(1) {
              [0]=>
              array(10) {
                [0]=>
                int(17)
                [1]=>
                string(8) "variable"
                [2]=>
                string(6) "Hoodie"
                [3]=>
                string(0) ""
                [4]=>
                string(10) "woo-hoodie"
                [5]=>
                string(0) ""
                [6]=>
                string(2) "42"
                [7]=>
                string(2) "10"
                [8]=>
                string(3) "100"
                [9]=>
                string(2) "10"
              }
            }
          }
          
          [4]=>
          array(3) {
            ["range"]=>
            string(15) "Sheet13!A26:J26"
            ["majorDimension"]=>
            string(4) "ROWS"
            ["values"]=>
            array(1) {
              [0]=>
              array(10) {
                [0]=>
                int(40)
                [1]=>
                string(9) "variation"
                [2]=>
                string(18) "Hoodie - Blue, Yes"
                [3]=>
                float(20)
                [4]=>
                string(20) "woo-hoodie-blue-logo"
                [5]=>
                string(2) "45"
                [6]=>
                string(2) "45"
                [7]=>
                string(2) "10"
                [8]=>
                string(0) ""
                [9]=>
                string(2) "10"
              }
            }
          }
        }
     *
     * @param [type] $value
     * @return void
     */
    public function multiple_products_update_online_sheet( $product_ids )
    {

      if( ! empty( $this->Admin_Base->get_form_submited_errors() ) ) return ['status' => 'failed', 'error' => 'founded_form_submitted_error'];
        

        $value = $this->get_batch_data_multiple_row( $product_ids );

        if( empty( $value ) || ! is_array( $value ) ) return ['status' => 'failed', 'error' => 'sheet_value_empty_no_array'];

        $data = $value;


        if( ! $this->configured ) return ['error' => 'configured_failed']; //It's a error Id, no need translation


        $spreadsheet_id = $this->spreadsheet_id;

        $API_KEY = $this->API_KEY;
        // API endpoint to update values
        $api_url = "https://sheets.googleapis.com/v4/spreadsheets/$spreadsheet_id/values:batchUpdate?valueInputOption=RAW&key=$API_KEY";

        return $this->push_to_sheet( $api_url, $data, 'POST' );
    }

    /**
     * Before clear, I have added new row, if need.
     * 
     * To clear, of destroy everything from Sheet,
     * Just call this method, Sheet's all data will removed.
     *
     * @return array|json it will return's all data from sheet.
     */
    public function clear_online_sheet()
    {

      if( ! empty( $this->Admin_Base->get_form_submited_errors() ) ){
        $response =['status' => 'failed', 'error' => 'founded_form_submitted_error'];
        wp_send_json( $response );
        wp_die();
      }
      $spreadsheet_id = $this->spreadsheet_id;
      $sheet_name = $this->sheet_name;

      $data = array(
        'range' => $sheet_name,
      );

      
      $API_KEY = $this->API_KEY;
      $spread_fixer = $this->spreadsheet_row_fixer();
      // API endpoint to update values
      $api_url = "https://sheets.googleapis.com/v4/spreadsheets/$spreadsheet_id/values/$sheet_name:clear?key=$API_KEY";
      $clear_sheet_response = $this->push_to_sheet( $api_url, $data, 'POST', $spread_fixer );
      update_option( $this->sheet_update_status_key, false );
      update_option( $this->sheet_index_key, []);
      wp_send_json( $clear_sheet_response );
      
      wp_die();
    }



    /**
     * Updating to online sheet
     * 
     * ******************
     * COMPULSORY
     * ******************
     * * $this->sheet_range
     * * $this->configured
     * * $value data Row data/value for Online / GSheet
     * * $this->spreadsheet_id
     * * $this->sheet_name
     *
     * @param array $value Full array value of all rows for sheet 
     * @return array response array of online sheet api request.
     */
    public function update_online_sheet( $value )
    {
      $this->action_hook_name[] = __FUNCTION__;
        if( ! empty( $this->Admin_Base->get_form_submited_errors() ) ) return ['status' => 'failed', 'error' => 'founded_form_submitted_error'];
        if( empty( $value ) || ! is_array( $value ) ) return ['status' => 'failed', 'error' => 'sheet_value_empty_no_array']; //It's a error Id, no need translation
        
        $data = array(
          'values' => $value,
        ); 


        if( ! $this->configured ) return ['error' => 'configured_failed']; //It's a error Id, no need translation

        if( empty( $this->sheet_range ) ){
          return ['status' => 'failed', 'error' => 'sheet_range_empty' ]; //It's a error Id, no need translation
        }
        // Replace 'your-sheet-id' with your actual Sheet Sheet ID
        $spreadsheet_id = $this->spreadsheet_id;
        $range = $this->sheet_range;
        $sheet_name = $this->sheet_name;


        
        $API_KEY = $this->API_KEY;
        // API endpoint to update values
        $api_url = "https://sheets.googleapis.com/v4/spreadsheets/$spreadsheet_id/values/$sheet_name!$range?valueInputOption=RAW&key=$API_KEY";
        update_option( $this->sheet_update_status_key, true );
        return $this->push_to_sheet( $api_url, $data );
        
    }

    public function get_current_sheet_name()
    {
      $sheet_name = $this->sheet_name;
      $online_sheet_name = $this->get_online_sheets_name();

      return $online_sheet_name[$sheet_name] ?? [];
    }
    public function get_online_sheets_name()
    {
      $spreadsheet_details = $this->get_online_sheet_details();
      return $spreadsheet_details['sheet_name'] ?? [];
    }
    public function get_online_sheet_gid()
    {
      $spreadsheet_details = $this->get_online_sheet_details();
      return $spreadsheet_details['gid'] ?? [];
    }
    public function get_online_sheet_details_error()
    {
      
      $spreadsheet_details = $this->get_online_sheet_details();
      if(isset( $spreadsheet_details['error_status'] ) && $spreadsheet_details['error_status'] == 'INVALID' ) return $spreadsheet_details;
      return;
    }
     /**
     * Retrieves the details of the online sheet.
     *
     * This function makes a request to the Google Sheets API to fetch the details of the online sheet.
     * It constructs the API URL using the spreadsheet ID and API key.
     * The response from the API is processed to extract the sheet details and store them in a custom format.
     * If the response is empty or not an object with the 'sheets' property, the original response is returned.
     *
     * @return array The custom sheets details, including sheet name, sheet ID, row count, and title.
     */
    public function get_online_sheet_details()
    {
      $spreadsheet_id = $this->spreadsheet_id;
      $API_KEY = $this->API_KEY;
      $api_url = "https://sheets.googleapis.com/v4/spreadsheets/$spreadsheet_id?fields=sheets(properties(sheetId,title,gridProperties(rowCount)))&key=$API_KEY";

      $sheet_details = $this->get_from_sheet( $api_url );
      if( ! isset( $sheet_details['data_response']) ) return $sheet_details;
      $data_response = $sheet_details['data_response'];
      if( ! empty( $data_response ) && is_object( $data_response ) && property_exists( $data_response, 'sheets' ) ){
        $sheets = $data_response->sheets;
        $custom_sheets = [];
        foreach($sheets as $sheet){
          $custom_sheets['sheet_name'][ $sheet->properties->title ] = [
            'gid' => $sheet->properties->sheetId,
            'rowCount' => $sheet->properties->gridProperties->rowCount,
            'title' => $sheet->properties->title
          ];
          $custom_sheets['gid'][ $sheet->properties->sheetId ] = [
            'gid' => $sheet->properties->sheetId,
            'rowCount' => $sheet->properties->gridProperties->rowCount,
            'title' => $sheet->properties->title
          ];
          // $custom_sheets[ $sheet->properties->sheetId ] = $sheet->properties->title;

        }

        return $custom_sheets;
      }else if( ! empty( $data_response ) && is_object( $data_response ) && property_exists( $data_response, 'error' ) ){
        $error = [];
        $error['error_status'] = 'INVALID';
        $error['code'] = $data_response->error->code;
        $error['message'] = $data_response->error->message;
        
        $error['status'] = $data_response->error->status;
        $error['details'] = $data_response->error->details;
        return $error;
      }
      return $sheet_details;
    }
    /**
     * If found row count, from post count, we will fix it actually.
     *
     * @param integer $addition_row_count Default value is 500 but it will add double, mean: 1000
     * @return void
     */
    public function spreadsheet_row_fixer( $addition_row_count = 500 )
    {
      
      $fianl_output = [];
      if( ! empty( $this->Admin_Base->get_form_submited_errors() ) ){
        return;
      }

      $product = new Products();
      $stats = $product->get_stats();
      
      // $post_count = $stats['post_count'] ?? 1000;
      $post_count = $stats['found_posts'] ?? 2000;
      $post_count = absint( $post_count );
      $sheet_details = $this->get_current_sheet_name();
      $current_row_count = $sheet_details['rowCount'] ?? 1000;
      $current_row_count = absint( $current_row_count );

      $should_row_count = $post_count + $addition_row_count;//Default value is 500, is is just for safety

      if( $current_row_count >= $should_row_count ) return; //Added additinal 20 rows for safety

      //After checking $should_row_count, I will convert it as double
      $should_row_count = $should_row_count + ( $addition_row_count * 2 );

      
      $endIndex = $should_row_count - $current_row_count;

      $current_sheet_name = $this->get_current_sheet_name();
      if(isset( $current_sheet_name['gid'] ) && ! empty( $current_sheet_name['gid'] )){
        $sheetId = $current_sheet_name['gid'];
      }else{
        $sheetId = $this->Admin_Base_Settings['gid'] ?? '0';
        $sheetId = ! empty( $sheetId ) ? $sheetId : '0';
      }
      
      
      $spreadsheet_id = $this->spreadsheet_id;
      $data = array(
        'requests' => array(
            array(
                'insertDimension' => array(
                    'range' => array(
                        'sheetId' => $sheetId, // Assuming you want to add rows to the first sheet. Change if necessary.
                        'dimension' => 'ROWS',
                        'startIndex' => $current_row_count - 1, // Adjust this if you need to start at a specific index.
                        'endIndex' => $endIndex
                    ),
                    'inheritFromBefore' => true
                )
            )
        )
    );

      $API_KEY = $this->API_KEY;
      $api_url = "https://sheets.googleapis.com/v4/spreadsheets/$spreadsheet_id:batchUpdate?key=$API_KEY";
      
      $fianl_output = $this->push_to_sheet( $api_url, $data, 'POST', [ 'data' => $data] );
      return $fianl_output;

    }
    

    /**
     * Push to Online sheet
     *
     * @param string $api_url
     * @param array $data
     * @param string $method
     * @return array Respnse of Data update as an array.
     */
    private function push_to_sheet( $api_url, $data, $method = 'PUT', $extra_msg_response = [] )
    {
      /***************************************
      $this->action_hook_name[] = __FUNCTION__;
      // $spreadsheet_id = $this->spreadsheet_id;
      // $range = 'Sheet3!A10:H10';
      $sheet_name = $this->sheet_name;
      $range = "{$sheet_name}!A:A";
      $api_key = $this->API_KEY;
      

      $pp_product_id = $data['values'][0][0] ?? 0;
      $data_test = [
        // 'api_url' => $api_url,
        // 'method' => $method,
        // 'range'  => $this->sheet_range,
        // 'new_range'  => $range,
        // 'product_id'  => $pp_product_id,
        // 'single_range_prod'  => $this->Products->get_sheet_range_by_product_id( 3053 ),
        // 'single_range'  => $this->get_sheet_index_range_by_id( $pp_product_id ),
        // 'single_index_id'  => $this->get_sheet_index_by_id( $pp_product_id ),
        // 'single_index_last_latter'  => $this->get_sheet_last_letter(),
        // 'sheet_data' => $this->get_online_sheet_details(),
        
        'action_hook' => $this->action_hook_name,
        // 'action_hook_product' => $this->Products->action_hook_name,
        'data' => $data,
        // 'new_data' => $this->get_sheet_index(false),
        // 'sheet_index_on_option' => get_option('pssg_sheet_index_data', []),
      ];
      //https://webhook.site/#!/view/80761afe-7638-4bc3-8da3-ccbbf3ee6c49
      // $api_url = 'https://webhook.site/80761afe-7638-4bc3-8da3-ccbbf3ee6c49';
      // $api_url = 'https://wpp.local/wp-json/api-handler/v1/store-data';
      // $api_url = 'https://mysite.local/wp-json/api-handler/v1/store-data';


      // Store data in WordPress options using update_option
    $option_name = 'api_request_data';//'api_request_data';
    $serial_option_name = $option_name . '_serial';
    $existing_data = get_option($option_name, []);
    $serial_number = get_option($serial_option_name, 0); //Test Item
    $serial_number++; //Test Item
    update_option($serial_option_name, $serial_number); //Test Item
    if( ! is_array( $existing_data ) ){
      $existing_data = [];
    }
    // $new_data[time()+rand(1,1000)] = $data_test; //time()
    $new_data[$serial_number] = $data_test; //Test Item

    $final_data = $new_data + $existing_data;
    update_option($option_name, $final_data);
    // update_option($option_name, $new_data); //Test Item

    // return [ 
    //   'status' => 'success', 
    //   'extra_msg_response' => $extra_msg_response,
    //   'other_info' => [
    //     'spreadsheet_id' => $this->spreadsheet_id,
    //     'sheet_name' => $this->sheet_name,
    //   ]
    // ];
      //*********************************/
      // Fetch access token from your secure storage (update_option, database, etc.)
      $access_data = $this->get_token_data();
      $access_token = $access_data['access_token'] ?? '';
      if( empty( $access_token ) ){
        return [ 'status' => 'failed', 'error' => __( 'Access Token not founded', 'product-sync-master-sheet' ) ];
      }

      // Set the request parameters
      $request_args = array(
          'headers'     => array(
              'Content-Type'  => 'application/json',
              'Authorization' => 'Bearer ' . $access_token,
          ),
          'body'        => wp_json_encode($data),
          'method'      => $method,//'PUT',
          'data_format' => 'body',
      );
      // return $api_url;
      if( $method == 'GET' || $method == 'get' ){
        unset($request_args['body']);
        unset($request_args['method']);
        unset($request_args['data_format']);
        //Make the request GET request
        $response = wp_remote_get($api_url, $request_args);
      }else{
        // Make the POST/PUT request
        $response = wp_remote_post($api_url, $request_args);
      }
      
  
      // Check for errors
      if ( is_wp_error( $response ) ) {
          // Handle error
          $error_message = $response->get_error_message();
          return [ 'status' => 'failed', 'error' => $error_message ];
      } else {
          // Process the response
          $body = wp_remote_retrieve_body($response);
          $data_response = json_decode($body);
          do_action( 'pssg_push_to_sheet_on_success', $data_response, $data );
          // Hide headers data on response, because we have used it in javascript
          $request_args['headers'] = 'hidden_headers';
           return [ 
            'status' => 'success', 
            'data_response' => $data_response, 
            'request_args' => $request_args, 
            'extra_msg_response' => $extra_msg_response,
            'other_info' => [
              'spreadsheet_id' => $this->spreadsheet_id,
              'sheet_name' => $this->sheet_name,
              'sheet_name' => $this->sheet_range,
            ]
          ];
      }

      return [ 'status' => 'failed', 'error' => 'NothingFounded' ];
    }

    public function get_sheet_index_range_by_id( $product_id ){

        $single_index_number = $this->get_sheet_index_by_id( $product_id );

        if( ! empty( $single_index_number ) && is_numeric( $single_index_number ) ){
            $l_letter = $this->get_sheet_last_letter();
            return "A$single_index_number:$l_letter".$single_index_number;
        }
        
        $on_load_limit = $this->Products->get_one_load_limit(); 

        $sheet_index = $this->get_sheet_index();
        if( is_array($sheet_index) && count( $sheet_index ) <= $on_load_limit ){
            $row_number = end($sheet_index);
            $sheet_row_number = ($row_number + 1);
            
            $this->set_sheet_index($product_id, $sheet_row_number);
            $l_letter = $this->get_sheet_last_letter();
            return "A$sheet_row_number:$l_letter".$sheet_row_number;
        }

        return null;
    }
    public function get_sheet_last_letter(){
      return chr( $this->Products->base_chr + $this->Products->get_sheet_column_count() );
  }

    
    /**
     * Get sheet index by single product id
     * actually from sheet row ID, I will get by product id
     * and data has collect from $this->get_sheet_index();
     * 
     * @param int $product_id
     * @return int|null
     */
    public function get_sheet_index_by_id( $product_id ){
      $index = $this->get_sheet_index(false);

      if( isset( $index[$product_id] ) ){
        return $index[$product_id];
      }

      return null;

    }

    /**
     * Specially for Variable product update or update multiple product at a time
     * I will update transient for sheet index array
     * so that, it will get new row number of sheet for next product
     * 
     * *********************
     * USed in:
     * get_sheet_index_range_by_id( $product_id )
     * **********************
     * 
     * Set sheet index for a single product by product id
     * When I will update product to sheet, then this method will be called
     * and update the sheet index for that product.
     * 
     * @param int $product_id
     * @param int $sheet_row_number
     * @return boolean
     */
    public function set_sheet_index($product_id, $sheet_row_number){

      $current_index = get_option( $this->sheet_index_key, [] );
      if( empty( $current_index ) ){
        $current_index[$product_id] = $sheet_row_number;
        update_option( $this->sheet_index_key, $current_index );
        set_transient( $this->sheet_index_key, $current_index, 3);
        return true;
      }
      return;
    }


    /**
     * Get sheet index, where key is product ID and value is sheet index number.
     * 
     * If $raw is true, then it will return the raw response, otherwise it will return the sheet index array.
     * If some error occur, it will return an empty array.
     * 
     * @since 1.0.0
     * @param boolean $raw
     * @return array
     */
    public function get_sheet_index( $raw = false ){

      // $transient = get_transient( $this->sheet_index_key );
      
      
      // if( ! empty( $transient ) ){
      //   $current_index = get_option( $this->sheet_index_key, [] );
      //   return $current_index;
      // } 

      $response = $this->get_sheet_index_raw();
      if( ! empty( $response ) &&  ! isset( $response['status'] ) || ( isset( $response['status'] ) && $response['status'] !== 'failed' ) ){

        update_option( $this->sheet_index_key, $response );

        /**
         * I will remove following line in future, it's just for testing
         * eta asole Products class theke eseche. 
         * oita asole amra bad dibo 
         * 
         * kintu puraton user ebong onno onek karone apatoto ache
         * 
         */
        set_transient( $this->sheet_index_key, 'yes', 3);
        return $response;
      }
      // if( empty( $response ) ) return get_option($this->sheet_index_key, []);
      if( $raw ) return $response;
      return [];

    }
    /**
     * Getting sheet index raw data,
     * Here, u will get Error Data also, if found any error.
     * 
     *
     * @return array
     */
    public function get_sheet_index_raw()
    {

      if( ! $this->configured ) return ['status' => 'failed','error' => 'configured_failed']; //It's a error Id, no need translation

      
      if( empty( $this->spreadsheet_id ) ) return ['status' => 'failed', 'error' => 'spreadsheet_id_empty' ];
      if( empty( $this->API_KEY ) ) return ['status' => 'failed', 'error' => 'API_KEY_empty' ];
 
      $spreadsheet_id = $this->spreadsheet_id;
      $sheet_name = $this->sheet_name;
      $range = "{$sheet_name}!A:A";
      $api_key = $this->API_KEY;
      $api_url_new = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}/values/{$range}?key={$api_key}";

      $access_data = $this->get_token_data();
      $access_token = $access_data['access_token'] ?? '';
      if( empty( $access_token ) ){
        return [ 'status' => 'failed', 'error' => __( 'Access Token not founded', 'product-sync-master-sheet' ) ];
      }
      // Set up the request arguments
      $request_args = array(
          'headers' => array(
              'Content-Type' => 'application/json',
              'Authorization' => 'Bearer ' . $access_token,
          ),
      );

      
    
      // Make the API request
      $response = wp_remote_get($api_url_new, $request_args);

      // Check for errors
      if (is_wp_error($response)) {
        return [ 'status' => 'failed', 'error' => 'Error: ' . $response->get_error_message() ];
      }

      // Parse the response body
      $body = wp_remote_retrieve_body($response);
      $body_data = json_decode($body, true);
      if( isset($body_data['values']) && is_array($body_data['values']) ){
        $my_row_data = $body_data['values'] ?? [];
        $row_index = [];
        // Check if the API returned data
        if ( is_array( $my_row_data ) && ! empty( $my_row_data ) && isset( $my_row_data[0] ) ) {
          unset($my_row_data[0]);
          foreach($my_row_data as $key_index => $value_row){
            $my_number = $key_index + 1;
            if(empty($value_row)) continue;
            $product_id = $value_row[0] ?? false;
            if(empty($product_id)) continue;
            $row_index[$product_id] = $my_number;
          }
        }
        
        return $row_index;  
      }else{
        return [ 'status' => 'failed', 'response' => $body_data ];
      }
      
    }

    /**
     * Get Sheet information and sheet details data from the Google Sheets API
     *
     * @param string $api_url
     * @param array $extra_msg_response
     * @return void
     */
    public function get_from_sheet( $api_url, $extra_msg_response = [] )
    {
      $access_data = $this->get_token_data();
      $access_token = $access_data['access_token'] ?? '';
      if( empty( $access_token ) ){
        return [ 'status' => 'failed', 'error' => __( 'API_Key/ServiceJSON File/SheetURL - any one or more of them is missing', 'product-sync-master-sheet' ) ];
      }

      // Set the request parameters
      $request_args = array(
        'headers'     => array(
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $access_token,
        )
      );
      $response = wp_remote_get($api_url, $request_args);

      // Check for errors
      if ( is_wp_error( $response ) ) {
        // Handle error
        $error_message = $response->get_error_message();
        return [ 'status' => 'failed', 'error' => $error_message ];
      } else {
          // Process the response
          $body = wp_remote_retrieve_body($response);
          $data_response = json_decode($body);

          return [ 
            'status' => 'success', 
            'data_response' => $data_response, 
            'extra_msg_response' => $extra_msg_response,
            'other_info' => [
              'spreadsheet_id' => $this->spreadsheet_id,
              'sheet_name' => $this->sheet_name,
            ]
          ];
      }

      return [ 'status' => 'failed', 'error' => 'NothingFounded' ];
    }

    public function get_errors()
    {
      return $this->errors;
    }

}