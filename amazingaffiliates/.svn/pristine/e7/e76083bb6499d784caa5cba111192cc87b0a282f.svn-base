<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="amazingaffiliates_custom_meta_metabox amazingaffiliates_admin_page">
    
    <div class="amazingaffiliates_metabox_element" >
        
    <?php foreach( array_keys($this->custom_post_meta) as $post_type_target ) : ?>
        <?php if( get_post_type() == $post_type_target ) : ?>
            <?php foreach( array_keys($this->custom_post_meta[$post_type_target]) as $custom_post_meta_group_key ) : ?>
               
                <div class="amazingaffiliates_custom_fields_group <?php echo esc_attr( $this->custom_post_meta_groups[$custom_post_meta_group_key]['metabox_classes'] ); ?>" >
                    <p class="amazingaffiliates_custom_fields_group_title" ><?php echo esc_html( $this->custom_post_meta_groups[$custom_post_meta_group_key]['group_name'] ); ?></p>
                    
                    <?php foreach( $this->custom_post_meta[$post_type_target][$custom_post_meta_group_key] as $custom_post_meta ) : ?>
                        <?php $field_content = get_post_meta( get_the_ID(), $custom_post_meta['slug'], true ); ?>
                        
                        <div class="amazingaffiliates_custom_fields <?php echo esc_attr( $custom_post_meta['metabox_classes'] ); ?>" >
                            <label for="<?php echo esc_attr( $custom_post_meta['slug'] ); ?>"><?php echo esc_html( $custom_post_meta['name'] ); ?></label>
                            
                            <?php
                            switch ( $custom_post_meta['metabox'] ) {
                                case 'display':
                                    echo '<p id="' . esc_attr( $custom_post_meta['slug'] ) . '" type="text" >';
                                    if( $field_content == '' ) { echo '-'; }
                                    else { echo wp_kses_post( $field_content ); }
                                    echo '</p>';
                                    break;
                                case 'displaylink':
                                    echo '<a id="' . esc_attr( $custom_post_meta['slug'] ) . '" type="text" target="_blank" rel="noopener noreferrer" href="' . esc_url( $field_content ) . '" >';
                                    if( $field_content == '' ) { echo '-'; }
                                    else {  echo wp_kses_post( $field_content ); }
                                    echo '</a>';
                                    break;
                                case 'displayx100':
                                    echo '<p id="' . esc_attr( $custom_post_meta['slug'] ) . '" type="text" >';
                                    if( $field_content == '' ) { echo '-'; }
                                    else { echo wp_kses_post( $field_content ) . '%'; }
                                    echo '</p>';
                                    break;
                                case 'displaybool':
                                    echo '<p id="' . esc_attr( $custom_post_meta['slug'] ) . '" type="text" >';
                                    if( $field_content == '' ) { echo '-'; }
                                    else { 
                                        if( $field_content == 1 ) { echo 'TRUE'; }
                                        if( $field_content == 0 ) { echo 'FALSE'; }
                                    }
                                    echo '</p>';
                                    break;
                                case 'displayjson':
                                    echo '<pre id="' . esc_attr( $custom_post_meta['slug'] ) . '" type="text" >';
                                    if( $field_content == '' AND ! is_null( json_decode( $field_content ) ) ) { echo '-'; }
                                    else { 
                                        echo wp_kses_post( wp_json_encode( json_decode( $field_content , null , 2048 , JSON_INVALID_UTF8_IGNORE ), JSON_PRETTY_PRINT ) );
                                    }
                                    echo '</pre>';
                                    break;
                                case 'details':
                                    echo '<details id="' . esc_attr( $custom_post_meta['slug'] ) . '" closed ><summary>' . esc_attr( ucfirst( $custom_post_meta['slug'] ) ) . '</summary><p>';
                                    if( $field_content == '' AND ! is_null( json_decode( $field_content ) ) ) { echo '-'; }
                                    else { echo wp_kses_post( $field_content ); }
                                    echo '</p></details>';
                                    break;
                                case 'image':
                                    echo wp_get_attachment_image( $field_content , "thumbnail" );
                                    echo '<p id="' . esc_html( $custom_post_meta['slug'] ) . '" type="text" >';
                                    if( empty($field_content) ) { echo '-'; }
                                    else { 
                                        echo wp_kses_post( $field_content );
                                    }
                                    echo '</p>';
                                    break;
                                case 'time':
                                    echo '<p id="' . esc_attr( $custom_post_meta['slug'] ) . '" type="text" >';
                                    echo wp_kses_post( $field_content );
                                    if(is_numeric($field_content)) {
                                        echo ' - ' . esc_html( gmdate('d F Y H:i:s',$field_content) ) . ' GMT</p>';
                                    }
                                    else {
                                        echo '-';
                                    }
                                    break;
                                case 'input':
                                    echo	'<input name="' . esc_attr( $custom_post_meta['slug'] ) . '" id="' . esc_attr( $custom_post_meta['slug'] ) . '" type="text" value="' . esc_attr( $field_content ) . '">';
                                    break;
                                case 'textarea':
                                    echo	'<textarea rows="3" oninput="textareaFit(event);" onfocus="textareaFit(event);" name="' . esc_attr( $custom_post_meta['slug'] ) . '" id="' . esc_attr( $custom_post_meta['slug'] ) . '" type="text" >' . esc_attr( $field_content ) . '</textarea>';
                                    break;
                                case 'editor':
                                    $editor_content = get_post_meta( get_the_ID(), $custom_post_meta['slug'], true );
                                    $editor_id = $custom_post_meta['slug'];
                                    $editor_settings = array(
                                        'quicktags' => true,
                                        'textarea_name' => $custom_post_meta['slug'],
                                        'textarea_rows' => 5
                                     );
                                    wp_editor($editor_content, $editor_id, $editor_settings);
                                    break;
                            }
                            ?>
                            
                            </div>
                        
                    <?php endforeach; ?>
                    
                </div>
                
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    
    </div>
    
	<?php 
	$post_type = get_post_type();
	if( 'amazing_product' == $post_type ):
	?>
		<div class="amazingaffiliates_metabox_element product_preview">

			<div id="amazingaffiliates_ajax" style="display:none:" data-ajax="<?php echo esc_url( get_site_url() ); ?>/wp-admin/admin-ajax.php" data-nonce="<?php echo esc_attr( wp_create_nonce( 'workshop-warehouse' ) ); ?>" ></div>

			<?php wp_nonce_field( 'amazingaffiliates_metabox', 'amazingaffiliates_metabox_field' ); ?>

			<?php
			$entry = get_the_ID();

			$creation_date	= sanitize_text_field( get_post_meta( $entry, 'creation_date', true) );
			$last_update	= sanitize_text_field( get_post_meta( $entry, 'last_update', true) );
			$now			= time();
			$delta			= $now - intval($last_update);
			$delta_create	= $now - intval($creation_date);

			$asin			= sanitize_text_field( get_post_meta( $entry, 'asin', true) );

			$default = array(
				'shortcoded'                    => 0,
				'productid' 					=> '',
				'search'						=> '',
				'customtitle' 					=> '',
				'customcontentbefore' 		    => '',
				'showdetails'					=> 3,
				'showdescription'				=> 0,
				'showtable'					    => 0,
				'customcontentafter' 			=> '',	
				'noprice' 						=> false,
				'nobuybutton' 				    => false,
				'wrappertitle' 				    => '',
				'wrappercolor' 				    => '',
				'rating' 						=> 0,
			);

			$atts = array(
				'shortcoded'                    => 0,
				'productid' 					=> $entry,
				'search'                        => '',
				'showdetails'					=> -1,
				'showdescription'				=> -1,
				'showtable'					    => -1,
				'rating' 						=> -1,
				'wrappercolor' 				    => 'limegreen',
				'wrappertitle' 				    => 'Added: ' . intval( $delta_create / 60 / 60 / 24 ) . ' days ago - Updated: ' . intval( $delta / 60 ) . ' minutes ago'
			);

			$inputs = shortcode_atts($default, $atts);

			?>

			<div class="product_container product_block">

				<div class="product_toolbar">
					<button
						class="product_update"
						onclick="product_update('<?php echo esc_html( $asin ); ?>' , '<?php echo esc_html( $entry ); ?>' , this);" 
						data-asin="<?php echo esc_attr( $asin ); ?>" data-prod_id="<?php echo esc_attr( $entry ); ?>"
						title="Force refresh this product wth the Amazon APIs"
					>
						<img alt="" width="28" height="28" src="<?php echo esc_attr( AMAZINGAFFILIATES_PLUGIN_URL . '/admin/img/update.jpg' ); ?>" >
					</button>
				</div>

				<div id="product_display">
					<?php require( AMAZINGAFFILIATES_PLUGIN_URI . '/public/blocks/product/product_block.php' );	?>
				</div>

			</div>
		</div>
	<?php endif; ?>
    
</div>