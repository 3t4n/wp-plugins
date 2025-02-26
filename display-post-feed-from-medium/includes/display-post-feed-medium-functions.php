<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; /* Exit if accessed directly */
}

/*
* Registers a new options menu page under Settings.
*/
if ( ! function_exists( 'dpffm_plugin_menu' ) ) {
	function dpffm_plugin_menu() {
		add_menu_page(
			__( 'Display Post Feed from Medium', 'display-post-feed-from-medium' ),
			__( 'Display Post Feed from Medium', 'display-post-feed-from-medium' ),
			'manage_options',
			'dpffm-settings',
			'dpffm_plugin_menu_setting'
		);
		add_action( 'admin_init', 'dpffm_plugin_settings' );
	}
}
add_action( 'admin_menu', 'dpffm_plugin_menu' );

/*
* Register plugin options settings
*/
if ( ! function_exists( 'dpffm_plugin_settings' ) ) {
	function dpffm_plugin_settings() {
		register_setting( 'dpffm-group', 'dpffm_handle' );
		register_setting( 'dpffm-group', 'dpffm_subtitle' );
		register_setting( 'dpffm-group', 'dpffm_hideimage' );
		register_setting( 'dpffm-group', 'dpffm_view' );
		register_setting( 'dpffm-group', 'dpffm_gridview' );
		register_setting( 'dpffm-group', 'dpffm_titletag' );
		register_setting( 'dpffm-group', 'dpffm_readmore' );
		register_setting( 'dpffm-group', 'dpffm_numposts' );
		register_setting( 'dpffm-group', 'upload_image' );
		register_setting( 'dpffm-group', 'dpffm_dateformat' );
	}
}
/*
* Plugin options settings
*/
if ( ! function_exists( 'dpffm_plugin_menu_setting' ) ) {
	function dpffm_plugin_menu_setting() {
		?>
  <div class="wrap">

	<!-- Notice -->
  	<div class="notice dpffm--notice">
        <div>
            <h3><?php esc_html_e( 'Display Post Feed from Medium', 'display-post-feed-from-medium' ); ?></h3>
            <p>Here's a link to the demo and documentation for the plugin. This will help you learn more about its features and how to use it.</p>
			<div class="e-notice__actions">
				<a href="https://wp-plugins.galaxyweblinks.com/wp-plugins/display-post-feed-from-medium/demo" class="e-button--cta" target="_blank"><span>Demo</span></a>
				<a href="https://wp-plugins.galaxyweblinks.com/wp-plugins/display-post-feed-from-medium/doc" class="e-button--cta cta-secondary" target="_blank"><span>Documentation</span></a>
            </div>
			<p class="e-note">For any feedback or queries regarding this plugin, please contact our <a href="https://wp-plugins.galaxyweblinks.com/contact/" target="_blank">Support team</a>.</p>
        </div>
    </div>

	<h1><?php esc_html_e( 'Display Post Feed from Medium', 'display-post-feed-from-medium' ); ?></h1>
	<div class="metabox-flex">
	<div class="postbox-container" style="width: 55%;margin-right: 15px;">
	  <div class="postbox">
		<div class="inside">
		  <h2><?php esc_html_e( 'Display Post Feed Settings', 'display-post-feed-from-medium' ); ?></h2>
		  <form method="post" action="options.php" id="display-post-feed-from-medium-form">
			<div class="dpffmerrorTxt"></div>       
			<?php
			  settings_fields( 'dpffm-group' );
			  do_settings_sections( 'dpffm-group' );
			?>
			   
			<table class="form-table dpffm-form-table">   
			  <tr valign="top">
				<th scope="row"><?php esc_html_e( 'Medium Handle', 'display-post-feed-from-medium' ); ?><span class="medium-handle-required" aria-required="true">*</span></th>
				<td><input type="text" name="dpffm_handle" id="dpffm_handle" value="<?php echo esc_attr( get_option( 'dpffm_handle' ) ); ?>"  />
				<p>Please use the user's medium handle e.g galaxy-ux-studio <br><strong>Note: Please do not use '@' inside this field. The default medium handle is galaxy-ux-studio</strong></p>
			</td>
			  </tr>
			  <tr valign="top">
				<th scope="row"><?php esc_html_e( 'Heading Title Tag', 'display-post-feed-from-medium' ); ?></th>
				<td>
				  <select name='dpffm_titletag'>
					<option value="p" 
					<?php
					if ( ! empty( get_option( 'dpffm_titletag' ) ) && ( get_option( 'dpffm_titletag' ) == 'p' ) ) {
						echo 'selected'; }
					?>
					>P</option>
					<option value="h1" 
					<?php
					if ( ! empty( get_option( 'dpffm_titletag' ) ) && ( get_option( 'dpffm_titletag' ) == 'h1' ) ) {
						echo 'selected'; }
					?>
					>H1</option>
					<option value="h2" 
					<?php
					if ( ! empty( get_option( 'dpffm_titletag' ) ) && ( get_option( 'dpffm_titletag' ) == 'h2' ) ) {
						echo 'selected'; }
					?>
					>H2</option>
					<option value="h3" 
					<?php
					if ( ! empty( get_option( 'dpffm_titletag' ) ) && ( get_option( 'dpffm_titletag' ) == 'h3' ) ) {
						echo 'selected'; }
					?>
					>H3</option>
					<option value="h4" 
					<?php
					if ( ! empty( get_option( 'dpffm_titletag' ) ) && ( get_option( 'dpffm_titletag' ) == 'h4' ) ) {
						echo 'selected'; }
					?>
					>H4</option>
					<option value="h5" 
					<?php
					if ( ! empty( get_option( 'dpffm_titletag' ) ) && ( get_option( 'dpffm_titletag' ) == 'h5' ) ) {
						echo 'selected'; }
					?>
					>H5</option>
					<option value="h6" 
					<?php
					if ( ! empty( get_option( 'dpffm_titletag' ) ) && ( get_option( 'dpffm_titletag' ) == 'h6' ) ) {
						echo 'selected'; }
					?>
					>H6</option>
				  </select>
				  <p>This can be use to set a custom tag for the article titles, such as p, H1, H2,... H6 etc. <strong>The default title tag is 'h2'.</strong></p>
				</td>
			  </tr>
			  <tr valign="top" class="hide_subtitle">
				<th scope="row"><?php esc_html_e( 'Hide description', 'display-post-feed-from-medium' ); ?></th>
				<td>
				  <select name='dpffm_subtitle' class="dpffm_subtitle">
					<option value="false" 
					<?php
					if ( ! empty( get_option( 'dpffm_subtitle' ) ) && ( get_option( 'dpffm_subtitle' ) == 'false' ) ) {
						echo 'selected'; }
					?>
					>False</option>
					<option value="true" 
					<?php
					if ( ! empty( get_option( 'dpffm_subtitle' ) ) && ( get_option( 'dpffm_subtitle' ) == 'true' ) ) {
						echo 'selected'; }
					?>
					>True</option>
				  </select>  
				  <p>If you would like to hide the description from the medium posts, set this value to true. <strong>The default value is false.</strong></p> 
				</td>
			  </tr>
			  <tr valign="top" class="readmore_text">
				<th scope="row"><?php esc_html_e( 'Read More Link Text', 'display-post-feed-from-medium' ); ?></th>
				<td>
				  <input type="text" name="dpffm_readmore" id="dpffm_readmore" value="<?php echo esc_attr( get_option( 'dpffm_readmore' ) ); ?>" />
				  <p>This can be use to set a custom link text to change the text of the link. <strong>The default text is 'Read More'.</strong></p>
				</td>
			  </tr>
			  <tr valign="top">
				<th scope="row"><?php esc_html_e( 'Hide Image', 'display-post-feed-from-medium' ); ?></th>
				<td>
				  <select name='dpffm_hideimage' class="dpffm_hideimage">
					<option value="false" 
					<?php
					if ( ! empty( get_option( 'dpffm_hideimage' ) ) && ( get_option( 'dpffm_hideimage' ) == 'false' ) ) {
						echo 'selected'; }
					?>
					>False</option>
					<option value="true" 
					<?php
					if ( ! empty( get_option( 'dpffm_hideimage' ) ) && ( get_option( 'dpffm_hideimage' ) == 'true' ) ) {
						echo 'selected'; }
					?>
					>True</option>
				  </select>
				  <p>If you would like to hide the image from the medium posts, set this value to true. <strong>The default value is false.</strong></p>   
				</td>
			  </tr>
			  <tr valign="top" class="placeholder_image">
				<th scope="row"><?php esc_html_e( 'Placeholder Image', 'display-post-feed-from-medium' ); ?></th>
				<td>
				  <input id="upload_image" type="text" size="36" name="upload_image" value="<?php echo esc_attr( get_option( 'upload_image' ) ); ?>" />
				  <input id="upload_image_button" class="button" type="button" value="Upload Image" />
				  <p><?php esc_html_e( "This is the default image that should show when medium post doesn't have a featured image.", 'display-post-feed-from-medium' ); ?></p>
				</td>
			  </tr>
			  <tr valign="top">
				<th scope="row"><?php esc_html_e( 'Date Format', 'display-post-feed-from-medium' ); ?></th>
				<td><input type="text" name="dpffm_dateformat" id="dpffm_dateformat" value="<?php echo esc_attr( get_option( 'dpffm_dateformat' ) ); ?>" />
					<p>This can be use to manage the publish date format. The default date format is <b>Jan 1, 2022</b> using the <b>'M d, Y'</b>  Also, you can pass on the custom format to this attribute to change. For more help, you can visit <a href="https://www.php.net/manual/en/datetime.format.php" target="_blank"><?php esc_html_e( 'Here', 'display-post-feed-from-medium' ); ?></a></p> 
				</td>
			  </tr>
				<tr valign="top">
				  <th scope="row"><?php esc_html_e( 'Layout view', 'display-post-feed-from-medium' ); ?></th>
				  <td>
					<select name='dpffm_view' class="dpffm-post-view">
					  <option value="List" 
					  <?php
						if ( ! empty( get_option( 'dpffm_view' ) ) && ( get_option( 'dpffm_view' ) == 'List' ) ) {
							echo 'selected'; }
						?>
						>List View</option>
					  <option value="Grid" 
					  <?php
						if ( ! empty( get_option( 'dpffm_view' ) ) && ( get_option( 'dpffm_view' ) == 'Grid' ) ) {
							echo 'selected'; }
						?>
						>Grid View</option>
					</select>
					<p>This option can use to select the view of the medium post listing. If you would like to show the posts in a list view you can select a list view or if you select grid view so it will display the post in the grid view with the help of the below selected number in the single row. <strong>The list view is the default layout view.</strong></p>
				  </td>
				</tr>
				<tr valign="top" class="dpffm-grid-view">
				  <th scope="row"><?php esc_html_e( 'Grid View', 'display-post-feed-from-medium' ); ?></th>
				  <td>
					<select name='dpffm_gridview' class="dpffm-post-grid">
					  <option value="2" 
					  <?php
						if ( ! empty( get_option( 'dpffm_gridview' ) ) && ( get_option( 'dpffm_gridview' ) == '2' ) ) {
							echo 'selected'; }
						?>
						>2</option>
					  <option value="3" 
					  <?php
						if ( ! empty( get_option( 'dpffm_gridview' ) ) && ( get_option( 'dpffm_gridview' ) == '3' ) ) {
							echo 'selected'; }
						?>
						>3</option>
					  <option value="4" 
					  <?php
						if ( ! empty( get_option( 'dpffm_gridview' ) ) && ( get_option( 'dpffm_gridview' ) == '4' ) ) {
							echo 'selected'; }
						?>
						>4</option>
					</select>
					<p><?php esc_html_e( 'This can be use to set the number of posts in the grid(column) view in one row. ', 'display-post-feed-from-medium' ); ?></p>  
				  </td>
				</tr>
				<tr valign="top">
				  <th scope="row"><?php esc_html_e( 'Numbers of Posts', 'display-post-feed-from-medium' ); ?></th>
				  <td>
					<select name='dpffm_numposts' class="dpffm-post-numposts">
					  <option value="1" 
					  <?php
						if ( ! empty( get_option( 'dpffm_numposts' ) ) && ( get_option( 'dpffm_numposts' ) == '1' ) ) {
							echo 'selected'; }
						?>
						>1</option>
					  <option value="2" 
					  <?php
						if ( ! empty( get_option( 'dpffm_numposts' ) ) && ( get_option( 'dpffm_numposts' ) == '2' ) ) {
							echo 'selected'; }
						?>
						>2</option>
					  <option value="3" 
					  <?php
						if ( ! empty( get_option( 'dpffm_numposts' ) ) && ( get_option( 'dpffm_numposts' ) == '3' ) ) {
							echo 'selected'; }
						?>
						>3</option>
					  <option value="4" 
					  <?php
						if ( ! empty( get_option( 'dpffm_numposts' ) ) && ( get_option( 'dpffm_numposts' ) == '4' ) ) {
							echo 'selected'; }
						?>
						>4</option>
					  <option value="5" 
					  <?php
						if ( ! empty( get_option( 'dpffm_numposts' ) ) && ( get_option( 'dpffm_numposts' ) == '5' ) ) {
							echo 'selected'; }
						?>
						>5</option>
					  <option value="6" 
					  <?php
						if ( ! empty( get_option( 'dpffm_numposts' ) ) && ( get_option( 'dpffm_numposts' ) == '6' ) ) {
							echo 'selected'; }
						?>
						>6</option>
					  <option value="7" 
					  <?php
						if ( ! empty( get_option( 'dpffm_numposts' ) ) && ( get_option( 'dpffm_numposts' ) == '7' ) ) {
							echo 'selected'; }
						?>
						>7</option>
					  <option value="8" 
					  <?php
						if ( ! empty( get_option( 'dpffm_numposts' ) ) && ( get_option( 'dpffm_numposts' ) == '8' ) ) {
							echo 'selected'; }
						?>
						>8</option>
					  <option value="9" 
					  <?php
						if ( ! empty( get_option( 'dpffm_numposts' ) ) && ( get_option( 'dpffm_numposts' ) == '9' ) ) {
							echo 'selected'; }
						?>
						>9</option>
					  <option value="10" 
					  <?php
						if ( ! empty( get_option( 'dpffm_numposts' ) ) && ( get_option( 'dpffm_numposts' ) == '10' ) ) {
							echo 'selected'; }
						?>
						>10</option>
					</select>
					<p><?php esc_html_e( 'This can be use to specify the number of posts you want to display. The maximum number of posts is 10. This is also useful if you just want to display a selected number of posts item.', 'display-post-feed-from-medium' ); ?></p>
				  </td>
				</tr>
			  </table>
			  <?php submit_button(); ?>
			</form>
		  </div> <!-- end of inside -->
		</div>
	  </div> <!-- end of postbox-container -->
	  <div class="postbox-container" style="width: 43%;">
		<div class="postbox">
		  <div class="inside">
			<h2><?php esc_html_e( 'Display Post Feed Shortcode Instructions', 'display-post-feed-from-medium' ); ?></h2>
			<div class="dpffm-howtouse">
			  <p><?php esc_html_e( 'Display Post Feed from Medium plugin displays the latest posts from a specified user of the medium.', 'display-post-feed-from-medium' ); ?></p>
			  <p><strong><?php esc_html_e( 'To use this plugin on any page/post please add below shortcode:', 'display-post-feed-from-medium' ); ?> <br><h3 style="color:#09050B"><?php esc_html_e( '[show_medium_posts]', 'display-post-feed-from-medium' ); ?></h3></strong></p>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
		<?php
	} /* end of the function */
} /* end of if exist function */
?>