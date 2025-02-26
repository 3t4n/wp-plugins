<?php
/*
Plugin Name: ACB Scratchpad
Plugin URI: 
Description: A simple scratchpad/testbed for testing, and installing small additions to, pre-existing PHP/JS/CSS website/addin-code code
Version: 1.0.1
Author: Alan C Brown
Author URI: 
License: 
License URI: 
*/

/* 
 *  This is a public global array that can be used to pass values between PHP/JS/CSS code snippets
 *
 *  It should contain a list of named values, generally added via PHP code.
 *  Values defined here will be mirrored to a global public JS var named 'acb_scrapthpad_var'  
 */
$acb_scratchpad_var=[];

if(!interface_exists('Throwable'))  {
	interface Throwable {
    public function getMessage(): string;
    public function getCode(): int;
    public function getFile(): string;
    public function getLine(): int;
    public function getTrace(): array;
    public function getTraceAsString(): string;
    public function getPrevious(): Throwable;
    public function __toString(): string;
	}
}

/* 
 * Add top level menu
 */
function acb_sp_admin_menu_init() {
 // add top level menu page
 add_menu_page(
	 'Code Block Scratchpad',  // $page_title
	 'Code Block Scratchpad',  // $menu_title
	 'manage_options',         // $cabability
	 'acb_sp_settings',        // $menu_slug == $page
	 'acb_sp_options_page_html' // callback
 );
}


/* 
 * Register Settings to hold manage scripts/operations
 */
