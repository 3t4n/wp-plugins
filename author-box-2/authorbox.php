<?php
/*
Plugin Name: Author Box Reloaded
Plugin URI: http://wordpress.org/extend/plugins/author-box-2/
Description: Adds an author box to your blog. From a Brian Gardner's article at http://smsh.me/7ngf. REQUIRES Wordpress Plugin Framework Reloaded installed.
Version: 2.0.4.2 
Author: Lopo Lencastre de Almeida <dev@ipublicis.com>
Author URI: http://ipublicis.com/
Donate link: http://smsh.me/7kit
License: GNU GPL v3 or later

    Copyright (C) 2010-2012 iPublicis!COM

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

/**
 * Check if the framework plugin is active
 */
if( is_admin() ) { 
	$required_plugin = 'wordpress-plugin-framework-reloaded/wordpress-plugin-framework-reloaded.php';
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( ! is_plugin_active( $required_plugin ) ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );
		$wpfr = '<a href="http://wordpress.org/extend/plugins/wordpress-plugin-framework-reloaded/" target="_blank">Wordpress Plugin Framework Reloaded</a>';
		$dieMessage  = sprintf( __( 'The %s plugin must be installed and active, so this plugin was also <strong>deactivated</strong>.', 'author-box-2' ), $wpfr );
		$notice = "<div id=\"message\" class=\"error fade\"><p><strong>Author Box Reloaded</strong></p>\n".
						"<p>".$dieMessage."</p>\n</p></div>\n";
		add_action( 'admin_notices', create_function( '', "echo '$notice';" ) );
		return;
	} 
}

/**
 * Load the framework file
 */
require_once( WP_PLUGIN_DIR . '/wordpress-plugin-framework-reloaded/wordpress-plugin-framework-reloaded.php' );

/**
 * Where you put all your class code
 */
class authorBox extends WordpressPluginFrameworkReloaded {
	/**
	 * @var authorBox - Static property to hold our singleton instance
	 */
	static $instance = false;
	
	/**
	 * @array _known_sites - Author's social links defined by external plugins. Incl. plugins are for Twitter, Identi.ca, Facebook and Netlog
	 */
	protected function _init() {

		include_once('authorbox-init.php');

	}

	protected function _postSettingsInit() {
		if ( $this->_settings['ab2']['auto_insert'] == 'yes' ) {
			add_filter('the_content', array( $this, 'authorbox_auto_display' ) );
		} else {
			add_shortcode( $this->_slug, array( $this, 'authorbox_display' ) );
		}
	}

	public function addOptionsMetaBoxes() {
		add_meta_box( $this->_slug . '-general-settings', __('General Settings', $this->_slug), array($this, 'generalSettingsMetaBox'), $this->_slug, 'main');
		add_meta_box( $this->_slug . '-other-settings', __('Other Ways to Use It', $this->_slug), array($this, 'otherSettingsMetaBox'), $this->_slug, 'main');
		add_meta_box( $this->_slug . '-visual-settings', __('Visual Settings', $this->_slug), array($this, 'visualSettingsMetaBox'), $this->_slug, 'main');
		add_meta_box( $this->_slug . '-personal-settings', __('Personal Settings', $this->_slug), array($this, 'personalSettingsMetaBox'), $this->_slug, 'main');
	}

	public function generalSettingsMetaBox() {
		?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">
							<?php _e("Auto insert Author Box after article in single post view.", $this->_slug); ?>
						</th>
						<td>
							<input name="ab2[auto_insert]" id="ab2_auto_insert" type="checkbox" 
							       value="yes"<?php checked('yes', $this->_settings['ab2']['auto_insert']) ?>>
							<label for="ab2_auto_insert">
								<?php _e("Auto insert.", $this->_slug); ?>
							</label>
							<p class="description"><?php _e("If not checked you must use the other modes described below or nothing will happen.", $this->_slug);?></p>
						</td>
					</tr>
				</table>
		<?php
	}

	public function visualSettingsMetaBox() {
		?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">
							<?php _e("Photo Alignment", $this->_slug);?>
						</th>
						<td>
							<input name="ab2[photo_align]" id="ab2_photo_align" type="checkbox" 
							       value="reverse"<?php checked('reverse', $this->_settings['ab2']['photo_align']) ?>>
							<label for="ab2_photo_align">
								<?php _e("Check this to align author's photo on the other side of the text.", $this->_slug);?>
							</label>
							<p class="description"><?php _e("Don't forget that you must define your photo on Gravatar.com.", $this->_slug);?></p>
						</td>
					</tr>
				</table>
		<?php
	}

