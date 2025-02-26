<?php
/****************************************************************************
 * プラグインのオブジェクト
 ****************************************************************************/

class JocDlChecker
{
	public function __construct() {
	 
		$this->plugin_dir = JOCDLCHECKER_PATH;
		$this->plugin_url = JOCDLCHECKER_URL;
		
		$this->domain = 'eventtracking-for-statpress';
				
		add_action('wp_ajax_action_center', array($this, 'action_center_callback'));
		add_action('wp_ajax_nopriv_action_center', array($this, 'action_center_callback'));

		add_action( 'wp_head', array( $this, 'dl_checker_tag_func' ) );
	}
	
	
	/**
	 * 表示部分
	 */
	
	
	function dl_checker_tag_func( $atts )
	{
		//edit 20150305 nation
		
		if( function_exists( 'iriGetOS' ) )
			$os = iriGetOS( $_SERVER["HTTP_USER_AGENT"] );
		
		if( function_exists( 'iriGetBrowser' ) )
			$browser = iriGetBrowser( $_SERVER["HTTP_USER_AGENT"] );
		
		if( function_exists( 'iriDomain' ) )
			$nation = iriDomain( $_SERVER['REMOTE_ADDR'] );
			
		$html .= '
<script type="text/javascript">
		jQuery(document).ready(function($) {
			
			jQuery("a").click(function () {
				
				var result = jQuery.ajax({
					url: "' . admin_url('admin-ajax.php') . '?action=action_center",
					type: "POST",
					dataType: "json",
					async: false,
					data: {
					"action": "action_center",
    				"page": "papa",
					"ip" : "' . $_SERVER["REMOTE_ADDR"] . '",
					"urlrequested" : "' . $_SERVER["REQUEST_URI"] . '",
					"agent" : "' . $_SERVER["HTTP_USER_AGENT"] . '",
					"referrer" : "' . $_SERVER["HTTP_REFERER"] . '",
					"search_key" : $(this).attr("id"),
					"os" : "' . $os . '",
					"browser" : "' . $browser . '",
					"nation" : "' . $nation . '",
					"search" : "",
					"_security" : "' . wp_create_nonce("action_center") . '"
					}
					/*,
					success: function(response){
					console.log(response);
					alert(response.page + response.search_key + \' is Ajax page\');
					},
					error: function(response) {
					alert(response.page + \'error!!!\');
					}
					*/
				});
					
			});
		});
</script>
		';
		echo $html;
	
	}
	


/****************************************************************************
 * ajax用関数
 ****************************************************************************/

function action_center_callback() {
	//セキュリティ必要
	
	check_ajax_referer('action_center', '_security');
	
	global $wpdb;
	
	extract( $_POST );
	
	
	if( $search_key == "" )  die();
	
	if( !preg_match( "/^dlc_/", $search_key ) )  die();
	
	//通常ページとの区別のために前に_と前後に/をつける
	
	$search_key = '/_' . $search_key . '/' . get_the_ID();
	
	$wpdb->insert( $wpdb->prefix . 'statpress', array( 'date' => date( 'Ymd' ), 'time' => date( 'H:i:s' ), 'timestamp' => time(), 'ip' => $ip, 'urlrequested' => $search_key, 'agent' => $agent, 'referrer' => $referrer, 'os' => $os,  'browser' => $browser, 'search' => $search, 'nation' => $nation, 'searchengine' => $searchengine, 'spider' => $spider, 'feed' => $feed, 'user' => $user  ), array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' ) );

	die();
}

/****************************************************************************
 * 処理用関数
 ****************************************************************************/


}

?>