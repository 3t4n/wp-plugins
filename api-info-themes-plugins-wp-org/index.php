<?php
/*
 * Plugin Name:     API info for Plugins & Themes from WP.ORG
 * Description:     Show Plugins & Themes information on your site, from WP.ORG API.
 * Text Domain:     api-info-themes-plugins-wp-org
 * Domain Path:     /languages
 * Version:         1.13
 * WordPress URI:   https://wordpress.org/plugins/api-info-themes-plugins-wp-org/
 * Plugin URI:      https://puvox.software/software/wordpress-plugins/?plugin=api-info-themes-plugins-wp-org
 * Contributors:    puvoxsoftware,ttodua
 * Author:          Puvox.software
 * Author URI:      https://puvox.software/
 * Donate Link:     https://paypal.me/Puvox
 * License:         GPL-3.0
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.html
 
 * @copyright:      Puvox.software
*/


namespace ApiInfoForPluginsThemesFromWpOrg
{
  if (!defined('ABSPATH')) exit;
  require_once( __DIR__."/library.php" );
  require_once( __DIR__."/library_wp.php" );
  
  class PluginClass extends \Puvox\wp_plugin
  {

	public function declare_settings()
	{
		$this->initial_static_options	= 
		[
			'has_pro_version'        => 0, 
            'show_opts'              => true, 
            'show_rating_message'    => true, 
            'show_donation_footer'   => true, 
            'show_donation_popup'    => true, 
            'menu_pages'             => [
                'first' =>[
                    'title'           => 'API info WP.ORG items', 
                    'default_managed' => 'network',            // network | singlesite
                    'required_role'   => 'install_plugins',
                    'level'           => 'submenu', 
                    'page_title'      => 'API info for Plugins & Themes from WP.ORG',
                    'tabs'            => [],
                ],
            ]
		];
		
		$this->initial_user_options		= 
		[
			//'seconds_to_read'	=> 8, 
		]; 

		$this->shortcodes	=[
			$this->shortcode_name1 =>[
				'description'=>__('Displays the data from WP.ORG api', 'api-info-themes-plugins-wp-org'),
				'atts'=>[
					[ 'type', 		'plugins',		__('Should be either <code>plugins</code> or <code>themes</code>', 'api-info-themes-plugins-wp-org') ],
					[ 'by', 		'author',		__('You should set either <code>author</code> or <code>tag</code> (At this moment, only author supported)', 'api-info-themes-plugins-wp-org') ],
					[ 'by_value', 	'wporgusername',__('The value of the chosen <code>by</code> key (If <code>author</code> is chosen, then author username value)', 'api-info-themes-plugins-wp-org') ],
					[ 'cache_time', 1440*4,			__('Optimal cache time is 5760 minutes [4 days] (to flush this plugin\'s caches now, go to first options page)', 'api-info-themes-plugins-wp-org') ],
					[ '___', 		'___',			__('Individual Parameters to be obtained (below)', 'api-info-themes-plugins-wp-org') ],
					[ 'name', 		true,			__('', 'api-info-themes-plugins-wp-org') ],
					[ 'icon', 		true,			__('', 'api-info-themes-plugins-wp-org') ],
					[ 'banner', 	false,			__('', 'api-info-themes-plugins-wp-org') ],
				]
			]
		];


		$this->example_properties = 
		[
			'themes'=>
			[
				// TODO
			],  
			'plugins'=>
			[
				"name" => 'Plugin Name',
				"slug" => 'plugin-slug',
				"version" => '2.80',
				"author" => '<a href="https://example.com/">Example.Com</a>',
				"author_profile" => 'https://profiles.wordpress.org/UserName',
				"requires" => '4.2',
				"tested" => '5.0.3',
				"requires_php" => '',
				"compatibility" => '',
				"rating" => 60,
				"ratings" =>  (Object) [ "5" => 33,   "4" => 12,   "3" => 4,   "2" => 8,   "1" => 7 ],
				"num_ratings" => 52,
				"support_threads" => 23,
				"support_threads_resolved" => 15,
				"downloaded" => 1711,
				"last_updated" => '2019-01-18 4:32pm GMT',
				"added" => '2017-02-05',
				"homepage" => 'https://example.com/wordpress/',
				"sections" => (Object)
					[
						"description" => '<p>.....</p>',
						"installation" => '<p>....</p>',
						"faq" => '<ul> <li>...</li> </ul>',
						"changelog" => '<h4>1.0</h4> <ul> 	<li>First release.</li> </ul>',
						"screenshots" => '<ol><li><a href="https://ps.w.org/plugin-slug/assets/screenshot-1.png?rev=1810430"><img src="https://ps.w.org/plugin-slug/assets/screenshot-1.png?rev=1810430" alt="screenshot"></a><p>screenshot</p></li></ol>',
					],
				"description" => '<p>...</p>',
				"short_description" => 'Plugin adds &quot;parent &amp; hierarchy&quot; functionality to posts.',
				"download_link" => 'https://downloads.wordpress.org/plugin/plugin-slug.zip',
				"screenshots" =>  (Object)
					[
						"1" =>  (Object)	["src" => 'https://ps.w.org/plugin-slug/assets/screenshot-1.png?rev=1810430',	"caption" => 'screenshot'	]
					],
				"tags" => (Object) [ "tag1" => 'tag1',	"tag2" => 'tag2'],
				"versions" => [],
				"donate_link" => 'https://paypal.me/example',
			]
		];

		
		$props = $this->example_properties['plugins'];
		unset($props['name'], $props['icon']);

		foreach( $props as $key=>$value){
			$this->shortcodes['wporg_api_pt']['atts'][] =[ $key, false,  "" ]; //__("Show <code>$key</code>", 'api-info-themes-plugins-wp-org') 
		}
		$this->shortcodes['wporg_api_pt']['atts'][] = ['cache_error_message',	true, __('It hides the "cache low minutes" error message. But please, only use when you are extremelly sure what you are doing.', 'api-info-themes-plugins-wp-org')];
		$this->shortcodes['wporg_api_pt']['atts'][] = ['return_only_data', 		false, __('By default, function returns visualised output. If you want only data-array, instead of output, then set this to true.', 'api-info-themes-plugins-wp-org')];
		

		$this->hooks_examples = [
			"wporg_api_pt_args"				=> [ 
				'description'	=>__('Modify request arguments which is further passed to API FETCHER function', 'api-info-themes-plugins-wp-org'), 
				'parameters'	=>['args'],
				'type'			=>'filter'
			],
			"wporg_api_pt_url"				=> [ 
				'description'	=>__('Modify the url to be retrieved', 'api-info-themes-plugins-wp-org'), 
				'parameters'	=>['url','args'],
				'type'			=>'filter'
			],
			"wporg_api_pt_response_data"	=> [ 
				'description'	=>__('Modify the response data from API', 'api-info-themes-plugins-wp-org'), 
				'parameters'	=>['response_data','args'],
				'type'			=>'filter'
			],
			"wporg_api_pt_table_lines_html"	=> [ 
				'description'	=>__('Modify the table inner lines in output (if output used at all)', 'api-info-themes-plugins-wp-org'), 
				'parameters'	=>['table_lines_html','args'],
				'type'			=>'filter'
			],
			"wporg_api_pt_result"			=> [ 
				'description'	=>__('Modify the final result', 'api-info-themes-plugins-wp-org'), 
				'parameters'	=>['result','args'],
				'type'			=>'filter'
			],
		];
	} 
	
