<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://www.2803media.fr/
 * @since      1.0.0
 *
 * @package    Wp_Scsb
 * @subpackage Wp_Scsb/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Wp_Scsb
 * @subpackage Wp_Scsb/includes
 * @author     2803 MEDIA <henri@2803media.fr>
 */
class Wp_Scsb {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wp_Scsb_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'wp-scsb';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wp_Scsb_Loader. Orchestrates the hooks of the plugin.
	 * - Wp_Scsb_i18n. Defines internationalization functionality.
	 * - Wp_Scsb_Admin. Defines all hooks for the admin area.
	 * - Wp_Scsb_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-scsb-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-scsb-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-scsb-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wp-scsb-public.php';

		$this->loader = new Wp_Scsb_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wp_Scsb_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Wp_Scsb_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Wp_Scsb_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );

        // Add Settings link to the plugin
        $plugin_basename = plugin_basename( plugin_dir_path( dirname(__FILE__) ) . $this->plugin_name . '.php' );
        $this->loader->add_filter( 'plugin_action_links_' . $plugin_basename, $plugin_admin, 'add_action_links' );

        // Save/Update our plugin options
        $this->loader->add_action('admin_init', $plugin_admin, 'options_update');
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Wp_Scsb_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
        
        if ( ! function_exists( 'henri_cleanCut' ) ) :
        //clean cut paragraph
        function henri_cleanCut($string,$length,$cutString = '...')
        {
        if(strlen($string) <= $length)
        {
        return $string;
        }
        $str = substr($string,0,$length-strlen($cutString)+1);
        return substr($str,0,strrpos($str,' ')).$cutString;
        }
        endif;

		/* action */
		function facebook_like_share_count($url) {
		//$facebook_like_share_count = function ( $url ) {

			$api = file_get_contents( 'http://graph.facebook.com/?id=' . $url );

			$count = json_decode( $api );
			if(isset($count->shares)){
				return $count->shares;
			}
		};

		function linkedin_share_count($url) {
		//$twitter_tweet_count = function ( $url ) {

			$api = file_get_contents( 'https://www.linkedin.com/countserv/count/share?url=' . $url.'&format=json' );

			$count = json_decode( $api );
			if(isset($count->count)){
				return $count->count;
			}

		};

		function pinterest_pins($url) {
		//$pinterest_pins = function ( $url ) {

			$api = file_get_contents( 'http://api.pinterest.com/v1/urls/count.json?callback%20&url=' . $url );

			$body = preg_replace( '/^receiveCount\((.*)\)$/', '\\1', $api );

			$count = json_decode( $body );
			if(isset($count->count)){
				return $count->count;
			}

		};

		function twitter_count($url) {
		//$pinterest_pins = function ( $url ) {

			$api = file_get_contents( 'http://public.newsharecounts.com/count.json?url=' . $url );

			$count = json_decode( $api );
			if(isset($count->count)){
				return $count->count;
			}

		};

		function google_plusones($url) {
		//$google_plusones = function ( $url ) {
			$curl = curl_init();
			curl_setopt( $curl, CURLOPT_URL, "https://clients6.google.com/rpc" );
			curl_setopt( $curl, CURLOPT_POST, 1 );
			curl_setopt( $curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]' );
			curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-type: application/json' ) );
			$curl_results = curl_exec( $curl );
			curl_close( $curl );
			$json = json_decode( $curl_results, true );

			return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
		};
		
		function searcharray($value, $key, $array) {
			foreach ($array as $arra) {
				if ($arra[$key] == $value) {
					return true;
				}
			}
		   return null;
		}

		function sortByOrder($a, $b) {
			return $b['value'] - $a['value'];
		}
		
		function share_counter(){
			//begin counter
			// get post id
			$post_id = get_the_ID();
			

			// get perm url to be used for share count functions
			$url = get_permalink( $post_id );
			//$url = 'http://mashable.com/2012/12/09/top-10-pinterest-12-9/';
			
			$options = get_option('wp-scsb');
            $update_counter_minutes = $options['update_counter_minutes'];
				
				$time = time();
				//echo $time.'<br />';
				
				$day = date('d', $time); // 1-31
				$month = date('m', $time); // 1-12
				$year = date('Y', $time); // 1-12
				//echo $day.'<br />';
				//echo $month.'<br />';
				//echo $year.'<br />';
				
				// share count functions
				if ( false === ( $data = get_transient( 'scsb_' . $post_id ) ) ) {

					//echo 'nok';
					// store data in array
					$time = time();
					$data = array (
						'facebook' => facebook_like_share_count($url),
						'twitter' => twitter_count($url),
						'linkedin' => linkedin_share_count($url),
						'pinterest' => pinterest_pins($url),
						'google-plus' => google_plusones($url),
						'total' => facebook_like_share_count($url)+twitter_count($url)+linkedin_share_count($url)+pinterest_pins($url)+google_plusones($url),
						'date' => $time
					);
					
					set_transient( 'scsb_' . $post_id, $data  );
					
					
				
				} else {
			
					$timeupdate = $data['date'] + ($update_counter_minutes * 10);
					
					if($timeupdate-$time < 0){

						$data_day_old = get_transient( 'scsb_'.$day.'-'.$month.'-'.$year);

						
						$data_month_old = get_transient( 'scsb_'.$month.'-'.$year);
					
						if(facebook_like_share_count($url) != ''){
							$facebook = facebook_like_share_count($url);
							$facebook_day = facebook_like_share_count($url) - $data['facebook'];
							if($facebook_day < 0){
								$facebook_day = '0';
							}
						} else {
							$facebook = $data['facebook'];
							$facebook_day = '';
						}

						if(twitter_count($url) != ''){
							$twitter = twitter_count($url);
							$twitter_day = twitter_count($url) - $data['twitter'];
							if($twitter_day < 0){
								$twitter_day = '0';
							}
						} else {
							$twitter = $data['twitter'];
							$twitter_day = '';
						}

						if(linkedin_share_count($url) != ''){
							$linkedin = linkedin_share_count($url);
							$linkedin_day = linkedin_share_count($url) - $data['linkedin'];
							if($linkedin_day < 0){
								$linkedin_day = '0';
							}
						} else {
							$linkedin = $data['linkedin'];
							$linkedin_day = '';
						}

						if(pinterest_pins($url) != ''){
							$pinterest = pinterest_pins($url);
							$pinterest_day = pinterest_pins($url) - $data['pinterest'];
							if($pinterest_day < 0){
								$pinterest_day = '0';
							}
						} else {
							$pinterest = $data['pinterest'];
							$pinterest_day = '';
						}

						if(google_plusones($url) != ''){
							$google_plus = google_plusones($url);
							$google_plus_day = google_plusones($url) - $data['google-plus'];
							if($google_plus_day < 0){
								$google_plus_day = '0';
							}
						} else {
							$google_plus = $data['google-plus'];
							$google_plus_day = '';
						}

						$data = array (
							'facebook' => $facebook,
							'twitter' => $twitter,
							'linkedin' => $linkedin,
							'pinterest' => $pinterest,
							'google-plus' => $google_plus,
							'total' =>  $facebook + $twitter + $linkedin + $pinterest + $google_plus,
							'date' => $time
						);

						$data_day = array (
							'facebook' => $facebook_day + $data_day_old['facebook'],
							'twitter' => $twitter_day + $data_day_old['twitter'],
							'linkedin' => $linkedin_day + $data_day_old['linkedin'],
							'pinterest' => $pinterest_day + $data_day_old['pinterest'],
							'google-plus' => $google_plus_day + $data_day_old['google-plus'],
							'total' =>  $facebook_day + $twitter_day + $linkedin_day + $pinterest_day + $google_plus_day + $data_day_old['facebook'] + $data_day_old['twitter'] + $data_day_old['linkedin'] + $data_day_old['pinterest'] + $data_day_old['google-plus'],
							'day' => $day.'-'.$month.'-'.$year
						);

						$data_month = array (
							'facebook' => $facebook_day + $data_month_old['facebook'],
							'twitter' => $twitter_day + $data_month_old['twitter'],
							'linkedin' => $linkedin_day + $data_month_old['linkedin'],
							'pinterest' => $pinterest_day + $data_month_old['pinterest'],
							'google-plus' => $google_plus_day + $data_month_old['google-plus'],
							'total' =>  $facebook_day + $twitter_day + $linkedin_day + $pinterest_day + $google_plus_day + $data_month_old['facebook'] + $data_month_old['twitter'] + $data_month_old['linkedin'] + $data_month_old['pinterest'] + $data_month_old['google-plus'],
							'month' => $month.'-'.$year
						);	
						
						set_transient( 'scsb_' . $post_id, $data  );
						set_transient( 'scsb_'.$day.'-'.$month.'-'.$year, $data_day, 24 * 60 * 60 * 30 );
						set_transient( 'scsb_'.$month.'-'.$year, $data_month, 24 * 60 * 60 * 365 );
						
						if ( false === ( $podium = get_transient( 'scsb_top') ) ) {
							$datap = array(
								array(
									'post_id' => $post_id,
									'value' => $data['total']
								)
							);
							
							//print_r($datap);
							set_transient( 'scsb_top', $datap);
						
						} else {
							$podium = get_transient( 'scsb_top');
							//print_r(get_transient( 'scsb_top'));
							
							if(searcharray($post_id,'post_id',$podium) == '1'){
								foreach($podium as &$value){
									if($value['post_id'] === $post_id){
										$value['value'] = $data['total'];
										break; // Stop the loop after we've found the item
									}
								}
								usort($podium, 'sortByOrder');
								
							} else {
								$i = count($podium);
								$podium[$i]['post_id'] = $post_id;
								$podium[$i]['value'] = $data['total'];
								usort($podium, 'sortByOrder');
								$podium = array_slice($podium, 0, 10);
							} 
							set_transient( 'scsb_top', $podium);
							//print_r(get_transient( 'scsb_top'));
						}

						
						


					}
				}
				
				return($data);
				
		}
		
		function custom_number_format($n, $precision, $format) {
			if($format == 'classic'){
				$n_format = number_format($n, 0, ',', ' ');
			} else {
				if ($n < 1000) {
					$n_format = number_format($n);
				} else if ($n < 1000000) {
					$n_format = number_format($n / 1000, $precision) . 'k';
				} else if ($n < 1000000000) {
					$n_format = number_format($n / 1000000, $precision) . 'M';
				} else {
					$n_format = number_format($n / 1000000000, $precision) . 'B';
				}
			}

			return $n_format;
		}
			
		function henri_share_button_2803_after($content) {

			if( is_single() OR is_page() OR is_home()){
				$options = get_option('wp-scsb');
                //print_r($options);
			}
            if ( (is_single() AND $options['where']['post'] == '1') OR (is_page() AND $options['where']['page'] == '1' ) OR (is_home() AND $options['where']['home'] == '1' )) {
               global $post;

				
				
				//print_r($options['network']);
                
				$sort = $options['sort'];
				$sort = explode(',',$sort);
				//print_r($sort);
				$sort = str_replace('sort_', '', $sort);
				
				if($sort[0] != ''){
				} else {
					$sort = array_keys($options['network']);
				}
				
				$display_counter = $options['display_counter'];
				if($display_counter == '1'){
					$counters = share_counter();
					//print_r($counters);
					//echo 'countfacebook '.$counters['facebook'];
						
				}
					
				//print_r($sort);
				//print_r($options['network']);
				
				$forme = $options['scsb_forme'];
				$round = $options['scsb_round'];
                $size = $options['scsb_size'];
                $icon = $options['scsb_icon'];
                $backgroundraw = $options['scsb_background'];
                $hoverraw = $options['scsb_hover'];
				$twitter_username = $options['twitter']['username'];
				if($twitter_username == ''){
					$viatwitter = '';
				} else {
					$viatwitter = 'via';
				}
                $text_before_buttons = $options['text_before_buttons'];
				if($text_before_buttons != ''){
					$text_before_buttons = '<span class="scsb_text_before_buttons">'.$options['text_before_buttons'].'</span><br />';
				
				} else {
					$text_before_buttons = '';
				}
				
				$count_total_on = $options['display_counter_total'];
				if($display_counter == '1'){
					$count_total = $counters['total'];
				}
				$count_total_text = $options['display_counter_total_text'];
				$count_format = $options['count_number_format'];
				
				
				$share_URL = get_permalink();
                $share_title = str_replace( ' ', '%20', get_the_title());
                $share_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                $share_excerpt = strip_tags(henri_cleanCut(get_the_content(), 300));
                
                $options['share']['twitter'] = 'https://twitter.com/intent/tweet?text='.$share_title.'&amp;url='.$share_URL.'&amp;'.$viatwitter.'='.$twitter_username.'';
                $options['share']['facebook'] = 'https://www.facebook.com/sharer/sharer.php?u='.$share_URL;
                $options['share']['google-plus'] = 'https://plus.google.com/share?url='.$share_URL;
                $options['share']['pinterest'] = 'https://pinterest.com/pin/create/button/?url='.$share_URL.'&amp;media='.$share_thumbnail[0].'&amp;description='.$share_excerpt;
                $options['share']['linkedin'] = 'https://www.linkedin.com/shareArticle?mini=true&url='.$share_URL.'/&title='.$share_title.'&summary=&source=';
                $options['share']['whatsapp'] = 'whatsapp://send?text='.$share_title.' à lire ici '.$share_URL;

                /*
				if(strstr($_SERVER['HTTP_USER_AGENT'],'Android') || strstr($_SERVER['HTTP_USER_AGENT'],'webOS') || strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod')){
                    
                } else {
                */
					$content1 = '<div class="scsb_sharebuttons">';
                    $content1 .= '<div class="clear"></div>';
                    $content1 .= $text_before_buttons;
					if($display_counter == '1'){
						if($count_total_on != '' AND $count_total != ''){
							if($forme == 'scsb_square'){

								$content1 .= '<div class="scsb_button scsb_height_square_'.$size.'"><a href="#" onclick="return false;" class="scsb_btnz scsb_square_'.$size.' '.$size.' scsb_round scsb_totalshare scsb_share"><span class="totalshare">'.custom_number_format($count_total,1,$count_format).' <span class="totalshare_text">'.$count_total_text.'</span></span></a></div>';

							} else {

								$content1 .= '<div class="scsb_button scsb_height_rectangle"><a href="#" onclick="return false;" class="scsb_btnz scsb_rectangle '.$size.' scsb_round scsb_totalshare scsb_totalshare_rectangle scsb_share"><span class="totalshare">'.custom_number_format($count_total,1,$count_format).' <span class="totalshare_text">'.$count_total_text.'</span></span></a></div>';
							}

						}
					}
					foreach($sort as $network){
						
						$networkvalid = $options['network'][$network];
						
						if($networkvalid == '1'){
							
							if($backgroundraw == 'scsb_officialcolor'){$background = 'scsb_'.$network; } 
							else if($backgroundraw == 'scsb_noback_social'){$background = 'scsb_noback_social_'.$network.'';} 
							else {$background = $backgroundraw;};
							
							if($hoverraw == 'scsb_socialhover'){$hover = 'scsb_'.$network.'_hover';} 
							else if($hoverraw == 'scsb_noback_social_hover'){$hover = 'scsb_noback_social_hover_'.$network;} 
							else {$hover = $hoverraw;};
							
							if($icon == 'scsb_noicon'){$text = $options['name'][$network];} else {$text = '<i class="fa fa-'.$network.'"></i> '.$options['name'][$network];};

							//circle buttons
							if($forme == 'scsb_circle'){
								$circle = 'fa-circle';
								
								if(isset($counters[$network]) AND $counters[$network] != ''){
									$counter = '<span class="scsb_counter_circle">'.custom_number_format($counters[$network],1,$count_format).'</span>';
								} else {
									$counter = '';
								}
								
								if(($backgroundraw == 'scsb_dark' OR $backgroundraw == 'scsb_grey') AND $hoverraw == 'scsb_noback_social_hover'){$background = $backgroundraw.'_circle'; $hover = 'social_icon_noback_'.$network; $nobackground = '';}
								else if(($backgroundraw == 'scsb_dark' OR $backgroundraw == 'scsb_grey') AND $hoverraw == 'scsb_noback_dark_hover'){$background = $backgroundraw.'_circle'; $hover = 'black_icon_noback'; $nobackground = '';}
								else if($backgroundraw == 'scsb_officialcolor' AND $hoverraw == 'scsb_noback_dark_hover'){$background = 'scsb_'.$network.'_circle'; $hover = 'black_icon_noback'; $nobackground = '';}
								else if($backgroundraw == 'scsb_officialcolor' AND $hoverraw == 'scsb_noback_social_hover'){$background = 'scsb_'.$network.'_circle'; $hover = 'social_icon_noback_'.$network; $nobackground = '';}
								else if($backgroundraw == 'scsb_officialcolor'){$background = 'scsb_'.$network.'_circle'; $nobackground = '';} 
								else if($backgroundraw == 'scsb_noback_social'){$circle = 'fa-circle-thin';$nobackground = 'scsb_'.$network.'_circle';}
								else if($backgroundraw == 'scsb_noback_dark'){$circle = 'fa-circle-thin';$nobackground = '';}
								else if($backgroundraw == 'scsb_dark' AND $hover == 'scsb_noback_social_hover'){$circle = 'fa-circle-thin';$nobackground = '';}
								else {$background = $backgroundraw.'_circle'; $nobackground = '';};

								if($backgroundraw == 'scsb_grey' OR $backgroundraw == 'scsb_noback_social' OR $backgroundraw == 'scsb_noback_dark'){$backgroundicon = ''; } else {$backgroundicon = 'fa-inverse';};

								if(($hover == 'scsb_nohover' AND $background == 'scsb_'.$network.'_circle')){$hover = 'scsb_'.$network.'_hover';};
								if(($hover == 'scsb_nohover' AND $background == 'scsb_noback_social_'.$network)){$hover = 'scsb_noback_'.$network.'_hover';};
								if(($hover == 'scsb_nohover' AND $background == 'scsb_dark_circle')){$hover = 'scsb_greyhover';};

								$content1 .= '<div class="scsb_button"><a class="scsb_share" href="'.$options['share'][$network].'"><span class="fa-stack fa-lg"><i class="fa '.$circle.' fa-stack-2x '.$background.' '.$hover.'2"></i>
	  <i class="fa fa-'.$network.' fa-stack-1x '.$nobackground.' '.$backgroundicon.' '.$hover.'3 '.$size.'"></i></span>'.$counter.'</a></div>';

							//square buttons
							} else if($forme == 'scsb_square'){
								if(isset($counters[$network]) AND $counters[$network] != ''){
									$counter = '<span class="scsb_counter_square">'.custom_number_format($counters[$network],1,$count_format).'</span>';
								} else {
									$counter = '';
								}

								$content1 .= '<div class="scsb_button scsb_height_square_'.$size.'"><a class="scsb_btnz '.$forme.'_'.$size.' '.$size.' '.$round.' '.$background.' '.$hover.' scsb_share" href="'.$options['share'][$network].'"><i class="fa fa-'.$network.' fa_square"></i>'.$counter.'</a></div>';

							//noborder buttons
							} else if($forme == 'scsb_noborder'){
								if(isset($counters[$network]) AND $counters[$network] != ''){
									$counter = '<span class="scsb_counter_noborder">'.custom_number_format($counters[$network],1,$count_format).'</span>';
								} else {
									$counter = '';
								}
								
								$text = '<i class="fa fa-'.$network.'"></i>';
							
								$content1 .= '<div class="scsb_button scsb_height_noborder"><a class="scsb_btnz '.$forme.' '.$size.' '.$round.' '.$background.' '.$hover.' scsb_share" href="'.$options['share'][$network].'">'.$text.''.$counter.'</a></div>';

							
							//rectangle buttons
							} else {
								if(isset($counters[$network]) AND $counters[$network] != ''){
									$counter = '<span class="scsb_counter_rectangle">'.custom_number_format($counters[$network],1,$count_format).'</span>';
								} else {
									$counter = '';
								}

								$content1 .= '<div class="scsb_button scsb_height_rectangle"><a class="scsb_btnz '.$forme.' '.$size.' '.$round.' '.$background.' '.$hover.' scsb_share" href="'.$options['share'][$network].'">'.$text.''.$counter.'</a></div>';
							}
						}
					}
					
                    $content1 .= '<div class="clear"></div>';
                    $content1 .= '</div>';
					$content .= $content1;
					//$content1 .= $content;
					//$content = $content1;
                    
                //}

            }
            return $content;
        }
        
		function henri_share_button_2803_before($content) {

			if( is_single() OR is_page() OR is_home()){
				$options = get_option('wp-scsb');
                //print_r($options);
			}
            if ( (is_single() AND $options['where']['post'] == '1') OR (is_page() AND $options['where']['page'] == '1' ) OR (is_home() AND $options['where']['home'] == '1' )) {
               global $post;

				
				
				//print_r($options['network']);
                
				$sort = $options['sort'];
				$sort = explode(',',$sort);
				//print_r($sort);
				$sort = str_replace('sort_', '', $sort);
				
				if($sort[0] != ''){
				} else {
					$sort = array_keys($options['network']);
				}
				
				$display_counter = $options['display_counter'];
				if($display_counter == '1'){
					$counters = share_counter();
					//print_r($counters);
					//echo 'countfacebook '.$counters['facebook'];
						
				}
					
				//print_r($sort);
				//print_r($options['network']);
				
				$forme = $options['scsb_forme'];
				$round = $options['scsb_round'];
                $size = $options['scsb_size'];
                $icon = $options['scsb_icon'];
                $backgroundraw = $options['scsb_background'];
                $hoverraw = $options['scsb_hover'];
				$twitter_username = $options['twitter']['username'];
				if($twitter_username == ''){
					$viatwitter = '';
				} else {
					$viatwitter = 'via';
				}
                $text_before_buttons = $options['text_before_buttons'];
				if($text_before_buttons != ''){
					$text_before_buttons = '<span class="scsb_text_before_buttons">'.$options['text_before_buttons'].'</span><br />';
				
				} else {
					$text_before_buttons = '';
				}
				
				if($display_counter == '1'){
					$count_total_on = $options['display_counter_total'];
					$count_total = $counters['total'];
					$count_total_text = $options['display_counter_total_text'];
					$count_format = $options['count_number_format'];
				}
				
				$share_URL = get_permalink();
                $share_title = str_replace( ' ', '%20', get_the_title());
                $share_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                $share_excerpt = strip_tags(henri_cleanCut(get_the_content(), 300));
                
                $options['share']['twitter'] = 'https://twitter.com/intent/tweet?text='.$share_title.'&amp;url='.$share_URL.'&amp;'.$viatwitter.'='.$twitter_username.'';
                $options['share']['facebook'] = 'https://www.facebook.com/sharer/sharer.php?u='.$share_URL;
                $options['share']['google-plus'] = 'https://plus.google.com/share?url='.$share_URL;
                $options['share']['pinterest'] = 'https://pinterest.com/pin/create/button/?url='.$share_URL.'&amp;media='.$share_thumbnail[0].'&amp;description='.$share_excerpt;
                $options['share']['linkedin'] = 'https://www.linkedin.com/shareArticle?mini=true&url='.$share_URL.'/&title='.$share_title.'&summary=&source=';
                $options['share']['whatsapp'] = 'whatsapp://send?text='.$share_title.' à lire ici '.$share_URL;

                /*
				if(strstr($_SERVER['HTTP_USER_AGENT'],'Android') || strstr($_SERVER['HTTP_USER_AGENT'],'webOS') || strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod')){
                    
                } else {
                */
					$content1 = '<div class="scsb_sharebuttons">';
                    $content1 .= '<div class="clear"></div>';
                    $content1 .= $text_before_buttons;
					if($display_counter == '1'){
						if($count_total_on != '' AND $count_total != ''){
							if($forme == 'scsb_square'){

								$content1 .= '<div class="scsb_button scsb_height_square_'.$size.'"><a href="#" onclick="return false;" class="scsb_btnz scsb_square_'.$size.' '.$size.' scsb_round scsb_totalshare scsb_share"><span class="totalshare">'.custom_number_format($count_total,1,$count_format).' <span class="totalshare_text">'.$count_total_text.'</span></span></a></div>';

							} else {

								$content1 .= '<div class="scsb_button scsb_height_rectangle"><a href="#" onclick="return false;" class="scsb_btnz scsb_rectangle '.$size.' scsb_round scsb_totalshare scsb_totalshare_rectangle scsb_share"><span class="totalshare">'.custom_number_format($count_total,1,$count_format).' <span class="totalshare_text">'.$count_total_text.'</span></span></a></div>';
							}

						}
					}
					foreach($sort as $network){
						
						$networkvalid = $options['network'][$network];
						
						if($networkvalid == '1'){
							
							if($backgroundraw == 'scsb_officialcolor'){$background = 'scsb_'.$network; } 
							else if($backgroundraw == 'scsb_noback_social'){$background = 'scsb_noback_social_'.$network.'';} 
							else {$background = $backgroundraw;};
							
							if($hoverraw == 'scsb_socialhover'){$hover = 'scsb_'.$network.'_hover';} 
							else if($hoverraw == 'scsb_noback_social_hover'){$hover = 'scsb_noback_social_hover_'.$network;} 
							else {$hover = $hoverraw;};
							
							if($icon == 'scsb_noicon'){$text = $options['name'][$network];} else {$text = '<i class="fa fa-'.$network.'"></i> '.$options['name'][$network];};

							//circle buttons
							if($forme == 'scsb_circle'){
								$circle = 'fa-circle';
								
								if(isset($counters[$network]) AND $counters[$network] != ''){
									$counter = '<span class="scsb_counter_circle">'.custom_number_format($counters[$network],1,$count_format).'</span>';
								} else {
									$counter = '';
								}
								
								if(($backgroundraw == 'scsb_dark' OR $backgroundraw == 'scsb_grey') AND $hoverraw == 'scsb_noback_social_hover'){$background = $backgroundraw.'_circle'; $hover = 'social_icon_noback_'.$network; $nobackground = '';}
								else if(($backgroundraw == 'scsb_dark' OR $backgroundraw == 'scsb_grey') AND $hoverraw == 'scsb_noback_dark_hover'){$background = $backgroundraw.'_circle'; $hover = 'black_icon_noback'; $nobackground = '';}
								else if($backgroundraw == 'scsb_officialcolor' AND $hoverraw == 'scsb_noback_dark_hover'){$background = 'scsb_'.$network.'_circle'; $hover = 'black_icon_noback'; $nobackground = '';}
								else if($backgroundraw == 'scsb_officialcolor' AND $hoverraw == 'scsb_noback_social_hover'){$background = 'scsb_'.$network.'_circle'; $hover = 'social_icon_noback_'.$network; $nobackground = '';}
								else if($backgroundraw == 'scsb_officialcolor'){$background = 'scsb_'.$network.'_circle'; $nobackground = '';} 
								else if($backgroundraw == 'scsb_noback_social'){$circle = 'fa-circle-thin';$nobackground = 'scsb_'.$network.'_circle';}
								else if($backgroundraw == 'scsb_noback_dark'){$circle = 'fa-circle-thin';$nobackground = '';}
								else if($backgroundraw == 'scsb_dark' AND $hover == 'scsb_noback_social_hover'){$circle = 'fa-circle-thin';$nobackground = '';}
								else {$background = $backgroundraw.'_circle'; $nobackground = '';};

								if($backgroundraw == 'scsb_grey' OR $backgroundraw == 'scsb_noback_social' OR $backgroundraw == 'scsb_noback_dark'){$backgroundicon = ''; } else {$backgroundicon = 'fa-inverse';};

								if(($hover == 'scsb_nohover' AND $background == 'scsb_'.$network.'_circle')){$hover = 'scsb_'.$network.'_hover';};
								if(($hover == 'scsb_nohover' AND $background == 'scsb_noback_social_'.$network)){$hover = 'scsb_noback_'.$network.'_hover';};
								if(($hover == 'scsb_nohover' AND $background == 'scsb_dark_circle')){$hover = 'scsb_greyhover';};

								$content1 .= '<div class="scsb_button"><a class="scsb_share" href="'.$options['share'][$network].'"><span class="fa-stack fa-lg"><i class="fa '.$circle.' fa-stack-2x '.$background.' '.$hover.'2"></i>
	  <i class="fa fa-'.$network.' fa-stack-1x '.$nobackground.' '.$backgroundicon.' '.$hover.'3 '.$size.'"></i></span>'.$counter.'</a></div>';

							//square buttons
							} else if($forme == 'scsb_square'){
								if(isset($counters[$network]) AND $counters[$network] != ''){
									$counter = '<span class="scsb_counter_square">'.custom_number_format($counters[$network],1,$count_format).'</span>';
								} else {
									$counter = '';
								}

								$content1 .= '<div class="scsb_button scsb_height_square_'.$size.'"><a class="scsb_btnz '.$forme.'_'.$size.' '.$size.' '.$round.' '.$background.' '.$hover.' scsb_share" href="'.$options['share'][$network].'"><i class="fa fa-'.$network.' fa_square"></i>'.$counter.'</a></div>';

							//noborder buttons
							} else if($forme == 'scsb_noborder'){
								if(isset($counters[$network]) AND $counters[$network] != ''){
									$counter = '<span class="scsb_counter_noborder">'.custom_number_format($counters[$network],1,$count_format).'</span>';
								} else {
									$counter = '';
								}
								
								$text = '<i class="fa fa-'.$network.'"></i>';
							
								$content1 .= '<div class="scsb_button scsb_height_noborder"><a class="scsb_btnz '.$forme.' '.$size.' '.$round.' '.$background.' '.$hover.' scsb_share" href="'.$options['share'][$network].'">'.$text.''.$counter.'</a></div>';

							
							//rectangle buttons
							} else {
								if(isset($counters[$network]) AND $counters[$network] != ''){
									$counter = '<span class="scsb_counter_rectangle">'.custom_number_format($counters[$network],1,$count_format).'</span>';
								} else {
									$counter = '';
								}

								$content1 .= '<div class="scsb_button scsb_height_rectangle"><a class="scsb_btnz '.$forme.' '.$size.' '.$round.' '.$background.' '.$hover.' scsb_share" href="'.$options['share'][$network].'">'.$text.''.$counter.'</a></div>';
							}
						}
					}
					
                    $content1 .= '<div class="clear"></div>';
                    $content1 .= '</div>';
					//$content .= $content1;
					$content1 .= $content;
					$content = $content1;
                    
                //}

            }
            return $content;
        }
        
		$options = get_option('wp-scsb');
        if($options['location']['before'] == '1'){
			add_action('the_content','henri_share_button_2803_before');
		}
		if($options['location']['after'] == '1'){
			add_action('the_content','henri_share_button_2803_after');
		}	
		
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wp_Scsb_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
