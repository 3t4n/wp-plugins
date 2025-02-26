<?php 
/*
 * Yuma Welcome Page
 */

class ST_Yuma_Welcome_Page {

	public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    }

     /**
     * Add options page
     */
    public function add_plugin_page()
    {
        add_submenu_page(
        	'themes.php',
            esc_html__( 'Yuma Welcome Page', 'yuma-companion' ),
            esc_html__( 'Yuma Theme', 'yuma-companion' ),
            'manage_options', 
            'yuma-welcome', 
            array( $this, 'create_admin_page' )
        );
    }

	/**
     * Options page callback
     */
    public function create_admin_page()
    {
        $theme_data = wp_get_theme(); 
        $theme_name = $theme_data->get('Name');
        ?>

        <div class="yuma-welcome-container">
             <h1 class="welcome-title"><?php printf( '%s ' . esc_html( $theme_name ), esc_html__( 'Welcome To ', 'yuma-companion' ) ); ?></h1>


            <div class="yuma-welcome-accordion">
                <div class="yuma-accordion-header">
                    <ul>
                        <li class="active" data-trigger="welcome"><?php esc_html_e( 'Welcome', 'yuma-companion' ); ?></li>
                        <li data-trigger="getting-started"><?php esc_html_e( 'Getting Started', 'yuma-companion' ); ?></li>
                        <li data-trigger="documentation"><?php esc_html_e( 'Documentation', 'yuma-companion' ); ?></li>
                        <li data-trigger="support"><?php esc_html_e( 'Support', 'yuma-companion' ); ?></li>
                    </ul>
                </div><!-- .yuma-welcome-header -->

                <div class="yuma-accordion-content">
                    <div class="content welcome active">
                        <img src="<?php echo YUMA_COMPANION_URL_PATH . '/assets/images/yuma-logo.png'; ?>">
                        <h2><?php esc_html_e( 'Thank you for choosing Yuma Theme. It is now installed and ready to use. We hope our knowledge base will help you.', 'yuma-companion' ); ?></h2>
                        <h1><?php esc_html_e( 'Explore The Unlimited Possibility', 'yuma-companion' ); ?></h1>
                    </div>

                    <div class="content getting-started">
                        <h1><?php esc_html_e( 'STEP 1 - Theme & Plugins Installation', 'yuma-companion' ); ?></h1>
                        <p><?php esc_html_e( 'Install and activate the theme. As theme is activated, begin installing and activating plugins recommended for the theme.', 'yuma-companion' ); ?></p>
                        <br>

                        <h1><?php esc_html_e( 'STEP 2 - Demo Import', 'yuma-companion' ); ?></h1>
                        <p><?php esc_html_e( 'As you install and activate Yuma Companion and Advanced Import plugins. Go to Appearance -> Demo Import and check out the starter sites. You can find all free and premium demos for Yuma and Yuma Pro theme. As you find a demo you prefer, you can import it in one click. While you import demo, recommeded plugins will be installed to replicate the site as you see in the demo. A fresh WordPress site is recommended to replicate the demo layout on your site. Importing the demo on the running site will create discrepancies with the demo shown.', 'yuma-companion' ); ?></p>
                        <br>

                        <h1><?php esc_html_e( 'STEP 3 - Start Editing', 'yuma-companion' ); ?></h1>
                        <p><?php esc_html_e( 'Yuma Theme Supports Custoimzer API to customize the theme. Header, Footer, Blog Page, Inner Pages and other component\'s stylings are customized from Customizer API. Go to Appearance -> Customize and you will find the options for theme customization.', 'yuma-companion' ); ?></p>
                        <p><?php esc_html_e( 'Yuma Theme Supports Elementor plugin and you can find demos built with it. As you import demo you can just edit the pages as you prefer. You can even start creating site from scratch with Elementor.', 'yuma-companion' ); ?></p>
                        <p><?php esc_html_e( 'Yuma Theme Supports Gutenberg Blocks. You can Import the prebuilt patterns and use blocks to create your site.', 'yuma-companion' ); ?></p>
                        <p><?php esc_html_e( 'Check the', 'yuma-companion' ); ?> <a href="https://yuma.sharkthemes.com/blog/docs/documentation/" target="_blank"><?php esc_html_e( 'Documentation', 'yuma-companion' ); ?></a> <?php esc_html_e( 'to learn more about usability of the theme.', 'yuma-companion' ); ?></p>
                    </div>

                    <div class="content documentation">
                        <p><?php esc_html_e( 'Create a great blog, personal, portfolio, corporate and other multipurpose website with our Yuma WordPress Theme. Please check our full documentation for detailed information on how to Setup and Use Yuma Theme.', 'yuma-companion' ); ?></p>
                        <a href="https://yuma.sharkthemes.com/blog/docs/documentation/" target="_blank" class="button button-primary button-large"><?php esc_html_e( 'Read Documentation', 'yuma-companion' ); ?></a>
                    </div>

                    <div class="content support">
                        <p><?php esc_html_e( 'We are keen to support our users in every possible ways, if you have any issues regarding Yuma Theme
                            . If you are a free or premium theme user of Yuma Theme, you can submit your support tickets from the link below. Please go through our', 'yuma-companion' ); ?> <a href="https://yuma.sharkthemes.com/blog/docs/documentation/" target="_blank"><?php esc_html_e( 'Documentation', 'yuma-companion' ); ?></a> <?php esc_html_e( 'first before submitting a ticket.', 'yuma-companion' ); ?></p>
                        <a href="https://yuma.sharkthemes.com/contact/" target="_blank" class="button button-primary button-large"><?php esc_html_e( 'Get Support', 'yuma-companion' ); ?></a>
                    </div>

                </div><!-- .yuma-welcome-content -->

            </div><!-- .yuma-welcome-accordion -->
        </div><!-- .yuma-welcome-container -->
        
    <?php
    }

}

if ( is_admin() ) {
	new ST_Yuma_Welcome_Page();
}
