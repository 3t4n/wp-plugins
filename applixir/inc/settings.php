<?php
class Applixir_Admin_Settings
{
    /**
     * Autoload method
     *
     * @return void
     */
    public function __construct()
    {
        add_action('admin_menu', array( &$this, 'register_sub_menu' ));
        add_action('admin_init', array( $this, 'initialize_options' ));

        add_action('admin_enqueue_scripts', array( $this, 'admin_scripts' ));
    }
    public function admin_scripts()
    {
        // Add the color picker css file
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
    }

    /**
     * Register submenu
     *
     * @return void
     */
    public function register_sub_menu()
    {
        add_menu_page('AppLixir Settings', 'AppLixir Settings', 'manage_options', 'applixir-settings', array( &$this, 'settings_layout' ));
    }

    /**
     * Render submenu
     *
     * @return void
     */
    public function settings_layout()
    { ?>
		<!-- Create a header in the default WordPress 'wrap' container -->
		<div class="wrap">

			<!-- Make a call to the WordPress function for rendering errors when settings are saved. -->
			<?php settings_errors(); ?>

			<!-- Create the form that will be used to render our options -->
			<form method="post" action="options.php">
				<?php settings_fields('applixir_settings'); ?>
				<?php do_settings_sections('applixir_settings'); ?>
				<?php submit_button(); ?>
			</form>

		</div><!-- /.wrap -->
<?php  }

    public function initialize_options()
    {
        // If settings don't exist, create them.
        if (false == get_option('applixir_settings')) {
            add_option('applixir_settings');
        } // end if

        add_settings_section(
            'applixir_welcome_section',
            '<div class="heading">Reward Video Ad Settings <img class="applixir-logo" src="'.APPLIXIR_URL.'/img/applixir-logo.png"></div>',
            array( $this, 'welcome_section_callback' ),
            'applixir_settings'
        );

        add_settings_section(
            'applixir_settings_section_1',
            '',
            array( $this, 'section_callback' ),
            'applixir_settings'
        );


        add_settings_field(
            'dev_id',
            'Account ID',
            array( $this, 'settings_field' ),
            'applixir_settings',
            'applixir_settings_section_1',
            array( 'field'=>'dev_id' )
        );

        add_settings_field(
            'zone_id',
            'Game ID',
            array( $this, 'settings_field' ),
            'applixir_settings',
            'applixir_settings_section_1',
            array( 'field'=>'zone_id' )
        );

        add_settings_field(
            'wp_id',
            'Zone ID',
            array( $this, 'settings_field' ),
            'applixir_settings',
            'applixir_settings_section_1',
            array( 'field'=>'wp_id' )
        );



        add_settings_section(
            'applixir_advance_settings_section',
            '',
            array( $this, 'advance_setting_section_callback' ),
            'applixir_settings'
        );

        add_settings_field(
            'message_before_video',
            'Message before the video',
            array( $this, 'settings_field' ),
            'applixir_settings',
            'applixir_advance_settings_section',
            array( 'field'=>'message_before_video' )
        );

        add_settings_field(
            'message_font_size',
            'Message Font Size',
            array( $this, 'settings_field' ),
            'applixir_settings',
            'applixir_advance_settings_section',
            array( 'field'=>'message_font_size' )
        );

        add_settings_field(
            'message_font_color',
            'Message Font Color',
            array( $this, 'settings_field' ),
            'applixir_settings',
            'applixir_advance_settings_section',
            array( 'field'=>'message_font_color' )
        );


        // add_settings_field(
        //     'message_background_color',
        //     'Message Background Color',
        //     array( $this, 'settings_field' ),
        //     'applixir_settings',
        //     'applixir_advance_settings_section',
        //     array( 'field'=>'message_background_color' )
        // );
        // add_settings_field(
        //     'video_placement',
        //     'Video Placement',
        //     array( $this, 'settings_field' ),
        //     'applixir_settings',
        //     'applixir_advance_settings_section',
        //     array( 'field'=>'video_placement' )
        // );
        // add_settings_field(
        //     'video_frequency',
        //     'Show Video after every',
        //     array( $this, 'settings_field' ),
        //     'applixir_settings',
        //     'applixir_advance_settings_section',
        //     array( 'field'=>'video_frequency' )
        // );

        add_settings_section(
            'applixir_watch_add_settings_section',
            '',
            array( $this, 'watch_add_setting_section_callback' ),
            'applixir_settings'
        );

        add_settings_field(
            'font_size',
            'Button Font Size',
            array( $this, 'settings_field' ),
            'applixir_settings',
            'applixir_watch_add_settings_section',
            array( 'field'=>'font_size' )
        );
        add_settings_field(
            'font_color',
            'Button Font Color',
            array( $this, 'settings_field' ),
            'applixir_settings',
            'applixir_watch_add_settings_section',
            array( 'field'=>'font_color' )
        );
        add_settings_field(
            'background_color',
            'Button Background Color',
            array( $this, 'settings_field' ),
            'applixir_settings',
            'applixir_watch_add_settings_section',
            array( 'field'=>'background_color' )
        );



        add_settings_section(
            'applixir_usage_guide_section',
            '',
            array( $this, 'usage_guide_section_callback' ),
            'applixir_settings',
        );


        add_settings_section(
            'applixir_faq_settings_section',
            '',
            array( $this, 'faq_setting_section_callback' ),
            'applixir_settings'
        );


        //register settings
        register_setting('applixir_settings', 'applixir_settings');
    }

