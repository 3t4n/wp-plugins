<?php

namespace imbaa\AffilipusLinkfilter\Routines;


class cron {



    function __construct(){

        register_deactivation_hook(AFFILIPUS_LINKFILTER_DIR.'affilipus.php', array($this,'deactivate_crons'));
        register_activation_hook(AFFILIPUS_LINKFILTER_DIR.'affilipus.php', array($this,'activate_crons'));

        $this -> activate_crons();

        add_action('imbaf_filter_hourly', array($this,'garbage_collection'));
        add_action('imbaf_filter_hourly', array($this,'refetch_links'));


    }

    function activate_crons() {

        if (!wp_next_scheduled ( 'imbaf_filter_hourly' )) {

            wp_schedule_event( time(), 'hourly', 'imbaf_filter_hourly' );

        }

    }


    function deactivate_crons(){

        wp_clear_scheduled_hook('imbaf_filter_hourly');

    }

    function refetch_links(){


        global $wpdb;

        $data = $wpdb -> get_results("SELECT * FROM {$wpdb->posts} WHERE post_type != 'revision' AND post_content != '';");

        if(count($data) > 0){
            foreach($data as $post){

                apply_filters('the_content',$post -> post_content);
            }
        }

    }

    function garbage_collection() {

        global $wpdb;
        $wpdb -> query("DELETE FROM {$wpdb->prefix}affilipus_linkfilter WHERE TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP,last_check))/60/60 > 24;");

    }


}