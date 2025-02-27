<?php

/**
** A base module for the following types of tags:
** 	[digital_signature]  # digital_signature
**/

/* form_tag handler */
if (!defined('ABSPATH')){
	exit;
}


// Use for add form tag signature
add_action( 'wpcf7_init' , 'DSCF7_add_form_tag_signature' , 10, 0 );
function DSCF7_add_form_tag_signature() {
	wpcf7_add_form_tag( array( 'signature', 'signature*' ), 'DSCF7_signature_form_tag_handler',array('name-attr' => true) );
}


// Use for add tag generator signature
add_action( 'wpcf7_admin_init' , 'DSCF7_add_tag_generator_signature' , 18, 0);
function DSCF7_add_tag_generator_signature() {
	$tag_generator = WPCF7_TagGenerator::get_instance();
	$tag_generator->add( 'signature', __( 'digital_signature', 'digital-signature-for-contact-form-7' ) , 'DSCF7_tag_generator_signature' ,array('version'=>2) );
}


// Use for signature form tag handler
function  DSCF7_signature_form_tag_handler( $tag ) {
	if ( empty( $tag->name ) ) {
    	return '';
 	}

 	$validation_error = wpcf7_get_validation_error( $tag->name );

	$class = wpcf7_form_controls_class( $tag->type );
	$class .= ' wpcf7-validates-as-signature ';

 	$atts = array();
	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_id_option();

	$value =(string) reset( $tag->values );  

	if ( $tag->has_option( 'placeholder' ) or $tag->has_option( 'watermark' ) ) {
		$atts['placeholder'] = $value;
		$value = '';
	}

	$value = $tag->get_default_option( $value );
	$value = wpcf7_get_hangover( $tag->name, $value );

	$atts['class'] .= " dscf7-signature ";
	$atts['value'] = $value;
	$atts['type'] = 'hidden';
	$atts['name'] = $tag->name;
	$atts = wpcf7_format_atts($atts);

	if( !empty($tag->get_option( 'color' )[0])){
		$attsa['color'] = $tag->get_option( 'color' )[0];
	}else{
		$attsa['color'] = "#000000";
	}
	
	if( !empty($tag->get_option( 'backcolor' )[0])){
		$attsa['backcolor'] = $tag->get_option( 'backcolor' )[0];
	}else{
		$attsa['backcolor']= "#dddddd";
	}
      
	/*if( !empty($tag->get_option( 'width' )[0])){
		$attsa['width'] = $tag->get_option('width')[0];
	}else{
		$attsa['width']= 400;
	}

	if( !empty($tag->get_option( 'height' )[0])){
		$attsa['height'] = $tag->get_option('height')[0];
	}else{
		$attsa['height']= 200;
	}*/

	$attsa['width']= 300;
	$attsa['height']= 200;

	$attsa = wpcf7_format_atts( $attsa );

	$atts_attach['value'] = $tag->has_option( 'attachment' );
	$atts_attach['type'] = 'hidden';
	$atts_attach['name'] = $tag->name . "-attachment";
	$atts_attach = wpcf7_format_atts( $atts_attach );

	/* Inline attributes */
	$atts_inline['value'] = $tag->has_option( 'inline' );
	$atts_inline['type'] = 'hidden';
	$atts_inline['name'] = $tag->name . "-inline";
	$atts_inline = wpcf7_format_atts( $atts_inline );

	$html = sprintf(
		'<div class="dscf7_signature">
			<div class="dscf7_signature_inner">
				<canvas id="digital_signature-pad_%1$s" name="%1$s" class="digital_signature-pad" %4$s></canvas>
				<input class="clearButton" type="button" value="+">
			</div>
			<span class="wpcf7-form-control-wrap %1$s" data-name="'.$tag->name.'">
				<input %2$s/>
				<input %5$s class="wpcf7_input_%1$s_attachment"/>
				<input %6$s class="wpcf7_input_%1$s_inline"/>%3$s
			</span>
		</div>',sanitize_html_class($tag->name) , $atts, $validation_error ,$attsa ,$atts_attach,$atts_inline);
	return $html;
}


// tag generator signature
function DSCF7_tag_generator_signature( $contact_form, $args = '' ) {
	$args = wp_parse_args( $args, array() );
	$wpcf7_contact_form = WPCF7_ContactForm::get_current();
	$contact_form_tags = $wpcf7_contact_form->scan_form_tags();
	$type = 'signature';
	$description = __( "Generate a form-tag for a signature field.", 'digital-signature-for-contact-form-7' );
 	?>
	<header class="description-box">
	    <h3>signature  form tag generator</h3>
	    <p><?php echo sprintf( esc_html( $description ) ); ?></p>
	</header> 
	<div class="control-box">
			<fieldset>
    			<legend>
    				Field type
    			</legend>
    			<input type="hidden" data-tag-part="basetype" value="signature" >
    			<label>
				<input type="checkbox" data-tag-part="type-suffix" value="*">This is a required field.</label>
    		</fieldset>

    		<fieldset>
				<legend>Name</legend>
				<input type="text" data-tag-part="name" pattern="[A-Za-z][A-Za-z0-9_\-]*">
			</fieldset>
			<fieldset>
				<legend>Color</legend>
				<input type="color" data-tag-part="option" data-tag-option="color:" value="#000">
			</fieldset>
			<fieldset>
				<legend>Background Color</legend>
				<input type="color" data-tag-part="option" data-tag-option="backcolor:" value="#dddddd">
			</fieldset>
			<fieldset>
				<legend>Width</legend>
				<input type="number" value="300" disabled>
				<p>This option is available in <a href='https://www.plugin999.com/plugin/digital-signature-for-contact-form-7/' target='_blank'>Digital Signature For Contact Form 7 Pro</a></p>
			</fieldset>
			<fieldset>
				<legend>Height</legend>
				<input type="number" value="200" disabled>
				<p>This option is available in <a href='https://www.plugin999.com/plugin/digital-signature-for-contact-form-7/' target='_blank'>Digital Signature For Contact Form 7 Pro</a></p>
			</fieldset>
			<fieldset>
				<legend>Id</legend>
				<input type="text" data-tag-part="option" data-tag-option="id:" value="">
			</fieldset>
			<fieldset>
				<legend>Class</legend>
				<input type="text" data-tag-part="option" data-tag-option="class:" value="" pattern="[A-Za-z0-9_\-\s]*" >
			</fieldset>
		
	</div>
	<div class="insert-box">
		<div class="flex-container">
			<input type="text" class="code" readonly="readonly" onfocus="this.select();" data-tag-part="tag">
			<div class="submitbox">
				<input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'digital-signature-for-contact-form-7' ) ); ?>" />
			</div>
    	</div/>
		<p class="mail-tag-tip">
			<label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'digital-signature-for-contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?>
		    </label>
		</p>
	</div>
 	<?php  
}

