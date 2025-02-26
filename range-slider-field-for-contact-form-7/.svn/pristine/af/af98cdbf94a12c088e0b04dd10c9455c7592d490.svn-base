<?php
function RSFFCF7_add_form_tag_rangeslider() {
	wpcf7_add_form_tag( array( 'rangeslider', 'rangeslider*' ),'RSFFCF7_rangeslider_form_tag_handler', array('name-attr' => true) );
        }
function  RSFFCF7_rangeslider_form_tag_handler( $tag ) {
	if ( empty( $tag->name ) ) {
       return '';
     }
    $validation_error = wpcf7_get_validation_error( $tag->name );
	$class = wpcf7_form_controls_class( $tag->type );
	$class .= ' wpcf7-validates-as-rangeslider';
    $atts = array();
	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_id_option();
	$atts['readonly'] = 'readonly';
	if ( $tag->has_option( 'readonly' ) ) {
	$atts['readonly'] = 'readonly';
	}
	$value =(string) reset( $tag->values );   	
	if ( $tag->has_option( 'placeholder' ) or $tag->has_option( 'watermark' ) ) {
		$atts['placeholder'] = $value;
		$value = '';
	}
	$value = $tag->get_default_option( $value );


	$value = wpcf7_get_hangover( $tag->name, $value );

	$atts['class'] .= " rsffcf-slider";

	if(!empty($tag->get_option( 'min' )[0])){

		$atts['value'] =$tag->get_option( 'min' )[0];
	}else{
		$atts['value'] =1;
	}

	$atts['type'] = 'hidden';

	$atts['name'] = $tag->name;

	if(!empty($tag->get_option( 'step' )[0])){

		$atts['step'] = $tag->get_option( 'step' )[0];
	}else{
		$atts['step'] = 2;
	}

	if(!empty($tag->get_option( 'min' )[0])){

		$atts['min'] = $tag->get_option( 'min' )[0];

	}else{
		$atts['min'] =1;
	}

	if(!empty($tag->get_option( 'max' )[0])){

	 	$atts['max'] = $tag->get_option( 'max' )[0];
	}else{
		$atts['max'] =20;
	}

	if(!empty($tag->get_option( 'Prefix' )[0])){
    	$atts['Prefix'] = $tag->get_option( 'Prefix' )[0];
	}else{
		$atts['Prefix'] = '$';
    }
    if(!empty($tag->get_option( 'prefixpos' )[0])){

    	$atts['prefixpos'] = $tag->get_option( 'calslider' )[0];
    }else{
    	$atts['prefixpos'] ="left";
    }

    if(!empty($tag->get_option( 'slidershow' )[0])){

    	$atts['slidershow'] = $tag->get_option( 'slidershow' )[0];

    }else{

    	$atts['slidershow'] ="single";

    }
	
    if(!empty($tag->get_option( 'sliderstyle' )[0])){

    	$atts['slider_style'] =$tag->get_option( 'sliderstyle' )[0];

	}else{
		$atts['slider_style'] ="rainbow";
	}

	if(!empty($tag->get_option( 'rangeshow' )[0])){
		$atts['rangeshow'] = $tag->get_option( 'rangeshow' )[0];
	}else{
		$atts['rangeshow'] ="enable";
	}

	if(!empty($tag->get_option( 'labels' )[0])){
   	 	$atts['lable_in'] = $tag->get_option( 'labels' )[0];
   	}else{
		$atts['lable_in'] ="";
	}

    if($atts['slider_style'] == "circle"){
     	
     	$class_name = "rsfcf_circles-slider";

     }else if($atts['slider_style']=="scale"){
        $class_name = "rsfcf_scale-slider";
         
    }else if($atts['slider_style']=="rainbow"){ 
        $class_name = "rsfcf_rainbow-slider";
           
    }else if($atts['slider_style']=="modernflat"){ 
        $class_name = "rsfcf_flat-slider";

    }else if($atts['slider_style']=="doublelabels"){ 
        $class_name = "rsfcf_double-label-slider";

    }else{
        $class_name = "rsfcf_slider-display";
    }

	$atts = wpcf7_format_atts($atts);
   
    $html = sprintf(
	'<div class='.$class_name.' %2$s><span class="wpcf7-form-control-wrap %1$s"><input %2$s %4$s />%3$s</span></div>',sanitize_html_class($tag->name) , $atts, $validation_error, 'data-formulas="'.$value.'"' );

	return $html;
}
function RSFFCF7_add_tag_generator_rangeslider() {
	$tag_generator = WPCF7_TagGenerator::get_instance();
	$tag_generator->add( 'rangeslider', __( 'rangeslider', 'range-slider-field-for-contact-form-7' ),'RSFFCF7_tag_generator_rangeslider',array('version'=>2));	 
}
function RSFFCF7_tag_generator_rangeslider( $contact_form, $args = '' ) {
	$args = wp_parse_args( $args, array() );
	$wpcf7_contact_form = WPCF7_ContactForm::get_current();
	$contact_form_tags = $wpcf7_contact_form->scan_form_tags();
	$type = 'rangeslider';
 ?>
 <header class="description-box">
	    <h3>Range Slider tag generator</h3>
	</header> 
	<div class="control-box">
		<fieldset>
			 <input type="hidden" data-tag-part="basetype" value="rangeslider" >
				<legend>Name</legend>
				<input type="text" data-tag-part="name" pattern="[A-Za-z][A-Za-z0-9_\-]*">
			</fieldset>
			<fieldset>
				<legend>step</legend>
				<input type="number" min="1"  value="1" data-tag-part="option" data-tag-option="step:" />
			</fieldset>
			<fieldset>
			<legend>Range</legend>
				<label>
					<?php echo esc_html( __( 'Min', 'range-slider-field-for-contact-form-7' ) ); ?>
						<input type="number" min="1"  value="1" data-tag-part="option" data-tag-option="Min:" />
				</label>
				&ndash;
				<label>
					<?php echo esc_html( __( 'Max', 'range-slider-field-for-contact-form-7' ) ); ?>
						<input type="number" name="max" min="1"  value="100"  data-tag-part="option" data-tag-option="Max:"/>
				</label>
			</fieldset>
			<fieldset>
				<legend>Prefix</legend>
				<input type="number" min="1"  value="1" data-tag-part="option" data-tag-option="Prefix:" />
				<?php echo esc_html( __( 'Use this prefix of the value', 'range-slider-field-for-contact-form-7' ) ); ?>
			</fieldset>
			<fieldset>
				<legend>Prefix Position</legend>
				<label>
					<input type="radio" name="calslider" data-tag-option="calslider:" value="left" data-tag-part="option" checked="checked" disabled/> 
						<?php echo esc_html( __( 'left', 'range-slider-field-for-contact-form-7' ) ); ?>
				</label>
				<label>
					<input type="radio" name="calslider" data-tag-option="calslider:" value="right" data-tag-part="option" disabled/> 
					<?php echo esc_html( __( 'right', 'range-slider-field-for-contact-form-7' ) ); ?>
				</label>
				<label class="occf7rs_pro_link">Only available in pro version 
					<a href="https://www.plugin999.com/plugin/range-slider-field-for-contact-form-7/" target="_blank">link</a>
				</label>
			</fieldset>
			
			<fieldset>
				<legend>Slider Style</legend>
				<label> 
					<input type="radio" name="sliderstyle" data-tag-option="sliderstyle:" value="circle" data-tag-part="option"/> 
					<?php echo esc_html( __( 'Circle', 'range-slider-field-for-contact-form-7' ) ); ?>
				</label>
				<label>
					<input type="radio" name="sliderstyle" data-tag-option="sliderstyle:" value="scale" data-tag-part="option" /> 
					<?php echo esc_html( __( 'Scale', 'range-slider-field-for-contact-form-7' ) ); ?>
				</label>
				<label>
					<input type="radio" name="sliderstyle" data-tag-option="sliderstyle:" value="rainbow" data-tag-part="option" checked="checked" /> 
					<?php echo esc_html( __( 'Rainbow', 'range-slider-field-for-contact-form-7' ) ); ?>
				</label>
				<label>
					<input type="radio" name="sliderstyle" data-tag-option="sliderstyle:" value="modernflat" data-tag-part="option" /> 
					<?php echo esc_html( __( 'Modern  Flat', 'range-slider-field-for-contact-form-7' ) ); ?>
				</label>	
				<label>
					<input type="radio" name="sliderstyle" data-tag-option="sliderstyle:" value="doublelabels" data-tag-part="option" /> 
					<?php echo esc_html( __( 'Double  Labels', 'range-slider-field-for-contact-form-7' ) ); ?>
				</label>	
				<label>
					<input type="radio" name="sliderstyle" data-tag-option="sliderstyle:" value="simple" data-tag-part="option" /> 
					<?php echo esc_html( __( 'simple', 'range-slider-field-for-contact-form-7' ) ); ?>
				</label>	
			</fieldset>
			<fieldset>
				<legend>Slider Show</legend>
				<label>
					<input type="radio" name="slidershow" value="single" data-tag-part="option" data-tag-option="slidershow:" checked="checked" disabled/> 
					<?php echo esc_html( __( 'Single Edge', 'range-slider-field-for-contact-form-7' ) ); ?>
				</label>
				<label>
					<input type="radio" name="slidershow" value="double" data-tag-part="option" data-tag-option="slidershow:"  disabled/> 
					<?php echo esc_html( __( 'Double Edge', 'range-slider-field-for-contact-form-7' ) ); ?>
				</label>
				<label class="occf7rs_pro_link">Only available in pro version <a href="https://www.plugin999.com/plugin/range-slider-field-for-contact-form-7/" target="_blank">link</a></label>
			</fieldset>
			<fieldset>
				<legend>Range Show</legend>
				<label>
					<input type="radio" name="rangeshow" value="enable" data-tag-part="option" data-tag-option="rangeshow:"  checked="checked" /> 
					<?php echo esc_html( __( 'Enable', 'range-slider-field-for-contact-form-7' ) ); ?>
				</label>
				<label>
					<input type="radio" name="rangeshow"  value="disable" data-tag-part="option" data-tag-option="rangeshow:" /> 
					<?php echo esc_html( __( 'Disable', 'range-slider-field-for-contact-form-7' ) ); ?>
				</label>
			</fieldset>
			<fieldset>
				<legend>Labels</legend>
				<input type="text" data-tag-part="option" data-tag-option="labels:" />
							<?php echo esc_html( __( '
							[NOTE:if you add label and range-show enable so show label otherwise show range.and label add (ex: sunday|monday|tuseday) use to comma.]', 'range-slider-field-for-contact-form-7' ) ); ?>
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
			<label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'Range Slider Field for Contact Form 7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?>
		    </label>
		</p>
	</div>
 <?php  
}
	
add_action('wpcf7_init','RSFFCF7_add_form_tag_rangeslider',10, 0 );
add_action('wpcf7_admin_init','RSFFCF7_add_tag_generator_rangeslider', 18, 0 );
	       

		