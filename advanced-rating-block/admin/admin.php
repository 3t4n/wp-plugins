<?php
/**
 * Admin Support Page
*/

class ADRB_Admin_Page {
    /**
     * Contructor 
    */
    public function __construct(){
        add_action( 'admin_menu', [ $this, 'adrb_plugin_admin_page' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'adrb_admin_page_assets' ] );
    }

    // Admin Assets
    public function adrb_admin_page_assets($screen) {
        if( 'tools_page_adrb-rating' == $screen ) {
            wp_enqueue_style( 'admin-asset', plugins_url('css/admin-page.css', __FILE__ ) );
        }
    }

    // Admin Page
    public function adrb_plugin_admin_page(){
        add_submenu_page( 'tools.php', __('Rating Block','advanced-rating-block'), __('Rating Block','advanced-rating-block'), 'manage_options', 'adrb-rating', [ $this, 'adrb_admin_page_content_callback' ] );
    }
    public function adrb_admin_page_content_callback(){
        ?>
            <div class="admin_page_container">
                <div class="plugin_head">
                    <div class="head_container">
                        <h1 class="plugin_title"><?php echo esc_html__('Advanced Rating Block','advanced-rating-block'); ?></h1>
                        <h4 class="plugin_subtitle"><?php echo esc_html__('A Custom Gutenberg Block to Create Star or Heart or Circle Rating system in your Gutenberg Editor', 'advanced-rating-block'); ?></h4>
                        <div class="support_btn">
                            <a href="https://makegutenblock.com/contact" target="_blank" style="background: #D37F00"><?php echo esc_html__('Contact Me','advanced-rating-block'); ?></a>
                            <a href="https://wordpress.org/plugins/advanced-rating-block/#reviews" target="_blank" style="background: #0174A2"><?php echo esc_html__('Rate Plugin','advanced-rating-block'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="plugin_body">
                    <div class="doc_video_area">
                        <div class="doc_video">
                            <iframe width="100%" height="350" src="https://www.youtube.com/embed/5rKn2-Bxguc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="support_area">
                        <div class="single_support">
                            <h4 class="support_title"> <?php echo esc_html__('Freelance Work','advanced-rating-block'); ?></h4>
                            <div class="support_btn">
                                <a href="https://www.fiverr.com/users/devs_zak/" target="_blank" style="background: #1DBF73"><?php echo esc_html__('Fiverr','advanced-rating-block'); ?></a>
                                <a href="https://www.upwork.com/freelancers/~010af183b3205dc627" target="_blank" style="background: #14A800"><?php echo esc_html__('UpWork','advanced-rating-block'); ?></a>
                            </div>
                        </div>
                        <div class="single_support">
                            <h4 class="support_title"><?php echo esc_html__('Get Support','advanced-rating-block'); ?></h4>
                            <div class="support_btn">
                                <a href="https://makegutenblock.com/contact" target="_blank" style="background: #002B42"><?php echo esc_html__('Contact','advanced-rating-block'); ?></a>
                                <a href="mailto:zbinsaifullah@gmail.com" style="background: #EA4335">
                                <?php echo esc_html__('Send Mail','advanced-rating-block'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
    }
}
 new ADRB_Admin_Page();