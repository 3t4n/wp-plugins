<?php
class FacebookLikeBoxPopUpAdmin
{
	private $options;
	
	/**
	 * Admin construct
	 */
	public function __construct()
	{
		add_action( 'admin_menu', array( $this, 'flbpp_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'flbpp_page_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'loadAdminStyles' ) );
	}
	
	/**
	 * Admin option page add
	 */
	public function flbpp_plugin_page()
	{
		add_options_page(
				__("Facebook like box pop up Settings", "facebook-like-box-pop-up"),
				__("Facebook like box pop up Settings", "facebook-like-box-pop-up"),
				'manage_options',
				'flbpp-admin-page',
				array( $this, 'flbpp_admin_page' )
		);
	}
	
	/**
	 * Admin page html
	 */
	public function flbpp_admin_page()
	{
		$this->options = get_option( 'flbpp_settings' );		
		?>
		<div class="wrap facebook-like-box-pop-up-admin-wrap">
			<div class="facebook-like-box-pop-up-admin-col-left">
				<div class="facebook-like-box-pop-up-admin-col-left-inner">
					<div class="facebook-like-box-pop-up-admin-well facebook-like-box-pop-up-admin-header"><h1><?php echo __("Facebook Like Box Pop Up Settings", "facebook-like-box-pop-up"); ?></h1></div>
					<h2 class="facebook-like-box-pop-up-admin-display-none"></h2>
						<?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'main';  ?>
						<div class="facebook-like-box-pop-up-admin-well">
							<h2 class="nav-tab-wrapper">  
								<a href="?page=flbpp-admin-page&tab=main" class="nav-tab <?php echo $active_tab == 'main' ? 'nav-tab-active' : ''; ?>"><?php echo __("Main settings", "facebook-like-box-pop-up"); ?></a>  
								<a href="?page=flbpp-admin-page&tab=shortcode" class="nav-tab <?php echo $active_tab == 'shortcode' ? 'nav-tab-active' : ''; ?>"><?php echo __("Shortcodes", "facebook-like-box-pop-up"); ?></a>  
							</h2>
						</div>				
					<?php if( $active_tab == 'main' ) { ?>
					<div class="facebook-like-box-pop-up-admin-well">
			            <form method="post" action="options.php">
			            <?php
			                settings_fields( 'flbpp_settings_group' );   
			                do_settings_sections( 'flbpp-admin-page' );
			                submit_button(); 
			            ?>
			            </form>
					</div>
					<?php } else if( $active_tab == 'shortcode' ) { ?>
					<div class="facebook-like-box-pop-up-admin-well facebook-like-box-pop-up-admin-header">
					<h3><?php echo __("Shortcodes", "facebook-like-box-pop-up"); ?></h3>
					<?php echo __("Shortcodes can be called from any place in your website.<br />
							There are two types of shortcode for this plugin, first is pop up version and second is fixed version.<br />
							Pop up version of this plugin is like pop up it pops up on page load.<br />
							Fixed version of this plugin is fixed, it can be places on sidebar or in any other place and it will show all the time.<br />
							<b>More information coming soon.</b>", "facebook-like-box-pop-up"); ?>
					</div>
					<div class="facebook-like-box-pop-up-admin-well facebook-like-box-pop-up-admin-header">
					<h3><?php echo __("Shortcode: facebook_like_box", "facebook-like-box-pop-up"); ?></h3>
					<?php echo __("Shortcode <b>facebook_like_box</b> is a pop up plugin version.<br />", "facebook-like-box-pop-up"); ?>
					<?php echo __("If you dont specify shortcode options it will use settings options, by specifying options it overwrite settings.<br />", "facebook-like-box-pop-up"); ?>
					<?php echo __("Options available", "facebook-like-box-pop-up"); ?>
							<table style='width:100%'>
								<tr><td style='width:25%'><b>Option</b></td><td style='width:25%'><b>Value</b></td><td style='width:50%'><b>Example</b></td></tr>
								<tr><td>appid</td><td>integer</td><td>[facebook_like_box appid="1234567890"]</td></tr>
								<tr><td>lang</td><td>string</td><td>[facebook_like_box lang="en_US"]</td></tr>
								<tr><td>href</td><td>string</td><td>[facebook_like_box href="Wordpressgg-1807127206210999"]</td></tr>
								<tr><td>width</td><td>integer</td><td>[facebook_like_box width="180"]</td></tr>
								<tr><td>height</td><td>integer</td><td>[facebook_like_box height="280"]</td></tr>
								<tr><td>cover</td><td>boolean</td><td>[facebook_like_box cover="true"]</td></tr>
								<tr><td>faces</td><td>boolean</td><td>[facebook_like_box faces="true"]</td></tr>
								<tr><td>posts</td><td>boolean</td><td>[facebook_like_box posts="false"]</td></tr>
								<tr><td>call</td><td>boolean</td><td>[facebook_like_box smallheader="false"]</td></tr>
								<tr><td>smallheader</td><td>boolean</td><td>[facebook_like_box cover="false"]</td></tr>
								<tr><td>adapt</td><td>boolean</td><td>[facebook_like_box adapt="false"]</td></tr>
								<tr><td>cookies</td><td>boolean</td><td>[facebook_like_box cookies="true"]</td></tr>
								<tr><td>cookiestime</td><td>integer</td><td>[facebook_like_box cookiestime="3600"]</td></tr>
								<tr><td>cookiesprefix</td><td>string</td><td>[facebook_like_box cookiesprefix="example_prefix"]</td></tr>
							</table>
					</div>
					<div class="facebook-like-box-pop-up-admin-well facebook-like-box-pop-up-admin-header">
					<h3><?php echo __("Shortcode: facebook_like_box_fixed", "facebook-like-box-pop-up"); ?></h3>
					<?php echo __("Shortcode <b>facebook_like_box_fixed</b> is a fixed plugin version.<br />", "facebook-like-box-pop-up"); ?>
					<?php echo __("If you dont specify shortcode options it will use settings options, by specifying options it overwrite settings.<br />", "facebook-like-box-pop-up"); ?>
					<?php echo __("Options available", "facebook-like-box-pop-up"); ?>
							<table style='width:100%'>
								<tr><td style='width:25%'><b>Option</b></td><td style='width:25%'><b>Value</b></td><td style='width:50%'><b>Example</b></td></tr>
								<tr><td>appid</td><td>integer</td><td>[facebook_like_box_fixed appid="1234567890"]</td></tr>
								<tr><td>lang</td><td>string</td><td>[facebook_like_box_fixed lang="en_US"]</td></tr>
								<tr><td>href</td><td>string</td><td>[facebook_like_box_fixed href="Wordpressgg-1807127206210999"]</td></tr>
								<tr><td>width</td><td>integer</td><td>[facebook_like_box_fixed width="180"]</td></tr>
								<tr><td>height</td><td>integer</td><td>[facebook_like_box_fixed height="280"]</td></tr>
								<tr><td>cover</td><td>boolean</td><td>[facebook_like_box_fixed cover="true"]</td></tr>
								<tr><td>faces</td><td>boolean</td><td>[facebook_like_box_fixed faces="true"]</td></tr>
								<tr><td>posts</td><td>boolean</td><td>[facebook_like_box_fixed posts="false"]</td></tr>
								<tr><td>call</td><td>boolean</td><td>[facebook_like_box_fixed smallheader="false"]</td></tr>
								<tr><td>smallheader</td><td>boolean</td><td>[facebook_like_box_fixed cover="false"]</td></tr>
								<tr><td>adapt</td><td>boolean</td><td>[facebook_like_box_fixed adapt="false"]</td></tr>
							</table>
					</div>
					<?php } ?>
					
				</div>
			</div>
			<div class="facebook-like-box-pop-up-admin-col-right">
			<div class="facebook-like-box-pop-up-admin-well facebook-like-box-pop-up-admin-header"><h1><?php echo __("Output example", "facebook-like-box-pop-up"); ?></h1></div>
			<div class="facebook-like-box-pop-up-admin-well">
			<?php FacebookLikeBoxPopUp::outputFLBPP2($this->options); ?>
			<br /></div>
			<div class="facebook-like-box-pop-up-admin-well">
			<p style="text-align:center;"><?php echo __("Send feedback or upgrade ideas to arturs@digitalgg.com", "facebook-like-box-pop-up"); ?></p>
			<br /></div>
			</div>
			<div class="facebook-like-box-pop-up-admin-clearfix"></div>
		</div>
        <?php
    }
    
    /**
     * Setting fields for Wordpress api
     */
    public function flbpp_page_init()
    {
    	//register setting
        register_setting(
            'flbpp_settings_group',
            'flbpp_settings',
            array( $this, 'sanitize' )
        );
        
		// main settings section
        add_settings_section(
            'flbpp_settings_group_id',
            __("Main Settings", "facebook-like-box-pop-up"),
            array( $this, 'print_section_info' ),
            'flbpp-admin-page'
        );  
        
        add_settings_field(
        		'href',
        		__("Facebook url", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_href_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id'
        );
        
        add_settings_field(
            'appid',
            __("Facebook app id", "facebook-like-box-pop-up"),
            array( $this, 'flbpp_appid_cb' ),
            'flbpp-admin-page',
            'flbpp_settings_group_id'        
        );
        
        add_settings_field(
        		'lang',
        		__("Facebook language", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_lang_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id'
        );

        add_settings_field(
        		'width',
        		__("Facebook like box pop up width", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_width_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id'
        );
        
        add_settings_field(
        		'height',
        		__("Facebook like box pop up height", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_height_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id'
        );

        add_settings_field(
        		'mobile_width',
        		__("Facebook like box pop up mobile width", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_mobile_width_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id'
        );
        
        add_settings_field(
        		'mobile_height',
        		__("Facebook like box pop up mobile height", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_mobile_height_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id'
        );
        
		//others settings section
        add_settings_section(
        		'flbpp_settings_group_id2',
        		__("Other Settings", "facebook-like-box-pop-up"),
        		array( $this, 'print_section_info2' ),
        		'flbpp-admin-page'
        );
        add_settings_field(
        		'cover',
        		__("Enable cover", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_cover_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id2'
        );
        add_settings_field(
        		'faces',
        		__("Enable faces", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_faces_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id2'
        );
        add_settings_field(
        		'posts',
        		__("Enable posts", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_posts_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id2'
        );
        add_settings_field(
        		'call',
        		__("Enable custom call", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_call_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id2'
        );
        add_settings_field(
        		'smallheader',
        		__("Enable small header", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_smallheader_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id2'
        );
        add_settings_field(
        		'adapt',
        		__("Enable adapt", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_adapt_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id2'
        );
        
        //view settings section
        add_settings_section(
        		'flbpp_settings_group_id3',
        		__("View Settings", "facebook-like-box-pop-up"),
        		array( $this, 'print_section_info3' ),
        		'flbpp-admin-page'
        );
        add_settings_field(
        		'cookies',
        		__("Enable cookies", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_cookies_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id3'
        );
        add_settings_field(
        		'cookiestime',
        		__("Cookie time", "facebook-like-box-pop-up"),
        		array( $this, 'flbpp_cookiestime_cb' ),
        		'flbpp-admin-page',
        		'flbpp_settings_group_id3'
        );
    }

    /**
     * After input sanitize
     * @param string $input
     * @return multitype:string Ambigous <string, mixed>
     */
    public function sanitize( $input )
    {
        $new_input = array();

        if( isset( $input['href'] ) )
            $new_input['href'] = sanitize_text_field( $input['href'] );

        if( isset( $input['appid'] ) )
            $new_input['appid'] = sanitize_text_field( $input['appid'] );

        if( isset( $input['lang'] ) )
        	$new_input['lang'] = sanitize_text_field( $input['lang'] );
        
        if( isset( $input['width'] ) )
        	$new_input['width'] = sanitize_text_field( $input['width'] );
        
        if( isset( $input['height'] ) )
        	$new_input['height'] = sanitize_text_field( $input['height'] );

        if( isset( $input['mobile_width'] ) )
        	$new_input['mobile_width'] = sanitize_text_field( $input['mobile_width'] );
        
        if( isset( $input['mobile_height'] ) )
        	$new_input['mobile_height'] = sanitize_text_field( $input['mobile_height'] );
        
        if( isset( $input['cover'] ) )
        	$new_input['cover'] = sanitize_text_field( $input['cover'] );

        if( isset( $input['faces'] ) )
        	$new_input['faces'] = sanitize_text_field( $input['faces'] );

        if( isset( $input['posts'] ) )
        	$new_input['posts'] = sanitize_text_field( $input['posts'] );

        if( isset( $input['call'] ) )
        	$new_input['call'] = sanitize_text_field( $input['call'] );

        if( isset( $input['smallheader'] ) )
        	$new_input['smallheader'] = sanitize_text_field( $input['smallheader'] );

        if( isset( $input['adapt'] ) )
        	$new_input['adapt'] = sanitize_text_field( $input['adapt'] );

        if( isset( $input['cookies'] ) )
        	$new_input['cookies'] = sanitize_text_field( $input['cookies'] );
        
        if( isset( $input['cookiestime'] ) )
        	$new_input['cookiestime'] = sanitize_text_field( $input['cookiestime'] );
        
        return $new_input;
    }
    
    /**
     * Output main section intro
     */
    public function print_section_info()
    {
        print __("Facebook like box pop up main settings section.", "facebook-like-box-pop-up");
    }
    
    /**
     * Output fields section intro
     */
    public function print_section_info2()
    {
        print __("Facebook like box pop up others settings section.", "facebook-like-box-pop-up");
    }

    /**
     * Output fields section intro
     */
    public function print_section_info3()
    {
    	print __("Facebook like box pop up cookies settings section.", "facebook-like-box-pop-up");
    }

    /**
     * href callback function
     */
    public function flbpp_href_cb()
    {
    	printf(
    			'https://www.facebook.com/<input type="text" id="href" name="flbpp_settings[href]" value="%s" />/',
    			isset( $this->options['href'] ) ? esc_attr( $this->options['href']) : ''
    	);
    	?><p class="description"><?php print __("The the Facebook Page ID.", "facebook-like-box-pop-up"); ?></p><?php
    	
    }

    /**
     * href callback function
     */
    public function flbpp_appid_cb()
    {
    	printf(
    			'<input type="text" id="appid" name="flbpp_settings[appid]" value="%s" />',
    			isset( $this->options['appid'] ) ? esc_attr( $this->options['appid']) : ''
    	);
    	?><p class="description"><?php print __("The Facebook APPID.", "facebook-like-box-pop-up"); ?></p><?php
    }

    /**
     * href callback function
     */
    public function flbpp_lang_cb()
    {
		$html = '<select name="flbpp_settings[lang]">';
		foreach ($this->getFbLanguages() as $code => $title)
			$html .= '<option value="'.$code.'" '.selected( $this->options["lang"], $code, false ).'>'.$title.'</option>';
    	$html .= '</select>';
    	printf($html);
    	?><p class="description"><?php print __("The lang of the Facebook Page.", "facebook-like-box-pop-up"); ?></p><?php
    }

    /**
     * width callback function
     */
    public function flbpp_width_cb()
    {
    	printf(
    			'<input type="text" id="width" name="flbpp_settings[width]" value="%s" />',
    			isset( $this->options['width'] ) ? esc_attr( $this->options['width']) : ''
    	);
    	?><p class="description"><?php print __("The pixel width of the embed (Min. 180 to Max. 500)", "facebook-like-box-pop-up"); ?></p><?php
    }

    /**
     * height callback function
     */
    public function flbpp_height_cb()
    {
    	printf(
    			'<input type="text" id="height" name="flbpp_settings[height]" value="%s" />',
    			isset( $this->options['height'] ) ? esc_attr( $this->options['height']) : ''
    	);
    	?><p class="description"><?php print __("The pixel height of the embed (Min. 70)", "facebook-like-box-pop-up"); ?></p><?php
    }

    /**
     * mobile width callback function
     */
    public function flbpp_mobile_width_cb()
    {
    	printf(
    			'<input type="text" id="mobile_width" name="flbpp_settings[mobile_width]" value="%s" />',
    			isset( $this->options['mobile_width'] ) ? esc_attr( $this->options['mobile_width']) : ''
    	);
    	?><p class="description"><?php print __("The pixel width of the embed (Min. 180 to Max. 500)", "facebook-like-box-pop-up"); ?></p><?php
    }
    
    /**
     * mobile height callback function
     */
    public function flbpp_mobile_height_cb()
    {
    	printf(
    			'<input type="text" id="mobile_height" name="flbpp_settings[mobile_height]" value="%s" />',
    			isset( $this->options['mobile_height'] ) ? esc_attr( $this->options['mobile_height']) : ''
    	);
    	?><p class="description"><?php print __("The pixel height of the embed (Min. 70)", "facebook-like-box-pop-up"); ?></p><?php
    }
    
    /**
     * cover callback function
     */
    public function flbpp_cover_cb()
    {
    	printf('<select name="flbpp_settings[cover]">
    		<option value="true" '.selected( $this->options["cover"], "true", false ).'>'.__("Enable", "facebook-like-box-pop-up").'</option>
    	    <option value="" '.selected( $this->options["cover"], "", false ).'>'.__("Disable", "facebook-like-box-pop-up").'</option>
    	</select>');
    	?><p class="description"><?php print __("Enable/disable cover photo in the header", "facebook-like-box-pop-up"); ?></p><?php
    }
    
    /**
     * faces callback function
     */
    public function flbpp_faces_cb()
    {
    	printf('<select name="flbpp_settings[faces]">
    		<option value="true" '.selected( $this->options["faces"], "true", false ).'>'.__("Enable", "facebook-like-box-pop-up").'</option>
    	    <option value="" '.selected( $this->options["faces"], "", false ).'>'.__("Disable", "facebook-like-box-pop-up").'</option>
    	</select>');
    	?><p class="description"><?php print __("Enable/disable profile photos when friends like this", "facebook-like-box-pop-up"); ?></p><?php
    }

    /**
     * posts callback function
     */
    public function flbpp_posts_cb()
    {
    	printf('<select name="flbpp_settings[posts]">
    		<option value="true" '.selected( $this->options["posts"], "true", false ).'>'.__("Enable", "facebook-like-box-pop-up").'</option>
    	    <option value="" '.selected( $this->options["posts"], "", false ).'>'.__("Disable", "facebook-like-box-pop-up").'</option>
    	</select>');
    	?><p class="description"><?php print __("Enable/disable posts from the Page's timeline.", "facebook-like-box-pop-up"); ?></p><?php
    }

    /**
     * faces callback function
     */
    public function flbpp_call_cb()
    {
    	printf('<select name="flbpp_settings[call]">
    		<option value="true" '.selected( $this->options["call"], "true", false ).'>'.__("Enable", "facebook-like-box-pop-up").'</option>
    	    <option value="" '.selected( $this->options["call"], "", false ).'>'.__("Disable", "facebook-like-box-pop-up").'</option>
    	</select>');
    	?><p class="description"><?php print __("Enable/disable the custom call to action button (if available)", "facebook-like-box-pop-up"); ?></p><?php
    }

    /**
     * smallheader callback function
     */
    public function flbpp_smallheader_cb()
    {
    	printf('<select name="flbpp_settings[smallheader]">
    		<option value="true" '.selected( $this->options["smallheader"], "true", false ).'>'.__("Enable", "facebook-like-box-pop-up").'</option>
    	    <option value="" '.selected( $this->options["smallheader"], "", false ).'>'.__("Disable", "facebook-like-box-pop-up").'</option>
    	</select>');
    	?><p class="description"><?php print __("Enable/disable the small header instead", "facebook-like-box-pop-up"); ?></p><?php
    }

    /**
     * adapt callback function
     */
    public function flbpp_adapt_cb()
    {
    	printf('<select name="flbpp_settings[adapt]">
    		<option value="true" '.selected( $this->options["adapt"], "true", false ).'>'.__("Enable", "facebook-like-box-pop-up").'</option>
    	    <option value="" '.selected( $this->options["adapt"], "", false ).'>'.__("Disable", "facebook-like-box-pop-up").'</option>
    	</select>');
    	?><p class="description"><?php print __("Enable/disable fit inside the container width", "facebook-like-box-pop-up"); ?></p><?php
    }
    
    /**
     * cookiestime callback function
     */
    public function flbpp_cookiestime_cb()
    {
    	printf(
    			'<input type="text" id="cookiestime" name="flbpp_settings[cookiestime]" value="%s" />',
    			isset( $this->options['cookiestime'] ) ? esc_attr( $this->options['cookiestime']) : ''
    	);
    	?><p class="description"><?php print __("Cookies time in ms", "facebook-like-box-pop-up"); ?></p><?php
    }
    
    /**
     * cover callback function
     */
    public function flbpp_cookies_cb()
    {
    	printf('<select name="flbpp_settings[cookies]">
    		<option value="true" '.selected( $this->options["cookies"], "true", false ).'>'.__("Enable", "facebook-like-box-pop-up").'</option>
    	    <option value="" '.selected( $this->options["cookies"], "", false ).'>'.__("Disable", "facebook-like-box-pop-up").'</option>
    	</select>');
    	?><p class="description"><?php print __("Enable/disable cookies", "facebook-like-box-pop-up"); ?></p><?php
    }
    
    /**
     * Loads admin style
     */
    public function loadAdminStyles ()
    {
    	wp_enqueue_style('facebook-like-box-pop-up-admin-style', plugins_url( '../assets/admin-style.css', __FILE__ ), array(), '1.0', 'all');
    	wp_enqueue_style( 'facebook-like-box-pop-up-admin-style' );
    	 
    }
    
    /**
     * Returns array of facebook languages and codes
     */
    public function getFbLanguages ()
    {
    	return [
    			"af_ZA" => "Afrikaans",
    			"sq_AL" => "Albanian",
    			"ar_AR" => "Arabic",
    			"hy_AM" => "Armenian",
    			"az_AZ" => "Azerbaijani",
    			"eu_ES" => "Basque",
    			"be_BY" => "Belarusian",
    			"bn_IN" => "Bengali",
    			"bs_BA" => "Bosnian",
    			"bg_BG" => "Bulgarian",
    			"ca_ES" => "Catalan",
    			"cx_PH" => "Cebuano",
    			"hr_HR" => "Croatian",
    			"cs_CZ" => "Czech",
    			"da_DK" => "Danish",
    			"nl_NL" => "Dutch",
    			"nl_BE" => "Dutch(Belgie)",
    			"en_PI" => "English (Pirate)",
    			"en_GB" => "English (UK)",
    			"en_US" => "English(US)",
    			"en_UD" => "English (Upside Down)",
    			"eo_EO" => "Esperanto",
    			"et_EE" => "Estonian",
    			"fo_FO" => "Faroese",
    			"tl_PH" => "Filipino",
    			"fi_FI" => "Finnish",
    			"fr_CA" => "French (Canada)",
    			"fr_FR" => "French (France)",
    			"fy_N" => "Frisian",
    			"gl_ES" => "Galician",
    			"ka_GE" => "Georgian",
    			"de_DE" => "German",
    			"el_GR" => "Greek",
    			"gn_PY" => "Guarani",
    			"gu_IN" => "Gujarati",
    			"he_IL" => "Hebrew",
    			"hi_IN" => "Hindi",
    			"hu_HU" => "Hungarian",
    			"is_IS" => "Icelandic",
    			"id_ID" => "Indonesian",
    			"ga_IE" => "Irish",
    			"it_IT" => "Italian",
    			"ja_JP" => "Japanese",
    			"ja_KS" => "Japanese (Kansai)",
    			"jv_ID" => "Javanese",
    			"kn_IN" => "Kannada",
    			"kk_KZ" => "Kazakh",
    			"km_KH" => "Khmer",
    			"ko_KR" => "Korean",
    			"ku_TR" => "Kurdish(Kurmanji)",
    			"la_VA" => "Latin",
    			"lv_LV" => "Latvian",
    			"fb_LT" => "Leet Speak",
    			"lt_LT" => "Lithuanian",
    			"mk_MK" => "Macedonian",
    			"ms_MY" => "Malay",
    			"ml_IN" => "Malayalam",
    			"mr_IN" => "Marathi",
    			"mn_MN" => "Mongolian",
    			"ne_NP" => "Nepali",
    			"nb_NO" => "Norwegian (bokmal)",
    			"nn_NO" => "Norwegian (nynorsk)",
    			"ps_AF" => "Pashto",
    			"fa_IR" => "Persian",
    			"pl_PL" => "Polish",
    			"pt_BR" => "Portuguese (Brazil)",
    			"pt_PT" => "Portuguese (Portugal)",
    			"pa_IN" => "Punjabi",
    			"ro_RO" => "Romanian",
    			"ru_RU" => "Russian",
    			"sr_RS" => "Serbian",
    			"zh_CN" => "Simplified Chinese (China)",
    			"si_LK" => "Sinhala",
    			"sk_SK" => "Slovak",
    			"sl_SI" => "Slovenian",
    			"es_LA" => "Spanish",
    			"es_CO" => "Spanish (Colombia)",
    			"es_ES" => "Spanish(Spain)",
    			"sw_KE" => "Swahili",
    			"sv_SE" => "Swedish",
    			"tg_TJ" => "Tajik",
    			"ta_IN" => "Tamil",
    			"te_IN" => "Telugu",
    			"th_TH" => "Thai",
    			"zh_HK" => "Traditional Chinese (Hong Kong)",
    			"zh_TW" => "Traditional Chinese (Taiwan)",
    			"tr_TR" => "Turkish",
    			"uk_UA" => "Ukrainian",
    			"ur_PK" => "Urdu",
    			"uz_UZ" => "Uzbek",
    			"vi_VN" => "Vietnamese",
    			"cy_GB" => "Welsh"
    	];
    }
    
    /**
     * flbpp install hook
     */
    static function plugin_activation() {
    	
    	$data = array(
    			"href" => "Wordpressgg-1807127206210999",
    			"appid" => "",
    			"lang" => "en_US",
    			"width" => "400",
    			"height" => "250",
    			"mobile_width" => "400",
    			"mobile_height" => "250",
    			"cover" => "true",
    			"faces" => "true",
    			"posts" => "true",
    			"call" => "true",
    			"smallheader" => "true",
    			"adapt" => "true",
    			"cookies" => "true",
    			"cookiestime" => "3600",
    	);
    	
		add_option('flbpp_settings', $data);
    }
	
    /**
     * flbpp delete hook
     */
    static function plugin_deactivation() {
    	delete_option('flbpp_settings');
    }
    
    /**
     * Add simple link for better ux
     * @param array $links
     * @return array
     */
    public static function flbpp_settings_link ( $links ) {
    	$mylinks = array(
    			'<a href="' . admin_url( 'options-general.php?page=flbpp-admin-page' ) . '">Settings</a>',
    	);
    	return array_merge( $links, $mylinks );
    }
}