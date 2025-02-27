<?php
class DDSOO_options{
	public $ver=DDSOO_version;
	public $plugin_title="Storefront by DoorDash";
	public $plugin_name="doordash";
	function __construct() {		
		add_action('admin_menu', array( $this, 'addPluginAdminMenu' ), 9); 
		add_action('admin_init', array( $this, 'registerAndBuildFields' ));	
		add_action('admin_notices', array( $this, 'admin_messages'));

		add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_style' ) );
		add_filter("plugin_action_links_".DDSOO_plugin, array( $this, 'settings_link' ) );

    remove_action('wp_head', array($this, 'append_storefront_sdk'), 9);
    add_action('wp_head', array($this, 'append_storefront_sdk' ), 9);

	}
	public function admin_messages() { // NEW			
		if(isset($_GET["settings-updated"]) && $_GET["settings-updated"] == true) {
			add_settings_error( "doordash-notices", "settings-updated", __("Your Storefront button settings were updated".$print, "ddsoo"), "updated" );
		}		
	}
	public function settings_link($links) {		
		 $settings_link = '<a href="admin.php?page=doordash">Settings</a>'; 
		  array_unshift($links, $settings_link); 
		  return $links; 	
	}	
	public function load_admin_style($hook) {
		
		$css = '
		.toplevel_page_doordash .dashicons-before img {
			max-width: 16px;
		}
		';
		wp_register_style( 'ddintegration-style', plugins_url( 'dd-style.css' , __FILE__ ), array() ,$this->ver );
		wp_enqueue_style( 'ddintegration-style' );
		wp_add_inline_style( 'ddintegration-style', $css );	
		
		if ($hook != 'toplevel_page_doordash') return;	
		//echo $hook ;
		// enqueue js
		wp_enqueue_style( 'ddintegration-color', plugins_url( 'dd-color.css' , __FILE__ ), array() ,$this->ver);

		wp_enqueue_script( 'ddintegration-script', plugins_url( 'dd-script.js' , __FILE__ ) , array(), $this->ver, true );	
		wp_enqueue_script( 'ddintegration-color', plugins_url( 'dd-color.js' , __FILE__ ) , array(), $this->ver, true );			
	}
	public function addPluginAdminMenu() {
		//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
		add_menu_page(  $this->plugin_name, $this->plugin_title, 'administrator', $this->plugin_name, array( $this, 'displayPluginAdminDashboard' ), plugins_url( 'icon.svg', __FILE__), 26 );	
		
	}
	public function displayPluginAdminDashboard() {
		 require_once ('dd-options-display.php');
	}
	public function registerAndBuildFields() {
		require_once('data/dd-data.php');
		$data=new DDSOO_data();
		$properties= $data->properties();
		 
		add_settings_section(
			  // ID used to identify this section and with which to register options
			  'DDSOO_general_section', 
			  // Title to be displayed on the administration page
			  '',  
			  // Callback used to render the description of the section
			   array( $this, 'display_general_account' ),    
			  // Page on which to add this section of options
			  'DDSOO_general_settings'                    
			);
		unset($args);		

		//$advanced_input = get_option('DDSOO_advanced_input');
		$advanced_input = 0;			

		foreach( $properties as $p){
			$this->registerAndBuildField($p, $advanced_input);
		}	
		$p=["name"=>"advanced_input", "title"=>"Advanced", "type"=>"input", "subtype"=>"text"];
		$this->registerAndBuildField($p);	

	}	
	public function registerAndBuildField($p=[], $advanced_input=false) {
		$p=wp_parse_args($p, ["name"=>"",	"title"=>"", "mandatory"=>false, "required"=>false, "advanced"=>false, "default_value"=>'', "type"=>"", "subtype"=>"", "options"=>[]]); extract($p);
		$publish = get_option('DDSOO_'.$name.'_publish');
		$value = get_option('DDSOO_'.$name);
        preg_match('/<span class="-title-tag">(.*?)<\/span>/s', $title, $title_text);
        
		$class='';
		if(isset($_POST['DDSOO_'.$name]) && !$_POST['DDSOO_'.$name] && $required) {			
			add_settings_error( "doordash-notices", "field-required", __("<span style='font-weight:bold;'>".$title_text[1]."</span> value required", "ddsoo"), "error" );
			$class.=" -required";
		}
		
		if($mandatory) {
			$class.="publish"; 
		}else {
			$class.="publish";
			if($advanced_input){
				$class.="";
			}else{
				$class.=" -hide";
			}
		}

		if($advanced) {
			$class.=" DDSOO_advanced";
		}
		
		if(!$value && $default_value) $value=$default_value;
		if($color) {
			$class.=" --color"; 
		}
		$args = array (
			'type'      => $type,
			'subtype'   => $subtype,
			'id'    => 'DDSOO_'.$name,
			'name'      => 'DDSOO_'.$name,
			'required' => $required,			
			'value_type'=>'normal',
			'wp_data' => 'option',
			'color' => $color,				
			'class'=>'--prop DDSOO_'.$name.' '.$class,
			'default_value' => $default_value,		
		);
		if($options) $args['get_options_list']=	$options;
        
		if($color) {
			if($value) {
				$_class='--has-value';
			}else{
				$_class='';
			}
			$args['prepend_value']='<div class="--color-picker '.$_class.'"  data-title="'.$title_text[1].'"  style="background-color:'.$value.';"><div class="--color-img"><img src="'.DDSOO_IMG.'icon_color.png"/></div><div class="--color-value"></div></div>';;
			
		}	

		add_settings_field(
			'DDSOO_'.$name,
			$title,
			array( $this, 'render_settings_field' ),
			'DDSOO_general_settings',
			'DDSOO_general_section',
			$args
		);
		register_setting(
			'DDSOO_general_settings',
			'DDSOO_'.$name
		);	

		$args = array (
			'type'      => "input",
			'subtype'   => "hidden",
			'id'    => 'DDSOO_'.$name."_publish",
			'name'      => 'DDSOO_'.$name."_publish",
			'required' => false,			
			'value_type'=>'normal',
			'wp_data' => 'option',
			'class'=>'hidden DDSOO_'.$name.'_publish',			
		);

		add_settings_field(
			'DDSOO_'.$name."_publish",
			"",
			array( $this, 'render_settings_field' ),
			'DDSOO_general_settings',
			'DDSOO_general_section',
			$args
		);
		register_setting(
			'DDSOO_general_settings',
			'DDSOO_'.$name."_publish"
		);	
	}	
	public function display_general_account() {
	  //echo '<p>These settings apply to all DoorDash functionality.</p>';
	} 
	public function render_settings_field($args) {
			 /* EXAMPLE INPUT
				'type'      => 'input',
				'subtype'   => '',
				'id'    => $this->plugin_name.'_example_setting',
				'name'      => $this->plugin_name.'_example_setting',
				'required' => 'required="required"',
				'get_option_list' => "",
				'value_type' = serialized OR normal,
				'wp_data'=>(option or post_meta),
				'post_id' =>
			 */     
		$class='';
	   if($args['wp_data'] == 'option'){
			$wp_data_value = get_option($args['name']);			
		} elseif($args['wp_data'] == 'post_meta'){
			$wp_data_value = get_post_meta($args['post_id'], $args['name'], true );
		}
		$value = ($args['value_type'] == 'serialized') ? serialize($wp_data_value) : $wp_data_value;
		if(!$value && $args['default_value']) $value=$args['default_value'];
		$prependStart = (isset($args['prepend_value'])) ? '<div class="input-prepend"> <span class="add-on">'.$args['prepend_value'].'</span>' : '';
		$prependEnd = (isset($args['prepend_value'])) ? '</div>' : '';
		if($args['required'] && !$value) $required_class='__dd_input_error'; else $required_class='';		
		switch ($args['type']) {
			case 'select':
				echo $prependStart.'<select id="'.$args['id'].'" "'.$args['required'].'" name="'.$args['name'].'" value="' . esc_attr($value) . '" class="'.$required_class.'">';
				foreach ($args['get_options_list'] as $o){
					if($value==$o['value']) $selected="selected"; else $selected="";
					echo '<option value="'.$o['value'].'" '.$selected.'>'.$o['text'].'</option>';
					
				}
				echo '</select>'.$prependEnd;
				break;
			case 'textarea':
				echo $prependStart.'<textarea id="'.$args['id'].'" "'.$args['required'].'" name="'.$args['name'].'" class="'.$required_class.'">';
					echo  esc_attr($value) ;
				echo '</textarea>'.$prependEnd;
				break;
			case 'input':				
				if($args['subtype'] == 'hidden'){
					echo '<input type="hidden" id="'.$args['id'].'" "'.$args['required'].'"  name="'.$args['name'].'" value="' . esc_attr($value) . '"  class="'.$required_class.'"/>';				

				} else if($args['subtype'] != 'checkbox'){					
					$step = (isset($args['step'])) ? 'step="'.$args['step'].'"' : '';
					$min = (isset($args['min'])) ? 'min="'.$args['min'].'"' : '';
					$max = (isset($args['max'])) ? 'max="'.$args['max'].'"' : '';

					
					
					if(isset($args['disabled'])){
						// hide the actual input bc if it was just a disabled input the informaiton saved in the database would be wrong - bc it would pass empty values and wipe the actual information
						echo $prependStart.'<input type="'.$args['subtype'].'" id="'.$args['id'].'_disabled" '.$step.' '.$max.' '.$min.' name="'.$args['name'].'_disabled" size="40" disabled value="' . esc_attr($value) . '"  class="'.$required_class.'"/><input type="hidden" id="'.$args['id'].'" '.$step.' '.$max.' '.$min.' name="'.$args['name'].'" size="40" value="' . esc_attr($value) . '" />'.$prependEnd;
					} else {
						echo $prependStart.'<input type="'.$args['subtype'].'" id="'.$args['id'].'" "'.$args['required'].'" '.$step.' '.$max.' '.$min.' name="'.$args['name'].'" size="40" value="' . esc_attr($value) . '"  class="'.$required_class.'"/>'.$prependEnd;
					}	
								

				} else {
					$checked = ($value) ? 'checked' : '';
					echo '<input type="'.$args['subtype'].'" id="'.$args['id'].'" "'.$args['required'].'" name="'.$args['name'].'" size="40" value="1" '.$checked.'  class="'.$required_class.'"/>';
				}
				break;
			default:
				# code...
				break;
		}
	}

