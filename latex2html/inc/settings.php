<?php
defined('ABSPATH') or exit;

if(!interface_exists('l2h_settings_interface')) {
    interface l2h_settings_interface
    {
        public function l2h_admin_menu();
        public function l2h_admin_page();
        public function l2h_admin_init();
    }
}

if(!interface_exists('l2h_render_interface')) {
    interface l2h_render_interface
    {
        public function l2h_checkbox_render($args);
        public function l2h_text_render($args);
        public function l2h_textarea_render($args);
    }
}

if(!class_exists('l2h_render_base_class')) {
    class l2h_render_base_class implements l2h_render_interface
    {
        public function l2h_checkbox_render($args)
        {
            echo "<input type='checkbox' name='" . esc_attr($args['ops']) . "[" . esc_attr($args['field']) . "]' id='" . esc_attr($args['field']) . "' ";
            echo checked($args['val'], true) . "value='1' />";
            echo "<label for='" . esc_attr($args['field']) . "'>" . esc_html($args['inst']). "</label>";
        }

        public function l2h_text_render($args)
        {
            echo "<input type='text' name='" . esc_attr($args['ops']) . "[" . esc_attr($args['field']) . "]' id='" .esc_attr($args['field']). "' size='80' value='" . esc_url($args['val']) . "' placeholder='" . esc_url($args['inst']) . "'/>";
        }

        public function l2h_textarea_render($args)
        {
            echo "<textarea name='" . esc_attr($args['ops']) . "[" . esc_attr($args['field']) . "]' id='" .esc_attr($args['field']). "' cols='80' rows='8' placeholder='" . esc_textarea($args['inst']) . "'>" . esc_textarea($args['val']) . "</textarea>";
        }
    }
}

if(!class_exists('l2h_render_class')) {
    class l2h_render_class extends l2h_render_base_class
    {
        public function l2h_disabled_text_render($args)
        {
            echo "<input style='color:black' type='text' size='10' disabled='disabled' value='" . esc_textarea($args['val']) . "' />";
            echo "<input type='hidden' name='" . esc_attr($args['ops']) . "[" .esc_attr($args['field']) . "]' value='" . esc_textarea($args['val']) . "'>";
        }

        public function l2h_bibtex_textarea_render($args)
        {
            echo "<textarea style='font-family:Consolas, monospace;' name='" . esc_attr($args['ops']) . "[" . esc_attr($args['field']) . "]' id='" .esc_attr($args['field']). "' cols='80' rows='15' placeholder='" . esc_textarea($args['inst']) . "'>" . esc_textarea($args['val']) . "</textarea>";
        }
    }
}

