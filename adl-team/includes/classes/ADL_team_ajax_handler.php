<?php
if ( ! defined('ABSPATH') ) { die( 'Cheating? Direct access is not allowed. ' ); }

if(!class_exists('ADL_team_ajax_handler')):

    /**
     * Class ADL_team_ajax_handler.
     * It handles all ajax requests made from ADL Team Plugin
     */
    class ADL_team_ajax_handler {

    /**
     * Register two hooks for Two ajax actions.
     * And make response to Two ajax calls from Member Post Screen
     * To Add new Social link and new Skill info.
     */
    public function __construct()
    {
        add_action( 'wp_ajax_social_info_handler', array($this, 'social_info_handler'));
        add_action( 'wp_ajax_skill_info_handler', array($this, 'skill_info_handler'));
    }


    /**
     *  Add new Social Item in the member page in response to Ajax request
     */
    public function social_info_handler() {
            global $ADL_team;
            $id = (!empty($_POST['id'])) ? absint($_POST['id']) : 0;
            $ADL_team->loadView('ajax/social', array( 'id' => $id, ));

            die();

    }


    /**
     *  Add new Skill Item in the member page in response to Ajax request
     */
    public function skill_info_handler() {
        global $ADL_team;
        $id = (!empty($_POST['id'])) ? absint($_POST['id']) : 0;
        $ADL_team->loadView('ajax/skill', array( 'id' => $id, ));

        die();
    }

}


endif;