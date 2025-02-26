<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Appointments_Backend {
    public static $post_type = "booknow";
    function __construct(){
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'save_post',array( $this, 'save' ) );
        add_action( 'wp_ajax_booknow_load_staffs', array($this,"load_staffs") );
        add_action( 'wp_ajax_nopriv_booknow_load_staffs', array($this,"load_staffs") );
        add_action( 'wp_ajax_booknow_load_time', array($this,"load_time") );
        add_action( 'wp_ajax_nopriv_booknow_load_time', array($this,"load_time") );
        add_filter( 'manage_'.Booknow_Appointments_Backend::$post_type.'_posts_columns', array($this,"columns") );
        add_filter( 'manage_'.Booknow_Appointments_Backend::$post_type.'_posts_custom_column', array($this,"custom_column"), 10, 2 );
        add_action( 'restrict_manage_posts', array($this,"add_admin_filters"), 10, 1 );
        add_filter( 'parse_query', array($this,"filter_request_query") , 10);
        add_action("booknow_create_appointment",array($this,"add_appointment"),10,3);
        add_filter( 'booknow_appointment_tags', array($this,"booknow_appointment_tags"), 10,2);
    }
    function booknow_appointment_tags($datas,$appointment_id){
        $new_datas = array();
        $appointment_datas = array();
        if($appointment_id > 0 ){
            $customer_id = get_post_meta( $appointment_id , '_booknow_appointment_customer' , true );
            if(isset($customer_id) && $customer_id > 0 ){
                $customers = get_post_meta( $customer_id , '_booknow_customers' , true );
                $appointment_datas["customer_email"] = $customers["email"];
                $appointment_datas["customer_first_name"] = $customers["first_name"];
                $appointment_datas["customer_last_name"] = $customers["last_name"];
                $appointment_datas["customer_note"] = $customers["note"];
                $appointment_datas["customer_phone"] = $customers["phone"];
            }
            $staff_id = get_post_meta( $appointment_id , '_booknow_appointment_staff' , true );
            if(isset($staff_id) && $staff_id > 0 ){
                $staffs = get_post_meta( $staff_id , '_booknow_staffs' , true );
                $appointment_datas["staff_email"] = $staffs["email"];
                $appointment_datas["staff_first_name"] = $staffs["first_name"];
                $appointment_datas["staff_last_name"] = $staffs["last_name"];
                $appointment_datas["staff_phone"] = $staffs["phone"];
            }
            $service_id = get_post_meta( $appointment_id , '_booknow_appointment_service' , true );
            if(isset($service_id) && $service_id > 0 ){
                $services = get_post_meta( $service_id , '_booknow_services' , true );
                $appointment_datas["service_name"] = $services["name"];
                $appointment_datas["service_amount"] = $services["price"];
                $appointment_datas["service_duration"] = $services["duration"];
            }
            $appointment_time = get_post_meta( $appointment_id , '_booknow_appointment_date_time' , true );
            $datas_opt = get_option("booknow_settings");
            $date_format = 'F j, Y';
            if( isset($datas_opt["date_format"])){
                $date_format = $datas_opt["date_format"];
            }
            $appointment_datas["appointment_date"] = date($date_format,$appointment_time);
            $appointment_datas["appointment_time"] =  get_post_meta( $appointment_id , '_booknow_appointment_time' , true );
            $appointment_datas["appointment_id"] = $appointment_id;
        }
        foreach($datas as $k=>$v){
            if(!is_array($v)){
               $new_datas[$k] = $this->shortcode_to_text_wp($v,$appointment_datas); 
            }else{
                $new_datas[$k] = $v;
            } 
        }
        return $new_datas;
    }
    function shortcode_to_text_wp($text,$datas = array()){
        $new_emails = [];
        $shortcodes = [];
        $all ="";
        $shortcodes["_site_admin_email"] = get_option("admin_email");
        $shortcodes["_site_title"] = get_option("blogname");
        $shortcodes["_site_url"] = get_option("siteurl");
        $pattern = get_shortcode_atts_regex();
        $shortcodes = array_merge($shortcodes,$datas);
        preg_match_all( '@\[([^<>&/\[\]\x00-\x20=]++)@', $text, $matches );
        if ( is_array( $matches[1] ) ) {
            foreach ( $matches[1] as $match ) {
                $pattern = $this->pattern_shortcode($match);
                $value = "";
                if( isset($shortcodes[$match])){
                    $value = $shortcodes[$match];
                    if( is_array($value) ){ 
                        $text = preg_replace( "/$pattern/", implode("|",$value), $text );
                    }else{
                        $text = preg_replace( "/$pattern/", $value, $text );
                    }
                }
            }
        }
        return $text;
    }
    function pattern_shortcode($match){
        $pattern = '\\['                             // Opening bracket.
                                . '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]].
                                . "($match)"                     // 2: Shortcode name.
                                . '(?![\\w-])'                       // Not followed by word character or hyphen.
                                . '('                                // 3: Unroll the loop: Inside the opening shortcode tag.
                                .     '[^\\]\\/]*'                   // Not a closing bracket or forward slash.
                                .     '(?:'
                                .         '\\/(?!\\])'               // A forward slash not followed by a closing bracket.
                                .         '[^\\]\\/]*'               // Not a closing bracket or forward slash.
                                .     ')*?'
                                . ')'
                                . '(?:'
                                .     '(\\/)'                        // 4: Self closing tag...
                                .     '\\]'                          // ...and closing bracket.
                                . '|'
                                .     '\\]'                          // Closing bracket.
                                .     '(?:'
                                .         '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags.
                                .             '[^\\[]*+'             // Not an opening bracket.
                                .             '(?:'
                                .                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag.
                                .                 '[^\\[]*+'         // Not an opening bracket.
                                .             ')*+'
                                .         ')'
                                .         '\\[\\/\\2\\]'             // Closing shortcode tag.
                                .     ')?'
                                . ')'
                                . '(\\]?)';
        return $pattern;
    }
    public static function update_status_appointment($entry_id,$status = "approved" )  {
        $appointments = get_posts( array("post_type"=>"booknow","numberposts"=>-1,
                    'meta_query' => array( 
                                array(
                                    'key'=> '_booknow_appointment_entry_id',
                                    'value' => $entry_id,
                                )
                            ),
                    ) );
         if ( $appointments ) :
            foreach ( $appointments as $post ) : 
                $post_id = $post->ID;
               update_post_meta( $post_id, "_booknow_appointment_status", $status );
               do_action("booknow_appointment_status",$post_id,$status);
            endforeach;
            wp_reset_postdata(); 
        endif;
    }
    function add_appointment($datas,$form_data,$add_on){
        $settings = get_option("booknow_settings");
        if( isset($settings["save_appointments"]) && $settings["save_appointments"] == "yes"){
            if(is_array($datas) && count($datas["date"]) > 0 ) {
                foreach ($datas["date"] as $date) {
                    $datas_date = explode("|", $date);
                    $my_post = array(
                      'post_title'    => apply_filters( "booknow_date_format", $datas_date[0] ),
                      'post_type' =>Booknow_Appointments_Backend::$post_type,
                      'post_status'   => 'publish',
                    );
                    $my_post = apply_filters( "booknow_create_appointment_datas", $my_post, $datas,$form_data,$add_on);
                    $post_id = wp_insert_post( $my_post );
                    $date = sanitize_text_field($datas_date[0]);
                    update_post_meta( $post_id, "_booknow_appointment_date", $date );
                    $time = sanitize_text_field($datas_date[1]);
                    update_post_meta( $post_id, "_booknow_appointment_time", $time );
                    if(isset($form_data["entry_id"])){
                         update_post_meta( $post_id, "_booknow_appointment_entry_id", $form_data["entry_id"] );
                    }
                    if(isset($form_data["booknow_status"])){
                        $status = sanitize_text_field( $form_data["booknow_status"] );
                    }else{
                        $status = "approved";
                    }
                    update_post_meta( $post_id, "_booknow_appointment_status", $status );
                    $service = sanitize_text_field($datas["service"]);
                    update_post_meta( $post_id, "_booknow_appointment_service", $service );
                    $staff = sanitize_text_field($datas["staff"]);
                    update_post_meta( $post_id, "_booknow_appointment_staff", $staff );
                    update_post_meta( $post_id, "_booknow_appointment_date_time", strtotime($date." " .$time) );
                    update_option( "booknow_last_appointment", $post_id );
                    do_action("booknow_after_appointment",$post_id,$status);
                }
            }
        }
    }
    public function add_admin_filters( $post_type ){
        if( Booknow_Appointments_Backend::$post_type !== $post_type ){
            return;
        }
        esc_html_e("Date: ","booknow");
        $date_to ="";
        if( isset($_GET['date_to'])){
            $date_to = sanitize_text_field($_GET['date_to']);
        }
        $date_form ="";
        if( isset($_GET['date_form'])){
            $date_form = sanitize_text_field($_GET['date_form']);
        }
       ?>
       : <input name="date_to" type="date" value="<?php echo esc_attr($date_to) ?>" /> - <input name="date_form" type="date" value="<?php echo esc_attr($date_form) ?>" />
       <?php
       esc_html_e("Customer Name","booknow");
       ?>
       <select name="customer" class="booknow_select2_load_customer regular-text" >
            <option value="all"><?php esc_html_e("All","booknow") ?></option>
            <?php 
                if( isset($_GET['customer']) && $_GET['customer'] != "all"){
                    $customer_id = sanitize_text_field($_GET['customer']);
                    $customer_name = get_the_title($customer_id);
                   ?>
                   <option selected="selected" value="<?php echo esc_attr($customer_id) ;?>"><?php echo esc_html($customer_name) ;?></option>
                   <?php
               }
            ?>
       </select>
       <?php
       esc_html_e("Service","booknow");
       ?>
       : <select name="service" class="booknow_select2"/>
       <option value="all"><?php esc_html_e("All","booknow") ?></option>
       <?php
       $services = new WP_Query( array(
                                "post_type"=>"booknow_services","posts_per_page"=>-1,
                                     ));
       $appointment_service ="";
       if( isset($_GET['service'])){
            $appointment_service = sanitize_text_field($_GET['service']);
       }
        if ( $services->have_posts() ) :
            while ( $services->have_posts() ) :
                $services->the_post();
                $id_service = get_the_ID();
                ?>
                <option <?php selected($id_service, $appointment_service ) ?> value="<?php echo esc_attr($id_service) ?>"><?php the_title() ?></option>
                <?php
            endwhile;
            wp_reset_postdata(); 
        endif;
       ?>
       </select> 
       <?php
       esc_html_e("Status","booknow");
       $appointment_status ="";
       if( isset($_REQUEST['status'])){
            $appointment_status = sanitize_text_field($_REQUEST['status']);
       }
       ?>
       : <select name="status" class="booknow_select2">
        <option value="all"><?php esc_html_e("All","booknow") ?></option>
        <?php 
            $status = apply_filters("booknow_status",array(
                "approved"=>esc_html__("Approved","booknow"),
                "pending"=>esc_html__("Pending","booknow"),
                "cancelled"=>esc_html__("Cancelled","booknow"),
                "rejected"=>esc_html__("Rejected","booknow")
            ));
            foreach($status as $k=>$v ){
                ?>
                <option  <?php selected($k,$appointment_status) ?> value="<?php echo esc_attr($k) ?>"><?php echo esc_html($v) ?></option>
                <?php
            }
         ?>
       </select>
       <?php
    }
    function filter_request_query($query){
        if( !(is_admin() AND $query->is_main_query()) ){ 
          return $query;
        }
        if( !(Booknow_Appointments_Backend::$post_type === $query->query['post_type'] ) ){
          return $query;
        }
        $metas = array();
        if( isset($_REQUEST["customer"]) && $_REQUEST["customer"] != "all"){
            $metas[] = array(
                array(
                    'key'       => '_booknow_appointment_customer',
                    'value'     => sanitize_text_field($_REQUEST["customer"]),
                )
            );
        }
        if( isset($_REQUEST["service"]) && $_REQUEST["service"] != "" && $_REQUEST["service"] != "all"){
            $metas[] =  array(
                array(
                    'key'       => '_booknow_appointment_service',
                    'value'     => sanitize_text_field($_REQUEST["service"])
                )
            );
        }
        if( isset($_REQUEST["status"]) && $_REQUEST["status"] != "all"){
            $metas[] =  array(
                array(
                    'key'       => '_booknow_appointment_status',
                    'value'     => sanitize_text_field($_REQUEST["status"])
                )
            );
        }
        if( isset($_REQUEST["date_to"]) && $_REQUEST["date_to"] != ""){
            $date_to = sanitize_text_field($_REQUEST["date_to"]);
            $date_form =date('d/m/Y');
            if( isset($_REQUEST["date_form"]) && $_REQUEST["date_form"] !="" ) {
                $date_form = $_REQUEST["date_form"];
            }
            $metas[] =  array(
                array(
                    'key'       => '_booknow_appointment_date',
                    'value'     => array($date_to, $date_form),
                    'compare' => 'BETWEEN',
                    'type' => 'DATE'
                )
            );
        }
        if( count($metas) > 0 ){
            $query->set('relation',"AND");
            $query->set('meta_query',$metas);
        }
        return $query;
    }
    function columns($columns){
        unset($columns['date']);
        unset($columns['title']);
        $columns['date_book']     = esc_html__("Appointment Date","booknow");
        $columns['time']     = esc_html__("Time","booknow");
        $columns['duration']     = esc_html__("Duration","booknow");
        $columns['service']     = esc_html__("Service","booknow");
        $columns['staff']     = esc_html__("Staff","booknow");
        $columns['client']     = esc_html__("Customer","booknow");
        $columns['status']     = esc_html__("Status","booknow");
        $columns['date']     = esc_html__("Booking Date","booknow");
        return $columns;
    }
    function custom_column( $column, $post_id ) {
        switch ( $column ) {
            case 'date_book' :
                $appointment_time = get_post_meta( $post_id , '_booknow_appointment_date_time' , true );
                $datas = get_option("booknow_settings");
                $date_format = 'F j, Y';
                if( isset($datas["date_format"])){
                    $date_format = $datas["date_format"];
                }
                $title = date($date_format,$appointment_time);
                $link = get_edit_post_link( $post_id );
                printf('<a href="%s" >%s</a>',$link,$title);
                break;
            case 'time' :
                $appointment_time = get_post_meta( $post_id , '_booknow_appointment_time' , true );
                echo esc_attr($appointment_time);
                break;
            case 'service' :
                $appointment_service = get_post_meta( $post_id , '_booknow_appointment_service' , true );
                echo get_the_title( $appointment_service );
                break;
            case 'duration' :
                $appointment_service = get_post_meta( $post_id , '_booknow_appointment_service' , true );
                $service_data = get_post_meta( $appointment_service , '_booknow_services' , true );
                if( isset($service_data["duration"])){
                    echo esc_html($service_data["duration"]." ");
                    esc_html_e("Minutes","booknow");
                }
                break;
            case 'staff' :
                $appointment_staff = get_post_meta( $post_id , '_booknow_appointment_staff' , true );
                if( $appointment_staff > 0 ){
                    echo get_the_title( $appointment_staff );
                }else{
                    echo esc_html($appointment_staff);
                }
                break;
            case 'client' :
                $appointment = get_post_meta( $post_id , '_booknow_appointment_customer' , true );
                if( isset($appointment) && $appointment > 0){
                    ?>
                    <a href="<?php echo get_edit_post_link( $appointment ) ?>"><?php echo get_the_title($appointment) ?></a>
                    <?php
                }
                break;
            case 'status' :
                $appointment_status = get_post_meta( $post_id , '_booknow_appointment_status' , true );
                echo esc_html($appointment_status);
                break;
        }
    }
    function load_time(){
        $datas = array();
        $date = sanitize_text_field($_POST["date"]);
        $array_of_time = Booknow_Functions::get_time_slot_booking($date);
        if(count($array_of_time) > 0){
            wp_send_json( $array_of_time );
        }else{
            wp_send_json( array(array("key"=>"","value"=>"Off")) );
        }
        die();
    }
    function load_staffs(){
        $datas = array();
        $datas[] = array("key"=>"any","label"=>esc_html__("Any","booknow"));
        $service = sanitize_text_field($_POST["service"]);
        // serialize(strval($value)),
        $staffs = new WP_Query( array("post_type"=>"booknow_staffs","posts_per_page"=>-1,
            'meta_query' => array( 
                        array(
                            'key'=> '_booknow_staffs_services',
                            'value' => $service,
                            'compare'=> 'LIKE'
                        )
                    ),
            ) );
        if ( $staffs->have_posts() ) :
            while ( $staffs->have_posts() ) :
                $staffs->the_post();
                $datas[] = array("key"=>get_the_ID(),"label"=>get_the_title());
            endwhile;
            wp_reset_postdata(); 
        endif;
        wp_send_json( $datas );
        die();
    }
     function add_meta_boxes() {
        add_meta_box(
            Booknow_Appointments_Backend::$post_type,
            esc_html__( 'Appointment', 'booknow' ),
            array( $this, 'form_main' ),
            'booknow',
            'normal',
            'default'
        );
    }
    function form_main($post ) {
        $post_id= $post->ID;
        $first_service = 0;
        $appointment = get_post_meta( $post_id , '_booknow_appointment' , true );
        $appointment_date = get_post_meta( $post_id , '_booknow_appointment_date' , true );
        $appointment_time = get_post_meta( $post_id , '_booknow_appointment_time' , true );
        $appointment_status = get_post_meta( $post_id , '_booknow_appointment_status' , true );
        $appointment_service = get_post_meta( $post_id , '_booknow_appointment_service' , true );
        $appointment_staff = get_post_meta( $post_id , '_booknow_appointment_staff' , true );
        $appointment_customer = get_post_meta( $post_id , '_booknow_appointment_customer' , true );
        if($appointment_service == ""){
            $first_service = $appointment_service; 
        }
        wp_nonce_field( 'booknow_appointment_none', 'booknow_appointment_none' );
      ?>
      <div class="booknow-container">
          <div class="booknow-tab-content">
              <div class="booknow-tab-main">
                  <table class="form-table">
                     <tr valign="top">
                        <th scope="row"><?php esc_html_e("Service","booknow") ?> </th>
                        <td> 
                            <select name="booknow_appointment_service" class="regular-text ajax_booknow_appointment_service booknow_select2">
                            <?php 
                            $services = new WP_Query( array(
                                "post_type"=>"booknow_services","posts_per_page"=>-1,
                                     ));
                            $i = 0;
                            if ( $services->have_posts() ) :
                                while ( $services->have_posts() ) :
                                    $services->the_post();
                                    $id_service = get_the_ID();
                                    if($first_service == ""){
                                        if($i==0){
                                          $first_service = $id_service; 
                                        }
                                    }
                                    ?>
                                    <option <?php selected($id_service, $appointment_service ) ?> value="<?php echo esc_attr($id_service) ?>"><?php the_title() ?></option>
                                    <?php
                                    $i++;
                                endwhile;
                                wp_reset_postdata(); 
                            else :
                                esc_html_e("Please create a service","booknow");
                            endif;
                             ?>
                             </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Staff","booknow") ?> </th>
                        <td> 
                            <select name="booknow_appointment_staff" class="regular-text ajax_booknow_appointment_staff booknow_select2">
                            <?php 
                            $staffs = new WP_Query( array( 
                                        "post_type"=>"booknow_staffs",
                                        "posts_per_page"=>-1,
                                        'meta_query' => array( 
                                            array(
                                                'key'=> '_booknow_staffs_services',
                                                'value' => $first_service,
                                                'compare'=> 'LIKE'
                                            )
                                        ),  
                                    ));
                            if ( $staffs->have_posts() ) :
                                while ( $staffs->have_posts() ) :
                                    $staffs->the_post();
                                    $services_datas = get_post_meta( get_the_ID() , '_booknow_staffs_services' , true );
                                    ?>
                                    <option <?php selected(get_the_ID(), $appointment_staff ) ?> value="<?php the_ID() ?>"><?php the_title() ?></option>
                                    <?php
                                endwhile;
                                wp_reset_postdata(); 
                            else :
                                esc_html_e("Please create a staff","booknow");
                            endif;
                             ?>
                             </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Appointment date","booknow") ?> </th>
                        <td>                                
                           <input data-sort="0" value="<?php echo esc_attr($appointment_date) ?>"  name="booknow_appointment_date" class="regular-text ajax_booknow_appointment_date change-title" type="date" />
                        </td>
                    </tr>
                     <tr valign="top">
                        <th scope="row"><?php esc_html_e("Appointment time","booknow") ?> </th>
                        <td> 
                        <select name="booknow_appointment_time" class="regular-text ajax_booknow_appointment_time booknow_select2">
                            <?php
                            $array_of_time = array();
                            if($appointment_date != ""){
                               $array_of_time = Booknow_Functions::get_time_slot_booking($appointment_date); 
                               foreach($array_of_time as $key=>$values) {
                                 ?>
                                 <option <?php selected($values["key"],$appointment_time) ?> value="<?php echo esc_attr($values["key"]) ?>" /><?php echo esc_attr($values["value"]) ?></option>
                                 <?php
                               }
                            }
                        ?>
                        </select>                               
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Status","booknow") ?> </th>
                        <td>                                
                           <select name="booknow_appointment_status" class="booknow_select2">
                            <?php 
                                $status = apply_filters("booknow_status",array(
                                    "approved"=>esc_html__("Approved","booknow"),
                                    "pending"=>esc_html__("Pending","booknow"),
                                    "cancelled"=>esc_html__("Cancelled","booknow"),
                                    "rejected"=>esc_html__("Rejected","booknow")
                                ));
                                foreach($status as $k=>$v ){
                                    ?>
                                    <option  <?php selected($k,$appointment_status) ?> value="<?php echo esc_attr($k) ?>"><?php echo esc_html($v) ?></option>
                                    <?php
                                }
                             ?>
                           </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Note","booknow") ?> </th>
                        <td>
                        <textarea class="code regular-text" name="booknow_appointment[note]" ></textarea>                            
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e("Customer","booknow") ?> </th>
                        <td> 
                            <?php
                                $customer_name = esc_html__("Choose Customer","booknow");
                                $customer_id = "";
                                if(isset($appointment_customer) && $appointment_customer != ""){
                                    $customer_id = $appointment_customer;
                                    $customer_name = get_the_title($customer_id);
                                }
                             ?>
                            <select name="booknow_appointment_customer" class="booknow_select2_load_customer regular-text" data-type="user">
                                <option value="<?php echo esc_attr($customer_id) ;?>"><?php echo esc_html($customer_name) ;?></option>
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
        if ( ! isset( $_POST['booknow_appointment_none'] ) ) {
            return $post_id;
        }
        if ( ! wp_verify_nonce( $_POST['booknow_appointment_none'], 'booknow_appointment_none' ) ) {
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
        if( isset($_POST['booknow_appointment'] ) && is_array($_POST['booknow_appointment'])){
            $booknow_appointment = map_deep( $_POST['booknow_appointment'], 'sanitize_text_field' );
        }
        update_post_meta( $post_id, "_booknow_appointment", $booknow_appointment );
        $date = sanitize_text_field($_POST["booknow_appointment_date"]);
        update_post_meta( $post_id, "_booknow_appointment_date", $date );
        $time = sanitize_text_field($_POST["booknow_appointment_time"]);
        update_post_meta( $post_id, "_booknow_appointment_time", $time );
        $status = sanitize_text_field($_POST["booknow_appointment_status"]);
        $appointment_status = get_post_meta( $post_id , '_booknow_appointment_status' , true );
        update_post_meta( $post_id, "_booknow_appointment_status", $status );
        if($status != $appointment_status){
            do_action("booknow_appointment_status",$post_id,$status);
        }
        $service = sanitize_text_field($_POST["booknow_appointment_service"]);
        update_post_meta( $post_id, "_booknow_appointment_service", $service );
        $staff = sanitize_text_field($_POST["booknow_appointment_staff"]);
        update_post_meta( $post_id, "_booknow_appointment_staff", $staff );
        $customer = sanitize_text_field($_POST["booknow_appointment_customer"]);
        update_post_meta( $post_id, "_booknow_appointment_customer", $customer );
        update_post_meta( $post_id, "_booknow_appointment_date_time", strtotime($date." " .$time) );
    }
}
new Booknow_Appointments_Backend;