function acb_sp_settings_init() {
 
 
 	// PDF ----------------

 
	// register a new setting
 register_setting(
			 'acb_sp_options_php',  //$option group
				'acb_sp_php_code',    //$option name
				['sanitize_callback'=>'acb_sp_php_code_callback']  );  //callback
 register_setting(
			 'acb_sp_options_php',  //$option group
			 'acb_sp_php_submit_button_type'); //$option name
 register_setting(
			 'acb_sp_options2_php',   //$option group
			 'acb_sp_php_installed' );  //$option name
 register_setting(
			'acb_sp_options2_php',     //$option group
			'acb_sp_php_installed_enable');  //$option name

 // register a new section in the page
 add_settings_section(
			'acb_sp_options_php',  	//$id
			__( 'PHP', 'acb_sp' ),  //$title
			'acb_section_cb',			  //$callback
			'acb_sp_settings'			  //$page
 );
 
 // register a new field in the 'acb_sp_options_php' section 
 add_settings_field(
	'acb_sp_php_code',     	  //$id
	__( 'Code', 'acb_sp' ),		//$title
 	'acb_sp_input_field',			//$callback
 	'acb_sp_settings',				//$page
 	'acb_sp_options_php',			//$section 
 	[ 
 		'label_for' => 'acb_sp_php_code',
	 'class' => 'acb_sp_field', 
	 'acb_field_type' => 'textarea',
	 'acb_mime_type' => 'text/x-php',
  ]
);
 
 // register a new field in the 'acb_sp_options_php' section
 add_settings_field(
		'acb_sp_php_submit_button_type',  //$id
		'submit type',							  //$title
		'acb_sp_input_field',					//$callback
		'acb_sp_settings',						//$page
		'acb_sp_options_php',					//$section
		 [
			 'label_for' => 'acb_sp_php_submit_button_type',
			 'class' => 'acb_sp_field acb_hidden acb_sp_submit_button_type',
			 'acb_field_type' => 'hidden',
		]
 );


	// Javascript  ----------------


 
	// register a new setting
 register_setting(
			 'acb_sp_options_js',  //$option group
				'acb_sp_js_code',    //$option name
				['sanitize_callback'=>'acb_sp_js_code_callback']  );  //callback
 register_setting(
			 'acb_sp_options_js',  //$option group
			 'acb_sp_js_submit_button_type'); //$option name
 register_setting(
			 'acb_sp_options_js',  	//$option group
			 'acb_sp_js_result'); 	//$option name
 register_setting(
			 'acb_sp_options2_js',   //$option group
			 'acb_sp_js_installed' );  //$option name
 register_setting(
			'acb_sp_options2_js',     //$option group
			'acb_sp_js_installed_enable');  //$option name

 
 // register a new section in the page
 add_settings_section(
			'acb_sp_options_js',  	//$id
			__( 'Javascript', 'acb_sp' ),  //$title
			'acb_section_cb',			  //$callback
			'acb_sp_settings'			  //$page
 );
 
 // register a new field in the 'acb_sp_options_js' section
 add_settings_field(
		'acb_sp_js_code',     	  //$id
		__( 'Code', 'acb_sp' ),		//$title
		'acb_sp_input_field',			//$callback
		'acb_sp_settings',				//$page
		'acb_sp_options_js',			//$section
		 [
			 'label_for' => 'acb_sp_js_code',
			 'class' => 'acb_sp_field',
			 'acb_field_type' => 'textarea',
 			 'acb_mime_type'=>'text/javascript'
		]
 );
 
 // register a new field in the 'acb_sp_options_js' section
 add_settings_field(
		'acb_sp_js_submit_button_type',  //$id
		'submit type',							  //$title
		'acb_sp_input_field',					//$callback
		'acb_sp_settings',						//$page
		'acb_sp_options_js',					//$section
		 [
			 'label_for' => 'acb_sp_js_submit_button_type',
			 'class' => 'acb_sp_field acb_hidden acb_sp_submit_button_type',
			 'acb_field_type' => 'hidden',
		]
 );
  // register a new field in the 'acb_sp_options_js' section
 add_settings_field(
		'acb_sp_js_result',  //$id
		'submit type',							  //$title
		'acb_sp_input_field',					//$callback
		'acb_sp_settings',						//$page
		'acb_sp_options_js',					//$section
		 [
			 'label_for' => 'acb_sp_js_result',
			 'class' => 'acb_sp_field acb_hidden acb_sp_js_result',
			 'acb_field_type' => 'hidden',
		]
 );
 

	// CSS ----------------


 
	// register a new setting
 register_setting(
			 'acb_sp_options_css',  //$option group
				'acb_sp_css_code',  //$option name
				['sanitize_callback'=>'acb_sp_css_code_callback']  );  //callback
 register_setting(
			 'acb_sp_options_css',  //$option group
			 'acb_sp_css_submit_button_type'); //$option name
 register_setting(
			 'acb_sp_options2_css',   //$option group
			 'acb_sp_css_installed' );  //$option name
 register_setting(
			'acb_sp_options2_css',     //$option group
			'acb_sp_css_installed_enable');  //$option name
 register_setting(
			'acb_sp_options2_css',        //$option group
			'acb_sp_css_installed_type'); //$option name

 
 // register a new section in the page
 add_settings_section(
			'acb_sp_options_css',  	//$id
			__( 'CSS', 'acb_sp' ),  //$title
			'acb_section_cb',			  //$callback
			'acb_sp_settings'			  //$page
 );
 
 // register a new field in the 'acb_sp_options_css' section
 add_settings_field(
		'acb_sp_css_code',     	  //$id
		__( 'Code', 'acb_sp' ),		//$title
		'acb_sp_input_field',			//$callback
		'acb_sp_settings',				//$page
		'acb_sp_options_css',			//$section
		 [
			 'label_for' => 'acb_sp_css_code',
			 'class' => 'acb_sp_field',
			 'acb_field_type' => 'textarea',
 			 'acb_mime_type'=>'text/css'
		]
 );
 
 // register a new field in the 'acb_sp_options_css' section
 add_settings_field(
		'acb_sp_css_submit_button_type',  //$id
		'submit type',							  //$title
		'acb_sp_input_field',					//$callback
		'acb_sp_settings',						//$page
		'acb_sp_options_css',					//$section
		 [
			 'label_for' => 'acb_sp_css_submit_button_type',
			 'class' => 'acb_sp_field acb_hidden acb_sp_submit_button_type',
			 'acb_field_type' => 'hidden',
		]
 );

}

/* 
 * Preprocess PHP code entered in code-editor
 *
 * Includes:
 * a) strip ab=ny leading <?php prefix
 * b) converting expression to statements
 */
function acb_sp_php_code_callback($value)
{
	if(!isset($value))return $value;
	$value=preg_replace('/\A\s*\<\?php\b/','',$value);
	if(preg_match('/;|\?>/',$value ))return $value;
	if(preg_match('/\A\s*(?>\/\*(?s:.*?)\*\/\s*)*(?:\Z|\/\/[^\r\n]*)\Z/',$value))return $value;
	if(preg_match('/\A\s*(?>\/\*(?s:.*?)\*\/\s*)*return\s(?:.*?\/\/|.*)/',$value,$mm ))	return $mm[0] . ';' . substr($value,strlen($mm[0]));
	return 'return ' .  $value . ';';	
}

/* 
 * Preprocess Javascript code entered in code-editor
 *
 * Includes:
 * a) striping any <script tags
 * b) converting expression to statements
 */
