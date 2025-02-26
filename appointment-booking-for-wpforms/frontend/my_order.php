<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Shortcode_Orders {
    function __construct(){
        add_shortcode( 'booknow_orders', array($this,'add_shortcode') );
    }
    function add_shortcode($atts, $content){
        $settings = get_option("calculation_forms_settings");
        $data = shortcode_atts( array(
                'id' => 0,
                'show_staff'=>1,
                'service_id'=>0,
                'show_service'=>1,
                'name' => '',
                'add_on' => '',
            ), $atts );
        switch ($data["add_on"]) {
            case "wpforms":
                $name = "wpforms[fields][".$data["name"]."]";
                break;
            default:
                $name = $data["name"];
                break;
        }
        return $this->get_template();
    }
    function get_template($user = ""){
        ob_start();
       ?>
       <div class="booknow-order-container"> 
            <?php 
            if ( !is_user_logged_in() ) {
               ?>
               <div class="booknow-order-container-login">
                   <?php esc_html_e("Please login to your account to view bookings!","booknow"); ?>
               </div>
               <?php
            } else { 
                $current_user = wp_get_current_user();
            ?>
            <div class="booknow-order-container-header">
                <div class="booknow-order-hello">
                    <?php 
                    printf(
                        esc_attr__( 'Hello %1$s (not %1$s?', 'booknow' ),
                        '<strong>' . esc_html( $current_user->display_name ) . '</strong>'
                    );
                    ?>
                    <a href="<?php echo esc_url( wp_logout_url() ) ?>"><?php esc_html_e("Log out","booknow") ?></a> )
                </div>
                <div class="booknow-order-title">
                    <?php esc_html_e("My Bookings","booknow")  ?>
                </div>
            </div>
           <ul class="booknow-order-list">
               <li class="">
                   <div class="booknow-order-list-des">
                       <div class="booknow-order-list-id"><?php esc_html_e("Order","booknow") ?></div>
                       <div class="booknow-order-list-status"><?php esc_html_e("Status","booknow") ?></div>
                       <div class="booknow-order-list-service"><?php esc_html_e("Service","booknow") ?></div>
                       <div class="booknow-order-list-booking-date"><?php esc_html_e("Appointment Date","booknow") ?></div>
                       <div class="booknow-order-list-booking-time"><?php esc_html_e("Appointment Time","booknow") ?></div>
                   </div>
               </li>
               <?php
               $customer_email = $current_user->user_email;
               $customers_check = get_posts( array("post_type"=>"booknow_customers","numberposts"=>1,
                'meta_query' => array( 
                            array(
                                'key'=> '_booknow_customers',
                                'value' => $customer_email,
                                'compare'=> 'LIKE'
                            )
                        ),
                ) );
               $customer_id = 0;
               if ( $customers_check ) { 
                  $customer_id = $customers_check[0]->ID;
                }
               $metas[] =  array(
                    array(
                        'key'       => '_booknow_appointment_customer',
                        'value'     => $customer_id,
                    )
                );
                $appointments = get_posts( array("post_type"=>"booknow","posts_per_page"=>-1,"meta_query"=>$metas) );
                if ( $appointments ) :
                    $time_format = apply_filters("booknow_time_format","h:i");
                    $datas = get_option("booknow_settings");
                    $date_format = 'F j, Y';
                    if( isset($datas["date_format"])){
                        $date_format = $datas["date_format"];
                    }
                    foreach ( $appointments as $post ) : 
                        $post_id = $post->ID;
                        $appointment__date_time = get_post_meta( $post_id , '_booknow_appointment_date_time' , true );
                        $appointment_time = get_post_meta( $post_id , '_booknow_appointment_time' , true );
                        $appointment_service = get_post_meta( $post_id , '_booknow_appointment_service' , true );
                        $appointment_staff = get_post_meta( $post_id , '_booknow_appointment_staff' , true );
                        $services = get_post_meta( $appointment_service , '_booknow_services' , true );
                        $price = "$".$services["price"];
                        $duration = $services["duration"] ." ". esc_attr__("Minutes","booknow");
                        $appointment_status = get_post_meta( $post_id , '_booknow_appointment_status' , true );
                        $date = date($date_format,$appointment__date_time);
                        $date_post = get_the_date($date_format ." ".$time_format);
                        if($appointment_staff > 1){
                            $appointment_staff = get_the_title( $appointment_staff );
                        }
                        ?>
                <li class="">
                   <div class="booknow-order-list-des">
                       <div data-staff="<?php echo esc_attr($appointment_staff) ?>" data-duration="<?php echo esc_attr($duration) ?>" data-price="<?php echo esc_attr($price) ?>" data-date="<?php echo esc_attr($date_post) ?>" class="booknow-order-list-id" data-id="<?php echo esc_attr($post_id) ?>"><a href="#">#<?php echo esc_attr($post_id) ?></a></div>
                       <div class="booknow-order-list-status"><?php echo esc_attr($appointment_status) ?></div>
                       <div class="booknow-order-list-service"><?php  echo get_the_title( $appointment_service ); ?></div>
                       <div class="booknow-order-list-booking-date"><?php echo esc_attr($date)?></div>
                       <div class="booknow-order-list-booking-time"><?php echo esc_attr($appointment_time) ?></div>
                   </div>
               </li>
                        <?php
                    endforeach;
                    wp_reset_postdata(); 
                else :
                    ?>
                    <li class="">
                       <?php esc_html_e("No booking","booknow"); ?>
                   </li>
                    <?php
                endif;
                ?>
               <li class="">
                   <div class="booknow-order-list-des">
                       <div class="booknow-order-list-id"><?php esc_html_e("Order","booknow") ?></div>
                       <div class="booknow-order-list-status"><?php esc_html_e("Status","booknow") ?></div>
                       <div class="booknow-order-list-service"><?php esc_html_e("Service","booknow") ?></div>
                       <div class="booknow-order-list-booking-date"><?php esc_html_e("Appointment Date","booknow") ?></div>
                       <div class="booknow-order-list-booking-time"><?php esc_html_e("Appointment Time","booknow") ?></div>
                   </div>
               </li>
           </ul>
       <?php } ?>
         <div class="booknow_modal" id="booknow_modal_order">
            <div class="booknow_modal_overwrite"></div>
            <div class="booknow_modal_content">
                <div class="booknow_modal_close"><button>×</button></div>
                <div class="booknow_modal_title"><?php esc_html_e("Booking","booknow") ?> <span>12</span></div>
                <div class="booknow_modal_content_inner">
                    <ul>
                        <li class="booknow_modal_inner_content_booking_date">
                            <div class="booknow_modal_inner-tt"><?php esc_html_e("Booking Date","booknow"); ?>:</div>
                            <div class="booknow_modal_inner-ct"></</div>
                        </li>
                        <li class="booknow_modal_inner_content_appointment_date">
                            <div class="booknow_modal_inner-tt"><?php esc_html_e("Appointment Date","booknow"); ?>:</div>
                            <div class="booknow_modal_inner-ct"></div>
                       </li>
                        <li class="booknow_modal_inner_content_appointment_time">
                            <div class="booknow_modal_inner-tt"><?php esc_html_e("Appointment Time","booknow"); ?>:</div>
                            <div class="booknow_modal_inner-ct"></div>
                        </li>
                        <li class="booknow_modal_inner_content_service">
                            <div class="booknow_modal_inner-tt"><?php esc_html_e("Service","booknow"); ?>:</div> 
                            <div class="booknow_modal_inner-ct"></div>
                        </li>
                        <li class="booknow_modal_inner_content_price">
                            <div class="booknow_modal_inner-tt"><?php esc_html_e("Price","booknow"); ?>:</div>
                            <div class="booknow_modal_inner-ct"></</div>
                        </li>
                        <li class="booknow_modal_inner_content_duration">
                            <div class="booknow_modal_inner-tt"><?php esc_html_e("Duration","booknow"); ?>:</div>
                            <div class="booknow_modal_inner-ct"></div>
                        </li>
                        <li class="booknow_modal_inner_content_staff">
                            <div class="booknow_modal_inner-tt"><?php esc_html_e("Staff","booknow"); ?>:</div>
                            <div class="booknow_modal_inner-ct"></div>
                        </li>
                        <li class="booknow_modal_inner_content_status">
                            <div class="booknow_modal_inner-tt"><?php esc_html_e("Status","booknow"); ?>:</div>
                            <div class="booknow_modal_inner-ct"></div>
                        </li>
                    </ul>
                </div>
            </div>
          </div>
       </div>
       <?php
       return ob_get_clean();
    }
}
new Booknow_Shortcode_Orders;