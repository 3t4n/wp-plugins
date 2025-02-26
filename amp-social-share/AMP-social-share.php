<?php
/*
 * Plugin Name: AMP Social Share
 * Version: 2.2.1
 * Plugin URI: https://jaaadesign.nl/en/blog/amp-social-share-plugin/
 * Description: Lightweight plugin to add social sharing buttons to the AMP plugin by Automattic
 * Author: Nick van de Veerdonk
 * Author URI: https://jaaadesign.nl/
 */
 
 
 

// create custom plugin settings menu
add_action('admin_menu', 'amp_social_share_menu');

function amp_social_share_menu() {

	//create new top-level menu
	add_menu_page('AMP Social Share settings', 'AMP Social Share', 'administrator', __FILE__, 'amp_social_share_options_page' , plugins_url('/images/icon.png', __FILE__), 103 );

	//call register settings function
	add_action( 'admin_init', 'register_amp_social_share_settings' );
}


function register_amp_social_share_settings() {
	//register our settings
	register_setting( 'amp_social_share_group', 'social_title' );
	register_setting( 'amp_social_share_group', 'facebook_id' );
	register_setting( 'amp_social_share_group', 'intro_text' );
	register_setting( 'amp_social_share_group', 'facebook_opt_amp_jd' );
	register_setting( 'amp_social_share_group', 'twitter_opt_amp_jd' );
	register_setting( 'amp_social_share_group', 'gplus_opt_amp_jd' );
	register_setting( 'amp_social_share_group', 'linkedin_opt_amp_jd' );
	register_setting( 'amp_social_share_group', 'pinterest_opt_amp_jd' );
	register_setting( 'amp_social_share_group', 'email_opt_amp_jd' );
	register_setting( 'amp_social_share_group', 'whatsapp_opt_amp_jd' );
	
}

