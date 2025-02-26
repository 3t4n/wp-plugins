<?php
/**
 * Plugin Name: Advanced Contact Form 7 - Compact DB 
 * Description: An add-on for Contact Form 7 that provides an updated and compact data viewing option.
 * Version: 1.0.0
 * Author: Ranit Majumder
 * Author URI: https://www.freelancer.com/hireme/majumderranit81
 * License: GPLv3
 */

/**
 * Verify CF7 dependencies.
 */


 
function cf7_cdb_admin_notice() {
  
    if ( is_plugin_active('contact-form-7/wp-contact-form-7.php') ) {
        $wpcf7_path = plugin_dir_path( dirname(__FILE__) ) . 'contact-form-7/wp-contact-form-7.php';
        $wpcf7_plugin_data = get_plugin_data( $wpcf7_path, false, false);
        $wpcf7_version = (int)preg_replace('/[.]/', '', $wpcf7_plugin_data['Version']);
        
        if ( $wpcf7_version < 100 ) {
            $wpcf7_version = $wpcf7_version * 10;
        }
        // If CF7 version is < 3.9.0
        if ( $wpcf7_version < 390 ) {
            echo '<div class="error"><p><strong>Warning: </strong>Contact Form 7 - Compact DB requires that you have the latest version of Contact Form 7 installed. Please upgrade now.</p></div>';
        }
    }
    // If it's not installed and activated, throw an error
    else {
        echo '<div class="error"><p>Contact Form 7 is not activated. The Contact Form 7 Plugin must be installed and activated before you can use Compact DB.</p></div>';
    }
}
add_action( 'admin_notices', 'cf7_cdb_admin_notice' );


/**
* creating table on activation
*/ 

function cfzcdb_tables(){

    global $wpdb;
    $table_name = $wpdb->prefix . "cf7cdb_data";
    $cf7cdb_version = '1.0.0';
    $charset_collate = $wpdb->get_charset_collate();

    if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

        $sql = "CREATE TABLE $table_name (
                ID mediumint(9) NOT NULL AUTO_INCREMENT,
                `form_id` int(255) NOT NULL,
                `form_data` text NOT NULL,
                `timestamp` text NOT NULL,
                PRIMARY KEY  (ID)
        )    $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        add_option( 'my_db_version', $cf7cdb_version );

        
    }
}
register_activation_hook( __file__, 'cfzcdb_tables' );

/**
 * Enqueue a script in the WordPress admin.
 */

function cf7cdb_scripts( $hook ) {
    
    wp_enqueue_script( 'cf7cdb_script', plugin_dir_url( __FILE__ ) . 'js/cf7cdb.js', array('jquery'), '1.0' );

    wp_register_script( 
        'ajaxHandle', 
        plugins_url('js/jquery.ajax.js', __FILE__), 
        array('jquery'), 
        false, 
        true 
      );
      wp_enqueue_script( 'ajaxHandle' );
      wp_localize_script( 
        'ajaxHandle', 
        'ajax_object', 
        array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) 
      );

      wp_register_style( 'ccf7cdb_css', plugin_dir_url( __FILE__ ) . 'css/cf7cdb.css', false, '1.0.0' );
    wp_enqueue_style( 'ccf7cdb_css' );

}
add_action( 'admin_enqueue_scripts', 'cf7cdb_scripts' );


/**
* AJAX Hooks
*/ 

add_action( "wp_ajax_cf7cdb_delete", "cf7cdb_ajax_delete_user" );
add_action( "wp_ajax_nopriv_cf7cdb_delete", "cf7cdb_ajax_delete_user" );

function cf7cdb_ajax_delete_user(){
  
  if(isset($_POST['form_id']))
  {
     

    global $wpdb;
    $table_name = $wpdb->prefix . "cf7cdb_data";

    $form_id = filter_var($_POST['form_id'], FILTER_VALIDATE_INT);


    if(intval($form_id) > 0){ 
    
        $wpdb->delete( $table_name, array( 'ID' => $form_id ) );


         $return = array(
            'message'  => 'Entry deleted successfully!',
            'status'       => 1
         );
     }else{
        $return = array(
            'message'  => 'Something Wrong!',
            'status'       => 0
        );
     }

  }else{
     $return = array(
        'message'  => 'Something Wrong!',
        'status'       => 0
    );
   
  }

 
    wp_send_json($return);
 
  wp_die(); // ajax call must die to avoid trailing 0 in your response
} 

