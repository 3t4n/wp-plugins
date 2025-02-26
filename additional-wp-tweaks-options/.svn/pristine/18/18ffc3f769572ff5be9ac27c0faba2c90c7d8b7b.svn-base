<?php
/*
 * Plugin Name:     Additional Options and Tweaks
 * Description:     Read plugin description at https://wordpress.org/plugins/additional-wp-tweaks-options/
 * Text Domain:     additional-wp-tweaks-options
 * Domain Path:     /languages
 * Version:         1.27.1
 * WordPress URI:   https://wordpress.org/plugins/additional-wp-tweaks-options/
 * Plugin URI:      https://puvox.software/software/wordpress-plugins/?plugin=additional-wp-tweaks-options
 * Contributors:    puvoxsoftware,ttodua
 * Author:          Puvox.software
 * Author URI:      https://puvox.software/
 * Donate Link:     https://paypal.me/Puvox
 * License:         GPL-3.0
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.html

 * @copyright:      Puvox.software
*/


namespace AdditionalWpTweaksOptions
{
  if (!defined('ABSPATH')) exit;
  require_once( __DIR__."/library.php" );
  require_once( __DIR__."/library_wp.php" );
  
  class PluginClass extends \Puvox\wp_plugin
  {

	public function declare_settings()
	{
		$this->set_initial_static_options(
		[
			'has_pro_version'        => 0, 
            'show_opts'              => true, 
            'show_rating_message'    => true, 
            'show_donation_footer'   => true, 
            'show_donation_popup'    => true, 
            'menu_pages'             => [
                'first' =>[
                    'title'           => 'Additional Tweaks', 
                    'default_managed' => 'network',            // network | singlesite
                    'required_role'   => 'install_plugins',
                    'level'           => 'submenu', 
                    'page_title'      => 'Additional Options and Tweaks',
                    'tabs'            => ['custom options'],
                ],
            ]
		]);

		$this->set_initial_user_options(
		[
			'custom_note' => [
				'title'		   => 'Save a note',
				'description'  => 'Just a notepad for you, to save something random things for this site, so you will not forget them',
				'type'		   => 'textarea',
				'default'	   => '- maybe I will change the theme later... or blabla note here...',
			],
			'additional_posttypes_in_query__enabled' => [
				'title'		   => 'Enable custom post types in query',
				'description'  => 'by default, wordpress includes only <code>post</code> types, so many external plugins can not show custom posts in their functionalities. This option enables to include custom posts',
				'type'		   => 'checkbox',
				'default'	   => true,
				'no_separator' => true,
			],
			'additional_posttypes_in_query__types' => [
				'title'		   => 'List custom post types',
				'type'		   => 'text',
				'default'	   => 'my_custom_post_1,my_custom_post_2',
				'no_separator' => true,
			],
			'additional_posttypes_in_query__force_children_categories' => [
				'title'		   => 'Force children categories',
				'description'  => 'Force to include posts from children categories too, instead of limiting to current category',
				'type'		   => 'checkbox',
				'default'	   => false,
			],
			'sort_pages_by_parent__enabled'	=> [
				'title'		   => 'Sort pages by parent',
				'description'  => 'In Dashboard>Pages, ability to sort them by parent',
				'type'		   => 'checkbox',
				'default'	   => true,
			],
			'sort_pages_by_parent__post_types'	=> [
				'title'		   => 'post types',
				'description'  => 'Comma separate list of post types',
				'type'		   => 'text',
				'default'		=> 'page',
			],
			'search_hightlighting__enabled'	=> [
				'title'		   => 'Search Highlighting - Enable',
				'description'  => 'Highlights the search phrase in search results (see example <a target="_blank" href="'. home_url('/?s=and') .'">here</a>)',
				'type'		   => 'checkbox',
				'default'	   => true,
				'no_separator' => true,
			],
			'search_hightlighting__background_color'=> [
				'title'		   => '',
				'type'		   => 'color',
				'default'	   => '#fff480',
				'description'  => 'To change the styling further, you can go to <code>Customizer&gt;Additional CSS&gt;</code> add your definition: <code>.'.$this->searchHighlightClassName.'{background:red;}</code>',
			],
			'search_exact_match__enabled' => [
				'title'		   => 'Allow exact search',
				'description'  => 'Use &quot;double quoted&quot; for exact sentence match',
				'type'		   => 'checkbox',
				'default'	   => true,
			],
			'authcookie_live__enabled' => [
				'title'		   => 'Auth cookie expiration',
				'description'  => 'Set custom days for wp authorization expiration',
				'type'		   => 'checkbox',
				'default'	   => true,
				'no_separator' => true,
			],
			'authcookie_live_days_remember' => [
				'title'		   => '',
				'description'  => 'Choose days amount, when "remember" is checked',
				'type'		   => 'number',
				'default'	   => 14,
				'no_separator' => true,
			],
			'authcookie_live_days_noremember' => [
				'title'		   => '',
				'description'  => 'Choose days amount, when "remember" is not checked',
				'type'		   => 'number',
				'default'	   => 2,
			],
			'nav_search__enabled' => [
				'title'		   => 'Dashboard Search items amount',
				'type'		   => 'checkbox',
				'default'	   => true,
				'no_separator' => true,
			],
			'nav_search_amount' => [
				'title'		   => '',
				'description'  => 'Custom amount of items shown in quick search (across dashboard navmenu search)',
				'type'		   => 'number',
				'default'	   => 30,
			],
			'postsperpage__enabled' => [
				'title'		   => 'Posts per page amount',
				'type'		   => 'checkbox',
				'default'	   => true,
				'no_separator' => true,
			],
			'postsperpage_amount' => [
				'title'		   => '',
				'description'  => 'Custom amount of posts to be shown in front-end standard categories/homepage',
				'type'		   => 'number',
				'default'	   => 30,
			],
			'editor_roles__enabled' => [
				'title'		   => 'Editor permissions increase',
				'type'		   => 'checkbox',
				'default'	   => false,
				'no_separator' => true,
			],
			'editor_roles_list' => [
				'title'		   => '',
				'description'  => 'Set additional permissions for editor role (comma separated)',
				'type'		   => 'textarea',
				'default'	   => 'edit_theme_options,update_core,update_themes,switch_themes,update_plugins,remove_users,list_users,edit_dashboard,delete_themes,delete_plugins,activate_plugins,manage_sites,manage_network_plugins,upgrade_network,manage_network_options,manage_network_themes,delete_themes,customize,edit_theme_options,switch_themes,edit_dashboard,manage_categories,moderate_comments,manage_links,export,import',
			],
			'custom_excerpt_length__enabled' => [
				'title'		   => 'Override excerpt length',
				'type'		   => 'checkbox',
				'default'	   => true,
				'no_separator' => true,
			],
			'custom_excerpt_length_set' => [
				'title'		   => '',
				'description'  => 'Override default excerpt length to this number of words',
				'type'		   => 'number',
				'default'	   => 30,
			],
			'custom_excerpt_text__enabled' => [
				'title'		   => 'Override excerpt text',
				'type'		   => 'checkbox',
				'default'	   => true,
				'no_separator' => true,
			],
			'custom_excerpt_text_set' => [
				'title'		   => '',
				'description'  => 'Override default "excerpt_more" text to this phrase',
				'type'		   => 'text',
				'default'	   => '(Continue Reading)',
			],
			'noindex_garbage__enabled' => [
				'title'		   => 'Noindex garbage pages',
				'description'  => 'All other pages will be noindexed with <code>&lt;meta name="robots" content="noindex, nofollow"&gt;</code>, except: is_front_page,is_home,is_page,is_single,is_search,is_archive,is_category,is_attachment,is_author,is_tag',
				'type'		   => 'checkbox',
				'default'	   => true,
			],
			'extra_mimetypes__enabled' => [
				'title'		   => 'Extra mimetypes',
				'description'  => 'Allow zip, gzip, 7z, txt file types to be uploaded',
				'type'		   => 'checkbox',
				'default'	   => true,
			],
			'custom_post_types__enabled' => [
				'title'		   => 'Enable custom post types',
				'type'		   => 'checkbox',
				'default'	   => true,
				'no_separator' => true,
			],
			'custom_post_types_data' => [
				'title'		   => '',
				'description'  => 'Enter the list of custom post types, one per line, in the format: <code>my_post_type|My Custom Type Title</code>. Note, for advanced functionality, we might advise for <b>custom-post-type-ui</b> plugin',
				'type'		   => 'textarea',
				'default'	   => '',
			],
			'thumbnail_column_in_dashboard__enabled' => [
				'title'		   => 'Show thumbnails column in dashboard',
				'description'  => 'In wp-admin dashboard posts & pages list pages, show additional column for thunbnails',
				'type'		   => 'checkbox',
				'default'	   => true,
				'no_separator' => true,
			],
			'thumbnail_column_in_dashboard_post_types' => [
				'title'		   => 'For Post types',
				'description'  => '(comma separated post types plural-name list, where column will be shown)',
				'type'		   => 'text',
				'default'	   => 'posts,pages',
			],
			'hide_wp_adminbar__enabled' => [
				'title'		   => 'Remove admin topbar',
				'description'  => 'Remove admin toolbar from backend & frontend',
				'type'		   => 'checkbox',
				'default'	   => false,
			],
			'redirect_to_path__enabled' => [
				'title'		   => 'Redirect to subdirectory',
				'type'		   => 'checkbox',
				'default'	   => false,
				'no_separator' => true,
			],
			'redirect_to_path_set' => [
				'title'		   => '',
				'description'  => 'If you want to redirect visitors from visiting to home path (<code>'.$this->homeurl().'</code>) to a subdirectory(<code>'.$this->homeurl().'my_path/</code>), enter the path here',
				'type'		   => 'text',
				'default'	   => '/my_path/',
			],
			'override_wp_sendmail__enabled' => [
				'title'		   => 'Override wordpress mail sending settings',
				'type'		   => 'checkbox',
				'default'	   => false,
				'no_separator' => true,
			],
			'wp_sendmail_from_mail' => [
				'title'		   => '',
				'description'  => 'from email address',
				'type'		   => 'text',
				'default'	   => 'contact@%domain%',
				'no_separator' => true,
			],
			'wp_sendmail_from_name' => [
				'title'		   => '',
				'description'  => 'from name',
				'type'		   => 'text',
				'default'	   => 'My Website',
				'no_separator' => true,
			],
			'wp_sendmail_html_type' => [
				'title'		   => '',
				'description'  => 'enable HTML type',
				'type'		   => 'checkbox',
				'default'	   => true,
			],
			'disable_emojis__enabled' => [
				'title'		   => 'Remove emojis styles & scripts',
				'description'  => 'Might theoretically add a slight performance to a website, if those extra scripts are not loaded',
				'type'		   => 'checkbox',
				'default'	   => false,
			],
			'restore_jquery__enabled' => [
				'title'		   => 'Restore jQuery <b>$</b> definition in wp-head loading',
				'description'  => 'If you use some scripts, that are using jQuery, but wordpress fires an error, saying that `$` is not defined, then you can enable this option',
				'type'		   => 'checkbox',
				'default'	   => false,
				'no_separator' => true,
			],
			'restore_jquery_enable_in_front_too' => [
				'title'		   => '',
				'description'  => 'in front-end too',
				'type'		   => 'checkbox',
				'default'	   => false,
			],
			'remove_email_update_notifications__enabled' => [
				'title'		   => 'Disable update notifications',
				'description'  => 'If you do not want to receive emails, when wp makes updates',
				'type'		   => 'checkbox',
				'default'	   => false,
			],
			'disable_rest_api__enabled' => [
				'title'		   => 'Disable WP rest api',
				'description'  => 'for without authentication (except from localhost calls)',
				'type'		   => 'checkbox',
				'default'	   => false,
			],
			'disable_rest_api_users__enabled' => [
				'title'		   => 'Disable WP rest /users endpoint',
				'description'  => 'This endpoint will be disabled: '. sprintf('<a href="%s" target="_blank">', site_url('/wp-json/wp/v2/users')),
				'type'		   => 'checkbox',
				'default'	   => true,
			],
			'development_favicons__enabled' => [
				'title'		   => 'Random favicons during development',
				'description'  => 'To differentiate between localhost and remote site, localhost favicon will be red <span style="color:red">⬤</span>, and remote will be green <span style="color:green">⬤</span> (useful during development)',
				'type'		   => 'checkbox',
				'default'	   => false,
			],
			'add_extra_body_classes__enabled' => [
				'title'		   => 'Add body css classes',
				'description'  => 'Adds standard & useful css class names to body, including role, front/back end (Useful if current theme lacks normal & distinctive css class names)',
				'type'		   => 'checkbox',
				'default'	   => true,
			],
			'add_extra_content_classes__enabled' => [
				'title'		   => 'Add content & excerpt css classes',
				'description'  => 'Wrap post contents & excerpts inside a div-classes (Useful if current theme lacks them)',
				'type'		   => 'checkbox',
				'default'	   => true,
			],
			'add_category_title_fields__enabled' => [
				'title'		   => 'Add category title field',
				'description'  => 'They will be accessible with <code>get_term_meta($term_id, \'_cattitle\', true)</code>',
				'type'		   => 'checkbox',
				'default'	   => false,
			],
			'asynchronous_image_load_in_content__enabled'	=> [
				'title'		   => 'Content lazyload images - Enable',
				'description'  => 'an inline lazyload images functionality (absolutely without any extra script or loading on site), which causes your site pages to load faster without waiting images at first, by changing <code>&lt;img src=</code> into <code>&lt;img lazyloaded-src=</code>, so after page is loaded at first, then will load images (Notice: If you care of your site performance, then We highly recommend to use other advanced "lazy load image" plugins)',
				'type'		   => 'checkbox',
				'default'	   => false,
			],
			'replace_buffer_text__enabled' => [
				'title'		   => 'Enable buffer text replacement',
				'description'  => 'if you ever want to change some phrase with another (inside whole website output source). This setting should be used during testing/development purposes.',
				'type'		   => 'checkbox',
				'default'	   => false,
				'no_separator' => true,
			],
			'replace_buffer_text_from' => [
				'title'		   => '',
				'description'  => 'replace what',
				'type'		   => 'text',
				'default'	   => 'YYYYYYYYYYYYY',
				'no_separator' => true,
			],
			'replace_buffer_text_to' => [
				'title'		   => '',
				'description'  => 'replace with',
				'type'		   => 'text',
				'default'	   => 'ZZZZZZZZZZZZZ',
			],
			'temporary_enable_plugin_activation_iframe__enabled'	=> [
				'title'		   => 'Enable Plugin activation error iframe',
				'description'  => 'Show "fatal error" thrown during plugin activation (in recent WP versions it is hidden)',
				'type'		   => 'checkbox',
				'default'	   => false,
			],
			'google_analytics_userid__enabled' => [
				'title'		   => 'Google Analytics User ID',
				'description'  => '(if you insert code, only in that case would Google Analytics script will be inserted in website footer. If you leave this field empty, no script will be added in website)',
				'type'		   => 'text',
				'default'	   => '',
				'placeholder'  => 'G-1234567X '
			],
			'backend_styles__enabled' => [
				'title'		   => 'Enable custom admin css',
				'type'		   => 'checkbox',
				'default'	   => true,
				'no_separator' => true,
			],
			'backend_styles__css' => [
				'title'		   => '',
				'description'  => 'You can insert custom css which will be added into admin dashboard styles',
				'type'		   => 'textarea',
				'default'	   => ".my_whatever_class1 { color: red; }",
			],
			'frontend_styles__enabled' => [
				'title'		   => 'Enable custom frontend css',
				'type'		   => 'checkbox',
				'default'	   => true,
				'no_separator' => true,
			],
			'frontend_styles__css' => [
				'title'		   => '',
				'description'  => 'You can insert custom css which will be added into front-end styles',
				'type'		   => 'textarea',
				'default'	   => ".my_whatever_class2 { color: blue; }",
			],
			'footer_html__enabled' => [
				'title'		   => 'Enable custom HTML in footer',
				'description'  => 'if you want to add some custom codes in the wp footer',
				'type'		   => 'checkbox',
				'default'	   => false,
				'no_separator' => true,
			],
			'footer_html_content' => [
				'title'		   => 'Footer script content',
				'description'  => 'You should place the html content here (no &lt;style&gt; or &lt;script&gt; tags)',
				'type'		   => 'textarea',
				'default'      => '',
				'placeholder'  => '<div class="my123"> hello world </div>',
				'html'	       => true,
			],
			'footer_script__enabled' => [
				'title'		   => 'Enable custom Javascript in footer',
				'description'  => 'if you want to add some custom codes in the wp footer',
				'type'		   => 'checkbox',
				'default'	   => false,
				'no_separator' => true,
			],
			'footer_script_content' => [
				'title'		   => 'Footer script content',
				'description'  => 'You should place the javascript content here, without <code>&lt;script&gt;</code> tags',
				'type'		   => 'textarea',
				'default'      => '',
				'placeholder'  => '<script>var xyzxyzxyz = 123;</script>',
				'html'	       => true,
			],
			'maximum_upload_filesize__enabled' => [
				'title'		   => 'Enable maximum upload file size control',
				'description'  => '',
				'type'		   => 'checkbox',
				'default'	   => false,
				'no_separator' => true,
			],
			'maximum_upload_filesize' => [
				'title'		   => '',
				'description'  => '(number means in MB)',
				'type'		   => 'number',
				'default'	   => 5,
			],
			'maximum_execution_time_limit__enabled' => [
				'title'		   => 'Enable maximum upload file size control',
				'description'  => '',
				'type'		   => 'checkbox',
				'default'	   => false,
				'no_separator' => true,
			],
			'maximum_execution_time_limit' => [
				'title'		   => '',
				'description'  => 'Maximum execution time (seconds). Server default is typically 30 seconds, so try not to abuse the server with too high value. (number means in seconds,max 10000)',
				'type'		   => 'number',
				'default'	   => 60,
			],
		]); 
	}

