<?php
/*
Plugin Name: GainUrl
Description: GainURL allows to earn money without much advertising, banners and affiliate posts on the pages of your website.
Version: 1.1.3
Author: iR0man
License: GPL
WordPress Version Required: 2.8
*/
function gainurl_init() {
	load_plugin_textdomain( 'gainurl', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'gainurl_init' );

function add_gainurl_page(){
	$page = add_menu_page( __( 'GainUrl Settings', 'gainurl' ), __( 'GainURL', 'gainurl' ), 'manage_options', 'gainurl', 'gainurl_options', 'dashicons-performance');
	
	add_action( 'admin_enqueue_scripts', 'gainurl_options_script_and_style' );
	add_action( 'admin_print_footer_scripts', 'gainurl_options_print_scripts' );
}
add_action('admin_menu', 'add_gainurl_page');

function gainurl_options_script_and_style(){
	if( isset($_GET["page"]) && $_GET["page"] == "gainurl" ){
		wp_enqueue_script('rcswitcher',plugins_url( '/js/rcswitcher-3.0.0.min.js', __FILE__ ),array('jquery'),null,true);
		wp_enqueue_style( 'rcswitcher', plugins_url('/css/rcswitcher.min.css',__FILE__) );
		wp_enqueue_style( 'gainurl-admin', plugins_url('/css/gainurl-admin.css',__FILE__) );
		wp_enqueue_style( 'font-awesome', plugins_url('/css/font-awesome.min.css',__FILE__) );
	}
}

function gainurl_options_print_scripts(){
	if( isset($_GET["page"]) && $_GET["page"] == "gainurl" ) echo '<script type="text/javascript">jQuery(document).ready(function($){$(".checkbox :checkbox").rcSwitcher({
					width: 60,
					height: 25,
					onText: "'.__( 'ON', 'gainurl' ).'",
					offText: "'.__( 'OFF', 'gainurl' ).'",
					theme: "grey"
				})});</script>';
}
function plugin_settings(){
	register_setting( 'gainurl_group', 'gainurl_options' );
}
add_action('admin_init', 'plugin_settings');
function gainurl_options(){
	?>
	<div class="gainurl-wrap">
		<form action="options.php" method="POST">
			<?php $val = get_option('gainurl_options'); ?>
			<?php settings_fields( 'gainurl_group' ); ?>
			<div class="gainurl-head">
				<img src="<?php echo plugins_url('/img/gainurl-logo.png', __FILE__); ?>">
				<a href="http://gainurl.com/auth/signup" class="btn btnred right grow-btn" target="_blank"><span><i class="fa fa-user-plus"></i></span><?php _e( 'create an account', 'gainurl' ); ?></a>
			</div>
			<div class="postbox">
				<h3><?php _e( 'Main Settings', 'gainurl' ); ?></h3>
				<div class="inside">
					<div class="row">
						<div class="a"><span><?php _e( 'Enable', 'gainurl' ); ?></span><div class="help"><?php _e( 'Enable GainURL Plugin', 'gainurl' ); ?></div></div>
						<div class="b checkbox">
							<input type="checkbox" name="gainurl_options[enable]" value="1" <? checked( 1, $val['enable'] ) ?> />
						</div>
					</div>
					<div class="row">
						<div class="a"><span><?php _e( 'GainUrl API token', 'gainurl' ); ?> <a href="#" class="gain-help" onclick="return false">[?]<img src="<?php echo plugins_url('/img/help.png', __FILE__); ?>"></a></span><div class="help"><?php _e( 'Paste here GainUrl API token', 'gainurl' ); ?></div></div>
						<div class="b">
							<input type="text" name="gainurl_options[apikey]" value="<? echo esc_attr( $val['apikey'] ) ?>" />
							<?php _e( 'No account?', 'gainurl' ); ?> <a target="_blank" href="http://gainurl.com/auth/signup"><?php _e( 'Sign Up', 'gainurl' ); ?></a>
						</div>
					</div>
					<div class="row">
						<div class="a"><span><?php _e( 'Period reCAPTCHA', 'gainurl' ); ?></span><div class="help"><?php _e( 'How often show reCAPTCHA', 'gainurl' ); ?></div></div>
						<div class="b">
							<div class="select-wrapper">
								<select name="gainurl_options[show]">
								   <option value="365" <? selected( 365, $val['show'] ) ?>><?php _e( 'Once for all time (low income)', 'gainurl' ); ?></option>
								   <option value="1" <? selected( 1, $val['show'] ) ?>><?php _e( 'Once a day (normal income)', 'gainurl' ); ?></option>
								   <option value="0" <? selected( 0, $val['show'] ) ?>><?php _e( 'Once per session (gain income)', 'gainurl' ); ?></option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="a"><span><?php _e( 'Show reCAPTCHA after', 'gainurl' ); ?></span></div>
						<div class="b">
							<input type="number" min="0" name="gainurl_options[show_after]" value="<? echo esc_attr( $val['show_after'] ) ?>" /> <?php _e( 'clicks', 'gainurl' ); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="postbox">
				<h3><?php _e( 'Type reCAPTCHA', 'gainurl' ); ?></h3>
				<div class="inside">
					<div class="row">
						<div class="a"><span><?php _e( 'When click on the internal link', 'gainurl' ); ?></span></div>
						<div class="b checkbox">
							<input type="checkbox" name="gainurl_options[internal]" value="1" <? checked( 1, $val['internal'] ) ?> />
						</div>
						<div class="a_line">
							<div class="a"><span><?php _e( 'Exclude URLs', 'gainurl' ); ?></span><div class="help"><?php _e( 'If blank then will be wrapped all URLs', 'gainurl' ); ?></div></div>
							<div class="b"><textarea name="gainurl_options[internal_ex]" placeholder="http://<?php echo $_SERVER['HTTP_HOST']; ?>/post1/, http://<?php echo $_SERVER['HTTP_HOST']; ?>/post2/, http://<?php echo $_SERVER['HTTP_HOST']; ?>/post3/ - <?php _e( 'Seperate them with commas', 'gainurl' ); ?>" rows="5" cols="80"><? echo esc_attr( $val['internal_ex'] ) ?></textarea></div>
						</div>
					</div>
					<div class="row">
						<div class="a"><span><?php _e( 'When click on the external link', 'gainurl' ); ?></span></div>
						<div class="b checkbox">
							<input type="checkbox" name="gainurl_options[external]" value="1" <? checked( 1, $val['external'] ) ?> />
						</div>
						<div class="a_line">
							<div class="a"><span><?php _e( 'Exclude domains', 'gainurl' ); ?></span><div class="help"><?php _e( 'If blank then will be wrapped all domains', 'gainurl' ); ?></div></div>
							<div class="b"><textarea name="gainurl_options[external_ex]" placeholder="http://google.com, http://youtube.com, http://twitter.com - <?php _e( 'Seperate them with commas', 'gainurl' ); ?>" rows="5" cols="80"><? echo esc_attr( $val['external_ex'] ) ?></textarea></div>
						</div>
					</div>
					<div class="row">
						<div>
							<div class="a"><span><?php _e( 'When click on a special URL', 'gainurl' ); ?></span></div>
							<div class="b checkbox">
								<input type="checkbox" name="gainurl_options[internal_url]" value="1" <? checked( 1, $val['internal_url'] ) ?> />
							</div>
						</div>
						<div class="c"><textarea name="gainurl_options[internal_urls]" placeholder="http://<?php echo $_SERVER['HTTP_HOST']; ?>/post1/, http://<?php echo $_SERVER['HTTP_HOST']; ?>/post2/, http://<?php echo $_SERVER['HTTP_HOST']; ?>/post3/ - <?php _e( 'Seperate them with commas', 'gainurl' ); ?>" rows="5" cols="80"><? echo esc_attr( $val['internal_urls'] ) ?></textarea></div>
					</div>
				</div>
			</div>
			<p class="submit"><button type="submit" name="submit" id="submit" class="btn btnblack"><span><i class="fa fa-refresh"></i></span><?php _e( 'Save Changes', 'gainurl' ); ?></button> <?php if(defined("WP_CACHE") && WP_CACHE == true) _e( 'If you use cache plugin, clear the cache after you save the settings.', 'gainurl' ); ?></p>
			<div class="gainurl-footer">
				<div><a target="_blank" href="http://gainurl.com/">GainUrl.com</a>&nbsp;&nbsp;&nbsp;<a target="_blank" href="http://gainurl.com/payout-rates"><?php _e( 'Publisher Rates', 'gainurl' ); ?></a>&nbsp;&nbsp;&nbsp;<a target="_blank" href="http://gainurl.com/pages/terms"><?php _e( 'Terms of Use', 'gainurl' ); ?></a></div>
				<div><?php _e( 'Powered by', 'gainurl' ); ?> GainUrl - &copy; <?= date('Y'); ?></div>
			</div>
		</form>
	</div>
	<?
}