add_action( "wp_ajax_cf7cdb_export", "cf7cdb_ajax_export" );
add_action( "wp_ajax_nopriv_cf7cdb_export", "cf7cdb_ajax_export" );

function cf7cdb_ajax_export(){
  
  if(isset($_POST['form_id']))
  {
     


  }else{
     $return = array(
        'message'  => 'This feature is coming soon!',
        'status'       => 0
    );
   
  }

 
    wp_send_json($return);
 
  wp_die(); // ajax call must die to avoid trailing 0 in your response
} 



/**
* Adding the panel
*/  

function cf7_cdb_panels($panels) {
    $panels['saved-data-panel'] = array( 'title' => 'Submitted data', 'callback' => 'cf7_cdb_panel_meta' );
    return $panels;
}
add_action( 'wpcf7_editor_panels', 'cf7_cdb_panels' );

/*
* Panel callback
*/

function cf7_cdb_panel_meta( $post ) {

    global $wpdb;
    $table_name = $wpdb->prefix . "cf7cdb_data";
    $current_form = $post->id();
    echo '<span id="cf7cdb_messages"></span><h2 class="cf7_cdb_dFlx" ><span>Submitted Data</span> <span class="button-primary cf7cdb_export">Export data</span></h2>
          <fieldset>
            <legend>All saved data listed bellow.</legend></fieldset>';

    $results = $wpdb->get_results( "SELECT * FROM $table_name WHERE `form_id` LIKE $current_form ORDER BY timestamp DESC");
    if(!empty($results))                        // Checking if $results have some values or not
        { 
    ?>

        <ul class="cf7_cdb_results">
            <?php  

                foreach($results as $row){ 
                $uns_data = unserialize($row->form_data)
            ?>
            <li class="cf7_cdb_item ">
                <div class="item_top_ares cf7_cdb_dFlx">
                    <div class="cf7_cdb_meta cf7_cdb_dFlx">
                        <h3><strong>ID:</strong> <span><?php echo $row->ID; ?></span><h3>
                        <span class="cf7_cdb_time"><strong>Time:</strong> <?php echo $row->timestamp; ?> </span>
                    </div>
                    <div class="actions">
                        <span class="button-primary  cf7cdb_view"> View  </span>
                        <span data-id="<?php echo $row->ID; ?>" class="copy button cf7cdb_delete"> Delete  </span>
                    </div>
                </div>
                <div class="cf7_cdb_item_content">
                    <?php foreach ($uns_data as $key => $uns_data_itm) { 
                        if(
                            $key == '_wpcf7' || 
                            $key == '_wpcf7_version' || 
                            $key == '_wpcf7_locale' || 
                            $key == '_wpcf7_unit_tag' || 
                            $key == '_wpcf7_container_post'
                        ){

                        }else{
                    ?>

                    <div class="data_details_item">
                        <strong><?php echo $key ?> : </strong>

                        <?php 
                            if(is_array($uns_data_itm)){
                                foreach ($uns_data_itm as $key => $value) {
                                    echo "Key: ".$key." , Value: ".$value;
                                }

                            }else{
                        ?>
                             <span><?php echo $uns_data_itm ?></span>
                        <?php        

                            }
                         ?>
                       
                    </div>

                    <?php } } ?>
                    
                </div>
                
            </li>
            <?php } ?>
        </ul>
  

    <?php
    }else{
        echo "<p><strong>Relax!!! From now on, all Submitted data of this form will show here!</strong></p>";
    }

}



/*
* after data posted
*/ 



add_action( 'wpcf7_mail_sent', 'cf7cdb_after_data_posted' );

function cf7cdb_after_data_posted(&$WPCF7_ContactForm){

     $submission = WPCF7_Submission::get_instance();

    if ( $submission ) {

        $data = $submission->get_posted_data();
        

         global $wpdb;
        $table_name = $wpdb->prefix . "cf7cdb_data";

        $form_id = $data['_wpcf7'];

        $wpdb->insert($table_name, array(
            'form_id' => $form_id,
            'form_data' => serialize($data),   
            'timestamp' => date( 'Y-m-d H:i:s')    
        ));
        

    }else{
        // we got nothing; something went wrong
    }

}