    public function faq_setting_section_callback()
    {
        ?>
                <div class="applixir-faq-section">
                    <div class="applixir-single-faq-cont">
                        <h2>1.	What is AppLixir Reward Video Ads?</h2>
                        <p>
                            AppLixir serves millions of rewarded video ads on games and content sites. Remember when you play a game and want an extra life? You watch a video ad in exchange for that extra life, and that's what we provide for games. For content sites like yours, we offer a WordPress plugin that lets your readers watch an ad to gain access to your content.
                        </p>
                    </div>


                    <div class="applixir-single-faq-cont">
                        <h2>2.	What does the user experience look like?</h2>
                        <p>
                            An example can be found <a href="https://support.applixir.com/hc/en-us/articles/360055709373-Overview-WordPress-Integration" target="_blank">here</a> . A user visits your page, sees one or two paragraphs, and if they choose to continue reading, they must watch an ad. The rest of the content will appear after the user fully watches the ad.
                        </p>
                    </div>


                    <div class="applixir-single-faq-cont">
                        <h2>3.	How can I test?</h2>
                        <p>
                        Before testing, please enter the following IDs for Dev, Game, and WordPress: Account ID: 36, Game ID: 2050, WordPress ID: 2050. After doing so, place <span class="applixir-shortcode-text">[insert-AppLixir]</span> just before the content you want to hide. Any content following <span class="applixir-shortcode-text">[insert-AppLixir]</span> will be hidden until the user watches the entire ad. After testing and seeing how it works, the next step is setting up your account.
                        </p>
                    </div>

                    <div class="applixir-single-faq-cont">
                        <h2>4.	How do I get started?</h2>
                        <p>
                        After testing and understanding how it works, sign up for an AppLixir account and add a WordPress site in the game section. <a href="https://support.applixir.com/hc/en-us/articles/360055709373-Overview-WordPress-Integration" target="_blank" >A clear guide on how to sign up and obtain the WordPress Site ID can be found here.</a>
                        </p>
                    </div>


                    <div class="applixir-single-faq-cont">
                        <h2>5.	What happens after I receive my Account, Game ID and Zone IDs?</h2>
                        <p>
                        We review every account that signs up for AppLixir. The review process involves completing an onboarding questionnaire that we will send once you are registered. The review process may take up to a week, and we will send a confirmation once your account has been approved (99% of the time, it gets approved).
                        </p>
                    </div>

                    <div class="applixir-single-faq-cont">
                        <h2>6.	Where can I see my impressions and earnings?</h2>
                        <p>
                        To view your impressions and earnings from AppLixir Rewarded Video Ads, log in to AppLixir and check the report. The report displays ad requests, ads served, CPM, and earnings. It is updated in real-time.
                        </p>
                    </div>

                    <div class="applixir-single-faq-cont">
                        <h2>7.	How do I get paid?</h2>
                        <p>
                        Our payment terms are Net30. This means you will receive payment for January's revenue at the end of February. Please let us know your preferred payment method – we typically pay via bank wire, Wise, or PayPal.
                        </p>
                    </div>
                    <div class="applixir-single-faq-cont">
                        <h2>8.	How do I contact Support?</h2>
                        <p>
                        <a href="https://support.applixir.com/hc/en-us/articles/360055709373-Overview-WordPress-Integration" target="_blank" >All our WordPress integration information is available here</a>. If you need to contact our support directly, email us at <a href="mailto:WordPress@applixir.com">WordPress@applixir.com</a>, and we will be happy to assist you.
                        We are here to support you by making the monetization aspect of your work easier! Happy monetizing!
                        </p>
                    </div>
                    
                </div>

        <?php
    }

