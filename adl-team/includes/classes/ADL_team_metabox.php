<?php

if ( !class_exists('ADL_team_metabox') ):
class ADL_team_metabox {

    /**
     * Arguments for displaying wp_editor for full biography
     * @var array
     */
    private $e_settings_full = array(
        'media_buttons' => true,
        'textarea_rows' => 12,
    );
    /**
     * Arguments for displaying wp_editor for short biography
     * @var array
     */
    private $e_settings_short = array(
        'media_buttons' => false,
        'textarea_rows' => 5,
    );

    /**
     * Add meta boxes for ADL_TEAM_POST_TYPE and ADL_TEAM_SHORT_CODE_POST_TYPE
     * and Save the meta data
     */
    public function __construct() {
        if ( is_admin() ) {
            add_action('add_meta_boxes_'.ADL_TEAM_POST_TYPE,	array($this, 'render_team_metabox'));
            add_action('add_meta_boxes_'.ADL_TEAM_SHORT_CODE_POST_TYPE,	array($this, 'render_shortcode_metabox'));

            // edit_post hooks is better than save_post hook for nice checkbox
            // http://wordpress.stackexchange.com/questions/228322/how-to-set-default-value-for-checkbox-in-wordpress
            add_action( 'edit_post', array($this, 'save_post_meta'), 10, 2);
        }

     }

    /**
     * Render Metaboxes for ADL_TEAM_POST_TYPE
     * @param Object $post Current Post Object being displayed
     */
    public function render_team_metabox( $post ) {
        global $pagenow, $typenow, $ADL_team;

        add_meta_box( '_adl_team_general_info',
        __( 'Member General Information', ADL_TEAM_TEXTDOMAIN ),
        array($this, 'member_general_info'),
        ADL_TEAM_POST_TYPE,
        'normal' );

        add_meta_box( '_adl_team_contact_info',
        __( 'Member Contact Information', ADL_TEAM_TEXTDOMAIN ),
        array($this, 'member_contact_info'),
        ADL_TEAM_POST_TYPE,
        'normal' );

        add_meta_box( '_adl_team_social_info',
            __( 'Member Social Information', ADL_TEAM_TEXTDOMAIN ),
            array($this, 'member_social_info'),
            ADL_TEAM_POST_TYPE,
            'normal' );


        add_meta_box( '_adl_team_skill_info',
            __( 'Member Skill Information', ADL_TEAM_TEXTDOMAIN ),
            array($this, 'member_skill_info'),
            ADL_TEAM_POST_TYPE,
            'normal' );
        add_meta_box( '_adl_team_color_info',
            __( 'Member Color Settings', ADL_TEAM_TEXTDOMAIN ),
            array($this, 'member_color_info'),
            ADL_TEAM_POST_TYPE,
            'normal' );
    }

    /**
     * Render Metaboxes for ADL_TEAM__SHORTCODE_POST_TYPE
     * @param Object $post Current Post Object being displayed
     */
    public function render_shortcode_metabox( $post ) {
        add_meta_box( '_adl_shortcode_general_setting',
            __( 'Team Shortcode Setting', ADL_TEAM_TEXTDOMAIN ),
            array($this, 'shortcode_setting'),
            ADL_TEAM_SHORT_CODE_POST_TYPE,
            'normal' );


    }

    /**
     * @param $post
     * @param $args
     */
    public function member_general_info( $post, $args) {
        global $ADL_team;
        wp_nonce_field( $ADL_team->nonceAction(), $ADL_team->nonceName());
        $g_info = get_post_meta( $post->ID, 'general' , true); // return serialized and encoded string of array value
        $fullbio = get_post_meta( $post->ID, 'memberfullbio' , true); // return single value
        $shortbio = get_post_meta( $post->ID, 'membershortbio' , true); // single value

        $general_info = (!empty($g_info) ? unserialize( base64_decode( $g_info )) : array());
        $img_info = wp_get_attachment_image_src( intval(@$general_info['_member_image_id']) , array(200, 150) );
        $general_info['member_img_src'] = $img_info[0];
        $general_info['memberfullbio'] = (!empty($fullbio)) ? $fullbio : '';
        $general_info['membershortbio'] = (!empty($shortbio)) ? $shortbio : '';
        $general_info['e_settings_full'] = $this->e_settings_full;
        $general_info['e_settings_short'] = $this->e_settings_short;
        $ADL_team->loadView('meta-team/general', array( 'general_info'  => $general_info, ));
    }

    /**
     * @param $post
     * @param $args
     */
    public function member_contact_info( $post, $args ) {
        global $ADL_team;
        wp_nonce_field( $ADL_team->nonceAction(), $ADL_team->nonceName());
        $contact_info = ( get_post_meta( $post->ID, 'contact' , true) ) ? unserialize(base64_decode(get_post_meta( $post->ID, 'contact' , true) )) : array();
        $ADL_team->loadView('meta-team/contact', array( 'contact_info' => $contact_info, ));
    }

    /**
     * @param $post
     * @param $args
     */
    public function member_social_info( $post, $args ) {
        global $ADL_team;
        wp_nonce_field( $ADL_team->nonceAction(), $ADL_team->nonceName());
        $social_info = ( get_post_meta( $post->ID, 'social' , true) ? unserialize(base64_decode(get_post_meta( $post->ID, 'social' , true) )) : array());
        $ADL_team->loadView('meta-team/social', array( 'social_info' => $social_info, ));

    }