	public function __construct_my()
	{
		foreach ($this->initial_user_options as $key => $value) {
			if (stripos($key,'__enabled')) {
				if ($this->opts[$key]) {
					call_user_func([$this, $key]);
				}
			}
		}
	}

	// ===================================================================== //
	// ===================================================================== //
	// ===================================================================== //

	public function maximum_upload_filesize__enabled(){
		add_filter('upload_size_limit',	function() {  return $this->opts['maximum_upload_filesize']*1024*1024; }, 11);	
	}

	public function maximum_execution_time_limit__enabled(){
		set_time_limit(min(10000, $this->opts['maximum_execution_time_limit']));
	}

	// force_ini_set:  Force settings by using <code>ini_set</code> approach, in addition to native hook (if you see some errors related to this functionality, disable this checkbox)
	// force_htacess: 
	// 	Force settings by using commands <code>.htaccess</code> file. (if other settings does not work, you can try this. However, this only works in APACHE server types. <b>NOTE, THIS REWRITES HTACCESS FILE, SO BACKUP IT AT FIRST IF UNSURE</b>)

	// 	// INI approach   
	// 	$this->ini_exists = (function_exists('ini_get') && function_exists('ini_set'));
	// 	if ($this->opts['force_ini_set']){
	// 		@ini_set('upload_max_filesize',	$this->opts['upload_size'].'M'); 
	// 		@ini_set('post_max_size',		$this->opts['upload_size'].'M');   //@ini_set('upload_max_size',	$this->opts['upload_size'].'M'); 	//wp-specific
	// 		@ini_set('max_input_time', 		$this->opts['execution_time']);
	// 		@ini_set('max_execution_time', 	$this->opts['execution_time']);
	// 	}
	// 	//@ini_set('memory_limit', '256M'); 
	// }

