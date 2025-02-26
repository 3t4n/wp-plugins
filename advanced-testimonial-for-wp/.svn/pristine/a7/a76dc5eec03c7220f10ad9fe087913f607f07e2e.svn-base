<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if(!class_exists('itt_testimonial_setting_page')) {
    class itt_testimonial_setting_page
    {
        /**
         * Start up
         */
        public function __construct()
        {
            add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
            add_action( 'admin_init', array( $this, 'page_init' ) );
        }

        /**
         * Add options page
         */
        public function add_plugin_page()
        {
            // This page will be under "Settings"
            $menu_slug = 'edit.php?post_type=' . ITT_Testimonial_Post;
            $submenu_page_title = 'Setting';
            $submenu_title = 'Setting';
            $capability = 'manage_options';
            $submenu_slug = 'testimonail_setting';
            add_submenu_page( $menu_slug ,$submenu_page_title, $submenu_title, $capability, $submenu_slug, array( $this, 'itt_testimonial_setting_page' ));
        }

        /**
         * Register and add settings
         */
        public function page_init()
        {
            register_setting(
                'itt_testimonial_options_group', // Option group
                'itt_testimonial_name' // Option name
            );
            register_setting(
                'itt_testimonial_options_group', // Option group
                'itt_testimonial_position' // Option name
            );
            register_setting(
                'itt_testimonial_options_group', // Option group
                'itt_testimonial_company' // Option name
            );
            register_setting(
                'itt_testimonial_options_group', // Option group
                'itt_testimonial_company_website' // Option name
            );
            register_setting(
                'itt_testimonial_options_group', // Option group
                'itt_testimonial_email' // Option name
            );
            register_setting(
                'itt_testimonial_options_group', // Option group
                'itt_testimonial_rating' // Option name
            );
            register_setting(
                'itt_testimonial_options_group', // Option group
                'itt_testimonial_testimonial' // Option name
            );
            register_setting(
                'itt_testimonial_options_group', // Option group
                'itt_testimonial_image' // Option name
            );
            register_setting(
                'itt_testimonial_options_group', // Option group
                'itt_testimonial_custom_class' // Option name
            );
        }

        /**
         * Options page callback
         */
        public function itt_testimonial_setting_page()
        {
            // create shortcode
            $shortcode = '[itt_testimonial_form ';
            $shortcode .= get_option('itt_testimonial_name')?'':'name="false" ';
            $shortcode .= get_option('itt_testimonial_position')?'':'position="false" ';
            $shortcode .= get_option('itt_testimonial_company')?'':'company="false" ';
            $shortcode .= get_option('itt_testimonial_company_website')?'':'company_website="false" ';
            $shortcode .= get_option('itt_testimonial_email')?'':'email="false" ';
            $shortcode .= get_option('itt_testimonial_rating')?'':'rating="false" ';
            $shortcode .= get_option('itt_testimonial_testimonial')?'':'testimonial="false" ';
            $shortcode .= get_option('itt_testimonial_image')?'':'image="false" ';
            $shortcode .= get_option('itt_testimonial_custom_class')==''?'':'custom_class="'.get_option('itt_testimonial_custom_class').'" ';
            $shortcode .= ']';
            ?>
            <div class="wrap">
                <h2>Testimonial Settings</h2>

                <form method="post" action="options.php" >
                    <?php
                    // This prints out all hidden setting fields
                    settings_fields( 'itt_testimonial_options_group' );
                    do_settings_sections( 'itt_testimonial_options_group' );
                    ?>
                    <div style="width: 45%;float: left;padding:10px; background-color:#fff;border-left:4px solid #7ad03a;-webkit-box-shadow:0 1px 1px 0 rgba(0,0,0,.1);box-shadow:0 1px 1px 0 rgba(0,0,0,.1); display:block;">
                        <table class="form-table" style="float: left;display: block;">
                            <tbody>
                            <tr>
                                <td scope="row" colspan="2" >
                                	<h1 class="it-alert">
                                    	This Options are available on Pro Version!!
                                    	<a href="http://ithemelandco.com/Plugins/Testimonial" target="_blank">Pro Version</a>
                                    </h1>
                                    <h4>Submission Form Setting</h4>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Show Name Field' ,ITT_TESTIMONIAL_TEXTDOMAIN); ?></th>
                                <td>
                                    <input name="itt_testimonial_name" id="itt_testimonial_name" type="checkbox" value="true" <?php if ( get_option('itt_testimonial_name') ) echo 'checked="checked"'; ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Show Position Field' ,ITT_TESTIMONIAL_TEXTDOMAIN); ?></th>
                                <td>
                                    <input name="itt_testimonial_position" id="itt_testimonial_position" type="checkbox" value="true" <?php if ( get_option('itt_testimonial_position') ) echo 'checked="checked"'; ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Show Company Field' ,ITT_TESTIMONIAL_TEXTDOMAIN); ?></th>
                                <td>
                                    <input name="itt_testimonial_company" id="itt_testimonial_company" type="checkbox" value="true" <?php if ( get_option('itt_testimonial_company') ) echo 'checked="checked"'; ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Show Company Website Field' ,ITT_TESTIMONIAL_TEXTDOMAIN); ?></th>
                                <td>
                                    <input name="itt_testimonial_company_website" id="itt_testimonial_company_website" type="checkbox" value="true" <?php if ( get_option('itt_testimonial_company_website') ) echo 'checked="checked"'; ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Show Email Field' ,ITT_TESTIMONIAL_TEXTDOMAIN); ?></th>
                                <td>
                                    <input name="itt_testimonial_email" id="itt_testimonial_email" type="checkbox" value="true" <?php if ( get_option('itt_testimonial_email') ) echo 'checked="checked"'; ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Show Rating Field' ,ITT_TESTIMONIAL_TEXTDOMAIN); ?></th>
                                <td>
                                    <input name="itt_testimonial_rating" id="itt_testimonial_rating" type="checkbox" value="true" <?php if ( get_option('itt_testimonial_rating') ) echo 'checked="checked"'; ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Show Testimonial Field' ,ITT_TESTIMONIAL_TEXTDOMAIN); ?></th>
                                <td>
                                    <input name="itt_testimonial_testimonial" id="itt_testimonial_testimonial" type="checkbox" value="true" <?php if ( get_option('itt_testimonial_testimonial') ) echo 'checked="checked"'; ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Show Image Upload Box' ,ITT_TESTIMONIAL_TEXTDOMAIN); ?></th>
                                <td>
                                    <input name="itt_testimonial_image" id="itt_testimonial_image" type="checkbox" value="true" <?php if ( get_option('itt_testimonial_image') ) echo 'checked="checked"'; ?>" >
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Custom Css Class For Submission Form' ,ITT_TESTIMONIAL_TEXTDOMAIN); ?></th>
                                <td>
                                    <input name="itt_testimonial_custom_class" id="itt_testimonial_custom_class" type="text" value="<?= esc_attr(get_option('itt_testimonial_custom_class') ); ?>" >
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="width: 48%;float: right;padding:10px; background-color:#fff;border-left:4px solid #7ad03a;-webkit-box-shadow:0 1px 1px 0 rgba(0,0,0,.1);box-shadow:0 1px 1px 0 rgba(0,0,0,.1); display:block;">
                        <table class="form-table">
                            <tbody>
                            <tr>
                                <th scope="row"><?= __('Submission Form ShortCode' ,ITT_TESTIMONIAL_TEXTDOMAIN); ?></th>
                            </tr>
                            <tr>
                                <td scope="row"><?= __('Use this shortcode to display the list of testimonials in your posts or pages! Just copy this piece of text and place it where you want it to display.' ,ITT_TESTIMONIAL_TEXTDOMAIN); ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea style="width: 100%;min-width: 100%;max-width: 100%;display: block;
                                    min-height: 70px;" id="itt_testimonial_submission_shortcode"><?= $shortcode; ?></textarea>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix">
                     <input type="button" class="btn button-primary" type="submit" value="<?php echo  __('Save Settings' ,ITT_TESTIMONIAL_TEXTDOMAIN); ?>" >
                    </div>
                </form>
            </div>
        <?php
        }
    }

    new itt_testimonial_setting_page;
}