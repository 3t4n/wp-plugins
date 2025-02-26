<?php 

class dc_jqfloatingtweets_widget extends WP_Widget {
    /** constructor */
    function dc_jqfloatingtweets_widget() {
	
		$name =			'Floating Tweets';
		$desc = 		'Create Floating Live Twitter Feeds';
		$id_base = 		'dc_jqfloatingtweets_widget';
		$css_class = 	'';
		$alt_option = 	'widget_dcjq_floating_tweets'; 

		$widget_ops = array(
			'classname' => $css_class,
			'description' => __( $desc, 'dcjq-floating-tweets' ),
		);
		
		$this->WP_Widget($id_base, __($name, 'dcjqfloatingtweets'), $widget_ops);
		$this->alt_option_name = $alt_option;
		
		add_action( 'wp_head', array(&$this, 'styles'), 10, 1 );	
		add_action( 'wp_footer', array(&$this, 'footer'), 10, 1 );	

		$this->defaults = array(
			'title' => '',
			'event' => 'click',
			'width' => 260,
			'location' => 'top',
			'align' => 'left',
			'offsetL' => 50,
			'offsetA' => 50,
			'speedMenu' => 600,
			'speedFloat' => 1500,
			'tabText' => 'Live Tweets',
			'skin' => 'white',
			'nTweets' => 3,
			'replies' => true,
			'twitterLink' => true,
			'linkText' => 'Follow Me',
			'linkOpen' => true,
		);
    }
	
	function widget($args, $instance) {
		extract( $args );

		$widget_options = wp_parse_args( $instance, $this->defaults );
		extract( $widget_options, EXTR_SKIP );
		
		$twitterUrl = $widget_options['twitterUrl'];
		$nTweets = $widget_options['nTweets'];
		$location = $widget_options['location'];
		$twitterLink = $widget_options['twitterLink'];
		$linkText = $widget_options['linkText'];
		
		?>
		<div class="dcjq-floating-tweets" id="<?php echo $this->id.'-item'; ?>">
		
		<?php 
			$corner = '<div class="dc-corner"><span></span></div>';
			if($location == 'bottom'){
				echo $corner;
			}

			$params = array(
				'screen_name'=>$twitterUrl,
				'trim_user'=>true,
				'include_entities'=>false
			);

			/**
			 * The exclude_replies parameter filters out replies on the server. If combined with count it only filters that number of tweets (not all tweets up to the requested count)
			 * If we are not filtering out replies then we should specify our requested tweet count
			 */
			if (!$replies) {
				$params['exclude_replies'] = true;
			} else {
				$params['count'] = $nTweets;
			}
			
			if ($retweets) {
				$params['include_rts'] = true;
			}
			$url_json = esc_url_raw('http://api.twitter.com/1/statuses/user_timeline.json?' . http_build_query($params), array('http', 'https'));
			unset($params);
			
			$response = wp_remote_get($url_json, array('User-Agent' => 'WordPress Floating Tweets'));
			$response_code = wp_remote_retrieve_response_code($response);
			
			if (200 == $response_code){
				$tweets = wp_remote_retrieve_body($response);
				$tweets = json_decode($tweets, true);
				$expire = 900;
				if (!is_array( $tweets ) || isset( $tweets['error'] )){
					$tweets = 'error';
					$expire = 300;
				}
			} else {
				$tweets = 'error';
				$expire = 300;
				wp_cache_add('floating-tweets-response-code-' . $this->number, $response_code,'widget', $expire);
			}

			wp_cache_add('floating-tweets-' . $this->number, $tweets, 'widget', $expire);
		

		if ('error' != $tweets) :
			$before_timesince = ' ';
			if ( isset( $instance['beforetimesince'] ) && !empty( $instance['beforetimesince'] ) )
				$before_timesince = esc_html($instance['beforetimesince']);
			$before_tweet = '';
			if ( isset( $instance['beforetweet'] ) && !empty( $instance['beforetweet'] ) )
				$before_tweet = stripslashes(wp_filter_post_kses($instance['beforetweet']));

			echo '<ul class="floating-tweets">' . "\n";
			$tweets_out = 0;
			foreach ((array) $tweets as $tweet){
				if ($tweets_out >= $nTweets)
					break;
				if (empty( $tweet['text']))
					continue;
				$text = make_clickable(esc_html($tweet['text']));

				/* Twitter regex patterns - http://github.com/mzsanford/twitter-text-rb/blob/master/lib/regex.rb */
				$text = preg_replace_callback('/(^|[^0-9A-Z&\/]+)(#|\xef\xbc\x83)([0-9A-Z_]*[A-Z_]+[a-z0-9_\xc0-\xd6\xd8-\xf6\xf8\xff]*)/iu',  array($this, '_floating_tweets_hashtag'), $text);
				
				$text = preg_replace_callback('/([^a-zA-Z0-9_]|^)([@\xef\xbc\xa0]+)([a-zA-Z0-9_]{1,20})(\/[a-zA-Z][a-zA-Z0-9\x80-\xff-]{0,79})?/u', array($this, '_floating_tweets_username'), $text);
				
				if (isset($tweet['id_str'])){
					$tweet_id = urlencode($tweet['id_str']);
				} else {
					$tweet_id = urlencode($tweet['id']);
				}
				
				if($odd = $tweets_out%2){
					$tweetClass = 'odd';
				} else {
					$tweetClass = 'even';
				}
				
				if($tweets_out == 0){
					$tweetClass .= ' first';
				}
				
				echo "<li class='{$tweetClass}'>{$before_tweet}{$text}{$before_timesince}<a href=\"" . esc_url( "http://twitter.com/{$twitterUrl}/statuses/{$tweet_id}" ) . '" class="time">' . str_replace(' ', '&nbsp;', wpcom_time_since(strtotime($tweet['created_at']))) . "&nbsp;ago</a></li>\n";
				unset($tweet_id);
				$tweets_out++;
			}
			if($twitterLink == true){
				echo "<li class='link-follow'><a href='".esc_url( "http://twitter.com/{$twitterUrl}" )."'>{$linkText}</a></li>";
			}
			echo "</ul>\n";
		else :
			echo '<ul class="floating-tweets"><li>';
			if ( 401 == wp_cache_get( 'floating-tweets-response-code-' . $this->number , 'widget' ) )
				echo esc_html__( 'An Error Occurred: Please make sure the Twitter account is public.') . '</li></ul>';
			else
				echo esc_html__('An Error Occurred: No response from Twitter. Please try again in a few minutes.') . '</li></ul>';
		endif;
		
			if($location == 'top'){
				echo $corner;
			}
		?>
		</div>
		<?php
	}