	// options_submission:	
	// this->opts['force_ini_set'] 	= !empty($_POST[ $this->plugin_slug ]['force_ini_set']);
	// $this->opts['force_htaccess'] 	= !empty($_POST[ $this->plugin_slug ]['force_htaccess']);
	// if ($this->opts['force_htaccess']){
	// 	$code = 
	// 		"php_value upload_max_filesize ".$this->opts['upload_size']."M".  "\r\n".	
	// 		"php_value post_max_size "		.$this->opts['upload_size']."M".  "\r\n".	
	// 		"php_value max_input_time "		.$this->opts['execution_time'].	  "\r\n".	
	// 		"php_value max_execution_time "	.$this->opts['execution_time']
	// 		;
	// 	$this->helpers->add_into_htaccess($code);
	// }
	// else{
	// 	$this->helpers->add_into_htaccess('');
	// }

	// ===================================================================== //

	public function replace_buffer_text__enabled(){
		add_action('wp_loaded', function() {
			ob_start( function ($buffer) {
				// modify buffer here, and then return the updated code
				$buffer = str_replace(
					wp_kses_post($this->opts['replace_buffer_text_from']),
					wp_kses_post($this->opts['replace_buffer_text_to']),
				$buffer);
				return $buffer;
			});
		}); 
		add_action('shutdown',  function() { ob_end_flush(); } );     
	}


