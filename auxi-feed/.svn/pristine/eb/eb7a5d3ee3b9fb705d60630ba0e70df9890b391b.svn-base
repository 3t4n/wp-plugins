<?php

/**
 * Created by PhpStorm.
 * User: slsdeveloper
 * Date: 11/18/15
 * Time: 2:26 PM
 */
class ui_elements {

	public $oauth_access_token;

	/**
	 * ui_elements constructor.
	 */
	public function __construct() {
	}

	public function set_reply_icon() {
		//$reply_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65 72" width="22px" height="22px">
		//					 <path d="M41 31h-9V19c0-1.14-.647-2.183-1.668-2.688-1.022-.507-2.243-.39-3.15.302l-21 16C5.438 33.18 5 34.064 5 35s.437 1.82 1.182 2.387l21 16c.533.405 1.174.613 1.82.613.453 0 .908-.103 1.33-.312C31.354 53.183 32 52.14 32 51V39h9c5.514 0 10 4.486 10 10 0 2.21 1.79 4 4 4s4-1.79 4-4c0-9.925-8.075-18-18-18z"/>
		//					</svg>';

		$reply_icon = "PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NSA3MiIgd2lkdGg9IjIycHgiIGhlaWdodD0iMjJweCI+DQoJCQkJCQkJIDxwYXRoIGQ9Ik00MSAzMWgtOVYxOWMwLTEuMTQtLjY0Ny0yLjE4My0xLjY2OC0yLjY4OC0xLjAyMi0uNTA3LTIuMjQzLS4zOS0zLjE1LjMwMmwtMjEgMTZDNS40MzggMzMuMTggNSAzNC4wNjQgNSAzNXMuNDM3IDEuODIgMS4xODIgMi4zODdsMjEgMTZjLjUzMy40MDUgMS4xNzQuNjEzIDEuODIuNjEzLjQ1MyAwIC45MDgtLjEwMyAxLjMzLS4zMTJDMzEuMzU0IDUzLjE4MyAzMiA1Mi4xNCAzMiA1MVYzOWg5YzUuNTE0IDAgMTAgNC40ODYgMTAgMTAgMCAyLjIxIDEuNzkgNCA0IDRzNC0xLjc5IDQtNGMwLTkuOTI1LTguMDc1LTE4LTE4LTE4eiIvPg0KCQkJCQkJCTwvc3ZnPg==";

		return base64_decode( $reply_icon );
	}

	public function set_retweet_icon() {

		//$retweet_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65 72" width="22px" height="22px">
		//		<path d="M70.676 36.644C70.166 35.636 69.13 35 68 35h-7V19c0-2.21-1.79-4-4-4H34c-2.21 0-4 1.79-4 4s1.79 4 4 4h18c.552 0 .998.446 1 .998V35h-7c-1.13 0-2.165.636-2.676 1.644-.51 1.01-.412 2.22.257 3.13l11 15C55.148 55.545 56.046 56 57 56s1.855-.455 2.42-1.226l11-15c.668-.912.767-2.122.256-3.13zM40 48H22c-.54 0-.97-.427-.992-.96L21 36h7c1.13 0 2.166-.636 2.677-1.644.51-1.01.412-2.22-.257-3.13l-11-15C18.854 15.455 17.956 15 17 15s-1.854.455-2.42 1.226l-11 15c-.667.912-.767 2.122-.255 3.13C3.835 35.365 4.87 36 6 36h7l.012 16.003c.002 2.208 1.792 3.997 4 3.997h22.99c2.208 0 4-1.79 4-4s-1.792-4-4-4z"/></svg>';

		$retweet_icon = "PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NSA3MiIgd2lkdGg9IjIycHgiIGhlaWdodD0iMjJweCI+DQoJCQkJCQkJPHBhdGggZD0iTTcwLjY3NiAzNi42NDRDNzAuMTY2IDM1LjYzNiA2OS4xMyAzNSA2OCAzNWgtN1YxOWMwLTIuMjEtMS43OS00LTQtNEgzNGMtMi4yMSAwLTQgMS43OS00IDRzMS43OSA0IDQgNGgxOGMuNTUyIDAgLjk5OC40NDYgMSAuOTk4VjM1aC03Yy0xLjEzIDAtMi4xNjUuNjM2LTIuNjc2IDEuNjQ0LS41MSAxLjAxLS40MTIgMi4yMi4yNTcgMy4xM2wxMSAxNUM1NS4xNDggNTUuNTQ1IDU2LjA0NiA1NiA1NyA1NnMxLjg1NS0uNDU1IDIuNDItMS4yMjZsMTEtMTVjLjY2OC0uOTEyLjc2Ny0yLjEyMi4yNTYtMy4xM3pNNDAgNDhIMjJjLS41NCAwLS45Ny0uNDI3LS45OTItLjk2TDIxIDM2aDdjMS4xMyAwIDIuMTY2LS42MzYgMi42NzctMS42NDQuNTEtMS4wMS40MTItMi4yMi0uMjU3LTMuMTNsLTExLTE1QzE4Ljg1NCAxNS40NTUgMTcuOTU2IDE1IDE3IDE1cy0xLjg1NC40NTUtMi40MiAxLjIyNmwtMTEgMTVjLS42NjcuOTEyLS43NjcgMi4xMjItLjI1NSAzLjEzQzMuODM1IDM1LjM2NSA0Ljg3IDM2IDYgMzZoN2wuMDEyIDE2LjAwM2MuMDAyIDIuMjA4IDEuNzkyIDMuOTk3IDQgMy45OTdoMjIuOTljMi4yMDggMCA0LTEuNzkgNC00cy0xLjc5Mi00LTQtNHoiLz48L3N2Zz4=";

		return base64_decode( $retweet_icon );
	}

