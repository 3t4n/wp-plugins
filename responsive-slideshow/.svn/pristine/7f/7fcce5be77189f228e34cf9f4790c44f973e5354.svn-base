<?php
/**
*	Plugin Name: Responsive Slideshow
*	Description: Simple & lightweight responsive slider plugin.
*	Author: subhansanjaya
*	Version: 1.0
*	Plugin URI: https://wordpress.org/plugins/responsive-slideshow/
*	Author URI: http://weaveapps.com
*	Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BXBCGCKDD74UE
*	License: GPLv2 or later
*	License URI: http://www.gnu.org/licenses/gpl-2.0.html
*
* 	@package Responsive slideshow
* 	@author subhansanjaya
*/
ob_start();
class Responsive_Slideshow {

	//default settings
	private $defaults = array(
	'settings' => array(
		'transition_settings' => 'fade',
		'timer_settings' => '0',
		'easing_settings' => 'easeInOutSine',
		'speed_settings' => '600',
		'deactivation_delete' => false,
		'loading_place' => 'footer',
		'wa_rs_no_of_posts' => 5,
		'wa_rs_posts_order' => 'desc',
		'wa_rs_paging' => 0
	),
	'version' => '1.0.0'
);

	private $options = array();
	private $tabs = array();

	public function __construct() {
		register_activation_hook(__FILE__, array(&$this, 'wa_rs_activation'));
		register_deactivation_hook(__FILE__, array(&$this, 'wa_rs_deactivation'));

		add_action('init', array(&$this, 'wa_ra_slider_init'));
		add_action('post_updated_messages', array(&$this, 'wa_rs_slider_updated_messages'));
		add_action('contextual_help', array(&$this, 'wa_rs_slider_help_text'),10, 3);
		add_action('init', array(&$this, 'wa_rs_initialize_cmb_meta_boxes'),9999);
		add_action('cmb_meta_boxes', array(&$this, 'wa_rs_create_metaboxes'));
		add_action('wp_enqueue_scripts', array(&$this, 'wa_rs_load_scripts'));
		add_action('admin_enqueue_scripts', array(&$this, 'admin_include_scripts'));
		add_action('plugins_loaded', array(&$this, 'load_defaults'));

		/* Add slider image size, this'll crop the images when they're uploaded to fit the slider */
		add_image_size('wa_rs_slider_image', 1200, 400, true);
		add_shortcode( 'responsive-slideshow', array(&$this, 'wa_rs_slider'));	
		add_action( 'admin_menu', array(&$this, 'wa_rs_enable_pages'));
		add_filter('plugin_action_links', array(&$this, 'wa_rs_settings_link'), 2, 2);
		add_action('admin_init', array(&$this, 'msp_helloworld_settings_init'));

		//update plugin version
		update_option('responsive_slideshow_version', $this->defaults['version'], '', 'no');
		$this->options['settings'] = array_merge($this->defaults['settings'], (($array = get_option('responsive_slideshow_settings')) === FALSE ? array() : $array));
	}

	/* settings link in plugin management screen */
	public function wa_rs_settings_link($actions, $file) {
		if(false !== strpos($file, 'responsive-slideshow'))
		 $actions['settings'] = '<a href="options-general.php?page=responsive-slideshow">Settings</a>';
		return $actions; 
	}

	/* activation hook */
	public function wa_rs_activation() {
		add_option('responsive_slideshow_settings', $this->defaults['settings'], '', 'no');
		add_option('responsive_slideshow_version', $this->defaults['version'], '', 'no');
	}

	/* deactivation hook */
	public function wa_rs_deactivation()
	{
		$check = $this->options['settings']['deactivation_delete'];
		if($check === TRUE)
		{
			delete_option('responsive_slideshow_settings');
			delete_option('responsive_slideshow_version');
		}
	}

	public function wa_rs_enable_pages() {
		add_options_page(
					__('Responsive Slideshow', 'responsive-slideshow'),
					__('Responsive Slideshw', 'responsive-slideshow'),
					'manage_options',
					'responsive-slideshow',
					array(&$this, 'wa_rs_admin_page_screen')
				);
	}

