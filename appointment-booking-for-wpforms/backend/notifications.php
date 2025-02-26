<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Customers_Notifications {
    public static $post_type = "booknow_notify";
    function __construct(){
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'save_post',array( $this, 'save' ) );
        add_filter( 'manage_'.Booknow_Customers_Notifications::$post_type.'_posts_columns', array($this,"columns") );
        add_filter( 'manage_'.Booknow_Customers_Notifications::$post_type.'_posts_custom_column', array($this,"custom_column"), 10, 2 );
    }
    function columns($columns){
        unset($columns['date']);
        $columns['type']     = esc_html__("Status Appointment","booknow");
        $columns['sendto']     = esc_html__("Send To","booknow");
        $columns['status']     = esc_html__("Status","booknow");
        return $columns;
    }
    function custom_column( $column, $post_id ) {
        $notifications = get_post_meta( $post_id , '_booknow_notifications' , true );
        switch ( $column ) {
            case 'type' :
                $type = get_post_meta( $post_id , '_booknow_notifications_type' , true );
                echo esc_html($type);
                break;
            case 'sendto' :
                if( isset($notifications["sendto"])){
                   echo esc_html( $notifications["sendto"]);  
                }
                break;
            case 'status' :
                $notifications_enable = get_post_meta( $post_id , '_booknow_notifications_enable' , true );
                if( isset($notifications_enable) && $notifications_enable == "on"){
                   esc_html_e("Acvive","booknow");
                }else{
                   esc_html_e("Disable","booknow");
                }
                break;
        }
    }
    function add_meta_boxes() {
        add_meta_box(
            Booknow_Customers_Notifications::$post_type,
            esc_html__( 'Notifications', 'booknow' ),
            array( $this, 'form_main' ),
            Booknow_Customers_Notifications::$post_type,
            'normal',
            'default'
        );
        add_meta_box(
            "notifications_tag_place",
            esc_html__( 'Insert email', 'booknow' ),
            array( $this, 'form_inside' ),
            Booknow_Customers_Notifications::$post_type,
            'side',
            'default'
        );
    }
    function form_inside($post){
        ?>
            <ul>
                <li><strong><?php esc_html_e("Customer","booknow") ?></strong></li>
                <li>[customer_email]</li>
                <li>[customer_first_name]</li>
                <li>[customer_last_name]</li>
                <li>[customer_note]</li>
                <li>[customer_phone]</li>
                <li><strong><?php esc_html_e("Service","booknow") ?></strong></li>
                <li>[service_name]</li>
                <li>[service_amount]</li>
                <li>[service_duration]</li>
                <li><strong><?php esc_html_e("Satff","booknow") ?></strong></li>
                <li>[staff_first_name]</li>
                <li>[staff_last_name]</li>
                <li>[staff_email]</li>
                <li>[staff_phone]</li>
                <li><strong><?php esc_html_e("Appointment","booknow") ?></strong></li>
                <li>[appointment_date]</li>
                <li>[appointment_time]</li>
                <li>[appointment_id]</li>
            </ul>
        <?php
    }
    function form_main($post ) {
        $post_id= $post->ID;
        $notifications = get_post_meta( $post_id , '_booknow_notifications' , true );
        $notifications_type ="";
        $notifications_type = get_post_meta( $post_id , '_booknow_notifications_type' , true );
        $notifications_enable = get_post_meta( $post_id , '_booknow_notifications_enable' , true );
        if(!is_array($notifications) ) {
            $notifications = array("type"=>"new_appointment","sendto"=>"customer","formname"=>"","formmail"=>"","reply"=>"","bcc"=>"","subject"=>"","message"=>"","sendtoemail"=>"");
        }
        wp_nonce_field( 'booknow_notifications_nonce', 'booknow_notifications_nonce' );
      ?>
      <div class="booknow-container">
          <div class="booknow-tab-content">
              <div class="booknow-tab-main">
                  <table class="form-table">
                        <tr valign="top">
                        <th scope="row"><?php esc_html_e("Enable","booknow") ?> </th>
                        <td>                                
                           <input <?php checked($notifications_enable,"on") ?> name="booknow_notifications_enable" type="checkbox" value="on" /> <?php esc_html_e("Enable notifications","booknow") ?>
                        </td>
                    </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e("Type","booknow") ?> </th>
                            <td>
                                <select name="booknow_notifications_type">
                                    <?php 
                                        $status = apply_filters("booknow_status",array(
                                        "approved"=>esc_html__("Approved","booknow"),
                                        "pending"=>esc_html__("Pending","booknow"),
                                        "cancelled"=>esc_html__("Cancelled","booknow"),
                                        "rejected"=>esc_html__("Rejected","booknow")
                                    ));
                                    foreach($status as $k=>$v){
                                    ?>
                                    <option <?php selected($notifications_type,$k) ?> value="<?php echo esc_attr($k) ?>"><?php echo esc_html($v) ?></option>
                                <?php } ?>
                                </select>                                
                            </td>
                        </tr>
                      <tr valign="top">
                        <th scope="row"><?php esc_html_e("Send To","booknow") ?> </th>
                            <td>                                
                               <input <?php checked($notifications["sendto"],"customer") ?> class="booknow_notifications_sendto" name="booknow_notifications[sendto]" type="radio" value="customer" /> <?php esc_html_e("Customer","booknow") ?>
                               <input <?php checked($notifications["sendto"],"satff") ?> class="booknow_notifications_sendto" name="booknow_notifications[sendto]" type="radio" value="satff" /> <?php esc_html_e("Satff","booknow") ?>
                               <input <?php checked($notifications["sendto"],"custom") ?> class="booknow_notifications_sendto" name="booknow_notifications[sendto]" type="radio" value="custom" /> <?php esc_html_e("Custom","booknow") ?>
                               <?php
                                    $sendtoemail_class ="hidden";
                                    if($notifications["sendto"] == "custom"){
                                        $sendtoemail_class ="";
                                    }
                                ?>
                               <div class="booknow_notifications_settings_sendtoemail <?php echo esc_attr($sendtoemail_class) ?>">
                                  <?php esc_html_e("Email","booknow") ?> <input name="booknow_notifications[sendtoemail]" class="regular-text" type="email" value="<?php echo esc_attr($notifications["sendtoemail"]) ?>" />
                               </div>
                            </td>
                        </tr>
                     <tr valign="top">
                        <th scope="row"><?php esc_html_e("From Name","booknow") ?> </th>
                        <td>                                
                           <input name="booknow_notifications[formname]" class="regular-text" type="text" value="<?php echo esc_attr($notifications["formname"]) ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("From Email","booknow") ?> </th>
                        <td>                                
                           <input name="booknow_notifications[formmail]" class="regular-text" type="email" value="<?php echo esc_attr($notifications["formmail"]) ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Reply To","booknow") ?> </th>
                        <td>                                
                           <input name="booknow_notifications[reply]" class="regular-text" type="text" value="<?php echo esc_attr($notifications["reply"]) ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("BCC","booknow") ?> </th>
                        <td>                                
                           <input name="booknow_notifications[bcc]" class="regular-text" type="text" value="<?php echo esc_attr($notifications["bcc"]) ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Subject","booknow") ?> </th>
                        <td> 
                           <input name="booknow_notifications[subject]" class="regular-text" type="text" value="<?php echo esc_attr($notifications["subject"]) ?>" /> 
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Message","booknow") ?> </th>
                        <td>
                            <?php wp_editor( $notifications["message"] , "booknow_notifications_mesage", array("textarea_name"=>"booknow_notifications[message]",'media_buttons' => false,"textarea_rows"=>10) ) ?> 
                        </td>
                    </tr>
                </table>
              </div>
          </div>
      </div>
     <?php
    }
    public function save( $post_id ) {
        if ( ! isset( $_POST['booknow_notifications_nonce'] ) ) {
            return $post_id;
        }
        if ( ! wp_verify_nonce( $_POST['booknow_notifications_nonce'], 'booknow_notifications_nonce' ) ) {
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
        if( isset($_POST['booknow_notifications'] ) && is_array($_POST['booknow_notifications'])){
            $notifications = map_deep( $_POST['booknow_notifications'], 'wp_kses_post' );
            update_post_meta( $post_id, "_booknow_notifications", $notifications );
        }
        if( isset($_POST['booknow_notifications_type'] )){
            $notifications_type = sanitize_text_field( $_POST['booknow_notifications_type'] );
            update_post_meta( $post_id, "_booknow_notifications_type", $notifications_type );
        }
        if( isset($_POST['booknow_notifications_enable'] )){
            $booknow_notifications_enable = sanitize_text_field( $_POST['booknow_notifications_enable'] );
            update_post_meta( $post_id, "_booknow_notifications_enable", $booknow_notifications_enable );
        }
    }
}
new Booknow_Customers_Notifications;