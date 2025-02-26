<?php
  /**
 * Plugin Name: Goo Share This
 * Plugin URI: www.gootools.net/wordpress-plugins/goo-share-this/
 * Description: This plugin adds social button for sharing post on social media [goo-share-this]
 * Version: 1.1.0
 * Author: Aleksandar Milivojevic
 * Author URI: www.gootools.net/
 * License: GPL2
 */
 
 // ------------------ NO DIRECT ACCESS
 if ( !function_exists( 'add_action' ) ) 
     {
        echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
        die();
     }
 
  // ------------------ quick settings page    
 if ( ! function_exists( 'goosharethis_add_settings_link' ) )
    {
         function goosharethis_add_settings_link( $links ) 
             {
                $settings_link = '<a href="admin.php?page=goo-sharethis-plugin-settings">' . __( 'Settings' ) . '</a>';
                array_unshift( $links, $settings_link );
                  return $links;
             }
        $plugin = plugin_basename( __FILE__ );
        add_filter( "plugin_action_links_$plugin", 'goosharethis_add_settings_link' );
    }

 
 
 
 function goo_enqueued_assets() 
    {
        wp_enqueue_style( 'goo-style', plugin_dir_url( __FILE__ ).'style/goo_share_this.css' );
        wp_enqueue_script( 'goo-script', plugin_dir_url( __FILE__ ) . 'js/goo_share_this.js', array( 'jquery' ), '1.0', true );
    }

 function goo_sharer() //($atts) 
    {
          if( is_singular() ) 
            {  
                $plugin = new goo_sharethis_class();
                if ( $plugin->options['shortcode'] == '1' )
                    {
                        $post_id = get_the_ID();
                        $temp_arr = explode( ',', str_replace( ' ', '', $plugin->options['exclude'] ) );
                        if ( $post_id != false && in_array( $post_id, $temp_arr ) ) { return ''; }  //exclude
                        return $plugin->html_plugin(); 
                    }
                    else
                    {
                        return '';
                    }
                
            }
          return '';
    }
 
 function goo_sharer_no_shortcode($post_content)
    {
        $plugin = new goo_sharethis_class();
        if ($plugin->amx_c() != $plugin->amx_k() )  { return $post_content; }
        if ( $plugin->options['pages'] != '1' && is_page() ) { return $post_content; }
        
        $post_id = get_the_ID();
        $temp_arr = explode( ',', str_replace( ' ', '', $plugin->options['exclude'] ) );
        if ( $post_id != false && in_array( $post_id, $temp_arr ) ) { return $post_content; }
        
        if ( $plugin->options['beggining'] == '1' ) { $post_content = $plugin->html_plugin().$post_content; }
        if ( $plugin->options['bottom'] == '1' ) { $post_content.= $plugin->html_plugin(); }    

        return $post_content;
    }
 
 
 if ( is_admin() ) 
     {
        require_once( plugin_dir_path( __FILE__ ) . 'admin.php' );
     }
 
 
 function goo_share_this_activate() {

    $chk_opt = get_option('goosh_options');
	if ( $chk_opt === false )
		{
			$plugin = new goo_sharethis_class();
			add_option('goosh_options', $plugin->options);
			unset ($plugin);
		}
}
register_activation_hook( __FILE__, 'goo_share_this_activate' );
 
 
//------------------------ACTIONS------------------------------->>>> 
    
 add_shortcode('goo-share-this', 'goo_sharer');
 
 add_action( 'wp_enqueue_scripts', 'goo_enqueued_assets' );
 
 add_filter( 'the_content', 'goo_sharer_no_shortcode'); 
 