	function wa_rs_admin_page_screen() { 
	
		$tab_key = (isset($_GET['tab']) ? $_GET['tab'] : 'general-settings');

		echo '<div class="wrap">'.screen_icon().'
			<h2>'.__('Responsive Slideshow', 'responsive-slideshow').'</h2>
			<h2 class="nav-tab-wrapper">';

		foreach($this->tabs as $key => $name) {
			echo '
			<a class="nav-tab '.($tab_key == $key ? 'nav-tab-active' : '').'" href="'.esc_url(admin_url('options-general.php?page=responsive-slideshow&tab='.$key)).'">'.$name['name'].'</a>';
		}

		echo '
			</h2>
			<div class="responsive-slideshow-settings">
				<div class="wa-credits">
					<h3 class="hndle">'.__('Responsive Slideshow', 'responsive-slideshow').' '.$this->defaults['version'].'</h3>
					<div class="inside">
						<p class="inner">'.__('Plugin URI: ', 'responsive-slideshow').' <a href="http://weaveapps.com/shop/wordpress-plugins/responsive-slideshow/" target="_blank" title="'.__('Plugin URL', 'responsive-slideshow').'">'.__('Weave Apps', 'responsive-slideshow').'</a></p>
					</p>  
					
					<hr/>
						<p class="inner">'.__('Shortcode: ', 'responsive-slideshow').__('[responsive-slideshow]', 'responsive-slideshow').'</p>
					</p>  

											<hr />
						<h4 class="inner">'.__('Do you like this plugin?', 'responsive-slideshow').'</h4>
						<p class="inner"><a href="http://wordpress.org/support/view/plugin-reviews/responsive-slideshow" target="_blank" title="'.__('Rate it', 'responsive-slideshow').'">'.__('Rate it', 'responsive-slideshow').'</a> '.__('on WordPress.org', 'responsive-slideshow').'<br />          
					</div>
				</div><form action="options.php" method="post">';
				

		wp_nonce_field('update-options');
		settings_fields($this->tabs[$tab_key]['key']);
		do_settings_sections($this->tabs[$tab_key]['key']);

		echo '<p class="submit">';
		submit_button('', 'primary', $this->tabs[$tab_key]['submit'], FALSE);
		echo ' ';
		echo submit_button(__('Reset to defaults', 'responsive-slideshow'), 'secondary', $this->tabs[$tab_key]['reset'], FALSE);
		echo '</p></form></div><div class="clear"></div></div>';
	}

	function wa_ra_slider_init() {
	  $labels = array(
	        'name' => _x('Slides', 'post type general name'),
	        'singular_name' => _x('Slide', 'post type singular name'),
	        'add_new' => _x('Add New', 'wa_rs_slider'), 
	        'add_new_item' => __('Add New Slide'),
	        'edit_item' => __('Edit Slide'),
	        'new_item' => __('New Slide'),
	        'view_item' => __('View Slide'),
	        'search_items' => __('Search Slides'),
	        'not_found' => __('No slides found'),
	        'not_found_in_trash' => __('No slides found in Trash'),
	        'parent_item_colon' => '',
	        'menu_name' => 'Slideshow'
	    );
	    $args = array(
	        'labels' => $labels,
	        'public' => true,
	        'publicly_queryable' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'menu_position' => 5,
	        'query_var' => true,
	        'rewrite' => true,
	        'capability_type' => 'post',
	        'has_archive' => true,
	        'hierarchical' => false,
	        'supports' => array('title', 'thumbnail')
	    );
	    register_post_type('wa_rs_slider', $args);
	}


