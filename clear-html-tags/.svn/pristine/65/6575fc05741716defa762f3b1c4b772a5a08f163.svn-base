<?php
/**
 * This was contained in an addon until version 1.0.0 when it was rolled into
 * core.
 *
 * @package    WBOLT
 * @author     WBOLT
 * @since      1.1.0
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2019, WBOLT
 */

class Clear_HTML_Tags_Admin
{
    public static $name = 'cht_pack';
    public static $optionName = 'cht_option';
    public static $cnfItems = array(
    	'tags'=>array(
			'normal'=>array("a","div","span","br","em","b","i","h1","h2","h3","h4","h5","h6","p","img","video","strong","section","blockquote","article","figcaption","figure"),
		    'table'=>array("td","th","tr","col","table","tbody","thead","tfoot","caption","colgroup"),
		    'list'=>array("ul","li","ol","dl","dt","dd"),
		    'other'=>array("hr","nav","ins","body","head","html","ruby","title","iframe","script","detail", "header","footer")
	    ),
	    'attr'=>array("id","rel","alt","class","style","srcset","sizes","width","height","data-*"),
	    'format'=>array(
		    'text-indent'=>'段落开头空格删除',
		    'p2p'=>'段落之间自动空行',
		    'img2img'=>'图像之间自动空行',
		    'img2p'=>'图像与段落间自动空行',
		    'h2p'=>'H标题与段落间自动空行'
	    )
    );


    public function __construct(){

        if(is_admin()){
            //插件设置连接
	        add_action( 'admin_menu', array(__CLASS__,'admin_menu') );


	        add_action('admin_enqueue_scripts',array(__CLASS__,'admin_enqueue_scripts'),1);

	        add_filter( 'plugin_action_links', array(__CLASS__,'actionLinks'), 10, 2 );

            add_action( 'admin_init', array(__CLASS__,'admin_init') );

            add_filter('plugin_row_meta', array(__CLASS__, 'plugin_row_meta'), 10, 2);

	        add_action('admin_head-post.php',array(__CLASS__,'admin_head'));
	        add_action('admin_head-post-new.php',array(__CLASS__,'admin_head'));

	        add_action('media_buttons', array($this, 'add_media_button'), 20);

	        add_action('wp_ajax_wb_cht',array(__CLASS__,'ajax_cht'));

            //add_filter('use_block_editor_for_post_type',function($is_user,$post_type){return false;},10,2);
        }
    }

	public static function opt(){

		static $opt = null;
		if($opt){
			return $opt;
		}

		$opt = get_option(self::$optionName, array(
			'tags'=>array("a", "div", "span", "article", "figcaption", "figure", "blockquote", "section", "canvas", "br","detail","article","header","footer","hr","iframe","ins","body","head","html","ruby","title","script","nav"),
			'attr'=>array("id","class","style","srcset","sizes","width","height","rel","data-*"),
			'format'=>array(
				'text-indent'=>1,
				'p2p'=>1,
				'img2img'=>1,
				'img2p'=>1,
				'h2p'=>1
			),
			'custom'=>array(
				'tags'=>array(),
				'attr'=>array()
			)
		));

		return $opt;
	}

	public static function cnf($key,$default=null){
		static $option = array();
		if(!$option){
			$option = self::opt();
		}
		$keys = explode('.',$key);
		$find = false;
		$cnf = $option;
		foreach ($keys as $_k){
			if(isset($cnf[$_k])){
				$cnf = $cnf[$_k];
				$find = true;
				continue;
			}
			$find = false;
		}
		if($find){
			return $cnf;
		}

		return $default;

	}

	public static function admin_head(){

        if(defined('WB_CORE_ASSETS_LOAD') && class_exists('WB_Core_Asset_Load')){
            WB_Core_Asset_Load::load('head-14');
        }else{
            wp_enqueue_style('wb-cht-admin-style',plugin_dir_url(CLEAR_HTML_TAGS_BASE_FILE).'assets/wbp_admin.css', array(), CLEAR_HTML_TAGS_VERSION);
            wp_enqueue_script('wbui-js',plugin_dir_url(CLEAR_HTML_TAGS_BASE_FILE).'assets/wbui/wbui.js', array(), CLEAR_HTML_TAGS_VERSION);
            wp_enqueue_script('wb-cht-admin-js',plugin_dir_url(CLEAR_HTML_TAGS_BASE_FILE).'assets/wbp_admin.js', array('wbui-js'), CLEAR_HTML_TAGS_VERSION);
        }



		$cht_opt = self::opt();
		$cht_cnf = self::$cnfItems;

		$setting_url = menu_page_url( self::$name, false );

		ob_start();
		include CLEAR_HTML_TAGS_PATH.'/tpl/action_dialog.php';
		$html = ob_get_clean();
		$html = str_replace(array("\r", "\n", "\t"), '', $html);
		$_cnf = array('data'=>$html);

		wp_add_inline_script('wb-cht-admin-js','var wbcht_cnf='.json_encode($_cnf).';','before');
    }

