<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Customers_Backend {
    public static $post_type = "booknow_customers";
    function __construct(){
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'save_post',array( $this, 'save' ) );
        add_filter( 'manage_'.Booknow_Customers_Backend::$post_type.'_posts_columns', array($this,"columns") );
        add_filter( 'manage_'.Booknow_Customers_Backend::$post_type.'_posts_custom_column', array($this,"custom_column"), 10, 2 );
        add_action( 'wp_ajax_booknow_load_customer', array($this,"search_load_customer") );
    }
    public static function update_customer($atts=array()){
        $settings = get_option("booknow_settings");
        if( isset($settings["save_customers"]) && $settings["save_customers"] == "yes"){
            $default = array(
                "first_name"=>"",
                "last_name"=>"",
                "email"=>"",
                "phone"=>"",
            );
            $datas = shortcode_atts( $default, $atts );
            $firt_name = $datas["first_name"];
            $last_name = $datas["last_name"];
            $email = $datas["email"];
            $phone = $datas["phone"];
            if( $last_name != "" || $firt_name != "" || $email !="" ) {
                $my_post_customer = array(
                          'post_title'    => $last_name." " . $firt_name,
                          'post_type' => "booknow_customers",
                          'post_status'   => 'publish',
                        );
                $check_cutomer = false;
                $customers = array(
                    "first_name"=>$firt_name,
                    "last_name"=>$last_name,
                    "email"=>$email,
                    "phone"=>$phone,
                );
                $customers_check = get_posts( array("post_type"=>"booknow_customers","numberposts"=>1,
                    'meta_query' => array( 
                                array(
                                    'key'=> '_booknow_customers',
                                    'value' => $email,
                                    'compare'=> 'LIKE'
                                )
                            ),
                    ) );
                if ( $customers_check ) { 
                    $check_cutomer = $customers_check[0]->ID;
                }
                if( $check_cutomer > 0  ) {
                    wp_update_post(array("ID"=>$check_cutomer,"post_title"=>$last_name." " . $firt_name));
                    $post_id = $check_cutomer;
                }else{
                    $post_id = wp_insert_post( $my_post_customer );
                    if( isset($settings["save_user"]) && $settings["save_user"] == "yes" && is_email($email)){
                        $random_password = wp_generate_password( $length = 12, $include_standard_special_chars = false );
                       $user_id = username_exists( $email );
                       if( !$user_id){
                            $user_id = wp_create_user( $email, $random_password, $email );
                       }  
                        $customers["user"] = $user_id;
                    }
                }
                update_post_meta( $post_id, "_booknow_customers", $customers );
                $booknow_last_appointment = get_option( "booknow_last_appointment" );
                if($booknow_last_appointment) {
                    update_post_meta( $booknow_last_appointment, "_booknow_appointment_customer", $post_id );
                }
            }
        }
    }
    function search_load_user(){
        $json = array();
        $key = sanitize_text_field($_REQUEST["search"]);
        $users = get_users( array("search"=>$key) );
        foreach($users as $user ){
            $userid = $user->ID;
            $json[] = array("id"=>$userid,"text"=>$user->user_email);
        }
        wp_send_json($json);
        die();
    }
    function search_load_customer(){
        $json = array();
        $key = sanitize_text_field($_REQUEST["search"]);

        $services = get_posts( array("post_type"=>"booknow_customers",'s'=>$key) );
        if ( $services ) :
            foreach ( $services as $post ) : 
                $post_id = $post->ID;
                $json[] = array("id"=>$post_id,"text"=>$post->post_title);
            endforeach;
            wp_reset_postdata(); 
        endif;
        wp_send_json($json);
        die();
    }
    function columns($columns){
        unset($columns['date']);
        $columns['title']     = esc_html__("Name","booknow");
        $columns['email']     = esc_html__("Email","booknow");
        $columns['phone']     = esc_html__("phone","booknow");
        return $columns;
    }
    function custom_column( $column, $post_id ) {
        $customers = get_post_meta( $post_id , '_booknow_customers' , true );
        switch ( $column ) {
            case 'email' :
                if( isset($customers["email"])){
                   echo esc_attr( $customers["email"]);  
                }
                break;
            case 'phone' :
                if( isset($customers["phone"])){
                   echo esc_attr( $customers["phone"]);  
                }
                break;
        }
    }
    function add_meta_boxes() {
        add_meta_box(
            Booknow_Customers_Backend::$post_type,
            esc_html__( 'Customer', 'booknow' ),
            array( $this, 'form_main' ),
            Booknow_Customers_Backend::$post_type,
            'normal',
            'default'
        );
    }
    function form_main($post ) {
        $post_id= $post->ID;
        $customers = get_post_meta( $post_id , '_booknow_customers' , true );
        if(!is_array($customers) ) {
            $customers = array("first_name"=>"","last_name"=>"","email"=>"","phone"=>"","note"=>"");
        }
        $note = "";
        if( isset($customers["note"])){
            $note = $customers["note"];
        }
        wp_nonce_field( 'booknow_staffs_nonce', 'booknow_staffs_nonce' );
      ?>
      <div class="booknow-container">
          <div class="booknow-tab-content">
              <div class="booknow-tab-main">
                  <table class="form-table">
                      <tr valign="top">
                        <th scope="row"><?php esc_html_e("First Name","booknow") ?> </th>
                            <td>                                
                               <input data-sort="1"  name="booknow_customers[first_name]" class="regular-text change-title" type="text" value="<?php echo esc_attr($customers["first_name"]) ?>" />
                            </td>
                        </tr>
                     <tr valign="top">
                        <th scope="row"><?php esc_html_e("Last Name","booknow") ?> </th>
                        <td>                                
                           <input data-sort="0" name="booknow_customers[last_name]" class="regular-text change-title" type="text" value="<?php echo esc_attr($customers["last_name"]) ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Email","booknow") ?> </th>
                        <td>                                
                           <input name="booknow_customers[email]" class="regular-text" type="text" value="<?php echo esc_attr($customers["email"]) ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Phone","booknow") ?> </th>
                        <td>                                
                           <input name="booknow_customers[phone]" class="regular-text" type="text" value="<?php echo esc_attr($customers["phone"]) ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Note","booknow") ?> </th>
                        <td> 
                           <textarea name="booknow_customers[note]" class="regular-text code"><?php echo esc_attr($note) ?></textarea>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Choose User WP","booknow") ?> </th>
                        <td> 
                            <select name="booknow_customers[user]" class="booknow_select2" data-type="user">
                                <option  value=""><?php esc_html_e("Choose user","booknow")?></option>
                            <?php 
                                $userid_data = "";
                                if($customers["user"]){
                                    $userid_data = $customers["user"];
                                }
                                $users = get_users( array("number"=>-1) );
                                foreach($users as $user ){
                                    $userid = $user->ID;
                                    ?>
                                    <option  <?php selected($userid,$userid_data) ?> value="<?php echo esc_attr($userid) ?>"><?php echo esc_html( $user->user_email  ) ?></option>
                                    <?php
                                }
                             ?>
                           </select>
                        </td>
                    </tr>
                </table>
              </div>
          </div>
      </div>
     <?php
    }
    public function save( $post_id ) {
        if ( ! isset( $_POST['booknow_staffs_nonce'] ) ) {
            return $post_id;
        }
        if ( ! wp_verify_nonce( $_POST['booknow_staffs_nonce'], 'booknow_staffs_nonce' ) ) {
            return $post_id;
        }
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
        // Check the user's permissions.
        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }
        if( isset($_POST['booknow_customers'] ) && is_array($_POST['booknow_customers'])){
            $customers = map_deep( $_POST['booknow_customers'], 'sanitize_text_field' );
        }
        update_post_meta( $post_id, "_booknow_customers", $customers );
    }
}
new Booknow_Customers_Backend;