function acb_sp_js_code_callback($value)
{
	if(!isset($value))return $value;
	if(strpos($value,';')!==False)return $value;
	if(preg_match('/\A\s*(?>\/\*(?s:.*?)\*\/\s*)*(?:\Z|\/\/[^\r\n]*)\Z/',$value))return $value;
	if(preg_match('/\A\s*(?>\/\*(?s:.*?)\*\/\s*)*return\s(?:.*?\/\/|.*)/',$value,$mm ))	return $mm[0] . ';' . substr($value,strlen($mm[0]));
	return 'return ' .  $value . ';';	
}

/* 
 * Preprocess CSS code entered in code-editor
 *
 * striping any <style  or </script tags
 */

function acb_sp_css_code_callback($value)
{
	if(!isset($value))return $value;
	$value=preg_replace('/\<script.*?\>/s','',$value);
	$value=preg_replace('/\<\/script.*/s','',$value);
	$value=preg_replace('/\<style.*?\>/s','',$value);
	$value=preg_replace('/\<\/style.*/s','',$value);
	return $value;	
}

/*
 * Place holder for section
 */
function acb_section_cb( $args ) {
}

/*
 * Add html control for setting based on type
 */
function acb_sp_input_field( $args ) {
 $label=$args['label_for'];
 $inpType=$args['acb_field_type'];
 $mimeType=$args['acb_mime_type'] ?? null;
 $value = get_option( $label ) ;
 if($inpType=='textarea') {
 ?>
	 <textarea id="<?= esc_attr( $label ) ?>" name="<?= esc_attr( $label ) ?>" data-mime-type="<?= $mimeType ?>"><?= esc_textarea($value) ?></textarea>
	 <?php
 }
 else  {
	 ?>
	 <input id="<?= esc_attr( $label ) ?>"  name="<?= esc_attr( $label ) ?>" type="<?= esc_attr($inpType) ?>" value="<?= esc_attr($value) ?>" />
	 <?php
 }
}




/* 
 *  This strips any content/code following a ***[ Test Code ]*** comment prefix.
 *  It is applied before installing PHP/JS code.
 *
 *  Note whilst the primary "Installed" PHP is run early on -- just after Plugins intialised,
 *  "test code" is run later - just before we display the scratchpad UI page.    
 */
function acb_sp_strip_test_code(&$code) {	
		$rv = preg_replace('#(?:\A|[\x0d\x0a])\s*/[*]+\[ Test Code \][*]+/\s*?(?=[\x0d\x0a]|\Z).*#s','',$code);
		if(strlen($rv)!=strlen($code))return $rv;
		if(!preg_match('#(?:\A|[\x0d\x0a])\s*(?://.*?[\x0d\x0a]\s*|/\*(?s:.*?)\*/\s*)*return\s+[^{}]*\Z#',$code,$mm))return $code;
		if(!$mm || !$mm[0])return $code;
		
		$rv = substr($code,0,strlen($code) - strlen($mm[0]));
		$code = $rv .  "\r\n/****************[ Test Code ]*****************/\r\n" . $mm[0];
		return $rv;
}


/*
 * This wraps user PHP code such that variables appear in a local rather than global context by default
 *
 * The aim of this is to reduce the risks ascociated with unitentional naming conflicts.
 */
function acb_sp_wrapped_eval($code) {
	global $acb_scratchpad_var;
	return eval($code);
}

/*
 * This handler captures and returns a "cleaned up" version of errors in user code
 *
 * This makes it easier for users to locate errors in php code entered via the scratchpad
 */
function acb_sp_error_handler($code, $message, $file = '', $line = 0, $context = array()) {
	  $fl = preg_replace('#.* eval\(\)\'d code$#s','line',$file);
    echo 'Error: ' . $message . ' in ' . $fl . ':' . $line  . PHP_EOL;
}


/*
 * This executes user PHP code
 *
 * It contains functionality to trap and cleanly handle any user errors returned
 * It also supports explicilty returning a value for testing purposes.
 * Any echo'ed content will be returned as opposed to treated as inline html content.
 */

function acb_sp_eval_code($code) {
		$rv=null;
		$ev=null;
		if(!isset($code) || preg_match('/\A\s*(?>\/\*(?s:.*?)\*\/\s*)*(?:\Z|\/\/[^\x0d\x0a]*)\Z/',$code))return;
		try {
			set_error_handler( 'acb_sp_error_handler');
			ob_start();
			$rv = acb_sp_wrapped_eval($code);
		}	catch(Exception $e) {
			$ev = $e->getMessage() . ' in line:' . $e->getline() . PHP_EOL;
		}	catch(Throwable $e) {
			$ev = 'Fatal Error: ' . $e->getMessage() .  ' in line:' . $e->getline() . PHP_EOL;
		} finally {
			restore_error_handler();
			if(isset($rv))var_export($rv);
			$r = ob_get_contents();
			ob_end_clean();
		}
		return $ev . $r;
}