	public function add_category_title_fields__enabled(){
		add_action ( 'edit_category_form_fields', function(){
			$cat_title = get_term_meta( (int) $_POST['tag_ID'], '_cattitle', true);
			?> 
			<tr class="form-field">
				<th scope="row" valign="top"><label for="cat_page_title"><?php _e('Category Page Title'); ?></label></th>
				<td>
				<input type="text" name="cat_title" id="cat_title" value="<?php echo esc_attr($cat_title) ?>"><br />
					<span class="description"><?php _e('Title for the Category '); ?></span>
				</td>
			</tr>
			<?php
		});
		add_action ( 'edited_category', function() {
			if ( isset( $_POST['cat_title'] ) ) {
				update_term_meta( (int) $_POST['tag_ID'], '_cattitle', sanitize_title($_POST['cat_title']) );
			}
		} );
	}


	#region === body classes ===
	public function add_extra_content_classes__enabled(){
		add_action('the_excerpt',		[$this, 'default_containers_excerpt']);  
		add_action('the_excerpt_rss',	[$this, 'default_containers_excerpt']); //<-deprecated or not?  
		add_action('the_excerpt_feed',	[$this, 'default_containers_excerpt']);

		add_action('the_content',		[$this, 'default_containers_content'] );
		add_action('the_content_rss',	[$this, 'default_containers_content']); //<-deprecated
		add_action('the_content_feed',	[$this, 'default_containers_content']);
	}
	public function default_containers_content($cont){
		return !isset($GLOBALS['post']) ? $cont : '<div class="default-content-clss content_' . $GLOBALS['post']->ID .' type_'.$GLOBALS['post']->post_type.' ">'.$cont.'</div>'; 
	}
	public function default_containers_excerpt($cont){
		return !isset($GLOBALS['post']) ? $cont : '<div class="default-content-clss excerpt_'. $GLOBALS['post']->ID .' type_'.$GLOBALS['post']->post_type.' ">'.$cont.'</div>';
	}
	#endregion

	#region === body classes ===
	public function add_extra_body_classes__enabled(){
		add_filter('body_class',        [$this, 'add_my_body_classes_HELPER'] );
		add_filter('admin_body_class',  [$this, 'add_my_body_classes_HELPER'] ); 
	}
	public function add_my_body_classes_HELPER( $classes )
	{
		$classes = $this->add_body_class_($classes, " ". $this->helpers->get_domain_without_http());
		$classes = $this->add_body_class_($classes, " ". (is_admin() ? "backend":"frontend") );
		//add role
		$roles = ( array ) wp_get_current_user()->roles;
		$chosen = " ".'role-'.(isset($roles[0]) ? $roles[0] : 'guest');
		$classes = $this->add_body_class_($classes, $chosen);
		//
		return $classes;
	}
	public function add_body_class_($classes, $value){ 
		if (is_array($classes)) $classes[] = $value;  else $classes .= $value; return $classes;  
	}
	#endregion
	

