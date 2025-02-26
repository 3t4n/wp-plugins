<?php
/*
Plugin Name: LinkedIn InShare
Plugin URI: http://wordpress.org/extend/plugins/linkedin-inshare/ 
Description: Adds a LinkedIn InShare button to your posts
Author: Martijn Heesters - d-Media
Version: 1.2.3
Author URI: http://d-media.nl
*/

/* init */

// Only of use in the admin interface
if ( is_admin() ) {				
    add_action( 'admin_init' , 'linkedinshare_register_plugin_settings' ); // Setup plugin component registration
    add_action( 'admin_menu' , 'linkedinshare_options' ); // if you're in the admin menu, show the options panel
}

/* front end */

// this function receives the post content,adds the button, and returns the result
function add_post_footer_linkedinshare( $text ){
    global $post;
    // only show if it's a single page or if it's not a single page and showonlysingle is not enabled
    if ( 
        is_single() ||	
        ( get_option( 'linkedinshare_showonlyinsingle' ) != 1 )
    ){
        // add break before iframe if option is selected
        if ( get_option( 'linkedinshare_breakbefore' ) == 1 ){ $breakBefore = '<br />'; } else { $breakBefore = ''; }
        // add break after iframe if option is selected
        if ( get_option( 'linkedinshare_breakafter' ) == 1 ){ $breakAfter = '<br />'; } else { $breakAfter = ''; }
        // code for the button
        switch( get_option( 'linkedinshare_displaystyle' )){
                case 'top': $iframe = '<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-url="'.trim( get_permalink( $post->ID ) ).'" data-counter="top"></script>'; break;
                case 'right': $iframe = '<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-url="'.trim( get_permalink( $post->ID ) ).'" data-counter="right"></script>'; break;
                default: $iframe = '<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-url="'.trim( get_permalink( $post->ID ) ).'"></script>';
        }
        // if selected add a containing div with a classname
        if (get_option( 'linkedinshare_divstyling' ) == 1){ $iframe='<div class="linkedInShareButton">'.$iframe.'</div>'; }
        // show button before or after the post depening on setting
        if ( get_option( 'linkedinshare_location' ) == 'top' ){
			$text=$breakBefore.$iframe.$breakAfter.$text;
        } else {
			$text=$text.$breakBefore.$iframe.$breakAfter;
        }
    }
    // return the post
    return $text;
}

// add filter to the content
add_filter( 'the_content', 'add_post_footer_linkedinshare' );

/* admin area */

// register plugin options
function linkedinshare_register_plugin_settings() {
    // only for users who can manage options
    if ( current_user_can( 'manage_options' ) ){
        // load localisation
        if ( ! load_plugin_textdomain( 'linkedinshare', '/wp-content/languages/' ) ){
                load_plugin_textdomain( 'linkedinshare', false, basename( dirname( __FILE__ ) ) . '/i18n' );
        }
        // add options with default values (only adds them if they don't exist yet)
        add_option( 'linkedinshare_location', 'bottom' );
        add_option( 'linkedinshare_displaystyle', 'default' );
        add_option( 'linkedinshare_breakbefore' );
        add_option( 'linkedinshare_breakafter' );
        add_option( 'linkedinshare_showonlyinsingle' );
        add_option( 'linkedinshare_divstyling' );
    }
}

// adds page to the admin menu
function linkedinshare_options(){
    add_options_page( 'InShare button settings', 'InShare button', 'administrator', basename(__FILE__), 'linkedinshare_options_page' );
}

