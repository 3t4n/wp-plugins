<?php
/*
Version: 1.0.0
Author:Creative pig
Author URI: www.creativepig.net
*/
class Admin {

	private $plugin_name;
	
	public function __construct( $plugin_name ) {

		$this->plugin_name = $plugin_name;
	
	}

	public function enqueue_styles() {

		$screen = get_current_screen();
		if ( LOGO_CAROUSEL == $screen->id ) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/admin.css', array(), $this->version, 'all' );
		
		}

	}

	public function enqueue_scripts() {

		$screen = get_current_screen();
		if ( LOGO_CAROUSEL == $screen->id ) {

			wp_enqueue_script('jquery-ui-sortable');

			wp_enqueue_media();

			wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/admin.js', array( 'jquery' ), $this->version, false );
			$extra_array = array(
				'lang' => array(
					'are_you_sure'       => __( 'Are you sure?', 'npcl' ),
					'yes'                => __( 'Yes', 'npcl' ),
					'no'                 => __( 'No', 'npcl' ),
					'remove'             => __( 'Remove', 'npcl' ),
					'url'                => __( 'URL', 'npcl' ),
					'enter_url'          => __( 'Enter URL', 'npcl' ),
					
				),
			);
			
			wp_localize_script( $this->plugin_name, 'OBJ', $extra_array );
			wp_enqueue_script( $this->plugin_name );
			
		}

	}

	function add_Client_meta_boxes(){

		$screens = array( LOGO_CAROUSEL );

		foreach ( $screens as $screen ) {

			add_meta_box(
				'content_id',
				__( 'Upload Logo', 'npcl' ),
				array($this,'meta_box_callback'),
				$screen,
				'normal',
				'high'
			);
	
		}

	}



	private function get_image_sizes(){

		global $_wp_additional_image_sizes;
		$sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();

    // Create the full array with sizes and crop info
    foreach( $get_intermediate_image_sizes as $_size ) {

      if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

        $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
        $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
        $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );

      } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {

        $sizes[ $_size ] = array(
                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
        );

      }

    }

		return $sizes;
	}

	function meta_box_callback( $post ){

		?>

		<?php wp_nonce_field( plugin_basename( __FILE__ ), 'clogos_nonce' ); ?>

		<div id="main-clogos-list-wrap">

			<?php
				$clogos = get_post_meta( $post->ID, '_logos', true ) ;
			 ?>
			 <?php if ( ! empty( $clogos ) ): ?>

			 	<?php foreach ($clogos as $key => $slide): ?>

						<div class="clogo-wrap">
							<div class="slide-item-left">
								<div class="npcl-form-row">
									<?php

										$thumbnail_url = '';
										$thumbnail_id = $slide['client_logo_id'];
										if ($thumbnail_id) {
											$thumbnail_url = wp_get_attachment_thumb_url( $thumbnail_id );
										}
										$upload_button_status = ' style="display:none;" ';
										if ( empty( $thumbnail_url ) ) {
											$upload_button_status = '';
										}

									?>

									<input type="hidden" name="client_logo_id[]" value="<?php echo esc_attr( $slide['client_logo_id'] ); ?>" class="npcl-logo-image-id" />
									<input type="button" class="npcl-select-img button button-primary" value="<?php _e( 'Upload', 'npcl' ); ?>" data-uploader_button_text="<?php _e( 'Select', 'npcl' );?>" data-uploader_title="<?php _e( 'Select Image', 'npcl' );?>" <?php echo $upload_button_status; ?>/>

									<?php
										$style_text="display:none;";
										if ( !empty($thumbnail_url)) {
											$style_text = '';
										}
									 ?>

									<div class="clogo-wrap" style="<?php echo $style_text; ?>" >
										<img class="clogo" alt="<?php echo esc_attr( $slide['title'] ); ?>" src="<?php echo $thumbnail_url; ?>" />
										<a href="#" class="btn-npcl-remove-image-upload">
										<span>	Change Logo</span>
										</a>
									</div>

								</div>

							</div>
							<div class="slide-item-right">
								
								<div class="npcl-form-row">
									<span class="description"><?php _e( 'Enter URL', 'npcl' ); ?></span>

									<input required="required" type="text" name="client_url[]" value="<?php echo esc_url( $slide['url'] ); ?>" placeholder="<?php _e( 'Enter URL', 'npcl' ); ?>" class="txt-logo-url regular-text code" />
									
								</div>
                                <input type="button" value="<?php  esc_attr( _e( 'Remove', 'npcl' ) ); ?>" class="button button-primary btn-remove-logo-item"/>
							</div>
                            </div>

			 	<?php endforeach ?>

			 <?php endif ?>

		</div><!-- #main-clogos-list-wrap -->
		<p><input type="button" value="<?php  esc_attr( _e( 'Add New Slide', 'npcl' ) ); ?>" class="button button-primary btn-add-logo-item" /></p>
		<?php

	}
	