    public function welcome_section_callback()
    {
        ?>
		<style>

		.applixir-tab-wrapper{
			border-bottom: 1px solid #ccc;
			margin: 0;
			padding-top: 9px;
			padding-bottom: 0;
			line-height: inherit;
            max-width: 880px;
		}
		.nav-tab {
            width: 33.33%;
			float: left;
			border: 1px solid #ccc;
			border-bottom: none;
			/* margin-left: 0.5em; */
			padding: 5px 10px;
			font-size: 14px;
			line-height: 1.71428571;
			font-weight: 600;
			background: #e5e5e5;
			color: #555;
			text-decoration: none;
			white-space: nowrap;
            text-align: center;
            margin-left: 0;
            
            box-sizing: border-box;
		}
		.nav-tab-active, .nav-tab:focus:active {
			box-shadow: none;
		}
		.nav-tab-active {
			margin-bottom: -1px;
			color: #444;
		}
		.nav-tab-active, .nav-tab-active:hover, .nav-tab-active:focus, .nav-tab-active:focus:active {
			border-bottom: 1px solid #f1f1f1;
			background: #f1f1f1;
			color: #000;
		}
		.applixir-tab-wrapper:not(.wp-clearfix):after {
			content: "";
			display: table;
			clear: both;
		}
		.applixir-tab-wrapper a, .applixir-tab-wrapper a:focus{
			box-shadow:none;
		}
		.applixir-settings-section{
			display:none;
			max-width: 800px;
			padding: 40px;
			background: #fff;
		}

        .applixir-faq-section{
            display: none; 
        }

        .applixir-single-faq-cont{
            padding-bottom: 20px;
        }
        .applixir-single-faq-cont p{
            margin-top: 8px;
        }

		.applixir-settings-section, .applixir-welcome-section,
        .applixir-faq-section{
			max-width: 800px;
			padding: 40px;
			background: #fff;
		}
  
        .applixir-settings-section h2,
        .applixir-single-faq-cont h2{
            margin: 0px;
            padding-bottom: 5px;
        }
        .applixir-settings-section{
            padding: 25px 40px 20px;
        }

        .applixir-section-title-container h2,
        .applixir-section-title-container p{
            display: inline;
        }
        .applixir-section-title-container h2{
            color: #8321f1;
        }

       .applixir-last-step-container{
            padding-top: 50px;
       }

		.applixir-logo{
			width: 114px;
		vertical-align: middle;
		margin-bottom: 6px;
		float:right;
		}
		.heading{
			max-width:880px;
		}

        .applixir-ifram-container,
        .applixir-shortcode-description{
            text-align: center;
        }
        .applixir-ifram-container{
            margin-top: 20px;
        }

        .applixir-shortcode-text{
            background: #f2f2f2;
            color: #dc4b96;
            padding: 2px;
        }
        .applixir-admin-title{
            margin-top: 0px;
            margin-bottom: 5px;
            font-size: 24px;
            line-height: 1.4;
            color: #3c434a;
        }
        .applixir-admin-description{
            margin-top: 0px;
            padding-top: 0px;
        }
        .applixir-usage-guide-section{
            margin-top: 10px;
        }

        .applixir_number_field{
            max-width: 60px;
        }

		</style>
		<script>
		(function($){
			$(function(){
				$(document).on('click', '#applixir-welcome-setting', function(){
					var display = $('.applixir-welcome-section').css('display');

					if( display != 'block'){

						$('#applixir-account-setting').removeClass('nav-tab-active');
						$('#applixir-faq-setting').removeClass('nav-tab-active');

						$(this).addClass('nav-tab-active')
						$('.applixir-welcome-section').show();
						$('.applixir-settings-section').hide();
						$('.applixir-faq-section').hide();
					}

				})

				$(document).on('click', '#applixir-account-setting', function(){
					var display = $('.applixir-settings-section').css('display');

					if( display != 'block'){

						$('#applixir-welcome-setting').removeClass('nav-tab-active')
						$('#applixir-faq-setting').removeClass('nav-tab-active')

						$(this).addClass('nav-tab-active')
						$('.applixir-welcome-section').hide();
						$('.applixir-faq-section').hide();
						$('.applixir-settings-section').show();
					}

				})

                // show faq section on tab click
				$(document).on('click', '#applixir-faq-setting', function(){
					var display = $('.applixir-faq-section').css('display');

					if( display != 'block'){

						$('#applixir-welcome-setting').removeClass('nav-tab-active')
						$('#applixir-account-setting').removeClass('nav-tab-active')

                        $(this).addClass('nav-tab-active')

						$('.applixir-faq-section').show();
						$('.applixir-welcome-section').hide();
						$('.applixir-settings-section').hide();
					}

				})


                $(document).on('change', '.applixir_font_size',function(){

                    var fontSizeVal = $(this).val();
                    
                    fontSizeVal = fontSizeVal.replace(/[^\d]/g, '') + 'px';

                    $('.applixir-ad-btn').css('font-size', fontSizeVal);


                })

                // using this object to identify the colorpicker triggered
                var cssPropertiesToAdd = {
                            applixir_background_color: 'backgroundColor',
                            applixir_font_color: 'color'
                        }
                        
                // add color picker on settings
				$('.applixir_color_picker').wpColorPicker({
                    
                       
                        change: function( event, ui ) {
                            var theColor = ui.color.toString();
                            var detectOnChangeElement = event.target.classList;

                            // detect which color picker is triggerd then add that setting on button
                            $.each(cssPropertiesToAdd, function(key, value){
                                if( event.target.classList.contains(key) ){
                                    
                                    $('.applixir-ad-btn').css(value, theColor);
                                };

                            })
                        }

                    }
                );
			})
		})(jQuery)
		</script>

		<nav class="applixir-tab-wrapper woo-nav-tab-wrapper">
		<a href="javascript:void(0)" id="applixir-welcome-setting" class="nav-tab nav-tab-active"> Welcome</a>
		<a href="javascript:void(0)" id="applixir-account-setting" class="nav-tab "> Account Setting</a>
		<a href="javascript:void(0)" id="applixir-faq-setting" class="nav-tab "> FAQ </a>
		<!-- <a href="javascript:void(0)" id="advance-setting" class="nav-tab ">Advance Setting</a>
		<a href="javascript:void(0)" id="usage-guide" class="nav-tab ">Usage Guide</a> -->
		</nav>

		<div class="applixir-welcome-section">
			<h3 class="applixir-admin-title" style="text-align: center">Welcome to AppLixir Rewarded Video Ad WordPress Plugin.</h3>
            <div class="applixir-ifram-container">
                <iframe src="https://player.vimeo.com/video/811664593?h=c3aabad0bc" width="640" height="344" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="applixir-shortcode-description">
                <p>Copy <span class="applixir-shortcode-text"> [insert-AppLixir] </span> and test. Every time you want to put a Reward Video Ad Insertion, just insert <span class="applixir-shortcode-text">[insert-AppLixir]</span> and that should work fine.</p>
            </div>
            
            
		<?php
    }

