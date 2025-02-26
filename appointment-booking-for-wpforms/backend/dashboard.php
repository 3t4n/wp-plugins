<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Dashboard {
  function __construct(){
        add_action( 'admin_menu', array($this,"add_menu") );
        add_action( 'wp_ajax_booknow_load_chart', array($this,"booknow_load_chart") );
    }
    function add_menu() {
        $check_wizard = get_option("booknow_wizard");
        if($check_wizard != "done"){
           add_menu_page(esc_html__("BookNow","booknow") , esc_html__("BookNow","booknow"), 'booknow','booknow-settings-wizard', array("Booknow_Install",'route'),BOOKNOW_PLUGIN_URL.'backend/images/booknow.png',30  );
        }else{
          add_menu_page(
                esc_html__( 'BookNow', 'booknow' ),
                esc_html__( 'BookNow', 'booknow' ),
                'booknow',
                'booknow',
                array($this,"page"),
                BOOKNOW_PLUGIN_URL.'backend/images/booknow.png',
                30
            ); 
            add_submenu_page("booknow",
                esc_html__( 'Dashboard', 'booknow' ),
                esc_html__( 'Dashboard', 'booknow' ),
                'booknow',
                'booknow_dashboard',
                array($this,"page"),
                0
            );   
        }
    }
    function page(){
        ?>
        <div class="wrap">
          <h1><?php esc_html_e("Dashboard","booknow") ?></h1>
          <div class="booknow-dashboard-container">
              <div class="booknow-dashboard-filter">
                   <h3><?php esc_html_e("Filter","booknow") ?></h3>
              </div>
              <div class="booknow-dashboard-summary">
                   <?php esc_html_e("Custom date:","booknow") ?>
                   <?php
                    $current_date = date ("Y-m-d");
                    $current_date_7 = date ("Y-m-d",strtotime("-7 day", strtotime($current_date)));
                    ?>
                   <input id="booknow-dashboard-input-start" type="date" value="<?php echo esc_attr($current_date_7) ?>" /> - <input id="booknow-dashboard-input-end" type="date" value="<?php echo esc_attr($current_date) ?>"  /> <a href="#" class="button button-primary booknow-dashboard-button-fiter"><?php esc_html_e("Go","booknow") ?></a>
              </div>
              <div class="booknow-dashboard-summary-data">
                   <div class="booknow-dashboard-summary-data-item booknow-dashboard-summary-data-item-total">
                       <h3>0</h3>
                       <p><?php esc_html_e("Total Appointments","booknow") ?></p>
                   </div>
                   <div class="booknow-dashboard-summary-data-item booknow-dashboard-summary-data-item-approved">
                       <h3>0</h3>
                       <p><?php esc_html_e("Approved Appointments","booknow") ?></p>
                   </div>
                   <div class="booknow-dashboard-summary-data-item booknow-dashboard-summary-data-item-pending">
                       <h3>0</h3>
                       <p><?php esc_html_e("Pending Appointments","booknow") ?></p>
                   </div>
                   <div class="booknow-dashboard-summary-data-item booknow-dashboard-summary-data-item-revenue">
                       <h3>0</h3>
                       <p><?php esc_html_e("Revenue","booknow") ?></p>
                   </div>
                   <div class="booknow-dashboard-summary-data-item booknow-dashboard-summary-data-item-customers">
                       <h3>0</h3>
                       <p><?php esc_html_e("Customers","booknow") ?></p>
                   </div>
              </div>
              <div class="booknow-dashboard-analysis">
                  <h3><?php esc_html_e("Technical Analysis","booknow") ?></h3>
                  <div class="booknow-dashboard-analysis-container">
                    <div class="booknow-dashboard-analysis-item-appointments">
                       <div class="booknow_loading"><?php esc_html_e("loading...","booknow") ?></div>
                    </div>
                    <div class="booknow-dashboard-analysis-item-revenue">
                       <div class="booknow_loading"><?php esc_html_e("loading...","booknow") ?></div>
                    </div>
                    <div class="booknow-dashboard-analysis-item-customers">
                       <div class="booknow_loading"><?php esc_html_e("loading...","booknow") ?></div>
                    </div>
                  </div>
              </div>
              <div class="booknow-dashboard-upcoming">
                  <h3><?php esc_html_e("Upcoming Appointments","booknow") ?></h3>
                  <?php 
                  $table = new Booknow_Appointments_List_Table(); 
                   $table->prepare_items();
                   $table->display(); 
                   ?>
              </div>
          </div>
        </div>
        <?php
    }
    function booknow_load_chart(){
      $date_to = sanitize_text_field($_POST["start"]);
      $date_form = sanitize_text_field($_POST["end"]);
      $begin = new DateTime( $date_to ." 00:00:00");
      $end   = new DateTime( $date_form ." 00:00:00");
      $datas = array();
      $j=0;
      for($i = $begin; $i <= $end; $i->modify('+1 day')){
        $date = $i->format("Y-m-d");
        $date_show = $i->format("d");
        $args = array(
          'post_type' => "booknow",
          'posts_per_page' => -1,
          'meta_query' => array(
            'relation' => 'AND',
            array(
              'key' => "_booknow_appointment_date",
              'value' => $date,
            ),
            array(
                    'key'       => '_booknow_appointment_status',
                    'value'     => 'approved'
                )
          )
        );
        $appointment_approved = get_posts( $args );
        $revenue =0;
        if ( $appointment_approved ) :
            foreach ( $appointment_approved as $post ) : 
                $post_id = $post->ID;
                $services_id = get_post_meta( $post_id , '_booknow_appointment_service' , true );
                $services = get_post_meta( $services_id , '_booknow_services' , true );
                if( isset($services["price"])){
                  $revenue = $revenue +  $services["price"];
                }
            endforeach;
            wp_reset_postdata(); 
        endif;
        $args = array(
          'post_type' => "booknow",
          'posts_per_page' => -1,
          'meta_query' => array(
            array(
              'key' => "_booknow_appointment_date",
              'value' => $date,
            ),
            array(
                    'key'       => '_booknow_appointment_status',
                    'value'     => 'pending'
                )
          )
        );
        $appointment_padding = get_posts( $args );
        $args = array(
          'post_type' => "booknow_customers",
          'posts_per_page' => -1,
          'date_query' => array(
            array(
              'year' => $i->format("Y"),
              'month' => $i->format("m"),
              'day' => $i->format("d")
            )
          )
        );
        $customers = get_posts( $args );
        $datas[] = array("title"=> $date_show,"approved"=>count($appointment_approved),"pending"=>count($appointment_padding),"revenue"=>$revenue,"customers"=>count($customers));
        $j++;
     }
     wp_send_json( $datas );
      die();
    }
}
new Booknow_Dashboard;