function save_settings_meta_box(){
	
}
	
	function save_clogos_meta_box( $post_id ){

		if ( LOGO_CAROUSEL != get_post_type( $post_id ) ) {
			return $post_id;
		}

		
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		if ( !isset( $_POST['clogos_nonce'] ) || !wp_verify_nonce( $_POST['clogos_nonce'], plugin_basename( __FILE__ ) ) )
		    return $post_id;

		
		if( !current_user_can( 'edit_post' , $post_id ) )
			return $post_id;

		$clogo_title_array = array();
		if ( isset( $_POST['client_url'] ) ) {

			$clogo_title_array = $_POST['client_url'];

		}
		if ( empty( $clogo_title_array ) ) {
			return;
		}
		$clogos_array = array();
		$cnt = 0;
		foreach ( $clogo_title_array as $key => $title ) {

			if ( empty( $title ) ) {
				continue;
			}
		
			$clogos_array[$cnt]['url']              = esc_url( $_POST['client_url'][$key] );
			$clogos_array[$cnt]['client_logo_id']   = sanitize_text_field( $_POST['client_logo_id'][$key] );

			$cnt++;

		}
		if ( ! empty( $clogos_array ) ) {
			update_post_meta( $post_id, '_logos', $clogos_array );
		}
		else{
			delete_post_meta( $post_id, '_logos' );
		}

	}

	function usage_column_head( $columns ){

		$new_columns['cb']     = '<input type="checkbox" />';
		$new_columns['title']  = $columns['title'];
		$new_columns['usage']  = __( 'Shortcode', 'npcl' );
		$new_columns['date']   = $columns['date'];
		return $new_columns;

	}

	function usage_column_content( $column_name, $post_id ){

		switch ( $column_name ) {
			case 'usage':
				echo '[CPCC id="' . $post_id . '"]';
				break;

			default:
				break;
		}

	}


	function customize_row_actions( $actions, $post ){

		if ( LOGO_CAROUSEL == $post->post_type ) {

			unset( $actions['inline hide-if-no-js'] );

		}

		return $actions;

	}


	

	function html_templates(){
		?>
		<script type="text/template" id='template-npcl-Client-item'>
			<div class="clogo-wrap">
				<div class="slide-item-left">
					<div class="npcl-form-row">
						<input type="hidden" name="client_logo_id[]" value="" class="npcl-logo-image-id" />
						<input type="button" class="npcl-select-img button button-primary" value="<?php _e( 'Upload', 'npcl' ); ?>" data-uploader_button_text="<?php _e( 'Select', 'npcl' );?>" data-uploader_title="<?php _e( 'Select Image', 'npcl' );?>" />
						<div class="clogo-wrap" style="display:none;" >
							<img class="clogo" alt="" src="" />
							<a href="#" class="btn-npcl-remove-image-upload">
								<span>Remove</span>
							</a>
						</div>

					</div>
				</div>
				<div class="slide-item-right">

					

					<div class="npcl-form-row">
							<span class="description"><?php _e( 'Enter URL', 'npcl' ); ?></span>

						<input required="required" type="text" name="client_url[]" value="" placeholder="<?php _e( 'Enter URL', 'npcl' ); ?>" class="txt-logo-url regular-text code" />
					
					</div>

					

					<input type="button" value="<?php  esc_attr( _e( 'Remove', 'npcl' ) ); ?>" class="button btn-remove-logo-item button-primary"/>

				</div>
				
		</script>

		<?php
	}

	function updated_messages( $messages ){

		$post             = get_post();
		$post_type        = get_post_type( $post );
		$post_type_object = get_post_type_object( $post_type );

		$messages[LOGO_CAROUSEL] = array(
			0  => '', 
			1  => __( 'Client updated.', 'npcl' ),
			2  => __( 'Custom field updated.', 'npcl' ),
			3  => __( 'Custom field deleted.', 'npcl' ),
			4  => __( 'Client updated.', 'npcl' ),			
			5  => __( 'Client created.', 'npcl' ),
			7  => __( 'Client saved.', 'npcl' ),
			8  => __( 'Client submitted.', 'npcl' ),
			
			9 => __( 'Client draft updated.', 'npcl' )
		);

		return $messages;

	}

}