function amp_social_share_options_page() {
	
 
	
?>
<div class="wrap">
<h1><span class="dashicons dashicons-admin-settings" style="font-size: 35px;
    color: #29B200;
    padding-right: 20px;"></span>AMP Social Share</h1>

<table width="100%">
<br /><br />
	<tbody><tr>
    	<td valign="top">
            <table class="wp-list-table widefat fixed ">
                <thead>
                    <tr>
                        <th>AMP Social Share settings</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                     
                        <form method="post" action="options.php">
    <?php settings_fields( 'amp_social_share_group' ); ?>
    <?php do_settings_sections( 'amp_social_share_group' ); ?>
    <table class="form-table">
				
        <tr valign="top">
        <th scope="row">Prefix</th>
        <td><input type="text" name="social_title" value="<?php echo esc_attr( get_option('social_title') ); ?>" />
		<br />
		<p>Optional: add text above the social icons</p></td>
        </tr>
		
       	<tr valign="top">
        <th scope="row">Facebook </th>
		<td><input name="facebook_opt_amp_jd" type="checkbox" value="1" <?php checked( '1', get_option( 'facebook_opt_amp_jd' ) ); ?> />
		</td>        
		</tr>
		
	    <tr valign="top">
        <th scope="row">Facebook app ID*</th>
        <td><input type="number" name="facebook_id" value="<?php echo esc_attr( get_option('facebook_id') ); ?>" />
		<br />
		<p>Required for Facebook share to work, create a Facebook APP ID <a href="https://developers.facebook.com/docs/apps/register" target="_blank">here</a></p></td>
		</tr>
		<br /> 

       	<tr valign="top">
        <th scope="row">Twitter</th>
		<td><input name="twitter_opt_amp_jd" type="checkbox" value="1" <?php checked( '1', get_option( 'twitter_opt_amp_jd' ) ); ?> /></td></tr>

       	<tr valign="top">
        <th scope="row">Google+ </th>
		<td><input name="gplus_opt_amp_jd" type="checkbox" value="1" <?php checked( '1', get_option( 'gplus_opt_amp_jd' ) ); ?> />
		</td>        
		</tr>

       	<tr valign="top">
        <th scope="row">LinkedIn </th>
		<td><input name="linkedin_opt_amp_jd" type="checkbox" value="1" <?php checked( '1', get_option( 'linkedin_opt_amp_jd' ) ); ?> />
		</td>        
		</tr>

       	<tr valign="top">
        <th scope="row">Pinterest </th>
		<td><input name="pinterest_opt_amp_jd" type="checkbox" value="1" <?php checked( '1', get_option( 'pinterest_opt_amp_jd' ) ); ?> />
		</td>      
		</tr>

       	<tr valign="top">
        <th scope="row">Email</th>
		<td><input name="email_opt_amp_jd" type="checkbox" value="1" <?php checked( '1', get_option( 'email_opt_amp_jd' ) ); ?> />
		</td>        
		</tr>		
        
       	<tr valign="top">
        <th scope="row">Whatsapp </th>
		<td><input name="whatsapp_opt_amp_jd" type="checkbox" value="1" <?php checked( '1', get_option( 'whatsapp_opt_amp_jd' ) ); ?> />
		</td>        
		</tr>

        <tr valign="top">
        <th scope="row">Whatsapp intro text</th>
		<td><input type="text" name="intro_text" value="<?php echo esc_attr( get_option('intro_text') ); ?>" />
		<br />
		<p>Optional, ex.: 'Check this:'</p>
		</td>
		</tr>		

    </table>
    <br />
    <?php submit_button(); ?>

		
	
</form>
                    	 
						 
                        <br>                        
                        <span style="font-size: 1.4rem;color: #ffe200;">★★★★★</span> If you like this plugin please consider <a href="https://jaaadesign.nl/en/blog/amp-social-share-plugin/"target="_blank">rating it</a>, thank you!
                        <br><br>
                   	</td>
                    
                </tr>
                </tbody>
            </table>
            <br>
		</td>
		
		
        <td width="15">&nbsp;</td>
        <td width="250" valign="top">
		
		            <table class="wp-list-table widefat fixed bookmarks">
            	
                <tbody>
                <tr>
                	<td style="padding:4px;">
                    	
 
						<a href="https://nl.wordpress.org/plugins/amp-social-share/" title="Visit Wordpress plugin page" target="_blank">
						<img width="240" alt="AMP Social Share" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/admin-logo.jpg'; ?>" class="aligncenter"></a>
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
		
        	            <table class="wp-list-table widefat fixed bookmarks">
            	<thead>
                <tr>

				
					<th>Our other plugins</th>
                </tr>
                </thead>
               

                <tbody>
                <tr>
                	<td>
                    <ul class="uaf_list">
                    	<li><a href="https://jaaadesign.nl/en/blog/amp-sitemap/" target="_blank">AMP HTML Sitemap</a></li>
                        <li><a href="https://jaaadesign.nl/en/blog/amp-recent-posts/" target="_blank">AMP Recent Posts</a></li>
                        <li><a href="https://jaaadesign.nl/en/blog/amp-related-posts/" target="_blank">AMP Related Posts</a></li>
                        <li><a href="https://jaaadesign.nl/en/blog/amp-recent-posts-widget/" target="_blank">AMP Recent Posts widget</a></li>
                      
                    </ul>
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
			
			<table class="wp-list-table widefat fixed bookmarks">
            	<thead>
                <tr>
                	
					
					<th>Misc.</th>
                </tr>
                </thead>
               

                <tbody>
                <tr>
                	<td>
                    <ul class="uaf_list">
                    	<li><a href="https://jaaadesign.nl/en/blog/wpml-language-switcher-amp/" target="_blank">WPML language switcher in AMP</a></li>
                        <li><a href="https://jaaadesign.nl/en/blog/wordpress-amp/" target="_blank">WordPress AMP tutorial</a></li>
						 <li><a href="https://jaaadesign.nl/en/contact/" target="_blank">Contact Us</a></li>
                   </ul>
				  
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
			
       
</div>
<?php }
 
 
 
 
//* Add social script to header

