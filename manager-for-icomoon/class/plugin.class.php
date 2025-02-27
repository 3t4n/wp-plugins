<?php

namespace managerForIcomoon ; 

class Plugin {
	private $plugin_version = false ;
    private $plugin_info = array();

	public function __construct(){
		if(is_admin()){
			if (!function_exists('get_plugin_data')) {
				require_once(ABSPATH . 'wp-admin/includes/plugin.php');
			}
			$this->plugin_info = get_plugin_data(plugin_dir_path(__DIR__) . 'managerforicomoon.php', false, false);
            $this->plugin_version = $this->plugin_info['Version'];

			// Menu links
			add_action('admin_menu', array( $this,'menu_page_init'));

			// Activation hook
			register_activation_hook(Core::getPath('managerforicomoon.php'), array( $this,'activate'));

			// Link to settings in plugin liste
			add_filter('plugin_action_links_'.plugin_basename(Core::getPath('managerforicomoon.php')), array($this, 'plugins_page_settings_link') );			
		}
	}

	public function activate() {
        if(get_option('managerforicomoon_options')) return;
        add_option('managerforicomoon_options', Options::$plugin_options_default);
    }

	public function plugins_page_settings_link( $links ) {
        $links[] = '<a href="'.admin_url( 'admin.php?page=managerforicomoon' ) .'">' . __('Settings', 'managerforicomoon') . '</a>';
        return $links;
    }

	public function menu_page_init() {
        add_menu_page( Core::getPluginName(), Core::getPluginName(true), 'edit_posts', Core::getPluginSlug(), array( $this,'html_page_home'), Core::getUrl('/img/logo_small.png'));
        add_submenu_page(Core::getPluginSlug(), Core::getPluginName(true).' | '.__( "Welcome", 'managerforicomoon'), __( "Welcome", 'managerforicomoon'), 'edit_posts',Core::getPluginSlug(), array( $this,'html_page_home'));
        add_submenu_page(Core::getPluginSlug(), Core::getPluginName(true).' | '.__( "Upload ", 'managerforicomoon'), __( "Upload ", 'managerforicomoon'), 'administrator',Core::getPluginSlug().'-zip', array( $this,'html_page_zip'));
        add_submenu_page(Core::getPluginSlug(), Core::getPluginName(true).' | '.__( "Settings", 'managerforicomoon'), __( "Settings", 'managerforicomoon'), 'administrator',Core::getPluginSlug().'-settings', array( $this,'html_page_settings'));
        add_submenu_page(Core::getPluginSlug(), Core::getPluginName(true).' | '.__( "Icon list", 'managerforicomoon'), __( "Icon list", 'managerforicomoon'), 'edit_posts',Core::getPluginSlug().'-icons', array( $this,'html_page_icons'));
        add_submenu_page(Core::getPluginSlug(), Core::getPluginName(true).' | '.__( "Shortcode", 'managerforicomoon'), __( "Shortcode", 'managerforicomoon'), 'edit_posts',Core::getPluginSlug().'-shortcode', array( $this,'html_page_shortcode'));
    }
    
    public function html_page_template($page){
        //Core::getIcons();
        
        ob_start();

        require Core::getPath('html/'.$page) ;
        $content = ob_get_clean();

        ?>
        <div class="managerforicomoon">
            <header class="managerforicomoon-header">
                <div>
                    <h1><?= Core::getPluginName() ;?></h1>
                    <span class="logo-header"></span>
                </div>
            </header> 

            <div class="managerforicomoon-page">
                <div class="managerforicomoon-content">
                    <?php Notice::getToastHtml(); ?>
                    <?php Notice::getHtml(); ?>     
                    <?= $content ?>
                </div>
            </div>

            <div class="managerforicomoon-donate">
                <p><?= __( "Version", 'managerforicomoon'); ?> <?= $this->plugin_version; ?> | 
                <strong><?= __( "Support the project", 'managerforicomoon'); ?></strong>
                <a class="button " href="<?= Core::getInfo('url_plugin_donate') ?>" target="_blank">
                    <?= __( "Donate", 'managerforicomoon'); ?>
                </a>

                <div class="logo-footer"></div>
            </div>
        </div>

        <?php
    }

    public function html_page_home() { 
        $this->html_page_template('page.home.php');
    }
    public function html_page_zip() {
        $this->html_page_template('page.zip.php');
    } 
    public function html_page_settings() {
        $this->html_page_template('page.settings.php');
    } 
    public function html_page_icons() {
        $this->html_page_template('page.icons.php');
    } 
    public function html_page_shortcode() {
        $this->html_page_template('page.shortcode.php');
    }
}