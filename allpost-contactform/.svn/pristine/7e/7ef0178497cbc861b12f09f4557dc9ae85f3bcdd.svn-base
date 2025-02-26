<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.Rainbow-Link.com
 * @since      1.0.0
 *
 * @package    allpost-contactform
 * @subpackage allpost-contactform
 */    
 if ( is_admin() ) {
    
    class RL_APCFAdminUi {
        
        var $file_path;
        
        public function __construct( $path){
            $this->file_path = $path;
            $this->setUi();
        }
        
        public function setUi(){
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            register_setting(RL_APCF::OPTIONS, RL_APCF::OPTIONS, array( &$this, 'validate' ));
            add_settings_section('main_section', '', array(&$this,'section_topfunc'), $this->file_path);
            add_settings_field('rlapcf_ctitle', $rl_apcf_admin_c1, array(&$this,'setting_ctitle'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_cmessage', $rl_apcf_admin_c2, array(&$this,'setting_cmessage'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_cbtn', $rl_apcf_admin_c3, array(&$this,'setting_cbtn'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_stitle', $rl_apcf_admin_s1, array(&$this,'setting_stitle'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_smessage', $rl_apcf_admin_s2, array(&$this,'setting_smessage'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_mail', $rl_apcf_admin_m1, array(&$this,'setting_mail'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_mailsender', $rl_apcf_admin_m2, array(&$this,'setting_mailsender'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_mailsubject', $rl_apcf_admin_m3, array(&$this,'setting_mailsubject'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_redirectpage', $rl_apcf_admin_r1, array(&$this,'setting_redirectpage'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_redirecttime', $rl_apcf_admin_r2, array(&$this,'setting_redirecttime'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_gototop', $rl_apcf_admin_g1, array(&$this,'setting_gototop'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_cookie', $rl_apcf_admin_co1, array(&$this,'setting_cookie'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_errormsg', $rl_apcf_admin_e1, array(&$this,'setting_errormsg'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_errorbtn', $rl_apcf_admin_e2, array(&$this,'setting_errorbtn'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_strreplace', $rl_apcf_admin_sr1, array(&$this,'setting_strreplace'), $this->file_path, 'main_section');
            add_settings_field('rlapcf_saveattinserver', $rl_apcf_admin_sa1_eg, array(&$this,'setting_saveattinserver'), $this->file_path, 'main_section');
        }
        
        
        public function disp_admin_page() {
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $file = $this->file_path;
            $option_apcf_name = RL_APCF::OPTIONS;
		    $shortcode = "[" . RL_APCF::SHORTCODE . "]";
            include rl_apcf_dir_path.'allpost-contactform-admin-view.php';
        }
        
        function validate($input) {
            $input['rlapcf_mail'] = sanitize_email( $input['rlapcf_mail'] );
            $input['rlapcf_mailsender'] = sanitize_text_field( $input['rlapcf_mailsender'] );
            $input['rlapcf_mailsubject'] = sanitize_text_field( $input['rlapcf_mailsubject'] );
            $input['rlapcf_ctitle'] = sanitize_text_field( $input['rlapcf_ctitle'] );
            $input['rlapcf_cmessage'] = sanitize_text_field( $input['rlapcf_cmessage'] );
            $input['rlapcf_cbtn'] = sanitize_text_field( $input['rlapcf_cbtn'] );
            $input['rlapcf_stitle'] = sanitize_text_field( $input['rlapcf_stitle'] );
            $input['rlapcf_smessage'] = sanitize_text_field( $input['rlapcf_smessage'] );
            $input['rlapcf_redirectpage'] = sanitize_text_field( $input['rlapcf_redirectpage'] );
            $input['rlapcf_redirecttime'] = sanitize_text_field( $input['rlapcf_redirecttime'] );
            $input['rlapcf_gototop'] = sanitize_text_field( $input['rlapcf_gototop'] );
            $input['rlapcf_cookie'] = sanitize_text_field( $input['rlapcf_cookie'] );
            $input['rlapcf_errormsg'] = sanitize_text_field( $input['rlapcf_errormsg'] );
            $input['rlapcf_errorbtn'] = sanitize_text_field( $input['rlapcf_errorbtn'] );
            $input['rlapcf_strreplace'] = sanitize_text_field( $input['rlapcf_strreplace'] );
            $input['rlapcf_saveattinserver'] = sanitize_text_field( $input['rlapcf_saveattinserver'] );
            return $input;
        }
        
        function  section_topfunc() {}
              
        function setting_ctitle() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_ctitle"];
            echo '
            <h2 class="adminsub">'.$rl_apcf_admin_confirmation_window.'</h2>
            <label for="rlapcf-ctitle">'.$rl_apcf_admin_c1.'</label>';
            echo "<input id='rlapcf_ctitle' name='allpost_contactform_options[rlapcf_ctitle]' type='text' class='option' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_c1_eg.'</span>
            ';
        }
        
        function setting_cmessage() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_cmessage"];
            echo ' 
            <label for="rlapcf-cmessage">'.$rl_apcf_admin_c2.'</label>';
            echo "<input id='rlapcf_cmessage' name='allpost_contactform_options[rlapcf_cmessage]' type='text' class='option' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_c2_eg.'</span>
            ';
        }
        
        function setting_cbtn() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_cbtn"];
            echo '  
            <label for="rlapcf-cbtn">'.$rl_apcf_admin_c3.'</label>';
            echo "<input id='rlapcf_cbtn' name='allpost_contactform_options[rlapcf_cbtn]' type='text' class='option' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_c3_eg.'</span>
            ';
        }
        
        function setting_stitle() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_stitle"];
            echo ' 
            <h2 class="adminsub">'.$rl_apcf_admin_submission_window.'</h2> 
            
            <label for="rlapcf-stitle">'.$rl_apcf_admin_s1.'</label>';
            echo "<input id='rlapcf_stitle' name='allpost_contactform_options[rlapcf_stitle]' type='text' class='option' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_s1_eg.'</span>
            ';
        }
        
        function setting_smessage() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_smessage"];
            echo ' 
            <label for="rlapcf-smessage">'.$rl_apcf_admin_s2.'</label>';
            echo "<input id='rlapcf_smessage' name='allpost_contactform_options[rlapcf_smessage]' type='text' class='option' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_s2_eg.'</span>
            ';
        }
        
                
        function setting_mail() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_mail"];
            echo '<h2 class="adminsub">'.$rl_apcf_admin_mail.'</h2>
            ';
            echo '<label for="rlapcf-mail">'.$rl_apcf_admin_m1.'</label>';
            echo "<input id='rlapcf_mail' name='allpost_contactform_options[rlapcf_mail]' type='text' class='option' class='option' value='{$value}' />";
            $rl_apcf_admin_m1_eg_admin = get_option( 'admin_email' );
            echo '
             <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_m1_eg_admin.'  '.$rl_apcf_admin_m1_eg.'</span>
            ';
        }
        
        function setting_mailsender() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_mailsender"];
            echo '
            <label for="rlapcf-mailsender">'.$rl_apcf_admin_m2.'</label>';
            echo "<input id='rlapcf_mailsender' name='allpost_contactform_options[rlapcf_mailsender]' type='text' class='option' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_m2_eg.'</span>
            ';
        }
        
        function setting_mailsubject() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_mailsubject"];
            echo '
            <label for="rlapcf-mailsubject">'.$rl_apcf_admin_m3.'</label>';
            echo "<input id='rlapcf_mailsubject' name='allpost_contactform_options[rlapcf_mailsubject]' type='text' class='option' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_m3_eg.'</span>
            ';
        }
           
        function setting_redirectpage() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $rl_apcf_users_toppage_url = esc_url( home_url( '/' ) );
            $value = $options["rlapcf_redirectpage"];
            echo '<p class="apcf_welcome_options">'.$rl_apcf_admin_sec2_name.'</p>
            ';
            echo '<h2 class="adminsub_option">'.$rl_apcf_admin_options_H2_1.'</h2>
            ';
            echo '<label for="rlapcf-redirectpage">'.$rl_apcf_admin_r1.'</label>';
            echo "<input id='rlapcf_redirectpage' name='allpost_contactform_options[rlapcf_redirectpage]' type='text' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_users_toppage_url.'</span>
            ';
        }   
        
        function setting_redirecttime() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_redirecttime"];
            echo '<label for="rlapcf-redirecttime">'.$rl_apcf_admin_r2.'</label>';
            echo "<input id='rlapcf_redirecttime' name='allpost_contactform_options[rlapcf_redirecttime]' type='text' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_r2_eg.'</span>
            ';
        }   
        
        function setting_gototop() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_gototop"];
            echo '<h2 class="adminsub_option">'.$rl_apcf_admin_options_H2_2.'</h2>
            ';
            echo '<label for="rlapcf-gototop">'.$rl_apcf_admin_g1.'</label>';
            echo "<input id='rlapcf_gototop' name='allpost_contactform_options[rlapcf_gototop]' type='text' class='option' value='{$value}' />";
        }           
        
        function setting_cookie() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_cookie"];
            echo '<h2 class="adminsub_option">'.$rl_apcf_admin_options_H2_3.'</h2>
            ';
            echo '<label for="rlapcf-cookie">'.$rl_apcf_admin_co1.'</label>';
            echo "<input id='rlapcf_cookie' name='allpost_contactform_options[rlapcf_cookie]' type='text' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_co1_eg.'</span>
            ';
        }   
        
        function setting_errormsg() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_errormsg"];
            echo '<label for="rlapcf-errormsg">'.$rl_apcf_admin_e1.'</label>';
            echo "<input id='rlapcf_errormsg' name='allpost_contactform_options[rlapcf_errormsg]' type='text' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_e1_eg.'</span>
            ';
        }     
        
        function setting_errorbtn() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_errorbtn"];
            echo '<label for="rlapcf-errorbtn">'.$rl_apcf_admin_e2.'</label>';
            echo "<input id='rlapcf_errorbtn' name='allpost_contactform_options[rlapcf_errorbtn]' type='text' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_e2_eg.'</span>
            ';
        }   
        
        function setting_strreplace() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_strreplace"];
            echo '<h2 class="adminsub_option">'.$rl_apcf_admin_options_H2_4.'</h2>
            ';
            echo '<label for="rlapcf-strreplace">'.$rl_apcf_admin_sr1.'</label>';
            echo "<input id='rlapcf_strreplace' name='allpost_contactform_options[rlapcf_strreplace]' type='text' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_sr1_eg.'</span>
            ';
        }   
        
        function setting_saveattinserver() {
        $options = RL_APCF::get_option();
            include rl_apcf_dir_path.'allpost-contactform-language.php';
            $value = $options["rlapcf_saveattinserver"];
            echo '<h2 class="adminsub_option">'.$rl_apcf_admin_options_H2_5.'</h2>
            ';
            echo '<label for="rlapcf-saveattinserver">'.$rl_apcf_admin_sa1.'</label>';
            echo "<input id='rlapcf_saveattinserver' name='allpost_contactform_options[rlapcf_saveattinserver]' type='text' class='option' value='{$value}' />";
            echo ' <span class="apcf_eg">'.$rl_apcf_admin_eg.''.$rl_apcf_admin_sa1_eg.'</span>
            ';
            echo '<p class="apcf_spacer1">&nbsp;</p>';
            echo '<div class="notice notice-warning is-dismissible apcf_notice">
            <p>'.$rl_apcf_admin_sa3_MalwareScannerPlugins.'</p>
            </div>';
            echo '<div class="notice notice-warning is-dismissible apcf_notice">
            <p><strong>'.$rl_apcf_admin_sa2_Nginx0.'</strong><br>'.$rl_apcf_admin_sa2_Nginx1.'</p>
            <pre>location /wp-content/apcf_att/ {
                '.$rl_apcf_admin_sa2_Nginx2.'
                location ~ \.php$ {
                    deny all;
                }
                
                '.$rl_apcf_admin_sa2_Nginx3.'
                autoindex off;
            
                '.$rl_apcf_admin_sa2_Nginx4.'
                location ~* \.(jpg|jpeg|png|gif|zip|txt)$ {
                    try_files $uri =404;
                }
                '.$rl_apcf_admin_sa2_Nginx5.'
                location ~* \.(php|php2|php3|php4|php5|php6|php7|phps|phps|pht|phtm|phtml|pgif|shtml|';
                echo '<span>htaccess|phar|inc|hphp|ctp|module|asp|aspx|config|ashx|asmx|aspq|axd|cshtm|cshtml|rem|soap|vbhtm|vbhtml|asa|cer|shtml|jsp|jspx|jsw|jsv|jspf|wss|do|action|cfm|cfml|cfc|dbm|swf|pl|cgi|yaws|sh|bash)$ {</span>
                    deny all;
                }
            }
            </pre>
            <p>'.$rl_apcf_admin_sa2_Nginx6.'</p>
           </div>';
        }           
        
           
   
    }
 }
?>