    /** @see WP_Widget::update */
    function update( $new_instance, $old_instance ) {
		$instance['event'] = $new_instance['event'];
		$instance['width'] = (int) strip_tags( stripslashes($new_instance['width']) );
		$instance['speedMenu'] = (int) strip_tags( stripslashes($new_instance['speedMenu']) );
		$instance['speedFloat'] = (int) strip_tags( stripslashes($new_instance['speedFloat']) );
		$instance['location'] = $new_instance['location'];
		$instance['align'] = $new_instance['align'];
		$instance['offsetL'] = (int) strip_tags( stripslashes($new_instance['offsetL']) );
		$instance['offsetA'] = (int) strip_tags( stripslashes($new_instance['offsetA']) );
		$instance['skin'] = $new_instance['skin'];
		$instance['autoClose'] = $new_instance['autoClose'];
		$instance['tabClose'] = $new_instance['tabClose'];
		$instance['tabText'] = strip_tags( stripslashes($new_instance['tabText']) );
		$instance['twitterUrl'] = strip_tags( stripslashes($new_instance['twitterUrl']) );
		$instance['twitterLink'] = strip_tags( stripslashes($new_instance['twitterLink']) );
		$instance['linkText'] = strip_tags( stripslashes($new_instance['linkText']) );
		$instance['linkOpen'] = strip_tags( stripslashes($new_instance['linkOpen']) );
		$instance['nTweets'] = (int) strip_tags( stripslashes($new_instance['nTweets']) );
		$instance['replies'] = strip_tags( stripslashes($new_instance['replies']) );
		
		return $instance;
	}

