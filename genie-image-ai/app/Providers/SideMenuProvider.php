<?php

namespace GenieImageAi\App\Providers;

defined( 'ABSPATH' ) || exit;
class SideMenuProvider
{

    public $menu_slug;

    public function __construct()
    {
        $this->initLeftSideMenu();
        //add_action('admin_bar_menu', [$this, 'initTopBarMenu'], 100);
    }

    function initTopBarMenu($admin_bar){
        if(!is_user_logged_in() || !current_user_can('publish_posts')){
            return;
        }
        
        // $admin_bar->add_menu( array(
        //     'id'    => 'genieimagetemplate-list',
        //     'title' => 'GetGenie AI Writing',
        //     'href'  => admin_url('admin.php?page=genieimage#write-for-me'),
        //     'meta'  => array(   
        //         'title' => __('GetGenie AI Writing', 'genie-image-ai'),
        //     ),
        // ));
    }

    public function initLeftSideMenu(){
        $this->menu_slug = admin_url('admin.php?page=' . 'genieimage');

        add_action('admin_menu', function () {
            // check if getgenie plugin is active
            if(!is_plugin_active('getgenie/getgenie.php')){
                add_menu_page(
                    esc_html__("Genie Image", 'genie-image-ai'),
                    esc_html__("Genie Image", 'genie-image-ai'),
                    'publish_posts',
                    'genieimage',
                    [$this, 'licensePageData'],
                    GENIEIMAGE_URL . '/assets/dist/admin/images/genie-head.svg',
                    5
                );

                add_submenu_page(
                    'genieimage',
                    esc_html__("Image License | Genie Image", 'genie-image-ai'),
                    esc_html__("Image License", 'genie-image-ai'),
                    'publish_posts',
                    $this->menu_slug . '#image-license',

                );

            }

            

            // add_media_page(
            //     esc_html__("Genie Image | Genie Image", 'genie-image-ai'),
            //     esc_html__("Genie Image", 'genie-image-ai'),
            //     'publish_posts',
            //     GENIEIMAGE_TEXTDOMAIN,
            //     [$this, 'licensePageData'],
            //     5
            // );

            // add_media_page(
            //     esc_html__("License | Genie Image", 'genie-image-ai'),
            //     esc_html__("License", 'genie-image-ai'),
            //     'publish_posts',
            //     $this->menu_slug . '#image-license',
            //     '',
            //     5
            // );

            $this->removeFirstSubMenu();
        }, 99999);
    }

    /**
     *remove first sub-menu
     */
    public function removeFirstSubMenu()
    {
        remove_submenu_page('genie-image-ai', 'genie-image-ai');
    }


    /**
     * set content for Genie Image dashboard
     */
    // public function licensePage()
    // {
    //     return genieimage_view('admin/default');
    // }

    /**
     * set content for license menu
     */
    public function licensePageData()
    {
        return genieimage_view($this->menu_slug);
    }

}

