<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Services_Backend {
    public static $post_type = "booknow_services";
	function __construct(){
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'save_post',array( $this, 'save' ) );
        add_filter( 'manage_'.Booknow_Services_Backend::$post_type.'_posts_columns', array($this,"columns") );
        add_filter( 'manage_'.Booknow_Services_Backend::$post_type.'_posts_custom_column', array($this,"custom_column"), 10, 2 );
    }
     function columns($columns){
        unset($columns['date']);
        $columns['title']     = esc_html__("Service name","booknow");
        $columns['price']     = esc_html__("Price","booknow");
        $columns['duration']     = esc_html__("Duration","booknow");
        $columns['max_capacity']     = esc_html__("Max Capacity","booknow");
        
        return $columns;
    }
    function custom_column( $column, $post_id ) {
        $services = get_post_meta( $post_id , '_booknow_services' , true );
        switch ( $column ) {
            case 'price' :
                if( isset($services["price"])){
                    echo esc_attr($services["price"]);
                }
                break;
            case 'duration' :
                if( isset($services["duration"])){
                    echo esc_attr($services["duration"])." ";
                    esc_html_e("Minutes","booknow");
                }
                break;
            case 'max_capacity' :
                if( isset($services["max_capacity"])){
                    echo esc_attr($services["max_capacity"]);
                }
                break;
        }
    }
    function add_meta_boxes() {
        add_meta_box(
            Booknow_Services_Backend::$post_type,
            esc_html__( 'Service', 'booknow' ),
            array( $this, 'form_main' ),
            'booknow_services',
            'normal',
            'default'
        );
    }
    function form_main($post ) {
        $post_id= $post->ID;
        $services = get_post_meta( $post_id , '_booknow_services' , true );
        if( $services == "" ){
            $services = array("price"=>"","max_capacity"=>1,"duration"=>30,"description"=>"","name"=>"");
        }
        wp_nonce_field( 'booknow_services_nonce', 'booknow_services_nonce' );
      ?>
      <div class="booknow-container">
          <div class="booknow-tab-content">
              <div class="booknow-tab-main booknow-tab-main-general">
                  <table class="form-table">
                    <tr valign="top">
                       <th scope="row"><?php esc_html_e("Name","booknow") ?> </th>
                        <td>                                
                           <input data-sort="0" name="booknow_services[name]" class="regular-text change-title" type="text"value="<?php echo esc_attr($services["name"]) ?>" />
                        </td>
                    </tr>
                   <tr valign="top">
                       <th scope="row"><?php esc_html_e("Price","booknow") ?> </th>
                        <td>                                
                           <input name="booknow_services[price]" class="regular-text" type="text" placeholder="0" value="<?php echo esc_attr($services["price"]) ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Duration","booknow") ?> </th>
                        <td>                                
                           <input name="booknow_services[duration]" class="regular-text" type="number" value="<?php echo esc_attr($services["duration"]) ?>" /> <?php esc_html_e("Minutes","booknow") ?>
                        </td>
                    </tr>
                    <tr valign="top">
                       <th scope="row"><?php esc_html_e("Max Capacity","booknow") ?> </th>
                        <td>                                
                           <input name="booknow_services[max_capacity]" class="regular-text" type="number" value="<?php echo esc_attr($services["max_capacity"]) ?>" />
                        </td>
                    </tr>
                    
                     
                    <tr valign="top">
                       <th scope="row"><?php esc_html_e("Description","booknow") ?> </th>
                        <td>
                        <textarea name="booknow_services[description]" class="regular-text code"><?php echo esc_attr($services["description"]) ?></textarea>                              
                           
                        </td>
                    </tr>
    
                </table>
              </div>
          </div>
      </div>
     <?php
    }
    public function save( $post_id ) {
        if ( ! isset( $_POST['booknow_services_nonce'] ) ) {
            return $post_id;
        }
        if ( ! wp_verify_nonce( $_POST['booknow_services_nonce'], 'booknow_services_nonce' ) ) {
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

        
        if( isset($_POST['booknow_services'] ) && is_array($_POST['booknow_services'])){
            $booknow_services = map_deep( $_POST['booknow_services'], 'sanitize_text_field' );
        }
        update_post_meta( $post_id, "_booknow_services", $booknow_services );
     
    }
}
new Booknow_Services_Backend;