    /** @see WP_Widget::form */
    function form($instance) {
		$event = isset( $instance['event'] ) ? $instance['event'] : 'click';
		$width = isset( $instance['width'] ) ? $instance['width'] : '260';
		$speedMenu = isset( $instance['speedMenu'] ) ? $instance['speedMenu'] : '600';
		$speedFloat = isset( $instance['speedFloat'] ) ? $instance['speedFloat'] : '1500';
		$location = isset( $instance['location'] ) ? $instance['location'] : 'top';
		$align = isset( $instance['align'] ) ? $instance['align'] : 'left';
		$offsetL = isset( $instance['offsetL'] ) ? $instance['offsetL'] : '10';
		$offsetA = isset( $instance['offsetA'] ) ? $instance['offsetA'] : '10';
		$skin = isset( $instance['skin'] ) ? $instance['skin'] : '';
		$autoClose = isset( $instance['autoClose'] ) ? $instance['autoClose'] : '';
		$tabClose = isset( $instance['tabClose'] ) ? $instance['tabClose'] : '';
		$tabText = isset( $instance['tabText'] ) ? $instance['tabText'] : 'Twitter';
		$twitterUrl = isset( $instance['twitterUrl'] ) ? $instance['twitterUrl'] : '';
		$twitterLink = isset( $instance['twitterLink'] ) ? $instance['twitterLink'] : 'true';
		$linkText = isset( $instance['linkText'] ) ? $instance['linkText'] : 'Follow Me';
		$nTweets = isset( $instance['nTweets'] ) ? $instance['nTweets'] : '3';
		$replies = isset( $instance['replies'] ) ? $instance['replies'] : 'true';
		$linkOpen = isset( $instance['linkOpen'] ) ? $instance['linkOpen'] : 'true';
		
		$widget_options = wp_parse_args( $instance, $this->defaults );
		extract( $widget_options, EXTR_SKIP );

		?>
	<p>
		<label for="<?php echo $this->get_field_id('twitterUrl'); ?>"><?php _e('Twitter Username:') ?></label>
		<input type="text" id="<?php echo $this->get_field_id('twitterUrl'); ?>" name="<?php echo $this->get_field_name('twitterUrl'); ?>" value="<?php echo $twitterUrl; ?>" />
	</p>
	<p>
	  <label for="<?php echo $this->get_field_id('nTweets'); ?>"><?php _e( 'Number of Tweets' , 'dcjq-floating-tweets' ); ?></label>
		<input type="text" id="<?php echo $this->get_field_id('nTweets'); ?>" name="<?php echo $this->get_field_name('nTweets'); ?>" value="<?php echo $nTweets; ?>" size="4" />
	</p>
	<p>
	  <input type="checkbox" value="true" class="checkbox" id="<?php echo $this->get_field_id('replies'); ?>" name="<?php echo $this->get_field_name('replies'); ?>"<?php checked( $replies, 'true'); ?> />
		<label for="<?php echo $this->get_field_id('replies'); ?>"><?php _e( 'Show Replies' , 'dcjq-floating-tweets' ); ?></label>
	</p>
	<p>
	  <input type="checkbox" value="true" class="checkbox" id="<?php echo $this->get_field_id('linkOpen'); ?>" name="<?php echo $this->get_field_name('linkOpen'); ?>"<?php checked( $linkOpen, 'true'); ?> />
		<label for="<?php echo $this->get_field_id('linkOpen'); ?>"><?php _e( 'Open Links In New Window' , 'dcjq-floating-tweets' ); ?></label>
	</p>
	<p>
	  <input type="checkbox" value="true" class="checkbox" id="<?php echo $this->get_field_id('twitterLink'); ?>" name="<?php echo $this->get_field_name('twitterLink'); ?>"<?php checked( $twitterLink, 'true'); ?> />
		<label for="<?php echo $this->get_field_id('twitterLink'); ?>"><?php _e( 'Add Follow Link' , 'dcjq-floating-tweets' ); ?></label>
	</p>
	<p>
	  <label for="<?php echo $this->get_field_id('linkText'); ?>"><?php _e( 'Link Text' , 'dcjq-floating-tweets' ); ?></label>
		<input type="text" id="<?php echo $this->get_field_id('linkText'); ?>" name="<?php echo $this->get_field_name('linkText'); ?>" value="<?php echo $linkText; ?>" />
	</p>
	<p>
		<input type="radio" id="<?php echo $this->get_field_id('event1'); ?>" name="<?php echo $this->get_field_name('event'); ?>" value="click"<?php checked( $event, 'click' ); ?> /> 
		<label for="<?php echo $this->get_field_id('event1'); ?>"><?php _e( 'Click' , 'dcjq-floating-tweets' ); ?></label>
		<input type="radio" id="<?php echo $this->get_field_id('event2'); ?>" name="<?php echo $this->get_field_name('event'); ?>" value="hover"<?php checked( $event, 'hover' ); ?> /> 
		<label for="<?php echo $this->get_field_id('event2'); ?>"><?php _e( 'Hover' , 'dcjq-floating-tweets' ); ?></label>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('tabText'); ?>"><?php _e('Tab Text:') ?></label>
		<input type="text" id="<?php echo $this->get_field_id('tabText'); ?>" name="<?php echo $this->get_field_name('tabText'); ?>" value="<?php echo $tabText; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width (px):') ?></label>
		<input type="text" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo $width; ?>" />
	</p>
	<p>
	  <label for="<?php echo $this->get_field_id('location'); ?>"><?php _e( 'Location' , 'dcjq-floating-tweets' ); ?></label>
		<select name="<?php echo $this->get_field_name('location'); ?>" id="<?php echo $this->get_field_id('location'); ?>" >
			<option value='top' <?php selected( $location, 'top'); ?> >Top</option>
			<option value='bottom' <?php selected( $location, 'bottom'); ?> >Bottom</option>
		</select>
		<input type="text" id="<?php echo $this->get_field_id('offsetL'); ?>" name="<?php echo $this->get_field_name('offsetL'); ?>" value="<?php echo $offsetL; ?>" size="4" />px
	</p>
	<p>
	  <label for="<?php echo $this->get_field_id('align'); ?>"><?php _e( 'Alignment' , 'dcjq-floating-tweets' ); ?></label>
		<select name="<?php echo $this->get_field_name('align'); ?>" id="<?php echo $this->get_field_id('align'); ?>" >
			<option value='left' <?php selected( $align, 'left'); ?> >Left</option>
			<option value='right' <?php selected( $align, 'right'); ?> >Right</option>
		</select>
		<input type="text" id="<?php echo $this->get_field_id('offsetA'); ?>" name="<?php echo $this->get_field_name('offsetA'); ?>" value="<?php echo $offsetA; ?>" size="4" />px
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('speedFloat'); ?>"><?php _e('Float Speed (ms):') ?></label>
		<input type="text" id="<?php echo $this->get_field_id('speedFloat'); ?>" name="<?php echo $this->get_field_name('speedFloat'); ?>" value="<?php echo $speedFloat; ?>" size="5" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('speedMenu'); ?>"><?php _e('Sliding Speed (ms):') ?></label>
		<input type="text" id="<?php echo $this->get_field_id('speedMenu'); ?>" name="<?php echo $this->get_field_name('speedMenu'); ?>" value="<?php echo $speedMenu; ?>" size="5" />
	</p>
	<p>
	  <input type="checkbox" value="true" class="checkbox" id="<?php echo $this->get_field_id('autoClose'); ?>" name="<?php echo $this->get_field_name('autoClose'); ?>"<?php checked( $autoClose, 'true'); ?> />
		<label for="<?php echo $this->get_field_id('autoClose'); ?>"><?php _e( 'Auto-Close Tab' , 'dcjq-floating-tweets' ); ?></label>
	</p>
	<p>
	  <input type="checkbox" value="false" class="checkbox" id="<?php echo $this->get_field_id('tabClose'); ?>" name="<?php echo $this->get_field_name('tabClose'); ?>"<?php checked( $tabClose, 'false'); ?> />
		<label for="<?php echo $this->get_field_id('tabClose'); ?>"><?php _e( 'Keep Open' , 'dcjq-floating-tweets' ); ?></label>
	</p>
	<p><label for="<?php echo $this->get_field_id('skin'); ?>"><?php _e('Skin:', 'dcjq-floating-tweets'); ?>  <?php 
		
		// http://www.codewalkers.com/c/a/File-Manipulation-Code/List-files-in-a-directory-no-subdirectories/

		echo "<select name='".$this->get_field_name('skin')."' id='".$this->get_field_id('skin')."'>";
		echo "<option value='no-theme' ".selected( $skin, 'no-theme', false).">No theme</option>";
			
		//The path to the style directory
		$dirpath = plugin_dir_path(__FILE__) . 'skins/';	
			
		$dh = opendir($dirpath);
		while (false !== ($file = readdir($dh))) {
			//Don't list subdirectories
			if (!is_dir("$dirpath/$file")) {
				//Remove file extension
				$newSkin = htmlspecialchars(ucfirst(preg_replace('/\..*$/', '', $file)));
				echo "<option value='$newSkin' ".selected($skin, $newSkin, false).">" . $newSkin . '</option>';
			}
		}
		closedir($dh); 
		echo "</select>"; ?> </label><br />
	</p>
	<div class="widget-control-actions alignright">
		<p><small><a href="http://www.designchemical.com/blog/index.php/wordpress-plugins/wordpress-plugin-floating-tweets/"><?php esc_attr_e('Visit plugin site', 'dcjq-floating-tweets'); ?></a></small></p>
	</div>
	
	<?php 
	}
	
