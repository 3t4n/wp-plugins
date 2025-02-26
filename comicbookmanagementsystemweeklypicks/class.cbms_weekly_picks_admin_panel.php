<?php
class cbms_weekly_picks_admin_panel{

    public function __construct() {
        add_action('admin_enqueue_scripts', array($this,'enqueueAdmin'));
        add_action('wp_enqueue_scripts', array($this,'enqueue'));
		add_action('admin_menu', array(&$this, 'cbms_weeklypicks_AdminMenu'));
    }
	
	
	/**Load Admin Scripts.*/
    public function enqueueAdmin() {
    	wp_enqueue_style('cbms_weekly_picks_admin_style', plugins_url('css/cbms_weeklypicks_admin.css', __FILE__), null, '1.0');
    }
	

	/**Load Front-End Scripts.*/
    public function enqueue() {
    	wp_enqueue_script('cbms_weekly_picks_script', plugins_url('js/cbms_weeklypicks.js', __FILE__), array('jquery'), '1.0', true);
    	wp_enqueue_style('cbms_weekly_picks_style', plugins_url('css/cbms_weeklypicks.css', __FILE__), null, '1.0');
    }
	
	
	/**Admin Menu.*/
	function cbms_weeklypicks_AdminMenu() {
		add_menu_page('CBMS Weekly Picks','CBMS Weekly Picks', 'manage_options',  'cbms_weekly_picks_admin', array( &$this, 'cbms_weekly_picks_admin_page'), plugins_url('img/icon.png', __FILE__) );		
    }	  
	
	
	/**Display Menu.*/
	function cbms_weekly_picks_admin_page() {
		$action = isset($_GET['action']) ? $_GET['action'] : "";
		
		
		/**Main Admin Page.*/
		function cbms_weekly_picks_welcome() {
			require( CBMS_WEEKLY_PICKS_PLUGIN_DIR . '/includes/cbms_weeklypicks_admin.php' );
		}	

		
		/**Add New Weekly Picks.*/
		function cbms_weekly_picks_add() {
			if( isset( $_POST['add_picks'] ) ) 
		      {
				for($i = 1; $i <= 7; $i++)
				   {
					 $picks = new cbms_weekly_picks;
					 $picks->storeFormValues( $_POST );
					 $picks->insert();  
					 $fileName = ("weeklypick_" . $i);
					  
					  if( isset( $_FILES[$fileName] ) )
						{
						  $picks->storeUploadedImage( $_FILES[$fileName] );
						}
					}
	
				$_SESSION['status'] = "Weekly Picks Have Been Added";
				cbms_weekly_picks_welcome();					  		  
			  }
			else
			  {
			    $picksStored = cbms_weekly_picks::isStored(1);
				if( $picksStored )
				  {
				    require( CBMS_WEEKLY_PICKS_PLUGIN_DIR . '/includes/cbms_weeklypicks_admin.php' );
				  }
				else
				  {
				    require( CBMS_WEEKLY_PICKS_PLUGIN_DIR . '/includes/cbms_weeklypicks_add.php' );
				  }
			  }
		}	

	
		/**Update Weekly Picks*/
		function cbms_weekly_picks_update() {
			$weeklypicks = array();
			$weeklypicks['update'] = "update";		
		
			if( isset( $_POST['update_picks'] ) )
			  {
			    $id = absint( $_POST['id'] ); 

				$picksStored = cbms_weekly_picks::isStored( $id );
				if( $picksStored ) 
				  {
				    $picks = new cbms_weekly_picks;
					$picks->storeFormValues( $_POST );

					if( isset( $_FILES['imagefile']['name'] ) ) 
					  {
						if( !empty( $_FILES['imagefile']['name'] )) 
						  {
							$picks->storeUploadedImage( $_FILES['imagefile'] );
						  }
					  }					
					
					$picks->update();
				  }	
				  
				cbms_weekly_picks_welcome(); 	
			  }			  
			else
			  {
			    $id = absint( $_GET['id'] ); 

				$weeklypicks['update'] = cbms_weekly_picks::getByID( $id );	 
				if($weeklypicks['update'] != null)
				  {
				     require( CBMS_WEEKLY_PICKS_PLUGIN_DIR . '/includes/cbms_weeklypicks_add.php' );
				  }
				else
				  {
					cbms_weekly_picks_welcome();	
				  }
			  }
		}			
		
		
		switch($action) 
		{			
		  case 'add_picks':
			cbms_weekly_picks_add();
			break;	
		  case 'update_picks':
			cbms_weekly_picks_update();
			break;	
		  default:
			cbms_weekly_picks_welcome();
		}			
	}
	
	
	
	/**Display Weekly Picks*/
	public static function display_weekly_picks() {
		ob_start();
		require( CBMS_WEEKLY_PICKS_PLUGIN_DIR . '/includes/cbms_display_weekly_picks.php' );	
		return ob_get_clean(); 
	}
		
}
add_shortcode( 'display_weekly_picks', array( 'cbms_weekly_picks_admin_panel', 'display_weekly_picks' ) );

global $cbms_w_p;
$cbms_w_p = new cbms_weekly_picks_admin_panel();