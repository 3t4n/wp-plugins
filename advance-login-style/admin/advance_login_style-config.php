<?php
/**
 * @package Admin
 */
if ( !class_exists( 'advance_login_style_Admin_Pages' ) ) 
{
/**
 * Class that holds most of the admin page functionality for Advance Login Style Plugin.
 */
class advance_login_style_Admin_Pages 
{

	/**
	* Current options value.
	* @var String.
	*/
	var $currentoption = 'advance_login_style';
	
	/**
	* Array of admin pages.
	* @var Array.
	*/
	var $adminpages = array( 'advance_login_style_dashboard');
	
	/** 
	* @desc constructor of advance_login_style_Admin_Pages class 
	*/
	function __construct() {
	
		add_action( 'init', array( $this, 'init' ), 20 );
	}
	
	/** 
	* @desc callback function for on class initilizaiton .
	* @param 
	* @return 
	*/
	function init() {
		
		$this->adminpages = apply_filters( 'advance_login_style_admin_pages', $this->adminpages );

		global $advance_login_style_admin;

		if ( $advance_login_style_admin->grant_access() ) {
			
			add_action( 'admin_enqueue_scripts', array( $this, 'config_page_scripts' ) );
		}
	}
	
	/** 
	* @desc Function to display header for setting page .
	* @param	String	$title	Header title
	* @param	Boolean	$form	Is form or note
	* @param	String	$option	option name
	* @param	String	$optionshort	option 
	* @param	Boolean $contains_files	Is contains files or note
	* @return 
	*/
	function admin_header( $title, $form = true, $option = 'cb_advance_login_style_options', $optionshort = 'advance_login_style', $contains_files = false ) {
	?>
	
	<div id="content">
	
		<div class="box span12">
		<div class="box-header well" data-original-title="">
		ADVANCED LOGIN STYLE		<?php 
		if ( ( isset( $_GET['updated'] ) && $_GET['updated'] == 'true' ) || ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == 'true' ) ) {
			$msg = __( 'Settings updated', 'advance-login-style' );
			echo ': <strong>' . esc_html( $msg ) . '</strong>';
		}
		?>
		</div>
		<div style="padding:5px 10px 0px 10px;">
		<?php
		if ( $form ) {
			echo '<form   action="' . admin_url( 'options.php' ) . '" method="post" ' . ( $contains_files ? ' enctype="multipart/form-data"' : '' ) . '>';
				
			settings_fields( $option );
			$this->currentoption = $optionshort;
		}

	}
	
	/** 
	* @desc Function to display footer for setting page .
	* @param Boolean $submit	True for show submit button
	* @return 
	*/
	function admin_footer( $submit = true ) {
		if ( $submit ) {
			?>
			<div style="text-align:center; margin: 10px;">
			
			<input type="submit" class="button-primary" name="submit" value="<?php _e( 'Save Settings', 'advance-login-style' ); ?>"/>
			
			</div>
		<?php 
		} 
		?>
		</form>
		</div>
		</div>
	</div>
	<?php
	}
	
	/** 
	* @desc callback function for admin_enqueue_scripts.
	* @param none	
	* @return none
	*/
	function config_page_scripts() {
		global $pagenow;
		
		
			wp_enqueue_style( 'advance_login_style_plugin_tools', advance_login_style_URL . 'css/advance_login_style_plugin_tools.css', advance_login_style_VERSION );
	
				
			/* color picker enqueue */
			wp_enqueue_script('wp-color-picker');
			wp_enqueue_style( 'wp-color-picker' );
		
		
			/* media upload enqueue */
		
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');
		
	}
	
	/** 
	* @desc Function to return option
	* @param String $option Option name
	* @return return option 
	*/
	function get_option( $option ) {
		if ( function_exists( 'is_network_admin' ) && is_network_admin() )
			return get_site_option( $option );
		else
			return get_option( $option );
	} 
	
	/** 
	* @desc Function to create hidden field 
	* @param	String	$var	Variable name
	* @param	Array	$option	Options array
	* @return return textarea
	*/
	function hidden( $var, $label, $option = '' ) {
		if ( empty( $option ) )
			$option = $this->currentoption;
		$label=__($label,'advance-login-style');
		$options = $this->get_option( $option );

		$val = '';
		if ( isset( $options[$var] ) )
			$val = esc_attr( $options[$var] );

		return '<input type="hidden" id="hidden_' . esc_attr( $var ) . '" name="' . $option . '[' . esc_attr( $var ) . ']" value="' . $val . '"/>';
	}

	/** 
	* @desc Function to create ImagePreview 
	* @param	String	$var	Variable name
	* @param	String	$label	Label for Image Preview 
	* @param	String	$divid	div id for image preview to show
	* @param	Array	$option	Options array
	* @return return ImagePreview 
	*/
	function imageprivew( $var, $label, $option = '', $divid='' ) {
		if ( empty( $option ) )
			$option = $this->currentoption;
		
		$label=__($label,'advance-login-style');
		
		$options = $this->get_option( $option );

		$val = '';
		if ( isset( $options[$var] ) )
			$val = esc_attr( $options[$var] );

		return ' <label  >' . esc_html( $label ) . ':</label><div id="' . esc_attr( $divid ) . '"><img src= "'.$val.'"  /></div>';
	}
	
	/** 
	* @desc Function to create Select Image 
	* @param	String	$var	Variable name
	* @param	String	$label	Label for Select Image 
	* @param	String	$divid	div id for select image to show
	* @param	String	$buttonid	Buttonid for select image
	* @param	Array	$option	Options array
	* @return return select image content
	*/
	function selectimage( $var, $label, $option = '', $buttonid, $divid ) {
		
		if ( empty( $option ) )
			$option = $this->currentoption;
		
		$label=__($label,'advance-login-style');
		
		$options = $this->get_option( $option );

		$val = '';
		
		if ( isset( $options[$var] ) )
			$val = esc_attr( $options[$var] );

		return '<label class="textinput" for="' . esc_attr( $var ) . '">' . $label . ':</label><input class="textinput" type="text" id="' . esc_attr( $var ) . '" name="' . $option . '[' . esc_attr( $var ) . ']" value="' . $val . '"/> <input type="button" id="'. esc_attr( $buttonid ).'" value="'.$label.'">' . '<div id="' . esc_attr( $divid ) . '"><img src= "'.$val.'"  /></div><br class="clear" />';
	}
	
	/** 
	* @desc Function to create textinput 
	* @param	String	$var	Variable name
	* @param	String	$label	Label for text input 
	* @param	String	$placeholder	placeholder for text input
	* @param	Array	$option	Options array
	* @return return textinput
	*/
	function textinput( $var, $label, $option = '', $placeholder='' )
	{
		if ( empty( $option ) )
			$option = $this->currentoption;
		
		$options = $this->get_option( $option );
		
		$label=__($label,'advance-login-style');
		
		$val = '';
		if ( isset( $options[$var] ) )
			$val = esc_attr( $options[$var] );
		
		return '<label class="textinput" for="' . esc_attr( $var ) . '">' . $label . ':</label><input placeholder="'.$placeholder.'" class="textinput" type="text" id="' . esc_attr( $var ) . '" name="' . $option . '[' . esc_attr( $var ) . ']" value="' . $val . '"/>' . '<br class="clear" />';
	}
	
	/** 
	* @desc Function to create input number 
	* @param	String	$var	Variable name
	* @param	String	$label	Label for input number
	* @param	String	$rightlabel	Label after input number
	* @param	Array	$option	Options array
	* @return return input number content
	*/
	function inputnumber( $var, $label, $option = '', $rightlabel='' )
	{
		if ( empty( $option ) )
			$option = $this->currentoption;
		
		$options = $this->get_option( $option );
		
		$label=__($label,'advance-login-style');
		
		$val = '';
		
		if ( isset( $options[$var] ) )
			$val = esc_attr( $options[$var] );
		
		return '<label class="textinput" for="' . esc_attr( $var ) . '">' . $label . ':</label><input class="number" type="number" id="' . esc_attr( $var ) . '" name="' . $option . '[' . esc_attr( $var ) . ']" value="' . $val . '"/>'.$rightlabel . '<br class="clear" />';
	}
	
	/** 
	* @desc Function to create select input type
	* @param	String	$var	Variable name
	* @param	String	$label	Label for select
	* @param	Array	$values	Values array
	* @param	Array	$option	Options array
	* @return return select input type
	*/
	function select( $var, $label, $values, $option = '' )
	{
		if ( empty( $option ) )
			$option = $this->currentoption;
		
		$options = $this->get_option( $option );
			
		$label=__($label,'advance-login-style');
		
		$var_esc = esc_attr( $var );
		
		$output  = '<label class="select" for="' . $var_esc . '">' . $label . ':</label>';
		
		$output .= '<select class="select" name="' . $option . '[' . $var_esc . ']" id="' . $var_esc . '">';
		
		foreach ( $values as $value => $label ) {
			$sel = '';
			
			if ( isset( $options[$var] ) && $options[$var] == $value )
				$sel = 'selected="selected" ';

				if ( !empty( $label ) )
					$output .= '<option ' . $sel . 'value="' . esc_attr( $value ) . '">' . $label . '</option>';
		}
		
		$output .= '</select>';
		
		return $output . '<br class="clear"/>';
	}
	
} 

global $advance_login_style_admin_pages;
	$advance_login_style_admin_pages = new advance_login_style_Admin_Pages();

}