	public function personalSettingsMetaBox() {
		?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">
							<?php _e("Personal CSS", $this->_slug);?>
						</th>
						<td>
							<label for="ab2_personal_css">
		<?php 
		if( get_bloginfo( 'text_direction' ) == 'rtl' ) $rtltr = "rtl"; else $rtltr = "ltr"; 
		$authorboxcss = plugin_dir_url( __FILE__ ) . 'authorbox-'.$rtltr.'.css';
		echo sprintf( __('If you choose to create your own personal CSS, first <a href="%s" target="_blank">download the original css</a>, change it and put your modifications in the text area bellow.', $this->_slug), $authorboxcss );
		?>
							</label>
							<p align="center"><textarea name="ab2[personal_css]" id="ab2_personal_css"  rows="15" cols="58"><?php echo $this->_settings['ab2']['personal_css']; ?></textarea></p>
							<p class="description"><?php _e("Please, notice that we <b>don't support</b> your modifications.", $this->_slug);?><br />
							<?php _e("To revert just clear the text area above and save the settings again.", $this->_slug);?></p>
						</td>
					</tr>
				</table>
		<?php
	}

	public function otherSettingsMetaBox() {
		?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">
							<?php _e("You have several options to use it on your blog", $this->_slug);?>
						</th>
						<td>
							<p><?php _e("Besides auto insertion on single post view you could use one of the following options:", $this->_slug);?></p>
							<ol>
								<li><?php _e('On template: ', $this->_slug); ?><em>&lt;?php if (function_exists('wp_authorbox')) echo wp_authorbox(); ?&gt</em></li>
								<li><?php _e('Using a content shortcode: ', $this->_slug); ?><em>[<?php echo $this->_slug; ?>]</em></li>
							</ol>
						</td>
					</tr>
				</table>
		<?php
	}

	/**
	 * Function to instantiate our class and make it a singleton
	 */
	public static function getInstance() {
		if ( !self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function authorbox_admin_css() {
		if( !empty( $this->_appIcon ) ) {
			$authorboxcss = plugin_dir_url( __FILE__ ) . 'authorbox-admin.css';
			$version = uniqid (rand (),true);
			echo "<link rel='stylesheet' id='authorbox-admin-css'  href='" . $authorboxcss . "?ver=" . $version . "' type='text/css' media='screen' />"; 
			// wp_enqueue_style( 'authorbox-admin', $authorboxcss, array (), $version, 'screen' );
		}
	}

	public function authorbox_css() {
		if( !empty( $this->_settings['ab2']['personal_css'] ) ) {
	?>
<style type="text/css"> 
	/* Author Box CSS pesonalized by blog author */
<?php echo $this->_settings['ab2']['personal_css']; ?>
</style>
	<?php
		} else {
			// This makes sure that the posinioning is also good for right-to-left languages
			if( get_bloginfo( 'text_direction' ) == 'rtl' ) $rtltr = "rtl"; else $rtltr = "ltr"; 
			$authorboxcss = plugin_dir_url( __FILE__ ) . 'authorbox-'.$rtltr.'.css';
			$version = uniqid (rand (),true);
			echo "<link rel='stylesheet' id='authorbox-reloaded-css'  href='" . $authorboxcss . "?ver=" . $version . "' type='text/css' media='all' />"; 
			// wp_enqueue_style( 'authorbox-reloaded', $authorboxcss, array (), $version, 'screen' );
			if ( $this->_settings['ab2']['photo_align'] == 'reverse' ) {
				echo "<!-- Reversed author photo -->";
				if ( $rtltr == 'ltr' ) {
	?>
<style type="text/css"> 
	#authorbox-photo {
		background: #FFFFFF;
		float: right;
		margin: 0.5em 0px 10px 10px;
		padding: 3px;
		border: 1px solid #CCCCCC;
		}
				</style>
	<?php
				} else {
	?>
<style type="text/css"> 
	#authorbox-photo {
		background: #FFFFFF;
		float: left;
		margin: 0.5em 10px 10px 0;
		padding: 3px;
		border: 1px solid #CCCCCC;
		}
</style>
	<?php
				}
			}
		}
	}

	public function authorbox_auto_display( $content='' ) {
		if( is_single() ) {
			$content .= $this->authorbox_display();
		}
		return $content;
	}