	/**
	 * Twitter hashtag link to a search results page on Twitter.com
	 * @param array $matches regex match
	 * @return string Tweet text with inserted #hashtag link
	 */
	function _floating_tweets_hashtag( $matches ) { // $matches has already been through wp_specialchars
		return "$matches[1]<a href='" . esc_url( 'http://twitter.com/search?q=%23' . urlencode( $matches[3] ) ) . "'>#$matches[3]</a>";
	}
	
	/**
	 * Twitter link to user profile.
	 * @param array $matches regex match
	 * @return string Tweet text with inserted @user link
	 */
	function _floating_tweets_username( $matches ) { // $matches has already been through wp_specialchars
		return "$matches[1]@<a href='" . esc_url( 'http://twitter.com/' . urlencode( $matches[3] ) ) . "'>$matches[3]</a>";
	}
	
	/** Adds ID based slick menu skin to the header. */
	function styles(){
		
		if(!is_admin()){

			$all_widgets = $this->get_settings();
		
			foreach ($all_widgets as $key => $wpdcjqfloatingtweets){
				$widget_id = $this->id_base . '-' . $key;		
				if(is_active_widget(false, $widget_id, $this->id_base)){
		
					$skin = $wpdcjqfloatingtweets['skin'];
					$skin = htmlspecialchars(ucfirst(preg_replace('/\..*$/', '', $skin)));
					if($skin != 'No-theme'){
						echo "\n\t<link rel=\"stylesheet\" href=\"".dc_jqfloatingtweets::get_plugin_directory()."/skin.php?widget_id=".$key."&skin=".strtolower($skin)."\" type=\"text/css\" media=\"screen\"  />";
					}
				}
			}
		}
	}