  public function append_storefront_sdk() {
			require_once("mod/dd-generate.php");
			$generate=new DDSOO_mod_generate();
			$json=$generate->run();

      echo '<script>
            let obj = '.$json.'
            const colorWhite = "#ffffff"
            const colorBlack= "#000000"
            
            if(obj["buttonBackgroundColor"] === colorWhite) {
                obj["buttonTextColor"] = colorBlack
            } else {
                obj["buttonTextColor"] = colorWhite
            }
            
            if(obj["position"]) {
                let btnCoordinates = obj["position"].split("_")
                obj["position"] = btnCoordinates[0]
                obj["buttonAlignment"] = btnCoordinates[1]
            }
            console.log("obj", obj)

          !function(e,t,r,n){var o,c,s;o=e.document,c=t.children[0],s=o.createElement("script"),e.StorefrontSDKObject="StorefrontSDK",e[e.StorefrontSDKObject]={executeCommand:function(t,r){e[e.StorefrontSDKObject].buffer.push([t,r])},buffer:[]},s.async=1,s.src="https://web-apps.cdn4dd.com/webapps/sdk-storefront/latest/sdk.js",t.insertBefore(s,c)}(window,document.head);StorefrontSDK.executeCommand(\'renderFloatingButton\', obj)
          </script>';
    }

}
new DDSOO_options();