	public function development_favicons__enabled(){
		$url ='';
		$image = is_admin() ? 'M8,3A2,2,0,1,1,6,1,2,2,0,0,1,8,3' : 'M8,3A2,2,0,1,1,4,3';
		$color = $this->is_localhost() ?'ff0000' : '00ff00';
		$tmp   = '<link rel="icon" rel2="tempFav" type="image/png"  href="'. (!empty($url) ? esc_url($url) : "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='5 1 2 4'%3E%3Cpath d='$image' fill='%23$color'/%3E%3C/svg%3E").'" />';
		add_action('admin_head', function() use($tmp) { echo $tmp; } );
		add_action('wp_head',    function() use($tmp) { echo $tmp; } );
	}

	public function disable_rest_api__enabled(){
		add_action( 'rest_api_init', function () {
			$whitelist = [ 'localhost', '127.0.0.1', '::1' ];
			if( ! in_array($_SERVER['REMOTE_ADDR'], $whitelist ) ){
				wp_die( 'REST API is disabled.' );
			}
		}, 0 );
		 
		add_filter( 'rest_authentication_errors', function( $result ) {
			if ( ! empty( $result ) ) {
				return $result;
			}
			if ( ! is_user_logged_in() ) {
				return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
			}
			return $result;
		});
	}

	public function disable_rest_api_users__enabled(){
		// Disable /users rest routes
		add_filter('rest_endpoints', function( $endpoints ) {
			if ( isset( $endpoints['/wp/v2/users'] ) ) {
				unset( $endpoints['/wp/v2/users'] );
			}
			if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
				unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
			}
			return $endpoints;
		});
	}

	public function remove_email_update_notifications__enabled(){
		add_filter( 'auto_core_update_send_email', function ( $send, $type, $core_update, $result ) {
			return ( ! empty( $type ) && $type == 'success'  ? false : true); 
		}, 11, 4 );
		add_filter( 'auto_plugin_update_send_email', '__return_false' );
		add_filter( 'auto_theme_update_send_email', '__return_false' );
	}


	public function restore_jquery__enabled(){
		add_action('admin_head',function(){ echo '<script>$=jQuery;</script>'; });
		if ($this->opts['restore_jquery_enable_in_front_too']) {
			add_action('wp_head',	function(){ echo '<script>$=jQuery;</script>'; });
		} 
	}