    /**
     * @param $post
     * @param $args
     */
    public function member_skill_info( $post, $args ) {
        global $ADL_team;
        wp_nonce_field( $ADL_team->nonceAction(), $ADL_team->nonceName());
        $skill_info = ( get_post_meta( $post->ID, 'skill' , true) ? unserialize(base64_decode(get_post_meta( $post->ID, 'skill' , true) )) : array());
        $ADL_team->loadView('meta-team/skill', array( 'skill_info' => $skill_info, ));

    }

    /**
     * It display all color meta information of a member
     * @param object $post The current post object, in this case, Current Member Object
     * @param mixed $args
     */
    public function member_color_info( $post, $args ) {
        global $ADL_team;
        wp_nonce_field( $ADL_team->nonceAction(), $ADL_team->nonceName());
        $color_info = ( get_post_meta( $post->ID, 'color_info' , true) ? unserialize(base64_decode(get_post_meta( $post->ID, 'color_info' , true) )) : array());
        $ADL_team->loadView('meta-team/color', array( 'color_info' => $color_info, ));

    }

    public function shortcode_setting( $post, $args ) {
        global $ADL_team;
        wp_nonce_field( $ADL_team->nonceAction(), $ADL_team->nonceName());
        $gs = get_post_meta( $post->ID, 'gs' , true);
        $gs = ( !empty($gs) ) ? unserialize( base64_decode( $gs) ) : array();
        $ADL_team->loadView('meta-shortcode/setting', array( 'general_setting' => $gs, ));
    }


    public function upgrade_notice( $post, $args ) {
        global $ADL_team;
        //$ADL_team->loadView('upgrade-notice');
    }


/*
|
|   S
-------
|
|   A
----------
|
|   V
-------------
|
|   I
----------------
|
|   N
-------------------
|
|   G
----------------------*/

    /**
     * Save Meta Data of ADL_TEAM_POST_TYPE
     * @param int       $post_id    Post ID of the current post being saved
     * @param object    $post       Current post object being saved
     */
    public function save_post_meta( $post_id, $post ) {
        if ( ! $this->passSecurity($post_id, $post) ) return;

        /*
         * Validate && Sanitize the Meta data of
         * -------------------------------
         * adl-team post type
         * ------------------
         */

        $memberfullbio = (!empty($_POST['memberfullbio']))? wp_filter_post_kses(stripcslashes($_POST['memberfullbio'])) : null;
        $membershortbio = (!empty($_POST['membershortbio']))? wp_filter_post_kses(stripcslashes($_POST['membershortbio'])) : null;
        $general = (!empty($_POST['general']))? base64_encode(serialize($_POST['general'])) : array();
        $contact = (!empty($_POST['contact']))? base64_encode(serialize($_POST['contact'])) : array();
        $social = (!empty($_POST['social']))? base64_encode(serialize($_POST['social'])) : array();
        $skill = (!empty($_POST['skill']))? base64_encode(serialize($_POST['skill'])) : array();
        $color_info = (!empty($_POST['color_info']))? base64_encode(serialize($_POST['color_info'])) : array();


        /*
         * Validate && Sanitize the Meta data of
         * -------------------------------
         * adl-team-shortcode post type
         * ------------------
         */
        // set default values for checkboxes
        $gs = $_POST['gs'];
        $gs['show_member_detail'] = !empty($gs['show_member_detail']) ? sanitize_text_field($gs['show_member_detail']) : 'no';
        $gs['popup_show'] = !empty($gs['popup_show']) ? sanitize_text_field($gs['popup_show']) : 'no';
        $gs['crop_image'] = !empty($gs['crop_image']) ? sanitize_text_field($gs['crop_image']) : 'no';
        $gs['image_upscale'] = !empty($gs['image_upscale']) ? sanitize_text_field($gs['image_upscale']) : 'no';



        // serialize the data to be saved in the db safely
        $general_setting = (!empty($gs)) ? base64_encode(serialize($gs)) : array();





        /*
         * Save || update the Meta data of
         * -------------------------------
         * adl-team post type
         * ------------------
         */

        //Single Value
        update_post_meta($post_id, 'memberfullbio', $memberfullbio);
        update_post_meta($post_id, 'membershortbio', $membershortbio);

        //array values
        update_post_meta($post_id, 'general', $general);
        update_post_meta($post_id, 'contact', $contact);
        update_post_meta($post_id, 'social', $social);
        update_post_meta($post_id, 'skill', $skill);
        update_post_meta($post_id, 'color_info', $color_info);



        /*
         * Save || update the Meta data of
         * -------------------------------
         * adl-team-shortcode post type
         * ------------------
         */

        // Array values
        update_post_meta($post_id, 'gs', $general_setting);

    }


    /**
     * Check if the the nonce, revision, auto_save are valid/true and the post type is ADL_TEAM_POST_TYPE
     * @param int       $post_id    Post ID of the current post being saved
     * @param object    $post       Current post object being saved
     *
     * @return bool            Return true if all the above check passes the test.
     */
    private function passSecurity( $post_id, $post ) {
        global $ADL_team;
        if ( ADL_TEAM_POST_TYPE == $post->post_type || ADL_TEAM_SHORT_CODE_POST_TYPE == $post->post_type) {
        $is_autosave = wp_is_post_autosave($post_id);
        $is_revision = wp_is_post_revision($post_id);
        $is_valid_nonce = $ADL_team->verifyNonce();

        if ( $is_autosave || $is_revision || !$is_valid_nonce || ( !current_user_can( 'edit_post', $post_id )) ) return false;
        return true;
        }
        return false;
    }


}

endif;