function wp_head_gainurl(){
	$opt = get_option('gainurl_options');
	if (isset($opt['enable']) && $opt['apikey'] != ''){
		$html = "<script style=\"text/javascript\">gainurl={apikey:'".$opt['apikey']."'";
		$html .= ",gainc:".$opt['show'];
		$html .= ",show_after:".$opt['show_after'];
		$first_pages = array();
		$excerpt = '';
		if ($opt['external']==1){
			$domains = $opt['external_ex'];
			$urlst = explode(",", $domains);
			$icount = 0;
			foreach($urlst as $url){
				if(empty($url)) continue;
				$cuntl = trim($url);
				$cuntl = trim($cuntl, '/');
				
				if (!preg_match('#^http(s)?://#', $cuntl)) {
					$cuntl = 'http://' . $cuntl;
				}
				$urlParts = parse_url($cuntl);
				$excerpt .= '"' . preg_replace('/^www\./', '', $urlParts['host']) . '",';
			}
			$html .=',external:true';
		}
		if($opt['internal']==1){
			if(!empty($opt['internal_ex'])){
				$internal_ex = explode(",", $opt['internal_ex']);
				$excerpt .= '"' . implode('","',$internal_ex) . '"';
			}
			$html .=',internal:true';
		}
		$html .=',excerpt_urls:[' . $excerpt . ']';
		if($opt['internal_url']==1){
			$internal_urls = explode(",", $opt['internal_urls']);
			$html .=',special_urls:["' . implode('","',$internal_urls) . '"]';
		}
	$html .= "}</script>";
		echo $html;
	}
}
add_action("wp_head", "wp_head_gainurl");
function gainurl_scripts(){
	$opt = get_option('gainurl_options');
	if (isset($opt['enable']) && $opt['apikey'] != ''){
		wp_enqueue_script('gainurl',plugins_url( '/js/gainurl.js', __FILE__ ),array('jquery'),null,true);
	}
}
add_action( 'wp_enqueue_scripts', 'gainurl_scripts' );
 ?>