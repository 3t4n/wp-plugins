<?php
if( !class_exists( 'f70StocMetaBox' ) ){
class f70StocMetaBox {
/////////
	//https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_meta_box
	
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}
	
	public function add_meta_box( $post_type ) {
		if( post_type_supports( $post_type, 'editor') ) {
			add_meta_box(
				'f70stoc_setting_meta_box',
				__( 'Table of contents', 'f70-simple-table-of-contents' ),
				array( $this, 'render_meta_box_content' ),
				$post_type,
				'side',
				'high'
			);
		}
	}
	
	
	public function save( $post_id ) {
		//verify nonce
		if ( ! isset( $_POST['f70stoc_setting_meta_box_nonce'] ) ) {
			return $post_id;
		}
		$nonce = $_POST['f70stoc_setting_meta_box_nonce'];
		
		if ( ! wp_verify_nonce( $nonce, 'f70stoc_inner_custom_box' ) ) {
			return $post_id;
		}
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		
		if ( 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}
		
		$val_on_off = sanitize_text_field( $_POST['f70stoc_setting_on_off'] );
		update_post_meta( $post_id, 'f70stoc_setting_on_off', $val_on_off );
		
		$val_headers = sanitize_text_field( $_POST['f70stoc_setting_including_headers'] );
		update_post_meta( $post_id, 'f70stoc_setting_including_headers', $val_headers );
		
	}
	
	
	public function render_meta_box_content( $post ) {
		
		wp_nonce_field( 'f70stoc_inner_custom_box', 'f70stoc_setting_meta_box_nonce' );
		
		$val_on_off = get_post_meta( $post->ID, 'f70stoc_setting_on_off', true );
		$val_headers = get_post_meta( $post->ID, 'f70stoc_setting_including_headers', true );
		
		if ( $val_on_off == 'on' ) {
			$checked = ' checked';
		} else {
			$checked = '';
		}
		
		echo '<div class="f70stoc_row checkbox"><label for="f70stoc_setting_on_off"><input type="checkbox" id="f70stoc_setting_on_off" name="f70stoc_setting_on_off" value="on"'. $checked . '>' . __( 'Display the table of contents', 'f70-simple-table-of-contents' ) . '</label></div>';
		//目次を表示する
		
		if ( $val_headers == 'h2' || $val_headers == '' ) {
			$selected_1 = ' selected';
			$selected_2 = '';
		} else {
			$selected_1 = '';
			$selected_2 = ' selected';
		}
		echo '<div class="f70stoc_row select"><label for="f70stoc_setting_including_headers">' . __( 'Headers level to include in the table of contents', 'f70-simple-table-of-contents' ) . ' :</label>'
			. '<select name="f70stoc_setting_including_headers" id="f70stoc_setting_including_headers">'
			. '<option value="h2"' . $selected_1 . '>H2</option>'
			. '<option value="h2_h3"' . $selected_2 . '>H2 + H3</option>'
			. '</select>'
			. '</div>';
		//目次に含める見出し
	}


/////////
}
}