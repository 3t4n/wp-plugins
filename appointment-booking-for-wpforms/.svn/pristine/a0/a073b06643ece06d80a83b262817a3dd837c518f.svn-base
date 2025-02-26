<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Staffs_Backend {
    public static $post_type = "booknow_staffs";
    function __construct(){
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'save_post',array( $this, 'save' ) );
        add_filter( 'manage_'.Booknow_Staffs_Backend::$post_type.'_posts_columns', array($this,"columns") );
        add_filter( 'manage_'.Booknow_Staffs_Backend::$post_type.'_posts_custom_column', array($this,"custom_column"), 10, 2 );
    }
    function columns($columns){
        unset($columns['date']);
        $columns['title']     = esc_html__("Name","booknow");
        $columns['email']     = esc_html__("Email","booknow");
        $columns['services']     = esc_html__("Services","booknow");
        return $columns;
    }
    function custom_column( $column, $post_id ) {
        switch ( $column ) {
            case 'email' :
                $staffs = get_post_meta( $post_id , '_booknow_staffs' , true );
                if( isset($staffs["email"])){
                   echo esc_attr( $staffs["email"]);  
                }
                break;
            case 'services' :
                $services_datas = get_post_meta( $post_id , '_booknow_staffs_services' , true );
                if( is_array($services_datas)){
                   echo esc_attr( implode(",",$services_datas)); 
                }
                break;
        }
    }
    function add_meta_boxes() {
        add_meta_box(
            Booknow_Staffs_Backend::$post_type,
            esc_html__( 'Staff', 'booknow' ),
            array( $this, 'form_main' ),
            Booknow_Staffs_Backend::$post_type,
            'normal',
            'default'
        );
    }
    function form_main($post ) {
        $post_id= $post->ID;
        $staffs = get_post_meta( $post_id , '_booknow_staffs' , true );
        $services_datas = get_post_meta( $post_id , '_booknow_staffs_services' , true );
        $first_name = "";
        if(isset($staffs["first_name"])){
            $first_name = $staffs["first_name"];
        }
        $last_name = "";
        if(isset($staffs["last_name"])){
            $last_name = $staffs["last_name"];
        }
        $email = "";
        if(isset($staffs["email"])){
            $email = $staffs["email"];
        }
        $phone = "";
        if(isset($staffs["phone"])){
            $phone = $staffs["phone"];
        }
        $des = "";
        if(isset($staffs["des"])){
            $des = $staffs["des"];
        }
        $note = "";
        if(isset($staffs["note"])){
            $note = $staffs["note"];
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
                               <input data-sort="1"  name="booknow_staffs[first_name]" class="regular-text change-title" type="text" value="<?php echo esc_attr($first_name) ?>" />
                            </td>
                        </tr>
                     <tr valign="top">
                        <th scope="row"><?php esc_html_e("Last Name","booknow") ?> </th>
                        <td>                                
                           <input data-sort="0" name="booknow_staffs[last_name]" class="regular-text change-title" type="text" value="<?php echo esc_attr($last_name) ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Email","booknow") ?> </th>
                        <td>                                
                           <input name="booknow_staffs[email]" class="regular-text" type="text" value="<?php echo esc_attr($email) ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Phone","booknow") ?> </th>
                        <td>                                
                           <input name="booknow_staffs[phone]" class="regular-text" type="text" value="<?php echo esc_attr($phone) ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Description","booknow") ?> </th>
                        <td> 
                           <textarea name="booknow_staffs[des]" class="regular-text code"><?php echo esc_attr($des) ?></textarea>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Note","booknow") ?> </th>
                        <td> 
                           <textarea name="booknow_staffs[note]" class="regular-text code"><?php echo esc_attr($note) ?></textarea>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Choose User WP","booknow") ?> </th>
                        <td> 
                            <select name="booknow_staffs[user]" class="booknow_select2" data-type="user">
                                <option  value=""><?php esc_html_e("Choose user","booknow")?></option>
                            <?php 
                                $userid_data = "";
                                if(isset($staffs["user"])){
                                    $userid_data = $staffs["user"];
                                }
                                $users = get_users( array("number"=>-1) );
                                foreach($users as $user ){
                                    $userid = $user->ID;
                                    ?>
                                    <option  <?php selected($userid,$userid_data) ?> value="<?php echo esc_attr($userid) ?>"><?php echo esc_attr( $user->user_email  ) ?></option>
                                    <?php
                                }
                             ?>
                           </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Choose services","booknow") ?> </th>
                        <td>
                        <ul>
                            <?php 
                            $services = get_posts( array("post_type"=>"booknow_services","posts_per_page"=>-1) );
                            if ( $services ) :
                                foreach ( $services as $post ) : 
                                    $post_id = $post->ID;
                                    $check = "";
                                    if( is_array($services_datas) && in_array($post_id,$services_datas) ){
                                        $check = "checked";
                                    }
                                    ?>
                                    <li><input <?php echo esc_attr($check) ?> name="booknow_staffs_services[]"  type="checkbox" value="<?php echo esc_attr($post_id) ?>" /> <?php echo esc_attr($post->post_title ) ?></li>
                                    <?php
                                endforeach;
                                wp_reset_postdata(); 
                            else :
                                esc_html_e("Please create a service","booknow");
                            endif;
                             ?>
                        </ul>                            
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
        if( isset($_POST['booknow_staffs'] ) && is_array($_POST['booknow_staffs'])){
            $booknow_staffs = map_deep( $_POST['booknow_staffs'], 'sanitize_text_field' );
        }
        update_post_meta( $post_id, "_booknow_staffs", $booknow_staffs );
        $services = map_deep( $_POST['booknow_staffs_services'], 'sanitize_text_field' );
        update_post_meta( $post_id, "_booknow_staffs_services", $services );
    }
}
new Booknow_Staffs_Backend;