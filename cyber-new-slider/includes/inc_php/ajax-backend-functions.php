<?php 

/**
 *
 * CyberSlider ajax backend functions
 *
 */


// Check if its admin

if(is_admin()):



    /**
     *
     * SAVE GLOBAL SETTINGS
     *
     */

    add_action( 'wp_ajax_save_global_settings', 'save_global_settings' );
    add_action( 'wp_ajax_nopriv_save_global_settings', 'save_global_settings' );

    function save_global_settings(){

        $global_settings = $_POST['stringdata'];

        parse_str($global_settings, $global_settings_array);

        $serialized_data = serialize($global_settings_array);


        if(update_option('cs_global_settings',$serialized_data)){
            echo "Settings Saved";
        }else{
            echo "There is a problem.";
        }

        die(0);
    }


     /*======= END OF SAVE GLOBAL SYSTEM ======*/




    /**
     *
     * SAVE SINGLE SLIDER SETTINGS
     *
     */


    add_action( 'wp_ajax_save_slider_settings', 'save_slider_settings' );
    add_action( 'wp_ajax_nopriv_save_slider_settings', 'save_slider_settings' );


    function save_slider_settings() {
         global $wpdb; // this is how you get access to the database

         // GETTINGS SERILIZED DATA FROM FORM
         $optiondata = $_POST['stringdata'];
         $slider_id = $_POST['sliderID'];

         // MAKE ARRAY FROM JQUERY SERIALIZED DATA
         parse_str($optiondata, $optiondata_array);

         // NOW SERIALIZING THE DATA
         $serialized_data = serialize($optiondata_array);


         $table_name = $wpdb->prefix.'cyberslider';

            $update_settings =  $wpdb->update( 
                $table_name, 
                    array( 
                         'settings' => $serialized_data, // string
                    ), 
                    array( 'ID' => $slider_id ), 
                    array( 
                         '%s',   // value1
                         ), 
                        array( '%d' ) 
                        );

                if($update_settings){

                    return true;

                }else{

                    return false;
                 }

    }


      /*======= END OF SAVE SINGLE SLIDER SETTINGS ======*/



    /**
     *
     * DELETE SLIDER WITH SLIDES
     *
     */

    add_action( 'wp_ajax_delete_slider_and_slide', 'delete_slider_and_slides' );
    add_action( 'wp_ajax_nopriv_delete_slider_and_slide', 'delete_slider_and_slides' );

    function delete_slider_and_slides(){
        global $wpdb; // Get access of database 
        $sliderid = $_POST['sliderid'];
        $table = $wpdb->prefix.'cyberslider';
        $table2 = $wpdb->prefix.'cyberslider_slides';
        $where = array('id' => $sliderid, );
        $whereslides = array('slider_id' => $sliderid, );
        $deleted = $wpdb->delete( $table, $where);
        $slides = $wpdb->delete( $table2, $whereslides);
        if ($deleted){
            echo "Successfully Deleted";     
        }else{
            echo "There is a problem.";
        }
        die(0);
    }


     /*======= END OF DELETE SLIDER WITH SLIDES ======*/



    /**
     *
     * DELETE SINGLE SLIDE
     *
     */

    add_action('wp_ajax_delete_slide', 'delete_slide');
    add_action('wp_ajax_nopriv_delete_slide','delete_slide');

    function delete_slide(){
        global $wpdb; // Get access of database 
        $slideid = $_POST['slideid'];
        $table = $wpdb->prefix.'cyberslider_slides';
        $where = array('id' => $slideid, );
        $slides = $wpdb->delete( $table, $where);
        if ($slides){
            echo "Successfully Deleted";     
        }else{
            echo "There is a problem.";
        }
        die(0);
    }

         /*======= END OF DELETE SINGLE SLIDE ======*/



    /**
     *
     * SAVE SINGLE SLIDE SETTINGS
     *
     */

    add_action( 'wp_ajax_single_slide', 'single_slide_callback' );
    add_action( 'wp_ajax_nopriv_single_slide', 'single_slide_callback' );

    function single_slide_callback(){
        global $wpdb;

        //GETTING THE JQUERY SERIALIZED FORM DATA
        $cssingleslide = $_POST['stringdata'];

        //STATUS STORES THE THE SLIDE CHECK. IF ITS 1, IT MEANS THE SLIDER ID EXIST IN DB.
        $status = $_POST['status'];

        // THIS IS A SINGLE SLIDE ID
        $slideid = $_POST['slideid'];

        // PARSING THE JQUERY SERIALIZED STRING TO ARRAY
        parse_str( $cssingleslide, $newstring);

        // NOW SERIALIZING THE ARRAY
        $serialized_data = serialize($newstring);

            $data = array(
                        'slider_id' => $slideid,
                        'title' => $newstring['slide-title'], 
                        'settings' => $serialized_data
                        );

            if ( $status > 0 )
                {
                    // IF STATUS IS GREATER THAT 0 . MEANS ITS ONE, UPDATE THE SLIDE
                    $where = array( 'slider_id' => $slideid, 'id' => $status);
                    $wpdb->update($wpdb->prefix.'cyberslider_slides', $data, $where);
                }else{
                    
                    // MEANS THE SLIDE IS NOT EXIST, HENSE INSERT IT
                    $wpdb->insert( $wpdb->prefix.'cyberslider_slides', $data);
                }
   
       	}


        /*======= END OF DELETE SINGLE SLIDE ======*/


    /**
     *
     * IMPORT SLIDER SETTINGS
     *
     */

    add_action( 'wp_ajax_import_slider_settings', 'import_slider_settings' );
    add_action( 'wp_ajax_nopriv_import_slider_settings', 'import_slider_settings' );

    function import_slider_settings(){
        global $wpdb;

        $slider_id = $_POST['sliderID'];

        if (get_magic_quotes_gpc()){
             $settingsText = stripslashes($_POST["settingsText"]);
         }else{
             $settingsText = stripslashes($_POST["settingsText"]);
         }

        $data = array(
            'settings' => $settingsText
            );

         $where = array( 'id' => $slider_id);
         $wpdb->update($wpdb->prefix.'cyberslider', $data, $where);
    }

    
endif;