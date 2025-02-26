<?php
/*
Plugin Name: Current Date for Posts, Pages or Template
Description: Display current time and date via widget and shortcode on posts, pages, or template.
Version: 1.0
Date: October 10th, 2019
Author: getseofix.com
Author URI: https://www.getseofix.com
Licence: GNU General Public License v3.0
More info: http://www.gnu.org/copyleft/gpl.html
*/

/* Make sure plugin remains secure if called directly */
if( !defined( 'ABSPATH' ) ) {
	if( !headers_sent() ) { @header($_SERVER['SERVER_PROTOCOL'].' 403 Forbidden',TRUE,403); }
	die( 'ERROR: This plugin requires WordPress and will not function if called directly.' );
}

global $PLUGINMATRIX_NAME;
$PLUGINMATRIX_NAME='Current_Date';

if(!class_exists($PLUGINMATRIX_NAME))
{
    class Current_Date extends WP_Widget
    {
	protected $icon='thumb.png';
	protected $title=null;
	protected $display_mode=null;


        /**
         * Construct the plugin object
         */
        public function __construct()
        {
		// set full url to the icon
		if(!empty($this->icon)){
			$this->icon=rtrim(plugin_dir_url( __FILE__ ),"/").'/'.ltrim($this->icon,"/");
		}

		// register actions
		add_action('admin_init', [$this,'adminInit']);
		add_action('admin_menu', [$this,'addAdminMenu']);
		add_shortcode(__CLASS__, [$this,'shortcode']);

		$widget_options = [
		      'classname' => __CLASS__,
		      'description' => 'This widget shows the content of '.__CLASS__,
		];

		parent::__construct(__CLASS__,__CLASS__,$widget_options);
		add_action('widgets_init', [$this,'widgetInit']);
        }


	// put your custom code here and return response
	public function customCode($caller){
		// title is available as $this->title variable.

		// get options
		//2) INPUT FIELD 1: HTML to show before the plugin in the frontend. 
		//Example: <h3>List of posts</h3>. If it's blank, show nothing (no tags)
		$InputField1=get_option(__CLASS__."InputField1");

		//3) INPUT FIELD 2: it's a value (no html) that can be passed to my custom code in the plugin core. 
		//Example: #FFFFFF"
		global $InputField2;
		$InputField2=get_option(__CLASS__."InputField2");
		
		global $InputField3;
		$InputField3=get_option(__CLASS__."InputField3");

		switch($caller){
			case "shortcode":
				// put customcode here for shortcode
				ob_start();
				include("CustomCode.php");
				$content=ob_get_clean();
				// put customcode here for shortcode
			        $title=!empty($this->title)?"<h3 class=\"post-getseofix\">".$this->title."</h3>":'';
				return $title.$InputField1.$content;
				// title enclosed in h1:.. you are free to add any html here.
				//return "<h1>".$this->title."</h1>".$InputField1.$content;
			case "widget":
				ob_start();
				include("CustomCode.php");
				$content=ob_get_clean();
				// put customcode here for shortcode
			    
				return $title.$content;
				// title enclosed in h1:.. you are free to add any html here.
				//return "<h1>".$this->title."</h1>".$InputField1.$content;
		}
	}

    
        /**
         * Activate the plugin
         */
        public static function activate()
        {
		add_option(__CLASS__.'InputField1','');
		add_option(__CLASS__.'InputField2','');
		add_option(__CLASS__.'InputField3','');
        }
    
        /**
         * Deactivate the plugin
         */     
        public static function deactivate()
        {
            // Do nothing
        }

	public function adminInit()
	{
	    // Set up the settings for this plugin
		register_setting(__CLASS__, __CLASS__.'InputField1');
		register_setting(__CLASS__, __CLASS__.'InputField2');
			register_setting(__CLASS__, __CLASS__.'InputField3');
	} // 

	public function addAdminMenu() {
		if (function_exists('add_menu_page')) {
			if ( empty ( $GLOBALS['admin_page_hooks'][__CLASS__] ) ){
				add_menu_page(__CLASS__, __CLASS__, 'manage_options', __CLASS__, [$this,'adminMenu'], $this->icon);
			}
		}
	}

	public function adminMenu() {
		if(!current_user_can('manage_options')){
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
		global $PLUGINMATRIX_NAME;
		$PLUGINMATRIX_NAME=__CLASS__;
		include_once(sprintf("%s/Settings.php", dirname(__FILE__)));
	}


	public function shortcode($atts){
		$atts=shortcode_atts(['title'=>''], $atts,__CLASS__);
		$this->title=$atts['title'];
		return $this->customCode('shortcode');
	}

	// widget
	public function widget( $args, $instance ) {
		$this->title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$this->display_mode = $instance[ 'display_mode'];
		switch($this->display_mode){
			case "is_single":
				if(!is_single()) return null;
				break;
			case "is_archive":
				if(!is_archive()) return null;
				break;
			case "is_page":
				if(!is_page()) return null;
				break;
			// always
			default:
		}

		if(!empty($this->title)){
			$title=$args['before_title'] . $this->title . $args['after_title'];
		}
		else{
			$title=$this->title;
		}

		echo $args['before_widget'] . $title;
		echo '<p>'.$this->customCode('widget').'</p>';
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$display_mode=$instance['display_mode'];
	?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
 <label for="<?php echo $this->get_field_id('display_mode'); ?>">Display mode: 
        <select class='widefat' id="<?php echo $this->get_field_id('display_mode'); ?>"
                name="<?php echo $this->get_field_name('display_mode'); ?>" type="text">
          <option value='always' <?php echo ($display_mode=='always')?'selected':''; ?>>always</option>
          <option value='is_single' <?php echo ($display_mode=='is_single')?'selected':''; ?>>is_single</option>
          <option value='is_archive' <?php echo ($display_mode=='is_archive')?'selected':''; ?>>is_archive</option>
          <option value='is_page' <?php echo ($display_mode=='is_page')?'selected':''; ?>>is_page</option>
        </select>                
      </label>
		</p>
	<?php
	}

	public function update( $new_instance, $old_instance ) {
	  $instance = $old_instance;
	  $instance['title'] = strip_tags( $new_instance[ 'title' ] );
	  $instance['display_mode'] = $new_instance['display_mode'];
	  return $instance;
	}

	public function widgetInit(){
		register_widget(__CLASS__);
	}
	// end widget related functions
   }
}

if(class_exists($PLUGINMATRIX_NAME))
{
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, [$PLUGINMATRIX_NAME, 'activate']);
	register_deactivation_hook(__FILE__, [$PLUGINMATRIX_NAME, 'deactivate']);

	try{
		$obj = new $PLUGINMATRIX_NAME();
	}
	catch(\Exception $e){
		echo $e->getMessage();
	}
}