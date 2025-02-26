<?php
/*
 * Live Preview - Product Options
 * https://sahu.media
 *
 * @package sahu_live_product_options_lite
 * @copyright Copyright (c) 2020, SAHU MEDIA®
 *
 */
 
  if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
 
// Erstelle Produkt Tab
 
add_filter( 'woocommerce_product_data_tabs', 'sahu_live_product_options_lite_product_data_tab' , 99 , 1 );
function sahu_live_product_options_lite_product_data_tab( $product_data_tabs ) {
    $product_data_tabs['my-custom-tab'] = array(
        'label' => __( 'Canvas Produkt', 'sahu_live_product_options_lite' ),
        'target' => 'sahu_live_canvas_product_data',
    );
    return $product_data_tabs;
}

// Erstelle Produktfelder

add_action( 'woocommerce_product_data_panels', 'sahu_live_product_options_lite_product_data_fields' );
function sahu_live_product_options_lite_product_data_fields() {
    global $woocommerce, $post;
?>
    <div id="sahu_live_canvas_product_data" class="panel woocommerce_options_panel">

<?php		
		global $post;
		$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'full' );
		$filteredhttp = str_replace('http://', '', get_the_post_thumbnail_url( $post->ID, $image_size ));
			
		woocommerce_wp_checkbox( array( 
			'id'            => 'singleproduct', 
			'wrapper_class' => '', 
			'label'         => __( 'Einzelnes Produkt', 'sahu_live_product_options' ),
			'description'   => __( 'Nur Anhacken, wenn es ein einzelnes Produkt ist.', 'sahu_live_product_options' ),
			'default'       => '0',
			'desc_tip'      => true,
		) );
			
			woocommerce_wp_text_input( array( 
				'id'            => 'fieldname_text1', 
				'wrapper_class' => '', 
				'label'         => __( 'Wie soll das Feld heißen?', 'sahu_live_product_options' ),
				'description'   => __( 'Dieser wird auch auf dem Lieferschein angezeigt!', 'sahu_live_product_options' ),
				'default'       => '0',
				'desc_tip'      => true,
			) );
			
			add_thickbox(); 
			woocommerce_wp_text_input( array( 
				'id'            => 'mpfath_text1', 
				'wrapper_class' => '', 
				'label'         => __( 'MPFAD Setzten:', 'sahu_live_product_options' ),
				'description'   => __( 'Achtung! Machen Sie dies nur, wenn Sie wissen was Sie tun! <a target="_blank" href="https://sahu.media/modal_preview/previewimg.php?TB_iframe=true&width=800&height=700&image='.$filteredhttp.'" class="thickbox">Nutze den Editor!</a>', 'sahu_live_product_options' ),
				'default'       => '0',
				'desc_tip'      => true,
			) );

			woocommerce_wp_text_input( array( 
				'id'            => 'maxtextlenght_text1', 
				'wrapper_class' => '', 
				'label'         => __( 'Maximale Buchstaben:', 'sahu_live_product_options' ),
				'description'   => __( 'Wie viele Buchstaben?', 'sahu_live_product_options' ),
				'default'       => '1',
				'desc_tip'      => true,
			) );

			woocommerce_wp_text_input( array( 
				'id'            => 'fontsize_text1', 
				'wrapper_class' => '', 
				'label'         => __( 'Schriftgröße:', 'sahu_live_product_options' ),
				'description'   => __( 'Welche Schriftgröße?', 'sahu_live_product_options' ),
				'default'       => '45px',
				'desc_tip'      => true,
			) );
		
			woocommerce_wp_text_input( array( 
				'id'            => 'fontcolor_1', 
				'wrapper_class' => '', 
				'label'         => __( 'Schriftfarbe:', 'sahu_live_product_options' ),
				'description'   => __( '', 'sahu_live_product_options' ),
				'default'       => '#276cb8', //0,0,0,0.6
				'desc_tip'      => false,
			) );
		
		
		woocommerce_wp_checkbox( array( 
			'id'            => 'dobuleproduct', 
			'wrapper_class' => '', 
			'label'         => __( 'Zwei Produkt', 'sahu_live_product_options' ),
			'description'   => __( 'Nur Anhacken, wenn es es zwei Produkte sind.', 'sahu_live_product_options' ),
			'default'       => '0',
			'desc_tip'      => true,
		) );
		
			woocommerce_wp_text_input( array( 
				'id'            => 'fieldname_text2', 
				'wrapper_class' => '', 
				'label'         => __( 'Wie soll das Feld heißen?', 'sahu_live_product_options' ),
				'description'   => __( 'Dieser wird auch auf dem Lieferschein angezeigt!', 'sahu_live_product_options' ),
				'default'       => '0',
				'desc_tip'      => true,
			) );	

			woocommerce_wp_text_input( array( 
				'id'            => 'mpfath_text2', 
				'wrapper_class' => '', 
				'label'         => __( 'MPFAD Setzten:', 'sahu_live_product_options' ),
				'description'   => __( 'Achtung! Machen Sie dies nur, wenn Sie wissen was Sie tun! <a target="_blank" href="https://sahu.media/modal_preview/previewimg.php?TB_iframe=true&width=800&height=700&image='.$filteredhttp.'" class="thickbox">Nutze den Editor!</a>', 'sahu_live_product_options' ),
				'default'       => '0',
				'desc_tip'      => true,
			) );

			woocommerce_wp_text_input( array( 
				'id'            => 'maxtextlenght_text2', 
				'wrapper_class' => '', 
				'label'         => __( 'Maximale Buchstaben:', 'sahu_live_product_options' ),
				'description'   => __( 'Wie viele Buchstaben?', 'sahu_live_product_options' ),
				'default'       => '0',
				'desc_tip'      => true,
			) );

			woocommerce_wp_text_input( array( 
				'id'            => 'fontsize_text2', 
				'wrapper_class' => '', 
				'label'         => __( 'Schriftgröße:', 'sahu_live_product_options' ),
				'description'   => __( 'Welche Schriftgröße?', 'sahu_live_product_options' ),
				'default'       => '45px',
				'desc_tip'      => true,
			) );
			
			woocommerce_wp_text_input( array( 
				'id'            => 'fontcolor_2', 
				'wrapper_class' => '', 
				'label'         => __( 'Schriftfarbe:', 'sahu_live_product_options' ),
				'description'   => __( '', 'sahu_live_product_options' ),
				'default'       => '0,0,0,0.6',
				'desc_tip'      => false,
			) );
		
		
	if(get_locale() == 'de_DE'){
		echo '<a href="https://shop.sahu.media/p/woocommerce-live-editor/" target="_blank"><img style="margin-left:20px;" src="'.plugin_dir_url(dirname(__FILE__,2)).'/images/sonderzeichen.png"></a>';
	}else{
		echo '<a href="https://shop.sahu.media/p/woocommerce-live-editor/" target="_blank"><img style="margin-left:20px;" src="'.plugin_dir_url(dirname(__FILE__,2)).'/images/sonderzeichen_en.png"></a>';
	}
