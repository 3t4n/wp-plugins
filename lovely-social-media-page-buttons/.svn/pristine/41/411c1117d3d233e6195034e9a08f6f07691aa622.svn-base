<?php
class lovely_social_page_buttons_options {

    //Holds the values to be used in the fields callbacks
    private $options;

    public function __construct(){

        add_action("admin_menu", array($this,"add_to_setting_menu"));
        add_action("admin_init", array($this,"page_init"));
    }

    public function add_to_setting_menu (){

        add_options_page( "Lovely Social Media Page Buttons", //page_title
                         "Lovely Social Media Page Buttons", //menu_title
                         "administrator", //capability
                         "lovely-social-page-buttons-settings", //menu_slug
                         array($this, "create_admin_page")); //callback function

    }

    public function create_admin_page (){

        $this->options = get_option ( 'lovely_social_page_buttons_settings' );

        ?>
            <div class="wrap">

                <div id="poststuff">
                    <div id="post-body" class="metabox-holder columns-2">


                        <div id="post-body-content">
                            <div class="meta-box-sortables ui-sortable">
                                <div class="postbox">
                                    <h3><span class="dashicons dashicons-admin-generic"></span>Lovely Social Media Page Buttons Settings</h3>
                                    <div class="inside">
                                        <form method="post" action="options.php">
                                            <?php
                                            // This prints out all hidden setting fields
                                            settings_fields( 'lovely_social_page_buttons_settings_group' ); //option group
                                            do_settings_sections( 'lovely-social-page-buttons-settings' ); //settings page slug
                                            submit_button(); ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!--post-body-content-->


                        <!-- sidebar -->
                        <div id="postbox-container-1" class="postbox-container">
                            <div class="meta-box-sortables">
                                <div class="postbox">
                                    <h3><span>About</span></h3>
                                    <div class="inside">
                                        Author: Shrinivas Naik <br>
                                        Plugin Homepage: <a href="http://www.techsini.com" target="_blank">Techsini.com</a> <br>
                                        Thank you for installing this plugin.
                                    </div> <!-- .inside -->
                                </div> <!-- .postbox -->

                            </div> <!-- .meta-box-sortables -->
                        </div> <!-- #postbox-container-1 .postbox-container -->


                    </div>
                </div>
            </div>
        <?php

    }

    public function page_init(){

        register_setting(
        'lovely_social_page_buttons_settings_group', // Option group
        'lovely_social_page_buttons_settings' // Option name
        );

        add_settings_section(
            'section1', // ID
            '', // Title
            array( $this, 'section_1_callback' ), // Callback
            'lovely-social-page-buttons-settings' // Page
        );

        /*add_settings_field(
            'general_settings', // ID
            '<span class="dashicons dashicons-welcome-write-blog"></span> General Settings', // Title
            array( $this, 'general_settings_callback' ), // Callback
            'lovely-social-page-buttons-settings', // Page
            'section1' // Section
        );*/

        add_settings_field(
            'socialmedia_settings', // ID
            '<span class="dashicons dashicons-share"></span>Add Social Page Links', // Title
            array( $this, 'socialmedia_settings_callback' ), // Callback
            'lovely-social-page-buttons-settings', // Page
            'section1' // Section
        );

        add_settings_field(
            'facebook_link', // ID
            'Facebook Page Link', // Title
            array( $this, 'facebook_link_callback' ), // Callback
            'lovely-social-page-buttons-settings', // Page
            'section1' // Section
        );

        add_settings_field(
            'googleplus_link', // ID
            'Google+ Page Link', // Title
            array( $this, 'googleplus_link_callback' ), // Callback
            'lovely-social-page-buttons-settings', // Page
            'section1' // Section
        );

        add_settings_field(
            'twitter_link', // ID
            'Twitter Page Link', // Title
            array( $this, 'twitter_link_callback' ), // Callback
            'lovely-social-page-buttons-settings', // Page
            'section1' // Section
        );

        add_settings_field(
            'youtube_link', // ID
            'YouTube Page Link', // Title
            array( $this, 'youtube_link_callback' ), // Callback
            'lovely-social-page-buttons-settings', // Page
            'section1' // Section
        );

        add_settings_field(
            'linkedin_link', // ID
            'LinkedIn Page Link', // Title
            array( $this, 'linkedin_link_callback' ), // Callback
            'lovely-social-page-buttons-settings', // Page
            'section1' // Section
        );

        add_settings_field(
            'pinterest_link', // ID
            'Pinterest Page Link', // Title
            array( $this, 'pinterest_link_callback' ), // Callback
            'lovely-social-page-buttons-settings', // Page
            'section1' // Section
        );

        add_settings_field(
            'credittoauthor', // ID
            'Wanna Give Credit to Author?', // Title
            array( $this, 'credittoauthor_callback' ), // Callback
            'lovely-social-page-buttons-settings', // Page
            'section1' // Section
        );

    }

    public function section_1_callback(){

    }

    public function general_settings_callback(){

    }


    public function socialmedia_settings_callback(){

    }

    public function googleplus_link_callback(){
        printf('<input type="text" class="regular-text" id="googleplus_link" name="lovely_social_page_buttons_settings[googleplus_link]" placeholder="" value="%s" />',  isset( $this->options['googleplus_link'] ) ? esc_attr( $this->options['googleplus_link']) : '');
    }

    public function facebook_link_callback(){
        printf('<input type="text" class="regular-text" id="facebook_link" name="lovely_social_page_buttons_settings[facebook_link]" value="%s" />',  isset( $this->options['facebook_link'] ) ? esc_attr( $this->options['facebook_link']) : '');
    }

    public function twitter_link_callback(){
        printf('<input type="text" class="regular-text" id="twitter_link" name="lovely_social_page_buttons_settings[twitter_link]" value="%s" />',  isset( $this->options['twitter_link'] ) ? esc_attr( $this->options['twitter_link']) : '');
    }

    public function youtube_link_callback(){
        printf('<input type="text" class="regular-text" id="youtube_link" name="lovely_social_page_buttons_settings[youtube_link]" value="%s" />',  isset( $this->options['youtube_link'] ) ? esc_attr( $this->options['youtube_link']) : '');
    }

    public function linkedin_link_callback(){
        printf('<input type="text" class="regular-text" id="linkedin_link" name="lovely_social_page_buttons_settings[linkedin_link]" value="%s" />',  isset( $this->options['linkedin_link'] ) ? esc_attr( $this->options['linkedin_link']) : '');
    }

    public function pinterest_link_callback(){
        printf('<input type="text" class="regular-text" id="pinterest_link" name="lovely_social_page_buttons_settings[pinterest_link]" value="%s" />',  isset( $this->options['pinterest_link'] ) ? esc_attr( $this->options['pinterest_link']) : '');
    }



    public function credittoauthor_callback(){

        if (!isset($this->options['credittoauthor']))
        {
            $this->options['credittoauthor'] = 0;
        }

        echo ('<input type = "checkbox"
                            id = "credittoauthor"
                            name= "lovely_social_page_buttons_settings[credittoauthor]"
                            value = "1"' . checked(1, $this->options['credittoauthor'], false) . '/>' );
    }

}

?>