	public function authorbox_display() {
		global $author;

		$author_name = get_the_author_meta( 'display_name', $author );
		$author_photo = get_avatar( get_the_author_meta( 'user_email', $author ), '100', '', $author_name );
		$author_photo = str_replace( '<img ', '<img id="authorbox-photo" title="'.$author_name.'" ', $author_photo );

		$box  = '	<div id="authorbox">'
					.'		<div class="clear">'
				    .'			<h3 id="About-' . str_replace( " ", "-", $author_name ) . '">' . __( "About the author", $this->_slug ) . '</h3>'
					.'			<p>' . $author_photo
					.'				' . get_the_author_meta( 'description', $author ) . '</p>'
					.'		</div>';

		// Author's external links
		$socialinks = '				<li><a href="%s" rel="external" target="_blank"><img src="%s" title="%s" alt="logo image" /></a></li>';

		// Author's external profile site. Ex: Main Website
		$profileurl = get_the_author_meta( 'user_url', $author );
		if( !empty( $profileurl ) ) {
			$profiletitle 	= esc_attr( sprintf(__("Visit %s&#8217;s website", $this->_slug), $author_name) );
			$profileicon = plugin_dir_url( __FILE__ ) . 'images/globe.png';
			$socialcontent .= sprintf($socialinks, $profileurl, $profileicon, $profiletitle);
		}

		// Author's social networks
		$this->_known_sites = apply_filters( 'authorbox_known_sites', $this->_known_sites );

		if( is_array( $this->_known_sites )  && ( @array_count_values( $this->_known_sites ) > 0 ) ) {
			foreach( array_keys( $this->_known_sites ) as $key ) {
				$replace = array( ' ' => '_', '/' => '_', '.' => '' );
				$cKey = strtolower( $this->_hook . '_' . str_replace( array_keys($replace), $replace, $key ) );
				$author_extra = get_the_author_meta( $cKey, $author );
				if( !empty( $author_extra ) ) {
					$socialtitle 	= esc_attr( sprintf(__("Follow %s on ", $this->_slug).$key, $author_name) );
					$socialurl 	= str_replace( "USERNAME", esc_attr($author_extra), $this->_known_sites[$key]['url'] );
					$socialicon 	= $this->_known_sites[$key]['favicon'];
					$socialcontent .= sprintf($socialinks, $socialurl, $socialicon, $socialtitle);
				}
			}
		}

		// Make the External icons section
		if( !empty($socialcontent)) {
			$box .= '		<div id="socialinks" class="clear">' 
                        .'			<ul>'
                        .'				<li>' . __("More at ", $this->_slug) . '&nbsp;</li>'
                        . $socialcontent
                        .'			</ul>'
                        .'		</div>';
		}
	
		$box .= '	</div>';

		return $box;
	}

	public function add_extra_contactmethod( $contactmethods ) {
		
		$this->_known_sites = apply_filters( 'authorbox_known_sites', $this->_known_sites );
		
		// Check to see if any External Contacts are active
		if( !is_array( $this->_known_sites ) || ( @array_count_values( $this->_known_sites ) == 0 ) ) {
			$notice = "<div id=\"message\" class=\"error fade\"><p><strong>Author Box Reloaded</strong></p><p>".
							__( 'At least one <a href="plugins.php">External Contact</a> plugin must be active.', $this->_slug )."</p></div>\n";
			add_action('admin_notices', create_function( '', "echo '$notice';" ) );
		} else {

			// Add installed Social Link plugins
			foreach( array_keys( $this->_known_sites ) as $key ) {
				$replace = array( ' ' => '_', '/' => '_', '.' => '' );
				$cKey = strtolower( $this->_hook . '_' . str_replace( array_keys($replace), $replace, $key ) );
				$contactmethods[$cKey] = $key;
			}
		
			// remove Yahoo IM & AIM
			unset($contactmethods['yim']);
			unset($contactmethods['aim']);
		}
		
		return $contactmethods;
	}	

	public function remove_extra_contactmethod( $contactmethods ) {
		
		$this->_known_sites = apply_filters( 'authorbox_known_sites', $this->_known_sites );

		remove_filter( 'user_contactmethods', array( $this, 'add_extra_contactmethod' ), 10, 1);

		// Remove installed Social Link plugins
		foreach( array_keys( $this->_known_sites ) as $key ) {
			$replace = array( ' ' => '_', '/' => '_', '.' => '' );
			$cKey = strtolower( $this->_hook . '_' . str_replace( array_keys($replace), $replace, $key ) );
			unset($contactmethods[$cKey]);
			$filter_function = $cKey.'_authorbox_add_sites';
			remove_filter('authorbox_known_sites', $filter_function, 10, 1);
		}

		// Add Yahoo IM & AIM
		$contactmethods['yim'] = 'Yahoo IM';
		$contactmethods['aim'] = 'AIM';
		
		return $contactmethods;
	}	

	public function activate() {
		$this->_settings['ab2']['auto_insert'] = 'yes';
		$this->_settings['ab2']['photo_align']  = '';
		$this->_settings['ab2']['personal_css'] = '';
		$this->registerOptions();
	}

	public function deactivate() {
		add_filter( 'user_contactmethods', array( $this, 'remove_extra_contactmethod' ), 10, 1);
		$this->_getSettings();
		$this->unregisterOptions();
	}

} /* END OF CLASS */


/**
 * Helper functions
 */
include_once('authorbox-helper.php');

// Instantiate our class
$authorBox = authorBox::getInstance();