	public function add_media_button(){
    	$html = '<button id="wb-cls-tag-btn" type="button" class="button wb-wbsm-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="15"><g fill="#999" fill-rule="evenodd"><path d="M12.7 10.7626462l-1.4-1.39999998 2.3-2.3-2.3-2.3 1.4-1.4 3 3c.4.4.4 1 0 1.4l-3 2.99999998zM3.3 10.7626462l-3-2.99999998c-.4-.4-.4-1 0-1.4l3-3 1.4 1.4-2.3 2.3 2.3 2.3-1.4 1.39999998zM6 14.0626462c-.1 0-.2 0-.3-.1-.5-.2-.8-.7-.6-1.3L9.1.66264622c.2-.5.7-.8 1.3-.6.5.2.8.7.6 1.3L7 13.3626462c-.2.4-.6.7-1 .7"/></g></svg><span>清除代码</span></button>';
		echo $html;
	}

    public static function plugin_row_meta($links,$file){

        $base = plugin_basename(CLEAR_HTML_TAGS_BASE_FILE);
        if($file == $base) {
            $links[] = '<a href="https://www.wbolt.com/plugins/cht">插件主页</a>';
        }
        return $links;
    }

    public static function admin_init(){
        //register_setting(  self::$optionName,self::$optionName );
    }

	public static function admin_menu(){

		global $wb_settings_page_hook_wbcht;
		$wb_settings_page_hook_wbcht = add_options_page(
			'HTML代码优化工具',
			'HTML代码优化工具',
			'manage_options',
			self::$name,
			array(__CLASS__,'admin_settings')
		);
	}

	public static function admin_enqueue_scripts($hook){

		global $wb_settings_page_hook_wbcht;

		if($wb_settings_page_hook_wbcht != $hook) return;
        if(defined('WB_CORE_ASSETS_LOAD') && class_exists('WB_Core_Asset_Load')){
            WB_Core_Asset_Load::load('setting-14');
        }else{
            wp_enqueue_script('vue-js', CLEAR_HTML_TAGS_URI . 'assets/vue.min.js', array(), CLEAR_HTML_TAGS_VERSION, true);
            wp_enqueue_script('wbui-js', CLEAR_HTML_TAGS_URI . 'assets/wbui/wbui.js', array(), CLEAR_HTML_TAGS_VERSION, true);
            wp_enqueue_script('wbp-cht-js', CLEAR_HTML_TAGS_URI . 'assets/wbp_setting.js', array(), CLEAR_HTML_TAGS_VERSION, true);
        }


        wp_enqueue_style('wbs-style-cht', CLEAR_HTML_TAGS_URI . 'assets/wbp_setting.css', array(), CLEAR_HTML_TAGS_VERSION);

		wp_add_inline_script('wbp-cht-js', 'var _pd_code=\'cht-setting\', cnf_cht='.json_encode(self::$cnfItems).', opt_cht='.json_encode( self::opt() ).';', 'before');
	}

	public static function actionLinks( $links, $file ) {

		if ( $file != plugin_basename(CLEAR_HTML_TAGS_BASE_FILE) )
			return $links;

		$settings_link = '<a href="'.menu_page_url( self::$name, false ).'">设置</a>';

		array_unshift( $links, $settings_link );

		return $links;
	}

	public static function admin_settings(){
		include_once( CLEAR_HTML_TAGS_PATH.'/settings.php' );
	}

	public static function ajax_cht(){
        if (!current_user_can('manage_options')) {
            exit();
        }

        $op = isset($_POST['do'])?sanitize_text_field($_POST['do']):'';

		switch ($op){

			case 'set_setting':

			    /*if(isset($_POST['opt']['txt_replace']) && is_array($_POST['opt']['txt_replace']))foreach($_POST['opt']['txt_replace'] as $k=>$r){
			        $r['s'] = preg_replace('#<(.+?)>#',"&lt;$1&gt;",$r['s']);
			        $r['r'] = preg_replace('#<(.+?)>#',"&lt;$1&gt;",$r['r']);
                    $_POST['opt']['txt_replace'][$k] = $r;
                }*/
				$opt_data =  self::sanitize_text($_POST['opt'],['re_txt']);
				$txt = '';
				if(isset($opt_data['re_txt'])){
				    $txt = stripslashes($opt_data['re_txt']);
				    $opt_data['txt_replace'] = json_decode($txt,true);
				    unset($opt_data['re_txt']);
                }
                /*if(is_array($opt_data))foreach($opt_data as $k=>$v){
                    $opt_data[$k] = self::sanitize_text($v);
                }*/


				update_option( self::$optionName, $opt_data ,false);

				$ret = array('code'=>0,'desc'=>'success','txt'=>$txt,'data'=>get_option( self::$optionName, false));

				header('content-type:text/json;charset=utf-8');
				echo json_encode($ret);
				exit();
				break;


		}

	}


    public static function sanitize_text($v,$skip_key = []){

        if(is_array($v))foreach($v as $sk=>$sv){
            if($skip_key && in_array($sk,$skip_key)){
                continue;
            }
            if(is_array($sv)){
                $v[$sk] = self::sanitize_text($sv,$skip_key);
            }else if(is_string($sv)){
                $v[$sk] = sanitize_text_field($sv);
            }
        }else if(is_string($v)){
            $v = sanitize_text_field($v);
        }
        return $v;
    }
}