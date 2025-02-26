<?php
require_once 'SDK_v3/demo/Open.php';
class open56{

	var $version = '1.0';
	var $basename = '';
	var $folder = '';

	var $package = 'open56';
	var $template = 'templates/';

	var $name = '56视频上传';

	var $action = 'media_video_list';
	var $message = '';
	var $vars = array();
	
	var $meets_guidelines = array(); // Internal use only.
	
	function __construct($plugin) {
		$this->basename = $plugin;
		$this->folder = dirname($plugin);

		//Register general hooks.
		add_action('admin_init', array(&$this, 'admin_init'));
		add_action('admin_menu', array(&$this, 'admin_menu'));
       //debug_print_backtrace();

	}
	
	function requires_32() {
		echo '<div class="error"><p>' . __('<strong>Error:</strong> Sorry, This plugin requires WordPress 3.2+. Please upgrade your WordPress installation or deactivate this plugin.', $this->package) . '</p></div>';
	}
	
	function admin_init() {
		if ( isset( $_REQUEST['outiframe'] ) && $_REQUEST['outiframe'] == '1') {
			$this->outiframe();
			exit ;
		}

		if ( ! function_exists('submit_button') ) {
			add_action('admin_notices', array(&$this, 'requires_32') );
			return;
		}

		add_filter('plugin_action_links_' . $this->basename, array(&$this, 'add_configure_link'));

		//Enqueue JS & CSS
		add_action('load-media_page_'.$this->package, array(&$this, 'add_styles') );
		add_action('media_upload_open56', array(&$this, 'add_styles') );

		if ( $this->user_allowed() ) {
			//Add actions/filters
			add_filter('media_upload_tabs', array(&$this, 'tabs'));
			add_action('media_upload_open56', array(&$this, 'tab_handler'));
		}
		
		//Register our settings:
		register_setting('open56', 'open56_appkey');
		register_setting('open56', 'open56_secrect');
		register_setting('open56', 'frmsvr_uac_users');
		register_setting('open56', 'frmsvr_uac_role');

		//Delete the video
		if ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'delete') {
			$vid = isset( $_REQUEST['post'] ) ? intval( $_REQUEST['post'] ) : '0' ;
			$rs = $this->video_delete( $vid );
			$this->message = isset( $rs['err']) ? $rs['err'] : '视频删除成功！视频列表有缓存，请10分钟之后再刷新列表查看';
			add_action('admin_notices', array(&$this, 'video_message'));
				
		}

