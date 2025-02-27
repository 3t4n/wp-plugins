<?php
defined( 'ABSPATH' ) || exit; // Exit if accessed directly

/**
 * Adds a box to the main column on the Posts, Pages and Portfolios edit screens.
 */
function eos_dp_add_meta_box(){
	if( apply_filters( 'eos_dp_user_can_metabox',true ) ){
		$post_types = get_post_types( array( 'publicly_queryable' => true,'public' => true ) );
		if( isset( $post_types['attachment'] ) ){
			unset( $post_types['attachment'] );
		}
		$screens = array_merge( array( 'page' ),$post_types );
		foreach ( $screens as $screen ) {
			add_meta_box(
				'eos_dp_sectionid',
				__( 'Freesoul Deactivate Plugins', 'eos-dp' ),
				'eos_dp_meta_box_callback',
				$screen,
				'normal',
				'default'
			);
		}
	}
}
add_action( 'add_meta_boxes', 'eos_dp_add_meta_box' );
//Add metabox to deactivate external plugins on specific pages
function eos_dp_meta_box_callback( $post ){
	$params = array(
		'post_id' => $post->ID,
		'post_type' => $post->post_type,
		'html_url' => EOS_DP_PLUGIN_URL.'/html/',
		'is_metabox' => 'true'
	);
	wp_enqueue_script( 'eos-dp-backend-single',EOS_DP_PLUGIN_URL.'/admin/js/fdp-metaboxes-5.js', array( 'jquery' ) );
	wp_localize_script( 'eos-dp-backend-single','eos_dp_js',$params );
	wp_nonce_field( 'eos_dp_meta_boxes', 'eos_dp_meta_boxes_nonce' );
	wp_nonce_field( 'eos_dp_setts', 'eos_dp_setts' );
	$post_types_plugins = eos_dp_get_option( 'eos_post_types_plugins' );
	$post_types_plugins = is_array( $post_types_plugins ) && !empty( $post_types_plugins ) ? $post_types_plugins : eos_dp_post_types_empty();
	$active_plugins = eos_dp_active_plugins();
	$values_string = get_post_meta( $post->ID, '_eos_deactive_plugins_key',true );
	$locked = '';
	$single_settings_url = admin_url( 'admin.php?page=eos_dp_menu' );
	$post_types_url = admin_url( 'admin.php?page=eos_dp_by_post_type' );
	if( isset( $post->post_type ) ){
		if( isset( $post_types_plugins[$post->post_type] ) ){
			$ptp = $post_types_plugins[$post->post_type];
			$locked_ids = isset( $ptp[3] ) ? $ptp[3] : array();
			if( in_array( $post->ID,$locked_ids ) ){
				$locked = ' eos-post-locked';
			}
			$plugins_table = eos_dp_plugins_table();
			$arr = $plugins_table[$post->post_type];
			if( !$values_string && isset( $ptp[2] ) && $ptp[2] == '1' ){
				$values_string = $ptp[1];
			}
			if( !$arr[0] ){
				$locked = ' eos-post-locked';
			}
		}
	}
	$values = explode( ',',$values_string );
	$args = array( 'test_id'=>time(),'fdp_post_id'=>$post->ID );
	$post_check = get_site_transient( '_fdp_pro_post_nsg_'.$post->ID );
	if( $post_check ){
		?>
		<div id="eos-dp-post-check-error" class="notice notice-error eos-dp-mb-32">
			<h2><?php echo wp_kses( $post_check,array( 'a' => array( 'href' => array(),'target' => array() ) ) ); ?></h2>
		</div>
		<?php
	}
	$post_type = isset( $post->post_type )  ? $post->post_type : 'post';
	?>
	<div class="eos-dp-post-name-wrp right<?php echo $locked; ?>" style="background:transparent">
		<span class="fdp-single-inactive-msg fdp-single-msg"><?php _e( 'Inactive','eos-dp' ); ?></span>
		<span class="fdp-single-active-msg fdp-single-msg"><?php _e( 'Active','eos-dp' ); ?></span>
		<span id="eos_dp_lock_post" name="eos_dp_lock_post" class="eos-dp-lock-post-wrp hover">
			<input class="eos-dp-lock-post" type="checkbox" />
		</span>
		<input type="hidden" id="eos_dp_single_locked" name="eos_dp_single_locked" value="<?php echo ' eos-post-locked' === $locked ? 'locked' : 'unlocked'; ?>" />
		<p class="fdp-single-inactive-msg right"><?php printf( __( 'The %sPost Types settings%s will override these settings.','eos-dp' ),'<a href="'.admin_url( '?page=eos_dp_by_post_type' ).'" target="_fdp_post_types">','</a>' ); ?></p>
		<p class="fdp-single-active-msg right"><?php printf( __( 'These settings will override the %sPost Types settings%s.','eos-dp' ),'<a href="'.admin_url( '?page=eos_dp_by_post_type' ).'" target="_fdp_post_types">','</a>' ); ?></p>
	</div>
	<div class="eos-dp-plugins-metabox" style="position:absolute;top:-30px">
		<div class="eos-dp-separator"></div>
		<a class="button" href="<?php echo add_query_arg( array( 'eos_dp_post_type' => $post_type,'eos_dp_post_in' => $post->ID,'single_post' => true ),admin_url( 'admin.php?page=eos_dp_menu' ) ); ?>" target="_blank"><?php _e( 'Singles','eos-dp' ); ?></a>
		<a class="button" href="<?php echo add_query_arg( array( 'eos_dp_post_type' => $post->post_type ),admin_url( 'admin.php?page=eos_dp_by_post_type' ) ); ?>" target="_blank"><?php _e( 'Post Types','eos-dp' ); ?></a>
	</div>
	<div  class="eos-dp-before-metabox-actions"><?php do_action( 'eos_dp_metabox_before_action_buttons' ); ?></div>
	<div class="eos-dp-actions" style="visibility:visible;position:static" data-post-id="<?php echo esc_attr( $post->ID ); ?>">
		<?php
		$themes_list = eos_dp_active_themes_list( false );
		if( $themes_list ){
		?>
		<a title="<?php _e( 'Select a different Theme ONLY FOR PREVIEW','eos-dp' ); ?>" class="eos-dp-theme-sel" style="border:1px solid #253042 !important"><span class="dashicons dashicons-admin-appearance" style="color:#253042"></span><?php echo $themes_list; ?></a>
		<?php } ?>
		<a data-page_speed_insights="false" title="<?php _e( 'Preview the page loading plugins according the settings you see here','eos-dp' ); ?>" class="eos-dp-preview" oncontextmenu="return false;" href="<?php echo wp_nonce_url( add_query_arg( $args,get_permalink( $post->ID ) ),'eos_dp_preview','eos_dp_preview' ); ?>" target="_blank"><span class="dashicons dashicons-search"></span>
		<a data-page_speed_insights="false" title="<?php _e( 'Preview the page loading plugins and the theme according the settings you see here and disable JavaScript esecution','eos-dp' ); ?>" class="eos-dp-preview" oncontextmenu="return false;" href="<?php echo wp_nonce_url( add_query_arg( array_merge( $args,array( 'js' => 'off' ) ),get_permalink( $post->ID ) ),'eos_dp_preview','eos_dp_preview' ); ?>" target="_blank">
			<span class="dashicons dashicons-search">
				<span class="eos-dp-no-js">JS</span>
			</span>
		</a>
		<?php do_action( 'eos_dp_metabox_actions' ); ?>
	</div>
	<?php eos_dp_pro_version_notice( 'relative' ); ?>
	<div id="eos-dp-plugins-wrp" class="eos-dp-plugins-metabox eos-dp-plugins-wrp<?php echo $locked; ?>" style="line-height:2;height:auto;margin-top:0;<?php echo '' === $locked ? 'opacity:0.4' : ''; ?>">
		<div class="eos-dp-separator-little"></div>
		<h2 style="display:inline-block;padding: 10px 0"><?php _e( 'Uncheck the plugins that you want to deactivate on this page.','eos-dp' ); ?></h2>
		<span style="display:inline-block;width:10px"></span>
		<span class="eos-dp-active-wrp"><input type="checkbox" /></span><span class="eos-dp-legend-txt"><?php _e( 'Plugin active','eos-dp' ); ?> </span>
		<span class="eos-dp-not-active-wrp"><input type="checkbox" checked/></span><span class="eos-dp-legend-txt"><?php _e( 'Plugin not active','eos-dp' ); ?></span>
		<input type="hidden" name="eos_dp_admin_meta[_eos_deactive_plugins_key]" id="eos_deactive_plugins" class="checkbox-result" value="<?php echo esc_attr( $values_string ); ?>"/>
		<div class="eos-dp-separator-little"></div>
		<table style="column-count:<?php echo max( 1,min( 3,absint( count( $active_plugins )/11 ) ) ); ?>;display:block">
		<?php
		$n = 1;
		foreach( $active_plugins as $p ){
			$plugin_name = strtoupper( str_replace( '-',' ',dirname( $p ) ) );
			?>
			<tr id="eos-dp-plugin-name-<?php echo $n; ?>" class="eos-theme-checkbox-div" style="margin-bottom:4px" data-path="<?php echo esc_attr( $p ); ?>">
				<td>
					<span class="<?php echo in_array( $p,$values) ? 'eos-dp-not-active-wrp' : 'eos-dp-active-wrp'; ?>">
						<input class="eos-fdp-checkbox" type="checkbox" data-path="<?php echo $p; ?>" value="<?php echo esc_attr( $p ); ?>"<?php echo in_array( $p,$values) ? ' checked' : ''; ?> onclick="javascript:eos_dp_update_chk_wrp(jQuery(this),jQuery(this).is(':checked'));eos_dp_update_included_checks(this);"/>
					</span>
					<span class="eos-dp-name-th"><?php echo esc_html( $plugin_name ); ?></span>
				</td>
			</tr>
			<?php
			++$n;
		}
		?>
		</table>
	</div>
	<?php
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved and object $post the post object.
 */
function eos_dp_save_meta_box_data( $post_id,$post ) {
	if ( ! isset( $_POST['eos_dp_admin_meta'] ) ) return;
	//* Merge user submitted options with fallback defaults
	$data = wp_parse_args( $_POST['eos_dp_admin_meta'], array( '_eos_deactive_plugins_key'  => '' ) );
	//* Sanitize
	foreach ( (array) $data as $key => $value ) {
		$data[$key] = sanitize_text_field( $value );
	}
	if( isset( $data['_eos_deactive_plugins_key'] ) ){
		$home_url = get_option( 'home' );
		$data['_eos_deactive_plugins_key'] .= ','.EOS_DP_PLUGIN_BASE_NAME;
		$path = esc_attr( str_replace( $home_url,'',get_permalink( $post_id ) ) );
		eos_dp_update_url_options( $path,$post_id,sanitize_text_field( $data['_eos_deactive_plugins_key'] ),$post->post_type );
	}
	eos_dp_save_metaboxes( $data, 'eos_dp_meta_boxes', 'eos_dp_meta_boxes_nonce', $post, 'edit_post' );
}

add_action( 'save_post', 'eos_dp_save_meta_box_data',10,2 );
//Save metaboxes
function eos_dp_save_metaboxes( array $data, $nonce_action, $nonce_name, $post, $capability ){
	//* Verify the nonce
	if ( ! isset( $_POST[ $nonce_name ] ) || ! wp_verify_nonce( $_POST[ $nonce_name ], $nonce_action ) )
		return;
	//* Don't try to save the data under autosave, ajax, or future post.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) return;
	if ( defined( 'DOING_CRON' ) && DOING_CRON ) return;
	$post = get_post( $post );
	$post_type = $post->post_type;
	//* Don't save if WP is creating a revision (same as DOING_AUTOSAVE?)
	if ( 'revision' === $post_type ) return;
	//* Check that the user is allowed to edit the post
	if( !eos_dp_pro_can_metabox( current_user_can( $capability,$post->ID ) ) ) return;
	//* Cycle through $data, insert value or delete field
	foreach ( (array) $data as $field => $value ) {
		//* Save $value, or delete if the $value is empty
		if ( false !== $value ) update_post_meta( $post->ID, $field, $value );
	}
	if( isset( $_POST['eos_dp_single_locked'] ) ){
		$post_types_matrix = eos_dp_get_updated_plugins_table();
		$post_types_matrix_pt = $post_types_matrix[$post_type];
		if( 'locked' === $_POST['eos_dp_single_locked'] ){
			$post_types_matrix_pt[3] = isset( $post_types_matrix_pt[3] ) ? array_unique( array_merge( $post_types_matrix_pt[3],array( $post->ID ) ) ) : array( $post->ID );
		}
		elseif( 'unlocked' === $_POST['eos_dp_single_locked'] && isset( $post_types_matrix_pt[3] ) ){
			$post_types_matrix_pt[3] = array_unique( array_diff( $post_types_matrix_pt[3],array( $post->ID ) ) );
		}
		$post_types_matrix[$post_type] = $post_types_matrix_pt;
		eos_dp_update_option( 'eos_post_types_plugins',$post_types_matrix );
	}
}
