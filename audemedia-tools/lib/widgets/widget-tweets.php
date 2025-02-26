<?php

// load widget
add_action( 'widgets_init', 'aude_tweets_widget' );

// Register widget
function aude_tweets_widget() {
	register_widget( 'aude_tweet_widget' );
} 

include_once( plugin_dir_path( __FILE__ ) . 'twitter/twitter_api.php');

// Widget class
class aude_tweet_widget extends WP_Widget {

// Widget setup
	
	function aude_tweet_widget() {
	
		/* Widget settings. */
		$widget_tws = array( 'classname' => 'aude_tweet_widget', 'description' => __('A widget for showing latest tweets', 'aude_theme') );

		/* Widget control settings. */
		$control_tws = array( 'width' => 200, 'height' => 250, 'id_base' => 'aude_tweet_widget' );

		/* Create the widget. */
		parent::__construct( 'aude_tweet_widget', __('Audemedia ++ Latest Tweets','aude_theme'), $widget_tws, $control_tws );
	}

/* ---------------------------------------------------------------------*/
/* Display widget
/* -------------------------------------------------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$aude_twitter_consumer_key = $instance['consumer_key'];
		$aude_twitter_consumer_secret = $instance['consumer_secret'];
		$aude_twitter_access_token = $instance['access_token'];
		$aude_twitter_access_token_secret = $instance['access_token_secret'];
		$aude_twitter_username = $instance['username'];
		$aude_twitter_tweetsnumber = $instance['tweetsnumber'];
		
		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;
		
// Display Latest Tweets 


echo '<ul>';

$settings = array(
    'oauth_access_token' => "$aude_twitter_access_token",
    'oauth_access_token_secret' => "$aude_twitter_access_token_secret",
    'consumer_key' => "$aude_twitter_consumer_key",
    'consumer_secret' => "$aude_twitter_consumer_secret"
);

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name='.$aude_twitter_username.'&count='.$aude_twitter_tweetsnumber.'';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
                    ->buildOauth($url, $requestMethod)
                    ->performRequest();
//var_dump(json_decode($response));  

$result = json_decode($response, true);

$multi_array =  (array) $result;
foreach($multi_array as $key => $value ){

$feedMsg = $value["text"];
$feedMsg = preg_replace("/([\w]+\:\/\/[\w-?&;#~=.\/\@]+[\w\/])/", "<a target='_blank' href='$1'>$1</a>", $feedMsg);
$feedMsg = preg_replace("/#([A-Za-z0-9\/.]*)/", "<a target='_new' href='http://twitter.com/search?q=$1'>#$1</a>", $feedMsg);
$feedMsg = preg_replace("/@([A-Za-z0-9\/.]*)/", "<a href='http://www.twitter.com/$1'>@$1</a>", $feedMsg);	

// printing each tweet wrapped in a <li> tag
 echo '<li>'.$feedMsg.'</li>';

 }
echo '</ul>'; ?>		
			          
            <?php 
		
		echo $after_widget;
	}

/* ---------------------------------------------------------------------*/
/* Update Widget
/* -------------------------------------------------------------------- */	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['tweetsnumber'] = strip_tags( $new_instance['tweetsnumber'] );
		$instance['consumer_key'] = strip_tags( $new_instance['consumer_key'] );
		$instance['consumer_secret'] = strip_tags( $new_instance['consumer_secret'] );
		$instance['access_token'] = strip_tags( $new_instance['access_token'] );
		$instance['access_token_secret'] = strip_tags( $new_instance['access_token_secret'] );


		/* No need to strip tags for.. */

		return $instance;
	}
	
/* ---------------------------------------------------------------------*/
/* Widget setting
/* -------------------------------------------------------------------- */
 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => 'Latest Tweets',
		'username' => 'audemedia',
		'tweetsnumber' => '3',
		'consumer_key' => '',
		'consumer_secret' => '',
		'access_token' => '',
		'access_token_secret' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'aude_theme') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Consumer Key: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'consumer_key' ); ?>"><?php _e('API Key', 'aude_theme') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'consumer_key' ); ?>" name="<?php echo $this->get_field_name( 'consumer_key' ); ?>" value="<?php echo $instance['consumer_key']; ?>" />
		</p>

		<!-- Consumer Secret: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'consumer_secret' ); ?>"><?php _e('API Secret', 'aude_theme') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'consumer_secret' ); ?>" name="<?php echo $this->get_field_name( 'consumer_secret' ); ?>" value="<?php echo $instance['consumer_secret']; ?>" />
		</p>

		<!-- Access Token: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'access_token' ); ?>"><?php _e('Access Token', 'aude_theme') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'access_token' ); ?>" name="<?php echo $this->get_field_name( 'access_token' ); ?>" value="<?php echo $instance['access_token']; ?>" />
		</p>

		<!-- Access Token Secret: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'access_token_secret' ); ?>"><?php _e('Access Token Secret', 'aude_theme') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'access_token_secret' ); ?>" name="<?php echo $this->get_field_name( 'access_token_secret' ); ?>" value="<?php echo $instance['access_token_secret']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Twitter Username', 'aude_theme') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
		</p>
		
		<!-- Postcount: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e('Number of tweets', 'aude_theme') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'tweetsnumber' ); ?>" name="<?php echo $this->get_field_name( 'tweetsnumber' ); ?>" value="<?php echo $instance['tweetsnumber']; ?>" />
		</p>
		
		
	<?php
	}
}


?>