	public function disable_emojis__enabled(){
		add_action( 'init', function () {
			// all actions related to emojis
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			//remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		} );
  
		//to remove emojis from TinyMCE
		add_filter( 'tiny_mce_plugins', function ( $plugins ) {
			if ( is_array( $plugins ) ) {  return array_diff( $plugins, array( 'wpemoji' ) );} 
			else { return array(); }
		} );
	}

	public function override_wp_sendmail__enabled(){
		add_filter( 'wp_mail_from',	function( $email ) { return str_replace('%domain%', $this->helpers->get_domain_without_http(), esc_attr($this->opts['wp_sendmail_from_mail'])); } );
		add_filter( 'wp_mail_from_name', function($name) { return esc_attr($this->opts['wp_sendmail_from_name']); } );
		add_filter( 'wp_mail_content_type', function($a=false){ return $this->opts['wp_sendmail_html_type'] ? "text/html" : $a; } ) ;
	}


	public function redirect_to_path__enabled(){
		if (!is_admin()) {
			$path = esc_attr($this->opts['redirect_to_path_set']);
			$cu = $this->helpers->currentURL; 
			if(stripos($cu, $path)===false && stripos($cu,'/wp-login')===false && stripos($cu,'/wp-admin')===false) {
				$new_url = str_replace($this->homeurl(), $this->homeurl() . $path, $cu);
				$this->php_redirect($new_url);
			}
		}
	}

	public function google_analytics_userid__enabled () {
		$ga_id = sanitize_text_field($this->opts['google_analytics_userid__enabled']);
		if (!empty($ga_id)) {
			add_action('wp_footer', function() use ($ga_id) {
				echo "<!-- Global site tag (gtag.js) -->".
				"<script async src='https://www.googletagmanager.com/gtag/js?id=$ga_id'></script>" .
				"<script> ".
					"window.dataLayer = window.dataLayer || []; ".
					"function gtag(){dataLayer.push(arguments);} ".
					"gtag('js', new Date()); ".
					"gtag('config', '$ga_id'); ".
				"</script>";
			});
		}
	}

	public function hide_wp_adminbar__enabled(){
		add_action('init', function() {
			//remove admin bar from FRONTEND 
			add_filter('show_admin_bar', '__return_false');	//show_admin_bar(false);
			//remove admin bar from BACKEND (temporary trick)
			add_filter('admin_title', function(){
				$GLOBALS['wp_query']->is_embed=true;
				add_action('admin_xml_ns', function(){ $GLOBALS['wp_query']->is_embed=false; } ); 
			});
			remove_action( 'in_admin_header', 'wp_admin_bar_render', 0 );
		});
	}

	// Register Custom Post 	
	public function register_post_type($name, $title='', $thumb='') {
		// https://codex.wordpress.org/Function_Reference/register_post_type 
		add_action('init', function() use ($name, $title)  {
			$title = !empty($title) ? $title : strtoupper($name);
			register_post_type( $name, [
				'label'	=> __( $title ),	'description' => __( $name.'s'),
				'labels'=> ['name' => $name, 'singular_name' => $name.' '.'page'],
				'supports'	=> ['title','editor', 'thumbnail', 'excerpt', 'page-attributes', 'post_tag', 'revisions','comments','post-formats'],
				'taxonomies'=> ['category', 'post_tag'],  
				'public'=> true,	'query_var'=> true,				'publicly_queryable'=>true,	'show_ui'=> true,	'show_in_menu'	=> true,
				'show_in_nav_menus'	=> true,	'show_in_admin_bar'	=> true,	'menu_position'	=> 18,
				'can_export' => true, 'hierarchical' => true, 'has_archive'=> true, 'menu_icon' => 'dashicons-editor-spellcheck', // https://developer.wordpress.org/resource/dashicons/#editor-spellcheck
				'exclude_from_search' => false,	'capability_type'=> 'page',
				'rewrite' => array('with_front'=>true,   ), 
			] );
		}); 
	}

	public function custom_post_types__enabled(){
		$lines = explode("\r\n", $this->opts['custom_post_types_data']);
		foreach ($lines as $line) {
			$line = trim($line);
			if (empty($line)) continue;
			$parts = explode('|', $line);
			if (count($parts)<2) continue;
			$name = sanitize_key(trim($parts[0]));
			$title = esc_attr(trim($parts[1]));
			//$thumb = trim($parts[2]);
			$this->register_post_type($name, $title);
		}
	}

	
	public function extra_mimetypes__enabled () {
		add_filter('upload_mimes', function($existing_mimes){
			// add your extension to the mimes array as below
			$existing_mimes['gz']	= 'application/x-gzip';
			$existing_mimes['txt']	= 'text/plain'; 
			
			if (!array_key_exists('zip', $existing_mimes)) {
				$existing_mimes['zip'] = 'application/zip';
			}
			if (!array_key_exists('gz|gzip|zip', $existing_mimes)) {
				$existing_mimes['gz|gzip|zip'] = 'application/x-zip';
			}
			if (!array_key_exists('gz|gzip', $existing_mimes)) {
				$existing_mimes['gz|gzip'] = 'application/x-gzip';
			}
			if (!array_key_exists('7z', $existing_mimes)) {
				$existing_mimes['7z'] = 'x-7z-compressed';
			}
			//	[rar] => application/rar
			return $existing_mimes;
		}, 11);

		add_filter( 'wp_check_filetype_and_ext', function ( $types, $file, $filename, $mimes ) {
			// Do basic extension validation and MIME mapping
			$wp_filetype = wp_check_filetype( $filename, $mimes );
			if( in_array( $wp_filetype['ext'], array( 'zip', 'gz', 'gzip', '7z', 'txt' ) ) ) { 
				// it allows zip files
				$types['ext']  = $wp_filetype['ext'];
				$types['type'] = $wp_filetype['type'];
			}
			return $types;
		}, 11, 4 );
	}
	



	public function noindex_garbage__enabled(){
		add_action('wp_head', function () { 
			if ( !is_front_page() && !is_home() && !is_page() && !is_single() && !is_search() && !is_archive() && !is_attachment() && !is_author() && !is_category() && !is_tag())  { 
				echo '<meta name="robots" content="noindex, nofollow">'; 
			}
		});   
	}

	public function custom_excerpt_text__enabled(){
		add_filter('excerpt_more', function ($more) { return '<a class="excerpt-read-more" href="'. get_permalink(get_the_ID()) . '">'.sanitize_text_field($this->opts['custom_excerpt_text_set']).'</a>'; } );   
	}

	public function custom_excerpt_length__enabled(){
		add_filter('excerpt_length', function ($len=null) { return (int) $this->opts['custom_excerpt_length_set']; } );   
	}

	public function authcookie_live__enabled(){
		add_filter(
			'auth_cookie_expiration', 
			function ($seconds, $user_id, $remember){
				$expiration_seconds = DAY_IN_SECONDS * (float) $this->opts[($remember ? 'authcookie_live_days_remember': 'authcookie_live_days_noremember')];
				// https://en.wikipedia.org/wiki/Year_2038_problem
				if ( PHP_INT_MAX - time() < $expiration_seconds ) {
					//Fix to a little bit earlier!
					$expiration_seconds =  PHP_INT_MAX - time() - 2;
				}
				return $expiration_seconds;
			}, 
			10,
			3
		);   
	}


	// increase filtering quick-menu-search results (this seems better than other a bit harder methods, like: https://goo.gl/BWMmDp )
	public function nav_search__enabled(){
		add_action(
			'pre_get_posts', 
			function ( $q ) {
				// example of $q properties: https://goo.gl/SNeDwX
				if(isset($_POST['action']) && $_POST['action']=="menu-quick-search" && isset($_POST['menu-settings-column-nonce'])) {	
					// other parameters for more refinement: https://goo.gl/m2NFCr
					if( is_a($q->query_vars['walker'], 'Walker_Nav_Menu_Checklist') ){
						$q->query_vars['posts_per_page'] = (int) $this->opts['nav_search_amount'];
					}
				}
				return $q;
			}, 
			11, 
			2 
		);  
	}
	
	public function postsperpage__enabled(){
		add_action(
			'pre_get_posts', 
			function ( $q ) {
				// example of $q properties: https://goo.gl/SNeDwX
				if ( !is_admin() && $q->is_archive && $q->is_main_query() ) {
					$q->set( 'posts_per_page', (int) $this->opts['postsperpage_amount'] );
				}
				return $q;
			}, 
			11, 
			2
		);  
	}


	// ##################################################################################
	// ####################### thumbnail column in dashboard ############################
	// ##################################################################################
	public function thumbnail_column_in_dashboard__enabled(){
		add_image_size( 'featured-image-size-pxplg', 60, 60, false );
		$post_types = explode(',', $this->opts['thumbnail_column_in_dashboard_post_types']);
		foreach ($post_types as $post_type) {
			$post_type = trim($post_type);
			if (empty($post_type)) continue;
			add_filter('manage_'.$post_type.'_posts_columns', [$this, 'thumbnail_col__add']);
		}
		add_filter('manage_posts_columns', [$this, 'thumbnail_col__add']);
		add_filter('manage_pages_columns', [$this, 'thumbnail_col__add']);

		//
		add_action('manage_posts_custom_column', [$this, 'thumbnail_col__display'], 10, 2);
		add_action('manage_pages_custom_column', [$this, 'thumbnail_col__display'], 10, 2);
		// add_filter('manage_posts_columns', [$this, 'thumbnail_col__sortorder']); to add order: https://gist.github.com/gmmedia/bd1af134fe5bbb53799d538951f60ca0
		//
		add_action('admin_head', [$this, 'thumbnail_col__styles']);
	}

	public function thumbnail_col__add($columns_array){
		$columns_array['thumb_pxplg'] = __('Thumb');
		return $columns_array;
	}

	public function thumbnail_col__display($column, $id){
		if($column === 'thumb_pxplg') {
			if( function_exists('the_post_thumbnail') ) {
				echo the_post_thumbnail( 'featured-image-size-pxplg' );
			}
		}
	}

	public function thumbnail_col__styles() {
		echo '<style>.column-j0e_thumb {width: 60px;}</style>';
	}
	// ##################################################################################
	// ###################################    END     ###################################
	// ##################################################################################



	public function editor_roles__enabled(){
		add_action(
			'admin_init',
			function ( $q ) {
				// https://codex.wordpress.org/Roles_and_Capabilities#edit_theme_options
				$role_object = get_role( 'editor' );
				if(empty($role_object )) return;
				$val = $this->opts['editor_roles_list'];
				$roles = explode(',', $val);
				foreach ($roles as $role) {
					$role_object->add_cap( sanitize_key(trim($role)) );
					// CAREFULL !
					// $role_object->add_cap( 'edit_files' );
					// $role_object->add_cap( 'manage_options' );
				}
			}
		);
	}


	// ###################################################
	// ############### Search Highlighting ###############
	// ###################################################
	private $searchHighlightClassName = 'search_matched_phrase';
	public function search_hightlighting__enabled() {
		add_action('wp_head', function(){
			if (is_search()) echo '<style>.'. $this->searchHighlightClassName . ' {background:#'. sanitize_key($this->opts['search_hightlighting__background_color']) .'; padding:2px; font-weight:bold; } </style>'; 
		});
		$method = [$this, 'search_hightlighting__highlight_results'];
		$enable_in_default = true;
		if ($enable_in_default)
		{
			add_filter('the_content',		$method);
			add_filter('the_excerpt',		$method);
			add_filter('the_title',			$method);
			add_filter('get_the_content',		$method);
			add_filter('get_the_excerpt',		$method);
			add_filter('get_the_title',			$method);
		}
		$enable_in_rss_feeds = true;
		if ($enable_in_rss_feeds)
		{
			add_filter('the_content_rss',	$method);
			add_filter('the_excerpt_rss',	$method);
			add_filter('the_title_rss',		$method);
			add_filter('the_content_feed',	$method);
			add_filter('the_excerpt_feed',	$method);
			add_filter('the_title_feed',	$method);
			add_filter('get_the_content_rss',	$method);
			add_filter('get_the_excerpt_rss',	$method);
			add_filter('get_the_title_rss',		$method);
			add_filter('get_the_content_feed',	$method);
			add_filter('get_the_excerpt_feed',	$method);
			add_filter('get_the_title_feed',	$method);
		}
		add_filter('wp_trim_words', [$this, 'search_highlighting__trimwordshook'], 10, 4);
	}

	private function search_h_return_replaced_text($text){
		$str = get_query_var('s');
		$keys = array_filter(explode(" ",$str));
		$joinedSpacedStrings = implode('|', $keys);
		$text = preg_replace_callback('/('. $joinedSpacedStrings .')/iu', function ($matches) {
			return '<span class="'.$this->searchHighlightClassName.'">'.$matches[1].'</span>'; 
		} , $text);
		return $text;
	}
	public function search_hightlighting__highlight_results($text){
		if(!is_admin() && is_search()){
			$text = $this->search_h_return_replaced_text($text);
		}
		return $text;
	}

	public function search_highlighting__trimwordshook($text, $num_words, $more, $original_text) {
		if(stripos($original_text, $this->searchHighlightClassName)!==false) {
			$text = $this->search_h_return_replaced_text($text);
		}
		return $text;
	}
	// ###################################################
	// ###################################################
	// ###################################################


	
	public function search_exact_match__enabled() {
		add_action( 'pre_get_posts', function ( $query ) {
			if ( !is_admin() && $query->is_main_query() && $query->is_search ) {
				$str = get_query_var('s');
				if ($this->helpers->starts_with($str, '\\"') && $this->helpers->ends_with($str, '\\"')) {
					$str = $this->helpers->remove_chars_from_start_end($str, 2, 2);
					set_query_var('s', $str);
					$query->set( 'sentence', 1 );
				}
			}
		});
		
		add_filter('get_search_form',	[$this, 'search_exact_match__get_search_form']);
	} 
	
	// add tooltip on search form button
	// TODO: better- https://stackoverflow.com/questions/19480010/
	public function search_exact_match__get_search_form($form){
		$title = 'Use &quot;double quoted&quot; for exact sentence match';
		if ($this->opts['tooltip_css'])
			$form = preg_replace('/\<input(.*?)name\=\"s\"(.*?)\>/', "<span class=\"HSTR_tooltip\">$0<span class=\"HSTR_tooltiptext\">". _($title). "</span></span>", $form);
		else
			$form = preg_replace('/name\=\"s\"/', "$1 title=\"". _($title)."\"", $form);
		return $form;
	}
	


	// #################################
	public function backend_styles__enabled() {
		add_action( 'admin_head', function (){ 
			echo ' <style type="text/css">'. sanitize_text_field ($this->opts['backend_styles__css']) .'</style>'; 
		});
	}
	public function frontend_styles__enabled() {
		add_action( 'wp_head', function (){ 
			echo ' <style type="text/css">'. sanitize_text_field ($this->opts['frontend_styles__css']) .'</style>'; 
		});
	}

	public function footer_html__enabled() {
		// var_dump($this->opts);exit;
		add_action ('wp_footer', function() { echo wp_kses_post($this->opts['footer_html_content']); });
	}
	public function footer_script__enabled() {
		// var_dump($this->opts);exit;
		add_action ('wp_footer', function() { echo '<script>'. wp_kses_post($this->opts['footer_script_content']) . '</script>'; });
	}


	// #################################
	public function asynchronous_image_load_in_content__enabled() {
		add_filter('the_content', [$this, 'replace_srcs_in_content'], 101);
		add_filter('get_the_content', [$this, 'replace_srcs_in_content'], 101);
		add_action('wp_footer', [$this, 'footer_replacer_js'], 22 );
	} 
	public function replace_srcs_in_content($content)
	{
		$content= preg_replace('/\<img(.*?)src\=(.*?)\>/i', '<img$1lazyloaded-src=$2>', $content);
		return $content;
	}
	public function footer_replacer_js()
	{  ?>
		<script>
		document.querySelectorAll('img[lazyloaded-src]').forEach( function(el){ el.setAttribute('src', el.getAttribute('lazyloaded-src'));  el.remoteAttribute('lazyloaded-src'); } );
		</script>
		<?php
		/*
		$(window).scroll(function(){
			$('img[lazyloaded-src]').each(function(i){
			var t = $(this);
			if(t.position().top > ($(window).scrollTop()+$(window).height()/2) ) {
					t.attr('src', t.attr('lazyloaded-src')); // trigger the image load
					t.removeAttr('lazyloaded-src'); // so we only process this image once
				}
			});
		});
		*/ 
	}

	// #################################





	
	// #################################
	public function additional_posttypes_in_query__enabled() {
		add_filter('parse_query', [$this, 'parse_query'] ); // var_dump($GLOBALS['wp_query']);  
	}
	public function parse_query($query)
	{
		if(!empty($this->opts['post_types']))
		{
			$post_types = $this->helpers->string_to_array( $this->opts['additional_posttypes_in_query__types'] , ',') ;
			//anwp sample query: zx7LUmbq
			{ 
				$this->other_posts_query($query, $post_types);
				
				if ($this->opts['additional_posttypes_in_query__force_children_categories'])
				{
					//$query->tax_query->queries[0]['include_children']=true;   //this doesnt seem to work, lets say Elementor
					$query->query_vars["cat"]=implode(',', $query->query_vars["category__in"]);
					unset($query->query_vars["category__in"]);
				}
			}
			//this seems better than "pre_get_posts" because this is fired after query 'post_type' is determined internally what to be (i.e. post or whatever) 
		}
	}
	public function other_posts_query($q, $post_types)
	{
		if (array_key_exists("post_type",$q->query_vars))
		{
			$typ = $q->query_vars["post_type"];
			if ( $typ=="post" || ( is_array($typ) && count($typ)==0 && $typ[0]=="post" ) )
			{
				$q->query_vars["post_type"]= array_merge( is_array($typ) ? $typ : [$typ] ,  $post_types);
			}
		}
		
		if( empty($typ) && is_archive() ){
			$q->query_vars["post_type"]= array_merge( $post_types, ['post']);
		}
	}
	// #################################
	





	// #################################
	public function sort_pages_by_parent__enabled() {
		add_action('init', array($this, 'sort_pages_by_parent__initialize'), 11);
		add_action('pre_get_posts', array($this, 'sort_pages_by_parent__parnts_orderby'));
	}
	
	public function sort_pages_by_parent__initialize(){
		foreach( apply_filters('parented_posts_filter', explode(',', $this->opts['sort_pages_by_parent__post_types']))   as $each){
			add_filter('manage_edit-'.$each.'_columns',			array($this,'sort_pages_by_parent__column_normal'),	10, 1 );
			add_filter('manage_edit-'.$each.'_sortable_columns',array($this,'sort_pages_by_parent__column_normal'),	10, 1  );
			add_action('manage_'.$each.'_posts_custom_column',	array($this,'sort_pages_by_parent__column_func'),	10, 2 );
		}
	}

	public function sort_pages_by_parent__column_normal($columns) 	{ $columns['parents'] =__('parent'); return $columns;	}
	
	public function sort_pages_by_parent__column_func( $column_name, $post_id ) {
		if ( 'parents' != $column_name )        return;
		//Get number of parents from post meta
		$parentId = wp_get_post_parent_id( $post_id ) ;
		$parent_p= get_post($parentId);
		if($parentId != $post_id && $parentId !=0){
			$url =  $_SERVER['REQUEST_URI'];
			$url =  add_query_arg('parent_id', $parentId, $url );
			$url =  add_query_arg('orderby', 'parent', $url );
			echo '<a href="'.$url.'">'.$parent_p->post_name.'</a>'; return;
		}
	}	
	
	public function sort_pages_by_parent__parnts_orderby( $query ) {
		if( ! is_admin() )          return;
		global $pagenow;
		if ( ( $pagenow == 'edit.php' ) ) {     // && ( 'parntss' == $query->get( 'orderby'))
			if(isset($_GET['parent_id'])){
				$query->set('post_parent', (int) $_GET['parent_id'] );
			}
		}
	}
	// #################################



	
	
	// ############### ##################
	public function temporary_enable_plugin_activation_iframe__enabled() {
		// https://core.trac.wordpress.org/ticket/60373
		add_action('wp_admin_notice', function($message, $args = null){ 
			// $args = [id='message', 'additional_classes' => array( 'error' ),]
			if ( isset( $_GET['error'] ) && $GLOBALS['parent_file'] === 'plugins.php' ) {
				add_filter( 'pre_kses', [$this, 'temporary_enable_plugin_error_iframe'], 10, 2 );
			}
		});
	}
	public function temporary_enable_plugin_error_iframe( $message, $allowed_html ) {
		if (str_contains($message, '<iframe ')) {
			echo $message;
		}
		remove_filter( 'pre_kses', [$this, 'temporary_enable_plugin_error_iframe']);
		return $message;
	}
	// #################################











	// ======================== Options page ======================== //
	public function opts_page_output()
	{
		$this->settings_page_part("start", 'first');
		?>

		<style> 
		</style>

		<?php if ($this->active_tab=="Options") 
		{ ?>
			<hr/>
			<b><?php _e('Note, this plugin is not ALL-IN-ONE, there are other plugins which might also have additional features, and you can look into them too, however, we do not have any idea about their security & quality: ', 'extra-wp-tweaks-options');?></b> <a href="https://wordpress.org/plugins/wpo-tweaks/">wpo-tweaks</a>, <a href="https://wordpress.org/plugins/wp-tweaks/">wp-tweaks</a>
			<hr/>

			<?php $this->options_output_table_full ('myform_1', $this->initial_user_options, $this->opts, true, true); ?>

		<?php 
		}
		

		$this->settings_page_part("end", '');
	} 





  } // End Of Class

  $GLOBALS[__NAMESPACE__] = new PluginClass();

 
} // End Of NameSpace