// Use for manage signature data
add_filter('wpcf7_posted_data', 'DSCF7_manage_signature_data' );
function DSCF7_manage_signature_data ($posted_data) {

	foreach ($posted_data as $key => $data) {
		if (is_string($data) && strrpos($data, "data:image/png;base64", -strlen($data)) !== FALSE){	      
  			$data_pieces = explode(",", $data);
			$encoded_image = $data_pieces[1];
			$decoded_image = base64_decode($encoded_image);
			$filename = sanitize_file_name(wpcf7_canonicalize($key."-".time().".png"));
			$dscf7_signature_dir = trailingslashit(DSCF7_signature_dir());

			// Do we need to treat it as attachement ?
			$is_attachment = $posted_data[$key."-attachment"];

			if (empty($posted_data[$key."-attachment"])){
	        	// Preparing to send signature as attachement
	        	wpcf7_init_uploads(); // Confirm upload dir
				$uploads_dir = wpcf7_upload_tmp_dir();
				$uploads_dir = wpcf7_maybe_add_random_dir( $uploads_dir );
				$filename = wp_unique_filename( $uploads_dir, $filename );
				$filepath = trailingslashit( $uploads_dir ) . $filename;

	       		// Writing signature
	        	if ( $handle = @fopen( $filepath, 'w' ) ) {
					fwrite( $handle, $decoded_image );
					fclose( $handle );
		        	@chmod( $filepath, 0400 ); // Make sure the uploaded file is only readable for the owner process
				}

				if (file_exists($filepath)){
        			$posted_data[$key."-attachment"] = $filepath;
	        	}else{
	        		error_log("Cannot create signature file as attachment : ".$filepath);
	        	}

        		// Sending signature asa server image

	        	if( !file_exists( $dscf7_signature_dir ) ){ // Creating directory and htaccess file
		    		if (wp_mkdir_p( $dscf7_signature_dir )){
		    			$htaccess_file = $dscf7_signature_dir . '.htaccess';
						if ( !file_exists( $htaccess_file ) && $handle = @fopen( $htaccess_file, 'w' ) ) {
							fwrite( $handle, 'Order deny,allow' . "\n" );
							fwrite( $handle, 'Deny from all' . "\n" );
							fwrite( $handle, '<Files ~ "^[0-9A-Za-z_-]+\\.(png)$">' . "\n" );
							fwrite( $handle, '    Allow from all' . "\n" );
							fwrite( $handle, '</Files>' . "\n" );
							fclose( $handle );
						}
		    		}
	        	}

	        	$filepath = wp_normalize_path( $dscf7_signature_dir . $filename );

	       		// Writing signature
         		if ( $handle = @fopen( $filepath, 'w' ) ) {
					fwrite( $handle, $decoded_image );
					fclose( $handle );
	        		@chmod( $filepath, 0644 );
				}

				if (file_exists($filepath)){
				  	$fileurl = DSCF7_signature_url($filename);
					$posted_data[$key] = $fileurl;
				}else{
					error_log("Cannot create signature file : ".$filepath);
				}
        	}   
		}
	}
	return $posted_data;
}

// Use for validate signature
add_filter( 'wpcf7_validate_signature' , 'wpcf7_signature_validation_filter' , 10, 2 );
add_filter( 'wpcf7_validate_signature*' , 'wpcf7_signature_validation_filter' , 10, 2 );	
function wpcf7_signature_validation_filter( $result, $tag ) {

	$dscf7data_image = isset( $_POST[$tag->name] )	? sanitize_text_field($_POST[$tag->name]) : '';
	$value = isset( $_POST[$tag->name] )	? trim( strtr( (string) $dscf7data_image, "\n", " " ) ) : '';
	if ( 'signature' == $tag->basetype ) {
		if ( $tag->is_required() and '' === $value ) {
			$result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
		}
	}
	return $result;
}


// Use for signature dir path

function DSCF7_signature_dir() {
	return wpcf7_upload_dir( 'dir' ) . '/dscf7_signatures';
}

// Use for signature url
function DSCF7_signature_url( $filename ) {
	return wpcf7_upload_dir( 'url' ) . '/dscf7_signatures/'. $filename;
}