	public function set_like_icon() {
		//	$like_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 72" width="22px" height="22px">
		//	 <path d="M38.723,12c-7.187,0-11.16,7.306-11.723,8.131C26.437,19.306,22.504,12,15.277,12C8.791,12,3.533,18.163,3.533,24.647 C3.533,39.964,21.891,55.907,27,56c5.109-0.093,23.467-16.036,23.467-31.353C50.467,18.163,45.209,12,38.723,12z"/></svg>';
		$like_icon = "PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzNSA3MiIgd2lkdGg9IjIycHgiIGhlaWdodD0iMjJweCI+DQoJCQkJCQkJIDxwYXRoIGQ9Ik0zOC43MjMsMTJjLTcuMTg3LDAtMTEuMTYsNy4zMDYtMTEuNzIzLDguMTMxQzI2LjQzNywxOS4zMDYsMjIuNTA0LDEyLDE1LjI3NywxMkM4Ljc5MSwxMiwzLjUzMywxOC4xNjMsMy41MzMsMjQuNjQ3IEMzLjUzMywzOS45NjQsMjEuODkxLDU1LjkwNywyNyw1NmM1LjEwOS0wLjA5MywyMy40NjctMTYuMDM2LDIzLjQ2Ny0zMS4zNTNDNTAuNDY3LDE4LjE2Myw0NS4yMDksMTIsMzguNzIzLDEyeiIvPjwvc3ZnPg==";

		return base64_decode( $like_icon );

	}

	public function set_twitter_controls() {
		$twitter_controls = '<div class="twitter_controls">' .
		                    '<a class="twitter-reply" title="Reply" target="_blank" href="https://twitter.com/intent/tweet?in_reply_to=[twitterid]">' .
		                    '<span class="reply_icon">[replyicon]</span></a>' .
		                    '<a class="tw-reTweet" title="ReTweet" target="_blank" href="https://twitter.com/intent/retweet?tweet_id=[twitterid]">' .
		                    '<span class="retweet_icon">[retweeticon]</span></a>' .
		                    '<a class="tw-like" title="Like" target="_blank" href="https://twitter.com/intent/favorite?tweet_id=[twitterid]">' .
		                    '<span class="like_icon">[likeicon]</span></a></div>';

		return $twitter_controls;
	}