    public function section_callback()
    {
        ?>
		</div>
		<div class="applixir-settings-section">

            <div class="applixir-section-title-container">
                <h2>Step-1: </h2>
		        <p class="applixir-admin-description">If you haven’t signed up to an AppLixir account, please sign up at <a href="http://www.applixir.com" target="_blank">www.applixir.com</a>, add a WordPress site and obtain your IDs</p>

            </div>
            

		<?php
    }


    public function advance_setting_section_callback()
    {
        ?>
        <p><i>Please note for testing purposes only, you can put 36 on Acct ID, 2050 on Game ID and 2050 on Zone ID)</i></p>
		</div>

		<div class="applixir-settings-section applixir-section-no-top-padding">
            <div class="applixir-section-title-container">
                <h2>Step-2: </h2>
                <p class="applixir-admin-description"><strong>Message Box:</strong> Please type below in the box what your readers should see before clicking the Watch button. Example - Watch this Short Video Ad to continue reading.</p>
            </div>
            

		<?php
    }

    public function watch_add_setting_section_callback()
    {
        ?>
		</div>
        
		<div class="applixir-settings-section applixir-section-no-top-padding">
            <div class="applixir-section-title-container">
                <h2>Step-3: </h2>
		        <p class="applixir-admin-description">Customize the "Watch Ad" button below.</p>
            </div>
            

		<?php
    }


    public function usage_guide_section_callback()
    {
        $applixir_settings = get_option('applixir_settings');
        $button_background_color = isset($applixir_settings[ 'background_color' ]) ? $applixir_settings[ 'background_color' ] : '#fff';
        $button_font_color = isset($applixir_settings[ 'font_color' ]) ? $applixir_settings[ 'font_color' ] : '#000';
        $button_font_size = isset($applixir_settings[ 'font_size' ]) ? $applixir_settings[ 'font_size' ] : '16';
        $button_font_size .= 'px';
        // $button_font_color = get_option( 'applixir_settings', '#000' );

        // var_dump( $button_background_color, $button_font_color );
        // die;

        echo '<style>
		#applixir-ad-btn{
			padding: 10px 30px;
			background: '.$button_background_color.';
			color: '.$button_font_color.';
            font-size: '.$button_font_size.';
		}

		</style>';
        echo '<button id="applixir-ad-btn" class="applixir-ad-btn"> Watch Ad</button>';
        echo '<div class="applixir-section-title-container applixir-last-step-container">';
        echo '<h2>Step-4: </h2>';
        echo '<p class="applixir-admin-description">Copy our Ads.txt file and update your Ads.txt file.</p>';
        echo '</div>';

        echo '<div class="applixir-usage-guide-section">';
        echo "Once you are all setup with the AppLixir, everytime you want to put a Reward Video Ad Insertion, Just insert [insert-AppLixir] and that should work fine.";

        echo ' <p><a target="_blank" href="https://cdn.applixir.com/ads.txt">Ads Text File link</a></p>';
        echo '</div>';
        echo '</div>';
    }

    public function settings_field($args)
    {
        $options = get_option('applixir_settings');
        $name = $args['field'];
        $type = isset($args['type']) ? $args['type'] : 'text';
        $value = ! empty($options[$name]) ? $options[$name] : '';
        $class="regular-text";

        if ($name === 'background_color' || $name === 'font_color'||$name === 'message_background_color' || $name === 'message_font_color') {
            $class .= " applixir_color_picker applixir_" . $name;
        }



        if ($name === 'video_frequency') {
            $class="small-text";
        }

        $description = $this->get_description($name);
        if ($name ==='video_placement') {
            // Render the output
            echo '<select  class="'.$class.'" id="' . $name . '" name="applixir_settings[' . $name . ']">
		<option '.selected($value, "above", false).' value="above">Above</option>
		<option '.selected($value, "mid", false).' value="mid">Mid</option>
		<option '.selected($value, "below", false).' value="below">Below</option>

		</select>';
        } elseif ($name === 'font_size' || $name === 'message_font_size') {
            $class .= " applixir_" . $name;
            $class .= " applixir_number_field";

            echo '<input type="number" class="'.$class.'" id="' . $name . '" name="applixir_settings[' . $name . ']" value="' . $value . '" />';
            echo ' px';
        } else {
            echo '<input type="' . $type . '" class="'.$class.'" id="' . $name . '" name="applixir_settings[' . $name . ']" value="' . $value . '" />';
            if ($name ==='video_frequency') {
                echo ' Day';
            }
        }

        echo '<p style="font-style:italic;font-size:12px;color: #949090;">'.$description.'</p>';
    }


    public function get_description($name)
    {
        $desc= array(
            'dev_id'=>'',
            'zone_id'=>'',
            'wp_id'=>'',
            'message_before_video'=>'',
            'video_placement'=>'',
            'font_color'=>'',
            'font_size'=>'',
            'background_color'=>'',
            'message_font_color'=>'',
            'message_font_size'=>'',
            'message_background_color'=>'',
            'video_frequency'=>'set 0 for everytime ',

        );

        return $desc[$name];
    }
}

new Applixir_Admin_Settings();
