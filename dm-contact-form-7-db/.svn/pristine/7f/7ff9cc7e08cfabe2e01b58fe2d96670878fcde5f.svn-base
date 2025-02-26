<?php

/**
 * WP_CF7DB_Record_Details class
 *
 * @author   Devendra Mer <davanwp@gmail.com>
 * @package  WP_CF7DB
 * @since    1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WP_CF7DB_Record_Details
{
    private $id;
    private $form_id;


    public function __construct()
    {
        $this->form_id = isset( $_GET['form_id'] ) ? (int) esc_attr($_GET['form_id']) : 0;
        $this->id      = isset( $_GET['record_id'] ) ? (int) esc_attr($_GET['record_id']) : 0;

        $this->form_details_page();
    }

    public function form_details_page(){
        global $wpdb;
        $wp_cf7db    = apply_filters( 'wp_cf7db_database', $wpdb );
        $table_name  = $wp_cf7db->prefix.'cf7db_forms';
        $upload_dir    = wp_upload_dir();
        $wp_cf7db_dir_url = $upload_dir['baseurl'].'/wp_cf7db_uploads';
        $rm_underscore = apply_filters('wp_cf7db_remove_underscore_data', true); 

        $results    = $wp_cf7db->get_results( "SELECT * FROM $table_name WHERE form_id = $this->form_id AND id = $this->id LIMIT 1", OBJECT );

        if ( empty($results) ) {
            wp_die( $message = 'Not valid contact form' );
        }
        ?>
<div class="wrap">
    <?php do_action('wp_cf7db_before_formdetails_title',$this->form_id ); ?>
    <h2><?php echo esc_html( get_the_title( $this->form_id ) ); ?></h2>
    <?php do_action('wp_cf7db_after_formdetails_title', $this->form_id ); ?>

    <div id="dm-welcome-panel" class="dm-welcome-panel">
        <div class="dm-welcome-panel-content">
            <div class="dm-welcome-panel-column-container">

                <?php 
                          echo "<a href='admin.php?page=".WP_CF7DB_SLUG."&form_id=$this->form_id' style='margin:0;' class='button-primary'>";
                          echo esc_html__( 'Back to Records', 'wp-cf7db' );
                          echo '</a>';
                        
                        ?>

                <h4><b><?php echo esc_html__('Submission Date: ','wp-cf7db'); ?></b><?php echo esc_html( $results[0]->form_date ); ?>
                </h4>
                <?php $form_data  = unserialize( $results[0]->form_value );

                        foreach ($form_data as $key => $data):

                            $matches = array();

                            if ( $key == 'wp_cf7db_status' )  continue;
                            if( $rm_underscore ) preg_match('/^_.*$/m', $key, $matches);
                            if( ! empty($matches[0]) ) continue;

                            if ( strpos($key, 'wp_cf7db_file') !== false ){

                                $key_val = str_replace('wp_cf7db_file', '', $key);
                                $key_val = str_replace('your-', '', $key_val);
                                $key_val = str_replace( array('-','_'), ' ', $key_val);
                                $key_val = ucwords( $key_val );
                                echo '<h4><b>'.esc_html( $key_val ).':</b> <a target="_blank" href="'.esc_html( $wp_cf7db_dir_url ).'/'.esc_html( $data ).'">'
                                .esc_html( $data ).'</a></h4>';

                            }else{

                                if ( is_array($data) ) {

                                    $key_val      = str_replace('your-', '', $key);
                                    $key_val      = str_replace( array('-','_'), ' ', $key_val);
                                    $key_val      = ucwords( $key_val );
                                    $arr_str_data =  implode(', ',$data);
                                    $arr_str_data =  esc_html( $arr_str_data );
                                    echo '<h4><b>'.esc_html( $key_val ).':</b> '. nl2br(esc_html($arr_str_data)) .'</h4>';

                                }else{

                                    $key_val = str_replace('your-', '', $key);
                                    $key_val = str_replace( array('-','_'), ' ', $key_val);

                                    $key_val = ucwords( $key_val );
                                    $data    = esc_html( $data );
                                    echo '<h4><b>'.esc_html( $key_val ).':</b> '.nl2br(esc_html($data)).'</h4>';
                                }
                            }

                        endforeach;

                        $form_data['wp_cf7db_status'] = 'read';
                        $form_data = serialize( $form_data );
                        $id = $results[0]->id;

                        $wp_cf7db->query( "UPDATE $table_name SET form_value = '$form_data' WHERE id = '$id' LIMIT 1" );
                        ?>
            </div>
        </div>
    </div>
</div>
<?php
        do_action('wp_cf7db_after_formdetails', $this->form_id );
    }

}