<?php
class FacebookLikeBoxPopUp
{
	/**
	 * All data
	 * @var array
	 */
	private $options;
	
	/**
	 * User construct
	 */
	public function __construct()
	{		
		$this->options = get_option( 'flbpp_settings' );
		add_action( 'wp_enqueue_scripts', array( $this, 'loadStyles' ) );
		add_action( 'wp_head', array($this, 'loadStaticStyles') );
		add_action( 'get_footer', array( $this, 'showBox' ) );
		add_shortcode( 'facebook_like_box', array( $this, 'outputFLBPP' ) );
		add_shortcode( 'facebook_like_box_fixed', array( $this, 'outputFLBPP2' ) );
	}
	
	/**
	 * Loads styles and scripts
	 */
	public function loadStyles ()
	{
		wp_enqueue_style('facebook-like-box-pop-up-style', plugins_url( '../assets/style.css', __FILE__ ), array(),'1.3', 'all');
		wp_enqueue_script('facebook-like-box-pop-up-js', plugins_url( '../assets/script.js', __FILE__ ),array('jquery','jquery-core'),'1.0',false);		
	}
	
	/**
	 * Output html block
	 * Checks what is enabled and outputs it.
	 */
	public function showBox () {
		if (isset($_COOKIE["flbpp_cookie_time"]) && $this->options["cookies"] == "true") {
			return "";
		}
		
		if ($this->options["cookies"] == "true") {
			?><div id="facebook-like-box-pop-up-cookie-info"
						class="facebook-like-box-pop-up-display-none" 
						data-time="<?php echo $this->options["cookiestime"];?>"  
						data-prefix="flbpp_cookie_time" 
						data-path="<?php echo COOKIEPATH;?>" 
						data-domain="<?php echo COOKIE_DOMAIN;?>"></div><?php
				}
		?>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/<?php echo $this->options["lang"]; ?>/sdk.js#xfbml=1&version=v2.3&appId=<?php echo $this->options["appid"]; ?>";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			
		<div class="facebook-like-box-pop-up-overlay facebook-like-box-pop-up-main"></div>
		<div id="facebook-like-box-pop-up" class="facebook-like-box-pop-up-main">
		<div class="fb-page"
			data-href="https://www.facebook.com/<?php echo $this->options["href"]; ?>"
			data-width="<?php echo $this->options["width"]; ?>"
			data-height="<?php echo $this->options["height"]; ?>"
			data-hide-cover="<?php echo $this->options["cover"]; ?>"
			data-show-facepile="<?php echo $this->options["faces"]; ?>"
			data-show-posts="<?php echo $this->options["posts"]; ?>"
			data-hide-cta="<?php echo $this->options["call"]; ?>"
			data-small-header="<?php echo $this->options["smallheader"]; ?>"
			data-adapt-container-width="<?php echo $this->options["adapt"]; ?>"></div>
		<a id="facebook-like-box-pop-up-close"><img src="<?php echo plugins_url('../assets/images/close.png', __FILE__); ?>" alt="Close"></a>
		</div>
		<?php
	}
	