	public function get_admin_page() {


		$oauth_access_token  = get_option( "auxi_at" );
		$oauth_access_secret = get_option( "auxi_as" );
		$consumer_key        = get_option( "auxi_ck" );
		$consumer_secret     = get_option( "auxi_cs" );
		$twitter_username    = get_option( "auxi_tw_username" );


		$render = '<div class="wrap">';
		$render .= "<form name='admin_settings_form' id='admin_settings_form' method='POST'>";
		$render .= "<img src='" . self::get_auxi_logo() . "'/>";
		$render .= "<h3>Auxi feed plugin settings page</h3>";
		$render .= "<p>Use the options below to setup auxi feed</p>";

		$render .= '<div class="update-nag">';

		$render .= "<p>You must register your application with twitter. It's easy, just go to <a href='https://apps.twitter.com/'>https://apps.twitter.com/</a> and click the <b>create new app</b> button. Follow the instructions and you will get the items needed below.</p>";
		$render .= "</div><hr>";
		$render .= '<h2 class="nav-tab-wrapper"><a href="#" class="nav-tab">General </a></h2>';
		$render .= "<div class='welcome-panel'>";
		$render .= "<hr/><div class='row'><div class='div_left'>Twitter Username</div>";
		$render .= "<div class='div_right'><input type ='text' class='regular-text ltr' id='auxi_tw_username' name='auxi_tw_username' value=" . $twitter_username . "></div></div>";

		$render .= "<hr/><div class='row'><div class='div_left'>Oauth access token</div>";
		$render .= "<div class='div_right'><input type ='text' class='regular-text ltr' id='oauth_access_token' name='oauth_access_token' value=" . $oauth_access_token . "></div></div>";
		$render .= "<div class='row'><div class='div_left'>Oauth access secret</div>";
		$render .= "<div class='div_right'><input type ='text'  class='regular-text ltr' id='oauth_access_secret' name='oauth_access_secret' value=" . $oauth_access_secret . "></div></div>";
		$render .= "<div class='row'><div class='div_left'>Consumer Key (API Key)</div>";
		$render .= "<div class='div_right'><input type ='text'  class='regular-text ltr' id='consumer_key' name='consumer_key' value=" . $consumer_key . "></div></div>";
		$render .= "<div class='row'><div class='div_left'>Consumer Secret (API Secret)</div>";
		$render .= "<div class='div_right'><input type ='text'  class='regular-text ltr' id='consumer_secret' name='consumer_secret'  value=" . $consumer_secret . "></div></div>";
		$render .= "<div class='row'><div class='div_left'>Number of items returned (default 20)</div>";
		$render .= "<div class='div_right'><select id='items_returned'>";
		$render .= "<option value='10'>10</option>";
		$render .= "<option value='20'>20</option>";
		$render .= "<option value='40'>40</option>";
		$render .= "<option value='50'>50</option>";
		$render .= "<option value='100'>100</option>";
		$render .= "<option value='300'>300</option>";
		$render .= "<option value='500'>500</option>";
		$render .= "</select></div></div><br/><br/>";
		$render .= "<div><input type='button' class='button button-primary' id='auxi_submit' value='Submit'></div>";
		$render .= '<div class="modal"><!-- Place at bottom of page --></div>';
		$render .= '<input type="hidden" id="auxi-verif" value="[auxi-verif]"/></form></div><hr>';
		$render .= "<h2>How to add a feed to  a WordPress page</h2>";
		$render .= "<div>Create a page and add the following shortcode to it:<br/>[twitter_feed]</div>";
		$render .= "<br/><br/></div>";

		return $render;
	}


	public function auxi_render_feed() {
		$render = '<div class="item">';
		$render .= "<div class='poster_logo'><div class='logodiv'>[poster_logo]</div> <div class='poster_names'>[poster_name]<div></div><a href='https://twitter.com/[poster_screen_name]'> [poster_screen_name]</a></div>";
		$render .= "</div>";
		$render .= "<div class='twitter_header'><a href='[expanded_url]'> [description]</a><br/></div>";
		$render .= "[media_url_img]";
		$render .= '<div class="tw_logo"><span>  [twitter_controls] </span><a href="https://twitter.com">[tw_logo]</a></div>';
		$render .= '<div class="tw_powered">[source]</div>';
		$render .= "</div>";

		return $render;

	}


	public function get_auxi_logo() {
		$auxi_logo = plugin_dir_url( __FILE__ ) . '../admin/assets/images/auxi_logo.png';

		return $auxi_logo;
	}

	public function get_alert_icon() {
		$alert_icon = plugin_dir_url( __FILE__ ) . '../assets/images/warning-icon.png';

		return $alert_icon;
	}


}