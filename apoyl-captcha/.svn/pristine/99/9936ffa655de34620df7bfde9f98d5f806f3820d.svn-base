<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_CAPTCHA
 * @subpackage APOYL_CAPTCHA/public
 * @author 凹凸曼 <jar-c@163.com>
 *
 */

class Apoyl_Captcha_Public
{

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
  
    }
	public function enqueue_styles() {
		$arr = get_option ( 'apoyl-captcha-settings' );
		if (isset ( $arr ['open'] ) && isset ( $arr ['openreg'] ) && ! empty ( $arr ['open'] ) && ! empty ( $arr ['openreg'] )) {
			wp_enqueue_style ( $this->plugin_name, APOYL_CAPTCHA_URL . 'api/clicaptcha/css/captcha.css', array (), $this->version, 'all' );
			wp_enqueue_script ( $this->plugin_name, APOYL_CAPTCHA_URL . 'public/js/js.cookie.min.js', array (
					'jquery' 
			), $this->version, false );
			
			$ajaxurl = admin_url ( 'admin-ajax.php' );
			$nonce = wp_create_nonce ( 'captcha_nonce' );
			$params = array (
					'action' => 'apoyl_captcha_ajax',
					'_ajax_nonce' => wp_create_nonce ( 'captcha_nonce' ) 
			);
			$url = $ajaxurl . '?' . build_query ( $params );
			
			wp_add_inline_script ( $this->plugin_name, 'const apoyl_captcha_url="' . esc_url ( $url, null, null ).'";', 'after' );
			wp_enqueue_script (  $this->plugin_name.'-after', APOYL_CAPTCHA_URL . 'public/js/clicaptcha.js', array (
					'jquery' 
			), $this->version, false);
		}
	}
    

    
   
    public function apoyl_captcha_ajax()
    {
        if (! check_ajax_referer('captcha_nonce'))
            exit();

        require_once APOYL_CAPTCHA_DIR . 'api/clicaptcha/clicaptcha.class.php';

        $clicaptcha = new apoyl_captcha_clicaptcha();
        isset($_POST['do'])?$do=sanitize_key($_POST['do']):$do='';
        if($do == 'check'){
        	isset($_POST['info'])?$info=sanitize_text_field($_POST['info']):$do='';
        	echo $clicaptcha->check($info, false) ? 1 : 0;
        }else{
     
        	$clicaptcha->creat();
        }
    
    }

    public function register()
    {
        $arr = get_option('apoyl-captcha-settings');
 
        if (isset($arr['open'])&&isset($arr['openreg'])&&!empty($arr['open'])&&!empty($arr['openreg'])) {
            require_once plugin_dir_path(__FILE__) . 'partials/public-display.php';
        }
    }


}