	/** Adds ID based activation script to the footer */
	function footer(){
		
		if(!is_admin()){
		
		$all_widgets = $this->get_settings();
		
		foreach ($all_widgets as $key => $wpdcjqfloatingtweets){
		
			$widget_id = $this->id_base . '-' . $key;
			
			$floater_id = 'dc-tweets-' . $key;

			if(is_active_widget(false, $widget_id, $this->id_base)){
			
				$event = $wpdcjqfloatingtweets['event'];
				if($event == ''){$event = 'click';};
				
				$width = $wpdcjqfloatingtweets['width'];
				if($width == ''){$width = '200';};
				
				$speedMenu = $wpdcjqfloatingtweets['speedMenu'];
				if($speedMenu == ''){$speedMenu = '600';};
				
				$speedFloat = $wpdcjqfloatingtweets['speedFloat'];
				if($speedFloat == ''){$speedFloat = '1500';};
				
				$location = $wpdcjqfloatingtweets['location'];
				if($location == ''){$location = 'top';};
				
				$align = $wpdcjqfloatingtweets['align'];
				if($align == ''){$align = 'left';};
			
				$offsetL = $wpdcjqfloatingtweets['offsetL'];
				if($offsetL == ''){$offsetL = '0';};
				$offsetA = $wpdcjqfloatingtweets['offsetA'];
				if($offsetA == ''){$offset = '0';};
				
				$autoClose = $wpdcjqfloatingtweets['autoClose'];
				if($autoClose == ''){$autoClose = 'false';};
				
				$tabClose = $wpdcjqfloatingtweets['tabClose'];
				if($tabClose == ''){$tabClose = 'true';};

				$tabText = $wpdcjqfloatingtweets['tabText'];
				if($tabText == ''){$tabText = 'Click';};
				
			?>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
				
				<?php if($wpdcjqfloatingtweets['linkOpen'] == true){ ?>
					jQuery('#<?php echo $floater_id ?> a').live('click',function(){
						this.target = "_blank";
					});
				<?php } ?>
					jQuery('#<?php echo $widget_id.'-item'; ?>').dcFloater({
						event: '<?php echo $event; ?>',
						width: <?php echo $width; ?>,
						location: '<?php echo $location; ?>',
						align: '<?php echo $align; ?>',
						speedMenu: <?php echo $speedMenu; ?>,
						speedFloat: <?php echo $speedFloat; ?>,
						offsetLocation: <?php echo $offsetL; ?>,
						offsetAlign: <?php echo $offsetA; ?>,
						autoClose: <?php echo $autoClose; ?>,
						tabClose: <?php echo $tabClose; ?>,
						tabText: '<img src="<?php echo dc_jqfloatingtweets::get_plugin_directory(); ?>/skins/images/icon.png" alt="" class="icon-twitter" /><?php echo $tabText; ?>',
						idWrapper: '<?php echo $floater_id ?>',
						classOpen: 'dcflt-open',
						classClose: 'dcflt-close',
						classToggle: 'dcflt-link',
						classWrapper: 'dc-tweets'
					});
				});
			</script>
		
			<?php
			
			}		
		}
		}
	}
} // class dc_jqfloatingtweets_widget