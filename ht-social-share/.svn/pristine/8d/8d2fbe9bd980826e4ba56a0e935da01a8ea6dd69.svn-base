<?php

/**
 * Social Share Icon Render
*/
class Htsocial_Share 
{

	/**
     * [$_instance]
     * @var null
    */
    private static $_instance = null;

    /**
     * Global post instance
    */
    private $post;

    /**
     * [instance] Initializes a singleton instance
     * @return [Htsocial_Share]
    */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
	function __construct()
	{
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'htsocialshare_assets_enqueue' ] );
	}

	/**
     * [i18n] Load Text Domain
     * @return [void]
    */
    public function i18n() {
        load_plugin_textdomain( 'htsocialshare-btn', false, dirname( plugin_basename( HTSOCIALSHARE_PL_ROOT ) ) . '/languages/' );

    }

    public function init() {
    	// Plugins Required File
    	$this->includes();

    	//add settings in plugin action
		add_filter('plugin_action_links_'.HTSOCIALSHARE_PLUGIN_BASE,function($links){

			$link = sprintf("<a href='%s'>%s</a>",esc_url(admin_url('admin.php?page=socail-share-setting-page')),__('Settings','htsocialshare-btn'));
			array_unshift($links,$link);
			return $links;

		});

    	//load button style
        $this->htsocialshare_btn_render();
    }

    /**
	*include file
	*/
    public function includes() {

    	require_once ( HTSOCIALSHARE_PL_PATH . 'admin/Recommended_Plugins.php' );
    	require_once ( HTSOCIALSHARE_PL_PATH . 'admin/admin-init.php' );

    }

    /**
	*enque style
	*/
    public function htsocialshare_assets_enqueue(){
		wp_enqueue_style( 'fontawesome-all', HTSOCIALSHARE_PL_URL.'assets/css/all.css');
		wp_enqueue_style( 'socialshare-style', HTSOCIALSHARE_PL_URL.'assets/css/style.css');

    }

    /**
	* Place socials share button
	*/
    private function htsocialshare_btn_render(){
    	$get_btn_position = get_option('button_position');
    	if('full-top' == $get_btn_position || 'center' == $get_btn_position || 'full-bottom' == $get_btn_position){
    		add_action('wp_footer', function($content) use ($get_btn_position){
    			if(!$this->htsocialshare_chek_post_type() || is_front_page() || is_home() || is_archive()){
    				return $content;
    			}
	    		$get_style = $this->htsocialshare_get_style($get_btn_position);
	    		echo $get_style;
    		});
    	}elseif ('before-content' == $get_btn_position){
    		add_filter( 'the_content', function($content){
    			if(!$this->htsocialshare_chek_post_type() || is_front_page() || is_home() || is_archive()){
    				return $content;
    			}
    			$get_style  = $this->htsocialshare_get_style();
    			$get_style .= $content;
    			return $get_style;
    		});
    	}elseif ( 'after-content' == $get_btn_position) {
    		add_filter( 'the_content', function($content){
    			if(!$this->htsocialshare_chek_post_type() || is_front_page() || is_home() || is_archive()){
    				return $content;
    			}
    			$get_style = $this->htsocialshare_get_style();
    			$content .= $get_style;
    			return $content;
    		});
    	}elseif ('before-comment' == $get_btn_position) {
    		add_filter( 'comment_form_top',function(){
    			if(!$this->htsocialshare_chek_post_type() || is_front_page() || is_home() || is_archive()){
    				return $content;
    			}
    			$get_style = $this->htsocialshare_get_style();
    			echo $get_style;
    		} );	
    	}elseif ('after-comment' == $get_btn_position) {
    		add_filter( 'comment_form',function(){
    			if(!$this->htsocialshare_chek_post_type() || is_front_page() || is_home() || is_archive()){
    				return $content;
    			}
    			$get_style = $this->htsocialshare_get_style();
    			echo $get_style;
    		} );	
    	}
    }

    /**
	* Check post type fot socical share button
	*/
    private function htsocialshare_chek_post_type(){
    	global $post;
    	$this->post = $post;
    	$get_selected_post = get_option('social_post_types');
    	if(in_array($post->post_type,$get_selected_post)){
			return true;
		}
		return false;
    }

    /**
	* Scoial Share set button style
	*/
    private function htsocialshare_get_style($get_btn_position=''){

    	$get_style = get_option('socail_btn_style');
    	if($get_style == 'style-1'){

    		$template_style_class = 'ht-social-share-floating-left-side ht-social-share-floating-left-side--'.$get_btn_position;
    		$template_style = $this->htsocialshare_template_style($template_style_class,'on');
    		return $template_style;

    	}elseif ($get_style == 'style-2') {

    		$template_style_class ='ht-social-share ht-social-share--round_10';
    		$template_style = $this->htsocialshare_template_style($template_style_class,'off');
    		return $template_style;

    	}elseif ($get_style == 'style-3') {

    		$template_style_class ='ht-social-share ht-social-share--round_5';
    		$template_style = $this->htsocialshare_template_style($template_style_class,'off');
    		return $template_style;

    	}elseif ($get_style == 'style-4') {

    		$template_style_class = 'ht-social-share ht-social-share--inline layout-inline';
    		$template_style = $this->htsocialshare_template_style($template_style_class,'on');
    		return $template_style;

    	}elseif ($get_style == 'style-5') {

    		$template_style_class = 'ht-social-share ht-social-share--inline-border layout-inline';
    		$template_style = $this->htsocialshare_template_style($template_style_class,'on');
    		return $template_style;

    	}elseif ($get_style == 'style-6') {

    		$template_style_class = 'ht-social-share ht-social-share--inline-border-5 layout-inline';
    		$template_style = $this->htsocialshare_template_style($template_style_class,'on');
    		return $template_style;

    	}elseif ($get_style == 'style-7') {

    		$template_style_class ='ht-social-share ht-social-share--black-round_10';
    		$template_style = $this->htsocialshare_template_style($template_style_class,'off');
    		return $template_style;
    		
    	}elseif ($get_style == 'style-8') {
    		$template_style_class = 'ht-social-share ht-social-share--inline-box layout-inline';
    		$template_style = $this->htsocialshare_template_style($template_style_class,'on');
    		return $template_style;
    	}
    }

    /**
	* Render html for social share icon
	*/
    private function htsocialshare_template_style($template_style_class,$title){
    	$social_links = $this->htsocialshare_links();
    	$socialshare_icon_list = get_option('social_icon_list');
		ob_start();
		?>
		<div class="social_share-reset">
			<ul class="<?php echo esc_attr($template_style_class); ?>">
				<?php foreach ($socialshare_icon_list as $key => $value): ?>
	                <li>
	                    <a href="<?php echo esc_url($social_links[$key]) ?>" class="ht-social-item <?php echo esc_attr(strtolower($key)); ?>" target="_blank">
	                        <span class="icon">
	                            <i class="<?php echo esc_attr($value); ?>"></i>
	                        </span>
	                        <?php if('on' == $title): ?>
	                        <span class="title"><?php esc_html_e($key); ?></span>
	                    	<?php endif; ?>
	                    </a>
	                </li>
		        <?php endforeach; ?>
            </ul>
        </div>
		<?php
		return ob_get_clean();
    }

    /**
	* Create All Network Sharing Link
	*/
    private function htsocialshare_links(){
    	$socialshare_fb_key    = get_option('facebook_app_id')? get_option('facebook_app_id') : '';
    	$socialshare_youtube   = get_option('youtube_username')? get_option('youtube_username') : '';
    	$socialshare_instagram = get_option('instagram_username')? get_option('instagram_username') : '';
    	$socialshare_whatsapp_type = $this->htsocialshare_whatsapp_share_api();

    	$spcialshare_links= array(
    		'facebook'  => 'https://www.facebook.com/sharer/sharer.php?u='.get_permalink( $this->post->ID ),
    		'Pinterest' => 'https://www.pinterest.com/pin/create/button/?url='. esc_url(get_permalink($this->post->ID)) .'&amp;description='. $this->post->post_title .'&amp;media='. esc_url(wp_get_attachment_url( get_post_thumbnail_id($this->post->ID))),
    		'Twitter'   => 'https://twitter.com/share?'. esc_url(get_permalink($this->post->ID)) .'&amp;text='.$this->post->post_title,
    		'Linkedin'  => 'http://www.linkedin.com/shareArticle?url='. esc_url(get_permalink($this->post->ID)) .'&amp;title='. $this->post->post_title,
    		'reddit'	=> 'http://reddit.com/submit?url='. esc_url(get_permalink($this->post->ID)) .'&amp;title='.$this->post->post_title,
    		'WordPress' => 'https://www.addtoany.com/ext/wordpress/press_this?linkurl='.urlencode( esc_url(get_permalink($this->post->ID)) ).'&linkname='.$this->post->post_title,
    		'Skype' => 'https://web.skype.com/share?url='.urlencode( esc_url(get_permalink($this->post->ID)) ),
    		'LINE'  => 'https://social-plugins.line.me/lineit/share?url='.urlencode( esc_url(get_permalink($this->post->ID)) ),
    		'Google Bookmarks' => 'https://www.google.com/bookmarks/mark?op=edit&bkmk='.urlencode( esc_url(get_permalink($this->post->ID)) ).'&title='.$this->post->post_title.'&annotation=',
    		'Gmail' =>  'https://mail.google.com/mail/?ui=2&view=cm&fs=1&tf=1&su='.$this->post->post_title.'&body=Link:'.urlencode( esc_url(get_permalink($this->post->ID)) ),
    		'Messenger' => $this->htsocialshar_check_mobile() ? 'fb-messenger://share/?link='.urlencode( esc_url(get_permalink($this->post->ID)) ).'':'https://www.facebook.com/dialog/send?app_id='.$socialshare_fb_key.'&display=popup&link='.urlencode( esc_url(get_permalink($this->post->ID)) ).'&redirect_uri='.urlencode( esc_url(get_permalink($this->post->ID)) ),
    		'YouTube' => $socialshare_youtube,
    		'Instagram' => 'https://www.instagram.com/'.$socialshare_instagram,
    		'WhatsApp'  => 'https://' . $socialshare_whatsapp_type . '.whatsapp.com/send?text='.$this->post->post_title.' '.urlencode( esc_url(get_permalink($this->post->ID)) ),
    	);
    	return $spcialshare_links;
    }

    /**
	* Determine which Whatsapp share url to use
	*/
	private function htsocialshare_whatsapp_share_api() {

		if ( $this->htsocialshar_check_mobile() ) {
			return 'api';
		}
		return 'web';

	}


    /**
	* Check if webpage is being visited in a mobile device
	*/
	private function htsocialshar_check_mobile() {

		if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
		
			$iphone = strpos( $_SERVER['HTTP_USER_AGENT'], "iPhone" );
			$android = strpos( $_SERVER['HTTP_USER_AGENT'], "Android" );
			$palmpre = strpos( $_SERVER['HTTP_USER_AGENT'], "webOS" );
			$berry = strpos( $_SERVER['HTTP_USER_AGENT'], "BlackBerry" );
			$ipod = strpos( $_SERVER['HTTP_USER_AGENT'], "iPod" );
		
			if ( $iphone || $android || $palmpre || $ipod || $berry == true ) {
				return true;
			}
		}

		return false;

	}
    
}

Htsocial_Share::instance();


?>