add_action( 'amp_post_template_head', 'social_script' );

	 
function social_script( $amp_template ) {
	
	 if ( function_exists('is_amp_endpoint') )
		 
    $post_id = $amp_template->get( 'post_id' );
    ?>
    <script custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js" async></script>
    <?php
}
 
 
 add_action('amp_post_template_footer', 'render_amp_social', 2);
 

 function render_amp_social( $amp_template ) {

 if ( function_exists('is_amp_endpoint') )    
	 
 $post_id = $amp_template->get( 'post_id' );

 

$title = get_option( 'social_title' );
$idnumber = get_option( 'facebook_id' );
$intro = get_option( 'intro_text' );

echo '<div class="jd-css-plugins-ass">';
echo '<div class="jd-css-plugins-cont">';
echo '<div class="jd-css-plugins-inner">';
echo '<div class="social-text">' . $title. '</div>';
if ( get_option( 'facebook_opt_amp_jd' ) == '1' ) {
echo '<amp-social-share type="facebook"
        width="42"
        height="44"
        data-param-app_id="' . $idnumber. '"></amp-social-share>';
}
if ( get_option( 'twitter_opt_amp_jd' ) == '1' ) {
echo '<amp-social-share type="twitter"
        width="42"
        height="44"> </amp-social-share>';
}	
if ( get_option( 'gplus_opt_amp_jd' ) == '1' ) {
echo '<amp-social-share type="gplus"
        width="42"
        height="44"></amp-social-share>';
}		
if ( get_option( 'linkedin_opt_amp_jd' ) == '1' ) {
echo '<amp-social-share type="linkedin"
        width="42"
        height="44"></amp-social-share>';
}	
if ( get_option( 'pinterest_opt_amp_jd' ) == '1' ) {
echo '<amp-social-share type="pinterest"
        width="42"
        height="44"></amp-social-share>';
}	
if ( get_option( 'email_opt_amp_jd' ) == '1' ) {
echo '<amp-social-share type="email"
        width="42"
        height="44"></amp-social-share>';
}	
if ( get_option( 'whatsapp_opt_amp_jd' ) == '1' ) {
echo '<amp-social-share type="whatsapp"
		width="42px" 
		height="44px" role="link" data-share-endpoint="whatsapp://send" data-param-text="' . $intro . ' TITLE - CANONICAL_URL"></amp-social-share>';
}
echo '</div>'; 
echo '</div>';   
echo '</div>'; 
  
}



//*  AMP Plugin extra styles
add_action( 'amp_post_template_css', 'jd_css_plugins_ass' );

function jd_css_plugins_ass( $amp_template ) {
	
     if ( function_exists('is_amp_endpoint') )
    ?>
amp-social-share[type=whatsapp] {
    background-image: url(data:image/png;base64,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);
}

div.jd-css-plugins-ass {
    text-align: center;
}
div.jd-css-plugins-cont {
    max-width: 841px;
    width: 100%;
    margin: auto;
}
div.jd-css-plugins-inner {
    padding: 35px 16px;
}
div.social-text {
	margin: 5px 2px;
}

amp-social-share[type=linkedin], amp-social-share[type=gplus], amp-social-share[type=facebook], amp-social-share[type=twitter], amp-social-share[type=pinterest], amp-social-share[type=email], amp-social-share[type=whatsapp] {
     margin: 3px;
}
.amp-social-share-twitter{background-color:#55acee}
.amp-social-share-facebook{background-color:#3b5998}
.amp-social-share-pinterest{background-color:#bd081c}
.amp-social-share-linkedin{background-color:#0077b5}
.amp-social-share-gplus{background-color: #ef3434;}
.amp-social-share-email{background-color:#000}
.amp-social-share-whatsapp{background-color:#2AB200}
<?php
}