//------------------------------------------------------------<<<<<  
    
   class goo_sharethis_class
    {
        public $options = array();
        private $permalink_encoded;
        
        
        
        public function __construct()
            {
                $default_options = $this->goo_sharethis_default_options();
                $this->options = get_option('goosh_options', $default_options); 
                if ( !isset($this->options['version']) || $this->options['version'] < $default_options['version'] ) { $this->options = $this->option_compatibility( $default_options, $this->options ); }   //compatibility check
                $permalink = get_permalink();
                $this->permalink_encoded = urlencode( $permalink );    
            }
            
        public function amx_a($arr)
            {
                if ( !isset($arr['checksum']) || !isset($arr['status']) ) { return; }
                if ( $arr['status'] == '1' ) 
	                {
	                	 $this->options['product_info']['checksum'] = $arr['checksum']; 
						 $this->options['product_info']['activated'] = time();
						 $this->options['product_info']['check'] = 0; 
					}
            }
            
        public function amx_k()
            {
                $str_arr = str_split( $this->options['product_info']['name'] );
                $sum = 0;
                foreach ( $str_arr as $key => $value )
                    {
                        $sum+=ord($value);
                    }
                return floor($sum/$this->options['product_info']['divider']);
            }
            
        public function amx_c()
            {
                if ( $this->options['product_info']['amx'] == '' ) { return -1;}
                $str_arr = str_split( $this->options['product_info']['amx'] );
                $chk = 0;
                foreach ( $str_arr as $key => $value )
                    {
                        $chk+=ord($value);
                    }
                return $chk;
            }

		public function amx_p($arr)
			{
				if ( !isset($arr['checksum']) || !isset($arr['status']) ) { return ''; }
				
				if ( isset($arr['err_msg']) )
					{
						$this->options['product_info']['amx'] = '';
						$this->options['product_info']['checksum'] = 0;
						return $arr['err_msg'];
					}
					
				return '';
			}
            
        private function amx_option_resolve($key)
            {
                if ( $this->amx_c() == $this->amx_k() )
                    {
                        return '';
                    }
                    else
                    {
                        if ( $key >=4 )
                            {
                                return ' disabled="disabled" ' ;
                            }
                            else
                            {
                                return '';
                            }
                    }
            }
            
        private function amx_advanced_resolve( $adv='advanced' )
            {
                if ( $this->amx_c() == $this->amx_k() )
                    {
                        return '';
                    }
                    else
                    {
                        return ' disabled="disabled" ';
                    }
            }
        
        private function option_compatibility($default_options, $old_options)  //return options array()
            {
                //safely transit default to existing options, version differences, plain installation... 
                $new_options = $default_options;
                foreach ( $default_options as $key => $value )
                    {
                        if ( isset($old_options[$key]['display']) ) { $new_options[$key]['display'] = $old_options[$key]['display']; }
                    }
                if ( isset($old_options['effect']) ) { $new_options['effect'] = $old_options['effect']; }
                
                if ( isset($old_options['shortcode']) ) { $new_options['shortcode'] = $old_options['shortcode']; } 
                if ( isset($old_options['beggining']) ) { $new_options['beggining'] = $old_options['beggining']; } 
                if ( isset($old_options['bottom']) ) { $new_options['bottom'] = $old_options['bottom']; } 
                if ( isset($old_options['pages']) ) { $new_options['pages'] = $old_options['pages']; } 
                if ( isset($old_options['exclude']) ) { $new_options['exclude'] = $old_options['exclude']; }
                
                if ( isset($old_options['product_info']) ) { $new_options['product_info'] = $old_options['product_info']; }
                    
                return $new_options;
            } 
            
        public function html_plugin()   //return string
            {
                //plugin HTML output (via string)
                $ret_value = '';
                $this->amx_options();
                switch ( $this->options['effect'] )
                    {
                        case 0:  //square
                            $cache_imges = '';  
                            foreach ( $this->options as $key => $value )
                                {
                                    if ( isset($value['display']) && $value['display'] == '1' )
                                        {
                                            $imgs = explode( ', ', $value['images'] ); //image index 0 and 1
                                            $ret_value = '<a href="'.$value['url'].$this->permalink_encoded.'" target="_blank" title="'.$value['title'].'"><span class="goosharethis_span" style="background-image: url(\''.plugin_dir_url( __FILE__ ).'images/'.$imgs[0].'\');" data-alt-src="url('.plugin_dir_url( __FILE__ ).'images/'.$imgs[1].')"></span></a>'.$ret_value;
                                            $cache_imges.='<img src="'.plugin_dir_url( __FILE__ ).'images/'.$imgs[1].'" alt="">';
                                            
                                        }    
                                }
                            $ret_value = '<div class="goosharethis_container">'.$ret_value.'</div>
                                          <span class="goosharethis_cache_img">'.$cache_imges.'</span>';
                            break;
                        
                        case 1:  //circle
                            $cache_imges = '';  
                            foreach ( $this->options as $key => $value )
                                {
                                    if ( isset($value['display']) && $value['display'] == '1' )
                                        {
                                            $imgs = explode( ', ', $value['images'] ); //image index 0 and 1
                                            $ret_value = '<a href="'.$value['url'].$this->permalink_encoded.'" target="_blank" title="'.$value['title'].'"><span class="goosharethis_span" style="border-radius:25px; background-image: url(\''.plugin_dir_url( __FILE__ ).'images/'.$imgs[0].'\');" data-alt-src="url('.plugin_dir_url( __FILE__ ).'images/'.$imgs[1].')"></span></a>'.$ret_value;
                                            $cache_imges.='<img src="'.plugin_dir_url( __FILE__ ).'images/'.$imgs[1].'" alt="">';
                                            
                                        }    
                                }
                            $ret_value = '<div class="goosharethis_container">'.$ret_value.'</div>
                                          <span class="goosharethis_cache_img">'.$cache_imges.'</span>';
                            break;
                            
                        case 2:  //chain horizontal square
                            foreach ( $this->options as $key => $value )
                                {
                                    if ( isset($value['display']) && $value['display'] == '1' )
                                        {
                                            $imgs = explode( ', ', $value['images'] ); //image index 0 and 1
                                            $ret_value = '<div class="goosh_chainH_container"><a href="'.$value['url'].$this->permalink_encoded.'" target="_blank" title="'.$value['title'].'"><span class="chainH" style="background-image: url(\''.plugin_dir_url( __FILE__ ).'images/'.$imgs[0].'\');"></span><span class="chainH" style="background-image: url(\''.plugin_dir_url( __FILE__ ).'images/'.$imgs[1].'\');"></span></a></div>'.$ret_value;
                                            
                                        }    
                                }
                            $ret_value = '<div class="goosharethis_container">'.$ret_value.'</div>';
                            break;
                        
                        case 3:  //chain horizontal round
                            foreach ( $this->options as $key => $value )
                                {
                                    if ( isset($value['display']) && $value['display'] == '1' )
                                        {
                                            $imgs = explode( ', ', $value['images'] ); //image index 0 and 1
                                            $ret_value = '<div class="goosh_chainH_container"><a href="'.$value['url'].$this->permalink_encoded.'" target="_blank" title="'.$value['title'].'"><span class="chainH" style="border-radius:25px; background-image: url(\''.plugin_dir_url( __FILE__ ).'images/'.$imgs[0].'\');"></span><span class="chainH" style="border-radius:25px; background-image: url(\''.plugin_dir_url( __FILE__ ).'images/'.$imgs[1].'\');"></span></a></div>'.$ret_value;
                                            
                                        }    
                                }
                            $ret_value = '<div class="goosharethis_container">'.$ret_value.'</div>';
                            break;
                        
                        case 4:  //square shadow
                            foreach ( $this->options as $key => $value )
                                {
                                    if ( isset($value['display']) && $value['display'] == '1' )
                                        {
                                            $imgs = explode( ', ', $value['images'] ); //image index 0 and 1
                                            $ret_value = '<a href="'.$value['url'].$this->permalink_encoded.'" target="_blank" title="'.$value['title'].'"><span class="goosh_SquareShadow" style="background-image: url(\''.plugin_dir_url( __FILE__ ).'images/'.$imgs[1].'\');"></span></a>'.$ret_value;
                                            
                                        }    
                                }
                            $ret_value = '<div class="goosharethis_container">'.$ret_value.'</div>';
                            break;
                        
                        case 5:  //circle shadow
                            foreach ( $this->options as $key => $value )
                                {
                                    if ( isset($value['display']) && $value['display'] == '1' )
                                        {
                                            $imgs = explode( ', ', $value['images'] ); //image index 0 and 1
                                            $ret_value = '<a href="'.$value['url'].$this->permalink_encoded.'" target="_blank" title="'.$value['title'].'"><span class="goosh_SquareShadow" style="border-radius:25px; background-image: url(\''.plugin_dir_url( __FILE__ ).'images/'.$imgs[1].'\');"></span></a>'.$ret_value;
                                            
                                        }    
                                }
                            $ret_value = '<div class="goosharethis_container">'.$ret_value.'</div>';
                            break;
                            
                        case 6:  //square trasparent
                            foreach ( $this->options as $key => $value )
                                {
                                    if ( isset($value['display']) && $value['display'] == '1' )
                                        {
                                            $imgs = explode( ', ', $value['images'] ); //image index 0 and 1
                                            $ret_value = '<div class="goosh_SquareTransparent" style="background-image: url(\''.plugin_dir_url( __FILE__ ).'images/'.$imgs[1].'\');"><a href="'.$value['url'].$this->permalink_encoded.'" target="_blank" title="'.$value['title'].'"><span class="goosh_transparent"></span></a></div>'.$ret_value;
                                            
                                        }    
                                }
                            $ret_value = '<div class="goosharethis_container">'.$ret_value.'</div>';
                            break;
                        
                        case 7:  //round trasparent
                            foreach ( $this->options as $key => $value )
                                {
                                    if ( isset($value['display']) && $value['display'] == '1' )
                                        {
                                            $imgs = explode( ', ', $value['images'] ); //image index 0 and 1
                                            $ret_value = '<div class="goosh_SquareTransparent" style="border-radius:25px; background-image: url(\''.plugin_dir_url( __FILE__ ).'images/'.$imgs[1].'\');"><a href="'.$value['url'].$this->permalink_encoded.'" target="_blank" title="'.$value['title'].'"><span class="goosh_transparent"></span></a></div>'.$ret_value;
                                            
                                        }    
                                }
                            $ret_value = '<div class="goosharethis_container">'.$ret_value.'</div>';
                            break;
                                        
                        default:  //unknown case
                            return;   
                        
                    }
                
                    
                $ret_value = str_replace(array("\r", "\n"), '', $ret_value);
                return $ret_value;  
            }
        public function amx_options()
            {
                if ( $this->amx_c() == $this->amx_k() )
                    {
                        return ;
                    }
                    else
                    {
                        $default_opt_arr = $this->goo_sharethis_default_options();
                        if ( $this->options['effect'] > 3 ) { $this->options['effect'] = $default_opt_arr['effect']; }
                        $this->options['shortcode'] = $default_opt_arr['shortcode'] ;
                        $this->options['beggining'] = $default_opt_arr['beggining'] ;
                        $this->options['bottom'] = $default_opt_arr['bottom'] ;  
                        $this->options['pages'] = $default_opt_arr['pages'] ;
                        $this->options['exclude'] = $default_opt_arr['exclude'] ; 
                        return ; 
                    }
            }
            
        public function html_admin()  //no return data
            {
                //HTML output
                ?>
            <div class="wrap">
            <h2><?php echo $this->options['product_info']['name']; ?> - Plugin Settings</h2>
            <p>Developed by <a href="<?php echo $this->options['product_info']['plugin_site']; ?>" target="_blank">Goo Tools</a> :: Visit official <a href="<?php echo $this->options['product_info']['plugin_page']; ?>" target="_blank">plugin page</a> with instructions </p>
            <form method="post" action="options.php">
                <?php settings_fields( 'goo-sharethis-settings-group' ); ?>
                <?php do_settings_sections( 'goo-sharethis-settings-group' ); ?>
                <p style="font-size:16px;">
                <?php
                if ( $this->amx_k() != $this->amx_c() )
                    {
                ?>
                    <span style="font-weight: 600;">Insert activation code to unlock all plugin features: </span>
                    <input style="font-weight: 600;" type="text" id="activation" name="goosh_options[product_info][amx]" />
                    <input style="font-weight: 600;" type="submit" id="delete" class="button button-small" name="goosh_options[activate]" value="Activate"  />
                </p>
                <?php
                    }
                    else
                    {
                    	if ( $this->options['product_info']['check'] == 0 || $this->options['product_info']['check']+1641600 < time() )
							{
								$this->options['product_info']['check'] = time();
								$response = wp_remote_get( esc_url_raw( 'http://www.gootools.net/product_info/'.'customer_service.php?action=check&key='.$this->options['product_info']['amx']).'&product='.str_replace(' ', '',$this->options['product_info']['name']).'&location='.esc_url_raw( home_url() )); 
								$solved_response = json_decode($response['body'], true);
									
								$amx_response = $this->amx_p($solved_response);
								
								if ( $amx_response != '' )
									{
										echo '<span style="font-size:24px;"><b>ERROR:</b> '.$amx_response.'</span>';
										//close tags
										?>
										<span style="display:block">Please contact support@gootools.net for more information!</span>
										</p>
										<input type="hidden" value='<?php echo serialize($this->options['product_info']); ?>' name="goosh_options[product_data]"/>
										<input type="submit" id="check" class="button button-small" name="goosh_options[checked]" value="Back to options" />
										</form>
										</div>
										<?php
										return;
									}
								?>
								<input type="hidden" value="<?php echo $this->options['product_info']['check']; ?>" name="goosh_options[product_info][check]"/>
								<?php	
									

							}
							
							?>
			                <span style="font-weight: 600;">Your plugin is fully activated. Thank you!</span><br>
			                <span style="font-weight: 400;">Your activation code is: <b><u><?php echo $this->options['product_info']['amx']; ?></u></b>, please keep this code hidden.</span> 
			                </p>
			                <?php	
							
                
                    }
                ?>
            <p>
            <span>Use <b>[goo-share-this]</b> shortcode to insert social buttons anywhere in post.</span>
            </p>
            <hr>
            <h3>Select which social buttons to display</h3>
             
            
                <table class="form-table">
                <?php

                foreach ( $this->options as $key => $value )
                    {
                        if ( isset($value['display']) )
                            {
                                ?>
                                <tr valign="top">
                                <th scope="row"><?php echo $value['title']; ?></th>
                                <td><input type="checkbox" name="goosh_options[<?php echo $key; ?>][display]" value="1" <?php if ( $value['display'] == '1' ) {echo 'checked="checked"';} ?>/></td>
                                </tr>
                                <?php
                            }
                    }
                ?>
                </table>
                <hr>
                <h3>Select effect</h3>
                <table class="form-table">
                <tr valign="top">
                    <th scope="row">effects</th>
                    <td>
                        <select name="goosh_options[effect]"> 
                        <?php
                            foreach ( $this->options['effects_name'] as $key => $value )
                                {
                                    ?>
                                    <option value="<?php echo $key; ?>" <?php echo $this->amx_option_resolve($key); if ( $this->options['effect'] == $key ) { echo ' selected '; }?>><?php echo $value; ?></option>
                                    <?php    
                                }
                        ?>
                        </select>
                    </td>
                </tr>
                </table>
                <hr>
                <h3>Advanced options</h3>
                <table class="form-table">
                <tr valign="top">
                    <th scope="row">Shortcode (turn off to ignore shortcode)</th>
                    <td>
                        <input type="checkbox" value="1" name="goosh_options[shortcode]" <?php echo $this->amx_advanced_resolve(); if ( $this->options['shortcode'] == '1' ) {echo 'checked="checked"';} ?> />
                    </td>
                </tr>
                <tr valign="top"> 
                    <th scope="row">Beginning of the every article (auto)</th> 
                    <td>
                        <input type="checkbox" value="1" name="goosh_options[beggining]" <?php echo $this->amx_advanced_resolve(); if ( $this->options['beggining'] == '1' ) {echo 'checked="checked"';} ?> />
                    </td> 
                </tr>
                <tr valign="top"> 
                    <th scope="row">Bottom of the every article (auto)</th> 
                    <td>
                        <input type="checkbox" value="1" name="goosh_options[bottom]" <?php echo $this->amx_advanced_resolve(); if ( $this->options['bottom'] == '1' ) {echo 'checked="checked"';} ?> />
                    </td> 
                </tr>
                <tr valign="top"> 
                    <th scope="row">Include pages (does not interfere with shortcodes)</th> 
                    <td>
                        <input type="checkbox" value="1" name="goosh_options[pages]" <?php echo $this->amx_advanced_resolve(); if ( $this->options['pages'] == '1' ) {echo 'checked="checked"';} ?> />
                    </td> 
                </tr>
                <tr valign="top"> 
                    <th scope="row">Exclude from page/post by ID (separate multiple page/post IDs by comma. Overrides shortcode)</th> 
                    <td>
                        <input type="text" value="<?php echo $this->options['exclude']; ?>" name="goosh_options[exclude]" <?php echo $this->amx_advanced_resolve(); ?>/>
                    </td> 
                </tr>
                </table>
                
                <?php submit_button(); ?>
             
            </form>
            </div>   <?php
            }
            
        private function goo_sharethis_default_options()
            {
                $default_options = array(
                                        'version' => 1.110,
                                        'facebook' => array('display' => '1',
                                                            'title' => 'Facebook',
                                                            'url' => 'https://www.facebook.com/sharer/sharer.php?u=',
                                                            'images' => 'fb_g.png, fb.png'
                                                            ),
                                        'twitter' => array('display' => '1',
                                                           'title' => 'Twitter',
                                                           'url' => 'http://twitter.com/share?url=',
                                                           'images' => 'twitter_g.png, twitter.png'
                                                           ),
                                        'google' => array('display' => '1',
                                                          'title' => 'Google+',
                                                          'url' => 'https://plus.google.com/share?url=',
                                                          'images' => 'google_plus_g.png, google_plus.png'
                                                          ),
                                        'tumblr' => array('display' => '1',
                                                          'title' => 'Tumblr',
                                                          'url' => 'http://www.tumblr.com/share/link?url=',
                                                          'images' => 'tumblr_g.png, tumblr.png'
                                                          ),
                                        'linkedin' => array('display' => '1',
                                                            'title' => 'LinkedIn',
                                                            'url' => 'https://www.linkedin.com/cws/share?url=',
                                                            'images' => 'linked_in_g.png, linked_in.png'
                                                          ),
                                        'vkontakte' => array('display' => '1',
                                                             'title' => 'VKontakte',
                                                             'url' => 'https://vk.com/share.php?url=',
                                                             'images' => 'vk_g.png, vk.png'
                                                          ),
                                        'effect' => 0 , //square
                                        'effects_name' => array ('Square', 'Circle', 'Chain H Square', 'Chain H Round', 'Square Shadow', 'Circle Shadow', 'Square Transparent', 'Circle Transparent'),
                                        'shortcode' => '1',
                                        'beggining' => '0',
                                        'bottom' => '0',
                                        'pages' => '1',
                                        'exclude' => '',
                                        'product_info' => array(
                                                              'amx' => '',
                                                              'divider' => 2,
                                                              'checksum' => 0,
                                                              'name' => 'Goo Share This',
                                                              'plugin_page' => 'http://www.gootools.net/wordpress-plugins/goo-share-this/',
                                                              'plugin_site' => 'http://www.gootools.net/'
                                                             )
                                        
                                        
                                 );
                return $default_options;
            }
    }
                  
?>