/*
 * This function generates HTML for a word-press settings group
 *
 */
function acb_sp_do_settings_group_fields($page,$group,$msgGrp) {
	global $wp_settings_sections, $wp_settings_fields;
	$section = $wp_settings_sections[ $page ][$group];
	if(!$section)return;

	if ( $section['title'] ) {
					 echo "<h2>{$section['title']}</h2>\n";
	}
	if($msgGrp) {settings_errors( $msgGrp ); }
	if ( $section['callback'] ) {
			 call_user_func( $section['callback'], $section );
	}	
	if ( ! isset( $wp_settings_fields ) || ! isset( $wp_settings_fields[ $page ] ) || ! isset( $wp_settings_fields[ $page ][ $group ] ) ) {
			return;
	}
	// output option wordpress hidden fields for the given group 
	settings_fields( $group );
	echo '<table class="form-table" role="presentation">';
	// output primary fields for the given group 
	do_settings_fields( $page, $group );
	echo '</table>';
}



/*
 * This creates an html to report why access to the settings page has been denide.
 *
 */
function acb_sp_options_error_page($message) {
	?>
	<div class="wrap acb_sp_access_denied">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<h2>
		<?= __( 'Unfortunately access to this Page has been denied', 'acb_sp' ) ?>
	</h2>
	<div>
		<?= __( $message, 'acb_sp' ) ?>
	</div>
	</div>
	<?php
}

/*
 * This is the top-level entry point for generating the HTML for scratchpad page.
 *
 * It includes the primary code types supported: PHP, Javascript & CSS
 *
 */

