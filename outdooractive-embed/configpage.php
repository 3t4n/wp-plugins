<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
include dirname(__FILE__).'/includes/get_prouser.php';

class oaembed_Config {
	private $options = 'oaembed_options';
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'oaembed' ) );
        add_action( 'admin_init', array( $this, 'page_init_oaembed' ) );
    }
	
	public function oaembed() {
        add_options_page(
            'Outdooractive Embed', //Page Title
            'Outdooractive Embed', //Menu Title
            'manage_options', //Capability
            'oaembed-admin', //Menu Slug
            array( $this, 'oaembed_create_admin_page' ) //Function
        );
    }
	
	public function oaembed_create_admin_page() {
		
		$this->options = get_option( 'oaembedoptions' );
		
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Outdooractive Embed</h2>           
            <form method="post" action="options.php">
            <?php
				$code = $this->options['exampleCode'];
				$pro = $this->options['proKey'];
				$usr = $this->options['usrName'];
                settings_fields( 'oaembedsettings' );   
				do_settings_sections( 'oaembed-admin' );
				if ($code == '' || $pro == '' || $usr == '') {
					submit_button(); 
				} else {
					$buttonText = __('Reset configuration', 'outdooractiveEmbed');
					submit_button($buttonText); 
				}
                
            ?>
            </form>
        </div>
        <?php

	}
	
	public function page_init_oaembed() {        
        register_setting(
            'oaembedsettings', //Option Group
            'oaembedoptions', //Option Name
            array( $this, 'oaembed_sanitize' ) //Sanitize Callback
        );
		$this->options = get_option( 'oaembedoptions' );
		$code = $this->options['exampleCode'];
		$pro = $this->options['proKey'];
		$usr = $this->options['usrName'];
		if ($code == '' || $pro == '' || $usr == '') {
			add_settings_section(
				'oaembed', //ID
				__('<span style="font-weight: bold;">Instruction</span>', 'outdooractiveEmbed'), //Title
				array( $this, 'print_section_info_oaembed' ), //Callback
				'oaembed-admin' //Page
			);  
		
			add_settings_field(
				'exampleCode',
				__('Sample-Code', 'outdooractiveEmbed'),
				array($this, 'oaembed_exampleCode_callback'),
				'oaembed-admin',
				'oaembed'
			);
		} else {
			add_settings_section(
				'oaembed', //ID
				__('Pro+ Embedding is configured. Have fun with it!', 'outdooractiveEmbed'), //Title
				array( $this, 'oaembed_resetCode_callback' ), //Callback
				'oaembed-admin' //Page
			);
		}
	}
	
	public function print_section_info_oaembed() {
		$code = $this->options['exampleCode'];
		$pro =  $this->options['usrName'];
		$usr = $this->options['proKey'];
		if ($code != '' && ($usr == '' || $pro == '')) {
			$sectionInfo = __('This is how it works: <a href="https://de.wordpress.org/plugins/outdooractive-embed/">Wordpress Plugin Page</a></br></br></br><span style="font-weight: bold;">Settings for Pro+ Embedding</span><br>With Pro+ you can embed your content into your website with white-label embedding. <a href="https://www.outdooractive.com/en/pro-business.html">Learn more about Pro+</a><br>Once you\'ve completed your Pro+ subscription, you can set up Pro+ Embedding:<br><ol><li>Open any tour, such as <a href="https://outdooractive.com/r/17081307">Winter hike through the Breitachklamm</a>.</li><li>In the action bar of the tour, click on "Embed" in the upper right corner</li><li>Log into outdooractive.com with your account. If you\'re already logged in, skip this step.</li><li>The "Embed" panel opens. As soon as you have agreed to the terms and conditions, an automatically generated code will appear. Copy it and paste it into the "Sample-Code" box at the bottom of this page.</li><li>Press "Save". The plugin for Pro+ Embedding is now configured and you can now integrate your content directly into your posts as usual.</li></ol><br><br><span style="color: red; font-weight: bold">Please insert a valid Pro+-Embed-Code. Follow the instructions above and make sure that you have a Pro+-Abo</span>', 'outdooractiveEmbed');
		} else {
			$sectionInfo = __('This is how it works: <a href="https://de.wordpress.org/plugins/outdooractive-embed/">Wordpress Plugin Page</a></br></br></br><span style="font-weight: bold;">Settings for Pro+ Embedding</span><br>With Pro+ you can embed your content into your website with white-label embedding. <a href="https://www.outdooractive.com/en/pro-business.html">Learn more about Pro+</a><br>Once you\'ve completed your Pro+ subscription, you can set up Pro+ Embedding:<br><ol><li>Open any tour, such as <a href="https://outdooractive.com/r/17081307">Winter hike through the Breitachklamm</a>.</li><li>In the action bar of the tour, click on "Embed" in the upper right corner</li><li>Log into outdooractive.com with your account. If you\'re already logged in, skip this step.</li><li>The "Embed" panel opens. As soon as you have agreed to the terms and conditions, an automatically generated code will appear. Copy it and paste it into the "Sample-Code" box at the bottom of this page.</li><li>Press "Save". The plugin for Pro+ Embedding is now configured and you can now integrate your content directly into your posts as usual.</li></ol>', 'outdooractiveEmbed');
		}
		?><div style="margin-bottom: 20px;"><?php
		print $sectionInfo;
		?></div><?php
	}
	
	public function oaembed_sanitize( $input ) {
        $new_input = array();

        if( isset( $input['exampleCode'] ) ) {
			$new_input['exampleCode'] = $input['exampleCode'];
			$new_input['usrName'] = oaembed_get_prouser($input['exampleCode'],'usr');
			$new_input['proKey'] = oaembed_get_prouser($input['exampleCode'],'pro');
		}

		return $new_input;
    }

    public function oaembed_exampleCode_callback() {
		printf(
			'<textarea id="exampleCode" name="oaembedoptions[exampleCode]" rows="10" cols="50">%s</textarea>',
			isset( $this->options['exampleCode'] ) ? $this->options['exampleCode'] : ''
		);
    }
	
	public function oaembed_resetCode_callback() {
		print '';
	}
}

if( is_admin() )
    $oaembed_configpage = new oaembed_Config();
?>