if(!class_exists('l2h_settings_class')) {
    class l2h_settings_class extends l2h_render_class implements l2h_settings_interface
    {
        private $options;
        private $upgrade_options;
        private $active_tab;
        private $action = 'bibtex';

        public function __construct()
        {
            add_action('admin_menu', [ $this, 'l2h_admin_menu' ]);
            add_action('admin_init', [ $this, 'l2h_admin_init' ]);
              // for bibtex: custom action page
            add_action('admin_post_bibtex', [ $this, 'l2h_admin_post' ]);
        }

        public function l2h_admin_menu()
        {
            add_options_page(
                'LaTeX2HTML settings page',  // Title
                'LaTex2HTML'              ,  // Name
                'manage_options',
                'latex2html',  // url
                [
                  $this, 'l2h_admin_page',  // function
                ]
            );
        }

        public function l2h_admin_page() {
            if (!current_user_can('manage_options')) {
                wp_die(esc_html__('You do not have the sufficient permissions to access this page.', 'latex2html'));
            }
        
            // Generate a nonce for the settings page
            $nonce = wp_create_nonce('l2h_admin_nonce_action');
            $this->options = get_option('l2h_options');
        
            // Build the URL with the nonce parameter
            $settings_page_url = add_query_arg('nonce', $nonce, admin_url('options-general.php?page=latex2html'));
        
            // Pass the nonce and settings page URL to the settings page
            require_once(dirname(__FILE__) . '/settings_page.php');
        }
        

        public function l2h_admin_post()
        {
                // Check nonce and ensure it's properly unslashed and verified
              if ( isset( $_POST['bibtex_nonce'] ) ) {
                  // Sanitize the nonce input
                $nonce = sanitize_text_field( wp_unslash( $_POST['bibtex_nonce'] ) );
            
                if ( wp_verify_nonce( $nonce, 'bibtex' ) ) {                
                    // Unsplash and sanitize the Bibtex items input
                    $rawdata = isset( $_POST['l2h_bibtex_options']['bibitems'] ) ? sanitize_textarea_field( wp_unslash( $_POST['l2h_bibtex_options']['bibitems'] ) ) : '';

                    // Parse the bibtex data
                    $bibkeysinfo = l2h_bibtex_class::l2h_bibtex_parser( $rawdata );

                    // Unsplash and sanitize the referer URL
                    $redirect_url = '';
                    if ( isset( $_SERVER['HTTP_REFERER'] ) ) {
                        // Sanitize and process the HTTP_REFERER
                        $referer = sanitize_text_field( wp_unslash( $_SERVER['HTTP_REFERER'] ) );
                        $redirect_url = esc_url_raw( urldecode( $referer ) );
                    }
                    // Add the parsed bibkeysinfo as query arguments
                    if ( $redirect_url ) {
                        $redirect = add_query_arg( $bibkeysinfo, $redirect_url );
                        wp_safe_redirect( $redirect );
                        exit();
                    } else {
                        wp_die( esc_html__( 'Invalid redirect URL.', 'latex2html' ) );
                    }
                }
            } else {
                    wp_die( esc_html__( 'Invalid nonce.', 'latex2html' ) );
            }
        }

        

        public function l2h_admin_init()
        {
              /**
             * register_setting( $option_group, $option_name, $sanitize_callback );
             *  $options_group should match the settings_fields($options_group)
             * add_settings_section( $id, $title, $callback, $page );
             * add_settings_field( $id, $title, $callback, $page, $section, $args );
             *  The above $id should match do_settings_sections( $id );
             */

              /**
             * Welcome tab
             */
            register_setting(
                'l2h_upgrade_group',
                'l2h_upgrade_options'
            );
            $this->upgrade_options = get_option('l2h_upgrade_options');
            $ver                   = get_option('l2h_upgrade_options')['VER'];
            $verstr                = self::l2h_upgrade_vernum($ver, null, true);
            add_settings_section(
                'l2h_section_upgrade',
                __('Upgrade notes', 'latex2html') . "<hr />",
                [ $this, 'l2h_upgrade_callback' ],
                'l2h_upgrade_page'
            );
            add_settings_section(
                'l2h_section_verinfo',
                __('Version information', 'latex2html') . "<hr />",
                null,
                'l2h_upgrade_page'
            );

            add_settings_field(
                'VER',
                __('Current version', 'latex2html') . ": ",
                [ $this, 'l2h_disabled_text_render' ],
                'l2h_upgrade_page',
                'l2h_section_verinfo',
                [
                'ops'   => 'l2h_upgrade_options',
                'field' => 'VER',
                'val'   => $this->upgrade_options['VER']
        ]
            );

            add_settings_field(
                'devVER',
                __('Newest version', 'latex2html') . ": ",
                [ $this, 'l2h_disabled_text_render' ],
                'l2h_upgrade_page',
                'l2h_section_verinfo',
                [
                'ops'   => 'l2h_upgrade_options',
                'field' => 'devVER',
                'val'   => l2h_main_class::l2hVER
        ]
            );

            add_settings_field(
                'dbVER',
                __('Current DB version', 'latex2html') . ": ",
                [ $this, 'l2h_disabled_text_render' ],
                'l2h_upgrade_page',
                'l2h_section_verinfo',
                [
                'ops'   => 'l2h_upgrade_options',
                'field' => 'dbVER',
                'val'   => $this->upgrade_options['dbVER']
        ]
            );

            add_settings_field(
                'devdbVER',
                __('Newest DB version', 'latex2html') . ": ",
                [ $this, 'l2h_disabled_text_render' ],
                'l2h_upgrade_page',
                'l2h_section_verinfo',
                [
                'ops'   => 'l2h_upgrade_options',
                'field' => 'devdbVER',
                'val'   => l2h_main_class::l2hdbVER
        ]
            );

            add_settings_field(
                'devdbVER',
                __('Last Update Date', 'latex2html') . ": ",
                [ $this, 'l2h_disabled_text_render' ],
                'l2h_upgrade_page',
                'l2h_section_verinfo',
                [
                'ops'   => 'l2h_upgrade_options',
                'field' => 'devdbVER',
                'val'   => l2h_main_class::l2hlud
        ]
            );
              /**
             * Settings tab
             */
            $this->options = get_option('l2h_options');
            register_setting(
                'l2h_setting_group',
                'l2h_options'
            );
              // General settings
            add_settings_section(
                'l2h_section_general',
                __('General settings', 'latex2html') . "<hr />",
                null,
                'l2h_setting_page'
            );
            add_settings_field(
                'enall',
                __('English as default language', 'latex2html') . "?",
                [ $this, 'l2h_checkbox_render' ],
                'l2h_setting_page',
                'l2h_section_general',
                [
                'ops'   => 'l2h_options',
                'field' => 'enall',
                'val'   => l2h_default_options_class::l2h_set_default_options('l2h_options', 'enall', ''),
                'inst'  => __('Enable to ignore the translations', 'latex2html')
        ]
            );
            add_settings_field(
                'single',
                __('Speed up on homepage', 'latex2html') . "?",
                [ $this, 'l2h_checkbox_render' ],
                'l2h_setting_page',
                'l2h_section_general',
                [
                'ops'   => 'l2h_options',
                'field' => 'single',
                'val'   => l2h_default_options_class::l2h_set_default_options('l2h_options', 'single', ''),
                'inst'  => __('Enable to load MathJax only on pages of single type', 'latex2html')
        ]
            );
              // MathJax settings
            add_settings_section(
                'l2h_section_mathjax',
                __('MathJax settings', 'latex2html') . '<hr />',
                null,
                'l2h_setting_page'
            );
            add_settings_field(
                'mathjax_cdn',
                  // translators: %s is replaced with a link to the MathJax CDN documentation.
                sprintf(esc_html__('MathJax %s', 'latex2html') . ": ", '<a target="_blank" href="http://docs.mathjax.org/en/latest/start.html#using-the-mathjax-content-delivery-network-cdn">CDN</a>'),
                [ $this, 'l2h_text_render' ],
                'l2h_setting_page',
                'l2h_section_mathjax',
                [
                'ops'   => 'l2h_options',
                'field' => 'mathjax_cdn',
                'val'   => trim(l2h_default_options_class::l2h_set_default_options('l2h_options', 'mathjax_cdn', l2h_default_options_class::$mathjax_cdn)),
                'inst'  => trim(l2h_default_options_class::l2h_set_default_options('l2h_options', 'mathjax_cdn', l2h_default_options_class::$mathjax_cdn)),
        ]
            );
            add_settings_field(
                'mathjax_config',
                  // translators: %s is replaced with a link to the MathJax configuration documentation.
                sprintf(esc_html__('MathJax %s', 'latex2html'), '<a target="_blank" href="http://docs.mathjax.org/en/latest/configuration.html#using-in-line-configuration-options">configuration</a>:'),
                [ $this, 'l2h_textarea_render' ],
                'l2h_setting_page',
                'l2h_section_mathjax',
                [
                'ops'   => 'l2h_options',
                'field' => 'mathjax_config',
                'val'   => l2h_default_options_class::l2h_set_default_options('l2h_options', 'mathjax_config', l2h_default_options_class::$mathjax_config),
                'inst'  => 'MathJax.Hub.Config({...'                                                                                                         //}
        ]
            );

              // Latex settings
            add_settings_section(
                'l2h_section_latex',
                __('LaTeX settings', 'latex2html') . "<hr />",
                null,
                'l2h_setting_page'
            );
            add_settings_field(
                'latex_cmd',
                __('LaTeX preamble', 'latex2html') . ': ',
                [ $this, 'l2h_textarea_render' ],
                'l2h_setting_page',
                'l2h_section_latex',
                [
                'ops'   => 'l2h_options',
                'field' => 'latex_cmd',
                'val'   => trim(l2h_default_options_class::l2h_set_default_options('l2h_options', 'latex_cmd', l2h_default_options_class::$latex_cmd)),
                'inst'  => 'The newcommands defined by user'
        ]
            );
            add_settings_field(
                'latex_style',
                __('LaTeX styles', 'latex2html') . ': ',
                [ $this, 'l2h_textarea_render' ],
                'l2h_setting_page',
                'l2h_section_latex',
                [
                'ops'   => 'l2h_options',
                'field' => 'latex_style',
                'val'   => trim(l2h_default_options_class::l2h_set_default_options('l2h_options', 'latex_style', l2h_default_options_class::$latex_style)),

                'inst' => 'The css for LaTeX2HTML render'
        ]
            );

              // Bibtex
            add_settings_section(
                'l2h_section_bibtex',
                __('BibTeX data', 'latex2html') . "<hr />",
                [ $this, 'l2h_bibtex_callback' ],
                'l2h_bibtex_page'
            );
            add_settings_field(
                'bibitems',
                __('BibTeX items', 'latex2html') . ': ',
                [ $this, 'l2h_bibtex_textarea_render' ],
                'l2h_bibtex_page',
                'l2h_section_bibtex',
                [
                'ops'   => 'l2h_bibtex_options',
                'field' => 'bibitems',
                'val'   => l2h_default_options_class::$bibdata_examp,
                'inst'  => 'The stantdard BibTeX data: @article/@book{...'  //}
        ]
            );

            add_settings_field(
                'biborgdata',
                __('BibTeX Original Data', 'latex2html') . ': ',
                function () {
                    echo '<p>bibtex.bib.txt <a href="' . esc_url(wp_upload_dir()['baseurl'] . '/bibtex.bib.txt'). '">' . esc_html__('Preview', 'latex2html') . '</a></p>';
                },
                'l2h_bibtex_page',
                'l2h_section_bibtex',
                []
            );

            add_settings_field(
                'bibbackups',
                __('BibTeX Backups', 'latex2html') . ': ',
                function () {
                    $bib_dir = wp_upload_dir()['basedir'];
                    echo "<p>" . esc_html__('Note that the backups will be deleted when deactive or uninstall', 'latex2html') . ".</p>";
                    echo "<ol>";
                    foreach(glob($bib_dir . '/bibtex_backup_*.txt') as $fname) {
                        echo '<li>' . esc_html(basename($fname)) . ' <a href="' . esc_url(wp_upload_dir()['baseurl'] . '/' . esc_html(basename($fname))). '">' . esc_html__('Preview', 'latex2html') . '</a></li>';
                    }
                    echo "</ol>";
                },
                'l2h_bibtex_page',
                'l2h_section_bibtex',
                []
            );

              // The Support and Credit
            add_settings_section(
                'l2h_section_support',
                __('Support &amp Credits', 'latex2html') . "<hr />",
                [ $this, 'l2h_support_callback' ],
                'l2h_support_page'
            );

              // The Manual
            add_settings_section(
                'l2h_section_manual',
                __('The User\'s Manual', 'latex2html') . "<hr />",
                [ $this, 'l2h_manual_callback' ],
                'l2h_manual_page'
            );
        }

          /**
         * The upgrade_ver_num function
         */
        public static function l2h_upgrade_vernum($ver, $type = null, $string = false)
        {
            $ver_array = explode('.', $ver);
            if($string) {
                  //means we return the version string (without dots)
                return implode('', $ver_array);
            } else {
                switch ($type) {
                    case 'main': 
                        $ver_array = [ ++$ver_array[0], 0, 0];
                        break;

                    case 'sub': 
                        $ver_array = [$ver_array[0], ++$ver_array[1], 0];
                        break;
                    default: 
                        $ver_array[2] += 1;
                }
                return implode('.', $ver_array);
            }
        }

          /**
         * The Callbacks
         */

          // Continuous upgrade of settings and database
        public function l2h_upgrade_callback()
        {
              // Continuous upgrade of Settings
            $upgrade_options = get_option('l2h_upgrade_options');
            if(version_compare(get_option('l2h_upgrade_options')['VER'], l2h_main_class::l2hVER) < 0) {
                $ver    = get_option('l2h_upgrade_options')['VER'];
                $verstr = self::l2h_upgrade_vernum($ver, null, true);
                $fun    = 'l2h_upgradefrom_' . $verstr . '_callback';
                if(method_exists($this, $fun)) {
                    self::$fun();
                } else {
                      //echo __( 'There are some error happens, please have a fresh new install. Hint: I can\'t find the version information.', 'latex2html' );
                      // update the version number
                    $upgrade_options = get_option('l2h_upgrade_options');
                      //            $upgrade_options['upgrade_confirm'] = false;
                    $upgrade_options['VER'] = l2h_main_class::l2hVER;
                    update_option('l2h_upgrade_options', $upgrade_options);
                }
            } else {
                  /*$verstr = self::l2h_upgrade_vernum( l2h_main_class::l2hVER, null, true );
                $fun = 'l2h_upgradefrom_' . $verstr . '_callback';
                self::$fun();*/
                echo esc_html__('Congratulations! You are on the newest version!', 'latex2html'). '<br />';
            }
              // Continuous upgrade of database: the upgrade function is defiend in inc/db.inc.php
            if(version_compare(get_option('l2h_upgrade_options')['dbVER'], l2h_main_class::l2hdbVER) < 0) {
                $ver    = get_option('l2h_upgrade_options')['dbVER'];
                $verstr = self::l2h_upgrade_vernum($ver, null, true);
                $fun    = 'l2h_db_upgradefrom_' . $verstr . '_callback';
                if(method_exists('l2h_db_class', $fun)) {
                    l2h_db_class::$fun();
                } else {
                    echo esc_html__('There are some error happens, please have a fresh new install. Hint: I can\'t find the database version information.', 'latex2html');
                }
            } else {
                  /*$verstr = self::l2h_upgrade_vernum( l2h_main_class::l2hdbVER, null, true );
                $fun = 'l2h_db_upgradefrom_' . $verstr . '_callback';
                l2h_db_class::$fun();

                echo __( 'The database is updated!', 'latex2html' ). '<br />';
                 */
            }
        }

        public function l2h_bibtex_callback()
        {
              // translators: %s is replaced with a link to the AMS MathSciNet MR Lookup service.
            echo sprintf("<p>" . esc_html__("The standard BibTeX data can be obtained from %s or google scholar.", 'latex2html') . "</p>", "<a href='http://www.ams.org/mrlookup'>mrlookup</a>");
        }

        public static function l2h_support_collapse_item($id, $label, $content, $style = '', $pre_flag = false)
        {
            echo "\n<input class='toggle-box' id='wrd_" . esc_attr($id) . "' type='checkbox' />";
            echo "<label for='wrd_" . esc_attr($id) . "'> <h4>" . esc_html($label) . "</h4> </label>";
            echo "\t<div class='pre-collapse'  style='" . esc_attr($style) . "'>";
            if ($pre_flag) {
                // Output raw HTML in <pre> tag
                echo "\t\t<pre id='latex_" . esc_attr($id) . "'>" . wp_kses_post($content) . "\t\t</pre>";
            } else {
                // Output raw HTML in <p> tag
                echo "\t\t<p id='latex_" . esc_attr($id) . "'>" . wp_kses_post($content) . "</p>";
            }
            echo "\t</div>";
        }

        public function l2h_support_callback()
        {
              // translators: %s is replaced with a link to the BibtexParser GitHub repository.
            echo "<p>" . sprintf(esc_html__('The core code of BibTeX is based on the %s with some improvement. ', 'latex2html'), '<a target="_blank" href="https://github.com/audiolabs/bibtexparser/blob/master/src/AudioLabs/BibtexParser/BibtexParser.php">BibtexParser</a>');
              // translators: %s is replaced with a link to the MathJax website.
            echo  sprintf(esc_html__('The processing of mathematical formula is completely depending on %s. ', 'latex2html'), '<a target="_blank" href="https://www.mathjax.org/">MathJax</a>');
              // translators: %s is replaced with a link to Eoin Gallagher's jQuery script page.
            echo sprintf(esc_html__('The click to select jQuery is due to %s', 'latex2html'), '<a href="https://magp.ie/2010/04/07/auto-highlight-text-inside-pre-tags-using-jquery/">Eoin Gallagher</a>. ') . "</p>";
            echo "<h3>" . sprintf(esc_html__('FAQ', 'latex2html')) . "</h3>";
            echo "<div id='faq'>";
            $latextemp  = "\\documentclass[12pt, reqno, hyperref]{amsart}\n";
            $latextemp .= "\\usepackage[margin=1in, includeheadfoot]{geometry}\n";
            $latextemp .= "\\usepackage{palatino}\n";
            $latextemp .= "\\usepackage{hyperref}\n";
            $latextemp .= "\\usepackage[backrefs, msc-links, lite, abbrev, alphabetic]{amsrefs}\n\n";
            
            $latextemp .= "\\newtheorem{thm}{Theorem}\n";
            $latextemp .= "\\newtheorem{lem}[thm]{Lemma}\n";
            $latextemp .= "\\newtheorem{prop}[thm]{Proposition}\n";
            $latextemp .= "\\newtheorem{cor}[thm]{Corollary}\n";
            $latextemp .= "\\newtheorem{claim}{Claim}\n";
            $latextemp .= "\\theoremstyle{definition}\n";
            $latextemp .= "\\newtheorem{defn}[thm]{Definition}\n";
            $latextemp .= "\\newtheorem{examp}{Example}\n";
            $latextemp .= "\\newtheorem{excs}[examp]{Exercise}\n";
            $latextemp .= "\\theoremstyle{remark}\n";
            $latextemp .= "\\newtheorem{rmk}[thm]{Remark}\n";
            $latextemp .= "\\newtheorem{answer}{Answer}\n";
            $latextemp .= "\\renewcommand{\\theanswer}{\\arabic{examp}.\\arabic{answer}}\n\n";
            
            $latextemp .= "\\newcounter{stepnum}\n";
            $latextemp .= "\\newcommand{\\step}[1]{%\n";
            $latextemp .= "\\par\n";
            $latextemp .= "\\refstepcounter{stepnum}%\n";
            $latextemp .= "\\textbf{Step \\arabic{stepnum}}.\\enspace{\\scshape #1}%\\ignorespaces\n";
            $latextemp .= "}\n\n";
            
            $latextemp .= "\\begin{document}\n\n";
            $latextemp .= "%bibtex \n";
            $latextemp .= "\\bibliography{yourbibfile} \n";
            $latextemp .= "\\end{document}\n";
            self::l2h_support_collapse_item('template', esc_html__('A template for LaTeX', 'latex2html'), $latextemp, 'height:245px;overflow-y:scroll', true);
              /*Compatibility*/
              // translators: %1$s and %2$s are links to alternative syntax highlighter plugins.
            self::l2h_support_collapse_item('compatibility', __('Compatibility issue', 'latex2html'), sprintf(__("If try to pose <code>LaTeX/TeX</code> raw code in your post, my plugin will broken the syntax highlighter %1\$s, but you can use %2\$s instead.", 'latex2html'), '<a target="_blank" href="https://cn.wordpress.org/plugins/syntaxhighlighter/">SyntaxHighlighter Evolved</a>', '<a target="_blank" href="https://srd.wordpress.org/plugins/crayon-syntax-highlighter/">Crayon Syntax Highlighter</a>'));
              /*Localization*/
            self::l2h_support_collapse_item('Localization', esc_html__('How to Localize', 'latex2html'), 
              // translators: Various HTML elements and links are used for localization instructions.
            sprintf(__("It is quite often you want to use latex2html with your native language, here is a guide how to do it (and why).  
            %1\$s First set the language of Wordpress to be your native because latex2html use I18n to translate the language.  
            %2\$s and then to %3\$s to translate the items of plugin into your language ( the item under <i>development</i> will be enough) %4\$s After you submitting the translation, 
            you need to be approved by an editor in that language. Of course, you can apply to become an editor at %5\$s If 95%% of the translation is complete, 
            a language file will be generated and you can download and use it by checking translation update at the %6\$s The above method needs to almost a complete translation of the plugin, 
            if you just want to translate the title of %7\$s and so on, you can do the following: %8\$s Download the zip pack of LaTeX2HTML plugin at %9\$s;
            %10\$s Download the translation tool %11\$s and install; %12\$s  Unzip the downloaded LaTeX2HTML plugin, and open the template file (<i>latex2html/langs/latex2html.pot</i>) by Poedit (click <i>Create new translation</i>), 
            it will ask your target language; %13\$s Find the items (such as Theorem, Lemma) in <i>Source text</i>, and input your translation in the <i>Translation area</i>; 
            %14\$s After finishing all your translation, click <i>Save</i>. <strong>BE CAREFUAL</strong>, the file name should be something like <i>latex2html-es_ES.po</i>, 
            it will saved in the same location as the pot file; %15\$s Install the modified plugin by uploading to your wordpress website, and set the language of wordpress as the same as your target language; 
            %16\$s Refreash the post to see it works or not.", 'latex2html'), "<ol><li>", "</li><li>", "<a href='https://translate.wordpress.org/projects/wp-plugins/latex2html'>translate page</a>", "</li><li>", 
            "<a href='https://make.wordpress.org/polyglots/2017/05/03/hello-polyglots-i-am-the-98/#comments'>polyglots</a></li><li>", "<a href='" .get_admin_url(). "update-core.php'>Admin panel</a></li></ol>", "<em>theorem, lemma</em>", "<ol><li>", "<a href='https://downloads.wordpress.org/plugin/latex2html.zip'>wordpress plugin store</a>", "</li><li>", "<a href='https://poedit.net/'>Poedit</a>", "</li><li>", "</li><li>", "</li><li>", "</li><li>", "</li><li>", "</li></ol>"));
              /* translators: give a hight rating or leave a small donation. */
            self::l2h_support_collapse_item('contribute', esc_html__('How to contribute', 'latex2html'), 
              // translators: %1$s, %2$s, and %3$s are links to relevant resources or elements.
            sprintf(__('As a Phd in pure mathematics, this plugin is developed to help me write math notes in WP. 
            You cannot imagine how much time and effort I spend to make it prefect. 
            <br>Any suggestion are welcome, you can contact me by Gmail: van141.abel(at)gmail.com.
            If you have any problem, I strongly suggest to have a look of the %1$s or create a new one. 
            <br>This plugin is totally free of use,  but you can support it by giving it a %2$s or leaving a %3$s.', 'latex2html'), '<a target="_blank" href="https://wordpress.org/support/plugin/latex2html">issue</a>', '<a target="_blank" href="http://wordpress.org/extend/plugins/latex2html">high rating</a>', '<span id="donation">small donation</a></span>'));
            ?>
<div id    = 'paymds'>
<div class = 'paymds'>
    <ul >
        <li  id   = "imgpaypal">
        <a   href = "https://www.paypal.me/abelvan" target                                    = "_blank">
        <img src  = "<?php echo esc_url(plugin_dir_url(__FILE__) . 'pic/paypal.png'); ?>" alt = "<?php echo esc_attr__('Paypal', 'latex2html'); ?>" class = "dimg">
        </a>
        </li>
        <li  id   = "imgtenpay">
        <a   href = "https://www.tenpay.com" target                                           = "_blank">
        <img src  = "<?php echo esc_url(plugin_dir_url(__FILE__) . 'pic/tenpay.png'); ?>" alt = "<?php echo esc_attr__('Tenpay', 'latex2html'); ?>" class = "dimg">
        </a>
        </li>
        <li  id   = "imgalipay">
        <a   href = "https://www.alipay.com" target                                           = "_blank">
        <img src  = "<?php echo esc_url(plugin_dir_url(__FILE__) . 'pic/alipay.png'); ?>" alt = "<?php echo esc_attr__('Alipay', 'latex2html'); ?>" class = "dimg">
        </a>
        </li>
    </ul>
    <input type = 'radio' name = 'pay' id = 'paypal' value = 'paypal' checked /><label for = 'paypal'>Paypal</label>
    <input type = 'radio' name = 'pay' id = 'alipay' value = 'alipay' /><label for         = 'alipay'>Alipay</label>
    <input type = 'radio' name = 'pay' id = 'tenpay' value = 'tenpay' /><label for         = 'tenpay'>Tenpay</label>
  </div>
</div>
<?php
                  echo "</div>";
        }

        public function l2h_manual_callback() {
            // Generate a nonce for form submission verification
            $nonce = wp_create_nonce('l2h_nonce_action');
        
            $iframe_url = plugin_dir_url(__FILE__) . 'html/manual.php?ver=' . l2h_main_class::l2hVER . '&date=' . l2h_main_class::l2hlud . '&nonce=' . $nonce;
            ?>
            <div id="diviframe" style="overflow:hidden">
                <iframe src="<?php echo esc_url($iframe_url); ?>" style="width:100%;min-height:500px"></iframe>
            </div>        
            <?php
        }
        

          /**
         * The upgrade callbacks
         * we should define the callback for every version
         */
        public function l2h_upgradefrom_123_callback()
        {
            $upgrade_options = get_option('l2h_upgrade_options');
            $old_options     = get_option('latex2html_mathjax_custom_config');
            if(isset($upgrade_options['upgrade_confirm']) && $upgrade_options['upgrade_confirm']) {
                if($upgrade_options['VER'] > '1.2.3') {
                    return;
                }

                $this->options = get_option('l2h_options');

                if($old_options != null) {
                      // Save the custom options to l2h_options
                    $this->options['enall']          = !get_option('latex_chinese');
                    $this->options['single']         = get_option('latex_single_show');
                    $this->options['mathjax_cdn']    = get_option('latex2html_mathjax_custom_cdn');
                    $this->options['mathjax_config'] = get_option('latex2html_mathjax_custom_config');
                    $this->options['latex_cmd']      = get_option('latex_preamble');
                    $this->options['latex_style']    = get_option('latex_style');
                    update_option('l2h_options', $this->options);
                    foreach (array('latex_chinese', 'latex_single_show', 'latex2html_mathjax_custom_cdn', 'latex2html_mathjax_custom_config', 'latex_preamble', 'latex_style' ) as $value) {
                        delete_option($value);
                    }
                }
                $upgrade_options['upgrade_confirm'] = false;
                  // Set the new version
                $upgrade_options['VER'] = $this->l2h_upgrade_vernum($upgrade_options['VER'], 'main');
                update_option('l2h_upgrade_options', $upgrade_options);
            } else {
                if($upgrade_options['VER'] == '1.2.3') {
                      // translators: %1$s is the new version, %2$s is the old version range, and %3$s is the milestone version.
                    sprintf('<p>' . esc_html__('It seems that you were upgrade from a version lower than %1$s, 
                    since there are a lot of changes between version %2$s and the millstone version %3$s.', 'latex2html'), '<code>2.0.0</code>', '<code><=1.2.3</code>', '<code>2.0.0</code>');
                    sprintf(esc_html__('Although I try hard to keep upgrade smoothly', 'latex2html') . ', <strong>' . esc_html__('it may loss your custom configuration in the upgrade process', 'latex2html') . '</strong>' . esc_html__('Thus, I strongly suggest you to', 'latex2html') . ' <strong>' . esc_html__('have a copy of your custom configuration', 'latex2html') . '</strong> ' . esc_html__('before click the following', 'latex2html') . ' <em>%s</em> button.', _x('Upgrade', 'the upgrade button', 'latex2html')) .'</p>';
                    echo '<p>' . esc_html__('Your custom configurations are given in the following', 'latex2html') . ', <strong>' . esc_html__('please be aware of that it will be deleted as soon as the upgrade process is finished', 'latex2html') . '</strong>.</p>';
                    if($old_options != null) {
                          // Output the custom options of old version
                        echo "MathJax CDN:<pre><code>" . esc_html(trim(get_option('latex2html_mathjax_custom_cdn'))). "</code></pre>";
                        echo "MathJax Config:<pre><code>" . esc_html(trim(get_option('latex2html_mathjax_custom_config'))). "</code></pre>";
                        echo "LaTeX newcommands:<pre><code>" . esc_html(trim(get_option('latex_preamble'))) . "</code></pre>";
                        echo "LaTeX styles:<pre><code>" . esc_html(trim(get_option('latex_style'))) . "</code></pre>";
                    } else {
                        echo "<blockquote>". esc_html__("Sorry, I didn't find any custom setting in database. You can try this newest version by a fresh new install.", 'latex2html') . "</blockquote>";
                    }
                }
            }
        }

    }
}
