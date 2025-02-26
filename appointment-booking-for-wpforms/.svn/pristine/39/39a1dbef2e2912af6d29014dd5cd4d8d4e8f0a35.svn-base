<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Shortcode {
    function __construct(){
        add_shortcode( 'booknow', array($this,'add_shortcode') );
        add_shortcode( 'booknow_sercices', array($this,'add_shortcode_sercices') );
        add_shortcode( 'booknow_staffs', array($this,'add_shortcode_staffs') );
        add_shortcode( 'booknow_summary', array($this,'add_shortcode_summary') );
        add_action( 'wp_ajax_boooknow_load_calendar', array($this,"load_data_load_calendar") );
        add_action( 'wp_ajax_nopriv_boooknow_load_calendar', array($this,"load_data_load_calendar") );
    }
    function load_data_load_calendar(){
        $startDate = sanitize_text_field( $_POST['startDate'] );
        $col = sanitize_text_field( $_POST['col'] );
        $service_id ="";
        if(isset($_POST['service_id']) && is_numeric($_POST['service_id']) && $_POST['service_id'] > 0){
            $service_id = sanitize_text_field( $_POST['service_id'] );
        }
        $availability_data = $this->get_data_calendar($startDate,$col,$service_id);
        wp_send_json_success( $availability_data );
        die();
    }
    function add_shortcode($atts, $content){
        $settings = get_option("calculation_forms_settings");
        $data = shortcode_atts( array(
                'id' => 0,
                'show_staff'=>1,
                'service_id'=>0,
                'show_service'=>1,
                'show_summary'=>1,
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
        return $this->load_data($name,$data);
    }
    function add_shortcode_sercices($atts){
        ob_start();
        ?>
        <div class="booknow-container">  
            <div class="booknow-input-container booknow-input-container-list booknow-input-container-service">
               <ul class="booknow-input-service">
                <?php 
                $services = get_posts( array("post_type"=>"booknow_services","numberposts"=>-1) );
                if ( $services ) :
                    $i=0;
                    foreach ( $services as $post ) : 
                        $post_id = $post->ID;
                        $thumbnail = get_the_post_thumbnail_url($post_id,"post-thumbnail");
                        if(!$thumbnail){
                            $thumbnail = BOOKNOW_PLUGIN_URL."frontend/images/service.png";
                        }
                        $services_datas = get_post_meta( $post_id   , '_booknow_services' , true );
                        $duration = Booknow_Functions::cover_time_to_hours($services_datas["duration"]);
                        $price = apply_filters("booknow_price_format",$services_datas["price"]);
                        $service_id_check = "";
                        $service_id = 0;
                        if( $post_id == $service_id ){
                            $service_id_check = "active";
                            $duration_active = $duration;
                            $price_active = $price;
                        }
                        ?>
                        <li class="<?php echo esc_attr($service_id_check) ?>" data-id="<?php echo esc_attr($post_id) ?>" data-duration="<?php echo esc_attr($duration) ?>" data-price="<?php echo esc_attr($services_datas["price"]) ?>" data-price_format="<?php echo esc_attr($price) ?>">
                            <div class="booknow-list-img">
                                <img src="<?php echo esc_url($thumbnail) ?>">
                            </div>
                            <div class="booknow-list-content">
                                <div class="booknow-list-content-title">
                                    <?php echo esc_html($post->post_title) ?>
                                    <span class="booknow_font icon-ok"></span>
                                </div>
                                <div class="booknow-list-content-des">
                                    <?php
                                    if( isset($services_datas["duration"]) && $services_datas["duration"] != ""){
                                        ?>
                                        <div class="booknow-list-content-des-duration">
                                            <?php esc_html_e("Duration","booknow") ?>: <strong><?php echo esc_attr($duration) ?></strong>
                                        </div>
                                        <?php
                                    }
                                    if( isset($services_datas["price"]) && $services_datas["price"] != ""){
                                        ?>
                                    
                                    <div class="booknow-list-content-des-price">
                                        <?php esc_html_e("Price","booknow") ?>: <strong><?php echo esc_attr($price) ?></strong>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </li>
                        <?php
                        $i++;
                    endforeach;
                    wp_reset_postdata(); 
                else :
                    ?> 
                    <li><?php esc_html_e("No service","booknow") ?></li>
                    <?php
                endif;
                 ?>
               </ul>
           </div>           
        </div>
        <?php
        $content = ob_get_contents(); 
        ob_end_clean();
        return $content;
    }
    function add_shortcode_staffs($atts){
        $data = shortcode_atts( array(
                'style' => 0,
                'show_any'=>1,
            ), $atts );
        ob_start();
        ?>
        <div class="booknow-container">
           <div class="booknow-input-container booknow-input-container-list">
               <ul class="booknow-input-staff">
                <?php if($data["show_any"] == 1){ ?>
                <li class="booknow-input-staff-service-id-any active" data-id="any">
                    <div class="booknow-list-img">
                        <img src="<?php echo esc_url(BOOKNOW_PLUGIN_URL."frontend/images/avatar.png") ?>">
                    </div>
                    <div class="booknow-list-content">
                        <div class="booknow-list-content-title">
                            <?php esc_html_e("Any","booknow") ?>
                            <span class="booknow_font icon-ok"></span>
                        </div>
                        <div class="booknow-list-content-des">
                            <div class="booknow-list-content-des-any">
                                <?php esc_html_e("The store will arrange staff.","booknow") ?>
                            </div>
                            
                        </div>
                    </div>
                </li>
                <?php
                }
                 $staffs = get_posts( array("post_type"=>"booknow_staffs","posts_per_page"=>-1) );
                    if ( $staffs ) :
                        foreach ( $staffs as $post ) : 
                            $post_id = $post->ID;
                            $thumbnail = get_the_post_thumbnail_url($post_id,"post-thumbnail");
                            if(!$thumbnail){
                                $thumbnail = BOOKNOW_PLUGIN_URL."frontend/images/avatar.png";
                            }
                            $staffs_datas = get_post_meta( $post_id , '_booknow_staffs' , true );
                            $staffs_services = get_post_meta( $post_id , '_booknow_staffs_services' , true );
                            $des ="";
                            if( isset($staffs_datas["des"])){
                                $des = $staffs_datas["des"];
                            }
                            $class_services = "";
                            $service_id = 0;
                            if( is_array($staffs_services)){
                                if($service_id != "" && !in_array($service_id,$staffs_services)){
                                    $class_services .=" hidden";
                                }
                                foreach($staffs_services as $id){
                                    $class_services .=" booknow-input-staff-service-id-".$id;
                                }
                            }
                            ?>
                            <li data-id="<?php echo esc_attr($post_id) ?>" class="<?php echo esc_attr($class_services) ?>">
                                <div class="booknow-list-img">
                                    <img src="<?php echo esc_url($thumbnail) ?>" alt="avatar">
                                </div>
                                <div class="booknow-list-content">
                                    <div class="booknow-list-content-title">
                                        <?php echo esc_html($post->post_title) ?>
                                        <span class="booknow_font icon-ok"></span>
                                    </div>
                                    <div class="booknow-list-content-des">
                                        <div class="booknow-list-content-des-des">
                                            <?php echo esc_attr($des) ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        endforeach;
                        wp_reset_postdata();
                    endif;
                    ?>
               </ul>
           </div>
        </div>
        <?php
        $content = ob_get_contents(); 
        ob_end_clean();
        return $content;
    }
    function add_shortcode_summary($atts){
        ob_start();
        ?>
        <div class="booknow-container">
          <div class="booknow-datas"> 
               <div class="booknow-datas-content booknow-row">
                   <div class="booknow-col">
                       <div class="booknow-content">
                           <div class="booknow-datas-content-icon"> 
                            <span class="booknow_font icon-calendar"></span>
                           </div>
                           <div class="booknow-datas-content-title booknow-datas-content-date">
                               <h5>?</h5>
                               <span><?php esc_html_e("Your Appointment Date","booknow") ?></span>
                           </div>
                       </div>
                       <div class="booknow-content">
                           <div class="booknow-datas-content-icon"> 
                            <span class="booknow_font icon-clock"></span>
                           </div>
                           <div class="booknow-datas-content-title booknow-datas-content-duration">
                               <h5>?</h5>
                               <span><?php esc_html_e("Duration","booknow") ?></span>
                           </div>
                       </div>
                    </div>
                    <div class="booknow-col booknow-col-last">
                       <div class="booknow-content">
                           <div class="booknow-datas-content-icon"> 
                            <span class="booknow_font icon-clock-alt"></span>
                           </div>
                           <div class="booknow-datas-content-title booknow-datas-content-time">
                               <h5>?</h5>
                               <span><?php esc_html_e("Your Appointment Time","booknow") ?></span>
                           </div>
                       </div>
                       <div class="booknow-content">
                           <div class="booknow-datas-content-icon"> 
                            <span class="booknow_font icon-cart"></span>
                           </div>
                           <div class="booknow-datas-content-title booknow-datas-content-price">
                               <h5>?</h5>
                               <span><?php esc_html_e("Total Price","booknow") ?></span>
                           </div>
                       </div>
                    </div>
               </div>
           </div>
        </div>
        <?php
        $content = ob_get_contents(); 
        ob_end_clean();
        return $content;
    }
    function get_data_calendar($initial_date = "",$col=7,$service_id=""){
        $time_format = apply_filters("booknow_time_format","H:i");
        $current_time_date = current_time("Y-m-d");
        $current_time_date_strtotime = strtotime($current_time_date);
        $current_time_date_strtotime_prev = strtotime("-1 day", $current_time_date_strtotime);
        if( $initial_date == "" ){
            $initial_date = $current_time_date;
        }
        $settings = get_option("booknow_settings");
        $availability = array();
        $duration = $settings["time_slot"];  // split by 30 mins
        $add_mins  = $duration * 60;  
        $time_settings = $settings["working_hours"];
        $holidays = apply_filters("booknow_holidays",array());
        for ($i=0; $i < $col; $i++) { 
            $array_of_time = array();
            $current_date = strtotime("+$i day", strtotime($initial_date));
            $date = date('Y-m-d', $current_date);
            
            if( $current_date <= $current_time_date_strtotime_prev ){
                $availability[$date] = $array_of_time;
                continue;
            }
            if( in_array($date,$holidays)){
                $availability[$date] = $array_of_time;
                continue;
            }
            $day_of_the_week = date('w', $current_date);
            $starttimes = $time_settings[$day_of_the_week]["start"]; 
            $endtimes = $time_settings[$day_of_the_week]["end"]; 
            foreach( $starttimes as $starttime_key => $starttime ) {
                if($starttime == "off"){
                    continue;
                }
                $start_time    = strtotime ($starttime);
                $end_time      = strtotime ($endtimes[$starttime_key]);
                while ($start_time <= $end_time) 
                {
                   $time = date ($time_format, $start_time);
                   $array_of_time[] = $time;
                   $start_time += $add_mins; 
                }
            }
            $availability[$date] = $array_of_time;
        }
        $exclude_available = apply_filters("booknow_exclude_available",array(),$initial_date,$col,$service_id);
        $availability_data = array();
        foreach( $availability as $key => $value ){
            $unavailable_time = array();
            if( isset($exclude_available[$key])) {
                $unavailable_time = $exclude_available[$key];
                $value = array_diff($value,$unavailable_time);
            }
            $availability_data[]= $value; 
        }

        return $availability_data;
    }
    function load_data($name = "", $shortcode_atts = array()){
        $settings = get_option("booknow_settings");
        $service_id= "";
        if( isset($shortcode_atts["service_id"]) && $shortcode_atts["service_id"] > 0 ){
            $service_id = $shortcode_atts["service_id"]; 
            $availability_data = $this->get_data_calendar("",$shortcode_atts["service_id"]);
        }else{
            $availability_data = $this->get_data_calendar();
        }
        ob_start();
        ?>
        <script type="text/javascript">
            var booknow_data_availability = <?php echo wp_json_encode($availability_data); ?>
        </script>
        <style type="text/css">
            :root {
            --booknow-pt-main-bg-color: <?php echo esc_attr($settings["color"]["primary"]) ?>;
            --booknow-pt-main-color: #fff;
            --booknow-pt-main-title: <?php echo esc_attr($settings["color"]["title"]) ?>;
            --booknow-pt-main-subtitle: <?php echo esc_attr($settings["color"]["subtitle"]) ?>;
            --booknow-pt-main-content: <?php echo esc_attr($settings["color"]["content"]) ?>;
        }
        </style>
       <div class="booknow-container">
           <div class="booknow-calendar">
               <div class="booknow-calendar-picker"></div>
           </div>
           <input class="booknow_responsive_col hidden" value="7" type="text" />
           <textarea name="<?php echo esc_attr($name)  ?>" class="booknow-datas-submit hidden"></textarea>
           <?php do_action( "booknow_after_form",$shortcode_atts  ) ?>
       </div>
                <?php
        $content = ob_get_contents(); 
        ob_end_clean();
     return $content;
    }
}
new Booknow_Shortcode;