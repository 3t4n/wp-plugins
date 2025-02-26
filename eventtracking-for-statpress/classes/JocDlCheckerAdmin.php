<?php
/****************************************************************************
 * プラグインの管理部分のオブジェクト：管理ページを表示するときのみ実行される。
 * メニュー表示、管理ページ表示、その他の管理ページでの処理
 ****************************************************************************/

class JocDlCheckerAdmin
{
	public function __construct() {
		
		$this->k = new JocDlChecker();
		
		add_action( 'admin_menu', array(&$this, 'add_admin_menu') );
		
		add_shortcode( 'get_data_admin', 'get_data' );
		
		$this->plugin_dir = JOCDLCHECKER_PATH;
		$this->plugin_url = JOCDLCHECKER_URL;
	
	}
	
	
	public function add_admin_menu() {

		$level = 6;		//編集者以上で見せる
		$mypage = add_menu_page( __("Event Tracking", $this->k->domain ), __("Event Tracking", $this->k->domain ), $level, "DlCheckerTop", array( &$this, 'DlCheckerTop' ) );
		
		add_action( "admin_print_scripts-$mypage", array( &$this, 'admin_style_func' ));

	}
	
	/**
	 * スタイル追加
	 */
	public function admin_style_func()
	{
		wp_enqueue_style( 'dl_checker', $this->plugin_url . 'css/dl_checker.css' );
	}
	
	/**
	 * ファビコン変更
	 */
	 
	// アイコン用ディレクトリまでのURLを指定する
	function my_icon_dir_uri() {
		echo '<link rel="shortcut icon" href="' . $this->plugin_url . 'clock-frame.png" />';
	}
	
	/**
	* 管理者ページ表示
	*/
	public function DlCheckerTop()
	{
		$res = $this->get_measurement_data();
		require_once  $this->plugin_dir . "view/DlCheckerTop.php";
	}
	
	
/****************************************************************************
 * 処理用関数
 ****************************************************************************/

	function get_measurement_data(){
		global $wpdb;
		
		$res = $wpdb->get_results( "select * from {$wpdb->prefix}statpress where urlrequested like '/_dlc_%' order by id desc limit 10" );
		
		return $res;
	}


}

?>