function acb_sp_options_page_html() {

	global $acb_scratchpad_var;

	/*
	* check user permissions/capabilities
	*/
	
	if ( !current_user_can( 'manage_options' ) ) return acb_sp_options_error_page('Access is resticted to site administors');
	
	$installing_enabled=!(defined('DISALLOW_FILE_EDIT') && DISALLLOW_FILE_EDIT);
	if(!$installing_enabled) add_settings_error( 'acb_sp_messages_global', 'acb_sp_file_edit_dissallowed', 'Scripts can not be installed/updated whilst DISALLOW_FILE_EDIT is set','warning' );

	
	$php_fn_enabled = defined('WP_DEBUG') && WP_DEBUG=='true';
	if(!$php_fn_enabled) add_settings_error( 'acb_sp_messages_php', 'acb_sp_not_debug', 'Wordpress guidelines require that the WP_DEBUG option must be set to \'true\' to enable this functionaly.' . PHP_EOL . 'Please update your wp-config.php file to include: define( \'WP_DEBUG\', true )','warning' );
	
	
	/* 
	 * define some local helper functions
	 */ 
	$scrollToIf=function($bool) {
		if(!$bool)return '';
		return ' acb_sp_scrollToHere';
	};

	$fn=function($v) {return $v;};


	
	/*
	/* Declare and Initialise primary setting/variables for each code type
	*/

	// PHP ----------------
	$php_inst_code = get_option('acb_sp_php_installed');
	$php_code = get_option( 'acb_sp_php_code' );
	$php_to_inst=acb_sp_strip_test_code($php_code);
 	$php_op = get_option('acb_sp_php_submit_button_type');
	update_option('acb_sp_php_submit_button_type','');
	$php_canInstall=false;

	// Javascript  ----------------
	$js_inst_code = get_option('acb_sp_js_installed');
 	$js_code = get_option( 'acb_sp_js_code' );
 	$js_to_inst=acb_sp_strip_test_code($js_code);
 	$js_op = get_option('acb_sp_js_submit_button_type');
 	update_option('acb_sp_js_submit_button_type','');
	$js_canInstall=false;

	
	// CSS ----------------
	$css_inst_code = get_option('acb_sp_css_installed');
	$css_code = get_option( 'acb_sp_css_code' );
	$css_to_inst = acb_sp_strip_test_code($css_code);
 	$css_op = get_option('acb_sp_css_submit_button_type');
	update_option('acb_sp_css_submit_button_type','');
	$css_canInstall=false;




	/*
	/* Handle requested operation if any -- resulting from button pressed
	*/

	// check if the user have submitted the settings
	if ( isset( $_GET['settings-updated'] ) ) {	

		// PHP ----------------

	 	if($php_op=='acb_sp_submit_revert') {
	 		update_option('acb_sp_php_code',get_option('acb_sp_php_installed'));
	 	} else if($php_op) {
		 	$php_result = acb_sp_eval_code($php_to_inst);
		 	$php_canInstall = !strlen($php_result);
		 	// "test php code is run here now (unlike the main code which was run previously- just after plugin initialisation code)
		 	$xl=strlen($php_code) - strlen($php_to_inst);
		 	if($xl>0) $php_result = $php_result . acb_sp_eval_code(substr($php_code,-$xl));
		 	
		 	// we keep acb_scratchpad info in browser session variable when in site admin pages because we only eval user php code on user demand here
			$json_for_vars = wp_json_encode(array_map(function($v) { return is_scalar($v) ? html_entity_decode( (string) $v, ENT_QUOTES, 'UTF-8' ) : $v;},$acb_scratchpad_var));
			echo '<script>var acb_scratchpad_var = ' . $json_for_vars . ';sessionStorage.setItem(\'acb_scratchpad_vars\',JSON.stringify(acb_scratchpad_var));</script>';
		}
		
	 	if($php_op=='acb_sp_submit_publish') {
			if(!$php_code) {
				update_option('acb_sp_php_installed_enable',False);
				add_settings_error( 'acb_sp_messages_php', 'acb_sp_php_install_clear', 'Cleared/Removed Installed PHP Code','info' );
				$php_code = get_option('acb_sp_php_installed');
				update_option('acb_sp_php_installed','');
			} else if(!$php_canInstall) {
				 add_settings_error( 'acb_sp_messages_php', 'acb_sp_php_install_error', 'FAILED!! - PHP code failed to install because it returned: '.  esc_textarea($php_result));
			} else {
				update_option('acb_sp_php_installed',$php_to_inst);
				update_option('acb_sp_php_installed_enable',True);
				update_option('acb_sp_php_code',$php_code);
				add_settings_error( 'acb_sp_messages_php', 'acb_sp_php_install_ok', 'PHP Code Installed','info' );			
			}
			$php_canInstall=false;
		} else if($php_op=='acb_sp_submit_run') { // check/run button pressed
			update_option('acb_sp_php_code',$php_code);

			if($php_canInstall && !strlen($php_result)) {
				add_settings_error( 'acb_sp_messages_php', 'acb_sp_message_ran', 'Checked/Ran PHP code - No Errors', 'info' );
			}	else {
				add_settings_error( 'acb_sp_messages_php', 'acb_sp_message_ran', esc_textarea('PHP Code Result:' . PHP_EOL . $php_result), 'info' );
			}
		}
		
		// Javascript  ----------------
		
		if($js_op){
			$js_result = get_option('acb_sp_js_result');
			$js_canInstall = !strlen($js_result) || ((strlen($js_to_inst) || get_option('acb_sp_js_installed_enable')) && $js_to_inst!=$js_code && !preg_match('/\{\s*["\']Fatal\s*Error["\']\s*:/',$js_result)); 		
		}
	 	if($js_op=='acb_sp_submit_revert') {
	 		update_option('acb_sp_js_code',get_option('acb_sp_js_installed'));
		} else if($js_op=='acb_sp_submit_publish') {
			if(!$js_code) {
				update_option('acb_sp_js_installed_enable',False);
				add_settings_error( 'acb_sp_messages_js', 'acb_sp_js_install_clear', 'Cleared/Removed Installed Javascript Code','info' );
				$js_code = get_option('acb_sp_js_installed');
				update_option('acb_sp_js_installed','');
			} else if(!$js_canInstall) {
				 add_settings_error( 'acb_sp_messages_js', 'acb_sp_js_install_error', 'FAILED!! - Javascript failed to install because it returned: '.  esc_textarea($js_result));
			} else {
				update_option('acb_sp_js_installed',$js_to_inst);
				update_option('acb_sp_js_installed_enable',True);
				update_option('acb_sp_js_code',$js_code);
				add_settings_error( 'acb_sp_messages_js', 'acb_sp_js_install_ok', 'Javascript Code Installed','info' );			
			}
			$js_canInstall=false;
		} else if($js_op=='acb_sp_submit_run') { // check/run button pressed
			update_option('acb_sp_js_code',$js_code);
			if($js_canInstall && !strlen($js_result)) {
				add_settings_error( 'acb_sp_messages_js', 'acb_sp_message_ran2', 'Checked/Ran Javascript code - No Errors', 'info' );
			}	else {
				add_settings_error( 'acb_sp_messages_js', 'acb_sp_message_ran2', esc_textarea('Javascript Code Result:' . PHP_EOL . $js_result), 'info' );
			}
		}
 
		// CSS  ----------------
		
	
	 	if($css_op=='acb_sp_submit_revert') {
	 		update_option('acb_sp_css_code',get_option('acb_sp_css_installed'));
		} else if($css_op=='acb_sp_submit_publish') {
			if(!$css_code) {
				update_option('acb_sp_css_installed_enable',False);
				add_settings_error( 'acb_sp_messages_css', 'acb_sp_css_install_clear', 'Cleared/Removed Installed CSS Code','info' );
				$css_code = get_option('acb_sp_css_installed');
				update_option('acb_sp_css_installed','');
			} else {
				update_option('acb_sp_css_installed',$css_to_inst);
				update_option('acb_sp_css_installed_enable',True);
				update_option('acb_sp_css_code',$css_code);
				add_settings_error( 'acb_sp_messages_css', 'acb_sp_css_install_ok', 'CSS Code Installed','info' );			
			}		
		} else if($css_op) {
			$css_canInstall=true;
			add_settings_error( 'acb_sp_messages_css', 'acb_sp_message_saved', 'CSS Code Saved OK', 'info' );
		}
	}


	/*
	/* Output primary HTML page based on values calculated above
	*/

	?>
	<div class="wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	
	<?php settings_errors( 'acb_sp_messages_global' ) ?>

	<!----------------- PHP ---------------->

	<div id="fields_for_acb_sp_options_php" class="acb_sp_collapsible acb_sp_notice_container<?=$scrollToIf($php_op)?>">
	<form action="options.php" method="post">
	<?php
	acb_sp_do_settings_group_fields('acb_sp_settings','acb_sp_options_php','acb_sp_messages_php');
	echo '<p class="submit">';
	submit_button( __( 'Check/Run', 'acb_sp' ),'primary','acb_sp_submit_run',false,[
		"title" => __('Run/Execute the code in the box above. In case of any fatal errors - just make a note of the error then refresh the page in the browser',	'acb_sp' )
		] + ($php_fn_enabled ? []:["disabled"=>"disabled"])
	);
	if($php_canInstall) {
			submit_button(__( 'Publish', 'acb_sp' ),'primary','acb_sp_submit_publish',false,[
				"title" => __(			'Install the code above to make it globally available across all pages in the website', 'acb_sp' ),
				] + ($php_fn_enabled  && $installing_enabled ? []:["disabled"=>"disabled"])
			);					
	}
	if($php_inst_code && !$php_op) {
			submit_button(__( 'Revert', 'acb_sp' ),'primary','acb_sp_submit_revert',false ,[
				"title" => __('Revert code to last published', 'acb_sp' )
				] + ($php_fn_enabled ? []:["disabled"=>"disabled"])
			);					
	}

	echo '</p>';
	?>
	</form>
	</div>
	
	<hr/>
	<!----------------- Javascript ---------------->

	<div id="fields_for_acb_sp_options_js" class="acb_sp_collapsible acb_sp_notice_container<?=$scrollToIf($js_op)?>">
	<form action="options.php" method="post">
	<?php
	acb_sp_do_settings_group_fields('acb_sp_settings','acb_sp_options_js','acb_sp_messages_js');
	// in admin pages PHP code only evaluated on demand - so we keep last result in browser sessionStorage
	echo '<script>var acb_scratchpad_var = JSON.parse(sessionStorage.getItem(\'acb_scratchpad_vars\') || \'{}\');</script>';
	echo '<p class="submit">';
	submit_button( __( 'Check/Run', 'acb_sp' ),'primary','acb_sp_submit_run',false,[
		"title" => __(	'Run/Execute the code in the box above.',	'acb_sp' )
		] );
	if($js_canInstall) {
			submit_button(__( 'Publish', 'acb_sp' ),'primary','acb_sp_submit_publish',false,[
				"title" => __('Install the code above to make it globally available across all pages in the website','acb_sp' ),
				] + ($installing_enabled ? []:["disabled"=>"disabled"])
			);					
	}
	if($js_inst_code && !$js_op) {
			submit_button(__( 'Revert', 'acb_sp' ),'primary','acb_sp_submit_revert',false ,[
			"title" => __('Revert code to last published','acb_sp' )
			] );				
	}
	echo '</p>';
	?>
	</form>
	</div>

	<hr/>
	<!----------------- CSS ---------------->

	<div id="fields_for_acb_sp_options_css" class="acb_sp_collapsible acb_sp_notice_container<?=$scrollToIf($css_op)?>">
	<form action="options.php" method="post">
	<?php
	acb_sp_do_settings_group_fields('acb_sp_settings','acb_sp_options_css','acb_sp_messages_css');
	echo '<p class="submit">';
	submit_button( __( 'Check/Save', 'acb_sp' ),'primary','acb_sp_submit_run',false,[
			"title" => __('Save above CSS.','acb_sp' )
		] );

	if($css_canInstall) {
			submit_button(__( 'Publish', 'acb_sp' ),'primary','acb_sp_submit_publish',false,[
				"title" => __('Install the code above to make it globally available across all pages in the website', 'acb_sp' ),
				] + ($installing_enabled ? []:["disabled"=>"disabled"])
			);
	}
	if($css_inst_code && !$css_op) {
			submit_button(__( 'Revert', 'acb_sp' ),'primary','acb_sp_submit_revert',false ,[
				"title" => __('Revert code to last pubslished','acb_sp' )
			] );					
	}
	echo '</p>';
	?>
	</form>
	</div>

	<?php

	echo '</div>';
	
}