		//Upload video callback
		if ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'callback') {
			$ok = isset( $_REQUEST['ok'] ) ? intval( $_REQUEST['ok'] ) : '0' ;
			$this->message = $ok == 1 ? '视频上传成功！视频列表有缓存，请10分钟之后再刷新列表查看' : '视频上传失败！';
			add_action('admin_notices', array(&$this, 'video_message'));
				
		}		
	}
	
	function admin_menu() {
		if ( ! function_exists('submit_button') )
			return;
        if ( $this->user_allowed() ) {
        	if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'upload') {
        		$this->action = 'video_upload';
			}
        }
        add_media_page( __('56视频上传', 'open56'), __('56视频上传', 'open56'), 'read', 'open56', array(&$this, 'menu_page') );
        add_options_page( __('56视频上传 Settings', 'open56'), __('56视频上传', 'open56'), 'manage_options', 'open56-settings', array(&$this, 'options_page') );
    }

	function add_configure_link($_links) {
		$links = array();
		if ( current_user_can('manage_options') )
			$links[] = '<a href="' . admin_url('options-general.php?page=open56-settings') . '">' . __('Options', $this->package) . '</a>';

		return array_merge($links, $_links);
	}

	//Add a tab to the media uploader:
	function tabs($tabs) {
		if ( $this->user_allowed() )
			$tabs['open56'] = __($this->name, $this->package);
		return $tabs;
	}

	function add_styles() {
		//Enqueue support files.
		if ( 'media_upload_open56' == current_filter() )
			wp_enqueue_style('media');
		wp_enqueue_style($this->package);
	}
	
	//Handle the actual page:
	function tab_handler(){
		if ( ! $this->user_allowed() )
			return;
        //Set the body ID
        $GLOBALS['body_id'] = 'media-upload';

        //Do an IFrame header
        iframe_header( __($this->name, $this->package) );

        if(!empty($_GET['vid'])){
            include 'class.open56-success.php';
            $form = new open56_success();
            $form->render();
        }else
        {
            //Add the Media buttons	
            media_upload_header();

            //Do the content
            $this->tab_video_list();
        }

		//Do a footer
		iframe_footer();
	}
	
	function menu_page() {
		if ( ! $this->user_allowed() )
			return;

		echo '<div class="wrap">';
		screen_icon('upload');
		echo '<h2>' . __($this->name, $this->package) . '</h2>';

		//Do the content
		$this->action == 'media_video_list' ? $this->media_video_list() : $this->video_upload();
		echo '</div>';
	}


	function options_page() {
		if ( ! current_user_can('manage_options') )
			return;

		include 'class.'.$this->package.'-settings.php';
		$this->settings = new open56_settings(&$this);
		$this->settings->render();
	}

	function user_allowed() {
        return true;
	}

	//Create the media video list page
	function media_video_list( $from = '', $upload_url = '' ) {
		$upload_url = 'upload.php?page=open56&action=upload';
		$conf = array (
	            'appkey'=>esc_attr(get_option('open56_appkey', '')),
	            'secret'=>esc_attr(get_option('open56_secrect', '')),
	            );
		$params = array (
				'page' => '1',
				'rows' => '100'
			);
		$videoList = Open::User_app2videos( $params, $conf );
		include_once $this->template . "tpl.MediaVideoList.php";
	}

	//Create the tab video list page
	function tab_video_list() {
		$conf = array (
	            'appkey'=>esc_attr(get_option('open56_appkey', '')),
	            'secret'=>esc_attr(get_option('open56_secrect', '')),
	            );
		$css='cDElM0RwMSUyNnAyJTNEcDIlMjZvbiUzRG9uJTI2b24lM0RvbiUyNm9uJTNEb24lMjZwbyUzRHBvJTI2bCUzRGNuJTI2YyUzRHAxMCUyNmklM0Qx';
		$sid = 'a_test_sid';
		$fields = 'title,content,tags';
		$admin_url = admin_url();
		$rurl = $admin_url.'media-upload.php?tab=open56';
		$ourl = $admin_url.'media-upload.php?tab=open56';
		$params = array(
		    'fields'=>$fields,
		    'sid'=>$sid,
		    'css'=>$css,
		    'rurl'=>$rurl,
		    'ourl'=>$ourl,
		);  
		$method = "Video/Diyupload";
		$upload_url = Open::GetPluginApi( $method,$params,$conf);
		$params = array();
		$params = array (
				'page' => '1',
				'rows' => '100'
			);
		$videoList = Open::User_app2videos( $params, $conf );
		include_once $this->template . "tpl.TabVideoList.php";
	}
	
	//Delete the video
	function video_delete( $vid ) {
		$vid = ! empty( $vid ) ? $vid : '0';
		$conf = array (
	            'appkey'=>esc_attr(get_option('open56_appkey', '')),
	            'secret'=>esc_attr(get_option('open56_secrect', '')),
	            );
		$params = array( 'vid' => $vid);
		return Open::Video_Delete( $params, $conf);
	}

	//Show the message
	function video_message(){
		echo '<div class="updated"><p>' . __( $this->message, $this->package ) . '</p></div>';
	}

	//Out of the iframe
	function outiframe() {
			echo "<script type=\"text/javascript\">";
		   	echo "url = location.href;";
			echo "url = url.replace(/&outiframe=1/g, '');";
			echo "parent.parent.location.href = url;";
			echo "</script>";
	}

	//Create the video_upload page
	function video_upload() {
		global $pagenow;
        $admin_url = admin_url();
        $conf = array(
            'appkey'=>esc_attr(get_option('open56_appkey', '')),
            'secret'=>esc_attr(get_option('open56_secrect', '')),
            );
        if(empty($conf['appkey']) || empty($conf['secret']))
        {
            echo '请先填入你的应用信息! <a href="'.$admin_url.'options-general.php?page=open56-settings">现在填写</a>';
            return false;
        }
?>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php
$css='cDElM0RwMSUyNnAyJTNEcDIlMjZvbiUzRG9uJTI2b24lM0RvbiUyNm9uJTNEb24lMjZwbyUzRHBvJTI2bCUzRGNuJTI2YyUzRHAxMCUyNmklM0Qx';
$sid = 'a_test_sid';
//$fields = 'title,content,tags';
$fields = 'title,content,tags';
$rurl = $admin_url.'upload.php?page=open56&outiframe=1&action=callback&ok=0';
$ourl = $admin_url.'upload.php?page=open56&outiframe=1&action=callback&ok=1';
$params = array(
    'fields'=>$fields,
    'sid'=>$sid,
    'css'=>$css,
    'rurl'=>$rurl,
    'ourl'=>$ourl,
);  
?>
<center>
<div style="padding-top:20px">
<iframe scrolling="no" frameborder="0" src="<?php echo Open::GetPluginApi( 'Video/Diyupload',$params,$conf);?>" name="open56" id="open56" style="height:428px; width:600px;"></iframe>
</div>
</center>
<?php
	}
}