	/* register settings */
	function msp_helloworld_settings_init() {
	register_setting( 'responsive_slideshow_settings','responsive_slideshow_settings',array(&$this, 'wa_rs_options_validate') );
	add_settings_section('responsive_slideshow_settings', __('', 'responsive-slideshow'), '', 'responsive_slideshow_settings');
	add_settings_field('wa_rs_slider_transition',__('Transition', 'responsive-slideshow'),array(&$this,'transition_settings_callback'),'responsive_slideshow_settings','responsive_slideshow_settings');
	add_settings_field('wa_rs_slider_interval',__('Slider interval', 'responsive-slideshow'), array(&$this,  'timer_settings_callback'), 'responsive_slideshow_settings', 'responsive_slideshow_settings');
	add_settings_field( 'wa_rs_easing_effect', __('Easing effect', 'responsive-slideshow'),array(&$this,  'easing_settings_callback'),'responsive_slideshow_settings','responsive_slideshow_settings');
	add_settings_field('wa_rs_slider_speed', __('Slider speed', 'responsive-slideshow'), array(&$this,  'speed_settings_callback'), 'responsive_slideshow_settings','responsive_slideshow_settings');
	add_settings_field('wa_rs_no_of_posts', __('Number of posts', 'responsive-slideshow'), array(&$this, 'wa_rs_no_of_posts'), 'responsive_slideshow_settings', 'responsive_slideshow_settings');
	add_settings_field('wa_rs_posts_order', __('Posts order', 'responsive-slideshow'), array(&$this, 'wa_rs_posts_order'), 'responsive_slideshow_settings', 'responsive_slideshow_settings');
	add_settings_field('wa_rs_paging', __('Display pager', 'responsive-slideshow'), array(&$this, 'display_page_callback'), 'responsive_slideshow_settings', 'responsive_slideshow_settings');
	add_settings_field('wa_rs_loading_place', __('Loading place', 'responsive-slideshow'), array(&$this, 'wa_rs_loading_place'), 'responsive_slideshow_settings', 'responsive_slideshow_settings');
	add_settings_field('wa_rs_deactivation_delete', __('Deactivation', 'responsive-slideshow'), array(&$this, 'wa_rs_deactivation_delete'), 'responsive_slideshow_settings', 'responsive_slideshow_settings');	

	}

	function transition_settings_callback() {
 
	    $html = '<select id="transition_settings" name="responsive_slideshow_settings[transition_settings]">';
        $html .= '<option value="none"' . selected( esc_attr($this->options['settings']['transition_settings']), 'none', false) . '>none</option>';
        $html .= '<option value="fade"' . selected( esc_attr($this->options['settings']['transition_settings']), 'fade', false) . '>fade</option>';
        $html .= '<option value="scrollLeft"' . selected( esc_attr($this->options['settings']['transition_settings']), 'scrollLeft', false) . '>scrollLeft</option>';
		$html .= '<option value="scrollRight"' . selected(esc_attr($this->options['settings']['transition_settings']), 'scrollRight', false) . '>scrollRight</option>';
		$html .= '<option value="scrollDown"' . selected( esc_attr($this->options['settings']['transition_settings']), 'scrollDown', false) . '>scrollDown</option>';
		$html .= '<option value="scrollUp"' . selected( esc_attr($this->options['settings']['transition_settings']), 'scrollUp', false) . '>scrollUp</option>';
		$html .= '<option value="cover"' . selected( esc_attr($this->options['settings']['transition_settings']), 'cover', false) . '>cover</option>';
		$html .= '<option value="blindX"' . selected( esc_attr($this->options['settings']['transition_settings']), 'blindX', false) . '>blindX</option>';
		$html .= '<option value="blindY"' . selected( esc_attr($this->options['settings']['transition_settings']), 'blindY', false) . '>blindY</option>';
		$html .= '<option value="blindZ"' . selected( esc_attr($this->options['settings']['transition_settings']), 'blindZ', false) . '>blindY</option>';
    	$html .= '</select>';    
	    echo $html;
	} 

	function timer_settings_callback() {
	 
	    $options = get_option( 'timer_settings' );
	     
	    $html = '<select id="timer_settings" name="responsive_slideshow_settings[timer_settings]">';
	    $html .= '<option value="0"'. selected(esc_attr($this->options['settings']['timer_settings']), 0, false) . '>0</option>';
        $html .= '<option value="4500"' . selected(esc_attr($this->options['settings']['timer_settings']), '4500', false) . '>4.5</option>';
        $html .= '<option value="5000"' . selected( esc_attr($this->options['settings']['timer_settings']), '5000', false) . '>5.0</option>';
        $html .= '<option value="5500"' . selected( esc_attr($this->options['settings']['timer_settings']), '5500', false) . '>5.5</option>';
		$html .= '<option value="6000"' . selected( esc_attr($this->options['settings']['timer_settings']), '6000', false) . '>6.0</option>';
		$html .= '<option value="6500"' . selected( esc_attr($this->options['settings']['timer_settings']), '6500', false) . '>6.5</option>';
		$html .= '<option value="7000"' . selected( esc_attr($this->options['settings']['timer_settings']), '7000', false) . '>7.0</option>';
		$html .= '<option value="7500"' . selected( esc_attr($this->options['settings']['timer_settings']), '7500', false) . '>7.5</option>';
		$html .= '<option value="8000"' . selected( esc_attr($this->options['settings']['timer_settings']), '8000', false) . '>8.0</option>';
		$html .= '<option value="8500"' . selected( esc_attr($this->options['settings']['timer_settings']), '8500', false) . '>8.5</option>';
		$html .= '<option value="9000"' . selected( esc_attr($this->options['settings']['timer_settings']), '9000', false) . '>9.0</option>';
		$html .= '<option value="9500"' . selected( esc_attr($this->options['settings']['timer_settings']), '9500', false) . '>9.5</option>';
		$html .= '<option value="1000"' . selected( esc_attr($this->options['settings']['timer_settings']), '10000', false) . '>10.0</option>';
   		 $html .= '</select>';    
	    echo $html;
	} 

