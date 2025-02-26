<?php

/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */

if (!class_exists('admin_folder_Redux_Framework_config')) {

    class admin_folder_Redux_Framework_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
          //  $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();
            
            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            add_action( 'redux/loaded', array( $this, 'remove_demo' ) );
            
            // Function to test the compiler hook and demo CSS output.
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2);
            
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            
            // Dynamically add a section. Can be also used to modify sections/fields
            //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field	set with compiler=>true is changed.

         * */
        function compiler_action($options, $css) {
            //echo '<h1>The compiler hook has run!';
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
        }

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'coming-soon'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'coming-soon'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
           // $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
           // $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns_path   = CONTRIX_CSP_PLUGIN_PATH . '/themes/default/images/thumbnail/';
        	$sample_patterns_url    = CONTRIX_CSP_PLUGIN_URL . '/themes/default/images/thumbnail/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

         //   $class          = $screenshot ? 'has-screenshot' : '';

         //   $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'coming-soon'), $this->theme->display('Name'));
            
            ?>
            

                <h4>WebGL based 3D Coming Soon Page </h4>

                <div>
                    <ul class="plugin-info">
                        <li><?php printf(__('By %s', 'coming-soon'), 'Contrixlab, Inc') ?></li>
                        <li><?php printf(__('Version %s', 'coming-soon'), '1.1') ?></li>
                      
                    </ul>
                    

                </div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

         //   $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
           //     $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }

            // ACTUAL DECLARATION OF SECTIONS
            $this->sections[] = array(
                'title'     => __('General Settings', 'coming-soon'),
                'desc'      => __('Coming soon page is the right tool to get your visitor attention and convincing them of a website development by keeping them hooked via email notifications, social networks etc.', 'coming-soon'),
                'icon'      => 'el-icon-cogs',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
			       array(
                        'id'        => 'status',
                        'type'      => 'switch',
                        'title'     => __('Status', 'coming-soon'),
                        'subtitle'  => __('When you are logged in you\'ll see the normal website. Logged out visitors will see the Coming Soon page', 'coming-soon'),
                        'default'   => true,
                    	'on'        => __('Enable','coming-soon'),
                    	'off'       => __('Disable','coming-soon'),
                    ),
                	array(
                		'id'        => 'logo',
                		'type'      => 'media',
                		'url'       => true,
                		'title'     => __('Logo', 'coming-soon'),
                		'compiler'  => 'true',
                		//'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                		// 'desc'      => __('Basic media uploader with disabled URL input field.', 'coming-soon'),
                		'subtitle'  => __('Upload your logo if you have', 'coming-soon'),
                		'default'   => array('url' => ''),
                		//'hint'      => array(
                		//    'title'     => 'Hint Title',
                		//    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                		//)
                	),
                	array(
                		'id'                => 'headline',
                		'type'              => 'text',
                		'title'             => __('Headline', 'coming-soon'),
                		'subtitle'          => __('Brand name, company name and so on ', 'coming-soon'),
                		//'desc'              => __('This is the description field, again good for additional info.', 'coming-soon'),
                		'validate' => 'no_html',
                		'default'           => ''
                	),
                	array(
                		'id'        => 'description',
                		'type'      => 'editor',
                		'title'     => __('Description', 'coming-soon'),
                		'subtitle'  => __('Tell someting more about your site', 'coming-soon'),
                		'default'   => '',
                	),
                	array(
                		'id'        => 'theme',
                		'type'      => 'select_image',
                		'title'     => __('Select Theme', 'coming-soon'),
                		'subtitle'  => __('You can select a theme of defaults 3D themes', 'coming-soon'),
                		'options'   => $sample_patterns,
                		// Alternatively
                		//'options'   => Array(
                		//                'img_name' => 'img_path'
                		//             )
                		'default' => 'Park2.png',
                	),
                	array(
                		'id'        => 'social_check',
                		'type'      => 'checkbox',
                		'title'     => __('Social', 'coming-soon'),
                		'subtitle'  => __('Select social network icons which want to embed', 'coming-soon'),
                		//'desc'      => __('This is the description field, again good for additional info.', 'contrix-coming-soon'),
                		
                		//Must provide key => value pairs for multi checkbox options
                		'options'   => array(
                				'twitter' => 'Twitter',
                				'facebook' => 'Facebook',
                				'google' => 'Google Plus'
                		),
                		
                		//See how std has changed? you also don't need to specify opts that are 0.
                		'default'   => array(
                				'twitter' => '0',
                				'facebook' => '0',
                				'google' => '0'
                		)
                	),
                	array(
                		'id'        => 'social_on',
                		'type'      => 'switch',
                		'title'     => __('Display The Share Buttons', 'coming-soon'),
                		'subtitle'  => __('Enable/disable social share buttons', 'coming-soon'),
                		'default'   => true,
                		'on'        => __('Show','coming-soon'),
                		'off'       => __('Hide','coming-soon'),
                	),
                	
                    array(
                        'id'        => 'countdown_on',
                        'type'      => 'switch',
                        'title'     => __('Display Countdown', 'coming-soon'),
                        'subtitle'  => __('Set the opening date if you have fixed it', 'coming-soon'),
                        'default'   => 0,
                        'on'        => __('Show','coming-soon'),
                		'off'       => __('Hide','coming-soon'),
                    ),
                	array(
                		'id'        => 'enddate',
                		'type'      => 'date',
                		'required'  => array('countdown_on', '=', '1'),
                		'title'     => __('End Date', 'coming-soon'),
                		'subtitle'  => __('Opening date', 'coming-soon'),
                		//'desc'      => __('This is the description field, again good for additional info.', 'coming-soon')
                	),
                	array(
                		'id'        => 'endhour',
                		'type'      => 'select',
                		'required'  => array('countdown_on', '=', '1'),
                		'title'     => __('End Hour', 'coming-soon'),
                		'subtitle'  => __('Opening hour of the date', 'coming-soon'),
                		//'desc'      => __('This is the description field, again good for additional info.', 'coming-soon'),
                		
                		//Must provide key => value pairs for select options
                		'options'   => array(
                				'00' => '00',
                				'01' => '01',
                				'02' => '02',
                				'03' => '03',
                				'04' => '04',
                				'05' => '05',
                				'06' => '06',
                				'07' => '07',
                				'08' => '08',
                				'09' => '09',
                				'10' => '10',
                				'11' => '11',
                				'12' => '12',
                				'13' => '13',
                				'14' => '14',
                				'15' => '15',
                				'16' => '16',
                				'17' => '17',
                				'18' => '18',
                				'19' => '19',
                				'20' => '20',
                				'21' => '21',
                				'22' => '22',
                				'23' => '23'
                				
                		),
                		'default'   => '1'
                	),
                	array(
                		'id'        => 'endminute',
                		'type'      => 'select',
                		'required'  => array('countdown_on', '=', '1'),
                		'title'     => __('End Minute', 'coming-soon'),
                		'subtitle'  => __('Opening minute of the date', 'coming-soon'),
                	//	'desc'      => __('This is the description field, again good for additional info.', 'coming-soon'),
                		
                		//Must provide key => value pairs for select options
                		'options'   => array(
                				'00' => '00',
                				'01' => '01',
                				'02' => '02',
                				'03' => '03',
                				'04' => '04',
                				'05' => '05',
                				'06' => '06',
                				'07' => '07',
                				'08' => '08',
                				'09' => '09',
                				'10' => '10',
                				'11' => '11',
                				'12' => '12',
                				'13' => '13',
                				'14' => '14',
                				'15' => '15',
                				'16' => '16',
                				'17' => '17',
                				'18' => '18',
                				'19' => '19',
                				'20' => '20',
                				'21' => '21',
                				'22' => '22',
                				'23' => '23',
                				'24' => '24',
                				'25' => '25',
                				'26' => '26',
                				'27' => '27',
                				'28' => '28',
                				'29' => '29',
                				'30' => '30',
                				'31' => '31',
                				'32' => '32',
                				'33' => '33',
                				'34' => '34',
                				'35' => '35',
                				'36' => '36',
                				'37' => '37',
                				'38' => '38',
                				'39' => '39',
                				'40' => '40',
                				'41' => '41',
                				'42' => '42',
                				'43' => '43',
                				'44' => '44',
                				'45' => '45',
                				'46' => '46',
                				'47' => '47',
                				'48' => '48',
                				'49' => '49',
                				'50' => '50',
                				'51' => '51',
                				'52' => '52',
                				'53' => '53',
                				'54' => '54',
                				'55' => '55',
                				'56' => '56',
                				'57' => '57',
                				'58' => '58',
                				'59' => '59'
                		
                		),
                		'default'   => '1'
                	),
                ),
            );

            $this->sections[] = array(
                'type' => 'divide',
            );

            
            $theme_info  = '<div class="redux-framework-section-desc">';
            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', 'coming-soon') . '<a href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __('<strong>Author:</strong> ', 'coming-soon') . $this->theme->get('Author') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __('<strong>Version:</strong> ', 'coming-soon') . $this->theme->get('Version') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';
            $tabs = $this->theme->get('Tags');
            if (!empty($tabs)) {
                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', 'coming-soon') . implode(', ', $tabs) . '</p>';
            }
            $theme_info .= '</div>';

            if (file_exists(dirname(__FILE__) . '/../README.md')) {
                $this->sections['theme_docs'] = array(
                    'icon'      => 'el-icon-list-alt',
                    'title'     => __('Documentation', 'coming-soon'),
                    'fields'    => array(
                        array(
                            'id'        => '17',
                            'type'      => 'raw',
                            'markdown'  => true,
                            'content'   => file_get_contents(dirname(__FILE__) . '/../README.md')
                        ),
                    ),
                );
            }
            

            $this->sections[] = array(
                'icon'      => 'el-icon-info-sign',
                'title'     => __('Plugin Information', 'coming-soon'),
              //  'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'coming-soon'),
                'fields'    => array(
                    array(
                        'id'        => 'opt-raw-info',
                        'type'      => 'raw',
                        'content'   => $item_info,
                    )
                ),
            );

            if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon'      => 'el-icon-book',
                    'title'     => __('Documentation', 'coming-soon'),
                    'content'   => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
                );
            }
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Information 1', 'coming-soon'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'coming-soon')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => __('Theme Information 2', 'coming-soon'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'coming-soon')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'coming-soon');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.
            $display_name = __('3D coming soon page by ContrixLab','coming-soon');
            $menu_title = __('3D Comning Soon Options','coming-soon');
            $this->args = array(
                'opt_name' => 'contrix_csp',
                'display_name' => $display_name,
                'display_version' => $theme->get('Version'),
                'page_slug' => 'contrix_csp_options',
                'page_title' => 'Contrix Coming Soon Page Options',
                'update_notice' => true,
               /* 'intro_text' => '<p>This text is displayed above the options panel. It isn\\’t required, but more info is always better! The intro_text field accepts all HTML.</p>’',
                'footer_text' => '<p>This text is displayed below the options panel. It isn\\’t required, but more info is always better! The footer_text field accepts all HTML.</p>',*/
                'admin_bar' => false,
                'menu_type' => 'menu',
                'menu_title' => $menu_title,
                'allow_sub_menu' => true,
                'page_parent_post_type' => 'your_post_type',
                'customizer' => true,
                'default_mark' => '*',
                'hints' => 
                array(
                  'icon' => 'el-icon-question-sign',
                  'icon_position' => 'right',
                  'icon_size' => 'normal',
                  'tip_style' => 
                  array(
                    'color' => 'light',
                  ),
                  'tip_position' => 
                  array(
                    'my' => 'top left',
                    'at' => 'bottom right',
                  ),
                  'tip_effect' => 
                  array(
                    'show' => 
                    array(
                      'duration' => '500',
                      'event' => 'mouseover',
                    ),
                    'hide' => 
                    array(
                      'duration' => '500',
                      'event' => 'mouseleave unfocus',
                    ),
                  ),
                ),
                'output' => true,
                'output_tag' => true,
                'compiler' => true,
                'page_icon' => 'icon-themes',
                'page_permissions' => 'manage_options',
                'save_defaults' => true,
                'show_import_export' => false,
                'transient_time' => '3600',
                'network_sites' => true,
              );

            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
                'title' => 'Visit us on GitHub',
                'icon'  => 'el-icon-github'
                //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://twitter.com/reduxframework',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://www.linkedin.com/company/redux-framework',
                'title' => 'Find us on LinkedIn',
                'icon'  => 'el-icon-linkedin'
            );

        }

    }
    
    global $reduxConfig;
    $reduxConfig = new admin_folder_Redux_Framework_config();
}

/**
  Custom function for the callback referenced above
 */
if (!function_exists('admin_folder_my_custom_field')):
    function admin_folder_my_custom_field($field, $value) {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
endif;

/**
  Custom function for the callback validation referenced above
 * */
if (!function_exists('admin_folder_validate_callback_function')):
    function admin_folder_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';

        /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }
endif;