	public $shortcode_name1= "wporg_api_pt";
	public $transient_prefix = "wporg_api_pt_";

	public function __construct_my()
	{ 
		//$this->register_stylescript('wp', 'style', 'breadcrumbs_styles', 'assets/style.css');
	}

	// ============================================================================================================== //
	// ============================================================================================================== //
  

	public function get_custom_property($type, $slug, $property){

		$result='';

		if ($type=="plugins"){
			if ($property=="icon"){
				$result = "https://ps.w.org/$slug/assets/icon-128x128.png"; 
				// if that doesn't exist, then use (from Javascript) https://s.w.org/plugins/geopattern-icon/$slug.svg  
			}
			if ($property=="banner"){
				$result = "https://ps.w.org/$slug/assets/banner-772x250.png"; 
				// if that doesn't exist, then use empty background by javascript
			}
		}
		
		return $result;
	}

	// Docs: https://codex.wordpress.org/WordPress.org_API#Plugins
	public function fetch_wp_org_api( $type, $args ){ 

		$plugin_base = "https://api.wordpress.org/$type/info/1.1/?action=query_$type";
		// ########### RESPONSE has such data:  pastebin(dot)com/raw/qr8JSK1K 

		$url = $plugin_base;
		foreach($args as $key=>$value){
			$url .= "&request[$key]=$value";
		}
		$url = apply_filters('wporg_api_pt_url', $url, $args );
		$response = wp_remote_retrieve_body(wp_remote_get($url));

		if($this->helpers->is_json($response)){
			$result = json_decode($response, true);
		} else {
			$result = [];
		}
		return $result;
	}