	function easing_settings_callback() {
	 
	    $options = get_option( 'easing_settings' );
	     
	    $html = '<select id="easing_settings" name="responsive_slideshow_settings[easing_settings]">';
        $html .= '<option value="easeInOutSine"' . selected( esc_attr($this->options['settings']['easing_settings']), 'easeInOutSine', false) . '>easeInOutSine</option>';
        $html .= '<option value="easeInBack"' . selected( esc_attr($this->options['settings']['easing_settings']), 'easeInBack', false) . '>easeInBack</option>';
        $html .= '<option value="easeOutBack"' . selected( esc_attr($this->options['settings']['easing_settings']), 'easeOutBack', false) . '>easeOutBack</option>';
		$html .= '<option value="easeInOutQuint"' . selected( esc_attr($this->options['settings']['easing_settings']), 'easeInOutQuint', false) . '>easeInOutQuint</option>';
		$html .= '<option value="easeOutQuart"' . selected( esc_attr($this->options['settings']['easing_settings']), 'easeOutQuart', false) . '>easeOutQuart</option>';
		$html .= '<option value="easeOutExpo"' . selected( esc_attr($this->options['settings']['easing_settings']), 'easeOutExpo', false) . '>easeOutExpo</option>';
		$html .= '<option value="easeOutCirc"' . selected( esc_attr($this->options['settings']['easing_settings']), 'easeOutCirc', false) . '>easeOutCirc</option>';
    	$html .= '</select>';    
	    echo $html;
	} 

	function speed_settings_callback() {
	    $options = get_option( 'speed_settings' );
	     
    	$html = '<select id="speed_settings" name="responsive_slideshow_settings[speed_settings]">';
        $html .= '<option value="600"' . selected( esc_attr($this->options['settings']['speed_settings']), '600', false) . '>0.6</option>';
        $html .= '<option value="800"' . selected( esc_attr($this->options['settings']['speed_settings']), '800', false) . '>0.8</option>';
		$html .= '<option value="1000"' . selected( esc_attr($this->options['settings']['speed_settings']), '1000', false) . '>1.0</option>';
		$html .= '<option value="1200"' . selected( esc_attr($this->options['settings']['speed_settings']), '1200', false) . '>1.2</option>';
		$html .= '<option value="1400"' . selected(esc_attr($this->options['settings']['speed_settings']), '1400', false) . '>1.4</option>';
		$html .= '<option value="1600"' . selected( esc_attr($this->options['settings']['speed_settings']), '1600', false) . '>1.6</option>';
		$html .= '<option value="1800"' . selected( esc_attr($this->options['settings']['speed_settings']), '1800', false) . '>1.8</option>';
		$html .= '<option value="2000"' . selected( esc_attr($this->options['settings']['speed_settings']), '1400', false) . '>2.0</option>';
		$html .= '<option value="2200"' . selected( esc_attr($this->options['settings']['speed_settings']), '1600', false) . '>2.2</option>';
		$html .= '<option value="2400"' . selected( esc_attr($this->options['settings']['speed_settings']), '1800', false) . '>2.4</option>';
    	$html .= '</select>';    
	    echo $html;
	} 


		function display_page_callback() {
	    $options = get_option( 'wa_rs_paging' );
	     
    	$html = '<select id="speed_settings" name="responsive_slideshow_settings[wa_rs_paging]">';
        $html .= '<option value="1"' . selected( esc_attr($this->options['settings']['wa_rs_paging']), '1', false) . '>Yes</option>';
        $html .= '<option value="0"' . selected( esc_attr($this->options['settings']['wa_rs_paging']), '0', false) . '>No</option>';
    	$html .= '</select>';    
	    echo $html;
	} 


