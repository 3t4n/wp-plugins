<?php
    /*---------------------------------------------------------------------*/
    /* SETTINGS                                                            */
    /*---------------------------------------------------------------------*/


    function GREATAT_ABSC_settings_page()
    {
        add_menu_page(
        //'options-general.php', // top level menu page
            'GreatAt Booking', // title of the settings page
            'GreatAt Booking', // title of the submenu
            'manage_options', // capability of the user to see this page
            'greatat-settings-page', // slug of the settings page
            'GREATAT_ABSC_settings_page_html', // callback function to be called when rendering the page
            'dashicons-star-empty'
        );
        add_action('admin_init', 'GREATAT_ABSC_settings_init');
    }
    add_action('admin_menu', 'GREATAT_ABSC_settings_page');


    function GREATAT_ABSC_settings_init()
    {
        add_settings_section(
            'greatat-settings-section', // id of the section
            '3. Input your GreatAt Username in the field below', // title to be displayed
            '', // callback function to be called when opening section
            'greatat-settings-page' // page on which to display the section, this should be the same as the slug used in add_submenu_page()
        );
        // register the setting
        register_setting(
            'greatat-settings-page', // option group
            'greatat_username'
        );
        add_settings_field(
            'greatat_username', // id of the settings field
            'GreatAt Username', // title
            'GREATAT_ABSC_settings_cb', // callback function
            'greatat-settings-page', // page on which settings display
            'greatat-settings-section'
        );
    }

    function GREATAT_ABSC_settings_cb()
    {
        $username = esc_attr(get_option('greatat_username', ''));
        ?>
        <div id="titlediv">
            <input id="title" type="text" name="greatat_username" value="<?php echo $username; ?>">
        </div>
        <?php
    }
    function GREATAT_ABSC_settings_page_html()
    {
        // check user capabilities
        if (!current_user_can('manage_options')) {
            return;
        }

        wp_enqueue_style('absc-style-admin', GREATAT_ABSC_PLUGIN_URL.'css/absc_admin.css', array(), GREATAT_ABSC_CSS_VER);

        ?>
        <section class="wrap">
            <form action="options.php" method="post">
                <div id="ga-cms-settings__wrapper">

                    <h1>Create and Post Offers with <img class="ga-logo-img" src="https://<?php echo GREATAT_ABSC_DOMAIN; ?>.greatat.com/mvc/css/images/greatat-logo-smr2.png"></h1>

                    <div class="step-1">
                        <h2>1. Create your free GreatAt Profile</h2>
                        <a href="https://<?php echo GREATAT_ABSC_DOMAIN; ?>.greatat.com/seller-signup/choice?mc=wpw_settings_create" class="button" target="_blank">Create Your Profile</a>
                        <hr>
                    </div>


                    <div class="step-2">
                        <h2>2. Create some Offers to sell</h2>
                        <a href="https://<?php echo GREATAT_ABSC_DOMAIN; ?>.greatat.com/offers/create?mc=wpw_settings_offer" class="button" target="_blank">Create an Offer</a>
                        <hr>
                    </div>

                    <div class="step-3">
                        <?php settings_fields('greatat-settings-page');?>
                        <div class="username-wrap">
                            <?php do_settings_sections('greatat-settings-page'); ?>
                            <?php submit_button();?>
                        </div>
                        <hr>
                    </div>

                    <div class="step-4">
                        <h2>4. Copy & Paste the GreatAt widget Shortcode onto your Wordpress page:</h2>
                        <input type="text" value="[greatat_booking]" readonly="readonly" style="text-align: center;" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac).">
                        <hr>
                    </div>

                    <div class="step-5">
                        <h2>Congrats, you're in business!<br/><br/>
                            Customers can now purchase your Offers through the GreatAt widget on your website!</h2>
                    </div>

                </div><!-- #ga-cms-settings__wrapper -->
            </form>
        </section>
        <?php
    }