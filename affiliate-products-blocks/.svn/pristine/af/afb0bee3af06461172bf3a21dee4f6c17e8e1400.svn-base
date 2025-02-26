<?php
/**
 * Admin Support Page
*/

class AFPB_Admin_Page {
    /**
     * Contructor
    */
    public function __construct(){
        add_action( 'admin_menu', [ $this, 'afpb_plugin_admin_page' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'afpb_admin_page_assets' ] );
    }

    // Admin Assets
    public function afpb_admin_page_assets($screen) {
        if( 'toplevel_page_afpb-blocks' == $screen ) {
            wp_enqueue_style( 'admin-asset', plugins_url('assets/css/admin.css', __FILE__ ) );
        }
    }

    // Admin Page
    public function afpb_plugin_admin_page(){
        add_menu_page( __('Affiliaterg Blocks','affiliaterg'), __('Affiliaterg Blocks','affiliaterg'), 'manage_options', 'afpb-blocks', [ $this, 'afpb_admin_page_content_callback'], 'dashicons-screenoptions', 3 );
        // add_submenu_page( 'tools.php', __('Affiliate Block','affiliaterg'), __('Affiliate Block','affiliaterg'), 'manage_options', 'afpb-block', [ $this, 'afpb_admin_page_content_callback' ] );
    }
    public function afpb_admin_page_content_callback(){
        ?>
            <div class="admin_page_container">
                <div class="plugin_head">
                    <div class="head_container">
                        <h1 class="plugin_title"><?php echo esc_html__('Affiliaterg Blocks','affiliaterg'); ?></h1>
                        <h4 class="plugin_subtitle"><?php echo esc_html__('A Collection of Custom Gutenberg Block to showcase your affiliate products in different styles','affiliaterg'); ?></h4>
                        <div class="support_btn">
                            <a href="https://demos.makegutenblock.com" target="_blank" style="background: #D37F00"><?php echo esc_html__('See Demos','affiliaterg'); ?></a>
                            <a href="https://wordpress.org/plugins/affiliatergs/#reviews" target="_blank" style="background: #0174A2"><?php echo esc_html__('Rate Plugin','affiliaterg'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="plugin_body">
                    <div class="doc_video_area">
                        <div class="doc_video">
                        <iframe width="100%" height="350" src="https://www.youtube.com/embed/XXn5vSM_yzI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="support_area">
                        <div class="custom_single_support">
                            <a href="https://makegutenblock.com/contact" target="_blank" style="background: #002B42"><?php echo esc_html__('Contact for Custom Design','affiliaterg'); ?></a>
                        </div>
                        <div class="single_support">
                            <h4 class="support_title"><?php echo esc_html__('Freelance Project','affiliaterg'); ?></h4>
                            <div class="support_btn">
                                <a href="https://www.fiverr.com/users/devs_zak/" target="_blank" style="background: #1DBF73"><?php echo esc_html__('@Fiverr','affiliaterg'); ?></a>
                                <a href="https://www.upwork.com/freelancers/~010af183b3205dc627" target="_blank" style="background: #14A800"><?php echo esc_html__('@UpWork','affiliaterg'); ?></a>
                            </div>
                        </div>
                        <div class="single_support">
                            <h4 class="support_title"><?php echo esc_html__('Get Support','affiliaterg'); ?></h4>
                            <div class="support_btn">
                                <a href="https://makegutenblock.com/contact" target="_blank" style="background: #002B42"><?php echo esc_html__('Contact','affiliaterg'); ?></a>
                                <a href="mailto:zbinsaifullah@gmail.com" style="background: #EA4335"><?php echo esc_html__('Send Mail','affiliaterg'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
 new AFPB_Admin_Page();