	public	function wa_rs_posts_order() {
	    $options = get_option( 'wa_rs_posts_order' );
	     
    	$html = '<select id="speed_settings" name="responsive_slideshow_settings[wa_rs_posts_order]">';
        $html .= '<option value="asc"' . selected( esc_attr($this->options['settings']['wa_rs_posts_order']), 'asc', false) . '>Ascending </option>';
        $html .= '<option value="desc"' . selected( esc_attr($this->options['settings']['wa_rs_posts_order']), 'desc', false) . '>Descending</option>';
		$html .= '<option value="rand"' . selected( esc_attr($this->options['settings']['wa_rs_posts_order']), 'rand', false) . '>Random</option>';
    	$html .= '</select>';    
	    echo $html;
	} 


	public function wa_rs_no_of_posts()
	{
		echo '
		<div id="rs_no_of_posts">
			<input type="text" name="responsive_slideshow_settings[wa_rs_no_of_posts]" value="'.esc_attr($this->options['settings']['wa_rs_no_of_posts']).'" />
		</div>';
	}


	public function wa_rs_deactivation_delete() {
		echo '
		<div id="wa_rs_deactivation_delete" class="wplikebtns">';

		foreach($this->choices as $val => $trans)
		{
			echo '
			<input id="deactivation_delete" type="radio" name="responsive_slideshow_settings[deactivation_delete]" value="'.esc_attr($val).'" '.checked(($val === 'yes' ? TRUE : FALSE), $this->options['settings']['deactivation_delete'], FALSE).' />
			<label for="wa_rs_deactivation-delete-'.$val.'">'.$trans.'</label>';
		}

		echo '
			<p class="description">'.__('Delete settings on plugin deactivation.', 'responsive-slideshow').'</p>
		</div>';
	}

	public function wa_rs_loading_place() {
		echo '
		<div id="wa_rs_loading_place" class="wplikebtns">';

		foreach($this->loading_places as $val => $trans)
		{
			$val = esc_attr($val);

			echo '
			<input id="loading_place" type="radio" name="responsive_slideshow_settings[loading_place]" value="'.$val.'" '.checked($val, $this->options['settings']['loading_place'], false).' />
			<label for="wa_rs-loading-place-'.$val.'">'.esc_html($trans).'</label>';
		}

		echo '
			<p class="description">'.__('Select where all the scripts should be placed.', 'responsive-slideshow').'</p>
		</div>';
	}

	/* validate options and register settings */
	public function wa_rs_options_validate($input) {
		if(isset($_POST['save_rs_settings']))
		{
			// transition_settings
			$input['transition_settings'] = sanitize_text_field(isset($input['transition_settings']) && $input['transition_settings'] !== '' ? $input['transition_settings'] : $this->defaults['settings']['transition_settings']);
			// timer_settings
			$input['timer_settings'] = sanitize_text_field(isset($input['timer_settings']) && $input['timer_settings'] !== '' ? $input['timer_settings'] : $this->defaults['settings']['timer_settings']);

			// easing_settings
			$input['easing_settings'] = sanitize_text_field(isset($input['easing_settings']) && $input['easing_settings'] !== '' ? $input['easing_settings'] : $this->defaults['settings']['easing_settings']);

			// speed_settings
			$input['speed_settings'] = sanitize_text_field(isset($input['speed_settings']) && $input['speed_settings'] !== '' ? $input['speed_settings'] : $this->defaults['settings']['speed_settings']);

			$input['deactivation_delete'] = (isset($input['deactivation_delete'], $this->choices[$input['deactivation_delete']]) ? ($input['deactivation_delete'] === 'yes' ? true : false) : $this->defaults['settings']['deactivation_delete']);

			$input['loading_place'] = (isset($input['loading_place'], $this->loading_places[$input['loading_place']]) ? $input['loading_place'] : $this->defaults['settings']['loading_place']);

		}elseif(isset($_POST['reset_rs_settings']))
		{
			$input = $this->defaults['settings'];
			add_settings_error('reset_general_settings', 'general_reset', __('Settings restored to defaults.', 'responsive-slideshow'), 'updated');
		}

		return $input;
	}