// plugin options page
function linkedinshare_options_page(){
    if ( isset( $_POST ) ){
		if ( isset( $_POST['Submit'] ) ){
			update_option( 'linkedinshare_location', $_POST['location'] );
			update_option( 'linkedinshare_displaystyle', $_POST['displaystyle'] );
			update_option( 'linkedinshare_breakbefore', $_POST['breakbefore'] );
			update_option( 'linkedinshare_breakafter', $_POST['breakafter'] );
			update_option( 'linkedinshare_showonlyinsingle', $_POST['showonlyinsingle'] );
			update_option( 'linkedinshare_divstyling', $_POST['divstyling'] );
		}
    }
    ?>
    <div class="wrap">
        <div class="icon32" id="icon-options-general"><br/></div><h2><?php _e( 'Settings for LinkedIn InShare button', 'linkedinshare' );?></h2>
        <form method="post" action="options-general.php?page=linkedinshare.php">
        <table class="form-table">
            <tr>
                <td valign="top"><strong><?php _e( 'Display options', 'linkedinshare' );?></strong></td>
                <td valign="top">
                  <input type="checkbox" value="1" <?php if ( get_option( 'linkedinshare_showonlyinsingle') == '1' ) echo 'checked="checked"'; ?> id="linkedinshare_showonlyinsingle" name="showonlyinsingle" />
                   <label for="linkedinshare_showonlyinsingle"><?php _e( 'Only show button on single post pages (ea. button doesn\'t show up in loops)', 'linkedinshare' );?></label>
                 </td>
             </tr>		
            <tr>
                <td valign="top"><strong><?php _e( 'Display position', 'linkedinshare' );?></strong></td>
                <td>
                    <select id="linkedinshare_location" name="location">
                        <option value="bottom"><?php _e( 'Bottom', 'linkedinshare' );?></option>
                        <option value="top" <?php if ( get_option( 'linkedinshare_location' ) == 'top' ) echo "selected" ?>><?php _e( 'Top', 'linkedinshare' );?></option>
                    </select>
                    <label for="linkedinshare_location"><?php _e( 'Show button on top or bottom of post', 'linkedinshare' );?></label>
                    <br /><br />
                    <input type="checkbox" value="1" <?php if ( get_option( 'linkedinshare_breakbefore' ) == '1' ) echo 'checked="checked"'; ?> id="linkedinshare_breakbefore" name="breakbefore" />
                    <label for="linkedinshare_breakbefore"><?php _e( 'Add break before the button', 'linkedinshare' );?></label>
                    <br />
                    <input type="checkbox" value="1" <?php if (get_option( 'linkedinshare_breakafter' ) == '1' ) echo 'checked="checked"'; ?> id="linkedinshare_breakafter" name="breakafter" />
                    <label for="linkedinshare_breakafter"><?php _e( 'Add break after the button', 'linkedinshare' );?></label>					
                    <br />
                    <input type="checkbox" id="linkedinshare_divstyling" value="1" <?php if (get_option( 'linkedinshare_divstyling' ) == '1' ) echo 'checked="checked"'; ?> name="divstyling" />
                    <label for="linkedinshare_divstyling"><?php _e( 'Add a containing div for each button with the classname <i>linkedInShareButton</i>, use this to style and position the button', 'linkedinshare' );?></label>
                </td>
            </tr>
            <tr>
                <td valign="top"><strong><?php _e( 'Display style', 'linkedinshare' );?></strong></td>
                <td>
                    <table border="0" cellspacing="0" cellpadding="0" style="background-color:#FFFFFF;border:1px dotted #CCCCCC;">
                        <tr>
                            <td align="center"><img src="<?php echo WP_PLUGIN_URL.'/'.basename( dirname( __FILE__ ) ) . '/'?>inshare_top.jpg" alt="Top" border="0" /></td>
                            <td align="center"><img src="<?php echo WP_PLUGIN_URL.'/'.basename( dirname( __FILE__ ) ) . '/'?>inshare_right.jpg" alt="Right" border="0" /></td>
                            <td align="center"><img src="<?php echo WP_PLUGIN_URL.'/'.basename( dirname( __FILE__ ) ) . '/'?>inshare_default.jpg" alt="Default" border="0" /></td>
                        </tr>
                        <tr>
                            <td align="center"><input type="radio" value="top" <?php if ( get_option( 'linkedinshare_displaystyle' ) == 'top' ) echo 'checked="checked"'; ?> name="displaystyle" /></td>
                            <td align="center"><input type="radio" value="right" <?php if ( get_option( 'linkedinshare_displaystyle' ) == 'right' ) echo 'checked="checked"'; ?> name="displaystyle" /></td>
                            <td align="center"><input type="radio" value="default" <?php if ( get_option( 'linkedinshare_displaystyle' ) == 'default' ) echo 'checked="checked"'; ?> name="displaystyle" /></td>
                        </tr>
                    </table>				
                </td>
            </tr>
        </table>
        <p class="submit"><input type="submit" name="Submit" value="<?php _e( 'Save Changes', 'linkedinshare' );?>" /></p>
        </form>
        <div id="poststuff">
            <div class="stuffbox" style="background-color:#FFFFFF;width:600px;">
                <h3><label>Support</label></h3>
                <div class="inside">
                    <ul>
                        <li>Please don't hesitate to send us your <a href="http://wordpress.org/tags/linkedin-inshare-button" target="_blank">support questions &raquo;</a> or <a href="http://wordpress.org/support/view/plugin-committer/martijnh" target="_blank">feature requests &raquo;</a></li>
                        <li>Support us back by mentioning or rating the <a href="http://wordpress.org/extend/plugins//linkedin-inshare-button//" target="_blank">LinkedIn InShare button plugin &raquo;</a></li>
                        <li>For an overview of our services, visit our company website <a href="http://d-media.nl?ref=wp-linkedin-inshare-button" target="_blank">d-Media</a></li>
                    </ul>                    
                </div>
            </div>        
        </div>          
    </div>
    <?php
}

// add plugin settings link on the plugin overview page
add_action( 'plugin_action_links_' . plugin_basename(__FILE__), 'linkedinshare_filter_plugin_actions' );
function linkedinshare_filter_plugin_actions( $links ){
	return array_merge( array( '<a href="options-general.php?page=linkedinshare.php">Settings</a>' ), $links );
}