/* 
 * Here we run any previously installed code 
 * OR in if in preview mode - the current code
 *
 * We run PHP code just after plugins are loaded... thereby supporting all the functionality that would be availianle in a plugin
 *
 * Installed PHP code should include appropriate add_action(...)  statements to determine when it should be run
 * 
 * Any immediately returned value or echo'd content will be ignored.
 *
 * Any otherwise unhandled Errors/Exceptions will cause installed code to be disabled, such that it wont be run again untill re-installed.
 * This is to help avoid bad code "breaking" /"locking-out" word-press functionality, and simply recovery form errors.
*/

function acb_sp_plugins_loaded()
{
	$page=isset($_GET['page']) ? $_GET['page'] : null;
	if($page && $page=='acb_sp_settings')return;
	$preview=isset($_GET['preview']) ? $_GET['preview'] : null;
	$en=false;
	if($preview=='true'){
		$phpCode=get_option('acb_sp_php_code');
	} else {
		$phpCode=get_option('acb_sp_php_installed');
		$en = get_option('acb_sp_php_installed_enable');
		if(!$en)return;
		update_option('acb_sp_php_installed_enable',False); // if we bomb out for any reason we want to leave this disabled
	}
	if(!$phpCode)return;
		try {
		ob_start();
		acb_sp_wrapped_eval($phpCode);
	}	catch(Exception $e) {
		$en=False;
	}	catch(Throwable $e) {
		$en=False;
	} finally {
		if(ob_get_contents())$en=False;
		ob_end_clean();
	}
	if($en)update_option('acb_sp_php_installed_enable',True);
}


