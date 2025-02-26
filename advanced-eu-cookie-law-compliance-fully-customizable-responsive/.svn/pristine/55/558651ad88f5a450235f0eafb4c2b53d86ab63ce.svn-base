<?php
class cookieLawAdmin
{

	protected $admin_view 	= null;


	function __construct(){
		add_action( 'admin_menu' 		, array($this,'add_menus') );
		add_action( 'current_screen'	, array($this,'process_request'));
	}

	/**
	 * Process the request of an admin page
	 * 
	*/
	public function process_request(){

		/* make sure that we only execute our code if one of our registered page is loaded */
		if ( $this->determine_page() && !empty($_GET['page'])){	

			/* Remove all (in this case: unwanted) quotes */
			$_POST 	  	= stripslashes_deep($_POST);
			$_REQUEST 	= stripslashes_deep($_REQUEST);
			$_GET  		= stripslashes_deep($_GET);
			
			add_action( 'admin_enqueue_scripts', array($this,'load_assets'));
			

			 if(isset($_POST['save_eu_law'])){
			 	$o = get_option('eu_law_options',array());
			 	$o['custom_css']='0';
			 	update_option('eu_law_options',$o);
			 	foreach ($_POST as $key => $value) {
			 		$o = get_option('eu_law_options',array());
			 		$o[$key]=$value;
			 		update_option('eu_law_options',$o);
				 // 	if ( get_option( $key ) !== false ) {
					//     update_option( $key, $value );

					// } else {

					//     $deprecated = null;
					//     $autoload = 'no';
					//     add_option( $key, $value, $deprecated, $autoload );
					// }
				}
			 }
		}
	}
	
	
	public function load_assets(){
		wp_enqueue_style( 'wp-color-picker' ); 
		wp_enqueue_style( 'wu-law-admin-css'		, plugins_url('includes/admin/main.css',__FILE__) );
		wp_enqueue_script( 'custom-script-handle', plugins_url( 'includes/admin/custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
   		// wp_enqueue_script( 'arevico-tab-js'		, plugins_url('includes/admin-style/tab-simple.js',__FILE__) , array('jquery') );
	}


	private function determine_page(){
		if (!isset($_GET['page']))
			return;

		switch ($_GET['page']) {

			case 'kirim':
				include dirname(__FILE__) .'/views/class-admin-top.php';
				$this->admin_view = new kirimAdminTop();

			break;

		}

		return !is_null($this->admin_view);
	}	

	public function render_page(){
		$this->admin_view->render_page();
	}

	public function add_menus(){
	    add_menu_page('EU Cookie Law', 'EU Cookie Law Settings', 'manage_options', 'kirim', array($this,'render_page'));
	}

 
}	

?>