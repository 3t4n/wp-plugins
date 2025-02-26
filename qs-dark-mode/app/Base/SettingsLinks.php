<?php
namespace QSDarkMode\Base;

use QSDarkMode\Base\BaseController;

class SettingsLinks extends BaseController
{

    public function get_servey_questions(){

        return [
            'no-longer'              => 'I no longer need the plugin',
            'found-better-plugin'    => 'I found a better plugin',
            'plugin-not-working'     => "I couldn't get the plugin to work",
            'temporary-deactivation' => "It's a temporary deactivation",
            'have-elementor-pro'     => "I have Elementor Pro",
            'need-better-design'     => "need better design and presets",
        ];
    }

	public function register() {
        
       add_action( 'admin_enqueue_scripts' , [ $this,'add_admin_scripts'] );
       add_filter( 'plugin_row_meta', [ $this, 'plugin_row_meta' ], 10, 2 );
       add_filter( 'plugin_action_links_'.QS_DARK_MODE_PLUGIN_BASE, [ $this ,'add_plugin_page_settings_link'] );
       add_action( 'admin_footer' , [ $this , 'servey_footer' ] );
    }

    public function proceed(){

        global $current_screen;
        if(
            isset($current_screen->parent_file)
            && $current_screen->parent_file == 'plugins.php'
            && isset($current_screen->id)
            && $current_screen->id == 'plugins'
        ){
           return true;
        }
        return false;
        
    }

    public function add_admin_scripts($handle){

        if('plugins.php' == $handle){
            wp_enqueue_style( 'qs-dark-mode-servey-admin' , QS_DARK_MODE_CSS.'/plugin-servey.css' );
            wp_enqueue_script( 'qs-dark-mode-servey' , QS_DARK_MODE_JS .'/plugin-servey.js' ,array('jquery'), time(), true );
        }

    }
    public function servey_footer(){

        if(!$this->proceed()){
            return;
        }
        
        ?>
        <div class="qs-dark-mode-deactivate-servey-overlay" id="qs-dark-mode-deactivate-servey-overlay"></div>
        <div class="qs-dark-mode-deactivate-servey-modal" id="qs-dark-mode-deactivate-servey-modal">
            <header>
                <div class="qs-dark-mode-deactivate-servey-header">
                    <img src="<?php echo esc_url(QS_DARK_MODE_IMG . '/icon.svg'); ?>" />
                    <h3><?php echo esc_html__('QS Dark Mode','elements-ready-lite'); ?> </h3>
                </div>
            </header>
            <div class="qs-dark-mode-deactivate-info">
                <?php echo esc_html__('If you have a moment, please share why you are deactivating Dark Mode:','qs-dark-mode') ?>
            </div>
            <div class="qs-dark-mode-deactivate-content-wrapper">
                <form onSubmit="document.getElementById('submit').disabled=true;" action="#" class="qs-dark-mode-deactivate-form-wrapper">
                    <?php foreach($this->get_servey_questions() as $key => $label): ?>
                        <div class="qs-dark-mode-deactivate-input-wrapper">
                            <input id="qs-dark-mode-deactivate-feedback-<?php echo esc_attr($key); ?>" class="qs-dark-mode-deactivate-feedback-dialog-input" type="radio" name="reason_key" value="<?php echo $label; ?>">
                            <label for="qs-dark-mode-deactivate-feedback-<?php echo esc_attr($key); ?>" class="qs-dark-mode-deactivate-feedback-dialog-label"><?php echo esc_html($label); ?></label>
                        </div> 
                    <?php endforeach; ?>
                    <div class="qs-dark-mode-deactivate-input-wrapper">
                        <input id="qs-dark-mode-deactivate-feedback-other" class="qs-dark-mode-deactivate-feedback-dialog-input" type="radio" name="reason_key" value="other">
                        <div class="other">
                            <label for="qs-dark-mode-deactivate-feedback-other" class="qs-dark-mode-deactivate-feedback-dialog-label">Others</label>
                            <input class="qs-dark-mode-feedback-text" type="text" name="reason_other" placeholder="Please share the reason">
                        </div>
                    </div> 
                    <div class="qs-dark-mode-deactivate-footer">
                        <button id="qs-dark-mode-dialog-lightbox-submit" class="qs-dark-mode-dialog-lightbox-submit">Submit &amp; Deactivate</button>
                        <button id="qs-dark-mode-dialog-lightbox-skip" class="qs-dark-mode-dialog-lightbox-skip">Skip & Deactivate</button>
                    </div>
                </form> 
            </div>
        </div>
        <?php
    }

    function add_plugin_page_settings_link( $links ) {
	 
        $links[] = '<a href="' .
            admin_url( 'admin.php?page='.QS_DARK_MODE_SETTING_PATH ) .
            '">' . esc_html__('Settings','qs-dark-mode') . '</a>';
    
            $installed_plugins = array_keys( get_plugins() );
              
            if ( in_array('qs-dark-mode-pro/qs-dark-mode-pro.php',$installed_plugins) || in_array('qs-dark-mode-pro-bundle/qs-dark-mode-pro-bundle.php',$installed_plugins) ) {

            }else{
                $links[] = '<a style="color: #325DF6; font-weight: bold;"  href="' .
                esc_url( QS_DARK_MODE_DEMO_URL ) .
                '">' . esc_html__('Go Pro','qs-dark-mode') . '</a>';
            }
   
        return $links;
    
    }

    public function plugin_row_meta( $plugin_meta, $plugin_file ) {

		if ( QS_DARK_MODE_PLUGIN_BASE === $plugin_file ) {

			$row_meta = [
				'docs' => '<a target="__blank" href="https://quomodosoft.com/plugins-docs" aria-label="' . esc_attr__( 'View Documentation', 'qs-dark-mode' ) . '" target="_blank">' . esc_html__( 'Docs & FAQs', 'qs-dark-mode' ) . '</a>',

				'plugin-demos' => '<a target="__blank" href="'.QS_DARK_MODE_DEMO_URL.'" aria-label="' . esc_attr__( 'View Demos', 'qs-dark-mode' ) . '" target="_blank">' . esc_html__( 'Demos', 'qs-dark-mode' ) . '</a>',

				'plugin-support' => '<a target="__blank" href="http://help.quomodosoft.com/" aria-label="' . esc_attr__( 'Get Support', 'qs-dark-mode' ) . '" target="_blank">' . esc_html__( 'Get Support', 'qs-dark-mode' ) . '</a>',
			];
         
			$plugin_meta = array_merge( $plugin_meta, $row_meta );
		}

		return $plugin_meta;
	}
}