/*
 * Load scratchpads (not users) scripts/css files for admin pages
 */
function acb_sp_load_admin_scripts()
{
	wp_register_script( 'codeMirrorJS', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.56.0/codemirror.min.js', null, null, true );
	wp_enqueue_script('codeMirrorJS');
	wp_register_style( 'codeMirrorCSS', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.56.0/codemirror.min.css', false, 'all' );
	wp_enqueue_style('codeMirrorCSS');

	
	wp_register_script( 'codeMirror-javascript', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.56.0/mode/javascript/javascript.min.js', null, null, true );
	wp_enqueue_script('codeMirror-javascript');


	wp_register_script( 'codeMirror-css', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.56.0/mode/css/css.min.js', null, null, true );
	wp_enqueue_script('codeMirror-css');

	wp_register_script( 'codeMirror-xml', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.56.0/mode/xml/xml.min.js', null, null, true );
	wp_enqueue_script('codeMirror-xml');


	wp_register_script( 'codeMirror-html', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.56.0/mode/htmlmixed/htmlmixed.min.js', null, null, true );
	wp_enqueue_script('codeMirror-html');

	wp_register_script( 'codeMirror-clike', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.56.0/mode/clike/clike.min.js', null, null, true );
	wp_enqueue_script('codeMirror-clike');
	
	wp_register_script( 'codeMirror-php', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.56.0/mode/php/php.min.js', null, null, true );
	wp_enqueue_script('codeMirror-php');
	

	
	wp_enqueue_style('acb_sp_admin_styles', plugin_dir_url( __FILE__ ) . 'acb-scratchpad-admin.css',false,'1.1','all');
	wp_enqueue_script('acb_admin_scripts', plugin_dir_url( __FILE__ ) . 'acb-scratchpad-admin.js',['jquery'],'1.1');
	
}

/*
 * Load scripts/css files for site content pages
 *
 * We create JS and CSS vars here based on public global $acb_scratchpad_var
 *
 * We include any user defined JS / CSS content here.
 * This is the "installed" code if any, EXCEPT if we are in preview mode, when we use the "current" version of the code
 * 
 */
function acb_sp_load_scripts()
{
	global $acb_scratchpad_var; // using a global so it can be set/modified in events triggered after initial user PHP is run;
	$css_vars = '';
	if(is_array($acb_scratchpad_var)) {
		wp_enqueue_script('acb_sp_var_script', plugin_dir_url( __FILE__ ) . 'acb-scratchpad-vars.js',['jquery'],'1.1');
		wp_localize_script('acb_sp_var_script', 'acb_scratchpad_var', $acb_scratchpad_var);
		foreach($acb_scratchpad_var as $key=>$value) {
			if(!(substr($key,0,4)=='--'))continue;
			$css_vars = $css_vars .$key . ':' . $value . ';' . PHP_EOL;
		}
	}

	if(is_preview()) {
		$user_js=get_option('acb_sp_js_code');
		if($user_js) {
				wp_enqueue_script('acb_sp_user_js_script', plugin_dir_url( __FILE__ ) . 'acb-scratchpad-js.js',['jquery'],'1.1');	
				wp_add_inline_script('acb_sp_user_js_script', "try{function($) {" . $user_js . "\r\n})(jQuery)}catch(e){}" );			
		}
		$user_css= get_option('acb_sp_css_code');
		if($user_css)	{
				$user_css_type = get_option('acb_sp_css_installed_type');
				if($user_css_type=='text/less')	{
					wp_enqueue_style('acb_sp_user_less_script', plugin_dir_url( __FILE__ ) . 'acb-scratchpad-css.less',[],'1.1');	
					wp_add_inline_style('acb_sp_user_less_script',$user_css );		
				} else  /*	if($user_css_type=='text/css')	*/ {
					wp_enqueue_style('acb_sp_user_css_script', plugin_dir_url( __FILE__ ) . 'acb-scratchpad-css.css',[],'1.1');	
					wp_add_inline_style('acb_sp_user_css_script',$user_css);		
				}
		}
	} else {

		if(get_option('acb_sp_js_installed_enable'))	{
			$user_js= get_option('acb_sp_js_installed');
			if($user_js) {
				wp_enqueue_script('acb_sp_user_js_script', plugin_dir_url( __FILE__ ) . 'acb-scratchpad-js.js',['jquery'],'1.1');	
				wp_add_inline_script('acb_sp_user_js_script', "try{(function($) {\r\n" . $user_js . "\r\n})(jQuery)}catch(e){}" );			
			}
		}
		if(get_option('acb_sp_css_installed_enable'))	{
			wp_enqueue_style('acb_sp_user_css_script', plugin_dir_url( __FILE__ ) . 'acb-scratchpad-css.css',[],'1.1');	
			$user_css= get_option('acb_sp_css_installed');
			if($user_css) {
				$user_css_type = get_option('acb_sp_css_installed_type');
				if($user_css_type=='text/less')	{
					wp_enqueue_style('acb_sp_user_less_script', plugin_dir_url( __FILE__ ) . 'acb-scratchpad-css.less',[],'1.1');	
					if($css_vars) {
						$css_vars=':root { ' . $css_vars . '}' + PHP_EOL;
					}			
					wp_add_inline_style('acb_sp_user_less_script',$css_vars . $user_css );		
				} else /* if(user_css_type=='text/css')	*/ {
					wp_enqueue_style('acb_sp_user_css_script', plugin_dir_url( __FILE__ ) . 'acb-scratchpad-css.css',[],'1.1');	
					wp_add_inline_style('acb_sp_user_css_script',$user_css );		
				}	
			}
		}
	}
}



/**********************************
 *
 * Here we hook-up the above functions so the are run at the desired time
 * 
 */

add_action( 'admin_init', 'acb_sp_settings_init' );
add_action( 'admin_menu', 'acb_sp_admin_menu_init' );
add_action( 'plugins_loaded', 'acb_sp_plugins_loaded' );
add_action('admin_enqueue_scripts', 'acb_sp_load_admin_scripts');
add_action('wp_enqueue_scripts','acb_sp_load_scripts');