?>
		<div style="margin-bottom:10px; padding-left:15px;">
			<?php echo __( 'Du brauchst Hilfe? Kontaktiere uns die <a href="https://sahu.media" target="_blank">SAHU MEDIA®</a>', 'sahu_live_product_options_lite' ); ?>
		</div>
    </div>
    <?php
}

// Speichere Felder

add_action( 'woocommerce_process_product_meta', 'sahu_live_product_options_lite_save_custom_field' );
function sahu_live_product_options_lite_save_custom_field( $post_id ) {
	
 $product = wc_get_product( $post_id );
 
 $title = isset( $_POST['singleproduct'] ) ? $_POST['singleproduct'] : '';
 $product->update_meta_data( 'singleproduct', $title );
 $product->save();
 
 $title2 = isset( $_POST['dobuleproduct'] ) ? $_POST['dobuleproduct'] : '';
 $product->update_meta_data( 'dobuleproduct', $title2 );
 $product->save();	
 
 $product = wc_get_product( $post_id );
 $title3 = isset( $_POST['mpfath_text1'] ) ? $_POST['mpfath_text1'] : '';
 $product->update_meta_data( 'mpfath_text1', $title3 );
 $product->save();
 
 $product = wc_get_product( $post_id );
 $title4 = isset( $_POST['maxtextlenght_text1'] ) ? $_POST['maxtextlenght_text1'] : '';
 $product->update_meta_data( 'maxtextlenght_text1', $title4 );
 $product->save();
	
 $product = wc_get_product( $post_id );
 $title7 = isset( $_POST['fontsize_text1'] ) ? $_POST['fontsize_text1'] : '';
 $product->update_meta_data( 'fontsize_text1', $title7 );
 $product->save();	
	
 $product = wc_get_product( $post_id );
 $title8 = isset( $_POST['fontsize_text2'] ) ? $_POST['fontsize_text2'] : '';
 $product->update_meta_data( 'fontsize_text2', $title8 );
 $product->save();
	
 $product = wc_get_product( $post_id );
 $title5 = isset( $_POST['mpfath_text2'] ) ? $_POST['mpfath_text2'] : '';
 $product->update_meta_data( 'mpfath_text2', $title5 );
 $product->save();
 
 $product = wc_get_product( $post_id );
 $title6 = isset( $_POST['maxtextlenght_text2'] ) ? $_POST['maxtextlenght_text2'] : '';
 $product->update_meta_data( 'maxtextlenght_text2', $title6 );
 $product->save();	
	
 $product = wc_get_product( $post_id );
 $title10 = isset( $_POST['fieldname_text1'] ) ? $_POST['fieldname_text1'] : '';
 $product->update_meta_data( 'fieldname_text1', $title10 );
 $product->save();	
		
 $product = wc_get_product( $post_id );
 $title11 = isset( $_POST['fieldname_text2'] ) ? $_POST['fieldname_text2'] : '';
 $product->update_meta_data( 'fieldname_text2', $title11 );
 $product->save();	
	
 $product = wc_get_product( $post_id );
 $title13 = isset( $_POST['fontcolor_1'] ) ? $_POST['fontcolor_1'] : '';
 $product->update_meta_data( 'fontcolor_1', $title13 );
 $product->save();
 
 $product = wc_get_product( $post_id );
 $title14 = isset( $_POST['fontcolor_2'] ) ? $_POST['fontcolor_2'] : '';
 $product->update_meta_data( 'fontcolor_2', $title14 );
 $product->save();
 
}