	function wa_rs_slider_updated_messages($messages) {
	    global $post, $post_ID;
	    $messages['wa_rs_slider'] = array(
	        0 => '',
	        1 => sprintf(__('Slide updated.'), esc_url(get_permalink($post_ID))),
	        2 => __('Custom field updated.'),
	        3 => __('Custom field deleted.'),
	        4 => __('Slide updated.'),
	        5 => isset($_GET['revision']) ? sprintf(__('Slide restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
	        6 => sprintf(__('Slide published.'), esc_url(get_permalink($post_ID))),
	        7 => __('Slide saved.'),
	        8 => sprintf(__('Slide submitted.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
	        9 => sprintf(__('Slide scheduled for: <strong>%1$s</strong>. '), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
	        10 => sprintf(__('Slide draft updated.'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
	    );
	    return $messages;
	}

	function wa_rs_slider_help_text($contextual_help, $screen_id, $screen) {
	    if ('wa_rs_slider' == $screen->id) {
	        $contextual_help =
	        '<p>' . __('Things to remember when adding a slide:') . '</p>' .
	        '<ul>' .
	        '<li>' . __('Give the slide a title. The title will be used as the slides headline.') . '</li>' .
	        '<li>' . __('Attach a Featured Image to give the slide its background.') . '</li>' .
	        '<li>' . __('Enter text into the Visual or HTML area. The text will appear within each slide during transitions.') . '</li>' .
	        '</ul>';
	    }
	    elseif ('edit-wa_rs_slider' == $screen->id) {
	        $contextual_help = '<p>' . __('A list of all slides appears below. To edit a slide, click on the slides title.') . '</p>';
	    }
	    return $contextual_help;
	}

	function wa_rs_initialize_cmb_meta_boxes() {
	    if ( ! class_exists( 'cmb_Meta_Box' ) )
	        require_once dirname( __FILE__ ) . '/inc/metaboxes/init.php';
	}

	function wa_rs_create_metaboxes( $meta_boxes ) {
	  $meta_boxes[] = array(
	    'id' => 'wa_rs_slider_contents',
	    'title' => 'Featured Slider',
	    'pages' => array('wa_rs_slider'),
	    'context' => 'normal',
	    'priority' => 'low',
	    'show_names' => true,
	    'fields' => array(
	  array(   
	    'name' => 'Featured Text',
	    'desc' => 'Enter a few words about your feature. (No more than 100 words is suggested) If you dont want to display a text box select do not display from the positioning section below.',
	    'std' => '',
	    'id' =>   'top_textarea',
	    'type' => 'textarea'
	  ),
	  array(    
	    'name' => 'Positioning',
	    'desc' => 'Choose where to display your text or hide it completely.',
	    'id' => 'position_radio',
	    'type' => 'radio_inline',
	    'options' => array(
	        array('name' => ' ', 'value' => 'left'), 
	        array('name' => ' ', 'value' => 'bottom'),
	        array('name' => ' ', 'value' => 'right'),
	        array('name' => ' ', 'value' => 'hidden')        
	    )
	  ),
	  array(   
	    'name' => 'Slide Link URL',
	    'desc' => 'Slide link URL. If left empty, it will no be linked.',
	    'std' => '',
	    'id' =>   'slide_url',
	    'type' => 'text'
	  ),
	),
	);
	return $meta_boxes;
	}

	/* Function to display the slider */
	function wa_rs_slider() { 
		$fits = array('post_type' => 'wa_rs_slider', 'posts_per_page' => 1);
		//if there is 1 slide show the slider...
		if($fits){
	    //Relative container

	    echo '<div class="wa_rs_relative_container top_slider">';
	    //Add some navigation
	    echo '<a  class="wa_rs_slide_nav" id="wa_rs_prev"><img src="'.plugins_url("/assets/images/wa_left.png",__FILE__ ).'" /></a>';
	    echo '<a  class="wa_rs_slide_nav" id="wa_rs_next"><img src="'.plugins_url("/assets/images/wa_right.png",__FILE__ ).'" /></a>';
	   	$wa_rs_paging = $this->options['settings']['wa_rs_paging'];
	    if($wa_rs_paging==1){
	    echo '<div href="javascript:void(0)" class="wa_rs_nav" id="wa_rs_nav"></div>';
	    }
	    echo '<ul id="wa_rs_cycle">';
	    $posts_order = $this->options['settings']['wa_rs_posts_order'];
	    $no_of_posts = $this->options['settings']['wa_rs_no_of_posts'];
	    if($posts_order=='rand'){
	    $args = array('post_type' => 'wa_rs_slider', 'posts_per_page' =>  $no_of_posts, 'order'=>$posts_order, 'orderby'=>'rand'); 
		}else{
			$args = array('post_type' => 'wa_rs_slider', 'posts_per_page' =>  $no_of_posts, 'order'=>$posts_order, 'orderby'=>'post_date'); 

		}

	    $loop = new WP_Query($args);
		while ($loop->have_posts()) : $loop->the_post();
	  	global $post;
		$site_link =  get_post_meta( $post->ID,  'slide_url', true );

	    echo '<li>';

		 if(!empty($site_link)){
		echo '<a  href="'.$site_link .'">';
			}
		//1200 x 400 image 
	    the_post_thumbnail('wa_rs_slider_image'); 
		if(!empty($site_link)){ 
		echo '</a>';
	           } 
		            
	    //$class grabs the position selected in the 'Add Slide' page
	    $class = get_post_meta( $post->ID,  'position_radio', true );
	    echo '<div class="'; echo $class; echo '">' ;
	     if(!empty($site_link)){
		echo '<a href="'.$site_link .'">';
			}
	    echo '<h3>';
	    the_title();
	    echo '</h3>';
	    	if(!empty($site_link)){ 
		echo '</a>';
	           } 
	    global $post;
	    $text = wpautop( get_post_meta( $post->ID,  'top_textarea', true ));
	    echo $text;
	 
	    echo '</div>';
	    echo '</li>';
	                                 
	    endwhile;  
	    echo '</ul>';
	    echo '</div>';           
	         
	    };
	}

	public function load_defaults() {	
		$this->choices = array(
			'yes' => __('Enable', 'responsive-slideshow'),
			'no' => __('Disable', 'responsive-slideshow')
		);

		$this->loading_places = array(
			'header' => __('Header', 'responsive-slideshow'),
			'footer' => __('Footer', 'responsive-slideshow')
		);

		$this->tabs = array(
			'general-settings' => array(
				'name' => __('General settings', 'responsive-slideshow'),
				'key' => 'responsive_slideshow_settings',
				'submit' => 'save_rs_settings',
				'reset' => 'reset_rs_settings',
			)
		);
	}

	/* add styles and js */
	public function wa_rs_load_scripts() {

	$args = apply_filters('rs_args', array(
		'fx' => $this->options['settings']['transition_settings'],
		'timeout' => $this->options['settings']['timer_settings'],
		'easing' => $this->options['settings']['easing_settings'],
		'speed' => $this->options['settings']['speed_settings']
	));
		
	//include jquery cycle
    wp_register_script('wa-rs-jquery-cycle',plugins_url('/assets/js/jquery.cycle.all.js', __FILE__),array('jquery'),'',($this->options['settings']['loading_place'] === 'header' ? false : true));
    wp_enqueue_script('wa-rs-jquery-cycle');

	wp_register_style('wa-rs-css_file', plugins_url('/assets/css/styles.css',__FILE__ ));
	wp_enqueue_style('wa-rs-css_file');
 
    wp_register_script('wa-rs-jquery-easing',plugins_url('/assets/js/jquery.easing.min.js', __FILE__),array('jquery'),'',($this->options['settings']['loading_place'] === 'header' ? false : true));
    wp_enqueue_script('wa-rs-jquery-easing');


    wp_register_script('wa-rs-jquery-swipe',plugins_url('/assets/js/jquery.touchwipe.min.js', __FILE__),array('jquery'),'',($this->options['settings']['loading_place'] === 'header' ? false : true));
    wp_enqueue_script('wa-rs-jquery-swipe');


    wp_register_script('wa-rs-jquery-cycles',plugins_url('/assets/js/script.js', __FILE__),array('jquery'),'',($this->options['settings']['loading_place'] === 'header' ? false : true));
    wp_enqueue_script('wa-rs-jquery-cycles');

    wp_localize_script('wa-rs-jquery-cycles','rsArgs',$args);
	}

	/* insert css files to admin area */
	public function admin_include_scripts() {
			wp_register_style('responsive-slideshow-admin',plugins_url('assets/css/admin.css', __FILE__));
			wp_enqueue_style('responsive-slideshow-admin');
	}
}
$responsive_slideshow = new Responsive_Slideshow();