	public function get_pt_data( $type, $args, $cache_time= 86400){

		$cache_key = $this->transient_prefix . md5(  $cache_time . "_". $type . "_" . json_encode( $args )  );

		if ( empty($cache_time) || ! $response = $this->get_transient_CHOSEN($cache_key) )
		{
			$response = $this->fetch_wp_org_api( $type, $args );

			if( ! empty($cache_time) ){
				$this->update_transient_CHOSEN( $cache_key, $response, $cache_time );
			}
		}
		return $response;
	}


	public function wporg_api_pt($atts, $content=false)
	{
		global $post;
		$args = $this->helpers->shortcode_atts( $this->shortcode_name1, $this->shortcodes[$this->shortcode_name1]['atts'], $atts);

		if( empty($args[$key='type']) ||  empty($args[$key='by']) ||   empty($args[$key='by_value'])  ){
			return __("Required parameter ($key) not set.", 'api-info-themes-plugins-wp-org') ;
		}
		if( ! in_array($args[$key='type'],[$array='plugins','themes']) ||  ! in_array($args[$key='by'],[$array='author','themes'])){
			return __("Required parameter ($key) not in ". print_r($array,true), 'api-info-themes-plugins-wp-org') ;
		} 

		$args = apply_filters("wporg_api_pt_args", $args);

		$type 		= $args['type'];
		$by			= $args['by'];
		$by_value	= $args['by_value'];;
		$cache_time = $args['cache_time'];
		//these two properties are custom, not included in API at this moment (v1.1, 2019.02)
		$icon		= $args['icon'];
		$banner		= $args['banner'];

		// I think we can fetch all fields, and only after that, in the end result, filter only the user-chosen fields
		$request_args	= [$by=>$by_value];
		$response_data	= $this->get_pt_data( $type, $request_args, $cache_time );

		// Prepare for final output
		$result=  apply_filters("wporg_api_pt_response_data", $response_data, $args );
		$pt_array = $result[$type];

		$output = '';
		$output .= '<div class="wporg_api_pt">';

		if($args['cache_error_message'] && $args[$key='cache_time'] < 5 ){
			$output .= __('<span class="cache_low_error"><b>'.$key.'</b> is too low, you are going to stress the site & API. Sorry, but that\'s not good. Set above => 5 minutes.</span>', 'api-info-themes-plugins-wp-org') ;
		}

		$output .= 
			'<style>
			.wporg_api_pt { display: flex; flex-direction: row; width: 100%; flex-wrap: wrap; background: #f7f7f7de; box-shadow: 0px 0px 20px #e7e7e7; padding: 5px; }
			.wporg_api_pt .child { margin:5px; }
			.wporg_api_pt table { text-align: center; border-collapse: separate; border-style: none!important; border-radius: 30px; border-spacing: 0; table-layout: fixed; width: 300px;  font-size: 0.9em; }
			'. //border-radius
		   '.wporg_api_pt table td { border: 1px solid #dedede; }
			.wporg_api_pt table tr:first-child td:first-child { border-top-left-radius: 20px; }
			.wporg_api_pt table tr:first-child td:last-child { border-top-right-radius: 20px; }
			.wporg_api_pt table tr:last-child td:first-child { border-bottom-left-radius: 20px; }
			.wporg_api_pt table tr:last-child td:last-child { border-bottom-right-radius: 20px; }
			'. //others
		   '.wporg_api_pt table tr { }
			.wporg_api_pt table td { word-break: break-word;  padding:2px 2px 2px 5px;  font-size: 0.9em; }
			.wporg_api_pt table tr td:first-child { width:100px; font-size: 13px;  }
			.wporg_api_pt table img.icon { width: 100px; height: 100px; }
			.wporg_api_pt table img.banner { width: 336; height: 125; }
			.wporg_api_pt .cache_low_error { color: red; }
			.wporg_api_pt table tr.name td.value { height: 90px; display: inline-block; width: 100%; }
			</style>
			<script>
			function wporg_api_pt_imgError(image, type) {
				image.onerror = null;
				var plugin_slug=  (image.src).replace("https://ps.w.org/","").replace("/assets/icon-128x128.png","").replace("/assets/icon-128x128.png","").replace("/assets/banner-772x250.png","");
				if (type=="icon")	image.src = "https://s.w.org/plugins/geopattern-icon/"+plugin_slug+".svg";
				//if (type=="banner") image.src = "https://s.w.org/plugins/geopattern-icon/"+plugin_slug+".svg";
				return true;
			}
			</script>'
		;

		$feilds	= $args;	
		unset($feilds['type'], $feilds['by'],  $feilds['by_value'], $feilds['cache_time'] ); 
	
		foreach ($pt_array as $pt_block){
			$output .= '<div class="child">';
			//$output .= '<div class="title">'.$pt_block['name'].'</div>';
			$output .= '<table>';

			$arr_first['icon'] 	= '<img class="icon"   src="'.$this->get_custom_property($type, $pt_block['slug'], 'icon').'"  onError="wporg_api_pt_imgError(this, \'icon\');" />';
			$arr_second['banner']	= '<img class="banner" src="'.$this->get_custom_property($type, $pt_block['slug'], 'banner').'"  onError="wporg_api_pt_imgError(this, \'banner\');" />'; 
			
			$new_array = $pt_block;
			$new_array = $this->helpers->insert_value_at_position($new_array,$arr_first,2);
			$new_array = $this->helpers->insert_value_at_position($new_array,$arr_second,10);

			$table_lines_html = '';
			foreach($new_array as $key=>$value)
			{
				if ( empty($feilds[$key]) ) continue;
				$display_value = is_array($value) ? json_encode($value) : $value;
				$display_value = $key=="download_link" ? '<a href="'.$display_value.'" target="_blank">Download</a>' : $display_value;
				$table_lines_html .= 
				'<tr class="'.$key.'">
					<td class="key"><span>'.$key.'</span></td><td class="value"><span>'.$display_value .'</span></td>
				</tr>';
			}
			$output .= apply_filters("wporg_api_pt_table_lines_html", $table_lines_html, $args);
			$output .= '</table>';
			$output .= '</div>';
		}
		$output .= '</div>';

		$result = $args['return_only_data'] ? $pt_array : $output;

		return apply_filters("wporg_api_pt_result", $result, $args);
	}

	
	public function additional_api_examples() { 
		?>
		<div>
		<code>
		<br/>add_filter("wporg_api_pt_request_args", "myFunc", 10, 2 );		function myFunc($request_args, $args)  { .... return $request_args; }
		<br/> ...
		<br/>add_filter("wporg_api_pt_response_data", "myFunc", 10, 2 );	function myFunc($response_data, $args)  { .... return $response_data; }
		<br/> ...
		<br/>add_filter("wporg_api_pt_table_lines_html", "myFunc", 10, 2 );   function myFunc($table_lines_html, $args)  { .... return $table_lines_html; }
		<br/> ...
		<br/>add_filter("wporg_api_pt_output", "myFunc", 10, 2 );   function myFunc($output, $args)  { .... return $output; }
		</code>
		</div>
		<?php
	}

	public function opts_page_output() 
	{

		$this->settings_page_part("start", 'first'); 
		?>

		<style>
		p.submit { text-align:center; }
		</style>
		
		<?php if ($this->active_tab=="Options") 
		{ ?>

			<?php 
			//if form updated
			if( $this->checkSubmission() ) 
			{ 
				if (!empty($_POST["flush_caches"])){
					$this->delete_transients_by_prefix_CHOSEN($this->transient_prefix);
				}
				//$this->opts = array_merge($this->opts, $this->array_map_recursive('sanitize_file_name', $_POST[ $this->plugin_slug ]) );
				//$this->update_opts(); 
			}
			?> 

			<table class="form-table">
				<tbody>
				<tr class="def">
					<th scope="row">
						<label for="aer">
							<?php _e('Flush this plugin fetched data (caches) now', 'api-info-themes-plugins-wp-org');?>
						</label>
					</th>
					<td>
						<form class="mainForm" method="post" action="">
							<input type="hidden" name="flush_caches" value="1" /> <?php $this->nonceSubmit('Clear Cache'); ?>
						</form>
					</td>
				</tr>
				</tbody>
			</table>

			<form class="mainForm" method="post" action="">
				<table class="form-table">
					<tbody>
					<tr class="def">
						<th scope="row">
							<label for="defr">
								
							</label>
						</th>
						<td>
						</td>
					</tr>
					</tbody>
				</table>
			</form>

		<?php 
		} 
 

		$this->settings_page_part("end", '');
	}





  } // End Of Class

  $GLOBALS[__NAMESPACE__] = new PluginClass();

} // End Of NameSpace




// shortcut for global use
namespace 
{
	if (!function_exists('wporg_api_pt'))
	{
		function wporg_api_pt($postid)
		{
			return $GLOBALS["ApiInfoForPluginsThemesFromWpOrg"]->wporg_api_pt($args);
		}
	}
 
}


?>