	/**
	 * Outputs pop up
	 * @param array $data
	 */
	public static function outputFLBPP ($data2)
	{		
		$data = shortcode_atts( array(
				'appid' => '',
				'lang' => '',
				'href' => '',
				'width' => '',
				'height' => '',
				'cover' => '',
				'faces' => '',
				'posts' => '',
				'call' => '',
				'smallheader' => '',
				'adapt' => '',
				'cookies' => '',
				'cookiestime' => '',
				'cookiesprefix' => '',
		), $data2 );
		
		$data = self::getEmplyData($data, get_option( 'flbpp_settings' ));
		
		$cookiedata = array();

		if ($data["cookies"] == "true") {
			if ($data["cookiesprefix"]) {
				if (isset($_COOKIE[$data["cookiesprefix"]])) {
					return "";
				}
				$cookiedata["prefix"] = $data["cookiesprefix"];
				$cookiedata["time"] = $data["cookiestime"];
			} else {
				if (isset($_COOKIE["flbpp_cookie_time"])) {
					return "";
				}
				$cookiedata["prefix"] = "flbpp_cookie_time";
				$cookiedata["time"] = $data["cookiestime"];
			}
		}

		if ($cookiedata){
			?><div id="facebook-like-box-pop-up-cookie-info" 
				class="facebook-like-box-pop-up-display-none" 
				data-time="<?php echo $cookiedata["time"];?>"  
				data-prefix="<?php echo $cookiedata["prefix"];?>" 
				data-path="<?php echo COOKIEPATH;?>" 
				data-domain="<?php echo COOKIE_DOMAIN;?>"></div><?php
		}
		?>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/<?php echo $data["lang"]; ?>/sdk.js#xfbml=1&version=v2.3&appId=<?php echo $data["appid"]; ?>";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			
		<div class="facebook-like-box-pop-up-overlay facebook-like-box-pop-up-shortcode"></div>
		<div id="facebook-like-box-pop-up" class="facebook-like-box-pop-up-shortcode">
		<div class="fb-page"
			data-href="https://www.facebook.com/<?php echo $data["href"]; ?>"
			data-width="<?php echo $data["width"]; ?>"
			data-height="<?php echo $data["height"]; ?>"
			data-hide-cover="<?php echo $data["cover"]; ?>"
			data-show-facepile="<?php echo $data["faces"]; ?>"
			data-show-posts="<?php echo $data["posts"]; ?>"
			data-hide-cta="<?php echo $data["call"]; ?>"
			data-small-header="<?php echo $data["smallheader"]; ?>"
			data-adapt-container-width="<?php echo $data["adapt"]; ?>"></div>
		<a id="facebook-like-box-pop-up-close"><img src="<?php echo plugins_url('../assets/images/close.png', __FILE__); ?>" alt="Close"></a>
		</div>
		<?php
	}
	
	/**
	 * Outputs fixed page plugin
	 * @param array $data
	 */
	public static function outputFLBPP2 ($data2)
	{
		$data = shortcode_atts( array(
				'appid' => '',
				'lang' => '',
				'href' => '',
				'width' => '',
				'height' => '',
				'cover' => '',
				'faces' => '',
				'posts' => '',
				'call' => '',
				'smallheader' => '',
				'adapt' => '',
		), $data2 );
		
		$data = self::getEmplyData($data, get_option( 'flbpp_settings' ));
		
		?>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/<?php echo $data["lang"]; ?>/sdk.js#xfbml=1&version=v2.3&appId=<?php echo $data["appid"]; ?>";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				
			<div id="facebook-like-box-fixed">
			<div class="fb-page"
				data-href="https://www.facebook.com/<?php echo $data["href"]; ?>"
				data-width="<?php echo $data["width"]; ?>"
				data-height="<?php echo $data["height"]; ?>"
				data-hide-cover="<?php echo $data["cover"]; ?>"
				data-show-facepile="<?php echo $data["faces"]; ?>"
				data-show-posts="<?php echo $data["posts"]; ?>"
				data-hide-cta="<?php echo $data["call"]; ?>"
				data-small-header="<?php echo $data["smallheader"]; ?>"
				data-adapt-container-width="<?php echo $data["adapt"]; ?>">
			</div>
			</div>
			<?php
	}
	
	/**
	 * Loads static styles
	 */
	public static function loadStaticStyles() {
		$data = get_option( 'flbpp_settings' );
		if (wp_is_mobile() && $data["height_mobile"] && $data["width_mobile"]) { // styles for mobile deveice
			$facebook_like_box_styles ='#facebook-like-box-pop-up {	margin-top: -'. $data['height_mobile'] / 2 .'px; margin-left: -'. $data['width_mobile'] / 2 .'px }';
		} else { // styles for desktop deveice
			$facebook_like_box_styles ='#facebook-like-box-pop-up {	margin-top: -'. $data['height'] / 2 .'px; margin-left: -'. $data['width'] / 2 .'px }';
		}
		?><style type="text/css"><?php echo $facebook_like_box_styles; ?></style><?php
	}
	
	/**
	 * Merge arrays original data with replaced data
	 * @param array $replaceData
	 * @param array $originalData
	 * @return array $returnData
	 */
	public static function getEmplyData ($replaceData, $originalData)
	{
		$returnData = array();
		foreach ($originalData as $kay => $value)
		{
			if (isset($replaceData[$kay]) && $replaceData[$kay])
			{
				$returnData[$kay] = $replaceData[$kay];
			} else {
				$returnData[$kay] = $originalData[$kay];
			}
		}
		if (isset($replaceData["cookiesprefix"]) && $replaceData["cookiesprefix"]) {
			$returnData["cookiesprefix"] = $replaceData["cookiesprefix"];
		} else {
			$returnData["cookiesprefix"] = "";
		}
		return $returnData;
	}
}